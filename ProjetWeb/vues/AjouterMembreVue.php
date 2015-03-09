<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}

	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MembreManager.php");
	
	$membreManager =  new MembreManager();
	$searchMembres = $membreManager->SearchAllMembre();
	
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
						
						<table>
							<tr>
								<th>Liste des membres</th>
							</tr>
					<?php
							foreach($searchMembres as $searchMembre)
							{
					?>
							<tr>
							<td><center><?php echo $searchMembre->getPseudo() ?></center></td>
							</tr>
					<?php
							}
					?>
					</table>
						<form method="post" action="../controleurs/AjouterMembreControleur.php">
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
										<td><label for="mdp">Retaper le mot de Passe<font color="red">*</font></td>
										<td><input type="password" name="password2"/></td>
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Ajouter Membre" /></td>
									</tr>
								</table>
							</form>
					</center>
				</center>
			</div>
		</center>
	</body>

</html>