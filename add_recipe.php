<?php
	include 'connect.php';

	// echo "product name: ".$_GET["recipe_name"];
	// echo "product_type".$_GET["recipe_amount"];
	// echo "product_type".$_GET["id"];
	$product_id = $_GET["id"];

	$sql = "SELECT product_name FROM product_list WHERE product_id = $product_id";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) {
		$recipe_name = $row["product_name"];
	}

	$recipe_amount = $_POST["recipe_amount"];
	

	$sql = "INSERT INTO recipe_info (product_id, recipe_name, recipe_amount)
	VALUES ($product_id, '$recipe_name', '$recipe_amount')";

	$result = mysql_query($sql);
	// if ($conn->query($sql) === TRUE) {
 //    	echo "New record created successfully";
 //    	header("location:http://localhost:8888/managemat_main.php");
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }

	$conn->close();

?>