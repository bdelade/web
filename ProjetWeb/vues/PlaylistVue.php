<?php
session_start();

	if (isset($_SESSION['User']))
	{
		$utilisateurSession = $_SESSION['User'];
		
		require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/PlaylistManager.php");
		
		//Récupération du contenu de la playlist de l'utilisateur connecté
		$playlistManager = new PlaylistManager();
		$playlists = $playlistManager->GetPlaylistByIdPlaylist($_SESSION['id']);
		
	}
	else
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
		<br><br><br><br><br><br>>
		<center>
			<div id="conteneur">
				<center>
					<h2><center> Panier : <?php echo $utilisateurSession; ?> </center></h2>
					<br/><br/>
								<?php
								if(count($playlists) == 0)
								{
									echo "Vous n'avez pas de playlist."; 
								}
								else
								{
								?>
									<table>
								<?php
									foreach ($playlists as $playlist)
									{
								?>
										<tr>
											<td><?php echo $playlist->getNom(); ?></td>
											<td><a href="PlaylistMusiqueVue.php?Id=<?php echo $playlist->getIdPlaylist(); ?> color="black">Voir Playlist<a/></td>
										</tr>
								<?php
									}
								?>
									</table>
								<?php
								}
								?>
					<center>
						
					</center>
				</center>
			</div>
		</center>
	</body>

</html>