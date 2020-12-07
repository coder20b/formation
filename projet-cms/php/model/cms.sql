-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 déc. 2020 à 15:30
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
-- Base de données : `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `url` varchar(160) NOT NULL,
  `template` varchar(160) NOT NULL,
  `titre` varchar(160) NOT NULL,
  `contenu` text NOT NULL,
  `categorie` varchar(160) NOT NULL,
  `image` varchar(160) NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `url`, `template`, `titre`, `contenu`, `categorie`, `image`, `datePublication`) VALUES
(1, 'produits', 'template-page', 'produits', 'la description de mes produits', '', 'assets/img/article1.jpg', '0000-00-00 00:00:00'),
(2, 'mentions-legales', 'template-page', 'NOUVEAU TITRE Mentions Légales', 'MODIF POUR ECRIRE DU blabla legal', '', 'assets/img/article2.jpg', '0000-00-00 00:00:00'),
(3, 'credits', 'template-page', 'LES CREDITS POUR LES CONTENUS MULTIMEDIA', 'MERCI A PEXELS.COM POUR LES PHOTOS', '', 'assets/img/article3.jpg', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
