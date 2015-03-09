<?php
	
	session_start();
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/AlbumManager.php");
	
	$_POST['nomAlbum'] = htmlspecialchars($_POST['nomAlbum']);
?>

<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body class="style1">
		<br><br><br><br><br><br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<?php

						if(isset($_POST['nomAlbum']) AND (!empty($_POST['nomAlbum'])))
						{
							$albumManager = new AlbumManager();
							$albumManager->InsertAlbum($_POST['numArtiste'], $_POST['nomAlbum']);
							
							header('Location: ../vues/AjouterAlbumVue.php');
						}
						else
						{
							echo "Erreur nom album";
					?>
							<a href="../vues/AjouterAlbumVue.php">Recommencer</a>
					<?php
						}

					?>
				</center>
			</div>
		</center>
	</body>

</html>