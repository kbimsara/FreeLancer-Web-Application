<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="./bootstrap-4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="./bootstrap-4.6.2/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Custom css -->
    <link rel="stylesheet" href="./style.css">

    <title>Admin Panel</title>

</head>

<body>
    <!-- Nav/Start -->
    <?php
    require_once '../admin/nav.php'
    ?>
    <!-- Nav/End -->

    <!-- Body/Start -->
    <div class="container-fluid">

        <div class="row">
            <!-- lest-side/Start -->
            <?php
            require_once '../admin/left-side-menu.php'
            ?>
            <!-- lest-side/End -->
            <!-- right-side/Start -->
            <div class="col-9">.col-6 .col-md-4</div>
            <!-- right-side/End -->
        </div>
    </div>
    <!-- Body/End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>