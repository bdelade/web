<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/ArtisteManager.php");
	
	$artisteManager = new ArtisteManager();
	$artistes = $artisteManager->SearchAllArtiste();
	
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
					<h2><center> Bienvenue sur Librozik - Listen & Download !</center></h2>
						<form action="../controleurs/SupprimerArtisteControleur.php" method="POST">
							<table>
								<tr>
									<th>Liste des artistes</th>
								</tr>
							<?php
								foreach($artistes as $artiste)
								{
							?>
								<tr>
								<td><?php echo $artiste->getPseudo() ?></td>
								<td><input type="radio" name="supprimer" value="<?php echo $artiste->getId() ?>"</td>
								</tr>
							<?php
							}
							?>
							<tr><td></td><td><input type="submit" value="Supprimer"></td>
						</form>
				</center>
			</div>
		</center>
	</body>
</html>