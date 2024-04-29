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

    <title>Admin Panel</title>

</head>

<body><!-- Nav/Start -->
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
                    <div style="position: absolute; top: 60px; right: 45px;">
                        <button type="button" class="btn btn-bw btn-sm">Print</button>
                    </div>
                    <!-- top 4 icon -->
                    <div class="row justify-content-center" style="margin-top: 25px;padding-left: 25px;padding-right: 25px;">
                        <!-- card -->
                        <div class="settng cm-2">
                            <spam class="block-txt-m">
                                <spam class="block-txt-lg">66</spam> New Users Registered
                            </spam>
                        </div>
                        <div class="settng cm-2">
                            <spam class="block-txt-m">
                                <spam class="block-txt-lg">06</spam> Pending verifications
                            </spam>
                        </div>
                        <div class="settng cm-2">
                            <spam class="block-txt-m">
                                <spam class="block-txt-lg">53</spam> Total Reports
                            </spam>
                        </div>
                        <div class="settng cm-2 pd-2">
                            <spam class="block-txt-l sp-line">LKR 1 200 000</spam>
                            <spam class="block-txt-s" style="margin-left: 30px;">Total Sales</spam>
                        </div>

                    </div>
                    <hr style="background-color: black; border: 1px solid black;margin-left: 5px;margin-right: 5px;">
                    <div class="container-fluid justify-content-center">
                        <!-- 3 Radiob Button Line -->
                        <div class="contain-fluid">
                            <center>
                                <div class="radio-block">
                                    <span class="rd-txt">Daily</span>
                                    <input type="radio" class="rd-btn" name="daily" id="daily" value="xyz" checked>
                                </div>
                                <div class="radio-block">
                                    <span class="rd-txt">Weekly</span>
                                    <input type="radio" class="rd-btn" name="daily" id="daily" value="xyz">
                                </div>
                                <div class="radio-block">
                                    <span class="rd-txt">Monthly</span>
                                    <input type="radio" class="rd-btn" name="daily" id="daily" value="xyz">
                                </div>
                            </center>
                        </div>
                        <!-- 3 block -->
                        <div class="contain justify-content-center">
                            <center>
                                <div class="row justify-content-center">
                                    <!-- card -->
                                    <div class="settng cm-2">
                                        <spam class="block-txt-m">
                                            <spam class="block-txt-lg">53</spam> Total Reports
                                        </spam>
                                    </div>
                                    <div class="settng cm-2 pd-2">
                                        <spam class="block-txt-l sp-line">LKR 1 200 000</spam>
                                        <spam class="block-txt-s">Total Sales</spam>
                                    </div>
                                    <div class="settng cm-2 pd-2">
                                        <spam class="block-txt-l sp-line">LKR 1 200 000</spam>
                                        <spam class="block-txt-s">Total Profit</spam>
                                    </div>
                                </div>
                            </center>
                        </div>

                        <!-- Table/start -->
                        <div class="container justify-content-center">
                            <center>
                                <table>
                                    <tr>
                                        <th>Number</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Orders</th>
                                        <th>Sales</th>
                                        <th>Profit</th>
                                    </tr>
                                    <tr>
                                        <td>01.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>02.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>03.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>04.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>05.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>06.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>07.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>08.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>09.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>2023/09/09</td>
                                        <td>00:00</td>
                                        <td>4</td>
                                        <td>24 000</td>
                                        <td>2400</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            <a href="./tableView.php">
                                                <button type="button" class="btn btn-bw btn-sm" style=" width: 300px;">View More</button>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                        <!-- Table/End -->
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