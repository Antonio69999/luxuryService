-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 30 sep. 2023 à 08:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `luxuryservice`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user_id` int DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `job_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `deleted_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6AB5B47179F37AE5` (`id_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `id_user_id`, `gender`, `firstname`, `lastname`, `adress`, `country`, `nationality`, `passport_file`, `cv`, `profil_picture`, `current_location`, `date_of_birth`, `place_of_birth`, `availability`, `job_category`, `experience`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`, `files`, `role`) VALUES
(1, 6, 'non-binary', 'coucou', 'cmoi', 'chezmoi', 'kinder', 'blanc', 'C:\\wamp64\\tmp\\php3EB3.tmp', 'C:\\wamp64\\tmp\\php3EB4.tmp', 'C:\\wamp64\\tmp\\php3EB2.tmp', 'maison', '2018-02-01 01:01:00', 'mamaman', 0, 'SectorA', '10 years', 'je sais plus', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

DROP TABLE IF EXISTS `candidature`;
CREATE TABLE IF NOT EXISTS `candidature` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `job_offer_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E33BD3B8A76ED395` (`user_id`),
  KEY `IDX_E33BD3B83481D195` (`job_offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_offer_id` int DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_C74404553481D195` (`job_offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230919083722', '2023-09-19 08:37:34', 251),
('DoctrineMigrations\\Version20230919084302', '2023-09-19 08:43:15', 47),
('DoctrineMigrations\\Version20230920075348', '2023-09-20 07:54:04', 312),
('DoctrineMigrations\\Version20230920091305', '2023-09-20 09:13:35', 676),
('DoctrineMigrations\\Version20230926093409', '2023-09-26 09:34:39', 561);

-- --------------------------------------------------------

--
-- Structure de la table `job_offer`
--

DROP TABLE IF EXISTS `job_offer`;
CREATE TABLE IF NOT EXISTS `job_offer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `activity` tinyint(1) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `salary` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `client_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_288A3A4E19EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job_offer`
--

INSERT INTO `job_offer` (`id`, `reference`, `description`, `activity`, `notes`, `job_title`, `job_type`, `location`, `job_category`, `closing_date`, `salary`, `created_at`, `client_id`) VALUES
(1, 'reference', 'Vient godille', NULL, 'note', 'Job', 'Creative', 'Mars', 'full time', '2023-09-27 10:23:50', 1, '2023-09-26 10:23:50', NULL),
(2, '12', 'Il faut traverser la rue pour trouver du travail', 1, 'Il était une fois, du travaille....', 'Travaille', 'Creative', 'Moon', 'Partial', '2023-09-27 00:00:00', 2, '2023-09-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'produit de test', 150);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`) VALUES
(1, 'dede@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$L8YEoQoQgQ2IfmgO71PH0eoUuBSaXKJ3eKFvIp5rMertIusjZtW0.', 'dede'),
(3, 'test@gmail.com', '[]', '$2y$13$lySON0FWMg8ui1HMldH0HuwF6uVqY8.PJ.BIG8/izDCMBcjc0EQk2', 'test'),
(4, 'test3@aol.fr', '[]', '$2y$13$vaKggmiVdRgVijMbblCqseMcA8rQWkR0qWSYrMiO9pUdRz3kQkz5W', 'test3'),
(5, 'bonjour@gmail.com', '[]', '$2y$13$Imk69SqNTeU9gZhHfzUOZ.RiwgDorbYf9C7V03/Q34m91DviYt79e', 'bonjour'),
(6, 'coucou@gmail.com', '[]', '$2y$13$1tRO9OlFoDEn9RIxLG5SZeE8jLLiaIxbCTAoGD2DHqdiCx6RxlUF.', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_6AB5B47179F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `FK_E33BD3B83481D195` FOREIGN KEY (`job_offer_id`) REFERENCES `job_offer` (`id`),
  ADD CONSTRAINT `FK_E33BD3B8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `candidat` (`id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404553481D195` FOREIGN KEY (`job_offer_id`) REFERENCES `job_offer` (`id`);

--
-- Contraintes pour la table `job_offer`
--
ALTER TABLE `job_offer`
  ADD CONSTRAINT `FK_288A3A4E19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
