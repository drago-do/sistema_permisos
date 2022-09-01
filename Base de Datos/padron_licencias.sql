-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2022 a las 04:48:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `padron_licencias`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerDiasLaborales` (IN `identificador` VARCHAR(255))   BEGIN
SELECT hora_apertura, hora_cierre, IF((SELECT lunes FROM horarios_por_licencia WHERE id_expediente = identificador),'Lunes','') as 'Lunes',IF((SELECT martes FROM horarios_por_licencia WHERE id_expediente = identificador),'Martes','')as 'Martes',IF((SELECT miercoles FROM horarios_por_licencia WHERE id_expediente = identificador),'Miercoles','')as 'Miercoles',IF((SELECT jueves FROM horarios_por_licencia WHERE id_expediente = identificador),'Jueves','')as 'Jueves',IF((SELECT viernes FROM horarios_por_licencia WHERE id_expediente = identificador),'Viernes','')as 'Viernes',IF((SELECT sabado FROM horarios_por_licencia WHERE id_expediente = identificador),'Sabado','')as 'Sabado',IF((SELECT domingo FROM horarios_por_licencia WHERE id_expediente = identificador),'Domingo','')as 'Domingo' FROM horarios_por_licencia WHERE id_expediente = identificador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerProductosPorEstado` (IN `identificador` VARCHAR(255))   BEGIN
SELECT IF((SELECT lunes FROM horarios_por_licencia WHERE id_expediente = identificador),'Lunes','') as 'Lunes',IF((SELECT martes FROM horarios_por_licencia WHERE id_expediente = identificador),'Martes','')as 'Martes',IF((SELECT miercoles FROM horarios_por_licencia WHERE id_expediente = identificador),'Miercoles','')as 'Miercoles',IF((SELECT jueves FROM horarios_por_licencia WHERE id_expediente = identificador),'Jueves','')as 'Jueves',IF((SELECT viernes FROM horarios_por_licencia WHERE id_expediente = identificador),'Viernes','')as 'Viernes',IF((SELECT sabado FROM horarios_por_licencia WHERE id_expediente = identificador),'Sabado','')as 'Sabado',IF((SELECT domingo FROM horarios_por_licencia WHERE id_expediente = identificador),'Domingo','')as 'Domingo';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id_colonia` int(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_localidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`id_colonia`, `nombre`, `id_localidad`) VALUES
(1, 'DINA', 2),
(2, 'PLAZA RODRIGO GOMEZ', 2),
(4, 'TEPETATES', 1),
(5, 'AMPLIACIÓN DEL TRABAJO', 1),
(6, 'AMPLIACIÓN FRAILES', 1),
(7, 'AMPLIACIÓN JOSÉ MARÍA PINO SUÁREZ', 1),
(8, 'AMPLIACIÓN PLAZA VIEJA', 1),
(9, 'CONSTITUCIÓN DE 1917', 1),
(10, 'DEL TRABAJO', 1),
(11, 'EL CALVARIO', 1),
(12, 'EL MAGUEYAL', 1),
(13, 'FRAILES', 1),
(14, 'FRANCISCO I. MADERO', 1),
(15, 'JOSÉ MARÍA PINO SUÁREZ', 1),
(16, 'LOS REYES', 1),
(17, 'PIEDRAS NEGRAS', 1),
(18, 'PLAZA VIEJA', 1),
(19, 'REVOLUCIÓN MEXICANA', 1),
(20, 'SALES Y MINERALES', 1),
(21, 'CENTRO', 1),
(22, '20 DE NOVIEMBRE', 1),
(23, 'COLONIA EL MAGUEYAL (LAS PALOMAS)', 1),
(24, 'CRUZ BLANCA (SANTA CRUZ)', 1),
(25, 'EL CAPULÍN', 1),
(26, 'EL FRAILE', 1),
(27, 'EL LLANO DE LA PRESA', 1),
(28, 'EL MIRTO', 1),
(29, 'FRANCISCO SARABIA (CORRALILLOS)', 1),
(30, 'GRANJA DE AGUILERA', 1),
(31, 'IROLO', 1),
(32, 'JAGÜEY PRIETO', 1),
(33, 'LA CAÑADA', 1),
(34, 'LA CASETA DE AFOROS', 1),
(35, 'LA ESTACIÓN OCHO', 1),
(36, 'LA HERMITA', 1),
(37, 'LA ISLETA', 1),
(38, 'LA LOMA', 1),
(39, 'LA LOMA DE SAN JUAN', 1),
(40, 'LA PLATEADA', 1),
(41, 'LA RINCONADA', 1),
(42, 'LA TULA', 1),
(43, 'LAS BEDOLLAS', 1),
(44, 'LAS CABRERIAS (LA RINCONADA)', 1),
(45, 'LAS DELICIAS', 1),
(46, 'LOS CIDES', 1),
(47, 'LOS COYOTES', 1),
(48, 'LOS DURAZNOS', 1),
(49, 'LOS GARCÍA', 1),
(50, 'LOS LÓPEZ', 1),
(51, 'LOS QUINTOS', 1),
(54, 'PALO HUECO', 1),
(55, 'PASO DEL CRISTO', 1),
(56, 'RANCHO EL JIHUINGO', 1),
(57, 'RANCHO HERIBERTO CASTILLO MUÑOZ', 1),
(58, 'RANCHO LAS ÁGUILAS', 1),
(59, 'RANCHO LOS ÁNGELES', 1),
(60, 'RANCHO PEDRO MENESES', 1),
(61, 'RANCHO QUINCE HERMANOS', 1),
(62, 'RANCHO ZARATE', 1),
(63, 'SAN BARTOLOMÉ TEPETATES', 1),
(64, 'SAN IGNACIO DE LOYOLA', 1),
(65, 'SAN JERÓNIMO', 1),
(66, 'SAN JOSÉ TULTENGO', 1),
(67, 'SAN MIGUEL ALLENDE', 1),
(68, 'SAN SALVADOR (EL CALVARIO)', 1),
(69, 'TEMOMUSGO', 1),
(70, 'TEPEAPULCO', 1),
(71, 'TEXCATZONGO', 1),
(72, 'TLACATEPA', 1),
(73, 'TULTENGO', 1),
(74, 'VISTA HERMOSA', 1),
(75, '21 DE JULIO', 2),
(76, '5 DE FEBRERO', 2),
(77, 'ABECEDARIO', 2),
(78, 'BENITO JUÁREZ', 2),
(79, 'CARROS', 2),
(80, 'DEL BOSQUE', 2),
(81, 'DIKONA', 2),
(83, 'EL CHAMIZAL', 2),
(84, 'EL PEDREGAL', 2),
(85, 'EX-HACIENDA DE GUADALUPE', 2),
(86, 'FIDES', 2),
(88, 'GRANJA GUADALUPE', 2),
(89, 'IMSS', 2),
(90, 'INDEPENDENCIA', 2),
(92, 'LA ROSA', 2),
(93, 'LAS HACIENDAS', 2),
(94, 'LEGASPI', 2),
(95, 'LOMAS DEL PEDREGAL', 2),
(96, 'MIGUEL HIDALGO', 2),
(97, 'MINEROS', 2),
(98, 'MORELOS', 2),
(99, 'PALMILLAS', 2),
(100, 'PLAN DE AYALA', 2),
(101, 'REAL DEL BOSQUE', 2),
(102, 'REV. MEXICANA', 2),
(103, 'ROJO GÓMEZ', 2),
(104, 'SALVADOR ALLENDE', 2),
(105, 'SANTA BARBARA', 2),
(106, 'SIDENA', 2),
(107, 'TADEO DE NIZA', 2),
(108, 'TESATLA SIGLO XXI', 2),
(109, 'UNIDAD CAMPESINA', 2),
(110, 'VALLE DE GUADALUPE', 2),
(111, 'VICENTE GUERRERO', 2),
(112, 'VILLAS DE SAHAGÚN', 2),
(113, 'ZONA INDUSTRIAL', 2),
(114, 'CENTRO', 2),
(115, 'PINO SUAREZ', 1),
(120, 'LA PRESA', 2),
(121, 'FRACC. INDUSTRIAL', 2),
(122, 'COMPLEJO INDUSTRIAL', 2),
(123, 'SAN MIGUEL ALLENDE', 1),
(124, 'PARQUE INDUSTRIAL ISAC', 2),
(125, 'PARQUE INDUSTRIAL SAHAGUN', 2),
(127, 'PARQUE INDUSTRIAL', 2),
(133, '18 DE MARZO', 1),
(134, 'CORREDOR INDUSTRIAL', 2),
(135, 'PLAZA REGIA', 2),
(136, 'LAS FRAGUAS', 1),
(137, 'FRACCIONAMIENTO VILLAS DE SAHAGUN', 2),
(138, 'EXT. DEL MERCADO', 2),
(139, 'FRACCIONAMIENTO LAS HACIENDAS', 2),
(140, 'AMPLIACIÓN LAS TORRES', 1),
(142, 'TEXCATZONGO', 12),
(143, 'LAS FRAGUAS', 1),
(144, 'FRACCIONAMIENTO TEPEAPULCO', 2),
(145, 'CANDELARIA', 1),
(147, 'BARRIO NEGRO IROLO', 1),
(149, 'TEPETATES', 1),
(150, 'AMPLIACIÓN UNTA', 2),
(151, 'AMPLIACIÓN UNTA BICENTENARIO', 2),
(152, '14 DE FEBRERO', 1),
(153, 'SANTA BÁRBARA', 1),
(154, 'FRACC.RINCONADA LOS FRAILES', 1),
(155, 'CARR. SAHAGÚN-EMILIANO ZAPATA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_por_licencia`
--

