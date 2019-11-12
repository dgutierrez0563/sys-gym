-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2019 a las 04:24:52
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addtobag`
--

CREATE TABLE `addtobag` (
  `IDaddtobag` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Price` decimal(8,1) DEFAULT NULL,
  `Quantity` int(3) NOT NULL,
  `Total` decimal(8,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
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
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDCliente`, `Cedula`, `NombreCompleto`, `Correo`, `Direccion`, `FechaNacimiento`, `Sexo`, `Telefono1`, `Telefono2`, `Nacionalidad`, `Facebook`, `Twitter`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, '501230452', 'Albert Solis Gracia', 'albertgs28@hotmail.com', 'Rio Cuarto', '1985-05-26', 'Masculino', '60453014', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-02-08 06:37:08', 2, '2018-02-11 15:17:12'),
(2, '201650145', 'Sandra Corrales C', 'sancorra15@hotmail.com', 'Santa Rita', '1999-02-03', 'Femenino', '70153633', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-02-08 06:46:30', 2, '2018-04-14 07:38:44'),
(3, '603650408', 'David Gutierrez S', 'dgutierrez@gmail.com', 'Santa Rita', '1987-08-09', 'Masculino', '87924140', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-02-11 15:11:59', 2, '2018-02-20 17:46:28'),
(4, '0000', 'Not Shown', 'N/A', 'N/A', '2018-01-01', 'Masculino', '', '', 'N/A', '', '', 'Enabled', 2, '2018-03-06 00:30:41', 2, '2018-03-06 00:30:41'),
(5, '505230124', 'Luis Salas Monge', 'luissalasm12@outlook.com', 'Santa rita, Rio Cuarto', '1990-03-11', 'Masculino', '60124430', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-04-18 04:37:33', 2, '2018-04-18 04:37:33'),
(6, '204650121', 'Maria Alpizar Perez', 'malpizarp.15@gmail.com', 'Santa Rita, Rio Cuarto', '1994-10-25', 'Femenino', '24650174', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-04-18 04:39:00', 2, '2018-04-18 04:39:00'),
(7, '205230145', 'Martha Solano Aguilar', 'marthasol23@gmail.com', 'Santa Rita, Rio Cuarto', '1992-05-17', 'Femenino', '24657814', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-04-18 04:40:10', 2, '2018-04-18 04:40:10'),
(8, '502540332', 'Mario Salazar Tenez', 'tenezma.45@gmail.com', 'Santa Isabel, Rio Cuarto', '1989-05-22', 'Masculino', '70451210', '', 'Costa Rica', '', '', 'Enabled', 2, '2018-04-18 04:41:31', 2, '2018-04-18 04:41:31'),
(9, '501430857', 'Luis Carballo Campos', 'luiscarballoc456@gmail.com', 'Santa Isabel, Rio Cuarto', '1987-11-15', 'Masculino', '60452896', '24650315', 'Costa Rica', '', '', 'Enabled', 2, '2018-04-18 04:43:08', 2, '2018-04-18 04:43:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentagastos`
--

CREATE TABLE `cuentagastos` (
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
-- Volcado de datos para la tabla `cuentagastos`
--

INSERT INTO `cuentagastos` (`IDCuentaGastos`, `IDProveedor`, `NumeroFactura`, `Monto`, `FechaFactura`, `FechaVencimiento`, `EstadoFactura`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 4, '46880', '8000.0', '2018-01-21', '2018-02-21', 'Paid', 'Enabled', 2, '2018-02-21 19:22:51', 2, '2018-02-27 01:39:03'),
(2, 3, '46555', '65750.5', '2018-02-06', '2018-03-06', 'Credit', 'Enabled', 2, '2018-02-21 19:57:50', 2, '2018-02-26 23:08:15'),
(3, 4, '46881', '12500.0', '2018-01-21', '2018-02-21', 'Paid', 'Enabled', 2, '2018-02-21 20:00:00', 2, '2018-02-21 20:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
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
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`IDDetalle`, `IDFactura`, `IDProducto`, `Cantidad`, `PrecioVenta`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(156, 131, 4, 1, '200.0', 'Enabled', 2, '2018-04-26 17:18:04', 2, '2018-04-26 17:18:04'),
(155, 130, 3, 1, '800.0', 'Enabled', 2, '2018-04-26 17:17:04', 2, '2018-04-26 17:17:04'),
(154, 129, 2, 1, '200.0', 'Enabled', 2, '2018-04-26 17:16:24', 2, '2018-04-26 17:16:24'),
(153, 128, 2, 1, '200.0', 'Enabled', 2, '2018-04-26 17:16:01', 2, '2018-04-26 17:16:01'),
(152, 127, 3, 1, '800.0', 'Enabled', 2, '2018-04-26 17:15:19', 2, '2018-04-26 17:15:19'),
(151, 126, 2, 2, '400.0', 'Enabled', 2, '2018-04-26 17:06:04', 2, '2018-04-26 17:06:04'),
(150, 125, 3, 1, '800.0', 'Enabled', 2, '2018-04-26 17:04:57', 2, '2018-04-26 17:04:57'),
(149, 125, 4, 1, '200.0', 'Enabled', 2, '2018-04-26 17:04:57', 2, '2018-04-26 17:04:57'),
(148, 125, 1, 1, '150.0', 'Enabled', 2, '2018-04-26 17:04:57', 2, '2018-04-26 17:04:57'),
(147, 124, 1, 1, '150.0', 'Enabled', 2, '2018-04-14 07:45:21', 2, '2018-04-14 07:45:21'),
(146, 124, 4, 1, '200.0', 'Enabled', 2, '2018-04-14 07:45:21', 2, '2018-04-14 07:45:21'),
(145, 123, 3, 1, '800.0', 'Enabled', 2, '2018-04-10 18:03:55', 2, '2018-04-10 18:03:55'),
(144, 122, 2, 2, '400.0', 'Enabled', 2, '2018-04-08 18:00:48', 2, '2018-04-08 18:00:48'),
(143, 122, 1, 2, '300.0', 'Enabled', 2, '2018-04-08 18:00:48', 2, '2018-04-08 18:00:48'),
(142, 120, 2, 1, '200.0', 'Enabled', 2, '2018-04-02 17:22:21', 2, '2018-04-02 17:22:21'),
(141, 120, 1, 1, '150.0', 'Enabled', 2, '2018-04-02 17:22:21', 2, '2018-04-02 17:22:21'),
(140, 119, 2, 1, '200.0', 'Enabled', 2, '2018-04-02 17:21:12', 2, '2018-04-02 17:21:12'),
(139, 119, 1, 2, '300.0', 'Enabled', 2, '2018-04-02 17:21:12', 2, '2018-04-02 17:21:12'),
(138, 118, 1, 2, '300.0', 'Enabled', 2, '2018-04-02 17:20:13', 2, '2018-04-02 17:20:13'),
(137, 118, 2, 2, '400.0', 'Enabled', 2, '2018-04-02 17:20:13', 2, '2018-04-02 17:20:13'),
(136, 117, 1, 1, '150.0', 'Enabled', 2, '2018-04-02 17:19:23', 2, '2018-04-02 17:19:23'),
(135, 115, 2, 1, '200.0', 'Enabled', 2, '2018-04-02 17:16:13', 2, '2018-04-02 17:16:13'),
(134, 115, 1, 2, '300.0', 'Enabled', 2, '2018-04-02 17:16:13', 2, '2018-04-02 17:16:13'),
(133, 114, 2, 1, '200.0', 'Enabled', 2, '2018-03-29 23:12:09', 2, '2018-03-29 23:12:09'),
(132, 114, 1, 1, '150.0', 'Enabled', 2, '2018-03-29 23:12:09', 2, '2018-03-29 23:12:09'),
(131, 113, 2, 1, '200.0', 'Enabled', 2, '2018-03-25 07:26:19', 2, '2018-03-25 07:26:19'),
(130, 113, 1, 1, '150.0', 'Enabled', 2, '2018-03-25 07:26:19', 2, '2018-03-25 07:26:19'),
(129, 112, 2, 1, '200.0', 'Enabled', 2, '2018-03-25 03:39:25', 2, '2018-03-25 03:39:25'),
(128, 112, 1, 2, '300.0', 'Enabled', 2, '2018-03-25 03:39:25', 2, '2018-03-25 03:39:25'),
(123, 98, 1, 1, '150.0', 'Enabled', 2, '2018-03-19 22:11:42', 2, '2018-03-19 22:11:42'),
(124, 99, 1, 1, '150.0', 'Enabled', 2, '2018-03-19 22:13:18', 2, '2018-03-19 22:13:18'),
(125, 100, 1, 1, '150.0', 'Enabled', 2, '2018-03-19 22:14:09', 2, '2018-03-19 22:14:09'),
(126, 105, 1, 2, '300.0', 'Enabled', 2, '2018-03-20 01:54:00', 2, '2018-03-20 01:54:00'),
(127, 106, 1, 1, '150.0', 'Enabled', 2, '2018-03-20 02:02:31', 2, '2018-03-20 02:02:31'),
(157, 132, 2, 1, '200.0', 'Enabled', 2, '2019-09-11 02:15:26', 2, '2019-09-11 02:15:26'),
(158, 132, 3, 2, '1600.0', 'Enabled', 2, '2019-09-11 02:15:26', 2, '2019-09-11 02:15:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IDFactura` int(11) NOT NULL,
  `FechaFactura` datetime NOT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `Condicion` varchar(20) NOT NULL,
  `TotalVenta` decimal(8,1) NOT NULL,
  `EstadoFactura` varchar(20) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Estado` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IDFactura`, `FechaFactura`, `IDCliente`, `Condicion`, `TotalVenta`, `EstadoFactura`, `Tipo`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(111, '2018-03-25 00:00:00', 1, 'Cash', '5000.0', 'Paid', 'Subscription', 'Enabled', 2, '2018-03-25 03:20:51', 2, '2018-03-25 03:20:51'),
(112, '2018-03-24 00:00:00', 3, 'Cash', '500.0', 'Paid', '', 'Enabled', 2, '2018-03-25 03:39:25', 2, '2018-03-25 03:39:25'),
(113, '2018-03-25 00:00:00', 2, 'Cash', '350.0', 'Paid', '', 'Enabled', 2, '2018-03-25 07:26:19', 2, '2018-03-25 07:26:19'),
(114, '2018-03-29 00:00:00', 1, 'Cash', '350.0', 'Paid', '', 'Enabled', 2, '2018-03-29 23:12:09', 2, '2018-03-29 23:12:09'),
(116, '2018-04-02 00:00:00', 1, 'Cash', '500.0', 'Paid', '', 'Enabled', 2, '2018-04-02 17:16:13', 2, '2018-04-02 17:16:13'),
(117, '2018-04-02 00:00:00', 3, 'Cash', '150.0', 'Paid', '', 'Enabled', 2, '2018-04-02 17:19:23', 2, '2018-04-02 17:19:23'),
(118, '2018-04-02 00:00:00', 3, 'Cash', '700.0', 'Paid', '', 'Enabled', 2, '2018-04-02 17:20:13', 2, '2018-04-02 17:20:13'),
(119, '2018-04-02 00:00:00', 1, 'Cash', '500.0', 'Paid', '', 'Enabled', 2, '2018-04-02 17:21:12', 2, '2018-04-02 17:21:12'),
(120, '2018-04-02 00:00:00', 1, 'Cash', '350.0', 'Paid', '', 'Enabled', 2, '2018-04-02 17:22:21', 2, '2018-04-02 17:22:21'),
(121, '2018-04-03 00:00:00', 1, 'Cash', '5000.0', 'Paid', 'Subscription', 'Enabled', 2, '2018-04-04 01:25:00', 2, '2018-04-04 01:25:00'),
(122, '2018-04-08 00:00:00', 2, 'Cash', '700.0', 'Paid', '', 'Enabled', 2, '2018-04-08 18:00:48', 2, '2018-04-08 18:00:48'),
(123, '2018-04-10 00:00:00', 2, 'Cash', '800.0', 'Paid', '', 'Enabled', 2, '2018-04-10 18:03:55', 2, '2018-04-10 18:03:55'),
(124, '2018-04-14 00:00:00', 3, 'Cash', '350.0', 'Paid', '', 'Enabled', 2, '2018-04-14 07:45:21', 2, '2018-04-14 07:45:21'),
(125, '2018-04-26 00:00:00', 6, 'Cash', '1150.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:04:57', 2, '2018-04-26 17:04:57'),
(126, '2018-04-26 00:00:00', 6, 'Cash', '400.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:06:04', 2, '2018-04-26 17:06:04'),
(127, '2018-04-26 00:00:00', 9, 'Cash', '800.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:15:19', 2, '2018-04-26 17:15:19'),
(128, '2018-04-26 00:00:00', 9, 'Cash', '200.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:16:01', 2, '2018-04-26 17:16:01'),
(129, '2018-04-26 00:00:00', 9, 'Cash', '200.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:16:24', 2, '2018-04-26 17:16:24'),
(130, '2018-04-26 00:00:00', 9, 'Cash', '800.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:17:04', 2, '2018-04-30 16:34:59'),
(131, '2018-04-26 00:00:00', 9, 'Cash', '200.0', 'Paid', '', 'Enabled', 2, '2018-04-26 17:18:04', 2, '2018-04-30 16:34:53'),
(98, '2018-03-19 00:00:00', 3, 'Cash', '150.0', 'Paid', '', 'Enabled', 2, '2018-03-19 22:11:42', 2, '2018-03-19 22:11:42'),
(99, '2018-03-19 00:00:00', 3, 'Cash', '150.0', 'Paid', '', 'Enabled', 2, '2018-03-19 22:13:18', 2, '2018-03-19 22:13:18'),
(100, '2018-03-19 00:00:00', 3, 'Cash', '150.0', 'Paid', '', 'Enabled', 2, '2018-03-19 22:14:09', 2, '2018-03-19 22:14:09'),
(105, '2018-03-20 00:00:00', 1, 'Cash', '300.0', 'Paid', '', 'Enabled', 2, '2018-03-20 01:54:00', 2, '2018-03-20 01:54:00'),
(106, '2018-03-20 00:00:00', 1, 'Cash', '150.0', 'Paid', '', 'Enabled', 2, '2018-03-20 02:02:31', 2, '2018-03-20 02:02:31'),
(132, '2019-09-11 00:00:00', 4, 'Cash', '1800.0', 'Paid', '', 'Enabled', 2, '2019-09-11 02:15:26', 2, '2019-09-11 02:15:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilcliente`
--

CREATE TABLE `perfilcliente` (
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

--
-- Volcado de datos para la tabla `perfilcliente`
--

INSERT INTO `perfilcliente` (`IDPerfil`, `IDCliente`, `Altura`, `Peso`, `GrasaCorporal`, `Agua`, `IMC`, `BMR`, `MasaOsea`, `GrasaViceral`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 1, '1.50', '70.2', '13.5', '46', '15', '25', '13', '13.1', 'Enabled', 2, '2018-03-20 15:16:08', 2, '2018-03-25 02:36:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
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
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`IDPlan`, `NombrePlan`, `CantidadDias`, `Costo`, `Detalle`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 'Semanal', 7, '5000.0', 'Lunes-Sabado', 'Enabled', 2, '2018-01-26 05:51:39', 2, '2018-03-24 17:38:42'),
(2, 'Mensual', 30, '20000.0', '4 semanas', 'Enabled', 2, '2018-01-28 05:07:33', 2, '2018-02-20 17:46:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
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
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IDProducto`, `NombreProducto`, `Precio`, `Cantidad`, `IDProveedor`, `Detalle`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, 'Cheetos', '150.0', 25, 1, 'N/A', 'Enabled', 2, '2018-01-28 04:44:28', 2, '2019-03-27 07:30:03'),
(2, 'Paleta Choco Snack', '200.0', 7, 2, '', 'Enabled', 2, '2018-01-28 05:04:57', 2, '2019-09-11 02:15:26'),
(3, 'Powerade', '800.0', 24, 3, '', 'Enabled', 2, '2018-04-10 18:03:27', 2, '2019-09-11 02:15:26'),
(4, 'Galleta Maria', '200.0', 17, 1, '', 'Enabled', 2, '2018-04-14 07:40:26', 2, '2018-04-26 17:18:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
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
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IDProveedor`, `CedulaJuridica`, `NombreProveedor`, `Correo`, `Direccion`, `Telefono1`, `Telefono2`, `Representante`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(1, '11002450220', 'Productos Chago S.A', 'serviciocliente@chago.co.cr', 'San Carlos, Alajuela', '24601560', '24600052', 'Juan Marco Salas', 'Enabled', 2, '2018-01-25 03:59:22', 2, '2018-04-14 07:39:59'),
(2, '150023442200', 'Dos Pinos', 'servicioalcliente@dospinos.co.cr', 'Ciudad Quesada, Alajuela', '24605055', '', 'Carlos Aguilar', 'Enabled', 2, '2018-01-28 05:02:16', 2, '2018-04-13 17:31:50'),
(3, '12001423513', 'Coca Cola Company', 'servicioalcliente@cocacola.co.cr', 'San Carlos', '22351212', '', 'Alberto Salas', 'Enabled', 2, '2018-02-21 14:14:18', 2, '2018-04-13 17:31:38'),
(4, '3101424372', 'WSM Jade 9 S.A', 'N/A', 'Terminal Buses Ciudad Quesada', '26604294', '', 'N/A', 'Enabled', 2, '2018-02-21 19:21:30', 2, '2018-04-13 17:32:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppingbag`
--

CREATE TABLE `shoppingbag` (
  `IDShoppingBag` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Price` decimal(8,1) DEFAULT NULL,
  `Quantity` int(3) NOT NULL,
  `PriceTotal` decimal(8,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripcion`
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

--
-- Volcado de datos para la tabla `subscripcion`
--

INSERT INTO `subscripcion` (`IDSubscripcion`, `IDCliente`, `IDPlan`, `IDFactura`, `FechaSubscripcion`, `FechaExpira`, `Estado`, `created_user`, `created_at`, `updated_user`, `updated_at`) VALUES
(7, 1, 1, 121, '2018-04-03 00:00:00', '2018-04-10 00:00:00', 'Enabled', 2, '2018-03-25 03:20:51', 2, '2018-04-04 01:25:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUsuario`, `NombreUsuario`, `Contrasenia`, `Cedula`, `NombreCompleto`, `Correo`, `Telefono`, `Direccion`, `Foto`, `Role`, `Estado`, `created_at`, `updated_at`) VALUES
(1, 'minor20', 'a8899cfb51659b9ae9c646dd985b1e17', '503540125', 'Minor Rojas', 'minor@yahoo.com', '50111324', 'Rio Cuarto', NULL, 'Admin', 'Enabled', '2018-01-24 21:52:50', '2019-09-11 02:23:18'),
(2, 'masonhsp', '28017d018848cb86820ab27c06a2d91b', '603650408', 'Harry Mason', 'masonhsp@yahoo.com', '24600013', 'Sta Rita', NULL, 'Admin', 'Enabled', '2018-01-24 23:32:28', '2019-09-11 02:23:28'),
(3, 'torres20', '6ca7ce10e9fc21c5014a601a5e55b628', '205250124', 'Luis Torres', 'luis@gmail.com', '24601113', 'Venecia, San Carlos', NULL, 'User', 'Enabled', '2018-02-24 22:55:42', '2019-09-11 02:23:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addtobag`
--
ALTER TABLE `addtobag`
  ADD PRIMARY KEY (`IDaddtobag`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `cuentagastos`
--
ALTER TABLE `cuentagastos`
  ADD PRIMARY KEY (`IDCuentaGastos`),
  ADD KEY `IDProveedor` (`IDProveedor`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`IDDetalle`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDFactura` (`IDFactura`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFactura`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDCliente` (`IDCliente`);

--
-- Indices de la tabla `perfilcliente`
--
ALTER TABLE `perfilcliente`
  ADD PRIMARY KEY (`IDPerfil`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDCliente` (`IDCliente`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`IDPlan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDProveedor` (`IDProveedor`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IDProveedor`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `shoppingbag`
--
ALTER TABLE `shoppingbag`
  ADD PRIMARY KEY (`IDShoppingBag`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `subscripcion`
--
ALTER TABLE `subscripcion`
  ADD PRIMARY KEY (`IDSubscripcion`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDPlan` (`IDPlan`),
  ADD KEY `IDFactura` (`IDFactura`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addtobag`
--
ALTER TABLE `addtobag`
  MODIFY `IDaddtobag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cuentagastos`
--
ALTER TABLE `cuentagastos`
  MODIFY `IDCuentaGastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `IDDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IDFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `perfilcliente`
--
ALTER TABLE `perfilcliente`
  MODIFY `IDPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `IDPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IDProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `shoppingbag`
--
ALTER TABLE `shoppingbag`
  MODIFY `IDShoppingBag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT de la tabla `subscripcion`
--
ALTER TABLE `subscripcion`
  MODIFY `IDSubscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
