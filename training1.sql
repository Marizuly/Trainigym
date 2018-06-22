-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2018 a las 13:54:47
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `training1`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_actualizarInscripcion` (IN `_idVenta` INT)  NO SQL
update registrospendientes set estadoRegistro = 'Confirmado' where idregistroPendiente = _idregistroPendiente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_actualizarTiquetera` (IN `_idVenta` INT)  NO SQL
update comprobanteservicio set cantidad = cantidad-1 where idcomprobanteServicio = _idVenta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_asistencia` (IN `_idVenta` INT)  NO SQL
insert into controle_s(idVenta) values (_idVenta)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_cantidad` (IN `_idVenta` INT)  NO SQL
select cantidad from comprobanteservicio where idcomprobanteServicio= _idVenta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ceEps` (IN `_estadoEps` VARCHAR(20), IN `_ideps` INT)  NO SQL
UPDATE eps SET estadoEps = _estadoEps WHERE ideps = _ideps$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ceMembresia` (IN `_estadoMembresia` INT(15), IN `_idMembresia` INT)  NO SQL
UPDATE membresia SET estadoMembresia = _estadoMembresia WHERE idMembresia = _idMembresia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ceTarifa` (IN `_estadoTarifa` VARCHAR(20), IN `_idtarifas` INT)  NO SQL
UPDATE tarifas SET estadoTarifa = _estadoTarifa  WHERE idtarifas = _idtarifas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ceVenta` (IN `_estadoVenta` VARCHAR(20), IN `_idcomprobanteServicio` INT)  NO SQL
UPDATE comprobanteservicio SET estadoVenta = _estadoVenta WHERE idcomprobanteServicio = _idcomprobanteServicio$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_consultarAsistencia` (IN `_idVenta` INT)  NO SQL
select CONCAT(p.primerNombre, p.segundoNombre)Nombres,c.fechaFin fechaFin, cs.entrada entrada from persona p join comprobanteservicio c on p.idusuario= c.idcomprobanteServicio join controle_s cs on cs.idVenta=c.idcomprobanteServicio where CURRENT_DATE < cs.entrada and cs.idVenta = _idVenta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_consultarDatosMembresia` (IN `_idMem` INT)  NO SQL
SELECT * FROM  tarifas f join membresia m on f.idtarifas = m.idtarifas 
        join planeshorario ph on m.idMembresia = ph.idMembresia 
join tipomembresia tm on m.idtipoMembresia= tm.idtipoMembresia
        WHERE m.idMembresia = _idMem$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_consultarEstadoI` (IN `_id` INT)  NO SQL
select estadoRegistro from registrospendientes rg join persona p on p.idregistrosPendientes= rg.idregistroPendiente where p.idusuario = _id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_consultarPE` (IN `_estado` INT, IN `_correo` INT)  NO SQL
SELECT * FROM comprobanteservicio cs 
        join horarioventa hv on cs.idcomprobanteServicio = hv.idcomprobante 
        join planeshorario ph on hv.idplanesHorario = ph.idplanesHorario 
        join membresia m on m.idMembresia= ph.idMembresia 
        join tarifas t on t.idtarifas = m.idtarifas 
        join tipomembresia tm on tm.idtipoMembresia = m.idtipoMembresia 
        join persona per on per.idusuario = cs.idPersona where cs.estadoVenta = _estado and per.idusuario = _correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_consultarVenta` (IN `_correo` INT)  NO SQL
SELECT * FROM comprobanteservicio cs 
        join horarioventa hv on cs.idcomprobanteServicio = hv.idcomprobante 
        join planeshorario ph on hv.idplanesHorario = ph.idplanesHorario 
        join membresia m on m.idMembresia= ph.idMembresia 
        join tarifas t on t.idtarifas = m.idtarifas 
        join tipomembresia tm on tm.idtipoMembresia = m.idtipoMembresia 
        join persona per on per.idusuario = cs.idPersona where per.correo = _correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_contrale_S` (IN `idVenta` INT)  NO SQL
