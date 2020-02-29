-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2020 a las 18:59:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bodega`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_actualizar_producto` (IN `prm_id_producto` INT, IN `prm_cantidad` INT)  BEGIN
update productos
set stock=stock-cantidad
where id_producto=prm_id_producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_buscar` (IN `prm_id_boleta` INT)  BEGIN
select * from boletas where id_boleta=prm_id_boleta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_buscar_por_dia` (IN `prm_dia` DATE)  BEGIN
select * from boletas where 
fecha_creacion=prm_dia order by id_boleta desc; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_cambiar_estado` (IN `prm_id_boleta` INT, IN `prm_estado` BOOLEAN)  BEGIN
	update boletas 
    set estado=prm_estado,fecha_cambio=now()
    
    where id_boleta=prm_id_boleta;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_crear` (IN `prm_id_proforma` INT, IN `prm_id_cliente` INT, IN `prm_id_usuario` INT)  BEGIN
declare var_suma_total decimal;
declare var_exists_proforma int;
declare var_codigo text;
declare var_flag int;
	set var_exists_proforma=(SELECT COUNT(1) FROM proformas WHERE id_proforma=prm_id_proforma) ;
	if var_exists_proforma=1 then
		set var_suma_total=(select sum(subtotal) from detalles_proforma_producto where id_proforma=prm_id_proforma);
		set var_codigo=FUC_codigo_boleta();
        insert into boletas(
        codigo_boleta ,fecha_creacion ,fecha_cambio ,total ,estado ,id_cliente ,id_usuario
        )values(
        var_codigo,now(),now(),var_suma_total,1,prm_id_cliente,prm_id_usuario
        );
        set var_flag=1;
	else
		set var_flag=0;
    end if;
select var_flag;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_listar` ()  BEGIN
SELECT  id_boletas, codigo_boleta,total,estado from boletas order by id_boletas desc; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boleta_obtener_id_producto` (IN `prm_id_proforma` INT)  BEGIN
select id_producto ,cantidad from detalles_proforma_producto
where id_proforma=prm_id_proforma;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cliente_cambiar_estado` (IN `prm_id_cliente` INT)  BEGIN
	delete from clientes
    where id_cliente=prm_id_cliente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cliente_create_update` (IN `prm_id_cliente` INT, IN `prm_nombre` VARCHAR(100), IN `prm_apemat` VARCHAR(100), IN `prm_apepat` VARCHAR(100))  BEGIN
IF prm_id_cliente =0 then
	insert into clientes (
    nombre,apemat,apepat,fecha_create,fecha_update
    )values(
    prm_nombre,prm_apemat,prm_apepat,now(),now()
    );
else
	update clientes
    set nombre=prm_nombre,apemat=prm_apemat,apepat=prm_apepat,fecha_update=now()
    where id_cliente=prm_id_cliente;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cliente_listar` ()  BEGIN
SELECT  nombre, apemat,apepat from cliente; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DetalleProformaProducto_insert` (IN `prm_id_producto` INT, IN `prm_id_proforma` INT, IN `prm_cantidad` INT)  BEGIN
declare var_precio decimal;
declare var_subtotal decimal;
set var_precio=(select precio from productos where id_producto=prm_id_producto );
set var_subtotal=var_precio*prm_cantidad;

