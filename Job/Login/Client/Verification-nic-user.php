<!DOCTYPE html>
<html lang="en">
<?php
require_once './action/action-session.php';
?>

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
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>
        </div>
        <?php
        require_once './action/config.php';

        $user_id = $_SESSION["user_id"];

        $sql = "SELECT * FROM user WHERE user_id='$user_id';";
        $result = mysqli_query($Connector, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $nic_bck = $row['nic_bck'];
            $nic_frnt = $row['nic_frnt'];
            $nic = $row['nic'];
            $user_img = $row['user_img'];
            if($nic==""){
                $nic='placeholder="NIC"';
            }else{
                $nic='value="'.$nic.'"';
            }
        }


        if (isset($_POST['update_user'])) {

            if ($_FILES["image"]["error"] === 4) {
                //gggg
                $nic = $_POST["nic"];

                if ($nic != "") {
                    $query_update = "UPDATE `user` SET `nic` = '$nic' WHERE user_id = '$user_id';";
                    $query_run2 = mysqli_query($Connector, $query_update);

                    if ($query_run2) {
                        echo "<script>Swal.fire({
                                    icon: 'success',
                                    title: 'Save Changes',
                                    text: 'User Account Updated!',
                                    type: 'success'
                                }).then(function() {
                                    window.location = './user-acc.php';
                                })</script>";
                    } else {
                        echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'Unsuccessful',
                                    text: 'User Account Update unsuccessful!',
                                })</script>";
                    }
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'All Fields are Empty',
                                })</script>";
                }
            } else {

                $fname = $_FILES['image']['name'];
                $ftype = $_FILES['image']['type'];
                $fsize = $_FILES['image']['size'];
                $temp_name = $_FILES['image']['tmp_name'];

                $validImageExtention = ['jpg', 'jpeg', 'png'];
                $imageExtention = explode('.', $fname);
                $imageExtention = strtolower(end($imageExtention));
                if (!in_array($imageExtention, $validImageExtention)) {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'Invalid Image Extention',
                                })</script>";
                } else if ($fsize > 100000000) {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'Image Size is Too large',
                                })</script>";
                } else {
                    $newImageName = $user_id;
                    $newImageName = $newImageName . '.' . $imageExtention;

                    if ($user_img != "") {
                        $pathhd=getcwd();
                        $path_img="./user-dp/";
                        unlink("$path_img.$user_img");
                    }


                    move_uploaded_file($temp_name, './user-dp/' . $newImageName);

                    //gggg
                    $nic = $_POST["nic"];

                    $query_update = "UPDATE `user` SET `nic` = '$nic',`user_img` = '$newImageName ' WHERE `user_id` = '$user_id';";
                    $query_run2 = mysqli_query($Connector, $query_update);

                    if ($query_run2) {
                        echo "<script>Swal.fire({
                                        icon: 'success',
                                        title: 'Save Changes',
                                        text: 'User Account Updated!',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = './user-acc.php';
                                    })</script>";
                    } else {
                        echo "<script>Swal.fire({
                                        icon: 'error',
                                        title: 'Unsuccessful',
                                        text: 'User Account Update unsuccessful!',
                                    })</script>";
                    }
                }
            }
            if($_FILES["nicfrnt"]["error"] < 4){

                $fname = $_FILES['nicfrnt']['name'];
                $ftype = $_FILES['nicfrnt']['type'];
                $fsize = $_FILES['nicfrnt']['size'];
                $temp_name = $_FILES['nicfrnt']['tmp_name'];

                $validImageExtention = ['jpg', 'jpeg', 'png'];
                $imageExtention = explode('.', $fname);
                $imageExtention = strtolower(end($imageExtention));
                if (!in_array($imageExtention, $validImageExtention)) {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'Invalid NIC Front Image Extention',
                                })</script>";
                } else if ($fsize > 100000000) {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'NIC Front Image Size is Too large',
                                })</script>";
                } else {
                    $newImageName = $user_id."nicfn";
                    $newImageName = $newImageName . '.' . $imageExtention;

                    // if ($nic_frnt != "") {
                    //     $pathhd=getcwd();
                    //     $path_img="./nic/";
                    //     unlink("$path_img.$newImageName");
                    // }


                    move_uploaded_file($temp_name, './nic/' . $newImageName);

                    //gggg
                    $nic = $_POST["nic"];

                    $query_update = "UPDATE `user` SET `nic_frnt` = '$newImageName' WHERE `user_id` = '$user_id';";
                    $query_run2 = mysqli_query($Connector, $query_update);

                    if ($query_run2) {
                        echo "<script>Swal.fire({
                                        icon: 'success',
                                        title: 'Save Changes',
                                        text: 'User Account Updated!',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = './user-acc.php';
                                    })</script>";
                    } else {
                        echo "<script>Swal.fire({
                                        icon: 'error',
                                        title: 'Unsuccessful',
                                        text: 'User Account Update unsuccessful!',
                                    })</script>";
                    }
                }

            }
            if($_FILES["nicbck"]["error"] < 4){

                $fname = $_FILES['nicbck']['name'];
                $ftype = $_FILES['nicbck']['type'];
                $fsize = $_FILES['nicbck']['size'];
                $temp_name = $_FILES['nicbck']['tmp_name'];

                $validImageExtention = ['jpg', 'jpeg', 'png'];
                $imageExtention = explode('.', $fname);
                $imageExtention = strtolower(end($imageExtention));
                if (!in_array($imageExtention, $validImageExtention)) {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'Invalid NIC Back Image Extention',
                                })</script>";
                } else if ($fsize > 100000000) {
                    echo "<script>Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: 'NIC Front Back Size is Too large',
                                })</script>";
                } else {
                    $newImageName = $user_id."nicbk";
                    $newImageName = $newImageName . '.' . $imageExtention;

                    // if ($nic_bck != "") {
                    //     $pathhd=getcwd();
                    //     $path_img="./nic/";
                    //     unlink("$path_img.$newImageName");
                    // }


                    move_uploaded_file($temp_name, './nic/' . $newImageName);

                    $query_update = "UPDATE `user` SET `nic_bck` = '$newImageName' WHERE `user_id` = '$user_id';";
                    $query_run2 = mysqli_query($Connector, $query_update);

                    if ($query_run2) {
                        echo "<script>Swal.fire({
                                        icon: 'success',
                                        title: 'Save Changes',
                                        text: 'User Account Updated!',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = './user-acc.php';
                                    })</script>";
                    } else {
                        echo "<script>Swal.fire({
                                        icon: 'error',
                                        title: 'Unsuccessful',
                                        text: 'User Account Update unsuccessful!',
                                    })</script>";
                    }
                }

            }
        }
        ?>

        <form method="post" onsubmit="userReg()" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="row">
                        <div class="col-12">
                            <div class="custom-file m-1 col-xl-12 col-11">
                                <input type="file" class="custom-file-input btn-primary clr brd" name="image"
                                    id="image">
                                <label class="custom-file-label" for="customFile">Select Profile Picture</label>
                            </div>
                            <p class="clr txt-s" name="fname_val" id="fname_val">Optional</p>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control brd m-1" id="nic" name="nic" <?php echo $nic; ?>>
                            <p class="clr txt-s" name="nic_val" id="nic_val">This step require to be a seller</p>
                        </div>
                        <div class="col-12">
                            <div class="custom-file m-1 col-xl-12 col-11">
                                <input type="file" class="custom-file-input btn-primary clr brd" name="nicfrnt"
                                    id="nicfrnt">
                                <label class="custom-file-label" for="customFile">Select Profile Picture</label>
                            </div>
                            <p class="clr txt-s" name="fname_val" id="fname_val">Front side</p>
                        </div>
                        <div class="col-12">
                            <div class="custom-file m-1 col-xl-12 col-11">
                                <input type="file" class="custom-file-input btn-primary clr brd" name="nicbck"
                                    id="nicbck">
                                <label class="custom-file-label" for="customFile">Select Profile Picture</label>
                            </div>
                            <p class="clr txt-s" name="fname_val" id="fname_val">Back side</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-10 justify-content-center" style="text-align: center;">
                    <button type="submit" class="btn btn-primary m-2 brd" name="update_user">Save</button>
                </div>

            </div>
        </form>


    </div>

    </div>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>


</html>