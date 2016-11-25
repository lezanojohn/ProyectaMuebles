-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2016 a las 01:23:56
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecta_muebles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumidor`
--

DROP TABLE IF EXISTS `consumidor`;
CREATE TABLE IF NOT EXISTS `consumidor` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_conexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `consumidor`
--

INSERT INTO `consumidor` (`id_usuario`, `fecha_conexion`) VALUES
(1, '2016-06-06 03:19:17'),
(4, '2016-06-05 23:36:56'),
(8, '2016-06-06 03:23:02'),
(11, '2016-06-05 17:49:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE IF NOT EXISTS `especialidad` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_especialidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`, `descripcion`) VALUES
(1, 'Baños e interiores', 'Realizar todo tipo de muebles de baño'),
(2, 'Cocina', 'Realizar todo tipo de muebles de cocina'),
(3, 'Comedor', 'Realizar todo tipo de muebles de comedor'),
(4, 'Exterior', 'Muebles a prueba de agua.'),
(5, 'Almacenamiento', 'Muebles para el almacenamiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalua`
--

DROP TABLE IF EXISTS `evalua`;
CREATE TABLE IF NOT EXISTS `evalua` (
  `id_usuario` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `comentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `valoracion` int(5) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `id_cliente` (`id_usuario`,`id_trabajo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_trabajo` (`id_trabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idea_proyecto`
--

DROP TABLE IF EXISTS `idea_proyecto`;
CREATE TABLE IF NOT EXISTS `idea_proyecto` (
  `id_ideaproyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_ideaproyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `idea_proyecto`
--

INSERT INTO `idea_proyecto` (`id_ideaproyecto`, `nombre_proyecto`, `descripcion`, `imagen`) VALUES
(2, 'Mesa Plegable', 'Necesito una mesa plegable para mi patio, debe ser de madera impermeable para que no se deteriore por las lluvias.', 'img/mesa_plegable.jpg'),
(3, 'Litera con escritorio ', 'holaa, necesito una litera que tenga un escritorio abajo, con buena iluminación para que mis hijos puedan estudiar comodamente en la pieza.', 'img/litera_escritorio.jpg'),
(4, 'Puerta secreta', 'Estoy buscando un mueblista que me haga una puerta secreta. Quiero que se camufle con la madera que tengo para mis librerias.', 'img/puerta_secreta.jpg'),
(6, 'Cama de Formula 1', 'Mi idea es hacer una cama con la forma de un auto de formula 1. A mi hijo le encantan las carreras de F1 por eso quiero darle esta cama para su cumpleaños.', 'img/cama_formula_uno.jpg');

--
-- Disparadores `idea_proyecto`
--
DROP TRIGGER IF EXISTS `insertar_idea_proyecto`;
DELIMITER $$
CREATE TRIGGER `insertar_idea_proyecto` AFTER INSERT ON `idea_proyecto` FOR EACH ROW insert into publica(id_ideaproyecto)
values (new.id_ideaproyecto)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mueblista`
--

DROP TABLE IF EXISTS `mueblista`;
CREATE TABLE IF NOT EXISTS `mueblista` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `acerca_de_mi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` float(10,7) NOT NULL,
  `longitud` float(10,7) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mueblista`
--

INSERT INTO `mueblista` (`id_usuario`, `acerca_de_mi`, `latitud`, `longitud`) VALUES
(1, 'acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi ', -36.8106003, -73.0650101),
(2, 'Trabajo con madera de todo tipo. He trabajado en el rubro por 5 años y sigo aprendiendo cada día. Esto me apasiona mucho.', -36.8030930, -73.0588455),
(3, 'Trabajo con madera de todo tipo', -36.7903442, -73.0984726),
(4, 'acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi ', -36.8019981, -73.0860291),
(5, 'Estoy constantemente realizando cursos para especializarme', -36.8144341, -73.0765533),
(7, 'acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi ', -36.8386726, -73.1495514),
(8, 'acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi ', -36.8613701, -73.0460358),
(9, 'acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi acerca de mi', -36.8041840, -73.0467300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posee`
--

DROP TABLE IF EXISTS `posee`;
CREATE TABLE IF NOT EXISTS `posee` (
  `id_usuario` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `id_especialidad` (`id_especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posee`
--

INSERT INTO `posee` (`id_usuario`, `id_especialidad`) VALUES
(2, 1),
(3, 2),
(5, 3),
(7, 3),
(8, 4),
(9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuesta`
--

DROP TABLE IF EXISTS `propuesta`;
CREATE TABLE IF NOT EXISTS `propuesta` (
  `id_propuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `monto` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `dias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_propuesta`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_2` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `propuesta`
--

INSERT INTO `propuesta` (`id_propuesta`, `id_usuario`, `monto`, `descripcion`, `dias`) VALUES
(1, 2, '100.000', 'He hecho casas para animales con madera nativa, muy acogedoras. ', 9),
(2, 3, '200.000', 'Realizo trabajos para los amantes de las mascotas', 5),
(3, 5, '150.000', 'Construyo casas cómodas para las mascotas', 3),
(4, 7, '30.000', 'Algo bueno bonito y barato', 2),
(5, 8, '300.000', 'Mucho lujo para tu mascota', 10),
(6, 9, '50.000', 'Amante de los gatos', 4),
(7, 2, '200.000', 'Se donde encontrar el tipo de madera que necesita.', 7),
(8, 3, '185.000', 'Hago mesas bonitas y comodas, con material de calidad.', 5),
(9, 5, '50.000', 'Una mesa económica para su patio.', 3),
(10, 7, '150.000', 'He hecho varias literas bastante buenas y con diseños originales como la idea que propones. Te prometo un producto de calidad y en buen tiempo.', 30),
(11, 8, '120.000', 'Me gusta mucho tu idea. Me ofrezco a realizarla, incluso te haria un descuento si me aceptas rapido.', 35),
(12, 9, '210.000', 'Es un proyecto poco comun pero no imposible ni alocado. El precio es conversable y mi disponibilidad es amplia.', 20),
(13, 7, '155.000', 'Que buena idea! ya me estoy imaginando como fabricar tu puerta secreta. Creo que podemos llegar a un muy buen acuerdo.', 15),
(14, 3, '60.000', 'He hecho muchos armarios y creo que no es un proyecto complicado. Ademas si usamos madera Masisa para tu armario puede salir mas barato.', 10),
(15, 5, '99.000', 'El roble es una madera cara y sus terminaciones deben ser delicadas, por eso el precio, pero es conversable. Tengo mucha experiencia.', 13),
(16, 9, '170.000', 'Siempre quise una asi cuando niño, quizas ahora pueda hacerla, aunque sea para otro. Si lo deseas te puedo ayudar a comprar la madera en el Placacentro de Ongolmo.', 20),
(17, 2, '110.000', 'Me encantaaa! excelente idea. Si me aceptas pronto podemos bajar el precio ;). He hecho camas con diferentes formas y estilos.', 13),
(35, 2, '30.000', 'puedo lograrlo en 2 meses', 60),
(44, 2, '1', 'prueba 1', 1);

--
-- Disparadores `propuesta`
--
DROP TRIGGER IF EXISTS `insertar_propuesta`;
DELIMITER $$
CREATE TRIGGER `insertar_propuesta` AFTER INSERT ON `propuesta` FOR EACH ROW insert into tiene(id_propuesta, estado)
values(new.id_propuesta, 'En Espera')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_usuario` int(11) NOT NULL,
  `latitud` float(10,7) NOT NULL,
  `longitud` float(10,7) NOT NULL,
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_proveedor`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_usuario`, `latitud`, `longitud`, `id_proveedor`) VALUES
(12, -36.9386787, -73.0216370, 1),
(13, -36.8094444, -73.0546646, 2),
(14, -36.7937584, -73.1077423, 3),
(15, -36.7766609, -73.0761566, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publica`
--

DROP TABLE IF EXISTS `publica`;
CREATE TABLE IF NOT EXISTS `publica` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_ideaproyecto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `id_cliente` (`id_usuario`,`id_ideaproyecto`),
  KEY `id_ideaproyecto` (`id_ideaproyecto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_2` (`id_usuario`),
  KEY `id_ideaproyecto_2` (`id_ideaproyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `publica`
--

INSERT INTO `publica` (`id_usuario`, `id_ideaproyecto`, `fecha`) VALUES
(4, 2, '2016-06-05 17:24:02'),
(4, 3, '2016-06-05 18:00:21'),
(1, 4, '2016-06-05 18:02:24'),
(1, 6, '2016-06-06 03:30:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

DROP TABLE IF EXISTS `realiza`;
CREATE TABLE IF NOT EXISTS `realiza` (
  `id_trabajo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  KEY `id_trabajo` (`id_trabajo`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_2` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

DROP TABLE IF EXISTS `tiene`;
CREATE TABLE IF NOT EXISTS `tiene` (
  `id_ideaproyecto` int(11) DEFAULT NULL,
  `id_propuesta` int(11) NOT NULL,
  `estado` enum('Aceptado','Rechazado','En Espera') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_propuesta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_respuesta` date DEFAULT NULL,
  `motivo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `id_idea_proyecto` (`id_ideaproyecto`,`id_propuesta`),
  KEY `id_ideaproyecto` (`id_ideaproyecto`),
  KEY `id_usuario` (`id_propuesta`),
  KEY `id_propuesta` (`id_propuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`id_ideaproyecto`, `id_propuesta`, `estado`, `fecha_propuesta`, `fecha_respuesta`, `motivo`) VALUES
(2, 7, 'En Espera', '2016-07-05 12:46:25', NULL, NULL),
(2, 8, 'En Espera', '2016-07-05 12:46:25', NULL, NULL),
(2, 9, 'En Espera', '2016-07-05 12:46:25', NULL, NULL),
(3, 10, 'En Espera', '2016-06-07 06:08:42', NULL, NULL),
(3, 11, 'En Espera', '2016-06-07 06:11:55', NULL, NULL),
(4, 12, 'En Espera', '2016-07-05 12:46:25', NULL, NULL),
(4, 13, 'En Espera', '2016-06-07 06:17:41', NULL, NULL),
(6, 16, 'Rechazado', '2016-07-05 14:43:36', NULL, NULL),
(6, 17, 'Aceptado', '2016-07-05 15:17:07', NULL, NULL),
(6, 44, 'En Espera', '2016-07-12 01:17:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Mueblista'),
(3, 'Consumidor'),
(4, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
CREATE TABLE IF NOT EXISTS `trabajo` (
  `id_trabajo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cliente` enum('independiente','empresa') COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto` int(11) NOT NULL,
  PRIMARY KEY (`id_trabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` enum('Tarapaca','Antofagasta','Atacama','Coquimbo','Valparaiso','Libertador Bdo. Ohiggins','Maule','Bio Bio','Araucania','Los Lagos','Aysen','Magallanes','Metropolitana','Los Ríos','Arica y Parinacota') COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_perfil` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_tipo_usuario_2` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `nombre`, `apellido`, `contrasena`, `telefono`, `direccion`, `region`, `email`, `foto_perfil`) VALUES
(1, 3, 'John', 'Lezano', 'john', 52019093, 'Los Castaños 123', '', 'jklezano@ing.ucsc.cl', 'img/john.jpg'),
(2, 2, 'Daniela', 'Chamorro', 'daniela', 81892489, 'Valle Escondido #2425, Concepción.', 'Bio Bio', 'dfchamorro@ing.ucsc.cl', 'img/daniela.jpg'),
(3, 2, 'Nicolás', 'Sánchez', 'nicolas', 98662456, 'Nápoles 2234, Hualpén', 'Bio Bio', 'nasanchez@ing.ucsc.cl', 'img/nicolas.jpg'),
(4, 3, 'Patricio', 'Hernández', 'patricio', 67675489, 'Pedro Lira 258', '', 'pehernandez@ing.ucsc.cl', 'img/patricio.jpg'),
(5, 2, 'Alejandro', 'Henriquez', 'alejandro', 89573498, 'Chacabuco 456', 'Bio Bio', 'aahenriquez@ing.ucsc.cl', 'img/alejandro.jpg'),
(7, 2, 'Cristian', 'Ascencio', 'cristian', 73548452, 'Irene Morales 784, Concepción', 'Bio Bio', 'cristian@gmail.com', 'img/cristian.jpg'),
(8, 3, 'Luis', 'Cueva', 'luis', 84529654, 'Av. Pedro de Valdivia 1452, Concepción', 'Bio Bio', 'luis@gmail.com', 'img/luis.jpg'),
(9, 2, 'David', 'Valdebenito', 'david', 95825474, 'Pelantaro 84', 'Bio Bio', 'david@gmail.com', 'img/david.jpg'),
(10, 3, 'Wei', 'Chong Lai', 'wei', 84578965, 'Cataluña 2121', 'Bio Bio', 'wclai@ing.ucsc.cl', NULL),
(11, 1, 'Lorenzo', 'Paredes', 'lorenzo', 74125896, 'Anibal pinto 3409', 'Bio Bio', 'lsparedes@ing.ucsc.cl', 'img/lorenzo.jpg'),
(12, 4, 'Placacentro Masisa Chiguayante', '', '', 2354684, 'Manuel Rodríguez 1869', 'Bio Bio', 'placacentrochiguayante@tie.cl', NULL),
(13, 4, 'Placacentro Masisa Ongolmo', '', '', 2291470, 'Ongolmo 1889', 'Bio Bio', 'gladys.salazar@placacentro.com', NULL),
(14, 4, 'Placacentro Masisa Hualpén', '', '', 2256422, 'Janequeo 2071', 'Bio Bio', 'maderaselconquistador@hotmail.com', NULL),
(15, 4, 'P. M. Vasco Nuñez de Balboa', '', '', 413161700, 'Vasco Nuñez de Balboa 9067, Hualpén', 'Bio Bio', 'rsanmartin@mct.cl', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumidor`
--
ALTER TABLE `consumidor`
  ADD CONSTRAINT `consumidor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evalua`
--
ALTER TABLE `evalua`
  ADD CONSTRAINT `evalua_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `consumidor` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evalua_ibfk_2` FOREIGN KEY (`id_trabajo`) REFERENCES `trabajo` (`id_trabajo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mueblista`
--
ALTER TABLE `mueblista`
  ADD CONSTRAINT `mueblista_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posee`
--
ALTER TABLE `posee`
  ADD CONSTRAINT `posee_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `mueblista` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posee_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posee_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `mueblista` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propuesta`
--
ALTER TABLE `propuesta`
  ADD CONSTRAINT `propuesta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `mueblista` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publica`
--
ALTER TABLE `publica`
  ADD CONSTRAINT `publica_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `consumidor` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publica_ibfk_3` FOREIGN KEY (`id_ideaproyecto`) REFERENCES `idea_proyecto` (`id_ideaproyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `realiza_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `mueblista` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_ideaproyecto`) REFERENCES `idea_proyecto` (`id_ideaproyecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_propuesta`) REFERENCES `propuesta` (`id_propuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
