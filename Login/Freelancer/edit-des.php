<!DOCTYPE html>
<html lang="en">
<?php
require_once './action/action-session.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title bar -->
    <link rel="icon" type="image/png" href="./assets/logo/titlebar_logo.png" />

    <!-- Bootstrap -->
    <link href="./assets/bootstrap-4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="./assets/bootstrap-4.6.2/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <title>Home</title>
    <!-- msg box -->
    <script src="./assets/sweetalert2.all.min.js"></script>
    <!-- Custom css -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- Custom js -->
    <script src="./action/validation.js" type="text/javascript"></script>
</head>

<body>
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <div class="container-fluid col-xl-6 col-12 justify-content-center">
        <!-- Back -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>
        </div>
        <?php
        require_once './action/config.php';

        $seller_id = $_SESSION["seller_id"];

        $query_search = "SELECT acc_description FROM seller WHERE seller_id='$seller_id';";
        $query_run = mysqli_query($Connector, $query_search);

        while ($row = mysqli_fetch_array($query_run)) {
            $ds = $row['acc_description'];
        }


        if (isset($_POST['update_seller'])) {

            $des = $_POST["des"];

            if ($des != "") {
                $query_update = "UPDATE `seller` SET `acc_description` = '$des' WHERE seller_id = '$seller_id';";
                $query_run = mysqli_query($Connector, $query_update);

                if ($query_run) {
                    echo "<script>Swal.fire({
                                    icon: 'success',
                                    title: 'Save Changes',
                                    text: 'Seller Account Description Set!',
                                    type: 'success'
                                }).then(function() {
                                    window.location = './c-Freelancer-Profile.php';
                                })</script>";
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'Unsuccessful',
                                    text: 'Seller Account Update unsuccessful!',
                                })</script>";
                }
            }else{
                echo "<script>Swal.fire({
                                icon: 'warning',
                                title: 'Empty',
                                text: 'You cannot update empty field',
                            })</script>";
                        }
        }
        ?>

        <form method="post" onsubmit="userReg()" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="row">
                        <div class="col-12 justify-content-center">
                            <h5 class="clr">Enter Short description Here</h5>
                            <p class="txt-s">Get all the information you need from buyers to get started Add questions to
                                help buyers provide you with exactly what you need to start working on their order.</p>
                            <textarea class="form-control brd m-1" rows="5" id="des" name="des"><?php echo "$ds"; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-10 justify-content-center" style="text-align: center;">
                    <button type="submit" class="btn btn-primary m-2 brd" name="update_seller">Save</button>
                </div>

            </div>
        </form>


    </div>

    </div>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</html>