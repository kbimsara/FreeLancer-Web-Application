<?php

require_once './config.php';

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
        echo "<script>alert('SQL Run successful id.$id')</script>";
        header("Location: ../index.php");
    } else {
        echo "<script>alert('SQL Run unsuccessful id.$id')</script>";
        header("Location: ../Verification-1-user.php");
    }
}