insert into detalles_proforma_producto(id_proforma,id_producto,cantidad,subtotal,fecha_creacion
)values(prm_id_proforma,prm_id_producto,prm_cantidad,var_subtotal,now());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DetalleProformaProducto_listar` (IN `prm_id_proforma` INT)  BEGIN
select proformas.id_proforma,productos.nombre,productos.tamaño,productos.fecha_vencimiento,marcas.marca,productos.precio,detalles_proforma_producto.cantidad,detalles_proforma_producto.subtotal
FROM productos
JOIN detalles_proforma_producto ON detalles_proforma_producto.id_producto = productos.id_producto
JOIN proformas ON proformas.id_proforma = detalles_proforma_producto.id_proforma
inner JOIN marcas on marcas.id_marca=productos.id_producto
where proformas.id_proforma = prm_id_proforma;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_findproducto` (IN `prm_criterio` VARCHAR(100))  BEGIN
select * from productos 
where
nombre= prm_criterio or marca=prm_criterio or tipo =prm_criterio;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPrivilegiosForUsuarios` (IN `prm_id_usuario` INT)  BEGIN
SELECT id_privilegio from detalles_usuario_privilegio
where id_usuario=prm_id_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_marca_insert_update` (IN `prm_id_marca` INT, IN `prm_marca` VARCHAR(100), IN `prm_descripcion` VARCHAR(100))  BEGIN
if prm_id_marca=0 then
	insert into marcas (marca,descripcion) values(prm_marca,prm_descripcion);
else 
	update marcas
    set marca=prm_marca,descripcion=prm_descripcion
    where id_marca=prm_id_marca;
    
 end if;   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_marca_listar` ()  BEGIN
select * from marca;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_privilegio_create_update` (IN `prm_id_privilegio` INT, IN `prm_nombre` VARCHAR(100), IN `prm_descripcion` VARCHAR(100))  BEGIN
declare  var_mensaje text;
	if prm_id_privilegio=0 then
		insert into privilegios(id_privilegio,nombre,descripcion)
		values(prm_id_privilegio,prm_nombre,prm_descripcion);
		set var_mensaje='privilegio registrado';
    else
		update privilegio set
        nombre=prm_nombre,
        decripcion=prm_descripcion
        where id_privilegio=prm_id_privilegio;
        
        set var_mensaje='privilegio cambiado';
    end if;    
	select var_mensaje;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_privilegio_listar` ()  BEGIN

	select * 
    from privilegios;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_producto_buscar` (IN `prm_criterio` TEXT)  BEGIN
