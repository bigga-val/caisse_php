<?php

	require_once ("../controlers/dbconnect.php");

	/**
	 * La Classe Eleve est le modele qui represente l'Eleve que nous devons identifier ou manipuler dans la base de données
	 */
	class Eleve
	{
		public $id;
		public $nom_e;
		public $postnom_e;
		public $prenom_e;
		public $genre;
		public $nom_t;
		public $telephone;
		public $adresse;
		public $date_naissance;
		public $active;
		
		function __construct($id, $nom_e, $postnom_e, $prenom_e, $genre, $nom_t, $telephone, $adresse, $date_naissance, $active)
		{
			$this->id = $id;
			$this->nom_e = $nom_e;
			$this->postnom_e = $postnom_e;
			$this->prenom_e = $prenom_e;
			$this->genre = $genre;
			$this->nom_t = $nom_t;
			$this->telephone = $telephone;
			$this->date_naissance = $date_naissance;
			$this->active = $active;
		}

		
	}
?>