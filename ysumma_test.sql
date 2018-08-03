-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-08-2018 a las 12:23:21
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 5.6.37-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ysumma_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_app_config`
--

CREATE TABLE `ospos_app_config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_app_config`
--

INSERT INTO `ospos_app_config` (`key`, `value`) VALUES
('address', 'Lima - Perú'),
('company', 'Sistema de Ventas'),
('currency_side', '0'),
('currency_symbol', 'S/.'),
('custom10_name', ''),
('custom1_name', ''),
('custom2_name', ''),
('custom3_name', ''),
('custom4_name', ''),
('custom5_name', ''),
('custom6_name', ''),
('custom7_name', ''),
('custom8_name', ''),
('custom9_name', ''),
('default_tax_1_name', 'Impuesto de Ventas 1'),
('default_tax_1_rate', ''),
('default_tax_2_name', 'Impuesto de Ventas 2'),
('default_tax_2_rate', ''),
('default_tax_rate', '8'),
('email', 'admin@pappastech.com'),
('fax', '123'),
('language', 'es'),
('phone', '555-555-5555'),
('print_after_sale', '0'),
('return_policy', 'Test'),
('timezone', 'America/Bogota'),
('website', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_clients`
--

CREATE TABLE `ospos_clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `mother_lastname` varchar(200) NOT NULL,
  `last_name_casada` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `address` text,
  `data` text,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_clients`
--

