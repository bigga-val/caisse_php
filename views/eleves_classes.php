<?php
	require_once("../controlers/dbconnect.php");
	require_once("../models/class.inscripts.php");
	
	$eleves = Eleves_inscrits::eleves_inscrits();
	//print_r($eleves);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
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
				<a href="#" class="nav-link text-warning rounded" onclick="HTMLtoPDF()">
				Exporter
				</a>
			</li>
			<li class="nav-item">
				<input class="form-control rounded mr-sm-2" id="myInput" placeholder="Search...">
			</li>	
		</ul>
	</nav>
 <div class="container">
 	<div class="row">
 		<div class="col"></div>
 		<div class="col" id="HTMLtoPDF">
			<table class="table table-hover">
				<thead>
					<th>#</th>
					<th>Nom</th>
					<th>Postnom</th>
					<th>Prenom</th>
					<th>Classe</th>
					<th>Actions</th>
				</thead>
				<tbody id="myTable">
					<?php foreach ($eleves as $eleve) {
						
					?>
						<tr>
							<td><?php echo $eleve->id; ?></td>
							<td><?php echo $eleve->nom_eleve; ?></td>
							<td><?php echo $eleve->postnom_eleve; ?></td>
							<td><?php echo $eleve->prenom_eleve; ?></td>
							<td><?php echo $eleve->classe." ".$eleve->designation;; ?></td>
							<td><a href="<?php echo $eleve->id; ?>">Voir</a></td>
						</tr>
					<?php 
						}
						
					?>
				</tbody>
			</table>
			
 		</div>
 		<div class="col">
 			<a href="" onclick="HTMLtoPDF()">Download</a>
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
	