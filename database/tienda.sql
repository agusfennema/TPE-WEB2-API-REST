-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 08:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `TIPO_DE_PRENDA` varchar(45) NOT NULL,
  `DETALLE` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `TIPO_DE_PRENDA`, `DETALLE`) VALUES
(1, 'REMERAS', 'Conjunto de remeras versátiles y cómodas'),
(2, 'MEDIAS', 'lindas medias, solo viene una'),
(11, 'CAMPERAS', 'Camperas de moda para mantenerte abrigado con'),
(12, 'PANTALON', 'Pantalones versátiles para cualquier look'),
(13, 'BUZOS', 'Comodos y calidos para dias frescos');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `ID_categoria_fk` int(11) NOT NULL,
  `TIPO` varchar(45) NOT NULL,
  `TALLE` char(10) NOT NULL,
  `PRECIO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ID_producto`, `ID_categoria_fk`, `TIPO`, `TALLE`, `PRECIO`) VALUES
(3, 1, 'REMERA POLO', 'L', 3000),
(4, 1, 'REMERA POLO', 'XXL', 2000),
(5, 1, 'REMERA MANGA LARGA', 'XXL', 1000),
(7, 1, 'REMERA MANGA LARGA', 'XL', 3000),
(8, 1, 'REMERA POLO', 'L', 1000),
(9, 1, 'OVERZISE', 'XXL', 2000),
(10, 1, 'REMERA MANGA LARGA', 'L', 3000),
(11, 1, 'REMERA MANGA LARGA', 'XL', 2000),
(12, 1, 'REMERA POLO', 'L', 1000),
(13, 1, 'CREWNECK', 'S', 1000),
(14, 1, 'CREWNECK', 'XL', 2000),
(15, 1, 'REMERA MANGA LARGA', 'XXL', 2000),
(21, 11, 'CAMPERA DE CUERO', 'S', 8500),
(22, 11, 'CAMPERA DE CUERO', 'M', 8500),
(23, 11, 'CAMPERA DE CUERO', 'L', 8500),
(24, 11, 'CAMPERA DE CUERO', 'S', 8500),
(26, 11, 'BOMBER', 'XL', 8500),
(27, 11, 'CARGO', 'S', 90),
(28, 11, 'CAMPERA DE CUERO', 'XL', 8500),
(29, 11, 'CAMPERA DE CUERO', 'S', 8500),
(30, 11, 'BOMBER', 'M', 8500),
(31, 11, 'CAMPERA DE CUERO', 'L', 8500),
(32, 11, 'CAMPERA', 'XL', 8500),
(33, 12, 'CARGO', 'S', 9900),
(34, 12, 'DEPORTIVO', 'M', 9900),
(36, 12, 'DEPORTIVO', 'XL', 9900),
(37, 12, 'CARGO', 'S', 9900),
(46, 2, 'TRES CUARTOS', 'S', 500),
(47, 13, 'OVERSIZE', 'XXL', 10500),
(48, 2, 'TRES CUARTOS', 'S', 500),
(51, 13, 'OVERSIZE', 'M', 10500),
(52, 2, 'TRES CUARTOS', 'S', 90),
(53, 1, 'OVERSIZE', 'M', 8888);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`) VALUES
(1, 'webadmin', '$2y$10$JC8JHq4ObWBWmvsF7IyM/OfZ51H0LKQ3epRwCw5AlQPDW3P6TSsLe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `ID_categoria_fk` (`ID_categoria_fk`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_categoria_fk`) REFERENCES `categoria` (`ID_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
