<?php 
	include 'connect.php';
	include 'header.php';
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
			<form action="add_product.php" method="post">
			  	<!-- other type -->
			  <center><a class='btn btn-warning' data-target='#myModal' data-toggle='modal' role='button'>เพิ่มประเภท</a></center>
			  <!-- product name -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">ชื่อขนมปัง</label>
			    <input type="text" name="product_name" class="form-control" id="product_name">
			  </div>
			  <!-- product type -->
			  <div class="form-group">
			    <label for="exampleInputPassword1">ประเภท</label>
			    <select name="product_type" class="form-control">
			    	<?php
			    		$sql = "SELECT * FROM product_type";
						$result = $conn->query($sql);

						while($row = $result->fetch_assoc()){
							echo "<option value='".$row['product_type_id']."'>".$row["product_type_name"]."</option>";
						}
			    	 ?>	
				</select>
			  </div>
			  <!-- unit -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">หน่วย</label>
			    <input type="text" name="unit" class="form-control" id="unit">
			  </div>
			  <!-- amount per lot -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">จำนวนการผลิตต่อครั้ง</label>
			    <input type="text" name="amount_per_lot" class="form-control" id="amount_per_lot">
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
	include 'product_list.php';
?>
<!-- modal -->
<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มประเภทใหม่</h4>
        </div>
        <div class="modal-body">
          <form action="/add_product_type.php" method="post">
          	<!-- new type -->
          	<div class="form-group">
			    <label for="exampleInputEmail1">ชื่อประเภท</label>
			    <input type="text" name="product_type_name" class="form-control" id="product_type_name">
			</div>
			<!-- SUBMIT -->
			<input type="submit" value="บันทึก" class="btn btn-primary">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