SELECT * FROM productos WHERE nombre LIKE ('%'+prm_criterio+'%');

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_producto_insert_update` (IN `prm_id_producto` INT, IN `prm_id_subtipo` INT, IN `prm_precio` DECIMAL, IN `prm_stock` INT, IN `prm_stock_minimo` INT, IN `prm_stock_maximo` INT, IN `prm_fecha_vencimiento` DATE, IN `prm_tamaño` DECIMAL, IN `prm_color` VARCHAR(100), IN `prm_url_imagen` VARCHAR(100), IN `prm_id_marca` INT, IN `prm_id_unidad` INT)  BEGIN
if prm_id_producto=0 then
insert into productos(
	
	id_subtipo ,
	nombre , 
	precio ,
	stock , 
	stock_minimo , 
	stock_maximo ,
	fecha_vencimiento ,
	tamaño ,
	color ,
	url_imagen ,
	id_marca , 
	id_unidad
)values(
	prm_id_subtipo ,
	prm_nombre , 
	prm_precio ,
	prm_stock , 
	prm_stock_minimo , 
	prm_stock_maximo ,
	prm_fecha_vencimiento ,
	prm_tamaño ,
	prm_color ,
	prm_url_imagen ,
	prm_id_marca , 
	prm_id_unidad
) ;
else 
update productos
set
	id_subtipo=prm_id_subtipo ,
	nombre=prm_nombre , 
	precio=prm_precio ,
	stock=prm_stock , 
	stock_minimo=prm_stock_minimo , 
	stock_maximo=prm_stock_maximo ,
	fecha_vencimiento=prm_fecha_vencimiento ,
	tamaño=prm_tamaño ,
	color=prm_color ,
	url_imagen=prm_url_imagen ,
	id_marca=prm_id_marca , 
	id_unidad=prm_id_unidad
where
id_producto=prm_id_producto;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_producto_listar` ()  BEGIN
select * from productos order by id_producto limit 10;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_proforma_buscar` (IN `prm_id_proforma` INT)  BEGIN
select * from proformas where id_proforma=prm_id_proforma;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_proforma_insert` (IN `prm_id_usuario` INT, IN `prm_total` DECIMAL)  BEGIN
declare var_id_proforma int;
insert into proformas(
estado ,
total ,
fecha_creacion ,
fecha_update ,
id_usuario
)values(
1,
prm_total,
now(),
now(),
prm_id_usuario
);
set var_id_proforma =(select max(id_proforma)from proformas);
select var_id_proforma;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_proforma_listar` ()  BEGIN
select * from proformas order by id_proforma limit 10;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_subtipo_listar` ()  BEGIN
select * from subtipos;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_subtipo_listar_por_tipo` (IN `prm_id_tipo` INT)  BEGIN
select * from subtipos where id_tipo=prm_id_tipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tipo_listar` ()  BEGIN
select * from tipos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_unidad_listar` ()  BEGIN
select * from unidades;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_actualizar_datos` (IN `prm_id_usuario` INT, IN `prm_nombre` VARCHAR(100), IN `prm_apepat` VARCHAR(50), IN `prm_apemat` VARCHAR(50), IN `prm_telefono` CHAR(11), IN `prm_dirreccion` VARCHAR(100))  BEGIN
update usuarios 
set nombre=prm_nombre,apepat=prm_apepat,apemat=prm_apemat,telefono=prm_telefono,
dirreccion=prm_dirreccion,update_fecha=now()
where 
id_usuario=prm_id_usuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_buscar_por_nombre` (IN `prm_criterio` TEXT)  BEGIN
select id_usuario,email,apepat,apemat,nombre,telefono,dni,dirreccion,tipo from usuarios
where nombre=prm_criterio or apemat=prm_criterio or apepat=prm_criterio or tipo=prm_criterio or email=prm_criterio ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_cambiar_contrasenia` (IN `prm_id_usuario` INT, IN `prm_new_password` TEXT)  BEGIN
update usuarios
set password=prm_new_password,update_fecha=now()
where id_usuario=prm_id_usuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_cambiar_estado` (IN `prm_id_usuario` INT, IN `prm_estado` BOOLEAN)  BEGIN
	UPDATE usuarios SET
    estado=prm_estado
    WHERE id_usuario = prm_id_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_create_update` (IN `prm_id_usuario` INT, IN `prm_email` VARCHAR(250), IN `prm_password` VARCHAR(250), IN `prm_apepat` VARCHAR(100), IN `prm_apemat` VARCHAR(100), IN `prm_nombre` VARCHAR(100), IN `prm_telefono` VARCHAR(25), IN `prm_dni` VARCHAR(8), IN `prm_dirreccion` VARCHAR(100), IN `prm_estado` BOOLEAN, IN `prm_tipo` VARCHAR(45))  BEGIN

