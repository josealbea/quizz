-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Serveur: db497944480.db.1and1.com
-- Généré le : Jeudi 07 Novembre 2013 à 11:35
-- Version du serveur: 5.1.72
-- Version de PHP: 5.3.3-7+squeeze17
-- 
-- Base de données: `db497944480`
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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

-- 
-- Contenu de la table `answer`
-- 

INSERT INTO `answer` VALUES (1, 'Ouie', 1, 33);
INSERT INTO `answer` VALUES (2, 'Odorat', 0, 33);
INSERT INTO `answer` VALUES (3, 'Vue', 0, 33);
INSERT INTO `answer` VALUES (4, 'Gout', 0, 33);
INSERT INTO `answer` VALUES (5, 'La Tour de Pise', 1, 34);
INSERT INTO `answer` VALUES (6, 'La tour Eiffel', 0, 34);
INSERT INTO `answer` VALUES (7, 'La Statue de la Liberté', 0, 34);
INSERT INTO `answer` VALUES (8, 'Le colisée', 0, 34);
INSERT INTO `answer` VALUES (9, 'plancton', 1, 35);
INSERT INTO `answer` VALUES (10, 'sardine', 0, 35);
INSERT INTO `answer` VALUES (11, 'saumon', 0, 35);
INSERT INTO `answer` VALUES (12, 'méduse', 0, 35);
INSERT INTO `answer` VALUES (13, 'En Antarctique', 1, 36);
INSERT INTO `answer` VALUES (14, 'En Arctique', 0, 36);
INSERT INTO `answer` VALUES (15, 'En Amérique', 0, 36);
INSERT INTO `answer` VALUES (16, 'En Océanie', 0, 36);
INSERT INTO `answer` VALUES (17, 'Les coquillages', 1, 37);
INSERT INTO `answer` VALUES (18, 'Les papillions', 0, 37);
INSERT INTO `answer` VALUES (19, 'Les cocons', 0, 37);
INSERT INTO `answer` VALUES (20, 'Les escargots', 0, 37);
INSERT INTO `answer` VALUES (21, 'A l''ombre', 1, 38);
INSERT INTO `answer` VALUES (22, 'Au soleil', 0, 38);
INSERT INTO `answer` VALUES (23, 'En bas', 0, 38);
INSERT INTO `answer` VALUES (24, 'En haut', 0, 38);
INSERT INTO `answer` VALUES (25, 'Autriche', 1, 39);
INSERT INTO `answer` VALUES (26, 'Allemagne', 0, 39);
INSERT INTO `answer` VALUES (27, 'Slovénie', 0, 39);
INSERT INTO `answer` VALUES (28, 'France', 0, 39);
INSERT INTO `answer` VALUES (29, 'Les Chinois', 1, 40);
INSERT INTO `answer` VALUES (30, 'Les français', 0, 40);
INSERT INTO `answer` VALUES (31, 'Les Anglais', 0, 40);
INSERT INTO `answer` VALUES (32, 'Les Espagnol', 0, 40);
INSERT INTO `answer` VALUES (33, '9', 1, 41);
INSERT INTO `answer` VALUES (34, '10', 0, 41);
INSERT INTO `answer` VALUES (35, '11', 0, 41);
INSERT INTO `answer` VALUES (36, '12', 0, 41);
INSERT INTO `answer` VALUES (37, 'Un trimaran', 1, 42);
INSERT INTO `answer` VALUES (38, 'Un bimaran', 0, 42);
INSERT INTO `answer` VALUES (39, 'Un catamaran', 0, 42);
INSERT INTO `answer` VALUES (40, 'Un trismaran', 0, 42);
INSERT INTO `answer` VALUES (41, 'Le latex', 1, 43);
INSERT INTO `answer` VALUES (42, 'Le coton', 0, 43);
INSERT INTO `answer` VALUES (43, 'La laine', 0, 43);
INSERT INTO `answer` VALUES (44, 'La soie', 0, 43);
INSERT INTO `answer` VALUES (45, 'à droite', 1, 44);
INSERT INTO `answer` VALUES (46, 'à gauche', 0, 44);
INSERT INTO `answer` VALUES (47, 'devant', 0, 44);
INSERT INTO `answer` VALUES (48, 'en parralèle', 0, 44);
INSERT INTO `answer` VALUES (49, 'Neil Armstrong', 1, 45);
INSERT INTO `answer` VALUES (50, 'Niel Armstrong', 0, 45);
INSERT INTO `answer` VALUES (51, 'Neil Amstrong', 0, 45);
INSERT INTO `answer` VALUES (52, 'Niel Amrstrong', 0, 45);
INSERT INTO `answer` VALUES (53, 'Jurassic park ', 1, 46);
INSERT INTO `answer` VALUES (54, 'Centerparcs', 0, 46);
INSERT INTO `answer` VALUES (55, 'Disneyland parc', 0, 46);
INSERT INTO `answer` VALUES (56, 'Dinoparc', 0, 46);
INSERT INTO `answer` VALUES (57, 'Apple', 1, 47);
INSERT INTO `answer` VALUES (58, 'Orange', 0, 47);
INSERT INTO `answer` VALUES (59, 'blackberry', 0, 47);
INSERT INTO `answer` VALUES (60, 'Aple', 0, 47);
INSERT INTO `answer` VALUES (61, '121', 1, 48);
INSERT INTO `answer` VALUES (62, '112', 0, 48);
INSERT INTO `answer` VALUES (63, '111 ', 0, 48);
INSERT INTO `answer` VALUES (64, '122', 0, 48);
INSERT INTO `answer` VALUES (65, 'Toto', 1, 49);
INSERT INTO `answer` VALUES (66, 'Boum', 0, 49);
INSERT INTO `answer` VALUES (67, 'Boom', 0, 49);
INSERT INTO `answer` VALUES (68, 'Bam', 0, 49);
INSERT INTO `answer` VALUES (69, '116', 1, 50);
INSERT INTO `answer` VALUES (70, '100', 0, 50);
INSERT INTO `answer` VALUES (71, '99', 0, 50);
INSERT INTO `answer` VALUES (72, '50', 0, 50);
INSERT INTO `answer` VALUES (73, 'Le phoque', 1, 51);
INSERT INTO `answer` VALUES (74, 'Le canari', 0, 51);
INSERT INTO `answer` VALUES (75, 'L''oiseau', 0, 51);
INSERT INTO `answer` VALUES (76, 'Le chien', 0, 51);
INSERT INTO `answer` VALUES (77, 'Chirac', 1, 52);
INSERT INTO `answer` VALUES (78, 'Goldorak', 0, 52);
INSERT INTO `answer` VALUES (79, 'Bric à brac', 0, 52);
INSERT INTO `answer` VALUES (80, 'Barack', 0, 52);
INSERT INTO `answer` VALUES (81, 'Boeuf', 1, 53);
INSERT INTO `answer` VALUES (82, 'Steak', 0, 53);
INSERT INTO `answer` VALUES (83, 'Entrecote', 0, 53);
INSERT INTO `answer` VALUES (84, 'Poulet', 0, 53);
INSERT INTO `answer` VALUES (85, 'd''impossible', 1, 54);
INSERT INTO `answer` VALUES (86, 'de possible', 0, 54);
INSERT INTO `answer` VALUES (87, 'de courageux', 0, 54);
INSERT INTO `answer` VALUES (88, 'de pas possible', 0, 54);
INSERT INTO `answer` VALUES (89, 'hipopotames', 1, 55);
INSERT INTO `answer` VALUES (90, 'hippopotames', 0, 55);
INSERT INTO `answer` VALUES (91, 'hipopotammes', 0, 55);
INSERT INTO `answer` VALUES (92, 'hippopotammes', 0, 55);
INSERT INTO `answer` VALUES (93, '4 Juillet 1776', 1, 56);
INSERT INTO `answer` VALUES (94, '14 Juillet 1776', 0, 56);
INSERT INTO `answer` VALUES (95, '4 Juillet 1876', 0, 56);
INSERT INTO `answer` VALUES (96, '14 Juillet 1876', 0, 56);
INSERT INTO `answer` VALUES (97, 'Son pelage ', 1, 57);
INSERT INTO `answer` VALUES (98, 'Sa crinière', 0, 57);
INSERT INTO `answer` VALUES (99, 'Sa scelle', 0, 57);
INSERT INTO `answer` VALUES (100, 'Ses sabots', 0, 57);
INSERT INTO `answer` VALUES (101, 'Un navire', 1, 58);
INSERT INTO `answer` VALUES (102, 'Une voiture', 0, 58);
INSERT INTO `answer` VALUES (103, 'Un cheval', 0, 58);
INSERT INTO `answer` VALUES (104, 'Un avion', 0, 58);
INSERT INTO `answer` VALUES (105, 'Les intouchables', 1, 59);
INSERT INTO `answer` VALUES (106, 'Les pas touchables', 0, 59);
INSERT INTO `answer` VALUES (107, 'Les nons touchables', 0, 59);
INSERT INTO `answer` VALUES (108, 'Les saintes ni-touches', 0, 59);
INSERT INTO `answer` VALUES (109, 'Morphée', 1, 60);
INSERT INTO `answer` VALUES (110, 'Morphé', 0, 60);
INSERT INTO `answer` VALUES (111, 'Morfée', 0, 60);
INSERT INTO `answer` VALUES (112, 'Morfé', 0, 60);
INSERT INTO `answer` VALUES (113, 'Une torche', 1, 61);
INSERT INTO `answer` VALUES (114, 'Une épée', 0, 61);
INSERT INTO `answer` VALUES (115, 'Une croix', 0, 61);
INSERT INTO `answer` VALUES (116, 'Rien', 0, 61);
INSERT INTO `answer` VALUES (117, 'Superman', 1, 62);
INSERT INTO `answer` VALUES (118, 'Batman', 0, 62);
INSERT INTO `answer` VALUES (119, 'Spiderman', 0, 62);
INSERT INTO `answer` VALUES (120, 'Catwoman', 0, 62);

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

