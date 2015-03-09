<?php
session_start();

	if (isset($_SESSION['User']))
	{
		$utilisateurSession = $_SESSION['User'];
		
		require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/PanierManager.php");
		
		$_POST['adresse'] = htmlspecialchars($_POST['adresse']);
		$_POST['mail'] = htmlspecialchars($_POST['mail']);
		$_POST['numero'] = htmlspecialchars($_POST['numero']);
		$_POST['dateExp'] = htmlspecialchars($_POST['dateExp']);
		$_POST['crypto'] = htmlspecialchars($_POST['crypto']);
	}
	else
	{
		header('Location: ../vues/AccueilVue.php');
	}

?>


<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body class="style1">
	
		<br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<br/><br/>
						<?php
							if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
							{
								echo "Mail non valide";
							}
							if(!preg_match("#^[0-9]{20}$#",$_POST['numero']))
							{
								echo "Le numéro de carte bleu est composé de 20 chiffres";
							}
							
							if(!preg_match("#^[0-9]{3}$#", $_POST['crypto']))
							{
								echo "Le cryptogramme visuel ne possède que 3 chiffres";
							}
							$panierManager = new PanierManager();
							$panierManager->InsertPanierIntoCommande($_SESSION['id']);
							
							header('Location: ../vues/DetailProfilVue.php');
						?>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>