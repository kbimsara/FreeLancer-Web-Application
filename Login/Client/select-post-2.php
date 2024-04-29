<?php
$page = "Home";
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
    require_once './action/config.php';

    if (isset($_GET['bid_id'])) {
        $bid_id = $_GET['bid_id'];
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
            <?php
            $query_search = "SELECT * FROM `bid` WHERE bid_id='$bid_id';";
            $query_run = mysqli_query($Connector, $query_search);

            while ($row = mysqli_fetch_array($query_run)) {
                $rq_id = $row['rq_id'];
                $bid_id = $row['bid_id'];
                $seller_id = $row['seller_id'];
                $des = $row['description'];

                $query_search3 = "SELECT * FROM `user` JOIN seller ON user.user_id=seller.user_id WHERE seller.seller_id='$seller_id';";
                $query_run3 = mysqli_query($Connector, $query_search3);

                while ($row = mysqli_fetch_array($query_run3)) {
                    $f_name = $row['f_name'];
                    $l_name = $row['l_name'];
                    $user_img = $row['user_img'];
                }

                $query_search4 = "SELECT COUNT(rq_id) AS bid_count FROM `bid` WHERE rq_id='$rq_id';";
                $query_run4 = mysqli_query($Connector, $query_search4);

                while ($row = mysqli_fetch_array($query_run4)) {
                    $bid_count = $row['bid_count'];
                }
            }
            ?>

            <div class="col-xl-10 col-11">
                <div class="title-bar" style="margin: 0px;">
                    <div class="user-img">
                        <img src="./user-dp/<?php echo "$user_img"; ?>" class="u-img" alt="Avatar">
                    </div>
                    <div class="user-name">
                        <span class="s-name"><?php echo "$f_name $l_name"; ?></span><br>
                    </div>
                </div>
                <div class="container-fluid">
                    <p><?php echo "$des"; ?></p>
                </div>
                <div class="container-fluid" style="text-align: center;">
                    <a href="./c-Freelancer-Profile.php?seller_id=<?php echo "$seller_id"; ?>">
                        <button type="button" class="btn btn-primary brd" style="width: 150px;">View Account</button>
                    </a>
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