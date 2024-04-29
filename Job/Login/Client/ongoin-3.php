<?php
$page = "Order";
$btn = "";
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
    <?php
    require_once './action/config.php';

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    }

    $query_search = "SELECT * FROM orders JOIN user ON orders.user_id=user.user_id WHERE orders.order_id='$order_id';";
    $query_run = mysqli_query($Connector, $query_search);

    while ($row = mysqli_fetch_array($query_run)) {
        $user_id = $row['user_id'];
        $user_img = $row['user_img'];
        $seller_id = $row['seller_id'];
        $gig_id = $row['gig_id'];
        $pk = $row['pk'];
        $pk_short = $row['pk_short'];
        $price = $row['price'];
        $tot = $row['tot'];


        $query_search22 = "SELECT * FROM seller JOIN user ON seller.user_id=user.user_id WHERE seller.seller_id='$seller_id';";
        $query_run22 = mysqli_query($Connector, $query_search22);
        while ($row = mysqli_fetch_array($query_run22)) {
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
        }
        $query_search33 = "SELECT * FROM orders WHERE order_id='$order_id';";
        $query_run33 = mysqli_query($Connector, $query_search33);
        while ($row = mysqli_fetch_array($query_run33)) {
            $ord_cnfrm_sl = $row['ord_cnfrm_sl'];
            $order_status = $row['order_status'];
        }
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
        <div class="row justify-content-center" style="margin: 0px;">

            <div class="col-xl-10 col-11">
                <div class="title-bar" style="margin: 0px;">
                    <div class="user-img">
                        <img src="../Client/user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                    </div>
                    <div class="user-name">
                        <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                        <span class="s-title">Seller</span>
                    </div>
                </div>
                <div class="float-right" style="display: inline-flex;margin-top: 5px;">
                    <div class="price text-light" style="margin-left: 5px;">
                        <span class="star-txt">LKR <?php echo "$tot"; ?></span>
                    </div>
                </div>
                <div class="container-fluid">
                    <p><?php echo $pk_short; ?></p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-11 col-xl-5 c-card" style="padding: 5px;margin: 5px;">

                        <div class="title-bar" style="margin: 0px;">
                            <div class="user-img">
                                <img src="../Client/user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                            </div>
                            <div class="user-name">
                                <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                                <span class="s-title">Seller</span>
                            </div>
                        </div>
                        <div class="float-right" style="display: inline-flex;">
                            <div class="text-light bg-br" style="margin-left: 5px;margin: 5px;">
                                <span class="star-txt">Contact me</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 justify-content-center" style="text-align: center;">
                        <?php
                        if ($ord_cnfrm_sl == "complete" and $order_status == "complete") {
                        ?>
                            <button type="button" class="btn btn-warning m-1" disabled>Rate</button>
                        <?php
                        } else {
                        ?>
                            <a href="./ongoin-4.php?order_id=<?php echo $order_id; ?>">
                                <button type="button" class="btn btn-warning m-1">Rate</button>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
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