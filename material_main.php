<?php 
	include 'connect.php';
	include 'header.php';

	$sql = "SELECT * FROM material_list WHERE amount_expect != 0 AND mat_status != 3";
	$result = $conn->query($sql);
?>

<br>
<center><h1>สั่งซื้อวัตถุดิบ</h1></center>
<br>
<!-- <center><nav>
  <ul class="pager">
  	<li><a href="">ที่ใกล้หมด</a></li>
  	<li><a href="">ทั้งหมด</a></li>   
  </ul>
</nav></center> -->
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
				$amount = floor(($row["mat_amount"]/$row["amount_expect"])*100);
				$amount_require = $row["amount_expect"] - $row["mat_amount"];
				if($amount < 80) {
				echo "<tbody>";
				echo "<td>".$count."</td>";
				// echo '<td>'.$row["mat_id"]."</td>";
				echo '<td>'.$row["mat_name"]."</td>";
				echo "<td><div class='progress'><div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='".$amount."' aria-valuemin='0' aria-valuemax='100' style='width: ".$amount."%;'></div></div></td>";
				if($amount < 0){
					echo "<td>0%</td>";
				}
				else{
					echo "<td>".$amount."%</td>";
				}
			 	echo '<td><form action="add_order_material.php" method="post">
			 			<input type="hidden" name="mat_name" value="'.$row["mat_name"].'">
			 			<input type="hidden" name="mat_id" value="'.$row["mat_id"].'">
			 			<input type="number" name="amount" min = "1" placeholder = "'.$amount_require.'">
			 			<button type="submit" name="submit" class="btn btn-warning">สั่งซื้อ</a>
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
			}
			$conn->close();
			?>			
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
<center><nav>
  <ul class="pager">
  	<li><a href="/order_material_list.php">ดูใบสั่งซื้อ</a></li> 
  </ul>
</nav></center>