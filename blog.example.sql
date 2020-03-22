-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 mars 2020 à 18:41
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
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `is_valid` tinyint(1) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`) USING BTREE,
  KEY `fk_commentaire_post1_idx` (`post_id`),
  KEY `fk_commentaire_author` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `post_id`, `comment_date`, `is_valid`, `author_id`) VALUES
(133, 'Article très interessant, merci!', 107, '2020-03-15 00:00:00', 1, 1),
(135, 'Top, merci', 107, '2020-03-17 00:00:00', 1, 7),
(136, 'Article très interessant, merci!\r\n', 108, '2020-03-17 00:00:00', 1, 7),
(138, 'Merci', 108, '2020-03-17 00:00:00', 1, 1),
(139, 'Merci', 108, '2020-03-17 00:00:00', NULL, 1),


-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapo` varchar(255) DEFAULT NULL,
  `description` longtext,
  `date_creation` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `fk_post_author` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `chapo`, `description`, `date_creation`, `date_update`, `author_id`) VALUES
(107, 'Les nouveautés de PHP 8 prévues pour fin 2020', 'PHP 8', 'Les nouveautés de PHP 8 prévues pour fin 2020\r\nPhp 8, la prochaine version majeure de PHP, devrait être livrée d\'ici la fin de l\'année 2020.\r\n\r\nDe gros développements sont actuellement en cours, il est donc à supposer que de belles nouveautés verront le jour. \r\n\r\nDans cet article, découvrez une liste des changements attendus sur la prochaine version : les nouvelles fonctionnalités, les améliorations concernant les performances, les changements radicaux. \r\n\r\nVous pourrez également en savoir plus sur les impacts que ces modifications risquent d\'entraîner sur votre code. \r\n\r\nPlus d\'infos dans cette veille technique proposée par stitcher.io. ', '2020-03-17 16:04:50', '2020-03-17 16:04:50', 1),
(108, 'Dynamisez vos vues à l’aide de Twig', 'Qu’est-ce que Twig ?', 'Twig est un moteur de gabarit développé en PHP inclus par défaut avec le framework Symfony 4.\r\n\r\nMais PHP est déjà un moteur de gabarit : pourquoi devrions-nous utiliser et apprendre un moteur de gabarit supplémentaire ?\r\n\r\nLe langage PHP qui était un moteur de gabarit à ses débuts est maintenant devenu un langage complet capable de supporter la programmation objet, fonctionnelle et impérative.\r\n\r\nL\'intérêt principal d\'un moteur de gabarit est de séparer la logique de sa représentation. En utilisant PHP, comment définir ce qui est de la logique et ce qui est de la représentation ?\r\n\r\nPourtant, nous avons toujours besoin d\'un peu de code dynamique pour intégrer des pages web :\r\n\r\npouvoir boucler sur une liste d\'éléments ;\r\n\r\npouvoir afficher une portion de code selon une condition ;\r\n\r\nou formater une date en fonction de la date locale utilisée par le visiteur du site...\r\n\r\nVoici pourquoi Twig est plus adapté que le PHP en tant que moteur de gabarit :\r\n\r\nil a une syntaxe beaucoup plus concise et claire;\r\n\r\npar défaut, il supporte de nombreuses fonctionnalités utiles, telles que la notion d\'héritage ;\r\n\r\net il sécurise automatiquement vos variables.', '2020-03-15 16:06:04', '2020-03-16 16:06:04', 1),
(109, 'Développez votre site web avec le framework Symfony', 'Symfony', 'Vous développez des sites web régulièrement et vous en avez assez de réinventer la roue ? Vous aimeriez utiliser les bonnes pratiques de développement PHP pour concevoir des sites web de qualité professionnelle ?\r\n\r\nCe cours vous permettra de prendre en main Symfony, le framework PHP de référence. Pourquoi utiliser un framework ? Comment créer un nouveau projet de site web avec Symfony, mettre en place les environnements de test et de production, concevoir les contrôleurs, les templates, gérer la traduction et communiquer avec une base de données via Doctrine ?\r\n\r\nAlexandre Bacco vous montrera tout au long de ce cours comment ce puissant framework, supporté par une large communauté, va vous faire gagner en efficacité. Fabien Potencier, créateur de Symfony, introduira chacun des chapitres par une vidéo explicative des principaux points abordés.\r\n\r\nCe cours, écrit par Alexandre Bacco, a été conçu conjointement par SensioLabs, société éditrice de Symfony, et OpenClassrooms. Un certificat de réussite du cours sera délivré par SensioLabs et OpenClassrooms pour les élèves qui réussiront l’ensemble des exercices.', '2020-03-11 16:07:26', '2020-03-12 16:07:26', 1),
(110, 'Comprendre la blockchain en 5 minutes', 'blockchain', 'La blockchain expliquée simplement\r\nDans cette veille technique, découvrez ce qu\'est la blockchain, soit, selon jesuisundev.com : \"La Blockchain est une technologie de stockage et d’échange de données numériques qui est décentralisée et infalsifiable. \".\r\n\r\nToujours avec un ton décalé, l\'auteur explique simplement le concept de blockchain qui peut paraître compliqué au premier abord. \r\n\r\nVous allez donc enfin pouvoir comprendre ce qu\'est la blockchain, comment elle marche et pourquoi elle a autant gagné de terrain ces dernières années.  ', '2020-02-10 16:08:49', '2020-02-12 16:08:49', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  KEY `fk_utilisateur_statut_utilisateur1_idx` (`user_status`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_status`) VALUES
(1, 'Nicolas', 'nicolas@gmail.com', '$2y$10$t3rMCMOAxXv1Rd.898NhveJTtrL6Fi6OLcfosz9YoUNpH3CVg6kWa', 1),
(2, 'Jean', 'jean@gmail.com', '$2y$10$IS8l8SOciIQm.ONWXXf0Gemb0I0D05Rs36q60BnIKqwBD79lZNHPy', 2),


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
  ADD CONSTRAINT `fk_commentaire_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commentaire_post1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_utilisateur_statut_utilisateur1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
