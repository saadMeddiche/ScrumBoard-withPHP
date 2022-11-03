-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 nov. 2022 à 09:11
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scrumboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `dataofthetasks`
--

CREATE TABLE `dataofthetasks` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` int(20) NOT NULL,
  `priorety` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dataofthetasks`
--

INSERT INTO `dataofthetasks` (`id`, `title`, `type`, `priorety`, `status`, `date`, `description`) VALUES
(11, 'qsdqsdqsdsq', 1, 1, 1, '2022-11-30', ',n q,nvdqsbd,qsbdqsn'),
(12, 'kqsdqskjdnqskjndsqkj', 1, 1, 1, '2022-11-16', 'qjsbdqshbjdbjdjqs'),
(14, 'Deleniti quia consec', 1, 2, 2, '1990-11-22', 'Alias quidem qui rep'),
(15, 'Voluptatem corrupti', 2, 1, 3, '1981-06-12', 'Dolor perspiciatis '),
(18, 'kkkkkk', 1, 1, 3, '2022-11-22', 'lk'),
(27, 'Et qui accusantium c', 1, 1, 2, '2016-04-15', 'Consequatur Nobis f'),
(28, 'Sed blanditiis place', 1, 3, 3, '2002-12-06', 'Voluptatem Obcaecat'),
(29, 'Velit reprehenderit', 1, 1, 2, '2020-02-28', 'Omnis molestias sunt'),
(30, 'Cum fuga Officiis o', 2, 1, 1, '1999-12-15', 'Error harum ipsam il');

-- --------------------------------------------------------

--
-- Structure de la table `priorety`
--

CREATE TABLE `priorety` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `priorety`
--

INSERT INTO `priorety` (`id`, `name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nameT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `nameT`) VALUES
(1, 'Feature'),
(2, 'Bug');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dataofthetasks`
--
ALTER TABLE `dataofthetasks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `priorety`
--
ALTER TABLE `priorety`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dataofthetasks`
--
ALTER TABLE `dataofthetasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `priorety`
--
ALTER TABLE `priorety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
