-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2018 at 11:31 PM
-- Server version: 10.1.21-MariaDB
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
-- Database: `sysgym`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `perfilProveedor` (INOUT `id` INT(11))  NO SQL
BEGIN
SELECT proveedor.IDProveedor,proveedor.CedulaJuridica,proveedor.NombreProveedor,proveedor.Correo,proveedor.Direccion, proveedor.Telefono1,proveedor.Telefono2,proveedor.Representante,proveedor.Estado,proveedor.updated_user,usuario.IDUsuario,usuario.NombreUsuario FROM proveedor, usuario WHERE proveedor.created_user=usuario.IDUsuario
  AND proveedor.updated_user=usuario.IDUsuario AND proveedor.IDProveedor=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplierProfile` (INOUT `id` INT(11))  NO SQL
BEGIN
SELECT proveedor.IDProveedor,proveedor.CedulaJuridica,proveedor.NombreProveedor,proveedor.Correo,proveedor.Direccion, proveedor.Telefono1,proveedor.Telefono2,proveedor.Representante,proveedor.Estado,proveedor.updated_user,usuario.IDUsuario,usuario.NombreUsuario FROM proveedor, usuario WHERE 
proveedor.updated_user=usuario.IDUsuario AND proveedor.IDProveedor=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `viewperfilProveedor` (INOUT `id` INT(11))  BEGIN
  SELECT proveedor.IDProveedor,proveedor.CedulaJuridica,proveedor.NombreProveedor,proveedor.Correo,proveedor.Direccion,
  proveedor.Telefono1,proveedor.Telefono2,proveedor.Representante,proveedor.Estado,proveedor.updated_user AS 'Updated',usuario.IDUsuario,usuario.NombreUsuario FROM proveedor, usuario WHERE proveedor.created_user=usuario.IDUsuario
  AND proveedor.updated_user=usuario.IDUsuario AND proveedor.IDProveedor=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `IDCliente` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `NombreCompleto` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Telefono1` varchar(20) DEFAULT NULL,
  `Telefono2` varchar(20) DEFAULT NULL,
  `Nacionalidad` varchar(30) NOT NULL,
  `Facebook` varchar(30) DEFAULT NULL,
  `Twitter` varchar(30) DEFAULT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`IDCliente`, `Cedula`, `NombreCompleto`, `Correo`, `Direccion`, `FechaNacimiento`, `Sexo`, `Telefono1`, `Telefono2`, `Nacionalidad`, `Facebook`, `Twitter`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, '501230452', 'Albert Solis Gracia', 'albertgs28@hotmail.com', 'Rio Cuarto', '1985-05-26', 'Masculino', '60453014', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-02-08 06:37:08', 2, '2018-02-11 15:17:12'),
