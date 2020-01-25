<?php
	extract($_GET);
	extract($_POST);

	$id_eleve = $id_eleve;
	require_once ("../models/class.eleve.php");
 	require_once("../models/class.frais.php");
 	require_once ("../controlers/functions.php");
 	$active="1";
 	$PDO = dbconnect();
 	$frais = $PDO->query("
 		select designation from t_frais;
 		");
	$liste = Frais::afficher_frais();
//	print_r($liste);
 	$req = frais_paiement_eleve($id_eleve);
 	$reglement = frais_non_paiement_eleve($id_eleve);
//	print_r($reglement->fetch()); 	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Payer</button>
				<!-- la fenetre modal renfermant le formulaire de paiement -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
					<!-- fin fenetre modale -->
			</div>
			<div class="col">
				<a href="#" class="form-control bg-primary text-center">Voir PDF</a>
			</div>
			<div class="col">
				<input class=" sticky-top form-control" id="myInput" type="text" placeholder="Rechercher...">
			</div>
		</div>
		<div class="row">
			<a href="" onclick="HTMLtoPDF()">Download</a>
			<div class="col">
				<h2>Frais reglés</h2>
				<div class="scrollable">
				
				<table class="table table-hover" id="HTMLtoPDF">
					<thead>
						<td>id</td>
						<!--td>Nom</td>
						<td>postnom</td-->
						<td>Designation frais</td>
						<td>Montant</td>
						<td>Dollars</td>
						<td>Date</td>
						<td>Action</td>
					</thead>
					<tbody id="myTable">
						
							<?php
								while($data = $req->fetch()){
							?>
						
							<tr>
								<td><?php echo $data->id; ?></td>
								<!--td><?php //echo $data->nom_eleve; ?></td>
								<td><?php //echo $data->postnom_eleve; ?></td-->
								<td><?php echo $data->designation; ?></td>
								<td><?php echo $data->montant_francs; ?></td>
								<td><?php echo $data->montant_dollars; ?></td>
								<td><?php echo $data->date_paiement; ?></td>
								<td><a href="<?php echo $data->id; ?>" class="btn btn-outline-info rounded" data-toggle="modal" data-target="modale">Revoir</a></td>
							</tr>
							
						
							<?php
								}
							?>
						
					</tbody>
				</table>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-6">
					<h2>Frais non payés</h2>
					<div class="scrollable">
					<table class="table table-hover tab_scroll">
						<thead>
							<td>Id</td>
							<td>Désignation</td>
						</thead>
						<tbody>
							
							<?php
								while($data = $reglement->fetch()){
							?>
							<tr>
								<td><?php echo $data->id; ?></td>
								<td><?php echo $data->designation; ?></td>
								<td><?php echo $data->montant_dollars; ?></td>
								<td><?php echo $data->montant_francs; ?></td>
								<td>
								<div class="modal" id="modale">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-head">
											<h4>Confirmer le paiement</h4>
										</div>
										<div class="modal-body">
											<p>vmontant de 
												<?php echo $data->id; ?> pour le mois de
												<?php echo $data->montant_francs; ?>
											</p>
										</div>
										<div class="modal-footer">
											footer du modale
										</div>
									</div>
								</div>
							</div>
							</td>
								<td><a class="btn btn-outline-primary" data-toggle="modal" data-target="#modale">Regler paiement</a></td>
							</tr>
							
							<?php
								}
							?>
						</tbody>
					</table>
					</div>
				</div>
				<div class="col-sm-8">
					
				</div>
			</div>
	</div>
	
	<script type="text/javascript" src="../assets/js/jsforpdf/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>



	<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		});
	</script>

</body>
</html>
