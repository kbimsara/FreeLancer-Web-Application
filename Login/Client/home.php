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
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Service Catagory</span>
            <div class="section-btn">
                <?php
                require_once './action/config.php';
                $sql = "SELECT * FROM `category`;";
                $result = mysqli_query($Connector, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $c_id = $row['c_id'];
                    $c_name = $row['c_name'];
                ?>
                    <a href="./home-catogary.php?cid=<?php echo $c_id; ?>">
                        <button type="button" class="btn btn-outline-primary btn-sm btn-rd btn-mr scroll-item">
                            <p class="txt"><?php echo "$c_name"; ?></p>
                        </button>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- Recent View -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Recent Search</span>
            <div class="section-btn">
                <?php
                require_once './action/config.php';
                $seller_id = $_SESSION["seller_id"];

                $query_search = "SELECT * FROM gig JOIN seller ON gig.seller_id=seller.seller_id JOIN user ON seller.user_id=user.user_id WHERE NOT seller.seller_id='$seller_id';";
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

                ?>
                <!--
                <div class="c-card scroll-item">
                    <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="card-img-top card-img" alt="...">
                    <div class="card-body" style="margin: 2px; padding: 5px;">
                        <div class="title-bar" style="margin: 0px;">
                            <div class="user-img">
                                <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                            </div>
                            <div class="user-name">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-title">SEO</span>
                            </div>
                        </div>
                        <div class="description">
                            <p class="card-txt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="btn-group">
                            <div class="star text-light">
                                <span class="star-txt">3.4</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <div class="mid-size">
                            </div>
                            <div class="price text-light">
                                <span class="star-txt">LKR 2000</span>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>

        <!-- Seller Dp -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Top Sellers</span>
            <div class="section-btn" style="padding-left: 20px;">
                <!-- Seller Dp-card -->
                <?php
                require_once './action/config.php';
                //$sql = "SELECT user.f_name AS f_name,user.l_name AS l_name,user.user_img AS user_img,seller.seller_id AS seller_id,`service`.s_name,rate.user_rate AS user_rate FROM user JOIN seller ON user.user_id=seller.user_id JOIN gig ON seller.seller_id-gig.seller_id JOIN rate ON gig.gig_id=rate.rate_id JOIN service ON gig.s_id=service.s_id;";
                $sql = "SELECT DISTINCT(seller.seller_id) AS seller_id,user.f_name AS f_name,user.l_name AS l_name,user.user_img AS img,service.s_name AS s_name FROM seller JOIN user ON seller.user_id=user.user_id JOIN gig ON seller.seller_id=gig.seller_id JOIN rate ON gig.gig_id=rate.gig_id JOIN service ON gig.s_id=service.s_id WHERE NOT seller.seller_id='$seller_id' ORDER BY rate.gig_id DESC;";
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

                ?>
            </div>
        </div>
        <!-- Last Jobs -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">Last Job Post</span>
            <div class="section-btn">
                <?php
                require_once './action/config.php';

                $query_search = "SELECT * FROM gig JOIN seller ON gig.seller_id=seller.seller_id JOIN user ON seller.user_id=user.user_id WHERE NOT seller.seller_id='$seller_id' ORDER BY gig.crt_date DESC;";
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
                            </div>
                        </div>
                    </a>
                <?php
                }

                ?>
            </div>
        </div>

    </div>
    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</html>