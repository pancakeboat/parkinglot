<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 2016-08-09
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;
use DB;

class Rate extends Controller {



    //add a new rate defaulting to current timestamp
    public function addRate($rate, $dailyMax){

        if(!is_numeric($rate) || !is_numeric($dailyMax)){
            $success=false;
        }
        else{
            if(DB::table('rates')->insert(['rate' => $rate, 'dailyMax' => $dailyMax])){
                $success=true;
            }
            else{
                $success=false;
            }
        }


        return response()->json(['success'=>$success]);

    }

    //finds how many hours
    public function findBreakPoint(){
        $data = $this->rates();

        $breakPoint = 0;

        if($data[0]->dailyMax > 0){
            for($i = 0; $breakPoint = 0; $i++){
                if(($i * $data[0]->rate) > $data[0]->dailyMax){
                    $breakPoint = ($i-1) / 2;
                }
            }
        }

        return $breakPoint;
    }

    public function rates(){
        $rate = DB::select("SELECT rate, dailyMax FROM rates ORDER BY implemented ASC LIMIT 1");

        return $rate;
    }

    //gets the most recent active rate
    public function getRate(){
        $rate = $this->rates();

        return response()->json($rate);
    }

}