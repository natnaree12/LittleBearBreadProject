<?php 
	include 'connect.php';
	include 'header.php';
	
	$sql = "SELECT * FROM material_list";
	$result = $conn->query($sql);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<br>
<center><h1>จัดการวัตถุดิบ</h1></center>
<br>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<!-- form for add new product -->
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<b>เพิ่มวัตถุดิบใหม่</b>
		  </div>
		  <div class="panel-body">
			<form action="insert_management.php" method="post">
			<div class="form-group">
			    <label for="name">ชื่อวัตถุดิบ</label>
			    <input type="text" class="form-control" id="name" name="name">
			  </div>
			  <div class="form-group">
			  	<label for="kind">ประเภท</label>
			  	<select class="form-control" id="kind" name="kind"">
			  		<option>วัตถุดิบ</option>
			  		<option>บรรจุภัณฑ์</option>
			  	</select>
			  </div>
				  <div class="form-group">
				    <label for="type">ชนิดวัตถุดิบ</label>
				    <!-- <input type="text" class="form-control" id="type_name" placeholder="Password"> -->
				    <select class="form-control" id="itype" name="itype">
				      <option>----</option>
					  <option>แป้ง</option>
					  <option>เนย</option>
					  <option>นม</option>
					  <option>น้ำตาล</option>
					  <option>ถั่ว</option>
					  <option>ผลไม้อบแห้ง</option>
					  <option>ช็อคโกแลต</option>
					  <option>สารแต่งกลิ่น</option>
					  <option>ไข่</option>
					  <option>กาแฟ</option>
					  <option>อื่นๆ</option>
					</select>
			      </div>
			      <div class="form-group">
				    <label for="type">ชนิดบรรจุภัณฑ์</label>
				    <!-- <input type="text" class="form-control" id="type_name" placeholder="Password"> -->
				    <select class="form-control" id="ptype" name="ptype">
				      <option>----</option>
					  <option>ถุง</option>
					  <option>กล่อง</option>
					  <option>อื่นๆ</option>
					</select>
			      </div>
			  <div class="form-group">
			    <label for="">หน่วย</label>
			    <input type="text" class="form-control" id="unit" name="unit">
			  </div>
			  <!-- <div class="form-group">
			    <label for="">จำนวน</label>
			    <input type="text" class="form-control" id="amount" name="amount">
			  </div> -->
			  <div class="form-group">
			    <label for="">จำนวนอย่างต่ำ</label>
			    <input type="text" class="form-control" id="max" name="max">
			  </div>
		  </div>
		  <div class="panel-footer">
			<center>
		    	
		    	<button type="submit" class="btn btn-primary" value="submit">บันทึก</button> <!-- submit -->
				<button type="reset" class="btn btn-default" value="submit">ยกเลิก</button>
			</center>
		  </div>
		  </div>
		</form>
    </div>
    <div class="col-md-4"></div>
</div>

<?php 
	
 ?>

<br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead style="text-align: center;">
				<tr>
					<th><center>ลำดับ</center></th>
					<th><center>ชื่อวัตถุดิบ</center></th>
					<th><center>ประเภท</center></th>
					<th><center>ชนิด</center></th>
					<th><center>หน่วย</center></th>
					<th><center>จำนวนอย่างต่ำ</center></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<?php 
			$count = 1;
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo "<td><center>".$count."</center></td>";
				echo "<td><center>".$row["mat_name"]."</center></td>";
				echo "<td><center>".$row["mat_type"]."</center></td>";	
				echo "<td><center>".$row["mat_cat"]."</center></td>";
				echo "<td><center>".$row["mat_unit"]."</center></td>";
				echo "<td><center>".$row["amount_expect"]."</center></td>";
				echo "<td><center><a class='btn btn-warning' href='/edit_mat.php?id=".$row["mat_id"]."' role='button'>แก้ไข</a><center></td>";
				echo "<td><center><a class='btn btn-danger' href='/delete_mat.php?id=".$row["mat_id"]."' role='button'>ลบ</a><center></td>";
				echo "</tbody";
				echo "</br>";
				$count++;
			}
			$conn->close();
			?>			
		</table>
		<br>
	</div>
</div>

<!-- add material -->
<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="addMaterial" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มประเภทใหม่</h4>
        </div>
        <div class="modal-body">
          <form action="add_rawmat_cat.php" method="post">
          	<!-- new type -->
          	<div class="form-group">
			    <label for="exampleInputEmail1">ชื่อประเภท</label>
			    <input type="text" name="mat_cat_name" class="form-control" id="mat_cat_name">
			</div>
			<!-- SUBMIT -->
			<input type="submit" value="บันทึก" class="btn btn-primary">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>