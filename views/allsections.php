<?php

	require_once "../models/class.sections.php";
	$sections = Section::afficher_sections();
	//print_r($sections);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Affiche toutes les sections de l institut</title>
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
				<div class="col" id="HTMLtoPDF">	
					<span class="mx-auto text-centered">Listes des sections disponibles</span>
					<table class="mx-auto table table-hover">	

						<thead>	

							<tr>
								<td>#</td>
								<td>Designation sections</td>
								<td>Actions</td>
							</tr>
						</thead>
						<tbody id="myTable">	
							<?php foreach ($sections as $section) { ?>
							<tr>
								<td><?php echo $section->id?></td>
								<td><?php echo $section->designation?></td>
								<td><a href="alloptions.php?id_section=<?php echo $section->id ?>">Voir options</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
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