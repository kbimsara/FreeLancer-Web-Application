<?php
$page = "financial";
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
                require_once './left-side-menu.php'
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
            $a = 0;
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
                    <div class="container-fluid justify-content-center">
                        <div style="position: absolute; top: 60px; right: 45px;">
                            <button type="button" class="btn btn-bw btn-sm">Print</button>
                        </div>
                        <!-- 3 Radiob Button Line -->
                        <div class="contain-fluid" style="margin-top: 20px;">
                            <center>
                                <div class="radio-block">
                                    <span class="rd-txt">Daily</span>
                                    <input type="radio" class="rd-btn" name="daily" id="daily" value="daily" checked onchange="FetchDaily2(this.value)">
                                </div>
                                <div class="radio-block">
                                    <span class="rd-txt">Weekly</span>
                                    <input type="radio" class="rd-btn" name="daily" id="weekly" value="weekly" onchange="FetchWeekly2(this.value)">
                                </div>
                                <div class="radio-block">
                                    <span class="rd-txt">Monthly</span>
                                    <input type="radio" class="rd-btn" name="daily" id="monthly" value="monthly" onchange="FetchMonthly2(this.value)">
                                </div>
                            </center>
                        </div>
                        <!-- 3 block -->
                        <div class="contain justify-content-center">
                            <center>
                                <div class="row justify-content-center">
                                    <!-- card -->
                                    <div class="settng cm-2">
                                        <spam class="block-txt-l sp-line" id="ord_count" name="ord_count"><?php echo "$a"; ?></spam>
                                        <spam class="block-txt-m">Orders</spam>
                                    </div>
                                    <div class="settng cm-2 pd-2">
                                        <spam class="block-txt-l sp-line" id="tot" name="tot">LKR <?php echo "$tot"; ?></spam>
                                        <spam class="block-txt-s">Total Sales</spam>
                                    </div>
                                    <div class="settng cm-2 pd-2">
                                        <spam class="block-txt-l sp-line" id="profit" name="profit">LKR <?php echo "$st"; ?></spam>
                                        <spam class="block-txt-s">Total Profit</spam>
                                    </div>
                                </div>
                            </center>
                        </div>

                        <div id="data" name="data">
                            <!-- Pending Orders -->
                            <center>
                                <div class="tb-title">
                                    <span class="block-txt-m">Pending Orders</span>
                                </div>
                            </center>

                            <!-- Table/start -->
                            <div class="container justify-content-center">
                                <center>
                                    <table style="margin-top: 0px;" id="table01" name="table01">
                                        <?php
                                        echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
                                        $query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE NOT order_status='complete' ORDER BY od_date DESC LIMIT 5";
                                        $query_run_search = mysqli_query($Connector, $query);
                                        $i = 0;
                                        $count = 0;
                                        $c_tot = 0;
                                        $c_profit = 0;

                                        if (mysqli_num_rows($query_run_search) > 0) {

                                            while ($row = mysqli_fetch_array($query_run_search)) {
                                                $i++;
                                                $n = 0;
                                                $price = 0;
                                                $tot = 0;
                                                $profit = 0;
                                                $date = $row['od_date'];

                                                $query1 = "SELECT * FROM `orders` WHERE od_date='$date';";
                                                $query_run_search1 = mysqli_query($Connector, $query1);
                                                while ($row = mysqli_fetch_array($query_run_search1)) {
                                                    $count++;
                                                    $n++;
                                                    $price = $price + $row['price'];
                                                    $tot = $tot + $row['tot'];
                                                    $c_tot = $tot + $c_tot;
                                                    $profit = $tot - $price;
                                                    $c_profit = $c_profit + $profit;
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
                                            echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
                                        } else {
                                            echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
                                        }
                                        ?>
                                    </table>
                                    <a href="./tableView.php?odType=Pending">
                                        <button type="button" class="btn btn-bw btn-sm" style=" width: 300px; margin: 10px;">View More</button>
                                    </a>
                                </center>
                            </div>
                            <!-- Table/End -->

                            <!-- Completed Orders -->
                            <center>
                                <div class="tb-title">
                                    <span class="block-txt-m">Completed Orders</span>
                                </div>
                            </center>

                            <!-- Table/start -->
                            <div class="container justify-content-center">
                                <center>
                                    <table style="margin-top: 0px;" id="table02" name="table02">
                                        <?php
                                        echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
                                        $query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE order_status='complete' ORDER BY od_date DESC LIMIT 5";
                                        $query_run_search = mysqli_query($Connector, $query);
                                        $i = 0;
                                        $count = 0;
                                        $c_tot = 0;
                                        $c_profit = 0;

                                        if (mysqli_num_rows($query_run_search) > 0) {

                                            while ($row = mysqli_fetch_array($query_run_search)) {
                                                $i++;
                                                $n = 0;
                                                $price = 0;
                                                $tot = 0;
                                                $profit = 0;
                                                $date = $row['od_date'];

                                                $query1 = "SELECT * FROM `orders` WHERE od_date='$date';";
                                                $query_run_search1 = mysqli_query($Connector, $query1);
                                                while ($row = mysqli_fetch_array($query_run_search1)) {
                                                    $count++;
                                                    $n++;
                                                    $price = $price + $row['price'];
                                                    $tot = $tot + $row['tot'];
                                                    $c_tot = $tot + $c_tot;
                                                    $profit = $tot - $price;
                                                    $c_profit = $c_profit + $profit;
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
                                            echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
                                        } else {
                                            echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
                                        }
                                        ?>
                                    </table>
                                    <a href="./tableView.php?odType=complete">
                                        <button type="button" class="btn btn-bw btn-sm" style=" width: 300px; margin: 10px;">View More</button>
                                    </a>
                                </center>
                            </div>
                            <!-- Table/End -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- right-side/End -->
    </div>
    <!-- Body/End -->
    <!-- Dynamic drop-down script -->
    <script type="text/javascript">
        function FetchDaily2(id) {
            $('#table01').html('');
            $('#table02').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    daily_id21: id
                },
                success: function(data) {
                    $('#table01').html(data);
                }

            })

            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    daily_id22: id
                },
                success: function(data) {
                    $('#table02').html(data);
                }

            })


        }

        function FetchWeekly2(id) {
            $('#table01').html('');
            $('#table02').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    weekly_id21: id
                },
                success: function(data) {
                    $('#table01').html(data);
                }

            })

            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    weekly_id22: id
                },
                success: function(data) {
                    $('#table02').html(data);
                }

            })

        }

        function FetchMonthly2(id) {
            $('#table01').html('');
            $('#table02').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    monthly_id21: id
                },
                success: function(data) {
                    $('#table01').html(data);
                }

            })

            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    monthly_id22: id
                },
                success: function(data) {
                    $('#table02').html(data);
                }

            })

        }
    </script>

</body>

</html>