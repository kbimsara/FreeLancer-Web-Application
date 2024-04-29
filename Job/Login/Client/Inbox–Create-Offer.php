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

<body style="background-color: #dadada; ">
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>

    <div class="container-fluid col-12 col-xl-10 justify-content-center">

        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title clr">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
                Create an Offer
            </span>

        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="brd bg-white m-1">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row" style="margin: 5px;">
                                <div class="col-8">
                                    <h5>Sellect your Gig</h5>
                                </div>
                                <div class="col-4" style="text-align: right;">
                                    <h6 class="red" style="margin-top: 5px;">Change</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Top Sellers/Card-->
                        <div class="card m-4 c-card-2" style="width: 18rem;">
                            <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="card-img-top brd" alt="Responsive image">
                            <div class="card-body brd" style="padding: 0px;">
                                <div class="top">
                                    <div class="user-img">
                                        <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                    </div>
                                    <div class="user-name">
                                        <span class="s-name">Nuwan_s</span><br>
                                        <span class="s-count">Completed orders - 45</span>
                                    </div>
                                </div>
                                <div class="mid">
                                    <p class="card-text c-txt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="c-bottom">
                                    <div class="float-left bg-br text-light">
                                        <span class="star-txt">3.4</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                    </div>
                                    <div class="float-right bg-br text-light">
                                        <span class="star-txt">LKR 2000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row bg-white brd m-1" style="padding: 10px;">
                            <div class="col-12">
                                <h5>Set a offer</h5>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-5">
                                        <h6 style="margin-top: 10px;">subtotal</h6>
                                    </div>
                                    <div class="col-7" style="display: inline-flex;">
                                        <h6 style="margin-top: 10px; margin-right: 5px;">LKR</h6>
                                        <input type="text" class="form-control" placeholder="1000.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-5">
                                        <h6 style="margin-top: 10px;">Delevary Time</h6>
                                    </div>
                                    <div class="col-7" style="text-align: right;">
                                        <h6 style="margin-top: 10px;">Select</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-5">
                                        <h6 style="margin-top: 10px;">Total</h6>
                                    </div>
                                    <div class="col-7" style="text-align: right;">
                                        <h5 style="margin-top: 5px;">LKR 1500</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white brd m-2" style="padding: 10px;">
                            <div class="col-12">
                                <h5>Describe your offer</h5>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control brd" rows="5"></textarea>
                            </div>
                            <div class="col-12" style="padding: 5px;">
                                <center>
                                    <button type="button" class="btn btn-primary brd">send offer</button>
                                </center>
                            </div>
                        </div>
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