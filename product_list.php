<?php
	include 'connect.php';

	$sql = "SELECT * FROM product_list, product_type WHERE product_type = product_type_id";
	$result = $conn->query($sql);
?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>รายการ</th>
					<th>ประเภท</th>
					<th style="text-align: center;">จำนวนการผลิตต่อครั้ง</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$count."</td>";
				echo "<td>".$row["product_name"]."</td>";
				echo "<td>".$row["product_type_name"]."</td>";
				echo "<td align='center'>".$row["amount_per_lot"]."</td>";
				echo "<td><center><a class='btn btn-info' href='/recipe_info.php?id=".$row["product_id"]."' role='button'>ส่วนผสม</a><center></td>";
				echo "<td><center><a class='btn btn-warning' href='/recipe_info.php?id=".$row["product_id"]."' role='button'>แก้ไข</a><center></td>";
				echo "<td><center><a class='btn btn-danger' href='/delete_product.php?id=".$row["product_id"]."' role='button'>ลบ</a><center></td>";
				echo "</tbody>";
				$count++;
			}
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>