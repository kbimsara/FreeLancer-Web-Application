<?php
$page = "Home";
$btn = "";
require_once './action/action-session.php';
?>

<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    require_once './action/config.php';

    if (isset($_GET['rqid'])) {
        $rq_id = $_GET['rqid'];
    }
    ?>
    <div class="container-fluid mn" style="padding: 0px; margin: 0px;">
        <!-- Catagory -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
            </span>
        </div>
        <div class="container-fluid justify-content-center" style="margin: 0px;">
            <?php
            if (isset($_POST['bid'])) {
                $des = $_POST['des'];
                $bid_id = "bid" . rand();
                $seller_id = $_SESSION["seller_id"];
                //INSERT INTO `bid` (`bid_id`, `rq_id`, `seller_id`, `description`) VALUES ('bid', 'asdvSD', 'SL12345', 'DFADFSDFG');
                $SQL = "INSERT INTO `bid` (`bid_id`, `rq_id`, `seller_id`, `description`) VALUES ('$bid_id', '$rq_id', '$seller_id', '$des');";
                $query_run = mysqli_query($Connector, $SQL);

                if ($query_run) {
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Bid',
                        text: 'Your Bid Successful!',
                        type: 'success'
                    }).then(function() {
                        window.location = './select-post.php?pid=$rq_id';
                    })</script>";
                } else {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Bid',
                        text: 'Your Bid unsuccessful!',
                    })</script>";
                }
            }

            ?>

            <form method="post">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-11">
                        <div class="row justify-content-center">
                            <div class="col-12 clr">
                                <h4>Bidding Description</h4>
                            </div>
                            <div class="col-12">
                                <p class="txt-xs">Briefly Describe Your Gig and service</p>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control brd col-12 m-2" rows="4" name="des" id="des" required></textarea>
                            </div>
                            <div class="col-12 clr" style="text-align: center;">
                                <button type="submit" class="btn btn-primary m-1 brd" name="bid">Done</button>
                                <a href="./select-post-bide.php">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>
    </div>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</html>