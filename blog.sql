-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 fév. 2020 à 09:20
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(55) NOT NULL,
  `comment` longtext NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `is_valid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `fk_commentaire_post1_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `post_id`, `comment_date`, `is_valid`) VALUES
(4, 'Nico', 'test44', 2, '2019-12-24 00:00:00', NULL),
(6, 'Luc', 'Commentaire 3', 2, '2019-12-17 00:00:00', NULL),
(9, 'Nico', 'Test Arrayrrrrrrrrr', 10, '2020-01-08 00:00:00', NULL),
(10, 'Nico', 'test namespace556884545', 2, '2020-01-08 00:00:00', NULL),
(11, 'Nico', 'tetest2345', 11, '2020-01-08 00:00:00', NULL),
(12, 'Nico', 'test namespace...44', 11, '2020-01-08 00:00:00', NULL),
(13, 'Nico', 'test namespace345454554', 9, '2020-01-08 00:00:00', NULL),
(15, 'Nico', 'tttteeee', 12, '2020-01-08 00:00:00', NULL),
(16, 'Nico', 'tetest2', 11, '2020-01-09 00:00:00', NULL),
(17, 'Jean', 'Test modification commentaire2', 4, '2020-01-09 00:00:00', NULL),
(18, 'TEst', 'test3', 3, '2020-01-09 00:00:00', NULL),
(33, 'Nico', 'Test Array333333333333333', 9, '2020-01-15 00:00:00', NULL),
(34, 'Nico', 'Test Array', 9, '2020-01-15 00:00:00', NULL),
(35, 'Nico', 'Test Array', 9, '2020-01-15 00:00:00', NULL),
(36, 'Nico', 'Test Array', 9, '2020-01-15 00:00:00', NULL),
(37, 'Nico', 'Test Array', 9, '2020-01-15 00:00:00', NULL),
(38, 'Nico', 'Test Array', 9, '2020-01-15 00:00:00', NULL),
(39, 'Nico', 'test2', 10, '2020-01-15 00:00:00', NULL),
(40, 'nicolas', 'gfdgfdgdfgfdgd', 3, '2020-01-23 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments_status`
--

DROP TABLE IF EXISTS `comments_status`;
CREATE TABLE IF NOT EXISTS `comments_status` (
  `id_statut_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `statut_commentaire` varchar(45) DEFAULT NULL,
  `commentaire_id_commentaire` int(11) NOT NULL,
  `commentaire_post_id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_statut_commentaire`,`commentaire_id_commentaire`,`commentaire_post_id_post`),
  KEY `fk_statut_commentaire_commentaire1_idx` (`commentaire_id_commentaire`,`commentaire_post_id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `author` varchar(45) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `description`, `author`, `date_creation`, `date_update`) VALUES
(2, 'Titre 2', 'Description du titre 2', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'jeremy', '2019-12-02 00:00:00', '2019-11-13 00:00:00'),
(3, 'Titre 35', 'Description du titre 3', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'nicolas', '2019-12-05 00:00:00', '2019-11-13 00:00:00'),
(4, 'Titre 4', 'Description du titre 4', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'nicolas', '2019-12-12 00:00:00', '2019-11-13 00:00:00'),
(9, 'Article Chalet', 'Description du titre 5', 'tetet', 'nicolas', '2019-12-18 00:00:00', '2019-11-13 00:00:00'),
(10, 'Titre 35', 'Description du titre 6', 'dffdhgd', 'nicolas', '2019-12-19 00:00:00', '2019-11-13 00:00:00'),
(11, 'Titre 34', 'Description du titre 7', 'dffdhgd', 'nicolas', '2020-01-07 00:00:00', '2019-11-13 00:00:00'),
(12, 'Titre 35', 'Description du titre 8', '', '', '2019-10-01 00:00:00', '2019-11-13 00:00:00'),
(14, 'Article Chalet', 'CHapo 36', 'gfhfghfg', 'Nico', '2020-01-29 13:13:51', NULL),
(30, 'Titre 39', 'CHapo 39', 'gfdgdfgfd', 'Jean', '2020-01-29 13:32:42', NULL),
(31, 'Titre 39', 'CHapo 39', 'gfdgdfgfd', 'Jean', '2020-01-29 13:34:01', NULL),
(32, 'Titre 39', 'CHapo 39', 'gfdgdfgfd', 'Jean', '2020-01-29 13:38:30', NULL),
(33, 'Titre 40', 'CHapo 39', 'gfdgdfgfd', 'Jean', '2020-01-29 13:43:38', NULL),
(39, 'tryrty', 'trytyrt', 'ytryrtytry', 'Nico', '2020-01-29 13:59:34', NULL),
(40, 'gfgdfg', 'fgdgfgdf', 'gfdfgdf', 'Jean', '2020-01-29 14:01:51', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_status` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_status`),
  KEY `fk_utilisateur_statut_utilisateur1_idx` (`user_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `password`, `user_status`) VALUES
(1, 'Nicolas', 'nicodupriez@hotmail.com', '$2y$10$t3rMCMOAxXv1Rd.898NhveJTtrL6Fi6OLcfosz9YoUNpH3CVg6kWa', 1),
(2, 'Jean', 'jean@gmail.com', '1234', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `user_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_status`
--

INSERT INTO `user_status` (`id_status`, `user_status`) VALUES
(1, 'Administrateur'),
(2, 'Visiteur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_commentaire_post1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments_status`
--
ALTER TABLE `comments_status`
  ADD CONSTRAINT `fk_statut_commentaire_commentaire1` FOREIGN KEY (`commentaire_id_commentaire`,`commentaire_post_id_post`) REFERENCES `comments` (`id`, `post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_utilisateur_statut_utilisateur1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
