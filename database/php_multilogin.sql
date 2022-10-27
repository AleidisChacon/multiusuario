-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2022 a las 17:07:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_multilogin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mainlogin`
--

CREATE TABLE `mainlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `role` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `mainlogin`
--

INSERT INTO `mainlogin` (`id`, `username`, `email`, `password`, `role`) VALUES
(11, 'admin          ', 'admin@gmail.com', '123456            ', 'admin'),
(15, 'aleidis    ', 'aychiquillo5@misena.edu.co', '123456    ', 'personal'),
(16, 'ale ', 'usuario@gmail.com', '123456 ', 'usuarios'),
(17, 'camila ', 'cami@gmail.com', '123456    ', 'personal'),
(20, 'aldo', 'aldo@gmail.com', '123456', 'usuarios'),
(26, 'lucho', 'luis@gmail.com', '123456', 'personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `numsituacion` int(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `nivelgravedad` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `observacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`numsituacion`, `nombre`, `apellido`, `area`, `tipo`, `nivelgravedad`, `fecha`, `hora`, `observacion`) VALUES
(1, 'aldo ', 'asdasd  ', 'asdasd  ', 'asdasd  ', '', '0000-00-00', '00:00:12.000000', ''),
(20, 'camila', 'obregon', 'asasdasda', 'asdasdasd', '3', '2022-10-20', '12:00:00.000000', 'asdasdsa'),
(21, 'fsdfsdf', 'dsfsdf', 'dsfsdf', 'sdfsdf', '1', '2022-10-21', '00:00:23.000000', 'dfsfsdfsdf'),
(25, 'adsd', 'asdasd', 'asasdasda', 'asdasdasd', '3', '2022-10-20', '12:00:00.000000', '1651651');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`numsituacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `numsituacion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
