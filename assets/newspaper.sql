-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2016 a las 00:07:00
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `newspaper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Corte de Agua', 'corte-de-agua', 'el viernes 9 de diciembre en el norte de quito habra un corte de agua por 3 dias a partir del mismo.'),
(2, 'Estrella 15', 'estrella-15', 'Barcelona se coronó Campeón luego de 2 años el pasado sábado luego de empatar 3-3 frente al cuadro Oriental.'),
(3, 'Aucas a la B', 'aucas-a-la-b', 'El cuadro Oriental descendió a la serie B del fútbol Ecuatoriano luego de empatar 3-3 frente a los Canarios el pasado sábado.'),
(4, 'Gobierno decreta el estado de excepción en Morona Santiago', 'gobierno-decreta-el-estado-de-excepción-en-morona-santiago', 'El Gobierno anunció la noche de este miércoles que emitirá un Decreto ejecutivo en el que declarará en estado de excepción en la provincia de Morona Santiago, tras la muerte de un policía por los enfrentamientos en una comunidad en un campo minero en Panantza.'),
(5, 'Junta Monetaria dice que no se puede obligar a la banca a usar dinero virtual', 'junta-monetaria-dice-que-no-se-puede-obligar-a-la-banca-a-usar-dinero-virtual', 'Para que el voto sea válido en las elecciones generales del 2017, basta con que el elector marque la papeleta con una línea o un visto.'),
(6, 'En el volcán Cayambe se detectaron grietas en el glaciar y olor a azufre', 'en-el-volcán-cayambe-se-detectaron-grietas-en-el-glaciar-y-olor-a-azufre', 'Olor a azufre y nuevas grietas en los glaciares del volcán Cayambe fueron detectadas en los últimos días por los andinistas.'),
(7, 'Real Madrid venció al América y jugará la final del Mundial de Clubes', 'real-madrid-venció-al-américa-y-jugará-la-final-del-mundial-de-clubes', 'El Real Madrid se impuso con oficio al América mexicano en la semifinal del Mundial de Clubes (0-2) y jugará la final ante el Kashima nipón, tras un partido con más dificultades por el cambio horario y su largo viaje que por lo deportivo, con goles de Karim Benzema y Cristiano Ronaldo. ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
