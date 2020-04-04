-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2020 a las 01:43:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `ID_Category` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`ID_Category`, `Name`) VALUES
(1, 'Movil'),
(2, 'Tvs'),
(3, 'Kitchen'),
(4, 'Stereo'),
(5, 'PCs'),
(6, 'Washing machines'),
(7, 'Tools and equipment'),
(8, 'Brand'),
(9, 'Model'),
(10, 'Color'),
(11, 'Reference'),
(14, 'Other'),
(15, 'Other'),
(16, 'Other'),
(17, 'Other'),
(18, 'Other'),
(19, 'Other'),
(20, 'Other'),
(21, 'Other'),
(22, 'Other'),
(23, 'Other'),
(24, 'Other'),
(25, 'Other'),
(26, 'Other'),
(27, 'Other');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `ID_Product` int(20) NOT NULL,
  `Name_Product` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Weight` double(10,2) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Category` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`ID_Product`, `Name_Product`, `Description`, `Weight`, `Price`, `Category`) VALUES
(1, 'Samsung F', 'Movil whiphqbw hpigh ewpihp ewihpiueh pakfhv isdhq i voeihv i vieqhv i', 7.00, 10.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE `sale` (
  `id-sale` int(20) NOT NULL,
  `id-client` int(20) NOT NULL,
  `Item_description` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price_per` double(10,2) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `role`) VALUES
(1, 'orlandoeo', 'admin@gmail.com', '12345OEo', 'Manager'),
(2, 'orlandoeo', 'oespinosao@sistemas.', '98y875fihckn', 'Manager'),
(3, 'orlandoD', 'admin2@gmail.com', '346trbnx', 'User'),
(4, 'otheruser', 'other@sistem.com', '98jhng75kn', 'User'),
(5, 'daniel', 'snake-260@hotmail.co', 'danielon2345', 'User'),
(6, 'usuario', 'usuarioejemplo@gmail', '658393hfjgn', 'User'),
(7, 'usuario1', 'usejemplo@kjhkv.co', 'dfsbgfhnugyi5674', 'User');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_Product`);

--
-- Indices de la tabla `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id-sale`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `ID_Category` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `ID_Product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sale`
--
ALTER TABLE `sale`
  MODIFY `id-sale` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
