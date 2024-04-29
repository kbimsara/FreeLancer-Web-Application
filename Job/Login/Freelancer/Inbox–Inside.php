<?php
$page = "Inbox";
$btn = "";
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

    <title>Home</title>
    <!-- Custom css -->
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body style="background-color: #dadada;">
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>

    <div class="container-fluid justify-content-center col-11 col-xl-4 mn" style="padding: 0px;">

        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title clr">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
                Nuwan_s
            </span>
            <span class="section-title float-right clr txt-s" style="margin: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                </svg>
            </span>

        </div>

        <div class="container-fluid" style="margin-bottom: 10px;">
            <div class="row">

                <!-- l-side -->
                <div class="col-12 m-2">
                    <div class="float-left card txt-s col-10 co-xl-8">
                        <div>
                            <p style="margin: 5px;padding: 0px;">Good to meet you!
                                I need a some good design for that</p>
                            <div>
                                <span class="float-right" style="margin: 5px;">6.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- r-side -->
                <div class="col-12 m-2">
                    <div class="float-right card txt-s col-10 co-xl-8">
                        <div>
                            <p style="margin: 5px;padding: 0px; text-align: right;">Good to meet you!
                                I need a some good design for that</p>
                            <div>
                                <span class="float-left" style="margin: 5px;">6.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- l-side -->
                <div class="col-12 m-2">
                    <div class="float-left card txt-s col-10 co-xl-8">
                        <div>
                            <p style="margin: 5px;padding: 0px;">Good to meet you!
                                I need a some good design for that</p>
                            <div>
                                <span class="float-right" style="margin: 5px;">6.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- r-side -->
                <div class="col-12 m-2">
                    <div class="float-right card txt-s col-10 co-xl-8">
                        <div>
                            <p style="margin: 5px;padding: 0px; text-align: right;">Good to meet you!
                                I need a some good design for that</p>
                            <div>
                                <span class="float-left" style="margin: 5px;">6.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- l-side -->
                <div class="col-12 m-2">
                    <div class="float-left card txt-s col-10 co-xl-8">
                        <div>
                            <p style="margin: 5px;padding: 0px;">Good to meet you!
                                I need a some good design for that</p>
                            <div>
                                <span class="float-right" style="margin: 5px;">6.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- r-side -->
                <div class="col-12 m-2">
                    <div class="float-right card txt-s col-10 co-xl-8">
                        <div>
                            <p style="margin: 5px;padding: 0px; text-align: right;">Good to meet you!
                                I need a some good design for that</p>
                            <div>
                                <span class="float-left" style="margin: 5px;">6.00</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center bg-white">

                <div class="col-12 m-1">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type Here">
                </div>
                <div class="row col-12 justify-content-center">
                    <div class="col-3 justify-content-left">
                        <button class="btn clr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg>
                        </button>
                    </div>
                    <div class="col-6">
                        <center>
                            <a href="./Inbox–Create-Offer.php">
                                <button class="btn clr">Create Offer</button>
                            </a>
                        </center>
                    </div>
                    <div class="col-3" style="text-align: right;">
                        <button class="btn clr">Send</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>
    <!-- Body/End -->

    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>