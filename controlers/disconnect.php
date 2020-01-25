<?php 
	session_start();
	if(isset($_SESSION["Auth"]->id)){
		session_unset();
		header("Location: ../index.php");
	}
?>