<?php
	require_once("../controlers/dbconnect.php");

	/**
	 * La classe Eleves_inscrits, comme son nom l'indique, permet de traiter les *eleves inscrits. Apres tout, elle serait inutile, en fait :)
	 *beh 
	 */
	class Eleves_inscrits
	{
		public $id, $nom_eleve, $postnom_eleve, $prenom_eleve, $id_classe, $classe, $designation;
		
		function __construct($id, $nom_eleve, $postnom_eleve, $prenom_eleve, $id_classe, $classe, $designation)
		{
			$this->id = $id;
			$this->nom_eleve = $nom_eleve;
			$this->postnom_eleve = $postnom_eleve;
			$this->prenom_eleve = $prenom_eleve;
			$this->id_classe = $id_classe;
			$this->classe = $classe;
			$this->designation =$designation;
		}
		public static function eleves_inscrits()
		{
			$PDO = dbconnect();
			$req = $PDO->prepare("SELECT * FROM v_eleves_inscripts");
			$req->execute();
			$liste = array();
			        if($req != NULL)
			        {
			            while($objet = $req->fetch(PDO::FETCH_OBJ))
			            {
			                $p=new Eleves_inscrits($objet->id, $objet->nom_eleve, $objet->postnom_eleve, $objet->prenom_eleve, $objet->id_classe, $objet->classe_eleve, $objet->designation);
			                $liste[]=$p;
			            }
			        }
			    return $liste;
			}
			/**
			*la fonction classe_eleves($id_class) permet d'afficher les eleves d'une *classe precisement de maniere filtrée.
			*Elle prend en parametre un seul argument, l'id de la classe dont il *faudra afficher les eleves
			*/
		public static function classe_eleves($id_class){
			$PDO = dbconnect();
			$req = $PDO->prepare("
				SELECT e.id, e.nom_eleve, e.postnom_eleve, e.prenom_eleve,c.id as id_classe, c.designation, f.designation 
				FROM t_eleve as e, t_classe as c, t_filiere as f,
					t_inscription as i 
				WHERE (e.id = i.id_eleve and c.id = i.id_classe) 
				and c.id_filiere = f.id 
				and i.id_classe= $id_class;
				");
			$req->execute();
			$liste = array();
			        if($req != NULL)
			        {
			            while($objet = $req->fetch(PDO::FETCH_OBJ))
			            {
			                $p=new Eleves_inscrits($objet->id, $objet->nom_eleve, $objet->postnom_eleve, $objet->prenom_eleve, $objet->id_classe, $objet->designation, $objet->designation);
			                $liste[]=$p;
			            }
			        }
			    return $liste;
		}

	}

?>