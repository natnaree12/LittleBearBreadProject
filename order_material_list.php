<?php 
	include 'connect.php';
	include 'header.php';
?>

<br>
<center><h1>รายการสั่งซื้อ</h1></center>
<br>
<!-- <center><nav>
  <ul class="pager">
  	<li><a href="">ที่ใกล้หมด</a></li>
  	<li><a href="">ทั้งหมด</a></li>   
  </ul>
</nav></center> -->

<?php
	$servername = "localhost:8889";
	$username = "root";
	$password = "root";
	$dbname = "LittleBearBread";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM order_material_list as o, material_list as m WHERE o.mat_id = m.mat_id";
	$result = $conn->query($sql);
?>
<br>
<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-8">
		<table class="table table-hover" id="material">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<!-- <th>เลขที่วัถุดิบ</th> -->
					<th>รายการ</th>
					<th>จำนวน</th>
					<th>หน่วย</th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo '<td>'.$count."</td>";
				// echo '<td>'.$row["mat_id"]."</td>";
				echo '<td>'.$row["mat_name"]."</td>";
				echo '<td>'.$row["amount"]."</td>";
				echo '<td>'.$row["mat_unit"]."</td>";
				echo "<td><center><a class='btn btn-danger' href='/delete_material_order.php?id=".$row["id"]."' role='button'>ยกเลิก</a><center></td>";
				echo "<tbody>";
				$count++;
			}
			$conn->close();
			?>			
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
<center><nav>
  <ul class="pager">
  	<li><a href="/material_main.php">กลับ</a></li> 
  </ul>
</nav></center>