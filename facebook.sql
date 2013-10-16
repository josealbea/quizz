-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 16 Octobre 2013 à 11:01
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `facebook`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(200) NOT NULL,
  `flag` int(1) NOT NULL,
  `question_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_QUESTION_ID` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `asked_questions`
--

CREATE TABLE `asked_questions` (
  `game` int(5) NOT NULL,
  `question` int(5) NOT NULL,
  KEY `FK_GAME_ID` (`game`),
  KEY `FK_QUESTION_ID` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(5) NOT NULL,
  `done` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_USER_ID` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fbId` bigint(10) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `likes` int(1) NOT NULL DEFAULT '0',
  `hasLiked` tinyint(1) NOT NULL DEFAULT '0',
  `location` varchar(100) NOT NULL,
  `locale` varchar(10) NOT NULL,
  `subscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_connection` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `life` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `fbId`, `firstName`, `lastName`, `link`, `email`, `gender`, `likes`, `hasLiked`, `location`, `locale`, `subscription`, `last_connection`, `life`) VALUES
(2, 693011998, 'Axel', 'Bouaziz', 'https://www.facebook.com/axel.bouaziz1', 'axel.bouaziz@hotmail.fr', 'male', 0, 0, 'Pantin', 'fr_FR', '2013-10-15 10:25:42', '2013-10-15 14:44:27', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `asked_questions`
--
ALTER TABLE `asked_questions`
  ADD CONSTRAINT `asked_questions_ibfk_1` FOREIGN KEY (`game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asked_questions_ibfk_2` FOREIGN KEY (`question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
