-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2015 at 09:46 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventariobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eth`
--

CREATE TABLE IF NOT EXISTS `tbl_eth` (
  `id_eth` int(11) NOT NULL COMMENT 'id del registro',
  `interface` varchar(50) NOT NULL COMMENT 'Ethernet WiFi',
  `mac` varchar(20) NOT NULL COMMENT 'Mac Address',
  `ip` varchar(16) NOT NULL COMMENT 'IP',
  `broadcast` varchar(16) NOT NULL DEFAULT '10.1.17.255' COMMENT 'Broadcast',
  `mask` varchar(16) NOT NULL DEFAULT '255.255.255.0' COMMENT 'Subnet Mask',
  `puerta` varchar(16) NOT NULL DEFAULT '10.1.17.200' COMMENT 'Puerta de Enlace',
  `dns1` varchar(16) NOT NULL DEFAULT '10.1.111.1' COMMENT 'DNS Primario',
  `dns2` varchar(16) NOT NULL DEFAULT '10.1.111.2' COMMENT 'DNS Secundario',
  `id_cpu` int(2) NOT NULL COMMENT 'CPU que asignado',
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_eth`
--
ALTER TABLE `tbl_eth`
  ADD PRIMARY KEY (`id_eth`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_eth`
--
ALTER TABLE `tbl_eth`
  MODIFY `id_eth` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
