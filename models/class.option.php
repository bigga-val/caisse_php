<?php
	require_once "../controlers/dbconnect.php";
	require_once "class.filiere.php";
	/**
	*La classe option est le modele des options que l'on doit utiliser dans la base *de données, elle doit dependre des sections dont elle a la cle etrangere
	*/
	class Option
	{
		public $id;
		public $nom_option;
		public $id_section;
		public $active;

		function __construct($id, $nom_option, $id_section, $active)
		{
			$this->id = $id;
			$this->nom_option = $nom_option;
			$this->id_section = $id_section;
			$this->active = $active;
		}
		/**
		*La fonctions afficher_options() permet d'afficher toutes les options *disponibles dans la base de données sans distinction
		*/
		public function afficher_options(){
			$PDO = dbconnect();
			$req = $PDO->prepare("SELECT id, designation, FROM t_option");
			$req->execute();
			$liste = array();
	        if($req != NULL)
	        {
	            while($objet = $req->fetch(PDO::FETCH_OBJ))
	            {
	                $p=new Option($objet->id, $objet->designation, $objet->id_section, $objet->active);
	                $liste[]=$p;
	            }
	        }
	        return $liste;
		}
		/**
		*la fonction to_filieres($id) affiche toutes les filieres qui dependent *directement de l'option dont l'id est placé en parametre. 
		*elle prend en parametre juste l'id de l'option parent
		*/
		public function to_filieres($id){
		$active="1";
		$PDO = dbconnect();
		$req = $PDO->prepare("select t_filiere.id, t_filiere.designation, t_filiere.id_option, t_filiere.active
			from t_option, t_filiere
	 		where t_filiere.id_option = t_option.id
     		and t_filiere.id_option = $id
	 		and t_filiere.active=$active;"
	    	);
		$req->execute();
		$liste = array();
        if($req != NULL)
        {
            while($objet = $req->fetch(PDO::FETCH_OBJ))
            {
                $p=new Filiere($objet->id, $objet->designation, $objet->designation, $objet->id_option, $objet->active);
                $liste[]=$p;
            }
        }
        return $liste;
		}
	}
?>