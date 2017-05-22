<?php 
	include 'connect.php';
	include 'header.php';
?>
<?php
	$servername = "localhost:8889";
	$username = "root";
	$password = "root";
	$dbname = "LittleBearBread";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM order_material_list";
	$result = $conn->query($sql);
?>
<br>
<script>
    function printDiv(divId) {
        window.frames["print_frame"].document.body.innerHTML= document.getElementById(divId).innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>
<div id="div1">
<br>
<center><h1>รายการสั่งซื้อ</h1></center>
<br>
<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-8">
		<table class="table table-hover" id="material">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>เลขที่วัถุดิบ</th>
					<th>รายการ</th>
					<th>จำนวน</th>
					<th></th>
				</tr>
			</thead>
			<?php 
			while($row = $result->fetch_assoc()){
				echo "<tbody>";
				echo '<td>'.$row["id"]."</td>";
				echo '<td>'.$row["mat_id"]."</td>";
				echo '<td>'.$row["mat_name"]."</td>";
				echo '<td>'.$row["amount"]."</td>";

				if(isset($POST_["order"])) {
					function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
  						require_once ( '/Applications/MAMP/htdocs/PHPMailer-master/PHPMailerAutoload.php' ); // Add the path as appropriate
  						$Mail = new PHPMailer();
  						$Mail->IsSMTP(); // Use SMTP
  						$Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
  						$Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  						$Mail->SMTPAuth    = TRUE; // enable SMTP authentication
  						$mail->SMTPSecure = 'ssl';
  						$Mail->Port        = 587; // set the SMTP port
  						$Mail->Username    = 'powntheep@gmail.com'; // SMTP account username
  						$Mail->Password    = '2118@a6r4'; // SMTP account password
  						$Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  						$Mail->CharSet     = 'UTF-8';
  						$Mail->Encoding    = '8bit';
  						$Mail->Subject     = 'Test Email Using Gmail';
  						$Mail->ContentType = 'text/html; charset=utf-8\r\n';
  						$Mail->From        = 'powntheep@gmail.com';
  						$Mail->FromName    = 'GMail Test';
  						$Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

  						$Mail->AddAddress( $ToEmail ); // To:
  						$Mail->isHTML( TRUE );
  						$Mail->Body    = $MessageHTML;
  						$Mail->AltBody = $MessageTEXT;
  						$Mail->Send();
  						$Mail->SmtpClose();

  						if ( $Mail->IsError() ) { // ADDED - This error checking was missing
    						return FALSE;
  						}
  						else {
    						return TRUE;
  						}
					}

					$ToEmail = 'pownthepofficial@gmail.com';
					$ToName  = 'Pownthep';
					$MessageHTML = 'adadad';
					$MessageTEXT = 'adada';

					$Send = SendMail( $ToEmail, $MessageHTML, $MessageTEXT );
					if ( $Send ) {
  						echo "<h2> Sent OK</h2>";
					}
					else {
  						echo "<h2> ERROR</h2>";
					}
				}
			}
			$conn->close();
			?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
</div>
<footer><center><a href="javascript:printDiv('div1')" class="btn btn-warning">พิมพ์รายการ</a><br><br>
	<form action="order_material_list.php" method="post">
			<button type="submit" name="order" class="btn btn-warning">ส่งรายการสั่งซื้อ</button>
	</form>
</center></footer>
