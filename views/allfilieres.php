<?php
	require_once "../models/class.option.php";
	require_once "../models/class.option.php";
	$filieres = Option::to_filieres($id_filiere);

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
		<div class="col-xl-4"></div>
		<div class="col-md-4 mx-auto" id="HTMLtoPDF">

			<table class="table table-hover">
				<thead>
					<tr>
						<td>#</td>
						<td>designation Filieres</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php foreach ($filieres as $filiere) { ?>
					<tr>
						<td><?php echo $filiere->id ?></td>
						<td><?php echo $filiere->nom_filiere ?></td>
						<td><a href="allclasses.php?id_filiere=<?php echo $filiere->id; ?>&nom_filiere=<?php echo $filiere->nom_filiere ?> ">Voir classes</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>			
		</div>
		<div class="col-xl-4">
			
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