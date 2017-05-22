<?php
	include 'connect.php';

	$product_type_name = $_POST["product_type_name"];

	$sql = "INSERT INTO product_type (product_type_name)
	VALUES ('$product_type_name')";

	$result = mysql_query($sql);
	// if ($conn->query($sql) === TRUE) {
 //    	echo "New record created successfully";
 //    	header("location:http://localhost:8888/managemat_main.php");
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }

	$conn->close();

	header("Location: /product_main.php");
    exit;
?>