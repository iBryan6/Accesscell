-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 07:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accesscell`
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

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Super Admin', 'Bryan', '123456', 'Dennis Bryan', 'Argandoña Cartagena', '76953543', '9453153', 1, '2018-06-08 13:24:35', 1);

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
(7, 'Apple'),
(2, 'Asus'),
(5, 'BlackBerry'),
(4, 'Nokia'),
(1, 'Samsung'),
(3, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `costodecompra` decimal(15,2) DEFAULT NULL,
  `preciomayor` decimal(15,2) DEFAULT NULL,
  `preciodetalle` decimal(15,2) DEFAULT NULL,
  `descripcion` text,
  `proveedor` varchar(100) NOT NULL,
  `sucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `representante` varchar(100) NOT NULL,
  `tipodeproducto` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `representante`, `tipodeproducto`, `ubicacion`, `telefono`) VALUES
(1, 'Steve Jobs', 'iphones', 'USA', '444-444-44444');

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
  ADD UNIQUE KEY `nombre_categoria_UNIQUE` (`nombre_categoria`),
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
  ADD KEY `fk_categoria_idx` (`categoria`),
  ADD KEY `fk_proveedor_prod_idx` (`proveedor`),
  ADD KEY `fk_sucursal_prod_idx` (`sucursal`);

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
  MODIFY `idalmacen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nombre_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`marca`) REFERENCES `marca` (`nombre_marca`) ON UPDATE CASCADE,
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