insert into controle_s(idVenta)VALUES (idVenta)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_editarClase` (IN `_idclase` INT)  NO SQL
SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase WHERE idClase = _idclase$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_editarEps` (IN `_ideps` INT)  NO SQL
SELECT ideps,nombreEps, estadoEps FROM eps WHERE ideps = _ideps$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_editarMembresia` (IN `_midMembresia` INT)  NO SQL
SELECT * FROM  tarifas f join membresia m on f.idtarifas = m.idtarifas 
        join planeshorario ph on m.idMembresia = ph.idMembresia 
        join tipomembresia tm on m.idtipoMembresia = tm.idtipoMembresia
        join tarifas t on m.idtarifas = t.idtarifas WHERE m.idMembresia = _midMembresia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_editarTarifa` (IN `_idtarifas` INT)  NO SQL
select * from tarifas where idtarifas = _idtarifas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_estadoGenero` (IN `_estadoGenero` VARCHAR(20), IN `_idGenero` INT)  NO SQL
UPDATE genero SET estadoGenero = _estadoGenero WHERE idgenero = _idGenero$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_inscripcionActiva` ()  SELECT * FROM genero WHERE estadoRegistro ='Sin confirmar'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertaClase` (IN `_nombreClase` VARCHAR(50), IN `_descripcion` TEXT)  NO SQL
INSERT INTO Clase (nombreClase,descripcion) VALUES (_nombreClase,_descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarAcudiente` (IN `_primerNombre` VARCHAR(20), IN `_segundoNombre` VARCHAR(20), IN `_primerApellido` VARCHAR(20), IN `_segundoApellido` VARCHAR(20), IN `_telefono` VARCHAR(20), IN `_direccion` VARCHAR(50))  NO SQL
insert into acudiente(primerNombre,segundoNombre,primerApellido,segundoApellido,telefono,direccion)VALUES(_primerNombre,_segundoNombre,_primerApellido,_segundoApellido,_telefono,_direccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarAsistencia` (IN `_idVenta` INT)  NO SQL
insert into controle_s(idVenta)values (_idVenta)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarClase` (IN `_nombreClase` VARCHAR(45), IN `_descripcion` TEXT)  NO SQL
insert into clase (nombreClase, descripcion) VALUES (_nombreclase,_descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarEps` (IN `@nombreEps` VARCHAR(45))  NO SQL
insert into eps (nombreEps) values (@nombreEPs)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarGenero` (IN `@nombreGenero` VARCHAR(45))  NO SQL
INSERT into genero(nombreGenero) VALUES (@nombreGenero)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarHorarioVenta` (IN `_idplanesHorario` INT, IN `_idComprobante` INT)  NO SQL
INSERT into horarioventa(idplanesHorario,idcomprobante) VALUES(_idplanesHorario, _idcomprobante)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarMembresia` (IN `_nombreMembresia` VARCHAR(45), IN `_cantidad` INT, IN `_idtipoMembresia` INT, IN `_idtarifas` INT, IN `_beneficiarioM` BOOLEAN)  NO SQL
INSERT INTO membresia (nombreMembresia,cantidad,idtipoMembresia,idtarifas, beneficiarioM) VALUES (_nombreMembresia,_cantidad,_idtipoMembresia,_idtarifas, _beneficiarioM)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarPersona` (IN `_documento` INT, IN `_primerNombre` VARCHAR(40), IN `_segundoNombre` VARCHAR(40), IN `_primerApellido` VARCHAR(40), IN `_segundoApellido` VARCHAR(40), IN `_fechaNacimiento` DATE, IN `_telefono` VARCHAR(40), IN `_celular` VARCHAR(50), IN `_estadoCivil` VARCHAR(40), IN `_correo` VARCHAR(60), IN `_direccion` VARCHAR(60), IN `_idPerfil` INT, IN `_idtipoDocumento` INT, IN `_idgenero` INT, IN `_ideps` INT, IN `_max` INT)  NO SQL
INSERT INTO persona (documento,primerNombre,segundoNombre,primerApellido,
segundoApellido,fechaNacimiento,telefono,celular,estadoCivil,correo,direccion,idPerfil,idtipoDocumento, idgenero,
ideps,idregistrosPendientes, contrasena) VALUES
(_documento,_primerNombre,_segundoNombre,_primerApellido,_segundoApellido,_fechaNacimiento,_telefono,_celular,_estadoCivil,_correo,_direccion,_idPerfil,_idtipoDocumento,_idgenero,_ideps,_max,md5('Energym'))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarRegistrosPendientes` (IN `_fechaRegistro` DATE)  NO SQL
INSERT into registrospendientes VALUES()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarRP` ()  NO SQL
insert into registrospendientes() values ()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarTarifa` (IN `_valor` INT, IN `_year` YEAR)  NO SQL
insert into tarifas(valor, year) values(_valor,_year)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarTipoDocumento` (IN `_nombre` VARCHAR(35))  NO SQL
insert into tipodocumento(nombre) values(_nombre)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarTipoMembresia` (IN `_nombreMembresia` VARCHAR(45))  NO SQL
insert into tipomembresia(nombreMembresia) VALUES(_nombreMembresia)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarTipoNovedades` (IN `_nombreNovedad` VARCHAR(45))  NO SQL
insert into tiponovedades(nombreNovedad) VALUES(_nombreNovedad)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertarVenta` (IN `_cantidad` INT, IN `_fechaFin` DATE, IN `_total` INT, IN `_fechaVenta` DATE, IN `_idpersona` INT, IN `_beneficiario` BOOLEAN)  NO SQL
INSERT INTO comprobanteservicio (cantidad,fechaFin,
        total,fechaVenta,idpersona,beneficiario) VALUES (_cantidad,_fechaFin,_total,_fechaVenta,_idpersona,_beneficiario)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insertComprobanteServicio` (IN `_cantidad` INT, IN `_duracionVenta` INT, IN `_fechaFin` DATE, IN `_total` INT, IN `_fechaVenta` DATE, IN `_idPersona` INT)  NO SQL
insert into comprobanteservicio(cantidad, duracionVenta, fechaFin,total,fechaVenta,idPersona) VALUES(_cantidad,_duracionVenta,_fechaFin,_total,_fechaVenta,_idPersona)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_lisclase` ()  NO SQL
SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase where estadoClase='Activo'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarA2Membresia` ()  NO SQL
SELECT * FROM membresia m 
Join tipomembresia tm on m.idtipoMembresia = tm.idtipoMembresia WHERE estadoMembresia='Activo'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarAMembresia` ()  NO SQL
SELECT * FROM membresia m Join tipomembresia tm on
         m.idtipoMembresia = tm.idtipoMembresia WHERE estadoMembresia='Activo'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarAsistencia` ()  NO SQL
select CONCAT(p.primerNombre, p.segundoNombre)Nombres,c.fechaFin fechaFin, cs.entrada entrada from persona p join comprobanteservicio c on p.idusuario= c.idcomprobanteServicio join controle_s cs on cs.idVenta=c.idcomprobanteServicio$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarAsistencia2` (IN `_id` INT)  NO SQL
select CONCAT(p.primerNombre, p.segundoNombre)Nombres,c.fechaFin fechaFin, cs.entrada entrada from persona p join comprobanteservicio c on p.idusuario= c.idcomprobanteServicio join controle_s cs on cs.idVenta=c.idcomprobanteServicio where p.idusuario = _id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarCeV` (IN `_estado` VARCHAR(20))  NO SQL
SELECT * FROM comprobanteservicio cs 
        join horarioventa hv on cs.idcomprobanteServicio = hv.idcomprobante 
        join planeshorario ph on hv.idplanesHorario = ph.idplanesHorario 
        join membresia m on m.idMembresia= ph.idMembresia 
        join tarifas t on t.idtarifas = m.idtarifas 
        join tipomembresia tm on tm.idtipoMembresia = m.idtipoMembresia 
        join persona per on per.idusuario = cs.idPersona where cs.estadoVenta = _estado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarClase` ()  NO SQL
SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase where estadoClase='Activo'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarDocumento` ()  NO SQL
select p.idusuario,documento documento, CONCAT(p.documento,' ',p.primerNombre,' ',p.primerApellido ) Persona, c.idcomprobanteServicio idcomprobante, c.fechaFin, c.cantidad cantidad from persona p join comprobanteservicio c on p.idusuario =c.idPersona where CURRENT_TIMESTAMP < fechaFin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarEps` ()  NO SQL
SELECT ideps,nombreEps, estadoEps FROM eps$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarEpsActivo` ()  NO SQL
SELECT ideps,nombreEps, estadoEps FROM eps WHERE estadoEps= 'Activo'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarIndexclase` ()  NO SQL
SELECT idClase,nombreClase,descripcion, estadoClase FROM Clase$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarInscripcion` ()  NO SQL
select rp.fechaRegistro, CONCAT(p.primerNombre,' ', p.primerApellido) persona, p.documento documento, rp.estadoRegistro estadoRegistro from persona p join registrospendientes rp on p.idregistrosPendientes=rp.idregistroPendiente where rp.estadoRegistro= 'Sin confirmar'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarMembresia` ()  NO SQL
SELECT * FROM  tarifas f 
        join membresia m on f.idtarifas = m.idtarifas 
        join planeshorario ph on m.idMembresia = ph.idMembresia 
        join tipomembresia tm on m.idtipoMembresia = tm.idtipoMembresia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarTarifa` ()  NO SQL
SELECT * FROM tarifas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarTarifaActiva` ()  NO SQL
SELECT * FROM tarifas WHERE estadoTarifa= 'Activo' order by valor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarVenta` ()  NO SQL
SELECT * FROM comprobanteservicio cs 
        join horarioventa hv on cs.idcomprobanteServicio = hv.idcomprobante 
        join planeshorario ph on hv.idplanesHorario = ph.idplanesHorario 
        join membresia m on m.idMembresia= ph.idMembresia 
        join tarifas t on t.idtarifas = m.idtarifas 
        join tipomembresia tm on tm.idtipoMembresia = m.idtipoMembresia 
        join persona per on per.idusuario = cs.idPersona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_login` (IN `_correo` VARCHAR(60), IN `_contrasena` TEXT)  NO SQL
select correo, contrasena, CONCAT(primerNombre,' ',primerApellido) persona, idPerfil, idusuario from persona where correo = _correo and contrasena = _contrasena$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_maxIdMembresia` ()  NO SQL
SELECT MAX(idMembresia) idMem FROM membresia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_maxIdTarifa` ()  NO SQL
SELECT MAX(idtarifas) id FROM tarifas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_maxIdVenta` ()  NO SQL
SELECT MAX(idcomprobanteServicio) id FROM comprobanteservicio$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_maxInscripcion` ()  NO SQL
select max(idregistroPendiente) id from registrospendientes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_modificarEps` (IN `_nombreEps` VARCHAR(45), IN `_ideps` INT)  NO SQL
UPDATE eps SET  nombreEps = _nombreEps WHERE ideps = _ideps$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_modificarMembresia` (IN `_nombreMembresia` VARCHAR(45), IN `_cantidad` INT, IN `_idtipoMembresia` INT, IN `_idtarifas` INT, IN `_idMembresia` INT, IN `_beneficiarioM` INT)  NO SQL
UPDATE membresia SET  nombreMembresia = _nombreMembresia, 
cantidad = _cantidad, idtipoMembresia  = _idtipoMembresia,
idtarifas = _idtarifas, beneficiarioM = _beneficiarioM WHERE idMembresia = _idMembresia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_modificarTarifa` (IN `_valor` INT, IN `_year` VARCHAR(20), IN `_idtarifas` INT)  NO SQL
UPDATE tarifas SET  valor = _valor, year = _year WHERE idtarifas = _idtarifas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_registrarDetalleVenta` (IN `_idplanesHorario` INT, IN `_idcomprobante` INT)  NO SQL
INSERT INTO horarioventa (idplanesHorario, idcomprobante) VALUES(_idplanesHorario,_idcomprobante)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_validarNombreEps` (IN `_nombreEps` VARCHAR(45))  NO SQL
SELECT * FROM eps WHERE nombreEps = _nombreEps$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudiente`
--

CREATE TABLE `acudiente` (
  `idacudiente` int(11) NOT NULL,
  `primerNombre` varchar(20) NOT NULL,
  `segundoNombre` varchar(20) DEFAULT NULL,
  `primerApellido` varchar(20) NOT NULL,
  `segundoApellido` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `estadoAcudiente` varchar(30) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acudiente`
--

INSERT INTO `acudiente` (`idacudiente`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `telefono`, `direccion`, `estadoAcudiente`) VALUES
(1, 'Laura', 'Daniela', 'vásquez', 'Hernandez', '5003021', 'crr #', 'Activo'),
(2, 'José', 'armando', 'Rodriguez', 'Franco', '5020532', 'crr 32 45 23', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `idClase` int(11) NOT NULL,
  `nombreClase` varchar(45) NOT NULL,
  `descripcion` text,
  `estadoClase` varchar(15) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`idClase`, `nombreClase`, `descripcion`, `estadoClase`) VALUES
(1, 'Crosffit', 'Tonificación general', 'Activo'),
(2, 'Gap', 'gluteos, abdomen y pierna', 'Activo'),
(3, 'Boxeo', 'lucha libre', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobanteservicio`
--

CREATE TABLE `comprobanteservicio` (
  `idcomprobanteServicio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaFin` date NOT NULL,
  `total` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `estadoVenta` varchar(15) DEFAULT 'Activa',
  `idPersona` int(11) NOT NULL,
  `beneficiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprobanteservicio`
--

INSERT INTO `comprobanteservicio` (`idcomprobanteServicio`, `cantidad`, `fechaFin`, `total`, `fechaVenta`, `estadoVenta`, `idPersona`, `beneficiario`) VALUES
(1, 0, '2018-06-06', 4000, '2018-06-05', 'Cancelada', 5, NULL),
(2, 0, '2018-09-03', 143000, '2018-06-05', 'Activa', 4, NULL),
(3, 0, '2018-06-04', 43000, '2018-06-05', 'Finalizado', 6, NULL),
(4, 0, '2018-07-05', 93000, '2018-06-05', 'Activa', 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controle_s`
--

CREATE TABLE `controle_s` (
  `idcontrolE_S` int(11) NOT NULL,
  `entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `controle_s`
--

INSERT INTO `controle_s` (`idcontrolE_S`, `entrada`, `idVenta`) VALUES
(1, '2018-06-06 04:12:20', 2),
(2, '2018-06-06 04:12:26', 4),
(3, '2018-06-06 04:12:32', 1),
(4, '2018-06-06 04:12:44', 1),
(5, '2018-06-06 11:40:43', 2),
(6, '2018-06-06 11:41:37', 4),
(7, '2018-06-06 11:44:29', 4),
(8, '2018-06-06 11:44:35', 4),
(9, '2018-06-06 11:44:40', 2),
(10, '2018-06-06 11:45:03', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `ideps` int(11) NOT NULL,
  `nombreEps` varchar(45) DEFAULT NULL,
  `estadoEps` varchar(15) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`ideps`, `nombreEps`, `estadoEps`) VALUES
(1, 'Cafesalud', 'Inactivo'),
(2, 'Nueva eps', 'Activo'),
(3, 'Sura', 'Activo'),
(4, 'Aliansalud', 'Activo'),
(5, 'Compensar', 'Activo'),
(6, 'Salud total', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `nombreGenero` varchar(30) DEFAULT NULL,
  `estadoGenero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `nombreGenero`, `estadoGenero`) VALUES
(1, 'Masculino', 'Activo'),
(2, 'Femenino', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioventa`
--

CREATE TABLE `horarioventa` (
  `idhorarioVenta` int(11) NOT NULL,
  `idplanesHorario` int(11) DEFAULT NULL,
  `idcomprobante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarioventa`
--

INSERT INTO `horarioventa` (`idhorarioVenta`, `idplanesHorario`, `idcomprobante`) VALUES
(1, 9, 1),
(2, 5, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

CREATE TABLE `membresia` (
  `idMembresia` int(11) NOT NULL,
  `nombreMembresia` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estadoMembresia` varchar(15) DEFAULT 'Activo',
  `idtipoMembresia` int(11) NOT NULL,
  `idtarifas` int(11) NOT NULL,
  `beneficiarioM` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `membresia`
--

INSERT INTO `membresia` (`idMembresia`, `nombreMembresia`, `cantidad`, `estadoMembresia`, `idtipoMembresia`, `idtarifas`, `beneficiarioM`) VALUES
(1, 'Especial', 0, 'Activo', 3, 1, 0),
(2, 'General', 0, 'Activo', 3, 2, 0),
(3, 'Estudiantes y Adulto mayor', 0, 'Activo', 3, 3, 0),
(4, 'Plan pareja', 0, 'Activo', 3, 4, 1),
(5, '3 meses', 0, 'Activo', 5, 5, 0),
(6, '6 meses', 0, 'Activo', 6, 6, 0),
(7, '12 entradas', 0, 'Activo', 2, 7, 0),
(8, '16 entradas', 0, 'Activo', 2, 9, 0),
(9, 'General', 0, 'Activo', 1, 10, 0),
(10, 'Hora feliz', 0, 'Activo', 1, 11, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `idNovedades` int(11) NOT NULL,
  `descripcion` text,
  `idcomprobante` int(11) NOT NULL,
  `idtipoNovedades` int(11) NOT NULL,
  `fechaNovedad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL,
  `estadoPerfil` varchar(30) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nombreRol`, `estadoPerfil`) VALUES
(1, 'administrador', 'Activo'),
(2, 'instructor', 'Activo'),
(3, 'cliente', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idusuario` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `primerNombre` varchar(25) NOT NULL,
  `segundoNombre` varchar(25) DEFAULT NULL,
  `primerApellido` varchar(25) NOT NULL,
  `segundoApellido` varchar(25) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `estadoCivil` varchar(15) DEFAULT NULL,
  `correo` varchar(60) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `idPerfil` int(11) NOT NULL DEFAULT '3',
  `idtipoDocumento` int(11) NOT NULL,
  `idgenero` int(11) NOT NULL,
  `idacudiente` int(11) DEFAULT NULL,
  `ideps` int(11) NOT NULL,
  `idregistrosPendientes` int(11) DEFAULT NULL,
  `estadoPersona` varchar(15) DEFAULT 'Activo',
  `contrasena` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idusuario`, `documento`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `telefono`, `celular`, `estadoCivil`, `correo`, `direccion`, `idPerfil`, `idtipoDocumento`, `idgenero`, `idacudiente`, `ideps`, `idregistrosPendientes`, `estadoPersona`, `contrasena`) VALUES
(1, 1002143223, 'jose', 'manuel', 'hernandez', 'medina', '1996-09-16', '4425673', '3776754554', 'solter(a)', 'jo@hotmail.com', 'crr 78#78-87', 1, 1, 1, NULL, 2, 1, 'Activo', '202cb962ac59075b964b07152d234b70'),
(2, 1000569815, 'mari', '', 'bedoya', 'serna', '1993-09-16', '4635453', '3148554554', 'solter(a)', 'mari@hotmail.com', 'crr 8#99-87', 2, 1, 2, NULL, 4, 1, 'Activo', '202cb962ac59075b964b07152d234b70'),
(3, 1037667450, 'Laura', 'Daniela', 'Morales', 'Hernández', '1999-03-21', '5443267', '3002375244', 'solter(a)', 'laura_candy@hotmail.es', 'cll65 ba cr 109', 3, 1, 2, NULL, 2, NULL, 'Activo', '202cb962ac59075b964b07152d234b70'),
(4, 1152469105, 'Juan', 'Fernando', 'Mejía', 'Simanca', '1999-02-07', '5703438', '3043844422', 'casado(a)', 'jfmejia048@outlook.es', 'cl. 19 # 88-11', 3, 1, 1, NULL, 3, NULL, 'Activo', NULL),
(5, 43143033, 'Gloria', '', 'Amparo', 'Hernández', '1991-11-04', '1234567', '3197972549', 'union libre', 'gloria@gmail.com', 'cll65 ba cr 109', 3, 1, 2, NULL, 5, 2, 'Activo', '202cb962ac59075b964b07152d234b70'),
(6, 1034567890, 'Carolina', '', 'Mejía', 'Simanca', '1999-03-21', '3045678', '', 'solter(a)', 'caro@gmail.com', 'cll65 ba cr 109 (405)', 3, 1, 2, NULL, 3, NULL, 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planeshorario`
--

CREATE TABLE `planeshorario` (
  `idplanesHorario` int(11) NOT NULL,
  `rangoInicioM` time DEFAULT NULL,
  `rangoFinM` time DEFAULT NULL,
  `rangoInicioT` time DEFAULT NULL,
  `rangoFinT` time DEFAULT NULL,
  `idMembresia` int(11) DEFAULT NULL,
  `dia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planeshorario`
--

INSERT INTO `planeshorario` (`idplanesHorario`, `rangoInicioM`, `rangoFinM`, `rangoInicioT`, `rangoFinT`, `idMembresia`, `dia`) VALUES
(1, '10:00:00', '11:59:00', '14:30:00', '16:30:00', 1, 'Lunes, Martes, Miercoles, Jueves, Viernes'),
(2, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 2, 'Ninguno'),
(3, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 3, 'Ninguno'),
(4, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 4, 'Ninguno'),
(5, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 5, 'Ninguno'),
(6, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 6, 'Ninguno'),
(7, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 7, 'Ninguno'),
(8, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 8, 'Ninguno'),
(9, '06:00:00', '11:59:00', '14:00:00', '22:00:00', 9, 'Ninguno'),
(10, '10:00:00', '11:59:00', '14:30:00', '16:30:00', 10, 'Lunes, Martes, Miercoles, Jueves, Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `idProgramacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `idClase` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`idProgramacion`, `fecha`, `horaInicio`, `horaFin`, `color`, `idClase`, `idusuario`) VALUES
(1, '2018-06-06', '13:00:00', '14:00:00', '#008000', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrospendientes`
--

CREATE TABLE `registrospendientes` (
  `idregistroPendiente` int(11) NOT NULL,
  `estadoRegistro` varchar(15) DEFAULT 'Sin confirmar',
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaConfirmacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrospendientes`
--

INSERT INTO `registrospendientes` (`idregistroPendiente`, `estadoRegistro`, `fechaRegistro`, `fechaConfirmacion`) VALUES
(2, 'Confirmada', '2018-04-23 15:41:03', '2018-06-05 04:11:35'),
(27, 'Sin confirmar', '2018-05-04 12:39:55', '0000-00-00 00:00:00'),
(28, 'Sin confirmar', '2018-06-02 17:13:42', '0000-00-00 00:00:00'),
(29, 'Sin confirmar', '2018-06-02 17:14:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `idtarifas` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `estadoTarifa` varchar(15) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`idtarifas`, `valor`, `year`, `estadoTarifa`) VALUES
(1, 35000, '2018', 'Activo'),
(2, 53000, '2018', 'Activo'),
(3, 43000, '2018', 'Activo'),
(4, 93000, '2018', 'Activo'),
(5, 143000, '2018', 'Activo'),
(6, 270000, '2018', 'Activo'),
(7, 41000, '2018', 'Activo'),
(8, 41000, '2018', 'Activo'),
(9, 45000, '2018', 'Activo'),
(10, 4000, '2018', 'Activo'),
(11, 2000, '2018', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idtipoDocumento` int(11) NOT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `estadoTD` varchar(35) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idtipoDocumento`, `nombre`, `estadoTD`) VALUES
(1, 'cedula de ciudadania', 'Activo'),
(2, 'tarjeta de identidad', 'Activo'),
(3, 'cedula extranjera', 'Activo'),
(4, 'Carnet estudiantil', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomembresia`
--

CREATE TABLE `tipomembresia` (
  `idtipoMembresia` int(11) NOT NULL,
  `nombreTipoMembresia` varchar(45) NOT NULL,
  `duracion` int(11) NOT NULL,
  `estadoTM` varchar(15) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomembresia`
--

INSERT INTO `tipomembresia` (`idtipoMembresia`, `nombreTipoMembresia`, `duracion`, `estadoTM`) VALUES
(1, 'Día', 1, 'Activo'),
(2, 'Tiquetera', 30, 'Activo'),
(3, 'Mensual', 30, 'Activo'),
(4, 'Bimestral', 60, 'Activo'),
(5, 'Trimestral', 90, 'Activo'),
(6, 'Semestral', 180, 'Activo'),
(7, 'Anual', 365, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiponovedades`
--

CREATE TABLE `tiponovedades` (
  `idtipoNovedades` int(11) NOT NULL,
  `nombreNovedad` varchar(45) DEFAULT NULL,
  `estadoTN` varchar(15) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiponovedades`
--

INSERT INTO `tiponovedades` (`idtipoNovedades`, `nombreNovedad`, `estadoTN`) VALUES
(1, 'Cambio de plan', 'Activo'),
(2, 'Excusa medica', 'Activo'),
(3, 'Motivo laboral', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  ADD PRIMARY KEY (`idacudiente`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`idClase`);

--
-- Indices de la tabla `comprobanteservicio`
--
ALTER TABLE `comprobanteservicio`
  ADD PRIMARY KEY (`idcomprobanteServicio`),
  ADD KEY `fk_venta_persona1` (`idPersona`),
  ADD KEY `beneficiario` (`beneficiario`);

--
-- Indices de la tabla `controle_s`
--
ALTER TABLE `controle_s`
  ADD PRIMARY KEY (`idcontrolE_S`),
  ADD KEY `fk_Asistencia_Venta1` (`idVenta`);

--
-- Indices de la tabla `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`ideps`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `horarioventa`
--
ALTER TABLE `horarioventa`
  ADD PRIMARY KEY (`idhorarioVenta`),
  ADD KEY `fk_planes_horario` (`idplanesHorario`),
  ADD KEY `fk_venta_horario` (`idcomprobante`);

--
-- Indices de la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD PRIMARY KEY (`idMembresia`),
  ADD KEY `fk_Membresia_tipoMembresia` (`idtipoMembresia`),
  ADD KEY `fk_Membresia_tarifas1` (`idtarifas`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`idNovedades`),
  ADD KEY `fk_venta1` (`idcomprobante`),
  ADD KEY `fk_Novedades_tipoNovedades1` (`idtipoNovedades`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_persona_perfil1` (`idPerfil`),
  ADD KEY `fk_persona_acudiente` (`idacudiente`),
  ADD KEY `fk_persona_idTipo` (`idtipoDocumento`),
  ADD KEY `fk_persona_idgenero` (`idgenero`),
  ADD KEY `fk_persona_ideps` (`ideps`),
  ADD KEY `fk_persona_registroPendiente` (`idregistrosPendientes`);

--
-- Indices de la tabla `planeshorario`
--
ALTER TABLE `planeshorario`
  ADD PRIMARY KEY (`idplanesHorario`),
  ADD KEY `fk_membresia_planes` (`idMembresia`);

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`idProgramacion`),
  ADD KEY `fk_Programacion_Clase1` (`idClase`),
  ADD KEY `fk_Programacion_persona` (`idusuario`);

--
-- Indices de la tabla `registrospendientes`
--
ALTER TABLE `registrospendientes`
  ADD PRIMARY KEY (`idregistroPendiente`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`idtarifas`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idtipoDocumento`);

--
-- Indices de la tabla `tipomembresia`
--
ALTER TABLE `tipomembresia`
  ADD PRIMARY KEY (`idtipoMembresia`);

--
-- Indices de la tabla `tiponovedades`
--
ALTER TABLE `tiponovedades`
  ADD PRIMARY KEY (`idtipoNovedades`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  MODIFY `idacudiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `idClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comprobanteservicio`
--
ALTER TABLE `comprobanteservicio`
  MODIFY `idcomprobanteServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `controle_s`
--
ALTER TABLE `controle_s`
  MODIFY `idcontrolE_S` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `eps`
--
ALTER TABLE `eps`
  MODIFY `ideps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horarioventa`
--
ALTER TABLE `horarioventa`
  MODIFY `idhorarioVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `membresia`
--
ALTER TABLE `membresia`
  MODIFY `idMembresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `idNovedades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `planeshorario`
--
ALTER TABLE `planeshorario`
  MODIFY `idplanesHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `idProgramacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registrospendientes`
--
ALTER TABLE `registrospendientes`
  MODIFY `idregistroPendiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `idtarifas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idtipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipomembresia`
--
ALTER TABLE `tipomembresia`
  MODIFY `idtipoMembresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tiponovedades`
--
ALTER TABLE `tiponovedades`
  MODIFY `idtipoNovedades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprobanteservicio`
--
ALTER TABLE `comprobanteservicio`
  ADD CONSTRAINT `comprobanteservicio_ibfk_1` FOREIGN KEY (`beneficiario`) REFERENCES `persona` (`idusuario`),
  ADD CONSTRAINT `fk_venta_persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
