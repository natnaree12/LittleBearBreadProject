<?php 
	include 'connect.php';
	include 'header.php';

	echo $_GET["product_id"];
	echo $_GET["recipe_id"];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<br>
<center><h1>ขนมคุณหมี</h1></center>
<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<!-- form for add new product -->
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>เพิ่มเมนูใหม่</b>
		  </div>
		  <div class="panel-body">
			<form action="/add_product.php" method="post">
			  	<!-- other type -->
			  
			  <!-- material type -->
			  <div class="form-group">
			    <label for="exampleInputPassword1">ประเภทวัตถุดิบ</label>
			    <select name="material_type" class="form-control">
			    	<?php
			    		$sql = "SELECT * FROM material_type";
						$result = $conn->query($sql);

						while($row = $result->fetch_assoc()){
							echo "<option>".$row["mat_type_name"]."</option>";
						}
			    	 ?>	
				</select>
			  </div>

			  <!-- material cat -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">ชื่อวัตถุดิบ/บรรจุภัณฑ์</label>
			    <select name="material_name" class="form-control">
			    	<?php
			    		$sql = "SELECT * FROM product_type";
						$result = $conn->query($sql);

						while($row = $result->fetch_assoc()){
							echo "<option>".$row["product_type_name"]."</option>";
						}
			    	 ?>	
				</select>
			  </div>

			  <!-- amount -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">จำนวน</label>
			    <input type="text" name="amount" class="form-control" id="amount">
			  </div>
		  </div>
		  <div class="panel-footer">
			<center>
				<input type="submit" value="บันทึก" class="btn btn-primary">
				<button type="button" class="btn btn-default">ยกเลิก</button>
			</center>
		  </div>
		  </div>
		</form>
    </div>
    <div class="col-md-4"></div>
</div>
<br>
<?php
	include 'whatEverYouWant_list.php';
?>
  
</div>
