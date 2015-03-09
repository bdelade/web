<?php
	session_start();
	
	if(!isset($_SESSION['User']))
		header('Location: AccueilVue.php');
		
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/GenreManager.php");
		
	$genreManager = new GenreManager();
	$genres = $genreManager->SearchAllGenre();

?>

<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<?php include("MenuVue.php"); ?>
		
		<br><br><br><br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<h2>Recherche Musique</h2>
					
					<form method="POST" action="../controleurs/RechercheMusiqueControleur.php">
						<table>
							<tr>
								<td>Titre :</td>
								<td><input type="text" name="nomMusique" /></td>
							</tr>
							<tr>
								<td>Artiste :</td>
								<td><input type="text" name="nomArtiste" /></td>
							</tr>
							<tr>
								<td>Album :</td>
								<td><input type="text" name="nomAlbum" /></td>
							<tr>
								<td>Genre:</td>
								<td>
									<select name="numGenre">
										<option value="all">Tous</option>
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
								<td colspan="2">
									<input type="submit" name="recherche" value="Rechercher" />
								</td>
							</tr>
						</table>
					</form>	
				</center>
			</div>
		</center>
	</body>
</html>