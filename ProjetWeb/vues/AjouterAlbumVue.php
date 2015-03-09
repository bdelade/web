<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/ArtisteManager.php");
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/AlbumManager.php");
	
	$artisteManager = new ArtisteManager();
	$artistes = $artisteManager->SearchAllArtiste();
	
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
						
						<table>
							<tr>
								<th>Liste des albums</th>
							</tr>
					<?php
							foreach($albums as $album)
							{
					?>
							<tr>
							<td><center><?php echo $album->getNomAlbum() ?></center></td>
							</tr>
					<?php
							}
					?>
						</table>
							<form method="post" action="../controleurs/AjouterAlbumControleur.php">
								<table border=0 >
									<tr>
										<td><label for="Album">Nom<font color="red">*</font></td>
										<td><input type="text" name="nomAlbum"/></td>
									</tr>
									<tr>
										<td>Artiste:</td>
										<td>
											<select name="numArtiste">
												<?php
													foreach($artistes as $artiste)
													{
														echo '<option value='.$artiste->getId().'>'.$artiste->getPseudo().'</option>'; 
													}
												?>
											</select>
										</td>
									</tr>
										<td colspan="2"><input type="submit" value="Ajouter Album" /></td>
									</tr>
								</table>
							</form>
						</center>
				</center>
			</div>
		</center>
	</body>
</html>