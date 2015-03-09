<?php
session_start();

	if (isset($_SESSION['User']))
	{
		$utilisateurSession = $_SESSION['User'];
		
		require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/PanierManager.php");
		
		//Récupération du contenu du panier de l'utilisateur connecté
		$panierManager = new PanierManager();
		$musiques = $panierManager->GetPanierById($_SESSION['id']);
		
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
		
		<?php include("MenuVue.php"); ?>
		<br><br><br><br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<h2><center> Panier : <?php echo $utilisateurSession; ?> </center></h2>
					<br/><br/>
								<?php
								if(count($musiques) == 0)
								{
									echo "Panier vide"; 
								}
								else
								{
								?>
									<form method="POST" action="../controleurs/SupprimerPanierControleur.php">
										<table>
									<?php
										foreach ($musiques as $musique)
										{
									?>
											<tr>
												<td><?php echo $musique->getTitre(); ?></td>
												<td><?php echo $musique->getPrix(); ?></td>
												<td><?php echo "€" ?></td>
												<td><input type="checkbox" name="musiqueId[]" value="<?php echo $musique->getId() ?>"></td>
											</tr>
									<?php
										}
									?>
										<tr>
											<td><a href="../controleurs/PanierControleur.php">Commander </a></td>
											<tr><td></td><td><input type="submit" value="Supprimer"></td></tr>
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