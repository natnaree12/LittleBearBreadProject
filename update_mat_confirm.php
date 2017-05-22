<?php 
	include 'connect.php';
	include 'header.php';

	$order_id = $_GET["id"];
	$sql = "SELECT product_name, mat_name, mat_amount, ingredient_list.amount_per_unit*orderhis.Amount AS amount_require FROM orderhis, product_list, ingredient_list, material_list WHERE Product = product_list.product_id AND order_id = $order_id AND ingredient_list.product_id = Product AND ingredient_list.mat_id = material_list.mat_id";
	$result = $conn->query($sql);
?>
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading">
		    	<h3 class="panel-title">รายละเอียดการผลิต</h3>
		  	</div>
		  	<div class="panel-body">
		    	<table class="table table-hover">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อวัตถุดิบ</th>
							<th>ประเภท</th>
							<th>จำนวนที่มีอยู่</th>
							<th>จำนวนที่ต้องการ</th>
							<!-- <th></th> -->
						</tr>
					</thead>
					<?php 
					$count = 1;
					while($row = $result->fetch_assoc()){
						echo "<tbody>";
						echo "<td>".$count."</td>";
						echo "<td>".$row["mat_name"]."</td>";
						echo "<td>".$row["mat_cat_name"]."</td>";
						$mat_amount = floor($row["mat_amount"]);
						echo "<td>".$mat_amount."</td>";
						$mat_require = floor($row["amount_require"]);
						if($mat_amount < $mat_require){
							echo "<td bgcolor='pink'>".$mat_require."</td>";
						}else{
							echo "<td>".$mat_require."</td>";
						}
						// echo "<td><center><a class='btn btn-danger' href='/update_mat.php?id=".$row["order_id"]."' role='button'>ยกเลิกออเดอร์</a><center></td>";
						echo "</tbody>";
						$count++;
					}
					$conn->close();
					?>
				</table>
		  	</div>
		  	<div class="panel-footer">
		  		<center><p>ยืนยันการผลิตออเดอร์นี้หรือไม่?</p>
		  		<p>หากคุณยืนยันการผลิต ระบบจะหักลบปริมาณวัตถุดิบออกจากระบบ</p>
		  		<a class='btn btn-success' href='/update_mat.php?id=<?php echo $order_id; ?>' role='button'>ยืนยัน</a>
		  		<a class='btn btn-default' href='/order_main.php' role='button'>ยกเลิก</a>
		  		</center>
		  	</div>
		</div>
	</div>
</div>