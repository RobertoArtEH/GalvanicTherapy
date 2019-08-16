-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2019 at 08:02 PM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galvanic_therapy`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_products`
--

CREATE TABLE `audit_products` (
  `statement` varchar(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `productname` varchar(120) NOT NULL,
  `last_description` text NOT NULL,
  `new_description` text NOT NULL,
  `last_price` decimal(19,2) NOT NULL,
  `new_price` decimal(19,2) NOT NULL,
  `last_stock` int(11) NOT NULL,
  `new_stock` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_products`
--

INSERT INTO `audit_products` (`statement`, `user`, `productname`, `last_description`, `new_description`, `last_price`, `new_price`, `last_stock`, `new_stock`, `date`) VALUES
('Update', 'galvanic@localhost', 'ageLOC® LumiSpa® Accent Kit Sensible', '', 'H', '8189.00', '8189.00', 4, 4, '2019-08-08 06:38:35'),
('Delete', 'galvanic@localhost', 'g3 caja de 2 botellas', 'g3 es un jugo rico en nutrientes de la preciada “súper fruta” gâc del sur de Asia, cuyos ingredientes están científicamente comprobados como potenciadores de la función celular. Entre los potentes fitonutrientes de la fruta gâc se encuentra una forma única y altamente biodisponible de carotenoides llamados lipocarotenes™ que proporciona una fuerte protección antioxidante al mismo tiempo que es auxiliar para el funcionamiento saludable del sistema inmunológico. g3 tiene un refrescante sabor deliciosamente dulce, un poco ácido y toda la familia puede disfrutarlo a diario.', '', '1801.00', '0.00', 10, 0, '2019-08-08 06:49:15'),
('Insert', 'galvanic@localhost', 'g3 caja de 2 botellas', '', 'g3 es un jugo rico en nutrientes de la preciada “súper fruta” gâc del sur de Asia, cuyos ingredientes están científicamente comprobados como potenciadores de la función celular. Entre los potentes fitonutrientes de la fruta gâc se encuentra una forma única y altamente biodisponible de carotenoides llamados lipocarotenes™ que proporciona una fuerte protección antioxidante al mismo tiempo que es auxiliar para el funcionamiento saludable del sistema inmunológico. g3 tiene un refrescante sabor deliciosamente dulce, un poco ácido y toda la familia puede disfrutarlo a diario.', '0.00', '1801.00', 0, 10, '2019-08-08 06:53:40'),
('Update', 'galvanic@localhost', 'ageLOC® LumiSpa® Accent Kit Sensible', 'H', '', '8189.00', '8189.00', 4, 4, '2019-08-08 06:55:43'),
('Update', 'galvanic@localhost', 'Kit Spa en Casa / Blanco', 'Suaviza la apariencia de las arrugas y las líneas de expresión, rejuvenece la apariencia del cuerpo y revitaliza el cuero cabelludo con la nueva tecnología patentada ageLOC Galvanic Spa System II. Este nuevo sistema tiene una pantalla más grande y brillante, de uso intuitivo y diseño ergonómico. Los resultados son sorprendentes, la piel radiante y un rostro y cuerpo más juvenil dejara a las personas preguntándose sobre su edad y su secreto.', 'Suaviza la apariencia de las arrugas y las líneas de expresión, rejuvenece la apariencia del cuerpo y revitaliza el cuero cabelludo con la nueva tecnología patentada ageLOC Galvanic Spa System II. Este nuevo sistema tiene una pantalla más grande y brillante, de uso intuitivo y diseño ergonómico. Los resultados son sorprendentes, la piel radiante y un rostro y cuerpo más juvenil dejara a las personas preguntándose sobre su edad y su secreto.', '8189.99', '8189.99', 3, 0, '2019-08-10 11:58:04'),
('Update', 'galvanic@localhost', 'Kit Spa en Casa / Blanco', 'Suaviza la apariencia de las arrugas y las líneas de expresión, rejuvenece la apariencia del cuerpo y revitaliza el cuero cabelludo con la nueva tecnología patentada ageLOC Galvanic Spa System II. Este nuevo sistema tiene una pantalla más grande y brillante, de uso intuitivo y diseño ergonómico. Los resultados son sorprendentes, la piel radiante y un rostro y cuerpo más juvenil dejara a las personas preguntándose sobre su edad y su secreto.', 'Suaviza la apariencia de las arrugas y las líneas de expresión, rejuvenece la apariencia del cuerpo y revitaliza el cuero cabelludo con la nueva tecnología patentada ageLOC Galvanic Spa System II. Este nuevo sistema tiene una pantalla más grande y brillante, de uso intuitivo y diseño ergonómico. Los resultados son sorprendentes, la piel radiante y un rostro y cuerpo más juvenil dejara a las personas preguntándose sobre su edad y su secreto.', '8189.99', '8189.99', 0, 5, '2019-08-10 11:58:06'),
('Update', 'galvanic@localhost', 'ageLOC® LumiSpa® Accent Kit Sensible', '', '', '8189.00', '8189.00', 4, 5, '2019-08-10 11:58:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
