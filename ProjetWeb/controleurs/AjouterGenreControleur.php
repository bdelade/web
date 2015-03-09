<?php
	
	session_start();
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/GenreManager.php");
	
	$_POST['nomGenre'] = htmlspecialchars($_POST['nomGenre']);
	$_POST['description'] = htmlspecialchars($_POST['description']);
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

						if(isset($_POST['nomGenre']) AND (!empty($_POST['nomGenre'])))
						{
							$genreManager = new GenreManager();
							$genreManager->InsertGenre($_POST['nomGenre'], $_POST['description']);
							
							header('Location: ../vues/AjouterGenreVue.php');
						}
						else
						{
							echo "Erreur nom Genre";
					?>
							<a href="../vues/AjouterGenreVue.php">Recommencer</a>
					<?php
						}

					?>
				</center>
			</div>
		</center>
	</body>

</html>