DECLARE var_mensaje TEXT;
DECLARE var_exists_usuario INT;
DECLARE var_verificacion INT;
DECLARE var_status INT;
declare var_id_usuario_max int;
	IF prm_id_usuario = 0 THEN
    SET var_exists_usuario = (SELECT COUNT(1) FROM usuarios WHERE dni = prm_dni OR email = prm_email) ;
		IF var_exists_usuario = 0 THEN
			INSERT INTO usuarios(
			email,
            password,
            apepat,
            
            apemat,
            nombre,
            telefono,
            dni,
            dirreccion,
            tipo,
            fecha_create,
            update_fecha,
            estado
            
			) VALUES(
			prm_email,
            prm_password,
            prm_apepat,
            prm_apemat,
            prm_nombre,
            prm_telefono,
            prm_dni,
            prm_dirreccion,
            prm_tipo,
            now(),
            now(),
            true
			);
            set var_id_usuario_max=(select max(id_usuario)from usuarios);
            if prm_tipo='dispensador' then
				insert into detalles_usuario_privilegio(
                id_usuario,id_privilegio,fecha_creacion,estado)
                values(var_id_usuario_max,1,now(),1),(var_id_usuario_max,2,now(),1);
			end if;
            if prm_tipo='cajero' then
				insert into detalles_usuario_privilegio(
                id_usuario,id_privilegio,fecha_creacion,estado)
                values(var_id_usuario_max,1,now(),1),(var_id_usuario_max,3,now(),1),
                (var_id_usuario_max,4,now(),1);
			end if;
             if prm_tipo='administrador' then
				insert into detalles_usuario_privilegio(
                id_usuario,id_privilegio,fecha_creacion,estado)
                values(var_id_usuario_max,1,now(),1),(var_id_usuario_max,5,now(),1),
                (var_id_usuario_max,6,now(),1),(var_id_usuario_max,7,now(),1);
			end if;
                
            
			SET var_mensaje = "Usuario registrado";
            SET var_status = 1;
            SET var_verificacion = 1;
		ELSE
            SET var_mensaje = "Usuario ya existe con es mismo DNI o correo, verificar nuevamente los datos";
            SET var_status = 0;
            SET var_verificacion = 0;
		END IF;
    ELSE
    SET var_exists_usuario = (SELECT COUNT(1) FROM usuarios WHERE (dni = prm_dni OR email = prm_email) AND id_usuario != prm_id_usuario) ;
		IF var_exists_usuario = 0 THEN
			UPDATE usuarios
			SET 
            email=prm_email,
            apepat=prm_apepat,
            apemat=prm_apemat,
            nombre=prm_nombre,
            telefono=prm_telefono,
            dni=prm_dni,
            dirreccion=prm_dirreccion,
            update_fecha=now()
			WHERE id_usuario = prm_id_usuario;
            SET var_status = 1;
            SET var_verificacion = 0;
			SET var_mensaje = "Usuario actualizado";
		ELSE
			SET var_mensaje = "Usuario ya existe con es mismo DNI o correo, verificar nuevamente los datos";
            SET var_status = 0;
            SET var_verificacion = 0;
		END IF;
    END IF;
    SELECT var_mensaje,var_status,var_verificacion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_get_datos` (IN `prm_id_usuario` INT)  BEGIN
select * from usuarios where id_usuario=prm_id_usuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_get_password` (IN `prm_email` VARCHAR(100))  BEGIN
		select  id_usuario ,password from usuarios where email=prm_email;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_listar` ()  BEGIN

	select id_usuario ,email,nombre,apepat,apemat,telefono,dni,dirreccion,estado,tipo
    from usuarios order by id_usuario desc limit 8;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_obtener_password` (IN `prm_id_usuario` INT)  BEGIN
select * from usuarios where id_usuario=prm_id_usuario;

END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `FUC_codigo_boleta` () RETURNS VARCHAR(20) CHARSET latin1 BEGIN
	DECLARE prm_id_codigo_last INT;
    DECLARE var_count_pedido INT;
    DECLARE prm_codigo_generado VARCHAR(20);
    SET prm_id_codigo_last = (SELECT MAX(id_boletas) FROM boletas);
    SET var_count_pedido = (SELECT COUNT(1) FROM boletas);
    IF var_count_pedido = 0 THEN
		SET prm_id_codigo_last = 0;
    END IF;
    if day(now())<10 then
		if prm_id_codigo_last<999 then
			if month(now())<10 then
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-0',MONTH(NOW()),'0',DAY(NOW()),'-0',(prm_id_codigo_last+1));
			else 
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-',MONTH(NOW()),'0',DAY(NOW()),'-0',(prm_id_codigo_last+1));
			END IF;
		else 
			if month(now())<10 then
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-0',MONTH(NOW()),'0',DAY(NOW()),'-',(prm_id_codigo_last+1));
			else 
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-',MONTH(NOW()),'0',DAY(NOW()),'-',(prm_id_codigo_last+1));
			END IF;
		end if;
     else
		if prm_id_codigo_last<999 then
			if month(now())<10 then
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-0',MONTH(NOW()),DAY(NOW()),'-0',(prm_id_codigo_last+1));
			else 
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-',MONTH(NOW()),DAY(NOW()),'-0',(prm_id_codigo_last+1));
			END IF;
		else 
			if month(now())<10 then
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-0',MONTH(NOW()),DAY(NOW()),'-',(prm_id_codigo_last+1));
			else 
				SET prm_codigo_generado = CONCAT(YEAR(NOW()),'-',MONTH(NOW()),DAY(NOW()),'-',(prm_id_codigo_last+1));
			END IF;   
		end if;
	end if;
