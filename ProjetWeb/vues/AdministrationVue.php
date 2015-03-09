<?php
session_start();

if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
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
					<h2><center> Bienvenue sur Librozik - Listen & Download !</center></h2>
						
						<table>
							<tr>
								<td>Artiste :</td>
								<td><a href="AjouterArtisteVue.php" >Ajouter</a></td>
								<td><a href="SupprimerArtisteVue.php" >Supprimer</a></td>
							</tr>
							<tr>
								<td>Album</td>
								<td><a href="AjouterAlbumVue.php" >Ajouter</a></td>
								<td><a href="SupprimerAlbumVue.php" >Supprimer</a></td>
							</tr>
							<tr>
								<td>Genre :</td>
								<td><a href="AjouterGenreVue.php" >Ajouter</a></td>
								<td><a href="SupprimerGenreVue.php" >Supprimer</a></td>
							</tr>
							<tr>
								<td>Musique :</td>
								<td><a href="AjouterMusiqueVue.php" >Ajouter</a></td>
								<td><a href="SupprimerMusiqueVue.php" >Supprimer</a></td>
							</tr>
							<tr>
								<td>Membre :</td>
								<td><a href="AjouterMembreVue.php" >Ajouter</a></td>
								<td><a href="SupprimerMembreVue.php" >Supprimer</a></td>
							</tr>
						</table>
						
					</center>
				</center>
			</div>
		</center>
	</body>

</html>