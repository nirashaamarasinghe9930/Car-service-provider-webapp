<?php include_once 'include\header.php';
include_once 'include\validation.php'; ?>
<div class="content row d-flex justify-content-center gradient-custom-2">
    <div class="row my-2">
        <div class="col-12 my-2 text-center">
            <h2>Advertisments</h2>
        </div>
        <?php
        $sql = "SELECT * FROM advertisements";
        $result = mysqli_query($dbcon, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-3  my-2">
                    <div class="card" style="width: 19rem; height: 20rem;">
                        <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="...">
                        <div class="card-body" style="width: 21rem; height: 29rem;">
                            <h6 class="card-title"><?php echo $row['title']; ?></h6>
                            <p><?php echo $row['description'] . ' ' .'   Tel:-' .$row['contact_no']; ?></p>

                        </div>
                    </div>
                </div>
        <?php }
        } ?>


    </div>
</div>
<script src="https://wrench.com/css/wrench.min.css?v=de8a68f1c438059bda9d959e7cf434c7"></script>



<?php include_once 'include\footer.php'; ?>