-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2018 a las 20:58:16
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pharmacyrepositor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prospecto` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `precio` float NOT NULL,
  `stockMostrador` int(11) NOT NULL,
  `minimoStockMostrador` int(11) NOT NULL,
  `stockReponerMostrador` int(11) NOT NULL,
  `stockDeposito` int(11) NOT NULL,
  `minimoStockDeposito` int(11) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`id`, `nombre`, `prospecto`, `precio`, `stockMostrador`, `minimoStockMostrador`, `stockReponerMostrador`, `stockDeposito`, `minimoStockDeposito`, `foto`) VALUES
(1, 'Aspirina Forte', 'Aspirina de Bayer indicada especificamente para combatir dolores corporales intensos entre los que se incluyen musculares, reumaticos y posturales.\r\nSu especial formulacion, otorga una efectiva accion analgesica y un mayor poder antiinflamatorio, clinicamente comprobado.\r\n', 160, 15, 5, 20, 200, 50, 'images/aspirinaForte.jpg'),
(2, 'Cafiaspirina', 'Cafiaspirina esta indicada para el alivio sintomatico de los dolores ocasionales leves o moderados,\r\ncomo dolores de cabeza, dentales, de espalda, musculares y articulares.\r\nAlivio sintomatico de los\r\nestados gripales y resfrios que forman parte del mal estado general.', 100, 15, 5, 20, 150, 50, 'images/cafiaspirina.jpg'),
(3, 'Sertal Compuesto', 'Sertal Compuesto es la asociacion de Propinox clorhidrato y Clonixinato de lisina. El Propinox\r\nes un antiespasmodico antagonista moderado y no selectivo de los receptores muscarinicos\r\ny con accion directa sobre el musculo liso visceral. El Clonixinato de lisina es un analgesico\r\nantiinflamatorio no esteroide (AINE), con accion analgesica predominante.\r\nSu accion se\r\ndesarrolla por inhibicion de la sintesis de prostaglandinas.', 120, 15, 5, 20, 100, 50, 'images/sertalCompuesto.jpg'),
(4, 'Cefalexina', 'La cefalexina se usa para tratar algunas infecciones provocadas por bacterias como neumonia y otras infecciones del tracto respiratorio; e infecciones de los huesos, piel, oidos, genitales, y del tracto urinario. \r\nLa cefalexina pertenece a una clase de medicamentos llamados antibioticos de cefalosporina.\r\nLos antibioticos como la cefalexina no funcionan para combatir resfriados, influenza u otras infecciones virales.', 100, 15, 5, 20, 100, 50, 'images/cefalexina.jpg'),
(5, 'Becozyme', 'Es una asociacion de vitaminas hidrosolubles: tiamina (vitamina B1), riboflavina (vitamina B2), nicotinamida, piridoxina (vitamina B6), pantotenato calcio, biotina, cianocobalamina (vitamina B12) y acido ascorbico (vitamina C) para su administracion oral.\r\nBecozyme C Forte esta indicado en la prevencion y el tratamiento de estados carenciales de vitaminas del grupo B y vitamina C cuando no se produzca un aporte adecuado de estas vitaminas, convalecencia o regimenes alimenticios en adultos y adolescentes.', 80, 15, 5, 20, 80, 50, 'images/becozyme.png'),
(6, 'Actron', 'Cada capsula blanda de gelatina contiene: como ingrediente activo, 400 miligramos de Ibuprofeno; e ingredientes no activos PEG 600, hidroxido de potasio, agua purificada, nipagin, nipasol, gelatina, anhidrisorb 85/70 y amarillo ocaso.\r\nEste medicamento esta indicado para el alivio sintomatico de dolores (de espalda, de cabeza, musculares, articulares, de dientes, menstruales). Tambien alivia los dolores asociados a estados gripales, resfrio comun y para bajar la fiebre.', 95, 15, 5, 20, 90, 50, 'images/actron.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
