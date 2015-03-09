<?php
	
	session_start();
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/ArtisteManager.php");
	
	$_POST['pseudoArtiste'] = htmlspecialchars($_POST['pseudoArtiste']);
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

						if(isset($_POST['pseudoArtiste']) AND (!empty($_POST['pseudoArtiste'])))
						{
							$artisteManager = new ArtisteManager();
							$artisteManager->InsertArtiste($_POST['pseudoArtiste']);
							
							header('Location: ../vues/AjouterArtisteVue.php');
						}
						else
						{
							echo "Erreur pseudo Artiste";
					?>
							<a href="../vues/AjouterArtisteVue.php">Recommencer</a>
					<?php
						}

					?>
				</center>
			</div>
		</center>
	</body>

</html>