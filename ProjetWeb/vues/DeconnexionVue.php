<?php
	
	session_start();
	if (isset($_SESSION['User']))
	{
		$utilisateurSession = $_SESSION['User'];
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
		<br><br><br><br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<h2><center> Voulez-vous vraiment vous déconnecter <?php echo $utilisateurSession; ?> ?</center></h2>
						<a href="../controleurs/DeconnexionControleur.php">Se déconnecter </a>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>