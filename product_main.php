<?php 
	include 'connect.php';
	include 'header.php';
?>

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
			  <div class="form-group">
			    <label for="exampleInputEmail1">ชื่อขนมปัง</label>
			    <input type="text" name="product_name" class="form-control" id="product_name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">ประเภท</label>
			    <!-- <input type="text" class="form-control" id="type_name" placeholder="Password"> -->
			    <select name="product_type" class="form-control">
			    	<?php
			    		$sql = "SELECT * FROM product_type";
						$result = $conn->query($sql);

						while($row = $result->fetch_assoc()){
							echo "<option>".$row["product_type_name"]."</option>";
						}
			    	 ?>	
				</select>
			  </div>
		  </div>
		  <div class="panel-footer">
			<center>
				<input type="submit" value="บันทึก" class="btn btn-primary">
		    	<!-- <button type="button" class="btn btn-primary">บันทึก</button> <!-- submit -->
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
	include 'product_list.php';
?>