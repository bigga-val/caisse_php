<?php

require_once "dbconnect.php";
require_once ("../models/class.eleve.php");
require_once ("../models/class.inscripts.php");


	/**
	*la fonction max_rows() nous returne un entier qui nous represente le nombre des lignes ou d'éléments que l'on retrouve dans la table t_eleve.
	*/
	function max_rows(){
		$active = "1";
		$PDO = dbconnect();
		$requete = $PDO->query("
			select count(id) as max_id from t_eleve where active = $active;
			");

		return $requete;
	}
	/**
	*Des fois, on aura besion d'afficher juste les frais mensuels à payer, la fonction titre_tableau nous retourne la liste de ces frais que l'on utilisera comme titre de notre tableau.
	elle ne prend rien en parametre
	*/

	
	function titre_tableau(){
		$PDO = dbconnect();
 		$frais = $PDO->query("
	 		select designation from t_frais
	 			WHERE designation in ('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre')
	 		;
	 		");
 		return $frais;
	}
	/**
	*la fonction sous_titre_tableau() nous recoupere le nombre des lignes recuperes dans la fonction titre_tableau().
	*Elle ne prend rien en parametre
	*/
	function sous_titre_tableau(){
		$PDO = dbconnect();
	 	$i = 0;
	 	$titre = titre_tableau();
	 	foreach ($titre as $k) {
	 		$i++;
	 	}
 		return $i;
	}
	/**
	*la fonction liste_paiement_eleve() affiche tous les eleves qui ont déjà payé les frais mensuels(septembre- juin)
	*Elle ne prend rien en parametre
	*/
	function liste_paiement_eleve($classe){
		$active = "1";
		$PDO = dbconnect();
		$req =  $PDO->query("
 		select e.id, e.nom_eleve, e.postnom_eleve, f.designation, f.montant_francs, f.montant_dollars, p.date_paiement
		from t_eleve as e, t_frais as f, t_classe, t_paiement as p, t_inscription as i 
		where e.id = i.id_eleve
		and e.id = p.id_eleve
		and i.id_eleve = p.id_eleve
		and i.id_classe = t_classe.id
        and i.id_classe = $classe
		and f.id = p.id_frais
		and e.active = $active
		and i.active = $active
		and f.designation in ('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre')
 		;");
 		return $req;
	}
	/**
	*La fonction frais_paiement_eleve affiche la situation de paiement d'un seul eleve particulierement, selon l'Id fournie en parametre.
	ce parametre est obligatoire.
	*/
	function frais_paiement_eleve($id_eleve){
		$active = "1";
		$PDO = dbconnect();
		$req =  $PDO->query("
 		select e.id, e.nom_eleve, e.postnom_eleve, f.designation, f.montant_francs, f.montant_dollars, p.date_paiement
		from t_eleve as e, t_frais as f, t_paiement as p, t_inscription as i 
		where e.id = i.id_eleve
		and e.id = p.id_eleve
		and e.id = $id_eleve
		and i.id_eleve = p.id_eleve
		and f.id = p.id_frais
		and e.active = $active
		and i.active = $active;
 		");
 		return $req;
	}

	/**
	*la fonction frais_non_paiement_eleve($id_eleve) retourne tous les frais non encore payés par l'élève. elle prend en parametre l'id de l'élève dont il faudra afficher les frais non-payés.
	*/
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

	function get_mouvement(){
		$active = "1";
		$PDO = dbconnect();
		$req = $PDO->query("
			select * from t_mouvement where active = $active;
				");
		return $req;
	}
?>