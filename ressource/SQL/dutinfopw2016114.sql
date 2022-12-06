-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 06 déc. 2022 à 14:08
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
(1, 'le comencement ', 1, 1),
(2, 'les problemes ;<', 2, 1),
(3, '24 décembre au soir', 1, 12),
(33, 'defaultName', 1, 85),
(36, 'defaultName', 1, 89),
(37, 'defaultName', 1, 90);

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
(6, 'Drame');

-- --------------------------------------------------------

--
-- Structure de la table `LikedBook`
--

CREATE TABLE `LikedBook` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idLivre` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `LikedBook`
--

INSERT INTO `LikedBook` (`id`, `idLivre`, `idUser`) VALUES
(32, 51, 10),
(61, 1, 8),
(69, 4, 8),
(70, 51, 8),
(71, 2, 10),
(72, 41, 8),
(73, 12, 8);

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
(1, 'L\'histoire incroyable de notre site internet2', 'Résume du site c\'est b1', 3, 3, 8),
(2, 'yes', 'oui', 2, 2, 8),
(3, 'zaoud', 'qzfq', 2, 0, 8),
(4, 'c\'est le 4 em livre ', 'et oui deja ', 2, 1, 8),
(12, 'Christmas gift', 'Anya ouvre son cadeau de noël !', 7, 4, 8),
(41, 'said :>', 'c\'est said', 0, 1, 8),
(51, 'L\'incroyable bibliothèque du web', 'Index des plus grand livre de l\'histoire de l\'humanite. Parcouré les différentes époques à la recherche de nouvel aventure !', 1, 3, 8),
(85, 'pas test 1', '', 1, 0, 8),
(89, 'test 9 ', '', 0, 0, 8),
(90, 'test 10', '', 0, 0, 8);

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
(14, 41, 1),
(48, 1, 2),
(49, 1, 2),
(50, 2, 4),
(51, 3, 5),
(52, 4, 6),
(53, 12, 3),
(62, 51, 3),
(104, 85, 1),
(107, 89, 1),
(108, 90, 1);

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
(1, 1, 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 1),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed adipiscing diam donec adipiscing tristique. Non odio euismod lacinia at quis risus sed vulputate. Et leo duis ut diam quam nulla. Suspendisse interdum consectetur libero id faucibus nisl tincidunt. Id neque aliquam vestibulum morbi. In cursus turpis massa tincidunt dui ut ornare lectus.<br> Diam donec adipiscing tristique risus nec feugiat in fermentum posuere. Nibh venenatis cras sed felis eget velit aliquet sagittis. Neque viverra justo nec ultrices dui sapien eget. Tempus imperdiet nulla malesuada pellentesque elit eget gravida cum. Mollis aliquam ut porttitor leo a. Euismod nisi porta lorem mollis aliquam ut porttitor leo a. Nec sagittis aliquam malesuada bibendum. Convallis a cras semper auctor. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. In dictum non consectetur a erat nam at. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Amet consectetur adipiscing elit ut aliquam purus sit amet. Proin fermentum leo vel orci porta non.<br>\n\nLeo urna molestie at elementum eu facilisis sed odio morbi. Viverra suspendisse potenti nullam ac tortor vitae. Aliquam sem et tortor consequat id porta nibh. Amet venenatis urna cursus eget nunc. Urna molestie at elementum eu facilisis sed odio morbi quis. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Aenean euismod elementum nisi quis eleifend quam. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. Scelerisque purus semper eget duis at tellus at. In ornare quam viverra orci sagittis eu volutpat. Netus et malesuada fames ac turpis egestas integer. Quam id leo in vitae turpis massa sed elementum. Elementum curabitur vitae nunc sed velit dignissim sodales ut. Lectus quam id leo in vitae turpis. Nec tincidunt praesent semper feugiat nibh sed. Diam vel quam elementum pulvinar etiam non quam lacus suspendisse. Non nisi est sit amet. des trucq', 1),
(3, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam quisque id diam vel quam. Nec tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Vulputate sapien nec sagittis aliquam malesuada. Morbi tristique senectus et netus et malesuada fames ac turpis. Integer quis auctor elit sed vulputate mi sit amet. Nulla porttitor massa id neque aliquam vestibulum morbi blandit cursus. Neque sodales ut etiam sit amet nisl purus. Ornare lectus sit amet est placerat in. Id semper risus in hendrerit gravida rutrum. Consectetur purus ut faucibus pulvinar elementum integer enim neque. Elit eget gravida cum sociis. Vitae sapien pellentesque habitant morbi tristique senectus et netus. Euismod lacinia at quis risus sed vulputate odio ut enim. Malesuada pellentesque elit eget gravida. Lectus nulla at volutpat diam ut venenatis tellus. Pharetra et ultrices neque ornare aenean euismod elementum nisi. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. Urna duis convallis convallis tellus id interdum velit laoreet id.\r\n\r\nDuis at tellus at urna condimentum mattis pellentesque. Eu volutpat odio facilisis mauris sit amet massa vitae tortor. Id porta nibh venenatis cras sed felis eget. Neque vitae tempus quam pellentesque nec nam. Sed felis eget velit aliquet sagittis id consectetur purus. Condimentum id venenatis a condimentum vitae. Sit amet consectetur adipiscing elit pellentesque habitant morbi tristique. Nisl purus in mollis nunc sed. Consequat mauris nunc congue nisi. Volutpat maecenas volutpat blandit aliquam etiam erat.\r\n\r\nFacilisi morbi tempus iaculis urna id volutpat. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Lacus laoreet non curabitur gravida. Ut enim blandit volutpat maecenas volutpat blandit. Vel facilisis volutpat est velit. Malesuada pellentesque elit eget gravida cum. Nunc eget lorem dolor sed viverra ipsum nunc. Feugiat pretium nibh ipsum consequat nisl vel. Ut aliquam purus sit amet luctus venenatis. Tincidunt eget nullam non nisi est sit amet facilisis. Nunc pulvinar sapien et ligula. Sagittis id consectetur purus ut faucibus pulvinar. Mi tempus imperdiet nulla malesuada pellentesque elit. Neque egestas congue quisque egestas diam in arcu cursus euismod. Et pharetra pharetra massa massa ultricies mi. Mi bibendum neque egestas congue quisque. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed velit. Pulvinar sapien et ligula ullamcorper malesuada proin. Commodo ullamcorper a lacus vestibulum sed arcu. Feugiat in fermentum posuere urna nec.\r\n\r\nSapien pellentesque habitant morbi tristique senectus et. Ullamcorper dignissim cras tincidunt lobortis feugiat. Sed risus pretium quam vulputate dignissim suspendisse in est. Dignissim sodales ut eu sem integer vitae justo eget magna. Montes nascetur ridiculus mus mauris vitae. In eu mi bibendum neque egestas congue quisque egestas. Sit amet nisl suscipit adipiscing bibendum. Egestas diam in arcu cursus. Senectus et netus et malesuada fames. Amet porttitor eget dolor morbi non arcu risus. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu.\r\n\r\nEuismod in pellentesque massa placerat duis ultricies. Elit scelerisque mauris pellentesque pulvinar pellentesque. Aenean pharetra magna ac placerat. Tortor posuere ac ut consequat semper viverra. Sit amet est placerat in egestas erat. Proin libero nunc consequat interdum varius sit amet. At tellus at urna condimentum mattis pellentesque id. Dolor purus non enim praesent elementum facilisis. Id nibh tortor id aliquet lectus proin nibh nisl condimentum. Ultrices gravida dictum fusce ut placerat orci. Iaculis urna id volutpat lacus laoreet non curabitur.\r\n\r\nOrci eu lobortis elementum nibh tellus molestie nunc non. At auctor urna nunc id cursus. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique. Libero enim sed faucibus turpis in eu mi bibendum neque. Vestibulum lorem sed risus ultricies. Libero id faucibus nisl tincidunt eget nullam non nisi est. A diam sollicitudin tempor id. Eget nunc lobortis mattis aliquam faucibus purus in massa tempor. Feugiat pretium nibh ipsum consequat nisl vel pretium. Purus faucibus ornare suspendisse sed nisi lacus. Commodo ullamcorper a lacus vestibulum sed arcu non. Id donec ultrices tincidunt arcu non sodales neque. Augue lacus viverra vitae congue eu consequat ac. A pellentesque sit amet porttitor. Sit amet venenatis urna cursus eget nunc scelerisque viverra mauris. Nascetur ridiculus mus mauris vitae ultricies.\r\n\r\nFermentum odio eu feugiat pretium nibh. Orci nulla pellentesque dignissim enim sit amet venenatis. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Odio euismod lacinia at quis risus sed vulputate odio ut. Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Vivamus arcu felis bibendum ut tristique et. Tellus integer feugiat scelerisque varius morbi. Mattis enim ut tellus elementum sagittis vitae. Gravida rutrum quisque non tellus orci ac auctor augue. Eget magna fermentum iaculis eu non diam phasellus. Eget nunc lobortis mattis aliquam faucibus purus. Purus viverra accumsan in nisl nisi scelerisque eu. Fringilla urna porttitor rhoncus dolor. Convallis convallis tellus id interdum.\r\n\r\nFelis eget velit aliquet sagittis id. Senectus et netus et malesuada fames ac turpis. Scelerisque viverra mauris in aliquam sem fringilla. Ut enim blandit volutpat maecenas volutpat. Proin nibh nisl condimentum id venenatis. Posuere morbi leo urna molestie at. Urna duis convallis convallis tellus id interdum velit laoreet. Non diam phasellus vestibulum lorem sed risus ultricies tristique. Pulvinar elementum integer enim neque volutpat ac tincidunt vitae. Id cursus metus aliquam eleifend. Ac turpis egestas sed tempus urna et pharetra. Vivamus at augue eget arcu dictum. Eu ultrices vitae auctor eu. Purus ut faucibus pulvinar elementum integer. Eleifend donec pretium vulputate sapien. Duis convallis convallis tellus id interdum. Orci eu lobortis elementum nibh tellus. Purus semper eget duis at tellus at urna condimentum. Id eu nisl nunc mi ipsum faucibus.\r\n\r\nArcu cursus vitae congue mauris rhoncus aenean. Est velit egestas dui id ornare arcu odio ut sem. At quis risus sed vulputate odio ut enim blandit volutpat. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Lectus mauris ultrices eros in. Rutrum quisque non tellus orci ac auctor augue mauris. Tellus in metus vulputate eu. Elit pellentesque habitant morbi tristique. Et malesuada fames ac turpis egestas sed. Ut porttitor leo a diam. Sit amet aliquam id diam maecenas ultricies mi. Nunc sed blandit libero volutpat sed cras ornare arcu. Tortor condimentum lacinia quis vel eros donec ac. Eget arcu dictum varius duis at consectetur lorem. Non consectetur a erat nam at lectus urna duis convallis.\r\n\r\nIn mollis nunc sed id semper risus. Ut eu sem integer vitae justo eget magna fermentum iaculis. Justo nec ultrices dui sapien eget mi proin sed. At risus viverra adipiscing at. Gravida cum sociis natoque penatibus et magnis dis parturient montes. Gravida rutrum quisque non tellus orci ac auctor augue. Aliquet porttitor lacus luctus accumsan. Dignissim sodales ut eu sem integer vitae. Turpis egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Sit amet consectetur adipiscing elit duis tristique. Libero volutpat sed cras ornare arcu dui vivamus arcu. Pellentesque elit eget gravida cum. Netus et malesuada fames ac. In nibh mauris cursus mattis. Pharetra diam sit amet nisl suscipit adipiscing bibendum.\r\n\r\nViverra orci sagittis eu volutpat odio facilisis mauris sit. Elementum facilisis leo vel fringilla. Eu sem integer vitae justo eget magna fermentum iaculis. Pharetra magna ac placerat vestibulum lectus. Justo nec ultrices dui sapien eget. Sit amet mauris commodo quis. Feugiat in ante metus dictum at tempor commodo ullamcorper a. Aliquet risus feugiat in ante metus dictum. Eu sem integer vitae justo. Dictum varius duis at consectetur lorem. Amet luctus venenatis lectus magna fringilla urna porttitor. Et odio pellentesque diam volutpat. Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Dolor purus non enim praesent elementum facilisis leo. Odio ut enim blandit volutpat maecenas volutpat blandit. Scelerisque eleifend donec pretium vulputate sapien nec. Risus quis varius quam quisque id. Eget nunc lobortis mattis aliquam faucibus.\r\n\r\nUltrices gravida dictum fusce ut placerat orci nulla pellentesque. Praesent elementum facilisis leo vel fringilla est. Ullamcorper sit amet risus nullam eget. Massa placerat duis ultricies lacus. Varius quam quisque id diam vel. Malesuada fames ac turpis egestas sed. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Phasellus vestibulum lorem sed risus ultricies. Est placerat in egestas erat imperdiet. Sem et tortor consequat id porta nibh. Placerat in egestas erat imperdiet sed. Mi bibendum neque egestas congue quisque egestas diam in arcu. Massa ultricies mi quis hendrerit dolor magna. Mattis molestie a iaculis at erat. Sit amet porttitor eget dolor morbi. Id donec ultrices tincidunt arcu non. Eleifend donec pretium vulputate sapien nec. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor.\r\n\r\nNibh tellus molestie nunc non blandit massa enim nec dui. Malesuada nunc vel risus commodo viverra maecenas accumsan. Vitae auctor eu augue ut lectus arcu. Justo eget magna fermentum iaculis eu. Nec nam aliquam sem et tortor consequat. Urna neque viverra justo nec. Consectetur a erat nam at lectus urna duis convallis convallis. Quisque non tellus orci ac auctor. Ut eu sem integer vitae justo eget magna fermentum iaculis. Curabitur gravida arcu ac tortor dignissim convallis. Odio ut enim blandit volutpat maecenas volutpat blandit. Non odio euismod lacinia at quis. Vitae suscipit tellus mauris a. Nunc aliquet bibendum enim facilisis gravida neque convallis. Elit ut aliquam purus sit amet. Venenatis cras sed felis eget velit aliquet. Vitae ultricies leo integer malesuada nunc vel.\r\n\r\nId nibh tortor id aliquet lectus proin nibh nisl. Enim sed faucibus turpis in. Dignissim sodales ut eu sem integer vitae justo eget. Ultrices neque ornare aenean euismod. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Sollicitudin aliquam ultrices sagittis orci. Elementum curabitur vitae nunc sed velit dignissim sodales. Id donec ultrices tincidunt arcu non sodales neque sodales ut. Morbi leo urna molestie at elementum eu. Urna nunc id cursus metus aliquam eleifend mi in nulla. Velit ut tortor pretium viverra suspendisse potenti.\r\n\r\nSenectus et netus et malesuada fames ac turpis egestas. Sodales ut etiam sit amet nisl. Lectus urna duis convallis convallis tellus id. Libero enim sed faucibus turpis. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat. Sit amet mauris commodo quis imperdiet massa tincidunt nunc. Amet aliquam id diam maecenas. Porttitor leo a diam sollicitudin tempor. Gravida neque convallis a cras semper auctor neque. Ac placerat vestibulum lectus mauris ultrices eros. Feugiat nibh sed pulvinar proin. Id leo in vitae turpis. Semper risus in hendrerit gravida rutrum quisque non tellus orci. Scelerisque mauris pellentesque pulvinar pellentesque habitant. Lacus sed viverra tellus in hac habitasse platea dictumst. In nulla posuere sollicitudin aliquam. Vehicula ipsum a arcu cursus vitae congue. Condimentum id venenatis a condimentum vitae sapien pellentesque. Proin libero nunc consequat interdum varius. Leo in vitae turpis massa sed elementum tempus.\r\n\r\nDonec ultrices tincidunt arcu non sodales neque sodales. Diam quam nulla porttitor massa id. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin libero. Quis viverra nibh cras pulvinar mattis. Neque sodales ut etiam sit amet. Aliquam faucibus purus in massa tempor nec. Gravida quis blandit turpis cursus in hac habitasse. Euismod elementum nisi quis eleifend quam adipiscing vitae proin sagittis. Nulla facilisi cras fermentum odio eu feugiat pretium nibh. Vehicula ipsum a arcu cursus vitae congue. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Odio ut enim blandit volutpat. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Bibendum enim facilisis gravida neque convallis.\r\n\r\nAliquet bibendum enim facilisis gravida neque. Augue neque gravida in fermentum et sollicitudin ac. Dictum non consectetur a erat nam at lectus urna. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a. Vulputate mi sit amet mauris. Viverra adipiscing at in tellus integer feugiat scelerisque. Augue lacus viverra vitae congue. Tortor condimentum lacinia quis vel eros donec ac odio. Placerat vestibulum lectus mauris ultrices eros in cursus turpis massa. Nulla facilisi cras fermentum odio eu. Et molestie ac feugiat sed lectus vestibulum mattis. Sit amet luctus venenatis lectus magna fringilla urna. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus.\r\n\r\nMassa sed elementum tempus egestas sed sed risus pretium. Mauris a diam maecenas sed enim ut sem viverra aliquet. Ultrices dui sapien eget mi proin sed. Ut porttitor leo a diam sollicitudin. Diam phasellus vestibulum lorem sed risus. Diam sit amet nisl suscipit adipiscing bibendum est ultricies. Ut tellus elementum sagittis vitae. Sem integer vitae justo eget magna fermentum iaculis eu non. Turpis massa tincidunt dui ut ornare lectus sit. Lectus arcu bibendum at varius. Pellentesque elit ullamcorper dignissim cras. Ut diam quam nulla porttitor massa id neque. Non odio euismod lacinia at quis risus sed vulputate. Luctus accumsan tortor posuere ac ut consequat. Ut eu sem integer vitae justo eget magna fermentum iaculis. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui.\r\n\r\nFringilla ut morbi tincidunt augue interdum velit euismod in. Viverra vitae congue eu consequat. Cursus sit amet dictum sit amet justo donec. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Sed viverra tellus in hac habitasse platea dictumst vestibulum rhoncus. Pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus. Aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Arcu odio ut sem nulla pharetra diam sit amet nisl. Vitae et leo duis ut diam quam. Quam nulla porttitor massa id neque. Quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Venenatis tellus in metus vulputate eu scelerisque felis.\r\n\r\nUt placerat orci nulla pellentesque dignissim. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris ultrices. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Sed pulvinar proin gravida hendrerit lectus. Dictum non consectetur a erat nam at lectus. Sem integer vitae justo eget magna fermentum iaculis eu. Sit amet luctus venenatis lectus magna fringilla urna porttitor. Non quam lacus suspendisse faucibus. Porttitor lacus luctus accumsan tortor posuere ac ut. Velit ut tortor pretium viverra suspendisse potenti nullam. Amet mattis vulputate enim nulla aliquet porttitor. Ut aliquam purus sit amet.', 1),
(4, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus ultricies tristique nulla aliquet enim. Lectus sit amet est placerat in egestas. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Facilisis leo vel fringilla est. Elit eget gravida cum sociis natoque penatibus. Duis ultricies lacus sed turpis tincidunt id. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ornare aenean euismod elementum nisi quis eleifend quam. In fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Lacus viverra vitae congue eu consequat. Scelerisque viverra mauris in aliquam sem. At auctor urna nunc id cursus metus aliquam. Nisi scelerisque eu ultrices vitae. Varius sit amet mattis vulputate enim. Amet nulla facilisi morbi tempus iaculis urna id volutpat. Etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum. Sed libero enim sed faucibus turpis in eu mi. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Aenean euismod elementum nisi quis.\r\n\r\nFacilisi nullam vehicula ipsum a arcu. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Nulla pellentesque dignissim enim sit amet. Pellentesque id nibh tortor id aliquet. Fames ac turpis egestas sed tempus urna et pharetra pharetra. Hendrerit dolor magna eget est. Libero volutpat sed cras ornare arcu dui. Mattis pellentesque id nibh tortor id aliquet lectus. Volutpat est velit egestas dui id. Venenatis a condimentum vitae sapien. Suspendisse potenti nullam ac tortor vitae purus faucibus. Id nibh tortor id aliquet lectus proin nibh nisl. Consequat ac felis donec et odio. Vel risus commodo viverra maecenas accumsan lacus vel facilisis. Elementum curabitur vitae nunc sed velit dignissim sodales.', 1),
(5, 9, 'Le site de bootsrap est proposé de base pour l\'ordinateur de maxime en 4.0 et ça fou la merde', 2),
(6, 1, 'Anya part dormir en espèrent recevoir plein de cadeau demain', 3),
(24, 1, ' test final', 33),
(27, 1, ' du texte ohohoho', 36),
(28, 1, ' salut du texten', 37),
(29, 5, 'test de la mort :>>>>>>>>>>>>>>', 1),
(30, 10, '', 2),
(31, 6, '', 1),
(32, 7, 'c\'est la magie', 1),
(33, 11, '', 2),
(34, 8, '', 1);

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

--
-- Déchargement des données de la table `Suggestion`
--

INSERT INTO `Suggestion` (`id`, `commentaire`, `modification`, `nbrLike`, `etat`, `id_page`, `id_user`) VALUES
(3, 'tset', 'On \ntset\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 1, 8),
(4, 'tset', 'On \ntset\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 2, 8),
(5, 'tset', 'On \ntset\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 3, 8),
(6, 'tset', 'On \ntset\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 4, 8),
(7, 'tset', 'On \ntset\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 6, 8),
(10, 'tset', 'On \ntset\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 5, 8),
(11, 'set', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 1, 8),
(12, 'set', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 2, 8),
(13, 'set', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 3, 8),
(14, 'set', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 4, 8),
(15, 'set', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 5, 8),
(16, 'set', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 6, 8),
(19, '', 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 3, 8),
(20, '', 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 2, 8),
(21, '', 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 4, 8),
(22, '', 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 1, 8),
(23, '', 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 5, 8),
(24, '', 'On \n\n\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 6, 8),
(27, 'e', 'On \n\n\ntest\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 1, 8),
(28, 'e', 'On \n\n\ntest\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 2, 8),
(29, 'e', 'On \n\n\ntest\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 3, 8),
(30, 'e', 'On \n\n\ntest\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 4, 8),
(31, 'e', 'On \n\n\ntest\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 5, 8),
(32, 'e', 'On \n\n\ntest\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 6, 8),
(35, 'test', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 2, 8),
(36, 'test', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 1, 8),
(37, 'test', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 3, 8),
(38, 'test', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 4, 8),
(39, 'test', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 5, 8),
(40, 'test', 'On \n\ntest\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 6, 8),
(43, 'test', 'On \n\ntes\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 1, 8),
(44, 'test', 'On \n\ntes\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 2, 8),
(45, 'test', 'On \n\ntes\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 3, 8),
(46, 'test', 'On \n\ntes\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 5, 8),
(47, 'test', 'On \n\ntes\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 4, 8),
(48, 'test', 'On \n\ntes\n\na init les fichiers et c\'est bien yey ye \nfgmQOUZgdmqizudg salutwsncvlwkshcv\nlwcs', 0, 0, 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `TempSave`
--

CREATE TABLE `TempSave` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `idPage` bigint(20) UNSIGNED NOT NULL,
  `numeroPage` int(11) NOT NULL,
  `TexteDeLaPage` text NOT NULL,
  `id_chapitre` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `TempSave`
--

INSERT INTO `TempSave` (`ID`, `idPage`, `numeroPage`, `TexteDeLaPage`, `id_chapitre`) VALUES
(2, 16, 1, 'salut qehvl<ehfveisfv<lesfhvsekjfv<ehfv<esjfvl<efvhejfv<ljefvehvfehfv<lejhfv<ehfvlsejfvljsv', 8),
(8, 18, 1, 'pls work', 8),
(9, 19, 1, ' salut', 8),
(10, 20, 1, ' salut c\'est moi le code qui marche bien :>', 29),
(13, 21, 1, ' test 1 ', 30),
(15, 22, 1, ' test 2 ', 31),
(16, 23, 1, ' test 3 ', 32),
(17, 25, 1, ' test qzjfmqozf', 34),
(22, 27, 1, ' du texte ohohoho 2 ', 36);

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
  `idUser` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ViewedBook`
--

INSERT INTO `ViewedBook` (`id`, `idLivre`, `idUser`) VALUES
(6, 12, 10),
(7, 3, 10),
(8, 4, 10),
(9, 1, 10),
(10, 12, 8),
(11, 85, 8),
(12, 2, 8),
(13, 1, 8),
(14, 4, 8),
(15, 2, 10),
(16, 3, 8);

--
-- Index pour les tables déchargées
--

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `idPage` (`idPage`),
  ADD KEY `id_chapitre` (`id_chapitre`);

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
-- AUTO_INCREMENT pour la table `Chapitre`
--
ALTER TABLE `Chapitre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `Etat`
--
ALTER TABLE `Etat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `LikedBook`
--
ALTER TABLE `LikedBook`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `LivreGenre`
--
ALTER TABLE `LivreGenre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `Page`
--
ALTER TABLE `Page`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `Suggestion`
--
ALTER TABLE `Suggestion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `TempSave`
--
ALTER TABLE `TempSave`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ViewedBook`
--
ALTER TABLE `ViewedBook`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

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
  ADD CONSTRAINT `appliquer` FOREIGN KEY (`id_page`) REFERENCES `Page` (`ID`),
  ADD CONSTRAINT `propose` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id`);

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
