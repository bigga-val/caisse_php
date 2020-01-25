<?php
	extract($_POST);
	extract($_GET);

	require_once("../controlers/functions.php");

	$data = liste_paiement_eleve($id_classe);
	$nbre_max = max_rows()->fetch();
	$titre = titre_tableau();
	$s_titre = sous_titre_tableau();
	$nbre_max = $nbre_max->max_id;
	
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
				<input class="form-control rounded mr-sm-2" id="myInput"  placeholder="Search...">
			</li>	
		</ul>
	</nav>
	<table class="table table-hover">	
		<thead>
			<tr>	
				<th>id</th>
				<th>Nom</th>
				<th>Postnom</th>
				<?php foreach ($titre as $design) { ?>
				 <th colspan="2" class="text-center"><?php echo $design->designation; ?>
				 </th>
				<?php } ?>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<?php for($i = 0; $i < $s_titre; $i++){ ?>
					<td>Montant</td>
					<td>Date</td>
				<?php } ?>
			</tr>
		</thead>
		<tbody id="myTable">

		<?php
			if(count((array)$data) > 0){
		 foreach ($data as $datas ) { ?>
			<tr>
				<td><?php echo $datas->id; ?></td>
				 <td><?php echo $datas->nom_eleve; ?></td>
				<td><?php echo $datas->postnom_eleve; ?></td>
				<td><?php 
					if (isset($datas->montant_francs)) {
						echo $datas->montant_francs;
					}else{
						echo "vide";
					}
				 	?>
				</td>
				<td><?php echo $datas->date_paiement; ?></td>
				<!--td><?php 
						/*if(isset($datas->montant_dollars)){
						 echo $datas->montant_dollars; 
						}
						else{
							echo "-";
						}*/
					?>	
				</td-->
				<td></td>

			</tr>
		<?php } }
			else{
				echo "<p>aucune données à afficher pour cette classe</p>";
			}
		?>
		</tbody>
	</table>
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