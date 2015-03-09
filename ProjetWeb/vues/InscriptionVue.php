<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body class="style1">

		<?php include("MenuVue.php"); ?>
		
		<br><br><br><br><br><br><br>
		
		<center>
			<div id="conteneur">
				<center>

					<h2><center>Inscription</center></h2>
							<h3><center>Veuillez remplir le formulaire ci-dessous afin de vous inscrire en tant que membre </center></h3>

							<br>
							<form method="post" action="../controleurs/InscriptionControleur.php">
								<table border=0 >
									<tr>
										<td><label for="Pseudo">Entrez un pseudo svp<font color="red">*</font></td>
										<td><input type="text" name="pseudo"></td>
									</tr>
									<tr>
										<td><label for="mdp">Entrez un mot de passe svp<font color="red">*</font></td>
										<td><input type="password" name="password"></td>
									</tr>
									<tr>
										<td><label for="mdp">Veuillez-retapez votre mot de passe svp<font color="red">*</font></td>
										<td><input type="password" name="password2"></td>
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Inscription" /></td>
									</tr>
								</table>
							</form>
		
				</center>
			</div>
		</center>
	</body>
</html>