-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 avr. 2023 à 13:55
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `harmonie`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`) VALUES
(1, 'El Mehdi', 'EL AINE', 'admin@admin.com', 'dzad', '9aecc87bae97f8e70bdfe92cf72be916'),
(7, 'Philippe ', 'plaia', 'philippe@admin.com', '0607898744', '9aecc87bae97f8e70bdfe92cf72be916');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `idEvent` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `statut` enum('En cours','Passé','Annulé') DEFAULT 'En cours',
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`idEvent`, `titre`, `description`, `date`, `statut`, `idAdmin`) VALUES
(19, 'dzad', 'dzd', '2023-03-03 13:03:00', 'En cours', 1);

-- --------------------------------------------------------

--
-- Structure de la table `memberspassword`
--

CREATE TABLE `memberspassword` (
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `memberspassword`
--

INSERT INTO `memberspassword` (`password`) VALUES
('9aecc87bae97f8e70bdfe92cf72be916'),
('9aecc87bae97f8e70bdfe92cf72be916');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `idUser` int(11) DEFAULT NULL,
  `idEvent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`idUser`, `idEvent`) VALUES
(1, 1),
(4, 8),
(4, 14),
(7, 8),
(7, 14),
(79, 19),
(80, 19),
(82, 19),
(83, 19),
(84, 19),
(85, 19),
(86, 19),
(87, 19),
(91, 19),
(92, 19);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `pupitre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `firstName`, `lastName`, `email`, `phoneNumber`, `role`, `pupitre`) VALUES
(79, 'Julie', 'Lefebvre', 'julie.lefebvre@example.com', '5141234567', 'membre', 'dad'),
(80, 'Pierre', 'Dupont', 'pierre.dupont@example.com', '4381234567', 'membre', 'da'),
(81, 'Sophie', 'Gagné', 'sophie.gagne@example.com', '4501234567', 'membre', 'da'),
(82, 'Antoine', 'Bergeron', 'antoine.bergeron@example.com', '4181234567', 'membre', 'dad'),
(83, 'Amélie', 'Fortin', 'amelie.fortin@example.com', '8191234567', 'membre', 'da'),
(84, 'Maxime', 'Roy', 'maxime.roy@example.com', '5149876543', 'membre', 'dazd'),
(85, 'Gabrielle', 'Dubeau', 'gabrielle.dubeau@example.com', '4386543210', 'membre', 'dzd'),
(86, 'Vincent', 'Larouche', 'vincent.larouche@example.com', '4503219876', 'membre', 'daz'),
(93, 'azdad', 'zdad', '', '', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idEvent`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD UNIQUE KEY `UQ_UserId_EventId` (`idUser`,`idEvent`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
