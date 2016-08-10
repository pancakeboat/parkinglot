<?php namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Post;

class VehicleType extends Controller {

    //returns all data for a given vehicleID
    public function getVehicleTypes(){
        $vehicleTypes = DB::select("select * from `vehicleType` ");

        return response()->json($vehicleTypes);
    }

    //updates a specific vehicle based off of the given vehicleID
    public function updateVehicleType(){

        if(!empty($_POST['typeID'])){
            $typeID = $_POST['typeID'];
            $name = (isset($_POST['name']))? $_POST['name'] : '';
            $allotment = (isset($_POST['allotment']))? $_POST['allotment'] : '';

            if(DB::table('vehicleType')->where('typeID','=', $typeID)->update(['name'=>$name,'allotment'=>$allotment])){
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