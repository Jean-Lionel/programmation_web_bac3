-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 03 sep. 2020 à 14:08
-- Version du serveur :  8.0.20-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ult_programation_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `nom`, `prenom`, `login`, `password`, `role`) VALUES
(1, 'jean', 'lionel', 'lion', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '1233444'),
(2, 'claude', 'jean claude', 'claude', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'claude dd'),
(3, 'hey', 'bro', 'are ', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'yhhhhhhhhhh'),
(7, 'NI', 'Jea', 'oss', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'SUper admin'),
(8, 'Irakoze', 'yves', 'yves', '3b1fe340dba76bf37270abad774f327f50b5e1d8', 'ADMIN'),
(9, 'Muco', 'Bertille', 'bertille', '3cfb484413c89ce94cc5017148d7e4bb36d6693b', 'ADMIN'),
(10, 'NININAHAZWE', 'Jean Lionel', 'lion', 'eaf14a01af23a2750f52c1b1992232c6adc001c4', 'Super Admin');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `compte_id` int DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telephone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `compte_id`, `created`, `telephone`) VALUES
(2, 'GRETTA', 'IRADUKUNDA', 2, '2020-08-11 05:43:24', '6980080990'),
(3, 'jean', 'Lionel', 2, '2020-08-11 06:36:30', '75 123 344'),
(4, 'NININAHAZWE', 'LE HACKER', 1, '2020-08-11 06:37:08', '90000'),
(5, 'NININAHAZWE', 'LE HACKER', 1, '2020-08-11 07:50:37', '70999999'),
(6, 'Muhwenyanga', 'Chantal', 1, '2020-08-11 09:46:43', '12000'),
(7, 'hacker', 'international', NULL, '2020-08-17 10:03:41', '78888'),
(8, 'Imanirahari', 'Siméon', 2, '2020-08-17 10:42:42', '8936778763'),
(9, 'Kelly', 'Irutingabo ', 3, '2020-08-17 10:46:05', '6980080990'),
(10, 'Akimana', 'Glory', 4, '2020-08-17 11:01:34', '79 555 202'),
(11, 'Niyongabo', 'Etienne', 5, '2020-08-17 15:41:35', '79614036'),
(12, 'Iradukunda', 'gretta', 6, '2020-08-17 16:04:04', '75123344'),
(13, 'Ininahazwe', 'Ciella', 7, '2020-08-17 18:25:29', '455666'),
(14, 'tresor', 'irakoze', 31, '2020-08-22 08:51:22', '79888'),
(15, 'Muco', 'Bertille', 32, '2020-08-22 10:47:43', '68 850 825'),
(16, 'Irakoze', 'yves', 33, '2020-08-26 15:41:04', '75008976'),
(17, 'Ad eum velit beatae ', 'Nisi hic itaque quis', 34, '2020-08-27 10:13:26', '+1 (575) 794-6974'),
(18, 'NININAHAZWE', 'walter', 35, '2020-08-27 11:03:40', '5526562826');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int NOT NULL,
  `montant` float NOT NULL,
  `numero` varchar(30) NOT NULL,
  `date_Creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `montant`, `numero`, `date_Creation`) VALUES
(1, 400000, 'C-1', '2020-08-11 05:43:10'),
(2, 111334, 'C-2', '2020-08-17 10:42:42'),
(3, 15000, 'C-3', '2020-08-17 10:46:04'),
(4, 14000, 'C-4', '2020-08-17 11:01:34'),
(5, 890909, 'C-5', '2020-08-17 15:41:35'),
(6, 0, 'C-6', '2020-08-17 16:04:04'),
(7, 0, 'C-7', '2020-08-17 18:25:29'),
(8, 0, 'C-8', '2020-08-17 18:29:51'),
(9, 0, 'C-9', '2020-08-17 18:30:38'),
(10, 0, 'C-10', '2020-08-17 18:31:21'),
(11, 0, 'C-11', '2020-08-17 18:31:57'),
(12, 0, 'C-12', '2020-08-17 18:32:52'),
(13, 0, 'C-13', '2020-08-17 18:33:38'),
(14, 0, 'C-14', '2020-08-17 18:34:22'),
(15, 0, 'C-15', '2020-08-17 18:34:37'),
(16, 0, 'C-16', '2020-08-17 18:35:18'),
(17, 0, 'C-17', '2020-08-17 18:36:40'),
(18, 0, 'C-18', '2020-08-17 18:37:39'),
(19, 0, 'C-19', '2020-08-17 18:38:30'),
(20, 0, 'C-20', '2020-08-17 18:39:59'),
(21, 0, 'C-21', '2020-08-17 18:40:32'),
(22, 0, 'C-22', '2020-08-17 18:40:49'),
(23, 0, 'C-23', '2020-08-17 18:42:21'),
(24, 0, 'C-24', '2020-08-17 18:43:33'),
(25, 0, 'C-25', '2020-08-17 18:44:32'),
(26, 0, 'C-26', '2020-08-17 18:45:10'),
(27, 0, 'C-27', '2020-08-17 18:45:57'),
(28, 0, 'C-28', '2020-08-17 18:46:31'),
(29, 0, 'C-29', '2020-08-17 18:47:23'),
(30, 0, 'C-30', '2020-08-18 07:58:58'),
(31, 0, 'C-31', '2020-08-22 08:51:22'),
(32, 7000, 'C-32', '2020-08-22 10:47:43'),
(33, 0, 'C-33', '2020-08-26 15:41:04'),
(34, 0, 'C-34', '2020-08-27 10:13:26'),
(35, 5000, 'C-35', '2020-08-27 11:03:40');

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `compte_id` int NOT NULL,
  `agent_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_operation` enum('RETRAIT','VERSEMENT') NOT NULL,
  `montant` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id`, `client_id`, `compte_id`, `agent_id`, `created_at`, `type_operation`, `montant`) VALUES
(1, 4, 1, 1, '2020-08-20 05:29:47', 'VERSEMENT', 4000),
(2, 4, 1, 1, '2020-08-20 05:42:42', 'VERSEMENT', 400000),
(3, 4, 1, 1, '2020-08-20 05:43:17', 'RETRAIT', 5000),
(4, 2, 2, 1, '2020-08-20 05:46:59', 'RETRAIT', 333),
(5, 2, 2, 1, '2020-08-20 05:47:10', 'RETRAIT', 3333),
(6, 2, 2, 8, '2020-08-21 05:24:49', 'VERSEMENT', 30000),
(7, 2, 2, 7, '2020-08-22 08:43:58', 'RETRAIT', 5000),
(8, 15, 32, 9, '2020-08-22 08:49:02', 'VERSEMENT', 1e24),
(9, 15, 32, 9, '2020-08-22 08:49:38', 'RETRAIT', 1000000000000),
(10, 15, 32, 9, '2020-08-22 08:50:29', 'VERSEMENT', 1e17),
(11, 15, 32, 9, '2020-08-22 08:51:00', 'RETRAIT', 1e24),
(12, 15, 32, 9, '2020-08-22 08:51:41', 'VERSEMENT', 10000),
(13, 15, 32, 9, '2020-08-22 08:51:56', 'RETRAIT', 3000),
(14, 18, 35, 10, '2020-08-27 09:05:06', 'VERSEMENT', 10000),
(15, 18, 35, 10, '2020-08-27 09:06:06', 'RETRAIT', 5000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_1` (`compte_id`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_5` (`client_id`),
  ADD KEY `fk_4` (`agent_id`),
  ADD KEY `fk_3` (`compte_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`),
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
