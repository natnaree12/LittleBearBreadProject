<?php
	include 'connect.php';

	$order_id = $_GET['id'];


	$sql = "UPDATE material_list, ingredient_list, orderhis SET material_list.mat_amount = material_list.mat_amount - (ingredient_list.amount_per_unit * orderhis.Amount) WHERE material_list.mat_id = ingredient_list.mat_id AND ingredient_list.product_id = orderhis.Product AND orderhis.order_id = $order_id";
    $result = $conn->query($sql);

    $sql2 = "UPDATE orderhis SET Status = 2 WHERE order_id = $order_id";
    $rs = $conn->query($sql2);

    mysqli_close($conn); 

    header("Location: /order_main.php");
    exit;
?>

