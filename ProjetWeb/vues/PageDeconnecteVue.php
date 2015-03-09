<?php
	if (!isset($_SESSION['User']))
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
					<h2><center> A bientôt sur Librozik - Listen & Download !</center></h2>
						Vous êtes déconnecté <a href="ConnexionVue.php">Se connecter ?</a>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>