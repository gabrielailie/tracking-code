<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Update estimated delivery date</title>
		<link href="http://localhost/test/import/css/delivery.css" type="text/css" rel="stylesheet" />
	</head>
	<body>

		<div class="container">

			<?php

			if(isset($succes)){
				echo '<p>' . $succes . '</p>';
			} else {
				if(isset($error)){
					echo '<p>' . $error . '</p>';
				} else {
					echo '<p><b>Update estimated delivery date</b></p>';
				}
			?>


				<form method="POST" action="http://localhost/test/index.php/welcome/updateDeliveryDate/">
					Enter the shipping tracking code
					<input type="text" name="code"></input> <br/><br/>
					Enter the estimated delivery date 
					<input type="text" name="date" placeholder="YYYY-MM-DD"></input> <br/><br/>
					<input type="submit" value="Submit">
				</form>

			<?php
			}
			?>

		</div>

	</body>
</html>