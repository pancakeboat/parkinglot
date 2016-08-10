
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


<style>
    .row{
        margin-bottom:10px;
    }

    input{
        margin-bottom:10px;
    }
</style>


<section>
    <div class="row">
        <div class="col-lg-12">
            <h1>Get Lot Data</h1>

            <div class="col-lg-6 col-md-12-down">
                Lot ID <input id="sec1_lotID" />
            </div>

            <div class="col-lg-12">
                <button id="getLot" title="get lot data" href="#" class="btn btn-success btn-circle">Get Lot</button>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <h1>Add Lot</h1>

            <div class="col-lg-3 col-md-6-down">Name:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec2_name" /></div>

            <div class="col-lg-3 col-md-6-down">City:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec2_city" /></div>

            <div class="col-lg-3 col-md-6-down">Region:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec2_region" /></div>

            <div class="col-lg-3 col-md-6-down">Country:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec2_country" /></div>

            <div class="col-lg-3 col-md-6-down">Capacity:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec2_capacity" /></div>

            <div class="col-lg-12">
                <button  id="addLot" title="Click to Add a Lot" href="#" class="btn btn-success btn-circle">Add Lot</button>
            </div>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-lg-12">
            <h1>Update Space</h1>

            <div class="col-lg-3 col-md-6-down">Lot ID:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec3_lotID" /></div>

            <div class="col-lg-3 col-md-6-down">SpaceID:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec3_spaceID" /></div>

            <div class="col-lg-3 col-md-6-down">Available:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec3_available" /></div>

            <div class="col-lg-3 col-md-6-down">Vehicle Type:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec3_vehicleType" /></div>

            <div class="col-lg-12">
                <button  id="updateSpace" title="Click to Update a Parking Space" href="#" class="btn btn-success btn-circle">Update Space</button>
            </div>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-lg-12">
            <h1>Update User</h1>

            <div class="col-lg-3 col-md-6-down">User ID:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec4_userID" /></div>

            <div class="col-lg-3 col-md-6-down">First Name:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec4_fname" /></div>

            <div class="col-lg-3 col-md-6-down">Last Name:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec4_lname" /></div>

            <div class="col-lg-3 col-md-6-down">Phone Number:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec4_phoneNumber" /></div>

            <div class="col-lg-3 col-md-6-down">Usage Frequency:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec4_usageFrequency" /></div>

            <div class="col-lg-3 col-md-6-down">Total Payment:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec4_totalPayment" /></div>

            <div class="col-lg-12">
                <button  id="updateUser" title="Click to update a user" href="#" class="btn btn-success btn-circle">Update User</button>            </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <h1>Update Vehicle</h1>

            <div class="col-lg-3 col-md-6-down">Vehicle ID:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec5_vehicleID" /></div>

            <div class="col-lg-3 col-md-6-down">User ID:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec5_userID" /></div>

            <div class="col-lg-3 col-md-6-down">Make:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec5_make" /></div>

            <div class="col-lg-3 col-md-6-down">Model:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec5_model" /></div>

            <div class="col-lg-3 col-md-6-down">Year:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec5_year" /></div>

            <div class="col-lg-3 col-md-6-down">Plate:</div>
            <div class="col-lg-3 col-md-6-down"><input id="sec5_plate" /></div>

            <div class="col-lg-12">
                <button  id="updateVehicle" title="Click to update a vehicle" href="#" class="btn btn-success btn-circle">Update Vehicle</button>
            </div>
        </div>
    </div>
    <hr>


        <div class="row">
            <div class="col-lg-12">
                <h1>Update Vehicle</h1>

                <div class="col-lg-3 col-md-6-down">Type ID:</div>
                <div class="col-lg-3 col-md-6-down"><input id="sec6_typeID" /></div>

                <div class="col-lg-3 col-md-6-down">Name:</div>
                <div class="col-lg-3 col-md-6-down"><input id="sec6_name" /></div>

                <div class="col-lg-3 col-md-6-down">Allotment:</div>
                <div class="col-lg-3 col-md-6-down"><input id="sec6_allotment" /></div>

                <div class="col-lg-12">
                    <button  id="updateVehicleType" title="Click to update a vehicle type" href="#" class="btn btn-success btn-circle">Update Vehicle Type</button>
                </div>
            </div>
            <hr>
        </div>
</section>
    <br>


    <script>


        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#addLot').click(function(e){
                e.preventDefault();

                var name = $("#sec2_name").val();
                var city = $("#sec2_city").val();
                var region = $("#sec2_region").val();
                var country = $("#sec2_country").val();
                var totalspaces = $("#sec2_capacity").val();

                $.post("/addLot", {name:name,city:city,region:region,country:country,totalspaces:totalspaces}, function(data) {
                    if(data.success != false){
                        alert('lot added');
                    }
                    else{
                        alert('error adding lot');
                    }
                }, 'json');
            });

            $('#updateSpace').click(function(e){
                e.preventDefault();

                var lotID = $("#sec3_lotID").val();
                var spaceID = $("#sec3_spaceID").val();
                var available = $("#sec3_available").val();
                var vehicleType = $("#sec3_vehicleType").val();

                $.post("/updateSpace", {lotID:lotID,spaceID:spaceID,available:available,vehicleType:vehicleType}, function(data) {
                    if(data.success != false){
                        alert('Space Updated');
                    }
                    else{
                        alert('Error Updating Space');
                    }
                }, 'json');
            });

            $('#updateUser').click(function(e){
                e.preventDefault();

                var userID = $("#sec4_userID").val();
                var firstname = $("#sec4_fname").val();
                var lastname = $("#sec4_lname").val();
                var usageFrequency = $("#sec4_usageFrequency").val();
                var totalPayment = $("#sec4_totalPayment").val();
                var phoneNumber = $("#sec4_phoneNumber").val();

                $.post("/updateUser", {userID:userID,firstName:firstname,lastName:lastname,phoneNumber:phoneNumber,usageFrequency:usageFrequency,totalPayment:totalPayment}, function(data) {
                    if(data.success != false){
                        alert('User Updated');
                    }
                    else{
                        alert('Error Updating User');
                    }
                }, 'json');
            });

            $('#updateVehicle').click(function(e){
                e.preventDefault();

                var vehicleID = $("#sec5_vehicleID").val();
                var userID = $("#sec5_userID").val();
                var make = $("#sec5_make").val();
                var model = $("#sec5_model").val();
                var year = $("#sec5_year").val();
                var plate = $("#sec5_plate").val();

                $.post("/updateVehicle", {vehicleID:vehicleID,userID:userID,make:make,model:model,year:year,plate:plate}, function(data) {
                    if(data.success != false){
                        alert('Vehicle Updated');
                    }
                    else{
                        alert('Error Updating Vehicle');
                    }
                }, 'json');
            });

            $('#updateVehicleType').click(function(e){
                e.preventDefault();

                var typeID = $("#sec6_typeID").val();
                var name = $("#sec6_name").val();
                var allotment = $("#sec6_allotment").val();

                $.post("/updateVehicleType", {typeID:typeID,name:name,allotment:allotment}, function(data) {
                    if(data.success != false){
                        alert('Vehicle Type Updated');
                    }
                    else{
                        alert('Error Updating Vehicle Type');
                    }
                }, 'json');
            });

            $('#getLot').click(function(e){
                e.preventDefault();

                var lotID = $("#sec1_lotID").val();

                window.location.href = "/getLot?lotID="+lotID;
            });

        });

    </script>
