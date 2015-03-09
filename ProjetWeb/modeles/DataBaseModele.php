<?php

	require_once("MembreModele.php");
	require_once("MusiqueModele.php");
	require_once("GenreModele.php");
	require_once("ArtisteModele.php");
	require_once("AlbumModele.php");
	
	class DataBaseGateway
	{
	
		function GetConnexionBD()
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=librozik2;', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				return $bdd;
			}
			catch (Exception $e)
			{
				die('Erreur : ' .$e->getMessage());
			}
		}
		
		public function GetNbInscrits()
		{
			
			$bdd =  $this->GetConnexionBD();
			
			$rep = $bdd->query("Select COUNT(*) FROM Membre");
			
			$donnees = $rep->fetchColumn();
			
			$rep->closeCursor();
			
			
			return $donnees;
		}
		
		public function GetMembreByLoginAndPassword($unLogin, $unMotDePasse)
		{
			// Récupération de la connexion à la base de donnée
			$bdd =  $this->GetConnexionBD();
		
			$reqGetIdRep = $bdd->prepare('SELECT id, login, mdp FROM membre WHERE login = :login AND mdp= :mdp');
			$reqGetIdRep->execute(array('login' => $unLogin, 'mdp' => $unMotDePasse));
			
			if($reqGetIdRep->rowCount() == 0)
				return null;
			
			$data = $reqGetIdRep->fetch();
			
			$membre = new Membre($data['id'], $data['login'], $data['mdp']);
			
			$reqGetIdRep->closeCursor();
			
			return $membre;
		}
		
		public function InsertMembre($unLogin, $unMotDePasse)
		{
			$bdd =  $this->GetConnexionBD();
			
			$req = $bdd->prepare('INSERT INTO membre(id,login,mdp) VALUES(:id, :login, :mdp)');
			$req->execute(array('id' => '','login' => $unLogin,'mdp' => $unMotDePasse));
		}
		
		public function DeleteMembre($unLogin)
		{
			$bdd =  $this->GetConnexionBD();
			
			$req = $bdd->prepare('DELETE FROM membre WHERE login = :login');
			$req->execute(array('login' => $unLogin));
			
		}
		
		//Retourne un membre à partir d'un login, null si ce login n'existe pas
		public function GetMembreByLogin($unLogin)
		{
			$bdd =  $this->GetConnexionBD();
		
			$reqGetIdRep = $bdd->prepare('SELECT id, login, mdp from membre where login = :login');
			$reqGetIdRep->execute(array('login' => $unLogin));
			
			if($reqGetIdRep->rowCount() == 0)
				return null;
			
			$data = $reqGetIdRep->fetch();
			
			$membre = new Membre($data['id'], $data['login'], $data['mdp']);
			
			$reqGetIdRep->closeCursor();
			
			return $membre;
		}
		
		//Retourne tous les membres de la base de donnée
		public function GetAllMembre()
		{
			$bdd =  $this->GetConnexionBD();
			
			$rep = $bdd->query("Select * FROM Membre");
			
			$membres = array();
			
			while($data = $rep->fetch())
			{
				$membre =new Membre($data['id'], $data['login'], $data['mdp']);
				array_push($membres, $membre);
			}
			
			$rep->closeCursor();
			
			return $membres;
		}
		
		//Retourne la liste des musiques présentes dans le panier
		public function GetPanierIdMembre($unIdMembre)
		{
			$bdd = $this->GetConnexionBD();
			
			$reqGetIdRep = $bdd->prepare('SELECT m.idMusique as numMusique, m.idAlbum as numAlbum, m.idGenre as numGenre, m.titreMusique, m.filename, m.prixMusique as prixMusique 
										FROM panier p, musique m WHERE p.idMusique = m.idMusique AND p.idClient = :idClient');
			$reqGetIdRep->execute(array('idClient' => $unIdMembre));
			
			if($reqGetIdRep->rowCount() == 0)
				return null;
			
			$musiques = array();
			
			while($data = $reqGetIdRep->fetch())
			{
				$musique = new Musique($data['numMusique'], $data['numAlbum'], $data['numGenre'], $data['titreMusique'], $data['filename'], $data['prixMusique'] );
				array_push($musiques, $musique);
			}
			
			$reqGetIdRep->closeCursor();
			
			return $musiques;
			
		}
		
		public function InsertMusicIntoPanier($unIdMembre, $uneMusique)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('INSERT INTO Panier(idPanier, idClient, idMusique) VALUES(:idPanier, :idClient, :idMusique)');
			$req->execute(array('idPanier' => '', 'idClient' => $unIdMembre, 'idMusique' => $uneMusique));
		}
		
		public function DeleteMusicFromPanier($unIdMembre, $uneMusique)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('DELETE FROM Panier WHERE idClient = :idClient AND idMusique = :idMusique');
			$req->execute(array('idClient' => $unIdMembre, 'idMusique' => $uneMusique));
		}
		
		//Insère les articles contenu dans le panier dans la table commande (= commande effectuée)
		public function InsertPanierIntoCommande($unIdMembre)
		{
			$bdd = $this->GetConnexionBD();
			
			//Recherche des idMusique contenu dans le panier
			$listMusic = $this->GetPanierIdMembre($unIdMembre);
			
			foreach($listMusic as $music)
			{
				$unIdMusique = $music->getId();
				
				$req = $bdd->prepare('INSERT INTO Commande(idAchat, idClient, idMusique) VALUES(:idAchat, :idClient, :idMusique)');
				$req->execute(array('idAchat' => '', 'idClient' => $unIdMembre, 'idMusique' => $unIdMusique));	
			}
			
		}
		
		//Retourne toutes les musiques que les clients ont commandé
		public function GetCommandeByIdClient($unIdMembre)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('SELECT * FROM Commande WHERE idClient = :idClient');
			$req->execute(array('idClient' => $unIdMembre));
			
			if($req->rowCount() == 0)
				return null;
				
			$listCommande = array();
			
			while($data = $req->fetch())
			{
				$musique = $this->GetMusicByIdMusic($data['idMusique']);
				array_push($listCommande,$musique);
			}
			
			$req->closeCursor();
			
			return $listCommande;
			
		}
		
		public function InsertGenre($unNomGenre, $uneDescription)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('INSERT INTO Genre(idGenre, nomGenre, descriptionGenre) VALUES(:idGenre, :nomGenre, :descriptionGenre)');
			$req->execute(array('idGenre' => '', 'nomGenre' => $unNomGenre, 'descriptionGenre' => $uneDescription));
		}
		
		public function DeleteGenre($unIdGenre)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('DELETE FROM Genre WHERE idGenre = :idGenre');
			$req->execute(array('idGenre' => $unIdGenre));
		}
		
		//Retourne tous les genres de la base de donnée
		public function SearchAllGenre()
		{
			$bdd = $this->GetConnexionBd();
			
			$listGenre = array();
			
			$rep = $bdd->query('SELECT * FROM genre');
			
			while($data = $rep->fetch())
			{
				$genre = new Genre($data['idGenre'], $data['nomGenre'], $data['descriptionGenre']);
				
				array_push($listGenre, $genre);
			}
			
			$rep->closeCursor();
			
			return $listGenre;
		}
		
		public function InsertAlbum($unIdArtiste, $unNomAlbum)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('INSERT INTO Album(idAlbum, idArtiste, nomAlbum) VALUES(:idAlbum, :idArtiste, :nomAlbum)');
			$req->execute(array('idAlbum' => '', 'idArtiste' => $unIdArtiste, 'nomAlbum' => $unNomAlbum));
		}
		
		public function DeleteAlbum($unIdAlbum)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('DELETE FROM Album WHERE idAlbum = :idAlbum');
			$req->execute(array('idAlbum' => $unIdAlbum));
			
		}
		
		public function GetAllAlbum()
		{
			$bdd = $this->GetConnexionBD();
			
			$albums = array();
			
			$rep = $bdd->query("SELECT * FROM album");
			
			while($data = $rep->fetch())
			{
				$album =new Album($data['idAlbum'], $data['idArtiste'], $data['nomAlbum']);
				array_push($albums, $album);
			}
			
			$rep->closeCursor();
			
			return $albums;
		}
		
		public function InsertArtiste($unNomArtiste)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('INSERT INTO Artiste(idArtiste, pseudoArtiste) VALUES(:idArtiste, :pseudoArtiste)');
			$req->execute(array('idArtiste' => '', 'pseudoArtiste' => $unNomArtiste));
		}
		
		public function DeleteArtiste($unIdArtiste)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('DELETE FROM Artiste WHERE idArtiste = :idArtiste');
			$req->execute(array('idArtiste' => $unIdArtiste));
		}
		
		public function GetAllArtiste()
		{
			$bdd = $this->GetConnexionBD();
			
			$artistes = array();
			
			$rep = $bdd->query("SELECT * FROM artiste");
			
			while($data = $rep->fetch())
			{
				$artiste =new Artiste($data['idArtiste'], $data['pseudoArtiste']);
				array_push($artistes, $artiste);
			}
			
			$rep->closeCursor();
			
			return $artistes;
		}
		
		public function GetMusicByIdMusic($unIdMusique)
		{
			$bdd = $this->GetConnexionBd();
			
			$req = $bdd->prepare('SELECT * FROM musique WHERE idMusique = :idMusique');
			$req->execute(array('idMusique' => $unIdMusique));
			
			$data = $req->fetch();
			
			$musique = new Musique($data['idMusique'], $data['idAlbum'], $data['idGenre'], $data['titreMusique'], $data['prixMusique'], $data['fileName']);
			
			$req->closeCursor();
			
			return $musique;
		}
		
		public function GetAllMusic()
		{
			$bdd =  $this->GetConnexionBD();
			
			$musiques = array();
			
			$rep = $bdd->query("SELECT * FROM musique");
			
			while($data = $rep->fetch())
			{
				$musique =new Musique($data['idMusique'], $data['idAlbum'], $data['idGenre'], $data['titreMusique'], $data['fileName'], $data['prixMusique']);
				array_push($musiques, $musique);
			}
			
			$rep->closeCursor();
			
			return $musiques;
		}
		
		public function SearchMusic($unNomMusique, $unNomArtiste, $unNomAlbum, $unNumGenre)
		{
			$bdd =  $this->GetConnexionBD();
			
			$musiques = array();
			
			if($unNomMusique != NULL) $unNomMusique = '%'. $unNomMusique .'%';
			if($unNomArtiste != NULL) $unNomArtiste = '%'. $unNomArtiste .'%';
			if($unNomAlbum != NULL) $unNomAlbum = '%'. $unNomAlbum .'%';
			
			$req = $bdd->prepare('SELECT idMusique as numMusique, m.idAlbum as numAlbum, m.idGenre as numGenre, m.titreMusique as nomMusique, m.fileName, m.prixMusique
								  FROM musique m, artiste a, album al
								  WHERE
								  m.idMusique = al.idAlbum AND al.idAlbum = a.idArtiste AND
									(titreMusique LIKE :nomMusique OR :nomMusique IS NULL)
									AND (pseudoArtiste LIKE :nomArtiste OR :nomArtiste IS NULL)
									AND (nomAlbum LIKE :nomAlbum OR :nomAlbum IS NULL)
									AND (idGenre = :numGenre OR :numGenre IS NULL)');
			$req->execute(array('nomMusique' => $unNomMusique, 'nomArtiste' => $unNomArtiste, 'nomAlbum' => $unNomAlbum, 'numGenre' => $unNumGenre));
			
			while($data = $req->fetch())
			{
				$musique = new Musique($data['numMusique'], $data['numAlbum'], $data['numGenre'], $data['nomMusique'], $data['fileName'], $data['prixMusique']);
				array_push($musiques, $musique);
			}
			
			$req->closeCursor();
			
			return $musiques;
		}
		
		public function InsertMusique($unIdAlbum, $unIdGenre, $unTitreMusique, $unPrixMusique, $unFileName)
		{
			$bdd = $this->GetConnexionBD();
			
			$req = $bdd->prepare('INSERT INTO musique(idMusique, idAlbum, idGenre, titreMusique, prixMusique, fileName) VALUES(:idMusique, :idAlbum, :idGenre, :titreMusique, :prixMusique, :fileName)');
			$req->execute(array('idMusique' => '', 'idAlbum' => $unIdAlbum, 'idGenre' => $unIdGenre, 'titreMusique' => $unTitreMusique, 'prixMusique' => $unPrixMusique, 'fileName' => $unFileName));
		}
		
		public function DeleteMusic($unIdMusique)
		{
			$bdd =  $this->GetConnexionBD();
			
			$req = $bdd->prepare('DELETE FROM musique WHERE idMusique = :idMusique');
			$req->execute(array('idMusique' => $unIdMusique));
			
		}
	}
?>