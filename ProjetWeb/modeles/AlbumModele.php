<?php

	class Album
	{
	
		private $idAlbum;
		private $idArtiste;
		private $nomAlbum;
	
		public function __construct($unIdAlbum, $unIdArtiste, $unNomAlbum)
		{
			$this->idAlbum = $unIdAlbum;
			$this->idArtiste = $unIdArtiste;
			$this->nomAlbum = $unNomAlbum;
		
		}
	
		public function getId()
		{
			return $this->idAlbum;
		}
	
		public function getIdArtiste()
		{
			return $this->idArtiste;
		}
		
		public function getNomAlbum()
		{
			return $this->nomAlbum;
		}
	
	}
	
?>