RETURN prm_codigo_generado;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `id_boleta` int(11) NOT NULL,
  `id_proforma` int(11) NOT NULL,
  `codigo_boleta` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_cambio` datetime NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apemat` varchar(45) NOT NULL,
  `apepat` varchar(45) NOT NULL,
  `fecha_create` datetime DEFAULT NULL,
  `fecha_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_proforma_producto`
--

CREATE TABLE `detalles_proforma_producto` (
  `id_proforma` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_usuario_privilegio`
--

CREATE TABLE `detalles_usuario_privilegio` (
  `id_usuario` int(11) NOT NULL,
  `id_privilegio` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles_usuario_privilegio`
--

INSERT INTO `detalles_usuario_privilegio` (`id_usuario`, `id_privilegio`, `fecha_creacion`, `estado`) VALUES
(1, 1, '2020-02-26 11:31:15', 1),
(1, 5, '2020-02-26 11:31:15', 1),
(1, 6, '2020-02-26 11:31:15', 1),
(1, 7, '2020-02-26 11:31:15', 1),
(2, 1, '2020-02-27 09:29:55', 1),
(2, 2, '2020-02-27 09:29:55', 1),
(3, 1, '2020-02-27 09:33:44', 1),
(3, 3, '2020-02-27 09:33:44', 1),
(3, 4, '2020-02-27 09:33:44', 1),
(5, 1, '2020-02-27 09:41:14', 1),
(5, 3, '2020-02-27 09:41:14', 1),
(5, 4, '2020-02-27 09:41:14', 1),
(7, 1, '2020-02-27 09:54:08', 1),
(7, 3, '2020-02-27 09:54:08', 1),
(7, 4, '2020-02-27 09:54:08', 1),
(8, 1, '2020-02-27 10:03:01', 1),
(8, 5, '2020-02-27 10:03:01', 1),
(8, 6, '2020-02-27 10:03:01', 1),
(8, 7, '2020-02-27 10:03:01', 1),
(9, 1, '2020-02-27 10:06:41', 1),
(9, 2, '2020-02-27 10:06:41', 1),
(10, 1, '2020-02-27 10:11:07', 1),
(10, 3, '2020-02-27 10:11:07', 1),
(10, 4, '2020-02-27 10:11:07', 1),
(11, 1, '2020-02-27 10:16:40', 1),
(11, 2, '2020-02-27 10:16:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`, `descripcion`) VALUES
(1, 'ADES', NULL),
(2, 'Almendrina', NULL),
(3, 'Anchor', NULL),
(4, 'Bella Holandes', NULL),
(5, 'Bonle', NULL),
(6, 'Danlac', NULL),
(7, 'Gloria', NULL),
(8, 'Ideal', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id_privilegio` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id_privilegio`, `nombre`, `descripcion`) VALUES
(1, 'usuario', 'privilegios de cualquier usuario como cambiar sus datos propios y cambiar su contraseña'),
(2, 'emitir proforma', ''),
(3, 'emitir_boleta', ''),
(4, 'emitir consolidado de cierre de caja', ''),
(5, 'gestionar usuarios', ''),
(6, 'gestionar productos', ''),
(7, 'reportes', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_subtipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(2,0) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `fecha_vencimiento` date NOT NULL,
  `tamaño` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `url_imagen` varchar(100) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proformas`
--

CREATE TABLE `proformas` (
  `id_proforma` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_update` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipos`
--

CREATE TABLE `subtipos` (
  `id_subtipo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subtipos`
--

INSERT INTO `subtipos` (`id_subtipo`, `id_tipo`, `nombre`, `descripcion`) VALUES
(1, 1, 'Aceites', NULL),
(2, 1, 'Arroz', NULL),
(3, 1, 'Fideos, Pastas y Sus Salsas', NULL),
(4, 1, 'Alimentos en Conserva', NULL),
(5, 1, 'Menestras y Legumbres', NULL),
(6, 1, 'Harinas y Féculas', NULL),
(7, 1, 'Pures, Soya, Bases y Sopas', NULL),
(8, 1, 'Condimentos, Vinagres y Salsas', NULL),
(9, 2, 'Azúcar / Sustitutos', NULL),
(10, 2, 'Café, Infusiones y Hierbas', NULL),
(11, 2, 'Cereales', NULL),
(12, 2, 'Mermeladas, Mieles y Dulces', NULL),
(13, 2, 'Panes, Panetones y Biscochos Empacados', NULL),
(14, 2, 'Modificadores de Leche', NULL),
(15, 2, 'Galletas, Snacks y Golosinas', NULL),
(16, 2, 'Repostería', NULL),
(17, 3, 'Frutas', NULL),
(18, 3, 'Más Frutas', NULL),
(19, 3, 'Verduras', NULL),
(20, 3, 'Más Verduras', NULL),
(21, 3, 'Mundo Chino', NULL),
(22, 3, 'Mundo Orgánico', NULL),
(23, 4, 'Huevos Frescos', NULL),
(24, 4, 'Leche Evaporada', NULL),
(25, 4, 'Leche en Bolsa/botella vidrio', NULL),
(26, 4, 'Leche UHT', NULL),
(27, 4, 'Yogurt', NULL),
(28, 4, 'Bebidas Especiales', NULL),
(29, 4, 'Mantequillas y Margarinas', NULL),
(30, 4, 'Otros Productos de Leche', NULL),
(31, 5, 'Quesos Regulares y Frescos', NULL),
(32, 5, 'Quesos Gourmet', NULL),
(33, 5, 'Quesos Regionales', NULL),
(34, 5, 'Quesos Regionales', NULL),
(35, 5, 'Chorizos y Vienesas', NULL),
(36, 5, 'Fiambres Gourmet', NULL),
(37, 5, 'Otros Fiambres Gourmet', NULL),
(38, 5, 'Aceitunas y Fiambreria a Granel', NULL),
(39, 6, 'Carnes de Vacuno', NULL),
(40, 6, 'Carnes de Pollo', NULL),
(41, 6, 'Carnes de Cerdo', NULL),
(42, 6, 'Carnes de Pavo', NULL),
(43, 6, 'Carnes Especiales', NULL),
(44, 6, 'Pescados y Mariscos', NULL),
(45, 6, 'Orgánico', NULL),
(46, 7, 'Belleza', NULL),
(47, 7, 'Cuidado del Cabello', NULL),
(48, 7, 'Cuidado Bucal', NULL),
(49, 7, 'Cuidado Corporal', NULL),
(50, 7, 'Afeitado y Depilación', NULL),
(51, 7, 'Higiene Femenina', NULL),
(52, 7, 'Salud', NULL),
(53, 8, 'Lavado y Cuidado de Ropa', NULL),
(54, 8, 'Productos de Papel para el Hogar', NULL),
(55, 8, 'Lavado y Cuidado del Hogar', NULL),
(56, 8, 'Insecticidas, Pesticidas y Raticidas', NULL),
(57, 9, 'Agua Mineral', NULL),
(58, 9, 'Jugos y Bebidas Especiales', NULL),
(59, 9, 'Gaseosas', NULL),
(60, 9, 'Cervezas, Complementos de Parrilla y Tabaco', NULL),
(61, 9, 'Vinos por Países', NULL),
(62, 9, 'Vino Tinto', NULL),
(63, 9, 'Otros Vinos', NULL),
(64, 9, 'Licores y Bases Para Licores', NULL),
(77, 10, 'Panaderia', NULL),
(78, 10, 'Pasteleria', NULL),
(79, 10, 'Otros complementos', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `nombre`, `descripcion`) VALUES
(1, 'abarrotes', NULL),
(2, 'Desayunos y Dulces', NULL),
(3, 'Frutas y Verduras', NULL),
(4, 'Lácteos y Huevos', NULL),
(5, 'Quesos y Fiambres', NULL),
(6, 'Carnes, Pollos y Pescados', NULL),
(7, 'Cuidado Personal y Belleza', NULL),
(8, 'Limpieza', NULL),
(9, 'Cervezas, Vinos y Bebidas', NULL),
(10, 'Panadería y Pastelería', NULL),
(11, 'Helados y Alimentos Congelados', NULL),
(12, 'Mascotas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id_unidad` int(11) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id_unidad`, `unidad`, `descripcion`) VALUES
(1, 'l', NULL),
(2, 'ml', NULL),
(3, 'kgr', NULL),
(4, 'gr', NULL),
(5, 'unidades', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `apepat` varchar(50) NOT NULL,
  `apemat` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` char(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `dirreccion` varchar(100) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `fecha_create` datetime NOT NULL,
  `update_fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `apepat`, `apemat`, `nombre`, `telefono`, `dni`, `dirreccion`, `tipo`, `fecha_create`, `update_fecha`, `estado`) VALUES
(1, 'gchampionbautista@gmail.com', '$2y$12$6nN2eZhcVfZgAuFEVf67MOm2NTcRCpbwKnZOPAZcaihXqtU1fqxBm', 'champi', 'sucso', 'gabriel', '9876543', '72748427', '123', 'administrador', '2020-02-26 11:31:15', '2020-02-27 07:19:17', 1),
(2, 'mario_bebecito@gmail.com', '$2y$12$zSG69CftyORjS010JqNz2OkCxaJC5UCKvkApfmIBbqUu5tOmVMkw.', 'torres', 'sucso', 'mario', '66666666', '11111111', 'mi casa', 'dispensador', '2020-02-27 09:29:55', '2020-02-27 09:29:55', 1),
(3, 'jorgeCurioso@gmail.com', '$2y$12$pLiEbi6ks/lvV61i342EoevV7xc0cgwyA8uFFMDrDg7Vu5Og3cFY2', 'coqueta', 'manrique', 'jorge', '77777777', '8888888', 'angeles', 'cajero', '2020-02-27 09:33:44', '2020-02-27 09:33:44', 1),
(4, 'camila@gmail.com', '$2y$12$tvGwGBZztjLJHZq3NzTmIOyr/dO8bNosY0/DbsGx.bCqUgzulokPW', 'ibañez', 'nose', 'camila', '66666666', '71696502', 'mi casa', 'especial', '2020-02-27 09:35:40', '2020-02-27 09:35:40', 1),
(5, 'coronado_hago_todo@gmail.com', '$2y$12$RzcIcgDXZa1rQtzROuhtCeDOQ/Ws4b9gbEkSb977H0gtbn44aCSf6', 'missgarbage', 'nose', 'coronado', '78945612', '78945613', 'nose', 'cajero', '2020-02-27 09:41:14', '2020-02-27 09:41:14', 1),
(6, 'alan_estoy_trabajando@gmail.com', '$2y$12$mdyYgT61AUIejSyo4Vc7UOWmpVllZde6viZFYZTzn0szJxT8H4x2C', 'robles', 'cusipuma', 'alan', '78932145', '00000001', 'villa maria', 'especial', '2020-02-27 09:47:47', '2020-02-27 09:47:47', 1),
(7, 'yungali@gmail.com', '$2y$12$Ck6mJatwqvC6evINXtDOkugAoqeW8S0Rwui7EV7sI6CyERYuJNesG', 'gutierrez', 'manrique', 'yungali', '78932145', '8888889', 'villa maria', 'cajero', '2020-02-27 09:54:08', '2020-02-27 09:54:08', 1),
(8, 'papi_dedos_locos_@gmail.com', '$2y$12$43EUinJnK8BKK1YBXHZRd.UNaXqGnTDUuTy1VdZryYDyThOAy.cnu', 'ticona', 'torres', 'rodolfo', '78963254', '36987451', 'san juan', 'administrador', '2020-02-27 10:03:01', '2020-02-27 10:03:01', 1),
(9, 'jordy_enp@gmail.com', '$2y$12$3HX4StRMJj3ZUNact57AseBoYjMHkrIWwUkO8FLo5KN6SLgj04TCq', 'escobar', 'soto', 'jhordan', '333333333', '99999999', '78945612', 'dispensador', '2020-02-27 10:06:41', '2020-02-27 10:06:41', 1),
(10, 'david_panda@gmail.com', '$2y$12$dfyCNdW7lwgi/4XmaBEYrOCwlKzNSwqD26G2CZqLvxBfyB7Ig2FXW', 'condorchua', 'caceres', 'david', '78945614', '78945611', 'san juan', 'cajero', '2020-02-27 10:11:07', '2020-02-27 10:11:07', 1),
(11, 'george_garrison@gmail.com', '$2y$12$M6xJoC/fBUo5k8jTL65MEe04Q8K.D1nnI72blrvHFw73zrY.Yx5W.', 'champi', 'cusipuma', 'george', '78945612', '78945623', 'av roe', 'dispensador', '2020-02-27 10:16:40', '2020-02-27 10:16:40', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`id_boleta`,`id_proforma`),
  ADD KEY `fk_proforma_boleta_idx` (`id_proforma`),
  ADD KEY `fk_cliente_boleta_idx` (`id_cliente`),
  ADD KEY `fk_usuario_boleta_idx` (`id_usuario`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalles_proforma_producto`
--
ALTER TABLE `detalles_proforma_producto`
  ADD PRIMARY KEY (`id_proforma`,`id_producto`),
  ADD KEY `fk_producto_detalle1_idx` (`id_producto`);

--
-- Indices de la tabla `detalles_usuario_privilegio`
--
ALTER TABLE `detalles_usuario_privilegio`
  ADD PRIMARY KEY (`id_usuario`,`id_privilegio`),
  ADD KEY `fk_detalle2_usuario_idx` (`id_usuario`),
  ADD KEY `fk_privilegio_detalle2_idx` (`id_privilegio`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`,`id_subtipo`),
  ADD KEY `fk_subtipo_producto_idx` (`id_subtipo`),
  ADD KEY `fk_marca_producto_idx` (`id_marca`),
  ADD KEY `fk_unidad_producto_idx` (`id_unidad`);

--
-- Indices de la tabla `proformas`
--
ALTER TABLE `proformas`
  ADD PRIMARY KEY (`id_proforma`),
  ADD KEY `fk_usuario_proforma_idx` (`id_usuario`);

--
-- Indices de la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD PRIMARY KEY (`id_subtipo`,`id_tipo`),
  ADD KEY `fk_tipo_subtipo_idx` (`id_tipo`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletas`
--
ALTER TABLE `boletas`
  MODIFY `id_boleta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id_privilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proformas`
--
ALTER TABLE `proformas`
  MODIFY `id_proforma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subtipos`
--
ALTER TABLE `subtipos`
  MODIFY `id_subtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD CONSTRAINT `fk_cliente_boleta` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proforma_boleta` FOREIGN KEY (`id_proforma`) REFERENCES `proformas` (`id_proforma`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_boleta` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_proforma_producto`
--
ALTER TABLE `detalles_proforma_producto`
  ADD CONSTRAINT `fk_producto_detalle1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proforma_detalle1` FOREIGN KEY (`id_proforma`) REFERENCES `proformas` (`id_proforma`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_usuario_privilegio`
--
ALTER TABLE `detalles_usuario_privilegio`
  ADD CONSTRAINT `fk_privilegio_detalle2` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegios` (`id_privilegio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_detalle2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_marca_producto` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subtipo_producto` FOREIGN KEY (`id_subtipo`) REFERENCES `subtipos` (`id_subtipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unidad_producto` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id_unidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proformas`
--
ALTER TABLE `proformas`
  ADD CONSTRAINT `fk_usuario_proforma` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD CONSTRAINT `fk_tipo_subtipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
