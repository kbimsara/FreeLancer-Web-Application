<?php
$page = "Profile";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- Nav -->
    <?php
    require_once './Page-ex/nav.php';
    ?>
    <div class="container-fluid col-xl-10 col-12 justify-content-center">
        <!-- Back -->
        <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px;">
            <span class="section-title">
                <button class="btn btn-light back-btn" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
            </span>
        </div>
        <form action="./action/action-publish-gig.php" method="post" enctype="multipart/form-data">

            <div class="row justify-content-center">
                <!-- cayagory/service -->
                <div class="col-12 col-xl-10">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="clr">Select category</h5>
                            <p class="txt-xs">Choose the category most suitable
                                for your Gig.</p>
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-12" style="text-align: center;">
                                    <div class="btn-group">
                                        <select id="catagery" name="catagery" class="form-control brd clr dynamic-drop-down" required onchange="FetchCatagery(this.value)">
                                            <option selected>Select Catagery..</option>
                                            <?php
                                            require_once '../action/config.php';
                                            $sql = "SELECT * FROM `category`;";
                                            $result = mysqli_query($Connector, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $c_id = $row['c_id'];
                                                $c_name = $row['c_name'];
                                            ?>
                                                <option value="<?php echo "$c_id"; ?>"><?php echo "$c_name"; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12" style="text-align: center;">
                                    <div class="btn-group">
                                        <select id="service" name="service" class="form-control brd clr dynamic-drop-down" required>
                                            <option selected>Select Service..</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 btn -->
                <div class="col-12 col-xl-10 justify-content-center" style="text-align: center;">
                    <button type="button" class="btn btn-outline-primary m-1 active">Packege 1</button>
                    <button type="button" class="btn btn-outline-primary m-1">Packege 2</button>
                    <button type="button" class="btn btn-outline-primary m-1">Packege 3</button>
                </div>
                <!-- pk name -->
                <div class="col-12 col-xl-10 justify-content-center">
                    <h5 class="clr">Title</h5>
                    <p class="txt-s">As your Gig storefront, your title is the most important place to include keywords that buyers would likely use to search for a service like yours.</p>
                    <textarea class="form-control brd m-1" id="title1" name="title1" rows="1" required></textarea>
                </div>
                <!-- img -->
                <div class="col-12 col-xl-10 justify-content-center">
                <div class="row">
                    <div class="col-12">
                        <h5 class="clr">Images (1st one)</h5>
                        <p class="txt-xs">Get noticed by the right buyers with visual examples of your services.</p>
                    </div>
                    <div class="col-12" style="text-align: center;">
                        <div class="custom-file m-1 col-xl-5 col-11">
                            <input type="file" class="custom-file-input btn-primary clr brd" name="image" id="image">
                            <label class="custom-file-label" for="customFile">Select Image</label>
                        </div>
                    </div>
                </div>
                </div>
                <!-- description -->
                <div class="col-12 col-xl-10 justify-content-center">
                    <h5 class="clr">Description</h5>
                    <p class="txt-s">Briefly Describe Your Gig and service</p>
                    <textarea class="form-control brd m-1" rows="4" id="description1" name="description1"></textarea>
                </div>
                <!-- Price -->
                <div class="col-12 col-xl-10 justify-content-center">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="clr m-1">Set price</h5>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="stPrice1" name="stPrice1" placeholder="LKR 10,000.00">
                        </div>
                    </div>
                </div>
                <!-- duration -->
                <div class="col-12 col-xl-10 justify-content-center">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="clr m-1">Duration</h5>
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" id="duration1" name="duration1" placeholder="5">
                        </div>
                    </div>
                </div>
                <!-- submit btn -->
                <div class="col-12 col-xl-10 justify-content-center" style="text-align: center;">
                    <button type="submit" class="btn btn-primary m-1" name="next">Next</button>
                </div>
            </div>

        </form>


    </div>

    <!-- Dynamic drop-down script -->
    <script type="text/javascript">
        function FetchCatagery(id) {
            $('#service').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    catagery_id: id
                },
                success: function(data) {
                    $('#service').html(data);
                }

            })
        }
    </script>

    <!-- Sticky bar -->
    <?php
    require_once './Page-ex/menu-bar.php';
    ?>
    </div>

</body>
<!-- Body/End -->


</html>