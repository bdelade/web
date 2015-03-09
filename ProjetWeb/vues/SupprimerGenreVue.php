<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/GenreManager.php");
	
	$genreManager = new GenreManager();
	$genres = $genreManager->SearchAllGenre();
	
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
						<form action="../controleurs/SupprimerGenreControleur.php" method="POST">
							<table>
								<tr>
									<th>Liste des genres</th>
								</tr>
							<?php
								foreach($genres as $genre)
								{
							?>
								<tr>
								<td><?php echo $genre->getNom() ?></td>
								<td><input type="radio" name="supprimer" value="<?php echo $genre->getId() ?>"</td>
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