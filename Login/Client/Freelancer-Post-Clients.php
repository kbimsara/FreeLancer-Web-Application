<?php
$page = "Home";
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
    <div class="container-fluid col-12 col-sm-12 col-md-11 col-lg-10 col-xl-10 justify-content-center" style="padding: 0px;">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/Screenshot 2023-03-15 112529.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
        <div class="container-fluid" style="padding: 10px;">
            <div class="row m-1">

                <div class="l-side col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 bg-white p-card" style="margin-bottom: 10px;">
                    <div class="c-top col-12">
                        <div class="top container-fluid" style="padding-left: 0px;">
                            <div class="user-img" style="padding-left: 0px;">
                                <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                            </div>
                            <div class="user-name" style="padding-left: 0px;">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-count">Logo Design</span>
                            </div>
                        </div>
                        <div class="float-right" style="display: inline-flex; padding: 0px; margin: 0px;">
                            <div class=" bg-br text-light">
                                <span class="star-txt">3.4</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <div class="bg-br text-light">
                                <span class="star-txt"> Starting LKR 2000</span>
                            </div>
                        </div>
                    </div>
                    <div class="c-txt-big">
                        <p class="card-text">
                            We are a team of highly talented and passionate graphic designers with more than 5 years of experience.</p>

                        <p class="card-text">About This Post
                            The above samples in the portfolio are 100% original
                            work done for previous clients on Fiverr.</p>
                        <p class="card-text">

                            Hi, If you want to present your business and brand
                            idea in an engaging way through a modern timeless
                            logo design to stand out in your industry and entice
                            your audience...then you’re at the right spot!

                            Here’s how I work:

                            With in-depth brand research, I put together several
                            modern and timeless logo designs based on your
                            preferences.
                            After the final iteration is agreed upon, I build an
                            industry-leading brand identity, catchy themes, and
                            other items with a personalized touch.


                            Here's why you should collaborate with me:


                            100% original custom logo
                            1000s of satisfied customers
                            High-Quality
                            Quick turnaround
                            Guaranteed creativity
                            24/7 Support
                            Personalized revisions until 100% satisfaction


                            Get started by selecting basic, standard, or premium
                            and clicking continue.


                            If you have any questions please scroll down to the
                            FAQ section or tap the frequently asked questions
                            dropdown menu on mobile. You can also contact me
                            by clicking "Contact Seller" or tapping the chat button
                            on your phone.

                        </p>
                    </div>
                </div>
                <div class="r-side col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="row">
                        <div class="col-12 packeger">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left pack-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Package 01
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                                            <center>
                                                <a href="./order-review.php">
                                                    <button type="button" class="btn btn-primary btn-sm">Continue (LKR 5000)</button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed pack-btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Package 02
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                                            <center>
                                                <a href="./order-review.php">
                                                    <button type="button" class="btn btn-primary btn-sm">Continue (LKR 5000)</button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed pack-btn" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Package 03
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                                            <center>
                                                <a href="./order-review.php">
                                                    <button type="button" class="btn btn-primary btn-sm">Continue (LKR 5000)</button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="c-user-card col-11 p-card bg-white" style="padding: 0px; margin: 10px;">
                            <div class="c-top col-12">
                                <div class="top container-fluid" style="padding-left: 0px;">
                                    <div class="user-img" style="padding-left: 0px;">
                                        <img src="./assets/img/dp1.jfif" class="u-img" alt="Avatar">
                                    </div>
                                    <div class="user-name" style="padding-left: 0px;">
                                        <span class="s-name">Nuwan_s</span><br>
                                        <span class="s-count">Logo Design</span>
                                    </div>
                                </div>
                                <div class="float-right" style="display: inline-flex; padding: 0px; margin: 0px;">
                                    <a href="./c-Freelancer-Profile.php">
                                        <div class=" bg-br text-light">
                                            <span class="star-txt">View Profile</span>
                                        </div>
                                    </a>
                                    <div class="bg-br text-light">
                                        <span class="star-txt">Contact Me</span>
                                    </div>
                                </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>