-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 12 déc. 2022 à 23:16
-- Version du serveur : 5.7.40
-- Version de PHP : 7.2.24-0ubuntu0.18.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dutinfopw201611`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_utilisateur_suivi` bigint(20) UNSIGNED NOT NULL,
  `id_abonné` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Chapitre`
--

CREATE TABLE `Chapitre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(25) NOT NULL,
  `numeroChap` int(11) NOT NULL,
  `id_livre` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Chapitre`
--

INSERT INTO `Chapitre` (`id`, `titre`, `numeroChap`, `id_livre`) VALUES
(52, 'defaultName', 1, 100),
(53, 'default name', 2, 100),
(54, 'default name', 3, 100),
(55, 'defaultName', 1, 101),
(56, 'defaultName', 1, 102),
(57, 'defaultName', 1, 103),
(58, 'defaultName', 1, 104),
(59, 'defaultName', 1, 104),
(60, 'defaultName', 1, 104),
(61, 'defaultName', 1, 104),
(62, 'defaultName', 1, 104),
(63, 'defaultName', 1, 104),
(64, 'defaultName', 1, 105),
(65, 'defaultName', 1, 106),
(66, 'defaultName', 1, 107),
(67, 'defaultName', 1, 108),
(68, 'defaultName', 1, 104),
(69, 'defaultName', 1, 104);

-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE `Etat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Genre`
--

INSERT INTO `Genre` (`id`, `genre`) VALUES
(1, 'aucun'),
(2, 'policier'),
(3, 'historique'),
(4, 'horreur'),
(5, 'Comédie'),
(7, 'aventures'),
(8, 'philosophique'),
(9, 'Romance'),
(10, 'Science-fiction'),
(11, 'Fantastique'),
(12, 'Tragédie'),
(14, 'Conte'),
(21, 'Autobiographie');

-- --------------------------------------------------------

--
-- Structure de la table `LikedBook`
--

CREATE TABLE `LikedBook` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idLivre` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

CREATE TABLE `Livre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(50) NOT NULL,
  `resumeLivre` varchar(1000) NOT NULL,
  `nbrVue` int(11) DEFAULT '0',
  `nbrLike` int(11) DEFAULT '0',
  `IDAuteur` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`id`, `titre`, `resumeLivre`, `nbrVue`, `nbrLike`, `IDAuteur`) VALUES
(100, 'test20', '', 0, 0, 8),
(101, 'Harry Potter', 'HarryPotter 1', 1, 0, 8),
(102, 'azea', 'ze', 0, 0, 8),
(103, 'test 21', '', 0, 0, 8),
(104, '', '', 0, 0, 8),
(105, 'test img', ':/', 0, 0, 8),
(106, 'test cover  2', '', 0, 0, 8),
(107, 'test cover  3', '', 0, 0, 8),
(108, 'test cover 4 ', '', 0, 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `LivreGenre`
--

CREATE TABLE `LivreGenre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idLivre` bigint(11) UNSIGNED NOT NULL,
  `idGenre` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `LivreGenre`
--

INSERT INTO `LivreGenre` (`id`, `idLivre`, `idGenre`) VALUES
(137, 100, 1),
(138, 101, 7),
(139, 101, 11),
(140, 101, 14),
(141, 102, 1),
(142, 103, 2),
(143, 104, 1),
(144, 105, 1),
(145, 106, 1),
(146, 107, 1),
(147, 108, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Page`
--

CREATE TABLE `Page` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `numeroPage` int(11) NOT NULL,
  `TexteDeLaPage` text NOT NULL,
  `id_chapitre` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Page`
--

INSERT INTO `Page` (`ID`, `numeroPage`, `TexteDeLaPage`, `id_chapitre`) VALUES
(56, 1, 'zesqdfzdQZdQzmfGqmzoufG', 52),
(57, 1, ' ', 55),
(58, 1, ' ', 56),
(59, 1, ' ', 57),
(60, 1, ' ', 58),
(61, 2, '', 57),
(63, 3, '', 57),
(64, 1, 'azeqsdza', 58),
(65, 1, ' ', 58),
(66, 1, ' ', 58),
(67, 1, ' ', 58),
(68, 1, ' ', 58),
(69, 1, ' ', 64),
(70, 1, ' ', 65),
(71, 1, ' ', 66),
(72, 1, ' ', 67),
(73, 1, ' ', 58),
(74, 1, ' ', 58);

-- --------------------------------------------------------

--
-- Structure de la table `Suggestion`
--

CREATE TABLE `Suggestion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentaire` text NOT NULL,
  `modification` text NOT NULL,
  `nbrLike` int(11) NOT NULL DEFAULT '0',
  `etat` int(11) NOT NULL DEFAULT '0',
  `id_page` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `TempSave`
--

CREATE TABLE `TempSave` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPage` bigint(20) UNSIGNED NOT NULL,
  `numeroPage` int(11) NOT NULL,
  `TexteDeLaPage` text NOT NULL,
  `id_chapitre` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `TokenCSRF`
