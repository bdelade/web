<?php

	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");

	class GenreManager
	{
		public function SearchAllGenre()
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->SearchAllGenre();
		}
		
		public function InsertGenre($unNomGenre, $uneDescription)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->InsertGenre($unNomGenre, $uneDescription);
		}
		
		public function DeleteGenre($unIdGenre)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->DeleteGenre($unIdGenre);
		}
	}
	
?>