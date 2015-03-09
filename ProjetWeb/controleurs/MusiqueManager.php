<?php

	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");

	class MusiqueManager
	{
	
		public function SearchAllMusic()
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->GetAllMusic();
			
		}
	
		public function SearchMusic($unTitre, $unNomArtiste, $unNomAlbum, $unNumGenre)
		{
			$gateway = new DataBaseGateway();
			
			if(empty($unTitre)) $unTitre = NULL;
			if(empty($unNomArtiste)) $unNomArtiste = NULL;
			if(empty($unNomAlbum)) $unNomAlbum = NULL;
			if($unNumGenre =="all") $unNumGenre = NULL;
			
			return $gateway->SearchMusic($unTitre, $unNomArtiste, $unNomAlbum, $unNumGenre);
			
		}
		
		public function InsertMusique($unIdAlbum, $unIdGenre, $unTitreMusique, $unPrixMusique, $unFileName)
		{
			$gateway =  new DataBaseGateway();
			
			$gateway->InsertMusique($unIdAlbum, $unIdGenre, $unTitreMusique, $unPrixMusique, $unFileName);
		}
		
		public function DeleteMusic($unIdMusique)
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->DeleteMusique($unIdMusique);
		}

	}
	
?>