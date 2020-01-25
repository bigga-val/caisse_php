<?php
	
	extract($_POST);
	extract($_GET);

	require_once "../controlers/dbconnect.php";
	/**
	*La classe Classe est le modele des classes que l'on doit utiliser dans la bdd, *elle doit dépendre de la filiere dont elle a la clé etrangère
	*/
	class Classe
	{
		public $id;
		public $nom_classe;
		public $id_opt;
		public $id_filiere;
		public $active;

		function __construct($id, $nom_classe, $id_option, $id_filiere)
		{
			$this->id = $id;
			$this->nom_classe = $nom_classe;
			$this->id_option = $id_option;
			$this->id_filiere = $id_filiere;
			
		}

		
		/**
		*afficher_classes() permet d'afficher toutes toutes les classes disponibles
		*dans la base de données sans distinction
		*/
		public function afficher_classes(){
			$PDO = dbconnect();
			$req = $PDO->prepare("SELECT id, designation, id_option, id_filiere, active FROM t_classe");
			$req->execute();
			$liste = array();
	        if($req != NULL)
	        {
	            while($objet = $req->fetch(PDO::FETCH_OBJ))
	            {
	                $p=new Classe($objet->id, $objet->designation, $objet->id_option, $objet->id_filiere, $objet->active);
	                $liste[]=$p;
	            }
	        }
	        return $liste;
		}
		/**
		*to_eleves() permet d'afficher tous les eleves d'une classe. elle prend en parametre l'id de la classe où les eleves sont inscrits.
		*/
		public function to_eleves($classe){
			$PDO = dbconnect();
			$req = $PDO->prepare("SELECT e.id, e.nom_eleve, e.postnom_eleve, e.prenom_eleve,c.id as id_classe,
		c.designation, f.designation 
	FROM t_eleve as e, t_classe as c, t_filiere as f,
		t_inscription as i 
	WHERE (e.id = i.id_eleve and c.id = i.id_classe) 
	and c.id_filiere = f.id 
	and i.id_classe= $classe;");
		}
	}
?>