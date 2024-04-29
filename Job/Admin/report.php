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

<body>
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
                        <!-- Radio Button Lines -->
                        <div class="contain-fluid" style="margin-top: 20px; margin-bottom: 20px; padding-bottom: 0px;">
                            <div style="position: absolute; top: 40px; right: 45px;">
                                <button type="button" class="btn btn-bw btn-sm">Print</button>
                            </div>
                            <!-- 4 Radio Button Line -->
                            <div class="row">
                                <div class="col-12" style="padding-left: 30px;margin-bottom: 0px;">
                                    <div class="radio-block">
                                        <span class="rd-txt">Account reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="abc" checked>
                                    </div>
                                    <div class="radio-block">
                                        <span class="rd-txt">Gig reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="abc">
                                    </div>
                                    <div class="radio-block">
                                        <span class="rd-txt">Seller reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="abc">
                                    </div>
                                    <div class="radio-block">
                                        <span class="rd-txt">Client reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="abc">
                                    </div>
                                </div>
                            </div>
                            <hr style="background-color: black; border: 1px solid black;margin-left: 5px;margin-right: 5px;">
                            <!-- 3 Radio Button Line -->
                            <div class="row">
                                <div class="col-4">
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
                                <div class="col-8 justify-content-end" style="display:flex;">
                                    <input type="date" class="form-control btn-bw" name="" id="" style="width: 170px;">
                                    <span class="block-txt-m" style="margin-left: 20px;margin-right: 20px; margin-top: 5px;margin-bottom: 0px;">to</span>
                                    <input type="date" class="form-control btn-bw" name="" id="" style="width: 170px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>

                        <!-- Orders overview -->
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
                                        <th>Action</th>
                                    </tr>
                                    <tr>

                                        <td>01.</td>
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
                                    </tr>
                                    <tr>
                                        <td>02.</td>
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
                                    </tr>
                                    <tr>
                                        <td>03.</td>
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
                                    </tr>
                                    <tr>
                                        <td>04.</td>
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
                                    </tr>
                                    <tr>
                                        <td>05.</td>
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
                                    </tr>
                                    <tr>
                                        <td>06.</td>
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
                                    </tr>
                                    <tr>
                                        <td>07.</td>
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
                                    </tr>
                                    <tr>
                                        <td>08.</td>
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
                                    </tr>
                                    <tr>
                                        <td>09.</td>
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
                                    </tr>
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
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align: center;">
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