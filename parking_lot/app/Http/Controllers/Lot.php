<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use App\Post;

class Lot extends Controller {


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


    //adds 1 row in the Lots table.
    //adds multiple rows in the spaces table if totalSpaces > 0
    //The amount of rows in the spaces table for each lot represents its capacity
    //Assigns spaces a vehicle type based on the vehicle type allotment
    //NOTE: Rounding may cause an issue when trying to give an equal amount of vehicle types to mulitple spaces
    public function addLot(Request $request){

        $name = (!empty($_POST['name']))? $_POST['name'] : '';
        $city = (!empty($_POST['city']))? $_POST['city'] : '';
        $region = (!empty($_POST['region']))? $_POST['region'] : '';
        $country = (!empty($_POST['country']))? $_POST['country'] : '';
        $totalSpaces = (!empty($_POST['totalspaces']))? $_POST['totalspaces'] : 0;


        $id = DB::table('lots')->insertGetId(
            ['name' => $name,'city' => "$city",'region' => "$region", 'country' => $country,'totalSpaces' => $totalSpaces,'totalProfit' => 0]
        );


        //successful insert
        if($id){

            //if the number of spaces in the lot are above 0 then insert rows into the spaces table
            //setting the vehicle types for each row
            if($totalSpaces>0){
                $vehicleTypes = DB::select("SELECT * FROM vehicleType");

                //Does not account for rounding issues
                foreach($vehicleTypes as $vt){
                    $allotment[] = array('vtID'=>$vt->typeID, 'allotment'=>(floor($vt->allotment * $totalSpaces)));
                }

                //holds the vehicle typeID's we assument they range from 1-4
                $allotment_counter = 0;
                $allotted = 0;

                //insert spaces for the lot assuming allotment is not empty (vehicle types exist)
                if(isset($allotment)){
                    for($i=0;$i<$totalSpaces;$i++){

                        $allotted++;
                        $vehicleType = (isset($allotment[$allotment_counter]['vtID'])) ? $allotment[$allotment_counter]['vtID'] : 2;

                        DB::table('spaces')->insert(
                            ['lotID'=>$id, 'spaceID'=>$i+1, 'vehicleType'=>$vehicleType, 'available'=>1]
                        );

                        if(isset($allotment[$allotment_counter]['allotment']) && $allotment[$allotment_counter]['allotment'] <= $allotted){
                            $allotment_counter++;
                            $allotted = 0;
                        }
                    }
                }

            }

            $success = true;
        }
        else{
            $success = false;
        }

        return response()->json(array('success'=>$success));


    }


    //return data for a specific lot
    public function getLot($lotID){

        $lot = DB::select("select * from lots where lotID='$lotID'");

        return response()->json($lot);
    }

    //return all data for all lots
    public function getAllLots(){
        $lots = DB::select(" SELECT * FROM lots ");

        return response()->json($lots);
    }

}
