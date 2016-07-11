<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Get estimated delivery date</title>
		<link href="http://localhost/test/import/css/delivery.css" type="text/css" rel="stylesheet" />
	</head>
	<body>

		<div class="container">

			<?php

			if(isset($date)){
				echo '<p>Delivery date is </p>' . $date;
			} else {
				if(isset($error)){
					echo '<p>' . $error . '</p>';
				} else {
					echo '<p><b>Get estimated delivery date</b></p>';
				}
			?>

				<form method="POST" action="http://localhost/test/index.php/welcome/">
					Enter the shipping tracking code <br/><br/>
					<input type="text" name="code"></input> <br/><br/>
					<input type="submit" value="Submit">
				</form>

			<?php
			}
			?>

		</div>

	</body>
</html>