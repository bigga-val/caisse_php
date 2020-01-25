<?php
	require_once("../controlers/dbconnect.php");


	/**
	 * Classe frais
	 */
	class Frais
	{
		public $id;
		public $designation;
		public $montant_francs;
		public $montant_dollars;
		public $slug;
		public $active;
		function __construct($id, $designation, $montant_francs, $montant_dollars, $slug, $active)
		{
			$this->id = $id;
			$this->designation = $designation;
			$this->montant_dollars = $montant_dollars;
			$this->montant_francs = $montant_francs;
			$this->slug = $slug;
			$this->active = $active;
		}


		public function afficher_frais()
		{
			$PDO = dbconnect();
			$active="1";
			$req = $PDO->prepare("SELECT id, designation, montant_francs, montant_dollars, slug, active FROM t_frais WHERE active = $active");
			$req->execute();
			$liste = array();
	        if($req != NULL)
	        {
	            while($objet = $req->fetch(PDO::FETCH_OBJ))
	            {
	                $p=new Frais($objet->id, $objet->designation, $objet->montant_francs, $objet->montant_dollars, $objet->slug, $objet->active);
	                $liste[]=$p;
	            }
	        }
	        return $liste;
		}
		function frais_non_paiement_eleve($id_eleve){
			$active = "1";
			$PDO = dbconnect();
			$req =  $PDO->query("
				select f.id, f.designation, f.montant_francs, f.montant_dollars 
				from t_frais as f
				WHERE f.id NOT IN 
				(select f.id from t_frais as f, t_paiement as p, t_eleve as e
					where f.id = p.id_frais
					and e.id = p.id_eleve
					and e.id = $id_eleve
					and e.active = $active);
				 ");
			return $req;
		}
	}
?>