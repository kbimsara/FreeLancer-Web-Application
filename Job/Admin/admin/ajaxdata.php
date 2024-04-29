<?php
require_once './config.php';

if (isset($_POST['daily_id'])) {
	if (isset($_POST['fr'])) {
		$fr = $_POST['fr'];
		$to = $_POST['to'];
		$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE od_date BETWEEN '$fr' AND '$to' ORDER BY od_date DESC;";
	} else {
		$query = "SELECT DISTINCT(od_date) AS od_date FROM orders ORDER BY od_date DESC;";
	}
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$price = 0;
			$tot = 0;
			$profit = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date' ";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['weekly_id'])) {
	if (isset($_POST['fr'])) {
		$fr = $_POST['fr'];
		$to = $_POST['to'];
		$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE od_date BETWEEN '$fr' AND '$to' ORDER BY od_date DESC;";
	} else {
		$txt = null;
		$query = "SELECT DISTINCT(od_date) AS od_date FROM orders ORDER BY od_date DESC;";
	}
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	//$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE od_date BETWEEN '$fr' AND '$to' ORDER BY od_date DESC;";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date' ";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			if ($i % 7 == 0) {
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $date . '</td>
						<td>' . $n . '</td>
						<td>' . $tot . '</td>
						<td>' . $profit . '</td>
					</tr>';
				$price = 0;
				$tot = 0;
				$profit = 0;
			}
		}
		if ($i < 7) {
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
			$price = 0;
			$tot = 0;
			$profit = 0;
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['monthly_id'])) {
	if (isset($_POST['fr'])) {
		$fr = $_POST['fr'];
		$to = $_POST['to'];
		$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE od_date BETWEEN '$fr' AND '$to' ORDER BY od_date DESC;";
	} else {
		$txt = null;
		$query = "SELECT DISTINCT(od_date) AS od_date FROM orders ORDER BY od_date DESC;";
	}
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date' ";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			if ($i % 30 == 0) {
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $date . '</td>
						<td>' . $n . '</td>
						<td>' . $tot . '</td>
						<td>' . $profit . '</td>
					</tr>';
				$price = 0;
				$tot = 0;
				$profit = 0;
			}
		}
		if ($i < 30) {
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
			$price = 0;
			$tot = 0;
			$profit = 0;
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
}
//page-2
elseif (isset($_POST['daily_id21'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE NOT order_status='complete' ORDER BY od_date DESC LIMIT 5";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$price = 0;
			$tot = 0;
			$profit = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date' ";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['daily_id22'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE order_status='complete' ORDER BY od_date DESC LIMIT 5";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$price = 0;
			$tot = 0;
			$profit = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date';";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['weekly_id21'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE NOT order_status='complete' ORDER BY od_date DESC LIMIT 5";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date';";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			if ($i % 7 == 0) {
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $date . '</td>
						<td>' . $n . '</td>
						<td>' . $tot . '</td>
						<td>' . $profit . '</td>
					</tr>';
				$price = 0;
				$tot = 0;
				$profit = 0;
			}
		}
		if ($i < 7) {
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
			$price = 0;
			$tot = 0;
			$profit = 0;
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['weekly_id22'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE order_status='complete' ORDER BY od_date DESC LIMIT 5";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date' AND order_status='complete'";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			if ($i % 7 == 0) {
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $date . '</td>
						<td>' . $n . '</td>
						<td>' . $tot . '</td>
						<td>' . $profit . '</td>
					</tr>';
				$price = 0;
				$tot = 0;
				$profit = 0;
			}
		}
		if ($i < 7) {
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
			$price = 0;
			$tot = 0;
			$profit = 0;
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['monthly_id21'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE NOT order_status='complete' ORDER BY od_date DESC LIMIT 5";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date'";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			if ($i % 30 == 0) {
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $date . '</td>
						<td>' . $n . '</td>
						<td>' . $tot . '</td>
						<td>' . $profit . '</td>
					</tr>';
				$price = 0;
				$tot = 0;
				$profit = 0;
			}
		}
		if ($i < 30) {
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
			$price = 0;
			$tot = 0;
			$profit = 0;
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
} elseif (isset($_POST['monthly_id22'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders WHERE order_status='complete' ORDER BY od_date DESC LIMIT 5";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	$count = 0;
	$c_tot = 0;
	$c_profit = 0;

	if (mysqli_num_rows($query_run_search) > 0) {

		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$n = 0;
			$date = $row['od_date'];

			$query1 = "SELECT * FROM `orders` WHERE od_date='$date';";
			$query_run_search1 = mysqli_query($Connector, $query1);
			while ($row = mysqli_fetch_array($query_run_search1)) {
				$count++;
				$n++;
				$price = $price + $row['price'];
				$tot = $tot + $row['tot'];
				$c_tot = $tot + $c_tot;
				$profit = $tot - $price;
				$c_profit = $c_profit + $profit;
			}
			if ($i % 30 == 0) {
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $date . '</td>
						<td>' . $n . '</td>
						<td>' . $tot . '</td>
						<td>' . $profit . '</td>
					</tr>';
				$price = 0;
				$tot = 0;
				$profit = 0;
			}
		}
		if ($i < 30) {
			echo '
				<tr>
					<td>' . $i . '</td>
					<td>' . $date . '</td>
					<td>' . $n . '</td>
					<td>' . $tot . '</td>
					<td>' . $profit . '</td>
				</tr>';
			$price = 0;
			$tot = 0;
			$profit = 0;
		}
		echo '<script>
				document.getElementById("ord_count").innerHTML = ' . "$count" . ';
				document.getElementById("tot").innerHTML = "LKR ' . "$c_tot" . '";
				document.getElementById("profit").innerHTML = "LKR ' . "$c_profit" . '";
			</script>';
	} else {
		echo '
			<tr>
				<td colspan="5" style="text-align:center;">No Orders Yet !</td>
			</tr>';
	}
}
//User data
elseif (isset($_POST['user_id'])) {
	$user_id = $_POST['user_id'];
	if ($user_id == '') {
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

				$i++;
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
				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $id . '</td>
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
	} else {
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

		$query = "SELECT * FROM user WHERE email LIKE '%$user_id%';";
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
						<td>' . $id . '</td>
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
	}

	//---------------------------------------------------
}
//new radio button
elseif (isset($_POST['rdid'])) {
	$report_type = $_POST['report_type'];
	$duration = $_POST['duration'];
	$fr = $_POST['fr'];
	$to = $_POST['to'];
	echo '	
		<tr>
			<th>No.</th>
			<th>Report ID</th>
			<th>User ID</th>
			<th>Seller ID</th>
			<th>Report Type</th>
			<th>Report Date</th>
			<th>description</th>
			<th>Action</th>
		</tr>';

	switch ($duration) {
		case "daily":
			$count = null;
			break;
		case "weekly":
			$count = " LIMIT 7";
			break;
		case "monthly":
			$count = " LIMIT 31";
			break;
	}

	switch ($report_type) {
		case "acc":
			$rtp = " rp_type='acc' AND";
			break;
		case "gig":
			$rtp = " rp_type='gig' AND";
			break;
		case "sl":
			$rtp = " rp_type='sl' AND";
			break;
	}

	//Insert SQL Qr
	//INSERT INTO `report` (`rp_id`, `user_id`, `seller_id`, `rp_description`, `rp_status`, `rp_date`) VALUES ('1', '2304U43506', '73SL7650', 'Test report description', '', '2023-05-03');

	$query = "SELECT DISTINCT(rp_date) FROM `report` WHERE$rtp rp_date BETWEEN '$fr' AND '$to' ORDER BY `rp_date` DESC$count;";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	if (mysqli_num_rows($query_run_search) > 0) {
		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$rp_date = $row['rp_date'];

			$query2 = "SELECT * FROM `report` WHERE rp_date ='$rp_date';";
			$query_run_search2 = mysqli_query($Connector, $query2);

			while ($row = mysqli_fetch_array($query_run_search2)) {
				$rp_id = $row['rp_id'];
				$user_id = $row['user_id'];
				$seller_id = $row['seller_id'];
				$rp_type = $row['rp_type'];
				$rp_description = $row['rp_description'];
				$rp_status = $row['rp_status'];

				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $rp_id . '</td>
						<td>' . $user_id . '</td>
						<td>' . $seller_id . '</td>
						<td>' . $rp_type	 . '</td>
						<td>' . $rp_date . '</td>
						<td>' . $rp_description . '</td>
						<td>
							<a href="./orders-pg-2.php?rp_id=' . $rp_id . '">
								<button type="button" class="btn btn-bw btn-sm">View</button>
							</a>
						</td>
					</tr>';
			}
		}
	} else {
		echo '
			<tr>
				<td colspan="8" style="text-align:center;">No Report Yet !</td>
			</tr>';
	}

	//---------------------------------------------------
}
//new description
elseif (isset($_POST['rpid'])) {
	$report_type = $_POST['report_type'];
	$duration = $_POST['duration'];
	$fr = $_POST['fr'];
	$to = $_POST['to'];
	echo '	
		<tr>
			<th>No.</th>
			<th>Report ID</th>
			<th>User ID</th>
			<th>Seller ID</th>
			<th>Report Type</th>
			<th>Report Date</th>
			<th>description</th>
			<th>Action</th>
		</tr>';

	//Insert SQL Qr
	//INSERT INTO `report` (`rp_id`, `user_id`, `seller_id`, `rp_description`, `rp_status`, `rp_date`) VALUES ('1', '2304U43506', '73SL7650', 'Test report description', '', '2023-05-03');

	$query = "SELECT DISTINCT(rp_date) FROM `report` WHERE rp_date BETWEEN '$fr' AND '$to' ORDER BY `rp_date` DESC;";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	if (mysqli_num_rows($query_run_search) > 0) {
		while ($row = mysqli_fetch_array($query_run_search)) {
			$i++;
			$rp_date = $row['rp_date'];

			$weekly = 7;
			$monthly = 31;
			echo '
		<tr>
			<td colspan="8" style="text-align:center;">Test 1' . $$duration . '+' . $i . '</td>
		</tr>';

			if ($$duration <= $i) {
				continue;
			} else {
				break;
			}



			$query2 = "SELECT * FROM `report` WHERE rp_date ='$rp_date';";
			$query_run_search2 = mysqli_query($Connector, $query2);

			while ($row = mysqli_fetch_array($query_run_search2)) {
				$rp_id = $row['rp_id'];
				$user_id = $row['user_id'];
				$seller_id = $row['seller_id'];
				$rp_type = $row['rp_type'];
				$rp_description = $row['rp_description'];
				$rp_status = $row['rp_status'];

				echo '
					<tr>
						<td>' . $i . '</td>
						<td>' . $rp_id . '</td>
						<td>' . $user_id . '</td>
						<td>' . $seller_id . '</td>
						<td>' . $rp_type	 . '</td>
						<td>' . $rp_date . '</td>
						<td>' . $rp_description . '</td>
						<td>' . $rp_status . '</td>
					</tr>';
			}
		}
	} else {
		echo '
			<tr>
				<td colspan="8" style="text-align:center;">No Report Yet !</td>
			</tr>';
	}

	//---------------------------------------------------
}
//View IMG
elseif (isset($_POST['nic'])) {

	$nic = $_POST['nic'];

	$query = "SELECT * FROM user WHERE nic ='$nic';";
	$query_run_search = mysqli_query($Connector, $query);
	$i = 0;
	if (mysqli_num_rows($query_run_search) > 0) {
		while ($row = mysqli_fetch_array($query_run_search)) {

			$img = $row['user_img'];

			echo "
			<script>
					Swal.fire({
						    title: 'NIC',
						    text: 'User -> ',
						    imageUrl: '../Login/Client/user-dp/'+$img,
						    imageWidth: 400,
						    imageHeight: 200,
						    imageAlt: 'Custom image',
							})
			</script>";
		}
	} else {
	}

	//---------------------------------------------------
}
