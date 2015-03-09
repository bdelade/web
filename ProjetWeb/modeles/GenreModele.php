<?php

	class Genre
	{
	
		private $idGenre;
		private $nomGenre;
		private $descriptionGenre;
	
		public function __construct($unId, $unNom, $uneDescription)
		{
			$this->idGenre = $unId;
			$this->nomGenre = $unNom;
			$this->descriptionGenre = $uneDescription;
		
		}
	
		public function getId()
		{
			return $this->idGenre;
		}
		
		public function getNom()
		{
			return $this->nomGenre;
		}
		
		public function getGenre()
		{
			return $this->descriptionGenre;
		}
	
	}
	
?>