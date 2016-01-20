-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2015 at 09:19 PM
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
-- Table structure for table `tbl_ram`
--

CREATE TABLE IF NOT EXISTS `tbl_ram` (
  `id_ram` int(11) NOT NULL COMMENT 'id del registro',
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `pines` varchar(10) NOT NULL COMMENT 'Revoluciones por minuto',
  `capacidad` varchar(10) NOT NULL COMMENT 'Capacidad del DD',
  `id_cpu` int(2) NOT NULL COMMENT 'CPU que asignado',
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ram`
--
ALTER TABLE `tbl_ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ram`
--
ALTER TABLE `tbl_ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
