-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 27 Septembre 2012 à 16:39
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetmvc`
--
CREATE DATABASE `gestPersonne` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestPersonne`;

-- --------------------------------------------------------

--
-- Structure de la table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `codeDivision` varchar(5) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`codeDivision`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `division`
--

INSERT INTO `division` (`codeDivision`, `libelle`) VALUES
('801', 'SIO 1'),
('802', 'CGO 1'),
('901', 'SIO 2');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL,
  `codeDivision` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ladivision` (`codeDivision`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `date_naiss`, `codeDivision`) VALUES
(1, 'MARTIN', 'Remy', '1994-09-26', '801'),
(2, 'DUPOND', 'Francois', '1994-09-17', '801'),
(3, 'BARROUX', 'Sophie', '1993-09-17', '901');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`codeDivision`) REFERENCES `division` (`codeDivision`);
