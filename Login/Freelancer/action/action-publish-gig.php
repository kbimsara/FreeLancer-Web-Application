<?php

require_once './config.php';
require_once './action-session.php';


if (isset($_POST['next'])) {

    $sl_id = $_SESSION["seller_id"];
    $s_id = $_POST["service"];
    $title = $_POST["title1"];
    $description1 = $_POST["description1"];
    $stPrice1 = $_POST["stPrice1"];
    $duration1 = $_POST["duration1"];

    $nnn = rand(1, 100);
    $id = $nnn .  "gg" . rand(1, 10000);

    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist');</script>";
    } else {

        $fname = $_FILES['image']['name'];
        $ftype = $_FILES['image']['type'];
        $fsize = $_FILES['image']['size'];
        $temp_name = $_FILES['image']['tmp_name'];

        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtention = explode('.', $fname);
        $imageExtention = strtolower(end($imageExtention));
        if (!in_array($imageExtention, $validImageExtention)) {
            echo "<script>alert('Invalid Image Extention');</script>";
        } else if ($fsize > 100000000) {
            echo "<script>alert('Image Size is Too large');</script>";
            header("Location: ../Creating-gig-1–1.php");
        } else {
            $newImageName = uniqid();
            $newImageName = $newImageName . '.' . $imageExtention;

            move_uploaded_file($temp_name, '../img/' . $newImageName);

            $query_insert = "INSERT INTO `gig` (`gig_id`,`s_id`, `p1_title`, `package_1`,  `p1_delivery`,`p1_description`, `seller_id`, `img`) VALUES ('$id', '$s_id','$title', '$stPrice1','$duration1','$description1', '$sl_id', '$newImageName');";
            $query_run = mysqli_query($Connector, $query_insert);

            if ($query_run) {
                $_SESSION["gig_id"] = $id;
                echo "<script>alert('SQL Run successful id.$id')</script>";
                header("Location: ../Creating-gig-1–2.php");
            } else {
                echo "<script>alert('SQL Run unsuccessful id.$id')</script>";
                header("Location: ../Creating-gig-1–1.php");
            }
        }
    }
}
if (isset($_POST['next2'])) {

    $gig_id = $_SESSION["gig_id"];
    $title2 = $_POST["title2"];
    $description2 = $_POST["description2"];
    $stPrice2 = $_POST["stPrice2"];
    $duration2 = $_POST["duration2"];

    if ($_FILES["image2"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist');</script>";
    } else {

        $fname = $_FILES['image2']['name'];
        $ftype = $_FILES['image2']['type'];
        $fsize = $_FILES['image2']['size'];
        $temp_name = $_FILES['image2']['tmp_name'];

        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtention = explode('.', $fname);
        $imageExtention = strtolower(end($imageExtention));
        if (!in_array($imageExtention, $validImageExtention)) {
            echo "<script>alert('Invalid Image Extention');</script>";
            header("Location: ../Creating-gig-1–1.php");
        } else if ($fsize > 100000000) {
            echo "<script>alert('Image Size is Too large');</script>";
            header("Location: ../Creating-gig-1–1.php");
        } else {
            $newImageName2 = uniqid();
            $newImageName2 = $newImageName2 . '.' . $imageExtention;

            move_uploaded_file($temp_name, '../img/' . $newImageName2);

            $query_update = "UPDATE `gig` SET `p2_title` = '$title2', `package_2` = '$stPrice2', `p2_delivery` = '$duration2', `p2_description` = '$description2', `img2` = '$newImageName2' WHERE `gig`.`gig_id` = '$gig_id'";
            $query_run2 = mysqli_query($Connector, $query_update);

            if ($query_run2) {
                echo "<script>alert('SQL Run successful id')</script>";
                header("Location: ../Creating-gig-1–3.php");
            } else {
                echo "<script>alert('SQL Run unsuccessful id.$id')</script>";
                header("Location: ../Creating-gig-1–1.php");
            }
        }
    }
}
if (isset($_POST['next3'])) {

    $gig_id = $_SESSION["gig_id"];
    $title3 = $_POST["title3"];
    $description3 = $_POST["description3"];
    $stPrice3 = $_POST["stPrice3"];
    $duration3 = $_POST["duration3"];

    if ($_FILES["image3"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist');</script>";
    } else {

        $fname = $_FILES['image3']['name'];
        $ftype = $_FILES['image3']['type'];
        $fsize = $_FILES['image3']['size'];
        $temp_name = $_FILES['image3']['tmp_name'];

        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtention = explode('.', $fname);
        $imageExtention = strtolower(end($imageExtention));
        if (!in_array($imageExtention, $validImageExtention)) {
            echo "<script>alert('Invalid Image Extention');</script>";
            header("Location: ../Creating-gig-1–3.php");
        } else if ($fsize > 100000000) {
            echo "<script>alert('Image Size is Too large');</script>";
            header("Location: ../Creating-gig-1–3.php");
        } else {
            $newImageName3 = uniqid();
            $newImageName3 = $newImageName3 . '.' . $imageExtention;

            move_uploaded_file($temp_name, '../img/' . $newImageName3);

            $query_update = "UPDATE `gig` SET `p3_title` = '$title3', `package_3` = '$stPrice3', `p3_delivery` = '$duration3', `p3_description` = '$description3', `img3` = '$newImageName3' WHERE `gig`.`gig_id` = '$gig_id'";
            $query_run3 = mysqli_query($Connector, $query_update);

            if ($query_run3) {
                header("Location: ../Creating-gig-2.php");
            } else {
                header("Location: ../Creating-gig-1–3.php");
            }
        }
    }
}
