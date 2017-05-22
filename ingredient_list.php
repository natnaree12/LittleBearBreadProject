<?php
	include 'connect.php';

	$sql = "SELECT * FROM product_list";
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
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$count."</td>";
				echo "<td>".$row["product_name"]."</td>";
				echo "<td>".$row["product_type"]."</td>";
				echo "<td><center><a class='btn btn-info' href='/recipe_info.php?id=".$row["product_id"]."' role='button'>รายละเอียด</a><center></td>";
				echo "</tbody>";
				$count++;
			}
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>