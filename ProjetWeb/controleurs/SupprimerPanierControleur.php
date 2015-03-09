<?php
	session_start();
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/PanierManager.php");
	
	if(!isset($_SESSION['User']))
		header('Location: AccueilVue.php');
	if(!isset($_POST['musiqueId']))
	{
		header('Location: ../vues/RechercherMusiqueVue.php');
	}
		
	$panierManager = new PanierManager();
	$panierManager->DeleteMusicFromPanier($_SESSION['id'], $_POST['musiqueId']);
	
	header('Location: ../vues/PanierVue.php');

?>