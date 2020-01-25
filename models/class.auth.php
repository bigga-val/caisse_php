<?php 
		extract($_POST);
		extract($_GET);
		require_once "./controlers/dbconnect.php";
		$PDO = dbconnect();
	/**
	 * Classe d'authentification des utilisateurs
	 */
	class Auth
	{
		public $id;
		public $login;
	    public $password;

	    
	    public function __construct()
	    {
	        /*$this->id = $id;
	        $this->login = $login;
	        $this->password = $password;
	        $this->adresse = $adresse;*/
	    }
	    /**
		*Fonction permettant de se logger, elle prend en parametre le login et le *mot de passe et nous cree la session de l'utilisateur
	    */
		function login($login, $pwd){
			try{
			$PDO = dbconnect();
			$req = $PDO->prepare("SELECT t_user.id, t_user.nom_user, t_user.password, t_user.id_role, t_user_role.designation, t_user_role.level FROM t_user inner JOIN t_user_role ON 
				t_user.id_role=t_user_role.id WHERE nom_user=:d AND password=:c");
			$req->execute(array("d"=>$login, "c"=>$pwd));
			$data = $req->fetchAll();
			//print_r($data);
			}
			catch(PDOExeption $e)
			{
				echo "connection impossible";
			}
			if(count($data)>0){
				$_SESSION["Auth"]=$data[0];
				return true;
			}else{
				return false;
			}

		}
		/**
		*La fonction Allow() definit si un utilisateur est hablité accès à telle
		*page de l'application ou pas selon son degre
		*/
		function Allow(){
			$req = $PDO->prepare("SELECT level, slug FROM roles");
			$req->execute();
			$data = $req->fetchAll();
			//print_r($data);
		}
		/**
		*user() Definit si la session de l'utilisateur est deja creee ou pas
		*/
		function user(){
			if(isset($_SESSION["Auth"]->id_role)){
				return $_SESSION["Auth"]->id_role;
			}else{
				return false;
			}
		}
		/**
		*deconnecte() permet de deconnecter ou supprimer la session d'un utlisateur
		*
		*/
		function deconnecte(){
			if(isset($_SESSION["Auth"]->slug)){
				session_unset();
				header("Location: login.php");
			}
		}
		
	}
/**
*On instancie Auth() directement au sortir de la classe pour faciliter l'usage
*à l'appel
*/
$Auth = new Auth();

