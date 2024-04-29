<?php
$page = "orders";
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
    <!-- msg box -->
    <script src="../assets/sweetalert2.all.min.js"></script>
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
                <div class="contain box justify-content-center">
                    <div class="container-fluid justify-content-center">
                        <div style="position: absolute; top: 100px; right: 50px;">
                            <button type="button" class="btn btn-bw btn-sm">Print</button>
                        </div>
                        <!-- 3 Radio Button Line -->
                        <div class="contain-fluid" style="margin-top: 20px; margin-bottom: 20px; padding-bottom: 0px;">
                            <div class="row">
                                <div class="col-4">
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
                                <div class="col-8 justify-content-end" style="display:flex;">
                                    <input type="date" class="form-control" name="fromdt" id="fromdt" style="width: 170px;">
                                    <span class="block-txt-m" style="margin-left: 20px;margin-right: 20px; margin-top: 5px;margin-bottom: 0px;">to</span>
                                    <input type="date" class="form-control" name="todt" id="todt" style="width: 170px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>

                        <!-- Orders overview -->
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
                                    <button type="button" class="btn btn-bw btn-sm" style=" width: 300px;">View More</button>
                                </a>
                            </center>
                        </div>
                        <!-- Table/End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- right-side/End -->
    </div>
    <!-- Dynamic drop-down script -->
    <script type="text/javascript">
        function FetchDaily(id) {
            var from = document.getElementById("fromdt").value;
            var to = document.getElementById("todt").value;
            const date = new Date();

            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            // This arrangement can be altered based on how we want the date's format to appear.
            let currentDate = `${year}-${month}-${day}`;

            if (from == '') {
                from = "2022-01-01";
            }
            if (to == '') {
                to = currentDate;
            }
            //alert(from + "++" + to)

            $('#table').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    daily_id: id,
                    fr: from,
                    to: to
                },
                success: function(data) {
                    $('#table').html(data);
                }

            })


        }

        function FetchWeekly(id) {
            var from = document.getElementById("fromdt").value;
            var to = document.getElementById("todt").value;
            const date = new Date();

            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            // This arrangement can be altered based on how we want the date's format to appear.
            let currentDate = `${year}-${month}-${day}`;

            if (from == '') {
                from = "2022-01-01";
            }
            if (to == '') {
                to = currentDate;
            }
            //alert(from + "++" + to)

            $('#table').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    weekly_id: id,
                    fr: from,
                    to: to
                },
                success: function(data) {
                    $('#table').html(data);
                }

            })
        }

        function FetchMonthly(id) {
            var from = document.getElementById("fromdt").value;
            var to = document.getElementById("todt").value;
            const date = new Date();

            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            // This arrangement can be altered based on how we want the date's format to appear.
            let currentDate = `${year}-${month}-${day}`;

            if (from == '') {
                from = "2022-01-01";
            }
            if (to == '') {
                to = currentDate;
            }
            
            //alert(from + "++" + to)
            $('#table').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    monthly_id: id,
                    fr: from,
                    to: to
                },
                success: function(data) {
                    $('#table').html(data);
                }

            })
        }
    </script>
    <!-- Body/End -->

</body>

</html>