--

CREATE TABLE `TokenCSRF` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `expirationDate` int(11) NOT NULL,
  `Usable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `TokenCSRF`
--

INSERT INTO `TokenCSRF` (`id`, `token`, `idUser`, `expirationDate`, `Usable`) VALUES
(1, '632a2ce33cd196155fc956764d596485b92a27c121031602ef7ab53865bcedd6', 8, 1670784220, 0),
(2, '445c88aaa5fbce72acb04add8fa30dad99d1d4bb2f189626b438bf1e26689912', 8, 1670793060, 1),
(3, 'ef265238d4f1dc9c537f3e8bd74e56b951f6c0ea4e94b8c01f4eef0e2174409d', 8, 1670793478, 0),
(4, '5f10ea4c93376c1e1290e4715bc9f7fab604c70c210f15dc99c0249c17969ad8', 8, 1670793511, 0),
(5, '65e3e786f76a5857bc6a9b11a7176362cda955e877adbe9517d7c67b02aa81d4', 8, 1670793533, 0),
(6, 'a99dcddbafdf297d0a99f8ef612dc87702741a86ac8804ed1aa76e7fce4dafbb', 8, 1670793571, 1),
(7, '5d9a0076d8dc564f77f136375b085c73c5af6327b754b59d9f8ccc689d35828c', 8, 1670793607, 1),
(8, '579dd185e699c0925782f326347f38a837845c9e438526a52d5b65cac04cc793', 8, 1670793610, 1),
(9, '2247c40712d027d0973fd6ae50498e0eb7a1d2b40006ba4eb756418129a5a0f3', 8, 1670793685, 1),
(10, '825e083d8992f7d06457191149c71fbedc4526fdd15a771351b8fb2286a080e4', 8, 1670793687, 1),
(11, '157dab0375ecbd014e0c94e1704eebe6b5513ca5b133f17578953284a2702fdf', 8, 1670845430, 1),
(12, '18e9ff178498528a6cb2bbf0ac38bb46fbc6bd28a16879f9f92d1080726adbf1', 8, 1670851340, 1),
(13, '9d591fecac0979fcfbf1017858be06e747e70378d285621b7069c1364ca438d3', 8, 1670851367, 1),
(14, '74190a2107b730fed94fd56bb683c8b0146ca747a364e1d68a5829b1da18db29', 8, 1670851371, 1),
(15, 'd9f8508ab2926282cbdbde4025dbffe0d4c2b6361208552f6f0b41bf20aee3c1', 8, 1670851373, 1),
(16, 'c989b53de8189b7073eef4f48679a589cdd182372bc2fdbd4b7cada953fc2691', 8, 1670851452, 1),
(17, '32b4e1eca6fcd232d51a63eb680fce692a19ad1f47ed3ef9d740f33d138adb78', 8, 1670851458, 0)


-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(50) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `userName`, `passWord`, `email`) VALUES
(2, 'bgdu93', '$2y$10$D1TWv350NPE4PR.ZqzURiequD4nZKFruyZpVh7AiIAfLGoJvimWDy', 'gigachad@gpasdearobase.com'),
(5, 'u1', '$2y$10$EO95FEgkW8kR6wMOsnzf0.uQobAPdE3B8BQEJq8yFdBX67bhBqx6y', 'aze@qsd.com'),
(8, 'bpelletier', '$2y$10$ufVTwaFfBVJA2RVcTjRNlus.JxSsAsJPa2lpNoQ2g3yBP30xxNGsi', 'bpelletier@gmail.com'),
(9, 'armand', '$2y$10$RMRejS6FiLr25s3aCL6Q1.Xi0qsO7VuvpQuaGLoqS0U2D6xpcyiMC', 'armand@iut.fr'),
(10, 'mdpoublié', '$2y$10$WgwQ6t6KWa0n34fXsuTvhO.45aegk7gvy9pvBAljPTiiWkiA/cdPi', 'mdp@oublié.com');

-- --------------------------------------------------------

--
-- Structure de la table `ViewedBook`
--

CREATE TABLE `ViewedBook` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idLivre` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `date_heure_lecture` datetime DEFAULT NULL,
  `dernier_chapitre_lu` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ViewedBook`
--

INSERT INTO `ViewedBook` (`id`, `idLivre`, `idUser`, `date_heure_lecture`, `dernier_chapitre_lu`) VALUES
(1, 100, 8, '2022-12-12 20:54:09', 1),
(2, 101, 8, '2022-12-12 20:53:58', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_abonné` (`id_abonné`),
  ADD KEY `id_utilisateur_suivi` (`id_utilisateur_suivi`);

