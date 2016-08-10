<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//lot routes
Route::get('/lot', 'Lot@index');

Route::post('/addLot', 'Lot@addLot');
Route::get('/getLot/{lotID}', 'Lot@getLot');
Route::get('/getLots', 'Lot@getAllLots');


//user routes
Route::get('/findVehicle/{lotID}/{userID}', 'User@getUserVehicles');
Route::post('/updateUser', 'User@updateUser');

//usage routes
Route::get('/vehicleDuration/{lotID}/{vehicleID}', 'Usage@getVehicleDuration');
Route::get('/vehicleCharge/{lotID}/{vehicleID}', 'Usage@getVehicleCharge');
Route::get('/vehicleCheckoutTime/{lotID}/{vehicleID}', 'Usage@getCheckoutTime');

//rate routes
Route::get('/addRate/{rate}/{dailyMax}', 'Rate@addRate');
Route::get('/getRate', 'Rate@getRate');

//space routes
Route::get('/getSpaces/{lotID}', 'Space@getSpaces');
Route::post('/updateSpace', 'Space@updateSpace');

//vehicle routes
Route::get('/getVehicle/{vehicleID}', 'Vehicle@getVehicle');
Route::post('/updateVehicle', 'Vehicle@updateVehicle');

//vehicleType routes
Route::get('/getVehicleTypes', 'VehicleType@getVehicleTypes');
Route::post('/updateVehicleType', 'VehicleType@updateVehicleType');