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
</head>

<body class="bg-img">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 m-2">
                <div class="container-fluid" style="padding: 0px;padding-left: 5px; margin: 0px; display: inline-flex; text-align: center;">
                    <span class="section-title">
                        <button class="btn btn-light back-btn" onclick="history.back()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                            </svg>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h4 class="text-white">OTP Verification</h4>
            </div>
            <div class="col-11 col-xl-4">
                <div class="c-card-2 bg-white" style="padding: 15px;">
                    <div class="row">
                        <div class="col-12 m-2" style="padding: 10px;">
                            <a href="#" style="color: #1B57ED; margin-right: 20px;margin-left: 20px; text-decoration: underline;">Mobile Verification</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-10 m-2">
                            <div class="icn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                            </div>
                            <input type="text" class="form-control input-pd" id="exampleInputEmail1" placeholder="Enter OTP number">
                        </div>
                        <div class="col-11 col-xl-10 m-2" style="text-align: center;">
                            <p class="txt-xs">We sent a one time password to</p>
                            <p class="txt-s">0751234567</p>
                            <a href="./Mobile-Verification.php">
                                <p class="txt-xs clr">Edit Number</p>
                            </a>
                        </div>
                        <div class="col-12 col-xl-10 m-2" style="text-align: center;">
                            <a href="./Mobile-Verification-4.php">
                                <button type="submit" class="btn btn-primary">Verify and Proceed</button>
                            </a>
                        </div>
                    </div>
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

    </div>

</body>
<!-- Body/End -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</html>