<?php
	$sql = "SELECT * FROM orderhis, product_list, status WHERE product_id = Product AND Status = status_id AND Status = 1 ORDER BY Date, Time asc";
	$result = $conn->query($sql);
?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>วันที่</th>
					<th>เวลา</th>
					<th>รายการ</th>
					<th>จำนวน</th>
					<th>สถานะ</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$count."</td>";
				echo "<td>".$row["Date"]."</td>";
				echo "<td>".$row["Time"]."</td>";
				echo "<td>".$row["product_name"]."</td>";
				echo "<td>".$row["Amount"]."</td>";
				echo "<td>".$row["status_name"]."</td>";
				echo "<td><center><a class='btn btn-success' href='/update_mat_confirm.php?id=".$row["order_id"]."' role='button'>ทำ</a><center></td>";
				echo "<td><center><a class='btn btn-danger' href='/delete_order_confirm.php?id=".$row["order_id"]."' role='button'>ยกเลิกออเดอร์</a><center></td>";
				echo "</tbody>";
				$count++;
			}
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>