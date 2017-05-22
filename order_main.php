<?php 
	include 'connect.php';
	include 'header.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<br>
<center><h1>บันทึกออเดอร์</h1></center>
<!-- <center><a class='btn btn-info' data-target='#myModal' data-toggle='modal' role='button'>บันทึกออเดอร์</a></center> -->
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>บันทึกออเดอร์</b>
		  </div>
		  <div class="panel-body">
		  <form action="saveOrder.php" method="post">
		    <!-- date -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>วันที่: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<p><?php
						$dt1 = date("d/m/y", time());
						echo $dt1;
					?></p></p> <!-- code PHP for get the current date here -->
		    	</div>
		    </div>
		    <!-- time -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>เวลา: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<p><?php 
						date_default_timezone_set("Asia/Bangkok");
						$dt2 = date("h:i:s");
						echo $dt2
					?></p> <!-- code PHP for get the current time here -->
		    	</div>
		    </div>
		    <!-- type -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>ขนมปัง: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<select name="product_id" class="form-control"> <!-- code PHP for select the type -->
		    		<?php
			    		$sql = "SELECT * FROM product_list";
						$result = $conn->query($sql);

						while($row = $result->fetch_assoc()){
							echo "<option value='".$row["product_id"]."'>".$row["product_name"]."</option>";
						}
			    	 ?>	
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
		    		<input type="text" name="amount" id="subject" value=""> <!-- code PHP for input the amount here -->
		    	</div>
		    </div>
		    <!-- customer name -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>ชื่อผู้สั่ง: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<input type="text" name="customer_name" id="subject" value=""> <!-- code PHP for input the amount here -->
		    	</div>
		    </div>
		    <!-- delivery date -->
		    <!-- <div class="row">
		    	<div class="col-md-3">
		    		<p>ชื่อผู้สั่ง: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<input type="text" name="delivery_date" id="subject" value=""> 
		    	</div>
		    </div> -->
		    <!-- amount -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>เพิ่มเติม: </p>
		    	</div>
		    	<div class="col-md-9">
		    		<textarea name="note" class="form-control" rows="3"></textarea>
		    		<!-- <input type="text" name="delivery_date" id="subject" value="">  -->
		    	</div>
		    </div>
		  </div>
		  <div class="panel-footer">
			  <center>
			  	<button type="submit" class="btn btn-primary" value="submit">บันทึก</button>
			  	<!-- <input type="submit" value="บันทึก" class="btn btn-primary"> -->
			  	<button type="button" class="btn btn-default">ยกเลิก</button>
			  </center>		  	
		  </div>
		</div>
		</form>
	</div>
	<div class="col-md-2"></div>
</div>
<?php
	include 'order_list_new.php';
?>




