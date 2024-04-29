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

    <!-- Custom css -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- msg box -->
    <script src="./assets/sweetalert2.all.min.js"></script>

    <title>Admin Panel Login</title>

</head>

<body style="background-color: #c9bbbb;">

    <?php
    require_once './admin/config.php';

    if (isset($_POST['login'])) {
        $email = $_POST["user_name"];
        $pw = $_POST["pw"];

        $query_search = "SELECT * FROM `admin`;";
        $query_run = mysqli_query($Connector, $query_search);

        while ($row = mysqli_fetch_array($query_run)) {
            $user_name = $row['user_name'];
            $password = $row['password'];

            if ($user_name == $email && $password == $pw) {
                header("Location: ./admin/overView.php");
                break;
            }
        }
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Invalide Login',
                    text: 'Check User Name & Password'
                  })
                </script>";
    }
    ?>
    <!-- Body/Start -->
    <div class="container login-body bg-light col-11 col-sm-10 col-md-8 col-lg-6 col-xl-4">
        <center>
            <div class="img">
                <img src="./assets/logo/nav_logo.png" id="login-logo">
            </div>
        </center>
        <div class="log-container">
            <div class="log-header">
                <h3>Login</h3>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="login-txt">Email address</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="login-txt">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw" placeholder="User Password">
                </div>
                <div class="container-fluid log-btn">
                    <button type="submit" class="btn btn-bw btn-side" style="margin: 0px;" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Body/End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>