--
-- Index pour la table `Chapitre`
--
ALTER TABLE `Chapitre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`),
  ADD KEY `Chapitre_ibfk_1` (`id_livre`);

--
-- Index pour la table `Etat`
--
ALTER TABLE `Etat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `etat` (`etat`);

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `LikedBook`
--
ALTER TABLE `LikedBook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idLivre` (`idLivre`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `titre` (`titre`),
  ADD KEY `Auteur` (`IDAuteur`);

--
-- Index pour la table `LivreGenre`
--
ALTER TABLE `LivreGenre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `LivreGenre_ibfk_1` (`idLivre`),
  ADD KEY `LivreGenre_ibfk_2` (`idGenre`);

--
-- Index pour la table `Page`
--
ALTER TABLE `Page`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `id_chapitre` (`id_chapitre`);

--
-- Index pour la table `Suggestion`
--
ALTER TABLE `Suggestion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `appliquer` (`id_page`);

--
-- Index pour la table `TempSave`
--
ALTER TABLE `TempSave`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idPage` (`idPage`),
  ADD KEY `id_chapitre` (`id_chapitre`);

--
-- Index pour la table `TokenCSRF`
--
ALTER TABLE `TokenCSRF`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `ViewedBook`
--
ALTER TABLE `ViewedBook`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idLivre` (`idLivre`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Chapitre`
--
ALTER TABLE `Chapitre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `Etat`
--
ALTER TABLE `Etat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `LikedBook`
--
ALTER TABLE `LikedBook`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `LivreGenre`
--
ALTER TABLE `LivreGenre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `Page`
--
ALTER TABLE `Page`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `Suggestion`
--
ALTER TABLE `Suggestion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TempSave`
--
ALTER TABLE `TempSave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `TokenCSRF`
--
ALTER TABLE `TokenCSRF`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ViewedBook`
--
ALTER TABLE `ViewedBook`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_ibfk_1` FOREIGN KEY (`id_abonné`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abonnement_ibfk_2` FOREIGN KEY (`id_utilisateur_suivi`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Chapitre`
--
ALTER TABLE `Chapitre`
  ADD CONSTRAINT `Chapitre_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `LikedBook`
--
ALTER TABLE `LikedBook`
  ADD CONSTRAINT `LikedBook_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `Livre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LikedBook_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD CONSTRAINT `Livre_ibfk_1` FOREIGN KEY (`IDAuteur`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `LivreGenre`
--
ALTER TABLE `LivreGenre`
  ADD CONSTRAINT `LivreGenre_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `Livre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `LivreGenre_ibfk_2` FOREIGN KEY (`idGenre`) REFERENCES `Genre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Page`
--
ALTER TABLE `Page`
  ADD CONSTRAINT `Page_ibfk_1` FOREIGN KEY (`id_chapitre`) REFERENCES `Chapitre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Suggestion`
--
ALTER TABLE `Suggestion`
  ADD CONSTRAINT `appliquer` FOREIGN KEY (`id_page`) REFERENCES `Page` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `propose` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `TempSave`
--
ALTER TABLE `TempSave`
  ADD CONSTRAINT `TempSave_ibfk_1` FOREIGN KEY (`idPage`) REFERENCES `Page` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TempSave_ibfk_2` FOREIGN KEY (`id_chapitre`) REFERENCES `Chapitre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ViewedBook`
--
ALTER TABLE `ViewedBook`
  ADD CONSTRAINT `ViewedBook_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `Livre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ViewedBook_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
