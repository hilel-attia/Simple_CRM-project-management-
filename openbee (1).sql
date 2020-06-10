-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 fév. 2020 à 13:15
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `openbee`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPartenaire` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `comentaire` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1` (`idPartenaire`),
  KEY `f` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `idPartenaire`, `idUser`, `comentaire`, `date`) VALUES
(1, 2, 2, 'hellooooooooo', '2020-01-31'),
(2, 2, 3, 'tache termine', '2020-02-27'),
(3, 1, 4, 'en execution', '2020-02-25'),
(4, 6, 6, 'j ai pas commence', '2020-02-17'),
(5, 3, 2, 'je continue', '2020-02-17');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomSociete` varchar(20) NOT NULL,
  `pays` int(11) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `nomContact` varchar(20) NOT NULL,
  `nombreEmploye` int(11) NOT NULL,
  `contrat` tinyint(1) NOT NULL,
  `forme` tinyint(1) NOT NULL,
  `typepartenaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `nomSociete`, `pays`, `adresse`, `nomContact`, `nombreEmploye`, `contrat`, `forme`, `typepartenaire`) VALUES
(1, 'openbee', 2, 'paris', 'claude', 200, 0, 0, 1),
(2, 'mb2i', 1, 'hammamet', 'mohamed', 20, 0, 0, 3),
(3, 'nawres', 2, 'hammamet', 'hilel', 3000, 0, 0, 2),
(4, 'easysoft', 1, 'hammamet', 'hilel', 20, 1, 1, 1),
(5, 'rar', 1, 'hammaet', 'hilel', 0, 0, 1, 1),
(6, 'xft', 1, 'jablie', 'salah', 20, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'tunisie'),
(2, 'france');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(20) NOT NULL,
  `idPartenaire` int(11) NOT NULL,
  `nomContact` varchar(2000) NOT NULL,
  `nomProjet` text NOT NULL,
  `montant` double NOT NULL,
  `statut` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `remise` text NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `bandeCommande` text NOT NULL,
  `facture` tinyint(1) NOT NULL,
  `pieceJointe` text NOT NULL,
  `dateFacture` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rrr` (`idPartenaire`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `pays`, `idPartenaire`, `nomContact`, `nomProjet`, `montant`, `statut`, `commentaire`, `remise`, `dateCommande`, `bandeCommande`, `facture`, `pieceJointe`, `dateFacture`) VALUES
(1, '1', 1, 'hilel', 'documentation', 20000, 2, 'dezffzefzef', '10%', '2020-01-30', 'ezdedzed', 1, '', '2020-01-14'),
(2, '1', 1, 'mohamed', 'cddcz', 29, 6, 'realisÃ©', 'zcea', '2020-01-22', '', 1, '', '2020-01-17'),
(3, '2', 2, 'ali', 'support', 20000, 1, 'let s go', '10%', '2020-02-18', 'hhhh', 1, '', '2020-02-26'),
(4, '2', 4, 'claude', 'eee', 9000, 3, 'en nego', '5%', '2020-02-03', '', 1, '', '2020-02-01'),
(5, '1', 5, 'yassine', 'rrr', 1236, 4, 'en cours', '10', '2020-02-12', '', 0, '', '2020-02-01'),
(6, '1', 5, 'nawres', 'aaaa', 5555, 3, 'en negociation', '123', '2030-02-02', '', 1, '', '2020-02-01'),
(7, '1', 4, 'sabra', 'documentation', 2500, 1, 'en execution', '10%', '2030-02-02', 'OpenTrace (4).pdf', 1, 'coursCOO_Chap3.pdf', '2020-02-01'),
(32, '1', 4, 'hamdi', 'application mobile', 300, 2, 'conception', '10%', '2020-02-14', '', 0, '', '2020-02-07');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom`) VALUES
(1, 'prospect'),
(2, 'client'),
(3, 'negociation'),
(4, 'ordre'),
(5, 'paye'),
(6, 'annule');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'admin'),
(2, 'partenaire'),
(3, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `typepartenaire`
--

DROP TABLE IF EXISTS `typepartenaire`;
CREATE TABLE IF NOT EXISTS `typepartenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typepartenaire`
--

INSERT INTO `typepartenaire` (`id`, `nom`) VALUES
(1, 'Client'),
(2, 'distributeur'),
(3, 'partenaire');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `telephone` text NOT NULL,
  `adresse` text NOT NULL,
  `type` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `partenaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `telephone`, `adresse`, `type`, `login`, `password`, `partenaire`) VALUES
(1, 'yassine', 'yassine.elouni.dev@gmail.com', '52940748', 'nabeul', 2, 'yassine', 'yassine', 4),
(2, 'hilel', 'hilel.dev@gmail.com', '28028837', 'hammamet', 3, 'hilel', 'hilel', NULL),
(3, 'nawres', 'nawres@gmail.com', '20546312', 'hammamet', 2, 'nawres', 'nawres', 5),
(4, 'mefteh', 'mefteh.openbee@gmail.com', '98745632', 'hammamet', 1, 'mefteh', 'mefteh', NULL),
(5, 'ali', 'ali@gmail.com', '25147369', 'hammamet', 1, 'ali', 'ali', NULL),
(6, 'salah', 'salah@gmail.com', '123456789', 'tunis', 2, 'salah', 'salah', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `f` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idPartenaire`) REFERENCES `partenaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `rrr` FOREIGN KEY (`idPartenaire`) REFERENCES `partenaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
