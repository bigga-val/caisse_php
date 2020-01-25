<?php
	require_once "../models/class.sections.php";
	$options = Section::to_option($id_section);

?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
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
		<div class="col-sm-4"></div>
		<!-- Debut de la partie pouvant être imprimé, mettre ID sur la DIV qui regroupe les elements à imprimer -->
		<div class="col-sm-4" id="HTMLtoPDF">
			
			<table class="table table-hover">
				<caption>la liste des sections disponibles</caption>
				<thead>
					<tr>
						<td>#</td>
						<td>Designation section</td>
						<td>Actions</td>
					</tr>
				</thead>
				<?php foreach ($options as $option) { ?>
				<tbody id="myTable">
					<tr>
						<td><?php echo $option->id ?></td>
						<td><?php echo $option->nom_option ?></td>
						<td><a href="allfilieres.php?id_filiere=<?php echo $option->id ?>">Voir filieres</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
		<!-- Fin de la partie du tableau qu'il faudra imprimer pour rapport-->
		<div class="col-sm-4"></div>
	</div>
</div>
<!-- les 3 fichiers importants pour la generation des pdf à imprimer-->
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