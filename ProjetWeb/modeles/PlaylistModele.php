<?php

	class Playlist
	{
	
		private $idPlaylist;
		private $idUtilisateur;
		private $nomPlaylist;
	
		public function _construct($unIdPlaylist, $unIdUtilisateur, $unNomPlaylist)
		{
			$this->idPlaylist = $unIdPlaylist;
			$this->idUtilisateur = $unIdUtilisateur;
			$this->nomPlaylist = $nNomPlaylist;
		
		}
	
		public function getId()
		{
			return $this->idPlaylist();
		}
	
		public function getIdMembre()
		{
			$this->idUtilisateur;
		}
	
		public function getNom()
		{
			$this->nomPlaylist();
		}
	}
?>