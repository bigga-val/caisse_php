<?php
	session_start();
	echo $_SESSION["Auth"]->id;
?>
<!DOCTYPE html>
<html>
<head>
	<title>menu</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body class="bg-info">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4 text-white my-5">
				<a href="allsections.php" class="text-dark text-right">Effectuer paiement</a>
				<h2>Etablir rapport</h2>
			</div>
			<div class="col-sm-4">
				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/jsforpdf/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="../assets/js/jsforpdf/jspdf.js"></script>
		<script type="text/javascript" src="../assets/js/jsforpdf/pdfFromHTML.js"></script>
</body>
</html>