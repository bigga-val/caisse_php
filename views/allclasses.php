<?php
	extract($_POST);
	extract($_GET);
    //print($id_filiere."id_filiere");
    require_once "../models/class.classe.php";
    require_once "../models/class.option.php";
    $liste = Filiere::to_classes($id_filiere);
    //print_r($liste);
    //echo($nom_filiere);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Affiche toutes les classes de l'institut</title>
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
			<div class="col-1"></div>
			<div class="col-xl-10 " id="HTMLtoPDF">
				<table class="table table-hover mx-auto">
					<thead>
						<tr>
							<td>#</td>
							<td>Designation classes</td>
							<td colspan="2" class="">Actions</td>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php foreach($liste as $classe){ ?>
							<tr>
								<td>
									<?php echo $classe->id; ?>
								</td>
								<td>
									<?php echo $classe->nom_classe." ".$nom_filiere; ?>	
								</td>
								<td>
									<a href="liste_eleves.php?id_class=<?php echo $classe->id; ?>&class=<?php echo $classe->nom_classe; ?>">Voir eleves</a>
								</td>
								<td>
									<a href="situation_classe.php?id_classe=<?php echo $classe->id; ?>&class=<?php echo $classe->nom_classe; ?>">Voir situation</a>
								</td>
							</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-1">
				
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