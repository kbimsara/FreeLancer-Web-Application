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
    <!-- Custom -->
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/script.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body style="background-color: #dadada; ">
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>

    <div class="container-fluid col-12 col-xl-10 justify-content-center">

        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title clr">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
                Post a Request
            </span>

        </div>
        <?php

        require_once './action/config.php';
        //get service charge
        $sql_admin = "SELECT service_charge FROM `admin`;";
        $resultadmn = mysqli_query($Connector, $sql_admin);
        while ($row = mysqli_fetch_array($resultadmn)) {
            $svchr = $row['service_charge'];
        }

        if (isset($_POST['post_rq'])) {


            $u_id = $_SESSION["user_id"];
            $ct = $_POST["catagery"];
            $sv = $_POST["service"];
            $about = $_POST["aboutjb"];
            $price = $_POST["stprice"];
            $time = date("Y/m/d");
            $du = $_POST["duration"];
            $tot = $price + $price * ($svchr / 100);

            $nn = rand(1, 10);
            $id = $nn . "RQ" . rand();

            //INSERT INTO `request_post` (`rq_id`, `c_id`, `user_id`, `description`, `time`, `subtot`, `tot`) VALUES ('asdvSD', '1', '2304U28365', 'ASDFVGASFDV', 'dfDF', 'dfSDF', 'dfDF');
            $sql = "INSERT INTO `request_post` VALUES ('$id', '$ct', '$sv','$u_id', '$about', '$time', '$price', '$tot')";
            $result = mysqli_query($Connector, $sql);

            if ($result) {
                echo "<script>Swal.fire({
                                icon: 'success',
                                title: 'Post',
                                text: 'Request Posted!',
                                type: 'success'
                            }).then(function() {
                                window.location = './home.php';
                            })</script>";
            } else {
                echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Post',
                                text: 'Retry!',
                            })</script>";
            }
        }
        ?>
        <form method="post">

            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row justify-content-center brd bg-white m-1">
                                <div class="col-12">
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-12">
                                            <h5>Post a Request</h5>
                                        </div>
                                        <div class="col-12">
                                            <p class="txt-s">Choose the category most suitable for your Gig.</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-6 col-12" style="text-align: center;">
                                                    <div class="btn-group">
                                                        <select id="catagery" name="catagery" class="form-control brd clr dynamic-drop-down" required onchange="FetchCatagery(this.value)">
                                                            <option selected>Select Catagery..</option>
                                                            <?php
                                                            require_once './action/config.php';
                                                            $sqlcc = "SELECT * FROM `category`;";
                                                            $resultcc = mysqli_query($Connector, $sqlcc);
                                                            while ($row = mysqli_fetch_array($resultcc)) {
                                                                $c_id = $row['c_id'];
                                                                $c_name = $row['c_name'];
                                                            ?>
                                                                <option value="<?php echo "$c_id"; ?>"><?php echo "$c_name"; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-12" style="text-align: center;">
                                                    <div class="btn-group">
                                                        <select id="service" name="service" class="form-control brd clr dynamic-drop-down" required>
                                                            <option selected>Select Service..</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row bg-white brd m-1" style="padding: 5px;">
                                <div class="col-12">
                                    <h5>About the job</h5>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control brd" rows="4" placeholder="Type Here" id="aboutjb" name="aboutjb" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row bg-white brd m-1" style="padding: 10px;">
                                <div class="col-12">
                                    <h5>Set a Price</h5>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6 style="margin-top: 10px;">subtotal</h6>
                                        </div>
                                        <div class="col-7" style="display: inline-flex;">
                                            <h6 style="margin-top: 10px; margin-right: 5px;">LKR</h6>
                                            <input type="text" class="form-control" placeholder="1000.00" id="stprice" name="stprice" required onblur="cal()">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6 style="margin-top: 10px;">Delevary Time</h6>
                                        </div>
                                        <div class="col-7" style="text-align: right;">
                                            <input type="number" class="form-control" placeholder="days" id="duration" name="duration" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6 style="margin-top: 10px;">Total</h6>
                                        </div>
                                        <div class="col-7" style="text-align: right;">
                                            <h5 style="margin-top: 5px;" id="outTot" name="outTot">LKR 0</h5>
                                            <input type="hidden" name="sc_fee" id="sc_fee" value="<?php echo "$svchr"; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12" style="padding: 5px; margin: 10px;">
                                    <center>
                                        <button type="submit" class=" btn btn-primary brd" name="post_rq"><span style="margin: 10px;">Post</span></button>
                                    </center>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>

    <!-- Dynamic drop-down script -->
    <script type="text/javascript">
        function FetchCatagery(id) {
            $('#service').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    catagery_id: id
                },
                success: function(data) {
                    $('#service').html(data);
                }

            })
        }
    </script>

    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>
    <!-- Body/End -->

</body>

</html>