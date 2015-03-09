<?php
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");
	
	class PanierManager
	{
	
		public function GetPanierById($unId)
		{
			$gateway = new DatabaseGateway();
			
			return $gateway->GetPanierIdMembre($unId);
		}
		
		public function InsertPanierIntoCommande($unIdMembre)
		{
			$gateway = new DatabaseGateway();
			
			$gateway->InsertPanierIntoCommande($unIdMembre);
		}
		
		public function AddMusicToPanier($unIdClient, $musiques)
		{
			$gateway = new DataBaseGateway();
			
			foreach($musiques as $musique)
			{
				$gateway->InsertMusicIntoPanier($unIdClient, $musique);
			}
		}
		
		public function DeleteMusicFromPanier($unIdClient, $musiques)
		{
			$gateway = new DataBaseGateway();
			
			foreach($musiques as $musique)
			{
				$gateway->DeleteMusicFromPanier($unIdClient, $musique);
			}
		}
		
	}

?>