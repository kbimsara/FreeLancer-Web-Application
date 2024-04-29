<?php

require_once './config.php';
require_once './action-session.php';

if (isset($_POST['post_rq'])) {

    $u_id = $_SESSION["user_id"];
    $ct = $_POST["catagery"];
    $about = $_POST["aboutjb"];
    $price = $_POST["stprice"];
    $time = date("Y/m/d");
    $du = $_POST["duration"];
    $tot = $price+$price*0.05;

    $nn = rand(1, 10);
    $id = $nn . "RQ" . rand();

    //INSERT INTO `request_post` (`rq_id`, `c_id`, `user_id`, `description`, `time`, `subtot`, `tot`) VALUES ('asdvSD', '1', '2304U28365', 'ASDFVGASFDV', 'dfDF', 'dfSDF', 'dfDF');
    $sql = "INSERT INTO `request_post` VALUES ('$id', '$ct', '$u_id', '$about', '$time', '$price', '$tot')";
    $result = mysqli_query($Connector, $sql);


    if ($result) {
        echo "<script>alert('You have successfully posted')</script>";
        header("Location: ../home.php");
    } else {
        echo "<script>alert('You have un-successfully register')</script>";
        header("Location: ../home.php");
    }
}
