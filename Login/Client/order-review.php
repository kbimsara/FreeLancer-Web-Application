<?php
$page = "Order";
$btn = "pay";
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

<body style="background-color: #dadada;">
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <?php

    require_once './action/config.php';

    if (isset($_GET['gig_id'])) {

        $gig_id = $_GET['gig_id'];
        $pack = $_GET['pack'];

        $query_search = "SELECT * FROM gig WHERE gig_id ='$gig_id';";
        $query_run_search = mysqli_query($Connector, $query_search);

        while ($row = mysqli_fetch_array($query_run_search)) {
            $seller_id = $row['seller_id'];
            $p1_title = $row['p1_title'];
            $p2_title = $row['p2_title'];
            $p3_title = $row['p3_title'];
            if ($pack == $p1_title) {
                $p_title = $row['p1_title'];
                $package = $row['package_1'];
                $p_delivery = $row['p1_delivery'];
                $p_description = $row['p1_description'];
            } else if ($pack == $p2_title) {
                $p_title = $row['p2_title'];
                $package = $row['package_2'];
                $p_delivery = $row['p2_delivery'];
                $p_description = $row['p2_description'];
            } else if ($pack == $p3_title) {
                $p_title = $row['p3_title'];
                $package = $row['package_3'];
                $p_delivery = $row['p3_delivery'];
                $p_description = $row['p3_description'];
            }
        }

        $query_search2 = "SELECT service_charge FROM `admin`;";
        $query_run_search2 = mysqli_query($Connector, $query_search2);
        while ($row = mysqli_fetch_array($query_run_search2)) {
            $service_charge = $row['service_charge'];
        }

        $order_id = rand(1, 100) . "OD" . rand(1, 10000);
        //Estimate date count
        $year = date("Y");
        $month = date("m");
        $date = date("d");
        $day_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        if ($p_delivery <= ($day_count - $date)) {
            $est_date = $year . "-" . $month . "-" . $date + $p_delivery + 1;
        } else {
            if ($month == "12") {
                $i = -11;
                if (31 >= $date + $p_delivery) {
                    $est_date = $year + 1 . "-" . $month + $i . "-" . $p_delivery + $date;
                } else {
                    $est_date = $year + 1 . "-" . $month + $i . "-" . $p_delivery + $date - 31;
                }
            } else {
                $i = 1;
                $est_date = $year  . "-" . $month + $i . "-" . $date;
            }
        }
    }
    if (isset($_POST['pay'])) {

        $pk_short = $_POST['shorts'];

        $user_id = $_SESSION["user_id"];
        $tot=$package + $package * ($service_charge / 100);
        $today=date("Y-m-d");

        $query_insert = "INSERT INTO `orders` (`order_id`, `user_id`, `seller_id`, `gig_id`, `pk`, `pk_short`, `price`, `qt`, `est_time`, `od_date`, `ord_cnfrm_sl`, `tot`, `order_status`) VALUES ('$order_id', '$user_id', '$seller_id', '$gig_id', '$p_title', '$pk_short', '$package', '1', '$est_date', '$today', '', '$tot', '');";
        $query_run_insert = mysqli_query($Connector, $query_insert);
        if ($query_run_insert) {

            echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Order',
                    text: 'Your order will notified to seller!',
                    type: 'success'
                }).then(function() {
                    window.location = './order-ongoing.php';
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Order',
                    text: 'Try Again!',
                })</script>";
        }
    }

    ?>
    <form method="post">
        <div class="container-fluid justify-content-center" style="padding: 0px;">

            <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
                <span class="section-title">
                    <button class="btn btn-light back-btn" onclick="history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                        </svg>
                    </button>Order Review
                </span>
            </div>
            <center>

                <div class="row col-11" style="padding: 0px; margin: 0px;">
                    <div class="col-12 col-lg-6 col-xl-6" style="margin-bottom: 10px;">
                        <div class="pk-box2 bg-light txt-s" style="padding: 10px; margin: 0px;">
                            <div class="title">
                                <h5>Order Details</h5>
                            </div>
                            <div class="pk-type">
                                <h6 class="clr"><?php echo "$p_title"; ?></h6>
                            </div>
                            <div class="pk-fq">
                                <textarea class="form-control brd m-1" rows="5" id="shorts" name="shorts" placeholder="Type here what do you want"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="pk-box2 bg-light" style="padding: 10px; margin: 0px;">
                            <div class="title">
                                <h5>Order Summary</h5>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>Order Number</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span class="clr"><?php echo "$order_id"; ?></span>
                                </div>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>Subtotale</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span>LKR <?php echo "$package"; ?></span>
                                </div>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>Quantity</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span class="clr">01</span>
                                </div>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>Service fee(<?php echo "$service_charge"; ?>%)</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span>Service fee <?php echo $package * ($service_charge / 100); ?></span>
                                </div>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>Promo Code</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span class="clr">Enter Promo code here</span>
                                </div>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>Total</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span>LKR <?php echo $package + $package * ($service_charge / 100); ?></span>
                                </div>
                            </div>
                            <div class="row col-12 txt-s" style="padding: 0px; margin: 0px;">
                                <div class="col-6" style="text-align: left;">
                                    <span>est Date</span>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <span><?php echo "$est_date"; ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>


        </div>
        <!-- Sticky bar -->
        <?php
        require_once './Page-ex/menu-bar.php';
        ?>
        <!-- Body/End -->
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>