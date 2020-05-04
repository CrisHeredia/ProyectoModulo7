-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2020 a las 23:36:27
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(40) NOT NULL COMMENT 'Nombre del Evento',
  `FInicio` date NOT NULL COMMENT 'Fecha de Inicio',
  `FFin` date DEFAULT NULL COMMENT 'Fecha Final',
  `HInicio` time DEFAULT NULL COMMENT 'Hora de Inicio',
  `HFin` time DEFAULT NULL COMMENT 'Hora Final',
  `Duracion` tinyint(1) NOT NULL COMMENT 'Dura todo el día?',
  `FKUsuario` int(11) NOT NULL COMMENT 'Usuario del Evento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID`, `Titulo`, `FInicio`, `FFin`, `HInicio`, `HFin`, `Duracion`, `FKUsuario`) VALUES
(2, 'Cita medica dental', '2020-05-08', '0000-00-00', '12:00:00', '13:00:00', 0, 1),
(4, 'Reunion Colegio', '2020-05-07', '0000-00-00', '00:00:00', '00:00:00', 0, 1),
(5, 'Feria Computadoras', '2020-05-06', '0000-00-00', '00:00:00', '00:00:00', 1, 1),
(6, 'Almuerzo cumple', '2020-05-02', '0000-00-00', '00:00:00', '00:00:00', 0, 1),
(7, 'Examenes Medicos', '2020-05-11', '2020-05-11', '06:30:00', '07:30:00', 0, 1),
(8, 'Mudanza casa', '2020-05-17', '0000-00-00', '00:00:00', '00:00:00', 1, 1),
(9, 'Visita de campo', '2020-05-11', '0000-00-00', '00:00:00', '00:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL COMMENT 'Identificador',
  `Usuario` varchar(50) NOT NULL COMMENT 'Correo Electrónico',
  `Nombre` text NOT NULL COMMENT 'Nombre Completo',
  `Contrasena` varchar(255) NOT NULL COMMENT 'Contraseña',
  `FNacimiento` date NOT NULL COMMENT 'Fecha de Nacimiento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Usuario`, `Nombre`, `Contrasena`, `FNacimiento`) VALUES
(1, 'p_rodriguez@hotmail.com', 'Patricia Rodriguez', '$2y$10$7oGRlw8Ld9w9Or5jSDs7A.yU0tmXHXo6haBRX0gNFf5ayczAwz9Im', '1985-08-31'),
(2, 'm_aguilera@gmail.com', 'María Aguilera', '$2y$10$AJj0SJ6cTN5KTqg3lni0xutKT44RLcsaImpmQbANKaeaUt.CrOn7C', '1980-12-28'),
(3, 'jj_jaramillo@gmail.com', 'Juan José Jaramillo', '$2y$10$IjRQMrTfGfcwDGTZpWzYw.Bzz/G5UmUOcpJboT6SmRATAtMpVZ/wy', '1983-10-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
