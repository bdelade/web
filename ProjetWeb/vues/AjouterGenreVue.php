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
						
						<table>
							<tr>
								<th>Liste des genres</th>
							</tr>
					<?php
							foreach($genres as $genres)
							{
					?>
							<tr>
							<td><center><?php echo $genres->getNom() ?></center></td>
							</tr>
					<?php
							}
					?>
						</table>
							<form method="post" action="../controleurs/AjouterGenreControleur.php">
								<table border=0 >
									<tr>
										<td><label for="Genre">Nom<font color="red">*</font></td>
										<td><input type="text" name="nomGenre"/></td>
									</tr>
									<tr>
										<td><label for="Description">Description</td>
										<td><textarea name="description" id="description" rows="10" cols="50"></textarea></td>
									</tr>
										<td colspan="2"><input type="submit" value="Ajouter Genre" /></td>
									</tr>
								</table>
							</form>
						</center>
				</center>
			</div>
		</center>
	</body>
</html>