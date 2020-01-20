-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 03 jan. 2020 à 16:58
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `salon_toilettage`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `id_rendez_vous` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id_rendez_vous` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `id_soin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_rendez_vous`, `date_rdv`, `id_soin`, `id_user`) VALUES
(1, '2020-01-03', 1, 1),
(2, '2020-01-03', 1, 1),
(3, '2020-01-03', 1, 1),
(4, '2020-01-03', 1, 1),
(5, '2020-01-03', 1, 1),
(6, '2020-01-03', 1, 1),
(7, '2020-01-03', 1, 1),
(8, '2020-01-03', 1, 1),
(9, '2020-01-03', 1, 1),
(10, '2020-01-03', 1, 1),
(11, '2020-01-03', 1, 1),
(12, '2020-01-03', 1, 1),
(13, '2020-01-03', 1, 1),
(14, '2020-01-03', 1, 1),
(15, '2020-01-03', 1, 1),
(16, '2020-01-03', 1, 1),
(17, '2020-01-03', 1, 1),
(18, '2020-01-03', 1, 1),
(19, '2020-01-03', 1, 1),
(20, '2020-01-03', 1, 1),
(21, '2020-01-03', 1, 1),
(22, '2020-01-03', 1, 1),
(23, '2020-01-03', 1, 1),
(24, '2020-01-03', 1, 1),
(25, '2020-01-04', 1, 1),
(26, '2020-01-03', 1, 1),
(27, '2020-01-03', 1, 1),
(28, '2020-01-03', 1, 1),
(29, '2020-02-04', 1, 1),
(43, '2019-12-30', 1, 1),
(47, '2020-01-03', 2, 8),
(48, '2020-01-03', 2, 8),
(49, '2020-01-03', 2, 8),
(50, '2020-01-03', 5, 8),
(51, '2019-12-31', 2, 8),
(52, '2020-01-08', 3, 9),
(53, '2020-01-29', 3, 9),
(54, '2019-12-30', 3, 9),
(55, '2020-01-07', 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `soin`
--

CREATE TABLE `soin` (
  `id_soin` int(11) NOT NULL,
  `category` enum('toilettage simple chat','toilettage simple chien','toilettage complet chat','toilettage complet chien','forfait griffe','') NOT NULL,
  `description` text NOT NULL,
  `temps` time NOT NULL,
  `prix` float NOT NULL,
  `picture` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `soin`
--

INSERT INTO `soin` (`id_soin`, `category`, `description`, `temps`, `prix`, `picture`) VALUES
(1, 'toilettage simple chat', 'Un soin pour le poil séchage ', '00:45:00', 25, 'chat2.jpg'),
(2, 'toilettage simple chien', 'Un soin pour le poil séchage ', '01:00:00', 35, 'chien3.jpg'),
(3, 'toilettage complet chat', 'Toilettage, soin pour le poil, séchage et coupe du poil et des griffes', '01:15:00', 45, 'chat3.jpg'),
(4, 'toilettage complet chien', 'Toilettage, soin pour le poil, séchage et coupe du poil et des griffes', '01:30:00', 55, 'chien.jpg'),
(5, 'forfait griffe', 'Coupe des griffes pour chat et chien', '00:15:00', 15, 'ciseaux.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `animal` enum('chat','chien','','') NOT NULL,
  `nom_animal` varchar(45) NOT NULL,
  `age_animal` enum('chiot/chatton','adulte','senior','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `telephone`, `mail`, `password`, `animal`, `nom_animal`, `age_animal`) VALUES
(1, '', '', 'audrey@audrey.fr', 'Audrey_85', 'chat', '', ''),
(2, 'audrey', '0652452321', 'audrey@audrey.com', 'mimine18', 'chat', 'mimine', ''),
(3, 'lenoir', '0605050502', 'audrey@audrey.com', 'mimine18', 'chat', 'mimine', ''),
(4, 'lenoir', '0605050502', 'audrey@audrey.com', 'mimine18', 'chat', 'mimine', ''),
(5, 'lenoir', '0605050502', 'audrey@audrey.com', 'mimine18', 'chat', 'mimine', ''),
(6, 'celia', '0605040102', 'celia@celia.fr', 'Wadi12', 'chat', 'wadi', ''),
(8, 'Lamy', '0654535355', 'nicolas@nicolas', '$2y$10$CStPe6GFAI9ib/o.OHXmOOzLxWJssP6uC4eZgjop0ZuLT5Zo3BIr6', 'chat', '', ''),
(9, 'lenoir', '0604040506', 'lenoir@lenoir.fr', '$2y$10$pLjhyDsgFdNy3DiI1ToLTOZ8pT1Z5ZtdRFrc1c9/ReQjCollJrtdK', 'chat', 'mimine', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_rendez_vous` (`id_rendez_vous`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id_rendez_vous`),
  ADD KEY `id_soin` (`id_soin`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `soin`
--
ALTER TABLE `soin`
  ADD PRIMARY KEY (`id_soin`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id_rendez_vous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `soin`
--
ALTER TABLE `soin`
  MODIFY `id_soin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `id_rendez_vous` FOREIGN KEY (`id_rendez_vous`) REFERENCES `rendez_vous` (`id_rendez_vous`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `id_soin` FOREIGN KEY (`id_soin`) REFERENCES `soin` (`id_soin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
