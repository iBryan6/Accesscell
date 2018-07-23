-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2018 at 12:44 PM
-- Server version: 5.6.39-83.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accessce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacen`
--

CREATE TABLE `almacen` (
  `idalmacen` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `almacen`
--

INSERT INTO `almacen` (`idalmacen`, `idproducto`, `stock`) VALUES
(1, 1, 630),
(2, 2, 180),
(3, 3, 10),
(5, 4, 1000),
(7, 5, 190),
(9, 6, 50),
(11, 7, 400),
(12, 8, 30),
(14, 9, 755),
(16, 10, 2500),
(18, 11, 690),
(20, 13, 770),
(24, 15, 10),
(26, 18, 710),
(28, 20, 5860),
(30, 19, 2220),
(31, 24, 6230),
(32, 25, 1320),
(33, 28, 870),
(35, 27, 30),
(38, 29, 190),
(40, 31, 970),
(41, 32, 250),
(43, 33, 70),
(44, 34, 840),
(45, 35, 120),
(47, 36, 100),
(49, 37, 10),
(51, 38, 10),
(53, 39, 100),
(55, 40, 200),
(57, 43, 60),
(59, 44, 40),
(60, 45, 240),
(62, 46, 460),
(63, 47, 10),
(64, 48, 320),
(66, 50, 1510),
(68, 51, 1100),
(69, 52, 110),
(71, 12, 400),
(72, 243, 780),
(74, 53, 210),
(76, 54, 50),
(78, 56, 100),
(80, 57, 140),
(81, 59, 110),
(83, 60, 760),
(85, 61, 940),
(87, 62, 1420),
(89, 63, 360),
(91, 64, 430),
(93, 65, 90),
(94, 66, 420),
(97, 67, 10),
(99, 69, 1100),
(101, 68, 280),
(103, 70, 920),
(107, 72, 50),
(109, 73, 10),
(111, 75, 120),
(115, 76, 150),
(116, 77, 60),
(118, 78, 1460),
(120, 79, 550),
(124, 80, 1520),
(125, 81, 930),
(127, 82, 300),
(129, 84, 170),
(131, 85, 1030),
(133, 86, 130),
(135, 87, 2290),
(137, 88, 210),
(139, 89, 60),
(141, 90, 50),
(143, 91, 30),
(145, 92, 459),
(147, 93, 400),
(148, 94, 200),
(150, 95, 260),
(151, 96, 370),
(152, 97, 230),
(154, 98, 170),
(155, 99, 20),
(156, 100, 710),
(157, 102, 60),
(158, 103, 10),
(159, 104, 10),
(160, 105, 10),
(161, 119, 20),
(162, 108, 530),
(163, 109, 10),
(164, 111, 570),
(165, 114, 230),
(166, 115, 280),
(167, 117, 260),
(168, 246, 50),
(171, 121, 2),
(172, 122, 650),
(173, 123, 80),
(174, 124, 30),
(175, 125, 120),
(176, 126, 380),
(177, 129, 20),
(178, 130, 470),
(179, 131, 840),
(180, 132, 600),
(181, 133, 40),
(182, 143, 40),
(184, 146, 910),
(185, 148, 40),
(186, 149, 20),
(187, 151, 500),
(188, 152, 280),
(189, 154, 450),
(190, 153, 730),
(191, 155, 720),
(192, 156, 40),
(193, 158, 450),
(194, 160, 440),
(195, 161, 560),
(196, 162, 710),
(198, 247, 500),
(199, 176, 1370),
(200, 178, 890),
(201, 180, 20),
(202, 182, 180),
(203, 184, 310),
(204, 185, 520),
(205, 186, 380),
(206, 187, 450),
(207, 248, 280),
(208, 190, 440),
(209, 192, 820),
(210, 195, 20),
(211, 196, 60),
(212, 250, 10),
(213, 251, 150),
(214, 279, 29),
(215, 280, 154),
(217, 281, 207),
(219, 282, 55),
(221, 283, 94);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre_categoria`, `tipo`) VALUES
(2, 'Vidrios', 'Normal'),
(3, 'Fundas', 'Gummy'),
(4, 'Fundas', 'Agenda'),
(5, 'Fundas', '360 Full'),
(6, 'Pen Drives', ' 2GB'),
(7, 'Pen Drives', '4GB '),
(8, 'Pen Drives', '8GB'),
(9, 'Pen Drives', '16GB'),
(10, 'Pen Drives', '32GB'),
(11, 'Pen Drives', '64GB'),
(12, 'Pen Drives', '128GB'),
(13, 'Pen Drives', ' 2GB'),
(14, 'Pen Drives', ' 4GB'),
(16, 'Pen Drives', ' 8GB'),
(17, 'Cargador', 'Tipo C -  2A'),
(18, 'Audifonos', 'SAMSUNG'),
(19, 'Audifonos', 'HUAWEI'),
(20, 'Vidrios', 'Curvos'),
(21, 'Cables USB  (AA)', 'NOTE 4 - 1,50 M'),
(22, 'Cables USB', 'Iphone'),
(23, 'Micro SD', '8GB'),
(24, 'Micro SD', ' 4GB'),
(25, 'Micro SD', '16GB'),
(26, 'Fundas', 'Siliconas'),
(27, 'Vidrios', 'Tablets'),
(28, 'Vidrios', 'Nanos'),
(29, 'Cargador', 'Tablet'),
(33, 'Bateria', '1500 Mah'),
(34, 'Bateria', '2100 Mah'),
(35, 'Bateria', '1800 Mah'),
(36, 'Bateria', '2600 Mah'),
(37, 'Bateria', '3200 Mah'),
(38, 'Bateria', '1650  Mah'),
(39, 'Bateria', '3220  Mah'),
(40, 'Bateria', '2000  Mah'),
(41, 'Bateria', '1850  Mah'),
(42, 'Bateria', '1900  Mah'),
(43, 'Bateria', '1350  Mah'),
(44, 'Bateria', '3300  Mah'),
(45, 'Bateria', '3100  Mah'),
(46, 'Bateria', '2400  Mah'),
(47, 'Bateria', '3500  Mah'),
(48, 'Bateria', '3000  Mah'),
(49, 'Bateria', '2800  Mah'),
(50, 'Bateria', '3600  Mah'),
(51, 'Bateria', '1200  Mah'),
(52, 'Cargador', 'V8'),
(53, 'Cargador', 'IP6'),
(54, 'Cables USB', 'FILTRO 1,5 M'),
(55, 'Cables USB', 'FILTRO 3,0 M'),
(56, 'Cables USB-TIPO C', 'P9'),
(57, 'Cables USB-TIPO C', 'S8'),
(58, 'Cables USB  (AAA)', 'NOTE 4 - 1,50 M'),
(59, 'Cargador', 'G600'),
(60, 'Cables USB  (AAA)', 'Tipo C'),
(61, 'Cable USB', 'V8 - AAA'),
(62, 'Cables USB MAGNETICO Fuerte', 'Tipo C- V8 - Iphone - AAA'),
(63, 'Cargador', ' V8 WITH SPECIAL PACKING LOGO '),
(64, 'Cables USB-TIPO C ', 'P6'),
(65, 'Fundas', 'Motomo'),
(66, 'Fundas', 'Gomas'),
(67, 'Fundas', 'Universales'),
(68, 'Fundas', 'Sin Relieve'),
(69, 'Fundas', 'Verus'),
(70, 'Fundas', 'Grabado'),
(71, 'Fundas', '360 Protection'),
(72, 'Fundas ', 'Agenda Sin Relieve'),
(73, 'Fundas', 'Agenda Sello Grabado');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `tipo_empleado` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `carnet` varchar(45) DEFAULT NULL,
  `sucursalid` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`idempleado`, `tipo_empleado`, `username`, `password`, `nombres`, `apellidos`, `telefono`, `carnet`, `sucursalid`, `fecha_registro`, `estado`) VALUES
