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
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `email` (`email`)
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
(1, '123456Z', 'MAILLOT', 'MAILLOT bleu', 'MAILLOT bleu', 'bleu', 'XXL', 'm', 'photo/bleu.jpg', 10, 100),
(2, '324290AS', 'MAILLOT', 'MAILLOT rouge', 'MAILLOT rouge', 'rouge', 'M', 'm','photo/rouge.jpg', 11, 100),
(3, '400856PO', 'MAILLOT', 'MAILLOT vert', 'MAILLOT vert', 'vert', 'XS', 'm', 'photo/vert.jpg', 12, 100),
(4, '56FGEYP', 'MAILLOT', 'MAILLOT jaune', 'MAILLOT jaune', 'jaune', 'M', 'm', 'photo/jaune.jpg', 13, 100),
(5, '45301YT', 'MAILLOT', 'MAILLOT noir', 'MAILLOT noir', 'noir', 'M', 'm', 'photo/noir.jpg', 14, 100),
(6, 'ML348HB', 'GILET', 'GILETTE Blanche', 'GILET', 'blanc', 'S', 'm', 'photo/chemiseblanchem.jpg', 15, 100),
(7, '64JNS355', 'GILET', 'GILETTE Noire', 'GILET', 'noir', 'L', 'm', 'photo/chemisenoirem.jpg', 16, 100),
(8, 'POLSNGZ5', 'POLO', 'POLO gris', 'POLO gris', 'gris', 'XXS', 'm', 'photo/pullgrism.jpg', 17, 100);


-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `objet` varchar(50) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `dater` date NOT NULL,
 
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `details_commande`
--