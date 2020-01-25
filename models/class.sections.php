<?php
	extract($_POST);
	extract($_GET);
	
	require_once "../controlers/dbconnect.php";
	require_once "class.option.php";

	/**
	 * La classe Section represente les sections desquelles decouleront les options, *des option, les filieres, des filieres les classes et des classes, les eleves, *elements dont nous aurons besoin pour traiter les données avec cohérence.	
	 */
	class Section
	{
		public $id;
		public $designation;
		public $active;

		function __construct($id, $designation, $active)
		{
			$this->id = $id;
			$this->designation = $designation;
			$this->active = $active;
		}

		/**
		*La fonction afficher_section() affiche toutes les sections disponibles dans *la base de données sans distinction
		*/
		public function afficher_sections()
		{
			$PDO = dbconnect();
			$active="1";
			$req = $PDO->prepare("SELECT id, designation, active FROM t_section WHERE active = $active");
			$req->execute();
			$liste = array();
	        if($req != NULL)
	        {
	            while($objet = $req->fetch(PDO::FETCH_OBJ))
	            {
	                $p=new Section($objet->id, $objet->designation, $objet->active);
	                $liste[]=$p;
	            }
	        }
	        return $liste;
		}
		/**
		*la fonction to_options($id) affiche toutes options disponibles dans la base *de données, relatives à l'id passée en paramètre. 
		*Elle prend en parametre un seul argument, qui est l'id de la section dont *il faudra afficher les option
		*/
		public function to_option($id){
		$active="1";
		$PDO = dbconnect();
		$req = $PDO->prepare("
			SELECT t_option.id, t_option.designation, t_option.id_section, 
				t_option.active 
			FROM t_option 
				INNER JOIN t_section 
				ON t_section.id = t_option.id_section
				and t_option.active = $active 
				and t_section.id=$id");
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
	}
?>