<?php
$page = "Home";
$btn = "Post a Request";
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
        <?php

        require_once './action/config.php';

        if (isset($_GET['sid'])) {

            $id = $_GET['sid'];
            $seller_id = $_SESSION["seller_id"];

            $query_search = "SELECT * from `service` WHERE s_id ='$id';";
            $query_run_search = mysqli_query($Connector, $query_search);

            while ($row = mysqli_fetch_array($query_run_search)) {
                $s_id = $row['s_id'];
                $s_name = $row['s_name'];

        ?>
        <?php
            }
        }

        ?>
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button><?php echo $s_name; ?>
            </span>
        </div>
        <!-- Recent View -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Top Rated Job Posts</span>
            <div class="section-btn">
                <?php
                require_once './action/config.php';

                $query_ctr_search = "SELECT * FROM category JOIN `service` ON category.c_id=`service`.c_id WHERE service.s_id='$s_id';";
                $query_ctr_run = mysqli_query($Connector, $query_ctr_search);
                while ($row = mysqli_fetch_array($query_ctr_run)) {
                    $s_id = $row['s_id'];
                    $query_search = "SELECT * FROM gig JOIN seller ON gig.seller_id=seller.seller_id JOIN user ON seller.user_id=user.user_id WHERE gig.s_id='$s_id' AND NOT gig.seller_id='$seller_id';";
                    $query_run = mysqli_query($Connector, $query_search);
                    while ($row = mysqli_fetch_array($query_run)) {
                        $gig_id = $row['gig_id'];
                        $description = $row['description'];
                        $package_1 = $row['package_1'];
                        $s_id = $row['s_id'];
                        $seller_id = $row['seller_id'];
                        $img = $row['img'];
                        $user_id = $row['user_id'];
                        $f_name = $row['f_name'];
                        $l_name = $row['l_name'];
                        $user_img = $row['user_img'];
                        $description = substr($description, 0, 150);

                        $query_search2 = "SELECT gig_id,user_rate FROM `rate` WHERE gig_id='$gig_id';";
                        $query_run2 = mysqli_query($Connector, $query_search2);
                        $i = 0;
                        $rt = 0;
                        while ($row = mysqli_fetch_array($query_run2)) {
                            $rate = $row['user_rate'];
                            if ($rate != "") {
                                $i++;
                                $rt = $rt + $rate;
                            }
                        }
                        if ($i > 0) {
                            $gsq = ($rt) / ($i);
                        } else {
                            $gsq = "0";
                        }
                        //$gsq=($rt)/($i);
                        $query_search3 = "SELECT s_id,s_name FROM `service` WHERE s_id='$s_id';";
                        $query_run3 = mysqli_query($Connector, $query_search3);
                        while ($row = mysqli_fetch_array($query_run3)) {
                            $s_name = $row['s_name'];
                        }
                ?>
                        <a href="./Freelancer-gig-view.php?gigid=<?php echo "$gig_id"; ?>">
                            <div class="c-card scroll-item">
                                <img src="../Freelancer/img/<?php echo "$img"; ?>" class="card-img-top card-img" alt="Image">
                                <div class="card-body" style="margin: 2px; padding: 5px;">
                                    <div class="title-bar" style="margin: 0px;">
                                        <div class="user-img">
                                            <img src="./user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                                        </div>
                                        <div class="user-name">
                                            <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                            <span class="s-title"><?php echo "$s_name"; ?></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="card-txt"><?php echo "$description"; ?> ...</p>
                                    </div>
                                    <div class="btn-group">
                                        <div class="star text-light">
                                            <span class="star-txt"><?php echo "$gsq"; ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </div>
                                        <div class="mid-size">
                                        </div>
                                        <div class="price text-light">
                                            <span class="star-txt">LKR <?php echo "$package_1"; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php
                    }
                }


                ?>
            </div>
        </div>
        <!-- Seller Dp -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Top Sellers</span>
            <div class="section-btn" style="padding-left: 20px;">
                <!-- Seller Dp-card -->
                <?php
                require_once './action/config.php';

                $query_ctr_search = "SELECT * FROM category JOIN `service` ON category.c_id=`service`.c_id WHERE `service`.s_id='$s_id';";
                $query_ctr_run = mysqli_query($Connector, $query_ctr_search);
                while ($row = mysqli_fetch_array($query_ctr_run)) {
                    $s_id = $row['s_id'];
                    $sql = "SELECT DISTINCT(seller.seller_id) AS seller_id,user.f_name AS f_name,user.l_name AS l_name,user.user_img AS img,service.s_name AS s_name FROM seller JOIN user ON seller.user_id=user.user_id JOIN gig ON seller.seller_id=gig.seller_id JOIN rate ON gig.gig_id=rate.gig_id JOIN service ON gig.s_id=service.s_id WHERE gig.s_id='$s_id' AND NOT gig.seller_id='$seller_id' ORDER BY rate.gig_id DESC;";
                    $result = mysqli_query($Connector, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $f_name = $row['f_name'];
                        $l_name = $row['l_name'];
                        $user_img = $row['img'];
                        $s_name = $row['s_name'];
                        $seller_id = $row['seller_id'];

                ?>
                        <a href="c-Freelancer-Profile.php?seller_id=<?php echo "$seller_id" ?>">
                            <div class="s-dp-view btn-mr scroll-item">
                                <img src="./user-dp/<?php echo "$user_img"; ?>" class="u-dp" alt="Avatar">
                                <div class="s-name" style="text-align: center;">
                                    <span class="s-name s-cls"><?php echo "$f_name $l_name" ?></span><br>
                                    <span class="s-title-2"><?php echo "$s_name" ?></span>
                                </div>
                            </div>
                        </a>
                <?php

                    }
                }

                ?>
            </div>
        </div>
        <!-- Last Jobs -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Recent Search</span>
            <div class="section-btn">
                <?php
                require_once './action/config.php';

                $query_ctr_search = "SELECT * FROM category JOIN `service` ON category.c_id=`service`.c_id WHERE `service`.s_id='$s_id';";
                $query_ctr_run = mysqli_query($Connector, $query_ctr_search);
                while ($row = mysqli_fetch_array($query_ctr_run)) {
                    $s_id = $row['s_id'];
                    $query_search = "SELECT * FROM gig JOIN seller ON gig.seller_id=seller.seller_id JOIN user ON seller.user_id=user.user_id WHERE gig.s_id='$s_id' AND NOT gig.seller_id='$seller_id' ORDER BY gig.crt_date DESC;";
                    $query_run = mysqli_query($Connector, $query_search);
                    while ($row = mysqli_fetch_array($query_run)) {
                        $gig_id = $row['gig_id'];
                        $description = $row['description'];
                        $package_1 = $row['package_1'];
                        $s_id = $row['s_id'];
                        $seller_id = $row['seller_id'];
                        $img = $row['img'];
                        $user_id = $row['user_id'];
                        $f_name = $row['f_name'];
                        $l_name = $row['l_name'];
                        $user_img = $row['user_img'];
                        $description = substr($description, 0, 150);

                        $query_search2 = "SELECT gig_id,user_rate FROM `rate` WHERE gig_id='$gig_id';";
                        $query_run2 = mysqli_query($Connector, $query_search2);
                        $i = 0;
                        $rt = 0;
                        while ($row = mysqli_fetch_array($query_run2)) {
                            $rate = $row['user_rate'];
                            if ($rate != "") {
                                $i++;
                                $rt = $rt + $rate;
                            }
                        }
                        if ($i > 0) {
                            $gsq = ($rt) / ($i);
                        } else {
                            $gsq = "0";
                        }
                        //$gsq=($rt)/($i);
                        $query_search3 = "SELECT s_id,s_name FROM `service` WHERE s_id='$s_id';";
                        $query_run3 = mysqli_query($Connector, $query_search3);
                        while ($row = mysqli_fetch_array($query_run3)) {
                            $s_name = $row['s_name'];
                        }
                ?>
                        <a href="./Freelancer-gig-view.php?gigid=<?php echo "$gig_id"; ?>">
                            <div class="c-card scroll-item">
                                <img src="../Freelancer/img/<?php echo "$img"; ?>" class="card-img-top card-img" alt="Image">
                                <div class="card-body" style="margin: 2px; padding: 5px;">
                                    <div class="title-bar" style="margin: 0px;">
                                        <div class="user-img">
                                            <img src="./user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                                        </div>
                                        <div class="user-name">
                                            <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                            <span class="s-title"><?php echo "$s_name"; ?></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="card-txt"><?php echo "$description"; ?> ...</p>
                                    </div>
                                    <div class="btn-group">
                                        <div class="star text-light">
                                            <span class="star-txt"><?php echo "$gsq"; ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </div>
                                        <div class="mid-size">
                                        </div>
                                        <div class="price text-light">
                                            <span class="star-txt">LKR <?php echo "$package_1"; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php
                    }
                }


                ?>
            </div>
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