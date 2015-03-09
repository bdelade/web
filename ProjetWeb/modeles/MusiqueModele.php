<?php

	class Musique
	{
	
		private $idMusique;
		private $numAlbum;
		private $numGenre;
		private $titreMusique;
		private $fileName;
		private $prixMusique;
	
		public function __construct($unIdMusique, $unNumAlbum, $unNumGenre, $unNomMusique, $unFileName, $unPrixMusique)
		{
			$this->idMusique = $unIdMusique;
			$this->numAlbum = $unNumAlbum;
			$this->numGenre = $unNumGenre;
			$this->titreMusique = $unNomMusique;
			$this->unFileName = $unFileName;
			$this->prixMusique = $unPrixMusique;
		
		}
	
		public function getTitre()
		{
	
			return $this->titreMusique;
		}
	
		public function getPrix()
		{
			return $this->prixMusique;
		}
	
	
		public function getId()
		{
			return $this->idMusique;
		}
	
	}
?>