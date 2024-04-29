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

<body>
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>

    <div class="container-fluid justify-content-center col-11 col-xl-4" style="padding: 0px;">

        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>

        </div>

        <div class="container-fluid" style="margin-bottom: 10px;">
            <div class="row">
                <div class="col-12">
                    <div class="c-card-2 m-1">
                        <div class="top m-1">
                            <div class="user-name">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-count">SEO</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="c-card-2 m-1">
                        <div class="top m-1">
                            <div class="user-name">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-count">SEO</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="c-card-2 m-1">
                        <div class="top m-1">
                            <div class="user-name">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-count">SEO</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="c-card-2 m-1">
                        <div class="top m-1">
                            <div class="user-name">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-count">SEO</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="c-card-2 m-1">
                        <div class="top m-1">
                            <div class="user-name">
                                <span class="s-name">Nuwan_s</span><br>
                                <span class="s-count">SEO</span>
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