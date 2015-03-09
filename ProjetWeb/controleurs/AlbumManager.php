<?php

	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/ArtisteModele.php");

	class AlbumManager
	{
		
		public function SearchAllAlbum()
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->GetAllAlbum();
			
		}
		
		public function InsertAlbum($unIdArtiste, $unNomAlbum)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->InsertAlbum($unIdArtiste, $unNomAlbum);
		}
		
		public function DeleteAlbum($unIdAlbum)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->DeleteAlbum($unIdAlbum);
		}
	}
	
?>