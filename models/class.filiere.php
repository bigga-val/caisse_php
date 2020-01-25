<?php
	require_once "../controlers/dbconnect.php";
	require_once "class.classe.php";
	/**
	*la Classe Filiere est le modele des Filieres que nous allons manipuler dans *notre base de données. Le filiere dependent directement des options dont elles *ont la cle etrangere.
	*/
	class Filiere
	{
		public $id;
		public $nom_filiere;
		public $id_option;
		public $active;

		function __construct($id, $nom_filiere, $id_option, $active)
		{
			$this->id = $id;
			$this->nom_filiere = $nom_filiere;
			$this->id_option = $id_option;
			$this->active = $active;
		}

		

		public function afficher_options(){
			$PDO = dbconnect();
			$req = $PDO->prepare("SELECT id, designation, id_promoion, active FROM t_filiere");
			$req->execute();
			$liste = array();
	        if($req != NULL)
	        {
	            while($objet = $req->fetch(PDO::FETCH_OBJ))
	            {
	                $p=new Option($objet->id, $objet->designation, $objet->id_option, $objet->active);
	                $liste[]=$p;
	            }
	        }
	        return $liste;
		}
		public function to_classes($id){
		$active="1";
		$PDO = dbconnect();
		$req = $PDO->prepare("select t_classe.id , t_classe.designation ,  t_classe.id_filiere, t_classe.active
			from t_classe, t_filiere
	 		where t_classe.id_filiere = t_filiere.id
     		and t_classe.id_filiere = $id
	 		and t_classe.active=$active;"
	    	);
		$req->execute();
		$liste = array();
        if($req != NULL)
        {
            while($objet = $req->fetch(PDO::FETCH_OBJ))
            {
                $p=new Classe($objet->id, $objet->designation, $objet->id_filiere, $objet->active);
                $liste[]=$p;
            }
        }
        return $liste;
		}
	}
?>