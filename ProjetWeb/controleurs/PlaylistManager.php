<?php
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/PlaylistModele.php");
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/MembreModele.php");
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");
	
	class PlaylistManager
	{
		// Création d'une playlist pour un membre 
		public function CreatePlaylist($unLogin, $unNomPlaylist)
		{
			// Récupération de la connexion ‡ la base de donnÈes
			$gateway = new DataBaseGateway();
			
			// Récupération de l'id de l'utilisateur
			$membre = $gateway->GetMembreByLogin($unLogin);
			
			// Création de la playlist dans la base de données
			$gateway->CreatePlaylist($membre->getId(), $unNomPlaylist);
		}
		
		// Récupération des playlist d'un utilisateur via son login
		public function GetPlaylistByLogin($unLogin)
		{
			// Récupération de la connexion à la base de données
			$gateway = new DataBaseGateway();
			
			// Récupération de l'id du membre
			$membre = $gateway->GetMembreByLogin($unLogin);
			
			// Récupération des playlists du membre depuis base de données
			return $gateway->GetPlaylistByIdMembre($membre->getId());
		}
		
		// Récupération d'une playlist par son id
		public function GetPlaylistByIdPlaylist($unIdPlaylist)
		{
			// Récupération de la connexion à la base de donnÈes
			$gateway = new DataBaseGateway();
			
			// Récupération de la playlist par son Id depuis la base de données
			return $gateway->GetPlaylistByIdPlaylist($unIdPlaylist);
		}
		
		// Ajout d'une liste de musique à une playlist
		public function AddMusicToPlaylist($unIdPlaylist, $uneListeIdMusique)
		{
			// Récupération de la connexion à la base de données
			$gateway = new DataBaseGateway();
			
			// Ajout d'une liste de musique à une playlist dans la base de données
			$gateway->AddMusicToPlaylist($unIdPlaylist, $uneListeIdMusique);
		}
	}

?>