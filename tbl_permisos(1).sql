-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2015 at 06:58 PM
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
-- Table structure for table `tbl_permisos`
--

CREATE TABLE IF NOT EXISTS `tbl_permisos` (
  `id` int(11) NOT NULL,
  `rol` int(1) NOT NULL,
  `componente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recurso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`id`, `rol`, `componente`, `recurso`, `permiso`) VALUES
(2, 2, 'permisos', 'index', 1),
(3, 3, 'permisos', '/index', 1),
(4, 2, 'empleados', 'index', 1),
(5, 2, 'users', 'index', 1),
(6, 2, 'home', 'index', 1),
(7, 3, 'home', '/index', 1),
(8, 3, 'empleados', 'index', 1),
(9, 3, 'users', '/index', 1),
(10, 2, 'home', 'seguridad', 1),
(11, 2, 'home', 'bienes_informaticos', 1),
(12, 2, 'home', 'reportes', 1),
(13, 3, 'home', '/bienes_informaticos', 1),
(14, 3, 'home', 'reportes', 1),
(15, 3, 'home', 'seguridad', 1),
(16, 2, 'empleados', 'crear', 1),
(17, 3, 'empleados', '/crear', 1),
(18, 2, 'empleados', 'editar', 1),
(19, 3, 'empleados', '/editar', 1),
(20, 2, 'empleados', 'actualizar', 1),
(21, 3, 'empleados', '/actualizar', 1),
(22, 2, 'empleados', 'eliminar', 1),
(23, 3, 'empleados', '/eliminar', 1),
(24, 2, 'empleados', 'detalles', 1),
(25, 3, 'empleados', 'detalles', 1),
(26, 2, 'permisos', 'activar', 1),
(27, 3, 'permisos', '/activar', 1),
(28, 2, 'permisos', 'desactivar', 1),
(29, 3, 'permisos', '/desactivar', 1),
(30, 2, 'permisos', 'create', 1),
(31, 3, 'permisos', '/create', 1),
(32, 2, 'users', 'crear', 1),
(33, 3, 'users', '/crear', 1),
(34, 2, 'users', 'editar', 1),
(35, 3, 'users', '/editar', 1),
(36, 2, 'users', 'actualizar', 1),
(37, 3, 'users', '/actualizar', 1),
(38, 2, 'users', 'filtrar_por_rol', 1),
(39, 3, 'users', '/filtrar_por_rol', 1),
(40, 2, 'users', 'filtrar_por_usuario', 1),
(41, 3, 'users', 'filtrar_por_usuario', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
