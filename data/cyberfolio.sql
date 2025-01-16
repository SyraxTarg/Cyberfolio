-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 16 jan. 2025 à 21:35
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cyberfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `centres_interet`
--

DROP TABLE IF EXISTS `centres_interet`;
CREATE TABLE IF NOT EXISTS `centres_interet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centre_interet` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `centres_interet`
--

INSERT INTO `centres_interet` (`id`, `centre_interet`) VALUES
(1, 'Poterie'),
(2, 'Lecture'),
(3, 'Photographie'),
(4, 'Voyages'),
(5, 'Cuisine'),
(6, 'Randonnée'),
(7, 'Jardinage'),
(8, 'Peinture'),
(9, 'Musique'),
(10, 'Sports'),
(11, 'Jeux vidéo'),
(12, 'Danse'),
(13, 'Écriture'),
(14, 'Bricolage'),
(15, 'Astronomie'),
(16, 'Couture'),
(17, 'Pêche'),
(18, 'Théâtre'),
(19, 'Méditation'),
(20, 'Échecs');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competence` varchar(100) NOT NULL,
  `hard_skill` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `competence`, `hard_skill`) VALUES
(1, 'Communication d’entreprise', 1),
(2, 'Programmation Python', 1),
(3, 'Gestion de projet', 1),
(4, 'Analyse de données', 1),
(5, 'Rédaction technique', 1),
(6, 'Négociation', 1),
(7, 'Design graphique', 1),
(8, 'Service client', 1),
(9, 'Marketing numérique', 1),
(10, 'Leadership', 1),
(11, 'Développement web', 1),
(12, 'Formation d’équipe', 1),
(13, 'SEO et référencement', 1),
(14, 'Adaptabilité', 1),
(15, 'Gestion financière', 1),
(16, 'Prise de parole en public', 1),
(17, 'Analyse statistique', 1),
(18, 'Travail d’équipe', 1),
(19, 'Automatisation des processus', 1),
(20, 'Résolution de conflits', 1);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_590C103CCFA12B8` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `profile_id`, `titre`, `description`, `lieu`, `date`) VALUES
(1, 1, 'Vente en magasin', 'vendeur en magasin', 'Bordeaux (33)', '2025-01-16 21:26:17'),
(2, 1, 'Développeur web', 'Création de sites internet', 'Paris (75)', '2025-01-16 21:26:17'),
(3, 2, 'Assistant administratif', 'Gestion des dossiers', 'Lyon (69)', '2025-01-16 21:26:17'),
(4, 3, 'Chef de projet', 'Coordination de projets', 'Marseille (13)', '2025-01-16 21:26:17'),
(5, 4, 'Enseignant', 'Cours de mathématiques', 'Toulouse (31)', '2025-01-16 21:26:17'),
(6, 5, 'Consultant en marketing', 'Stratégies marketing', 'Nantes (44)', '2025-01-16 21:26:17'),
(7, 6, 'Technicien informatique', 'Maintenance réseau', 'Strasbourg (67)', '2025-01-16 21:26:17'),
(8, 7, 'Responsable RH', 'Gestion du personnel', 'Rennes (35)', '2025-01-16 21:26:17'),
(9, 8, 'Ingénieur logiciel', 'Développement de logiciels', 'Lille (59)', '2025-01-16 21:26:17'),
(10, 9, 'Graphiste', 'Création de visuels', 'Nice (06)', '2025-01-16 21:26:17'),
(11, 10, 'Électricien', 'Installation électrique', 'Montpellier (34)', '2025-01-16 21:26:17'),
(12, 11, 'Médecin généraliste', 'Soins aux patients', 'Brest (29)', '2025-01-16 21:26:17'),
(13, 12, 'Comptable', 'Gestion des finances', 'Orléans (45)', '2025-01-16 21:26:17'),
(14, 13, 'Architecte', 'Conception de bâtiments', 'Dijon (21)', '2025-01-16 21:26:17'),
(15, 14, 'Journaliste', 'Rédaction d’articles', 'Reims (51)', '2025-01-16 21:26:17'),
(16, 1, 'Livreur', 'Livraisons à domicile', 'Clermont-Ferrand (63)', '2025-01-16 21:26:17');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `diplome` varchar(255) NOT NULL,
  `etablissement` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFCCFA12B8` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `profile_id`, `diplome`, `etablissement`, `lieu`, `date`, `description`) VALUES
(1, 1, 'Bac général', 'Lycée VDG', 'Marmande', '2025-01-16 21:26:17', 'AMC et NSI'),
(2, 1, 'BTS Informatique', 'IUT Bordeaux', 'Bordeaux', '2025-01-16 21:26:17', 'Développement web'),
(3, 2, 'Licence en gestion', 'Université de Lyon', 'Lyon', '2025-01-16 21:26:17', 'Spécialité finances'),
(4, 3, 'Master en management', 'HEC Paris', 'Paris', '2025-01-16 21:26:17', 'Management stratégique'),
(5, 4, 'BEP Électricité', 'CFA Toulouse', 'Toulouse', '2025-01-16 21:26:17', 'Formation en électricité générale'),
(6, 5, 'Licence Marketing', 'Université de Nantes', 'Nantes', '2025-01-16 21:26:17', 'Marketing digital'),
(7, 6, 'DUT Réseaux et Télécoms', 'IUT Strasbourg', 'Strasbourg', '2025-01-16 21:26:17', 'Formation en réseaux informatiques'),
(8, 7, 'Master RH', 'Université Rennes 2', 'Rennes', '2025-01-16 21:26:17', 'Gestion des ressources humaines'),
(9, 8, 'Ingénieur informatique', 'Polytech Lille', 'Lille', '2025-01-16 21:26:17', 'Spécialité développement logiciel'),
(10, 9, 'BTS Design Graphique', 'École des Arts', 'Nice', '2025-01-16 21:26:17', 'Conception visuelle'),
(11, 10, 'CAP Électricien', 'CFA Montpellier', 'Montpellier', '2025-01-16 21:26:17', 'Techniques de base en électricité'),
(12, 11, 'Doctorat Médecine', 'Université de Brest', 'Brest', '2025-01-16 21:26:17', 'Pratiques générales'),
(13, 12, 'Master Comptabilité', 'Université d’Orléans', 'Orléans', '2025-01-16 21:26:17', 'Expertise comptable'),
(14, 13, 'Diplôme d’architecture', 'École Nationale Supérieure d’Architecture', 'Dijon', '2025-01-16 21:26:17', 'Conception architecturale'),
(15, 14, 'Licence Journalisme', 'Université Reims', 'Reims', '2025-01-16 21:26:17', 'Techniques de rédaction');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` varchar(15) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id`, `telephone`, `profile_picture`) VALUES
(1, '0632145578', 'default.jpg'),
(2, '0632145579', 'default.jpg'),
(3, '0632145580', 'default.jpg'),
(4, '0632145581', 'default.jpg'),
(5, '0632145582', 'default.jpg'),
(6, '0632145583', 'default.jpg'),
(7, '0632145584', 'default.jpg'),
(8, '0632145585', 'default.jpg'),
(9, '0632145586', 'default.jpg'),
(10, '0632145587', 'default.jpg'),
(11, '0632145588', 'default.jpg'),
(12, '0632145589', 'default.jpg'),
(13, '0632145590', 'default.jpg'),
(14, '0632145591', 'default.jpg'),
(15, '0123456789', '67897aa6d4a42-superadmin.jpg'),
(16, '0123456789', '67897a9a9197e-admin.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `profile_centres_interet`
--

DROP TABLE IF EXISTS `profile_centres_interet`;
CREATE TABLE IF NOT EXISTS `profile_centres_interet` (
  `profile_id` int(11) NOT NULL,
  `centres_interet_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`,`centres_interet_id`),
  KEY `IDX_D2B485D1CCFA12B8` (`profile_id`),
  KEY `IDX_D2B485D1FA1337E7` (`centres_interet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profile_centres_interet`
--

INSERT INTO `profile_centres_interet` (`profile_id`, `centres_interet_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 5),
(4, 2),
(4, 6),
(5, 3),
(5, 7),
(6, 4),
(6, 8),
(7, 1),
(7, 9),
(8, 5),
(8, 10),
(9, 6),
(9, 11),
(10, 7),
(10, 12),
(11, 8),
(11, 13),
(12, 9),
(12, 14),
(13, 1),
(13, 10),
(14, 2),
(14, 11);

