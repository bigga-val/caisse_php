<?php
/**
*cette page exemple sert d'exemple, des manipulations de test pour les fonctions
*/

 	require_once ("../controlers/functions.php");
 	$active="1";
 	$PDO = dbconnect();
 	$frais = $PDO->query("
 		select id, designation from t_frais;
 		");
 	$tab=array(1,1,1,2,2);
 	$req = liste_paiement_eleve();
 	$req1 = liste_paiement_eleve();
 	
 	$rep = 0;
 	$tid = [];
 	$tabex = [];
 	foreach ($req as $q) {
 		array_push($tabex, $q);
 	}
 	//print_r($tabex);
 	function po($r){
 		return $r;
 	}
 	print_r(array_map("po", $tabex));
 	echo "</br>".$tabex[0]->nom_eleve;
 	function tab_nbre(){
 		$req1 = liste_paiement_eleve();
		foreach ($req1 as $t) {
			$tid[]=$t->id;
		}
 			return array_count_values($tid);
 	}
 	$v = tab_nbre();
 	foreach ($v as $k) {
 		echo $k."</br>";
 		for($i=0;$i<$k;$i++){
 			print_r((array)$tabex[$k]);
 			/*foreach ($req as $ke) {
 				echo "bonjour";
 			}*/
 		}
 	}
 	
 	//print_r($r);
 	//print_r($tid);
/* 	while ($i = $req->fetchColumn()) {
 		foreach ($req as $d) {
 			if($i == $d->id){
 				$rep++;
 				echo "repetition";
 				continue;
 			}
 		}
 	}
 	echo $rep;*/
 	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exemple page</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
	<input class="sticky-top form-control" id="myInput" type="text"
		placeholder="Rechercher...">
	<table class="table table-hover">
		<thead>
			<td>id</td>
			<td>Nom</td>
			<td>postnom</td>
			<td>Designation frais</td>
			<td>Montant</td>
			<td>Action</td>
		</thead>
		<!-- partie du tableau pouvant être filtré -->
		<tbody id="myTable">
				<?php
				//while ($i = $req->fetchColumn()) {
					foreach ($req->fetchAll() as $data) {
				?>
				<tr>
				<td><?php echo $data->id; ?></td>
				<td><?php echo $data->nom_eleve; ?></td>
				<td><?php echo $data->postnom_eleve; ?></td>
				<td><?php echo $data->designation; ?></td>
				<td><?php echo $data->montant_francs; ?></td>
				<td><a href="../views/frais_paiement_eleve.php?id_eleve=<?php echo $data->id; ?>"> Voir</a></td>
				</tr>
			
				<?php
					}
				?>
			
		</tbody>
		<!-- fin de la partie du tableau à filtrer-->
	</table>






	<table class="table table-hover">
		<th>
	<?php
		while($data = $frais->fetch()){
	?>
		<td><?php echo $data->designation; ?></td>
	<?php
		}
	?>
		</th>
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