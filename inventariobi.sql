-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2015 a las 17:20:25
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
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE IF NOT EXISTS `tbl_empleados` (
  `id_interno` int(11) NOT NULL,
  `codigo_empleado` int(11) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_de_red` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `num_extension` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electonico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id_interno`, `codigo_empleado`, `nombre_completo`, `unidad`, `usuario_de_red`, `contrasena`, `num_extension`, `correo_electonico`, `area`, `cargo`) VALUES
(1, 1234, 'Nora Julissa Escareño Sustaita', 'SECTURE', 'nora.escareno', 'nora123', '232', 'nora@gmail.com', 'Administrativa', 'Recepcionista'),
(2, 2149, 'Ana Laura Arrellin Reyes', 'SECTURE', 'laura.arrellin', 'laura123', '25', 'ana@hotmail.com', 'Informatica', 'Mantenimiento'),
(4, 987, 'Luis Villaseñor ', 'PALACIO', 'luis.villasenor', 'luis123', '62', 'luis.villasenor@aguascalientes.com.mx', 'Informatica', 'Dessarrollador');

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
-- Estructura de tabla para la tabla `tbl_unidad`
--

CREATE TABLE IF NOT EXISTS `tbl_unidad` (
  `id_unidad` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nombre`, `username`, `password`, `id_tipo`, `id_status`, `email`, `tel`) VALUES
(1, 'juana', 'NORA', 'NORA123', 2, 0, 'NO@no.com', '7777777'),
(2, 'Jilissa', 'julissa', 'julissa123', 2, 0, 'h@h.com', '123456789'),
(9, 'paco', 'paco', 'paco', 1, 0, 'pco', '1265845'),
(13, 'julio', 'julio', 'julio', 1, 0, 'julio', '12145'),
(14, 'karina', 'karina', 'karina', 3, 0, 'karina@karina.com', '1234567891'),
(33, 'ana', 'ana', 'ana', 2, 1, 'ana@ana.com', '4564564561');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id_interno`), ADD UNIQUE KEY `codigo_empleado` (`codigo_empleado`);

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
-- Indices de la tabla `tbl_unidad`
--
ALTER TABLE `tbl_unidad`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`), ADD KEY `id_tipo` (`id_tipo`), ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id_interno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_unidad`
--
ALTER TABLE `tbl_unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
