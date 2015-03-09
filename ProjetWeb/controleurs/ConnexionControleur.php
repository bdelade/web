<?php
session_start();

	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/DataBaseModele.php");
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MembreManager.php");
	
	$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
	$_POST['password'] = htmlspecialchars($_POST['password']);
	
	$membreManager =  new MembreManager();
	$membre = $membreManager->ConnexionOk($_POST['pseudo'], $_POST['password']);
	
	if(is_null($membre))
	{
		header('Location: ../vues/PagePersoInexistante.php');
	}
	else if($membre->getPseudo() == "Admin")
	{
		$_SESSION['User'] = $membre->getPseudo();
		$_SESSION['id'] = $membre->getId();
		
		header('Location:../vues/AdministrationVue.php');
	}
	else
	{
		$_SESSION['User'] = $membre->getPseudo();
		$_SESSION['id'] = $membre->getId();
	
		header('Location: ../vues/PagePerso.php');
	}
?>