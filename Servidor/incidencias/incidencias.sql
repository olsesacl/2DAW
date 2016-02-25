-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2015 a las 00:45:07
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `incidencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `idtipo` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `estado` enum('ABIERTA','CERRADA','EN PROCESO') COLLATE latin1_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  `persona_detecta` int(11) NOT NULL,
  `prioridad` enum('1','2','3','4','5') COLLATE latin1_spanish_ci NOT NULL DEFAULT '3',
  `fecha_fin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=498 ;

--
-- Truncar tablas antes de insertar `incidencias`
--

TRUNCATE TABLE `incidencias`;
--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `numero`, `idtipo`, `descripcion`, `ubicacion`, `fecha_alta`, `estado`, `idusuario`, `persona_detecta`, `prioridad`, `fecha_fin`) VALUES
(45, '20140922140453', '1', '<p>\r\n	Altavoces en PDC aula 204</p>\r\n', '', '2014-09-22 14:04:53', 'CERRADA', 5, 4, '1', '0000-00-00 00:00:00'),
(64, '20140925112800', '9', 'Instalar cerrojo con llave amaestrada en los cajones de mesa profe\n103, 204, 205, 206, 209', '', '2014-09-25 11:28:00', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(46, '20140924232925', '1', 'Comprar 10 altaveus 2.1 per a aules amb canó.', '', '2014-09-24 23:29:25', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(47, '20140924233155', '1', 'Comprar 3 CPUs económicas. YA SE HAN COMPRADO CUATRO', '', '2014-09-24 23:31:55', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(68, '20140925164212', '12', 'Aula de 2n Batx A: Els vidres inferiors de les finestres tenen falta de resiliconar ja que no queda pràcticament res de l''anterior silicona i hi ha un buit entre el ferro i el vidre. Cas de pluges, pot entrar-hi l''aigua.', '', '2014-09-25 16:42:12', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(52, '20140925110610', '11', 'Rotura Ladrillo Aula 1d (112)\nArreglar escalones entrada principal instituto PARTE DEL RÍO', '', '2014-09-25 11:06:10', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(53, '20140925110744', '14', 'Departament de Valencià. Persiana cordon roto.', '', '2014-09-25 11:07:44', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(54, '20140925110842', '1', '<p>\r\n	Pantalla aula 204 AVISADO EL 18/09</p>\r\n', '', '2014-09-25 11:08:42', 'CERRADA', 5, 4, '1', '0000-00-00 00:00:00'),
(55, '20140925111141', '8', 'Aula 115. Falla la electricidad', '', '2014-09-25 11:11:41', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(56, '20140925111306', '9', 'Manivela WC planta baja chicos rota', '', '2014-09-25 11:13:06', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(57, '20140925111414', '8', 'Aula 201 ha saltado el diferencial?', '', '2014-09-25 11:14:14', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(58, '20140925111444', '8', 'Luces aula 215', '', '2014-09-25 11:14:44', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(59, '20140925111544', '1', 'Falta comandament en aula 201', '', '2014-09-25 11:15:44', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(61, '20140925111644', '12', 'Cristal roto en 1ESOA', '', '2014-09-25 11:16:44', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(78, '20140929145921', '16', 'Llevar a FORM DIRECT proyector Mitsubishi para reparar', '', '2014-09-29 14:59:21', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(63, '20140925111812', '9', 'Aula 204 no se puede cerrar por fuera', '', '2014-09-25 11:18:12', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(65, '20140925113949', '14', 'En el chalet o aula de pqpi  (FPB) hi ha una persiana que no puja, és la del mig, mirant a l''institut.', '', '2014-09-25 11:39:49', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(69, '20140925164702', '14', 'Departament de Valencià. La persiana menuda té el fil molt pelat i no pot ni pujar ni abaixar. Cal repassar també la persiana gran, ja que té un fil molt alt i no es pot usar.', '', '2014-09-25 16:47:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(70, '20140925182241', '9', 'wc 2º PISO CHICOS\nmanivela  puerta rota\nfalta puerta segundo wc ( esta en la cabina) ', '', '2014-09-25 18:22:41', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(71, '20140925194615', '1', 'el projector de la sala d''audiovisuals s''ha mort', '', '2014-09-25 19:46:15', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(72, '20140926110845', '16', 'Traeu del dep. de valencià retroprojector.', '', '2014-09-26 11:08:45', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(73, '20140926175117', '8', '3º PISO RELLANO ESCALERA LUZ FUNDIDA', '', '2014-09-26 17:51:17', 'CERRADA', 3, 4, '5', '0000-00-00 00:00:00'),
(74, '20140926180610', '2', 'Les pissarres de les aules d''informàtica de la planta baixa (enfront del bar) estan en molt males condicions. Preguem per favor la seua substitució.\nMoltes gràcies.\n', '', '2014-09-26 18:06:10', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(75, '20140927224829', '2', 'Al departament necessitem un suport amb rodes per ubicar la torre de l''ordinador, que damunt de la taula ocupa massa lloc', '', '2014-09-27 22:48:29', 'CERRADA', 3, 4, '2', '0000-00-00 00:00:00'),
(76, '20140929110859', '1', 'BOMBILLA CAÑON AULA INFORMATICA 1 FUNDIDA', '', '2014-09-29 11:08:59', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(77, '20140929121337', '8', 'LA CLASSE DE 4rt PDC no té llum perquè li ha desparegut el plom', '', '2014-09-29 12:13:37', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(79, '20140930092358', '12', 'CRISTAL ROTO 1 ESO E AULA 106', '', '2014-09-30 09:23:58', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(80, '20140930123342', '1', 'Falta dar de alta un Nick y Pasword de la conexion de la wifi en el aula 211', '', '2014-09-30 12:33:42', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(85, '20141002105657', '1', 'Cable desde orientació a NAS', '', '2014-10-02 10:56:57', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(86, '20141002130804', '9', 'puerta wv profesores chicos planta baja\nroza en el suelo al abrirla o cerrarla', '', '2014-10-02 13:08:04', 'CERRADA', 3, 4, '5', '0000-00-00 00:00:00'),
(82, '20141001101657', '8', 'Bota el diferencial de l''aula de PQPI de fora tots els dies', '', '2014-10-01 10:16:57', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(83, '20141002075335', '1', 'EN TECNOLOGIA 1 Y EN INFORMATICA (VESTIBULO)  FALTA TINTA PARA LA IMPRESORA Y EN EL AMPA NO LES FUNCIONA NADA NI IMPRESORA NI TECLADO...', '', '2014-10-02 07:53:35', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(84, '20141002101048', '1', 'Aula de 2n PQPI: El cable de connexió a Internet i la cassola d''enganxar al portàtil es troben a una distància considerable, cal aproximar-los per fer-los servir alhora. També manquen uns altaveus per poder oir l''àudio.\nELS ALTAVEUS JA HAN VINGUT.', '', '2014-10-02 10:10:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(87, '20141006141901', '9', 'En la Sala de Professors: Només entrar, baix dún grup de casillers, hi-ha un que se li han soltat els tornells', '', '2014-10-06 14:19:01', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(88, '20141007134127', '9', 'Aula 214, el Pom de la Porta està a punt de eixirse''n per que li falten tots els claus\nMatí dimecres 8; Es veu es va apanyar ahir per la vesprada encara que els tornells pareixen un poquet torts  ', '', '2014-10-07 13:41:27', 'CERRADA', 3, 4, '1', '0000-00-00 00:00:00'),
(89, '', '10', 'Verja verde forzada ,la que da a la carretera.Bisagra arrancada', '', '0000-00-00 00:00:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(90, '', '10', 'Verja verde junto a los contenedores,bisagra arrancada y forzada ', '', '0000-00-00 00:00:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(91, '', '16', 'VULL UN SURO TAMANY 2M DE LLARG O MÉS PER DIRECCIÓ D''ESTUDIS, PER LA PARED DESPEJADA', '', '0000-00-00 00:00:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(95, '20141010075920', '16', 'Fauna detectada:\n-Andragó Gran en el Vestuari del Gimnàs de Chics\n-Rates Grans a laTerrasa de la Sala Profesors\n', '', '2014-10-10 07:59:20', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(96, '20141010095229', '16', 'Joan Cervera necesita llave magnetica de la verja principal.', '', '2014-10-10 09:52:29', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(97, '20141010133634', '17', 'Bany xics 1er. pis. El tercer urinari a la dreta, se''n ix l''aigua per baix quan es pulsa el botó. Té trencat el plastic que va  conectat j a la tuberia (pareix canviable amb recanvi)', '', '2014-10-10 13:36:34', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(98, '20141013100628', '17', '3 piso,wc chicos,3 urinario tuberia suelta y sale poca agua', '', '2014-10-13 10:06:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(99, '20141013100814', '11', 'Escalera exterior 2,escalones rotos', '', '2014-10-13 10:08:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(100, '20141013112631', '8', 'MONTAR PROYECTOR 115 - EL PROJECTOR ESTA EN FORM DIRECT . REPARANT-SE. El proyector es irreparable. Se devolverá al centro y se utilizará la bombilla y la fuente como recambio para otro que tenemos igual.', '', '2014-10-13 11:26:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(101, '20141013113247', '1', 'PORTATIL LABORATORIO DE INGLÉS HAY QUE REVISARLO PQ VA LENTO Y NECESITA ACTUALIZACIONES', '', '2014-10-13 11:32:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(102, '20141013113426', '8', 'Aula 111 no funciona proyector', '', '2014-10-13 11:34:26', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(103, '20141013113806', '9', 'Cajon proyector reventado 115', '', '2014-10-13 11:38:06', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(104, '20141014112650', '17', 'Aseos planta baja primer WC pulsador roto', '', '2014-10-14 11:26:50', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(105, '20141014113014', '12', 'Aula 114 varillas metalicas de la ventana rotas\n17/10  ARREGLADO POR EL FERRER', '', '2014-10-14 11:30:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(116, '20141017105456', '1', 'Al Departament de Física i Química  no funciona Internet', '', '2014-10-17 10:54:56', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(111, '20141016093816', '9', 'La chapa de madera donde se encuentra la sujeción de un extintor está rota (3er Piso).\nTambién una de las baldosas de debajo de ella. Halladas las 2 sujeciones de los extintores que se encuentran se encuentran en Consejerjería', '', '2014-10-16 09:38:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(108, '20141015204258', '8', 'Aula 206 no se puede apargar la luz quito el plomo hasta que se avise a electricista', '', '2014-10-15 20:42:58', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(109, '20141016080642', '16', 'Ataque de insectos (tipo pulga) en el aseo de entrada. Al lado consergería.Dia 13/10/2014', '', '2014-10-16 08:06:42', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(110, '20141016091530', '17', 'WC chicos primer piso,rotura por bandalismo,el primero de todos.', '', '2014-10-16 09:15:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(112, '20141016110013', '9', 'La pissarra de l''aula de 3r PDC no es veu bé,no s''hi pot escriure quasi.<el guix rellisca i no marca bé.', '', '2014-10-16 11:00:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(113, '20141016113841', '9', 'las pizarras del aula 202 y 214 están en mal estado', '', '2014-10-16 11:38:41', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(114, '20141016130903', '16', 'Et recorde que vaig sol.licitar una regleta amb 4 o 5 endolls i cable de 4 o 5 metres per al departament de valencià.\nNo sé en quin estat es troba la petició perquè no m''ix l''històric d''incidències.\nSalutacions i que tingues un dia molt feliç.', '', '2014-10-16 13:09:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(115, '20141017102248', '1', 'El SAI tiene restringido el acceso a la página http://www.powtoon.com. Es una página de edición de vídeo y presentaciones online con fines didácticos. \n\nHay que comunicarlo en el SAI / Gestión de incidencias / Red comunicaciones /Filtrado de páginas Web\n\nhttp://sai.edu.gva.es/?q=es/node/221\n\nGracias Álvaro :-)\nPD. En cuanto Patri tenga acceso no te mareo \n', '', '2014-10-17 10:22:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(119, '20141020024554', '9', 'Aula 211:\n1. Penjar perxa a la pared.\n2. Col·locar portes als armaris.\n', '', '2014-10-20 02:45:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(120, '20141020171835', '9', 'Puerta gimnasio entrada chicos\nse ha roto el aparato de freno de arriba de la puerta', '', '2014-10-20 17:18:35', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(121, '20141020234513', '9', 'Al departament de valencià fan falta 4 prestatges per als 2 armaris de fusta que ens vas concedir fa poc de temps.\nA l''armari gran de 2 portes li falta 1 prestatge fet a mida igual que els que ja té.\nA l''armari més menut de només 1 porta , per poder aprofitar el seu interior, demanem 3 prestatges i els seus corresponent suports per repartir la cabuda interior en 4 zones amb la mateixa grandària. Gràcies.', '', '2014-10-20 23:45:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(122, '20141021085552', '8', 'Salia humo de la lactancia en la entrada principal 2,aula 110 no va la luz de emergencia,.El diferencial de la sala de profesores ha saltado', '', '2014-10-21 08:55:52', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(123, '20141021101617', '8', 'S''ha de canviar la bombeta del canó de projecció EPSON PV72 5406AT/PU/AT. ALVARO HA DEMANAT PRESSUPOST A FORM DIRECT PER COMPARAR PREUS.', '', '2014-10-21 10:16:17', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(124, '20141021102038', '2', 'El professorat diu que cal pintar la pissarra de 205. ', '', '2014-10-21 10:20:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(125, '20141021104159', '1', 'NO FUNCIONA INTERNET EN EL DEPARTAMENTO DE INGLES', '', '2014-10-21 10:41:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(126, '20141021130438', '1', 'Per favor quan puguen que revisen l''ordinador de l''aula de 3r de PDC. Si poguérem posar altaveus ja no caldria usar l''aula d''audiovisuals.Gracietes', '', '2014-10-21 13:04:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(127, '20141021151902', '17', 'En el vestuari femení, hi ha una dutxa que es queda enganxada', '', '2014-10-21 15:19:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(131, '20141021211405', '18', 'hola', '', '2014-10-21 21:14:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(132, '20141021215520', '9', 'MANIVELA AULA 109 QUE DA AL PASILLO NO FUNCIONA  LA PUERTA SOLO SE PUEDE ABRIR CON LA LLAVE', '', '2014-10-21 21:55:20', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(133, '20141022084200', '1', 'De nou, no tenim connexió d''internet al departament de grec-llatí-música. Es fa difícil poder treballar així.', '', '2014-10-22 08:42:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(136, '20141023131905', '1', 'Uno de los ordenadores del Departamento de Orientación está roto. Se ha intentado arreglar pero el sistema y el disco duro no responden.', '', '2014-10-23 13:19:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(135, '20141023123615', '16', 'La verja principal cuando se abre o se cierra,la puerta pequeña tambien se abre', '', '2014-10-23 12:36:15', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(137, '20141026183954', '16', 'Kit de limpieza para los instrumentos musicales y el interior de los armarios que los contienen.  Aulas: 211 y 316.', '', '2014-10-26 18:39:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(138, '20141027120211', '16', 'ELS DE L AJUNTAMENT DE MEDI AMBIENT HAN D´ EMPORTAR-SE RAMES D´ARBRES CAIGUDES.\n\nS''HA CRIDAT A L''AJUNTAMENT PERQUÈ VINGUEN EN EL DIA DE HUI 27/10/2014', '', '2014-10-27 12:02:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(139, '20141027122723', '9', 'Aula 107 paño averiado', '', '2014-10-27 12:27:23', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(140, '20141028095513', '1', 'No hi ha connexió de dades (casble) a l''aula 316', '', '2014-10-28 09:55:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(141, '20141028095819', '1', 'Fa dies que no es pot entrar a Itaca des de la sala del professorat. Dona errada. No està instalada la impresora de consergeria des de l''ordinador que usa windows', '', '2014-10-28 09:58:19', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(142, '20141028105928', '2', 'Reunit el departament de música, fa la següent petició de compra: 1 altaveu amplificat per a connectar el piano a l''aula 211. Us envie enllaç\nhttp://www.madridhifi.com/p/behringer-b208d-altavoces-eurolive-beringer-b-208d-8-pulgadas-2-vias-amplificados/\nTambé sol·licitem un suport de piano en forma de tisora: http://www.madridhifi.com/p/keyboard-stand-pro-soporte-teclado-regulable-altura-mh-006/ i dos tamborets per a seure de piano: http://www.madridhifi.com/busqueda.php?search=taburete%20piano\nEl preu està bé i s''ha comparat amb multinacionals: 35 € cada tamboret, 32 € el suport i 135 € l''altaveu. Les despeses d''enviament són asequibles', '', '2014-10-28 10:59:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(143, '20141028124600', '8', 'S´HAN TRENCAT LES CLAUS DE L ´AULA 205 ( 2 ESO E)', '', '2014-10-28 12:46:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(144, '20141029132326', '10', 'La puerta de Material de Limpieza 2 no se puede abrir', '', '2014-10-29 13:23:26', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(145, '20141029140201', '10', 'Puerta del Vestíbulo No se puede abrir', '', '2014-10-29 14:02:01', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(146, '20141029182851', '10', 'FALTA UN BARROTE VERJA PRINCIPAL ENTRANDO A LA DERECHA', '', '2014-10-29 18:28:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(147, '20141031085834', '1', 'Necessite un sppliter amplificat de pantalla (duplicador)', '', '2014-10-31 08:58:34', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(148, '20141031095711', '1', 'AULA 114 FALTA CABLE DE AUDIO I CANVIAR PILA COMANDAMENT', '', '2014-10-31 09:57:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(149, '20141031203128', '14', 'PERSIANA AULA 213 HA CAIDO, RECOMIENDO REVISAR ESTE TIPO DE PERSIANAS QUE SON MUY GRANDES Y PESADAS (ME HA CAIDO A PLOMO PASANDO POR DELANTE DE MI NARIZ A CM DESPUES DE CERRAR LA VENTANA) LA DEJO EN LA ZONA DE CONTENEDORES DE CARTON', '', '2014-10-31 20:31:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(150, '20141031203248', '10', 'LABORATORIO INGLES  3 PISO LAS VENTANAS CUESTAN MUCHO DE CERRAR ', '', '2014-10-31 20:32:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(151, '20141031203322', '9', 'MANIVELA ROTO WC CHICAS 1 PISO', '', '2014-10-31 20:33:22', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(154, '20141101114124', '1', 'Disponer de un espacio en la biblioteca para llevar los libros que hay en los armarios de las aulas de informática. ', '', '2014-11-01 11:41:24', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(155, '20141101115201', '1', 'Es importante instalar en cada aula de informática un rack, cableando adecuadamente los cables de red que llegan. El switch y enchufe quedarán dentro bajo llave. Actualmente están colgados de la pared, al acceso de todos y haciendo complicada la detección de averías cuando se desconecta un cable, además de la mala imagen. \n\nTambién habría que ponerlo en el aula de dibujo, que hay un mikrotik. El otro día estaba desconectado para cargar un portátil, dejando sin conexión a dos aulas de informática hasta que detectamos la causa. Ya he hablado con los profesores de dibujo. ', '', '2014-11-01 11:52:01', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(156, '20141101115707', '1', 'Splitter VGA. Recordarte que los dos que me facilitaste están instalados en las aulas de informática Inf01 e Inf02. Por si no los añadiste al inventario. Gracias Álvaro', '', '2014-11-01 11:57:07', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(157, '20141103211746', '17', 'WC CHICAS 3 PISO CADENA WC ROTA', '', '2014-11-03 21:17:46', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(161, '20141104100844', '2', 'nECESSITE CANVIAR 12 CADIRES DE PALA DE L''ALULA 316 PER 8 PUPITRES', '', '2014-11-04 10:08:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(163, '20141104101351', '19', 'http://www.madridhifi.com/p/bct-df019/?id_origen=buscador&termino=BANQUET', '', '2014-11-04 10:13:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(164, '20141104103852', '12', 'Cristal roto Guimnasio Chicos', '', '2014-11-04 10:38:52', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(165, '20141105211224', '8', '3 TUBS FLUORESCENTS DE L''AULA 103  ESTAN FOSOS', '', '2014-11-05 21:12:24', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(166, '20141106082827', '17', 'BAÑO CHICAS (ALUMNAS) TERCERA PLANTA CISTERNA CHORREANDO', '', '2014-11-06 08:28:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(167, '20141106093303', '16', 'falta el cartel indicativo del curso en el aula 213. Es el aula de 4ESO C, pero pone 4 D escrito con rotulador. Se presta a confusión.\nNo está instalada la impresora de consergería', '', '2014-11-06 09:33:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(168, '20141106101625', '19', 'NECESSITE UN CABLE VGA MASCLE-FEMELLA PER A MUNTAR L''SPLITTER DE L''AULA 316 ', '', '2014-11-06 10:16:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(169, '20141106171454', '8', 'Hola Álvaro, \nEl Aula de informática 201 la montó Migueles con los alumnos a principio de curso. Sería recomendable poner canaletas en las mesas para que los cables no estén colgando. ', '', '2014-11-06 17:14:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(170, '20141106172655', '1', 'Las aulas de informática están instaladas con sistemas operativos de escritorio y usuarios locales, algo que es una barbaridad en una red. La idea que llevo es instalar todas las aulas con un servidor, que controla la red del aula. Las ventajas: el trabajo se almacena en el servidor, los usuarios ya tienen su cuenta y nadie puede acceder, compartir trabajos, monitorizar la red, etc.  Cada aula de dotación de consellería, viene con un servidor equipado con más RAM y con dos tarjetas de red. Son los que usaríamos para ordenador de profesor y servidor de aula. ¿Sabes por dónde paran estos equipos?\n', '', '2014-11-06 17:26:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(171, '20141107134642', '16', 'COMPRAR SOFRE PER AL DEPARTAMENT DE CIÈNCIES NATURALS', '', '2014-11-07 13:46:42', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(172, '20141107134736', '19', 'COMPRAR DOS RATOLINS', '', '2014-11-07 13:47:36', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(173, '20141107171032', '16', 'Falta Cuadernos del Profesor', '', '2014-11-07 17:10:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(174, '20141108165849', '16', 'A l’Aula Música 316 ( 3r Pis) hi ha un telèfon connectat i no l’utilitzen.  Desconec si funciona.\nEl volen al Departament.\nGràcies.', '', '2014-11-08 16:58:49', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(175, '20141108170155', '9', 'UBICACIÓ: Aula de Música 316 (3r pis)\nLa porta tercera de l’armari que està a la paret no tanca a causa del pany.\n', '', '2014-11-08 17:01:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(177, '20141110081155', '19', 'nNecessite un cable VGA mascle-femella per a l''aula 316', '', '2014-11-10 08:11:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(178, '20141111100505', '8', 'No funcionen 3 tubs fluorescents de l''aula INF01', '', '2014-11-11 10:05:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(179, '20141111101211', '1', 'Incidencia per al SAI.\nAvaria a l''ordinador amb nº de inventari del centre:287402, i Nº  de serie del SAI:E820046637, situat a l''aula de tecnologia.\nNo funciona la font d''alimentació ni el disc dur.', '', '2014-11-11 10:12:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(180, '20141111102403', '16', 'La professora del centre Virginia Checa Calpena amb DNI 48537520E, sustituta de Robert Alonso, no te accés a la pàgina de https://appweb.edu.gva.es/SID/\n \nPer a consultar nómines, cursets, etc.\nHa provat ja en totes les opcions que li proposen en la web i no té accés amb ninguna.', '', '2014-11-11 10:24:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(181, '20141111112733', '12', 'Vidres trencats(5) de la vidrera del 1er al 2on pis escala del pati de les motos', '', '2014-11-11 11:27:33', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(182, '20141111133934', '16', 'Hi ha "Bitxos" a l''aula. Fins i tot es claven dins les motxilles i els entrepans', '', '2014-11-11 13:39:34', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(183, '20141111134046', '16', 'La pissarreta d''examnes s´ha despenjat', '', '2014-11-11 13:40:46', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(184, '20141111191600', '17', 'WC CHICOS SEGUNDO PISO HAY UN PULSADOR ROTO (EL FONTANERO YA LO HA VISTO)', '', '2014-11-11 19:16:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(186, '20141112082458', '9', 'La porta de la 105 no tanca be, hi ha que pegar un colp fort per a tancarla', '', '2014-11-12 08:24:58', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(188, '20141112104711', '1', 'FALLO PROYECTOR DEL AULA 307', '', '2014-11-12 10:47:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(189, '20141112233039', '2', 'Falta una mesa y silla para alumno en la 316.\nGracias.', '', '2014-11-12 23:30:39', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(190, '20141113091628', '16', 'Hi ha una persiana que no baixa i és prou molest. Aula 101', '', '2014-11-13 09:16:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(191, '20141113092344', '1', 'No es pot imprimir des de tots els ordinadors de la sala de professors, sols es pot imprimir des d''un d''ells. Gràcies.', '', '2014-11-13 09:23:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(192, '20141113120711', '1', 'Necessitem  10 Piles botó de 3V, model CR2032, per a diversos ordinadors.', '', '2014-11-13 12:07:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(193, '20141113192429', '17', '2ª piso a la altura de los seminarios de inglés-filosofia hay una gotera de una tuberia de la caldera de calefacción cae el agua en el pasillo.', '', '2014-11-13 19:24:29', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(194, '20141113193725', '1', 'EL DEPARTAMENT D''HISTÒRIA EN NOM DE LA CAP , VOLDRIEN UN ORDINADOR NOU PER AL DEPARTAMENT , JA QUE EL SEU ÉS MOLT VELL', '', '2014-11-13 19:37:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(195, '20141113220225', '9', 'AULA 113 NO PUEDO CERRARLA NO GIRA LA LLAVE', '', '2014-11-13 22:02:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(196, '20141114092548', '16', 'Fer  tres xocs com a minim de claus del ascensor i un del pqpi per al professor nou  Pedro vicente', '', '2014-11-14 09:25:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(197, '20141114104532', '9', 'Aula 205.  2n ESO 3.\nEl tauló d''anuncis està en mal estat. El que està a la paret enfront de la taula del professor està estropeat.  ', '', '2014-11-14 10:45:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(198, '20141116181514', '14', 'Aula 205. Una de les cortines de la finestra( al costat del professor) està feta tiras per baix.', '', '2014-11-16 18:15:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(199, '20141117124754', '1', 'No funciona el projector del aula INFO1.\nAlvaro, Fa molt poc que vam canviar la pereta. El electricista va dir que li va costar molt de canviar.\n\nNo serà que el projector va mal. I avaria les peretes?\n', '', '2014-11-17 12:47:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(200, '20141117125044', '19', 'Recordatori d''una incidència:\nLa impressora del departament de matemàtiques no té tinta.', '', '2014-11-17 12:50:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(201, '20141117134233', '9', 'La cerradura/pomo del aula 214(3ªESO A) está desencajada y fuera de la puerta. Lo hemos arreglado (apañado) ya varias veces y creemos que ya es necesario  llamar al carpintero', '', '2014-11-17 13:42:33', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(202, '20141117152612', '9', 'El pany de la porta de l''aula 214 esta trencat', '', '2014-11-17 15:26:12', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(203, '20141118093054', '1', 'No es pot entrar a Itaca des del Cliente 3 de la sala del professorat: dóna error en la identificació de l''usuari. Pense que caldria que plantejàreu un bon sistema i no continuar amb la improvisació. L''ordre diu que la Conselleria facilitarà tots els mitjans per a poder consignar les faltes i no s''està complint.  ', '', '2014-11-18 09:30:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(211, '20141121184913', '8', 'falla tubo de llum en AULA 109 d''informàtica', '', '2014-11-21 18:49:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(205, '20141119081032', '19', 'NECESSITE UN CABLE VGA MASCLE-FEMELLA PER A MUNTAR L''SPLITTER DE L''AULA 316 ', '', '2014-11-19 08:10:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(206, '20141119081424', '19', 'Us envie enllaç per a una mini taula de mescles per a l''aula 316 http://www.madridhifi.com/p/alto-zmx-862-mezclador-para-directo-6-canales/?v=1&utm_expid=7951887-14.orXLtILZRmi_dmbM5VvhGg.1&utm_referrer=http%3A%2F%2Fwww.madridhifi.com%2Fsonido%2Fprofesional%2Fmesas-estudio-directo%2F', '', '2014-11-19 08:14:24', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(207, '20141119210637', '8', 'AULA 205 NO SE PUEDE APAGAR LA LUZ QUITO PLOMO', '', '2014-11-19 21:06:37', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(208, '20141119210835', '14', 'AULA DE DIBUIX TECNIC 221 SEGUNDO PISO LA CORTINA NO CORRE NO HE PODIDO CERRAR LAS VENTANAS', '', '2014-11-19 21:08:35', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(209, '20141120100357', '9', 'Taula trencada a l''aula 114', '', '2014-11-20 10:03:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(210, '20141120113618', '9', 'Una pissarreta de suro per a fora del departament de valencià per favor', '', '2014-11-20 11:36:18', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(212, '20141125100449', '1', 'NO FUNCIONEN ELS ALTAVEUS DE L''AULA QUE ESTÀ AL COSTAT DEL DEPARTAMENT DE FRANCÉS. ÉS URGENT', '', '2014-11-25 10:04:49', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(213, '20141126215638', '8', 'AULA 213 CLAVIJAS ROTAS', '', '2014-11-26 21:56:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(214, '20141127085640', '1', 'El teclat del Departament de llatí grec i música no funciona correctament. no es pot afegir arroba ni funcionen les tecles alternatives. Una hora més perduda al centre per programaris inestables i dolents', '', '2014-11-27 08:56:40', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(215, '20141127100413', '1', 'Aula 210.\nNo funciona el projector.\nPossible problema: font d''alimentació. URGENT.\nMoltes gràcies.', '', '2014-11-27 10:04:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(216, '20141127101837', '19', 'Necessite un projector potent per a l''aula de música, ja que l''existent (un dels més antics del centre) no es pot fer servir en les condicions de lluminositat de l''aula 316', '', '2014-11-27 10:18:37', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(217, '20141127115507', '1', 'El cañón del aula 308 está mal orientado. parte de la pantalla no se ve (el tercio superior)', '', '2014-11-27 11:55:07', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(218, '20141127165159', '1', 'No funciona el proyector del aula 201', '', '2014-11-27 16:51:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(219, '20141128133235', '2', 'Los alumnos no pueden ver bien desde todas las posiciones en la pizarra pautada del Aula de Música 316 (3ª planta).  Refleja mucho la luz, puede que se trate del tipo de pintura.', '', '2014-11-28 13:32:35', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(220, '20141128133458', '14', 'Aula Música 316 (3ª planta).  La cortina de láminas de la primera ventana (la que está más cerca de la pizarra) está muy deteriorada.', '', '2014-11-28 13:34:58', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(221, '20141201091940', '15', 'Gotera teatro lado derecho', '', '2014-12-01 09:19:40', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(222, '20141201161128', '9', 'CERRADURA CAJON MESA PROFESOR ROTO PQPI', '', '2014-12-01 16:11:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(223, '20141202001526', '1', 'Álvaro, disculpa por no haberte respondido antes, te lo pongo por aquí. Las fuentes de alimentación de todos estos equipos son ATX con conectores de 24 pines y SATA. En PC componentes están bien de precio veo, por ejemplo la más económica sería\nhttp://www.pccomponentes.com/b_move_fuente_alimentacion_500w.html\n\npor 16,75€. Como se necesitan 3, compra al menos 5 porque nos valen para todos los equipos de semitorre. ', '', '2014-12-02 00:15:26', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(224, '20141202215820', '8', 'AULA 205 CLAVIJAS LUZ ROTAS', '', '2014-12-02 21:58:20', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(228, '20141205114546', '8', 'Conexión  altavoces aula 307', '', '2014-12-05 11:45:46', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(226, '20141204080944', '8', 'DOS TUBOS DE LUZ DE LA BIBLIOTECA PARPADEAN', '', '2014-12-04 08:09:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(227, '20141204101902', '1', 'l''enganxe del cable del portàtil de la paret està solt. Aula de 3r de PDC', '', '2014-12-04 10:19:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(229, '20141205123948', '2', 'Les esqueneres dela gimnasos estan molt deteriorats pels anys. Tots els barrots estan corcats i semblen tindre "osteoporosis". S''ha trencat més una vegada durant el seu ús. Deixe una mostra en reprografia per tal de que pugau vore quin és l''estat de les travesseres de fusta. Propose canviar les esqueneres d''una manera progressiva al llarg de x anys.', '', '2014-12-05 12:39:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(230, '20141209093648', '8', 'Han roto la plaqueta o caja donde  van los interruptores del Aula 205', '', '2014-12-09 09:36:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(231, '20141209131708', '17', 'Aula 304: Gotea un radiador y se ha formado un gran charco', '', '2014-12-09 13:17:08', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(232, '20141210121847', '10', 'Puerta de cristal ,acceso 2', '', '2014-12-10 12:18:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(233, '20141212084648', '16', 'Verja principal', '', '2014-12-12 08:46:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(234, '20141212121635', '8', 'Un dels plafons del sostre del gimnàs de xics està a punt de caure', '', '2014-12-12 12:16:35', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(235, '20141212121713', '8', 'En timbre no sona al pati', '', '2014-12-12 12:17:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(236, '20141212141103', '10', 'EL PANY DEL VESTIBUL VA MALAMENT', '', '2014-12-12 14:11:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(237, '20141212141147', '9', 'EL CALAIX DE LUCIA EN JEFATURA D´ESTUDIS ESTA DESENCOLAT', '', '2014-12-12 14:11:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(238, '20141212141343', '1', 'FALTA CABLE DE AUDIO EN L AULA 303 DE 2ª DE BAT A', '', '2014-12-12 14:13:43', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(239, '20141215193618', '1', 'falta tinta a la impresora , modelo HP DESKJET 930C, TINTA COLOR I  tinta NEGRA falten les dos', '', '2014-12-15 19:36:18', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(240, '20141215211055', '17', 'WC CHICAS 3 PISO\n SEGUNDA PILETA UN POCO ARRANCADA DE LA PARED PIERDE AGUA CUANDO SE ABRE LA FUENTE', '', '2014-12-15 21:10:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(241, '20141216101907', '10', 'Puerta vestibulo', '', '2014-12-16 10:19:07', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(242, '20141216120220', '1', 'Fuente de alimentación. Pedir 5 ud (3 hacen falta + 2 reserva)\n\nGracias \n\nhttp://www.pccomponentes.com/b_move_fuente_alimentacion_600w_oem.html?utm_source=pccomponentes&utm_medium=ficha&utm_campaign=ficha-recomendacion&utm_content=44881-35180', '', '2014-12-16 12:02:20', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(243, '20141216120906', '17', 'En el bany de xics del 2º pis, s''han carregat el pulsador d''un urinari i s''ha plenat d''aigua el pis. Ja no sortix mes aigua', '', '2014-12-16 12:09:06', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(244, '20141217085125', '8', 'TIMBRE DE LA PUERTA CRISTAL PRINCIPAL,NO FUNCIONA BIEN.', '', '2014-12-17 08:51:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(245, '20141218114355', '1', 'FALTA CABLE DE AUDIO EN 2 PQPI', '', '2014-12-18 11:43:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(246, '20141218160455', '9', 'PUERTA DEBAJO ESCALERA ENTRADA ESTE NO SE PUEDE ABRIR "CUARTO DE PRODUCTOS ALBAÑILERIA"', '', '2014-12-18 16:04:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(247, '20141218160547', '9', 'AULA 201 INFORMATICA DOS BISAGRAS ROTAS SOLO SE AGUANTA CON LA DE ARRIBA', '', '2014-12-18 16:05:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(248, '20141222121606', '8', 'En reunió de departament de 22 de desembre, es sol·licita canviar el pc de l''aula 211 de la seua ubicació actual a damunt de la taula del professorat, afegint-hi un monitor i fent les connexions que calen per al projector i equip de so.', '', '2014-12-22 12:16:06', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(249, '20150107141321', '10', 'El pany del departament d''Història no tanca correctament. Hi ha perill de trencar-se.', '', '2015-01-07 14:13:21', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(250, '20150108103859', '19', 'Canviar bateria  ACER Extensa 5235', '', '2015-01-08 10:38:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(251, '20150108110931', '1', 'EL PROJECTOR DE L´AULA DE AUDIOVISUALS NO FUNCIONA, LA PANTALLA ESTA EN BLANC', '', '2015-01-08 11:09:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(252, '20150108130247', '9', 'Va mal el pany del Departament de Gª i Hª..', '', '2015-01-08 13:02:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(253, '20150110212005', '1', 'No hi arriva INTERNET al Departament de Física i Química', '', '2015-01-10 21:20:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(254, '20150112134454', '17', 'Banys Xics Plant Baixa, s''ha embossat un urinari inundant el piso si s''utilitza de seguit. Hem tancat el bany', '', '2015-01-12 13:44:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(255, '20150112202711', '12', 'GIMNASIO CHICAS CRISTAL ROTO', '', '2015-01-12 20:27:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(256, '20150113092352', '11', 'Rejoles caigudes en aula 213, baix de l´encerat', '', '2015-01-13 09:23:52', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(257, '20150114094218', '2', 'La campana de gasos del Laboratori de Química no funciona', '', '2015-01-14 09:42:18', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(258, '20150115183835', '16', 'SE HA DETECTADO UNA RATA EN EL VESTUARIO DE GIMNASIO CHICOS', '', '2015-01-15 18:38:35', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(259, '20150116180719', '1', 'EN L''ORDINADOR DEL DEPT D''HISTÒRIA NO FUNCIONA BÉ.SEMBLA QUE HI HA ALGUN TIPUS DE VIRUS', '', '2015-01-16 18:07:19', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(260, '20150116180815', '1', 'PORTAL MOODLE DEL IESMARIAENRIQUEZ ATACADO POR HACKERS', '', '2015-01-16 18:08:15', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(261, '20150121212059', '8', 'AULA 213 CLAVIJA ROTA NO SE PUEDE APAGAR LA LUZ QUITO PLOMO', '', '2015-01-21 21:20:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(262, '20150122093603', '9', 'El pany del Departament d''Història està solt.', '', '2015-01-22 09:36:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(263, '20150123142043', '17', 'LBORATORI DE CIENCIES NATURALS. La unión entre una tubería y una mesa gotea y ha formado un charquito en uno de los lavabos del laboratorio', '', '2015-01-23 14:20:43', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(264, '20150123155013', '8', 'FUNDIDAS LUCES CONSERJERIA', '', '2015-01-23 15:50:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(265, '20150126090516', '11', 'Han caigut dos taulells del pasillo del 1er pis', '', '2015-01-26 09:05:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(266, '20150127121154', '14', 'A l''aula de 2n de PQPI falten tres làmines de la cortina/persiana i ens molesta el sol i la llum excessiva quan fem projeccions.', '', '2015-01-27 12:11:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(267, '20150127191549', '8', 'LUCES BIBLIOTECA PARPADEAN', '', '2015-01-27 19:15:49', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(268, '20150127215336', '8', 'AULAS 202 Y 215 NO TIENEN LUZ CREO QUE FALTA EL FUSIBLE', '', '2015-01-27 21:53:36', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(269, '20150128084021', '8', 'En les Aules 212 i 215 falten els ploms i les respectives peces. No es pot encendre la llum', '', '2015-01-28 08:40:21', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(270, '20150128090232', '10', 'Falta Un altre barrot Mes de la part de  de la verja prop d''a on llevaren l''altre. Ho hem trobat al jardi ', '', '2015-01-28 09:02:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(271, '20150128153405', '8', 'WC CHICOS 1 PLANTA FALTA EMBELLECEDOR LUZ, AULA AUDIOVISUALES CLAVIJA LUZ ROTA', '', '2015-01-28 15:34:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(272, '20150128185332', '1', 'no tinc WIFI al dept d''Economia , no arriba la senyal dins', '', '2015-01-28 18:53:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(273, '20150203092230', '1', 'eL dEPARTAMENT DE mÚICA U AGRAEIX LA BONA TASCA REALITZADA A L''AULA 211', '', '2015-02-03 09:22:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(274, '20150203092537', '8', 'Cal muntar la taula de mescles a l''aula 316 i revisar la connexió de l''altaveu frontal esquerre marca B&W', '', '2015-02-03 09:25:37', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(275, '20150203092628', '1', 'Falta ratolí a la sala del professorat satèlit inves 06', '', '2015-02-03 09:26:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(276, '20150204205745', '9', 'A LA PUERTA DE METAL CON REJA DEL VESTÍBULO SE LE COLOCÓ UNAS PIEZAS EN LA PARTE DE ABAJO PARA QUE NO ESTRESE EL POLVO UNA SE HA DESPEGADO', '', '2015-02-04 20:57:45', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(277, '20150205112929', '2', 'CALDRIA CANVIAR LES PISSARES DE 1A   I  DE 1B.\nNO ES POT ESCRIURE.', '', '2015-02-05 11:29:29', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(279, '20150205203459', '17', 'LABORATORIO DE CIENCIAS NATURALES HAY UNA FUGA PEQUEÑA DE AGUA DE UNO DE LOS LAVABOS QUE ESTA CERCA DE LA PARED', '', '2015-02-05 20:34:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(280, '20150211124101', '14', 'Recordar-te el tema de la persiana de 2n de PQPI', '', '2015-02-11 12:41:01', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(282, '20150219210430', '17', 'WC CHICAS 3 PISO SE SALE EL AGUA POR EL TUBO DEL LAVABO NUMERO 2  (EL QUE TIENE JABONERA)', '', '2015-02-19 21:04:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(283, '20150219212657', '9', 'AULA 213 DOS AGUJEROS EN LA PUERTA', '', '2015-02-19 21:26:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(284, '20150219212737', '8', 'AULA 213 FALTA UNA CLAVIJA DE LA LUZ', '', '2015-02-19 21:27:37', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(285, '20150220194912', '12', 'GIMNASIO CHICOS CRISTAL ROTO', '', '2015-02-20 19:49:12', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(286, '20150223102248', '9', 'El pany (part de dins) de l''aula 211 està solt i cau. Cal roscar-lo bé a la porta', '', '2015-02-23 10:22:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(287, '20150223134221', '8', 'Repassar llums redons centre escenari, orientar-ne els laterals i canviar-ne un de fos.', '', '2015-02-23 13:42:21', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(288, '20150223134340', '16', 'Repassar equip de so taula de mescles teatre', '', '2015-02-23 13:43:40', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(289, '20150224141548', '8', 'Fallan tubos :\nTecno!\nTecno2\nInfo teno', '', '2015-02-24 14:15:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(290, '20150226120730', '8', 'Cal revisar la connexió del cable de vídeo de l''aula 211: no es pot usar ja que connecta i deconnecta continuament les pantalles. S''ha de muntar la taula de mescles de la 316 i revisar l''altaveu frontal', '', '2015-02-26 12:07:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(291, '20150227111233', '2', 'una butaca de braços', '', '2015-02-27 11:12:33', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(292, '20150302114730', '8', 'Una claueta de la llum està trencada EN AULA 206', '', '2015-03-02 11:47:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(293, '20150302114826', '11', 'a la paret de darrere el professorat hi ha 3 taulells mig solts. Abans que caiguen i es trenquen. EN AULA 206.', '', '2015-03-02 11:48:26', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(294, '20150302170009', '8', 'AULA 206 CLAVIJAS LUZ ROTAS NO SE ENCIENDA UNA HILERA DE TUBOS', '', '2015-03-02 17:00:09', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(295, '20150302204413', '12', 'GIMNASIO CHICAS DOS CRISTALES ROTOS', '', '2015-03-02 20:44:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(296, '20150303111451', '9', 'La prestatgeria de l''aula 113 esta caient.', '', '2015-03-03 11:14:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(297, '20150303111636', '8', 'El secamans del servei de professorers de la primera planta no funciona.', '', '2015-03-03 11:16:36', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(298, '20150303175436', '8', 'PASILLO 2 PLANTA HACIA EL FINAL HAYN UNA LUZ FUNDIDA Y UN PLAFON ROTO', '', '2015-03-03 17:54:36', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(299, '20150305093123', '2', 'Hi ha una taula amb el taulo superior solt a l''aula 112', '', '2015-03-05 09:31:23', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(300, '20150305093311', '9', 'A l''aula 112 la bisagra superior de la porta està trencada', '', '2015-03-05 09:33:11', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(301, '20150305144629', '9', 'Alguns suros s''anuncis no tenen el grossor necessari per a poder ficar xinxetes.  Els que he detectat són: Aula Música 211 (al final classe) - Passadís 2n pis suro al costat escala bar - Passadís 3r pis al costat escala bar.', '', '2015-03-05 14:46:29', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(302, '20150306210047', '12', 'AULA 102 CRISTAL ROTO PELIGRO . COLOCO CARTON PARA PROTEGERLO', '', '2015-03-06 21:00:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(303, '20150306212356', '14', 'AULA DE MUSICA 316 PERSIANA ROTA', '', '2015-03-06 21:23:56', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(304, '20150309204546', '8', 'AULA INFO 2 . \nHAY QUE AVISAR A PANIAGUA PARA QUE COLOQUE BOMBILLA PROYECTOR ,DEJO LA BOMBILLA EN CONSERJERIA AL LADO DEL TELEFONO ( ME LA HA DADO MIGUELES)', '', '2015-03-09 20:45:46', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(305, '20150309204650', '12', 'GIMNASIO CHICAS "6"  CRISTALES ROTOS', '', '2015-03-09 20:46:50', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(306, '20150312184632', '9', 'OFICINAS ALGUNAS SILLAS NECESITAN REPASAR Y ATORNILLAR LOS REPOSABRAZOS', '', '2015-03-12 18:46:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(307, '20150312211137', '9', 'AULA 202 PERCHA. HAY QUE COLGARLA DEJO EN CONSERJERIA', '', '2015-03-12 21:11:37', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(308, '20150313081128', '19', 'Necessitem 3 targetes gráfiques per als equips :\n- id inventari 533234 (Info02 -06)\n- id inventari 432300 (Info02 -08) \n- id inventari 516286 (Info01 -09)\n\n\nLa mès econòmica de pc componentes és:\nhttp://www.pccomponentes.com/evga_geforce_210_1gb_ddr3.html\n', '', '2015-03-13 08:11:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(309, '20150313081417', '19', '4 altaveus per als equips del professor de les aules Inf01, Inf02, 109, 201\n', '', '2015-03-13 08:14:17', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(310, '20150313081556', '19', 'Una font d''alimentació per al equip id inventari 537071 (Info02 -17) s''ha cremat.\n\nhttp://www.pccomponentes.com/b_move_fuente_alimentacion_500w.html\n', '', '2015-03-13 08:15:56', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(311, '20150323122606', '1', 'NO hi arriva internet al departament de física i química', '', '2015-03-23 12:26:06', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(312, '20150326122704', '11', 'TAULELLETS DE L´AULA 111 HAN CAIGUT DE LA PARED AL FINAL DE LA CLASSE', '', '2015-03-26 12:27:04', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(313, '20150331103610', '1', 'l''ordinador no va bé, pantalla negra i tarda molt a arrancar.', '', '2015-03-31 10:36:10', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(314, '20150416204227', '9', 'BIBLIOTECA 5 MESA TIENE UN TROZO DE MELAMINA O SIMILAR DESPEGADO', '', '2015-04-16 20:42:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(315, '20150417140414', '19', 'SUSTITUIR PROYECTOR AULA INF02', '', '2015-04-17 14:04:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(316, '20150417141344', '8', 'Sustituir tubos fosforescentes fundidos aula Inf02 y departamento de informática. Por las noches no hay luminosidad suficiente.\nMuchas gracias', '', '2015-04-17 14:13:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(317, '20150421201414', '1', 'Departament de llengua i literatura espanyola: TOT OK (ordinador amb Lliurex en el qual funciona Internet i el so. Es pot imprimir correctament).', '', '2015-04-21 20:14:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(318, '20150421203344', '1', 'Departament de llatí, grec i música: TOT OK (ordinador amb Windows. Funciona Internet, la impressora, l''escànner i el so).', '', '2015-04-21 20:33:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(319, '20150421211714', '1', 'Laboratori de ciències:\n- N''hi ha 5 ordinadors: 4 tenen Linux i un Windows. \n- N''hi ha un que no funciona el monitor (possible fallo de targeta gràfica).  \n- En 3 dels que tenen Linux funciona Internet, en el de Windows no. \n- Sols n''hi ha 2 ratolins. \n- La meua recomanació és instal·lar Lliurex versió escritori en els 5 ordinadors i arreglar tot el cablejat que n''hi ha.', '', '2015-04-21 21:17:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(320, '20150422103119', '9', 'Reposar llistons deteriorats del parquet de l''escenari del teatre.', '', '2015-04-22 10:31:19', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(321, '20150424200440', '1', 'Departament d''economia i FOL: tot OK. \nOrdinador amb Windows. Internet, el so i la impressora funcionen correctament. No obstant això, Internet funciona amb més lentitud que en altres departaments.', '', '2015-04-24 20:04:40', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(322, '20150424201216', '1', 'Seminari de Filosofia: tot OK. Ordinador amb Lliurex. Internet, la impressora i el so funcionen correctament.', '', '2015-04-24 20:12:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00');
INSERT INTO `incidencias` (`id`, `numero`, `idtipo`, `descripcion`, `ubicacion`, `fecha_alta`, `estado`, `idusuario`, `persona_detecta`, `prioridad`, `fecha_fin`) VALUES
(323, '20150424202124', '1', 'Seminari d''anglés: tot OK. Ordinador amb Windows. Internet i la impressora funcionen correctament. Antivirus McAfee caducat.', '', '2015-04-24 20:21:24', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(324, '20150424202904', '1', 'Seminari de francés i religió: tot OK. Un ordinador amb Lliurex. Internet, el so i la impressora funcionen correctament.\nN''hi ha un altre ordinador, però no està connectat (sembla inoperatiu).', '', '2015-04-24 20:29:04', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(325, '20150424205704', '1', 'Seminari d''història: tot OK. Ordinador amb Windows. Internet i la impressora funcionen correctament.', '', '2015-04-24 20:57:04', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(326, '20150427125059', '1', 'AL AULA 205 NO ES VEU BE L´IMATGE QUE PROJECTA EL CANO', '', '2015-04-27 12:50:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(327, '20150427125209', '1', 'AULA 114 LI COSTA MASSA OBRIR LES PRESENTACIONS POWER POINT', '', '2015-04-27 12:52:09', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(328, '20150428200721', '1', 'Departament de valencià: tot Ok. Ordinador amb Lliurex. Funciona Internet correctament. La impressora estava mal connectada i no funcionava, però ara ja funciona.', '', '2015-04-28 20:07:21', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(329, '20150428201240', '1', 'Departament de Física i Química: tot Ok. N''hi han 2 ordinadors amb Windows XP Professional. En els dos funciona Internet correctament. Des d''un d''ells es pot imprimir (la impressora té tasques acumulades, però no n''hi havia paper).', '', '2015-04-28 20:12:40', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(330, '20150428203018', '1', 'Seminari de ciències: n''hi ha un ordinador dual (amb dos sistemes operatius: Windows XP Professional i Linux, però no Lliurex). Des de Lliurex funciona Internet, la impressora i el so. Des de Windows, la impressora i el so funcionen, però no Internet. L''arrancada de Windows XP és tremendament lenta. A l''arrancar l''ordinador després de bastant temps, s''ha de prémer la tecla F1 (possiblement la pila necessite ser canviada). ', '', '2015-04-28 20:30:18', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(331, '20150428203856', '1', 'Departament de matemàtiques: tot OK. Ordinador amb Windows 7. Internet, la impressora i el so funcionen correctament. ', '', '2015-04-28 20:38:56', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(332, '20150428205655', '1', 'Departament d''Orientació: dos ordinadors, un d''ells portàtil. El portàtil té Windows 8, la torre té Lliurex. Funciona Internet correctament en els dos ordinadors. No n''hi ha impressora.', '', '2015-04-28 20:56:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(333, '20150428205920', '1', 'Departament de Tecnologia: n''hi ha un ordinador que es reinicia continuament.  No s''ha pogut provar la impressora.\nN''hi ha una altra torre, però no està operativa.', '', '2015-04-28 20:59:20', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(334, '20150429205641', '15', 'La pissarra de l''aula 113 (2n B) necessita una mà de pintura ja que no es pot escriure bé.', '', '2015-04-29 20:56:41', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(335, '20150504132708', '9', 'Baño de chicos planta  baja: Manivela y Bofetón rotos y el marco de la puerta suelto', '', '2015-05-04 13:27:08', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(336, '20150505114315', '19', 'Fan falta dos kits de tornadis de precisió, els compre jo Alvar i porte factura?', '', '2015-05-05 11:43:15', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(337, '20150506122757', '2', '(No sé si correspon a MOBILIARI). Aula de 2n Batxillerat A.\nLa pantalla de projecció de l''aula té trencat el suport per a enganxar-la a la part baixa quan la desplegues i corre perill d''esgarrar-se.', '', '2015-05-06 12:27:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(338, '20150506131031', '2', 'Se ha soltado la barra sujeción de la pantalla de proyección en la 303. 2batA', '', '2015-05-06 13:10:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(339, '20150508195951', '9', 'MANIVELA ROTA BAÑO PQPI', '', '2015-05-08 19:59:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(340, '20150511130613', '1', 'A l''aula 114 deu haver un problema amb el cable del canó, ja que els colors i la definició de la image projectada és molt defectuosa', '', '2015-05-11 13:06:13', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(341, '20150512161537', '17', 'TERMO DEL PQPI TIENE PERDIDA DE AGUA', '', '2015-05-12 16:15:37', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(342, '20150513081850', '17', 'BAÑO DE CHICOS PLANTA BAJA, FALTA EL PULSADOR DE UN URINARIO', '', '2015-05-13 08:18:50', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(343, '20150513121950', '1', 'El portàtil de l''ordinador del departament de valencià No pot entrar en internet a l''aula de 3r de PDC i un "tornillo" de l''enganxe de la paret està passat de rosca.', '', '2015-05-13 12:19:50', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(344, '20150513122044', '2', 'Falta una persiana a l''aula de 3r de PDC i en falta l''altra.', '', '2015-05-13 12:20:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(345, '20150514115714', '8', 'La puerta pequeña de la verja prinicpal de entrada no funciona', '', '2015-05-14 11:57:14', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(346, '20150514191115', '8', 'FOCO ENTRADA AL TEATRO POR VESTIBULO NO FUNCIONA. ZONA BAÑO Y CAMERINOS NO FUNCIONA LA LUZ ', '', '2015-05-14 19:11:15', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(349, '20150518152841', '9', 'Baño de chicos planta baja: Manivela y Bofetón rotos y el marco de la puerta suelto', '', '2015-05-18 15:28:41', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(348, '20150518075025', '9', 'La puerta ddel aula 307 tiene las 2 visagras inferiores rotas, está desencajada y rota a la altura de la visagra inferior. No se puede cerrar, permanece colgando de la visagra superior', '', '2015-05-18 07:50:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(350, '20150519123727', '8', 'A l''aula de 3r ESO C, l''endoll que hi ha darrere la cadira del professor es troba totalment solt i els cables a l''aire.', '', '2015-05-19 12:37:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(351, '20150520132229', '1', 'El disc dur del equip amb ID 516222 situat a l''aula 109 està inutilitzable (comprat pel centre). S''ha intentat instalar varies vegades el S.O. i es impossible. S''hauria de comprar un altre disc dur per a fer funcionar este equip. \nEs un disc dur de 500Gb SATA.', '', '2015-05-20 13:22:29', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(352, '20150521142142', '2', 'Aula de 3r ESO B: La pantalla situada sobre la pissarra de l''aula ha caigut en pujar-la. Els cargols que s''hi fan servir són menuts per al pes, la grandària i la força amb la qual s''eleva la pantalla. No m''ha caigut al damut per qüestió de 2 cms segons m''han dit els alumnes que estaven mirant-ho tot, ja que m''ha passat pel mateix costat del cap. Espere que els ganxos que suporten la pantalla, que pesa prou, es canvien per uns de més adients. Hem deixat la pantalla en terra damunt la tarima.', '', '2015-05-21 14:21:42', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(353, '20150525215527', '16', 'AULA 301 PANTALLA NO SUBE', '', '2015-05-25 21:55:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(355, '20150526083728', '14', 'Les cortines de l''aula d''anglés estan despenjades i trencades.', '', '2015-05-26 08:37:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(356, '20150526215423', '12', 'GIMNASIO CHICAS DOS CRISTALES ROTOS', '', '2015-05-26 21:54:23', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(357, '20150529104129', '9', 'La percha del aula está descolgada de una parte. Hay agujero pero falta el clavo.', '', '2015-05-29 10:41:29', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(358, '20150529104306', '8', 'Aula 205. Enchufe a la entrada de clase está roto.', '', '2015-05-29 10:43:06', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(359, '20150529104438', '2', 'Aula 205. Mesa de alumno rota (la madera está separda del armazón.', '', '2015-05-29 10:44:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(360, '20150529132805', '19', 'NECESITO BRIDAS PARA PODER ORGANIZAR CABLES DE LA FPB', '', '2015-05-29 13:28:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(361, '20150602213136', '9', 'LISTON MEDIANERA DE MADERA A LA ALTURA DE LA CABINA ESTA SUELTA DE LA PARED', '', '2015-06-02 21:31:36', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(362, '20150618075916', '9', 'Cal canviar o arreglar el pany de la vitrina de l''aula de música situada al costat de la pissarra verda porta esquerra', '', '2015-06-18 07:59:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(363, '20150618080031', '11', 'L''últim escaló que dona accés a l''escenari del saló d''actes, per la part d''esquerra està solt', '', '2015-06-18 08:00:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(364, '20150714134207', '9', 'AULA DIBUJO TECNICO  221\nLA TARIMA TIENE DESPERFECTO DE LA CAPA DE PLASTICO QUE RECUBRE LA MADERA', '', '2015-07-14 13:42:07', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(365, '20150901125625', '15', 'arran de les fortes pluges,ha entrat aigua per les finestres del departament i esta tota laparet amb humitats', '', '2015-09-01 12:56:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(366, '20150904103651', '10', 'Aula de Dibuix Artistic: les finestres no tanquen y quan plou o fa vent  s''obrin', '', '2015-09-04 10:36:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(367, '20150907085432', '11', 'GOTERA EN EL GIMNASIO DE CHICAS Y ADEMÁS ENTRA AGUA POR LA PUERTA O POR LA VENTANA DEL PATIO. REVISAR PORQUE PUEDE ESTROPEAR EL SUELO', '', '2015-09-07 08:54:32', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(368, '20150908095557', '9', 'AULA 301 CAJON PROFE NO CIERRA\n304 NO HAY CERROJO\n204 CAJON NO CIERRA BIEN', '', '2015-09-08 09:55:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(369, '20150909094926', '11', 'TRES TAULELLS DESPEGATS EN CUINA DEL BAR', '', '2015-09-09 09:49:26', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(370, '20150909095130', '16', 'L EXTENSIÓ DEL TELEFONO DEL BAR NO VA BE PQ CRIDES I RAMON NO SENT', '', '2015-09-09 09:51:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(371, '20150909125833', '19', 'A l''aula 209 de 3r PMAR, necesitaríem un ordinador per a l''aula', '', '2015-09-09 12:58:33', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(372, '20150910113605', '19', 'COMPRAR LÁMPARA PROYECTOR AULA 108.\n\nDA MENSAJE DE REEMPLAZAR LA LAMPARA.\nAnotacion de Alvaro: el proyector funciona bien. Esperamos nueva notificación del sistema sobre caducidad de la bombilla. El aparato tiene es un ESPON EMP-82 con n/s: GV9F730414L', '', '2015-09-10 11:36:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(373, '20150911120802', '1', 'L'' ordinador A109-PC303, no funciona internet, pot ser la tarjeta de xarxa. El PC te l''etiqueta d''inventarri arrancada,  L''ordinador no és de Conseleria, es nostre.', '', '2015-09-11 12:08:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(374, '20150911134251', '14', 'En el aula 304 la cortina trasera no funciona. Los alumnos están medio a oscuras y sin poder abrir la ventana', '', '2015-09-11 13:42:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(375, '20150911183909', '9', 'AULA 307 MANIVELA ROTA', '', '2015-09-11 18:39:09', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(376, '20150911184002', '15', 'AULA 202 SE HAN DEJADO UN TROZO DE PUERTA POR PINTAR PARTE DENTRO CLASE', '', '2015-09-11 18:40:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(377, '20150914105402', '1', 'AULA SUPORT 1 NO VA ORDINADOR I AULA SUPORT 2 NO HI HA INTERNET. Arreglat Ordinador Aula suport 1.', '', '2015-09-14 10:54:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(378, '20150914121246', '1', 'a l,aula 107 falta el comandamnt del projector', '', '2015-09-14 12:12:46', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(379, '20150915184115', '8', 'Fa molta calor en la 201 , seria possible ficar VENTILADOR de sostre .', '', '2015-09-15 18:41:15', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(380, '20150915192547', '1', 'PC del Professor no funciona la pantalla', '', '2015-09-15 19:25:47', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(381, '20150916114930', '1', 'Servidor Aula Inf010-14 no arranca.  Tenia un problema amb la BIOS.', '', '2015-09-16 11:49:30', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(420, '20150930082009', '9', 'PANY DEL GIMNAS DE XICS NO OBRI', '', '2015-09-30 08:20:09', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(421, '20150930115100', '8', 'S''HA CONSIDERAT L''OPCIÓ DE TORNAR A POSAR ELS TUBS FLUORESCENTS A LES AULES, JA QUE A PRIMERES HORES PARA FOSC I A LA NIT TAMBÉ? (i ja no tenim la vista d''un soliguer). Gràcies.', '', '2015-09-30 11:51:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(419, '20150929211631', '1', 'A l''aula inf-2, el segon ordinador per la finestra de la primera fila dona problemes al instal·lar software amb apt-get. Intenta connectar a repositoris de ¿steam?', '', '2015-09-29 21:16:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(384, '20150917163257', '17', 'AULA FPB ANTES PQPI LAVABO SE SALE AGUA POR DETRAS ', '', '2015-09-17 16:32:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(385, '20150917195908', '12', 'ESCALERA ENTRADA ESTE SUBIENDO  PRIMER PISO HAY UN CRISTAL ROTO ', '', '2015-09-17 19:59:08', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(386, '20150918085054', '8', 'Tubo de Luz Fluorescente no funciona en Aula 203', '', '2015-09-18 08:50:54', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(387, '20150918105523', '17', 'el polsador de les dutxes de les xiques i xics es queda bloquejat degut a la cals i l''aigua no para d''ixir.', '', '2015-09-18 10:55:23', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(388, '20150918203151', '8', 'ZONA PATIO FALTA LUZ POR LA NOCHE .\nBOMBILLAS FUNDIDAS O CON POCA POTENCIA O ESCASAS', '', '2015-09-18 20:31:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(389, '20150921104239', '9', 'La pantalla elèctica de l''aula 307 no funciona i per tant, no es pot projectar.', '', '2015-09-21 10:42:39', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(390, '20150921123133', '1', 'El comandament del projector de l''aula 302 no funciona i ens costa cada vegada pujar dalt d''una taula per a engegar el projector. Li he canviat les piles i tampoc no va.', '', '2015-09-21 12:31:33', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(391, '20150921123401', '1', 'La clau i endoll on enganxem el cable de l''ordinador  al projector de l''aula 302 es troba mig solta i és una llàstima que s''acabe de trencar.', '', '2015-09-21 12:34:01', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(392, '20150921170612', '8', 'AULA FPB ANTIGUO PQPI EXTERIOR CASETA\nEL DIFERENCIAL SALTA CONSTANTEMENTE EN LA CAJA  EECTRICA DE CONSERJERIA', '', '2015-09-21 17:06:12', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(393, '20150922102436', '1', 'No podemos acceder al escritorio del departamento de filo porque nos pide usuario y contraseña de repente y no la sabemos. Hasta ahora no había ninguna.', '', '2015-09-22 10:24:36', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(394, '20150922115004', '1', 'En l´aula 302 no funciona el comandament, hem canviat les piles i no va.', '', '2015-09-22 11:50:04', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(395, '20150922204320', '12', 'GIMNASIO CHICAS CRISTAL SUELTO A PUNTO DE CAER', '', '2015-09-22 20:43:20', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(396, '20150923101016', '1', 'els altaveus de l''aula d''anglés no funcionen.', '', '2015-09-23 10:10:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(397, '20150923105251', '1', 'Teclat de l''aula inf01, del nous, no va bé. Escriu els caràcters "sa" junts. Es troba en l''ordinador 18, en la última fila, el tercer començant per la dreta.', '', '2015-09-23 10:52:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(398, '20150923121816', '1', 'Equipo 12 del aula 014 pita en el arranque y no va - Solucionado', '', '2015-09-23 12:18:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(399, '20150923122501', '1', 'L''ordinador 18 de la última final de l''aula INf01 amb el N/S: 5072B3WY04416 no va. Hem intentat instal·lar-lo de nou però no va.', '', '2015-09-23 12:25:01', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(400, '20150924090102', '8', 'Tub fluorescent de l''aula 213 (2n ESO B) avariat (parpadetja) ', '', '2015-09-24 09:01:02', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(401, '20150924094750', '1', 'En la caseta de 1FPB no hi ha comandament per a endollar o apagar el projector i ens costa pujar dalt la taula cada vegada.', '', '2015-09-24 09:47:50', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(402, '20150925081724', '1', 'Ordinador no.5 de l''aula 108, sense sistema operatiu', '', '2015-09-25 08:17:24', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(403, '20150925082248', '1', 'a l''ordinador no 5 s''ha instal.lat Lliurex Aula 15', '', '2015-09-25 08:22:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(404, '20150925082757', '1', 'Ordinador 11  de l''aula 108, no carrega Sistema Operatiu', '', '2015-09-25 08:27:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(405, '20150925082857', '1', 'Ordinador 10  de l''aula 108, emes pitits i no engega.', '', '2015-09-25 08:28:57', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(406, '20150925083003', '1', 'ordinador 9 de l''aula 108, no carrega sistema operatiu.', '', '2015-09-25 08:30:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(407, '20150925084522', '1', 'ordinador 15  de l''aula 108,funciona, pero no arriba senyal al monitor.', '', '2015-09-25 08:45:22', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(408, '20150925084838', '1', 'La safata del lector de CDs de l''ordinador 15  de l''aula 108, no s''endinsa.', '', '2015-09-25 08:48:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(409, '20150925085127', '1', 'Ordinador 13  de l''aula 108, manca cable VGA', '', '2015-09-25 08:51:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(410, '20150925085351', '1', 'Ordinador 13  de l''aula 108, manca adaptador DVI-VGA.', '', '2015-09-25 08:53:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(411, '20150925085431', '1', 'Ordinador 13 de l''aula 108, manca ratoli.', '', '2015-09-25 08:54:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(412, '20150925090048', '1', 'Ordinador del professor de l''aula 108, funciona en mode escriptori, ', '', '2015-09-25 09:00:48', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(413, '20150925090234', '1', 'Ordinador 15 de l''aula 1r FPB no engega. ', '', '2015-09-25 09:02:34', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(414, '20150925090400', '1', 'Ordinador 18 de l''aula 1r FPB, no engega.', '', '2015-09-25 09:04:00', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(415, '20150925090446', '1', 'Ordinador 2 de l''aula 1r FPB, no engega.', '', '2015-09-25 09:04:46', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(416, '20150925090915', '16', 'Caldria posar un insecticida electric a l''aula de 1r FPB per evitar les frequents picadures de mosquit.', '', '2015-09-25 09:09:15', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(417, '20150928112607', '1', 'no va l´audio dels projectors aules 014 i 108', '', '2015-09-28 11:26:07', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(418, '20150928112755', '1', 'No entra l''usuari "professor" pel q no es pot entrar a internet. AULA 014', '', '2015-09-28 11:27:55', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(422, '20150930223212', '19', 'Hola Alvar: Et recorde la necessitat de comprar la pissarreta electrònica. Gràcies. Paco', '', '2015-09-30 22:32:12', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(423, '20151001095642', '8', 'CONTINUEM AMB ELS TUBS FLUORESCENTS. LES AULES SÓN: 103 (FALTA 1 TUB I FALLA 1 TUB); 106 (FALTEN 2 TUBS); 309 (FALTEN TUBS). Gràcies.', '', '2015-10-01 09:56:42', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(424, '20151001124612', '15', 'Forats en la pared de l''aula de DIBUIX TÉCNIC. Acabada de pintar però al canviar el canó de projecció de lloc ha caigut una mica del lluit.', '', '2015-10-01 12:46:12', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(425, '20151005193643', '19', 'LA BOMBETA DEL PROJECTOR DEL LABORATORI DE BIOLOGIA S''HA TRENCAT. URGENT CANVIAR', '', '2015-10-05 19:36:43', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(426, '20151005193826', '9', 'CERRADURA GIMNASIO CHICOS PASILLO NO SE PUEDE ABRIR SOLO SE PUEDE ACCEDER POR EL PATIO', '', '2015-10-05 19:38:26', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(427, '20151005193927', '8', 'AULA 204 CLAVIJAS LUCES A PUNTO DE CAERSE DE LA PARED', '', '2015-10-05 19:39:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(428, '20151006092243', '9', 'Fa falta un suro gran a l''aula 1r A (aula 101)', '', '2015-10-06 09:22:43', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(429, '20151006130541', '1', 'L''ordinador de l''aula inf01 amb id BM: 10161507000060 no va. Pareix un prob!ema del disc dur. Està en garantia. Es va comprar en Setembre a Form Direct.', '', '2015-10-06 13:05:41', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(430, '20151006142158', '14', 'En l''aula de DIBUIX TECNIC la persiana es pot desplaçar pero no pot girrar.', '', '2015-10-06 14:21:58', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(431, '20151006182917', '8', 'WC PLANTA BAJA CHICOS CLAVIJA LUZ ROTA. \n2 PISO TUBOS FUNDIDOS A MITAD PASILLO', '', '2015-10-06 18:29:17', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(432, '20151007152516', '1', 'Ha eixit fum i ha deixat de funcionar l''ordinador amb l''id 516256 de l''aula 108. L''ORDINADOR ESTA REALMENT EN EL AULA 109 (Alvaro)', '', '2015-10-07 15:25:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(433, '20151007153325', '1', 'Estat de les aules d''Informàtica:\nLes aules Inf01 i el xalet estan completes. Falten els següents equips:\nAula 201: Falten 5 equips.\nAula Inf02: Falten 5 equips.\nAula 108: Falten 4 equips.\nAula 109: Falten 3 equips.\nFalten els equips complets', '', '2015-10-07 15:33:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(434, '20151008124608', '11', 'CAL REVISAR LA PARED DEL COSTAT DE LA FINESTRA DE L''AULA DE 1er BAT-B. HAN CAIGUT ALGUNES RAJOLES. ', '', '2015-10-08 12:46:08', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(435, '20151008124644', '9', 'CALAIX DE LA TAULA DEL PROFESSOR EN MAL ESTAT', '', '2015-10-08 12:46:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(436, '20151008213853', '1', 'L’ordinador del departament d’anglés té les següents mancances:\n\n1- Al monitor li falla el color i es queda groc. CABLE CANVIAT I VA.\n2- La impresora no va. LI FALTAVA TINTA.\n3- No es pot esborrar un accés directe de l’escritori. Necessitem contrassenya d’administrador. \n4- No tenim bafles d’audio. ESTAN EN CAMINO.', '', '2015-10-08 21:38:53', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(437, '20151013122203', '10', 'Han roto el pomo de la puerta del aula 111 (1 planta).\nLo he dejado bajo en consejeria.', '', '2015-10-13 12:22:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(438, '20151013123805', '9', 'LA CERRADURA DE LA PUERTA SE ENGANCHA.CLASE 107\nPoner un perchero más.\nPoner silicona a los cristales', '', '2015-10-13 12:38:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(439, '20151013135828', '16', 'FALTA CLAUETA ARMARI DEPARTAMENT D´ANGLÉS', '', '2015-10-13 13:58:28', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(440, '20151015135025', '1', 'ORDENADOR NO FUNCIONA EN EL AULA 114', '', '2015-10-15 13:50:25', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(441, '20151019203733', '1', 'Ordinador 422068,aula 108, segona fila, no arranca possible error en disco', '', '2015-10-19 20:37:33', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(442, '20151019203817', '1', 'Ordinador 422064, aula 108, segona fila, no arranca possible error en disco', '', '2015-10-19 20:38:17', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(443, '20151020141636', '19', 'Sol.licite pel departament de dibuix una pantalla d''aproximadament 20 polçades i un escaner alimentat per USB\n\nFortunato. He tramitat ja la compra de l''escáner que et vaig mostrar. Lo de la pantalla, com que de moment la que tens funciona, deixan''ns que esperem una mica.', '', '2015-10-20 14:16:36', 'CERRADA', 3, 4, '3', '2015-11-19 10:29:03'),
(444, '20151021100343', '1', 'L´ordinador de l´aula 114 no funciona bé. Gràcies', '', '2015-10-21 10:03:43', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(445, '20151021125656', '11', 'Gotera important al sostre del Departament de C.de la Naturalesa. Forat en el centre quasi damunt de la taula.\nALVARO DICE: hemos pedido presupuesto. Estamos esperándolo.', '', '2015-10-21 12:56:56', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(446, '20151021134151', '1', 'BIOS amb contrassenya en equip 01 de l''aula 108', '', '2015-10-21 13:41:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(447, '20151022111803', '1', 'Aula 307 1r Batxillerat A.\nNo funciona el projector. Crec que és un problema de connexions. URGENT.', '', '2015-10-22 11:18:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(448, '20151022153156', '1', 'LA CÁMARA DE VÍDEO NO FUNCIONA O SE QUEDA BLOQUEADA', '', '2015-10-22 15:31:56', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(449, '20151022222103', '8', 'A l''aula 112 (2batX) hi ha tubs fluorescents que no funcionen, sols la meitat de la classe esta iluminada.\nGràcies', '', '2015-10-22 22:21:03', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(450, '20151023100031', '1', 'NO FUNCIONA INTERNET A L´AULA DE PT', '', '2015-10-23 10:00:31', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(451, '20151026173745', '1', 'A l''aula 201, a la segona fila, l''ordinador que fa 3 per la finestra no arranca i no dóna cap senyal de vida.', '', '2015-10-26 17:37:45', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(452, '20151026173943', '1', 'A l''aula 108, falta crimpar el connector de xarxa de l''últim ordinador del darrere.', '', '2015-10-26 17:39:43', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(453, '20151028103305', '8', 'EL ENCHUFE DEL AULA 207 NO FUNCIONA', '', '2015-10-28 10:33:05', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(454, '20151028132138', '1', 'L''ordinador amb N/S: BM10161502000254 de l''aula Inf01,013, no arranca. És dels nou. S''ha de cridar a Form Direct perquè està en garantia', '', '2015-10-28 13:21:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(455, '20151028132344', '1', 'Comprar una tarjeta de xarxa d''1 Gbps per al servidor de l''aula 108. JA ESTA COMPRADA I EL TÈCNIC SAP QUE HA DE CANVIAR EL SERVIDOR DE L''AULA.', '', '2015-10-28 13:23:44', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(456, '20151028200717', '1', 'S''ha trencat l''adaptador VGA de la caixeta de l''aula 113.', '', '2015-10-28 20:07:17', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(457, '20151029083118', '1', 'pantalla d''ordinador. Marca Samsung. Ref. HA17H9FQA05552H. Es troba al laboratori en la taula d''ordinadors.\nCONCRETAR QUÈ LI PASSA (ALVARO)', '', '2015-10-29 08:31:18', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(458, '20151029083516', '16', 'Necessitem comprar 20 safates de plàstic  blanques de mesures aprox. 38cm x 28. L''última vegada es compraren en un xino.\nPACO ESTEM MIRANT PREUS (ALVARO).', '', '2015-10-29 08:35:16', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(459, '20151029104009', '1', 'La connexió a Internet en l''aula 108 és molt intermitent. No va realment bé. De vegades no es pot passar llista', '', '2015-10-29 10:40:09', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(460, '20151029113459', '14', 'Las cortinas del aula 304 (2 bachillerato B ) están estropeadas desde principio de curso.', '', '2015-10-29 11:34:59', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(461, '20151029210838', '17', 'GIMNASIO CHICOS EL RADIADOR QUE SE ENCUENTRA EN LA DUCHA PIERDA AGUA', '', '2015-10-29 21:08:38', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(462, '20151102140052', '1', 'EN EL AULA DE PT 2 INSTALAR JAVA', '', '2015-11-02 14:00:52', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(463, '20151102144527', '1', 'Aula Info02- ordinador 516333\nPrimera fila- segon equip desde finestra.\nArranque pero no dona senyal de video. ', '', '2015-11-02 14:45:27', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(465, '20151103115349', '2', '1. Hacen falta perchas, tanto en el Laboratorio de Física como en el de Química.\n2. Una mesa nueva para el ordenador del Departamento.\nLAS PERCHAS YA SE HAN ENCARGADO AL FUSTER. LA MESA NUEVA HABRA QUE MIRAR SI TENEMOS DISPONIBILIDAD.', '', '2015-11-03 11:53:49', 'CERRADA', 3, 4, '3', '2015-11-20 16:16:30'),
(466, '20151103144718', '11', 'Aula 102, dos azulejos rotos y 5 filas de 5 azulejos sueltas', '', '2015-11-03 14:47:18', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(467, '20151104170451', '1', 'Aula Inf2.\nOrdinador segon de la primera fila començant des de la finestra.\nCodi inventari: 516333\nFallida en disc dur.', '', '2015-11-04 17:04:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(468, '20151105104726', '1', 'Necesitamos un swit en el laboratorio de Física para poder conectar a Internet los ordenadores.\nAlvaro dice: en marcha.', '', '2015-11-05 10:47:26', 'CERRADA', 3, 4, '3', '2015-11-19 14:54:51'),
(469, '20151105104848', '1', 'Sería conveniente un swit también para el aula de 4º PDC.\nEL AULA TIENE SWITCH PERO SOLO HAY UN ORDENADOR CONECTADO. \nALVARO DICE:  en marcha.\nJESÚS: L''aula ja va perfectament. Falta pensar la posibilitat de connectar un ordinador al projector. La connexió està en la taula de l''ordinador, els ordinadors no. A més falta posar el connector d''audio al cable que es troba dins de la caixa.', '', '2015-11-05 10:48:48', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(470, '20151105134638', '1', 'Equip 422053. Error Initramfs (posible error de disc dur). AULA 108.\nJA LI HE PASSAT NOTA AL TECNIC (ALVARO)', '', '2015-11-05 13:46:38', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(471, '20151106103649', '17', 'BAÑO DE CHICAS PLANTA BAJA SE INUNDA, TIENE UNA FUGA DE AGUA EN  LA PARTE INFERIOR DE DE LA TAZA ', '', '2015-11-06 10:36:49', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(472, '20151106184843', '17', 'WC PROFESORES PLANTA BAJA EL WC NECESITA QUE LE COLOQUEN TORNILLOS NUEVOS EN EL  SUELO,\n ESTABAN PODRIDOS  CUANDO VINIERON LOS DE LA CUBA.', '', '2015-11-06 18:48:43', 'CERRADA', 3, 4, '3', '2015-11-19 14:54:25'),
(473, '20151109112322', '1', 'Ordenador izquierdo junto a puerta de entrada no arranca. FPB1.', '', '2015-11-09 11:23:22', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(474, '20151109112451', '1', 'Ordenador derecho junto a puerta de entrada se bloquea al presentar el menú de arranque. FPB1', '', '2015-11-09 11:24:51', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(475, '20151109205619', '14', 'AULA 203 SE HA CAIDO UNA PARTE DEL RIEL DE UNA CORTINA.\n DESCUELGO Y DEJO EN CONSERJERIA LA CORTINA\nALVARO DICE: AVISADO EL CORTINERO.', '', '2015-11-09 20:56:19', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(476, '20151110141434', '14', 'El hilo de la persiana del Aula de Convivencia está roto y no se puede subir ni bajar.\nALVARO DICE: avisado el cortinero.', '', '2015-11-10 14:14:34', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(477, '20151111100924', '9', 'TABLEROS DE AGLOMERADO DE 1M X 1M, NO IMPORTA EL COLOR, ES PARA HACER INSTALACIONES SIMULADAS DE REDES, GRACIAS\nALVARO DICE: YA LOS HE PEDIDO.', '', '2015-11-11 10:09:24', 'CERRADA', 3, 4, '3', '2015-11-19 14:53:40'),
(478, '20151111102344', '8', 'No se escucha el timbre en el piso 2º a la altura del baño de chicas\nALVARO DICE: lo estoy averiguando.', '', '2015-11-11 10:23:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(479, '20151112131359', '17', ' SEGUNDO LAVABO DE TERCERA PLANTA CHICAS PIERDE AGUA POR LA JUNTA DE LA TUBERIA\nALVARO DICE: ya he avisado al fontanero.', '', '2015-11-12 13:13:59', 'CERRADA', 3, 4, '3', '2015-11-19 14:53:28'),
(480, '20151113094031', '19', 'Per arreglar el cablejat d''una de les aules (començaríem per info1) necessitaríem:\n12 rosetes dobles:  47,4 €\n20 latiguillos de 1 metro: 39 € \nTotal 86,4 €. Els preus son de PCComponentes (serien 6€ més per transport) per a que et faces una idea. T''envie els enllaços.\nRoseta de Superficie Cat5e 2 Conectores Red Hembra RJ-45 - Cable de red (3,95 €) http://www.pccomponentes.com/roseta_de_superficie_cat5e_2_conectores_red_hembra_rj_45.html \n\nCable de Red UTP RJ45 Cat 6e 1m Azul - Cable de red (1,95 €)\nhttp://www.pccomponentes.com/cable_de_red_utp_rj45_cat_6e_1m_azul.html\n\nSi vols que provem a fer 2 classes (amb els dos grups que tinc) seria el doble.\n\nALVARO DICE: ja he tramitat el pedido en els quantitats que has indicat. Espere que em comuniqueu quin es el resultat que dona esta primera instal·lació.', '', '2015-11-13 09:40:31', 'CERRADA', 3, 4, '3', '2015-11-19 14:53:07'),
(481, '20151113133024', '1', 'L''ordinador 565547 de laula INFO02 no arranca be. Encen pero el ventilador va i no va. I l''ordinador s''apaga.\nALVARO DICE: Guillermo, necesito saber:\n1. Si es del sai o de form direct.\n2. Si está en garantía o no.\n... para poder gestionar la incidencia. \nJesús: És de Form Direct\nALVARO: Ja he avisat al tècnic de Form Direct.', '', '2015-11-13 13:30:24', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(482, '20151113134052', '1', 'Aula 101 1º ESO A: No funcionan los altavoces y la conexión de ordenador a la pared se ha soltado.\nALVARO DICE: he avisado al electricista.', '', '2015-11-13 13:40:52', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(483, '20151116220057', '1', 'A l''aula inf2, a la segona fila, el segon ordinador per la finestra pareix que no funciona correctament, es bloqueja i dona problemes en diverses tasques (pe: fer captures de pantalla).\nALVARO DIU: PER FAVOR, INDICA SI L''ORDINADOR ES DEL SAI O COMPRAT PEL CENTRE, SI EN LA CARCASA POSA GARANTIA, ETC. ESTIC A L''ESPERA.\nJesús: Estem mirant-lo. Ja et dic alguna cosa Álvaro', '', '2015-11-16 22:00:57', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(486, '20151118081440', '19', 'Un cable d''àudio per a l''aula 013 per poder escoltar', '', '2015-11-18 08:14:40', 'CERRADA', 3, 4, '3', '2015-11-19 10:46:53'),
(487, '20151118081444', '19', '', '', '2015-11-18 08:14:44', 'CERRADA', 3, 4, '3', '0000-00-00 00:00:00'),
(488, '20151118081910', '14', 'Les cortines de l''aula de 2n batxillerat B( 304) estan trencades i també hi ha goteres importants quan plou.\nALVARO DIU: falta indicar la ubicació de la incidència.', '', '2015-11-18 08:19:10', 'EN PROCESO', 3, 4, '3', '0000-00-00 00:00:00'),
(489, '20151118123325', '1', 'L''ordinador amb ID: 516286 del xalet no funciona. Pareix ser la font d''alimentació. Falta comprovar si està en garantia.\nALVARO DICE: Indica por favor si es de Form Direct o de Conselleria. Gracias.', '', '2015-11-18 12:33:25', 'ABIERTA', 3, 4, '3', '0000-00-00 00:00:00'),
(495, '20151119145600', '17', 'El baño de chicas de la planta baja se inunda por fuga de la base del water después de pulsar el botón  de la cisterna y está recargando agua ', '', '2015-11-19 14:56:00', 'ABIERTA', 3, 4, '3', '0000-00-00 00:00:00'),
(497, '20151120125731', '1', 'L''ordinador amb l''id BM10161502000254 no arranca. És de Form Direct i està en garantia.\nALVARO DIU: Per favor, dis-me on està ubicat per a poder pasar-li la nota al tècnic.', '', '2015-11-20 12:57:31', 'ABIERTA', 3, 4, '3', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Truncar tablas antes de insertar `roles`
--

TRUNCATE TABLE `roles`;
--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `descripcion`, `nivel`) VALUES
(1, 'ADM', 'ADMNISTRADOR', 0),
(2, 'TIC', 'COORDINADOR TIC', 0),
(3, 'TEC', 'TECNICO', 0),
(4, 'PROF', 'PROFESOR', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_incidencias`
--

CREATE TABLE IF NOT EXISTS `tipos_incidencias` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=21 ;

--
-- Truncar tablas antes de insertar `tipos_incidencias`
--

TRUNCATE TABLE `tipos_incidencias`;
--
-- Volcado de datos para la tabla `tipos_incidencias`
--

INSERT INTO `tipos_incidencias` (`idtipo`, `codigo_tipo`, `descripcion`) VALUES
(1, 'INF', 'INFORMATICA'),
(2, 'MOBIL', 'MOBILIARIO'),
(11, 'OBR', 'OBRER'),
(10, 'FERR', 'FERRER'),
(9, 'FUS', 'FUSTERIA'),
(8, 'ELECT', 'ELÉCTRICA'),
(12, 'CRIS', 'CRISTALLERIA'),
(14, 'PERS', 'PERSIANERIA-CORTINATGES'),
(15, 'PINT', 'PINTURA'),
(16, 'CONS', 'CONSERGERIA - DIVERSOS'),
(17, 'FONT', 'FONTANERIA'),
(20, 'prueb', 'pruebas'),
(19, 'COMPR', 'COMPRAS MATERIAL INFORMATICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_incidencias_usuario`
--

CREATE TABLE IF NOT EXISTS `tipos_incidencias_usuario` (
  `idtipo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idtipo`,`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncar tablas antes de insertar `tipos_incidencias_usuario`
--

TRUNCATE TABLE `tipos_incidencias_usuario`;
--
-- Volcado de datos para la tabla `tipos_incidencias_usuario`
--

INSERT INTO `tipos_incidencias_usuario` (`idtipo`, `idusuario`) VALUES
(1, 1),
(1, 2),
(2, 1),
(8, 1),
(9, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `idrol` tinyint(4) NOT NULL,
  `email2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `logo` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Truncar tablas antes de insertar `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `clave`, `nombre`, `idrol`, `email2`, `logo`) VALUES
(1, '2daw', '5/DWSAfzQ+QJF+RmhPomWqDbgMJvjUdYgFFknQnwostrw6MAw4Dws3AxIzGuNYvzTTH7U6FZIFLeBg81UR1nGw==', '2daw', 1, '', 'cc8a4-avatar04.png'),
(2, 'sergiosanchis@hotmail.com', 'bgcCtWCWXuoMfwV9id7meYB09WKBkQpwnfqPpon2zLzuPJsrUqvs7sjsh09TvrQr0pEX70kNqnoaMStW6xMR3Q==', 'Sergio Sanchis Climent', 2, '', '9238a-avatar.png'),
(3, 'sergiosanchiscliment@gmail.com', 'cXO5VBXIWejJmnlfYcfHgkfP9pjKwqGWvSTtP5P+5wzAfzXEgQKyfRJdiuTeLylJOIIxHMN+FcQabtd3TB4wFA==', 'Tenico 1', 3, '', '39023-avatar5.png'),
(4, 'profe', 'C8Gm+4S6+pTM8I7Ot0IPdrEsM88IxJLRkIpSP7qIgJAUl5JYKPifUy8u4+nP06me5jz9OqTScE1XxU94MYQDvA==', 'Profesor', 8, '', 'ebaf9-avatar2.png'),
(5, 'tecnico2', 'sOprlv3FwjhGOqV2n2YCXrIHznQPcd/tx2Wfz48tWdHHuF+6gumwIP7DrHU981dUjbGrdHJhTCtVnLeEd24Ksg==', 'Tecnico 2', 3, '', '12339-avatar3.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
