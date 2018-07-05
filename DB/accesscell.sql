-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2018 a las 00:52:00
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accesscell`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `idalmacen` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre_categoria`, `tipo`) VALUES
(2, 'Vidrios Templados', ''),
(3, 'Fundas', 'Gummy'),
(4, 'Fundas', 'Agenda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
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
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `tipo_empleado`, `username`, `password`, `nombres`, `apellidos`, `telefono`, `carnet`, `sucursalid`, `fecha_registro`, `estado`) VALUES
(3, 'Super Admin', 'Bryan', '123456', 'Dennis Bryan', 'Argandoña Cartagena', '76953543', '9453153', 1, '2018-07-04 20:29:14', 1),
(4, 'Super Admin', 'Aida', '1925aida', 'Aida Luz', 'Argandoña', '59174313430', NULL, 1, '2018-07-04 20:51:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listapagos`
--

CREATE TABLE `listapagos` (
  `idListapagos` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Pago` decimal(15,2) NOT NULL,
  `Transaccion_idTransaccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre_marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
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
-- Estructura de tabla para la tabla `producto`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `representante` varchar(100) NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `idsucursal` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idsucursal`, `razon_social`, `direccion`, `telefono`) VALUES
(1, 'ADMINISTRACION', 'BASE DE DATOS', ''),
(2, 'TIENDA PRINCIPAL - 25 DE MAYO', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipopago` int(11) NOT NULL,
  `Tipopago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipopago`, `Tipopago`) VALUES
(2, 'Credito'),
(1, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransaccion`
--

CREATE TABLE `tipotransaccion` (
  `idTipotransaccion` int(11) NOT NULL,
  `tipotransaccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipotransaccion`
--

INSERT INTO `tipotransaccion` (`idTipotransaccion`, `tipotransaccion`) VALUES
(1, 'Compra'),
(2, 'Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `idtipo_empleado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`idtipo_empleado`, `nombre`) VALUES
(2, 'Admin'),
(3, 'Empleado'),
(1, 'Super Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idalmacen`),
  ADD UNIQUE KEY `idproducto_UNIQUE` (`idproducto`),
  ADD UNIQUE KEY `idalmacen_UNIQUE` (`idalmacen`),
  ADD KEY `fk_producto_has_sucursal_producto1_idx` (`idproducto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `idcategoria_UNIQUE` (`idcategoria`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `idempleado_UNIQUE` (`idempleado`),
  ADD UNIQUE KEY `carnet_UNIQUE` (`carnet`),
  ADD KEY `fk_empleado_sucursal1_idx` (`sucursalid`),
  ADD KEY `fk_tipo_usuario_idx` (`tipo_empleado`);

--
-- Indices de la tabla `listapagos`
--
ALTER TABLE `listapagos`
  ADD PRIMARY KEY (`idListapagos`),
  ADD UNIQUE KEY `idListapagos_UNIQUE` (`idListapagos`),
  ADD KEY `fk_Listapagos_Transaccion1_idx` (`Transaccion_idTransaccion`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`),
  ADD UNIQUE KEY `nombre_marca_UNIQUE` (`nombre_marca`),
  ADD UNIQUE KEY `idmarca_UNIQUE` (`idmarca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD UNIQUE KEY `idproducto_UNIQUE` (`idproducto`),
  ADD KEY `fk_marca_idx` (`marca`),
  ADD KEY `fk_proveedor_prod_idx` (`proveedor`),
  ADD KEY `fk_sucursal_prod_idx` (`sucursal`),
  ADD KEY `fk_producto_categoria1_idx` (`categoriaid`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD UNIQUE KEY `idproveedor_UNIQUE` (`idproveedor`),
  ADD UNIQUE KEY `representante_UNIQUE` (`representante`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idsucursal`),
  ADD UNIQUE KEY `idsucursal_UNIQUE` (`idsucursal`),
  ADD UNIQUE KEY `razon_social_UNIQUE` (`razon_social`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipopago`),
  ADD UNIQUE KEY `Tipopago_UNIQUE` (`Tipopago`),
  ADD UNIQUE KEY `idTipopago_UNIQUE` (`idTipopago`);

--
-- Indices de la tabla `tipotransaccion`
--
ALTER TABLE `tipotransaccion`
  ADD PRIMARY KEY (`idTipotransaccion`),
  ADD UNIQUE KEY `tipotransaccion_UNIQUE` (`tipotransaccion`),
  ADD UNIQUE KEY `idTipotransaccion_UNIQUE` (`idTipotransaccion`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`idtipo_empleado`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `idtipo_empleado_UNIQUE` (`idtipo_empleado`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`idTransaccion`),
  ADD UNIQUE KEY `idTransaccion_UNIQUE` (`idTransaccion`),
  ADD KEY `fk_Transaccion_Tipotransaccion1_idx` (`idTipotransaccion`),
  ADD KEY `fk_Transaccion_Tipopago1_idx` (`idTipopago`),
  ADD KEY `fk_Transaccion_empleado1_idx` (`idempleado`),
  ADD KEY `fk_Transaccion_almacen1_idx` (`idalmacen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `idalmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idsucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idTipopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipotransaccion`
--
ALTER TABLE `tipotransaccion`
  MODIFY `idTipotransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `idtipo_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `idTransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `fk_producto_has_sucursal_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_sucursal1` FOREIGN KEY (`sucursalid`) REFERENCES `sucursal` (`idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_usuario` FOREIGN KEY (`tipo_empleado`) REFERENCES `tipo_empleado` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `listapagos`
--
ALTER TABLE `listapagos`
  ADD CONSTRAINT `fk_Listapagos_Transaccion1` FOREIGN KEY (`Transaccion_idTransaccion`) REFERENCES `transaccion` (`idTransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`marca`) REFERENCES `marca` (`nombre_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proveedor_prod` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`representante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sucursal_prod` FOREIGN KEY (`sucursal`) REFERENCES `sucursal` (`razon_social`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `fk_Transaccion_Tipopago1` FOREIGN KEY (`idTipopago`) REFERENCES `tipopago` (`idTipopago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaccion_Tipotransaccion1` FOREIGN KEY (`idTipotransaccion`) REFERENCES `tipotransaccion` (`idTipotransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaccion_almacen1` FOREIGN KEY (`idalmacen`) REFERENCES `almacen` (`idalmacen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaccion_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
