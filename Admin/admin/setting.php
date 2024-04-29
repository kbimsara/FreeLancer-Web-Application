<?php
$page = "setting";
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
    <?php
    require_once './config.php';

    if (isset($_POST["save"])) {
        $pw = $_POST["pw"];
        $sv_charge = $_POST["sv_charge"];
        $gg_c = $_POST["gg_c"];
        $query_update = "UPDATE `admin` SET `password` = '$pw',`service_charge` = '$sv_charge',`gig_count` = '$gg_c' WHERE `admin`.`user_name` = 'admin';";
        $query_updaterun = mysqli_query($Connector, $query_update);

        if ($query_updaterun) {
    ?>
            <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Data Updated!',
                        type: 'success'
                    });
            </script>
    <?php
        }else{
            ?>
                    <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'UnSuccess',
                                text: 'Try Again!',
                            });
                    </script>
            <?php
            }
    }

    $query_search = "SELECT * FROM `admin`;";
    $query_run = mysqli_query($Connector, $query_search);

    while ($row = mysqli_fetch_array($query_run)) {
        $user_name  = $row['user_name'];
        $password = $row['password'];
        $service_charge = $row['service_charge'];
        $gig_count = $row['gig_count'];
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
                            <span class="block-txt-s">#<?php echo "$user_name"; ?></span>
                        </div>
                    </div>
                    <form method="POST">
                        <div class="row justify-content-center" style="margin: 10px;">
                            <div class="col-10 m-2">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="pw" name="pw" value="<?php echo "$password"; ?>" placeholder="Password" required>
                            </div>
                            <div class="col-10 m-2">
                                <label for="exampleInputPassword1">Service Charge</label>
                                <input type="text" class="form-control" id="sv_charge" name="sv_charge" value="<?php echo "$service_charge"; ?>" placeholder="Service Charge" required>
                            </div>
                            <div class="col-10 m-2">
                                <label for="exampleInputPassword1">Gig Count</label>
                                <input type="number" class="form-control" id="gg_c" name="gg_c" placeholder="Count" value="<?php echo "$gig_count"; ?>" required>
                            </div>
                            <div class="col-10 m-2" style="text-align: center;">
                                <button type="submit" class="btn btn-bw" style="width: 100px;" name="save" onclick="sub()">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- right-side/End -->
    </div>
    </div>
    <!-- Body/End -->

</body>

</html>