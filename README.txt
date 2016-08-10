# parkinglot

At the bottom of this README are the available routes and api function calls. I am hoping that everything works ok for when you run it on your machine. I have also added bootstrap and jQuery in the main interface page.

parking_lot.dev/lot will take you to the user interface which hosts all of the update api calls as well as the addLot function.

The addLot function is the only Insert function I wrote because I didn’t think it was part of the scope and I didn’t want to get carried away. (addLot function is probably the most complicated insert function out of all the supplied classes anyways).

The major api functions pertaining to this project are:

	Usage Class:
		getCheckoutTime()
		getVehicleDuration()
		getVehicleCharge()
		getVehicleDurationSeconds()
		secondsToWords()
	User Class:
		getUserVehicles()
	Rate Class:
		findBreakPoint()
		
Assumptions that I have made were:

	customers have made an account before using the software
	customers are able to pay before or after picking up their car
	when updating vehicleType allocations it will not have an effect or currently existing lots
	user input for updating is in the correct format (There isn’t idiot proof validation on post data)



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
