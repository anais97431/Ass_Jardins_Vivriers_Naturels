-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : projetfiofanais.mysql.db
-- Généré le :  Dim 15 mars 2020 à 21:21
-- Version du serveur :  5.6.46-log
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetfiofanais`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id_article` int(11) NOT NULL,
  `title_article` varchar(50) NOT NULL,
  `short_article` varchar(300) NOT NULL,
  `article` text NOT NULL,
  `comment` tinyint(1) NOT NULL DEFAULT '1',
  `active_article` tinyint(1) NOT NULL DEFAULT '1',
  `create_article` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_articles`
--

INSERT INTO `blog_articles` (`id_article`, `title_article`, `short_article`, `article`, `comment`, `active_article`, `create_article`) VALUES
(1, 'Abeilles solitaires, abeilles sauvages', 'Le jardin vivrier de Boisbonne offre une belle population d’abeilles sauvages...', 'Le jardin vivrier de Boisbonne offre une belle population d’abeilles sauvages\r\n\r\ncelles qui ne font pas de miel mais qui pollinisent la flore sauvage et nos cultures au passage,\r\n\r\net il était opportun de faire un inventaire pour avoir une idée précise du nombre d’espèces en présence\r\n\r\nsachant que plus de 1000 espèces d’abeilles peuplent nos contrées françaises).\r\n\r\nEn début d’année 2019, nous avons décidé de faire appel à l’expertise du Centre Vétérinaire de la Faune Sauvage et des Ecosystèmes d’ONIRIS pour faire cet inventaire.\r\n\r\nOlivier (directeur) et Cloé (service civique) sont donc venus à plusieurs reprises au printemps et en été faire des prélèvements à l’aide de leur grand filet. \r\n\r\nDe belles découvertes en perspective!', 1, 1, '2020-02-25'),
(2, 'Nouveau : café associatif…', 'Un moment de détente et de reconnexion à la nature pour les salariés de la Chantrerie, une p’tite pause café bio...', 'Un moment de détente et de reconnexion à la nature pour les salariés de la Chantrerie, une p’tite pause café bio.\r\n\r\nEn expérimentation en 2019, l’idée d’un espace café associatif a été validée par les « testeurs »… Reste à poursuivre quelques aménagements pour qu’il soit tout à fait opérationnel.\r\n\r\nDéjà, un grand merci aux étudiants des groupes DEFI 2018-2019 de l’Ecole Supérieure du Bois (Alan, Alice, Julien et Pierre) pour la réalisation d’un coin cuisine pour notre espace convivial qui devient de plus en plus cosy…', 1, 1, '2020-02-25'),
(3, 'Découverte originale des chants d’oiseaux', 'Dominique Boucharel a mis au point une méthode de codage du chant des oiseaux, sachant qu’il est plus aisé d’entendre que de voir ces animaux.', 'Dominique Boucharel a mis au point une méthode de codage du chant des oiseaux, sachant qu’il est plus aisé d’entendre que de voir ces animaux.\r\n\r\nLa méthode a été exposé à une trentaine de personnes dans le bel amphithéâtre de l’Ecole Supérieur du Bois qui a accepté de nous le prêter pour l’occasion.\r\n\r\nPuis une sortie pour mettre en application s’est déroulé sur le jardin.\r\n\r\nUne seconde visite a eu lieu en juin, Dominique souhaitant par la même occasion faire des prises de sons.\r\n\r\nVous pouvez retrouver des informations sur le site https://www.jecoutejedecodejidentifie.fr/ et dans un petit guide de poche en autoédition.\r\n\r\nUn grand merci à Dominique Boucharel pour sa disponibilité.', 1, 1, '2020-03-13'),
(4, 'Une très belle surprise dans la mare !', 'De belles pontes de grenouilles dont il reste à identifier l’espèce.', 'De belles pontes de grenouilles dont il reste à identifier l’espèce.\r\n\r\nEt perçu au coin d’une pierre, avec des étudiants de l’IMTA, jeudi 7 mars, nageant dans la mare… un triton (crêté?). Mais pas pu le prendre en photo. Nous le guettons en espérant le revoir…\r\n\r\nPontes de grenouille photographiées le 10 mars dernier sur la mare, nous avons entendu chanté les grenouilles quelques jours avant mais impossible de les voir, elles plongeaient sous l’eau à  notre approche.\r\n\r\nEt pour ce qui est du triton, voici une photo pour que vous ayez une idée mais cette image ne provient pas de notre mare.', 1, 1, '2019-03-10'),
(11, 'Printemps 2019', 'Le 3ième printemps du jardin est bien agréable', 'Le 3ième printemps du jardin est bien agréable, après un coup de chaut record fin Février, nous bénéficions des bonnes pluies de mars…\r\n\r\nA gauche une fleur d\\\'abricotier (28 février 2019), à droite une fleur de noisetier (14 février 2019).', 1, 1, '2019-04-30');

-- --------------------------------------------------------

--
-- Structure de la table `blog_categorys_articles`
--

CREATE TABLE `blog_categorys_articles` (
  `id_category_article` int(11) NOT NULL,
  `category_article_name` varchar(150) NOT NULL,
  `create_category` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_categorys_articles`
