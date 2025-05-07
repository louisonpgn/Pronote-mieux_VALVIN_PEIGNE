-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 23 avr. 2025 à 17:32
-- Version du serveur :  10.3.39-MariaDB-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3-4ubuntu2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evalvin`
--

-- --------------------------------------------------------

--
-- Structure de la table `Notes`
--

CREATE TABLE `Notes` (
  `id` int(11) NOT NULL,
  `Prenom` text NOT NULL,
  `Nom` text NOT NULL,
  `Matiere` text NOT NULL,
  `Notes` int(11) NOT NULL,
  `Groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Notes`
--

INSERT INTO `Notes` (`id`, `Prenom`, `Nom`, `Matiere`, `Notes`, `Groupe`) VALUES
(1, 'Frédéric', 'Placin', 'Sciences fondamentales', 16, 2),
(2, 'Frédéric', 'Placin', 'Ingénierie Cognitique', 11, 2),
(3, 'Frédéric', 'Placin', 'Culture Ingénieur et Langue', 8, 2),
(4, 'Noémie', 'Chaniaud', 'Sciences fondamentales', 16, 1),
(5, 'Noémie', 'Chaniaud', 'Ingénierie Cognitique', 16, 1),
(6, 'Noémie', 'Chaniaud', 'Culture Ingénieur et Langue', 16, 1),
(7, 'Jean', 'Peuplu', 'Sciences Fondamentales', 4, 2),
(8, 'Jean', 'Peuplu', 'Ingénierie Cognitique', 2, 2),
(9, 'Jean', 'Peuplu', 'Culture Ingénieur et Langue', 6, 2),
(10, 'Justin', 'Ptipeu', 'Sciences Fondamentales', 9, 3),
(11, 'Justin', 'Ptipeu', 'Ingénierie Cognitique', 8, 3),
(12, 'Justin', 'Ptipeu', 'Culture Ingénieur et Langue', 10, 3),
(13, 'Alain', 'Verse', 'Sciences Fondamentales', 18, 3),
(14, 'Alain', 'Verse', 'Ingénierie Cognitique', 17, 3),
(15, 'Alain', 'Verse', 'Culture Ingénieur et Langue', 18, 3),
(16, 'Eddy', 'Donçavapaslatête', 'Sciences Fondamentales', 15, 1),
(17, 'Eddy', 'Donçavapaslatête', 'Ingénierie Cognitique', 7, 1),
(18, 'Eddy', 'Donçavapaslatête', 'Culture Ingénieur et Langue', 4, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
