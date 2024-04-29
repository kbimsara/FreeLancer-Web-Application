<?php
$page = "Order";
$btn = "cancel order";
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

<body style="background-color: #dadada;">
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <div class="container-fluid col-12 col-sm-12 col-md-11 col-lg-10 col-xl-10 justify-content-center" style="padding: 0px;">
        <?php
        require_once './action/config.php';

        $seller_id = $_SESSION["seller_id"];

        if (isset($_GET['order_id'])) {

            $order_id = $_GET['order_id'];


            $query_search = "SELECT * FROM orders JOIN gig ON orders.gig_id=gig.gig_id WHERE orders.order_id='$order_id';";
            $query_run_search = mysqli_query($Connector, $query_search);

            while ($row = mysqli_fetch_array($query_run_search)) {
                $gig_id = $row['gig_id'];
                $pk = $row['pk'];
                $pk_short = $row['pk_short'];
                $ord_cnfrm_sl = $row['ord_cnfrm_sl'];
            }

            $query_search2 = "SELECT * FROM gig JOIN seller on gig.seller_id=seller.seller_id JOIN user on seller.user_id=user.user_id WHERE gig.gig_id='$gig_id';";
            $query_run_search2 = mysqli_query($Connector, $query_search2);

            while ($row = mysqli_fetch_array($query_run_search2)) {

                $f_name = $row['f_name'];
                $l_name = $row['l_name'];
                $s_id = $row['s_id'];
                $description = $row['description'];
                $p1_title = $row['p1_title'];
                $p2_title = $row['p2_title'];
                $p3_title = $row['p3_title'];
                $package_1 = $row['package_1'];
                $package_2 = $row['package_2'];
                $package_3 = $row['package_3'];
                $p1_delivery = $row['p1_delivery'];
                $p2_delivery = $row['p2_delivery'];
                $p3_delivery = $row['p3_delivery'];
                $p1_description = $row['p1_description'];
                $p2_description = $row['p2_description'];
                $p3_description = $row['p3_description'];
                $seller_id = $row['seller_id'];
                $user_img = $row['user_img'];
                $img = $row['img'];
                $img2 = $row['img2'];
                $img3 = $row['img3'];
                $p1_description = substr($p1_description, 0, 110);
                $p2_description = substr($p2_description, 0, 110);
                $p3_description = substr($p3_description, 0, 110);
                $pp1 = "";
                $pp2 = "";
                $pp3 = "";
                if ($pk == $p1_title) {
                    $pp1 = "show";
                } else if ($pk == $p2_title) {
                    $pp2 = "show";
                } else if ($pk == $p3_title) {
                    $pp3 = "show";
                }
            }

            $query_search2 = "SELECT * FROM `service` WHERE s_id='$s_id';";
            $query_run_search2 = mysqli_query($Connector, $query_search2);
            while ($row = mysqli_fetch_array($query_run_search2)) {
                $s_name = $row['s_name'];
            }
            $query_searchrt = "SELECT gig.seller_id,rate.user_rate,rate.user_id FROM rate JOIN gig ON rate.gig_id=gig.gig_id WHERE gig.seller_id='$seller_id';";
            $query_searchrt_run = mysqli_query($Connector, $query_searchrt);

            $i = 0;
            $rt = 0;
            while ($row = mysqli_fetch_array($query_searchrt_run)) {
                $rate = $row['user_rate'];
                $i++;
                $rt = $rt + $rate;
            }
            if ($i < 1) {
                $rt = 0;
            } else {
                $rt = $rt / $i;
            }
        }
        ?>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../Freelancer/img/<?php echo "$img"; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../Freelancer/img/<?php echo "$img2"; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../Freelancer/img/<?php echo "$img3"; ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
        <div class="container-fluid" style="padding: 10px;">
            <div class="row m-1">

                <div class="l-side col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 bg-white p-card" style="margin-bottom: 10px;">
                    <div class="c-top col-12">
                        <div class="top container-fluid" style="padding-left: 0px;">
                            <div class="user-img" style="padding-left: 0px;">
                                <img src="./user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                            </div>
                            <div class="user-name" style="padding-left: 0px;">
                                <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                <span class="s-count"><?php echo "$s_name"; ?></span>
                            </div>
                        </div>
                        <div class="float-right" style="display: inline-flex; padding: 0px; margin: 0px;">
                            <div class=" bg-br text-light">
                                <span class="star-txt"><?php echo "$rt"; ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <div class="bg-br text-light">
                                <span class="star-txt"> Starting LKR <?php echo "$package_1"; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="c-txt-big">
                        <p class="card-text"><?php echo "$pk_short"; ?></p>
                    </div>
                </div>
                <div class="r-side col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="row">
                        <div class="col-12 packeger">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left pack-btn" disabled type="button" select-post-bide.phpdata-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <?php echo "$p1_title"; ?>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse<?php echo " $pp1"; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo "$p1_description"; ?>
                                            <center>
                                                <a href="./order-review.php">
                                                    <button type="button" class="btn btn-primary btn-sm" disabled>Continue (LKR <?php echo "$package_1"; ?>)</button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed pack-btn" disabled select-post-bide.phptype="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <?php echo "$p2_title"; ?>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse<?php echo " $pp2"; ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo "$p2_description"; ?>
                                            <center>
                                                <a href="./order-review.php">
                                                    <button type="button" class="btn btn-primary btn-sm" disabled>Continue (LKR <?php echo "$package_2"; ?>)</button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed pack-btn" disabled select-post-bide.phptype="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <?php echo "$p3_title"; ?>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse<?php echo " $pp3"; ?>" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo "$p3_description"; ?>
                                            <center>
                                                <a href="./order-review.php">
                                                    <button type="button" class="btn btn-primary btn-sm" disabled>Continue (LKR <?php echo "$package_3"; ?>)</button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="c-user-card col-11 p-card bg-white" style="padding: 0px; margin: 10px;">
                            <div class="c-top col-12">
                                <div class="top container-fluid" style="padding-left: 0px;">
                                    <div class="user-img" style="padding-left: 0px;">
                                        <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                    </div>
                                    <div class="user-name" style="padding-left: 0px;">
                                        <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                        <span class="s-count"><?php echo "$s_name"; ?></span>
                                    </div>
                                </div>
                                <div class="float-right" style="display: inline-flex; padding: 0px; margin: 0px;">
                                    <a href="./c-Freelancer-Profile.php?seller_id=<?php echo "$seller_id"; ?>">
                                        <div class=" bg-br text-light">
                                            <span class="star-txt">View Profile</span>
                                        </div>
                                    </a>
                                    <div class="bg-br text-light">
                                        <span class="star-txt">Contact Me</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>
    <!-- Body/End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>