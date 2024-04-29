<?php
$page = "orders";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title bar -->
    <link rel="icon" type="image/png" href="../assets/logo/titlebar_logo.png" />

    <!-- Bootstrap -->
    <link href="../assets/bootstrap-4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/bootstrap-4.6.2/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Custom css -->
    <link rel="stylesheet" href="../assets/style.css">

    <title>Admin Panel</title>

</head>

<body>
    <!-- Nav/Start -->
    <?php
    require_once './nav.php'
    ?>
    <!-- Nav/End -->

    <!-- Body/Start -->
    <div class="container-fluid">

        <div class="row">
            <!-- left-side/Start -->
            <div class="col-2 sticky">
                <?php
                require_once './left-side-menu.php'
                ?>
            </div>
            <!-- left-side/End -->

            <!-- right-side/Start -->
            <div class="col-10">
                <div class="contain-fluid box">
                    <div class="container-fluid">
                        <div class="link-bar">
                            <span class="block-txt-s">#order id | #gig id</span>
                        </div>
                    </div>
                    <div class="row" style="margin: 10px;">
                        <!-- Chat ui -->
                        <div class="col-3 chat-left-ui">
                            <div class="container-fluid chat-viewer">
                                <div class="chat-r">
                                    <div class="sp"></div>
                                    <div class="mess mess-r">
                                        <div class="s-line-1">
                                            <span class="block-txt-s">#seller</span>
                                        </div>
                                        <div class="s-line-2">
                                            <span class="block-txt-l">hi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-side">
                                    <div class="u-box">
                                        <div class="u-line-1">
                                            <span class="block-txt-s">#User</span>
                                        </div>
                                        <div class="u-line-2">
                                            <span class="block-txt-l">hi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid chat-txt" style="display: inline-flex;">
                                <input type="text" class="form-control brd-black" id="" placeholder="Type here">
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 5px;">send</button>
                            </div>
                        </div>
                        <!-- Chat ui-right -->
                        <div class="col-9 container-fluid" style="padding-left: 30px;">
                            <!-- Chat ui-3 text block -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="txt-title">
                                        <span class="block-txt-m" style="margin-left: 0px;">Order started</span>
                                    </div>
                                    <div class="time">
                                        <span class="block-txt-s">13:33 PM</span>
                                    </div>
                                    <div class="date">
                                        <span class="block-txt-s">22nd of August 2023</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="txt-title">
                                        <span class="block-txt-m" style="margin-left: 0px;">Order started</span>
                                    </div>
                                    <div class="time">
                                        <span class="block-txt-s">13:33 PM</span>
                                    </div>
                                    <div class="date">
                                        <span class="block-txt-s">22nd of August 2023</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="txt-title">
                                        <span class="block-txt-m" style="margin-left: 0px;">Order started</span>
                                    </div>
                                    <div class="time">
                                        <span class="block-txt-s">13:33 PM</span>
                                    </div>
                                    <div class="date">
                                        <span class="block-txt-s">22nd of August 2023</span>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="margin-top: 10px; padding: 0px;">
                                <div class="repor-title" style="margin-top: 20px;">
                                    <span class="block-txt-m" style="margin-left: 0px; margin-bottom: 10px;">Reports history</span>
                                </div>
                                <div class="box brd-black" style="margin-left: 0px;">
                                    <div class="main-block">
                                        <div class="r-title">
                                            <span class="block-txt-m">2022 / 02 / 22 #seller id / userid</span>
                                        </div>
                                        <div class="r-data">
                                            <span class="block-txt-s">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                                galley of type and scrambled it to make a type specimen book.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="main-block">
                                        <div class="r-title">
                                            <span class="block-txt-m">2022 / 02 / 22 #seller id / userid</span>
                                        </div>
                                        <div class="r-data">
                                            <span class="block-txt-s">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                                galley of type and scrambled it to make a type specimen book.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="main-block">
                                        <div class="r-title">
                                            <span class="block-txt-m">2022 / 02 / 22 #seller id / userid</span>
                                        </div>
                                        <div class="r-data">
                                            <span class="block-txt-s">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                                galley of type and scrambled it to make a type specimen book.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group" style="margin-top: 5px;">
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 5px;">Cancel order</button>
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 15px;">Complete order</button>
                                <button type="button" class="btn btn-bw btn-sm" style=" margin-left: 15px;">View gig</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- right-side/End -->
    </div>
    </div>
    <!-- Body/End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>