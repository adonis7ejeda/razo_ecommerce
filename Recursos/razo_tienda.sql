-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-11-2019 a las 11:56:27
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `razo_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categorias`
--

DROP TABLE IF EXISTS `t_categorias`;
CREATE TABLE IF NOT EXISTS `t_categorias` (
  `CAT_ID` int(255) NOT NULL AUTO_INCREMENT,
  `CAT_NOMBRE` varchar(100) NOT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_categorias`
--

INSERT INTO `t_categorias` (`CAT_ID`, `CAT_NOMBRE`) VALUES
(1, 'Percusion'),
(2, 'Electricos'),
(3, 'Cuerda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_lineas_pedidos`
--

DROP TABLE IF EXISTS `t_lineas_pedidos`;
CREATE TABLE IF NOT EXISTS `t_lineas_pedidos` (
  `LP_ID` int(255) NOT NULL AUTO_INCREMENT,
  `LP_UNIDADES` int(255) NOT NULL,
  `LP_PEDID` int(255) NOT NULL,
  `LP_PROID` int(255) NOT NULL,
  PRIMARY KEY (`LP_ID`),
  KEY `fk_t_lineas_pedidos_t_pedidos` (`LP_PEDID`),
  KEY `fk_t_lineas_pedidos_t_productos` (`LP_PROID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pedidos`
--

DROP TABLE IF EXISTS `t_pedidos`;
CREATE TABLE IF NOT EXISTS `t_pedidos` (
  `PED_ID` int(255) NOT NULL AUTO_INCREMENT,
  `PED_DEPARTAMENTO` varchar(100) NOT NULL,
  `PED_CIUDAD` varchar(100) NOT NULL,
  `PED_DIRECCION` varchar(255) NOT NULL,
  `PED_TOTAL` float(200,0) NOT NULL,
  `PED_ESTADO` varchar(20) NOT NULL,
  `PED_FECHA` date DEFAULT NULL,
  `PED_HORA` time DEFAULT NULL,
  `PED_USUID` int(255) NOT NULL,
  PRIMARY KEY (`PED_ID`),
  KEY `fk_t_pedidos_t_usuarios` (`PED_USUID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_productos`
--

DROP TABLE IF EXISTS `t_productos`;
CREATE TABLE IF NOT EXISTS `t_productos` (
  `PRO_ID` int(255) NOT NULL AUTO_INCREMENT,
  `PRO_NOMBRE` varchar(100) NOT NULL,
  `PRO_DESCRIPCION` text,
  `PRO_PRECIO` float(100,0) NOT NULL,
  `PRO_STOCK` int(255) NOT NULL,
  `PRO_OFERTA` varchar(2) DEFAULT NULL,
  `PRO_FECHA` date NOT NULL,
  `PRO_IMAGEN` varchar(255) DEFAULT NULL,
  `PRO_CATID` int(255) NOT NULL,
  PRIMARY KEY (`PRO_ID`),
  KEY `fk_t_productos_t_categorias` (`PRO_CATID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_productos`
--

INSERT INTO `t_productos` (`PRO_ID`, `PRO_NOMBRE`, `PRO_DESCRIPCION`, `PRO_PRECIO`, `PRO_STOCK`, `PRO_OFERTA`, `PRO_FECHA`, `PRO_IMAGEN`, `PRO_CATID`) VALUES
(2, 'BAJO ELECTRICO SQUIER FRANK BELLO 4C NEGRO', 'Squier es una marca derivada de la Fender Musical Instruments Company que se encarga de producir instrumentos musicales de gama media, derivados de la línea de productos de Fender Frank Bello, bajista contundente de thrash metal de las bandas legendarias Antrax y Nueva York, conocido por su presencia dinámica, su energía sobre el escenario y un estilo inventivo. En consecuencia, el Jazz Bass Frank Bello se carga con características impactantes, con un acabado negro brillante, gráficos de cráneos y una combinación de micrófonos Precision y Jazz Bass que hacen de este el arma perfecta para el metal.', 1600580, 10, NULL, '2019-07-05', 'bajo_002.jpg', 2),
(3, 'BAJO ELECTRICO SQUIER PETE WENTZ 4C NEGRO', 'He aquí el dulce y totalmente nuevo Squier Pete Wentz PBass. El bajo Squier Pete Wentz PBass es un atractivo modelo adornado con todos los detalles del modelo original del bajista de Fall Out boy. Se han incluido todos los detalles únicos tales como los gráficos especiales que incluyen el murciélago rojo de Pete con el diseño del corazón en el cuerpo, además de un murciélago negro en el traste 12 y la firma de Wentz en la parte posterior de la pala. Otras características incluyen un mástil tipo Jazz de arce con un radio de 9.5 \"en forma de C, un micrófono Duncan Designed PP-105 pickup split-coil, herrajes cromados y un llamativo golpeador de tres capas de color rojo. Definitivamente es un bajo oscuramente hermoso.', 900000, 10, NULL, '2019-07-05', 'bajo_003.jpg', 2),
(4, 'BAJO ELECTRICO SQUIER VINTAGE MODIFIED 4C SUNBURST', 'El Vintage Modified Precision Bass TB revive el espíritu del bajo Telecaster Bass de la era de los \'70 gracias a su gran micrófono humbucker diseñado por Fender en la posición mástil. Adicionalmente se le ha instalado un clásico puente con cuerdas a través del cuerpo, selletas dobles de latón y el increíble acabado sunburst sobre una capa de fresno. ', 1900570, 7, NULL, '2019-07-05', 'bajo_004.jpg', 2),
(5, 'BONGO SET LP ASPIRE NATURAL CON CAMPANA Y FORRO', 'Latin Percussion, líder mundial en la fabricación de instrumentos de percusión incluyendo congas, bongoes, timbales, campanas y demás; considerados como algunos de los más finos del mundo, ofreciendo la colección de percusión más completa disponible en el mercado. Nadie puede igualar la reputación y calidad que podemos encontrar a través de singulares diseños y autenticidad en el sonido. El regalo perfecto para el percusionistas aspirantes. Este conjunto incluye Bongos LP Aspire, un cencerro de cha-cha y el batidor, más una bolsa de transporte conveniente.', 500000, 20, NULL, '2019-07-05', 'latin_001.jpg', 1),
(6, 'BONGO LP VALJE MADERA DE HAYA', 'Considerado por muchos como el mejor sonido de Bongos LP en el mercado. Bongos Valje tiene una cubierta auténtica contorneado y un bloque central más corto para acomodar mejor al percusionista sentado.', 600750, 10, NULL, '2019-07-05', 'latin_002.jpg', 1),
(7, 'BONGO LP FIBRA DE VIDRIO NEGRO', 'Latin Percussion, líder mundial en la fabricación de instrumentos de percusión incluyendo congas, bongoes, timbales, campanas y demás; considerados como algunos de los más finos del mundo, ofreciendo la colección de percusión más completa disponible en el mercado. Nadie puede igualar la reputación y calidad que podemos encontrar a través de singulares diseños y autenticidad en el sonido. Los Bongos LP Fiberglass son virtualmente indestructibles, con acero reforzado con bordes de apoyo moldeadas en fibra de vidrio para proporcionar la máxima resistencia. Tienen chapados en fondos de fundición de aluminio y 5/16 \"de diámetro de ajuste orejetas que han sido cuidadosamente formadas para abrazar a la cáscara, por lo que es más cómodo para tocar.', 750000, 13, NULL, '2019-07-05', 'latin_003.jpg', 1),
(8, 'QUINTO LP CC2 RIM FIBRA DE VIDRIO 11P NEGRO', 'Virtualmente sin cambios desde su introducción en la década del ‘60, las Congas Original Model de LP se han convertido en la Conga estándar de fibra de vidrio de los músicos de salsa en todo el mundo.', 1500000, 10, NULL, '2019-07-05', 'latin_004.jpg', 1),
(9, 'GUITARRA CLASICA YAMAHA NATURAL', 'Como demuestra la C40, un precio modesto no tiene que colocar al instrumento en una categoría inferior. Esta guitarra es un estándar a nivel mundial en modelos para estudiantes y principiantes que desean una guitarra ideal al precio justo. La tapa de picea, aros y fondo de meranti (similar a la caoba) y un diapasón y puente de auténtico palisandro, aseguran a esta guitarra una calidad de tono y capacidad de ejecución que elimina dicha \'etiqueta\'. La C40 incorpora clavijas de afinación cromadas.', 450000, 50, NULL, '2019-07-05', 'clas_001.jpg', 3),
(10, 'GUITARRA CLASICA FATIMA 1/2', 'La guitarra Fátima es un producto adecuado para personas que desean entrar en el mundo de la guitarra clásica. Su perfil sencillo y accesibilidad económica hacen que este producto tenga un gran valor. Cuenta con un mástil de 19 trastes, una forma de cuerpo clásica tipo estudio de medida 1/2, lo que la hace un poco más pequeña de la medida estándar.', 350000, 15, NULL, '2019-07-05', 'clas_004.jpg', 3),
(11, 'GUITARRA ACUSTICA WALDEN MADERA LINE TIPO FOLK NATURAL', 'Fundada en 1974 por Bob Taylor y Kurt Listug, las guitarras Taylor han evolucionado hasta convertirse en uno de los mejores fabricantes de guitarras en el mundo. Sus modelos se caracterizan por un destacada tocabilidad, construcción impecable e impactantes estéticas que son el resultado de la combinación entre un uso innovador de tecnologías modernas y una gran atención a los detalles. Por esto y más es que las guitarras Taylor brindan el mejor sonido y la mayor facilidad al tocar. Al igual que en la serie 200, esta serie incorpora los lados y la parte de atrás fabricados en madera de sapele, lo cual ofrece resistencia a las fluctuaciones de las condiciones del clima, y un mástil más delgado de 1 11/16 pulgadas. Es una de las mejores guitarras de tamaño completo que se pueden conseguir dentro de su nivel de precio, brinda la experiencia de tocar un instrumento excelente con todos los detalles atendidos, verdaderamente cómoda y con un sonido auténticamente musical.', 250000, 60, NULL, '2019-07-05', 'acus_001.jpg', 3),
(12, 'GUITARRA ACUSTICA IBANEZ NATURAL', 'Las guitarras acústicas Ibanez te ofrecen detalles de calidad profesional, clase, y un sonido excelente acorde a su precio. En el caso de la guitarra acústica PF15NT, cuenta con un cuerpo solido con tope de abeto, los lados y la parte posterior son de caoba. Algunos otros detalles incluyen un puente y un diapasón de palo de rosa, afinadores cromados, un pickguard de color negro, entre otros detalles que la hacen una excelente guitarra a un precio bastante accesible.', 350000, 25, NULL, '2019-07-05', 'acus_014.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

DROP TABLE IF EXISTS `t_usuarios`;
CREATE TABLE IF NOT EXISTS `t_usuarios` (
  `USU_ID` int(255) NOT NULL AUTO_INCREMENT,
  `USU_NOMBRE` varchar(100) NOT NULL,
  `USU_APELLIDOS` varchar(255) DEFAULT NULL,
  `USU_EMAIL` varchar(255) NOT NULL,
  `USU_PASSWORD` varchar(255) NOT NULL,
  `USU_ROL` varchar(20) DEFAULT NULL,
  `USU_IMAGEN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USU_ID`),
  UNIQUE KEY `uq_usu_email` (`USU_EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`USU_ID`, `USU_NOMBRE`, `USU_APELLIDOS`, `USU_EMAIL`, `USU_PASSWORD`, `USU_ROL`, `USU_IMAGEN`) VALUES
(1, 'Admin', '', 'admin@admin.com', '$2y$04$SQHPHVwNOYgmf31EQ44EiuYcpda4Xr8mDL1Cyb4eUEwipxLwjCRCm', 'admin', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_lineas_pedidos`
--
ALTER TABLE `t_lineas_pedidos`
  ADD CONSTRAINT `fk_t_lineas_pedidos_t_pedidos` FOREIGN KEY (`LP_PEDID`) REFERENCES `t_pedidos` (`PED_ID`),
  ADD CONSTRAINT `fk_t_lineas_pedidos_t_productos` FOREIGN KEY (`LP_PROID`) REFERENCES `t_productos` (`PRO_ID`);

--
-- Filtros para la tabla `t_pedidos`
--
ALTER TABLE `t_pedidos`
  ADD CONSTRAINT `fk_t_pedidos_t_usuarios` FOREIGN KEY (`PED_USUID`) REFERENCES `t_usuarios` (`USU_ID`);

--
-- Filtros para la tabla `t_productos`
--
ALTER TABLE `t_productos`
  ADD CONSTRAINT `fk_t_productos_t_categorias` FOREIGN KEY (`PRO_CATID`) REFERENCES `t_categorias` (`CAT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
