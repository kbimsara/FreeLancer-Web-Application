<?php
$page = "Order";
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
    <!-- Rating Stars -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    }

    //rating
    if (isset($_POST['rate'])) {
        $user_rate = $_POST['count'];
        $comment = $_POST['comment'];


        $query_search = "SELECT * FROM orders JOIN user ON orders.user_id=user.user_id JOIN rate ON orders.gig_id=rate.gig_id WHERE orders.order_id='$order_id';";
        $query_run = mysqli_query($Connector, $query_search);

        while ($row = mysqli_fetch_array($query_run)) {
            $user_id = $row['user_id'];
            $gig_id = $row['gig_id'];
            $rate_id = $row['rate_id'];

            //$query_search2 = "INSERT INTO `rate` (`rate_id`, `gig_id`, `user_id`, `sl_rate`, `user_rate`, `comment`, `date`) VALUES ('$rate_id', '$gig_id', '$user_id', '$sl_rate', '0', '','$date');";
            $query_ins = "UPDATE `rate` SET `user_rate` = '$user_rate',`comment` = '$comment' WHERE `rate`.`rate_id` = '$rate_id';";
            $query_runins = mysqli_query($Connector, $query_ins);

            $query_ins2 = "UPDATE `orders` SET `ord_cnfrm_sl` = 'complete' WHERE `orders`.`order_id` = '$order_id';";
            $query_runins2 = mysqli_query($Connector, $query_ins2);
            if ($query_runins and $query_runins2) {
                echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Rated',
                            text: 'Rated Successfull!',
                            type: 'success'
                        }).then(function() {
                            window.location = './order-Complete.php';
                        })</script>";
            } else {
                echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Rate unsuccessful!',
                        })</script>";
            }
        }
        //INSERT INTO `rate` (`rate_id`, `gig_id`, `user_id`, `sl_rate`, `user_rate`, `comment`, `date`, `time`) VALUES ('aa', 'aa', 'aa', 'aa', 'aa', 'aa', '2023-04-18', '12:16:58');
    }
    ?>

    <div class="container-fluid justify-content-center col-11 col-xl-4 mn" style="padding: 0px;margin-bottom: 10px;">

        <div class="container-fluid" style="padding: 0px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button> Rate client
            </span>

        </div>

        <form method="post">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="bg-white p-card col-12 m-1">
                        <h6>Star</h6>
                        <div class="row justify-content-center">
                            <div class="col-12 m-1" style="text-align: center;" onclick="result()">
                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:40px;cursor:pointer;" class="fa fa-star clr"></span>
                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="2one" style="font-size:40px;cursor:pointer;" class="fa fa-star clr"></span>
                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="3one" style="font-size:40px;cursor:pointer;" class="fa fa-star clr"></span>
                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="4one" style="font-size:40px;cursor:pointer;" class="fa fa-star clr"></span>
                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="5one" style="font-size:40px;cursor:pointer;" class="fa fa-star clr"></span>
                            </div>
                        </div>
                        <script>
                            var count;

                            function starmark(item) {
                                count = item.id[0];
                                sessionStorage.starRating = count;
                                var subid = item.id.substring(1);
                                for (var i = 0; i < 5; i++) {
                                    if (i < count) {
                                        document.getElementById((i + 1) + subid).style.color = "#1B57ED";
                                    } else {
                                        document.getElementById((i + 1) + subid).style.color = "yellow";
                                    }
                                }
                                return count;

                            }

                            function result() {
                                document.getElementById("count").value = count;
                            }
                        </script>
                        <input type="hidden" name="count" id="count">
                    </div>
                    <!---->
                    <div class="bg-white p-card col-12 m-1">
                        <h6>Comment</h6>
                        <div class="col-12 m-1">
                            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Type your comment Here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 justify-content-center" style="text-align: center;">
                        <button type="submit" class="btn btn-warning m-1" name="rate">Rate client</button>
                        <a href="./ongoin-5.php">
                        </a>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>


    <!-- Body/End -->

    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>