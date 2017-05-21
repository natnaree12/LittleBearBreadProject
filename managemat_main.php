<?php 
	include 'connect.php';
	include 'header.php';
?>

<br>
<center><h1>จัดการวัตถุดิบ</h1></center>
<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<!-- form for add new product -->
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>เพิ่มวัตถุดิบใหม่</b>
		  </div>
		  <div class="panel-body">
			<form>
			  <div class="form-group">
			    <label for="exampleInputEmail1">ชื่อวัตถุดิบ</label>
			    <input type="text" class="form-control" id="product_name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">ประเภท</label>
			    <!-- <input type="text" class="form-control" id="type_name" placeholder="Password"> -->
			    <select class="form-control">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				</select>
			  </div>
		  </div>
		  <div class="panel-footer">
			<center>
		    	<button type="button" class="btn btn-primary">บันทึก</button> <!-- submit -->
				<button type="button" class="btn btn-default">ยกเลิก</button>
			</center>
		  </div>
		  </div>
		</form>
    </div>
    <div class="col-md-4"></div>
</div>