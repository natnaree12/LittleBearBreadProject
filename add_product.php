<?php
	include 'connect.php';

	echo "product name: ".$_POST["product_name"];
	echo "product_type".$_POST["product_type"];

	$product_name = $_POST["product_name"];
	$product_type = $_POST["product_type"];


	$sql = "INSERT INTO product_list (product_name, product_type)
	VALUES ('$product_name', '$product_type')";

	$result = mysql_query($sql);
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
    	header("location:http://localhost:8888/managemat_main.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>