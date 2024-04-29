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

        const months1 = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];

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
                        <!-- Radio Button Lines -->
                        <div class="contain-fluid" style="margin-top: 20px; margin-bottom: 20px; padding-bottom: 0px;">
                            <!-- Print -->
                            <div style="position: absolute; top: 40px; right: 45px;">
                                <button type="button" class="btn btn-bw btn-sm">Print</button>
                            </div>
                            <!-- 4 Radio Button Line -->
                            <div class="row">
                                <div class="col-12" style="padding-left: 30px;margin-bottom: 0px;">
                                    <div class="radio-block">
                                        <span class="rd-txt">Account reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="acc" checked
                                            onchange="check(this.value)">
                                    </div>
                                    <div class="radio-block">
                                        <span class="rd-txt">Gig reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="gig"
                                            onchange="check(this.value)">
                                    </div>
                                    <div class="radio-block">
                                        <span class="rd-txt">Seller reports</span>
                                        <input type="radio" class="rd-btn" name="dd" id="dd" value="sl"
                                            onchange="check(this.value)">
                                    </div>
                                    <a href="#" class="disable-link">
                                        <div class="radio-block">
                                            <span class="rd-txt">Client reports</span>
                                            <input type="radio" class="rd-btn" name="dd" id="dd" value="cl"
                                                onchange="check(this.value)">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <hr
                                style="background-color: black; border: 1px solid black;margin-left: 5px;margin-right: 5px;">
                            <!-- 3 Radio Button Line -->
                            <div class="row">
                                <div class="col-4">
                                    <center>
                                        <div class="radio-block">
                                            <span class="rd-txt">Daily</span>
                                            <input type="radio" class="rd-btn" name="daily" id="daily" value="daily"
                                                checked onchange="FetchDuration(this.value)">
                                        </div>
                                        <div class="radio-block">
                                            <span class="rd-txt">Weekly</span>
                                            <input type="radio" class="rd-btn" name="daily" id="daily" value="weekly"
                                                onchange="FetchDuration(this.value)">
                                        </div>
                                        <div class="radio-block">
                                            <span class="rd-txt">Monthly</span>
                                            <input type="radio" class="rd-btn" name="daily" id="daily" value="monthly"
                                                onchange="FetchDuration(this.value)">
                                        </div>
                                    </center>
                                </div>
                                <div class="col-8 justify-content-end" style="display:flex;">
                                    <input type="date" class="form-control" name="fromdt" id="fromdt"
                                        style="width: 170px;" onchange="check(this.value)">
                                    <span class="block-txt-m"
                                        style="margin-left: 20px;margin-right: 20px; margin-top: 5px;margin-bottom: 0px;">to</span>
                                    <input type="date" class="form-control" name="todt" id="todt"
                                        style="width: 170px; margin-right: 10px;" onchange="check(this.value)">
                                </div>
                            </div>
                        </div>

                        <!-- Orders overview -->
                        <!-- Table/start -->
                        <div class="container justify-content-center">
                            <center>
                                <table id="table" name="table">
                                    <?php
                                    require_once './config.php';


                                    $query = "SELECT * FROM `report` WHERE rp_type='acc' AND rp_date ORDER BY `rp_date` DESC;";
                                    $query_run_search = mysqli_query($Connector, $query);
                                    $i = 0;
                                    if (mysqli_num_rows($query_run_search) > 0) {
                                    echo '	
                                        <tr>
                                            <th>No.</th>
                                            <th>Report ID</th>
                                            <th>User ID</th>
                                            <th>Seller ID</th>
                                            <th>Report Type</th>
                                            <th>Report Date</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>';
                                        while ($row = mysqli_fetch_array($query_run_search)) {

                                            $rp_id = $row['rp_id'];
                                            $user_id = $row['user_id'];
                                            $seller_id = $row['seller_id'];
                                            $rp_type = $row['rp_type'];
                                            $rp_description = $row['rp_description'];
                                            $rp_status = $row['rp_status'];
                                            $rp_date = $row['rp_date'];

                                            $i++;

                                            echo '
                                                <tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $rp_id . '</td>
                                                    <td>' . $user_id . '</td>
                                                    <td>' . $seller_id . '</td>
                                                    <td>' . $rp_type     . '</td>
                                                    <td>' . $rp_date . '</td>
                                                    <td>' . $rp_description . '</td>
                                                    <td>
                                                        <a href="./orders-pg-2.php?rp_id=' . $rp_id . '">
                                                            <button type="button" class="btn btn-bw btn-sm">View</button>
                                                        </a>
                                                    </td>
                                                </tr>';
                                        }
                                    } else {
                                        echo '	
                                            <tr>
                                                <th>No.</th>
                                                <th>Report ID</th>
                                                <th>User ID</th>
                                                <th>Seller ID</th>
                                                <th>Report Type</th>
                                                <th>Report Date</th>
                                                <th>rp_description</th>
                                                <th>Action</th>
                                            </tr>';
                                            echo '
                                                <tr>
                                                    <td colspan="8" style="text-align:center;">No Orders Yet !</td>
                                                </tr>';
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
            </div>
        </div>
        <!-- right-side/End -->
    </div>
    <!-- Dynamic drop-down script -->
    <script type="text/javascript">
    // function msg(id){
    //     $.ajax({
    //         type: 'post',
    //         url: 'ajaxdata.php',
    //         data: {
    //             rpid: id,
    //         },
    //         success: function(data) {
    //             $('#table').html(data);
    //         }
    //     })
    // }
    function FetchDuration(id) {

        var report_type = document.querySelector('input[name="dd"]:checked');
        var duration = document.querySelector('input[name="daily"]:checked');
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

        //alert(report_type.value + "+" + from + "+" + to + "+" + duration.value);

        $('#table').html('');
        $.ajax({
            type: 'post',
            url: 'ajaxdata.php',
            data: {
                rdid: id,
                fr: from,
                to: to,
                report_type: report_type.value,
                duration: duration.value
            },
            success: function(data) {
                $('#table').html(data);
            }

        })


    }

    function check(id) {
        FetchDuration(id);
    }
    </script>
    <!-- Body/End -->

</body>

</html>