CREATE TABLE `direcciones_por_licencia` (
  `id_expediente` int(50) NOT NULL,
  `nombre_de_calle` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_colonia` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `direcciones_por_licencia`
--

INSERT INTO `direcciones_por_licencia` (`id_expediente`, `nombre_de_calle`, `id_colonia`) VALUES
(9, 'ULTIMAPRUEBA', 5),
(10, 'penultima', 2),
(11, 'pedro de ponce 34', 106);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giros_comerciales`
--

CREATE TABLE `giros_comerciales` (
  `id_giro` int(50) NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `giros_comerciales`
--

INSERT INTO `giros_comerciales` (`id_giro`, `nombre`) VALUES
(3, 'ACCESORIOS AUTOMOTRICES'),
(4, 'ACTIVIDADES DEPORTIVAS O RECREACION'),
(5, 'ACUARIO'),
(6, 'AGENCIA DE AUTOS'),
(7, 'AGENCIA DE VIAJES'),
(8, 'AGENCIA EDUCATIVA'),
(9, 'ALARMAS DE SEGURIDAD'),
(10, 'ALIMENTOS / ANTOJITOS MEXICANOS'),
(11, 'ALIMENTOS / BARBACOA'),
(12, 'ALIMENTOS / BARBACOA DE POLLO'),
(13, 'ALIMENTOS / CARNITAS'),
(14, 'ALIMENTOS / COCINA ECONOMICA'),
(15, 'ALIMENTOS / COCTELERIA'),
(16, 'ALIMENTOS / FUENTE DE SODAS'),
(17, 'ALIMENTOS / HELADOS, NIEVES Y PALETAS'),
(18, 'ALIMENTOS / JUGOS'),
(19, 'ALIMENTOS / MARISQUERIA'),
(20, 'ALIMENTOS / PASTES'),
(21, 'ALIMENTOS / PIZZERIA'),
(22, 'ALIMENTOS / POLLOS ASADOS'),
(23, 'ALIMENTOS / POSTRES'),
(24, 'ALIMENTOS / ROSTICERIA'),
(25, 'ALIMENTOS / TAQUERIA'),
(26, 'ALMACEN / BODEGA'),
(27, 'ANTENA DE TELECOMUNICACION'),
(28, 'ANUNCIO PUBLICITARIO'),
(29, 'ARMADORA (AUTOS, FERROCARRIL, AVIONES, MEDIOS DE TRANSPORTE Y OTROS EQUIPOS)'),
(30, 'AUTO HOTEL'),
(31, 'AUTOLAVADO'),
(32, 'BAR'),
(33, 'BAR / VIDEO BAR'),
(34, 'BASE DE AUTOTRANSPORTE EJECUTIVOS'),
(35, 'BAZAR'),
(36, 'BILLAR'),
(37, 'CAFÉ - BILLAR'),
(38, 'CAFÉ - INTERNET'),
(39, 'CAFETERIA'),
(40, 'CAJERO ATM'),
(41, 'CAMPO DE JUEGO'),
(42, 'CANCHA DEPORTIVA'),
(43, 'CARPINTERIA'),
(44, 'CASA DE EMPEÑO'),
(45, 'CASA DE HUESPEDES '),
(46, 'CENTRO BOTANERO'),
(47, 'CENTRO DE COPIADO / PAPELERIA'),
(48, 'CENTRO DE DISTRIBUCION DE CERVEZA'),
(49, 'CENTRO DE DISTRIBUCION DE PERFIL, HERRAJE Y FERRETERIA'),
(50, 'CENTRO DE DISTRIBUCION DE TELAS'),
(51, 'CENTRO DE REHABILITACIÓN'),
(52, 'CENTRO DE VERIFICACION '),
(53, 'CENTRO NOCTURNO / ANTRO'),
(54, 'CENTRO RECREATIVO'),
(55, 'CERRAJERIA'),
(56, 'CERVEZA, VINOS Y LICORES'),
(57, 'CHILES Y HARINAS'),
(58, 'CINE'),
(59, 'CLINICA'),
(60, 'CLUB DEPORTIVO'),
(61, 'COMERCIALIZADORA Y ENSAMBLADORA DE UNIDADES DE TRANSPORTE'),
(62, 'COMERCIO AL POR MAYOR DE DESECHOS METÁLICOS'),
(63, 'COMPAÑÍA DE SEGUROS DE AUTO'),
(64, 'COMPRA Y VENTA AUTOPARTES'),
(65, 'COMPRA Y VENTA DE AUTOS USADOS'),
(66, 'COMPRA Y VENTA DE BALEROS'),
(67, 'COMPRA Y VENTA DE CARTON,PET,FIERO VIEJO Y MATERIALES VARIOS'),
(68, 'COMPRA Y VENTA DE GASES INDUSTRIALES Y MEDICINALES'),
(69, 'COMPRA Y VENTA DE MATERIALES VARIOS'),
(70, 'COMPRA Y VENTA DE PINTURAS EN GENERAL Y ACCESORIOS'),
(71, 'COMPRA-VENTA DE DESPERDICIOS INDUSTRIALES'),
(72, 'CONSTRUCTORA'),
(73, 'CONSULTORIA'),
(74, 'CONSULTORIO DENTAL'),
(75, 'CONSULTORIO MEDICO'),
(76, 'CONSULTORIO QUIROPRACTICO'),
(77, 'CORRALON Y GRUAS'),
(78, 'DESPACHO CONTABLE'),
(79, 'DISTRIBUIDORA DE TORNILLERIA'),
(80, 'DULCERIA'),
(81, 'ELABORACION DE DISTINTIVOS MARMOL Y CERAMICA'),
(82, 'ELABORACION Y PRODUCCION DE PAPEL '),
(83, 'ENVIOS DE DINERO Y PAGOS DE SERVICIOS'),
(84, 'EQUIPO DE SEGURIDAD INDUSTRIAL'),
(85, 'ESCUELA PARTICULAR'),
(86, 'ESTACIÓN DE CARBURACIÓN  DE GAS L.P.'),
(87, 'ESTACIONAMIENTO'),
(88, 'ESTANCIA INFANTIL'),
(89, 'ESTUDIO FOTOGRAFICO'),
(90, 'EVENTOS CULTURALES'),
(91, 'EXPENDIO DE BIMBO'),
(92, 'FABRICACION EN GENERAL'),
(93, 'FARMACIA'),
(94, 'FERRETERIA'),
(95, 'FERRETERIA INDUSTRIAL'),
(96, 'FLORIERIA'),
(97, 'FORRAJERIA'),
(98, 'FRUTAS Y VERDURAS'),
(99, 'GASOLINERA'),
(100, 'GIMNASIO'),
(101, 'GUARDERIA'),
(102, 'HERRAJE'),
(103, 'HERRAJERIA'),
(104, 'HERRERIA'),
(105, 'HOSPITAL'),
(106, 'HOTEL'),
(107, 'IMPRENTA'),
(108, 'INTERNET'),
(109, 'JARCIERIA / ARTICULOS DE PLASTICO'),
(110, 'JOYERIA'),
(111, 'LABORATORIO'),
(112, 'LABORATORIO CLINICO'),
(113, 'LABORATORIO Y RADIOLOGIA'),
(114, 'LAVANDERIA'),
(115, 'LLANTERA'),
(116, 'MADERERÍA'),
(117, 'MANGUERAS Y CONEXIONES'),
(118, 'MANUFACTURA'),
(119, 'MAQUILADORA'),
(120, 'MATERIAS PRIMAS'),
(121, 'MERCERIA'),
(122, 'METAL - MECÁNICO'),
(123, 'MINA'),
(124, 'MOLINO'),
(125, 'OFICINA'),
(126, 'OPTICA'),
(127, 'Paqueteria y Mensajeria'),
(128, 'PLANCHADURIA'),
(129, 'PLANTA Y  ALMACENAMIENTO DE GAS L P'),
(130, 'PLOMERIA'),
(131, 'PULQUERIA'),
(132, 'PURIFICADORA'),
(133, 'RECARGAS TELEFONICAS'),
(134, 'RECAUDERIA'),
(135, 'RECICLADOS PLASTICOS Y MATERIAS PRIMAS'),
(136, 'REFACCIONARIA '),
(137, 'RELOJERIA'),
(138, 'RESTAURANT'),
(139, 'RESTAURANT / BAR'),
(140, 'ROPA'),
(141, 'ROTULOS Y PUBLICIDAD'),
(142, 'SALON DE BELLEZA'),
(143, 'SALON DE EVENTOS SOCIALES Y USOS MULTIPLES'),
(144, 'SECTOR PRIMARIO CARNICERIA'),
(145, 'SECTOR PRIMARIO CREMERIA'),
(146, 'SECTOR PRIMARIO PANADERIA'),
(147, 'SECTOR PRIMARIO POLLERIA'),
(148, 'SECTOR PRIMARIO RECAUDERIA / FRUTAS Y VERDURAS'),
(149, 'SEGURIDAD PRIVADA'),
(150, 'SERVICIO AUTOMOTRIZ'),
(151, 'SERVICIO DE CORRALON'),
(152, 'SERVICIO DE CREMATORIO'),
(153, 'SERVICIO DE FUNDIDORA'),
(154, 'SERVICIO DE FUNERARIA'),
(155, 'SERVICIO DE GRUAS'),
(156, 'SERVICIO DE VELATORIO'),
(157, 'SERVICIOS COMPUTACIONALES '),
(158, 'SERVICIOS EDUCATIVOS'),
(159, 'SOPORTE Y TECNOLOGIA'),
(160, 'SUCURSAL BANCARIA'),
(161, 'TALLER AUTOMOTRIZ'),
(162, 'TALLER DE CALZADO'),
(163, 'TALLER DE COSTURA'),
(164, 'TALLER DE ELECTRONICOS'),
(165, 'TALLER DE MOTOS'),
(166, 'TALLER DE SOLDADURA'),
(167, 'TALLER MECANICO'),
(168, 'TALLER MECANICO '),
(169, 'TELECOMUNICACIONES'),
(170, 'TELEFONIA'),
(171, 'TELEVISION POR CABLE'),
(172, 'TERMINAL DE PASAJEROS'),
(173, 'TIENDA DE ABARROTES/MISELANEA'),
(174, 'TIENDA DE ACCESORIOS / BOUTIQUE '),
(175, 'TIENDA DE APARATOS ELECTRONICOS'),
(176, 'TIENDA DE APARATOS ORTOPEDICOS'),
(177, 'TIENDA DE ARTESANIAS'),
(178, 'TIENDA DE ARTICULOS DE LIMPIEZA'),
(179, 'TIENDA DE ARTICULOS DEPORTIVOS'),
(180, 'TIENDA DE ARTICULOS PARA FIESTA'),
(181, 'TIENDA DE ARTICULOS RELIGIOSOS'),
(182, 'TIENDA DE AUTO SERVICIO'),
(183, 'TIENDA DE BISUTERIA'),
(184, 'TIENDA DE CALZADO / ZAPATOS'),
(185, 'TIENDA DE CELULARES'),
(186, 'TIENDA DE CHILES SECOS'),
(187, 'TIENDA DE COMPUTACION'),
(188, 'TIENDA DE CORTES DE CARNE'),
(189, 'TIENDA DE ELECTRODOMESTICOS'),
(190, 'TIENDA DE HULES'),
(191, 'TIENDA DE IMPERMIABILIZANTES'),
(192, 'TIENDA DE MOTO REFACCIONES'),
(193, 'TIENDA DE MUEBLES'),
(194, 'TIENDA DE NOVEDADES'),
(195, 'TIENDA DE PASTELERIA'),
(196, 'TIENDA DE PESCADERIA'),
(197, 'TIENDA DE PINTURA'),
(198, 'TIENDA DE PISOS Y RECUBRIMIENTOS'),
(199, 'TIENDA DE REGALOS'),
(200, 'TIENDA DE REVISTAS Y PUBLICACIONES'),
(201, 'TIENDA DE ROPA'),
(202, 'TIENDA DE ROPA INTERIOR'),
(203, 'TIENDA DE SEMILLAS'),
(204, 'TIENDA DEPARTAMENTAL '),
(205, 'TIENDA MATERIAL ELECTRICO'),
(206, 'TIENDA MATERIALES DE CONSTRUCCION'),
(207, 'TIENDA NATURISTA'),
(208, 'TINTORERIA'),
(209, 'TLAPALERIA '),
(210, 'TORNILLERIA'),
(211, 'TORNOS'),
(212, 'TORTILLERIA'),
(213, 'VENTA DE AUTOS USADOS'),
(214, 'VENTA DE GANADERIA / PECUARIO'),
(215, 'VETERINARIA'),
(216, 'VINATERIA,VINOS Y LICORES'),
(217, 'VULCANIZADORA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_por_licencia`
--

CREATE TABLE `horarios_por_licencia` (
  `id_expediente` int(50) NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time NOT NULL,
  `lunes` tinyint(1) NOT NULL,
  `martes` tinyint(1) NOT NULL,
  `miercoles` tinyint(1) NOT NULL,
  `jueves` tinyint(1) NOT NULL,
  `viernes` tinyint(1) NOT NULL,
  `sabado` tinyint(1) NOT NULL,
  `domingo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `horarios_por_licencia`
--

INSERT INTO `horarios_por_licencia` (`id_expediente`, `hora_apertura`, `hora_cierre`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) VALUES
(9, '12:56:00', '12:56:00', 1, 0, 1, 0, 1, 0, 0),
(10, '00:00:00', '00:00:00', 0, 0, 0, 0, 0, 0, 0),
(11, '16:00:00', '03:00:00', 0, 0, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificadores_area`
--

CREATE TABLE `identificadores_area` (
  `id_identificador` int(11) NOT NULL,
  `identificador` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `identificadores_area`
--

INSERT INTO `identificadores_area` (`id_identificador`, `identificador`) VALUES
(1, 'TEPE18*9S.1/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `nombre`) VALUES
(1, 'TEPEAPULCO'),
(2, 'CD. SAHAGUN'),
(9, 'FRANCISCO SARABIA'),
(10, 'SAN MIGUEL ALLENDE'),
(11, 'TEPETATES'),
(12, 'TEXCATZONGO'),
(13, 'TULTENGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_por_licencia`
--

CREATE TABLE `pagos_por_licencia` (
  `id_pago_unica` int(11) NOT NULL,
  `id_expediente` int(50) NOT NULL,
  `concepto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pagos_por_licencia`
--

INSERT INTO `pagos_por_licencia` (`id_pago_unica`, `id_expediente`, `concepto`, `cantidad`, `fecha`) VALUES
(13, 9, 'APERTURA', 55, '2022-07-15'),
(14, 9, 'PUBLICIDAD', 500, '2022-07-15'),
(15, 10, 'APERTURA', 10, '2022-07-15'),
(16, 11, 'APERTURA', 1500, '2022-07-15'),
(17, 11, 'RENOVACION', 200, '2022-07-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_licencia`
--

CREATE TABLE `principal_licencia` (
  `id_identificador` int(50) NOT NULL,
  `id_expediente` int(50) NOT NULL,
  `nombre_razonSocial` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `denominacion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rfc` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cta_predial` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cta_agua` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `datos_fiscales` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `giro_comercial` int(50) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `venta_alcohol` tinyint(1) NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `observaciones` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `principal_licencia`
--

INSERT INTO `principal_licencia` (`id_identificador`, `id_expediente`, `nombre_razonSocial`, `denominacion`, `rfc`, `cta_predial`, `cta_agua`, `datos_fiscales`, `giro_comercial`, `descripcion`, `venta_alcohol`, `fecha_apertura`, `observaciones`) VALUES
(1, 2, 'BASE', 'BASE', 'BASE', 'BASE', 'BASE', 'BASE', 3, 'BASE', 1, '2022-07-15 19:07:14', 'BASE'),
(1, 5, 'BASE', 'BASE', 'BASE', 'BASE', 'BASE', 'BASE', 3, 'BASE', 1, '2022-07-15 19:07:14', 'BASE'),
(1, 6, 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 10, 'PRUEBA', 0, '2022-07-15 12:35:43', 'PRUEBA'),
(1, 8, 'nbase', 'nbase', 'nbase', 'nbase', 'nbase', 'nbase', 4, 'nbase', 1, '2022-07-15 19:54:39', 'nbase'),
(1, 9, 'ULTIMAPRUEBA', 'ULTIMAPRUEBA', 'ULTIMAPRUEBA', 'ULTIMAPRUEBA', 'ULTIMAPRUEBA', 'ULTIMAPRUEBA', 11, 'ULTIMAPRUEBA', 1, '2022-07-15 12:56:44', 'ULTIMAPRUEBA'),
(1, 10, 'penultima', 'penultima', 'penultima', 'penultima', 'penultima', 'penultima', 11, 'penultima', 1, '2022-07-15 13:01:10', 'penultima'),
(1, 11, 'Oswaldo', 'tiendita', 'VEAS0909092N2', 'HHY567', 'TUI567', 'SIN DATOS', 8, '', 1, '2022-07-15 14:40:19', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id_colonia`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `direcciones_por_licencia`
--
ALTER TABLE `direcciones_por_licencia`
  ADD UNIQUE KEY `id_expediente` (`id_expediente`),
  ADD KEY `id_colonia` (`id_colonia`);

--
-- Indices de la tabla `giros_comerciales`
--
ALTER TABLE `giros_comerciales`
  ADD PRIMARY KEY (`id_giro`);

--
-- Indices de la tabla `horarios_por_licencia`
--
ALTER TABLE `horarios_por_licencia`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `id_expediente` (`id_expediente`);

--
-- Indices de la tabla `identificadores_area`
--
ALTER TABLE `identificadores_area`
  ADD PRIMARY KEY (`id_identificador`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `pagos_por_licencia`
--
ALTER TABLE `pagos_por_licencia`
  ADD PRIMARY KEY (`id_pago_unica`),
  ADD KEY `id_expediente` (`id_expediente`);

--
-- Indices de la tabla `principal_licencia`
--
ALTER TABLE `principal_licencia`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `giro_comercial` (`giro_comercial`),
  ADD KEY `id_identificador` (`id_identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `giros_comerciales`
--
ALTER TABLE `giros_comerciales`
  MODIFY `id_giro` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT de la tabla `identificadores_area`
--
ALTER TABLE `identificadores_area`
  MODIFY `id_identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos_por_licencia`
--
ALTER TABLE `pagos_por_licencia`
  MODIFY `id_pago_unica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `principal_licencia`
--
ALTER TABLE `principal_licencia`
  MODIFY `id_expediente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD CONSTRAINT `colonias_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direcciones_por_licencia`
--
ALTER TABLE `direcciones_por_licencia`
  ADD CONSTRAINT `direcciones_por_licencia_ibfk_1` FOREIGN KEY (`id_colonia`) REFERENCES `colonias` (`id_colonia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `direcciones_por_licencia_ibfk_2` FOREIGN KEY (`id_expediente`) REFERENCES `principal_licencia` (`id_expediente`);

--
-- Filtros para la tabla `pagos_por_licencia`
--
ALTER TABLE `pagos_por_licencia`
  ADD CONSTRAINT `pagos_por_licencia_ibfk_1` FOREIGN KEY (`id_expediente`) REFERENCES `principal_licencia` (`id_expediente`);

--
-- Filtros para la tabla `principal_licencia`
--
ALTER TABLE `principal_licencia`
  ADD CONSTRAINT `principal_licencia_ibfk_1` FOREIGN KEY (`giro_comercial`) REFERENCES `giros_comerciales` (`id_giro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `principal_licencia_ibfk_2` FOREIGN KEY (`id_identificador`) REFERENCES `identificadores_area` (`id_identificador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
