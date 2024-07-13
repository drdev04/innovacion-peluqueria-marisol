--
-- Base de datos: `bpmsdb`
-- SET SQL_SAFE_UPDATES = 1;
--

-- DROP DATABASE bpmsdb --
-- CREATE DATABASE bpmsdb --
-- USE bpmsdb --

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2020 a las 19:13:02
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

	SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
	SET AUTOCOMMIT = 0;
	START TRANSACTION;
	SET time_zone = "+00:00";

	/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
	/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
	/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
	/*!40101 SET NAMES utf8mb4 */;

-- ----------------------------------------------------------------------------------------------------------- ---


-- Estructura de tabla para la tabla `tbladmin` --

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL auto_increment primary key,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Administrador', 'admin', 987654321, 'msevillab@cweb.com', '123456', '2024-05-24 06:21:50');

-- drop table `tbladmin` - select * from `tbladmin` - delete from `tbladmin` where `ID` = 6 - use bpmsdb --

-- Estructura de tabla para la tabla `tbcliente` --

CREATE TABLE `tbcliente` (
  `ID` int(10) NOT NULL primary key auto_increment,
  `Name` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `Dni` int(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Genero` enum('Mujer','Hombre','No definido') DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
);
INSERT INTO `tbcliente` (`ID`, `Name`,`LastName`,`Dni`,`Email`,`MobileNumber`, `Genero`, `UserName`, `Password`) VALUES
(1, 'Miguel Angel','Lopez Perez',45924548,'miguel@hotmail.com',934567867,'Hombre','miguel','123');

-- drop table tbcliente - select * from `tbcliente` - delete from `tbcliente` where `ID` = 6 - use bpmsdb --

-- Estructura de tabla para la tabla `tblappointment` --

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL auto_increment primary key,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint(11) DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Services`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, '496532914', 'Roman Garcia', 'rgarcia@cweb.com', 3211076843, '1/23/2020', '6:30pm', 'Fruit Facial', '2020-01-23 23:50:09', 'Excelente Cliente', '1', '2020-01-23 23:52:03'),
(2, '304302609', 'Lucia grajales', 'lgrajales@cweb.com', 3065439781, '1/24/2020', '9:00am', 'Fruit Facial', '2020-01-24 13:56:31', 'La srta realizÃ³ el proceso correspondiente.', '1', '2020-01-24 13:57:43'),
(3, '604686038', 'JUAN ARANGO', 'JARANGO@CWEB.COM', 3147641979, '1/24/2020', '1:00pm', 'Masaje Facial', '2020-01-24 14:54:02', 'Excelente cliente, recomendado', '1', '2020-01-24 14:54:57'),
(4, '932355891', 'Dilan cabal', 'DCABAL@CWEB.COM', 3178674931, '1/24/2020', '10:30am', 'Masaje Facial', '2020-01-24 15:11:49', 'Se realizÃ³ el pedido a satisfacciÃ³n.', '1', '2020-01-24 15:12:54'),
(5, '182457009', 'Juan Gallego', 'JGALLEGO@CWEB.COM', 3163798467, '1/24/2020', '1:30am', 'Masaje Facial', '2020-01-24 16:20:12', 'Acepto', '1', '2020-01-24 16:21:20'),
(6, '958882735', 'Rocio Calam', 'rcalam@cweb.com', 3010123201, '1/24/2020', '10:30pm', 'Layer Haircut', '2020-01-24 16:43:01', 'Se le cobra', '2', '2020-01-24 16:44:55');

-- drop table `tblappointment` - select * from `tblappointment` - delete from `tblappointment` where `ID` = - use bpmsdb --

-- Estructura de tabla para la tabla `tblinvoice` --

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL auto_increment primary key,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(26, 1, 1, 535139230, '2020-01-23 23:55:32'),
(27, 6, 1, 232733358, '2020-01-24 14:58:47'),
(28, 4, 10, 635394484, '2020-01-24 16:51:26'),
(29, 4, 15, 609822877, '2020-01-24 17:02:06'),
(30, 4, 16, 609822877, '2020-01-24 17:02:06');

-- drop table `tblinvoice` - select * from `tblinvoice` - delete from `tblinvoice` where `ID` = 6 - use bpmsdb --

-- Estructura de tabla para la tabla `tblpage`

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL auto_increment primary key,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'Acerca de', 'En nuestro SPA, nos destacamos como los mejores del mundo gracias a la innovadora aplicación ConfiguroWeb. Esta herramienta ha transformado nuestra operativa diaria, simplificando enormemente nuestros procesos y brindándonos un control total sobre cada aspecto de nuestro negocio. Desde la gestión de citas hasta la optimización de nuestros servicios, todo es más fácil y eficiente con ConfiguroWeb. Por eso, no solo ofrecemos una experiencia inigualable a nuestros clientes, sino que también nos hemos convertido en un referente en el sector del bienestar. ¡Con ConfiguroWeb, llevamos la excelencia a otro nivel!', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contacto', 'Av. los Pinos Mz.e, Lima 15011', 'salon@example.com', 944704796, NULL, '10:00 am to 11:00 pm');
-- drop table `tblpage` - select * from `tblpage` --

-- Estructura de tabla para la tabla `tblservices`

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL auto_increment primary key,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Cost` double DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `tblservices` (`ID`, `ServiceName`, `Cost`, `CreationDate`,`img`) VALUES
(1, 'Corte clasico y Barba',10,'2024-05-12 16:23:23','https://st3.depositphotos.com/12982378/19322/i/450/depositphotos_193227682-stock-photo-close-shot-barber-shaving-man.jpg'),
(2, 'Degradado',15,'2024-05-12 19:47:52','https://i.pinimg.com/236x/4d/3a/5e/4d3a5eed06427f30013e90297e2a51f3.jpg'),
(3, 'Low Fade',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/b3/d1/57/b3d15759b9c60f1783fa0162376d1538.jpg'),
(4, 'Mid Fade',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/17/fd/6f/17fd6f9fc5efef54fb249d05f13346f0.jpg'),
(5, 'Low Taper',25,'2024-05-12 17:04:27','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8xLmlLZ6l7ET9cj1GySKcyAJlO7Lx__j1gQ&usqp=CAU'),
(6, 'Blow Out',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/3a/54/a1/3a54a106ebe65f9addc10175a5993628.jpg'),
(7, 'Mullet',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/e5/7f/3c/e57f3cb1a1ce7e02d510557c5cc429cb.jpg'),
(8, 'Hight Fade',25,'2024-05-12 17:04:27','https://i.pinimg.com/originals/97/ea/82/97ea82c40759c32c668de30405128eb6.jpg'),
(9, 'Pompadour',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/48/d6/76/48d6761fe230ad0734d0817e603f08ec.jpg'),
(10, 'Medium Hair',25,'2024-05-12 17:04:27','https://i.blogs.es/640267/media-melena/450_1000.jpeg'),
(11, 'Pixie bob',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/da/a6/84/daa6846ef1a4a6ae0c68f1fcd58d2324.jpg'),
(12, 'Midi shaggy',25,'2024-05-12 17:04:27','https://i1.wp.com/www.hadviser.com/wp-content/uploads/2021/02/5-layered-blonde-bob-shag-CMD0WmujhOP.jpg?resize=1015%2C1016&ssl=1'),
(13, 'Long Bob',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/06/19/95/061995c761e402d0c3680779db749802.jpg'),
(14, 'Pixie',25,'2024-05-12 17:04:27','https://thehairstyleedit.com/wp-content/uploads/2024/01/pixie-haircut-auburn-1.jpg'),
(15, 'tomboy',25,'2024-05-12 17:04:27','https://i.pinimg.com/736x/74/fc/7c/74fc7ccc4f0f9b67f7878821ab3dac9b.jpg'),
(16, 'Carré',25,'2024-05-12 17:04:27','https://i.pinimg.com/236x/61/90/2a/61902a22e535833768678728f7adbba0.jpg'),
(17, 'curly shaggy',25,'2024-05-12 17:04:27','https://content.latest-hairstyles.com/wp-content/uploads/effortless-razor-shag-for-curly-hair.jpg'),
(18, 'Corte con flequillo',25,'2024-05-12 17:04:27','https://i.pinimg.com/236x/9a/87/c9/9a87c9488ef71909e9a02bc77d36679d.jpg'),
(19, 'Manicure',30,'2024-05-12 11:22:38','https://media.glamour.mx/photos/6397741979e39104737cbc43/16:9/w_1280,c_limit/clean_manicure_un%CC%83as_en_tendencia.jpg'),
(20, 'Pedicure',30,'2024-05-12 11:22:53','https://shireshuttlebus.com.au/wp-content/uploads/2019/04/pamper-1024x683.jpg'),
(21, 'Depilaciones',30,'2024-05-12 11:23:34','https://aprende.com/wp-content/uploads/2022/01/depilacion-con-cera.jpg'),
(22, 'Maquillaje',25,'2024-05-12 11:23:47','https://centralmakeup.mx/wp-content/uploads/2020/04/maquillaje-de-noche-1.jpg'),
(23, 'Faciales',30,'2024-05-12 11:24:01','https://artmedicderm.pe/blog/wp-content/uploads/2023/04/esteticista-pincel-aplica-mascarilla-hidratante-blanca-cara-cliente-joven-salon-belleza-spa-1-1.jpg'),
(24, 'Rizado',35,'2024-05-12 11:24:19','https://media.glamour.mx/photos/64f041912a89f2668b2ae184/3:2/w_2166,h_1444,c_limit/corte-shaggy-rizado.jpg'),
(25, 'Planchado',20,'2024-05-12 11:25:08','https://hcsalonspa.com/wp-content/uploads/2020/01/LACIADO.jpg'),
(26, 'Tintes',25,'2024-05-12 11:25:35','https://tahecosmetics.com/trends/wp-content/uploads/2021/12/tipos-tintes.jpeg'),
(27, 'Mechas',15,'2024-05-12 15:45:50','https://oscarblancopeluqueros.com/wp-content/uploads/2021/04/mechas-carlifonianas.jpg');

-- drop table `tblservices` - select * from `tblservices` - delete from `tblservices` where `ID` = ; --

-- Estructura de tabla para la tabla `tb_producto` --

CREATE TABLE `tb_producto` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidad` int(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `img` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
);
INSERT INTO `tb_producto` VALUES 
(1,'1001', 'Champú Hidratante 500ml', 20, 25.00,'https://dojiw2m9tvv09.cloudfront.net/55959/product/x-0005428-rk-asoft-shmp-500ml-rn21-v80561628773.png'),
(2,'1002', 'Acondicionador Reparador 500ml', 15, 30.00,'https://oechsle.vteximg.com.br/arquivos/ids/16305026-1500-1500/image-11273072934842f8a3585f8453eb5bb2.jpg?v=638313024179770000'),
(3,'1003', 'Gel Fijador para Cabello 300ml', 10, 18.00,'https://www.destino.pe/wp-content/uploads/2020/11/gel-fijador-para-cabello.png'),
(4,'1004', 'Laca para Cabello 400ml', 12, 22.50,'https://plazavea.vteximg.com.br/arquivos/ids/493785-512-512/20180882.jpg'),
(5,'1005', 'Cera para Cabello 100g', 25, 15.00,'https://www.articulosteo.com/wp-content/uploads/2024/04/Cera-para-Cabello-Modeladora-Imposing-Pro-OFarrey-100-g.webp'),
(6,'1006', 'Tinte para Cabello Color Castaño 100ml', 30, 12.00,'https://alessandracosmetic.com/assets/uploads/8aca380b09ca6ac53e3b783c1c4dcb0f.jpg'),
(7,'1007', 'Peine de Carbono Anti-estático', 50, 5.00,'https://juntozstgsrvproduction.blob.core.windows.net/default-blob-images/orig_Peine%20fibra%20de%20carbono_708121.jpg'),
(8,'1008', 'Tijeras de Peluquería Profesionales', 5, 60.00,'https://imagedelivery.net/4fYuQyy-r8_rpBpcY7lH_A/falabellaPE/120802543_02/w=800,h=800,fit=pad'),
(9,'1009', 'Plancha de Cabello Cerámica', 8, 80.00,'https://imagedelivery.net/4fYuQyy-r8_rpBpcY7lH_A/falabellaPE/114390076_01/w=800,h=800,fit=pad'),
(10,'1010', 'Secador de Cabello Iónico', 7, 120.00,'https://rimage.ripley.com.pe/home.ripley/Attachment/MKP/3325/PMP20000289593/full_image-1.jpeg'),
(11, '1011', 'Aceite de Argán 50ml', 20, 35.00,'https://d20f60vzbd93dl.cloudfront.net/uploads/tienda_003510/tienda_003510_c725a2f3f5d65a2dbe022af515127ac1ef55e5b2_producto_large_90.jpeg'),
(12, '1012', 'Mascarilla Capilar 250ml', 15, 28.00,'https://rimage.ripley.com.pe/home.ripley/Attachment/MKP/4357/PMP20000217415/full_image-1.jpeg'),
(13, '1013', 'Serum Anti-Frizz 100ml', 12, 32.00,'https://pe.loccitane.com/cdn/shop/products/17AF100G20_c9103933-cf1a-4735-85b6-c8adc7294839_1200x1200.jpg?v=1646422736'),
(14, '1014', 'Spray Voluminizador 200ml', 18, 24.50,'https://vipbeautystore.com/productos/max_x8o5zsgc.jpg'),
(15, '1015', 'Crema para Peinar 200ml', 22, 20.00,'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/r/crema-para-peinar-hidratacion-intensa-x-200-ml-johnsons-baby-73284-default-1.jpg'),
(16, '1016', 'Tinte para Cabello Color Rubio 100ml', 25, 12.00,'https://www.solopelos.com/381211-large_default/silky-tinte-de-pelo-9-3-rubio-muy-claro-dorado-100-ml.jpg'),
(17, '1017', 'Set de Brochas de Peluquería', 10, 45.00,'https://ibsimportadora.pe/wp-content/uploads/2022/11/level3-set-para-tinte-de-cabello-6-piezas.jpg'),
(18, '1018', 'Rizador de Cabello Profesional', 6, 85.00,'https://s.libertaddigital.com/2021/02/21/rizador-de-pelo-remington-s6606-curl-straight-confidence.jpg'),
(19, '1019', 'Protector Térmico 150ml', 15, 18.00,'https://imagedelivery.net/4fYuQyy-r8_rpBpcY7lH_A/falabellaPE/119909803_01/w=800,h=800,fit=pad'),
(20, '1020', 'Shampoo Seco 150ml', 20, 22.00,'https://d20f60vzbd93dl.cloudfront.net/uploads/tienda_012024/tienda_012024_1ac17f15f68595306a9c8b43e8391264a9b50191_producto_large_90.png');

-- drop table `tb_producto` - select * from `tb_producto` - delete from `tb_producto` where `ID` = 21 - use bpmsdb --

-- Estructura de tabla para la tabla `tbcliente` --

CREATE TABLE `tb_venta` (
  `ID` int NULL AUTO_INCREMENT,
  `claveTransaccion` varchar(100) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Total` double NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
);

-- drop table `tb_venta` - select * from `tb_venta` - delete from `tb_venta` where `ID` = 1 - use bpmsdb --

-- Estructura de tabla para la tabla `tbDetalleVenta` --

CREATE TABLE `tbDetalleVenta` (
  `ID` int(11) NULL AUTO_INCREMENT,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIO_UNITARIO` double NOT NULL,
  `CANTIDAD` int(20) NOT NULL,
  `DESCARGADO` int(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk17` (`IDVENTA`),
  KEY `fk18` (`IDPRODUCTO`),
  CONSTRAINT `fk17` FOREIGN KEY (`IDVENTA`) REFERENCES `tb_venta` (`ID`),
  CONSTRAINT `fk18` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tb_producto` (`ID`)
);

-- drop table `tbDetalleVenta` - select * from `tbDetalleVenta` - delete from `tbDetalleVenta` where `ID` = 3 - use bpmsdb --

-- ----------------------------------------------------------------------------------------------------------- ---

select tb_producto.descripcion, tbDetalleVenta.CANTIDAD, tbDetalleVenta.PRECIO_UNITARIO, tb_venta.Fecha, tbcliente.Name, tbcliente.LastName
from tbcliente 
inner join tb_venta ON tb_venta.Correo = tbcliente.Email
inner join tbDetalleVenta ON tbDetalleVenta.IDVENTA = tb_venta.ID 
inner join tb_producto ON tb_producto.ID = tbDetalleVenta.IDPRODUCTO;

--
-- Indices de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD KEY `id` (`id`);

	/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
	/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
	/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
