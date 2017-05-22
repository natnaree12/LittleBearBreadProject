<?php
	include 'connect.php';

	// echo "product name: ".$_POST["product_name"];
	// echo "product_type".$_POST["product_type"];
	// echo $_POST["amount_per_lot"];

	$product_name = $_POST["product_name"];
	$product_type = $_POST["product_type"];
	$unit = $_POST["unit"];
	$amount_per_lot = $_POST["amount_per_lot"];


	$sql = "INSERT INTO product_list (product_name, product_type, unit, amount_per_lot)
	VALUES ('$product_name', $product_type, '$unit', $amount_per_lot)";

	$res = $conn->query($sql);

	$conn->close();

	header("Location: /product_main.php");
    exit;
?>