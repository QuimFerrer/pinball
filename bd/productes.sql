
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2014 a las 19:32:19
-- Versión del servidor: 5.1.66
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u555588791_pinba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE IF NOT EXISTS `productes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcio` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `preu` float NOT NULL,
  `foto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `data_alta` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `data_alta`) VALUES
(1, 'BINGO ELECTRONICO', 'Tecnología avanzada.\r\n<em>Microprocesador Coldfire 5206e</em>\r\nCartones con iluminación LED de luz blanca Multicromática.\r\nComunicación serial entre todos los elementos que componen el Kit.\r\nSistema de lectura de "Holes" inteligente ( para evitar manipulación externa).\r\nControl de selector electrónico, aceptador de billetes,  llaves de pago y cobro. Totalizadores electromecánicos y electrónicos.\r\nHopper. Bolas antimagnéticas. Varios idiomas. Amplia configuración adaptable a holomologaciones del país. Posibilidad de LINK con  acumulativo inalámbrico. Tutorial de juego en luces y display alfanumérico.\r\nBonus para cartón individual, SuperBonus para cartón individual, Numero Mágico, premio 4 esquinas, premio DIAGONAL, premio Súper línea, 6ª 7ª y 8ª bolas extras, multiplicadores de cartones Individuales.\r\n<b>Personalización de serigrafía y gráficos tanto en tablero como en Frontal.</b>', 235, 'bingo.jpg', '2014-05-16'),
(2, 'KIT DE DIANA ZONE DART', 'Amplia gama de juegos:\r\n180 – simple-double in-double out-double in/out-master out\r\n301 – simple-double in-double out-double in/out-master out\r\n501 – simple-double in-double out-double in/out-master out\r\n701 – simple-double in-double out-double in/out-master out\r\n901 – simple-double in-double out-double in/out-master out\r\n301 KILLER – simple-double in-double out-double in/out-master out\r\nCRICKEt–simple-no score-cutthroat-master-crazy-wild and crazy\r\nHI SCORE\r\nLOW SCORE\r\nROULETTE\r\nSHANGHAI\r\n\r\nOpciones :\r\n<ul>\r\n<li>EQUAL</li>\r\n<li>HANDICAP</li>\r\n<li>TEAM</li>\r\n<li>EQUAL TEAM</li>\r\n<li>EQUAL HANDICAP</li>\r\n</ul>\r\n\r\nSelección de Bull 25/50 , 50/50, Happy Hour programable.\r\nAmplia configuración. Selección intuitiva de juegos. Muestra del resultado final de la partida por clasificación, handicap, PPD. Hazañas. Varios idiomas. Sonidos indicadores de eventos. Selector electrónico de monedas, selector de billetes, interface de sensor de dardos inteligente. \r\n\r\n\r\n', 235, 'diana.jpg', '2014-05-16'),
(3, 'ROULETTE', 'Rouleta electrónica', 235, 'roulette.jpg', '2014-05-16'),
(4, 'COMMA6-A', '<p>Estándar para gaming en Italia.</p>\r\n<p>Cumpliendo los requisitos de\r\nhomologación que se requieren para el hardware. Dos tampers\r\npara detección de apertura de las cajas que protegen placa contra manipulación.  Protocolo de comunicación con Monopolio de Estado. Soporte de tarjeta en la parte inferior. Gráficos y sonido en SD-CARD. Programa Embebido en microcontrolador, etc.</p>\r\n', 235, 'comma6a.jpg', '2014-05-16'),
(5, 'STANDARD GAMES', 'games descr.', 235, 'standar_games.jpg', '2014-05-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
