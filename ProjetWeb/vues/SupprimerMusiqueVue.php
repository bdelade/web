<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}

	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MusiqueManager.php");
	
	$musiqueManager =  new MusiqueManager();
	$searchMusiques = $musiqueManager->SearchAllMusic();
	
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
						<form action="../controleurs/SupprimerMusiqueControleur.php" method="POST">
							<table>
								<tr>
									<th>Liste des musiques</th>
								</tr>
<?php
							foreach($searchMusiques as $searchMusique)
							{
?>
							<tr>
							<td><?php echo $searchMusique->getTitre() ?></td>
							<td><input type="radio" name="supprimer" value="<?php echo $searchMusique->getIdMusique() ?>"</td>
							</tr>
<?php
							}
?>
							<tr><td></td><td><input type="submit" value="Supprimer"></td></tr>
						</form>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>