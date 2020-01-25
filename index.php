<?php
		extract($_POST);
		extract($_GET);
		require_once ("models/class.auth.php");
		require_once("controlers/dbconnect.php");
		if(isset($login) and isset($pwd)){
		$login = strip_tags($login);
		$pwd = strip_tags($pwd);
		}
		if(isset($login)){
		print($login);
		}
	if(!empty($_POST)){
		session_start();
		$Auth->login($login, $pwd);
	}else{
		echo "veuillez vous connecter";
	}
	if($Auth->user() == 2){
		header("Location:views/");
	}else if($Auth->user() == 3){
		echo "comptable";
	}
	else{
		echo "non trouve";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body class="bg-link">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 ">
				
			</div>
			<div class="col-lg-4 bg-dark mt-5">
				<form method="post" action="index.php">	
					<div class="form-group">	
						<label>	Login</label>
						<input class="form-control" name="login" type="text">
					</div>	

					<div class="form-group">	
						<label>	Password</label>
						<input class="form-control" name="pwd" type="password">
					</div>	

					<div class="form-group">
						<input class="btn btn-success" type="submit">
					</div>	
				</form>
			</div>
			<div class="col-lg-4 ">
				<?php /*
				
					if(!empty($_SESSION["Auth"])){
						echo $_POST['login'];
						echo $_SESSION["Auth"]->id;
						echo $_SESSION["Auth"]->id_role;	
					}else{
						echo "aucune session";
					}
					
					if($Auth->user() == 1){
						echo "vous etes admin";
					}else if ($Auth->user()==2){
						echo "vous etes secretaire";
					}
					echo "<a class='btn btn-secondary' href='controlers/disconnect.php'>Deconnexion</a>"
*/
				?>
				
			</div>
		</div>
	</div>
</body>
</html>