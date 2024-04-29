<?php
require_once './action/action-session.php';
require_once './action/config.php';

$user_id = $_SESSION["user_id"];
$seller_id = $_SESSION["seller_id"];

/*
echo "<script>alert('$user_id+$seller_id')</script>";

*/

if ($seller_id == "") {
    //get user id
    $sql = "SELECT * FROM user WHERE user_id= '$user_id';";
    $result = mysqli_query($Connector, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $nic = $row['nic'];
    }
    //nic is or not empty
    if ($nic != "") {

        $nnn = rand(1, 100);
        $sl_id = $nnn .  "SL" . rand(1, 10000);

        $sql3 = "INSERT INTO `seller` (`user_id`, `seller_id`) VALUES ('$user_id', '$sl_id');";
        $result3 = mysqli_query($Connector, $sql3);
        if ($result3) {
            $_SESSION["seller_id"] = $sl_id;
            header("Location: ../Freelancer/home.php");
        } else {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ./Verification-nic-user.php");
    }
} else {
    $sql_sch = "SELECT * FROM seller WHERE user_id= '$user_id';";
    $result_sch = mysqli_query($Connector, $sql_sch);
    while ($row = mysqli_fetch_array($result_sch)) {
        $u_id = $row['user_id'];
        $sl_id = $row['seller_id'];
        if (($user_id == $u_id) and ($seller_id == $sl_id)) {
            header("Location: ../Freelancer/home.php");
            break;
        } else {
            header("Location: ../index.php");
        }
    }
}
/*
$i = 0;
$y = 0;
if ($seller_id != "") {
    $sql = "SELECT * FROM seller;";
    $result = mysqli_query($Connector, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $u_id = $row['user_id'];
        $s_id = $row['seller_id'];
        $y++;
        if (($u_id == $user_id) and ($s_id == $seller_id)) {
            $i++;
            header("Location: ../Freelancer/home.php");
            break;
        }
    }
}
if ($i < 1) {

    $sql2 = "SELECT * FROM user WHERE user_id= '$user_id';";
    $result2 = mysqli_query($Connector, $sql2);
    while ($row = mysqli_fetch_array($result2)) {
        $nic = $row['nic'];
        if ($nic == "") {
            header("Location: ./Verification-nic-user.php");
        } else {
            $sql = "SELECT * FROM seller;";
            $result = mysqli_query($Connector, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $u_id = $row['user_id'];
                $s_id = $row['seller_id'];
                $y++;
                if (($u_id == $user_id) and ($s_id == $seller_id)) {
                    $i++;
                    header("Location: ../Freelancer/home.php");
                    break;
                }
            }
        }
    }
} else {
    $nnn = rand(1, 100);
    $sl_id = $nnn .  "SL" . rand(1, 10000);

    $sql3 = "INSERT INTO `seller` (`user_id`, `seller_id`) VALUES ('$user_id', '$sl_id');";
    $result3 = mysqli_query($Connector, $sql3);
    if ($result3) {
        $_SESSION["seller_id"] = $sl_id;
        header("Location: ../Freelancer/home.php");
    } else {
        header("Location: ../index.php");
    }
}
*/