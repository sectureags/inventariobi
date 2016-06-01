-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2016 at 07:31 PM
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
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_cpus`
--

CREATE TABLE IF NOT EXISTS `status_cpus` (
  `id_status_cpu` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_cpus`
--

INSERT INTO `status_cpus` (`id_status_cpu`, `nombre`) VALUES
(1, 'No Asignado'),
(2, 'Asignado'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cpu`
--

CREATE TABLE IF NOT EXISTS `tbl_cpu` (
  `id_cpu` int(11) NOT NULL,
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hostname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_serie` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cpu`
--

INSERT INTO `tbl_cpu` (`id_cpu`, `num_inventario`, `categoria`, `marca`, `modelo`, `hostname`, `num_serie`, `tipo`, `ubicacion`, `status`, `id_empleado`) VALUES
(1, 137269, 'DESKTOP', 'LANIX', 'GT2369', 'SECTURE137269D', '123-456-789-123', 'DESKTOP', 'NODO D-10', 2, 4),
(3, 101010, 'Torre', 'DELL', '510XD', 'SECTURE101010D', '2489a', 'CP5', 'OFICINA DE LUIS VILLASEÑOR NODO 10', 1, 5),
(4, 91779, 'gobags', 'DELL', 'OPTIPLEX GX620', 'SECTURE91779D', '123456', 'DESKTOP', 'PRIMER PISO EN INFORMATICA', 2, 4),
(5, 111113, 'PERSONAL', 'DELL', 'm-2017', 'SECTURE158802L333', '1233456', '32 bits', 'Dentro de las instalaciones', 2, 4),
(6, 101012, 'PERSONAL', 'DELL', 'MSU0846', 'SECTURE101012d', '1233456', 'DESKTOP', 'DEPARTAMENTO DE INFORMATICA', 1, 4),
(7, 101016, 'SECTURE', 'LANIX', 'MSU0846', 'SECTURE101016D', '1233456', 'DESKTOP', 'SECTURE', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dd`
--

CREATE TABLE IF NOT EXISTS `tbl_dd` (
  `id_dd` int(11) NOT NULL COMMENT 'id del registro',
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `rpm` varchar(10) NOT NULL COMMENT 'Revoluciones por minuto',
  `capacidad` varchar(10) NOT NULL COMMENT 'Capacidad del DD',
  `id_cpu` int(4) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dd`
--

INSERT INTO `tbl_dd` (`id_dd`, `categoria`, `tipo`, `marca`, `modelo`, `rpm`, `capacidad`, `id_cpu`, `status`) VALUES
(1, 'Original', 'SATA', 'SAMSUNG', 'HD040GJ', '7200', '40 GB', 3, 1),
(3, 'oem', 'sata', 'Seagate', 'm-2016', '7200', '500 GB', 4, 1),
(4, 'oem', 'sata', 'Seagate', 'm-2016', '7200', '500 GB', 4, 1),
(9, 'oem', 'sata', 'Seagate', 'ddddd', '7200', '500 GB', 3, 1),
(10, 'oem', 'sata', 'mmmmmm', 'm-2016', '7200', '500 GB', 3, 1),
(11, 'oem', 'sata', 'Seagate', 'dddddddd', '7200', '500 GB', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empleados`
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
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id_empleado`, `codigo_empleado`, `nombre_completo`, `unidad`, `usuario_de_red`, `contrasena`, `num_extension`, `correo_electonico`, `area`, `cargo`, `id_status`) VALUES
(1, 1234, 'Nora Julissa Escareño Sustaita', '0', 'nora.escareno', 'nora123', '232', 'norajulissa@gmail.com', '0', 'Calidad', 1),
(4, 30050, 'Luis Gabriel Villaseñor Alarcon', '0', 'luis.villasenor', 'xxxxxx', '4336', 'luis.villasenor@aguascalientes.com.mx', '8', 'Auxiliar de Informatica', 1),
(5, 12368, 'Julio Ramirez Bravo', '0', 'julio.ramirez', 'juio123', '258', 'julio@gmail.com', '0', 'Encargado', 1),
(6, 0, 'a', '0', 'a', 'a', 'a', 'a@com', '0', 'aaaaaaaaaaaaaaa', 1),
(8, 22, 'bbbbbbbbb', '0', 'b', 'b', 'b', 'b@com.mx', '0', 'b', 1),
(9, 98755, 'r', '0', 'R', 'R', 'R', 'R@com', '0', 'R', 1),
(10, 58, 'n', '0', 'n', 'n', 'n', 'n@com.mx', '0', 'n', 1),
(11, 9999, 'Amigo Hal', '0', 'hal', 'hal', '0000', 'hal@amigo.com', '8', 'empleado demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ipconfig`
--

CREATE TABLE IF NOT EXISTS `tbl_ipconfig` (
  `id_ipconfig` int(11) NOT NULL COMMENT 'id del registro',
  `interface` varchar(50) NOT NULL DEFAULT 'eth0' COMMENT 'Ethernet WiFi',
  `mac` varchar(20) NOT NULL COMMENT 'Mac Address',
  `ip` varchar(16) NOT NULL COMMENT 'IP',
  `broadcast` varchar(16) NOT NULL DEFAULT '10.1.17.255' COMMENT 'Broadcast',
  `mask` varchar(16) NOT NULL DEFAULT '255.255.255.0' COMMENT 'Subnet Mask',
  `puerta` varchar(16) NOT NULL DEFAULT '10.1.17.200' COMMENT 'Puerta de Enlace',
  `dns1` varchar(16) NOT NULL DEFAULT '10.1.111.1' COMMENT 'DNS Primario',
  `dns2` varchar(16) NOT NULL DEFAULT '10.1.111.2' COMMENT 'DNS Secundario',
  `id_cpu` int(2) NOT NULL COMMENT 'CPU que asignado',
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ipconfig`
--

INSERT INTO `tbl_ipconfig` (`id_ipconfig`, `interface`, `mac`, `ip`, `broadcast`, `mask`, `puerta`, `dns1`, `dns2`, `id_cpu`, `status`) VALUES
(1, 'eth0', 'e0:69:95:ab:1b:44', '10.1.17.224', '10.1.17.255', '255.255.255.0', '10.1.17.200', '10.1.111.1', '10.1.111.2', 1, 1),
(2, 'eth0', '00:14:22:42:27:db', '10.1.17.10', '10.1.17.255', '255.255.255.0', '10.1.17.200', '10.1.111.1', '10.1.111.2', 4, 1),
(3, 'eth0', '00:14:22:42:27:db', 'localhost', '10.1.17.255', '255.255.255.0', '10.1.17.200', '10.1.111.1', '10.1.111.2', 3, 1),
(4, 'eth0', '00:14:22:42:27:db', 'localhost', '10.1.17.255', '255.255.255.0', '10.1.17.200', '10.1.111.1', '10.1.111.2', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_licencias`
--

CREATE TABLE IF NOT EXISTS `tbl_licencias` (
  `id_licencia` int(11) NOT NULL COMMENT 'id del registro',
  `categoria` varchar(50) NOT NULL COMMENT 'SO PCL PSL',
  `tipo` varchar(20) NOT NULL COMMENT 'MOLP INDIVIDUAL',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `pines` varchar(10) NOT NULL COMMENT 'Revoluciones por minuto',
  `capacidad` varchar(10) NOT NULL COMMENT 'Capacidad del DD',
  `id_cpu` int(2) NOT NULL COMMENT 'CPU que asignado',
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monitor`
--

CREATE TABLE IF NOT EXISTS `tbl_monitor` (
  `id_monitor` int(11) NOT NULL COMMENT 'id del registro',
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `num_serie` varchar(100) NOT NULL COMMENT 'Revoluciones por minuto',
  `id_empleado` int(3) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_monitor`
--

INSERT INTO `tbl_monitor` (`id_monitor`, `num_inventario`, `categoria`, `tipo`, `marca`, `modelo`, `num_serie`, `id_empleado`, `status`) VALUES
(1, 137070, 'SECTURE', 'LCD', 'DELL', 'E773s', 'CN-0N8176-47609-66S-FSEL', 4, 1),
(2, 101078, 'SECTURE', 'LED', 'LANIX', 'LED HD DISPLAY', 'CL9JW81', 4, 1),
(3, 111112, 'PERSONAL', 'LED', 'DELL', 'm-2016', '1233456', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mouse`
--

CREATE TABLE IF NOT EXISTS `tbl_mouse` (
  `id_mouse` int(11) NOT NULL COMMENT 'id del registro',
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `num_serie` varchar(100) NOT NULL COMMENT 'Revoluciones por minuto',
  `id_empleado` int(3) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mouse`
--

INSERT INTO `tbl_mouse` (`id_mouse`, `num_inventario`, `categoria`, `tipo`, `marca`, `modelo`, `num_serie`, `id_empleado`, `status`) VALUES
(1, 111111, '0', 'optico', 'DELL', 'm-2016', '1233456', 1, 1),
(2, 137273, '0', 'optico', 'LANIX', 'MSU0846', '1140862929E', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otro`
--

CREATE TABLE IF NOT EXISTS `tbl_otro` (
  `id_otro` int(11) NOT NULL COMMENT 'id del registro',
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `num_serie` varchar(100) NOT NULL COMMENT 'Revoluciones por minuto',
  `id_empleado` int(3) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`id`, `rol`, `componente`, `recurso`, `permiso`) VALUES
(2, 2, 'permisos', 'index', 1),
(3, 3, 'permisos', 'index', 1),
(4, 2, 'empleados', 'index', 1),
(5, 2, 'users', 'index', 1),
(6, 2, 'home', 'index', 1),
(7, 3, 'home', 'index', 1),
(8, 3, 'empleados', 'index', 1),
(9, 3, 'users', 'index', 1),
(10, 2, 'home', 'seguridad', 1),
(11, 2, 'home', 'bienes_informaticos', 1),
(12, 2, 'home', 'reportes', 1),
(13, 3, 'home', 'bienes_informaticos', 1),
(14, 3, 'home', 'reportes', 1),
(15, 3, 'home', 'seguridad', 1),
(16, 2, 'empleados', 'crear', 1),
(17, 3, 'empleados', 'crear', 1),
(18, 2, 'empleados', 'editar', 1),
(19, 3, 'empleados', 'editar', 1),
(20, 2, 'empleados', 'actualizar', 1),
(21, 3, 'empleados', 'actualizar', 1),
(22, 2, 'empleados', 'eliminar', 1),
(23, 3, 'empleados', 'eliminar', 1),
(24, 2, 'empleados', 'detalles', 1),
(25, 3, 'empleados', 'detalles', 1),
(26, 2, 'permisos', 'activar', 1),
(27, 3, 'permisos', 'activar', 1),
(28, 2, 'permisos', 'desactivar', 1),
(29, 3, 'permisos', 'desactivar', 1),
(30, 2, 'permisos', 'create', 1),
(31, 3, 'permisos', 'create', 1),
(32, 2, 'users', 'crear', 1),
(33, 3, 'users', 'crear', 1),
(34, 2, 'users', 'editar', 1),
(35, 3, 'users', 'editar', 1),
(36, 2, 'users', 'actualizar', 1),
(37, 3, 'users', 'actualizar', 1),
(38, 2, 'users', 'filtrar_por_rol', 1),
(39, 3, 'users', 'filtrar_por_rol', 1),
(40, 2, 'users', 'filtrar_por_usuario', 1),
(41, 3, 'users', 'filtrar_por_usuario', 1),
(42, 2, 'home', 'empleados', 1),
(43, 2, 'bi_cpu', 'index', 1),
(44, 2, 'bi_cpu', 'crear', 1),
(50, 2, 'bi_cpu', 'actualizar', 1),
(51, 2, 'bi_cpu', 'reasignar', 1),
(52, 2, 'bi_cpu', 'actualizar2', 1),
(53, 2, 'bi_cpu', 'reasignar2', 1),
(54, 2, 'bi_cpu', 'cpu_empleado', 1),
(55, 3, 'bi_cpu', 'index', 1),
(56, 3, 'bi_cpu', 'crear', 1),
(57, 2, 'carpetas', 'crear', 1),
(58, 2, 'carpetas', 'existe_permiso', 1),
(59, 2, 'carpetas', 'actualizar', 1),
(60, 2, 'carpetas', 'carpetas_empleado', 1),
(61, 2, 'internet', 'crear', 1),
(62, 2, 'internet', 'existe_permiso', 1),
(63, 2, 'internet', 'actualizar', 1),
(64, 2, 'internet', 'internet_empleado', 1),
(65, 2, 'bi_cpu', 'detalles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permiso_carpetas`
--

CREATE TABLE IF NOT EXISTS `tbl_permiso_carpetas` (
  `id` int(11) NOT NULL,
  `carpetas_geaco06` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `carpeta_imagenes` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `capacidad_correo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `otros_servicios` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permiso_carpetas`
--

INSERT INTO `tbl_permiso_carpetas` (`id`, `carpetas_geaco06`, `carpeta_imagenes`, `capacidad_correo`, `otros_servicios`, `id_empleado`) VALUES
(1, 'SI', 'SI', '500 MB', 'mas servicios', 1),
(4, 'SI', 'SI', '589', 'mas mas mas', 8),
(5, 'SI', 'SI', '10 MB', 'NA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permiso_internet`
--

CREATE TABLE IF NOT EXISTS `tbl_permiso_internet` (
  `id` int(11) NOT NULL,
  `internet` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `messenger` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `redes_sociales` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ftp` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sigue` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `permiso_usuario_local` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cuenta_ws` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permiso_internet`
--

INSERT INTO `tbl_permiso_internet` (`id`, `internet`, `messenger`, `redes_sociales`, `ftp`, `sigue`, `permiso_usuario_local`, `tipo_cuenta_ws`, `id_empleado`) VALUES
(5, 'SI', 'SI', 'SI', 'SI', 'SI', 'SI', 'ADMINISTRADOR', 1),
(6, 'SI', 'SI', 'SI', 'SI', 'SI', 'SI', 'ADMINISTRADOR', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_procesador`
--

CREATE TABLE IF NOT EXISTS `tbl_procesador` (
  `id_procesador` int(11) NOT NULL COMMENT 'id del registro',
  `tipo` varchar(20) NOT NULL COMMENT 'MOLP INDIVIDUAL',
  `marca_proc` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `procesador` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `id_cpu` int(2) NOT NULL COMMENT 'CPU que asignado',
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_procesador`
--

INSERT INTO `tbl_procesador` (`id_procesador`, `tipo`, `marca_proc`, `procesador`, `id_cpu`, `status`) VALUES
(1, '32 bits', 'INTEL', 'PENTIUM(R) 4 CPU 3.20GHZ x 2', 4, 1),
(2, '32 bits', 'INTEL', 'Core™ i3-2100 CPU @ 3.10GHz × 4', 1, 1),
(3, '32 bits', 'INTEL', 'Core™ i3-2100 CPU @ 3.10GHz × 4', 3, 1),
(4, '32 bits', 'INTEL', 'Core™ i3-2100 CPU @ 3.10GHz × 4', 5, 1);

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
-- Dumping data for table `tbl_ram`
--

INSERT INTO `tbl_ram` (`id_ram`, `categoria`, `tipo`, `marca`, `modelo`, `pines`, `capacidad`, `id_cpu`, `status`) VALUES
(1, 'oem', 'sim', 'kingston', 'abc123', '128', '2 GB', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regulador`
--

CREATE TABLE IF NOT EXISTS `tbl_regulador` (
  `id_regulador` int(11) NOT NULL COMMENT 'id del registro',
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `num_serie` varchar(100) NOT NULL COMMENT 'Revoluciones por minuto',
  `id_empleado` int(3) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regulador`
--

INSERT INTO `tbl_regulador` (`id_regulador`, `num_inventario`, `categoria`, `tipo`, `marca`, `modelo`, `num_serie`, `id_empleado`, `status`) VALUES
(1, 137355, '0', 'REGULADOR', 'KOBLENZ', 'RS-1200-1', 'SN', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id_status` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `descripcion`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teclado`
--

CREATE TABLE IF NOT EXISTS `tbl_teclado` (
  `id_teclado` int(11) NOT NULL COMMENT 'id del registro',
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `num_serie` varchar(100) NOT NULL COMMENT 'Revoluciones por minuto',
  `id_empleado` int(3) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teclado`
--

INSERT INTO `tbl_teclado` (`id_teclado`, `num_inventario`, `categoria`, `tipo`, `marca`, `modelo`, `num_serie`, `id_empleado`, `status`) VALUES
(1, 101111, '1', 'optico', 'DELL', 'm-2016', '1233456', 1, 1),
(2, 137271, '0', '102 teclas', 'LANIX', 'KU-0833', '1170775883E', 4, 1),
(3, 111115, '0', 'DESKTOP', 'DELL', 'MSU0846', '1233456', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_telefono`
--

CREATE TABLE IF NOT EXISTS `tbl_telefono` (
  `id_telefono` int(11) NOT NULL COMMENT 'id del registro',
  `num_inventario` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL COMMENT 'Original, Adicional',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo IDE, SATA, SCSI',
  `marca` varchar(200) NOT NULL COMMENT 'Marca del DD',
  `modelo` varchar(200) NOT NULL COMMENT 'Modelo del DD',
  `num_serie` varchar(100) NOT NULL COMMENT 'Revoluciones por minuto',
  `mac_add` varchar(100) NOT NULL,
  `id_empleado` int(3) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'Instalado, Desinstalado, Baja'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_telefono`
--

INSERT INTO `tbl_telefono` (`id_telefono`, `num_inventario`, `categoria`, `tipo`, `marca`, `modelo`, `num_serie`, `mac_add`, `id_empleado`, `status`) VALUES
(1, 166990, 'VOZIP', 'digital', 'cisco', 'cp-3905', 'FCH19238V5G', 'DCEB94BC8318', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipo_rol`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_rol` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tipo_rol`
--

INSERT INTO `tbl_tipo_rol` (`id_tipo`, `descripcion`) VALUES
(1, 'SuperAdministrador'),
(2, 'Administrador'),
(3, 'Capturista');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nombre`, `username`, `password`, `id_tipo`, `id_status`, `email`, `tel`) VALUES
(1, 'juana', 'NORA', 'NORA123', 1, 1, 'NO@no.com', '111111'),
(2, 'Jilissa', 'julissa', 'julissa123', 1, 1, 'h@h.com', '123456789'),
(9, 'paco', 'paco', 'paco', 1, 1, 'paco@gmail.com', '1265845'),
(13, 'julio', 'julio', 'julio', 1, 1, 'julio', '121455588885'),
(14, 'karina', 'karina', 'karina', 1, 1, 'karina@karina.com', '1234567891'),
(33, 'ana', 'ana', 'ana', 1, 1, 'ana@ana.com', '4564564561'),
(37, 'Gerardo Castañeda ', 'gerardo.casta', 'gerardo123', 1, 1, 'gerardo@gmail.com', '1234569871'),
(38, 'Diana', 'diana', 'diana', 1, 1, 'diana.secture@gmail.com', '1236547896'),
(39, 'Luis Gabriel Villaseñor Alarcon', 'luisgvillasenor', '123456', 1, 1, 'luis.villasenor@aguascalientes.gob.mx', '4336'),
(40, 'agagag', 'usuario', '123456', 3, 1, 'aaaa@com', 'dghdghgdh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `status_cpus`
--
ALTER TABLE `status_cpus`
  ADD PRIMARY KEY (`id_status_cpu`);

--
-- Indexes for table `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  ADD PRIMARY KEY (`id_cpu`),
  ADD UNIQUE KEY `num_inventario` (`num_inventario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `tbl_dd`
--
ALTER TABLE `tbl_dd`
  ADD PRIMARY KEY (`id_dd`);

--
-- Indexes for table `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `codigo_empleado` (`codigo_empleado`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tbl_ipconfig`
--
ALTER TABLE `tbl_ipconfig`
  ADD PRIMARY KEY (`id_ipconfig`);

--
-- Indexes for table `tbl_licencias`
--
ALTER TABLE `tbl_licencias`
  ADD PRIMARY KEY (`id_licencia`);

--
-- Indexes for table `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  ADD PRIMARY KEY (`id_monitor`);

--
-- Indexes for table `tbl_mouse`
--
ALTER TABLE `tbl_mouse`
  ADD PRIMARY KEY (`id_mouse`);

--
-- Indexes for table `tbl_otro`
--
ALTER TABLE `tbl_otro`
  ADD PRIMARY KEY (`id_otro`);

--
-- Indexes for table `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permiso_carpetas`
--
ALTER TABLE `tbl_permiso_carpetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `tbl_permiso_internet`
--
ALTER TABLE `tbl_permiso_internet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `tbl_procesador`
--
ALTER TABLE `tbl_procesador`
  ADD PRIMARY KEY (`id_procesador`);

--
-- Indexes for table `tbl_ram`
--
ALTER TABLE `tbl_ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- Indexes for table `tbl_regulador`
--
ALTER TABLE `tbl_regulador`
  ADD PRIMARY KEY (`id_regulador`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_teclado`
--
ALTER TABLE `tbl_teclado`
  ADD PRIMARY KEY (`id_teclado`);

--
-- Indexes for table `tbl_telefono`
--
ALTER TABLE `tbl_telefono`
  ADD PRIMARY KEY (`id_telefono`);

--
-- Indexes for table `tbl_tipo_rol`
--
ALTER TABLE `tbl_tipo_rol`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_cpus`
--
ALTER TABLE `status_cpus`
  MODIFY `id_status_cpu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cpu`
--
ALTER TABLE `tbl_cpu`
  MODIFY `id_cpu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_dd`
--
ALTER TABLE `tbl_dd`
  MODIFY `id_dd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_ipconfig`
--
ALTER TABLE `tbl_ipconfig`
  MODIFY `id_ipconfig` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_licencias`
--
ALTER TABLE `tbl_licencias`
  MODIFY `id_licencia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro';
--
-- AUTO_INCREMENT for table `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  MODIFY `id_monitor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mouse`
--
ALTER TABLE `tbl_mouse`
  MODIFY `id_mouse` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_otro`
--
ALTER TABLE `tbl_otro`
  MODIFY `id_otro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro';
--
-- AUTO_INCREMENT for table `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tbl_permiso_carpetas`
--
ALTER TABLE `tbl_permiso_carpetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_permiso_internet`
--
ALTER TABLE `tbl_permiso_internet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_procesador`
--
ALTER TABLE `tbl_procesador`
  MODIFY `id_procesador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_ram`
--
ALTER TABLE `tbl_ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_regulador`
--
ALTER TABLE `tbl_regulador`
  MODIFY `id_regulador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_teclado`
--
ALTER TABLE `tbl_teclado`
  MODIFY `id_teclado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_telefono`
--
ALTER TABLE `tbl_telefono`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_permiso_carpetas`
--
ALTER TABLE `tbl_permiso_carpetas`
  ADD CONSTRAINT `tbl_permiso_carpetas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permiso_internet`
--
ALTER TABLE `tbl_permiso_internet`
  ADD CONSTRAINT `tbl_permiso_internet_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
