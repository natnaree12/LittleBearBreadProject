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

	$sql = "SELECT * FROM material_list";
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
					<th>เลขที่วัถุดิบ</th>
					<th>รายการ</th>
					<th>คงเหลือ</th>
					<th></th>
					<th>จำนวน</th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count=1;
			while($row = $result->fetch_assoc()){

				// echo "<td>".$row["mat_type_name"]."</td>";
				$amount = ($row["amount_actual"]/$row["amount_expect"])*100;
				if($amount < 80) {
					echo "<tbody>";
					echo "<td>".$count."</td>";
					echo '<td>'.$row["mat_id"]."</td>";
					echo '<td>'.$row["mat_name"]."</td>";
					echo "<td><div class='progress'><div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='".$amount."' aria-valuemin='0' aria-valuemax='100' style='width: ".$amount."%;''>".$amount."%</div></div></td>";
					if($amount < 0){
						echo "<td>0%</td>";
					}
					else{
						echo "<td>".$amount."%</td>";
					}
			 		echo '<td><form action="material_main.php" method="post">
			 			<input type="hidden" name="matname" value="'.$row["mat_name"].'">
			 			<input type="hidden" name="matid" value="'.$row["mat_id"].'">
			 			<input type="number" name="amount" min = "1">
			 			<button type="submit" name="submit" class="btn btn-warning">สั่งซื้อ</button>
			 			</form>
			 			</td>';
						$count++;
				}

  				if(isset($_POST['submit']))
				{
   					$sql = "INSERT INTO order_material_list (mat_id, mat_name, amount) 
    				VALUES ('".$_POST["matid"]."','".$_POST["matname"]."','".$_POST["amount"]."')";

    				$result = mysqli_query($conn,$sql);
    				echo '<script type = "text/javascript"> window.location = "material_main.php" </script>';
				}
				if(isset($_POST['orderall']))
				{
					$sql2 = "SELECT * FROM material_list";
					$result = $conn->query($sql2);
					while($row = $result->fetch_assoc()){
						$sql3 = "INSERT INTO order_material_list (mat_id, mat_name, amount) 

    					VALUES ('".$row["mat_id"]."','".$row["mat_name"]."','".$row["amount_expect"]."')";

    					$result2 = mysqli_query($conn,$sql3);
					}
					echo '<script type = "text/javascript"> window.location = "material_main.php" </script>';
				}
			}
			$conn->close();
			?>			
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
<footer><center><button onclick="location.href = 'order_material_list.php';" id="myButton" class="btn btn-warning" >ดูใบสั่งซื้อ</button><br><br>
			<form action="material_main.php" method="post">
				<button type="submit" name="orderall" class="btn btn-warning">สั่งซื้อทั้งหมด</button>
			</form>
</center></footer>