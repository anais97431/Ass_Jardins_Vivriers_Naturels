-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 24 Février 2020 à 15:57
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `base_jardin_vivrier`
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
  `create_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `blog_articles`
--

INSERT INTO `blog_articles` (`id_article`, `title_article`, `short_article`, `article`, `comment`, `active_article`, `create_article`) VALUES
(1, 'Abeilles solitaires, abeilles sauvages', 'Le jardin vivrier de Boisbonne offre une belle population d’abeilles sauvages...', 'Le jardin vivrier de Boisbonne offre une belle population d’abeilles sauvages\r\n\r\ncelles qui ne font pas de miel mais qui pollinisent la flore sauvage et nos cultures au passage,\r\n\r\net il était opportun de faire un inventaire pour avoir une idée précise du nombre d’espèces en présence\r\n\r\nsachant que plus de 1000 espèces d’abeilles peuplent nos contrées françaises).\r\n\r\nEn début d’année 2019, nous avons décidé de faire appel à l’expertise du Centre Vétérinaire de la Faune Sauvage et des Ecosystèmes d’ONIRIS pour faire cet inventaire.\r\n\r\nOlivier (directeur) et Cloé (service civique) sont donc venus à plusieurs reprises au printemps et en été faire des prélèvements à l’aide de leur grand filet. De belles découvertes en perspective!', 1, 1, '2020-02-24 11:21:23'),
(2, 'Nouveau : café associatif…', 'Un moment de détente et de reconnexion à la nature pour les salariés de la Chantrerie, une p’tite pause café bio...', 'Un moment de détente et de reconnexion à la nature pour les salariés de la Chantrerie, une p’tite pause café bio.\r\n\r\nEn expérimentation en 2019, l’idée d’un espace café associatif a été validée par les « testeurs »… Reste à poursuivre quelques aménagements pour qu’il soit tout à fait opérationnel.\r\n\r\nDéjà un grand merci aux étudiants des groupes DEFI 2018-2019 de l’Ecole Supérieure du Bois (Alan, Alice, Julien et Pierre) pour la réalisation d’un coin cuisine pour notre espace convivial qui devient de plus en plus cosy…', 1, 1, '2020-02-24 11:22:11');

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
-- Contenu de la table `blog_categorys_articles`
--

INSERT INTO `blog_categorys_articles` (`id_category_article`, `category_article_name`, `create_category`) VALUES
(1, 'Jardin', '2020-02-23 10:28:26');

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
-- Contenu de la table `blog_link_table`
--

INSERT INTO `blog_link_table` (`id_link`, `id_user`, `id_article`, `id_category_article`) VALUES
(5, 8, 1, 1),
(6, 8, 0, 8),
(7, 8, 0, 8),
(8, 8, 0, 8),
(9, 8, 2, 1);

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
-- Contenu de la table `blog_picture_article`
--

INSERT INTO `blog_picture_article` (`id_picture_article`, `title_picture_article`, `id_article`, `date_picture_article`) VALUES
(3, 'bourdon_sur_gesse_de_nissole_mai_2019.jpg', 1, '2020-02-24 09:57:12'),
(4, 'inventaire_abeilles_sauvages_2019.jpg', 1, '2020-02-24 09:57:12'),
(5, 'inventaire_abeilles_sauvages_2019_2.jpg', 1, '2020-02-24 09:57:12'),
(12, 'cafe_du_01_avril_2019.jpg', 2, '2020-02-24 10:53:32'),
(13, 'cuisine_defi_mai_2019.jpg', 2, '2020-02-24 10:53:32');

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
  `presentation_category_page` text NOT NULL,
  `date_category_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category_pages`
--

INSERT INTO `category_pages` (`id_category_page`, `title_category_page`, `name_category_page`, `presentation_category_page`, `date_category_page`) VALUES
(1, 'Nous connaître', 'nous_connaitre', '', '2020-02-18 08:10:05'),
(2, 'Sensation Nature', 'sensation_nature', '', '2020-02-18 08:10:18'),
(3, 'Café Associatif', 'cafe_associatif', '', '2020-02-18 08:10:35'),
(4, 'Emplettes Solidaires', 'emplettes_solidaires', '', '2020-02-18 08:10:45');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `url_page` varchar(150) NOT NULL,
  `title_page` varchar(150) NOT NULL,
  `id_category_page` int(11) NOT NULL,
  `date_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id_page`, `url_page`, `title_page`, `id_category_page`, `date_page`) VALUES
(1, 'les_cherubins', 'Les cherubins', 2, '2020-02-20 08:22:14'),
(2, 'groupement_achat', 'Groupement d\'achat', 4, '2020-02-20 08:22:22');

-- --------------------------------------------------------

--
-- Structure de la table `page_contents`
--

CREATE TABLE `page_contents` (
  `id_content` int(11) NOT NULL,
  `title_content` varchar(150) NOT NULL,
  `presentation_content` text NOT NULL,
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
  `id_content` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `id_category_page` int(11) NOT NULL,
  `order_picture` int(11) NOT NULL,
  `carousel` tinyint(1) NOT NULL DEFAULT '0',
  `create_picture_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Contenu de la table `shop_cart`