(2, '201650145', 'Sandra Corrales', 'sancorra15@hotmail.com', 'Santa Rita', '1999-02-03', 'Femenino', '70153633', '', 'Costa Rica', '', '', 'Disabled', 2, '2018-02-08 06:46:30', 2, '2018-03-10 19:35:57'),
(3, '603650408', 'David Gutierrez S', 'dgutierrez@gmail.com', 'Santa Rita', '1987-08-09', 'Masculino', '87924140', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-02-11 15:11:59', 2, '2018-02-20 17:46:28'),
(4, '0000', 'Not Shown', 'N/A', 'N/A', '2018-01-01', 'Masculino', '', '', 'N/A', '', '', 'Enabled', 2, '2018-03-06 00:30:41', 2, '2018-03-06 00:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `cuentaGastos`
--

CREATE TABLE `cuentaGastos` (
  `IDCuentaGastos` int(11) NOT NULL,
  `IDProveedor` int(11) NOT NULL,
  `NumeroFactura` varchar(20) NOT NULL,
  `Monto` decimal(8,1) NOT NULL,
  `FechaFactura` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `EstadoFactura` varchar(10) NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuentaGastos`
--

INSERT INTO `cuentaGastos` (`IDCuentaGastos`, `IDProveedor`, `NumeroFactura`, `Monto`, `FechaFactura`, `FechaVencimiento`, `EstadoFactura`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 4, '46880', '8000.0', '2018-01-21', '2018-02-21', 'Paid', 'Enabled', 2, '2018-02-21 19:22:51', 2, '2018-02-27 01:39:03'),
(2, 3, '46555', '65750.5', '2018-02-06', '2018-03-06', 'Credit', 'Enabled', 2, '2018-02-21 19:57:50', 2, '2018-02-26 23:08:15'),
(3, 4, '46881', '12500.0', '2018-01-21', '2018-02-21', 'Paid', 'Enabled', 2, '2018-02-21 20:00:00', 2, '2018-02-21 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detalleFactura`
--

CREATE TABLE `detalleFactura` (
  `IDDetalle` int(11) NOT NULL,
  `IDFactura` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioVenta` decimal(8,1) NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalleFactura`
--

INSERT INTO `detalleFactura` (`IDDetalle`, `IDFactura`, `IDProducto`, `Cantidad`, `PrecioVenta`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(59, 49, 1, 1, '150.0', 'Enabled', 2, '2018-03-10 19:26:37', 2, '2018-03-10 19:26:37'),
(58, 48, 2, 1, '200.0', 'Enabled', 2, '2018-03-09 00:36:57', 2, '2018-03-09 00:36:57'),
(57, 48, 1, 1, '150.0', 'Enabled', 2, '2018-03-09 00:36:57', 2, '2018-03-09 00:36:57'),
(56, 47, 1, 1, '150.0', 'Enabled', 2, '2018-03-06 01:42:43', 2, '2018-03-06 01:42:43'),
(55, 45, 2, 1, '200.0', 'Enabled', 2, '2018-03-06 00:37:25', 2, '2018-03-06 00:37:25'),
(54, 45, 1, 1, '150.0', 'Enabled', 2, '2018-03-06 00:37:25', 2, '2018-03-06 00:37:25'),
(53, 44, 1, 1, '150.0', 'Enabled', 2, '2018-03-04 16:28:32', 2, '2018-03-04 16:28:32'),
(52, 43, 2, 1, '200.0', 'Enabled', 2, '2018-03-04 16:26:35', 2, '2018-03-04 16:26:35'),
(51, 42, 2, 1, '200.0', 'Enabled', 2, '2018-03-04 16:24:06', 2, '2018-03-04 16:24:06'),
(50, 42, 1, 1, '150.0', 'Enabled', 2, '2018-03-04 16:24:06', 2, '2018-03-04 16:24:06'),
(49, 41, 2, 1, '200.0', 'Enabled', 2, '2018-03-04 16:21:50', 2, '2018-03-04 16:21:50'),
(48, 41, 1, 1, '150.0', 'Enabled', 2, '2018-03-04 16:21:50', 2, '2018-03-04 16:21:50'),
(47, 40, 2, 1, '200.0', 'Enabled', 2, '2018-03-03 23:34:24', 2, '2018-03-03 23:34:24'),
(46, 40, 1, 1, '150.0', 'Enabled', 2, '2018-03-03 23:34:24', 2, '2018-03-03 23:34:24'),
(45, 39, 2, 1, '200.0', 'Enabled', 2, '2018-03-03 22:57:35', 2, '2018-03-03 22:57:35'),
(44, 38, 2, 1, '200.0', 'Enabled', 2, '2018-03-03 04:12:08', 2, '2018-03-03 04:12:08'),
(43, 37, 2, 3, '600.0', 'Enabled', 2, '2018-03-03 01:21:00', 2, '2018-03-03 01:21:00'),
(42, 37, 1, 2, '300.0', 'Enabled', 2, '2018-03-03 01:21:00', 2, '2018-03-03 01:21:00'),
(41, 36, 2, 5, '1000.0', 'Enabled', 2, '2018-03-03 01:20:21', 2, '2018-03-03 01:20:21'),
(40, 36, 1, 11, '1650.0', 'Enabled', 2, '2018-03-03 01:20:21', 2, '2018-03-03 01:20:21'),
(39, 2, 2, 1, '200.0', 'Enabled', 2, '2018-03-03 01:11:53', 2, '2018-03-03 01:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `IDFactura` int(11) NOT NULL,
  `FechaFactura` datetime NOT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `Condicion` varchar(20) NOT NULL,
  `TotalVenta` decimal(8,1) NOT NULL,
  `EstadoFactura` varchar(20) NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`IDFactura`, `FechaFactura`, `IDCliente`, `Condicion`, `TotalVenta`, `EstadoFactura`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, '2018-02-27 00:00:00', NULL, 'Cash', '1.0', 'Paid', 'Enabled', 1, '2018-02-27 23:50:19', 1, '2018-02-27 23:51:08'),
(49, '2018-03-10 00:00:00', 2, 'Cash', '150.0', 'Paid', 'Enabled', 2, '2018-03-10 19:26:37', 2, '2018-03-10 19:26:37'),
(48, '2018-03-09 00:00:00', 2, 'Cash', '350.0', 'Paid', 'Enabled', 2, '2018-03-09 00:36:57', 2, '2018-03-09 00:36:57'),
(47, '2018-03-06 00:00:00', 4, 'Cash', '150.0', 'Paid', 'Enabled', 2, '2018-03-06 01:42:43', 2, '2018-03-06 01:42:43'),
(46, '2018-03-06 00:00:00', 4, 'Cash', '350.0', 'Paid', 'Enabled', 2, '2018-03-06 00:37:25', 2, '2018-03-06 00:37:25'),
(44, '2018-03-04 00:00:00', 3, 'Cash', '150.0', 'Paid', 'Enabled', 2, '2018-03-04 16:28:32', 2, '2018-03-04 16:28:32'),
(43, '2018-03-04 00:00:00', 1, 'Cash', '200.0', 'Paid', 'Enabled', 2, '2018-03-04 16:26:35', 2, '2018-03-04 16:26:35'),
(42, '2018-03-04 00:00:00', 3, 'Cash', '350.0', 'Paid', 'Enabled', 2, '2018-03-04 16:24:06', 2, '2018-03-04 16:24:06'),
(41, '2018-03-04 00:00:00', 2, 'Cash', '350.0', 'Paid', 'Enabled', 2, '2018-03-04 16:21:50', 2, '2018-03-04 16:21:50'),
(40, '2018-03-04 00:00:00', 2, 'Credit', '350.0', 'Pending', 'Enabled', 2, '2018-03-03 23:34:24', 2, '2018-03-03 23:34:24'),
(39, '2018-03-03 00:00:00', 1, 'Credit', '200.0', 'Pending', 'Enabled', 2, '2018-03-03 22:57:35', 2, '2018-03-03 22:57:35'),
(38, '2018-03-03 00:00:00', 2, 'Credit', '200.0', 'Paid', 'Enabled', 2, '2018-03-03 04:12:08', 2, '2018-03-03 17:20:06'),
(37, '2018-03-03 00:00:00', 3, 'Cash', '900.0', 'Paid', 'Enabled', 2, '2018-03-03 01:21:00', 2, '2018-03-03 01:21:00'),
(36, '2018-03-03 00:00:00', 1, 'Cash', '2650.0', 'Paid', 'Enabled', 2, '2018-03-03 01:20:21', 2, '2018-03-03 01:20:21'),
(35, '2018-03-03 00:00:00', 2, 'Cash', '200.0', 'Paid', 'Enabled', 2, '2018-03-03 01:11:53', 2, '2018-03-03 01:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `perfilCliente`
--

CREATE TABLE `perfilCliente` (
  `IDPerfil` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `Altura` varchar(10) NOT NULL,
  `Peso` varchar(10) NOT NULL,
  `GrasaCorporal` varchar(10) NOT NULL,
  `Agua` varchar(10) NOT NULL,
  `IMC` varchar(10) NOT NULL,
  `BMR` varchar(10) NOT NULL,
  `MasaOsea` varchar(10) NOT NULL,
  `GrasaViceral` varchar(10) NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `IDPlan` int(11) NOT NULL,
  `NombrePlan` varchar(30) NOT NULL,
  `CantidadDias` int(3) NOT NULL,
  `Costo` decimal(8,1) NOT NULL,
  `Detalle` varchar(100) DEFAULT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`IDPlan`, `NombrePlan`, `CantidadDias`, `Costo`, `Detalle`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 'Semanal', 6, '5000.0', 'Lunes-Sabado', 'Enabled', 2, '2018-01-26 05:51:39', 2, '2018-02-06 01:48:08'),
(2, 'Mensual', 30, '20000.0', '4 semanas', 'Enabled', 2, '2018-01-28 05:07:33', 2, '2018-02-20 17:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `IDProducto` int(11) NOT NULL,
  `NombreProducto` varchar(40) NOT NULL,
  `Precio` decimal(8,1) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IDProveedor` int(11) NOT NULL,
  `Detalle` varchar(100) DEFAULT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`IDProducto`, `NombreProducto`, `Precio`, `Cantidad`, `IDProveedor`, `Detalle`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 'Cheetos', '150.0', 19, 1, 'N/A', 'Enabled', 2, '2018-01-28 04:44:28', 2, '2018-03-10 19:42:26'),
(2, 'Paleta Choco Snack', '200.0', 22, 2, '', 'Enabled', 2, '2018-01-28 05:04:57', 2, '2018-03-08 17:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `IDProveedor` int(11) NOT NULL,
  `CedulaJuridica` varchar(20) NOT NULL,
  `NombreProveedor` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono1` varchar(20) DEFAULT NULL,
  `Telefono2` varchar(20) DEFAULT NULL,
  `Representante` varchar(50) DEFAULT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`IDProveedor`, `CedulaJuridica`, `NombreProveedor`, `Correo`, `Direccion`, `Telefono1`, `Telefono2`, `Representante`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, '1-10024502-20', 'Productos Chago S.A', 'serviciocliente@chago.co.cr', 'San Carlos, Alajuela', '24601560', '24600052', 'Juan Marco Salas', 'Disabled', 2, '2018-01-25 03:59:22', 2, '2018-03-10 19:38:22'),
(2, '1-50023442-200', 'Dos Pinos', 'servicioalcliente@dospinos.co.cr', 'Ciudad Quesada, Alajuela', '24605055', '', 'Carlos Aguilar', 'Enabled', 2, '2018-01-28 05:02:16', 2, '2018-02-21 14:28:24'),
(3, '1-20014235-13', 'Coca Cola Company', 'servicioalcliente@cocacola.co.cr', 'San Carlos', '22351212', '', 'Alberto Salas', 'Enabled', 2, '2018-02-21 14:14:18', 2, '2018-02-21 14:31:26'),
(4, '3-101-424372', 'WSM Jade 9 S.A', 'N/A', 'Terminal Buses Ciudad Quesada', '26604294', '', 'N/A', 'Enabled', 2, '2018-02-21 19:21:30', 2, '2018-02-21 19:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingBag`
--

CREATE TABLE `shoppingBag` (
  `IDShoppingBag` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Price` decimal(8,1) DEFAULT NULL,
  `Quantity` int(3) NOT NULL,
  `PriceTotal` decimal(8,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscripcion`
--

CREATE TABLE `subscripcion` (
  `IDSubscripcion` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDPlan` int(11) NOT NULL,
  `IDFactura` int(11) NOT NULL,
  `FechaSubscripcion` datetime NOT NULL,
  `FechaExpira` datetime NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(30) NOT NULL,
  `Contrasenia` varchar(60) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `NombreCompleto` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Direccion` text NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Role` varchar(15) NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IDUsuario`, `NombreUsuario`, `Contrasenia`, `Cedula`, `NombreCompleto`, `Correo`, `Telefono`, `Direccion`, `Foto`, `Role`, `Estado`, `created_at`, `updated_at`) VALUES
(1, 'minor20', '0f58fd4c84c06d780f98702a6a0a2138', '503540125', 'Minor Rojas', 'minor@yahoo.com', '50111324', 'Rio Cuarto', NULL, 'Admin', 'Enabled', '2018-01-24 21:52:50', '2018-02-20 20:47:31'),
(2, 'masonhsp', '28017d018848cb86820ab27c06a2d91b', '603650408', 'Harry Mason', 'masonhsp@yahoo.com', '24600013', 'Sta Rita', NULL, 'Admin', 'Enabled', '2018-01-24 23:32:28', '2018-02-20 17:52:39'),
(3, 'torres20', 'b50ac41ec20631c7b6be72f070d8ff67', '205250124', 'Luis Torres', 'luis@gmail.com', '24601113', 'Venecia, San Carlos', NULL, 'User', 'Enabled', '2018-02-24 22:55:42', '2018-02-24 22:55:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `cuentaGastos`
--
ALTER TABLE `cuentaGastos`
  ADD PRIMARY KEY (`IDCuentaGastos`),
  ADD KEY `IDProveedor` (`IDProveedor`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `detalleFactura`
--
ALTER TABLE `detalleFactura`
  ADD PRIMARY KEY (`IDDetalle`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDFactura` (`IDFactura`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFactura`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDCliente` (`IDCliente`);

--
-- Indexes for table `perfilCliente`
--
ALTER TABLE `perfilCliente`
  ADD PRIMARY KEY (`IDPerfil`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDCliente` (`IDCliente`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`IDPlan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDProveedor` (`IDProveedor`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IDProveedor`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `shoppingBag`
--
ALTER TABLE `shoppingBag`
  ADD PRIMARY KEY (`IDShoppingBag`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indexes for table `subscripcion`
--
ALTER TABLE `subscripcion`
  ADD PRIMARY KEY (`IDSubscripcion`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDPlan` (`IDPlan`),
  ADD KEY `IDFactura` (`IDFactura`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cuentaGastos`
--
ALTER TABLE `cuentaGastos`
  MODIFY `IDCuentaGastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detalleFactura`
--
ALTER TABLE `detalleFactura`
  MODIFY `IDDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `IDFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `IDPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IDProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shoppingBag`
--
ALTER TABLE `shoppingBag`
  MODIFY `IDShoppingBag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `subscripcion`
--
ALTER TABLE `subscripcion`
  MODIFY `IDSubscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
