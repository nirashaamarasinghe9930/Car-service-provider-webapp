<?php include_once 'include\header.php'; ?>

<video cotrols width="1350" hight="800" service-center="" autoplay="" id="myVideo" loop="" muted="" oncanplay="this.play()" onloadedmetadata="this.muted = true" preload="auto">
    <source service-center="" src="images\video3.mp4" type="video/mp4">
</video>
<div class="d-flex align-items-center gradient-custom-2">
    <img src="images/maintance-1.jpg" class="d-block w-50" alt="">
    <div class="text-white">
        <h1 class="mb-4">Luxury Car repair Service Provider</h1>
        <p class="large mb-0">Choose the Luxury car repair service center near you </p>
        <ul>
            <li>Looking for a car service center near you
                for repair or maintenance?
            </li>
            <li>Automotive brings the shop to you.</li>
        </ul>
    </div>
</div>
<div class="page-stripe-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="heading-1">Services We Perform</h2>
            </div>
        </div>
        <div class="row text-large margin-bottom-regular">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <p class="text-blue text-large">Alternator Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Battery Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Brake Caliper Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Brake Pad Replacement</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <p class="text-blue text-large">Diagnostic Service</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Emissions Failure Repair</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Ignition Coil Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Oil and Filter Change</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <p class="text-blue text-large">Radiator Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Serpentine Belt Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Spark Plugs Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Starter Replacement</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <p class="text-blue text-large">Thermostat Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Timing Belt Replacement</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Transmission Fluid Change</p>
                        </div>
                        <div>
                            <p class="text-blue text-large">Water Pump Replacement</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-12 my-3 text-center"><h2>Advertisments</h2></div>
                <?php
                $sql = "SELECT * FROM advertisements";
                $result = mysqli_query($dbcon, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-3">
                            <div class="card" style="width: 15rem;">
                                <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                    <p>Contact Person : <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                                    <a href="#" class="btn btn-primary btn-sm px-4">View</a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>


            </div>
        </div>
    </div>
    <script src="https://wrench.com/css/wrench.min.css?v=de8a68f1c438059bda9d959e7cf434c7"></script>



    <?php include_once 'include\footer.php'; ?>