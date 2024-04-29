<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title bar -->
    <link rel="icon" type="image/png" href="./assets/logo/titlebar_logo.png" />

    <!-- Bootstrap -->
    <link href="./assets/bootstrap-4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="./assets/bootstrap-4.6.2/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <title>Home</title>
    <!-- msg box -->
    <script src="./assets/sweetalert2.all.min.js"></script>
    <!-- Custom css -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- Custom js -->
    <script src="./action/validation.js" type="text/javascript"></script>
</head>

<body>
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <div class="container-fluid col-xl-6 col-12 justify-content-center">
        <!-- Back -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>
        </div>
        <?php
        require_once './action/config.php';

        if (isset($_POST['register_user'])) {

            $fname = $_POST["fname"];
            $mname = $_POST["mname"];
            $lname = $_POST["lname"];
            $nic = $_POST["nic"];
            $email = $_POST["email"];
            $email2 = $_POST["email2"];
            $tp = $_POST["tp"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $home_ads = $_POST["home_ads"];
            $work_ads = $_POST["work_ads"];

            $year = date("Y");
            $month = date("m");
            $year = substr($year, -2);
            $id = $year . $month . "U" . rand();

            $query_insert = "INSERT INTO `user` (`user_id`, `f_name`, `m_name`, `l_name`, `nic`, `email`, `tp_number`, `home_add`, `work_add`, `password`) VALUES ('$id', '$fname', '$mname', '$lname', '$nic', '$email', '$tp', '$home_ads', '$work_ads', '$password');";
            $query_run = mysqli_query($Connector, $query_insert);

            if ($query_run) {
                echo "<script>Swal.fire({
                                icon: 'success',
                                title: 'Successful',
                                text: 'User Account Create Successful!',
                                type: 'success'
                            }).then(function() {
                                window.location = './index.php';
                            })</script>";
            } else {
                echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Unsuccessful',
                                text: 'User Account Create unsuccessful!',
                            })</script>";

            }
        }
        ?>

        <form method="post" onsubmit="userReg()">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control brd m-1" id="fname" name="fname" required placeholder="First Name" onblur="fNameValidate()">
                            <p class="clr txt-s" name="fname_val" id="fname_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control brd m-1" id="mname" name="mname" placeholder="Middle Name (Optional)" onblur="mNameValidate()">
                            <p class="clr txt-s" name="mname_val" id="mname_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control brd m-1" id="lname" name="lname" required required placeholder="Last Name" onblur="lNameValidate()">
                            <p class="clr txt-s" name="lname_val" id="lname_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control brd m-1" id="nic" name="nic" placeholder="NIC (Optional)">
                            <p class="clr txt-s" name="nic_val" id="nic_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control brd m-1" id="email" name="email" required placeholder="Email" onblur="mail1Validate()">
                            <p class="clr txt-s" name="email_val" id="email_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control brd m-1" id="email2" name="email2" required placeholder="Email (Confirmation)" onblur="mail2Validate()">
                            <p class="clr txt-s" name="email2_val" id="email2_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control brd m-1" id="tp" name="tp" required placeholder="Mobile Number" onblur="tpValidate()">
                            <p class="clr txt-s" name="tp_val" id="tp_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control brd m-1" id="password" name="password" required placeholder="Password" onblur="passwordValidate()">
                            <p class="clr txt-s" name="pw_val" id="pw_val"></p>
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control brd m-1" id="password2" name="password2" required placeholder="Password (Confirmation)" onblur="password2Validate()">
                            <p class="clr txt-s" name="pw2_val" id="pw2_val"></p>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control brd m-1" id="home_ads" name="home_ads" rows="4" required placeholder="Home Address" onblur="adsValidate()"></textarea>
                            <p class="clr txt-s" name="home_ads_val" id="home_ads_val"></p>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control brd m-1" id="work_ads" name="work_ads" rows="4" placeholder="Work Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-10 justify-content-center" style="text-align: center;">
                    <button type="submit" class="btn btn-primary m-2 brd" name="register_user">Submit</button>
                </div>

            </div>
        </form>


    </div>

    </div>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</html>