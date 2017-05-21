<?php
	include 'connect.php';

	$product_id = $_GET['id'];
	$sql = "SELECT * FROM recipe_info WHERE product_id = $product_id";
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
					<th>จำนวน</th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$count."</td>";
				echo "<td>".$row["recipe_name"]."</td>";
				echo "<td>".$row["recipe_amount"]."</td>";
				echo "<td><center><a class='btn btn-info' href='/recipe_list.php' role='button'>รายละเอียด</a><center></td>";
				echo "</tbody>";
				$count++;
			}
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
