-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2015 a las 18:56:24
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
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('20938c247648407271e45254e1ef8def', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36', 1437149380, 'a:5:{s:9:"user_data";s:0:"";s:8:"username";s:4:"nora";s:3:"rol";s:1:"2";s:9:"id_status";i:1;s:9:"logged_in";b:1;}');

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
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cpu`
--

INSERT INTO `tbl_cpu` (`id_cpu`, `num_inventario`, `categoria`, `marca`, `modelo`, `hostname`, `num_serie`, `tipo`, `ubicacion`, `id_empleado`) VALUES
(1, 123, 'Equipo Prestado', 'Dell', 'GT2369', 'PC1', '123-456-789-123', 'Torre', 'Oficina Luis', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE IF NOT EXISTS `tbl_empleados` (
  `id_empleado` int(11) NOT NULL,
  `codigo_empleado` int(11) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_de_red` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `num_extension` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electonico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id_empleado`, `codigo_empleado`, `nombre_completo`, `unidad`, `usuario_de_red`, `contrasena`, `num_extension`, `correo_electonico`, `area`, `cargo`) VALUES
(1, 1234, 'Nora Julissa Escareño Sustaita', 'SECTURE', 'nora.escareno.sustaita', 'nora123', '232', 'nora@gmail.com', 'Administrativa', 'Recepcionista'),
(4, 987, 'Luis Villaseñor ', 'PALACIO', 'luis.villasenor', 'luis123', '62', 'luis.villasenor@aguascalientes.com.mx', 'Informatica', 'Dessarrollador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos`
--

CREATE TABLE IF NOT EXISTS `tbl_permisos` (
  `id` int(11) NOT NULL,
  `rol` int(1) NOT NULL,
  `componente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recurso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permiso_internet`
--

CREATE TABLE IF NOT EXISTS `tbl_permiso_internet` (
  `id` int(11) NOT NULL,
  `internet` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `messenger` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `redes_sociales` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ftp` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sigue` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `permiso_usuario_local` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_permiso_internet`
--

INSERT INTO `tbl_permiso_internet` (`id`, `internet`, `messenger`, `redes_sociales`, `ftp`, `sigue`, `permiso_usuario_local`, `id_empleado`) VALUES
(5, 'SI', 'SI', 'NO', 'SI', 'NO', 'NO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id_status` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `descripcion`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_rol`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_rol` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_rol`
--

INSERT INTO `tbl_tipo_rol` (`id_tipo`, `descripcion`) VALUES
(1, 'SuperAdministrador'),
(2, 'Administrador'),
(3, 'Capturista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nombre`, `username`, `password`, `id_tipo`, `id_status`, `email`, `tel`) VALUES
(1, 'juana', 'NORA', 'NORA123', 2, 0, 'NO@no.com', '7777777'),
(2, 'Jilissa', 'julissa', 'julissa123', 2, 0, 'h@h.com', '123456789'),
(9, 'paco', 'paco', 'paco', 2, 1, 'paco@gmail.com', '1265845'),
(13, 'julio', 'julio', 'julio', 1, 0, 'julio', '12145'),
(14, 'karina', 'karina', 'karina', 3, 0, 'karina@karina.com', '1234567891'),
(33, 'ana', 'ana', 'ana', 2, 1, 'ana@ana.com', '4564564561'),
(37, 'Gerardo Castañeda ', 'gerardo.casta', 'gerardo123', 3, 1, 'gerardo@gmail.com', '1234569871');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  ADD PRIMARY KEY (`id_cpu`), ADD UNIQUE KEY `num_inventario` (`num_inventario`), ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id_empleado`), ADD UNIQUE KEY `codigo_empleado` (`codigo_empleado`);

--
-- Indices de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_permiso_internet`
--
ALTER TABLE `tbl_permiso_internet`
  ADD PRIMARY KEY (`id`), ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `tbl_tipo_rol`
--
ALTER TABLE `tbl_tipo_rol`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`), ADD KEY `id_tipo` (`id_tipo`), ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  MODIFY `id_cpu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_permiso_internet`
--
ALTER TABLE `tbl_permiso_internet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
ADD CONSTRAINT `tbl_cpu_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_permiso_internet`
--
ALTER TABLE `tbl_permiso_internet`
ADD CONSTRAINT `tbl_permiso_internet_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
