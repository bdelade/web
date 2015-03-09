	<?php
	
	session_start();
	
		require_once("/Applications/XAMPP/xamppfiles/htdocs/ProjetWeb/controleurs/MusiqueManager.php");
		
			$searchMusiques = array();
			
			$musiqueManager = new MusiqueManager();
			
			$searchMusiques = $musiqueManager->SearchMusic($_POST['nomMusique'], $_POST['nomArtiste'], $_POST['nomAlbum'], $_POST['numGenre']);
?>

<html>

	<head>
		<link href="../monStyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		
		<br><br><br><br><br><br>
		<center>
			<div id="conteneur">
				<center>
					<h2>Recherche Musique</h2>
					<?php					
						if(isset($_POST['nomMusique']) AND isset($_POST['nomArtiste']) AND isset($_POST['nomAlbum']) AND isset($_POST['numGenre']))
						{	
							// Si la recherche de musique n'a donné aucun résultat
							if(count($searchMusiques) == 0)
							{
								echo "Aucune musique ne correspond à votre recherche";
					?>
								<input type="button" value="Annuler" onclick="location.href='../vues/RechercheMusiqueVue.php'">
					<?php
							}
							else
							{
					?>
								<div id="player"></div>
								
								<form action="AjouterAuPanierControleur.php" method="POST">
									<table>
										<tr>
											<th>Titre</th>
											<th>Prix</th>
										</tr>
					<?php
									foreach($searchMusiques as $searchMusique)
									{
					?>
										<tr>
											<td><?php echo $searchMusique->getTitre() ?></td>
											<td><?php echo $searchMusique->getPrix() ?></td>
											<td><?php echo "€" ?></td>
											<td><input type="checkbox" name="musiqueId[]" value="<?php echo $searchMusique->getId() ?>"></td>
										</tr>
					<?php
									}
					?>
										<tr>
											<td colspan="2"><input type="button" value="Annuler" onclick="location.href='../vues/RechercheMusiqueVue.php'"</td>
											<td colspan="2"><input type="submit" value="Ajouter au Panier" /></td>
									</table>
									<br/>
								</form>
								
								
					<?php
							}
						}
						else
						{
							echo "Erreur recherche musique";
						}
					?>
	</center>
			</div>
		</center>
	</body>
</html>