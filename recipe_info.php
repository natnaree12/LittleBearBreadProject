<?php 
	include 'connect.php';
	include 'header.php';
?>

<br>
<center><h1>ส่วนผสม</h1></center>
<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<!-- form for add new product -->
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>เพิ่มส่วนผสมใหม่</b>
		  </div>
		  <!-- recipe name -->
		  <div class="panel-body">
			<form action="/add_recipe.php" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">ชื่อส่วนผสม</label>
			    <input type="text" name="recipe_name" class="form-control" id="recipe_name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">จำนวน</label>
			    <input type="text" name="recipe_amount" class="form-control" id="recipe_amount">
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
	include 'recipe_list.php';
?>