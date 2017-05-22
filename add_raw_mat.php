<?php
	include 'connect.php';

	$mat_name = $_POST["mat_name"];
	$mat_cat_name = $_POST["mat_cat_name"];
	$mat_unit = $_POST["mat_unit"];


	$sql = "INSERT INTO material_list (mat_name, mat_cat_name, mat_unit)
	VALUES ('$mat_name', '$mat_cat_name', '$mat_unit')";

	$result = mysql_query($sql);
	// if ($conn->query($sql) === TRUE) {
 //    	echo "New record created successfully";
 //    	header("location:http://localhost:8888/managemat_main.php");
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }

	$conn->close();

	header("Location: /managemat_main.php");
    exit;
?>