-- --------------------------------------------------------

--
-- Structure de la table `profile_competence`
--

DROP TABLE IF EXISTS `profile_competence`;
CREATE TABLE IF NOT EXISTS `profile_competence` (
  `profile_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`,`competence_id`),
  KEY `IDX_53BF5F22CCFA12B8` (`profile_id`),
  KEY `IDX_53BF5F2215761DAB` (`competence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profile_competence`
--

INSERT INTO `profile_competence` (`profile_id`, `competence_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 5),
(4, 2),
(4, 6),
(5, 3),
(5, 7),
(6, 4),
(6, 8),
(7, 1),
(7, 9),
(8, 5),
(8, 10),
(9, 6),
(9, 11),
(10, 7),
(10, 12),
(11, 8),
(11, 13),
(12, 9),
(12, 14),
(13, 1),
(13, 10),
(14, 2),
(14, 11);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `description` longtext NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FB3D0EEA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `user_id`, `title`, `created_at`, `description`, `screenshot`, `link`) VALUES
(1, 1, 'Projet 1', '2025-01-16', 'Ceci est une description quelconque pour un projet qui a été fait en 2013', 'default.jpg', 'https://github.com/project'),
(2, 2, 'Projet 2', '2025-01-16', 'Une description pour le second projet réalisé récemment.', 'default.jpg', 'https://github.com/project'),
(3, 3, 'Projet 3', '2025-01-16', 'Un projet imaginatif construit en 2020.', 'default.jpg', 'https://github.com/project'),
(4, 4, 'Projet 4', '2025-01-16', 'Ceci est une description pour un projet innovant.', 'default.jpg', 'https://github.com/project'),
(5, 5, 'Projet 5', '2025-01-16', 'Un projet exceptionnel achevé en 2022.', 'default.jpg', 'https://github.com/project'),
(6, 6, 'Projet 6', '2025-01-16', 'Un projet captivant concernant la science.', 'default.jpg', 'https://github.com/project'),
(7, 7, 'Projet 7', '2025-01-16', 'Projet passionnant réalisé pour l\'éducation.', 'default.jpg', 'https://github.com/project'),
(8, 8, 'Projet 8', '2025-01-16', 'Un projet fascinant terminé en 2019.', 'default.jpg', 'https://github.com/project'),
(9, 9, 'Projet 9', '2025-01-16', 'Un projet technologique conçu récemment.', 'default.jpg', 'https://github.com/project'),
(10, 10, 'Projet 10', '2025-01-16', 'Ceci est une description pour un projet d\'art.', 'default.jpg', 'https://github.com/project'),
(11, 11, 'Projet 11', '2025-01-16', 'Un projet d\'écriture achevé récemment.', 'default.jpg', 'https://github.com/project'),
(12, 12, 'Projet 12', '2025-01-16', 'Un projet d\'exploration achevé en 2018.', 'default.jpg', 'https://github.com/project'),
(13, 13, 'Projet 13', '2025-01-16', 'Ceci est une description pour un projet ambitieux.', 'default.jpg', 'https://github.com/project'),
(14, 14, 'Projet 14', '2025-01-16', 'Un projet social réalisé récemment.', 'default.jpg', 'https://github.com/project'),
(15, 1, 'Projet 15', '2025-01-16', 'Un projet collaboratif achevé en 2023.', 'default.jpg', 'https://github.com/project'),
(16, 2, 'Projet 16', '2025-01-16', 'Un projet académique construit en 2020.', 'default.jpg', 'https://github.com/project'),
(17, 3, 'Projet 17', '2025-01-16', 'Un projet informatique achevé récemment.', 'default.jpg', 'https://github.com/project'),
(18, 4, 'Projet 18', '2025-01-16', 'Un projet créatif conçu en 2021.', 'default.jpg', 'https://github.com/project'),
(19, 5, 'Projet 19', '2025-01-16', 'Un projet communautaire réalisé en 2023.', 'default.jpg', 'https://github.com/project'),
(20, 6, 'Projet 20', '2025-01-16', 'Un projet écologique terminé en 2022.', 'default.jpg', 'https://github.com/project');

-- --------------------------------------------------------

--
-- Structure de la table `project_technology`
--

DROP TABLE IF EXISTS `project_technology`;
CREATE TABLE IF NOT EXISTS `project_technology` (
  `project_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`technology_id`),
  KEY `IDX_ECC5297F166D1F9C` (`project_id`),
  KEY `IDX_ECC5297F4235D463` (`technology_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project_technology`
--

INSERT INTO `project_technology` (`project_id`, `technology_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18),
(10, 19),
(10, 20),
(11, 1),
(12, 2),
(13, 3),
(14, 4),
(15, 5),
(16, 6),
(17, 7),
(18, 8),
(19, 9),
(20, 10);

-- --------------------------------------------------------

--
-- Structure de la table `technology`
--

DROP TABLE IF EXISTS `technology`;
CREATE TABLE IF NOT EXISTS `technology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `version` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `technology`
--

INSERT INTO `technology` (`id`, `name`, `logo`, `version`) VALUES
(1, 'JavaScript', 'js.png', '2.3'),
(2, 'Python', 'python.png', '3.9'),
(3, 'Java', 'default.png', '11.0'),
(4, 'C++', 'c++.png', '17.0'),
(5, 'PHP', 'php.png', '8.1'),
(6, 'Ruby', 'default.png', '3.0'),
(7, 'C#', 'default.png', '10.0'),
(8, 'Swift', 'default.png', '5.5'),
(9, 'Kotlin', 'default.png', '1.6'),
(10, 'TypeScript', 'default.png', '4.5'),
(11, 'Go', 'default.png', '1.18'),
(12, 'Rust', 'default.png', '1.60'),
(13, 'Perl', 'default.png', '5.34'),
(14, 'Scala', 'default.png', '3.1'),
(15, 'HTML', 'html.png', '5.0'),
(16, 'CSS', 'css.png', '3.0'),
(17, 'SQL', 'default.png', '2022'),
(18, 'R', 'default.png', '4.2'),
(19, 'Dart', 'default.png', '2.17'),
(20, 'Shell', 'default.png', '5.1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `birthday_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649CCFA12B8` (`profile_id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `profile_id`, `firstname`, `lastname`, `email`, `password`, `roles`, `created_at`, `updated_at`, `birthday_date`) VALUES
(1, 1, 'Philippe', 'Amadio', 'amadio@mailbox.com', '$2y$13$HlA2hgjXCBifJVPSoE8BfuFAx1ben5s.7Nj0Zo3HetTRhq85wtecW', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1983-03-16'),
(2, 2, 'Marie', 'Dubois', 'marie.dubois@mailbox.com', '$2y$13$Hv8WjvjXQLifAPSoE9BguCAx2ben8d.8Nk1Go4ZHetZRuq95xucJH', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1990-07-22'),
(3, 3, 'Jean', 'Nguyen', 'jean.nguyen@mailbox.com', '$2y$13$Jk9QfvjXWDifKPNoE9XgufDAx3len9t.3Nk3Io9PHetTRxr87ctJH', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1988-01-15'),
(4, 4, 'John', 'Smith', 'john.smith@mailbox.com', '$2y$13$Il6KqvjXFDgfXPSoE8TquCEx4ren7v.6Nk2Go7NHetMRqz88ntKH', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1985-11-30'),
(5, 5, 'Isabelle', 'Lopez', 'isabelle.lopez@mailbox.com', '$2y$13$Xj2PvwjXFBifAPPoT9CqvfGAx6cen8f.8Nk4Mo6QHetTRyr89xtKL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1995-06-18'),
(6, 6, 'Claire', 'Martin', 'claire.martin@mailbox.com', '$2y$13$Hq9KfvjXZFdgjKPPoT8CguEGAx5len8g.9Nk4So6AHetURqr88ytKL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1992-12-05'),
(7, 7, 'Antoine', 'Lemoine', 'antoine.lemoine@mailbox.com', '$2y$13$Yj7PvwjXGDdfHPQoN9TqufBAx4ren9c.8Nk6Ho5PHetTRyr77ntHL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1980-05-12'),
(8, 8, 'Laura', 'Fernandez', 'laura.fernandez@mailbox.com', '$2y$13$Xv6PwqjXFBifAPSoE8BquDFAx4ren7d.8Nk6Io4QHetTRxr67ctJL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1993-09-10'),
(9, 9, 'Pedro', 'Garcia', 'pedro.garcia@mailbox.com', '$2y$13$Tl7PvwjXFBgfWPQoT9BqufDAx5len9a.7Nk7Ho4QHetTRmr87dtLL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1987-04-25'),
(10, 10, 'Valentina', 'Rossi', 'valentina.rossi@mailbox.com', '$2y$13$Hl8LvwjXCBifPPSoT9DqufGAx4ren8b.7Nk7Io5PHetTRpr88htML', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1996-01-08'),
(11, 11, 'James', 'Bennett', 'james.bennett@mailbox.com', '$2y$13$Hl6PvwjXCBdfHPQoE9TguEGAx5len9f.8Nk8Jo5QHetTRyr79ctRL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1990-08-30'),
(12, 12, 'Sophie', 'Müller', 'sophie.muller@mailbox.com', '$2y$13$Ll7OvwjXABifSPQoE8AguCGAx6len8d.8Nk5Mo4PHetTRwr89ntLL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1997-03-14'),
(13, 13, 'Karl', 'Weber', 'karl.weber@mailbox.com', '$2y$13$Ml7NvwjXGDgfXPNoT9EguEGAx4ren7e.9Nk6Io3PHetTRsr67ctJL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1989-10-23'),
(14, 14, 'Anna', 'White', 'anna.white@mailbox.com', '$2y$13$Hl8PvwjXDBifUPSoE9AguBFAx5len7c.8Nk9Io4PHetTRpr67dtJL', '[\"ROLE_USER\"]', '2025-01-16', '2025-01-16', '1991-02-07'),
(15, 15, 'superadmin', 'superadmin', 'superadmin@mail.com', '$2y$13$t3KX1TzPUaZeHmHPYfcgEuUMmcw9HzYrr0/3oKnxCE3mX8xPwQ9sq', '[\"ROLE_SUPER_ADMIN\"]', '2025-01-16', '2025-01-16', '2025-01-16'),
(16, 16, 'admin', 'admin', 'admin@mail.com', '$2y$13$x.EtTxK1f.ypqw/Z7WTUlOD0ESrftVu5IcaTFFTavXYW3bZsLErY.', '[\"ROLE_ADMIN\"]', '2025-01-16', '2025-01-16', '2025-01-16');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `FK_590C103CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BFCCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Contraintes pour la table `profile_centres_interet`
--
ALTER TABLE `profile_centres_interet`
  ADD CONSTRAINT `FK_D2B485D1CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D2B485D1FA1337E7` FOREIGN KEY (`centres_interet_id`) REFERENCES `centres_interet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `profile_competence`
--
ALTER TABLE `profile_competence`
  ADD CONSTRAINT `FK_53BF5F2215761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_53BF5F22CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_2FB3D0EEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `project_technology`
--
ALTER TABLE `project_technology`
  ADD CONSTRAINT `FK_ECC5297F166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ECC5297F4235D463` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
