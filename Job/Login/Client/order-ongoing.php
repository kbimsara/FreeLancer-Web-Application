<?php
$page = "Order";
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

    <div class="container-fluid justify-content-center col-11 col-xl-11 mn" style="padding: 0px;margin-bottom: 10px;">

        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>

        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <a href="./order-ongoing.php">
                        <button type="button" class="btn btn-primary btn-sm float-right active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
                                <path d="M7.5 3.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg><span> Ongoing</span>
                        </button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="./order-Complete.php">
                        <button type="button" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                            </svg><span> Complete</span>
                        </button>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Top Sellers/Card-->

                <?php
                require_once './action/config.php';

                $user_id = $_SESSION["user_id"];

                $query_search = "SELECT * FROM `orders` WHERE user_id='$user_id' AND (order_status='ongoing' OR order_status='');";
                $query_run = mysqli_query($Connector, $query_search);

                while ($row = mysqli_fetch_array($query_run)) {
                    $order_id  = $row['order_id'];
                    $user_id = $row['user_id'];
                    $pk = $row['pk'];
                    $pk_short = $row['pk_short'];
                    $tot = $row['tot'];
                    $pk_short = substr($pk_short, 0, 150);

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
                ?>
                    <div class="col-xl-3 col-11 card m-4 c-card-2">
                        <a href="./orders-4.php?order_id=<?php echo $order_id; ?>">
                            <div class="card-body" style="margin: 2px; padding: 10px;">
                                <div class="title-bar" style="margin: 0px;">
                                    <div class="user-img">
                                        <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                    </div>
                                    <div class="user-name">
                                        <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                        <span class="s-title">Client</span>
                                    </div>
                                </div>
                                <div class="star text-light float-right" style="margin-top: 5px;">
                                    <span class="star-txt">
                                        <span class="star-txt"><?php echo $rt; ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="description">
                                    <p class="card-txt"><?php echo $pk_short; ?></p>
                                </div>
                                <div>
                                    <div class="price text-light float-right">
                                        <span class="star-txt">LKR <?php echo $tot; ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
                <!--
                <a href="./orders-4.php">
                    <div class="card m-4 c-card-2" style="width: 18rem;">
                        <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="card-img-top brd" alt="Responsive image">
                        <div class="card-body brd" style="padding: 0px;">
                            <div class="top">
                                <div class="user-img">
                                    <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                </div>
                                <div class="user-name">
                                    <span class="s-name">Nuwan_s</span><br>
                                    <span class="s-count">Completed orders - 45</span>
                                </div>
                            </div>
                            <div class="mid">
                                <p class="card-text c-txt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="c-bottom">
                                <div class="float-left bg-br text-light">
                                    <span class="star-txt">3.4</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </div>
                                <div class="float-right bg-br text-light">
                                    <span class="star-txt">LKR 2000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="./orders-4.php">
                    <div class="card m-4 c-card-2" style="width: 18rem;">
                        <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="card-img-top brd" alt="Responsive image">
                        <div class="card-body brd" style="padding: 0px;">
                            <div class="top">
                                <div class="user-img">
                                    <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                </div>
                                <div class="user-name">
                                    <span class="s-name">Nuwan_s</span><br>
                                    <span class="s-count">Completed orders - 45</span>
                                </div>
                            </div>
                            <div class="mid">
                                <p class="card-text c-txt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="c-bottom">
                                <div class="float-left bg-br text-light">
                                    <span class="star-txt">3.4</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </div>
                                <div class="float-right bg-br text-light">
                                    <span class="star-txt">LKR 2000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>-->
            </div>


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