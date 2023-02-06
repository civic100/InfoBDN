-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 12:15:36
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infobdn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `dni` varchar(9) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dni`, `contraseña`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `nombre`, `apellido`, `edad`, `foto`, `email`, `contraseña`, `activo`) VALUES
('22222222A', 'Alumno1', 'Alumno1', 20, 'img/1665251208-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222B', 'Alumno2', 'Alumno2', 22, 'img/1665251243-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222C', 'Alumno3', 'Alumno3', 18, 'img/1665251273-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222D', 'Alumno4', 'Alumno4', 30, 'img/1665251305-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222E', 'Alumno5', 'Alumno5', 20, 'img/1665251339-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222F', 'Alumno6', 'Alumno6', 18, 'img/1665251368-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222G', 'Alumno7', 'Alumno7', 18, 'img/1665251396-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('22222222H', 'Alumno8', 'Alumno8', 18, 'img/1665251419-a.jpg', '', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `horas` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafinal` date NOT NULL,
  `profesor` varchar(9) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codigo`, `nombre`, `descripcion`, `horas`, `fechainicio`, `fechafinal`, `profesor`, `activo`, `foto`) VALUES
(26, 'HTML5', '  Introduccion html5', 22, '2022-10-17', '2022-10-31', '11111111A', 1, 'img/1665252685-índice.png'),
(28, 'JavaScript', 'JavaScript 1', 30, '2022-10-17', '2022-10-31', '11111111B', 1, 'img/1665253590-2png.png'),
(29, 'C++', 'Introduccion a la programacion', 25, '2022-10-17', '2022-10-31', '11111111C', 1, 'img/1665253619-ISO_C++_Logo.svg.png'),
(31, 'Css', 'Estilos WEB', 30, '2022-10-17', '2022-10-31', '11111111D', 1, 'img/1665253726-919826.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `dni_alumno` varchar(9) NOT NULL,
  `curso` int(11) NOT NULL,
  `nota` varchar(11) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`dni_alumno`, `curso`, `nota`, `activo`) VALUES
('22222222A', 26, '0', 1),
('22222222A', 29, '0', 1),
('22222222B', 26, '0', 1),
('22222222B', 28, '5', 1),
('22222222B', 31, '0', 1),
('22222222C', 26, '0', 1),
('22222222D', 29, '0', 1),
('22222222D', 31, '0', 1),
('22222222E', 28, '0', 1),
('22222222E', 29, '0', 1),
('22222222E', 31, '0', 1),
('22222222F', 29, '0', 1),
('22222222H', 29, '0', 1),
('22222222H', 31, '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tituloacademico` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`dni`, `nombre`, `apellido`, `tituloacademico`, `foto`, `contraseña`, `activo`) VALUES
('11111111A', 'Profesor1', 'Profesor1', 'Informatico', 'img/1665251513-1663919506-índice.jpg', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('11111111B', 'Profesor2', 'Profesor2', 'Programador', 'img/1665251543-1663919506-índice.jpg', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('11111111C', 'Profesor3', 'Profesor3', 'Ingeniero infor', 'img/1665251604-1663919506-índice.jpg', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('11111111D', 'Profesor4', 'Profesor4', 'Informatico', 'img/1665251707-1663919506-índice.jpg', 'c4ca4238a0b923820dcc509a6f75849b', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cursos_ibfk_!` (`profesor`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`dni_alumno`,`curso`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_!` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`dni`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `cursos` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
