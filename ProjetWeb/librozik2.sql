-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 16 Février 2015 à 15:38
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `librozik2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Album`
--

CREATE TABLE IF NOT EXISTS `Album` (
  `idAlbum` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  `nomAlbum` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Album`
--

INSERT INTO `Album` (`idAlbum`, `idArtiste`, `nomAlbum`) VALUES
(1, 1, 'Strange Cloud'),
(2, 2, 'Skyfall'),
(7, 3, 'reprise des negociations'),
(8, 7, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `Artiste`
--

CREATE TABLE IF NOT EXISTS `Artiste` (
  `idArtiste` int(11) NOT NULL,
  `pseudoArtiste` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Artiste`
--

INSERT INTO `Artiste` (`idArtiste`, `pseudoArtiste`) VALUES
(1, 'Bob'),
(2, 'Adèle'),
(3, 'Bénabar'),
(8, 'BÃ©nabar');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE IF NOT EXISTS `Commande` (
  `idAchat` int(11) NOT NULL,
  `idClient` int(11) NOT NULL COMMENT 'A',
  `idMusique` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Commande`
--

INSERT INTO `Commande` (`idAchat`, `idClient`, `idMusique`) VALUES
(13, 6, 2),
(14, 6, 2),
(15, 6, 1),
(16, 6, 2),
(17, 7, 2),
(18, 7, 1),
(19, 7, 1),
(20, 7, 2),
(21, 7, 1),
(22, 7, 1),
(23, 7, 2),
(24, 7, 1),
(25, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(11) NOT NULL,
  `nomGenre` varchar(300) NOT NULL,
  `descriptionGenre` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `nomGenre`, `descriptionGenre`) VALUES
(1, 'metal', 'musique métallique'),
(2, 'techno', 'musique de jeunes'),
(3, 'House', 'La house music est un courant musical nÃ© au dÃ©but des annÃ©es 1980 Ã  Chicago. Originellement liÃ©e Ã  l''histoire des DJs, son nom provient du Warehouse, club de Chicago oÃ¹ officiait le DJ Frankie Knuckles. La house est constituÃ©e d''un rythme minimal, d''une ligne de basse proche du funk, Ã  ceci s''ajoute souvent des voix, samplÃ©es ou non.'),
(4, 'Electro', 'L''electro (apocope d''electro-funk ou electro-boogie1) est un style de musique Ã©lectronique directement influencÃ©e par l''utilisation d''une boÃ®te Ã  rythmes TR-808 et de quelques samples dÃ©rivÃ©s du funk.');

-- --------------------------------------------------------

--
-- Structure de la table `Membre`
--

CREATE TABLE IF NOT EXISTS `Membre` (
  `id` int(11) NOT NULL,
  `login` varchar(300) NOT NULL,
  `mdp` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Membre`
--

INSERT INTO `Membre` (`id`, `login`, `mdp`) VALUES
(1, 'Admin', 'admin'),
(5, 'Donald', 'dodo'),
(6, 'dave', 'test'),
(7, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `Musique`
--

CREATE TABLE IF NOT EXISTS `Musique` (
  `idMusique` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  `titreMusique` varchar(300) NOT NULL,
  `prixMusique` int(11) NOT NULL,
  `fileName` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Musique`
--

INSERT INTO `Musique` (`idMusique`, `idAlbum`, `idGenre`, `titreMusique`, `prixMusique`, `fileName`) VALUES
(1, 1, 1, 'Bombs away', 1, '01 Bombs Away (feat Morgan Freeman).mp3'),
(2, 2, 2, 'Skyfall', 1, 'Skyfall.mp3'),
(3, 3, 3, 'Mama Africa', 1, 'Mama Africa.mp3'),
(15, 8, 4, 'Test', 1, 'Test.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE IF NOT EXISTS `Panier` (
  `idPanier` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idMusique` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Panier`
--

INSERT INTO `Panier` (`idPanier`, `idClient`, `idMusique`) VALUES
(9, 6, 1),
(17, 7, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Index pour la table `Artiste`
--
ALTER TABLE `Artiste`
  ADD PRIMARY KEY (`idArtiste`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`idAchat`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Index pour la table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Musique`
--
ALTER TABLE `Musique`
  ADD PRIMARY KEY (`idMusique`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`idPanier`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Album`
--
ALTER TABLE `Album`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Artiste`
--
ALTER TABLE `Artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `idAchat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Musique`
--
ALTER TABLE `Musique`
  MODIFY `idMusique` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
