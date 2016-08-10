<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use App\Post;

class User extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    //returns all user data based on userID
    public function getUser($userID){
        $user = DB::select("select * from `users` where userID='$userID' ");

        return response()->json($user);
    }

    public function updateUser(){

        if(!empty($_POST['userID'])){
            $userID = $_POST['userID'];
            $firstname = (isset($_POST['firstName']))? $_POST['firstName'] : '';
            $lastname = (isset($_POST['lastName']))? $_POST['lastName'] : '';
            $phonenumber = (isset($_POST['phoneNumber']))? $_POST['phoneNumber'] : '';
            $usageFrequency = (isset($_POST['usageFrequency']))? $_POST['usageFrequency'] : '';
            $totalPayment = (isset($_POST['totalPayment']))? $_POST['totalPayment'] : '';

            if(DB::table('users')->where('userID','=', $userID)->update(['firstName'=>$firstname,'lastName'=>$lastname,'phoneNumber'=>$phonenumber,'usageFrequency'=>$usageFrequency,'totalPayment'=>$totalPayment])){
                $success=true;
            }
            else{
                $success=false;
            }
        }
        else{
            $success=false;
        }

        return response()->json(array('success'=>$success));
    }

    //returns the users vehicles based on the parking lotID
    public function getUserVehicles($lotID, $userID){

        $userVehicle = DB::select("select * from `usage` where lotID='$lotID' AND userID='$userID' AND checkOut IS NULL");

        return response()->json($userVehicle);
    }



}

