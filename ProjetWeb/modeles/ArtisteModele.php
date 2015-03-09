<?php

	class Artiste
	{
	
		private $num;
		private $pseudo;
		
		public function __construct($unNum, $unPseudo)
		{
			$this->num = $unNum;
			$this->pseudo = $unPseudo;
		}
		
		public function getId()
		{
			return $this->num;
		}
		
		public function getPseudo()
		{
			return $this->pseudo;
		}
	}
	
?>