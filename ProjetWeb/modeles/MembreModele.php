<?php

	class Membre
	{
	
	private $id;
	private $pseudo;
	private $motDePasse;
	
		public function __construct($unId, $unPseudo, $unMotDePasse)
		{
			$this->id = $unId;
			$this->pseudo = $unPseudo;
			$this->motDePasse = $unMotDePasse;
		}
		
		public function getId()
		{
			return $this->id;
		}
		
		public function getPseudo()
		{
			return $this->pseudo;
		}
	
	}
	
?>