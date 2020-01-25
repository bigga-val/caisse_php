<?php
	extract($_POST);
	extract($_GET);
	require_once "../controlers/dbconnect.php";
	require_once "../models/class.section.php";

	if(isset($show_option)){
		Section::to_option($show_option);
		header("Location: ../views/alloptions");
	}
?>