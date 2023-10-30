-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2023 a las 23:56:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `TIPO_DE_PRENDA` varchar(45) NOT NULL,
  `DETALLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `TIPO_DE_PRENDA`, `DETALLE`) VALUES
(27, 'REMERAS', 'Conjunto de remeras versátiles y cómodas para cualquier ocasión. ¡Estilo y comodidad en uno!'),
(28, 'PANTALONES', 'Pantalones versátiles para cualquier look. Comodidad y estilo en uno.'),
(31, 'BUZOS', 'Buzos cómodos y cálidos para días frescos. Elige tu estilo favorito.'),
(32, 'CAMPERAS', 'Camperas de moda para mantenerte abrigado con estilo.'),
(35, 'JEANS', 'Jeans de calidad para un look clásico y duradero.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `ID_categoria_fk` int(11) NOT NULL,
  `TIPO` varchar(45) NOT NULL,
  `TALLE` char(10) NOT NULL,
  `PRECIO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_producto`, `ID_categoria_fk`, `TIPO`, `TALLE`, `PRECIO`) VALUES
(21, 31, 'OVERSIZE', 'XL', 3000),
(22, 31, 'DEPORTIVO', 'XXL', 2000),
(23, 31, 'OVERSIZE', 'XL', 3000),
(24, 31, 'DEPORTIVO', 'XXL', 2000),
(25, 31, 'CREWNECK', 'L', 6999),
(26, 31, 'CREWNECK', 'L', 6999),
(27, 27, 'REMERA POLO', 'M', 7999),
(28, 27, 'REMERA MANGA LARGA', 'S', 3999),
(29, 27, 'REMERA POLO', 'M', 7999),
(30, 27, 'REMERA MANGA LARGA', 'S', 3999),
(31, 28, 'CARGO', 'M', 6950),
(32, 28, 'DEPORTIVO', 'XL', 6700),
(33, 28, 'CARGO', 'M', 6950),
(34, 28, 'DEPORTIVO', 'XL', 6700),
(35, 35, 'JEAN RECTO', 'XL', 7300),
(36, 35, 'JEAN RASGADO', 'M', 9699),
(37, 35, 'JEAN RECTO', 'XL', 7300),
(38, 35, 'JEAN RASGADO', 'M', 9699),
(39, 32, 'BOMBER', 'L', 8900),
(40, 32, 'CAMPERA DE CUERO', 'XXL', 7999),
(41, 32, 'BOMBER', 'L', 8900),
(42, 32, 'CAMPERA DE CUERO', 'XXL', 7999),
(43, 31, 'OVERSIZE', 'XL', 3423);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`) VALUES
(1, 'admin', '$2y$10$lAoakw4EB09qWqarXbx.WeAP2WZOHiqo.5r1AwQIJLaF/sAbweF5y');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `ID_categoria_fk` (`ID_categoria_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_categoria_fk`) REFERENCES `categoria` (`ID_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;