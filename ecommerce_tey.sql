-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 août 2023 à 03:42
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `4335216_teyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE `commander` (
  `id` int(11) NOT NULL,
  `Images` text DEFAULT NULL,
  `Quantite` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Dates` date NOT NULL,
  `Id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `statut` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commander`
--

INSERT INTO `commander` (`id`, `Images`, `Quantite`, `Prix`, `Dates`, `Id_user`, `id_prod`, `statut`) VALUES
(24, 'White_pink.jpg', 1, 23, '2023-04-13', 21, 8, 'Done'),
(25, 'Tey1.jpg', 1, 120, '2023-04-13', 21, 7, 'Done'),
(31, 'love.jpg', 1, 100, '2023-04-13', 21, 5, 'Pending'),
(32, 'Tey1.jpg', 1, 120, '2023-04-13', 22, 7, 'Pending');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `Id_prod` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prix` float NOT NULL,
  `Description` text NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Dates` datetime NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`Id_prod`, `Nom`, `Prix`, `Description`, `Quantite`, `Dates`, `Image`) VALUES
(2, 'Rouge', 50, 'Tres belle robe', 2, '2023-04-13 18:00:11', 'rouge.jpg'),
(3, 'Pink', 40.4, 'C\'est waw', 1, '2023-04-13 18:01:29', 'pink.jpg'),
(4, 'Black', 40.5, 'La plus ravisante', 3, '2023-04-13 19:01:35', 'black.jpg'),
(5, 'Love', 100, 'l\'amour est belle', 3, '2023-04-13 19:03:49', 'love.jpg'),
(6, 'White_Girl', 90, 'Jolie chirt', 7, '2023-04-13 19:03:49', 'white.jpg'),
(7, 'Teyou', 120, 'Tres splandide', 2, '2023-04-13 19:06:20', 'Tey1.jpg'),
(8, 'White_pink', 23, 'Cette robe rose donne des frissons', 2, '2023-04-13 19:06:20', 'White_pink.jpg'),
(9, 'Robe back', 110, 'Le commentaire d\'Hatsh est très complet alors je n\'ai pas grand chose à ajouter.', 4, '2023-04-14 05:01:52', 'Robe_back.jpg'),
(14, 'Mayo', 120, 'Tres jolie', 2, '1970-01-01 01:00:00', 'Madjina1jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id_user` int(10) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Mode_passe` varchar(255) NOT NULL,
  `Etat` char(10) NOT NULL,
  `Commune` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id_user`, `Nom`, `Prenom`, `Email`, `Mode_passe`, `Etat`, `Commune`) VALUES
(20, 'Sagesse', 'Sterline', 'sterlinesagesse@gmail.com', 'Teyou', 'Admin', NULL),
(21, 'Bonptemp', 'Ruthdjina', 'abduelruth@gmail.com', '123456', 'User', 'Delmas'),
(22, 'Jameson', 'Innocent', 'jameson@gmail.com', 'Jameson', 'User', 'Lalue');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`Id_user`),
  ADD KEY `fk_idprod` (`id_prod`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`Id_prod`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `commander`
--
ALTER TABLE `commander`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `Id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `fk_idprod` FOREIGN KEY (`id_prod`) REFERENCES `produits` (`Id_prod`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`Id_user`) REFERENCES `utilisateurs` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
