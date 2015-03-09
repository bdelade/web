<?php

	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");

	class ArtisteManager
	{
		
		public function SearchAllArtiste()
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->GetAllArtiste();
			
		}
		
		public function InsertArtiste($unIdArtiste)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->InsertArtiste($unIdArtiste);
		}
		
		public function DeleteArtiste($unIdArtiste)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->DeleteArtiste($unIdArtiste);
		}
	}
	
?>