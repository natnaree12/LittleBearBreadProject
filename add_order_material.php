<?php
	include 'connect.php';

	echo $_POST["mat_id"];
	echo $_POST["mat_name"];
	echo $_POST["amount"];

	$mat_id = $_POST["mat_id"];
	$mat_name = $_POST["mat_name"];
	$amount = $_POST["amount"];

	$sql = "INSERT INTO order_material_list (mat_id, mat_name, amount)
	VALUES ($mat_id, '$mat_name', $amount)";

	$res = $conn->query($sql);
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql2 = "UPDATE material_list SET mat_status = 3 WHERE mat_id = $mat_id";
    $res2 = $conn->query($sql2);

	$conn->close();

	// header("Location: /material_main.php");
 //    exit;
?>