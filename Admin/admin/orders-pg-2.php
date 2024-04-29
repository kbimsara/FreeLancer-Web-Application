<?php
$page = "report";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title bar -->
    <link rel="icon" type="image/png" href="../assets/logo/titlebar_logo.png" />

    <!-- Bootstrap -->
    <link href="../assets/bootstrap-4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/bootstrap-4.6.2/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Custom css -->
    <link rel="stylesheet" href="../assets/style.css">

    <title>Admin Panel</title>

</head>

<body onload="dt()">
    <script>
        function dt() {
            const date = new Date();

            const months1 = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            let day = date.getDate();
            let month = months1[date.getMonth()];
            let year = date.getFullYear();

            let h = date.getHours();
            let min = date.getMinutes();
            var mm;

            if (min < 10) {
                min = "0" + min;
            } else {
                mm = min;
            }

            if (h < 12) {
                var t = "am";
            } else {
                var t = "pm";
            }

            // This arrangement can be altered based on how we want the date's format to appear.
            var currentDate = `${day} of ${month} ${year}`;
            var currenttime = `${h}:${min} ${t}`;
            document.getElementById("date").innerHTML = currentDate;
            document.getElementById("time").innerHTML = currenttime;
        }
    </script>
    <?php
    require_once './config.php';
    if (isset($_GET['rp_id'])) {
        $rp_id = $_GET['rp_id'];
    }

    $query_search = "SELECT * FROM report WHERE rp_id='$rp_id';";
    $query_run = mysqli_query($Connector, $query_search);

    while ($row = mysqli_fetch_array($query_run)) {
        $rp_id = $row['rp_id'];
        $user_id = $row['user_id'];
        $seller_id = $row['seller_id'];
        $rp_type = $row['rp_type'];
        $rp_description = $row['rp_description'];
        $rp_status = $row['rp_status'];
        $rp_date = $row['rp_date'];

        if($rp_status==''){
            $rp_status="Waiting";
        }
    }

    ?>
    <!-- Nav/Start -->
    <?php
    require_once './nav.php'
    ?>
    <!-- Nav/End -->

    <!-- Body/Start -->
    <div class="container-fluid">

        <div class="row">
            <!-- left-side/Start -->
            <div class="col-2 sticky">
                <?php
                require_once './left-side-menu.php'
                ?>
            </div>
            <!-- left-side/End -->

            <!-- right-side/Start -->
            <div class="col-10">
                <div class="contain-fluid box">
                    <div class="container-fluid">
                        <div class="link-bar">
                            <span class="block-txt-s">#order id | #gig id</span>
                        </div>
                    </div>
                    <div class="row" style="margin: 10px;">
                        <!-- Chat ui -->
                        <div class="col-3 chat-left-ui">
                            <div class="container-fluid chat-viewer">
                                <div class="chat-r">
                                    <div class="sp"></div>
                                    <div class="mess mess-r">
                                        <div class="s-line-1">
                                            <span class="block-txt-s">#seller</span>
                                        </div>
                                        <div class="s-line-2">
                                            <span class="block-txt-l">hi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-side">
                                    <div class="u-box">
                                        <div class="u-line-1">
                                            <span class="block-txt-s">#User</span>
                                        </div>
                                        <div class="u-line-2">
                                            <span class="block-txt-l">hi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid chat-txt" style="display: inline-flex;">
                                <input type="text" class="form-control brd-black" id="" placeholder="Type here">
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 5px;">send</button>
                            </div>
                        </div>
                        <!-- Chat ui-right -->
                        <div class="col-9 container-fluid" style="padding-left: 30px;">
                            <!-- Chat ui-3 text block -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="txt-title">
                                        <span class="block-txt-m" style="margin-left: 0px;">Reported Date</span>
                                    </div>
                                    <div class="date">
                                        <span class="block-txt-s"><?php echo "$rp_date"; ?></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="txt-title">
                                        <span class="block-txt-m" style="margin-left: 0px;">Report Type</span>
                                    </div>
                                    <div class="date">
                                        <span class="block-txt-s"><?php echo "$rp_type"; ?></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="txt-title">
                                        <span class="block-txt-m" style="margin-left: 0px;">Report Status</span>
                                    </div>
                                    <div class="date">
                                        <span class="block-txt-s"><?php echo "$rp_status"; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="margin-top: 10px; padding: 0px;">
                                <div class="repor-title" style="margin-top: 20px;">
                                    <span class="block-txt-m" style="margin-left: 0px; margin-bottom: 10px;">Reports history</span>
                                </div>
                                <div class="box brd-black" style="margin-left: 0px; padding-left: 20px; min-height: 350px;">
                                    <div class="main-block">
                                        <div class="r-title">
                                            <span class="block-txt-l">-> #<?php echo "$rp_id"; ?></span>
                                        </div>
                                        <div class="r-title">
                                            <span class="block-txt-m">#<?php echo "$seller_id"; ?> | #<?php echo "$user_id"; ?></span>
                                        </div>
                                        <div class="r-data">
                                            <span class="block-txt-s"><?php echo "$rp_description"; ?></span>
                                        </div>
                                    </div>
                                    <hr style="background-color: black; border: 1px solid black; margin-right: 20px;">
                                </div>
                            </div>
                            <div class="btn-group" style="margin-top: 5px;">
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 5px;">Cancel order</button>
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 15px;">Complete order</button>
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 15px;">View gig</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- right-side/End -->
    </div>
    </div>
    <!-- Body/End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>