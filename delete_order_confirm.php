<?php 
	include 'connect.php';
	include 'header.php';

	$order_id = $_GET["id"];
	$sql = "SELECT * FROM orderhis, product_list WHERE product_list.product_id = orderhis.Product AND order_id = $order_id";
	$result = $conn->query($sql);

?>
<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
		    	<h3 class="panel-title">รายละเอียดออเดอร์</h3>
		  	</div>
		  	<div class="panel-body">
		    	<?php while($row = $result->fetch_assoc()){ ?>
		    	<div class="row">
		    		<div class="col-md-6">
		    			<p>ชื่อขนมปัง:</p>
		    		</div>
		    		<div class="col-md-6">
		    			<?php echo $row["product_name"]; ?>
		    		</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-md-6">
		    			<p>จำนวน:</p>
		    		</div>
		    		<div class="col-md-6">
		    			<?php echo $row["Amount"]; ?>
		    		</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-md-6">
		    			<p>ชื่อผู้สั่ง:</p>
		    		</div>
		    		<div class="col-md-6">
		    			<?php echo $row["customer_name"]; ?>
		    		</div>
		    	</div>
		    	<?php } ?>
		  	</div>
		  	<div class="panel-footer">
		  		<center><p>ต้องการยกเลิกออเดอร์นี้หรือไม่?</p>
		  		<a class='btn btn-success' href='/delete_order.php?id=<?php echo $order_id; ?>' role='button'>ยืนยัน</a>
		  		<a class='btn btn-default' href='/order_main.php' role='button'>ยกเลิก</a>
		  		</center>
		  	</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>