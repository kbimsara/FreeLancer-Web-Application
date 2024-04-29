<?php
require_once './config.php';

if (isset($_POST['value'])) {
	$u_id=$_POST['u_id'];
	$value=$_POST['value'];
	
	$query = "UPDATE `user` SET `verification` = '$value' WHERE `user`.`user_id` = '$u_id';";
	$query_run_search = mysqli_query($Connector, $query);
	
} elseif (isset($_POST['weekly_id'])) {
	echo '
		<tr>
			<th>Number</th>
			<th>Date</th>
			<th>Orders</th>
			<th>Sales</th>
			<th>Profit</th>
		</tr>';
	$query = "SELECT DISTINCT(od_date) AS od_date FROM orders ORDER BY od_date DESC ";
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
}