INSERT INTO `ospos_clients` (`id`, `firstname`, `middlename`, `lastname`, `mother_lastname`, `last_name_casada`, `email`, `age`, `gender`, `phone`, `fec_nac`, `address`, `data`, `deleted`) VALUES
(8, 'DANIELLA', 'PATRICIA', 'REMAR', 'SAN MARTIN', '', NULL, 30, 'F', NULL, '1987-11-21', NULL, '{\"address\":[{\"address\":\"AV VELASCO ASTETE 118 DPTO 501\",\"district\":\"SAN BORJA LIMA 41\",\"reference\":\"PENTAGONITO CON FINAL AV LAS ARTES PEGADO A JAVIER PRADO\",\"country\":\"PERU\",\"type_address\":\"domicilio\",\"phone\":\"4340919\"}],\"passport\":[{\"country\":\"PERU\",\"nro\":\"116257363\",\"date\":\"2017-11-24\",\"date_init\":\"2021-11-24\",\"nationality\":\"PERUANA\"},{\"country\":\"ITALIA\",\"nro\":\"YA0391222\",\"date\":\"2011-04-04\",\"date_init\":\"2021-04-04\",\"nationality\":\"ITALIANA\"}],\"card\":[],\"company\":[{\"ruc\":\"10447222138\",\"name\":\"DANIELLA PATRICIA REMAR SAN MARTIN\",\"mail\":\"DANIELLA.REMAR@ME.COM\",\"reference\":\"PENTAGONITO CON FINAL AV LAS ARTES PEGADO A JAVIER PRADO\",\"phone\":\"992588686\",\"district\":\"SAN BORJA LIMA 41\",\"address\":\"AV VELASCO ASTETE 118 DPTO 501\"}],\"visado\":[{\"country\":\"EEUU\",\"nro\":\"C5605861\",\"date_init\":\"2010-09-10\",\"date_end\":\"2020-09-10\"}],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"44722213\"}],\"phones\":[{\"type_phone\":\"celular_personal\",\"nro_phone\":\"992588686\"},{\"type_phone\":\"telefono_fijo\",\"nro_phone\":\"4340219\"}],\"emails\":[{\"type_email\":\"personal\",\"email\":\"daniela.remar@me.com\"}],\"frec\":[{\"millaje_frec\":\"ADVANTAGE\",\"nro_frec\":\"740U5H0\",\"user_frec\":\"740U5H0\",\"pass_frec\":\"MELISSA22\",\"end_frec\":\"X\"},{\"millaje_frec\":\"MILEAGE PLUS\",\"nro_frec\":\"PE457383\",\"user_frec\":\"PE457383\",\"pass_frec\":\"MELISSA22\",\"end_frec\":\"X\"},{\"millaje_frec\":\"LIFEMILES\",\"nro_frec\":\"13429249256\",\"user_frec\":\"13429249256\",\"pass_frec\":\"GEORGETOWN21\",\"end_frec\":\"X\"}],\"familiares\":[{\"relacion\":\"MAMA\",\"nombre\":\"PATRICIA SAN MARTIN\",\"telefono\":\"990990833\",\"preferencia_asiento\":\"PASILLO\",\"indicaciones\":\"CUANDO VIAJA CON SU ESPOSO VENTANA Y DEJAR EN MEDIO LIBRE, PARTE DETRAS DEL AVION\"},{\"relacion\":\"PAPA\",\"nombre\":\"JUAN REMAR\",\"telefono\":\"997510533\",\"preferencia_asiento\":\"VENTANA\",\"indicaciones\":\"JUNTO A MELISSA\"}],\"tarjtas\":[]}', 0),
(11, 'PATRICIA', 'MARIA', 'SAN MARTIN', 'GANDOLFO', 'KINJO', NULL, 54, 'F', NULL, '1963-12-15', NULL, '{\"address\":[{\"address\":\"Av Caminos del inca 257 of 306 . Surco\",\"district\":\"lima\",\"reference\":\"CC COMERCIAL CAMINOS DEL INCA SEGUNDO PISO\",\"country\":\"PERU\",\"type_address\":\"empresa\",\"phone\":\"3729190\"},{\"address\":\"av velasco astete 118 dpto 501 \",\"district\":\"san borja LIMA 41\",\"reference\":\"FINAL DE LAS AV AS ARTES CON PENTAGONITO PEGADO A JAVIER PRADO \",\"country\":\"PERU\",\"type_address\":\"domicilio\",\"phone\":\"990990833\"},{\"address\":\"Av Caminos del inca 257 of 306 . Surco\",\"district\":\"lima\",\"reference\":\"CC COMERCIAL CAMINOS DEL INCA SEGUNDO PISO \",\"country\":\"Perú\",\"type_address\":\"entrega\",\"phone\":\"990990833\"}],\"passport\":[{\"country\":\"Perú\",\"nro\":\"116381870\",\"date\":\"2017-02-15\",\"date_init\":\"2022-02-15\",\"nationality\":\"peruana\"},{\"country\":\"italia \",\"nro\":\"YA4841199\",\"date\":\"2014-06-25\",\"date_init\":\"2024-06-25\",\"nationality\":\"italiana\"}],\"card\":[],\"company\":[{\"ruc\":\"20101914837 \",\"name\":\"turifax sac \",\"mail\":\"psanmartin@turifax.com\",\"reference\":\"TURIFAX\",\"phone\":\"990990833\",\"district\":\"surco\",\"address\":\"Av Caminos del inca 257 of 208 . Surco\"},{\"ruc\":\"17139157338\",\"name\":\"Patricia San Martin\",\"mail\":\"psanmartin@turifax.com\",\"reference\":\"X\",\"phone\":\"990990833\",\"district\":\"SAN BORJA LIMA 41 \",\"address\":\"AV VELASCO ASTETE 118 DPTO 501 \"}],\"visado\":[],\"contact\":[{\"ruc\":\"lizbeth alcantara\",\"name\":\"998148330\",\"address\":\"vacaciones@turifax.com\"}],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"07275969\"}],\"phones\":[{\"type_phone\":\"celular_personal\",\"nro_phone\":\"990990833\"},{\"type_phone\":\"telefono_fijo\",\"nro_phone\":\"014340219\"}],\"emails\":[{\"type_email\":\"empresa\",\"email\":\"psanmartin@turifax.com\"},{\"type_email\":\"personal\",\"email\":\"psanmartin@turifax.com\"}],\"frec\":[{\"millaje_frec\":\"lan pass \",\"nro_frec\":\"51072759692\",\"user_frec\":\"51072759692\",\"pass_frec\":\"4340127\",\"end_frec\":\"1963\"},{\"millaje_frec\":\"lifemiles\",\"nro_frec\":\"13419374452\",\"user_frec\":\"00072759691\",\"pass_frec\":\"lorelai1\",\"end_frec\":\"x\"},{\"millaje_frec\":\"flying blue\",\"nro_frec\":\"2085 033 402\",\"user_frec\":\"x\",\"pass_frec\":\"x\",\"end_frec\":\"x\"},{\"millaje_frec\":\"skywards\",\"nro_frec\":\"573890413\",\"user_frec\":\"x\",\"pass_frec\":\"PS07275969\",\"end_frec\":\"x\"},{\"millaje_frec\":\"FLYERBONUS\",\"nro_frec\":\"22114525\",\"user_frec\":\"x\",\"pass_frec\":\"x\",\"end_frec\":\"x\"},{\"millaje_frec\":\"HHONORS NUMBER\",\"nro_frec\":\"534095999\",\"user_frec\":\"x\",\"pass_frec\":\"PATRICIA15\",\"end_frec\":\"x\"},{\"millaje_frec\":\"IHG REWARDS\",\"nro_frec\":\"697525162\",\"user_frec\":\"X\",\"pass_frec\":\"X\",\"end_frec\":\"X\"},{\"millaje_frec\":\"ADVANTAGE\",\"nro_frec\":\"D81X906\",\"user_frec\":\"X\",\"pass_frec\":\"4340127\",\"end_frec\":\"X\"}],\"familiares\":[{\"relacion\":\"ESPOSO\",\"nombre\":\"FERNANDO KINJO\",\"telefono\":\"998578888\",\"preferencia_asiento\":\"PASILLO\",\"indicaciones\":\"CUANDO VIAJEN JUNTOS EN FILA DE 3 ASIGNAR PASILLO AL ESPOSO Y A ELLA VENTANA DEJANDO EL MEDIO LIBRE CONSULTAR COMPRA DE AISENTOS \"},{\"relacion\":\"HIJA\",\"nombre\":\"DANIELLA PATRICIA REMAR SAN MARTIN \",\"telefono\":\"992588686\",\"preferencia_asiento\":\"VENTANA\",\"indicaciones\":\"\"},{\"relacion\":\"HIJA\",\"nombre\":\"MELISSA REMAR SAN MARTIN\",\"telefono\":\"965776404\",\"preferencia_asiento\":\"VENTANA\",\"indicaciones\":\"JUNTO A YOLANDA O A SU PAPA O HERMANA \"}],\"tarjtas\":[{\"tipo_tarjeta\":\"X\",\"nro_tarjeta\":\"X\",\"debito_credito\":\"X\"}],\"description\":\"\"}', 0),
(12, 'CARLA', 'MARIA ALEJANDRA ', 'REMAR', 'CASTRO', '', NULL, 24, 'F', NULL, '1994-06-03', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"07275969\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 0),
(13, 'CLAUDIA', '', 'SAN MARTIN', 'LEON', 'KREY  PERO NO LO REGISTRA EN DOC ', NULL, 50, 'F', NULL, '1968-04-25', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"07275969\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 0),
(14, 'LIZBETH', 'ALEJANDRA', 'ALCANTARA', 'JUAREZ', '', NULL, 29, 'F', NULL, '1988-08-02', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"45222323\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[]}', 0),
(15, 'NELSON', 'JOSE', 'PEREZ', 'DIAZ', '', NULL, 0, 'M', NULL, '1976-10-05', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"12454580\"}],\"phones\":[],\"emails\":[{\"type_email\":\"personal\",\"email\":\"ineyet@gmail.com\"}],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"Hola mundo prueba\"}', 0),
(27, 'uygtuy6ry', 'rtyr', 'tyr', 'tyr', 'yttyr', NULL, 0, 'F', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"carnet_extranjeria\",\"nro_doc\":\"yrtr\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(28, 'MELANIA', 'ANGELICA', 'BONILLA', 'BECERRA', 'X', NULL, 0, NULL, NULL, '1978-10-25', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"14100600\"}],\"phones\":[{\"type_phone\":\"celular_personal\",\"nro_phone\":\"555555555\"}],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"HOLA MUNDO\"}', 1),
(35, '57', '65', '75', '87', '5', NULL, 0, '0', NULL, '2018-05-08', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"5675\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(36, '78', '687', '6', '876', '8', NULL, 0, NULL, NULL, '1988-08-06', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"carnet_extranjeria\",\"nro_doc\":\"i7t87678\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(37, '67678', '676', '7', '67', '86', NULL, 0, NULL, NULL, '2018-07-07', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"00000000\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(38, 'nelson', 'nelson', 'nelson', 'nelson', 'x', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"00000000\"}],\"phones\":[{\"type_phone\":\"celular_personal\",\"nro_phone\":\"555555555\"}],\"emails\":[{\"type_email\":\"personal\",\"email\":\"8888@hmail.com\"}],\"frec\":[],\"familiares\":[{\"relacion\":\"56\",\"nombre\":\"57\",\"telefono\":\"65\",\"preferencia_asiento\":\"VENTANA\",\"indicaciones\":\"58\"}],\"tarjtas\":[],\"description\":\"hola mundo\"}', 1),
(39, 'uno', 'dos', 'tres', 'cuatro', 'cinco', NULL, 0, 'M', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"00000000\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(40, '765', '765', '76', '5765', '76', NULL, 0, '0', NULL, '2018-07-05', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"576\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(41, 'yut', 'yut', 'yut', 'y', 'uy', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"tuy\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(43, '89687', '67', '86', '786', '78', NULL, 0, 'M', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"12345\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(44, '6rtru65', 'r6', 'r', 'tr', '6r', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"654321\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(46, '76', '786', '786', '87', '6', NULL, 0, '', NULL, '2018-08-07', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"111111111\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"gggggggggggggggg\"}', 1),
(47, '1111111111', '222222222222', '3333333333333', '44444444444', '5555555555555', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"111111111\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"gggggggggggg\"}', 1),
(48, '33333', '33', '3', '3', '3', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"00000000\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(49, '576', '567', '5', '675', '765', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"7675765757676\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1),
(50, '687', '67', '68', '68', '6786', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"678676766\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"iiuytuygu\"}', 1),
(51, 'ty', 'ty', 'ty', 't', 'yit', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"77t7yutyTYT\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"jhjh\"}', 1),
(52, 'yguyty', 'ty', 't', 'yt', 'yut', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"yuyuy\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"kkugjh\"}', 1),
(53, 'tyut', 'yut', '+yut', 'uyt', 'uy', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"carnet_extranjeria\",\"nro_doc\":\"uyugy\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"kkugjh\"}', 1),
(54, 'yu', 'yu', 'yu', 'y', 'uiy', NULL, 0, '0', NULL, '2018-07-10', NULL, '{\"address\":[],\"passport\":[],\"card\":[],\"company\":[],\"visado\":[],\"contact\":[],\"documents\":[{\"type_document\":\"dni\",\"nro_doc\":\"yuiyu\"}],\"phones\":[],\"emails\":[],\"frec\":[],\"familiares\":[],\"tarjtas\":[],\"description\":\"\"}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_code`
--

CREATE TABLE `ospos_code` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `key` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `data` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_code`
--

INSERT INTO `ospos_code` (`id`, `name`, `key`, `type`, `data`, `created_at`, `updated_at`) VALUES
(1, 'File Head BCP', 'file-head-bcp', 'file_export', '{\"file_head_bcp\": {\"type\": \"head\", \"content\": [{\"name\": \"Tipo de Registro\", \"align\": \"center\", \"length\": 1, \"default\": 1, \"position\": 1, \"description\": \"Para identificar el registro de cabecera se deberá utilizar valor fijo 1\", \"format_date\": \"\"}, {\"name\": \"Cantidad de abonos de la planilla\", \"align\": \"rigth\", \"length\": 6, \"default\": \"000006\", \"position\": 2, \"description\": \"Alinear a la derecha y completar con ceros hasta 6 posiciones\", \"format_date\": \"\"}, {\"name\": \"Fecha de proceso\", \"align\": \"center\", \"length\": 8, \"position\": 8, \"description\": \"El formato debe ser aaaammdd. Si se ingresa en blanco el BCP colocará la fecha actual.\", \"format_date\": \"aaaammdd\"}, {\"name\": \"Subtipo de planilla de haberes\", \"align\": \"center\", \"length\": 1, \"default\": \"G\", \"position\": 16, \"description\": \"Subtipo de planilla de haberes\", \"format_date\": \"\"}, {\"name\": \"Tipo de la cuenta de cargo\", \"align\": \"center\", \"length\": 1, \"default\": \"C\", \"position\": 17, \"description\": \" Considerar los siguientes tipos C => Cuenta Corriente,M => Cuenta Maestra\", \"format_date\": \"\"}, {\"name\": \"Moneda de la cuenta de cargo\", \"align\": \"center\", \"length\": 4, \"default\": \"0001\", \"position\": 18, \"description\": \"Valores posibles 0001 => Nuevos Soles,1001 => Dólares\", \"format_date\": \"\"}, {\"name\": \"Número de la cuenta de cargo\", \"align\": \"left\", \"length\": 20, \"default\": \"1910695055056\", \"position\": 22, \"description\": \"Valores posibles 0001 => Nuevos Soles,1001 => Dólares\", \"format_date\": \"\"}, {\"name\": \"Monto total de la planilla\", \"align\": \"rigth\", \"length\": 17, \"default\": \"00000000001200.00\", \"position\": 42, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \".00\"}, {\"name\": \"Referencia de la planilla\", \"align\": \"rigth\", \"length\": 40, \"default\": \"\", \"position\": 59, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \"\"}, {\"name\": \"Total de control (checksum)\", \"align\": \"rigth\", \"length\": 15, \"default\": \"000001100000000\", \"position\": 101, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \"\"}]}}', '2017-12-02 14:12:49', NULL),
(2, 'File Detail BCP', 'file-detail-bcp', 'file_export', '{\"file_detail_bcp\": {\"type\": \"detail\", \"content\": [{\"name\": \"Tipo de Registro\", \"align\": \"center\", \"length\": 1, \"default\": 2, \"position\": 1, \"description\": \"Para identificar el registro de detalle se deberá utilizar valor fijo 2\", \"format_date\": \"\"}, {\"name\": \"Número de cuenta de abono\", \"align\": \"left\", \"length\": 20, \"default\": \"1910695055056\", \"position\": 2, \"description\": \"Formato: SSSCCCCCCCCMDD\", \"format_date\": \"\"}, {\"name\": \"Tipo de documento del empleado\", \"align\": \"center\", \"length\": 1, \"position\": 22, \"description\": \"Tipo de documento\", \"format_date\": \"\"}, {\"name\": \"Número de documento del empleado\", \"align\": \"left\", \"length\": 12, \"position\": 23, \"description\": \"Número de documento del empleado\", \"format_date\": \"\"}, {\"name\": \"Correlativo de documento\", \"align\": \"left\", \"length\": 3, \"position\": 35, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Nombre del trabajador\", \"align\": \"rigth\", \"length\": 75, \"position\": 38, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Referencia para el beneficiario\", \"align\": \"center\", \"length\": 40, \"position\": 113, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Referencia para la empresa\", \"align\": \"left\", \"length\": 20, \"position\": 153, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Moneda del importe a abonar\", \"align\": \"rigth\", \"length\": 4, \"default\": \"0001\", \"position\": 173, \"description\": \"Moneda del importe a abonar\", \"format_date\": \"\"}, {\"name\": \"Importe a abonar\", \"align\": \"left\", \"length\": 17, \"position\": 177, \"description\": \"\", \"format_date\": \"\", \"format_currency\": \".00\"}]}}', '2017-11-22 22:16:00', NULL),
(3, 'DNI', 'dni', 'document_type', '{\"number_length\": 8}', '2017-12-02 15:30:30', NULL),
(4, 'CARNET DE EXTRANJERIA', 'carnet-de-extranjeria', 'document_type', '{\"number_length\": 10}', '2017-12-02 15:30:43', NULL),
(5, 'PASAPORTE', 'pasaporte', 'document_type', '{\"number_length\": 10}', '2017-12-02 15:30:49', NULL),
(6, 'pagado', 'pagado', 'state_payment', '{}', '2017-12-02 16:14:09', NULL),
(7, 'provisionado', 'provisionado', 'state_payment', '{}', '2017-12-02 16:14:29', NULL),
(8, 'soles', 'soles', 'money_type', '{}', '2017-12-04 21:53:09', NULL),
(9, 'dólares', 'dólares', 'money_type', '{}', '2017-12-04 21:53:45', NULL),
(10, 'pendiente', 'pendiente', 'order_state_type', '{}', '2018-01-06 16:00:12', NULL),
(11, 'comprado', 'comprado', 'order_state_type', '{}', '2018-01-06 16:00:12', NULL),
(12, 'anulado', 'anulado', 'order_state_type', '{}', '2018-01-06 16:00:12', NULL),
(13, 'Registrado', 'registrado', 'document_state_type', '{}', '2018-01-10 22:45:56', NULL),
(14, 'Anulado', 'anulado', 'document_state_type', '{}', '2018-01-10 22:46:19', NULL),
(15, 'DESTINOS MUNDIALES', 'DESTINOS_MUNDIALES', 'travel_operator', '', '2018-03-16 16:15:53', NULL),
(16, 'CIC', 'CIC', 'travel_operator', '', '2018-03-16 16:16:25', NULL),
(17, 'BEDS ONLINE', 'BEDS_ONLINE', 'travel_operator', '', '2018-03-16 16:16:55', NULL),
(18, 'AG CORP', 'AG_CORP', 'travel_operator', '', '2018-03-16 16:17:47', NULL),
(19, 'AG CORP', 'AG_CORP', 'travel_operator', '', '2018-03-16 16:24:19', NULL),
(20, 'INTERAGENCIAS', 'INTERAGENCIAS', 'travel_operator', '', '2018-03-16 16:24:53', NULL),
(21, 'millaje', 'millaje', 'payment_dscto_type', '', '2018-03-24 21:58:40', NULL),
(22, 'efectivo', 'efectivo', 'payment_type', '', '2018-03-24 22:05:16', NULL),
(23, 'tarjeta', 'tarjeta', 'payment_type', '', '2018-03-24 22:05:44', NULL),
(24, 'cuotas', 'cuotas', 'payment_type', '', '2018-03-24 22:06:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_cotizaciones`
--

CREATE TABLE `ospos_cotizaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cotizacion_id` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estatus` varchar(1) COLLATE latin1_spanish_ci DEFAULT NULL,
  `data` text COLLATE latin1_spanish_ci,
  `descripcion` text COLLATE latin1_spanish_ci,
  `codigo` text COLLATE latin1_spanish_ci,
  `monto` double DEFAULT NULL,
  `asesor` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ospos_cotizaciones`
--

INSERT INTO `ospos_cotizaciones` (`id`, `cliente_id`, `cotizacion_id`, `estatus`, `data`, `descripcion`, `codigo`, `monto`, `asesor`, `fecha`) VALUES
(1, '4', 'TURIFAX-VU9N-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-18 12:50:52'),
(8, '8', 'TURIFAX-IQH-1307', 'V', NULL, NULL, '0', 0, '2147483647', '2018-07-18 12:50:56'),
(91, '11', 'TURIFAX-T3BA-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 12:48:36'),
(92, '11', 'TURIFAX-5VCG-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 12:49:28'),
(93, '11', 'TURIFAX-NTO0-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 12:52:14'),
(94, '11', 'TURIFAX-V68F-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 12:53:00'),
(95, '11', 'TURIFAX-92GT-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 12:59:56'),
(96, '11', 'TURIFAX-41EO-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 13:07:15'),
(97, '12', 'TURIFAX-KI04-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 13:08:13'),
(98, '12', 'TURIFAX-KI04-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 13:14:47'),
(99, '11', 'TURIFAX-JZXV-1307', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-13 13:15:30'),
(100, '15', 'TURIFAX-OPTL-1607', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-16 12:12:09'),
(101, '11', 'TURIFAX-O3KN-1607', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-16 17:12:21'),
(102, '15', 'TURIFAX-94TL-1907', 'C', NULL, NULL, '0', 0, '2147483647', '2018-07-19 10:23:28'),
(103, '8', 'TURIFAX-KG5T-2007', 'C', NULL, NULL, NULL, NULL, '2147483647', '2018-07-20 09:37:29'),
(104, '8', 'TURIFAX-KG5T-2007', 'C', NULL, NULL, NULL, NULL, '2147483647', '2018-07-20 09:37:34'),
(105, '8', 'TURIFAX-J1LI-2007', 'C', NULL, NULL, NULL, NULL, '2147483647', '2018-07-20 09:37:39'),
(106, '15', 'TURIFAX-WXUH-2007', 'C', NULL, NULL, NULL, NULL, '2147483647', '2018-07-20 09:37:43'),
(116, '15', 'TURIFAX-PNCC-2407', 'C', NULL, NULL, NULL, NULL, '2147483647', '2018-07-24 14:06:42'),
(150, '15', 'NELSON-JGA9-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:40:21'),
(151, '15', 'NELSON-LQVM-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:44:49'),
(152, '15', 'NELSON-MC5A-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:48:38'),
(153, '15', 'NELSON-XB0I-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:49:27'),
(154, '15', 'NELSON-E7VI-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:49:52'),
(155, '15', 'NELSON-CD3K-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:50:16'),
(156, '15', 'NELSON-LRJO-2407', 'C', NULL, '0', NULL, NULL, '2', '2018-07-24 23:51:52'),
(157, '15', 'NELSON-IBJG-2507', 'C', NULL, '0', NULL, NULL, '2', '2018-07-25 00:38:44'),
(162, '15', 'NELSON-KI8O-2507', 'C', NULL, '0', NULL, NULL, '2', '2018-07-25 00:47:33'),
(163, '0', 'NELSON-KI8O-2507', 'C', NULL, NULL, '0', 0, '2', '2018-07-25 00:47:36'),
(164, '0', 'NELSON-KI8O-2507', 'C', NULL, NULL, '0', 0, '2', '2018-07-25 00:50:54'),
(165, '15', 'NELSON-TQSC-2507', 'C', NULL, '0', NULL, NULL, '2', '2018-07-25 00:52:06'),
(166, '0', '0', 'C', NULL, '0', NULL, NULL, '2', '2018-07-25 00:52:09'),
(167, '11', 'NELSON-90T0-2507', 'C', NULL, '0', NULL, NULL, '2', '2018-07-25 08:47:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_cotizaciones_servicios`
--

CREATE TABLE `ospos_cotizaciones_servicios` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cotizacion_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `code` varchar(200) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `descripcion` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_cotizaciones_servicios`
--

INSERT INTO `ospos_cotizaciones_servicios` (`id`, `name`, `cotizacion_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `code`, `amount`, `descripcion`, `data`) VALUES
(1, 'Hotel', 'TURIFAX-WXUH-2007', '2018-07-20 09:32:24', 2147483647, NULL, NULL, 'AS345E', '66666.00', NULL, 'Cusco a tu Alcance\n\nVUELO FECHA RUTA SALE LLEGA\nLA2011O 19JUL LIMA CUSCO 0522 0644\nLA2077Q 22JUL CUSCO LIMA 1308 1630\n\n04 Días / 03 Noches\n\nTicket aéreo Lima / Cusco / Lima vía LAN\nTraslados de entrada y salida\n03 noches de alojamiento en Cusco (inc. desayunos)\nFull Day a Machu Picchu en Tren vistadome y retorno en expedition con almuerzo\nTransporte, entradas y guiado en servicio compartido (Ingles y/o español)\n\nDía 1: Cusco\nLlegada, recepción y traslado al hotel. Resto del día libre por cuenta del pasajero. Alojamiento en Cusco\nComidas: Ninguna\nDía 2: Cusco – Machu Picchu - Cusco\nA hora coordinada traslado del hotel a la estación ferroviaria para abordar su tren con destino a Aguas Calientes, llegada y abordo de bus que lo llevara al majestuoso complejo arqueológico de Machu Picchu, visita guiada al Santuario, conoceremos el Palacio Real, las Tres Ventanas, la Plaza Sagrada, el Intihuatana, el Palacio Real, el Cóndor, el Torreón Circular todos construidos con una perfección arquitectónica. A hora indicada regresamos en bus a Aguas Calientes para disfrutar de un agradable almuerzo, posteriormente tomaremos nuestro tren de retorno a Cusco.\n\nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \n\nAlojamiento en Cusco\nComidas: Desayuno\nDía 3: Cusco\nTraslado del hotel al aeropuerto para abordar su vuelo nacional o internacional\nComidas: Desayuno'),
(2, 'Boleto Aereo', 'TURIFAX-WXU-2007', '2018-07-20 09:32:24', 2147483647, NULL, NULL, 'WE342S', '4321.00', NULL, NULL),
(3, 'Boleto BT/IT', 'TURIFAX-WXUH-2007', '2018-07-20 09:32:24', 2147483647, NULL, NULL, '43EDC4', '2222.00', NULL, NULL),
(4, 'Hotel', 'TURIFAX-WXUH-2007', '2018-07-20 08:52:06', 2147483647, NULL, NULL, '1QW22E', '122.00', NULL, NULL),
(5, 'Excursion', 'TURIFAX-WXUH-2007', '2018-07-20 08:52:35', 2147483647, NULL, NULL, '12WWWG5', '6543.00', NULL, NULL),
(8, 'Auto', 'TURIFAX-WXUH-2007', '2018-07-20 09:32:24', 2147483647, NULL, NULL, '09II7Y', '44444.00', NULL, NULL),
(10, 'Boleto Aereo', 'TURIFAX-WXUH-2007', '2018-07-22 17:52:11', 2147483647, NULL, NULL, '123', '12.00', NULL, '[{\"service\":\"vuelo\",\"name\":\"Boleto BT\\/IT\",\"ammount\":\"1234\",\"monto\":\"1111\"},{\"service\":\"crucero\",\"name\":\"Crucero\",\"ammount\":\"333\",\"monto\":\"22\"}]'),
(11, 'Crucero', 'TURIFAX-WXUH-2007', '2018-07-22 17:57:37', 2147483647, NULL, NULL, '12333', '11122.00', NULL, '[{\"service\":\"vuelo\",\"name\":\"Boleto BT\\/IT\",\"ammount\":\"1234\",\"monto\":\"1111\"},{\"service\":\"crucero\",\"name\":\"Crucero\",\"ammount\":\"333\",\"monto\":\"22\"}]'),
(15, 'Paquete', 'TURIFAX-WXUH-2007', '2018-07-20 08:52:06', 2147483647, NULL, NULL, '2OP9I', '44333.00', NULL, NULL),
(33, 'Boleto BT/IT', 'NELSON-VGKH-2407', '2018-07-24 19:06:15', 2, NULL, NULL, '123ABC/ERT565', '243.00', 'VUELO FECHA RUTA SALE LLEGA\nLA2011O 19JUL LIMA CUSCO 0522 0644\nLA2077Q 22JUL CUSCO LIMA 1308 1630\n04 D?as / 03 Noches\nTicket a?reo Lima / Cusco / Lima v?a LAN\nTraslados de entrada y salida\n03 noches de alojamiento en Cusco (inc. desayunos)\nFull Day a Machu Picchu en Tren vistadome y retorno en expedition con almuerzo\nTransporte, entradas y guiado en servicio compartido (Ingles y/o espa?ol)\nD?a 1: Cusco\nLlegada, recepci?n y traslado al hotel. Resto del d?a libre por cuenta del pasajero. Alojamiento en Cusco\nComidas: Ninguna\nD?a 2: Cusco ? Machu Picchu - Cusco\nA hora coordinada traslado del hotel a la estaci?n ferroviaria para abordar su tren con destino a Aguas Calientes, llegada y abordo de bus que lo\nllevara al majestuoso complejo arqueol?gico de Machu Picchu, visita guiada al Santuario, conoceremos el Palacio Real, las Tres Ventanas, la Plaza\nSagrada, el Intihuatana, el Palacio Real, el C?ndor, el Torre?n Circular todos construidos con una perfecci?n arquitect?nica. A hora indicada\nregresamos en bus a Aguas Calientes para disfrutar de un agradable almuerzo, posteriormente tomaremos nuestro tren de retorno a Cusco.\nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm ? llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nD?a 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral as? como el Convento de Santo Domingo,\nconstruido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueol?gicos\naleda?os como Kenko, Puca Pucar?, Tambomachay y la Fortaleza de Sacsayhuam?n. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm ? llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nD?a 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral as? como el Convento de Santo Domingo,\nconstruido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueol?gicos\naleda?os como Kenko, Puca Pucar?, Tambomachay y la Fortaleza de Sacsayhuam?n. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm ? llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nD?a 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral as? como el Convento de Santo Domingo,\nconstruido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueol?gicos\naleda?os como Kenko, Puca Pucar?, Tambomachay y la Fortaleza de Sacsayhuam?n. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm ? llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nTURIFAX - RUC: 20101914837 Telefono: 511 3729190 Email: fyi@turifax.com | Av. Caminos del Inca 257 Of 208, C.Comercial Caminos del Inca II Etapa, Chacarilla del Estanque, Surco, LIMA\nD?a 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral as? como el Convento de Santo Domingo,\nconstruido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueol?gicos\naleda?os como Kenko, Puca Pucar?, Tambomachay y la Fortaleza de Sacsayhuam?n. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm ? llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nD?a 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral as? como el Convento de Santo Domingo,\nconstruido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueol?gicos\naleda?os como Kenko, Puca Pucar?, Tambomachay y la Fortaleza de Sacsayhuam?n. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm ? llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nD?a 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral as? como el Convento de Santo Domingo,\nconstruido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueol?gicos\naleda?os como Kenko, Puca Pucar?, Tambomachay y la Fortaleza de Sacsayhuam?n. Retorno al hotel. ', '[{\"service\":\"Boleto BT\\/IT\",\"key\":\"Boleto BT\\/IT\",\"name\":\"Boleto BT\\/IT\",\"ammount\":\"123ABC\",\"monto\":\"120\"},{\"service\":\"Boleto BT\\/IT\",\"key\":\"Boleto BT\\/IT\",\"name\":\"Boleto BT\\/IT\",\"ammount\":\"ERT565\",\"monto\":\"123\"}]'),
(34, 'Boleto BT/IT', 'NELSON-IGFP-2407', '2018-07-24 19:12:27', 2, NULL, NULL, '1222', '12.00', '122', '[{\"service\":\"Boleto BT\\/IT\",\"key\":\"Boleto BT\\/IT\",\"name\":\"Boleto BT\\/IT\",\"ammount\":\"1222\",\"monto\":\"12\"}]'),
(35, 'Boleto BT/IT', 'NELSON-PSWC-2407', '2018-07-24 19:13:08', 2, NULL, NULL, '4352', '23.00', 'efref', '[{\"service\":\"Boleto BT\\/IT\",\"key\":\"Boleto BT\\/IT\",\"name\":\"Boleto BT\\/IT\",\"ammount\":\"4352\",\"monto\":\"23\"}]'),
(61, 'Tarjetas de Asistencias', 'NELSON-LQVM-2407', '2018-07-24 23:44:50', 2, NULL, NULL, '1234/67678787', '87801.00', 'kdvnwevnw wj 2ibtn_add_cotibtn_add_cotibtn_add_cotibtn_add_cotibtn_add_cotibtn_add_cotibtn_add_cotibtn_add_coti', '[{\"service\":\"Tarjetas de Asistencias\",\"key\":\"Tarjetas de Asistencias\",\"name\":\"Tarjetas de Asistencias\",\"ammount\":\"1234\",\"monto\":\"123\"},{\"service\":\"Tarjetas de Asistencias\",\"key\":\"Tarjetas de Asistencias\",\"name\":\"Tarjetas de Asistencias\",\"ammount\":\"67678787\",\"monto\":\"87678\"}]'),
(62, 'Hotel', 'NELSON-LQVM-2407', '2018-07-24 23:44:50', 2, NULL, NULL, 'ryry86786', '76.00', 'hotel1', '[{\"service\":\"Hotel\",\"key\":\"Hotel\",\"name\":\"Hotel\",\"ammount\":\"ryry86786\",\"monto\":\"76\"}]'),
(71, 'Boleto Aereo', 'NELSON-KI8O-2507', '2018-07-25 00:47:33', 2, NULL, NULL, '123GG/76TGY', '687.00', '[{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}][{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"556TRE\",\"monto\":\"678\"}]', '[{\"service\":\"Boleto Aereo\",\"key\":\"Boleto Aereo\",\"name\":\"Boleto Aereo\",\"ammount\":\"123GG\",\"monto\":\"10\"},{\"service\":\"Boleto Aereo\",\"key\":\"Boleto Aereo\",\"name\":\"Boleto Aereo\",\"ammount\":\"76TGY\",\"monto\":\"677\"}]'),
(72, 'Auto', 'NELSON-TQSC-2507', '2018-07-25 00:52:06', 2, NULL, NULL, 'uyy/uy67', '941.00', 'saveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacionsaveCotizacion', '[{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"uyy\",\"monto\":\"33\"},{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"uy67\",\"monto\":\"908\"}]'),
(73, 'Boleto Aereo', 'NELSON-90T0-2507', '2018-07-25 08:47:00', 2, NULL, NULL, '123BGV/123ABC/23BH6', '229.00', 'VUELO FECHA RUTA SALE LLEGA\nLA2011O 19JUL LIMA CUSCO 0522 0644\nLA2077Q 22JUL CUSCO LIMA 1308 1630', '[{\"service\":\"Boleto Aereo\",\"key\":\"Boleto Aereo\",\"name\":\"Boleto Aereo\",\"ammount\":\"123BGV\",\"monto\":\"10\"},{\"service\":\"Boleto Aereo\",\"key\":\"Boleto Aereo\",\"name\":\"Boleto Aereo\",\"ammount\":\"123ABC\",\"monto\":\"129\"},{\"service\":\"Boleto Aereo\",\"key\":\"Boleto Aereo\",\"name\":\"Boleto Aereo\",\"ammount\":\"23BH6\",\"monto\":\"90\"}]'),
(74, 'Hotel', 'NELSON-CKGZ-2807', '2018-07-25 08:47:00', 2, NULL, NULL, 'VGF567/TFG55', '67.00', '04 Días / 03 Noches\n\nTicket aéreo Lima / Cusco / Lima vía LAN\nTraslados de entrada y salida\n03 noches de alojamiento en Cusco (inc. desayunos)\nFull Day a Machu Picchu en Tren vistadome y retorno en expedition con almuerzo\nTransporte, entradas y guiado en servicio compartido (Ingles y/o español)\n\nDía 1: Cusco\nLlegada, recepción y traslado al hotel. Resto del día libre por cuenta del pasajero. Alojamiento en Cusco\nComidas: Ninguna\nDía 2: Cusco – Machu Picchu - Cusco\nA hora coordinada traslado del hotel a la estación ferroviaria para abordar su tren con destino a Aguas Calientes, llegada y abordo de bus que lo llevara al majestuoso complejo arqueológico de Machu Picchu, visita guiada al Santuario, conoceremos el Palacio Real, las Tres Ventanas, la Plaza Sagrada, el Intihuatana, el Palacio Real, el Cóndor, el Torreón Circular todos construidos con una perfección arquitectónica. A hora indicada regresamos en bus a Aguas Calientes para disfrutar de un agradable almuerzo, posteriormente tomaremos nuestro tren de retorno a Cusco.\n\nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \nAlojamiento en Cusco\nComidas: Desayuno, almuerzo\nTren salida 07:35 am - llega 10:52am //\nTren retorno 06:16pm – llega 07:50pm a Ollantaytambo y bus privado con llegada final a Cusco 10pm.\nDía 3: Cusco\nPor la tarde visita a la ciudad de Cusco, conoceremos entre otros atractivos la Plaza de Armas, la Catedral así como el Convento de Santo Domingo, construido sobre el famoso Templo del Koricancha, posteriormente nos dirigiremos a las afueras de la ciudad para apreciar los restos arqueológicos aledaños como Kenko, Puca Pucará, Tambomachay y la Fortaleza de Sacsayhuamán. Retorno al hotel. \n\nAlojamiento en Cusco\nComidas: Desayuno\nDía 3: Cusco\nTraslado del hotel al aeropuerto para abordar su vuelo nacional o internacional\nComidas: Desayuno', '[{\"service\":\"Hotel\",\"key\":\"Hotel\",\"name\":\"Hotel\",\"ammount\":\"VGF567\",\"monto\":\"39\"},{\"service\":\"Hotel\",\"key\":\"Hotel\",\"name\":\"Hotel\",\"ammount\":\"TFG55\",\"monto\":\"28\"}]'),
(75, 'Auto', 'NELSON-CKCZ-2807', '2018-07-25 08:47:00', 2, NULL, NULL, '8JUH87', '1980.00', 'Traslados de entrada y salida\n03 noches de alojamiento en Cusco (inc. desayunos)\nFull Day a Machu Picchu en Tren vistadome y retorno en expedition con almuerzo\nTransporte, entradas y guiado en servicio compartido (Ingles y/o español)\n\nDía 1: Cusco\nLlegada, recepción y traslado al hotel. Resto del día libre por cuenta del pasajero. Alojamiento en Cusco\nComidas: Ninguna', '[{\"service\":\"Auto\",\"key\":\"Auto\",\"name\":\"Auto\",\"ammount\":\"8JUH87\",\"monto\":\"1980\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_customers`
--

CREATE TABLE `ospos_customers` (
  `person_id` bigint(11) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `taxable` int(1) NOT NULL DEFAULT '1',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `data` text,
  `data_customer` text,
  `data_nueva` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_customers`
--

INSERT INTO `ospos_customers` (`person_id`, `account_number`, `taxable`, `deleted`, `data`, `data_customer`, `data_nueva`) VALUES
(2, NULL, 1, 1, NULL, NULL, ''),
(12345678, NULL, 1, 1, NULL, NULL, ''),
(87654321, NULL, 1, 1, NULL, NULL, ''),
(43215678, NULL, 1, 1, NULL, NULL, ''),
(87654346, NULL, 0, 1, NULL, NULL, ''),
(48227010, NULL, 1, 1, NULL, NULL, ''),
(48227019, NULL, 1, 1, NULL, '{\"travel_detail\":{\"window_travel_detail\":\"bbbbbbb\",\"pas_travel_detail\":\"dssdssdq\",\"mill_travel_detail\":\"sdssdds\",\"visa_travel_detail\":\"ssdsdsd\",\"vacuna_travel_detail\":\"sdsdssdsd\"}}', ''),
(48227020, NULL, 1, 1, NULL, NULL, ''),
(2147483647, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"12123343444\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"2019-12-01\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"travel_detail\":{\"window_travel_detail\":\"asasas\",\"pas_travel_detail\":\"asasasa\",\"mill_travel_detail\":\"saasassa\",\"visa_travel_detail\":\"saassa\",\"vacuna_travel_detail\":\"saassaas\"}}', ''),
(23242526, NULL, 0, 0, '0', NULL, ''),
(33343536, NULL, 0, 0, '0', NULL, ''),
(44454647, NULL, 0, 0, '0', NULL, ''),
(54555657, NULL, 0, 0, '0', '{\"customer_info\":{\"passport\":\"12231323113\",\"date_expire\":\"2020-12-12\"}}', ''),
(12323, NULL, 1, 0, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(71479309, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(45961280, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(1234567891, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(10714793093, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(10714793092, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(20602919057, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(45222323, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(20602919064, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919065, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919066, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919067, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919068, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919069, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919070, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919071, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919072, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919073, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919074, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919075, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919076, NULL, 1, 1, '0', '{\"customer_info\":{\"documentos\":[{\"documento\":\"DNI\",\"nro\":\"132\"},{},{}],\"pasaportes\":[{},{},{}],\"direcciones\":[{}],\"tarjetas\":[{}],\"generales\":[{}],\"empresa\":[{}],\"contactar\":[{}],\"pasajeros\":[{}],\"emails\":[{}],\"celulares\":[{\"tipo_contacto\":\"CELULAR PERSONAL\"},{}],\"familiares\":[{}],\"visado\":[{}],\"asiento\":[{}]}}', '0'),
(20602919077, NULL, 1, 1, '0', '{\"customer_info\":{\"documentos\":[{\"documento\":\"DNI\",\"nro\":\"132\"},{},{}],\"pasaportes\":[{},{},{}],\"direcciones\":[{}],\"tarjetas\":[{}],\"generales\":[{}],\"empresa\":[{}],\"contactar\":[{}],\"pasajeros\":[{}],\"emails\":[{}],\"celulares\":[{\"tipo_contacto\":\"CELULAR PERSONAL\"},{}],\"familiares\":[{}],\"visado\":[{}],\"asiento\":[{}]}}', '0'),
(20602919078, NULL, 1, 1, '0', '{\"customer_info\":{\"documentos\":[{\"documento\":\"DNI\",\"nro\":\"132\"},{},{}],\"pasaportes\":[{},{},{}],\"direcciones\":[{}],\"tarjetas\":[{}],\"generales\":[{}],\"empresa\":[{}],\"contactar\":[{}],\"pasajeros\":[{}],\"emails\":[{}],\"celulares\":[{\"tipo_contacto\":\"CELULAR PERSONAL\"},{}],\"familiares\":[{}],\"visado\":[{}],\"asiento\":[{}]}}', '0'),
(2, NULL, 1, 1, NULL, NULL, ''),
(12345678, NULL, 1, 1, NULL, NULL, ''),
(87654321, NULL, 1, 1, NULL, NULL, ''),
(43215678, NULL, 1, 1, NULL, NULL, ''),
(87654346, NULL, 0, 1, NULL, NULL, ''),
(48227010, NULL, 1, 1, NULL, NULL, ''),
(48227019, NULL, 1, 1, NULL, '{\"travel_detail\":{\"window_travel_detail\":\"bbbbbbb\",\"pas_travel_detail\":\"dssdssdq\",\"mill_travel_detail\":\"sdssdds\",\"visa_travel_detail\":\"ssdsdsd\",\"vacuna_travel_detail\":\"sdsdssdsd\"}}', ''),
(48227020, NULL, 1, 1, NULL, NULL, ''),
(2147483647, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"12123343444\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"2019-12-01\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"travel_detail\":{\"window_travel_detail\":\"asasas\",\"pas_travel_detail\":\"asasasa\",\"mill_travel_detail\":\"saasassa\",\"visa_travel_detail\":\"saassa\",\"vacuna_travel_detail\":\"saassaas\"}}', ''),
(23242526, NULL, 0, 0, '0', NULL, ''),
(33343536, NULL, 0, 0, '0', NULL, ''),
(44454647, NULL, 0, 0, '0', NULL, ''),
(54555657, NULL, 0, 0, '0', '{\"customer_info\":{\"passport\":\"12231323113\",\"date_expire\":\"2020-12-12\"}}', ''),
(12323, NULL, 1, 0, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(71479309, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(45961280, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(1234567891, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(10714793093, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(10714793092, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(20602919057, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(45222323, NULL, 1, 1, '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}', ''),
(20602919064, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919065, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919066, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919067, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919068, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919069, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919070, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919071, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919072, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919073, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919074, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919075, NULL, 0, 1, '0', '{\"customer_info\":null}', '0'),
(20602919076, NULL, 1, 1, '0', '{\"customer_info\":{\"documentos\":[{\"documento\":\"DNI\",\"nro\":\"132\"},{},{}],\"pasaportes\":[{},{},{}],\"direcciones\":[{}],\"tarjetas\":[{}],\"generales\":[{}],\"empresa\":[{}],\"contactar\":[{}],\"pasajeros\":[{}],\"emails\":[{}],\"celulares\":[{\"tipo_contacto\":\"CELULAR PERSONAL\"},{}],\"familiares\":[{}],\"visado\":[{}],\"asiento\":[{}]}}', '0'),
(20602919077, NULL, 1, 1, '0', '{\"customer_info\":{\"documentos\":[{\"documento\":\"DNI\",\"nro\":\"132\"},{},{}],\"pasaportes\":[{},{},{}],\"direcciones\":[{}],\"tarjetas\":[{}],\"generales\":[{}],\"empresa\":[{}],\"contactar\":[{}],\"pasajeros\":[{}],\"emails\":[{}],\"celulares\":[{\"tipo_contacto\":\"CELULAR PERSONAL\"},{}],\"familiares\":[{}],\"visado\":[{}],\"asiento\":[{}]}}', '0'),
(20602919078, NULL, 1, 1, '0', '{\"customer_info\":{\"documentos\":[{\"documento\":\"DNI\",\"nro\":\"132\"},{},{}],\"pasaportes\":[{},{},{}],\"direcciones\":[{}],\"tarjetas\":[{}],\"generales\":[{}],\"empresa\":[{}],\"contactar\":[{}],\"pasajeros\":[{}],\"emails\":[{}],\"celulares\":[{\"tipo_contacto\":\"CELULAR PERSONAL\"},{}],\"familiares\":[{}],\"visado\":[{}],\"asiento\":[{}]}}', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_customer_travel`
--

CREATE TABLE `ospos_customer_travel` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `data` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type_state_travel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_design`
--

CREATE TABLE `ospos_design` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_design`
--

INSERT INTO `ospos_design` (`id`, `name`, `description`, `price`, `state`, `created_at`, `stock`) VALUES
(1, 'prueba', 'prueba', '223.50', 1, '2017-06-18', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_employees`
--

CREATE TABLE `ospos_employees` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `person_id` bigint(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_employees`
--

INSERT INTO `ospos_employees` (`username`, `password`, `person_id`, `deleted`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
('henry@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 20602919058, 0),
('johanC', 'e10adc3949ba59abbe56e057f20f883e', 87654324, 0),
('Nelson', '81dc9bdb52d04dc20036dbd8313ed055', 2, 0),
('Nelson1', '81dc9bdb52d04dc20036dbd8313ed055', 22, 0),
('turifax', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_factura`
--

CREATE TABLE `ospos_factura` (
  `id` int(11) NOT NULL,
  `cotizacion_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT '1',
  `tip_doc_rct` int(2) NOT NULL,
  `num_doc_rct` int(11) NOT NULL,
  `dir_des_rct` text NOT NULL,
  `num_corre_cpe_ref` text NOT NULL,
  `fec_doc_ref` date NOT NULL,
  `cod_tip_otr_doc_ref` text NOT NULL,
  `cod_tip_moneda` text NOT NULL,
  `mnt_tot_imp` decimal(12,2) DEFAULT NULL,
  `mnt_tot_grv` decimal(12,2) DEFAULT NULL,
  `mnt_tot_inf` decimal(12,2) DEFAULT NULL,
  `mnt_tot_exr` decimal(12,2) DEFAULT NULL,
  `mnt_tot_grt` decimal(12,2) DEFAULT NULL,
  `mnt_tot_exp` decimal(12,2) DEFAULT NULL,
  `mnt_tot_isc` decimal(12,2) DEFAULT NULL,
  `mnt_tot_trb_igv` decimal(12,2) DEFAULT NULL,
  `mnt_tot_trb_isc` decimal(12,2) DEFAULT NULL,
  `mnt_tot_trb_otr` decimal(12,2) DEFAULT NULL,
  `mnt_tot_val_vta` decimal(12,2) DEFAULT NULL,
  `mnt_tot_prc_vta` decimal(12,2) DEFAULT NULL,
  `mnt_tot_dct` decimal(12,2) DEFAULT NULL,
  `mnt_tot_otr_cgo` decimal(12,2) DEFAULT NULL,
  `mnt_tot` decimal(12,2) DEFAULT NULL,
  `mnt_tot_antcp` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_factura`
--

INSERT INTO `ospos_factura` (`id`, `cotizacion_id`, `name`, `tip_doc_rct`, `num_doc_rct`, `dir_des_rct`, `num_corre_cpe_ref`, `fec_doc_ref`, `cod_tip_otr_doc_ref`, `cod_tip_moneda`, `mnt_tot_imp`, `mnt_tot_grv`, `mnt_tot_inf`, `mnt_tot_exr`, `mnt_tot_grt`, `mnt_tot_exp`, `mnt_tot_isc`, `mnt_tot_trb_igv`, `mnt_tot_trb_isc`, `mnt_tot_trb_otr`, `mnt_tot_val_vta`, `mnt_tot_prc_vta`, `mnt_tot_dct`, `mnt_tot_otr_cgo`, `mnt_tot`, `mnt_tot_antcp`) VALUES
(39, 'TURIFAX-BSNF-0208', 'PATRICIA MARIA SAN MARTIN GANDOLFO', 0, 122344, '87687', '0', '2018-08-02', '02', 'PEN', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_gallery`
--

CREATE TABLE `ospos_gallery` (
  `gallery_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ospos_gallery';

--
-- Volcado de datos para la tabla `ospos_gallery`
--

INSERT INTO `ospos_gallery` (`gallery_id`, `title`, `url`, `status`) VALUES
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1),
(NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_giftcards`
--

CREATE TABLE `ospos_giftcards` (
  `giftcard_id` int(11) NOT NULL,
  `giftcard_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `person_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_inventory`
--

CREATE TABLE `ospos_inventory` (
  `trans_id` int(11) NOT NULL,
  `trans_items` int(11) NOT NULL DEFAULT '0',
  `trans_user` bigint(11) NOT NULL DEFAULT '0',
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_comment` text NOT NULL,
  `trans_inventory` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_inventory`
--

INSERT INTO `ospos_inventory` (`trans_id`, `trans_items`, `trans_user`, `trans_date`, `trans_comment`, `trans_inventory`) VALUES
(1, 1, 1, '2014-08-14 19:45:13', 'Edición Manual de Cantidad', 10),
(2, 1, 1, '2014-08-14 19:46:08', 'POS 1', -1),
(3, 2, 1, '2014-08-15 09:50:24', 'Qty CSV Imported', 10),
(4, 3, 1, '2014-08-15 09:50:24', 'Qty CSV Imported', 10),
(5, 4, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(6, 5, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(7, 6, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(8, 7, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(9, 8, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(10, 9, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(11, 10, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(12, 11, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(13, 12, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(14, 13, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(15, 14, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(16, 15, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(17, 16, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(18, 17, 1, '2014-08-15 09:50:25', 'Qty CSV Imported', 10),
(19, 18, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(20, 19, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(21, 20, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(22, 21, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(23, 22, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(24, 23, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(25, 24, 1, '2014-08-15 09:50:26', 'Qty CSV Imported', 10),
(26, 3, 1, '2014-08-15 09:52:34', 'POS 2', -5),
(27, 7, 1, '2014-08-15 09:52:34', 'POS 2', -1),
(28, 1, 1, '2014-08-18 09:08:16', 'Edición Manual de Cantidad', -7),
(29, 1, 1, '2014-08-18 09:08:44', 'Edición Manual de Cantidad', 8),
(30, 1, 1, '2014-08-18 09:09:08', 'Edición Manual de Cantidad', -5),
(31, 25, 1, '2014-08-18 09:13:25', 'Qty CSV Imported', 10),
(32, 26, 1, '2014-08-18 09:13:25', 'Qty CSV Imported', 10),
(33, 27, 1, '2014-08-18 09:13:25', 'Qty CSV Imported', 10),
(34, 28, 1, '2014-08-18 09:13:25', 'Qty CSV Imported', 10),
(35, 29, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(36, 30, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(37, 31, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(38, 32, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(39, 33, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(40, 34, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(41, 35, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(42, 36, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(43, 37, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(44, 38, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(45, 39, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(46, 40, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(47, 41, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(48, 42, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(49, 43, 1, '2014-08-18 09:13:26', 'Qty CSV Imported', 10),
(50, 25, 1, '2014-08-18 09:14:53', 'Edición Manual de Cantidad', 0),
(51, 25, 1, '2014-08-18 09:15:14', 'Edición Manual de Cantidad', -9),
(52, 3, 1, '2014-08-18 09:22:57', 'POS 3', -5),
(53, 8, 1, '2014-08-18 09:22:57', 'POS 3', -2),
(54, 29, 1, '2014-08-18 09:23:40', 'POS 4', -1),
(55, 33, 1, '2014-08-18 09:24:31', 'POS 5', -1),
(56, 26, 1, '2014-08-18 09:27:46', 'POS 6', -1),
(57, 32, 1, '2014-08-18 09:27:46', 'POS 6', -2),
(58, 30, 1, '2014-08-18 09:33:14', 'POS 7', -1),
(59, 28, 1, '2014-12-04 08:45:07', 'POS 8', -1),
(60, 25, 1, '2016-07-29 12:29:14', 'Edición Manual de Cantidad', 0),
(61, 26, 1, '2016-07-29 12:36:20', 'Edición Manual de Cantidad', 0),
(62, 25, 1, '2016-07-29 14:42:01', 'Edición Manual de Cantidad', 0),
(63, 44, 1, '2016-07-29 14:43:48', 'Edición Manual de Cantidad', 10),
(64, 45, 1, '2016-07-29 14:44:28', 'Edición Manual de Cantidad', 20),
(65, 44, 1, '2016-07-29 14:55:11', 'RECV 1', 20),
(66, 44, 1, '2016-07-29 14:56:52', 'POS 9', -3),
(67, 44, 87654324, '2017-01-08 15:49:35', 'Error de inventario', 20),
(68, 44, 87654324, '2017-01-08 15:49:39', 'Error de inventario', 20),
(69, 44, 87654324, '2017-01-08 15:49:58', 'Error', -20),
(70, 44, 87654324, '2017-01-08 15:50:14', 'Error', -20),
(71, 44, 87654324, '2017-01-08 16:04:14', 'Error', 1),
(72, 44, 87654324, '2017-01-08 16:04:22', 'Edición Manual de Cantidad', 0),
(73, 46, 1, '2017-01-17 22:21:38', 'Edición Manual de Cantidad', 50),
(74, 46, 1, '2017-01-17 22:23:08', 'Edición Manual de Cantidad', 0),
(75, 27, 1, '2017-02-02 10:12:50', 'POS 10', -1),
(76, 47, 1, '2017-04-13 16:19:34', 'Edición Manual de Cantidad', 12),
(77, 48, 1, '2017-04-13 17:04:36', 'Edición Manual de Cantidad', 12),
(78, 49, 1, '2017-04-13 17:12:16', 'Edición Manual de Cantidad', 23),
(79, 50, 1, '2017-04-13 17:22:40', 'Edición Manual de Cantidad', 23),
(80, 50, 1, '2017-04-13 17:28:30', 'POS 11', -2),
(81, 49, 1, '2017-04-13 17:30:35', 'POS 12', -1),
(82, 46, 1, '2017-04-14 17:18:33', '', 0),
(83, 29, 1, '2017-04-14 17:18:42', '', 0),
(84, 27, 1, '2017-04-14 17:22:18', 'ASSSSSSSSSSSSSSS', 23),
(85, 47, 1, '2017-04-14 17:23:47', 'ssssssssssssss', 343),
(86, 27, 1, '2017-04-14 17:24:46', 'SAAAAAAAAA', 23),
(87, 46, 1, '2017-04-14 17:25:06', 'ASSSSSS', 20),
(88, 46, 1, '2017-04-14 17:26:27', '2', 2),
(89, 46, 1, '2017-04-14 17:28:56', '2', 2),
(90, 46, 1, '2017-04-14 17:29:25', '2', 2),
(91, 51, 1, '2017-04-14 17:40:26', 'Edición Manual de Cantidad', 23),
(92, 52, 1, '2017-04-14 17:42:09', 'Edición Manual de Cantidad', 23),
(93, 46, 1, '2017-04-14 17:46:54', 'Edición Manual de Cantidad', 0),
(94, 28, 1, '2017-04-14 17:48:19', 'Edición Manual de Cantidad', 0),
(95, 54, 1, '2017-08-19 13:39:34', 'Edición Manual de Cantidad', 12),
(96, 57, 1, '2017-08-19 13:43:17', 'Edición Manual de Cantidad', 12),
(97, 60, 1, '2017-08-19 13:51:29', 'Edición Manual de Cantidad', 23),
(98, 48, 1, '2017-08-19 13:56:33', 'RECV 2', 12),
(99, 51, 87654324, '2017-08-19 16:58:55', 'Edición Manual de Cantidad', 0),
(100, 61, 1, '2018-01-24 23:31:24', 'Edición Manual de Cantidad', 12),
(101, 61, 1, '2018-01-24 23:51:00', 'Edición Manual de Cantidad', 0),
(102, 62, 1, '2018-02-11 20:16:47', 'Edición Manual de Cantidad', 12),
(103, 73, 1, '2018-03-31 11:09:09', 'Edición Manual de Cantidad', 10),
(104, 73, 1, '2018-03-31 11:12:39', 'POS 13', -1),
(105, 73, 1, '2018-03-31 11:17:28', 'POS 14', -2),
(106, 73, 1, '2018-03-31 11:21:45', 'POS 15', -1),
(107, 73, 1, '2018-03-31 20:47:32', 'POS 16', -1),
(108, 73, 1, '2018-03-31 20:50:12', 'POS 17', -2),
(109, 73, 1, '2018-03-31 20:55:39', 'POS 18', -1),
(110, 73, 1, '2018-03-31 20:56:13', 'POS 19', -1),
(111, 73, 1, '2018-03-31 20:56:41', 'POS 20', -1),
(112, 73, 1, '2018-03-31 20:57:52', 'Edición Manual de Cantidad', 30),
(113, 73, 1, '2018-03-31 20:58:15', 'POS 21', -1),
(114, 73, 1, '2018-03-31 20:59:29', 'POS 22', -1),
(115, 73, 1, '2018-03-31 21:02:07', 'POS 23', -10),
(116, 73, 1, '2018-03-31 21:10:44', 'POS 24', 1),
(117, 73, 1, '2018-04-06 10:54:03', 'POS 25', -1),
(118, 73, 1, '2018-04-06 10:54:41', 'POS 26', -1),
(119, 73, 1, '2018-04-06 10:55:15', 'Edición Manual de Cantidad', 2),
(120, 73, 1, '2018-04-24 21:19:22', 'POS 27', -1),
(121, 73, 1, '2018-05-08 00:58:09', 'POS 28', -1),
(122, 73, 20602919058, '2018-05-11 23:15:24', 'POS 29', -2),
(123, 73, 1, '2018-05-12 16:43:30', 'POS 30', -1),
(124, 73, 20602919058, '2018-05-16 22:54:31', 'POS 31', -5),
(125, 29, 20602919058, '2018-05-16 22:54:31', 'POS 31', -1),
(126, 30, 20602919058, '2018-05-16 22:54:31', 'POS 31', -1),
(127, 49, 20602919058, '2018-05-16 22:54:31', 'POS 31', -25),
(128, 50, 20602919058, '2018-05-16 22:54:31', 'POS 31', -25),
(129, 44, 20602919058, '2018-05-16 22:54:31', 'POS 31', -1),
(130, 73, 20602919058, '2018-05-17 00:52:09', 'POS 32', -2),
(131, 73, 1, '2018-07-05 20:33:12', 'POS 33', -2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_items`
--

CREATE TABLE `ospos_items` (
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `supplier_id` bigint(11) DEFAULT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost_price` decimal(15,2) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '0.00',
  `reorder_level` decimal(15,2) NOT NULL DEFAULT '0.00',
  `location` varchar(255) DEFAULT NULL,
  `item_id` int(10) NOT NULL,
  `allow_alt_description` tinyint(1) NOT NULL,
  `is_serialized` tinyint(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `custom1` varchar(25) NOT NULL,
  `custom2` varchar(25) NOT NULL,
  `custom3` varchar(25) NOT NULL,
  `custom4` varchar(25) NOT NULL,
  `custom5` varchar(25) NOT NULL,
  `custom6` varchar(25) NOT NULL,
  `custom7` varchar(25) NOT NULL,
  `custom8` varchar(25) NOT NULL,
  `custom9` varchar(25) NOT NULL,
  `custom10` varchar(25) NOT NULL,
  `data_items` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_items`
--

INSERT INTO `ospos_items` (`name`, `category`, `supplier_id`, `item_number`, `description`, `cost_price`, `unit_price`, `quantity`, `reorder_level`, `location`, `item_id`, `allow_alt_description`, `is_serialized`, `deleted`, `custom1`, `custom2`, `custom3`, `custom4`, `custom5`, `custom6`, `custom7`, `custom8`, `custom9`, `custom10`, `data_items`) VALUES
('Articulo 01', 'Golosinas', NULL, NULL, '', '20.00', '20.00', '5.00', '2.00', '', 1, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('Producto 01', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 2, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 02', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '0.00', '0.00', '', 3, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 03', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 4, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 04', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 5, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 05', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 6, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 06', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '9.00', '0.00', '', 7, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 07', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '8.00', '0.00', '', 8, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 08', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 9, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 09', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 10, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 10', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 11, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 11', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 12, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 12', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 13, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 13', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 14, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 14', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 15, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 15', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 16, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 16', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 17, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 17', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 18, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 18', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 19, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 19', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 20, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 20', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 21, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 21', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 22, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 22', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 23, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 23', 'Golosinas', NULL, NULL, '', '10.00', '12.00', '10.00', '0.00', '', 24, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto_01', 'Golosinas', NULL, 'Producto_01', 'Producto_01', '10.00', '12.00', '1.00', '2.00', '2', 25, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('Producto_02', 'Golosinas', NULL, 'Producto_02', 'Producto_02', '10.00', '12.00', '9.00', '2.00', 'Producto_02', 26, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('Producto 03', 'Golosinas', NULL, 'p-003', '', '10.00', '12.00', '55.00', '2.00', '', 27, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 04', 'Golosinas', 87654323, 'p-004', 'ASSSSSSSSSSS', '10.00', '12.00', '9.00', '2.00', '3', 28, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('Producto 05', 'Golosinas', NULL, 'p-005', '', '10.00', '12.00', '8.00', '2.00', '', 29, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 06', 'Golosinas', NULL, 'p-006', '', '10.00', '12.00', '8.00', '2.00', '', 30, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 07', 'Golosinas', NULL, 'p-007', '', '10.00', '12.00', '10.00', '2.00', '', 31, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 08', 'Golosinas', NULL, 'p-008', '', '10.00', '12.00', '8.00', '2.00', '', 32, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 09', 'Golosinas', NULL, 'p-009', '', '10.00', '12.00', '9.00', '2.00', '', 33, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 10', 'Golosinas', NULL, 'p-010', '', '10.00', '12.00', '10.00', '2.00', '', 34, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 11', 'Golosinas', NULL, 'p-011', '', '10.00', '12.00', '10.00', '2.00', '', 35, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 12', 'Golosinas', NULL, 'p-012', '', '10.00', '12.00', '10.00', '2.00', '', 36, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 13', 'Golosinas', NULL, 'p-013', '', '10.00', '12.00', '10.00', '2.00', '', 37, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 14', 'Golosinas', NULL, 'p-014', '', '10.00', '12.00', '10.00', '2.00', '', 38, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 15', 'Golosinas', NULL, 'p-015', '', '10.00', '12.00', '10.00', '2.00', '', 39, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 16', 'Golosinas', NULL, 'p-016', '', '10.00', '12.00', '10.00', '2.00', '', 40, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 17', 'Golosinas', NULL, 'p-017', '', '10.00', '12.00', '10.00', '2.00', '', 41, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 18', 'Golosinas', NULL, 'p-018', '', '10.00', '12.00', '10.00', '2.00', '', 42, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('Producto 19', 'Golosinas', NULL, 'p-019', '', '10.00', '12.00', '10.00', '2.00', '', 43, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', NULL),
('CARTELES', 'CARTELES', NULL, 'CARTELES', 'CARTELES', '200.00', '250.00', '27.00', '2.00', '3', 44, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('PRUEBA', 'PRUEBA', NULL, 'PRUEBA', 'PRUEBA', '10.00', '15.00', '20.00', '2.00', '1', 45, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('PAPELES LA ROSA', 'CARTELES', 87654323, '23', 'Papeles la Rosa', '23.00', '0.50', '76.00', '10.00', '3', 46, 1, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('ASASA', 'ZAPATILLAS', 87654322, 'QWQW', 'ZAPATILLAS JANOSKI', '12.00', '12.00', '355.00', '23.00', '3', 47, 1, 1, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('ZAPATILLAS NIKE', 'ZAPATILLAS', 87654322, 'ZAP-NIKE', 'asaas', '23.00', '250.00', '24.00', '121.00', 'asasa', 48, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('DC WES KREMER', 'ZAPATILLAS', 87654322, 'ZAP-DC', 'aaaaaaaaaaa', '200.00', '250.00', '-3.00', '2.00', '3', 49, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('CONVERSE', 'ZAPATILLAS', 87654322, 'ZAP-CONVERSE', 'qqqqqqqqqqqq', '200.00', '250.00', '-4.00', '2.00', '2', 50, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('AAAAAAAAAAAA', 'ZAPATILLAS', 87654322, 'p-0001221', 'ASSSSSSS', '200.00', '250.00', '23.00', '2.00', '3', 51, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('AQUI NOMAS', 'ZAPATILLAS', 87654322, 'P-002323332', 'AQUI NOMAS', '200.00', '250.00', '23.00', '2.00', '3', 52, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('Carteras', 'accesorios', 87654322, '123456789', 'CARTERA DE MESA', '200.00', '250.00', '12.00', '2.00', '3', 54, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('Carteras', 'accesorios', 87654322, '1234567891234567', 'CARTERA DE MESA', '200.00', '250.00', '12.00', '2.00', '3', 57, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('DC WES KREMER', 'ZAPATILLAS', 87654323, NULL, '1111111111111111111111111111', '200.00', '250.00', '23.00', '2.00', '3', 60, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL),
('LAPICES', 'LAPICES', NULL, '123455555', 'LAPICES', '23.00', '25.00', '12.00', '10.00', 'LAPICES', 61, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '[{\"idObj\":\"cbo_property_1\",\"id\":\"3\",\"name\":\"pijama 2\",\"type\":\"select\",\"parent\":1}]'),
('TEST_ITEM', 'CARTELES', NULL, '12345678', 'TEST_ITEM', '12.00', '12.00', '12.00', '12.00', 'TEST_ITEM', 62, 0, 0, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '[{\"idObj\":\"cbo_property_1\",\"id\":\"2\",\"name\":\"Talla S\",\"type\":\"select\",\"parent\":1}]'),
('PIJAMAS', 'PIJAMAS', NULL, '123456', '', '22.00', '34.00', '5.00', '2.00', 'GAMARRA1', 73, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_items_gallery`
--

CREATE TABLE `ospos_items_gallery` (
  `item_id` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `creafecha` datetime DEFAULT NULL,
  `creapor` varchar(20) DEFAULT NULL,
  `modifecha` datetime DEFAULT NULL,
  `modipor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ospos_items_gallery';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_items_taxes`
--

CREATE TABLE `ospos_items_taxes` (
  `item_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_items_taxes`
--

INSERT INTO `ospos_items_taxes` (`item_id`, `name`, `percent`) VALUES
(25, 'Impuesto de Ventas 1', '0.00'),
(25, 'Impuesto de Ventas 2', '0.00'),
(26, 'Impuesto de Ventas 1', '0.00'),
(26, 'Impuesto de Ventas 2', '0.00'),
(28, 'Impuesto de Ventas 1', '0.00'),
(28, 'Impuesto de Ventas 2', '0.00'),
(44, 'Impuesto de Ventas 1', '0.00'),
(44, 'Impuesto de Ventas 2', '0.00'),
(45, 'Impuesto de Ventas 1', '0.00'),
(45, 'Impuesto de Ventas 2', '0.00'),
(46, 'Impuesto de Ventas 1', '0.00'),
(46, 'Impuesto de Ventas 2', '0.00'),
(47, 'Impuesto de Ventas 1', '1.00'),
(47, 'Impuesto de Ventas 2', '2.00'),
(48, 'Impuesto de Ventas 1', '0.00'),
(48, 'Impuesto de Ventas 2', '0.00'),
(49, 'Impuesto de Ventas 1', '0.00'),
(49, 'Impuesto de Ventas 2', '0.00'),
(50, 'Impuesto de Ventas 1', '0.00'),
(50, 'Impuesto de Ventas 2', '0.00'),
(52, 'Impuesto de Ventas 1', '0.00'),
(52, 'Impuesto de Ventas 2', '0.00'),
(62, 'Impuesto de Ventas 1', '12.00'),
(62, 'Impuesto de Ventas 2', '0.00'),
(73, 'Impuesto de Ventas 1', '0.00'),
(73, 'Impuesto de Ventas 2', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_item_kits`
--

CREATE TABLE `ospos_item_kits` (
  `item_kit_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_item_kits`
--

INSERT INTO `ospos_item_kits` (`item_kit_id`, `name`, `description`) VALUES
(1, 'ZAPATILLAs', 'PROMOCIÓN DE ZAPATILLAS'),
(2, 'CARTELES', 'CARTELES'),
(5, 'CONVERSE', 'CONVERSE'),
(6, 'PAPELES DE MUESTRA', 'PAPELES DE MUESTRA'),
(7, 'CONVERSE', 'sdddddddddddd'),
(13, 'WES KREMER', 'WES KREMER'),
(16, 'ZAPATILLAS CONVERSE', 'ZAPATILLAS CONVERSE'),
(17, 'DULCES DE MESA', 'DULCES DE MESA'),
(18, 'DULCES DE MESA', 'DULCES DE MESA'),
(29, 'ZAPATILLAS', 'PROMOCION DE ZAPATILLAS'),
(30, 'sdasas', 'qeqqqqqe'),
(31, 'bbb', 'bbbbbbb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_item_kit_items`
--

CREATE TABLE `ospos_item_kit_items` (
  `item_kit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_item_kit_items`
--

INSERT INTO `ospos_item_kit_items` (`item_kit_id`, `item_id`, `quantity`) VALUES
(17, 29, '1.00'),
(18, 29, '1.00'),
(16, 30, '1.00'),
(17, 30, '1.00'),
(18, 30, '1.00'),
(2, 44, '1.00'),
(6, 46, '1.00'),
(29, 48, '1.00'),
(1, 49, '25.00'),
(13, 49, '1.00'),
(29, 49, '1.00'),
(1, 50, '25.00'),
(5, 50, '2.00'),
(7, 50, '1.00'),
(29, 50, '1.00'),
(30, 51, '1.00'),
(31, 52, '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_modules`
--

CREATE TABLE `ospos_modules` (
  `name_lang_key` varchar(255) NOT NULL,
  `desc_lang_key` varchar(255) NOT NULL,
  `sort` int(10) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `decription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_modules`
--

INSERT INTO `ospos_modules` (`name_lang_key`, `desc_lang_key`, `sort`, `module_id`, `name`, `decription`) VALUES
('module_cobrar', 'modulo cobrar', 130, 'cobrar', 'Cobrar', 'Cuentas por cobrar'),
('module_config', 'module_config_desc', 100, 'config', 'Configuración', 'Cambiar la configuración de la tienda'),
('module_customers', 'module_customers_desc', 10, 'customers', 'Clientes', 'Agregar, Actualizar, Borrar y Buscar clientes'),
('module_design', 'module_design_desc', 110, 'designs', 'Diseño', 'Agregar, Actualizar diseños'),
('module_employees', 'module_employees_desc', 80, 'employees', 'Empleados', 'Agregar, Actualizar, Borrar y Buscar empleados'),
('module_giftcards', 'module_giftcards_desc', 90, 'giftcards', 'Tarjetas de Regalo', 'Agregar, Actualizar, Borrar y Buscar Tarjetas de Regalo'),
('module_items', 'module_items_desc', 20, 'items', 'Artículos', 'Agregar, Actualizar, Borrar y Buscar artículos'),
('module_item_kits', 'module_item_kits_desc', 30, 'item_kits', 'Kits de Artículos', 'Agregar, Actualizar, Borrar y Buscar Kits de Artículos'),
('module_receivings', 'module_receivings_desc', 60, 'receivings', 'Compras', 'Procesar órdenes de compra'),
('module_reports', 'module_reports_desc', 150, 'reports', 'Reportes', 'Ver y generar reportes'),
('module_sales', 'module_sales_desc', 120, 'sales', 'Ventas', 'Procesar ventas y devoluciones'),
('module_suppliers', 'module_suppliers_desc', 40, 'suppliers', 'Proveedores', 'Agregar, Actualizar, Borrar y Buscar proveedores'),
('module_travel', 'module_travel_desc', 70, 'travel', 'Cotizacion', 'Generar Viajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_pago`
--

CREATE TABLE `ospos_pago` (
  `id` int(11) NOT NULL,
  `cotizacion_id` varchar(255) DEFAULT NULL,
  `num_corre_cpe_ref` text NOT NULL,
  `fec_doc_ref` date NOT NULL,
  `cod_tip_otr_doc_ref` int(2) NOT NULL,
  `cod_tip_moneda` text NOT NULL,
  `form_pago` varchar(25) DEFAULT NULL,
  `tipo_pago` varchar(25) DEFAULT NULL,
  `banco_pago` varchar(25) DEFAULT NULL,
  `nro_pago` varchar(25) DEFAULT NULL,
  `mnt_tot_pago` decimal(12,2) DEFAULT NULL,
  `mnt_tot` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_pago`
--

INSERT INTO `ospos_pago` (`id`, `cotizacion_id`, `num_corre_cpe_ref`, `fec_doc_ref`, `cod_tip_otr_doc_ref`, `cod_tip_moneda`, `form_pago`, `tipo_pago`, `banco_pago`, `nro_pago`, `mnt_tot_pago`, `mnt_tot`) VALUES
(9, 'NELSON-CKCZ-2807', '0', '2018-07-28', 2, 'PEN', '0', '755675', '675', '675', '77878.00', '0.00'),
(10, 'TURIFAX-9VGM-2807', '0', '2018-07-28', 8, 'PEN', '0', '767', '68', '76', '86.00', '0.00'),
(11, 'TURIFAX-6VHK-3007', '0', '2018-07-30', 1, 'PEN', '0', '56465', '4654', '564', '654.00', '0.00'),
(12, 'TURIFAX-IVN-3107', '0', '2018-07-31', 2, 'USD', '0', '68', '76', '78', '6.00', '0.00'),
(13, 'TURIFAX-BSNF-0208', '0', '2018-08-02', 2, 'PEN', '0', '657', '65', '765', '765.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_payment`
--

CREATE TABLE `ospos_payment` (
  `id` int(11) NOT NULL,
  `igv` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `dscto` decimal(10,0) NOT NULL,
  `dscto_type_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_payment`
--

INSERT INTO `ospos_payment` (`id`, `igv`, `total`, `subtotal`, `dscto`, `dscto_type_id`, `payment_type_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '0', '100', '100', '0', 21, 24, '2018-04-12 02:46:21', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_payment_detail`
--

CREATE TABLE `ospos_payment_detail` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_people`
--

CREATE TABLE `ospos_people` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comments` text,
  `person_id` bigint(11) NOT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `type_person_id` varchar(255) DEFAULT NULL,
  `num_passport` varchar(255) DEFAULT NULL,
  `has_passport` varchar(255) DEFAULT NULL,
  `date_passport` date DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_people`
--

INSERT INTO `ospos_people` (`first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `comments`, `person_id`, `birthplace`, `birthdate`, `type_person_id`, `num_passport`, `has_passport`, `date_passport`, `nationality`) VALUES
('Julio Cesar', 'Llavilla', '943973537', 'llavillaccama@gmail.com', 'Lima - Peru', '0', '0', '0', '0', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Nelson', 'Perez', '1234', 'ineyet@gmail.com', 'lima', 'lima', 'lima', 'lima', '1010', 'peru', 'ninguno', 2, 'prueba', '2018-07-09', '2', '1', '1', '2018-07-16', '1'),
('Nelson', 'Perez', '1234', 'ineyet@gmail.com', 'lima', 'lima', 'lima', 'lima', '1010', 'peru', 'ninguno', 22, 'prueba', '2018-07-09', '2', '1', '1', '2018-07-16', '1'),
('JOHAN ANTONIO', 'CAÑARI HUAMANI', '5709327', 'johins2x@gmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO CLIENTE', 12345678, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('BORRAR', 'BORRAR', '1234567', 'BORRAR', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO CLIENTE', 43215678, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('LIZBETH', 'ALCANTARA', '998148330', 'vacaciones@turifax.com', 'caminos del inca 257 of 306', NULL, NULL, NULL, NULL, NULL, '', 45222323, 'lima', '1988-02-08', '01', '12345678', '1', NULL, 'Peruana'),
('YMPERIUM', ' SUMMA SAC', '965460062', 'CHIPANA.LEON@GMAIL.COM', 'JR. LIZARDO MONTERO 1423', NULL, NULL, NULL, NULL, NULL, '', 45961280, '', '2018-02-16', '08', '', '0', NULL, 'PERUANO'),
('aadsasddas', 'sddsdads', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', '', '', '', '', '', '', 48227010, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Johan Antonio', 'Cañari Huamani', '', 'johanc.cca@gmail.com', '', '', '', '', '01', '', '', 48227019, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JUAN CARLOS', 'REYES REYES', '', 'pelotero_tz89@hotmail.com', '', '', '', '', '01', '', '', 48227020, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('piero', 'collao', '123123', 'piero@asdasd.com', '', NULL, NULL, NULL, NULL, NULL, '', 71479309, 'asdasd', '2018-03-24', '01', '123123', '0', NULL, 'asd'),
('JOEL YENER', 'ESPINOZA HUAMANI', '1234567', 'canari_343@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', '', '', 'PERU', 'NUEVO CLIENTE', 87654321, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN ANTONIO', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO PROVEEDORR', 87654322, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOEL YENER', 'ESPINOZA HUAMANI', '1234567', 'johins2x@gmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO PROVEEDOR', 87654323, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO EMPLEADO', 87654324, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', '', '', 87654325, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', 'qwq', 'PERU', 'wqed1', 87654326, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', '', '', '', '', '', '', 'asddddddddddddddddd', 87654343, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', '', '', '', '', '', '', 'weeeeeeeeeeeeeeeeee', 87654344, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', '', '', '', '', '', '', 'qwwwwwwwwwwwwww', 87654345, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 87654346, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ssssss', 'sssssss', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', '', '', '', '', '', '', 87654347, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('alexanderc', 'aguilar', '', 'pcollao@ysumma.com', '', NULL, NULL, NULL, NULL, NULL, '', 1234567891, '', '2018-04-04', '01', '2134t5yuio89', '1', NULL, ''),
('turifax', 'sac1', '1234567', 'turifax@gmail.com', 'AV. CAMINOS DEL INCA NRO. 257 INT. 306 (C.C. CAMINOS DEL INCA 2DA. ETAPA) LIMA - LIMA - SANTIAGO DE SURCO', '0', '0', '0', '0', 'Perú', '', 2147483647, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('SFD', 'sd', '', 'sdfsdf@asasd.com', '', NULL, NULL, NULL, NULL, NULL, '', 10714793092, '', '2018-04-27', '01', '', '0', NULL, ''),
('piero', 'aguilar', '', 'asdasd@asdasd.com', '', NULL, NULL, NULL, NULL, NULL, '', 10714793093, '', '2018-04-21', '01', '', '0', NULL, ''),
('YMPERIUM', 'SUMMA SAC', '965460062', 'LCHIPANA@YSUMMA.COM', 'JR. LIZARDO MONTERO 1423', NULL, NULL, NULL, NULL, NULL, '', 20602919057, '', '2018-02-16', '08', '', '0', NULL, ''),
('Henry', 'Cubicus', '96325874', 'henry@gmail.com', 'VMT', 'VMT', 'Lima', 'peru', '02', 'peru', '', 20602919058, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Piero', 'Collao', '987654', '0', 'direccion 1', NULL, NULL, NULL, NULL, NULL, '0', 20602919064, '0', NULL, '0', '0', '0', NULL, '0'),
('sysve', 'sistema', '0', '0', 'direccion 2', NULL, NULL, NULL, NULL, NULL, '0', 20602919065, '0', NULL, '0', '0', '0', NULL, '0'),
('asdasd', 'asdasd', '0', '0', 'asdasd', NULL, NULL, NULL, NULL, NULL, '0', 20602919066, '0', NULL, '0', '0', '0', NULL, '0'),
('asdasd', 'asdasd', '0', '0', 'asdasd', NULL, NULL, NULL, NULL, NULL, '0', 20602919067, '0', NULL, '0', '0', '0', NULL, '0'),
('asdasd', 'asdasd', '0', '0', 'asdasd', NULL, NULL, NULL, NULL, NULL, '0', 20602919068, '0', NULL, '0', '0', '0', NULL, '0'),
('asdasd', 'asdasd', '0', '0', 'asdasd', NULL, NULL, NULL, NULL, NULL, '0', 20602919069, '0', NULL, '0', '0', '0', NULL, '0'),
('tgh', 'dfgdfg', '0', '0', 'direccion 1', NULL, NULL, NULL, NULL, NULL, '0', 20602919070, '0', NULL, '0', '0', '0', NULL, '0'),
('luis ', 'chipana', '0', '0', '', NULL, NULL, NULL, NULL, NULL, '0', 20602919071, '0', NULL, '0', '0', '0', NULL, '0'),
('Patricia', 'San Martin', '0', '0', 'Av Caminos del inca 257 of 306 . Surco', NULL, NULL, NULL, NULL, NULL, '0', 20602919072, '0', NULL, '0', '0', '0', NULL, '0'),
('', '', '0', '0', '', NULL, NULL, NULL, NULL, NULL, '0', 20602919073, '0', NULL, '0', '0', '0', NULL, '0'),
('', '', '0', '0', '', NULL, NULL, NULL, NULL, NULL, '0', 20602919074, '0', NULL, '0', '0', '0', NULL, '0'),
('', '', '0', '0', '', NULL, NULL, NULL, NULL, NULL, '0', 20602919075, '0', NULL, '0', '0', '0', NULL, '0'),
('', '', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '', 20602919076, '', NULL, '0', '0', '0', NULL, ''),
('', '', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '', 20602919077, '', NULL, '0', '0', '0', NULL, ''),
('', '', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '', 20602919078, '', NULL, '0', '0', '0', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_permissions`
--

CREATE TABLE `ospos_permissions` (
  `module_id` varchar(255) NOT NULL,
  `person_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_permissions`
--

INSERT INTO `ospos_permissions` (`module_id`, `person_id`) VALUES
('cobrar', 1),
('config', 1),
('customers', 1),
('employees', 1),
('items', 1),
('item_kits', 1),
('receivings', 1),
('reports', 1),
('sales', 1),
('suppliers', 1),
('travel', 1),
('customers', 2),
('sales', 2),
('travel', 2),
('customers', 22),
('config', 87654324),
('customers', 87654324),
('employees', 87654324),
('items', 87654324),
('receivings', 87654324),
('reports', 87654324),
('sales', 87654324),
('suppliers', 87654324),
('customers', 2147483647),
('reports', 2147483647),
('sales', 2147483647),
('travel', 2147483647),
('items', 20602919058),
('sales', 20602919058),
('suppliers', 20602919058);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_property`
--

CREATE TABLE `ospos_property` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `key` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(200) DEFAULT NULL,
  `module_id` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_property`
--

INSERT INTO `ospos_property` (`id`, `name`, `key`, `description`, `created_at`, `updated_at`, `parent_id`, `type`, `module_id`, `sort`) VALUES
(1, 'Tipos de Tallas', NULL, 'Tipos de Tallas', '2018-01-23', NULL, 0, 'select', 'items', 0),
(2, 'Talla S', 'talla_s', 'Talla S', '2018-01-23', NULL, 1, 'select', 'items', 0),
(3, 'Talla M', 'talla_m', 'Talla M', '2018-01-23', NULL, 1, 'select', 'items', 0),
(4, 'Talla L', 'talla_l', 'Talla L', '2018-01-24', NULL, 1, 'select', 'items', 0),
(5, 'Fecha Expiración', 'fecha_expiracion', 'Fecha Expiración', '2018-02-24', NULL, 0, 'date', 'customer', 2),
(6, 'Pasaporte', 'pasaporte', 'Pasaporte', '2018-02-24', NULL, 0, 'text', 'customer', 1),
(7, 'Boleto Aereo', 'Boleto Aereo', 'Boleto Aereo', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(8, 'Hotel', 'hotel', 'Hotel', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(9, 'Auto', 'auto', 'Auto', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(12, 'Excursiones Adc.', 'Excursiones Adc.', 'Excursiones Adc.', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(13, 'Crucero', 'crucero', 'Crucero', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(14, 'Tkt Tren.', 'Tkt Tren.', 'Tkt Tren.', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(15, 'Entradas', 'entradas', 'Entradas', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(16, 'Vuelo de regreso', 'regreso', 'Vuelo de regreso', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(17, 'Otros Servicios', 'otros Servicios', 'Otros Servicios', '2018-03-11', NULL, 0, 'text', 'travel', 0),
(18, 'Re-Emision', 're-emision', 're-emision', '2018-04-21', '2018-04-21', 0, 'text', 'travel', 0),
(19, 'Tarjeta de Asist.', 'Tarjeta de Asist.', 'Tarjeta de Asist.', NULL, NULL, 0, 'text', 'travel', 0),
(20, 'Re-emisión', 're-emision', 'Re-emisión', NULL, NULL, 0, 'text', 'travel', 0),
(21, 'Anulación', 'anulacion', 'Anulación', NULL, NULL, 0, 'text', 'travel', 0),
(22, 'Rembolso', 'Rembolso', 'Rembolso', NULL, NULL, 0, 'text', 'travel', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_receivings`
--

CREATE TABLE `ospos_receivings` (
  `receiving_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` bigint(11) DEFAULT NULL,
  `employee_id` bigint(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `receiving_id` int(10) NOT NULL,
  `payment_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_receivings`
--

INSERT INTO `ospos_receivings` (`receiving_time`, `supplier_id`, `employee_id`, `comment`, `receiving_id`, `payment_type`) VALUES
('2016-07-29 14:55:11', 87654322, 1, 'COMPRA DE CARTELES', 1, 'Efectivo'),
('2017-08-19 13:56:33', 87654322, 1, 'PAGO POR ARTICULOS DE ZAPATILLAS.', 2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_receivings_items`
--

CREATE TABLE `ospos_receivings_items` (
  `receiving_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL,
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_receivings_items`
--

INSERT INTO `ospos_receivings_items` (`receiving_id`, `item_id`, `description`, `serialnumber`, `line`, `quantity_purchased`, `item_cost_price`, `item_unit_price`, `discount_percent`) VALUES
(1, 44, 'CARTELES', '0', 1, '20.00', '200.00', '200.00', '0.00'),
(2, 48, 'asaas', '0', 1, '12.00', '23.00', '23.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales`
--

CREATE TABLE `ospos_sales` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` bigint(11) DEFAULT NULL,
  `employee_id` bigint(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales`
--

INSERT INTO `ospos_sales` (`sale_time`, `customer_id`, `employee_id`, `comment`, `sale_id`, `payment_type`) VALUES
('2014-08-14 19:46:08', NULL, 1, '', 1, 'Efectivo: $20.00<br />'),
('2014-08-15 09:52:34', NULL, 1, '', 2, 'Efectivo: S/.72.00<br />'),
('2014-08-18 09:22:57', NULL, 1, '0', 3, 'Efectivo: S/.83.76<br />'),
('2014-08-18 09:23:40', NULL, 1, '0', 4, 'Efectivo: S/.0.00<br />'),
('2014-08-18 09:24:31', NULL, 1, '', 5, 'Efectivo: S/.0.00<br />'),
('2014-08-18 09:27:46', NULL, 1, '0', 6, 'Efectivo: S/.36.00<br />'),
('2014-08-18 09:33:13', NULL, 1, '0', 7, 'Efectivo: S/.12.00<br />'),
('2014-12-04 08:45:07', NULL, 1, '0', 8, 'Efectivo: S/.62.00<br />'),
('2016-07-29 14:56:52', 12345678, 1, 'COMPRA DE CARTELES', 9, 'Efectivo: S/.750.00<br />'),
('2017-02-02 10:12:50', 12345678, 1, 'GRACIAS POR SU COMPRA', 10, 'Efectivo: S/.12.00<br />'),
('2017-04-13 17:28:30', NULL, 1, '0', 11, 'Efectivo: S/.500.00<br />'),
('2017-04-13 17:30:35', 87654321, 1, '0', 12, 'Efectivo: S/.100.00<br />Tarjeta de Crédito: S/.150.00<br />'),
('2018-03-31 11:12:39', NULL, 1, '', 13, 'Efectivo: S/.34.00<br />'),
('2018-03-31 11:17:28', 45961280, 1, '0', 14, 'Tarjeta de Débito: S/.34.00<br />Efectivo: S/.34.00<br />'),
('2018-03-31 11:21:45', NULL, 1, '0', 15, 'Efectivo: S/.40.12<br />'),
('2018-03-31 20:47:32', NULL, 1, '0', 16, 'Efectivo: S/.34.00<br />'),
('2018-03-31 20:50:12', NULL, 1, '0', 17, 'Efectivo: S/.114.24<br />'),
('2018-03-31 20:55:39', NULL, 1, '', 18, 'Efectivo: S/.34.00<br />'),
('2018-03-31 20:56:13', NULL, 1, '0', 19, 'Efectivo: S/.34.00<br />'),
('2018-03-31 20:56:41', NULL, 1, '0', 20, 'Efectivo: S/.34.00<br />'),
('2018-03-31 20:58:15', NULL, 1, '0', 21, 'Efectivo: S/.34.00<br />'),
('2018-03-31 20:59:29', NULL, 1, '0', 22, 'Efectivo: S/.34.00<br />'),
('2018-03-31 21:02:07', NULL, 1, '', 23, 'Efectivo: S/.340.00<br />'),
('2018-03-31 21:10:44', NULL, 1, '0', 24, 'Efectivo: -S/.34.00<br />'),
('2018-04-06 10:54:03', NULL, 1, '0', 25, 'Efectivo: S/.34.00<br />'),
('2018-04-06 10:54:41', NULL, 1, '0', 26, 'Efectivo: S/.34.00<br />'),
('2018-04-24 21:19:22', NULL, 1, '0', 27, 'Efectivo: S/.34.00<br />'),
('2018-05-08 00:58:09', NULL, 1, '0', 28, 'Efectivo: S/.34.00<br />'),
('2018-05-11 23:15:24', NULL, 20602919058, '0', 29, 'Efectivo: S/.68.00<br />'),
('2018-05-12 16:43:30', NULL, 1, '0', 30, 'Efectivo: S/.34.00<br />'),
('2018-05-16 22:54:31', 45222323, 20602919058, '0', 31, 'Efectivo: S/.12944.00<br />'),
('2018-05-17 00:52:09', NULL, 20602919058, '0', 32, 'Efectivo: S/.68.00<br />'),
('2018-07-05 20:33:12', NULL, 1, '0', 33, 'Efectivo: S/.68.00<br />');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_items`
--

CREATE TABLE `ospos_sales_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_items`
--

INSERT INTO `ospos_sales_items` (`sale_id`, `item_id`, `description`, `serialnumber`, `line`, `quantity_purchased`, `item_cost_price`, `item_unit_price`, `discount_percent`) VALUES
(1, 1, '', '', 1, '1.00', '20.00', '20.00', '0.00'),
(2, 3, '', '', 1, '5.00', '10.00', '12.00', '0.00'),
(2, 7, '', '', 2, '1.00', '10.00', '12.00', '0.00'),
(3, 3, '', '', 1, '5.00', '10.00', '12.00', '0.00'),
(3, 8, '0', '0', 3, '2.00', '10.00', '12.00', '1.00'),
(4, 29, '', '', 1, '1.00', '0.00', '0.00', '0.00'),
(5, 33, '', '', 1, '1.00', '0.00', '0.00', '0.00'),
(6, 26, '', '', 1, '1.00', '10.00', '12.00', '0.00'),
(6, 32, '0', '0', 2, '2.00', '10.00', '12.00', '0.00'),
(7, 30, '', '', 1, '1.00', '10.00', '12.00', '0.00'),
(8, 28, '', '', 1, '1.00', '10.00', '12.00', '0.00'),
(9, 44, '0', '0', 1, '3.00', '200.00', '250.00', '0.00'),
(10, 27, '', '', 1, '1.00', '10.00', '12.00', '0.00'),
(11, 50, '0', '0', 1, '2.00', '200.00', '250.00', '0.00'),
(12, 49, 'aaaaaaaaaaa', '', 1, '1.00', '200.00', '250.00', '0.00'),
(13, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(14, 73, '0', '0', 1, '2.00', '22.00', '34.00', '0.00'),
(15, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(16, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(17, 73, '0', '0', 1, '2.00', '22.00', '34.00', '0.00'),
(18, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(19, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(20, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(21, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(22, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(23, 73, '0', '0', 1, '10.00', '22.00', '34.00', '0.00'),
(24, 73, '', '', 1, '-1.00', '22.00', '34.00', '0.00'),
(25, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(26, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(27, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(28, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(29, 73, '0', '0', 1, '2.00', '22.00', '34.00', '0.00'),
(30, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(31, 29, '', '', 2, '1.00', '10.00', '12.00', '0.00'),
(31, 30, '', '', 3, '1.00', '10.00', '12.00', '0.00'),
(31, 44, '0', '0', 6, '1.00', '200.00', '250.00', '0.00'),
(31, 49, 'aaaaaaaaaaa', '', 4, '25.00', '200.00', '250.00', '0.00'),
(31, 50, 'qqqqqqqqqqqq', '', 5, '25.00', '200.00', '250.00', '0.00'),
(31, 73, '', '', 1, '5.00', '22.00', '34.00', '0.00'),
(32, 73, '', '', 1, '2.00', '22.00', '34.00', '0.00'),
(33, 73, '', '', 1, '2.00', '22.00', '34.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_items_taxes`
--

CREATE TABLE `ospos_sales_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_items_taxes`
--

INSERT INTO `ospos_sales_items_taxes` (`sale_id`, `item_id`, `line`, `name`, `percent`) VALUES
(9, 44, 1, 'Impuesto de Ventas 1', '0.00'),
(9, 44, 1, 'Impuesto de Ventas 2', '0.00'),
(31, 44, 6, 'Impuesto de Ventas 1', '0.00'),
(31, 44, 6, 'Impuesto de Ventas 2', '0.00'),
(12, 49, 1, 'Impuesto de Ventas 1', '0.00'),
(12, 49, 1, 'Impuesto de Ventas 2', '0.00'),
(31, 49, 4, 'Impuesto de Ventas 1', '0.00'),
(31, 49, 4, 'Impuesto de Ventas 2', '0.00'),
(11, 50, 1, 'Impuesto de Ventas 1', '0.00'),
(11, 50, 1, 'Impuesto de Ventas 2', '0.00'),
(31, 50, 5, 'Impuesto de Ventas 1', '0.00'),
(31, 50, 5, 'Impuesto de Ventas 2', '0.00'),
(13, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(13, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(14, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(14, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(15, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(15, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(16, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(16, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(17, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(17, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(18, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(18, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(19, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(19, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(20, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(20, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(21, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(21, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(22, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(22, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(23, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(23, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(24, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(24, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(25, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(25, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(26, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(26, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(27, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(27, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(28, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(28, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(29, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(29, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(30, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(30, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(31, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(31, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(32, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(32, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(33, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(33, 73, 1, 'Impuesto de Ventas 2', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_payments`
--

CREATE TABLE `ospos_sales_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_payments`
--

INSERT INTO `ospos_sales_payments` (`sale_id`, `payment_type`, `payment_amount`) VALUES
(1, 'Efectivo', '20.00'),
(2, 'Efectivo', '72.00'),
(3, 'Efectivo', '83.76'),
(4, 'Efectivo', '0.00'),
(5, 'Efectivo', '0.00'),
(6, 'Efectivo', '36.00'),
(7, 'Efectivo', '12.00'),
(8, 'Efectivo', '62.00'),
(9, 'Efectivo', '750.00'),
(10, 'Efectivo', '12.00'),
(11, 'Efectivo', '500.00'),
(12, 'Efectivo', '100.00'),
(12, 'Tarjeta de Crédito', '150.00'),
(13, 'Efectivo', '34.00'),
(14, 'Efectivo', '34.00'),
(14, 'Tarjeta de Débito', '34.00'),
(15, 'Efectivo', '40.12'),
(16, 'Efectivo', '34.00'),
(17, 'Efectivo', '114.24'),
(18, 'Efectivo', '34.00'),
(19, 'Efectivo', '34.00'),
(20, 'Efectivo', '34.00'),
(21, 'Efectivo', '34.00'),
(22, 'Efectivo', '34.00'),
(23, 'Efectivo', '340.00'),
(24, 'Efectivo', '-34.00'),
(25, 'Efectivo', '34.00'),
(26, 'Efectivo', '34.00'),
(27, 'Efectivo', '34.00'),
(28, 'Efectivo', '34.00'),
(29, 'Efectivo', '68.00'),
(30, 'Efectivo', '34.00'),
(31, 'Efectivo', '12944.00'),
(32, 'Efectivo', '68.00'),
(33, 'Efectivo', '68.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_suspended`
--

CREATE TABLE `ospos_sales_suspended` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` bigint(11) DEFAULT NULL,
  `employee_id` bigint(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_suspended`
--

INSERT INTO `ospos_sales_suspended` (`sale_time`, `customer_id`, `employee_id`, `comment`, `sale_id`, `payment_type`) VALUES
('2018-03-31 20:53:00', 45961280, 1, '', 4, 'Efectivo: S/.34.00<br />'),
('2018-03-31 20:55:22', 45961280, 1, '', 6, 'Efectivo: S/.34.00<br />');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_suspended_items`
--

CREATE TABLE `ospos_sales_suspended_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_suspended_items`
--

INSERT INTO `ospos_sales_suspended_items` (`sale_id`, `item_id`, `description`, `serialnumber`, `line`, `quantity_purchased`, `item_cost_price`, `item_unit_price`, `discount_percent`) VALUES
(4, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00'),
(6, 73, '', '', 1, '1.00', '22.00', '34.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_suspended_items_taxes`
--

CREATE TABLE `ospos_sales_suspended_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_suspended_items_taxes`
--

INSERT INTO `ospos_sales_suspended_items_taxes` (`sale_id`, `item_id`, `line`, `name`, `percent`) VALUES
(4, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(4, 73, 1, 'Impuesto de Ventas 2', '0.00'),
(6, 73, 1, 'Impuesto de Ventas 1', '0.00'),
(6, 73, 1, 'Impuesto de Ventas 2', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sales_suspended_payments`
--

CREATE TABLE `ospos_sales_suspended_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sales_suspended_payments`
--

INSERT INTO `ospos_sales_suspended_payments` (`sale_id`, `payment_type`, `payment_amount`) VALUES
(4, 'Efectivo', '34.00'),
(6, 'Efectivo', '34.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_servicios`
--

CREATE TABLE `ospos_servicios` (
  `id` int(11) NOT NULL,
  `cotizacion_id` varchar(100) DEFAULT NULL,
  `proveedor` varchar(200) DEFAULT NULL,
  `tipo_boleto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `tarifa_neta` decimal(10,2) DEFAULT NULL,
  `comi_proveedor` decimal(10,2) DEFAULT NULL,
  `fee_agencia` decimal(10,2) DEFAULT NULL,
  `fee_proveedor` decimal(10,2) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ospos_servicios`
--

INSERT INTO `ospos_servicios` (`id`, `cotizacion_id`, `proveedor`, `tipo_boleto`, `created_at`, `created_by`, `updated_at`, `updated_by`, `code`, `tarifa_neta`, `comi_proveedor`, `fee_agencia`, `fee_proveedor`, `descripcion`) VALUES
(5, NULL, '11', '0', NULL, NULL, NULL, NULL, NULL, '2311233.00', '23.00', '233.00', '23.00', '0'),
(6, NULL, '11', '0', NULL, NULL, NULL, NULL, NULL, '2311233.00', '23.00', '233.00', '4.00', '0'),
(7, NULL, 'proveedor', '0', NULL, NULL, NULL, NULL, NULL, '1229.00', '10.00', '13.00', '13.00', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_sessions`
--

CREATE TABLE `ospos_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_sessions`
--

INSERT INTO `ospos_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0462a0da703861c57b76b2e6742b599b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530889272, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('04a4ee37606843dd583f40c2d7529b88', '190.234.10.64', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530600272, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('0887c9d1ebf899edfaba1bc4128501ed', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1533055572, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('0a5e4049daf7d6566e324a68a40a3388', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1495682670, 'a:1:{s:9:\"person_id\";s:1:\"1\";}'),
('0b5b9541101a036ff23caab7a3546adf', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 1478573480, ''),
('15ab9e1151ebbaaf2783afe9138f772c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 1492210626, ''),
('187ddd2461a84cfcd83ba1dbfd41cd7e', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531585900, ''),
('18d731266c5fe1202083725393a234a6', '181.66.56.92', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/65.0.3325.181 Chrome/65.0.3325.18', 1525362018, ''),
('19a1735d55e2540e405f9d91abcc2a76', '190.238.98.245', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1523242302, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('19ce0e45cffcfeb6b81e99c1a8eb1368', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 1492210294, ''),
('19db4993ef983e31fb78a08a4885e81d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 1519440294, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('19f27e1716824b941dd71b6cb9067205', '201.240.146.117', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530809059, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('1b1fda7e08685728321de00bbdd0d57f', '95.28.49.199', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; Touch; MASMJS)', 1523747651, ''),
('1c8c324f06b4a17d92d0100da025d139', '190.234.10.64', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522703393, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('1d723e334d915d9c3e8074a0fbf97eec', '181.176.89.153', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530492778, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('22bec581777798dd06ade55e18d94244', '190.236.255.160', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522938223, ''),
('231a2e58f0dc7b7dc1e093230b2c9740', '190.236.255.127', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522766103, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('25fd358da427b25b63ab406d6e09efc5', '190.234.10.64', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1523241910, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('28a18ed649e36bcee814eb8d2fc00d9d', '190.236.221.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530198016, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('2ebe11acff75d22b86d5e5fbe49e1ea0', '190.236.221.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1524684908, ''),
('36a92ebda00ef48b03f00450879957bd', '181.176.80.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530882883, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('437c249093258424a752e6738b9e7703', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.18', 1533265789, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('449fbcffaa9f4d9b6abd601c2c680ce9', '190.233.151.62', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522705900, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('47256e7d5ac0792f82e645587e31fd03', '190.234.10.64', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530767658, 'a:9:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:4:\"cart\";a:0:{}s:9:\"sale_mode\";s:4:\"sale\";s:8:\"customer\";i:-1;s:8:\"payments\";a:0:{}s:8:\"cartRecv\";a:1:{i:1;a:10:{s:7:\"item_id\";s:2:\"73\";s:4:\"line\";i:1;s:4:\"name\";s:7:\"PIJAMAS\";s:11:\"description\";s:0:\"\";s:12:\"serialnumber\";s:0:\"\";s:21:\"allow_alt_description\";s:1:\"0\";s:13:\"is_serialized\";s:1:\"0\";s:8:\"quantity\";i:1;s:8:\"discount\";i:0;s:5:\"price\";s:5:\"22.00\";}}s:9:\"recv_mode\";s:6:\"return\";s:8:\"supplier\";i:-1;}'),
('4753ec4bccfc6c95e9d68fbdfdd103b1', '201.240.147.201', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 1529364728, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('47f048adabaf69140fad485708c7879d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 1519440207, ''),
('4a43f6608ef75d36e3ae7c57de109044', '190.236.202.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530837999, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('4b5cb351707fca6e48f8407d294c806e', '201.240.117.6', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530830573, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('556eed9f2b728236fbd170a3a6e902c1', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531492897, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('576270e7516e3702b6b4517ebb490a40', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 1479002743, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('59bdd28503c03db8041ceab9f65172ce', '190.234.109.39', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.18', 1530814184, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('5aa5b7e609e0821f2d31f06d297fd9fa', '190.234.10.64', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530407407, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('62921d6699c981f7251afb38daaa52cc', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531169378, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('657ffe5db8f665c8cada71542badddf9', '190.234.163.250', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/48.0.2564.82 Chrome/48.0.2564.82 ', 1530500792, ''),
('682a761022d6733956054588690c7699', '132.251.2.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530669911, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('6887a0c9112a48c388591f2732e7b83e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', 1521432302, 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('68c8cd9d397216bf2a2a735275083778', '181.176.65.42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530733830, ''),
('6a50ce0df2aaed01f51639906fe91fc5', '181.176.74.182', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530798670, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('6ab134ab7e2d03821a94bfcca85dee64', '132.251.2.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530670464, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('6b123743b39b8ccf9bf65a86b5a57d2e', '190.42.53.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 1530403919, 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('6e19460c5558d5e065e951d5eb9d0b62', '178.140.88.82', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0; MANM)', 1523415374, ''),
('6e429dd18761500d7f49d0c352170f48', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531021194, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('6e953eecdfbffb0e02b457c4e8de4dd9', '201.240.146.117', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530811665, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('72ac41bd94ee87ffff13596c6872e60e', '181.176.74.182', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530824737, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('784cfd4fac4785e30eb93fcd086f0cb4', '192.168.1.22', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1532559664, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('79ada37addcac185299e67ef3d13e281', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.18', 1533149236, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('79e1f8b8ece80422393220ef7cd6071d', '190.42.53.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530678329, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('7c6a727a688c8672c0aefca2c094d98a', '201.240.117.6', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530731907, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('7ce5560dad82b95c3280ec1fe0398518', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.140 Chrome/64.0.3282.14', 1521231891, 'a:1:{s:9:\"person_id\";s:1:\"1\";}'),
('7feda5a958f5522ce35311eea624d43c', '109.63.229.244', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR ', 1522769844, ''),
('8812917ac2d6650aa6bc5894a92e4c93', '190.236.221.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530558931, ''),
('89cfcb46a7e89cae2d1a5f95bebc10c0', '190.234.10.64', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530290332, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('89f409ecbd3f83378072a8dec92a7ef3', '128.72.228.99', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR ', 1522449439, ''),
('8ba63a53b2f5fd6d0e4686a9ae671cb1', '132.251.2.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530669098, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('8c4aea52d5845501fad8881657d45875', '190.236.255.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1528212629, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('8ecbfd709294c2ed9afbc55124619494', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531586047, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('9069d0959d585d044c028980d19a094b', '190.233.151.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522898258, ''),
('9327a7fc109eebf5fc2122fe35223c09', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1533230699, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('94c8cd4ab9b5c8e0b764ce2f1500406a', '181.176.80.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530882993, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('973600532ab078b6133eb94142ba84b2', '181.66.56.92', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/65.0.3325.181 Chrome/65.0.3325.18', 1525362027, ''),
('9b3cae69449901b9614e068dc26099df', '66.249.88.82', 'Mozilla/5.0 (Linux; Android 5.1; HUAWEI CUN-L03 Build/HUAWEICUN-L03) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.', 1526097478, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('9f4f9a64f50fd548e58aa47ecbfad244', '190.234.109.39', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.18', 1530813499, ''),
('a20e5571b2e27679492d93672b953917', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1497825027, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('a701bd7a75ea6d17071e327752f7df36', '181.176.58.83', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530534602, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('ab2ea09ee6f4146527e796afb1dd4eca', '132.251.2.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530669085, ''),
('ab61c982a984004dcf37bc0a921d3666', '190.234.10.64', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530406919, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('acab0b21561ccc5b256b11b63684286f', '190.42.87.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1526528988, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:11:\"20602919058\";}'),
('ad60bc0a907c03fb0acdc5648aa9677b', '190.234.10.64', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530600457, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('af1310071ede17f541974dbf13315b1d', '179.7.55.21', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E1', 1530297259, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('b136248ca21c666d7ce736fb71f5f42d', '192.168.43.94', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531005995, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('b32b381181a79c5dc02853cccbe6d29b', '66.249.88.80', 'Mozilla/5.0 (Linux; Android 7.0; G3313 Build/43.0.A.7.25) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.158 Mo', 1529624215, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('b3d2e4c3866d67ddba1ff6b298f25968', '190.236.255.66', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1529615924, 'a:9:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:4:\"cart\";a:0:{}s:9:\"sale_mode\";s:4:\"sale\";s:8:\"customer\";i:-1;s:8:\"payments\";a:0:{}s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('b617719c875d994a0784478a0d31203b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 1479003997, ''),
('b6543afe61c6a367e547a098f80ea735', '132.191.10.50', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-J110M Build/LMY48B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.109 Mo', 1523926012, ''),
('b97c0f067809cd5a8bc357001d6ad1ea', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.16', 1521235796, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('bb139bc965170480b6e08156e15133c4', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531021193, ''),
('bb1f0cf4b14cde076fdc42bd54b14d8f', '192.168.0.131', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1522161529, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('bbb608959c6ebec75ec15c5af8cf82a6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1500004670, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('be044087f417deed22f7583c864540c7', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531021192, ''),
('bfdeb59d0caecc558c0f14b801fffab7', '181.176.65.42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530731355, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('c0786c807ae2be88bcfcccf19c3bcfe3', '201.240.146.5', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/65.0.3325.181 Chrome/65.0.3325.18', 1524617982, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('c1ef270d685d45e870e117e22f129c24', '190.233.186.237', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', 1524604120, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('c478dd036f374546ab56f8d68e2baa3e', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530982367, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('c762de67a11225edd345578eed4e8403', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1504672037, ''),
('c7ff3613b671a4886e0b689a697ee491', '181.176.86.140', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530501448, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('c96ca8408341225cc5c43ef1452cbb52', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.16', 1521924991, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('cbaeeeec6c202671f278b03fc6e526ce', '190.234.163.250', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/48.0.2564.82 Chrome/48.0.2564.82 ', 1530500720, ''),
('cc5abb0d98b4369ec6260c94af060c63', '190.236.221.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1528744468, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('cd6b2496da61571fd7ee436397fbf917', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 1519579378, ''),
('d2c31f820701e8458fcee87531001733', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1500349611, ''),
('d48e4ce1f50a152dd257fc16a16e7601', '190.236.255.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1529626548, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('d6d720dfd01eeffa66cfaabc9fd64adc', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1531523793, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('d735f6136e046c4e0c28dd7f9506474b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530900640, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('d9c4e642eb596d5222546a843c52a096', '181.176.74.182', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530824490, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('dac86218ab90765a9339ea636c4c3505', '190.234.10.64', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1523055255, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('db91ca74bb1d32ab39d5249c023f9b24', '66.249.88.82', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-G903M Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.126 Mo', 1525390108, 'a:9:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:4:\"cart\";a:1:{i:1;a:11:{s:7:\"item_id\";s:2:\"51\";s:4:\"line\";i:1;s:4:\"name\";s:12:\"AAAAAAAAAAAA\";s:11:\"item_number\";s:9:\"p-0001221\";s:11:\"description\";s:8:\"ASSSSSSS\";s:12:\"serialnumber\";s:0:\"\";s:21:\"allow_alt_description\";s:1:\"0\";s:13:\"is_serialized\";s:1:\"0\";s:8:\"quantity\";i:1;s:8:\"discount\";i:0;s:5:\"price\";s:6:\"250.00\";}}s:9:\"sale_mode\";s:4:\"sale\";s:8:\"customer\";i:-1;s:8:\"payments\";a:0:{}s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('dca1df8b97e3d150ec4fced009675ae6', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530992713, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('e011ab532cd65b370039a9e5d33ba635', '201.240.146.117', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530811505, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('e23744081050d38de35236a5c13b71f5', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530887414, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('e402d8dc84d6c601114e8ca176edcd73', '190.236.221.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530734918, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('e59403caae642d3117650febf20cac50', '190.236.255.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522943122, ''),
('e607289332d410a76ce558730ce61bda', '190.236.221.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530558958, ''),
('ea1e363d9bbb5e4538b5bde301a5ca00', '201.240.146.7', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530634296, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:10:\"2147483647\";}'),
('eb94417a96c650f61a998a7ce0ad15d4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1522114639, 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('ed306912ba4966b1848d16f08dd92ede', '181.176.84.197', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530656289, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('ef9b5ce9c8b81a7e600e4d7b08943f79', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', 1520818375, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('f6f0e8687f9a1421200bb433bb5bd738', '190.236.255.142', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1530133353, 'a:9:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;s:4:\"cart\";a:0:{}s:9:\"sale_mode\";s:4:\"sale\";s:8:\"customer\";i:-1;s:8:\"payments\";a:0:{}}'),
('f896fc8e9c514521308cce0dcf7723e4', '190.234.163.250', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', 1530501500, ''),
('f9041481a95a89ca9a611244ec84a91f', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', 1521255403, 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('f926dfd677e62321b9089f06d8688c97', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0', 1530889197, ''),
('fbd8e1ccdabff673cd57527862ec3317', '66.249.88.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google (+https:', 1525361984, ''),
('ff59b9500527776e565035ec02af30f8', '66.249.88.26', 'Mozilla/5.0 (Linux; Android 6.0.1; XT1563 Build/MPDS24.107-52-1-5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.33', 1526739703, 'a:1:{s:9:\"person_id\";s:1:\"1\";}'),
('ff8f651c3d3d6a7a78dba0b44e0005f3', '190.117.192.202', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1528214060, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_suppliers`
--

CREATE TABLE `ospos_suppliers` (
  `person_id` bigint(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ospos_suppliers`
--

INSERT INTO `ospos_suppliers` (`person_id`, `company_name`, `account_number`, `deleted`) VALUES
(87654322, 'OCEO S.A.C', NULL, 0),
(87654323, 'DETODO', NULL, 0),
(87654325, 'SAP TECNO', NULL, 1),
(87654326, 'SAP TECNO', '12345678', 1),
(87654343, 'aasasad', NULL, 1),
(87654344, 'aasasad', NULL, 0),
(87654345, 'aasasad', NULL, 0),
(87654347, 'CDDD', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ospos_travel`
--

CREATE TABLE `ospos_travel` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `destiny_origin` varchar(400) NOT NULL,
  `destiny_end` varchar(400) NOT NULL,
  `date_init` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type_travel` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `data_travel` text NOT NULL,
  `data_cotizacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla para el registro de tablas';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ospos_app_config`
--
ALTER TABLE `ospos_app_config`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `ospos_clients`
--
ALTER TABLE `ospos_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_code`
--
ALTER TABLE `ospos_code`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_cotizaciones`
--
ALTER TABLE `ospos_cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_cotizaciones_servicios`
--
ALTER TABLE `ospos_cotizaciones_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_customers`
--
ALTER TABLE `ospos_customers`
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD KEY `person_id` (`person_id`);

--
-- Indices de la tabla `ospos_customer_travel`
--
ALTER TABLE `ospos_customer_travel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CUSTOMER` (`customer_id`),
  ADD KEY `FK_TRAVEL` (`travel_id`);

--
-- Indices de la tabla `ospos_design`
--
ALTER TABLE `ospos_design`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_employees`
--
ALTER TABLE `ospos_employees`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `person_id` (`person_id`);

--
-- Indices de la tabla `ospos_factura`
--
ALTER TABLE `ospos_factura`
  ADD UNIQUE KEY `account_number` (`cotizacion_id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `ospos_giftcards`
--
ALTER TABLE `ospos_giftcards`
  ADD PRIMARY KEY (`giftcard_id`),
  ADD UNIQUE KEY `giftcard_number` (`giftcard_number`);

--
-- Indices de la tabla `ospos_inventory`
--
ALTER TABLE `ospos_inventory`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `ospos_inventory_ibfk_1` (`trans_items`),
  ADD KEY `ospos_inventory_ibfk_2` (`trans_user`);

--
-- Indices de la tabla `ospos_items`
--
ALTER TABLE `ospos_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_number` (`item_number`),
  ADD KEY `ospos_items_ibfk_1` (`supplier_id`);

--
-- Indices de la tabla `ospos_items_gallery`
--
ALTER TABLE `ospos_items_gallery`
  ADD KEY `FK_ITEM_ID` (`item_id`);

--
-- Indices de la tabla `ospos_items_taxes`
--
ALTER TABLE `ospos_items_taxes`
  ADD PRIMARY KEY (`item_id`,`name`,`percent`);

--
-- Indices de la tabla `ospos_item_kits`
--
ALTER TABLE `ospos_item_kits`
  ADD PRIMARY KEY (`item_kit_id`);

--
-- Indices de la tabla `ospos_item_kit_items`
--
ALTER TABLE `ospos_item_kit_items`
  ADD PRIMARY KEY (`item_kit_id`,`item_id`,`quantity`),
  ADD KEY `ospos_item_kit_items_ibfk_2` (`item_id`);

--
-- Indices de la tabla `ospos_modules`
--
ALTER TABLE `ospos_modules`
  ADD PRIMARY KEY (`module_id`),
  ADD UNIQUE KEY `desc_lang_key` (`desc_lang_key`),
  ADD UNIQUE KEY `name_lang_key` (`name_lang_key`);

--
-- Indices de la tabla `ospos_pago`
--
ALTER TABLE `ospos_pago`
  ADD UNIQUE KEY `account_number` (`cotizacion_id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `ospos_payment`
--
ALTER TABLE `ospos_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_people`
--
ALTER TABLE `ospos_people`
  ADD PRIMARY KEY (`person_id`);

--
-- Indices de la tabla `ospos_permissions`
--
ALTER TABLE `ospos_permissions`
  ADD PRIMARY KEY (`module_id`,`person_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indices de la tabla `ospos_property`
--
ALTER TABLE `ospos_property`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_receivings`
--
ALTER TABLE `ospos_receivings`
  ADD PRIMARY KEY (`receiving_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `ospos_receivings_items`
--
ALTER TABLE `ospos_receivings_items`
  ADD PRIMARY KEY (`receiving_id`,`item_id`,`line`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `ospos_sales`
--
ALTER TABLE `ospos_sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `ospos_sales_items`
--
ALTER TABLE `ospos_sales_items`
  ADD PRIMARY KEY (`sale_id`,`item_id`,`line`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `ospos_sales_items_taxes`
--
ALTER TABLE `ospos_sales_items_taxes`
  ADD PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `ospos_sales_payments`
--
ALTER TABLE `ospos_sales_payments`
  ADD PRIMARY KEY (`sale_id`,`payment_type`);

--
-- Indices de la tabla `ospos_sales_suspended`
--
ALTER TABLE `ospos_sales_suspended`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `ospos_sales_suspended_items`
--
ALTER TABLE `ospos_sales_suspended_items`
  ADD PRIMARY KEY (`sale_id`,`item_id`,`line`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `ospos_sales_suspended_items_taxes`
--
ALTER TABLE `ospos_sales_suspended_items_taxes`
  ADD PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `ospos_sales_suspended_payments`
--
ALTER TABLE `ospos_sales_suspended_payments`
  ADD PRIMARY KEY (`sale_id`,`payment_type`);

--
-- Indices de la tabla `ospos_servicios`
--
ALTER TABLE `ospos_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ospos_sessions`
--
ALTER TABLE `ospos_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indices de la tabla `ospos_suppliers`
--
ALTER TABLE `ospos_suppliers`
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD KEY `person_id` (`person_id`);

--
-- Indices de la tabla `ospos_travel`
--
ALTER TABLE `ospos_travel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ospos_clients`
--
ALTER TABLE `ospos_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `ospos_code`
--
ALTER TABLE `ospos_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `ospos_cotizaciones`
--
ALTER TABLE `ospos_cotizaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT de la tabla `ospos_cotizaciones_servicios`
--
ALTER TABLE `ospos_cotizaciones_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT de la tabla `ospos_customer_travel`
--
ALTER TABLE `ospos_customer_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ospos_design`
--
ALTER TABLE `ospos_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ospos_factura`
--
ALTER TABLE `ospos_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `ospos_giftcards`
--
ALTER TABLE `ospos_giftcards`
  MODIFY `giftcard_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ospos_inventory`
--
ALTER TABLE `ospos_inventory`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT de la tabla `ospos_items`
--
ALTER TABLE `ospos_items`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `ospos_item_kits`
--
ALTER TABLE `ospos_item_kits`
  MODIFY `item_kit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `ospos_pago`
--
ALTER TABLE `ospos_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `ospos_payment`
--
ALTER TABLE `ospos_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ospos_people`
--
ALTER TABLE `ospos_people`
  MODIFY `person_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20602919079;
--
-- AUTO_INCREMENT de la tabla `ospos_property`
--
ALTER TABLE `ospos_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `ospos_receivings`
--
ALTER TABLE `ospos_receivings`
  MODIFY `receiving_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ospos_sales`
--
ALTER TABLE `ospos_sales`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `ospos_sales_suspended`
--
ALTER TABLE `ospos_sales_suspended`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ospos_servicios`
--
ALTER TABLE `ospos_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ospos_travel`
--
ALTER TABLE `ospos_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ospos_customer_travel`
--
ALTER TABLE `ospos_customer_travel`
  ADD CONSTRAINT `FK_CUSTOMER` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`),
  ADD CONSTRAINT `FK_TRAVEL` FOREIGN KEY (`travel_id`) REFERENCES `ospos_travel` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
