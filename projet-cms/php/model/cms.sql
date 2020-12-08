-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 déc. 2020 à 16:07
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
(2, 'mentions-legales', 'template-sans-image', 'NOUVEAU TITRE Mentions Légales', 'MODIF POUR ECRIRE DU blabla legal', 'page', 'assets/upload/pexels-photo-1779487.jpeg', '2020-12-08 14:42:19'),
(3, 'credits', 'template-page', 'LES CREDITS POUR LES CONTENUS MULTIMEDIA', 'MERCI A PEXELS.COM POUR LES PHOTOS', '', 'assets/img/article3.jpg', '0000-00-00 00:00:00'),
(4, 'modifURL', 'template-page', 'modif TITRE', 'modif contenu', 'modif categorie', 'assets/upload/pexels-photo-196644.jpeg', '2020-12-08 11:26:46'),
(7, 'article1', 'template-page', 'titre article1', 'contenu article 1', 'blog', 'assets/upload/pexels-photo-316465.jpeg', '2020-12-08 14:27:28'),
(8, 'article2', 'template-page', 'titre article 2', 'contenu article 2', 'blog', 'assets/upload/pexels-photo-196644.jpeg', '2020-12-08 14:28:03'),
(9, 'article3', 'template-page', 'titre article 3', 'contenu article 3', 'blog', 'assets/upload/pexels-photo-57690.jpeg', '2020-12-08 14:28:37'),
(10, 'photo1', 'template-page', 'titre photo 1', 'contenu photo 1', 'galerie', 'assets/upload/pexels-photo-373543.jpeg', '2020-12-08 14:44:23'),
(11, 'photo2', 'template-page', 'titre photo 2', 'contenu photo 2', 'galerie', 'assets/upload/yellow-metal-design-decoration.jpg', '2020-12-08 14:49:26'),
(12, 'photo3', 'template-page', 'titre photo 3', 'contenu photo 3', 'galerie', 'assets/upload/pexels-photo-270637.jpeg', '2020-12-08 14:45:32'),
(13, 'photo4', 'template-page', 'titre photo 4', 'contenu photo 4', 'galerie', 'assets/upload/pexels-photo-196644.jpeg', '2020-12-08 14:50:29'),
(14, 'html5', 'template-page', 'HTML5', 'JE SUIS SUPER BALEZE EN HTML5', 'competences', 'assets/upload/pexels-photo-2317904.jpeg', '2020-12-08 14:55:44'),
(15, 'css3', 'te', 'CSS3', 'JE SUIS TRES A L\'AISE EN RESPONSIVE.', 'competences', 'assets/upload/pexels-photo-57690.jpeg', '2020-12-08 14:56:52'),
(16, 'js', 'template-page', 'JS', 'JE CREE DES ANIMATIONS DE FOLIE EN JS', 'competences', 'assets/upload/pexels-photo-270637.jpeg', '2020-12-08 14:57:36'),
(17, 'premier-boulot', 'template-page', 'PREMIER BOULOT', 'J\'AI COMMENCE COMME DEVELOPPEUR DANS TELLE BOITE...', 'experiences', 'assets/upload/pexels-photo-57690.jpeg', '2020-12-08 14:59:29'),
(19, 'index.php', 'template-page', 'Mon Accueil', 'ljdfhksfdjh', 'menu-principal', 'assets/upload/pexels-photo-270348.jpeg', '2020-12-08 15:08:27'),
(20, 'galerie.php', 'template-page', 'Galerie', 'djfskdjh', 'menu-principal', 'assets/upload/pexels-photo-1779487.jpeg', '2020-12-08 15:09:09'),
(21, 'blog.php', 'template-page', 'Blog', 'sdljkfhdqsk', 'menu-principal', 'assets/upload/pexels-photo-1779487.jpeg', '2020-12-08 15:09:49'),
(22, 'contact.php', 'template-page', 'Contactez-Moi', 'dfkhgdhqjj', 'menu-principal', 'assets/upload/pexels-photo-1779487.jpeg', '2020-12-08 15:10:33');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `motDePasse` varchar(160) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `motDePasse`, `dateCreation`) VALUES
(1, 'test1351', 'mail1351@me', '1234', '2020-12-08 13:51:38'),
(3, 'modif1415', 'modif1415@mail.me', '1415', '2020-12-08 14:15:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `page`
--
ALTER TABLE `page`
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
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
