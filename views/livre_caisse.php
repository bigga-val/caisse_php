<?php
	extract($_POST);
	extract($_GET);
	require_once("../controlers/functions.php");
	$mouv = get_mouvement()->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Livre de caisse</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body class="bg-success">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-right sticky-top">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="nav-link text-white rounded">
				Livre de caisse		
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-white rounded">
				Fiche de paie
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-white rounded">
				Créditer	
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-white rounded">
				Effectuer paiement
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-warning rounded">
				Exporter
				</a>
			</li>
			<li class="nav-item">
				<input class="form-control rounded mr-sm-2"  placeholder="Search...">
			</li>	
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-2">
				
			</div>
			<div class="col-8">
				<table class="table table-bordered">
					<thead class="text-center">
						<tr>
							<th>Date</th>
							<th>Designation</th>
							<th colspan="2">Entree</th>
							<th colspan="2">Sortie</th>
							<th colspan="2">Solde</th>
						</tr>
						<tr>
							<th ></th>
							<th ></th>
							<th>USD</th>
							<th>FC</th>
							<th>USD</th>
							<th>FC</th>
							<th>USD</th>
							<th>FC</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php foreach ($mouv as $mouvement) {
							
						 ?>
						<tr>
							<td><?php echo $mouvement->date_mouvement; ?></td>
							<td><?php echo $mouvement->designation; ?></td>
							<td><?php echo $mouvement->entree_dollars; ?></td>
							<td><?php echo $mouvement->entree_francs; ?></td>
							<td><?php echo $mouvement->sortie_dollars; ?></td>
							<td><?php echo $mouvement->sortie_francs; ?></td>
							<td>
								<?php 
									$er = $mouvement->entree_dollars - $mouvement->sortie_dollars;
									echo $er;
								?>
							</td>
							<td>
								<?php 
									$er = $mouvement->entree_francs - $mouvement->sortie_francs;
									echo $er;
								?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>			
				
			</div>
			<div class="col-2">
				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/jsforpdf/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="../assets/js/jsforpdf/jspdf.js"></script>
		<script type="text/javascript" src="../assets/js/jsforpdf/pdfFromHTML.js"></script>
	<script>
	/*script permettant de filtrer les resultats dans le tableau*/
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
