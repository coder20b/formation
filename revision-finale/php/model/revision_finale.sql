-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 jan. 2021 à 16:08
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `revision_finale`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titre` varchar(160) NOT NULL,
  `description` text NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `user_id`, `titre`, `description`, `datePublication`) VALUES
(1, 1, 'titre1410', 'desc1410', '2021-01-12 14:10:55'),
(2, 123, 'modifTitre', 'desc1412MODIF', '2021-01-12 14:17:15'),
(4, 2, 'annonce2A', 'desc2a', '2021-01-12 14:20:20'),
(5, 2, 'titre2b', 'desc2b', '2021-01-12 14:20:29'),
(6, 5, 'annonce5a', 'desc5a', '2021-01-12 14:20:47'),
(7, 0, 'test vide', 'desc vide', '2021-01-12 14:37:44'),
(8, 12, 'perruque', 'rose', '2021-01-12 15:16:23'),
(9, 12, 'brosse', 'assortie avec perruque', '2021-01-12 15:16:51'),
(10, 13, 'fraises', 'rouges', '2021-01-12 15:17:45'),
(11, 13, 'framboises', 'tres bonnes', '2021-01-12 15:18:03');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_categorie`
--

CREATE TABLE `annonce_categorie` (
  `id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce_categorie`
--

INSERT INTO `annonce_categorie` (`id`, `annonce_id`, `categorie_id`) VALUES
(1, 1, 3),
(2, 3, 10),
(4, 8, 6),
(5, 9, 6),
(6, 10, 5),
(7, 11, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `label` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `label`) VALUES
(1, 'test1500'),
(2, 'test1501'),
(4, 'test1504'),
(5, 'nourriture'),
(6, 'beauté');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `dateInscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `dateInscription`) VALUES
(2, 'test1515', 'test1515@mail.me', '2021-01-11 15:17:13'),
(4, 'test1517MODIF', 'test1517modif@mail.me', '2021-01-11 15:24:05'),
(5, 'test1524MODIF', 'test1524@mail.me', '2021-01-11 15:25:14'),
(7, 'test1531MODIF', 'test1531@mail.me', '2021-01-11 15:31:52'),
(9, 'test1543MODIF', 'test1543@mail.me', '2021-01-11 15:43:31'),
(12, 'didier', 'didier@mail.me', '2021-01-12 15:15:41'),
(13, 'charlotte', 'charlotte@mail.me', '2021-01-12 15:17:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonce_categorie`
--
ALTER TABLE `annonce_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `annonce_categorie`
--
ALTER TABLE `annonce_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
