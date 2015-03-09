<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/AlbumManager.php");
	
	$albumManager = new AlbumManager();
	$albums = $albumManager->SearchAllAlbum();
	
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
						<form action="../controleurs/SupprimerAlbumControleur.php" method="POST">
							<table>
								<tr>
									<th>Liste des albums</th>
								</tr>
							<?php
								foreach($albums as $album)
								{
							?>
								<tr>
								<td><?php echo $album->getNomAlbum() ?></td>
								<td><input type="radio" name="supprimer" value="<?php echo $album->getId() ?>"</td>
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