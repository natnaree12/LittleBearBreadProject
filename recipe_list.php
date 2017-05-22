<?php
	include 'connect.php';

	$product_id = $_GET['id'];
	$sql = "SELECT * FROM ingredient_list as i, material_list as m WHERE product_id = $product_id AND i.mat_id = m.mat_id";
	$result = $conn->query($sql);
?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>ส่วนผสม</th>
					<th>ปริมาณ</th>
					<th>หน่วย</th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$count."</td>";
				echo "<td>".$row["mat_name"]."</td>";
				echo "<td>".$row["amount"]."</td>";
				echo "<td>".$row["mat_unit"]."</td>";
				echo "<td><center><a class='btn btn-warning' href='/ingredient_form.php?product_id=".$_GET['id']."&int_id=".$row["int_id"]."' role='button'>แก้ไข</a><center></td>";
				echo "</tbody>";
				$count++;
			}
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
