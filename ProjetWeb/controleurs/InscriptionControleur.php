<?php
	
	session_start();
	
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MembreManager.php");
	require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/modeles/MembreModele.php");
	
	$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
	$_POST['password'] = htmlspecialchars($_POST['password']);
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

						if(isset($_POST['pseudo']) AND (!empty($_POST['pseudo'])))
						{
							if(isset($_POST['password']) AND isset($_POST['password2']) AND (!empty($_POST['password'])) AND (!empty($_POST['password2'])))
							{
								if($_POST['password'] === $_POST['password2'])
								{
									$membreManager = new MembreManager();
									
									if($membreManager->MembreExist($_POST['pseudo']))
									{
										echo "Ce pseudo est déja pris";
					?>
										<a href="../vues/InscriptionVue.php">Recommencer</a>
					<?php
									}
									else
									{
										$membreManager->InsertMembre($_POST['pseudo'],$_POST['password']);
									
										$_SESSION['User'] = $_POST['pseudo'];
									
										//On recupere le nouvel id
										$membre = $membreManager->GetMembreByLogin($_POST['pseudo']);
									
										$_SESSION['id'] = $membre->GetId();
									
										header('Location: ../vues/PagePerso.php');
									}
									
								}
								else
								{
									echo "mot de passes non identiques";
					?>
									<a href="../vues/InscriptionVue.php">Recommencer</a>
					<?php
								}
							}
							else
							{
								echo "Erreur mot de passe";
					?>
								<a href="../vues/InscriptionVue.php">Recommencer</a>
					<?php
							}
						}
						else
						{
							echo "Erreur pseudo";
					?>
							<a href="../vues/InscriptionVue.php">Recommencer</a>
					<?php
						}

					?>
				</center>
			</div>
		</center>
	</body>

</html>