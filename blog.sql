-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 jan. 2020 à 13:13
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
  `comment_date` timestamp NOT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `fk_commentaire_post1_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `post_id`, `comment_date`) VALUES
(1, 'Nicolas', 'Commentaire 1', 1, '2019-12-07 23:00:00'),
(2, 'Jean', 'Commentaire 1', 1, '2019-12-16 23:00:00'),
(3, 'TEst', 'test545454', 1, '2020-01-02 23:00:00'),
(4, 'Nico', 'test44', 2, '2019-12-23 23:00:00'),
(5, 'Esmeralda', 'Commentaire 3', 1, '2019-12-12 23:00:00'),
(6, 'Luc', 'Commentaire 3', 2, '2019-12-16 23:00:00'),
(7, 'Nico', 'test 1', 1, '2020-01-08 13:46:35'),
(8, 'Jean', 'test 2', 1, '2020-01-08 13:47:20'),
(9, 'Nico', 'test namespace', 10, '2020-01-08 13:47:45'),
(10, 'Nico', 'test namespace556', 2, '2020-01-08 14:04:41'),
(11, 'Nico', 'tetest2345', 11, '2020-01-08 14:26:19'),
(12, 'Nico', 'test namespace...44', 11, '2020-01-08 14:34:22'),
(13, 'Nico', 'test namespace345454554', 9, '2020-01-08 15:00:37'),
(14, 'Nico', 'test', 4, '2020-01-08 15:22:56'),
(15, 'Nico', 'tttteeee', 12, '2020-01-08 16:38:29'),
(16, 'Nico', 'tetest2', 11, '2020-01-09 13:43:38'),
(17, 'Jean', 'Test modification commentaire2', 4, '2020-01-09 13:54:41'),
(18, 'TEst', 'test3', 3, '2020-01-09 14:04:35');

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
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `author` varchar(45) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `chapo`, `description`, `author`, `date_creation`, `date_update`) VALUES
(1, 'Titre 1', 'Description du titre 1', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'nicolas', '2019-11-13', '2019-11-13'),
(2, 'Titre 2', 'Description du titre 2', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'jeremy', '2019-12-02', '2019-11-13'),
(3, 'Titre 35', 'Description du titre 3', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'nicolas', '2019-12-05', '2019-11-13'),
(4, 'Titre 4', 'Description du titre 4', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Eaque ipsa quae ab illo inventore veritatis et quasi. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nCorrupti quos dolores et quas molestias excepturi sint occaecati. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n\r\nQui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n\r\nFacere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae vitae dicta sunt explicabo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.\r\n\r\nNihil molestiae consequatur, vel illum qui dolorem eum. Totam rem aperiam. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia. Qui officia deserunt mollit anim id est laborum.\r\n\r\nAccusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. Facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fugiat quo voluptas nulla pariatur? Corrupti quos dolores et quas molestias excepturi sint occaecati.\r\n\r\nLaboris nisi ut aliquip ex ea commodo consequat. Laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Esse cillum dolore eu fugiat nulla pariatur. Totam rem aperiam. Architecto beatae vitae dicta sunt explicabo. Totam rem aperiam.\r\n\r\nFugiat quo voluptas nulla pariatur? Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'nicolas', '2019-12-12', '2019-11-13'),
(9, 'Article Chalet', 'Description du titre 5', 'tetet', 'nicolas', '2019-12-18', '2019-11-13'),
(10, 'Titre 35', 'Description du titre 6', 'dffdhgd', 'nicolas', '2019-12-19', '2019-11-13'),
(11, 'Titre 34', 'Description du titre 7', 'dffdhgd', 'nicolas', '2020-01-07', '2019-11-13'),
(12, 'Titre 35', 'Description du titre 8', '', '', '2019-10-01', '2019-11-13'),
(13, 'Titre 35', 'Description du titre 9', 'Nihil molestiae consequatur, vel illum qui dolorem eum. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'jeremy', '2019-11-05', '2019-11-13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `statut_utilisateur_id_status` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`statut_utilisateur_id_status`),
  KEY `fk_utilisateur_statut_utilisateur1_idx` (`statut_utilisateur_id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `statut_utilisateur` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_commentaire_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comments_status`
--
ALTER TABLE `comments_status`
  ADD CONSTRAINT `fk_statut_commentaire_commentaire1` FOREIGN KEY (`commentaire_id_commentaire`,`commentaire_post_id_post`) REFERENCES `comments` (`id`, `post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_utilisateur_statut_utilisateur1` FOREIGN KEY (`statut_utilisateur_id_status`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
