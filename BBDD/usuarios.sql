-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 17:17:19
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Ind_Comentario` int(11) NOT NULL,
  `Propietario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `N_Propuesta` int(11) NOT NULL,
  `Usuario_Comentario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Comentario` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Ind_Comentario`, `Propietario`, `N_Propuesta`, `Usuario_Comentario`, `Comentario`, `Fecha`) VALUES
(1, 'gonzalokito91', 1, 'gonzalokito91', 'Yo creo que no tiene ningÃºn sentido esta propuesta ya que poner velas podrÃ­a ser peligroso y ademas habrÃ­a que cambiarlas cada poco tiempo', '2017-06-15 14:29:56'),
(1, 'gonzalokito91', 2, 'gonzalokito91', 'Una caca', '2017-06-15 14:33:16'),
(2, 'gonzalokito91', 2, 'gonzalokito91', 'Yo creo que no es viable', '2017-06-15 14:33:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `Id_Pregunta` int(11) NOT NULL,
  `Cuerpo_Pregunta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Idioma` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `N_Respuestas` int(11) NOT NULL DEFAULT '0',
  `Fecha_Creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`Id_Pregunta`, `Cuerpo_Pregunta`, `Idioma`, `N_Respuestas`, `Fecha_Creacion`) VALUES
(1, 'Â¿QuerÃ­a saber en que consiste la contaminaciÃ³n lumÃ­nica?', 'ESP', 1, '2017-05-19 07:45:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuestas`
--

CREATE TABLE `propuestas` (
  `Id_Unico` int(11) NOT NULL,
  `Titulo_Propuesta` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Cuerpo_Propuesta` varchar(3000) CHARACTER SET latin1 NOT NULL,
  `N_Comentarios` int(11) NOT NULL DEFAULT '0',
  `Propietario` varchar(45) CHARACTER SET latin1 NOT NULL,
  `N_Propuesta` int(11) NOT NULL,
  `Votos` int(11) NOT NULL DEFAULT '0',
  `Etiqueta` varchar(22) CHARACTER SET latin1 NOT NULL DEFAULT 'Sin Etiqueta',
  `Idioma` char(3) CHARACTER SET latin1 NOT NULL,
  `Confirmacion` int(11) NOT NULL DEFAULT '0',
  `Ruta_Fichero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propuestas`
--

INSERT INTO `propuestas` (`Id_Unico`, `Titulo_Propuesta`, `Cuerpo_Propuesta`, `N_Comentarios`, `Propietario`, `N_Propuesta`, `Votos`, `Etiqueta`, `Idioma`, `Confirmacion`, `Ruta_Fichero`, `Fecha_Creacion`) VALUES
(1, 'Farolas de Fuego', 'Buenos dÃ­as, mi propuesta consiste en la utilizaciÃ³n de velas en lugar de farolas en la mayorÃ­a de las calles de Madrid ya que Barcelona no es una ciudad contaminante.\r\n\r\nSin embargo esta propuesta habrÃ­a que pensarla y trabajarla para que en el futuro se pueda aplicar.\r\n\r\nFirmado Gonxo', 1, 'gonzalokito91', 1, 1, 'Sin Etiqueta', 'ESP', 1, '', '2017-02-13 09:34:43'),
(2, 'Utilizar Farolas EcolÃ³gicas', 'Yo propongo que en todos los municipios se subvencione el uso de este tipo de farolas que tienen un haz de luz mucho menos potente y ademÃ¡s solo va dirigido hacia el suelo evitando que contamine el cielo.', 2, 'gonzalokito91', 2, 0, 'Farola', 'ESP', 0, '', '2017-06-15 14:32:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `Id_Pregunta` int(11) NOT NULL,
  `Respuesta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`Id_Pregunta`, `Respuesta`, `Fecha`) VALUES
(1, 'Ni idea', '2017-06-15 15:02:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_web`
--

CREATE TABLE `usuarios_web` (
  `Usuarios_Name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Usuarios_Email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `Usuarios_Pass` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `Usuarios_Tipo` char(1) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_web`
--

INSERT INTO `usuarios_web` (`Usuarios_Name`, `Usuarios_Email`, `Usuarios_Pass`, `Usuarios_Tipo`) VALUES
('Andrea OlaFer', 'andrea-olalla@hotmail.com', 'benidorm', 'W'),
('gonzalokito91', 'gonzalokito91@gmail.com', '123456789', 'W'),
('Prueba1', 'prueba1@gmail.com', '123456789', 'W'),
('Pruebadef', 'PruebaDef@hotmail.com', '123', 'W'),
('soyelamo', 'tio@nomelies.com', '123', 'W'),
('username12', 'prueba12@hotmail.com', '12345678', 'W');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `Usuario_Voto` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Propietario` varchar(45) CHARACTER SET latin1 NOT NULL,
  `N_Propuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`Usuario_Voto`, `Propietario`, `N_Propuesta`) VALUES
('gonzalokito91', 'gonzalokito91', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`Id_Pregunta`);

--
-- Indices de la tabla `propuestas`
--
ALTER TABLE `propuestas`
  ADD PRIMARY KEY (`Id_Unico`);

--
-- Indices de la tabla `usuarios_web`
--
ALTER TABLE `usuarios_web`
  ADD PRIMARY KEY (`Usuarios_Name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `Id_Pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `propuestas`
--
ALTER TABLE `propuestas`
  MODIFY `Id_Unico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