--

INSERT INTO `shop_cart` (`id_shop_cart`, `id_product`, `id_user`, `id_shop_payment`, `price_product`, `quantity_cart`, `validation_payment`, `active`, `create_shop_cart`) VALUES
(1, 1, 8, 1, 2, 9, 1, 1, '2020-02-24 14:35:37');

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
-- Contenu de la table `shop_category`
--

INSERT INTO `shop_category` (`id_category_shop`, `title_category_shop`, `img_category_shop`, `create_category_shop`) VALUES
(1, 'Produits alimentaires', 'oeufs2.jpg', '2020-02-19 21:40:51'),
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
-- Contenu de la table `shop_payment`
--

INSERT INTO `shop_payment` (`id_shop_payment`, `number_ordered`, `id_user`, `date_payment`) VALUES
(1, 1, 8, '2020-02-20 13:15:59'),
(2, 1, 8, '2020-02-20 13:21:51'),
(3, 1, 8, '2020-02-20 13:31:33'),
(4, 1, 8, '2020-02-20 13:33:23'),
(5, 1, 8, '2020-02-20 13:54:35'),
(6, 1, 8, '2020-02-20 13:57:09'),
(7, 1, 8, '2020-02-20 13:58:46');

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
-- Contenu de la table `shop_picture`
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
-- Contenu de la table `shop_products`
--

INSERT INTO `shop_products` (`id_product`, `title_product`, `price_product`, `description_product`, `stock`, `quantity`, `id_category_shop`, `active`, `create_product`) VALUES
(1, 'Oeufs', 2, '6 Oeufs', 20, 1, 1, 1, '2020-02-19 21:06:02');

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
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `last_name`, `first_name`, `connection_identifier`, `password`, `role`, `active`) VALUES
(8, 'Elgueta', 'Anaïs', 'anais@gmail.com', '$2y$10$SfCxZltr./b6Ta7Zfr5yj.YevwXayBgRDlCzqxswST0F2e8YCyj1i', 5, 1);

--
-- Index pour les tables exportées
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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `blog_categorys_articles`
--
ALTER TABLE `blog_categorys_articles`
  MODIFY `id_category_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `blog_link_table`
--
ALTER TABLE `blog_link_table`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `blog_picture_article`
--
ALTER TABLE `blog_picture_article`
  MODIFY `id_picture_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `category_pages`
--
ALTER TABLE `category_pages`
  MODIFY `id_category_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT pour la table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `id_shop_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id_category_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `shop_payment`
--
ALTER TABLE `shop_payment`
  MODIFY `id_shop_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `shop_picture`
--
ALTER TABLE `shop_picture`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
