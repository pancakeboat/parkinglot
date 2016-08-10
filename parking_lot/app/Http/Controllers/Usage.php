<?php namespace App\Http\Controllers;

use DB;
use DateTime;
use DateInterval;
use App\Post;

class Usage extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('lotInterface');
    }


    //returns the amount of days the vehicle has been in the space
    //since check in time.
    public function getVehicleDuration($lotID, $vehicleID){

        $duration = $this->secondsToWords($this->getVehicleDurationSeconds($lotID,$vehicleID));

        return response()->json(['duration'=>$duration]);
    }


    //Assumption Made: The person has pre paid
    //If the person has pre paid for a certain amount of time than this function will return
    //a date and time that represents when they have to pick up their vehicle based on the checkIn time
    public function getCheckoutTime($lotID, $vehicleID){

        $data = DB::select("SELECT checkIn,payment  FROM `usage` WHERE lotID='$lotID' AND vehicleID='$vehicleID' AND checkOut IS NULL");

        $rates = DB::select("SELECT rate, dailyMax FROM rates ORDER BY implemented DESC LIMIT 1");

        $time = 0;
        $vehicleTimes = array();

        //foreach vehicle the user has in the lot find the pickup times
        foreach($data as $vehicle){

            //only continue if the person has prepaid
            if(isset($vehicle->payment) && $vehicle->payment > 0 ){
                $days_paid = floor($vehicle->payment / $rates[0]->dailyMax);
                $remainder = $vehicle->payment - ($days_paid * $rates[0]->dailyMax);

                //find total number of days the user has prepaid for
                if($days_paid >= 1){
                    $time += ($days_paid * 60*60*24);
                }

                //find how many hours the user has pre paid for
                if($remainder >= 0.5){
                    $time += floor($remainder / $rates[0]->rate ) * 60*30;
                }

                $date = new DateTime($vehicle->checkIn);
                $date->add(new DateInterval('PT'.$time.'S'));
                $newtime = $date->getTimestamp();

                //get the date and time for when the user has to pick up the vehicle
                $time = date('Y-m-d H:i', $newtime);

                $vehicleTimes[] = array('time'=>$time);
            }
        }

        return response()->json($vehicleTimes);

    }

    //returns the amount of money the user owes
    public function getVehicleCharge($lotID, $vehicleID){

        $rate = new Rate();

        $duration = $this->getVehicleDurationSeconds($lotID,$vehicleID);

        $current_rate = $rate->rates();


        $prepaid_arr = DB::select("SELECT payment FROM `usage` WHERE lotID='$lotID' AND vehicleID='$vehicleID' AND checkOut IS NULL");
        $prepaid = (empty($prepaid_arr[0]->payment))? 0 : $prepaid_arr[0]->payment;

        $charge = 0;

        if($duration > 0){

            $days = floor($duration/60/60/24);
            $hours = ($duration/60/60/24 - $days) * 24;
            $remainder = $hours - floor($hours);

            if($remainder >= 0.5){
                $remainder = floor($hours) + 1;
            }
            else{
                $remainder = floor($hours) + 0.5;
            }

            $charge = $days * $current_rate[0]->dailyMax;

            //if the remainder of time is larger than the number of hours needed for a daily max value
            //to kick in than add a full days charge. If not than multiply the half hour rate by the remaining time
            $charge += ($remainder > $rate->findBreakPoint()) ? $current_rate[0]->dailyMax : $current_rate[0]->rate * floor($remainder*2);

            //deduct what the user has already pre paid
            $charge = ($charge < $prepaid) ? 0 : $charge - $prepaid;
        }

        return response()->json(['charge'=>$charge]);
    }


    //return a readable statement of how long the vehicle has been parked
    public function getVehicleDurationSeconds($lotID, $vehicleID){
        date_default_timezone_set('America/New_York');
        $date = date('Y-m-d H:i:s', time());

        $userVehicle = DB::select("select checkIn from `usage` where lotID='$lotID' AND vehicleID='$vehicleID' AND checkOut IS NULL LIMIT 1");

        $duration=0;

        if(!empty($userVehicle[0]->checkIn)){
            $datetime1 = strtotime($userVehicle[0]->checkIn);
            $datetime2 = strtotime($date);

            $secs = $datetime2 - $datetime1;

            $duration = $secs;
        }

        return $duration;
    }


    //converts seconds into a readable format
    public function secondsToWords($seconds)
    {
        $ret = "";

        /*** get the days ***/
        $days = intval(intval($seconds) / (3600*24));
        if($days> 0)
        {
            $ret .= "$days days ";
        }

        /*** get the hours ***/
        $hours = (intval($seconds) / 3600) % 24;
        if($hours > 0)
        {
            $ret .= "$hours hours ";
        }

        /*** get the minutes ***/
        $minutes = (intval($seconds) / 60) % 60;
        if($minutes > 0)
        {
            $ret .= "$minutes minutes ";
        }

        /*** get the seconds ***/
        $seconds = intval($seconds) % 60;
        if ($seconds > 0) {
            $ret .= "$seconds seconds";
        }

        return $ret;
    }
}
