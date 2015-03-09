<?php
session_start();

	if (isset($_SESSION['User']))
	{
		$utilisateurSession = $_SESSION['User'];
		
		require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/PanierManager.php");
		
		//Récupération du contenu du panier de l'utilisateur connecté
		$panierManager = new PanierManager();
		$paniers = $panierManager->GetPanierById($_SESSION['id']);
		
	}
	else
	{
		header('Location: AccueilVue.php');
	}

?>


<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body class="style1">
		<br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<h2><center> Panier : <?php echo $utilisateurSession; ?> </center></h2>
					<br/><br/>
								<?php
								if(count($paniers) == 0)
								{
									echo "Panier vide"; 
								?>
									<a href="../AccueilVue.php">Retour</a></th>
								<?php
								}
								else
								{
								?>
									<form method="post" action="PanierControleurVérification.php">
										<table border=0 >
										<tr>
											<td><label for="adresse">Entrez une adresse postale svp<font color="red">*</font></td>
											<td><input type="text" name="adresse"></td>
										</tr>
										<tr>
											<td><label for="mail">Entrez une adresse email la livraison de votre musique<font color="red">*</font></td>
											<td><input type="email" name="mail"></td>
										</tr>
										<tr>
											<td><label for="numcb">Entrez un numero de carte bleu<font color="red">*</font></td>
											<td><input type="number" name="numero"></td>
										</tr>
										<tr>
											<td><label for="datecb">Entrez la date d'expiration<font color="red">*</font></td>
											<td><input type="date" name="dateExp"></td>
										</tr>
										<tr>
											<td><label for="cryptocb">Entrez les 4 derniers chiffres du cryptogramme visuel<font color="red">*</font></td>
											<td><input type="number" name="crypto"></td>
										</tr>
										<tr>
											<td colspan="2"><input type="submit" value="Commander" /></td>
											<td colspan="2"><input type="button" value="Annuler" onclick="location.href='../vues/AccueilVue.php'" /></td>
										</tr>	
										</table>
									</form>
								<?php
								}
								?>
					<center>
						
					</center>
				</center>
			</div>
		</center>
	</body>

</html>