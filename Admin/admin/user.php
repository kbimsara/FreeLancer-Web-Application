<?php
$page = "user";
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
    <!-- msg box -->
    <script src="../assets/sweetalert2.all.min.js"></script>
    <!-- Ajax js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Admin Panel</title>

</head>

<body onload="dt()">
    <script>
        function dt() {
            const date = new Date();

            const months1 = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            let day = date.getDate();
            let month = months1[date.getMonth()];
            let year = date.getFullYear();

            let h = date.getHours();
            let min = date.getMinutes();
            var mm;

            if (min < 10) {
                min = "0" + min;
            } else {
                mm = min;
            }

            if (h < 12) {
                var t = "am";
            } else {
                var t = "pm";
            }

            // This arrangement can be altered based on how we want the date's format to appear.
            var currentDate = `${day} of ${month} ${year}`;
            var currenttime = `${h}:${min} ${t}`;
            document.getElementById("date").innerHTML = currentDate;
            document.getElementById("time").innerHTML = currenttime;
        }
    </script>
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
                <div class="contain box justify-content-center">
                    <div class="container-fluid justify-content-center">
                        <div style="position: absolute; top: 40px; right: 50px;">
                            <button type="button" class="btn btn-bw btn-sm">Print</button>
                        </div>

                        <!-- SEARCH -->
                        <div class="contain-fluid" style="margin-top: 20px;">
                            <center>
                                <input type="email" class="form-control" id="user_name" name="user_name" style="width: 400px; text-align: center; border: solid black; border-radius: 15PX;" placeholder="User Name type here" onchange="FetchUser(this.value)">
                            </center>
                        </div>
                        <!-- Table/start -->
                        <div class="container justify-content-center">
                            <center>
                                <table id="user-tb" name="user-tb" style="text-align: center;">
                                    <?php
                                    require_once './config.php';
                                    echo '
			                            <tr>
			                            	<th>No</th>
			                            	<th>USer ID</th>
			                            	<th>First Name</th>
			                            	<th>Middle Name</th>
			                            	<th>Last Name</th>
			                            	<th>NIC</th>
			                            	<th>Email</th>
			                            	<th>Phone No</th>
			                            	<th>Home Address</th>
			                            	<th>Work Place Address</th>
			                            	<th>Verify</th>
			                            </tr>';

                                    $query = "SELECT * FROM user ORDER BY verification ASC";
                                    $query_run_search = mysqli_query($Connector, $query);
                                    $i = 0;
                                    if (mysqli_num_rows($query_run_search) > 0) {
                                        while ($row = mysqli_fetch_array($query_run_search)) {

                                            $id = $row['user_id'];
                                            $f_name = $row['f_name'];
                                            $m_name = $row['m_name'];
                                            $l_name = $row['l_name'];
                                            $nic = $row['nic'];
                                            $email = $row['email'];
                                            $tp_number = $row['tp_number'];
                                            $home_add = $row['home_add'];
                                            $work_add = $row['work_add'];
                                            $verification = $row['verification'];
                                            //$img = $row['user_img'];

                                            $Status1 = null;
                                            $Status2 = null;
                                            $Status3 = null;

                                            if ($verification == "verify") {
                                                $Status1 = "selected";
                                            } elseif ($verification == "banne") {
                                                $Status2 = "selected";
                                            } elseif ($verification == "unverify") {
                                                $Status3 = "selected";
                                            }

                                            $i++;
                                            echo '
					                            <tr>
                                                    
					                            	<td>' . $i . '</td>
					                            	<td><a href="./user-2.php?user_id='.$id .'">' . $id . '</a></td>
					                            	<td>' . $f_name . '</td>
					                            	<td>' . $m_name . '</td>
					                            	<td>' . $l_name . '</td>
					                            	<td onClick=nic(' . $nic . ')>' . $nic . '</td>
					                            	<td>' . $email . '</td>
					                            	<td>' . $tp_number . '</td>
					                            	<td>' . $home_add . '</td>
					                            	<td>' . $work_add . '</td>
					                            	<td>
                                                        <select class="btn drop-dwn" name="cars" id="cars" onchange="FetchUpdate(this.value)">
                                                            <option>select</option>
                                                            <option value="verify/' . $id . '" ' . $Status1 . '>verify</option>
                                                            <option value="banne/' . $id . '" ' . $Status2 . '>banne</option>
                                                            <option value="unverify/' . $id . '" ' . $Status3 . '>unverify</option>
                                                        </select>
                                                    </td>
					                            </tr>';
                                        }
                                    } else {
                                        echo '
				                                <tr>
				                                	<td colspan="5" style="text-align:center;">No Users Yet !</td>
				                                </tr>';
                                    }
                                    ?>
                                </table>
                            </center>
                        </div>
                        <!-- Table/End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- right-side/End -->
    </div>
    <!-- Dynamic drop-down script -->
    <script type="text/javascript">
        function nic(nn) {
            Swal.fire({
                title: 'NIC',
                text: 'User -> ' + nn,
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
            })
        }

        function FetchUser(id) {
            $('#user-tb').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {
                    user_id: id
                },
                success: function(data) {
                    $('#user-tb').html(data);
                }

            })

        }
        
        //Update User
        function FetchUpdate(v) {
            //$('#user-tb').html('');
            var txt = v.split(/[/]/)
            $.ajax({
                type: 'post',
                url: 'ajaxdata-update.php',
                data: {
                    u_id: txt[1],
                    value: txt[0]
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updates',
                        text: txt[0] + ' !',
                        type: 'success'
                    })
                }

            })

        }
    </script>
    <!-- Body/End -->

</body>

</html>