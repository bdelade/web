<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body class="style1">

		<?php include("MenuVue.php"); ?>
		
		<br><br><br>
		
		<center>
			<div id="conteneur">
				<center>
					<br><br><br><br><br><br>
					<h2><center>Connexion</center><h2>
					
							<form method="post" action="../controleurs/ConnexionControleur.php">
								<table border=0 >
									<tr>
										<td><label for="Pseudo">Pseudo<font color="red">*</font></td>
										<td><input type="text" name="pseudo"/></td>
									</tr>
									<tr>
										<td><label for="mdp">Mot de Passe<font color="red">*</font></td>
										<td><input type="password" name="password"/></td>
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Connexion" /></td>
									</tr>
								</table>
							</form>
		
				</center>
			</div>
		</center>
	</body>
</html>