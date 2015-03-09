<?php
session_start();

	if(!isset($_SESSION['User']) OR $_SESSION['User'] <> 'Admin')
	{
	header('Location: AccueilVue.php');
	}
	
	require_once ("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/ArtisteManager.php");
	
	$artisteManager = new ArtisteManager();
	$artistes = $artisteManager->SearchAllArtiste();
	
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
								<th>Liste des artistes</th>
							</tr>
					<?php
							foreach($artistes as $artiste)
							{
					?>
							<tr>
							<td><center><?php echo $artiste->getPseudo() ?></center></td>
							</tr>
					<?php
							}
					?>
						</table>
							<form method="post" action="../controleurs/AjouterArtisteControleur.php">
								<table border=0 >
									<tr>
										<td><label for="Artiste">Pseudo<font color="red">*</font></td>
										<td><input type="text" name="pseudoArtiste"/></td>
									</tr>
										<td colspan="2"><input type="submit" value="Ajouter Artiste" /></td>
									</tr>
								</table>
							</form>
						</center>
				</center>
			</div>
		</center>
	</body>
</html>