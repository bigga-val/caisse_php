<?php
	session_start();
	echo $_SESSION["Auth"]->id;
	extract($_GET);
	extract($_POST);
	require_once "../controlers/functions.php";
	$id_frais = $id_frais;
	echo $id_eleve;
	echo $id_frais;
	$non_reglements = frais_non_paiement_eleve($id_eleve)->fetchAll();
	//print_r($non_reglement->fetchAll());
?>

<!DOCTYPE html>
<html>
<head>
	<title>Effectuer paiement</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4 bg-success">
				<form>
					<div class="form-group">
						<input class="form-control" placeholder="nom">
					</div>
					<div class="form-group">
						<select class="form-control">
							<?php foreach ($non_reglements as $non_reglement) {
								
							 ?>
							<option> <?php echo $non_reglement->designation ?> </option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="" class="form-control">
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				
			</div>
		</div>
	</div>

</body>
</html>