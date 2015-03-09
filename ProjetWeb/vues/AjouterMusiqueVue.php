<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/ArtisteManager.php");
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/AlbumManager.php");
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/GenreManager.php");
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MusiqueManager.php");
	
	$albumManager = new AlbumManager();
	$albums = $albumManager->SearchAllAlbum();
	
	$genreManager = new GenreManager();
	$genres = $genreManager->SearchAllGenre();
	
	$musiqueManager =  new MusiqueManager();
	$musiques = $musiqueManager->SearchAllMusic();
	
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
								<th>Liste des musiques</th>
							</tr>
					<?php
							foreach($musiques as $musique)
							{
					?>
							<tr>
							<td><center><?php echo $musique->getTitre() ?></center></td>
							</tr>
					<?php
							}
					?>
						</table>
							<form method="post" action="../controleurs/AjouterMusiqueControleur.php">
								<table border=0 >
									<tr>
										<td><label for="Titre">Titre <font color="red">*</font></td>
										<td><input type="text" name="titre"/></td>
									</tr>
									<tr>
										<td>Album:</td>
											<td>
											<select name="numAlbum">
												<?php
													$albumManager = new AlbumManager();
													foreach($albums as $album)
													{
														echo '<option value='.$album->getId().'>'.$album->getNomAlbum().'</option>'; 
													}
												?>
											</select>
											</td>
									</tr>
									<tr>
										<td>Genre:</td>
										<td>
											<select name="numGenre">
												<?php
													foreach($genres as $genre)
													{
														echo '<option value='.$genre->getId().'>'.$genre->getNom().'</option>'; 
													}
													?>
											</select>
										</td>
									</tr>
									<tr>
										<td>Prix musique:</td>
										<td><input type="number" name="prixMusique"/></td>
									</tr>
									<tr>
										<!-- On limite l'upload à 10 mo -->
										<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
										<td><label for="Fichier">Fichier <font color="red">*</font></td>
										<td><input type="file" name="musique"></td>
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Ajouter Musique" /></td>
									</tr>
								</table>
							</form>
						</center>
				</center>
			</div>
		</center>
	</body>
</html>