<?php 
	include 'connect.php';
	include 'header.php';
?>

<br>
<center><h1>บันทึกออเดอร์</h1></center>
<br>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>ออเดอร์ใหม่</b>
		  </div>
		  <div class="panel-body">
		    <!-- date -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>วันที่: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<p></p> <!-- code PHP for get the current date here -->
		    	</div>
		    </div>
		    <!-- time -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>เวลา: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<p></p> <!-- code PHP for get the current time here -->
		    	</div>
		    </div>
		    <!-- type -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>ประเภท: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<select class="form-control"> <!-- code PHP for select the type -->
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
		    	</div>
		    </div>
		    <br>
		    <!-- bakery name -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>รายการ: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<select class="form-control"> <!-- code PHP for select the bakery -->
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
		    	</div>
		    </div>
		    <br>
		    <!-- amount -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>จำนวน: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<p></p> <!-- code PHP for input the amount here -->
		    	</div>
		    </div>
		  </div>
		  <div class="panel-footer">
			  <center>
			  	<button type="button" class="btn btn-primary">บันทึก</button>
			  	<button type="button" class="btn btn-default">ยกเลิก</button>
			  </center>		  	
		  </div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>


