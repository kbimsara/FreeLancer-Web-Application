<?php
$page = "Profile";
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

<body style="background-color: #dadada;">
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <div class="container-fluid justify-content-center mn" style="padding: 0px;">

        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>
        </div>
        <center>

            <div class="row col-11" style="padding: 0px; margin: 0px;">
                <div class="col-12 col-xl-6">
                    <div class="pk-box2 bg-light txt-s" style="padding: 10px; margin: 0px;">
                        <div class="fl-top">

                            <?php
                            require_once './action/config.php';

                            if (isset($_GET['seller_id'])) {
                                $seller_id = $_GET['seller_id'];
                            } else {
                                $seller_id = $_SESSION["seller_id"];
                            }

                            $query_search = "SELECT * FROM user JOIN seller ON user.user_id=seller.user_id WHERE seller.seller_id='$seller_id';";
                            $query_run = mysqli_query($Connector, $query_search);

                            while ($row = mysqli_fetch_array($query_run)) {
                                $user_id = $row['user_id'];
                                $user_img = $row['user_img'];
                                $f_name = $row['f_name'];
                                $l_name = $row['l_name'];
                                $des = $row['acc_description'];
                                $gg = substr($des, 0, 290);
                            }
                            ?>
                            <div class="row">
                                <div class="col-3">
                                    <img src="./user-dp/<?php echo "$user_img"; ?>" class="fl-img" alt="avatar">
                                </div>
                                <div class="col-9">
                                    <!-- Rating -->
                                    <?php

                                    $seller_id = $_SESSION["seller_id"];

                                    $query_search = "SELECT gig.seller_id,rate.user_rate FROM rate JOIN gig ON rate.gig_id=gig.gig_id WHERE seller_id='$seller_id';";
                                    $query_run = mysqli_query($Connector, $query_search);

                                    $i = 0;
                                    $rt = 0;
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        $rate = $row['user_rate'];
                                        if ($rate != "") {
                                            $i++;
                                            $rt = $rt + $rate;
                                        }
                                    }
                                    if ($i < 1) {
                                        $rt = 0;
                                    } else {
                                        $rt = $rt / $i;
                                    }
                                    ?>
                                    <div class="row col-12" style="padding: 0px; margin: 0px;">
                                        <div class="col-4">
                                            <span><?php echo $rt; ?></span><br>
                                            <span>Rating</span>
                                        </div>
                                        <!-- Rating -->
                                        <?php

                                        $seller_id = $_SESSION["seller_id"];

                                        $query_search2 = "SELECT seller_id,order_status FROM orders WHERE seller_id='$seller_id';";
                                        $query_run2 = mysqli_query($Connector, $query_search2);

                                        $cm = 0;
                                        $on = 0;
                                        while ($row = mysqli_fetch_array($query_run2)) {
                                            $st = $row['order_status'];
                                            if ($st == "complete") {
                                                $cm++;
                                            } else {
                                                $on++;
                                            }
                                        }
                                        ?>
                                        <div class="col-4">
                                            <span><?php echo $cm; ?></span><br>
                                            <span>Complete</span>
                                        </div>
                                        <div class="col-4">
                                            <span><?php echo $on; ?></span><br>
                                            <span>ongoing</span>
                                        </div>
                                    </div>
                                    <div class="row col-12" style="padding: 0px; margin: 0px;">
                                        <div class="col-6">
                                            <button class="btn fl-btn btn-sm fl-rd m-2 txt-s">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                                                    <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                                                </svg> Contact
                                            </button>
                                        </div>
                                        <a href="./repot.php?rp_id=<?php echo $seller_id; ?>">
                                            <button class="btn fl-btn btn-sm fl-rd m-2 txt-s">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                                </svg> Report
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fl-mid" style="padding-left: 10px;text-align: left;">
                            <h4 class="clr"><?php echo "$f_name $l_name"; ?></h4>
                            <span>SriLanka</span>
                            <span style="margin-left: 30px;">Graphics & Designer</span>
                        </div>
                        <!-- Catagory -->
                        <div class="container-fluid" style="padding: 0px;padding-left: 0px; margin: 0px;">
                            <div class="section-btn">
                                <?php
                                require_once './action/config.php';

                                $seller_id = $_SESSION["seller_id"];

                                $query_search1 = "SELECT DISTINCT(category.c_name) FROM category JOIN service ON category.c_id=service.c_id JOIN gig ON service.s_id=gig.s_id WHERE gig.seller_id='$seller_id';";
                                $query_run1 = mysqli_query($Connector, $query_search1);

                                while ($row = mysqli_fetch_array($query_run1)) {
                                    $c_name = $row['c_name'];
                                ?>
                                    <button type="button" class="btn btn-outline-primary btn-sm btn-rd btn-mr scroll-item">
                                        <p class="txt"><?php echo "$c_name"; ?></p>
                                    </button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <p style="text-align: left;"><?php echo "$gg"; ?></p>
                    </div>
                </div>
                <div class=" col-12 col-xl-6" style="text-align: left;">
                    <div class="pk-box2 bg-light m-1" style="padding: 5px;">
                        <h5>Review</h5>
                        <div class="section-btn2">
                            <?php
                            $query_rw = "SELECT * FROM rate JOIN user ON rate.user_id=user.user_id JOIN gig ON rate.gig_id=gig.gig_id WHERE seller_id='$seller_id';";
                            $query_run_rw = mysqli_query($Connector, $query_rw);
                            while ($row = mysqli_fetch_array($query_run_rw)) {
                                $rate_id = $row['rate_id'];
                                $f_name = $row['f_name'];
                                $l_name = $row['l_name'];
                                $user_img = $row['user_img'];
                                $user_rate = $row['user_rate'];
                                $comment = $row['comment'];
                                $date = $row['date'];

                                $comment = substr($comment, 0, 150);

                                $startDate = new DateTime($date);
                                $endDate = new DateTime(date("Y-m-d"));

                                $diff = $endDate->diff($startDate);
                                $nfWeeks = floor($diff->days / 7);

                            ?>
                                <div class="txt-s scroll-item2">
                                    <div class="float-right bg-br text-light">
                                        <span class="star-txt"><?php echo "$user_rate"; ?> <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg></span>
                                    </div>
                                    <div class="row">
                                        <div class="title-bar row" style="margin: 5px;">
                                            <div class="user-img">
                                                <img src="../Client/user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                                            </div>
                                            <div class="user-name">
                                                <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                                <span class="s-title">#<?php echo "$rate_id"; ?></span>
                                                <span style="margin-left: 10px;"><?php echo "$nfWeeks"; ?> week ago</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p><?php echo "$comment"; ?></p>
                                    <hr style="border: 1px solid black; background-color: black;">
                                </div>
                            <?php
                            }

                            ?><!--
                            <div class="txt-s scroll-item2">
                                <div class="float-right bg-br text-light">
                                    <span class="star-txt">4.5 <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg></span>
                                </div>
                                <div class="row">
                                    <div class="title-bar row" style="margin: 5px;">
                                        <div class="user-img">
                                            <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                        </div>
                                        <div class="user-name">
                                            <span class="s-name">Nuwan_s</span><br>
                                            <span class="s-title">Germany</span>
                                            <span style="margin-left: 10px;">3 week ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p>I am very happy with my custom visuals, unfortunately there aren't many sellers on Fiverr that will produce something custom for you without a template. That's why I'm glad I found liquidpng here on Fiverr! liquidpng did a great job and if I need more visuals in the future I will come back to you!</p>
                                <hr style="border: 1px solid black; background-color: black;">
                            </div>-->
                        </div>
                    </div>
                </div>
                <!-- Top Sellers-->

                <div class="container-fluid pk-box2 bg-light m-1" style="text-align: left;">
                    <h3 class="m-2" style="text-align: left;">Post</h3>
                    <form method="post">
                        <div class="row justify-content-center">
                            <!-- Top Sellers/Card-->
                            <?php

                            if (isset($_GET['seller_id'])) {
                                $seller_id = $_GET['seller_id'];
                            } else {
                                $seller_id = $_SESSION["seller_id"];
                            }

                            $query_search = "SELECT * FROM user JOIN seller ON user.user_id=seller.user_id JOIN gig ON seller.seller_id=gig.seller_id WHERE seller.seller_id='$seller_id';";
                            $query_run = mysqli_query($Connector, $query_search);

                            while ($row = mysqli_fetch_array($query_run)) {
                                $gig_id = $row['gig_id'];
                                $user_id = $row['user_id'];
                                $f_name = $row['f_name'];
                                $l_name = $row['l_name'];
                                $des = $row['description'];
                                $img = $row['img'];
                                $p1_price = $row['package_1'];

                                $gg = substr($des, 0, 110);

                                $query_searchrt = "SELECT gig.seller_id,rate.user_rate,rate.user_id FROM rate JOIN gig ON rate.gig_id=gig.gig_id WHERE user_id='$user_id';";
                                $query_searchrt_run = mysqli_query($Connector, $query_searchrt);

                                $i = 0;
                                $rt = 0;
                                while ($row = mysqli_fetch_array($query_run2)) {
                                    $rate = $row['user_rate'];
                                    if ($rate != "") {
                                        $i++;
                                        $rt = $rt + $rate;
                                    }
                                }
                                if ($i < 1) {
                                    $rt = 0;
                                } else {
                                    $rt = $rt / $i;
                                }
                                $count = 0;

                                $query_searchcmplt = "SELECT COUNT(gig.gig_id) AS count FROM `orders` JOIN gig ON orders.gig_id=gig.gig_id JOIN service ON gig.s_id=service.s_id WHERE gig.seller_id='$seller_id' AND orders.order_status='complete' AND orders.gig_id='$gig_id';";
                                $query_searchcmplt_run = mysqli_query($Connector, $query_searchcmplt);
                                while ($row = mysqli_fetch_array($query_searchcmplt_run)) {
                                    $count = $row['count'];
                                }


                            ?>
                                <a href="./Freelancer-gig-view.php?gigid=<?php echo "$gig_id"; ?>">
                                    <div class="card m-4 c-card-2" style="width: 18rem;">
                                        <img src="../Freelancer/img/<?php echo "$img"; ?>" class="card-img-top brd" alt="Responsive image">
                                        <div class="card-body brd" style="padding: 0px;">
                                            <div class="top">
                                                <div class="user-img">
                                                    <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                                </div>
                                                <div class="user-name">
                                                    <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                                    <span class="s-count">Completed orders - <?php echo "$count"; ?></span>
                                                </div>
                                            </div>
                                            <div class="mid">
                                                <p class="card-text c-txt"><?php echo "$gg"; ?>...</p>
                                            </div>
                                            <div class="c-bottom">
                                                <div class="float-left bg-br text-light">
                                                    <span class="star-txt"><?php echo $rt; ?></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                </div>
                                                <div class="float-right bg-br text-light">
                                                    <span class="star-txt"><?php echo "LKR $p1_price"; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>

                            <?php
                            $query_count2 = "SELECT COUNT(seller_id) AS count FROM gig WHERE seller_id='$seller_id';";
                            $query_count2_run = mysqli_query($Connector, $query_count2);

                            while ($row = mysqli_fetch_array($query_count2_run)) {
                                $cc = $row['count'];
                            }

                            ?>

                        </div>
                    </form>
                </div>
            </div>
        </center>
    </div>


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