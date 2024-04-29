<?php
require_once './action/action-session.php';
?>
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

    <title>Login</title>
    <!-- Custom css -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- msg box -->
    <script src="./assets/sweetalert2.all.min.js"></script>
    <!-- Custom js -->
    <script src="./action/validation.js" type="text/javascript"></script>
</head>

<body class="bg-img">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 m-2">
                <h5 class="text-center text-white">A whole world of freelance
                    talent at your fingertips</h5>
            </div>
            <div class="col-12 col-xl-8 text-center text-white">
                <p class="txt-s">Sample text - Find high-quality services at every price point. No hourly rates, just project-based pricing. Find the right freelancer to begin working on your project within minutes. Always know what you'll pay upfront. </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 col-xl-4">
                <div class="c-card-2 bg-white" style="padding: 15px;">
                    <div class="row">
                        <div class="col-12 m-2" style="padding: 10px;">
                            <a href="./index.php" style="color: #1B57ED; margin-right: 20px;margin-left: 20px; text-decoration: underline;">Login</a>
                            <a href="./Verification-1-user.php">Signup</a>
                        </div>
                    </div>
                    <?php
                    require_once './action/config.php';

                    if (isset($_POST['login'])) {

                        $email = $_POST["email"];
                        $pw = $_POST["password"];
                        //echo "<script>alert('1. $email+$pw')</script>";

                        $query_search = "SELECT `user_id`,`email`,`password` FROM `user` WHERE email='$email' AND `password`='$pw';";
                        $query_run = mysqli_query($Connector, $query_search);

                        while ($row = mysqli_fetch_array($query_run)) {
                            $user_id = $row['user_id'];
                            $e = $row['email'];
                            $p = $row['password'];
                            //echo "<script>alert('2. $e+$p')</script>";
                            if ($email == $e || $pw == $p) {
                                //echo "<script>alert('gfgf')</script>";

                                $u_id = "";
                                $s_id = "";
                                $query_search2 = "SELECT * FROM `seller` WHERE user_id='$user_id';";
                                $query_run2 = mysqli_query($Connector, $query_search2);
                                while ($row = mysqli_fetch_array($query_run2)) {
                                    $u_id = $row['user_id'];
                                    $s_id = $row['seller_id'];
                                    //echo "<script>alert('3. $u_id+$s_id')</script>";
                                }
                                if ($query_run2) {
                                    $_SESSION["seller_id"] = $s_id;
                                    $_SESSION["user_id"] = $user_id;
                                    header("Location: ./Client/home.php");
                                    //echo "<script>alert('4.true. $u_id+$s_id')</script>";
                                    break;
                                }/* else {
                                    $_SESSION["seller_id"] = "";
                                    $_SESSION["user_id"] = $user_id;
                                    //header("Location: ./Client/home.php");
                                    echo "<script>alert('5.false. $u_id+$s_id')</script>";
                                    break;
                                }*/
                                //echo "<script>alert('6.true')</script>";
                                break;
                            } else {
                                continue;
                            }
                        }
                        echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalide Login',
                            text: 'Check email & password'
                          })
                            </script>";
                    }
                    ?>
                    <form method="post" onsubmit="login()">

                        <div class="row justify-content-center">
                            <div class="col-12 col-xl-10 m-2">
                                <div class="icn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                    </svg>
                                </div>
                                <input type="email" class="form-control input-pd" id="email" name="email" placeholder="name@example.com" required onblur="mail1Validate()">
                                <p class="txt-s" id="email_val" name="email_val"></p>
                            </div>
                            <div class="col-12 col-xl-10 m-2">
                                <div class="icn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </div>
                                <input type="password" class="form-control input-pd" id="password" name="password" placeholder="Password" required onblur="passwordValidate()">
                                <p class="txt-s" id="pw_val" name="pw_val"></p>
                            </div>
                            <div class="col-11 col-xl-10 m-2">
                                <div class="float-left">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-top: 8px;">
                                    <label class="txt-xs" for="exampleCheck1">Keep me login</label>
                                </div>
                                <div class="float-right">
                                    <a href="./Mobile-Verification-2.php" class="txt-xs" style="color:#1B57ED; margin-top: 0px;">Foget my password</a>
                                </div>
                            </div>
                            <div class="col-12 col-xl-10 m-2" style="text-align: center;">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 m-3" style="text-align: center;">
                <h6>Or Continue with</h6>
            </div>
            <div class="col-12 m-3" style="text-align: center;">
                <button type="submit" class="btn btn-ash brd">
                    <svg id="google" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <path id="Path_185" data-name="Path 185" d="M146.223,110.032a13.448,13.448,0,0,0-.345-3.271H130.55V112.7h9a7.8,7.8,0,0,1-3.338,5.191l-.031.2,4.847,3.68.336.033a15.488,15.488,0,0,0,4.862-11.769" transform="translate(-114.223 -93.677)" fill="#4285f4" />
                        <path id="Path_186" data-name="Path 186" d="M28.51,169.206a15.747,15.747,0,0,0,10.812-3.876l-5.152-3.911a9.8,9.8,0,0,1-5.66,1.6,9.81,9.81,0,0,1-9.288-6.649l-.191.016-5.04,3.822-.066.18a16.351,16.351,0,0,0,14.585,8.818" transform="translate(-12.184 -137.206)" fill="#34a853" />
                        <path id="Path_187" data-name="Path 187" d="M7.038,81.737a9.672,9.672,0,0,1-.544-3.164,10.162,10.162,0,0,1,.526-3.164L7.011,75.2l-5.1-3.884-.167.078a15.681,15.681,0,0,0,0,14.364l5.3-4.018" transform="translate(0 -62.572)" fill="#fbbc05" />
                        <path id="Path_188" data-name="Path 188" d="M28.51,6.187a9.146,9.146,0,0,1,6.313,2.382L39.431,4.16A15.862,15.862,0,0,0,28.51,0,16.351,16.351,0,0,0,13.925,8.818L19.2,12.836A9.851,9.851,0,0,1,28.51,6.187" transform="translate(-12.184 0)" fill="#eb4335" />
                    </svg>

                </button>
            </div>
        </div>
        <script>
            window.addEventListener("load", () => {
                const loader = document.querySelector(".loader");

                loader.classList.add("loader--hidden");

                loader.addEventListener("transitionend", () => {
                    document.body.removeChild(loader);
                });
            });
        </script>
        <div class="loader"></div>

    </div>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</html>