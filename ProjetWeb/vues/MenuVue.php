<html>
<?php

	if(isset($_SESSION['User']))
	{
		if($_SESSION['User'] == 'Admin')
		{
?>
		<div class="menu">
			<table border width="150" align="left" >
				<tr>
					<th align=center><a href="AdministrationVue.php" >Accueil</a></th>
				</tr>
				<tr>
					<th align=center><a href="AjouterArtisteVue.php" >Ajouter Artiste</a></th>
				</tr>
				<tr>
					<th align=center><a href="SupprimerArtisteVue.php" >Supprimer Artiste</a></th>
				</tr>
				<tr>
					<th align=center><a href="AjouterAlbumVue.php" >Ajouter Album</a></th>
				</tr>
				<tr>
					<th align=center><a href="SupprimerAlbumVue.php" >Supprimer Album</a></th>
				</tr>
				<tr>
					<th align=center><a href="AjouterGenreVue.php" >Ajouter Genre</a></th>
				</tr>
				<tr>
					<th align=center><a href="SupprimerGenreVue.php" >Supprimer Genre</a></th>
				</tr>
				<tr>
					<th align=center><a href="AjouterMusiqueVue.php" >Ajouter Musique</a></th>
				</tr>
				<tr>
					<th align=center><a href="SupprimerMusiqueVue.php" >Supprimer Musique</a></th>
				</tr>
				<tr>
					<th align=center><a href="AjouterMembreVue.php" >Ajouter membre</a></th>
				</tr>
				<tr>
					<th align=center><a href="SupprimerMembreVue.php" >Supprimer membre</a></th>
				</tr>
				<tr>
					<th align=center><a href="DeconnexionVue.php">Déconnexion</a></th>
				</tr>
			</table>
		</div>
<?php
		}
		else
		{
?>
		<div class="menu">
			<table border width="150" align="left" >
				<tr>
					<th align=center><a href="AccueilVue.php" >Accueil</a></th>
				</tr>
				<tr>
					<th align=center><a href="DetailProfilVue.php">Details Profil</a></th>
				</tr>
				<tr>
					<th align=center><a href="PanierVue.php">Panier</a></th>
				<tr>
					<th align=center><a href="RechercheMusiqueVue.php">Recherche Musique</a></th>
				</tr>
				<tr>
					<th align=center><a href="DeconnexionVue.php">Déconnexion</a></th>
				</tr>
			</table>
		</div>
<?php
		}
	}
	else
	{
?>
		<div class="menu">
			<table border width="150" align="left" >
				<tr>
					<th align=center><a href="AccueilVue.php">Accueil</a></th>
				</tr>
				<tr>
					<th align=center><a href="InscriptionVue.php">Inscription</a></th>
				</tr>
				<tr>
					<th align=center><a href="ConnexionVue.php">Connexion</a></th>
				</tr>
				
			</table>
		</div>
<?php
	}
?>
</html>