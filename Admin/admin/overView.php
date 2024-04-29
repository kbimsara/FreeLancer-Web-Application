<?php
$page = "OverView";
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
    <!-- Ajax js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

            if(min<10){
                min="0"+min;
            }else{
                mm=min;
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
                require_once './left-side-menu.php';
                ?>
            </div>
            <!-- left-side/End -->
            <?php
            require_once './config.php';
            $user_count = 0;
            $pduser_count = 0;

            $query_search = "SELECT * FROM `user`;";
            $query_run = mysqli_query($Connector, $query_search);

            while ($row = mysqli_fetch_array($query_run)) {
                $verification = $row['verification'];
                if ($verification == '') {
                    $user_count++;
                } elseif ($verification = 'pending') {
                    $pduser_count++;
                }
            }
            $a=0;
            $tot = 0;
            $price = 0;
            $query_search2 = "SELECT SUM(price) AS price,SUM(tot) AS tot FROM `orders` WHERE order_status='complete';";
            $query_run2 = mysqli_query($Connector, $query_search2);

            while ($row = mysqli_fetch_array($query_run2)) {
                $a++;
                $price     = $row['price'];
                $tot = $row['tot'];
            }
            $st = $tot - $price;

            ?>

            <!-- right-side/Start -->
            <div class="col-10">
                <div class="contain box justify-content-center">
                    <div style="position: absolute; top: 60px; right: 45px;">
                        <button type="button" class="btn btn-bw btn-sm">Print</button>
                    </div>
                    <!-- top 4 icon -->
                    <div class="row justify-content-center" style="margin-top: 25px;padding-left: 25px;padding-right: 25px;">
                        <!-- card -->
                        <div class="settng cm-2">
                            <spam class="block-txt-m">
                                <spam class="block-txt-lg"><?php echo "$user_count"; ?></spam> New Users Registered
                            </spam>
                        </div>
                        <div class="settng cm-2">
                            <spam class="block-txt-m">
                                <spam class="block-txt-lg"><?php echo "$pduser_count"; ?></spam> Pending verifications
                            </spam>
                        </div>
                        <div class="settng cm-2">
                            <spam class="block-txt-m">
                                <spam class="block-txt-lg">0</spam> Total Reports
                            </spam>
                        </div>
                        <div class="settng cm-2 pd-2">
                            <spam class="block-txt-l sp-line">LKR <?php echo "$st"; ?></spam>
                            <spam class="block-txt-s" style="text-align: center;">Total Sales</spam>
                        </div>

                    </div>
                    <hr style="background-color: black; border: 1px solid black;margin-left: 5px;margin-right: 5px;">
                    <div class="container-fluid justify-content-center">
                        <!-- 3 Radiob Button Line -->
                        <div class="contain-fluid">
                            <center>
                                <div class="radio-block">
                                    <span class="rd-txt">Daily</span>
                                    <input type="radio" class="rd-btn" name="daily" id="daily" value="daily" checked onchange="FetchDaily(this.value)">
                                </div>
                                <div class="radio-block">
                                    <span class="rd-txt">Weekly</span>
                                    <input type="radio" class="rd-btn" name="daily" id="weekly" value="weekly" onchange="FetchWeekly(this.value)">
                                </div>
                                <div class="radio-block">
                                    <span class="rd-txt">Monthly</span>
                                    <input type="radio" class="rd-btn" name="daily" id="monthly" value="monthly" onchange="FetchMonthly(this.value)">
                                </div>
                            </center>
                        </div>
                        <!-- 3 block -->
                        <div class="contain justify-content-center">
                            <center>
                                <div class="row justify-content-center">
                                    <!-- card -->
                                    <div class="settng cm-2">
                                        <spam class="block-txt-l sp-line" id="ord_count" name="ord_count"><?php echo"$a"; ?></spam>
                                        <spam class="block-txt-m">Orders</spam>
                                    </div>
                                    <div class="settng cm-2 pd-2">
                                        <spam class="block-txt-l sp-line" id="tot" name="tot">LKR <?php echo"$tot"; ?></spam>
                                        <spam class="block-txt-s">Total Sales</spam>
                                    </div>
                                    <div class="settng cm-2 pd-2">
                                        <spam class="block-txt-l sp-line" id="profit" name="profit">LKR <?php echo"$st"; ?></spam>
                                        <spam class="block-txt-s">Total Profit</spam>
                                    </div>
                                </div>
                            </center>
                        </div>

                        <!-- Table/start -->
                        <div class="container justify-content-center">
                            <center>
                                <table name="table" id="table">
                                    <?php
                                    require_once './config.php';
                                    echo '
                                        <tr>
                                            <th>Number</th>
                                            <th>Date</th>
                                            <th>Orders</th>
                                            <th>Sales</th>
                                            <th>Profit</th>
                                        </tr>';
                                    $query = "SELECT * FROM `orders` ORDER BY od_date DESC ";
                                    $query_run_search = mysqli_query($Connector, $query);
                                    $i = 0;

                                    if (mysqli_num_rows($query_run_search) > 0) {

                                        while ($row = mysqli_fetch_array($query_run_search)) {
                                            $i++;
                                            $n = 0;
                                            $price = 0;
                                            $tot = 0;
                                            $profit = 0;
                                            $date = $row['od_date'];

                                            $query1 = "SELECT * FROM `orders` WHERE od_date='$date' ";
                                            $query_run_search1 = mysqli_query($Connector, $query1);
                                            while ($row = mysqli_fetch_array($query_run_search1)) {
                                                $n++;
                                                $price = $price + $row['price'];
                                                $tot = $tot + $row['tot'];
                                                $profit = $tot - $price;
                                            }
                                            echo '
                                                <tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $date . '</td>
                                                    <td>' . $n . '</td>
                                                    <td>' . $tot . '</td>
                                                    <td>' . $profit . '</td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                                <a href="./tableView.php">
                                    <button type="button" class="btn btn-bw btn-sm" style=" width: 300px;margin: 10px;">View More</button>
                                </a>
                            </center>
                        </div>
                        <!-- Table/End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Dynamic drop-down script -->
        <script type="text/javascript">
            function FetchDaily(id) {
                $('#table').html('');
                $.ajax({
                    type: 'post',
                    url: 'ajaxdata.php',
                    data: {
                        daily_id: id
                    },
                    success: function(data) {
                        $('#table').html(data);
                    }

                })


            }

            function FetchWeekly(id) {
                $('#table').html('');
                $.ajax({
                    type: 'post',
                    url: 'ajaxdata.php',
                    data: {
                        weekly_id: id
                    },
                    success: function(data) {
                        $('#table').html(data);
                    }

                })
            }

            function FetchMonthly(id) {
                $('#table').html('');
                $.ajax({
                    type: 'post',
                    url: 'ajaxdata.php',
                    data: {
                        monthly_id: id
                    },
                    success: function(data) {
                        $('#table').html(data);
                    }

                })
            }
        </script>
        <!-- right-side/End -->
    </div>
    <!-- Body/End -->
</body>

</html>