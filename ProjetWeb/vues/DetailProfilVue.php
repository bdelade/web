<?php
session_start();

	if (isset($_SESSION['User']))
	{
		$utilisateurSession = $_SESSION['User'];
		
		require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/CommandeManager.php");
		
		$commandeManager = new CommandeManager();
		$commandes = $commandeManager->GetCommandeByIdClient($_SESSION['id']);
		
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
					<h2><center> Commandes effectuées : <?php echo $utilisateurSession; ?> </center></h2>
					<br/><br/>
								<?php
								if(count($commandes) == 0)
								{
									echo "Aucune commande effectuée"; 
								}
								else
								{
								?>
									<table>
								<?php
									foreach ($commandes as $commande)
									{
								?>
										<tr>
											<td><?php echo $commande->getTitre(); ?></td>
										</tr>
								<?php
									}
								?>
									</table>
								<?php
								}
								?>
					<center>
						
					</center>
				</center>
			</div>
		</center>
	</body>

</html>