-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 19 Mai 2016 à 11:34
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1-log
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `reunion_island`
--
CREATE DATABASE IF NOT EXISTS `reunion_island` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reunion_island`;

-- --------------------------------------------------------

--
-- Structure de la table `hiking`
--


DROP TABLE IF EXISTS `hiking`;
CREATE TABLE IF NOT EXISTS `hiking` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `difficulty` enum('très facile','facile','moyen','difficile','très difficile') NOT NULL,
  `distance` int(11) NOT NULL COMMENT 'in km',
  `duration` time NOT NULL,
  `height_difference` int(6) NOT NULL COMMENT 'in m',
  `available` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES('Le sommet du Piton Béthoune par le tour du Bonnet de Prêtre', 'Très difficile', 5.7, '4:00', 650);
INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES('De la Mare à Joncs à Cilaos par le Kerveguen et le Gîte de la Caverne Dufour', 'Difficile', 19, '8:00', 1450);
INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES('Le Sentier des Sources entre Cilaos et Bras Sec', 'Facile', 5.9, '1:15', 300);
INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES('Le Dimitile depuis Bras Sec par le Kerveguen', 'Difficile', 24.5, '10:00', 1550);
INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES('De Bras Sec au Bras de Cilaos par Palmiste Rouge', 'Moyen', 16.5, '5:30', 1000);

INSERT INTO randoreunion.user (username, email, firstname, lastname, password) VALUES('vaness', 'van@gmail.com', 'van', 'ess', 'vaness');
INSERT INTO randoreunion.user (username, email, firstname, lastname, password) VALUES('toto', 'toto@gmail.com', 'toto', 'delavega', 'toto');
INSERT INTO randoreunion.user (username, email, firstname, lastname, password) VALUES('chipita', 'chipi@gmail.com', 'chi', 'pita', 'chipita');
