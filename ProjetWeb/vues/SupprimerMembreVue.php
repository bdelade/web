<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}

	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MembreManager.php");
	
	$membreManager =  new MembreManager();
	$searchMembres = $membreManager->SearchAllMembre();
	
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
						<form action="../controleurs/SupprimerMembreControleur.php" method="POST">
							<table>
								<tr>
									<th>Liste des membres</th>
								</tr>
<?php
							foreach($searchMembres as $searchMembre)
							{
?>
							<tr>
							<td><?php echo $searchMembre->getPseudo() ?></td>
							<td><input type="radio" name="supprimer" value="<?php echo $searchMembre->getPseudo() ?>"</td>
							</tr>
<?php
							}
?>
							<tr><td></td><td><input type="submit" value="Supprimer"></td>
						</form>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>