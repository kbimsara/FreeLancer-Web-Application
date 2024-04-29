<?php
require_once '../action/config.php';

if (isset($_POST['catagery_id'])) {
	$a = $_POST['catagery_id'];
	$query = "SELECT * FROM `service` where c_id= '$a' ";
	$query_run_search = mysqli_query($Connector, $query);
	

	if (mysqli_num_rows($query_run_search) > 0) {

		echo '<option value="">Select Service..</option>';
		while ($row = mysqli_fetch_array($query_run_search)) {
			echo '<option value=' . $row['s_id'] . '>' . $row['s_name'] . '</option>';
		}
	} else {
		echo '<option value="">No Service Found</option>';
	}
}