--

INSERT INTO `blog_categorys_articles` (`id_category_article`, `category_article_name`, `create_category`) VALUES
(1, 'Jardin', '2020-03-13 09:16:04'),
(2, 'Fleurs', '2020-03-13 19:59:24'),
(3, 'Chants d\'oiseaux', '2020-03-13 09:15:49'),
(4, 'Marre', '2020-03-13 14:35:26');

-- --------------------------------------------------------

--
-- Structure de la table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id_comment` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `id_article` int(11) NOT NULL,
  `active_comment` tinyint(1) NOT NULL DEFAULT '0',
  `create_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blog_link_table`
--

CREATE TABLE `blog_link_table` (
  `id_link` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_category_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_link_table`
--

INSERT INTO `blog_link_table` (`id_link`, `id_user`, `id_article`, `id_category_article`) VALUES
(5, 8, 1, 1),
(6, 8, 0, 8),
(7, 8, 0, 8),
(8, 8, 0, 8),
(9, 8, 2, 1),
(10, 8, 3, 3),
(11, 8, 0, 4),
(12, 8, 0, 4),
(13, 8, 0, 4),
(14, 8, 0, 4),
(15, 8, 0, 0),
(16, 8, 0, 4),
(17, 8, 31, 4),
(18, 8, 0, 0),
(19, 8, 4, 4),
(20, 8, 5, 4),
(21, 8, 6, 0),
(22, 8, 7, 4),
(23, 8, 0, 0),
(24, 8, 8, 2),
(25, 8, 9, 2),
(26, 8, 10, 0),
(27, 8, 0, 0),
(28, 8, 0, 2),
(29, 8, 0, 0),
(30, 8, 11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `blog_picture_article`
--

CREATE TABLE `blog_picture_article` (
  `id_picture_article` int(11) NOT NULL,
  `title_picture_article` varchar(150) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date_picture_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_picture_article`
--

INSERT INTO `blog_picture_article` (`id_picture_article`, `title_picture_article`, `id_article`, `date_picture_article`) VALUES
(12, 'cafe_du_01_avril_2019.jpg', 2, '2020-02-24 10:53:32'),
(13, 'cuisine_defi_mai_2019.jpg', 2, '2020-02-24 10:53:32'),
(16, 'bourdon_sur_gesse_de_nissole_mai_2019.jpg', 1, '2020-02-25 14:49:19'),
(17, 'inventaire_abeilles_sauvages_2019.jpg', 1, '2020-02-25 14:49:19'),
(18, 'inventaire_abeilles_sauvages_2019_2.jpg', 1, '2020-02-25 14:49:19'),
(19, 'confc3a9rence.jpg', 3, '2020-03-13 09:26:23'),
(20, 'rosette.jpg', 3, '2020-03-13 09:26:23'),
(21, 'sortie-chant-doiseaux-du-16-mars-2019.jpg', 3, '2020-03-13 09:26:23'),
(34, 'img_6110.jpg', 4, '2020-03-13 15:15:21'),
(35, 'ponte-grenouille-mare-boisbonne-10-mars-2019.jpg', 4, '2020-03-13 15:15:21'),
(36, 'ponte-grenouille-mare-boisbonne-10-mars-2019-2.jpg', 4, '2020-03-13 15:15:21'),
(40, 'fleur-femelle-de-noisetier-14-fev-2019.jpg', 11, '2020-03-13 20:11:26'),
(41, 'premic3a8re-fleur-arbicotier-28-fev-2019-1-e1552303926932.jpg', 11, '2020-03-13 20:11:26');

-- --------------------------------------------------------

--
-- Structure de la table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id_tag` int(11) NOT NULL,
  `tag_name` varchar(150) NOT NULL,
  `id_article` int(11) NOT NULL,
  `create_tag` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category_pages`
--

CREATE TABLE `category_pages` (
  `id_category_page` int(11) NOT NULL,
  `title_category_page` varchar(150) NOT NULL,
  `name_category_page` varchar(150) NOT NULL,
  `date_category_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category_pages`
--

INSERT INTO `category_pages` (`id_category_page`, `title_category_page`, `name_category_page`, `date_category_page`) VALUES
(1, 'Nous connaître', 'nous_connaitre', '2020-03-12 14:58:16'),
(2, 'Sensation Nature', 'sensation_nature', '2020-02-18 08:10:18'),
(3, 'Café Associatif', 'cafe_associatif', '2020-02-18 08:10:35'),
(4, 'Emplettes Solidaires', 'emplettes_solidaires', '2020-02-18 08:10:45');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `url_page` varchar(150) NOT NULL,
  `title_page` varchar(150) NOT NULL,
  `number_content` int(11) NOT NULL DEFAULT '0',
  `id_category_page` int(11) NOT NULL,
  `date_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id_page`, `url_page`, `title_page`, `number_content`, `id_category_page`, `date_page`) VALUES
(1, 'les_cherubins', 'Les cherubins', 2, 2, '2020-03-02 09:07:10'),
(2, 'groupement_achat', 'Groupement d\'achat', 4, 4, '2020-03-02 09:07:18'),
(3, 'le_jardin', 'Le jardin', 0, 1, '2020-03-12 13:40:08'),
(4, 'les_jardiniers_volants', 'Les jardiniers volants', 0, 1, '2020-03-12 13:45:56'),
(5, 'projet_associatif', 'Projet associatif', 0, 1, '2020-03-12 14:32:11'),
(6, 'benevoles_chantiers', 'Bénévoles, Chantiers collectifs', 0, 1, '2020-03-12 14:27:23'),
(7, 'ateliers_formations', 'Ateliers, formations', 0, 2, '2020-03-12 14:28:40'),
(8, 'conferences_sorties', 'Conférences et sorties', 0, 2, '2020-03-12 14:31:40'),
(9, 'convivialite', 'Convivialité, se rencontrer', 0, 3, '2020-03-12 15:35:15'),
(10, 'echanger', 'Échanger, débattre', 0, 3, '2020-03-12 15:40:36'),
(12, 'agir_collectivement', 'Agir collectivement', 0, 3, '2020-03-12 15:54:30'),
(13, 'vente_directe', 'Vente directe, Circuits courts', 0, 4, '2020-03-12 16:29:08'),
(14, 'achat_raisonne', 'Achat raisonné, consommer mieux', 0, 4, '2020-03-12 19:30:42');

-- --------------------------------------------------------

--
-- Structure de la table `page_contents`
--

CREATE TABLE `page_contents` (
  `id_content` int(11) NOT NULL,
  `title_content` varchar(150) NOT NULL,
  `id_page` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price_activity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `picture_pages`
--

CREATE TABLE `picture_pages` (
  `id_picture_page` int(11) NOT NULL,
  `title_picture_page` varchar(150) NOT NULL,
  `id_presentation` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `id_category_page` int(11) NOT NULL,
  `order_picture` int(11) NOT NULL,
  `carousel` tinyint(1) NOT NULL DEFAULT '0',
  `create_picture_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `presentation_contents`
--

CREATE TABLE `presentation_contents` (
  `id_presentation` int(11) NOT NULL,
  `title_presentation` varchar(100) DEFAULT NULL,
  `presentation_content` text,
  `order_content` int(11) NOT NULL DEFAULT '0',
  `date_start` varchar(50) DEFAULT NULL,
  `date_end` varchar(50) DEFAULT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `presentation_contents`
--

INSERT INTO `presentation_contents` (`id_presentation`, `title_presentation`, `presentation_content`, `order_content`, `date_start`, `date_end`, `id_page`) VALUES
(28, 'titre1', '11111111111111111111', 1, '2020-03-03', '2020-03-27', 1),
(29, '', '22222222222222222222222222222', 2, '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `shop_cart`
--

CREATE TABLE `shop_cart` (
  `id_shop_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_shop_payment` int(11) NOT NULL DEFAULT '0',
  `price_product` float NOT NULL,
  `quantity_cart` int(11) NOT NULL,
  `validation_payment` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `create_shop_cart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_cart`
--

INSERT INTO `shop_cart` (`id_shop_cart`, `id_product`, `id_user`, `id_shop_payment`, `price_product`, `quantity_cart`, `validation_payment`, `active`, `create_shop_cart`) VALUES
(1, 1, 8, 9, 2, 9, 1, 1, '2020-02-25 11:23:58'),
(2, 2, 8, 9, 5, 1, 1, 1, '2020-02-25 11:23:53');

-- --------------------------------------------------------

--
-- Structure de la table `shop_category`
--

CREATE TABLE `shop_category` (
  `id_category_shop` int(11) NOT NULL,
  `title_category_shop` varchar(150) NOT NULL,
  `img_category_shop` varchar(150) NOT NULL,
  `create_category_shop` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_category`
--

INSERT INTO `shop_category` (`id_category_shop`, `title_category_shop`, `img_category_shop`, `create_category_shop`) VALUES
(1, 'Produits alimentaires', 'oeufs2.jpg', '2020-03-13 09:00:17'),
(2, 'Produits non alimentaires', 'oeufs.jpg', '2020-02-19 10:33:19');

-- --------------------------------------------------------

--
-- Structure de la table `shop_payment`
--

CREATE TABLE `shop_payment` (
  `id_shop_payment` int(11) NOT NULL,
  `number_ordered` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_payment`
--

INSERT INTO `shop_payment` (`id_shop_payment`, `number_ordered`, `id_user`, `date_payment`) VALUES
(9, 1, 8, '2020-02-25 11:22:04');

-- --------------------------------------------------------

--
-- Structure de la table `shop_picture`
--

CREATE TABLE `shop_picture` (
  `id_picture` int(11) NOT NULL,
  `title_picture` varchar(150) NOT NULL,
  `id_product` int(11) NOT NULL,
  `create_img` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_picture`
--

INSERT INTO `shop_picture` (`id_picture`, `title_picture`, `id_product`, `create_img`) VALUES
(17, 'oeufs.jpg', 1, '2020-02-24 14:33:33');

-- --------------------------------------------------------

--
-- Structure de la table `shop_products`
--

CREATE TABLE `shop_products` (
  `id_product` int(11) NOT NULL,
  `title_product` varchar(100) NOT NULL,
  `price_product` float NOT NULL,
  `description_product` varchar(300) NOT NULL,
  `stock` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `id_category_shop` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `create_product` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_products`
--

INSERT INTO `shop_products` (`id_product`, `title_product`, `price_product`, `description_product`, `stock`, `quantity`, `id_category_shop`, `active`, `create_product`) VALUES
(1, 'Oeufs', 1.5, '6 Oeufs', 20, 1, 1, 1, '2020-02-25 15:47:06'),
(2, 'Savon', 5, 'Savon à la lavande blog de 250gr', 19, 1, 2, 1, '2020-02-25 11:19:34');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `connection_identifier` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `last_name`, `first_name`, `connection_identifier`, `password`, `role`, `active`) VALUES
(8, 'Elgueta', 'Anaïs', 'anais.elgueta21@gmail.com', '$2y$10$2hU5MbSaH3iP3s/sHJyMzO6GzRXRjaoqewIG1oJI4ahDM7CxNHVaK', 5, 1),
(9, 'Postel', 'nattan', 'nattan@gmail.fr', '$2y$10$OeV/PHainDunLStNqtps2.3zJuFAhwLCM3vkuMO2fn5rR8xPuc9by', 1, 1),
(10, 'Postel', 'Simon', 'simon.postel@dronelis.com', '$2y$10$jCXpEIEuWcy3UUrzArlAuOI/8aVkLRiKrCIQlmn9qnsn8ztEOxAYS', 1, 1),
(11, 'Postel', 'allan', 'anais.elgueta@yahoo.fr', '$2y$10$CO1rurNAl84tHPrCQXDPb.hPcYvUhu3d2DWApundQaRbSBHz5Nm6e', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `blog_categorys_articles`
--
ALTER TABLE `blog_categorys_articles`
  ADD PRIMARY KEY (`id_category_article`);

--
-- Index pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `blog_link_table`
--
ALTER TABLE `blog_link_table`
  ADD PRIMARY KEY (`id_link`);

--
-- Index pour la table `blog_picture_article`
--
ALTER TABLE `blog_picture_article`
  ADD PRIMARY KEY (`id_picture_article`);

--
-- Index pour la table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Index pour la table `category_pages`
--
ALTER TABLE `category_pages`
  ADD PRIMARY KEY (`id_category_page`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Index pour la table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id_content`);

--
-- Index pour la table `picture_pages`
--
ALTER TABLE `picture_pages`
  ADD PRIMARY KEY (`id_picture_page`);

--
-- Index pour la table `presentation_contents`
--
ALTER TABLE `presentation_contents`
  ADD PRIMARY KEY (`id_presentation`);

--
-- Index pour la table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`id_shop_cart`);

--
-- Index pour la table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`id_category_shop`);

--
-- Index pour la table `shop_payment`
--
ALTER TABLE `shop_payment`
  ADD PRIMARY KEY (`id_shop_payment`);

--
-- Index pour la table `shop_picture`
--
ALTER TABLE `shop_picture`
  ADD PRIMARY KEY (`id_picture`);

--
-- Index pour la table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `blog_categorys_articles`
--
ALTER TABLE `blog_categorys_articles`
  MODIFY `id_category_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `blog_link_table`
--
ALTER TABLE `blog_link_table`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `blog_picture_article`
--
ALTER TABLE `blog_picture_article`
  MODIFY `id_picture_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category_pages`
--
ALTER TABLE `category_pages`
  MODIFY `id_category_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `picture_pages`
--
ALTER TABLE `picture_pages`
  MODIFY `id_picture_page` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `presentation_contents`
--
ALTER TABLE `presentation_contents`
  MODIFY `id_presentation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `id_shop_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id_category_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `shop_payment`
--
ALTER TABLE `shop_payment`
  MODIFY `id_shop_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `shop_picture`
--
ALTER TABLE `shop_picture`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
