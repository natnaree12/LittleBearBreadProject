<?php
   include 'connect.php';
   // include 'header.php';

    $amount = $_POST['amount'];
    $product_id = $_POST['product_id'];
    $customer_name = $_POST['customer_name'];
    $note = $_POST['note'];
    $sql = "INSERT into orderhis(date, time, product, amount, customer_name, note) VALUES(CURRENT_DATE, CURRENT_TIME, '$product_id', $amount, '$customer_name', '$note')";
    $res = $conn->query($sql);
    // $result = mysql_query($sql);


    $sql3 = "UPDATE material_list, ingredient_list, orderhis SET material_list.amount_expect = material_list.amount_expect + (ingredient_list.amount_per_unit * $amount) WHERE material_list.mat_id = ingredient_list.mat_id AND ingredient_list.product_id = $product_id";
    $result = $conn->query($sql3);

    mysqli_close($conn); 
    // $conn->close();

    header("Location: /order_main.php");
    exit;
?>
<!-- <br>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <center><p>บันทึกออเดอร์สำเร็จ</p>
                <a class='btn btn-info' href='/order_main.php' role='button'>กลับ</a><center>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div> -->
