<?php namespace App\Http\Controllers;

use DB;

class Vehicle extends Controller {


    //returns all data for a given vehicleID
    public function getVehicle($vehicleID){
        $user = DB::select("select * from `vehicle` where userID='$vehicleID' ");

        return response()->json($user);
    }

    //updates a specific vehicle based off of the given vehicleID
    public function updateVehicle(){

        if(!empty($_POST['vehicleID'])){
            $vehicleID = $_POST['vehicleID'];
            $userID = (isset($_POST['userID']))? $_POST['userID'] : '';
            $make = (isset($_POST['make']))? $_POST['make'] : '';
            $model = (isset($_POST['model']))? $_POST['model'] : '';
            $year = (isset($_POST['year']))? $_POST['year'] : '';
            $plate = (isset($_POST['plate']))? $_POST['plate'] : '';

            if(DB::table('vehicle')->where('vehicleID','=', $vehicleID)->update(['userID'=>$userID,'make'=>$make,'model'=>$model,'year'=>$year,'plate'=>$plate])){
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



}