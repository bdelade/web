<?php
	
	session_start();
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MusiqueManager.php");
	
	$_POST['titre'] = htmlspecialchars($_POST['titre']);
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

						if(isset($_POST['titre']) AND (!empty($_POST['titre'])))
						{
							if(isset($_POST['prixMusique']))
							{
								if($_POST['prixMusique'] >= 0)
								{
									$musiqueManager = new MusiqueManager();
          							$musiqueManager->InsertMusique($_POST['numAlbum'], $_POST['numGenre'], $_POST['titre'], $_POST['prixMusique'], $_POST['titre'].".mp3");
          							header('Location: ../vues/AjouterMusiqueVue.php');
									/*
									if(isset($_FILES['musique']) AND (!empty($_FILES['musique'])))
									{
										$dossier = 'musique/';
										//On récupère le nom du fichier
										$fichier = basename($_FILES['musique']['name']);
										//On choisi une taille maximale de fichier
										$taille_maxi = 10485760;
										//Récupération de la taille du fichier
										$taille = filesize($_FILES['musique']['tmp_name']);
										//Choix des types de fichiers acceptés
										$extensions = array('.mp3', '.aac', '.wma');
										//Récupération du type de fichier uploadé
										$extension = strrchr($_FILES['musique']['name'], '.'); 
										//Début des vérifications de sécurité...
										if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
										{
     									$erreur = 'Vous devez uploader un fichier de type mp3, aac ou wma';
										}
										if($taille>$taille_maxi)
										{
     									$erreur = 'Le fichier est trop volumineux...';
										}
										if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
										{
     										//Formatage du nom de fichier (question de sécurité)
     										//On remplace les lettres accentutées par les non accentuées dans $fichier
     										//Et on récupère le résultat dans fichier
     										$fichier = strtr($fichier, 
          													'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          													'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        	  								//En dessous, il y a l'expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre
											//dans $fichier par un tiret "-" et qui place le résultat dans $fichier.
	
     										$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     										if(move_uploaded_file($_FILES['musique']['tmp_name'], $dossier . $fichier))
     										{
          										$musiqueManager = new MusiqueManager();
          										$musiqueManager->InsertMusique($_POST['numAlbum'], $_POST['numGenre'], $_POST['titre'], $_POST['prixMusique'], $fichier);
          										header('Location: ../vues/AjouterMusiqueVue.php');
     										}
     										else //Sinon (la fonction renvoie FALSE).
     										{
          										echo 'Echec de l\'upload !';
     										}
										}
										else
										{
     										echo $erreur;
										}
									}
									else
									{
										echo "Aucun fichier selectionné";
									?>
										<a href="../vues/AjouterMusiqueVue.php">Recommencer</a>
									<?php
									}
									*/
								}
								else
								{
									echo "Le prix de la musique ne peut pas être négatif";
									
								?>
									<a href="../vues/AjouterMusiqueVue.php">Recommencer</a>
								<?php
								}
							}
							else
							{
								echo 'Erreur prix musique';
								
								?>
									<a href="../vues/AjouterMusiqueVue.php">Recommencer</a>
								<?php
							}
							
						}
						else
						{
							echo "Erreur titre";
					?>
							<a href="../vues/AjouterMusiqueVue.php">Recommencer</a>
					<?php
						}

					?>
				</center>
			</div>
		</center>
	</body>

</html>