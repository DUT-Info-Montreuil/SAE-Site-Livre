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
(17, '32b4e1eca6fcd232d51a63eb680fce692a19ad1f47ed3ef9d740f33d138adb78', 8, 1670851458, 0),
(18, 'a5aff1ae275030ea0411f5943dd04059a1aef44f0b953a868e63ccda22da5339', 8, 1670851617, 1),
(19, 'd25fda4437de304ad98ccde6d3f1fe3d847686801125904ae03f861d600f4b46', 8, 1670851638, 1),
(20, 'f3e46465b22a758f6b74a08f33d7ff89c9dedb6f43ccb49f94631a2b7c272a3f', 8, 1670851640, 1),
(21, '79d8d460a0c9184dc15b59a0ddcca1d38dbc095cfc41c48ae4500e752c70e14a', 8, 1670851644, 1),
(22, '704be8841d6447532eb6e0b2ac6be2e4b2f8c899998d99513748ade6f59bf4ce', 8, 1670851646, 1),
(23, 'c1afe354701b6c856b85096505e6fd841c18df15caa0959d2d60325b052557a8', 8, 1670851646, 1),
(24, 'b23847546b00aca2a3fcfa1dddffee824172c7c71ebc1484263681bab54707fd', 8, 1670851647, 1),
(25, '997acbe7ae1a7a35dd6fc3e357fc16e4420f11df6dfb7e0ed1741e81af4f7fe0', 8, 1670851647, 1),
(26, 'ef125a94e525d81ae89bf34f9398479ebe528a84356682e8b63b91e082d3f003', 8, 1670851650, 1),
(27, '560c33b02fd99c8242e47e9885a214d3bc554bd21829090572054cac3c9f1fdf', 8, 1670851650, 1),
(28, 'dc6254262191d893716a5bf5419dbea1e6ccfeb586b81842501cf951fb3ff283', 8, 1670851650, 1),
(29, '3876c500dbcae1e2b2af43931bf73a48bfb02e6e32e31c7ed74143489038e16b', 8, 1670851650, 1),
(30, '606910648e8f7c5ce5011e192224d894427bce97db93dd3aed53d1c93c0e7b04', 8, 1670851651, 1),
(31, '9ceed091fd7994f55bdaa2f08a8700fe818c3e0b73f7cc2eb3aa27042595dc49', 8, 1670851655, 1),
(32, '3525c50a42d4182f737a410882083e6af8c4fe3e5379688cac7184c45cc05e88', 8, 1670852112, 0),
(33, 'ed6acfe49af5cb748831e20934c44e072c0beb38fdc869e137b39cc351e7a887', 8, 1670852120, 1),
(34, '237d876085cb5ff33a4c0e0278dc5645c9ea4aa0032a7f5695387ef11896956f', 8, 1670852121, 1),
(35, 'c159349f2bf89312cff66dcb24007f01ab8cbc636a7f92f625b614290821eea0', 8, 1670852123, 1),
(36, 'dd92227dd87d2f1a777c867d297c45a694acd97b0f01e50649d435b2e6bde99c', 8, 1670852124, 1),
(37, '85011fd9eb0f31e0bc4b641fd37752c965ffaf492acb9dca32d43f1f6921800f', 8, 1670852189, 1),
(38, 'dfcf6f2ddcc85378d35befbe0723a2aa931d96068aa75686f0186f7941b3352d', 8, 1670852205, 1),
(39, '4285f34b4439e3dc61cc6156b3aa670be01e3e06f2844a30eda1acd34a1db98f', 8, 1670852208, 1),
(40, '527c68f0bdc908e9c84b69b54c0ce484b4bf5868d9420e66806cc455adc7e97a', 8, 1670852212, 1),
(41, '3626dbacb0c33351df1d9d248c26c24517c91affda932cc803bc14b84ed89506', 8, 1670853145, 1),
(42, 'bc34fc4050947b2cd47f0c41e5e292d34be755b57b10d6d5fb527e8ce510f7ed', 8, 1670853163, 1),
(43, 'c03ff421b8eefe7d64f5ab350a954cfe314d11b31229fea870289c03504bc640', 8, 1670853193, 1),
(44, '4761a89996e5ecc3e506593866e383726fc45f14efd5e07ae7a752fff9bf801d', 8, 1670853208, 0),
(45, '5922ee5d5a2fccd0db9330376cea7276218a70b1c7ba0056a39d1f1839511fe0', 8, 1670853365, 1),
(46, '2213bc7be0d4cedb516d07c9b8149f7b5c4d91dd91c8a1aa0e976c0222fc9a6d', 8, 1670853380, 0),
(47, '2704fb9ce39217c468cc64b96ed9734de85cbe8c208ec4ad04d64ff103b246ca', 8, 1670853403, 1),
(48, 'be191a2ef629f2a10cd3c7fea662d824e64550139519acefd55fe176ab682889', 8, 1670853404, 1),
(49, '0ea919ddac8dd9eb2e1c461d404c63e4c217d8ae2e4aecd331c41631b7029529', 8, 1670853405, 0),
(50, 'd247357336da667a9c3174eeda17ceca316a716b11aa2990ce6405460cb18e25', 8, 1670853433, 0),
(51, 'cb025eab21218f79045b930024b511ef7de11ca9f4562d7a9de35fd14e339a62', 8, 1670853450, 1),
(52, '8fd13d38011e8e333337819aadc9cb6798e75e240eb3d7b2dc63efe9b1cdf886', 8, 1670853556, 1),
(53, 'e00833cb6c29263060797998187d5b39cc24af50a7fc3657a26e8eb75e4db612', 8, 1670867368, 0),
(54, '31022cbfde35cbd5a85bcd45bd3fa89dc96326ed7586b807babbef576b1e3b24', 8, 1670867576, 0),
(55, 'ab7011109a8560c7973e21adb0ea0f311ee91f2069a615af2fdf29621765a8d6', 8, 1670867674, 1),
(56, 'a20e05717de2cdc843d7f99ca88f2e50a9448dc92d180cbe3df478fee85a7fe6', 8, 1670867677, 1),
(57, '9cb2707fff5943584db9d6f28f3c94175c7465e4698cf294829c6665b1aa1d33', 8, 1670867678, 1),
(58, '3e56f3b415b0fbb4a8175699a96bc83cb4436c70a80194746d4e445a74e72914', 8, 1670867851, 1),
(59, '3f643fb09320ed416d5f073b51173d3151685a93c6170f32d9c4b5c9eae741ca', 8, 1670867854, 1),
(60, '98d963a5d2ae895b4f6fbdc311ada57c64a8272db0f5cdb9919a0d5d52331e7b', 8, 1670867857, 1),
(61, '27eb28fcef30c3e2d9e0f5cafa6d6e9509abe04477719fe8c0dcb767d5ea0ff7', 8, 1670867859, 1),
(62, '4bafc150933d60d9e27fef44d1f7a6e7286e7eabc3207d2aacbb43298c690031', 8, 1670867861, 0),
(63, 'c042adda3d5fe4b27e531f81a301c116efdcf1323342663122dbb5686b82218f', 8, 1670868174, 1),
(64, '4181f6627a04fa1a94c489b3297dc6b810046ea31e368ab8a2c729ab97ce2066', 8, 1670868183, 0),
(65, 'ccad43c4027f21519608f9d52894ac6dbfc9a335b50c55450d972d01c07d7736', 8, 1670868188, 0),
(66, 'fda21b4e43ac0ac65542881c931d543758201f3c81224726281bf0ce33aa7f1e', 8, 1670868192, 1),
(67, 'e8edbc4296c6316bc715c5cf25b928ed84c3ac396f025655c1b6ae307799f413', 8, 1670868389, 1),
(68, '0f9fc77d45975b1a2bd7f5099b1e952d4468e01ccf7468a005d00063520e4658', 8, 1670868393, 1),
(69, 'b244748bf19901ff1d2115151735b5908b23036619642cc58849c2b20be20ea2', 8, 1670868395, 0),
(70, '1e87a45e719674540a876899bb05fcfae7a3fec58d576fd601cf2a1c7b762805', 8, 1670868399, 1),
(71, '81fcc29783075fef60ffb066b1d48de9eee6834b8f5a619639fa5aee3e5ad657', 8, 1670868401, 0),
(72, 'f8beb1c198e5263291cbb857bf8c4808b3f54e66f27aed1eb0fd0f652af92659', 8, 1670868406, 1),
(73, 'efade50e0b9f9be1473ead770a9c28a9107a8cd695837167c6c52b6f9c588fab', 8, 1670868866, 0),
(74, 'af9378f8ed5676e056dbfa1267d3280a9b2b54bed3aaff2d98db52036a1917e0', 8, 1670868875, 0),
(75, '05fd74784397af33d133c1327d2de5f6c7fbd293b78ecdb4260752989239f6c8', 8, 1670868943, 0),
(76, '71bbaa18dedc8e2964179a4a45aa848050377b712cb74741a1035e07f2510203', 8, 1670869054, 0),
(77, '590102b4e7eaaab14d456f013a7567d81428f70421ee2260ccfb6677180b48ee', 8, 1670869247, 0),
(78, 'c6ef1e868247a7a4029b92ee1a1d094a10534dd434f3303f8791bee6e260cc7e', 8, 1670869253, 1),
(79, 'b46a1e28d53f7a0db28c47388124502bfa87d8eec4b684c72b7ed409edc52332', 8, 1670869258, 1),
(80, '81d70c5cc628577dd4313b35b613f64bcd37bb195c63696315a6828deeb2b962', 8, 1670869262, 1),
(81, '0dafaeb94233290d0a49068a09b9fab56f62a3c0bcb6fdbea4117710077787fe', 8, 1670869279, 1),
(82, '83469a9e8e012b18e4604b19d14f38f92341084bb7da62c915a300f866d8aa0a', 8, 1670869279, 1),
(83, 'ebfddefb978ad3e7aa417aaf9a8fc4a805790b600099f9e669aaab4b28b44c5c', 8, 1670869283, 1),
(84, '53a64be085f4707f618a1d8f3739e0db6919c24be3ba625dd39c51125a8b49b4', 8, 1670869284, 1),
(85, 'abe16d2ffe0552589e0f9917362cd8e319f310b45aa8c25fafebbdb45e22768c', 8, 1670869384, 1),
(86, 'b49a380bbede2bc9880c7742516d3f9556f496ef5f790c0a8d09ced995f3c393', 8, 1670869438, 1),
(87, '232ef711e58fb090d4fcbb09c1dd94d7e5b8e59a51bc4982248570fb76536630', 8, 1670869464, 1),
(88, 'aa77ecc37de5c5f6be57768dabff38b799dfb7faa9661ef91560fbb142936237', 8, 1670869572, 1),
(89, 'c3df3b9f47fa7b91dd8cc73483c9b5569b80405e45ac2bb8ff716fdaa40e3d4b', 8, 1670869604, 1),
(90, '27593820065737bc494aad3e39dd74c15887af192f29a2c0e79bb277344e20c5', 8, 1670869656, 1),
(91, 'bf0018c480057120e7fb55f4bdffb03ea7516ed24762ba8251ee1ed9d559a2a8', 8, 1670869695, 1),
(92, 'c590aaa52d946105b39549b7baeed64ebe1b681b35ccd2f9c8142a83f584605a', 8, 1670869696, 1),
(93, 'ed735e95646dd79ad0ef7776b02b1d447ca968fae86d2f2155e62c7157c0ab9c', 8, 1670869697, 1),
(94, '74a8253fad52f8eeb5631b5b61fff74a2c725d6183ca137288e8115071be113c', 8, 1670869697, 1),
(95, 'c94237fd40c700353b697ac0004d6c96cd59ad965b99d43d91ad9419041c906e', 8, 1670869735, 1),
(96, 'b0432a32153928880657168087ba03367ce622de78e524efd85a2cbd0daac304', 8, 1670869761, 1),
(97, 'c2e4615abf75119978e8d1d718e39a9bb5c7f3f6cffdd05aa8bf767933c8f624', 8, 1670869895, 1),
(98, '66f4f2eac614851779fcf1ee99dd8144a1319bc0b107fc204f223dce63bbc27e', 8, 1670869922, 1),
(99, '8cf6f57c9edd6c13715a84e506d078bf43866c68c67ba7b26c08561a457f4610', 8, 1670869947, 1),
(100, '1aefbf908097b35e15d970ac6c50d532d7728a66d1151bdaa461d7623cd9f92e', 8, 1670869952, 1),
(101, '9ac979405685de3cd3f2b3f68d1d6bcb546e5e2725a036a9c7979adfafc86a42', 8, 1670869963, 1),
(102, 'ab03a07494040cc307db15307bc38653c95836192d6330ac7574090a30bb9cb8', 8, 1670870019, 1),
(103, 'a25f7b69de4735723a915dea65fe7f5d80c7818b66433ee103398c3bbee67a82', 8, 1670870024, 1),
(104, '12cc3c2ca966ad718862cb604363655ffc63e6e29b51435a8a78a0d63bf366e0', 8, 1670870030, 1),
(105, '89d83d0addd21029f6c26826e4ed942f83be926e0ab75bf59255c66d49774e5f', 8, 1670870050, 1),
(106, '186bf03ea9deac701f9183c301eb7c00f0121159f3a194351c817918597b9b9c', 8, 1670870055, 1),
(107, '9a30c7d78e24eeb201d09dd925f2cb4014bee4e1edb6118e7714df0bf29588b0', 8, 1670870060, 1),
(108, 'a2367c56d3e731b0a4df651f598ddb944b003a44f2a079068a73015e3b68e564', 8, 1670870073, 1),
(109, 'a859a899c7328adb73ce3760d3896c0b1cac0feb650ffc78b4f50eeaba749cf4', 8, 1670870086, 1),
(110, 'c0c77fedbb21d8fea159276d8b9dbd2c1b80c510d8c5cdad3e566cf461cad574', 8, 1670870139, 1),
(111, '91c25a3fec808e6a4719310f39df7eb1d89d6612dd6a7cef5f9eddb2b0042151', 8, 1670870163, 1),
(112, '1b100b3615cbad606bbe4f6f253446cd00e43e0174945e90f505613e80edde91', 8, 1670870188, 1),
(113, 'e63418348364e3ef6cae88938bd332c6b269d042a7af9061709b32d93b2b0193', 8, 1670870204, 1),
(114, '4224160ce48d05f47189005c79f28aaa76da7a68d31ad9e20635e2a28788aa4d', 8, 1670870433, 1),
(115, '50ed61367139cc3d924907efffef4346565877b15d3afd380056112bac038265', 8, 1670870508, 1),
(116, '29485e516c1d3336f72f9448656c9612ddfad0431f1daee25560f49b193753e3', 8, 1670870630, 1),
(117, 'ebd3b6d1e4f0833c65f832a970f7fe32eb13e0515dd7adaab9d6aa22f39eb740', 8, 1670870639, 1),
(118, '886876d7f0a376598d3e9abef7ed46e2f27b2ea08ea263b4c995358cfcdf1a09', 8, 1670870762, 1),
(119, '732f420d6d9ff1ecb08992f6f8cda1534e9c2d2680d928afcc18c5f7e095c6db', 8, 1670870766, 1),
(120, 'e0534b138893a5e073c67936883372e0f98d9e7b0eaa2fe109d241a52ae807fc', 8, 1670870769, 1),
(121, 'f591422694d2b23b99193ea9c05e0970f9dc0048d8a496ee4d4c65bd14da3145', 8, 1670870773, 1),
(122, 'df0679b38292681ecb0b0d0549cf0e8de768e6af16400dfc1dc430919ccf57af', 8, 1670870775, 1),
(123, '81a8eac6418ed23caf6075c925679d4c9af845338ea5425752ba2181ba2c2bbe', 8, 1670871174, 1),
(124, '7b5ada87e53b207fe8cafd4304a499e46da8192d3c5386235b97d0ff23f119f2', 8, 1670871191, 1),
(125, 'b9759663e0a0534d3e0382a103436f85d03bfed1ddfe6d69f0010595d0da7766', 8, 1670871218, 1),
(126, 'f071ebab819341a41a9323b7c2562189375e3ff8d81411287acbdfbd86ced11f', 8, 1670871254, 1),
(127, 'e73641b73a38160f73b46bce7c3544e8e8fa8d4cc3c52d95dc4e2255ca95f787', 8, 1670871434, 1),
(128, '317d6a26353c6cb95ad90ebc8edbf1d112c6c30271d2b21e091864d640c0c299', 8, 1670871443, 1),
(129, '80c807dbcc547895667a2facafa336e39ca561fec99b5305d120ab69d3217cd0', 8, 1670871446, 1),
(130, '2b479ac2140aad06491f683080505b728188fe9ee8e136a60da3ff7eb362e1ba', 8, 1670871507, 0),
(131, '150e6e60dc41b521daa606f355d665c361041791329825900c2312886ec18563', 8, 1670871615, 0),
(132, '7aab9039a3dab903d03f8e6bfe449b0d5e68e523340bfe10994353f28102ce2c', 8, 1670871667, 1),
(133, '601bb8d3d3a991bce3b546d933c70b7836bf2432271c1db89c1fb5853f9e960f', 8, 1670871671, 0),
(134, '9eec67553bb3384404639dc4c46d8c5b321d531b200c46a1800609e5b3bcd8fc', 8, 1670871691, 0),
(135, 'ec0b59a666052085cece07856c7882dde6cefe6bef6f36f749b33cff8ffe454b', 8, 1670871746, 1),
(136, 'b124bbd2ffca0811bca7d6678909d6d7e85c796a738819b01fccb8e90c1779de', 8, 1670871769, 1),
(137, '8e622c55e5a466b945492a9cfdad48faec91d8b883e46ed22f717b65f1621535', 8, 1670871772, 0),
(138, '97701418b340b75d7b3e46e30bc5a422f5cee88ac02d2878b63a7b05c043f3eb', 8, 1670871802, 1),
(139, 'e433558b37852f809027419196b6eeaa4e42824f929aa805f8168ef68ddd69f5', 8, 1670873109, 0),
(140, 'e7ae38344f83604006023f1983e0118cfa4d414ed898a856bb2af1b910ea8da2', 8, 1670873115, 1),
(141, '6454d7b5ce6179866346740a96979ca59c89af6ba75867431c9b8fddab922b6d', 8, 1670873151, 1),
(142, 'e1d771b6ff80e0740c2617dddc16f6043d143d7ec41b721334e6298f1701a890', 8, 1670873230, 1),
(143, 'ce0d35936ea826064c261c4a43ac21ccc9bea61e114a23cc5c9301fd6b47cf71', 8, 1670874704, 1),
(144, 'd06ddfa2697281d60e83f776a505b049a61e276e96c497f398f7c31673396e6d', 8, 1670874921, 1),
(145, 'e4235bfbc53a48b43ab2d118dc7821e38c336bef1633447d46822f7e5ceff67b', 8, 1670874941, 1),
(146, '553be2629fbce5eacb9d285c24f5a85776e9a8ee3a39677caca69525a6b228f7', 8, 1670874985, 1),
(147, 'dd931a886891b7bd19e60c7e949ec57f47be898e46594b394eba0f6487c6500f', 8, 1670875038, 1),
(148, '09ebdb64909dc968aa91ea0bc5137253d3180fda92030a6804397ed1e7b0a10d', 8, 1670875063, 1),
(149, 'eec2e94b05317ddc284f360b8bb3d59d036163d1ad55edfd545452f08e9460b6', 8, 1670875066, 1),
(150, '26b140e307ac9e8e2a43b37d6109b19b83de9bc4f29416ba353f4548a7575b03', 8, 1670875070, 1),
(151, '92a0100254ae3c917c5d75517f729ed0f7304c0f5992285dbffdc247e2e4cf48', 8, 1670875651, 0),
(152, '74bf755400069ac43fcb0f771b388f8e278d70dbff1786c498dc1a0cd43c8609', 8, 1670878765, 1),
(153, 'c84b4991fc2ae8446fa462373db95e83dc7a9445bfafabdf7056f5e094f75cf7', 8, 1670878767, 1),
(154, 'b24aa15586d49182980f61f3c6bfb10f382cc9127d814c8c88f1e6aa93f50afe', 8, 1670878770, 1),
(155, '658f5d6ba41f5ce6ad9de9d95b5d41a47d366961b4f1fb61f3ec43ba8ac7c89a', 8, 1670878771, 1),
(156, '9c89b24564a4f97da1411ad0175eb565c9503686abcb7a9f62f7377d4352ed20', 8, 1670878926, 1),
(157, 'd032cffbcd251150355a4109f07aabddb04898285e926015d85a26347970354c', 8, 1670879034, 1),
(158, 'c9867b5c85ec7c2ba40662904ef5a16fc2b4e1ec212665f8cb592499fbab8a8b', 8, 1670879043, 1),
(159, '5b7d806af00f42c490ddc813d8d59f4ef4fe4d6f53ed9433578eb4d00b4b12cc', 8, 1670879335, 1),
(160, 'b5a5aeb3f9c38de999b5e5540df2bcf0def617e7bc1da4f95a74a90704e72537', 8, 1670879476, 1),
(161, '6bc061ea192c8b7314127c6891a958fc09e1c3ae8696e241c54bc5c5fd3ad1f3', 8, 1670879677, 1),
(162, 'b7ad22922dbf38cf8b100bd01abcc4be067ea34320aeb98c01ff4900759edac8', 8, 1670882919, 1);

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
