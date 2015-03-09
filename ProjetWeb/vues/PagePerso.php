<?php
session_start();
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
					<h2><center> Bienvenue sur Librozik - Listen & Download !</center></h2>
<?php
	
							// Si l'utilisateur est connecté
							if (isset($_SESSION['User']))
							{
								$utilisateurSession = $_SESSION['User'];
?>
										<center>Bienvenue : <?php echo $utilisateurSession ?> </center>
<?php
							}
							else
							{
								header('Location: AccueilVue.php');
							}
?>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>