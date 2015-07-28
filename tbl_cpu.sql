-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2015 a las 07:02:36
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventariobi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cpu`
--

CREATE TABLE IF NOT EXISTS `tbl_cpu` (
  `id_cpu` int(11) NOT NULL,
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hostname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `num_serie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cpu`
--

INSERT INTO `tbl_cpu` (`id_cpu`, `num_inventario`, `categoria`, `marca`, `modelo`, `hostname`, `num_serie`, `tipo`, `ubicacion`, `status`, `id_empleado`) VALUES
(1, 123, 'Equipo Prestado', 'Dell', 'GT2369', 'PC1', '123-456-789-123', 'Torre', 'Oficina Luis', 0, 4),
(3, 9876, 'Equipo Propio', 'Asus', '2489a', 'CP5', '122-799-578', 'Torre', 'Oficina Luis', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  ADD PRIMARY KEY (`id_cpu`), ADD UNIQUE KEY `num_inventario` (`num_inventario`), ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  MODIFY `id_cpu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
ADD CONSTRAINT `tbl_cpu_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