-- 
-- Contenu de la table `asked_questions`
-- 

INSERT INTO `asked_questions` VALUES (1, 47);
INSERT INTO `asked_questions` VALUES (2, 47);
INSERT INTO `asked_questions` VALUES (3, 47);
INSERT INTO `asked_questions` VALUES (4, 47);
INSERT INTO `asked_questions` VALUES (5, 47);
INSERT INTO `asked_questions` VALUES (1, 53);

-- --------------------------------------------------------

-- 
-- Structure de la table `game`
-- 

CREATE TABLE `game` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(10) NOT NULL,
  `done` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_USER_ID` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Contenu de la table `game`
-- 

INSERT INTO `game` VALUES (1, '2013-11-02 10:46:48', 1147369520, 1);
INSERT INTO `game` VALUES (2, '2013-11-02 10:46:52', 1147369520, 0);
INSERT INTO `game` VALUES (3, '2013-11-02 10:46:56', 1147369520, 0);
INSERT INTO `game` VALUES (4, '2013-11-02 10:47:04', 1147369520, 0);
INSERT INTO `game` VALUES (5, '2013-11-02 10:47:18', 1147369520, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `question`
-- 

CREATE TABLE `question` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

-- 
-- Contenu de la table `question`
-- 

INSERT INTO `question` VALUES (33, 'Lequel des cinq sens manque au serpent', 2);
INSERT INTO `question` VALUES (34, 'Quel monument devrait s''écrouler entre 2010 et 2020 ?', 2);
INSERT INTO `question` VALUES (35, 'De quoi se nourrit le manchot ?', 2);
INSERT INTO `question` VALUES (36, 'Sur quel continent se trouve la Terre-Adélie ?', 2);
INSERT INTO `question` VALUES (37, 'Que collectionne un conchyophile ?', 2);
INSERT INTO `question` VALUES (38, 'Où sont les places les plus chères dans une arène de corrida ?', 2);
INSERT INTO `question` VALUES (39, 'Quel est le pays natal de Wolfgang Amadeus Mozart ?', 2);
INSERT INTO `question` VALUES (40, 'Quel peuple a inventé la poudre a canon ? ', 2);
INSERT INTO `question` VALUES (41, 'Combien y a-t-il de joueurs sur le terrain dans une équipe de base-ball ?', 2);
INSERT INTO `question` VALUES (42, 'Comment appelle-t-on un bateau à trois coques ?', 2);
INSERT INTO `question` VALUES (43, 'Que récolte un seringueiro au Brésil ?', 2);
INSERT INTO `question` VALUES (44, 'De quel côté de l''assiete doit-on poser le verre a vin ?', 2);
INSERT INTO `question` VALUES (45, 'Qui a mis le premier le pied sur la Lune ?', 2);
INSERT INTO `question` VALUES (46, 'Comment s''appelle le célébre film avec des dinosaures ?', 1);
INSERT INTO `question` VALUES (47, 'Comment s''appelle la société de Steve Jobs ?', 1);
INSERT INTO `question` VALUES (48, 'Combien font : 11 * 11 ?', 1);
INSERT INTO `question` VALUES (49, 'La mère de toto à 3 enfants : Bim, Bam et ?', 1);
INSERT INTO `question` VALUES (50, 'Combien de temps a duré la guerre de 100 ans ?', 1);
INSERT INTO `question` VALUES (51, 'Quel Animal est à l''origine du nom des îles Canaries ?', 3);
INSERT INTO `question` VALUES (52, 'Qui était le président en 2005 ?', 1);
INSERT INTO `question` VALUES (53, 'Qui vole un oeuf, vole un ?', 1);
INSERT INTO `question` VALUES (54, 'A coeur vaillant rien ?', 1);
INSERT INTO `question` VALUES (55, 'Près des lacs africains, on peut voir des ', 3);
INSERT INTO `question` VALUES (56, 'Quelle est la date de l''indépendance Américaine ?', 2);
INSERT INTO `question` VALUES (57, 'De quoi parle-t-on quand on évoque la robe d''un cheval ?', 1);
INSERT INTO `question` VALUES (58, 'Qu''est-ce que la Licorne dont Tintin perce le secret ? ', 2);
INSERT INTO `question` VALUES (59, 'En Inde, quels individus sont considérés comme impurs ? ', 2);
INSERT INTO `question` VALUES (60, 'Dans les bras de quel dieu grec se retrouve-t-on en s''endormant ? ', 1);
INSERT INTO `question` VALUES (61, 'Que tient la statue de la Liberté dans sa main droite ? ', 1);
INSERT INTO `question` VALUES (62, 'Quel super-héros est amoureux de Loïs Lane ? ', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `user`
-- 

CREATE TABLE `user` (
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
  PRIMARY KEY (`fbId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `user`
-- 

INSERT INTO `user` VALUES (693011998, 'Axel', 'Bouaziz', 'https://www.facebook.com/axel.bouaziz1', 'axel.bouaziz@hotmail.fr', 'male', 1, 1, 'Pantin', 'fr_FR', '2013-11-01 01:14:11', '2013-11-06 20:31:48', 1);
INSERT INTO `user` VALUES (1147369520, 'José', 'Albea', 'https://www.facebook.com/Jose.Albea', 'thebogoss93@hotmail.fr', 'male', 1, 1, 'Paris, France', 'fr_FR', '2013-11-02 10:46:44', '2013-11-04 17:29:40', 1);

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
