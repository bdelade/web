<?php

	class Panier
	{
	
	private $id;
	private $article
	
		public function __construct($unId, $unArticle)
		{
			$this->id = $unid;
			$this->article = $unArticle;
		}
		
		public function getId()
		{
			return $this->id;
		}
		
		public function getArticle()
		{
			return $this->article;
		}
	
	}
	
?>