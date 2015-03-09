<?php

	class Commande
	{
	
		private $idAchat;
		private $idClient;
		private $idMusique;
		
		public function __construct($unIdMembre, $uneIdMusique)
		{
			$this->idAchat = $idClient;
			$this->idClient = $unIdMembre;
		}
		
		public function getId()
		{
			return $this->idAchat;
		}
		
		public function getIdClient()
		{
			return $this->idClient;
		}
		
		public function getIdMusique()
		{
			return $this->idMusique;
		}
	}
	
?>