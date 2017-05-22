<?php 
	include 'connect.php';
	include 'header.php';

	$order_id = $_GET['id'];

	$sql = "SELECT * FROM orderhis, product_list, recipe_info WHERE order_id = $order_id AND product_name = Product";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()){
		$product_name = $row['Product'];
		$product_id = $row['product_id'];
	}

	// $sql2 = "SELECT * FROM product_list WHERE product_name = $product_name";
	// $result2 = $conn->query($sql2);

	// while($row2 = $result2->fetch_assoc()){
	// 	$product_id = $row2['product_id'];
	// }

?>
<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>จัดล็อตออเดอร์</b>
		  </div>
		  <div class="panel-body">
		  	<!-- order name -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>ขนมปัง: </p>
		    	</div>
		    	<div class="col-md-9">
		    	<?php
		    		echo $product_name;
		    	?>
		    	</div>
		    </div>
		    <!-- lot -->
		    <div class="row">
		    	<div class="col-md-3">
		    		<p>ล็อต: <?php echo $product_id ?></p>
		    	</div>
		    	<div class="col-md-9">
		    	<form action="" method="get">
		    			<!-- product type -->
				  <div class="form-group">
				    <select name="recipe_name" class="form-control">
				    	<?php
							while($row = $result->fetch_assoc()){
								echo "<option>".$row["recipe_name"]."</option>";
							}
				    	 ?>	
					</select>
				  </div>
		    	</form>
		    	</div>
		    </div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
