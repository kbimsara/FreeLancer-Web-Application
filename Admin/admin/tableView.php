<?php
$page = "";
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

            <!-- right-side/Start -->
            <div class="col-10">
                <div class="contain box justify-content-center">
                    <!-- Table/start -->
                    <div class="container justify-content-center">
                        <div style="position: absolute; top: 40px; right: 45px;">
                            <button type="button" class="btn btn-bw btn-sm">Print</button>
                        </div>
                        <center>
                            <table>
                                <?php
                                require_once './config.php';

                                if (isset($_GET["odType"])) {
                                    $type = $_GET["odType"];

                                    echo '
                        <tr>
                            <th>Number</th>
                            <th>Date</th>
                            <th>Orders</th>
                            <th>Sales</th>
                            <th>Profit</th>
                        </tr>';
                                    if ($type == 'complete') {
                                        $query = "SELECT * FROM `orders` WHERE order_status='complete' ORDER BY od_date DESC ";
                                    } else {
                                        $query = "SELECT * FROM `orders` WHERE NOT order_status='complete' ORDER BY od_date DESC ";
                                    }
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
                                    }else{
                    
                                        echo '
                                        <tr>
                                            <td colspan="5" style="text-align:center;">No Orders Yet !</td>
                                        </tr>';
                                    }
                                } else {
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
                                    }else{
                                        echo '
        <tr>
            <td colspan="5" style="text-align:center;">No Orders Yet !</td>
        </tr>';
                                    }
                                }

                                ?>
                                <!--
                                <tr>
                                    <td>10.</td>
                                    <td>2023/09/09</td>
                                    <td>00:00</td>
                                    <td>4</td>
                                    <td>24 000</td>
                                    <td>2400</td>
                                    <td>
                                        <a href="./orders-pg-2.php">
                                            <button type="button" class="btn btn-bw btn-sm">View</button>
                                        </a>
                                    </td>
                                </tr>-->
                            </table>
                        </center>
                    </div>
                    <!-- Table/End -->
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