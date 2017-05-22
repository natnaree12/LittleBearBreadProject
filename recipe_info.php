<?php 
	include 'connect.php';
	include 'header.php';
?>

<br>
<center><h1>ส่วนผสม</h1></center>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<!-- form for add new product -->
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>เพิ่มส่วนผสม</b>
		  </div>
		  <div class="panel-body">
			<form action="add_recipe.php" method="post">
			  	<!-- other type -->
			  <!-- <center><a class='btn btn-warning' data-target='#myModal' data-toggle='modal' role='button'>เพิ่มประเภท</a></center> -->
			  <!-- product name -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">ชื่อวัตถุดิบ</label>
			    <input type="text" name="mat_name" class="form-control" id="mat_name">
			  </div>
			  <!-- product type -->
			  <div class="form-group">
			    <label for="exampleInputPassword1">ประเภท</label>
			    <select name="product_type" class="form-control">
			    	<?php
			    		$sql = "SELECT * FROM material_cat WHERE mat_type_id = 1";
						$result = $conn->query($sql);

						while($row = $result->fetch_assoc()){
							echo "<option value='".$row['mat_cat_id']."'>".$row["mat_cat_name"]."</option>";
						}
			    	 ?>	
				</select>
			  </div>
			  <!-- amount -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">ปริมาณ</label>
			    <input type="text" name="amount" class="form-control" id="amount">
			  </div>
			  <!-- unit -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">หน่วย</label>
			    <input type="text" name="unit" class="form-control" id="unit">
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

<?php
	include 'recipe_list.php';
?>