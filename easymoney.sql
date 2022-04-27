-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 avr. 2022 à 15:52
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `easymoney`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(50) NOT NULL,
  `detail_equipe` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`, `detail_equipe`) VALUES
(1, 'Meets', 'New York'),
(2, 'Giants', 'San Francisco'),
(3, 'Dodgers', 'Los Angeles'),
(4, 'Blues Jays', 'Toronto'),
(5, 'Angels', 'Los Angeles'),
(6, 'Brewers', 'Milwaukee'),
(7, 'Yankees', 'New York'),
(8, 'Padres', 'San Diego'),
(9, 'Mariners', 'Seattle'),
(10, 'Rockies', 'Colorado'),
(11, 'Twins', 'Minesota'),
(12, 'Athletics', 'Oakland'),
(13, 'Cardinals', 'St Louis'),
(14, 'Rays', 'Tampa Bay'),
(15, 'Braves', 'Atlanta'),
(16, 'Astros', 'Houston'),
(17, 'Marlins', 'Miami'),
(18, 'Phillies', 'Philadelphie'),
(19, 'Pirates', 'Pittsburgh'),
(20, 'Diamondbacks', 'Arizona');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `nom_game` varchar(150) NOT NULL,
  `date_game` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id_game`, `nom_game`, `date_game`) VALUES
(1, 'Meets vs Mariners', '2022-04-01'),
(2, 'Giants vs Astros', '2022-04-03'),
(3, 'Dodgers vs Cardinals', '2022-04-05'),
(4, 'Blues Jays vs Brewers', '2022-04-06'),
(5, 'Angels vs Rockies', '2022-04-08'),
(6, 'Brewers vs Giants', '2022-04-09'),
(7, 'Yankees vs Diamondbacks', '2022-04-10'),
(8, 'Padres vs Yankees', '2022-04-11'),
(9, 'Mariners vs Pirates', '2022-04-12'),
(10, 'Rockies vs Angels', '2022-04-14'),
(11, 'Twins vs Rays', '2022-04-15'),
(12, 'Athletics vs Padres', '2022-04-18'),
(13, 'Cardinals vs Twins', '2022-04-19'),
(14, 'Rays vs Marlins', '2022-04-20'),
(15, 'Brewers vs Phillies', '2022-04-24'),
(16, 'Astros vs Dodgers', '2022-04-25'),
(17, 'Marlins vs Blues Jays', '2022-04-27'),
(18, 'Phillies vs Meets', '2022-04-28'),
(19, 'Pirates vs Meets', '2022-04-30'),
(20, 'Diamondbacks vs Athletics', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_equipe` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `point_equipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`id_equipe`, `id_game`, `point_equipe`) VALUES
(4, 17, 2),
(5, 5, 4),
(11, 13, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `prenom`, `nom`, `mot_de_passe`, `email`) VALUES
(1, 'Ace', 'David', 'Esteban', 'desteban', 'aceteban31@gmail.com'),
(2, 'TigreTamoul', 'Gokool', 'Lavasan', 'glavasan', 'sangokool@gmail.com'),
(3, 'MiteMega', 'Jordan', 'Morin', 'jmorin', 'mitemega@gmail.com'),
(4, 'Kheandee', 'Valentin', 'Dietrich', 'vdietrich', 'kheandee@gmail.com'),
(5, 'KimK', 'Adeline', 'Mendouga', 'amendouga', 'realkim@gmail.com'),
(6, 'JojoFront', 'Johan', 'Valero', 'jvalero', 'jojofront@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_equipe`,`id_game`),
  ADD KEY `id_game` (`id_game`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
