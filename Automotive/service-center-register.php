<?php
include_once 'include\header.php';
?>


<div class="content row d-flex justify-content-center my-5">
    <div class="col-6 shadow-lg p-5 rounded">
        <h3 class="mb-2">Service Center Register</h3>
        <hr>

        <form class="row g-3">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Service Center Name</label>
                <input type="text" class="form-control" id="serviceCenterName" required>
            </div>

            <div class="col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                <textarea class="form-control" id="details" rows="3"></textarea>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label for="openTime" class="form-label">Opening Time</label>
                    <input type="time" class="form-control" id="openTime" required>
                </div>

                <div class="col-4">
                    <label for="closeTime" class="form-label">Closing Time</label>
                    <input type="time" class="form-control" id="closeTime" required>
                </div>
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Contact No</label>
                <input type="text" class="form-control" id="contactNo" required>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <select id="city" class="form-select" required>
                    <?php
                    $sql = "SELECT * FROM cities";
                    $result = mysqli_query($dbcon, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['city']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>

            <h5>Location Marker</h5>

            <div id="map"></div>

            <h5>Contact Person Details</h5>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" required>
            </div>


            <div class="col-12">
                <button type="button" id="register" class="btn btn-primary">Register</button>
            </div>
        </form>

    </div>
</div>

<script>
    var coordinates;
    // Default map coordinates 'Nugegoda' city
    var latitude = 6.86982434254328;
    var longitude = 79.88821407647505;

    var map = L.map('map').setView([latitude, longitude], 14);

    var theMarker = {};
    var markerCoordinates;
    var markerLat;
    var markerLng;


    // Add openstreet map layer
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    $('select').on('change', function() {
        // Remove current map
        map.remove();
        // Get City Coordinates from DB
        $.ajax({
            type: "GET",
            url: "get-city-data.php?cityId=" + $("#city").val(),
            success: function(data) {
                // Parse Data to JavaScript Object
                coordinates = JSON.parse(data);

                // String data convert to numbers
                latitude = Number(coordinates.latitude);
                longitude = Number(coordinates.longitude);

                // Set new map
                map = L.map('map').setView([latitude, longitude], 14);

                // Add openstreet map layer
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);


                // location coordinates
                map.on('click', onMapClick);

            }
        });

    });

    // Location marker function
    function onMapClick(e) {
        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        // Add marker to the map
        theMarker = L.marker(e.latlng).addTo(map);

        // Get marker coordinates
        markerLat = e.latlng.lat;
        markerLng = e.latlng.lng;
    }



    // location coordinates
    map.on('click', onMapClick);


    $("#register").click(function(event) {
        // Prevent default event
        event.preventDefault();

        // Form data
        var data = {
            serviceCenterName: $("#serviceCenterName").val(),
            details: $("#details").val(),
            openTime: $("#openTime").val(),
            closeTime: $("#closeTime").val(),
            address: $("#address").val(),
            contactNo: $("#contactNo").val(),
            city: $("#city").val(),
            latitude: markerLat,
            longitude: markerLng,
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            email: $("#email").val(),
            password: $("#password").val()
        };

        // Create new service station
        $.ajax({
            type: "POST",
            url: "add-service-center.php",
            data: data,
            success: function(data) {
                alert(data);
            }
        });
    });
</script>

<?php include_once 'include\footer.php'; ?>