<?php
include_once 'include\header.php';
?>


<div class="content row d-flex justify-content-center my-5">
    <div class="col-8 shadow-lg p-5 rounded">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-2">Search Service Centers</h3>
            </div>
            <div class="col-md-2">
                <label for="inputCity" class="form-label text-right">Select a City</label>
            </div>
            <div class="col-md-4">
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
        </div>

        <hr>

        <div id="searchMap"></div>

    </div>
</div>

<script>
    var coordinates;
    // Default map coordinates 'Nugegoda' city
    var latitude = 6.86982434254328;
    var longitude = 79.88821407647505;

    var map = L.map('searchMap').setView([latitude, longitude], 15);

    // Add openstreet map layer
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    $.ajax({
        type: "GET",
        url: "get-service-center-data.php?cityId=" + $("#city").val(),
        success: function(data) {
            // Get Data from DB
            var serviceCenters = JSON.parse(data);

            // Service Center Data
            $.each(serviceCenters, function(key, value) {
                var marker = L.marker([value.latitude, value.longitude]).addTo(map);
                marker.bindPopup(`
                <b>` + value.serviceCenterName + `</b>
                <br><a class="text-center" href="service-center.php?id=` + value.serviceCenterId + `">View Service Center</a> 
                <br>Contact Details: ` + value.contactNo + `<br>` + value.address).openPopup();
            });

        }
    });

    $('select').on('change', function() {
        // Remove current map
        map.remove();

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
                map = L.map('searchMap').setView([latitude, longitude], 15);

                // Add openstreet map layer
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

            }
        });

        $.ajax({
            type: "GET",
            url: "get-service-center-data.php?cityId=" + $("#city").val(),
            success: function(data) {
                // Get Data from DB
                var serviceCenters = JSON.parse(data);

                // console.log(data);
                // Service Center Data
                $.each(serviceCenters, function(key, value) {
                    var marker = L.marker([value.latitude, value.longitude]).addTo(map);
                    marker.bindPopup(`
                <b>` + value.serviceCenterName + `</b>
                <br><a class="text-center" href="service-center.php?id=` + value.serviceCenterId + `">View Service Center</a> 
                <br>Contact Details: ` + value.contactNo + `<br>` + value.address).openPopup();
                });

            }
        });

    });

    // $('select').on('change', function() {


    // });
</script>

<?php include_once 'include\footer.php'; ?>