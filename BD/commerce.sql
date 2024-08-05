-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2023 at 06:23 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Mdp` varchar(25) NOT NULL,
  `Statut` varchar(25) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `Nom`, `UserName`, `Mdp`, `Statut`) VALUES
(1, 'Netcheyo', 'admin', 'admin', 'actif');

-- --------------------------------------------------------

--
-- Table structure for table `telephones`
--

DROP TABLE IF EXISTS `telephones`;
CREATE TABLE IF NOT EXISTS `telephones` (
  `id_phone` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Couleur` varchar(50) NOT NULL,
  `Storage` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Prix` double NOT NULL,
  `Photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    tel int,
    email VARCHAR(255),
    mot_de_passe VARCHAR(255)
);

