<?php
	include 'connect.php';

	//echo "name".$_POST["name"];
	//echo "type".$_POST["type"];
	//echo "unit".$_POST["unit"];
	//echo "amount".$_POST["amount"];
	if ((trim($_POST["name"]," ") === "") || (trim($_POST["unit"]," ") === "")) {
		# code...
		$conn->close();
	}else{
		$name = $_POST["name"];
		$kind = $_POST["kind"];
		if ($kind == "วัตถุดิบ") {
			# code...
			$type = $_POST["itype"];
		}elseif ($kind == "บรรจุภัณฑ์") {
			# code...
			$type = $_POST["ptype"];
		}
		
		$unit = $_POST["unit"];
		// $amount = $_POST["amount"];
		$max = $_POST["max"];

		$sql = "INSERT INTO material_list (mat_name, mat_type, mat_cat, mat_unit, amount_expect) VALUES ('$name', '$kind', '$type', '$unit', '$max')";

		$result = mysql_query($sql);
		if ($conn->query($sql) === TRUE) {
	    	//echo "New record created successfully";
		} else {
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	
    header("Location: /managemat_main.php");
    exit;

?>