<?php
$page = "user";
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
            <?php
            require_once './config.php';
            if (isset($_GET["user_id"])) {

                $user_id=$_GET["user_id"];

                $query = "SELECT * FROM user WHERE user_id='$user_id';";
                $query_run_search = mysqli_query($Connector, $query);
                $i = 0;
                if (mysqli_num_rows($query_run_search) > 0) {
                    while ($row = mysqli_fetch_array($query_run_search)) {
                        $id = $row['user_id'];
                        $f_name = $row['f_name'];
                        $m_name = $row['m_name'];
                        $l_name = $row['l_name'];
                        $nic = $row['nic'];
                        $email = $row['email'];
                        $tp_number = $row['tp_number'];
                        $home_add = $row['home_add'];
                        $work_add = $row['work_add'];
                        $user_img	 = $row['user_img'];
                        $verification	 = $row['verification'];
                    }
                }
            }

            ?>

            <!-- right-side/Start -->
            <div class="col-10">
                <div class="contain box justify-content-center">
                    <div class="container-fluid justify-content-center">
                        <!-- userData/start -->
                        <div class="container justify-content-center">
                            <div class="row">
                                <div class="col-12" style="padding: 10px; text-align: center;">
                                    <img src="../../Login/Client/user-dp/<?php echo $user_img; ?>" alt="Avatar" style="height: 150px; width: 150px; border-radius: 50%;">
                                </div>
                                <div class="col-4" style="padding: 10px;">
                                    <h5>User ID</h5>
                                    <span style="margin-left: 10px;"><?php echo $id; ?></span>
                                </div>
                                <div class="col-4" style="padding: 10px;">
                                    <h5>User Name</h5>
                                    <span style="margin-left: 10px;"><?php echo "$email"; ?></span>
                                </div>
                                <div class="col-4" style="padding: 10px;">
                                    <h5>Name</h5>
                                    <span style="margin-left: 10px;"><?php echo "$f_name $m_name $l_name"; ?></span>
                                </div>
                                <div class="col-4" style="padding: 10px;">
                                    <h5>NIC</h5>
                                    <span style="margin-left: 10px;"><?php echo "$nic"; ?></span>
                                </div>
                                <div class="col-4" style="padding: 10px;">
                                    <h5>Phone Number</h5>
                                    <span style="margin-left: 10px;"><?php echo "$tp_number"; ?></span>
                                </div>
                                <div class="col-4" style="padding: 10px;">
                                    <h5>Status</h5>
                                    <span style="margin-left: 10px;"><?php echo "$verification"; ?></span>
                                </div>
                                <div class="col-6" style="padding: 10px;">
                                    <h5>Home Address</h5>
                                    <p style="margin-left: 10px;"><?php echo "$home_add"; ?></p>
                                </div>
                                <div class="col-6" style="padding: 10px;">
                                    <h5>Work Address</h5>
                                    <p style="margin-left: 10px;"><?php echo "$work_add"; ?></p>
                                </div>
                                <div class="col-6" style="padding: 10px;">
                                    <img src="./id/side 1.png" alt="Avatar" style="height: 200px;">
                                </div>
                                <div class="col-6" style="padding: 10px;">
                                    <img src="./id/side 2.png" alt="Avatar" style="height: 200px;">
                                </div>
                            </div>
                        </div>
                        <!-- userData/End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- right-side/End -->
    </div>
    <!-- Body/End -->

</body>

</html>