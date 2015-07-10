-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2015 a las 16:55:53
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
('074a6ea2e7644f3b4fe2071784987c78', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537883, ''),
('0b7cdce855ab79077e1c3be7b326e1fa', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('0bf1721f56dc8d4828d5342bc7b74478', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537610, ''),
('122cdbecc1679398fcfd8550341647b9', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537608, ''),
('146a5d22fb40b19615a127ee2b4d77fb', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538092, ''),
('1c7018d48bf08373bd533d31ea668480', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538824, ''),
('1d72ab6477bc3e1bf71cb836fd99d2c4', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537610, ''),
('1e642101624e47a08eca45cce53644b2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538066, ''),
('203c228f25bb6e153a7ba7c149aa7978', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538094, ''),
('22d2ae0d3d701fe80b3d2e5d12416765', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('2b0d672acd2003bd3f47878df9c46946', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537607, ''),
('30a41ec2370e7cde8c3536fbf2badaac', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538133, ''),
('348c09fc932609550d19097aa30f8fe3', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537883, ''),
('35844dd390561bc8b00f6cf3c7ef5dcc', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('386482bad3f67f8613086971d2395805', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538093, ''),
('399ecfb459fbe38130818f7c57e41db7', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538134, ''),
('3b0a579d5996e4086b9cb06762cb7925', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537608, ''),
('3b7885a5973f43159e5d0cecc8415455', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538067, ''),
('416dfe1499c8bdf87879e3f0af335931', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538035, ''),
('4602bbc7bb8f77ede205474706854c68', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537607, ''),
('4a3dc54665979193389c5db25c150570', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537882, ''),
('50c495b54d573ab01b53fc55955be2d8', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538092, ''),
('5749ee503bb48afb4b92745a30ceb8b2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538134, ''),
('576f9ccd54d0c1d44c0e80fbf96c30c1', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538094, ''),
('5c5f1712227ac2b656a90ea995d2bbdf', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538035, ''),
('5cdbc497a5f6bc7e52e46210aa8cc5bc', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538066, ''),
('5dc8af181215070bf2ec4bd1070dd3b4', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538094, ''),
('60a7fb49728fa283e2e9ae4eaecc3fed', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537614, ''),
('62eaf07f9ef672f3dfd0cce1e9d90a48', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538093, ''),
('6502a23e31ca2d0513c00e226568e03b', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538231, ''),
('65987ed1fe20b8c7797e1190f3b4177a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('65a0446bc2f4d7fbc1056e47bc03ea0a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538094, ''),
('6ade5a1132bbae60ffaa8d378b748909', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('6de2f1bd0bf4fba777dfd4aba116e85d', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538824, ''),
('70191e860bb378243edce9b7aae32bc0', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538038, ''),
('74697cc48a2ee5aaf2660552ce8e7cc2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538230, ''),
('7bb4792c98b54f565af0d7beb499923c', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436539691, 'a:5:{s:9:"user_data";s:0:"";s:8:"username";s:4:"nora";s:3:"rol";s:1:"2";s:9:"id_status";i:1;s:9:"logged_in";b:1;}'),
('807c1461b1d3656dec35a25f80d6ec97', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('826b55594f69fc1acaf3419656c8449a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537609, ''),
('82fba03a75472fcc29b7033962ce56cd', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538824, ''),
('8614ec1ab009f6d6e1a8913277b52782', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537609, ''),
('94b96c71d26d65fd2276a0c14dedf748', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('97cf33d426d33cadd83e0a863dfd2dd9', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537607, ''),
('9a1b9bfe13b31d8eee3bea39f4af8523', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538093, ''),
('9a3ce4ac3b780d3219109566960203f8', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538824, ''),
('9c1dab0034160f4bbe92fcd41fa78547', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538093, ''),
('9d2a92f59737e63b3a84f61da8479d54', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537882, ''),
('a41330306394f9bbba9becca3d0194f7', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538231, ''),
('a497c127e0b309ceadf68891c929987d', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537614, ''),
('aae933d205dad6607d83eff790dee1c2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538038, ''),
('adb388b19965625ee27885a193973313', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537610, ''),
('b0731c58306022182cd74e25b2344343', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538133, ''),
('b82bca4c8c7d35763681723a69ef2a0f', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538092, ''),
('bc5854e3921d0da6567126b8113d68d4', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537609, ''),
('be1d29200c366140cc5e1d6330b716a3', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538092, ''),
('bf121dedfa51b2b17dc55acd4b8de30f', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537609, ''),
('bf5c86d7c8bc115afb683c1ea0c9a407', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537614, ''),
('c4dc59ecdb7fbea04ef023952cd6b034', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538824, ''),
('cf10df6ddbd261992ee76114db32bed5', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538232, ''),
('d126c60c4582e6166ee31240e895461d', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538231, ''),
('d8a36ee0f48af77e28a8959e6917518c', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538231, ''),
('db4d7a27df87c9d95620aeda6bb46333', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538067, ''),
('ddfe3fd1ed2048e935da0ed80cd0c659', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537614, ''),
('de07f66458ad506f695789239c83950b', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538232, ''),
('e049b5b2fdc1bbd7a2468bd89f106040', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('e1f0927b805c56b0bfd27c9a31cc1030', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538231, ''),
('eae2e86bf5f5b9b54c16e8b114796790', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537608, ''),
('ef8e84f2304adcfa10d8e27fecaa5c55', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537608, ''),
('f0962fee583ddf78a70f10538a552067', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537610, ''),
('f507f754b8756fb4dc35a1f364aa2ab1', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('f5a4c2a2892e5c7614d57bc005eb7a59', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538230, ''),
('f7f8f8b658b352e6aade9a7190c2e5ec', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, ''),
('f8c5b886554225f46b5b6155b502a1b3', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436537607, ''),
('fdf8d1f3b24f092d2907dfd13a0983a1', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436538825, '');

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
(1, 123, 'Equipo Prestado', 'Dell', 'GT2369', 'PC1', '123-456-789-123', 'Torre', 'Oficina Luis', 4),
(2, 5897, 'Personal', 'HP', 'LK23', 'PC2', '1232584588', 'Torre', 'Oficina Julio', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id_empleado`, `codigo_empleado`, `nombre_completo`, `unidad`, `usuario_de_red`, `contrasena`, `num_extension`, `correo_electonico`, `area`, `cargo`) VALUES
(1, 1234, 'Nora Julissa Escareño Sustaita', 'SECTURE', 'nora.escareno', 'nora123', '232', 'nora@gmail.com', 'Administrativa', 'Recepcionista'),
(2, 2149, 'Ana Laura Arrellin Reyes', 'SECTURE', 'laura.arrellin', 'laura123', '25', 'ana@hotmail.com', 'Informatica', 'Mantenimiento'),
(4, 987, 'Luis Villaseñor ', 'PALACIO', 'luis.villasenor', 'luis123', '62', 'luis.villasenor@aguascalientes.com.mx', 'Informatica', 'Dessarrollador'),
(5, 1, 'a', 'a', 'a', 'a', 'a', 'a', 's', 's');

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
-- AUTO_INCREMENT de la tabla `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  MODIFY `id_cpu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
