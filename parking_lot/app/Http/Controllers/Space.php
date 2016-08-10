<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 2016-08-09
 * Time: 10:39 PM
 */

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Space extends Controller
{

    //gets all spaces for a given lot
    public function getSpaces($lotID){
        $spaces = array();

        if(is_numeric($lotID)){
            $spaces = DB::select("SELECT * FROM spaces WHERE lotID='$lotID'");
        }

        return response()->json($spaces);
    }

    //updates the availability and vehicle type of a parking space
    public function updateSpace(Request $request){

        $lotID = (isset($_POST['lotID']))? $_POST['lotID'] : '';
        $spaceID = (isset($_POST['spaceID']))? $_POST['spaceID'] : '';
        $vt = (isset($_POST['vehicleType']))? $_POST['vehicleType'] : '';
        $available = (isset($_POST['available']))? $_POST['available'] : '';

        if(DB::table('spaces')->where('lotID','=', $lotID)->where('spaceID','=', $spaceID)->update(['vehicleType' => $vt, 'available' => $available])){
            $success=true;
        }
        else{
            $success=false;
        }

        return response()->json(array('success'=>$success));
    }

}