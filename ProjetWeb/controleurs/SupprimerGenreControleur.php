<?php
	
	session_start();
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/GenreManager.php");
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

						if(isset($_POST['supprimer']))
						{
							$genreManager = new GenreManager();
							$genreManager->DeleteGenre($_POST['supprimer']);
							
							header('Location: ../vues/SupprimerGenreVue.php');
						}
						else
						{
							echo "Erreur suppression";
					?>
							<a href="../vues/SupprimerGenreVue.php">Recommencer</a>
					<?php
						}

					?>
				</center>
			</div>
		</center>
	</body>

</html>