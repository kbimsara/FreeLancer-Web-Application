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
    <!-- Custom css -->
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <div class="container-fluid mn" style="padding: 0px; margin: 0px;">
        <!-- Catagory -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>
        </div>
        <div class="row justify-content-center" style="margin: 0px;">

            <?php
            require_once './action/config.php';
            $seller_id = $_SESSION["seller_id"];

            $query_search = "SELECT * FROM `request_post` JOIN `bid` ON request_post.rq_id=bid.rq_id WHERE bid.seller_id='$seller_id';";
            $query_run = mysqli_query($Connector, $query_search);

            while ($row = mysqli_fetch_array($query_run)) {
                $rq_id = $row['rq_id'];
                $c_id = $row['c_id'];
                $user_id = $row['user_id'];
                $des = $row['description'];
                $time = $row['time'];
                $subtot = $row['subtot'];
                $tot = $row['tot'];
                $des = substr($des, 0, 150);

                $query_search2 = "SELECT user_id,sl_rate FROM `rate` WHERE user_id='$user_id';";
                $query_run2 = mysqli_query($Connector, $query_search2);
                $i = 0;
                $rt = 0;
                while ($row = mysqli_fetch_array($query_run2)) {
                    $rate = $row['sl_rate'];
                    $i++;
                    $rt = $rt + $rate;
                }
                if ($i != 0) {
                    $rt = $rt / $i;
                } else {
                    $rt = 5;
                }

                $query_search3 = "SELECT user_id,f_name,l_name FROM `user`WHERE user_id='$user_id';";
                $query_run3 = mysqli_query($Connector, $query_search3);

                while ($row = mysqli_fetch_array($query_run3)) {
                    $f_name = $row['f_name'];
                    $l_name = $row['l_name'];
                }

                $query_search4 = "SELECT COUNT(rq_id) AS bid_count FROM `bid` WHERE rq_id='$rq_id';";
                $query_run4 = mysqli_query($Connector, $query_search4);

                while ($row = mysqli_fetch_array($query_run4)) {
                    $bid_count = $row['bid_count'];
                }
            ?>
                <div class="c-card scroll-item col-xl-3 col-11">
                    <a href="./select-post.php?pid=<?php echo $rq_id; ?>">
                        <div class="card-body" style="margin: 2px; padding: 10px;">
                            <div class="title-bar" style="margin: 0px;">
                                <div class="user-img">
                                    <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                </div>
                                <div class="user-name">
                                    <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                </div>
                            </div>
                            <div class="star text-light float-right" style="margin-top: 5px;">
                                <span class="star-txt"><?php echo $rt; ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <div class="description">
                                <p class="card-txt"><?php echo $des; ?></p>
                            </div>
                            <div>
                                <span class="txt-s"><?php echo $bid_count; ?> bids sent</span>
                                <div class="price text-light float-right">
                                    <span class="star-txt">LKR <?php echo $tot; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
                $bid_count = 0;
            }
            ?>

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