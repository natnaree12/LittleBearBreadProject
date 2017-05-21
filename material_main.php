<?php 
	include 'connect.php';
	include 'header.php';
?>

<br>
<center><h1>รายการวัตถุดิบ</h1></center>
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

	$sql = "SELECT * FROM material_list as l, material_type as m WHERE mat_type = mat_type_id";
	$result = $conn->query($sql);
?>
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>รายการ</th>
					<th>คงเหลือ</th>
					<th></th>
				</tr>
			</thead>
			<?php 
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$row["mat_id"]."</td>";
				echo "<td>".$row["mat_name"]."</td>";
				// echo "<td>".$row["mat_type_name"]."</td>";
				$amount = ($row["amount_actual"]/$row["amount_expect"])*100;
				echo "<td><div class='progress'><div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='".$amount."' aria-valuemin='0' aria-valuemax='100' style='width: ".$amount."%;''>".$amount."%</div></div></td></td>";
				echo "<td><center><button type='button' class='btn btn-warning'>สั่งซื้อ</button><center></td>";
				echo "</tbody";
			}
			$conn->close();
			?>			
		</table>
	</div>
	<div class="col-md-2"></div>
</div>