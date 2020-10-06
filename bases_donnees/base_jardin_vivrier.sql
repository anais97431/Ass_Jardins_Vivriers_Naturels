-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 fév. 2020 à 22:01
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `blog_articles`;
CREATE TABLE IF NOT EXISTS `blog_articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title_article` varchar(50) NOT NULL,
  `short_article` varchar(150) NOT NULL,
  `article` text NOT NULL,
  `comment` tinyint(1) NOT NULL DEFAULT '1',
  `active_article` tinyint(1) NOT NULL DEFAULT '1',
  `create_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_articles`
--

INSERT INTO `blog_articles` (`id_article`, `title_article`, `short_article`, `article`, `comment`, `active_article`, `create_article`) VALUES
(1, 'Abeilles solitaires, abeilles sauvages', '', 'Le jardin vivrier de Boisbonne offre une belle population d’abeilles sauvages\r\n\r\ncelles qui ne font pas de miel mais qui pollinisent la flore sauvage et nos cultures au passage,\r\n\r\net il était opportun de faire un inventaire pour avoir une idée précise du nombre d’espèces en présence\r\n\r\nsachant que plus de 1000 espèces d’abeilles peuplent nos contrées françaises).\r\n\r\nEn début d’année 2019, nous avons décidé de faire appel à l’expertise du Centre Vétérinaire de la Faune Sauvage et des Ecosystèmes d’ONIRIS pour faire cet inventaire.\r\n\r\nOlivier (directeur) et Cloé (service civique) sont donc venus à plusieurs reprises au printemps et en été faire des prélèvements à l’aide de leur grand filet. De belles découvertes en perspective!', 1, 1, '2020-02-23 21:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `blog_categorys_articles`
--

DROP TABLE IF EXISTS `blog_categorys_articles`;
CREATE TABLE IF NOT EXISTS `blog_categorys_articles` (
  `id_category_article` int(11) NOT NULL AUTO_INCREMENT,
  `category_article_name` varchar(150) NOT NULL,
  `create_category` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_category_article`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_categorys_articles`
--

INSERT INTO `blog_categorys_articles` (`id_category_article`, `category_article_name`, `create_category`) VALUES
(1, 'Jardin', '2020-02-23 10:28:26');

-- --------------------------------------------------------

--
-- Structure de la table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(300) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `id_article` int(11) NOT NULL,
  `active_comment` tinyint(1) NOT NULL DEFAULT '0',
  `create_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blog_link_table`
--

DROP TABLE IF EXISTS `blog_link_table`;
CREATE TABLE IF NOT EXISTS `blog_link_table` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_category_article` int(11) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog_link_table`
--

INSERT INTO `blog_link_table` (`id_link`, `id_user`, `id_article`, `id_category_article`) VALUES
(5, 8, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `blog_picture_article`
--

DROP TABLE IF EXISTS `blog_picture_article`;
CREATE TABLE IF NOT EXISTS `blog_picture_article` (
  `id_picture_article` int(11) NOT NULL AUTO_INCREMENT,
  `title_picture_article` varchar(150) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date_picture_article` timestamp NOT NULL,
  PRIMARY KEY (`id_picture_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE IF NOT EXISTS `blog_tags` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(150) NOT NULL,
  `id_article` int(11) NOT NULL,
  `create_tag` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category_pages`
--

DROP TABLE IF EXISTS `category_pages`;
CREATE TABLE IF NOT EXISTS `category_pages` (
  `id_category_page` int(11) NOT NULL AUTO_INCREMENT,
  `title_category_page` varchar(150) NOT NULL,
  `name_category_page` varchar(150) NOT NULL,
  `presentation_category_page` text NOT NULL,
  `date_category_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_category_page`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category_pages`
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

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `url_page` varchar(150) NOT NULL,
  `title_page` varchar(150) NOT NULL,
  `id_category_page` int(11) NOT NULL,
  `date_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id_page`, `url_page`, `title_page`, `id_category_page`, `date_page`) VALUES
(1, 'les_cherubins', 'Les cherubins', 2, '2020-02-20 08:22:14'),
(2, 'groupement_achat', 'Groupement d\'achat', 4, '2020-02-20 08:22:22');

-- --------------------------------------------------------

--
-- Structure de la table `page_contents`
--

DROP TABLE IF EXISTS `page_contents`;
CREATE TABLE IF NOT EXISTS `page_contents` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `title_content` varchar(150) NOT NULL,
  `presentation_content` text NOT NULL,
  `id_page` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price_activity` float NOT NULL,
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `picture_pages`
--

DROP TABLE IF EXISTS `picture_pages`;
CREATE TABLE IF NOT EXISTS `picture_pages` (
  `id_picture_page` int(11) NOT NULL AUTO_INCREMENT,
  `title_picture_page` varchar(150) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `id_category_page` int(11) NOT NULL,
  `order_picture` int(11) NOT NULL,
  `carousel` tinyint(1) NOT NULL DEFAULT '0',
  `create_picture_page` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_picture_page`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
CREATE TABLE IF NOT EXISTS `shop_cart` (
  `id_shop_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_shop_payment` int(11) NOT NULL DEFAULT '0',
  `price_product` float NOT NULL,
  `quantity_cart` int(11) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `create_shop_cart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_shop_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_cart`
--

INSERT INTO `shop_cart` (`id_shop_cart`, `id_product`, `id_user`, `id_shop_payment`, `price_product`, `quantity_cart`, `validation`, `active`, `create_shop_cart`) VALUES
(1, 1, 8, 0, 2, 9, 0, 1, '2020-02-20 10:44:25');

-- --------------------------------------------------------

--
-- Structure de la table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE IF NOT EXISTS `shop_category` (
  `id_category_shop` int(11) NOT NULL AUTO_INCREMENT,
  `title_category_shop` varchar(150) NOT NULL,
  `img_category_shop` varchar(150) NOT NULL,
  `create_category_shop` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_category_shop`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_category`
--

INSERT INTO `shop_category` (`id_category_shop`, `title_category_shop`, `img_category_shop`, `create_category_shop`) VALUES
(1, 'Produits alimentaires', 'oeufs2.jpg', '2020-02-19 21:40:51'),
(2, 'Produits non alimentaires', 'oeufs.jpg', '2020-02-19 10:33:19');

-- --------------------------------------------------------

--
-- Structure de la table `shop_payment`
--

DROP TABLE IF EXISTS `shop_payment`;
CREATE TABLE IF NOT EXISTS `shop_payment` (
  `id_shop_payment` int(11) NOT NULL AUTO_INCREMENT,
  `number_ordered` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_payement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_shop_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_payment`
--

INSERT INTO `shop_payment` (`id_shop_payment`, `number_ordered`, `id_user`, `date_payement`) VALUES
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

DROP TABLE IF EXISTS `shop_picture`;
CREATE TABLE IF NOT EXISTS `shop_picture` (
  `id_picture` int(11) NOT NULL AUTO_INCREMENT,
  `title_picture` varchar(150) NOT NULL,
  `id_product` int(11) NOT NULL,
  `create_img` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_picture`
--

INSERT INTO `shop_picture` (`id_picture`, `title_picture`, `id_product`, `create_img`) VALUES
(11, 'bourdon-sur-gesse-de-nissole-mai-2019.jpg', 0, '2020-02-23 21:53:24'),
(12, 'inventaire-abeilles-sauvages-2019.jpg', 0, '2020-02-23 21:53:24'),
(13, 'inventaire-abeilles-sauvages-2019-2.jpg', 0, '2020-02-23 21:53:24'),
(14, 'bourdon-sur-gesse-de-nissole-mai-2019.jpg', 1, '2020-02-23 21:55:16'),
(15, 'inventaire-abeilles-sauvages-2019.jpg', 1, '2020-02-23 21:55:16'),
(16, 'inventaire-abeilles-sauvages-2019-2.jpg', 1, '2020-02-23 21:55:16');

-- --------------------------------------------------------

--
-- Structure de la table `shop_products`
--

DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE IF NOT EXISTS `shop_products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `title_product` varchar(100) NOT NULL,
  `price_product` float NOT NULL,
  `description_product` varchar(300) NOT NULL,
  `stock` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `id_category_shop` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `create_product` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shop_products`
--

INSERT INTO `shop_products` (`id_product`, `title_product`, `price_product`, `description_product`, `stock`, `quantity`, `id_category_shop`, `active`, `create_product`) VALUES
(1, 'Oeufs', 2, '6 Oeufs', 20, 1, 1, 1, '2020-02-19 21:06:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `connection_identifier` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `last_name`, `first_name`, `connection_identifier`, `password`, `role`, `active`) VALUES
(8, 'Elgueta', 'Anaïs', 'anais@gmail.com', '$2y$10$SfCxZltr./b6Ta7Zfr5yj.YevwXayBgRDlCzqxswST0F2e8YCyj1i', 5, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
