<?php 
	include 'connect.php';

	$order_id = $_GET["id"];

    $sql2 = "DELETE FROM orderhis WHERE order_id = $order_id";
    $rs = $conn->query($sql2);

    $sql = "UPDATE material_list, ingredient_list, orderhis SET material_list.amount_expect = material_list.amount_expect + (ingredient_list.amount_per_unit * orderhis.Amount) WHERE material_list.mat_id = ingredient_list.mat_id AND ingredient_list.product_id = orderhis.Product AND orderhis.order_id = $order_id";
    $result = $conn->query($sql);

    header("Location: /order_main.php");
    exit;
?>