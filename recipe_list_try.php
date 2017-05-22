<?php

	
	include 'connect.php';

	?>

	
<div class="row">
	<?php
	# execute search query
	$sql = "SELECT mat_name, mat_amount FROM material_list";
	$result = mysql_query($sql);

	# check result
	if (!$result)
		die('Could not successfully run query: ' . mysql_error());

	# display returned data
	if (mysql_num_rows($result) > 0) 
	{
    ?>
    <form action="" method="POST">
        <?php
            while ($row = mysql_fetch_assoc($result)){

                echo '<tr><td>';
                echo '<input type="checkbox" name="selected[]" value="'.$row['mat_name']. .$row['mat_amount'].'"/>';
                echo '</td>';
                foreach ($row as $key => $value)
                    echo '<td>'.htmlspecialchars($value).'</td>';
                echo '</tr>';
            }
        ?>
    <input type="submit" value="Save"/>
    </form>
    <?php
}
else
    echo '<p>No data</p>';

# free resources
mysql_free_result($result);

# display posted data
echo '<pre>';
print_r($_POST);
echo '</pre>';

?>

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>ส่วนผสม</th>
					<th>ปริมาณ</th>
					<th>หน่วย</th>
					<th></th>
				</tr>
			</thead>
			<?php 

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "littlebearbread";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$product_id = $_GET['id'];
			$sql = "SELECT * FROM ingredient_list as i, material_list as m WHERE product_id = $product_id AND i.mat_id = m.mat_id";
			$result = $conn->query($sql);

			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td>".$count."</td>";
				echo "<td>".$row["mat_name"]."</td>";
				echo "<td>".$row["amount"]."</td>";
				echo "<td>".$row["mat_unit"]."</td>";
				echo "<td><center><a class='btn btn-warning' href='ingredient_form.php?product_id=".$_GET['id']."&int_id=".$row["int_id"]."' role='button'>แก้ไข</a></center></td>";
				echo "</tbody>";
				$count++;
			}
			
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
