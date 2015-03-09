<?php
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");
	
	class CommandeManager
	{
	
		public function GetCommandeByIdClient($unId)
		{
			$gateway = new DatabaseGateway();
			
			return $gateway->GetCommandeByIdClient($unId);
		}
		
	}

?>