(3, 'Super Admin', 'Bryan', '123456', 'Dennis Bryan', 'ArgandoÃ±a Cartagena', '76953543', '9453153', 1, '2018-07-04 20:29:14', 1),
(4, 'Super Admin', 'Aida', '1925aida', 'Aida Luz', 'Argandoña', '59174313430', NULL, 1, '2018-07-04 20:51:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `listapagos`
--

CREATE TABLE `listapagos` (
  `idListapagos` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Pago` decimal(15,2) NOT NULL,
  `Transaccion_idTransaccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre_marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre_marca`) VALUES
(8, 'Apple'),
(16, 'Casim'),
(17, 'GENERICA'),
(18, 'HTC'),
(15, 'Huawei'),
(19, 'LG'),
(22, 'Motomo'),
(20, 'Motorola'),
(9, 'Samsung'),
(12, 'Sony'),
(14, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `costodecompra` decimal(15,2) DEFAULT NULL,
  `preciomayor` decimal(15,2) DEFAULT NULL,
  `preciodetalle` decimal(15,2) DEFAULT NULL,
  `descripcion` text,
  `proveedor` varchar(100) NOT NULL,
  `sucursal` varchar(100) NOT NULL,
  `categoriaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idproducto`, `marca`, `modelo`, `costodecompra`, `preciomayor`, `preciodetalle`, `descripcion`, `proveedor`, `sucursal`, `categoriaid`) VALUES
(1, 'Samsung', 'S2', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(2, 'Samsung', 'S3', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(3, 'Samsung', 'S3 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(4, 'Samsung', 'S4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(5, 'Samsung', 'S4 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(6, 'Samsung', 'S5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(7, 'Samsung', 'S5 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(8, 'Samsung', 'S6', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(9, 'Samsung', 'S7', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(10, 'Samsung', 'J1 MINI PRIME', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(11, 'Samsung', 'J1 ACE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(12, 'Samsung', 'J2', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(13, 'Samsung', 'J2 PRIME', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(14, 'Samsung', 'J3-2015', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(15, 'Samsung', 'J3-2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(16, 'Samsung', 'J4-2018', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(17, 'Samsung', 'J5-2015', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(18, 'Samsung', 'J5-2016', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(19, 'Samsung', 'J5 PRIME', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(20, 'Samsung', 'J5-PRO', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(21, 'Samsung', 'J7 2015', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(22, 'Samsung', 'J7 2016', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(23, 'Samsung', 'J7 PRIME', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(24, 'Samsung', 'J7 PRO', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(25, 'Samsung', 'J7 NEO', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(26, 'Samsung', 'A3 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(27, 'Samsung', 'A 310', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(28, 'Samsung', 'A3 2017 BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(29, 'Samsung', 'A3 2017 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(30, 'Samsung', 'A5 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(31, 'Samsung', 'A5 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(32, 'Samsung', 'A5 2017 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(33, 'Samsung', 'A5 2017 BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(34, 'Samsung', 'A7 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(35, 'Samsung', 'A7 2017 BLACK ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(36, 'Samsung', 'A7 2017 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(37, 'Samsung', 'A8', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(38, 'Samsung', 'A9', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(39, 'Samsung', 'A915', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(40, 'Samsung', 'NOTE 2', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(41, 'Samsung', 'NOTE 3', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(42, 'Samsung', 'NOTE 4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(43, 'Samsung', 'NOTE 5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(44, 'Samsung', 'NOTE 4 EDGE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(45, 'Samsung', 'CORE 2', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(46, 'Samsung', 'CORE 8260', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(47, 'Samsung', 'GRAND DUOS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(48, 'Samsung', 'POCKET 2', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(50, 'Samsung', 'ACE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(51, 'Samsung', 'ACE 4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(52, 'Samsung', 'ON 5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(53, 'Huawei', 'GR3 BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(54, 'Huawei', 'GR3 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(56, 'Huawei', 'GR5 2017 BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(57, 'Huawei', 'GR5 2017 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(58, 'Huawei', 'GR5 2017 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(59, 'Huawei', 'Y3 ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(60, 'Huawei', 'Y3 II', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(61, 'Huawei', 'Y3 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(62, 'Huawei', 'Y3 II 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(63, 'Huawei', 'Y360', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(64, 'Huawei', 'Y530', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(65, 'Huawei', 'Y5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(66, 'Huawei', 'Y5 II', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(67, 'Huawei', 'Y5 II 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(68, 'Huawei', 'Y6 II ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(69, 'Huawei', 'Y6 II 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(70, 'Huawei', 'Y7 PRIME ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(71, 'Huawei', 'Y6 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(72, 'Huawei', 'MATE 7', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(73, 'Huawei', 'MATE 8', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(75, 'Huawei', 'MATE 9 LITE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(76, 'Huawei', 'MATE 10', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(77, 'Huawei', 'MATE S', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(78, 'Huawei', 'P8 LITE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(79, 'Huawei', 'P8 LITE  2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(80, 'Huawei', 'P9 ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(81, 'Huawei', 'P9 LITE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(82, 'Huawei', 'P9 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(84, 'Huawei', 'P9 LITE SMART', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(85, 'Huawei', 'P9 LITE MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(86, 'Huawei', 'P10', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(87, 'Huawei', 'P10 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(88, 'Huawei', 'P10 PLUS GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(89, 'Huawei', 'P10 PLUS BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(90, 'Huawei', 'P10 BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(91, 'Huawei', 'P10 GOLD', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(92, 'Huawei', 'NOVA PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(93, 'Huawei', 'G PLAY ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(94, 'Huawei', 'G PLAY MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(95, 'Sony', 'XA ULTRA', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(96, 'Sony', 'SONY X', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(97, 'Sony', 'SONY Z', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(98, 'Sony', 'SONY C5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(99, 'Sony', 'SONY C3', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(100, 'Sony', 'Z1 BACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(101, 'Sony', 'Z1 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(102, 'Sony', 'Z2', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(103, 'Sony', 'Z2 BACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(104, 'Sony', 'Z5 PREMIUM PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(105, 'Sony', 'Z3 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(108, 'Sony', 'Z4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(109, 'Sony', 'Z4 BLACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(111, 'Sony', 'Z5 ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(114, 'Sony', 'Z5 BACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(115, 'Sony', 'Z5 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(117, 'Sony', 'Z5PREMIUM', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(118, 'Sony', 'Z5 ULTRA', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(119, 'Sony', 'Z4 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(121, 'Sony', 'M4 AQUA', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(122, 'Sony', 'XA', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(123, 'Sony', 'XZP', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(124, 'HTC', 'M4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(125, 'HTC', 'M5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(126, 'HTC', 'M7', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(129, 'HTC', 'M8', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(130, 'HTC', 'M9', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(131, 'HTC', 'M9 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(132, 'HTC', 'M10', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(133, 'HTC', 'HTC626', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(135, 'Samsung', 'J6 2018', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(136, 'Samsung', 'J8 2018', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(137, 'Huawei', 'P20', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(138, 'Huawei', 'P20 LITE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(139, 'Huawei', 'P20 PRO', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(140, 'Huawei', 'Mate 10', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(141, 'Huawei', 'MATE 10 LITE', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(142, 'Huawei', 'MATE 10 PRO', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(143, 'LG', 'K3 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(146, 'LG', 'K4 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(148, 'LG', 'K5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(149, 'LG', 'K7', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(151, 'LG', 'K8', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(152, 'LG', 'K8 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(153, 'LG', 'K10 2017', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(154, 'LG', 'K10', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(155, 'LG', 'G2', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(156, 'LG', 'G2 MINI', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(158, 'LG', 'G3 STYLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(160, 'LG', 'G4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(161, 'LG', 'G4 STYLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(162, 'LG', 'G5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(164, 'LG', 'G6', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(167, 'LG', 'G4 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(168, 'LG', 'SPIRIT', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(170, 'LG', 'LEON', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(172, 'LG', 'MAGNA', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(174, 'Apple', 'IP X', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(176, 'Apple', 'IP5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(178, 'Apple', 'IP6', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(180, 'Apple', 'IP6 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(182, 'Apple', 'IP6 BACK', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(184, 'Apple', 'IP7', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(185, 'Apple', 'IP7 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(186, 'Motorola', 'MOTO X4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(187, 'Motorola', 'MOTO E4', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(190, 'Motorola', 'MOTO C ', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(192, 'Motorola', 'MOTO G5', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(194, 'Motorola', 'MOTO G5S PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(195, 'Motorola', 'MOTO X', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(196, 'Motorola', 'G510', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(200, 'Samsung', 'SAM M MahahSUNG S3 MINI - EB425161LU', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 33),
(201, 'Samsung', 'SAMSUNG S3 - EB-L1G6LLA', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 34),
(202, 'Samsung', 'SAMSUNG S4 MINI - B500AE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 35),
(203, 'Samsung', 'SAMSUNG S4 - B600BE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 36),
(205, 'Samsung', 'SAMSUNG S5 - EB-BG800CBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 37),
(206, 'Samsung', 'SAMSUNG S2 - EB-F1A2GBU', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 38),
(207, 'Samsung', 'SAMSUNG NOTE 3  - B800BE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(208, 'Samsung', 'SAMSUNG NOTE 4 - EB-BN910BBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 37),
(209, 'Samsung', 'SAMSUNG CORE II - G355 - EB585157LU', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 40),
(210, 'Samsung', 'SAMSUNG CORE PRIME - EB-BG360BBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 40),
(212, 'Samsung', 'SAMSUNG GRAND PRIME / J2 PRIME - EB-BG530BBC', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 40),
(213, 'Samsung', 'SAMSUNG J1 - EB-BJ100CBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 41),
(214, 'Samsung', 'SAMSUNG J1 ACE - EB-BJ110ABE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 42),
(217, 'Samsung', 'SAMSUNG ACE S5830 - EB494358VU', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 43),
(218, 'Samsung', 'SAMSUNG J7-2015 - EB-BJ700BBC', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 48),
(219, 'Samsung', 'SAMSUNG J5 - 2015 - EB-BG530BBC', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 36),
(220, 'Samsung', 'SAMSUNG J7 (2016) - EB - BJ710CBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 44),
(222, 'Samsung', 'SAMSUNG J5 (2016) - EB-BJ510CBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 45),
(223, 'Samsung', 'SAMSUNG J7 PRIME', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 44),
(224, 'Samsung', 'SAMSUNG J5 PRIME', '0.00', '0.00', '0.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 46),
(225, 'Samsung', 'SAMSUNG S8 PLUS', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 47),
(226, 'Samsung', 'SAMSUNG S8', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 48),
(227, 'Samsung', 'SAMSUNG ACE 4 - EB-BG313BBE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 33),
(229, 'Samsung', 'SAMSUNG S6 EDGE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 36),
(230, 'Samsung', 'SAMSUNG S7 EDGE', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 50),
(231, 'Samsung', 'SAMSUNG GRAND NEO - EB535163LU', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 34),
(232, 'Samsung', 'SAMSUNG POCKET - EB 454353VA', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 51),
(233, 'Samsung', 'REAL FAST', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 52),
(234, 'Samsung', 'D5 REAL FAST', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 52),
(235, 'Samsung', 'COPY FAST CHARGER', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 52),
(236, 'Huawei', 'P9 ', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 56),
(237, 'Xiaomi', 'Xiaomi', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 60),
(238, 'Samsung', 'CHEAP SAMSUNG CHARGER WITH PACKING AND USB', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 17),
(239, 'Samsung', 'V8 -AAA', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 61),
(240, 'GENERICA', 'Tipo C - V8 - iphone ', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 62),
(241, 'Samsung', 'Samsung -caja logo especial', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 52),
(242, 'Huawei', 'Huawei 2A', '0.00', '0.00', '0.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 64),
(243, 'Samsung', 'J2 PRIME GOLD', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(244, 'Samsung', 'J2 PRIME BLACK', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(246, 'Sony', 'T2 Ultra', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(247, 'LG', 'Bello', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(248, 'Motorola', 'Moto  E4 Plus', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(249, 'Motorola', 'G5 PLUS', '1.50', '2.30', '3.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(250, 'Sony', 'Z MINI', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(251, 'Sony', 'K4', '1.50', '2.30', '3.00', '', 'JACKY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(252, 'GENERICA', 'j1', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(253, 'GENERICA', 'J2 PRIME', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(254, 'GENERICA', 'S3', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(256, 'GENERICA', 'S3 MINI', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(258, 'GENERICA', 'S4', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(259, 'GENERICA', 'S4 MINI', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(260, 'GENERICA', 'S5', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(261, 'GENERICA', 'S5', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(262, 'GENERICA', 'S5 MINI', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(263, 'GENERICA', 'S5 MINI', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(264, 'GENERICA', 'C3', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(265, 'GENERICA', 'C3', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(266, 'GENERICA', 'C5', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(267, 'GENERICA', 'C7', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(268, 'GENERICA', 'C7', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(269, 'GENERICA', 'C9', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(270, 'GENERICA', 'C9', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(271, 'GENERICA', 'G360', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(272, 'GENERICA', 'G360', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(273, 'GENERICA', 'IP4', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 2),
(274, 'GENERICA', '8', '15.00', '20.00', '0.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(275, 'GENERICA', '8', '15.00', '20.00', '0.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(276, 'GENERICA', 'NOTE 4', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(277, 'GENERICA', 'NOTE 3', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(278, 'GENERICA', 'NOTE 3', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 66),
(279, 'GENERICA', '3.5 - 4.0', '5.00', '7.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 67),
(280, 'GENERICA', '4.0 - 4.5 ', '5.00', '7.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 67),
(281, 'GENERICA', '4.5 - 5.0', '5.00', '7.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 67),
(282, 'GENERICA', '5.0 - 5.5', '5.00', '7.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 67),
(283, 'GENERICA', '5.5 - 6.0', '5.00', '7.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 67),
(285, 'GENERICA', 'J1 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(286, 'GENERICA', 'J1 MINI', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(287, 'GENERICA', 'J2', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(288, 'GENERICA', 'J5 PRIME', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(289, 'GENERICA', 'J5 2016', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(291, 'GENERICA', 'J7 2016', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(293, 'GENERICA', 'Y360', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(294, 'GENERICA', 'Y520', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(295, 'GENERICA', 'GR5 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(296, 'GENERICA', 'GR5 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(297, 'GENERICA', 'G360', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(298, 'GENERICA', 'G2', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(299, 'GENERICA', 'G2', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(300, 'GENERICA', 'G3 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(301, 'GENERICA', 'G3 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(302, 'GENERICA', 'S4', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(303, 'GENERICA', 'S5', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(304, 'GENERICA', 'A3 2016', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(305, 'GENERICA', 'A3 2016', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(307, 'GENERICA', 'K4', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(308, 'GENERICA', 'A3 2017', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(309, 'GENERICA', 'P8 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(310, 'GENERICA', 'MATE 8 ', '8.00', '15.00', '20.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 68),
(311, 'GENERICA', 'GR3 ', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(315, 'GENERICA', 'GR5 ', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(316, 'GENERICA', 'GR360', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(318, 'GENERICA', '360', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(319, 'GENERICA', 'M4 AQUA', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(320, 'GENERICA', 'MG2', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(321, 'GENERICA', 'MG3', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(322, 'GENERICA', 'S6', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(323, 'GENERICA', 'S6 EDGE', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(326, 'GENERICA', 'Y635', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(327, 'GENERICA', 'Z5 ', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(329, 'GENERICA', 'LG770', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(330, 'GENERICA', '5G', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(331, 'GENERICA', 'P9 ', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(333, 'GENERICA', 'P9 LITE', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(335, 'GENERICA', 'J5 ', '5.00', '8.00', '10.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 69),
(336, 'GENERICA', 'J1 MINI', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(337, 'GENERICA', 'J2', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(339, 'GENERICA', 'J3', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(340, 'GENERICA', 'J3 PRIME', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(342, 'GENERICA', 'J5 ', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(343, 'GENERICA', 'J5 PRIME', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(344, 'GENERICA', 'J7 ', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(345, 'GENERICA', 'J7 PRIME', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(346, 'GENERICA', 'J7 2016', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(347, 'GENERICA', 'S3', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(349, 'GENERICA', 'S4', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(350, 'GENERICA', 'S5', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(351, 'GENERICA', 'S6', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(352, 'GENERICA', 'S6 EDGE', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(354, 'GENERICA', 'S7', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(355, 'GENERICA', 'XA', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(356, 'GENERICA', 'XA ULTRA', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(357, 'GENERICA', 'Z4', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(358, 'GENERICA', 'IP5', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(359, 'GENERICA', 'IP6', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(361, 'GENERICA', 'IP6 PLUS', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(362, 'GENERICA', 'IP7 PLUS', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(363, 'GENERICA', 'NOTE 4', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(365, 'GENERICA', 'NOTE 5', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(366, 'GENERICA', 'P8 LITE', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(368, 'GENERICA', 'P9 LITE', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(370, 'GENERICA', 'Y5 II', '3.50', '6.00', '8.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 26),
(371, 'GENERICA', 'A3 2017', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(372, 'GENERICA', 'XA', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(374, 'GENERICA', 'S6 EDGE', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(375, 'GENERICA', 'S7', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(376, 'GENERICA', 'S7', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(377, 'GENERICA', 'IP 5', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(378, 'GENERICA', 'IP 6', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(379, 'GENERICA', '6G PLUS', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(380, 'GENERICA', 'IP 6 PLUS', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(381, 'GENERICA', 'IP7', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(382, 'GENERICA', 'IP7 PLUS', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(383, 'GENERICA', 'IP7 PLUS', '6.00', '13.00', '15.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 72),
(384, 'Motomo', 'J5 PRIME', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(385, 'Motomo', 'NOTE 5', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(386, 'Motomo', 'NOTE 5', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(387, 'Motomo', 'IP7 PLUS', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(388, 'Motomo', 'IP7 PLUS', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(389, 'Motomo', 'S6 EDGE', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(390, 'Motomo', 'S6 EDGE', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(392, 'Motomo', 'IP7', '5.00', '9.00', '13.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 65),
(393, 'GENERICA', 'J5-PRO', '8.00', '15.00', '18.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 73),
(395, 'GENERICA', 'J7 PRO', '8.00', '15.00', '18.00', '', 'STARRY', 'TIENDA PRINCIPAL - 25 DE MAYO', 73);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `representante` varchar(100) NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `representante`, `ubicacion`, `telefono`) VALUES
(1, 'STARRY  ', 'CHINA', '-'),
(3, 'DORIS', 'CHINA', '-'),
(4, 'JACKY', 'CHINA', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `idsucursal` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sucursal`
--

INSERT INTO `sucursal` (`idsucursal`, `razon_social`, `direccion`, `telefono`) VALUES
(1, 'ADMINISTRACION', 'BASE DE DATOS', ''),
(2, 'TIENDA PRINCIPAL - 25 DE MAYO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipopago` int(11) NOT NULL,
  `Tipopago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipopago`
--

INSERT INTO `tipopago` (`idTipopago`, `Tipopago`) VALUES
(2, 'Credito'),
(1, 'Efectivo');

-- --------------------------------------------------------

--
-- Table structure for table `tipotransaccion`
--

CREATE TABLE `tipotransaccion` (
  `idTipotransaccion` int(11) NOT NULL,
  `tipotransaccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipotransaccion`
--

INSERT INTO `tipotransaccion` (`idTipotransaccion`, `tipotransaccion`) VALUES
(1, 'Compra'),
(2, 'Venta');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `idtipo_empleado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`idtipo_empleado`, `nombre`) VALUES
(2, 'Admin'),
(3, 'Empleado'),
(1, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaccion`
--

CREATE TABLE `transaccion` (
  `idTransaccion` int(11) NOT NULL,
  `idTipotransaccion` int(11) NOT NULL,
  `idTipopago` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `detalle` mediumtext,
  `factura` int(11) DEFAULT NULL,
  `deuda` decimal(15,2) DEFAULT NULL,
  `pagoinicial` decimal(15,2) DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idalmacen`),
  ADD UNIQUE KEY `idproducto_UNIQUE` (`idproducto`),
  ADD UNIQUE KEY `idalmacen_UNIQUE` (`idalmacen`),
  ADD KEY `fk_producto_has_sucursal_producto1_idx` (`idproducto`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `idcategoria_UNIQUE` (`idcategoria`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `idempleado_UNIQUE` (`idempleado`),
  ADD UNIQUE KEY `carnet_UNIQUE` (`carnet`),
  ADD KEY `fk_empleado_sucursal1_idx` (`sucursalid`),
  ADD KEY `fk_tipo_usuario_idx` (`tipo_empleado`);

--
-- Indexes for table `listapagos`
--
ALTER TABLE `listapagos`
  ADD PRIMARY KEY (`idListapagos`),
  ADD UNIQUE KEY `idListapagos_UNIQUE` (`idListapagos`),
  ADD KEY `fk_Listapagos_Transaccion1_idx` (`Transaccion_idTransaccion`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`),
  ADD UNIQUE KEY `nombre_marca_UNIQUE` (`nombre_marca`),
  ADD UNIQUE KEY `idmarca_UNIQUE` (`idmarca`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD UNIQUE KEY `idproducto_UNIQUE` (`idproducto`),
  ADD KEY `fk_marca_idx` (`marca`),
  ADD KEY `fk_proveedor_prod_idx` (`proveedor`),
  ADD KEY `fk_sucursal_prod_idx` (`sucursal`),
  ADD KEY `fk_producto_categoria1_idx` (`categoriaid`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD UNIQUE KEY `idproveedor_UNIQUE` (`idproveedor`),
  ADD UNIQUE KEY `representante_UNIQUE` (`representante`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idsucursal`),
  ADD UNIQUE KEY `idsucursal_UNIQUE` (`idsucursal`),
  ADD UNIQUE KEY `razon_social_UNIQUE` (`razon_social`);

--
-- Indexes for table `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipopago`),
  ADD UNIQUE KEY `Tipopago_UNIQUE` (`Tipopago`),
  ADD UNIQUE KEY `idTipopago_UNIQUE` (`idTipopago`);

--
-- Indexes for table `tipotransaccion`
--
ALTER TABLE `tipotransaccion`
  ADD PRIMARY KEY (`idTipotransaccion`),
  ADD UNIQUE KEY `tipotransaccion_UNIQUE` (`tipotransaccion`),
  ADD UNIQUE KEY `idTipotransaccion_UNIQUE` (`idTipotransaccion`);

--
-- Indexes for table `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`idtipo_empleado`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `idtipo_empleado_UNIQUE` (`idtipo_empleado`);

--
-- Indexes for table `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`idTransaccion`),
  ADD UNIQUE KEY `idTransaccion_UNIQUE` (`idTransaccion`),
  ADD KEY `fk_Transaccion_Tipotransaccion1_idx` (`idTipotransaccion`),
  ADD KEY `fk_Transaccion_Tipopago1_idx` (`idTipopago`),
  ADD KEY `fk_Transaccion_empleado1_idx` (`idempleado`),
  ADD KEY `fk_Transaccion_almacen1_idx` (`idalmacen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almacen`
--
ALTER TABLE `almacen`
  MODIFY `idalmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idsucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idTipopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipotransaccion`
--
ALTER TABLE `tipotransaccion`
  MODIFY `idTipotransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `idtipo_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `idTransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `fk_producto_has_sucursal_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--
-- Constraints for table `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_sucursal1` FOREIGN KEY (`sucursalid`) REFERENCES `sucursal` (`idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_usuario` FOREIGN KEY (`tipo_empleado`) REFERENCES `tipo_empleado` (`nombre`) ON UPDATE CASCADE;

--
-- Constraints for table `listapagos`
--
ALTER TABLE `listapagos`
  ADD CONSTRAINT `fk_Listapagos_Transaccion1` FOREIGN KEY (`Transaccion_idTransaccion`) REFERENCES `transaccion` (`idTransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`marca`) REFERENCES `marca` (`nombre_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proveedor_prod` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`representante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sucursal_prod` FOREIGN KEY (`sucursal`) REFERENCES `sucursal` (`razon_social`) ON UPDATE CASCADE;

--
-- Constraints for table `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `fk_Transaccion_Tipopago1` FOREIGN KEY (`idTipopago`) REFERENCES `tipopago` (`idTipopago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaccion_Tipotransaccion1` FOREIGN KEY (`idTipotransaccion`) REFERENCES `tipotransaccion` (`idTipotransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaccion_almacen1` FOREIGN KEY (`idalmacen`) REFERENCES `almacen` (`idalmacen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaccion_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
