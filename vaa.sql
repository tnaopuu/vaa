-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  Dim 23 mai 2021 à 06:50
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vaa`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdhe` varchar(50) NOT NULL,
  `nomAdhe` varchar(50) NOT NULL,
  `prenomAdhe` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdhe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`idAdhe`, `nomAdhe`, `prenomAdhe`) VALUES
('1', 'PITO ', 'Peters'),
('10', 'RAFFAELLI', 'Heremoana'),
('11', 'TINITUA', 'Nunui'),
('12', 'ERNY', 'Pierre'),
('13', 'JISSANG', 'Jason'),
('14', 'TUTAIRI', 'Raimoana'),
('15', 'AMARU', 'Hanson'),
('16', 'OPUU', 'Tehina'),
('2', 'TAPU', 'Taurua'),
('3', 'MARURAI', 'Éric'),
('4', 'ARAPARI', 'Tupuna'),
('5', 'LAILLE', 'Heiroa'),
('6', 'HAMON', 'Mireille'),
('7', 'DREYER', 'Anthony'),
('8', 'CORBIN DE BROCA', 'Nuiiti'),
('9', 'BALIGOUT', 'Rémi');

-- --------------------------------------------------------

--
-- Structure de la table `jourperiode`
--

DROP TABLE IF EXISTS `jourperiode`;
CREATE TABLE IF NOT EXISTS `jourperiode` (
  `idJourPer` varchar(50) NOT NULL,
  `libelleJourPer` varchar(50) NOT NULL,
  PRIMARY KEY (`idJourPer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jourperiode`
--

INSERT INTO `jourperiode` (`idJourPer`, `libelleJourPer`) VALUES
('1', 'Lundi'),
('2', 'Mardi'),
('3', 'Mercredi'),
('4', 'Jeudi'),
('5', 'Vendredi'),
('6', 'Samedi'),
('7', 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `placevaa`
--

DROP TABLE IF EXISTS `placevaa`;
CREATE TABLE IF NOT EXISTS `placevaa` (
  `idPlace` varchar(50) NOT NULL,
  `libellePlace` varchar(50) NOT NULL,
  PRIMARY KEY (`idPlace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `placevaa`
--

INSERT INTO `placevaa` (`idPlace`, `libellePlace`) VALUES
('1', '1 - FA\'AHORO'),
('2', '2 - MONO FA\'AHORO'),
('3', '3 - TARE'),
('4', '4 - TURAI'),
('5', '5 - MONO PEPERU'),
('6', '6 - PEPERU');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idJourPer` varchar(50) NOT NULL,
  `libellePlaceVaa` varchar(50) NOT NULL,
  `nom_prenomAdhe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idJourPer`,`libellePlaceVaa`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idJourPer`, `libellePlaceVaa`, `nom_prenomAdhe`) VALUES
('1', '1 - FA\'AHORO', 'PITO Peters'),
('1', '2 - MONO FA\'AHORO', NULL),
('2', '3 - TARE', 'TINITUA Nunui'),
('2', '4 - TURAI', NULL),
('4', '4 - TURAI', 'ARAPARI Tupuna'),
('5', '5 - MONO PEPERU', 'JISSANG Jason'),
('6', '5 - MONO PEPERU', 'MARURAI Éric');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `JourPer_FK` FOREIGN KEY (`idJourPer`) REFERENCES `jourperiode` (`idJourPer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
