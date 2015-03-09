<?php

	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");

	class MembreManager
	{
	
		// Retourne l'utilisateur en cas de validation des identifiants de connexion sinon retourne null
		public function ConnexionOk($unLogin, $unMotDePasse)
		{
			// Instantiation du gateway
			$gateway = new DataBaseGateway();
			
			// Récupération de l'utilisateur par son login et mot de passe
			$membre = $gateway->GetMembreByLoginAndPassword($unLogin, $unMotDePasse);
			
			// Si l'utilisateur est null alors il n'existe pas
			if(is_null($membre))
				return null;
			else
				return $membre;
		}
		
		public function InsertMembre($unLogin, $unMotDePasse)
		{
			$gateway = new DataBaseGateway();
			
			$gateway->InsertMembre($unLogin, $unMotDePasse);
		}
		
		public function DeleteMembre($unLogin)
		{
			$gateway = new DataBaseGateway();
			
			//L'administrateur ne peut pas être surpprimé
			if($unLogin <> 'Admin')
			{
			$gateway->DeleteMembre($unLogin);
			}
		
		}
		
		public function GetMembreByLogin($unLogin)
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->GetMembreByLogin($unLogin);
		}
		
		public function MembreExist($unLogin)
		{
			$gateway = new DataBaseGateway();
			
			$membre = $gateway->GetMembreByLogin($unLogin);
			
			if(is_null($membre))
				return false;
			else
				return true;
		}
		
		public function SearchAllMembre()
		{
			$gateway = new DataBaseGateway();
			
			return $gateway->GetAllMembre();
			
		}
	}
	
?>