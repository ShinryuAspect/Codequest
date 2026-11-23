-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2026 a las 20:38:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codequest_sandbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos_perdidos`
--

CREATE TABLE `objetos_perdidos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `rareza` enum('Comun','Raro','Epico','Legendario') DEFAULT 'Comun',
  `ubicacion` varchar(50) DEFAULT NULL,
  `encontrado_por_caballero` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetos_perdidos`
--

INSERT INTO `objetos_perdidos` (`id`, `nombre`, `descripcion`, `rareza`, `ubicacion`, `encontrado_por_caballero`) VALUES
(1, 'Pocion de Vida', 'Restaura 20 HP de tu barra de energia.', 'Comun', 'Suelo de piedra', 0),
(2, 'Llave de Plata', 'Una llave antigua que brilla con luz lunar. Abre la puerta del Norte.', 'Raro', 'Cofre Oculto', 0),
(3, 'Mapa Arrugado', 'Muestra el camino hacia el Bosque de los Glitches.', 'Epico', 'Altar de Piedra', 0),
(4, 'Escudo Roto', 'Un escudo de madera podrida que apenas protege.', 'Comun', 'Esquina oscura', 0),
(5, 'Espada de Sintaxis', 'Forjada en los fuegos de un compilador eterno.', 'Legendario', 'Estatua del Programador', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `objetos_perdidos`
--
ALTER TABLE `objetos_perdidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `objetos_perdidos`
--
ALTER TABLE `objetos_perdidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
