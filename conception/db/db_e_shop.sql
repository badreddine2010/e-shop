-- Serveur de base de données
-- Serveur : 127.0.0.1 via TCP/IP
-- Type de serveur : MariaDB
-- Connexion au serveur : SSL n'est pas utilisé Documentation
-- Version du serveur : 10.4.17-MariaDB - mariadb.org binary distribution
-- Version du protocole : 10
-- Utilisateur : root@localhost
-- Jeu de caractères du serveur : UTF-8 Unicode (utf8mb4)
-- Serveur Web
-- Apache/2.4.46 (Win64) OpenSSL/1.1.1h PHP/8.0.0
-- Version du client de base de données : libmysql - mysqlnd 8.0.0
-- Extension PHP : mysqli Documentation curl Documentation mbstring Documentation
-- Version de PHP : 8.0.0
-- phpMyAdmin
-- Version : 5.0.4, dernière version stable : 5.1.1


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db_e_shop`
--

-- --------------------------------------------------------
DROP DATABASE IF EXISTS db_e_shop;

CREATE DATABASE db_e_shop;

USE db_e_shop;
--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` date NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `commande`
--



-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `designation` varchar(250) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL,
 `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`id_details_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `details_commande`
--




-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(3) NOT NULL AUTO_INCREMENT,
  `valideuser` tinyint(1) NOT NULL,
  `changepwd` tinyint(1) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) unsigned zerofill NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`,`valideuser`, `changepwd`,`mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 1 ,0,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin', 'admin', 'admin@exemple.com', 'M.', 'Paris', 75015, '33 rue mademoiselle', 'admin'),
(2, 1 ,0,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'membre', 'membre', 'membre@exemple.com', 'Mme', 'Toulouse', 31000, '55 rue bayard', 'user'),
(3, 1 ,0,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user', 'user', 'user@exemple.com', 'M.', 'Paris', 75015, '33 rue de Paris', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(3) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(1, '11-d-23', 'tshirt', 'Tshirt Col V bleu pétrole', 'Tee-shirt en coton flammé liseré contrastant', 'bleu', 'M', 'm', 'http://localhost/e_shop/photo/bleu.jpg', 20, 53),
(2, '66-f-15', 'tshirt', 'Tshirt Col V rouge', 'c''est vraiment un super tshirt en soir&eacute;e !', 'rouge', 'L', 'm','http://localhost/e_shop/photo/66-f-15_rouge.png', 15, 230),
(3, '88-g-77', 'tshirt', 'Tshirt Col rond vert', 'Il vous faut ce tshirt Made In France !!!', 'vert', 'L', 'm', 'http://localhost/e_shop/photo/88-g-77_vert.png', 29, 63),
(4, '55-b-38', 'tshirt', 'Tshirt jaune électrique', 'le jaune reviens &agrave; la mode, non? :-)', 'jaune', 'S', 'm', 'http://localhost/e_shop/photo/55-b-38_jaune.png', 20, 3),
(5, '31-p-33', 'tshirt', 'Tshirt noir original', 'voici un tshirt noir tr&egrave;s original :p', 'noir', 'XL', 'm', 'http://localhost/e_shop/photo/31-p-33_noir.jpg', 25, 80),
(6, '56-a-65', 'tshirt', 'Chemise Blanche', 'Les chemises c''est bien mieux que les tshirts', 'blanc', 'L', 'm', 'http://localhost/e_shop/photo/56-a-65_chemiseblanchem.jpg', 49, 73),
(7, '63-s-63', 'tshirt', 'Chemise Noir', 'Comme vous pouvez le voir c''est une chemise noir...', 'noir', 'M', 'm', 'http://localhost/e_shop/photo/63-s-63_chemisenoirm.jpg', 59, 120),
(8, '77-p-79', 'tshirt', 'Pull gris', 'Pull gris pour l''hiver', 'gris', 'XL', 'f', 'http://localhost/e_shop/photo/77-p-79_pullgrism2.jpg', 79, 99),
(9, '77-l-79', 'tshirt', 'Pull gris', 'Pull gris pour l''hiver', 'gris', 'XL', 'f', 'http://localhost/e_shop/photo/77-p-79_pullgrism2.jpg', 79, 99),
(10, '56-a-67', 'tshirt', 'Chemise Blanche', 'Les chemises c''est bien mieux que les tshirts', 'blanc', 'L', 'm', 'http://localhost/e_shop/photo/56-a-65_chemiseblanchem.jpg', 49, 73),
(11, '63-s-64', 'zeste', 'Chemise Noir', 'Comme vous pouvez le voir c''est une chemise noir...', 'noir', 'M', 'm', 'http://localhost/e_shop/photo/63-s-63_chemisenoirm.jpg', 59, 120),
(12, '77-p-72', 'piole', 'Pull gris', 'Pull gris pour l''hiver', 'gris', 'XL', 'f', 'http://localhost/e_shop/photo/77-p-79_pullgrism2.jpg', 79, 99),
(13, '77-l-71', 'azerty', 'Pull gris', 'Pull gris pour l''hiver', 'gris', 'XL', 'f', 'http://localhost/e_shop/photo/77-p-79_pullgrism2.jpg', 79, 99);

