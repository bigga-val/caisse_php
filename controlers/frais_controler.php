<?php 
	extract($_POST);
	extract($_GET);

	require_once("dbconnect.php");

	if(isset($payer)){
		$PDO = dbconnect();
		echo $payer;
		echo $id_eleve;
		echo $designation;
		echo $dollars;
		echo $francs;
	}else{
		echo "rien";
	}
?>