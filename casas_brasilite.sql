-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2026 at 10:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casas_brasilite`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `data_avaliacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `idUsuario`, `idProduto`, `nota`, `data_avaliacao`) VALUES
(1, 1, 1, 5, '2026-05-25 16:28:55'),
(2, 2, 2, 4, '2026-05-25 16:28:55'),
(4, 4, 19, 3, '2026-05-25 16:28:55'),
(5, 5, 18, 4, '2026-05-25 16:28:55'),
(6, 1, 1, 4, '2026-06-02 15:21:46'),
(7, 1, 2, 5, '2026-06-02 15:21:46'),
(8, 1, 18, 4, '2026-06-02 15:21:46'),
(9, 1, 19, 5, '2026-06-02 15:21:46'),
(10, 1, 21, 4, '2026-06-02 15:21:46'),
(11, 1, 22, 4, '2026-06-02 15:21:46'),
(12, 1, 24, 3, '2026-06-02 15:21:46'),
(13, 1, 25, 4, '2026-06-02 15:21:46'),
(14, 1, 26, 4, '2026-06-02 15:21:46'),
(15, 1, 27, 4, '2026-06-02 15:21:46'),
(16, 1, 29, 5, '2026-06-02 15:21:46'),
(17, 1, 31, 4, '2026-06-02 15:21:46'),
(18, 1, 32, 4, '2026-06-02 15:21:46'),
(19, 1, 33, 2, '2026-06-02 15:21:46'),
(20, 1, 34, 5, '2026-06-02 15:21:46'),
(21, 1, 35, 4, '2026-06-02 15:21:46'),
(22, 1, 36, 4, '2026-06-02 15:21:46'),
(23, 1, 37, 4, '2026-06-02 15:21:46'),
(24, 1, 38, 4, '2026-06-02 15:21:46'),
(25, 1, 39, 4, '2026-06-02 15:21:46'),
(26, 1, 42, 3, '2026-06-02 15:21:46'),
(27, 1, 43, 3, '2026-06-02 15:21:46'),
(28, 1, 44, 4, '2026-06-02 15:21:46'),
(29, 1, 45, 4, '2026-06-02 15:21:46'),
(30, 1, 46, 4, '2026-06-02 15:21:46'),
(31, 1, 47, 2, '2026-06-02 15:21:46'),
(32, 1, 48, 4, '2026-06-02 15:21:46'),
(33, 1, 49, 4, '2026-06-02 15:21:46'),
(34, 1, 50, 4, '2026-06-02 15:21:46'),
(35, 1, 51, 4, '2026-06-02 15:21:46'),
(36, 1, 52, 4, '2026-06-02 15:21:46'),
(37, 1, 54, 4, '2026-06-02 15:21:46'),
(38, 1, 55, 4, '2026-06-02 15:21:46'),
(40, 27, 55, 5, '2026-06-04 15:57:22'),
(41, 28, 86, 2, '2026-06-04 20:50:14'),
(44, 28, 2, 5, '2026-06-08 14:29:08'),
(45, 27, 103, 4, '2026-06-09 16:22:24'),
(46, 27, 1528, 1, '2026-06-10 16:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT current_timestamp(),
  `status_carrinho` enum('aberto','fechado','cancelado') NOT NULL DEFAULT 'aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `idUsuario`, `data_criacao`, `status_carrinho`) VALUES
(1, 1, '2026-05-25 16:24:55', 'aberto'),
(2, 2, '2026-05-25 16:24:55', 'fechado'),
(3, 3, '2026-05-25 16:24:55', 'aberto'),
(4, 4, '2026-05-25 16:24:55', 'cancelado'),
(5, 5, '2026-05-25 16:24:55', 'aberto'),
(6, 27, '2026-06-03 15:08:12', 'fechado'),
(7, 27, '2026-06-03 15:25:52', 'fechado'),
(8, 27, '2026-06-03 15:28:11', 'fechado'),
(9, 27, '2026-06-03 15:28:54', 'fechado'),
(10, 27, '2026-06-03 23:27:49', 'fechado'),
(11, 28, '2026-06-03 23:33:01', 'fechado'),
(12, 27, '2026-06-04 16:36:24', 'aberto'),
(13, 28, '2026-06-04 18:08:45', 'fechado'),
(14, 28, '2026-06-04 18:09:17', 'fechado'),
(15, 28, '2026-06-04 18:09:29', 'fechado'),
(16, 28, '2026-06-04 18:10:27', 'fechado'),
(17, 28, '2026-06-04 18:11:40', 'fechado'),
(18, 28, '2026-06-04 18:11:55', 'fechado'),
(19, 28, '2026-06-04 18:14:54', 'fechado'),
(20, 28, '2026-06-04 18:15:47', 'fechado'),
(21, 28, '2026-06-04 18:18:26', 'fechado'),
(22, 28, '2026-06-04 18:19:07', 'fechado'),
(23, 28, '2026-06-04 20:49:49', 'fechado'),
(24, 28, '2026-06-04 23:57:30', 'fechado'),
(25, 28, '2026-06-04 23:58:59', 'fechado'),
(28, 28, '2026-06-07 17:37:52', 'fechado'),
(29, 28, '2026-06-07 17:40:25', 'fechado'),
(30, 28, '2026-06-07 18:35:52', 'fechado'),
(31, 28, '2026-06-07 18:38:01', 'fechado'),
(32, 30, '2026-06-08 16:31:46', 'aberto'),
(33, 28, '2026-06-08 16:45:46', 'fechado'),
(39, 28, '2026-06-09 16:14:13', 'fechado'),
(42, 28, '2026-06-09 16:16:13', 'fechado'),
(44, 28, '2026-06-11 14:45:58', 'fechado'),
(45, 28, '2026-06-11 14:46:24', 'fechado'),
(46, 28, '2026-06-11 15:01:43', 'fechado'),
(47, 28, '2026-06-11 15:02:20', 'fechado'),
(48, 28, '2026-06-11 15:02:48', 'fechado'),
(49, 28, '2026-06-11 15:03:10', 'fechado'),
(50, 28, '2026-06-11 15:26:36', 'aberto');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL,
  `slug_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `slug_categoria`) VALUES
(1, 'Ferramentas Manuais', 'ferramentas-manuais'),
(2, 'Ferramentas Elétricas', 'ferramentas-eletricas'),
(3, 'Cimentos', 'cimentos'),
(4, 'Argamassas', 'argamassas'),
(5, 'Blocos', 'blocos'),
(6, 'Pisos', 'pisos'),
(7, 'Revestimentos', 'revestimentos'),
(8, 'Tintas', 'tintas'),
(10, 'Ferramentas de Demolição', 'ferramentas-de-demolicao'),
(11, 'Equipamentos de Obra', 'equipamentos-de-obra'),
(12, 'Concretagem e Betoneiras', 'concretagem-e-betoneiras'),
(13, 'Andaimes e Escadas', 'andaimes-e-escadas'),
(14, 'Carrinhos de Mão', 'carrinhos-de-mao'),
(16, 'Argila e Tijolos', 'argila-e-tijolos'),
(17, 'Telhas e Coberturas', 'telhas-e-coberturas'),
(18, 'Impermeabilizantes', 'impermeabilizantes'),
(19, 'Ferragens Estruturais', 'ferragens-estruturais'),
(20, 'Madeiras para Construção', 'madeiras-para-construcao'),
(21, 'Pré-Moldados', 'pre-moldados'),
(22, 'Acessórios para Obra', 'acessorios-para-obra'),
(23, 'Areia e Pedra', 'areia-e-pedra'),
(24, 'Fixação e Parafusos', 'fixacao-e-parafusos'),
(26, 'Limpeza de Obra', 'limpeza-de-obra'),
(27, 'Betoneiras', 'betoneiras'),
(28, 'Máquinas Pesadas', 'maquinas-pesadas'),
(30, 'Escadas', 'escadas'),
(31, 'Acessórios Diversos', 'acessorios-diversos'),
(32, 'Luvas', 'luvas'),
(33, 'Capacetes', 'capacetes'),
(34, 'Botas', 'botas'),
(35, 'Óculos', 'oculos');

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade_atual` int(11) NOT NULL DEFAULT 0,
  `estoque_minimo` int(11) NOT NULL DEFAULT 1,
  `local_armazenamento` varchar(100) DEFAULT NULL,
  `status_estoque` enum('Normal','Crítico','Atenção') NOT NULL DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `idProduto`, `quantidade_atual`, `estoque_minimo`, `local_armazenamento`, `status_estoque`) VALUES
(6, 1, 94, 10, 'Corredor A1', ''),
(7, 2, 32, 5, 'Corredor B2', ''),
(9, 19, 80, 15, 'Galpão D4', 'Atenção'),
(10, 18, 51, 5, 'Corredor B1', 'Normal'),
(12, 25, 2, 5, 'Corredor C4', 'Normal'),
(13, 26, 25, 5, 'Corredor E0', 'Normal'),
(14, 21, 50, 5, 'Corredor C3', 'Normal'),
(15, 48, 50, 5, 'Corredor B3', 'Normal'),
(16, 22, 6, 5, 'Corredor A9', 'Normal'),
(17, 49, 50, 5, 'Corredor C7', 'Normal'),
(18, 34, 47, 5, 'Corredor B5', ''),
(19, 50, 50, 5, 'Corredor D9', 'Normal'),
(20, 35, 50, 5, 'Corredor C4', 'Normal'),
(21, 36, 50, 5, 'Corredor E1', 'Normal'),
(22, 51, 50, 5, 'Corredor A8', 'Normal'),
(23, 27, 50, 5, 'Corredor A9', 'Normal'),
(24, 52, 50, 5, 'Corredor B5', 'Normal'),
(25, 33, 49, 5, 'Corredor A4', ''),
(26, 29, 48, 5, 'Corredor B2', ''),
(27, 32, 50, 5, 'Corredor B6', 'Normal'),
(28, 54, 21, 5, 'Corredor C1', ''),
(29, 31, 50, 5, 'Corredor B2', 'Normal'),
(30, 55, 48, 5, 'Corredor C3', ''),
(31, 39, 50, 5, 'Corredor C7', 'Normal'),
(32, 44, 50, 5, 'Corredor E2', 'Normal'),
(33, 37, 50, 5, 'Corredor D5', 'Normal'),
(34, 38, 50, 5, 'Corredor E4', 'Normal'),
(35, 45, 50, 5, 'Corredor E7', 'Normal'),
(36, 46, 50, 5, 'Corredor A3', 'Normal'),
(37, 24, 3, 5, 'Corredor B9', 'Normal'),
(38, 42, 50, 5, 'Corredor D4', 'Normal'),
(39, 43, 50, 5, 'Corredor B3', 'Normal'),
(40, 47, 50, 5, 'Corredor D6', 'Normal'),
(50, 84, 123, 20, 'Corredor A2', ''),
(52, 86, 80, 20, 'Corredor A2', ''),
(54, 88, 50, 5, 'Corredor Novo', 'Normal'),
(55, 89, 50, 5, 'Corredor Novo', 'Normal'),
(57, 91, 4, 5, 'Corredor Novo', 'Normal'),
(59, 93, 50, 5, 'Corredor Novo', 'Normal'),
(60, 94, 50, 5, 'Corredor Novo', 'Normal'),
(61, 95, 50, 5, 'Corredor Novo', 'Normal'),
(62, 96, 50, 5, 'Corredor Novo', 'Normal'),
(63, 97, 49, 5, 'Corredor Novo', ''),
(64, 98, 50, 5, 'Corredor Novo', 'Normal'),
(66, 100, 0, 5, 'Corredor Novo', 'Normal'),
(69, 103, 50, 5, 'Corredor Novo', 'Normal'),
(70, 104, 50, 5, 'Corredor Novo', 'Normal'),
(71, 105, 50, 5, 'Corredor Novo', 'Normal'),
(72, 106, 50, 5, 'Corredor Novo', 'Normal'),
(73, 107, 50, 5, 'Corredor Novo', 'Normal'),
(88, 111, 50, 5, 'Corredor E0', ''),
(89, 112, 50, 5, 'Corredor E0', ''),
(90, 113, 20000, 3000, 'Galpão A5', ''),
(92, 1327, 50, 5, 'Corredor Novo', 'Normal'),
(93, 1328, 50, 5, 'Corredor Novo', 'Normal'),
(94, 1329, 50, 5, 'Corredor Novo', 'Normal'),
(95, 1330, 50, 5, 'Corredor Novo', 'Normal'),
(96, 1331, 50, 5, 'Corredor Novo', 'Normal'),
(97, 1332, 50, 5, 'Corredor Novo', 'Normal'),
(98, 1333, 50, 5, 'Corredor Novo', 'Normal'),
(99, 1334, 50, 5, 'Corredor Novo', 'Normal'),
(100, 1335, 50, 5, 'Corredor Novo', 'Normal'),
(101, 1336, 50, 5, 'Corredor Novo', 'Normal'),
(102, 1337, 5, 5, 'Corredor Novo', 'Normal'),
(103, 1338, 50, 5, 'Corredor Novo', 'Normal'),
(104, 1339, 50, 5, 'Corredor Novo', 'Normal'),
(105, 1340, 50, 5, 'Corredor Novo', 'Normal'),
(106, 1341, 50, 5, 'Corredor Novo', 'Normal'),
(107, 1342, 50, 5, 'Corredor Novo', 'Normal'),
(108, 1343, 50, 5, 'Corredor Novo', 'Normal'),
(110, 1345, 50, 5, 'Corredor Novo', 'Normal'),
(111, 1346, 50, 5, 'Corredor Novo', 'Normal'),
(112, 1347, 50, 5, 'Corredor Novo', 'Normal'),
(114, 1349, 50, 5, 'Corredor Novo', 'Normal'),
(115, 1350, 50, 5, 'Corredor Novo', 'Normal'),
(116, 1351, 50, 5, 'Corredor Novo', 'Normal'),
(117, 1352, 50, 5, 'Corredor Novo', 'Normal'),
(118, 1353, 50, 5, 'Corredor Novo', 'Normal'),
(119, 1354, 50, 5, 'Corredor Novo', 'Normal'),
(120, 1355, 50, 5, 'Corredor Novo', 'Normal'),
(121, 1356, 50, 5, 'Corredor Novo', 'Normal'),
(124, 1359, 50, 5, 'Corredor Novo', 'Normal'),
(125, 1360, 50, 5, 'Corredor Novo', 'Normal'),
(126, 1361, 50, 5, 'Corredor Novo', 'Normal'),
(127, 1362, 50, 5, 'Corredor Novo', 'Normal'),
(128, 113, 50, 5, 'Corredor Novo', 'Normal'),
(129, 1364, 50, 5, 'Corredor Novo', 'Normal'),
(131, 1366, 50, 5, 'Corredor Novo', 'Normal'),
(132, 84, 50, 5, 'Corredor Novo', 'Normal'),
(133, 1368, 50, 5, 'Corredor Novo', 'Normal'),
(134, 1369, 50, 5, 'Corredor Novo', 'Normal'),
(135, 1370, 50, 5, 'Corredor Novo', 'Normal'),
(136, 86, 50, 5, 'Corredor Novo', 'Normal'),
(137, 1372, 50, 5, 'Corredor Novo', 'Normal'),
(138, 1373, 50, 5, 'Corredor Novo', 'Normal'),
(139, 1374, 50, 5, 'Corredor Novo', 'Normal'),
(140, 1375, 50, 5, 'Corredor Novo', 'Normal'),
(141, 111, 50, 5, 'Corredor Novo', 'Normal'),
(142, 112, 50, 5, 'Corredor Novo', 'Normal'),
(143, 1378, 50, 5, 'Corredor Novo', 'Normal'),
(144, 1379, 50, 5, 'Corredor Novo', 'Normal'),
(145, 1380, 50, 5, 'Corredor Novo', 'Normal'),
(146, 1381, 50, 5, 'Corredor Novo', 'Normal'),
(147, 1382, 50, 5, 'Corredor Novo', 'Normal'),
(148, 1383, 50, 5, 'Corredor Novo', 'Normal'),
(149, 1384, 50, 5, 'Corredor Novo', 'Normal'),
(150, 1385, 5, 5, 'Corredor Novo', 'Normal'),
(151, 1386, 50, 5, 'Corredor Novo', 'Normal'),
(152, 1387, 50, 5, 'Corredor Novo', 'Normal'),
(153, 1388, 50, 5, 'Corredor Novo', 'Normal'),
(154, 1389, 50, 5, 'Corredor Novo', 'Normal'),
(155, 1390, 50, 5, 'Corredor Novo', 'Normal'),
(156, 1391, 50, 5, 'Corredor Novo', 'Normal'),
(157, 1392, 50, 5, 'Corredor Novo', 'Normal'),
(158, 1393, 50, 5, 'Corredor Novo', 'Normal'),
(159, 1394, 50, 5, 'Corredor Novo', 'Normal'),
(160, 1395, 50, 5, 'Corredor Novo', 'Normal'),
(161, 1396, 50, 5, 'Corredor Novo', 'Normal'),
(162, 1397, 50, 5, 'Corredor Novo', 'Normal'),
(163, 1398, 50, 5, 'Corredor Novo', 'Normal'),
(164, 1399, 4, 5, 'Corredor Novo', 'Normal'),
(165, 1400, 50, 5, 'Corredor Novo', 'Normal'),
(166, 1401, 50, 5, 'Corredor Novo', 'Normal'),
(167, 1402, 50, 5, 'Corredor Novo', 'Normal'),
(168, 1403, 50, 5, 'Corredor Novo', 'Normal'),
(169, 1404, 50, 5, 'Corredor Novo', 'Normal'),
(170, 1405, 50, 5, 'Corredor Novo', 'Normal'),
(171, 1406, 50, 5, 'Corredor Novo', 'Normal'),
(172, 1407, 50, 5, 'Corredor Novo', 'Normal'),
(173, 1408, 50, 5, 'Corredor Novo', 'Normal'),
(174, 1409, 50, 5, 'Corredor Novo', 'Normal'),
(175, 1410, 50, 5, 'Corredor Novo', 'Normal'),
(176, 1411, 50, 5, 'Corredor Novo', 'Normal'),
(177, 1412, 50, 5, 'Corredor Novo', 'Normal'),
(178, 1413, 50, 5, 'Corredor Novo', 'Normal'),
(179, 1414, 50, 5, 'Corredor Novo', 'Normal'),
(180, 1415, 50, 5, 'Corredor Novo', 'Normal'),
(181, 1416, 50, 5, 'Corredor Novo', 'Normal'),
(182, 1417, 50, 5, 'Corredor Novo', 'Normal'),
(183, 1418, 50, 5, 'Corredor Novo', 'Normal'),
(184, 1419, 50, 5, 'Corredor Novo', 'Normal'),
(185, 1420, 50, 5, 'Corredor Novo', 'Normal'),
(186, 1421, 50, 5, 'Corredor Novo', 'Normal'),
(187, 1422, 50, 5, 'Corredor Novo', 'Normal'),
(188, 1423, 50, 5, 'Corredor Novo', 'Normal'),
(189, 1424, 50, 5, 'Corredor Novo', 'Normal'),
(190, 1425, 50, 5, 'Corredor Novo', 'Normal'),
(191, 1426, 50, 5, 'Corredor Novo', 'Normal'),
(192, 1427, 50, 5, 'Corredor Novo', 'Normal'),
(193, 1428, 50, 5, 'Corredor Novo', 'Normal'),
(194, 1429, 50, 5, 'Corredor Novo', 'Normal'),
(195, 1430, 50, 5, 'Corredor Novo', 'Normal'),
(196, 1431, 50, 5, 'Corredor Novo', 'Normal'),
(197, 1432, 50, 5, 'Corredor Novo', 'Normal'),
(198, 1433, 50, 5, 'Corredor Novo', 'Normal'),
(199, 1434, 50, 5, 'Corredor Novo', 'Normal'),
(200, 1435, 50, 5, 'Corredor Novo', 'Normal'),
(201, 1436, 50, 5, 'Corredor Novo', 'Normal'),
(202, 1437, 50, 5, 'Corredor Novo', 'Normal'),
(203, 1438, 50, 5, 'Corredor Novo', 'Normal'),
(204, 1439, 50, 5, 'Corredor Novo', 'Normal'),
(205, 1440, 50, 5, 'Corredor Novo', 'Normal'),
(206, 1441, 50, 5, 'Corredor Novo', 'Normal'),
(207, 1442, 50, 5, 'Corredor Novo', 'Normal'),
(208, 1443, 50, 5, 'Corredor Novo', 'Normal'),
(209, 1444, 50, 5, 'Corredor Novo', 'Normal'),
(210, 1445, 50, 5, 'Corredor Novo', 'Normal'),
(211, 1446, 50, 5, 'Corredor Novo', 'Normal'),
(212, 1447, 50, 5, 'Corredor Novo', 'Normal'),
(213, 1448, 50, 5, 'Corredor Novo', 'Normal'),
(214, 1449, 50, 5, 'Corredor Novo', 'Normal'),
(215, 1450, 0, 5, 'Corredor Novo', 'Normal'),
(216, 1451, 50, 5, 'Corredor Novo', 'Normal'),
(217, 1452, 50, 5, 'Corredor Novo', 'Normal'),
(218, 1453, 0, 5, 'Corredor Novo', 'Normal'),
(219, 1454, 50, 5, 'Corredor Novo', 'Normal'),
(220, 1455, 50, 5, 'Corredor Novo', 'Normal'),
(221, 1456, 50, 5, 'Corredor Novo', 'Normal'),
(222, 1457, 50, 5, 'Corredor Novo', 'Normal'),
(223, 1458, 50, 5, 'Corredor Novo', 'Normal'),
(224, 1459, 50, 5, 'Corredor Novo', 'Normal'),
(226, 1461, 50, 5, 'Corredor Novo', 'Normal'),
(227, 1462, 50, 5, 'Corredor Novo', 'Normal'),
(228, 1463, 50, 5, 'Corredor Novo', 'Normal'),
(229, 1464, 50, 5, 'Corredor Novo', 'Normal'),
(230, 1465, 50, 5, 'Corredor Novo', 'Normal'),
(231, 1466, 50, 5, 'Corredor Novo', 'Normal'),
(233, 1468, 50, 5, 'Corredor Novo', 'Normal'),
(234, 1469, 50, 5, 'Corredor Novo', 'Normal'),
(236, 1471, 50, 5, 'Corredor Novo', 'Normal'),
(237, 1472, 50, 5, 'Corredor Novo', 'Normal'),
(240, 1475, 25, 5, 'Corredor Novo', 'Normal'),
(241, 1476, 50, 5, 'Corredor Novo', 'Normal'),
(242, 1477, 50, 5, 'Corredor Novo', 'Normal'),
(244, 1479, 50, 5, 'Corredor Novo', 'Normal'),
(245, 1480, 50, 5, 'Corredor Novo', 'Normal'),
(246, 1481, 50, 5, 'Corredor Novo', 'Normal'),
(247, 1482, 50, 5, 'Corredor Novo', 'Normal'),
(248, 1483, 50, 5, 'Corredor Novo', 'Normal'),
(249, 1484, 50, 5, 'Corredor Novo', 'Normal'),
(251, 1486, 50, 5, 'Corredor Novo', 'Normal'),
(252, 1487, 50, 5, 'Corredor Novo', 'Normal'),
(253, 1488, 50, 5, 'Corredor Novo', 'Normal'),
(254, 1489, 50, 5, 'Corredor Novo', 'Normal'),
(256, 1491, 50, 5, 'Corredor Novo', 'Normal'),
(257, 1492, 50, 5, 'Corredor Novo', 'Normal'),
(258, 1493, 50, 5, 'Corredor Novo', 'Normal'),
(259, 1494, 50, 5, 'Corredor Novo', 'Normal'),
(260, 1495, 50, 5, 'Corredor Novo', 'Normal'),
(261, 1496, 50, 5, 'Corredor Novo', 'Normal'),
(262, 1497, 50, 5, 'Corredor Novo', 'Normal'),
(263, 1498, 50, 5, 'Corredor Novo', 'Normal'),
(264, 1499, 50, 5, 'Corredor Novo', 'Normal'),
(265, 1500, 50, 5, 'Corredor Novo', 'Normal'),
(266, 1501, 50, 5, 'Corredor Novo', 'Normal'),
(267, 1502, 50, 5, 'Corredor Novo', 'Normal'),
(268, 1503, 50, 5, 'Corredor Novo', 'Normal'),
(269, 1504, 0, 5, 'Corredor Novo', 'Normal'),
(270, 1505, 50, 5, 'Corredor Novo', 'Normal'),
(271, 1506, 50, 5, 'Corredor Novo', 'Normal'),
(272, 1507, 50, 5, 'Corredor Novo', 'Normal'),
(273, 1508, 50, 5, 'Corredor Novo', 'Normal'),
(274, 1509, 50, 5, 'Corredor Novo', 'Normal'),
(275, 1510, 3, 5, 'Corredor Novo', 'Normal'),
(276, 1511, 50, 5, 'Corredor Novo', 'Normal'),
(277, 1512, 50, 5, 'Corredor Novo', 'Normal'),
(278, 1513, 50, 5, 'Corredor Novo', 'Normal'),
(279, 1514, 50, 5, 'Corredor Novo', 'Normal'),
(280, 1515, 50, 5, 'Corredor Novo', 'Normal'),
(281, 1516, 50, 5, 'Corredor Novo', 'Normal'),
(282, 1517, 50, 5, 'Corredor Novo', 'Normal'),
(283, 1518, 50, 5, 'Corredor Novo', 'Normal'),
(284, 1519, 50, 5, 'Corredor Novo', 'Normal'),
(285, 1520, 49, 5, 'Corredor Novo', ''),
(286, 1521, 50, 5, 'Corredor Novo', 'Normal'),
(287, 1522, 50, 5, 'Corredor Novo', 'Normal'),
(288, 1523, 50, 5, 'Corredor Novo', 'Normal'),
(289, 1524, 50, 5, 'Corredor Novo', 'Normal'),
(290, 1525, 50, 5, 'Corredor Novo', 'Normal'),
(291, 1526, 412, 5, 'Corredor Novo', ''),
(293, 1528, 49, 5, 'Corredor Novo', ''),
(294, 1363, 50, 5, 'Corredor Novo', 'Normal'),
(295, 1367, 50, 5, 'Corredor Novo', 'Normal'),
(296, 1371, 50, 5, 'Corredor Novo', 'Normal'),
(298, 1377, 0, 5, 'Corredor Novo', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `favorito`
--

CREATE TABLE `favorito` (
  `id_favorito` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `data_favorito` datetime NOT NULL DEFAULT current_timestamp(),
  `status_favorito` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorito`
--

INSERT INTO `favorito` (`id_favorito`, `idUsuario`, `idProduto`, `data_favorito`, `status_favorito`) VALUES
(1, 1, 1, '2026-05-25 16:28:55', 1),
(2, 2, 2, '2026-05-25 16:28:55', 1),
(4, 4, 19, '2026-05-25 16:28:55', 1),
(5, 5, 18, '2026-05-25 16:28:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `data_feedback` datetime NOT NULL DEFAULT current_timestamp(),
  `status_feedback` enum('pendente','respondido') NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `idUsuario`, `idProduto`, `mensagem`, `data_feedback`, `status_feedback`) VALUES
(1, 1, 1, 'Produto muito bom', '2026-05-25 16:28:55', 'respondido'),
(2, 2, 2, 'Excelente qualidade', '2026-05-25 16:28:55', 'respondido'),
(4, 4, 19, 'Produto veio quebrado', '2026-05-25 16:28:55', 'pendente'),
(5, 5, 18, 'Ótimo custo benefício', '2026-05-25 16:28:55', 'respondido'),
(6, 27, 55, 'Gostei, muito ergonômico.', '2026-06-04 15:57:22', 'pendente'),
(7, 28, 86, 'fdhnf', '2026-06-04 20:50:14', 'pendente'),
(10, 28, 2, 'Opa! Gostei do trabalho de vcs, time Casas Brasilite.', '2026-06-08 14:29:08', 'pendente'),
(11, 27, 103, 'Ótima qualidade!!!', '2026-06-09 16:22:24', 'pendente'),
(12, 27, 1528, 'defeito', '2026-06-10 16:59:10', 'pendente');

-- --------------------------------------------------------

--
-- Table structure for table `foto_produto`
--

CREATE TABLE `foto_produto` (
  `id_foto` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `descricao_imagem` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_produto`
--

INSERT INTO `foto_produto` (`id_foto`, `idProduto`, `caminho_imagem`, `descricao_imagem`) VALUES
(1, 1, 'uploads/01/Cimento CP-II.webp', 'Imagem do cimento'),
(2, 2, 'uploads/02/Furadeira Impacto 750W.webp', 'Imagem da furadeira'),
(4, 19, 'uploads/04/Piso Porcelanato 60x60.webp', 'Imagem do piso'),
(5, 18, 'uploads/05/Martelo Cabo de Fibra.webp', 'Imagem do martelo'),
(9, 21, 'uploads/06/Cimento CP-IV 50kg.webp', 'Imagem do produto'),
(10, 22, 'uploads/07/Argamassa AC-II 20kg.webp', 'Imagem do produto'),
(11, 24, 'uploads/08/Areia Média 20kg.webp', 'Imagem do produto'),
(12, 25, 'uploads/09/Chave de Fenda 1-4.webp', 'Imagem do produto'),
(13, 26, 'uploads/10/Alicate Universal.webp', 'Imagem do produto'),
(14, 27, 'uploads/11/Martelete Rompedor 1500W.webp', 'Imagem do produto'),
(15, 29, 'uploads/12/Betoneira 400L.webp', 'Imagem do produto'),
(16, 31, 'uploads/13/Carrinho de Mão Reforçado.webp', 'Imagem do produto'),
(17, 32, 'uploads/14/Escada Alumínio 6 Degraus.webp', 'Imagem do produto'),
(18, 33, 'uploads/15/Balde de Obra 20L.webp', 'Imagem do produto'),
(19, 34, 'uploads/16/Porcelanato Polido 60x60.webp', 'Imagem do produto'),
(20, 35, 'uploads/17/Revestimento Cerâmico Branco.webp', 'Imagem do produto'),
(21, 36, 'uploads/18/Tinta Acrílica 18L.webp', 'Imagem do produto'),
(22, 37, 'uploads/19/Vergalhão 8mm.webp', 'Imagem do produto'),
(23, 38, 'uploads/20/Tábua Madeira Pinus.webp', 'Imagem do produto'),
(24, 39, 'uploads/21/Telha Fibrocimento 2.44m.webp', 'Imagem do produto'),
(25, 42, 'uploads/22/Parafuso 5mm pacote.webp', 'Imagem do produto'),
(26, 43, 'uploads/23/Bucha Nylon 6mm.webp', 'Imagem do produto'),
(27, 44, 'uploads/24/Manta Líquida 5kg.webp', 'Imagem do produto'),
(28, 45, 'uploads/25/Laje Pré-Moldada.webp', 'Imagem do produto'),
(29, 46, 'uploads/26/Desempenadeira Aço.webp', 'Imagem do produto'),
(30, 47, 'uploads/27/Vassoura de Obra.webp', 'Imagem do produto'),
(31, 48, 'uploads/28/Cimento CP-I 50kg.webp', 'Imagem do produto'),
(32, 49, 'uploads/29/Argamassa AC-III.webp', 'Imagem do produto'),
(33, 50, 'uploads/30/Piso Cerâmico 45x45.webp', 'Imagem do produto'),
(34, 51, 'uploads/31/Tinta Esmalte 3,6L.webp', 'Imagem do produto'),
(35, 52, 'uploads/32/Talhadeira Profissional.webp', 'Imagem do produto'),
(36, 54, 'uploads/1781200401_Andaime Metalframe.webp', ''),
(37, 55, 'uploads/34/Carrinho Simples.webp', 'Imagem do produto'),
(43, 84, 'uploads/1780608787_Trincha.webp', 'Trincha 920'),
(45, 86, 'uploads/1780610427_Desempenadeira.webp', 'Desempenadeira'),
(47, 93, 'uploads/1781027704_Argamassa AC-I 20kg Quartzolit.webp', ''),
(49, 94, 'uploads/1781027921_Bloco de Concreto Estrutural 14x19x39 BlocoForte.webp', ''),
(50, 107, 'uploads/1781028000_Capacete de Segurança Azul 3M.webp', ''),
(54, 106, 'uploads/1781028751_Luva de Segurança Raspa Worker.webp', ''),
(55, 103, 'uploads/1781028839_Manta Asfáltica 10m Vedacit.webp', ''),
(56, 100, 'uploads/1781028914_Misturador de Argamassa 1600W Vonder.webp', ''),
(61, 105, 'uploads/1781032609_Pedra Britada Nº1 20kg Grupo Tomino.webp', ''),
(62, 95, 'uploads/1781032780_Piso Cerâmico Acetinado 50x50 Portobello.webp', ''),
(63, 98, 'uploads/1781032846_Ponteiro para Martelete SDS Plus Bosch.webp', ''),
(64, 96, 'uploads/1781032889_Revestimento Decorativo 30x60 Eliane.webp', ''),
(65, 91, 'uploads/1781032971_Serra Mármore 1300W Makita.webp', ''),
(66, 88, 'uploads/1781033146_Serrote Profissional 20 Polegadas Tramontina.webp', ''),
(67, 97, 'uploads/1781033248_Tinta Látex Branco 18L Suvinil.webp', ''),
(68, 89, 'uploads/1781033415_Trena Emborrachada 5m Vonder.webp', ''),
(69, 104, 'uploads/1781033490_Vergalhão CA-50 10mm Gerdau.webp', ''),
(74, 111, 'uploads/1781034359_Parafusadeira 12V Bivolt Bosch.webp', ''),
(75, 112, 'uploads/1781034571_Cimento CP-III 50kg.webp', ''),
(76, 113, 'uploads/1781113066_bloco.webp', 'Tijolo Baiano'),
(79, 1329, 'uploads/1781115464_Alicate de Pressão Stanley.webp', ''),
(81, 1476, 'uploads/1781115564_Andaime Fachadeiro Alulev.webp', ''),
(82, 1475, 'uploads/1781115690_Andaime Tubular Mor.webp', ''),
(83, 1436, 'uploads/1781115749_Arame Recozido ArcelorMittal.webp', ''),
(84, 1350, 'uploads/1781115790_0103_argamassa-ac-1-cinza-20kg-quartzolit_m1_638839542662455773.webp', ''),
(85, 1377, 'uploads/1781115795_Areia Fina 20kg Mineradora ABC.webp', ''),
(86, 1378, 'uploads/1781115841_Areia Grossa 20kg Pedreira Sul.webp', ''),
(87, 1351, 'uploads/1781115844_argamassa-voltoram.webp', ''),
(89, 1352, 'uploads/1781115914_argamassa-flexivel-ac-iii-interno-externo-cinza-20kg-fortaleza-nrsrtq.webp', ''),
(90, 1413, 'uploads/1781115953_Balde de Obra 20L Tramontina.webp', ''),
(91, 1433, 'uploads/1781115970_Vergalhão CA-50 10mm ArcelorMittal.webp', ''),
(92, 1486, 'uploads/1781115990_Balde Graduado Vonder.webp', ''),
(93, 1432, 'uploads/1781116011_Vergalhão CA-50 8mm Gerdau.webp', ''),
(94, 1438, 'uploads/1781116023_Barra Roscada Gerdau.webp', ''),
(95, 1354, 'uploads/1781116027_argamassa.webp', ''),
(96, 1432, 'uploads/1781116039_Vergalhão CA-50 8mm Gerdau.webp', ''),
(97, 1405, 'uploads/1781116063_Betoneira 120L Menegotti.webp', ''),
(98, 1406, 'uploads/1781116093_Betoneira 150L CSM.webp', ''),
(99, 1407, 'uploads/1781116138_Betoneira 200L Vonder.webp', ''),
(100, 1434, 'uploads/1781116140_Vergalhão CA-60 5mm Belgo.webp', ''),
(101, 1356, 'uploads/1781116141_flexivel.webp', ''),
(102, 1408, 'uploads/1781116171_Betoneira 400L Menegotti.webp', ''),
(103, 1441, 'uploads/1781116177_vigas-caibro-grandes-duas.jpg', ''),
(104, 1412, 'uploads/1781116218_Betoneira Compacta CSM.webp', ''),
(105, 1355, 'uploads/1781116235_89626922_1.jpg.webp', ''),
(106, 1410, 'uploads/1781116264_Betoneira Monofásica Vonder.webp', ''),
(107, 1353, 'uploads/1781117635_argamassa-porcelanato-interno-cinza-20kg-quartzoli-464c6ce2.webp', ''),
(108, 1409, 'uploads/1781117663_betoneira_profissional_400l_127v_com_capa_motor_plastico_2931_1_73d4370c2d121936b691eee0149a9772.webp', ''),
(109, 1411, 'uploads/1781117771_shopping.webp', ''),
(110, 1450, 'uploads/1781117838_Viga Pré-Moldada Concrefort.webp', ''),
(111, 1364, 'uploads/1781117851_bloco_de_concreto_tipo_vedacao_9x19x39cm_haza_88412681_cd0d_300x300.webp', ''),
(112, 1359, 'uploads/1781117852_Bloco Vedação 9x19x39 Cerâmica União.webp', ''),
(113, 1514, 'uploads/1781117865_Bota Antiderrapante Bracol.webp', ''),
(114, 1516, 'uploads/1781117881_Bota Cano Longo Cartom.webp', ''),
(115, 1400, 'uploads/1781117903_Tinta Esmalte 3,6L Sherwin-Williams.webp', ''),
(116, 1362, 'uploads/1781117918_1398644-Image-1.webp', ''),
(117, 1512, 'uploads/1781117927_Bota Couro Biqueira Marluvas.webp', ''),
(118, 1399, 'uploads/1781117954_Tinta Látex 18L Coral.webp', ''),
(119, 1363, 'uploads/1781117964_shwopping.webp', ''),
(120, 1518, 'uploads/1781117972_Bota EPI Premium Marluvas.webp', ''),
(121, 1489, 'uploads/1781117986_Trincha Média Vonder.webp', ''),
(123, 1335, 'uploads/1781118022_Tupia Elétrica Vonder.webp', ''),
(124, 1513, 'uploads/1781118024_Bota Impermeável Cartom.webp', ''),
(125, 1371, 'uploads/1781118063_Tijolo Cerâmico Cerâmica Forte.webp', ''),
(126, 1517, 'uploads/1781118074_Bota Obra Pesada Bracol.webp', ''),
(127, 1509, 'uploads/1781118112_Bota PVC Branca Marluvas.webp', ''),
(128, 1510, 'uploads/1781118153_Bota PVC Preta Cartom.webp', ''),
(129, 1515, 'uploads/1781118197_Botina Elástico Marluvas.webp', ''),
(130, 1511, 'uploads/1781118267_Botina Segurança Bracol.webp', ''),
(131, 1337, 'uploads/1781118303_Britadeira Elétrica 1600W Bosch.webp', ''),
(132, 1507, 'uploads/1781118343_Capacete Classe B Camper.webp', ''),
(133, 1445, 'uploads/1781118344_MADEREIRA CAPIVARA-59.jpg', ''),
(134, 1414, 'uploads/1781118373_3315000200.jpg', ''),
(135, 1504, 'uploads/1781118391_Capacete com Carneira Camper.webp', ''),
(136, 1466, 'uploads/1781118422_shopping.webp', ''),
(137, 1508, 'uploads/1781118433_Capacete Obra Premium MSA.webp', ''),
(138, 1360, 'uploads/1781118447_shopping.webp', ''),
(139, 1506, 'uploads/1781118470_Capacete Ventilado 3M.webp', ''),
(140, 1452, 'uploads/1781118478_shopping.webp', ''),
(141, 1503, 'uploads/1781118506_Capacete Vermelho 3M.webp', ''),
(143, 1472, 'uploads/1781118600_Carrinho 80L Vonder.webp', ''),
(144, 1439, 'uploads/1781118627_shopping.webp', ''),
(145, 1469, 'uploads/1781118662_Carrinho Caçamba Metálica Vonder.webp', ''),
(146, 1505, 'uploads/1781118690_shopping.webp', ''),
(147, 1468, 'uploads/1781118698_Carrinho de Mão Reforçado Maestro.webp', ''),
(148, 1502, 'uploads/1781118731_shopping.webp', ''),
(149, 1501, 'uploads/1781118817_shopping.webp', ''),
(150, 1345, 'uploads/1781118821_Cimento CP-III 50kg Nassau.webp', ''),
(151, 1369, 'uploads/1781118828_Tijolo Refratário Cerâmica São Jorge.jpg', ''),
(152, 1500, 'uploads/1781118857_shopping.webp', ''),
(153, 1346, 'uploads/1781118868_Cimento CP-IV 50kg Holcim.webp', ''),
(155, 1398, 'uploads/1781118950_Tinta Acrílica 18L Suvinil.jpg', ''),
(156, 1401, 'uploads/1781118984_Tinta Emborrachada 18L Suvinil.webp', ''),
(157, 1416, 'uploads/1781118995_Colher de Pedreiro Tramontina.webp', ''),
(158, 1471, 'uploads/1781119015_shopping.webp', ''),
(159, 1495, 'uploads/1781119024_luva-para-corte-super-safety-ss1007-n-ca-32039.jpg', ''),
(160, 1422, 'uploads/1781119030_Compactador de Solo CSM.webp', ''),
(161, 1367, 'uploads/1781119047_Tijolo Baiano 8 Furos Cerâmica União.webp', ''),
(162, 1327, 'uploads/1781119074_shopping.webp', ''),
(163, 1443, 'uploads/1781119075_Compensado Naval Madeireira Brasil.webp', ''),
(164, 1375, 'uploads/1781119122_Tijolo Canaleta Cerâmica São Jorge.jpg', ''),
(165, 1349, 'uploads/1781119132_cimento_portland_cp_v_ari_50kg_397_1_8eabc76cf438e7042ec96c157c5f3ad9.webp', ''),
(166, 1429, 'uploads/1781119133_Compressor de Ar Toyama.webp', ''),
(167, 1370, 'uploads/1781119180_Tijolo Ecológico Cerâmica União.jpg', ''),
(168, 1425, 'uploads/1781119184_Cortadora de Piso CSM.webp', ''),
(169, 1347, 'uploads/1781119191_br-11134207-81z1k-mg52vc0ty3nkde.jpg', ''),
(170, 1449, 'uploads/1781119197_laje-pre-moldada-conheca-os-principais-tipos-47.webp', ''),
(171, 1372, 'uploads/1781119210_Tijolo Estrutural Cerâmica São Jorge.jpg', ''),
(172, 1462, 'uploads/1781119215_Cumeeira Cerâmica Eternit.webp', ''),
(173, 1430, 'uploads/1781119240_1085064_1.webp', ''),
(174, 1374, 'uploads/1781119246_Tijolo Laminado Cerâmica Forte.jpg', ''),
(175, 1415, 'uploads/1781119247_Desempenadeira de Aço Momfort.webp', ''),
(176, 1477, 'uploads/1781119271_shopping.webp', ''),
(177, 1368, 'uploads/1781119279_Tijolo Maciço Cerâmica Forte.jpg', ''),
(178, 1437, 'uploads/1781119287_Estribo Pronto Belgo.webp', ''),
(179, 1418, 'uploads/1781119291_images (1).jpg', ''),
(180, 1421, 'uploads/1781119299_914022.jpg', ''),
(183, 1333, 'uploads/1781119357_492850_lixadeira_roto_orbital_5_com_6_velocidades_280_watts_gex_125.webp', ''),
(184, 1458, 'uploads/1781119381_Telha Fibrocimento 2,44m Brasilite.webp', ''),
(185, 1482, 'uploads/1781119386_Fita Crepe 3M.webp', ''),
(187, 1484, 'uploads/1781119409_download.jpg', ''),
(189, 1483, 'uploads/1781119417_Fita Isolante Vonder.webp', ''),
(191, 1491, 'uploads/1781119446_download (1).jpg', ''),
(192, 1463, 'uploads/1781119473_Telha Ondulada Onduline.webp', ''),
(193, 1496, 'uploads/1781119497_download (2).jpg', ''),
(194, 1330, 'uploads/1781119509_Furadeira de Impacto 650W Bosch.webp', ''),
(195, 1424, 'uploads/1781119554_Gerador de Energia Vonder.webp', ''),
(196, 1499, 'uploads/1781119560_ExibirObjetoMidia.jpg', ''),
(197, 1464, 'uploads/1781119585_Telha Sanduíche Brasilite.jpg', ''),
(198, 1457, 'uploads/1781119605_Guia de Concreto Premold ABC.webp', ''),
(199, 1492, 'uploads/1781119620_download (3).jpg', ''),
(200, 1479, 'uploads/1781119630_shopping.webp', ''),
(201, 1461, 'uploads/1781119634_Telha Translúcida Brasilite.jpg', ''),
(202, 1427, 'uploads/1781119636_Guincho de Coluna Vonder.webp', ''),
(203, 1334, 'uploads/1781119668_shopping.webp', ''),
(204, 1343, 'uploads/1781119669_Kit Brocas Demolição Bosch.webp', ''),
(205, 1493, 'uploads/1781119690_download (4).jpg', ''),
(206, 1493, 'uploads/1781119717_Luva Pigmentada Danny.webp', ''),
(207, 1497, 'uploads/1781119731_download (5).jpg', ''),
(209, 1403, 'uploads/1781119735_Textura Grafiato 25kg Sherwin-Williams.webp', ''),
(210, 1497, 'uploads/1781119744_Luva PVC Worker.webp', ''),
(211, 1498, 'uploads/1781119782_download (6).jpg', ''),
(212, 1498, 'uploads/1781119806_Luva Soldador Volk.webp', ''),
(213, 1494, 'uploads/1781119841_Luva Vaqueta Worker.webp', ''),
(214, 1338, 'uploads/1781119873_Martelete Rompedor SDS Makita.webp', ''),
(215, 1447, 'uploads/1781119917_Madeirite Plastificado Pinus Forte.webp', ''),
(216, 1521, 'uploads/1781119958_Óculos Antiembaçante Kalipso.webp', ''),
(217, 1447, 'uploads/1781119962_download (7).jpg', ''),
(218, 1528, 'uploads/1781119987_Óculos EPI Premium 3M.webp', ''),
(219, 1520, 'uploads/1781120011_Óculos Fumê Danny.webp', ''),
(220, 1342, 'uploads/1781120011_download (8).jpg', ''),
(221, 1519, 'uploads/1781120038_Óculos Incolor 3M.webp', ''),
(222, 1328, 'uploads/1781120060_download (9).jpg', ''),
(223, 1524, 'uploads/1781120073_Óculos Lente Cinza Kalipso.webp', ''),
(224, 1373, 'uploads/1781120101_Tijolo Aparente Cerâmica União.webp', ''),
(225, 1525, 'uploads/1781120103_Óculos Lente Verde 3M.webp', ''),
(226, 1404, 'uploads/1781120113_download.png', ''),
(227, 1366, 'uploads/1781120131_Tijolo Baiano 6 Furos Cerâmica São Jorge.jpg', ''),
(229, 1361, 'uploads/1781120156_download (10).jpg', ''),
(230, 1336, 'uploads/1781120177_Soprador Térmico Bosch.webp', ''),
(232, 1523, 'uploads/1781120209_Óculos Proteção UV Danny.webp', ''),
(233, 1440, 'uploads/1781120218_Tábua de Pinus Madeireira Brasil.jpg', ''),
(234, 1419, 'uploads/1781120235_download (11).jpg', ''),
(235, 1526, 'uploads/1781120254_Óculos Segurança Plus Danny.webp', ''),
(236, 1340, 'uploads/1781120264_Talhadeira SDS Max Bosch.webp', ''),
(237, 1426, 'uploads/1781120272_download (12).jpg', ''),
(238, 1431, 'uploads/1781120298_download (13).jpg', ''),
(239, 1420, 'uploads/1781120298_Pá Quadrada Vonder.webp', ''),
(240, 1487, 'uploads/1781120313_shopping.webp', ''),
(241, 1455, 'uploads/1781120324_download (14).jpg', ''),
(242, 1435, 'uploads/1781120336_Tela Soldada Gerdau.webp', ''),
(243, 1331, 'uploads/1781120337_Parafusadeira 12V Makita.webp', ''),
(244, 1522, 'uploads/1781120351_download (15).jpg', ''),
(245, 1488, 'uploads/1781120366_shopping.webp', ''),
(246, 1459, 'uploads/1781120370_Telha Cerâmica Portuguesa Eternit.webp', ''),
(247, 1384, 'uploads/1781120392_Piso Cerâmico 45x45 Portobello.webp', ''),
(248, 1392, 'uploads/1781120403_download (16).jpg', ''),
(249, 1379, 'uploads/1781120429_download (17).jpg', ''),
(250, 1465, 'uploads/1781120444_Rufo Galvanizado Eternit.webp', ''),
(251, 1456, 'uploads/1781120445_Piso Intertravado Concrefort.webp', ''),
(252, 1381, 'uploads/1781120457_download (18).jpg', ''),
(253, 1481, 'uploads/1781120483_Sapatas para Andaime Mor.jpg', ''),
(254, 1388, 'uploads/1781120484_Piso Madeira HD Eliane.webp', ''),
(255, 1380, 'uploads/1781120487_download (19).jpg', ''),
(256, 1480, 'uploads/1781120487_shopping.webp', ''),
(257, 1451, 'uploads/1781120517_download (20).jpg', ''),
(258, 1382, 'uploads/1781120523_shopping.webp', ''),
(259, 1385, 'uploads/1781120523_Piso Porcelanato 60x60 Eliane.webp', ''),
(260, 1442, 'uploads/1781120551_Sarrafo de Pinus Madeiras ABC.jpg', ''),
(261, 1387, 'uploads/1781120553_Piso Rústico Externo Portobello.webp', ''),
(262, 1444, 'uploads/1781120554_shopping.webp', ''),
(263, 1453, 'uploads/1781120595_Placa de Concreto Concrefort.webp', ''),
(264, 1339, 'uploads/1781120613_shopping.webp', ''),
(265, 1383, 'uploads/1781120619_Seixo Rolado 20kg Mineradora ABC.jpg', ''),
(266, 1402, 'uploads/1781120657_Selador Acrílico 18L Coral.webp', ''),
(267, 1423, 'uploads/1781120677_Placa Vibratória Toyama.webp', ''),
(268, 1332, 'uploads/1781120718_Serra Circular7.1-4Vonder.webp', ''),
(269, 35, 'uploads/1781120737_Revestimento Cerâmico Branco Portinari.webp', ''),
(270, 1394, 'uploads/1781120776_Revestimento Cimentício Portobello.webp', ''),
(271, 1428, 'uploads/1781120785_Serra de Bancada CSM.webp', ''),
(272, 1391, 'uploads/1781120802_Revestimento Cimentício Portobello.webp', ''),
(273, 1448, 'uploads/1781120828_shopping.webp', ''),
(274, 1391, 'uploads/1781120836_Revestimento Decorativo 30x60 Portobello.webp', ''),
(275, 1397, 'uploads/1781120841_Revestimento Externo Portobello.webp', ''),
(276, 1454, 'uploads/1781120850_OPHS.jpg', ''),
(277, 1417, 'uploads/1781120862_shopping.webp', ''),
(278, 1393, 'uploads/1781120866_Revestimento Marmorizado Eliane.webp', ''),
(279, 1393, 'uploads/1781120879_Revestimento Marmorizado Eliane.webp', ''),
(280, 1386, 'uploads/1781120886_OPHS (1).jpg', ''),
(281, 1395, 'uploads/1781120900_Revestimento Texturizado Incepa.jpg', ''),
(282, 1396, 'uploads/1781120900_shopping.webp', ''),
(283, 1395, 'uploads/1781120914_Revestimento Texturizado Incepa.webp', ''),
(284, 1446, 'uploads/1781120936_Ripa de Madeira Madeireira Brasil.jpg', ''),
(285, 1390, 'uploads/1781120936_shopping.webp', ''),
(286, 1446, 'uploads/1781120944_Ripa de Madeira Madeireira Brasil.webp', ''),
(287, 1389, 'uploads/1781120950_2021_ARENITO-scaled.jpg', ''),
(288, 1389, 'uploads/1781120962_2021_ARENITO-scaled.jpg', ''),
(290, 1389, 'uploads/1781120973_2021_ARENITO-scaled.jpg', ''),
(291, 1341, 'uploads/1781120992_shopping.webp', ''),
(293, 1341, 'uploads/1781121001_Rompedor_Industrial_Makita.jpg', ''),
(294, 1341, 'uploads/1781121021_baixados.webp', '');

-- --------------------------------------------------------

--
-- Table structure for table `item_carrinho`
--

CREATE TABLE `item_carrinho` (
  `id_item_carrinho` int(11) NOT NULL,
  `idCarrinho` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1,
  `subtotal` decimal(10,2) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_carrinho`
--

INSERT INTO `item_carrinho` (`id_item_carrinho`, `idCarrinho`, `idProduto`, `quantidade`, `subtotal`, `preco_unitario`) VALUES
(1, 1, 1, 2, 85.80, 42.90),
(2, 2, 2, 1, 299.90, 299.90),
(4, 4, 19, 3, 239.70, 79.90),
(5, 5, 18, 2, 109.80, 54.90),
(6, 6, 1, 1, 42.90, 42.90),
(8, 7, 2, 1, 299.90, 299.90),
(11, 8, 1, 1, 42.90, 42.90),
(15, 9, 1, 13, 557.70, 42.90),
(24, 10, 55, 1, 149.90, 149.90),
(26, 11, 1, 1, 42.90, 42.90),
(27, 13, 1, 1, 42.90, 42.90),
(28, 14, 1, 1, 42.90, 42.90),
(29, 15, 1, 1, 42.90, 42.90),
(30, 16, 1, 1, 42.90, 42.90),
(31, 17, 34, 1, 89.90, 89.90),
(32, 18, 1, 1, 42.90, 42.90),
(33, 19, 34, 1, 89.90, 89.90),
(34, 19, 29, 1, 5199.90, 5199.90),
(35, 19, 1, 1, 42.90, 42.90),
(36, 20, 34, 2, 179.80, 89.90),
(37, 20, 29, 2, 10399.80, 5199.90),
(38, 20, 1, 2, 85.80, 42.90),
(39, 20, 55, 1, 149.90, 149.90),
(40, 20, 2, 1, 299.90, 299.90),
(41, 21, 34, 1, 89.90, 89.90),
(42, 21, 29, 1, 5199.90, 5199.90),
(43, 21, 1, 1, 42.90, 42.90),
(44, 21, 55, 1, 149.90, 149.90),
(45, 21, 2, 1, 299.90, 299.90),
(46, 22, 29, 2, 10399.80, 5199.90),
(47, 22, 33, 1, 19.90, 19.90),
(50, 23, 54, 9, 179.10, 19.90),
(51, 24, 1, 1, 42.90, 42.90),
(66, 25, 34, 1, 89.90, 89.90),
(77, 31, 29, 3, 15599.70, 5199.90),
(78, 33, 97, 1, 189.90, 189.90),
(79, 39, 29, 1, 5199.90, 5199.90),
(80, 12, 2, 1, 299.90, 299.90),
(81, 42, 1528, 1, 64.45, 64.45),
(82, 42, 1520, 1, 20.81, 20.81),
(83, 44, 1526, 50, 2677.00, 53.54),
(85, 45, 1526, 1, 53.54, 53.54),
(86, 46, 1526, 100, 5354.00, 53.54),
(87, 47, 1526, 46, 2462.84, 53.54),
(88, 48, 1526, 4, 214.16, 53.54),
(89, 49, 1526, 30, 1606.20, 53.54),
(91, 50, 1526, 40, 2141.60, 53.54);

-- --------------------------------------------------------

--
-- Table structure for table `item_pedido`
--

CREATE TABLE `item_pedido` (
  `id_item_pedido` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idItem_Carrinho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_pedido`
--

INSERT INTO `item_pedido` (`id_item_pedido`, `idPedido`, `idItem_Carrinho`, `quantidade`, `preco_venda`, `subtotal`) VALUES
(1, 1, 1, 2, 42.90, 85.80),
(2, 2, 2, 1, 299.90, 299.90),
(4, 4, 4, 3, 79.90, 239.70),
(5, 5, 5, 2, 54.90, 109.80),
(6, 6, 6, 1, 42.90, 42.90),
(7, 7, 8, 1, 299.90, 299.90),
(8, 8, 11, 1, 42.90, 42.90),
(9, 9, 15, 13, 42.90, 557.70),
(10, 10, 24, 1, 149.90, 149.90),
(11, 11, 26, 1, 42.90, 42.90),
(12, 12, 27, 1, 42.90, 42.90),
(13, 13, 28, 1, 42.90, 42.90),
(14, 14, 29, 1, 42.90, 42.90),
(15, 15, 30, 1, 42.90, 42.90),
(16, 16, 31, 1, 89.90, 89.90),
(17, 17, 32, 1, 42.90, 42.90),
(18, 18, 33, 1, 89.90, 89.90),
(19, 18, 34, 1, 5199.90, 5199.90),
(20, 18, 35, 1, 42.90, 42.90),
(21, 19, 36, 2, 89.90, 179.80),
(22, 19, 37, 2, 5199.90, 10399.80),
(23, 19, 38, 2, 42.90, 85.80),
(24, 19, 39, 1, 149.90, 149.90),
(25, 19, 40, 1, 299.90, 299.90),
(26, 20, 41, 1, 89.90, 89.90),
(27, 20, 42, 1, 5199.90, 5199.90),
(28, 20, 43, 1, 42.90, 42.90),
(29, 20, 44, 1, 149.90, 149.90),
(30, 20, 45, 1, 299.90, 299.90),
(31, 21, 46, 2, 5199.90, 10399.80),
(32, 21, 47, 1, 19.90, 19.90),
(33, 22, 50, 9, 19.90, 179.10),
(34, 23, 51, 1, 42.90, 42.90),
(39, 25, 66, 1, 89.90, 89.90),
(43, 29, 77, 3, 5199.90, 15599.70),
(44, 30, 78, 1, 189.90, 189.90),
(45, 31, 79, 1, 5199.90, 5199.90),
(46, 32, 81, 1, 64.45, 64.45),
(47, 32, 82, 1, 20.81, 20.81),
(48, 33, 83, 50, 53.54, 2677.00),
(49, 34, 85, 1, 53.54, 53.54),
(50, 35, 86, 100, 53.54, 5354.00),
(51, 36, 87, 46, 53.54, 2462.84),
(52, 37, 88, 4, 53.54, 214.16),
(53, 38, 89, 30, 53.54, 1606.20);

-- --------------------------------------------------------

--
-- Table structure for table `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id_movimentacao` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPagamento` int(11) DEFAULT NULL,
  `idEstoque` int(11) NOT NULL,
  `tipo_movimentacao` enum('entrada','saida') NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_movimentacao` datetime NOT NULL DEFAULT current_timestamp(),
  `status_movimentacao` enum('concluido','pendente') NOT NULL DEFAULT 'concluido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movimentacao`
--

INSERT INTO `movimentacao` (`id_movimentacao`, `idUsuario`, `idPagamento`, `idEstoque`, `tipo_movimentacao`, `quantidade`, `data_movimentacao`, `status_movimentacao`) VALUES
(6, 1, 1, 6, 'saida', 2, '2026-05-25 16:28:12', 'concluido'),
(7, 2, 2, 7, 'saida', 1, '2026-05-25 16:28:12', 'concluido'),
(9, 4, 4, 9, 'saida', 3, '2026-05-25 16:28:12', 'concluido'),
(10, 5, 5, 10, 'saida', 2, '2026-05-25 16:28:12', 'concluido'),
(11, 27, 6, 6, 'saida', 1, '2026-06-03 15:25:52', 'concluido'),
(12, 27, 7, 7, 'saida', 1, '2026-06-03 15:28:11', 'concluido'),
(13, 27, 8, 6, 'saida', 1, '2026-06-03 15:28:54', 'concluido'),
(14, 27, 9, 6, 'saida', 13, '2026-06-03 23:27:49', 'concluido'),
(15, 1, NULL, 13, 'saida', 1, '2026-06-04 15:34:29', 'concluido'),
(16, 1, NULL, 13, 'entrada', 1, '2026-06-04 15:34:56', 'concluido'),
(17, 1, NULL, 13, 'entrada', 5, '2026-06-04 15:36:42', 'concluido'),
(22, 1, NULL, 13, 'entrada', 17, '2026-06-04 16:14:51', 'concluido'),
(23, 1, NULL, 13, 'entrada', 3, '2026-06-04 16:15:12', 'concluido'),
(26, 1, NULL, 13, 'saida', 74, '2026-06-04 16:24:50', 'concluido'),
(27, 1, NULL, 16, 'saida', 44, '2026-06-04 16:32:32', 'concluido'),
(28, 27, 10, 30, 'saida', 1, '2026-06-04 16:36:24', 'concluido'),
(29, 1, NULL, 28, 'saida', 45, '2026-06-04 16:49:38', 'concluido'),
(34, 1, NULL, 13, 'entrada', 1, '2026-06-04 18:04:10', 'concluido'),
(35, 1, NULL, 28, 'saida', 5, '2026-06-04 18:04:33', 'concluido'),
(36, 28, 11, 6, 'saida', 1, '2026-06-04 18:08:45', 'concluido'),
(37, 28, 12, 6, 'saida', 1, '2026-06-04 18:09:17', 'concluido'),
(38, 28, 13, 6, 'saida', 1, '2026-06-04 18:09:29', 'concluido'),
(39, 28, 14, 6, 'saida', 1, '2026-06-04 18:10:27', 'concluido'),
(40, 28, 15, 6, 'saida', 1, '2026-06-04 18:11:40', 'concluido'),
(41, 28, 16, 18, 'saida', 1, '2026-06-04 18:11:55', 'concluido'),
(42, 28, 17, 6, 'saida', 1, '2026-06-04 18:14:54', 'concluido'),
(43, 28, 18, 18, 'saida', 1, '2026-06-04 18:15:47', 'concluido'),
(44, 28, 18, 26, 'saida', 1, '2026-06-04 18:15:47', 'concluido'),
(45, 28, 18, 6, 'saida', 1, '2026-06-04 18:15:47', 'concluido'),
(46, 28, 19, 18, 'saida', 2, '2026-06-04 18:18:26', 'concluido'),
(47, 28, 19, 26, 'saida', 2, '2026-06-04 18:18:26', 'concluido'),
(48, 28, 19, 6, 'saida', 2, '2026-06-04 18:18:26', 'concluido'),
(49, 28, 19, 30, 'saida', 1, '2026-06-04 18:18:26', 'concluido'),
(50, 28, 19, 7, 'saida', 1, '2026-06-04 18:18:26', 'concluido'),
(51, 28, 20, 18, 'saida', 1, '2026-06-04 18:19:07', 'concluido'),
(52, 28, 20, 26, 'saida', 1, '2026-06-04 18:19:07', 'concluido'),
(53, 28, 20, 6, 'saida', 1, '2026-06-04 18:19:07', 'concluido'),
(54, 28, 20, 30, 'saida', 1, '2026-06-04 18:19:07', 'concluido'),
(55, 28, 20, 7, 'saida', 1, '2026-06-04 18:19:07', 'concluido'),
(56, 1, NULL, 50, 'entrada', 123, '2026-06-04 18:33:07', 'concluido'),
(57, 1, NULL, 13, 'entrada', 1, '2026-06-04 18:33:11', 'concluido'),
(59, 1, NULL, 13, 'entrada', 1, '2026-06-04 18:59:49', 'concluido'),
(60, 1, NULL, 52, 'entrada', 80, '2026-06-04 19:00:27', 'concluido'),
(64, 28, 21, 26, 'saida', 2, '2026-06-04 20:49:49', 'concluido'),
(65, 28, 21, 25, 'saida', 1, '2026-06-04 20:49:49', 'concluido'),
(66, 1, NULL, 28, 'entrada', 12, '2026-06-04 23:50:59', 'concluido'),
(67, 28, 22, 28, 'saida', 9, '2026-06-04 23:57:30', 'concluido'),
(68, 28, 23, 6, 'saida', 1, '2026-06-04 23:58:59', 'concluido'),
(73, 1, NULL, 13, 'saida', 3, '2026-06-07 16:04:14', 'concluido'),
(74, 1, NULL, 13, 'saida', 1, '2026-06-07 16:04:22', 'concluido'),
(76, 28, 25, 18, 'saida', 1, '2026-06-07 17:37:52', 'concluido'),
(81, 1, NULL, 13, 'entrada', 2, '2026-06-08 14:56:52', 'concluido'),
(82, 1, NULL, 13, 'entrada', 9998, '2026-06-08 14:57:10', 'concluido'),
(83, 1, NULL, 13, 'saida', 10000, '2026-06-08 15:17:50', 'concluido'),
(84, 28, 29, 26, 'saida', 3, '2026-06-08 16:45:46', 'concluido'),
(85, 1, NULL, 13, 'entrada', 21, '2026-06-08 16:48:46', 'concluido'),
(86, 1, NULL, 13, 'entrada', 4, '2026-06-09 14:13:31', 'concluido'),
(87, 1, NULL, 13, 'entrada', 1, '2026-06-09 14:13:42', 'concluido'),
(88, 1, NULL, 13, 'saida', 1, '2026-06-09 14:13:54', 'concluido'),
(97, 28, 30, 63, 'saida', 1, '2026-06-09 16:14:13', 'concluido'),
(98, 28, 31, 26, 'saida', 1, '2026-06-09 16:16:13', 'concluido'),
(100, 1, NULL, 88, 'entrada', 50, '2026-06-09 16:45:59', 'concluido'),
(102, 1, NULL, 89, 'entrada', 50, '2026-06-09 16:49:31', 'concluido'),
(103, 1, NULL, 90, 'entrada', 20000, '2026-06-10 14:37:46', 'concluido'),
(125, 28, 32, 293, 'saida', 1, '2026-06-11 14:45:58', 'concluido'),
(126, 28, 32, 285, 'saida', 1, '2026-06-11 14:45:58', 'concluido'),
(127, 28, 33, 291, 'saida', 50, '2026-06-11 14:46:24', 'concluido'),
(128, 1, NULL, 291, 'entrada', 950, '2026-06-11 15:00:12', 'concluido'),
(129, 28, 34, 291, 'saida', 1, '2026-06-11 15:01:43', 'concluido'),
(130, 28, 35, 291, 'saida', 100, '2026-06-11 15:02:20', 'concluido'),
(131, 1, NULL, 291, 'saida', 849, '2026-06-11 15:02:33', 'concluido'),
(132, 28, 36, 291, 'saida', 46, '2026-06-11 15:02:48', 'concluido'),
(133, 28, 37, 291, 'saida', 4, '2026-06-11 15:03:10', 'concluido'),
(134, 1, NULL, 291, 'entrada', 50, '2026-06-11 15:03:35', 'concluido'),
(135, 1, NULL, 298, 'saida', 50, '2026-06-11 15:03:54', 'concluido'),
(136, 1, NULL, 218, 'saida', 50, '2026-06-11 15:04:03', 'concluido'),
(137, 1, NULL, 57, 'saida', 46, '2026-06-11 15:04:11', 'concluido'),
(138, 1, NULL, 269, 'saida', 50, '2026-06-11 15:04:17', 'concluido'),
(139, 1, NULL, 275, 'saida', 47, '2026-06-11 15:04:24', 'concluido'),
(140, 1, NULL, 164, 'saida', 46, '2026-06-11 15:04:34', 'concluido'),
(141, 1, NULL, 215, 'saida', 50, '2026-06-11 15:04:41', 'concluido'),
(142, 1, NULL, 102, 'saida', 45, '2026-06-11 15:04:50', 'concluido'),
(143, 1, NULL, 240, 'saida', 25, '2026-06-11 15:05:00', 'concluido'),
(144, 1, NULL, 37, 'saida', 47, '2026-06-11 15:05:08', 'concluido'),
(145, 1, NULL, 12, 'saida', 48, '2026-06-11 15:05:16', 'concluido'),
(146, 1, NULL, 66, 'saida', 50, '2026-06-11 15:05:23', 'concluido'),
(147, 1, NULL, 150, 'saida', 45, '2026-06-11 15:05:30', 'concluido'),
(148, 28, 38, 291, 'saida', 30, '2026-06-11 15:26:36', 'concluido');

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `idCarrinho` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `forma_pagamento` enum('pix','cartao','boleto') NOT NULL,
  `status_pagamento` enum('pendente','pago','cancelado') NOT NULL DEFAULT 'pendente',
  `valor_total` decimal(10,2) NOT NULL,
  `data_pagamento` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `idCarrinho`, `idUsuario`, `forma_pagamento`, `status_pagamento`, `valor_total`, `data_pagamento`) VALUES
(1, 1, 27, 'pix', 'pago', 100.80, '2026-05-25 16:24:55'),
(2, 2, 27, 'cartao', 'pago', 324.90, '2026-05-25 16:24:55'),
(3, 3, 27, 'boleto', 'pendente', 207.50, '2026-05-25 16:24:55'),
(4, 4, 4, 'pix', 'cancelado', 269.70, '2026-05-25 16:24:55'),
(5, 5, 5, 'cartao', 'pago', 121.80, '2026-05-25 16:24:55'),
(6, 6, 27, 'pix', 'pago', 87.90, '2026-06-03 15:25:52'),
(7, 7, 27, 'boleto', 'pendente', 299.90, '2026-06-03 15:28:11'),
(8, 8, 27, 'pix', 'pago', 87.90, '2026-06-03 15:28:54'),
(9, 9, 27, 'pix', 'pago', 557.70, '2026-06-03 23:27:49'),
(10, 10, 27, 'pix', 'pago', 194.90, '2026-06-04 16:36:24'),
(11, 11, 28, 'boleto', 'pendente', 87.90, '2026-06-04 18:08:45'),
(12, 13, 28, 'boleto', 'pendente', 87.90, '2026-06-04 18:09:17'),
(13, 14, 28, 'pix', 'pago', 87.90, '2026-06-04 18:09:29'),
(14, 15, 28, 'pix', 'pago', 87.90, '2026-06-04 18:10:27'),
(15, 16, 28, 'pix', 'pago', 87.90, '2026-06-04 18:11:40'),
(16, 17, 28, 'pix', 'pago', 134.90, '2026-06-04 18:11:55'),
(17, 18, 28, 'pix', 'pago', 87.90, '2026-06-04 18:14:54'),
(18, 19, 28, 'pix', 'pago', 5332.70, '2026-06-04 18:15:47'),
(19, 20, 28, 'cartao', 'pago', 11115.20, '2026-06-04 18:18:26'),
(20, 21, 28, 'boleto', 'pendente', 5782.50, '2026-06-04 18:19:07'),
(21, 22, 28, 'pix', 'pago', 10419.70, '2026-06-04 20:49:49'),
(22, 23, 28, 'pix', 'pago', 224.10, '2026-06-04 23:57:30'),
(23, 24, 28, 'pix', 'pago', 87.90, '2026-06-04 23:58:59'),
(25, 25, 28, 'pix', 'pago', 120.91, '2026-06-07 17:37:52'),
(26, 28, 28, 'pix', 'pago', 13.13, '2026-06-07 17:40:25'),
(27, 29, 28, 'pix', 'pago', 26.26, '2026-06-07 18:35:52'),
(28, 30, 28, 'pix', 'pago', 26.26, '2026-06-07 18:38:01'),
(29, 31, 28, 'pix', 'pago', 15599.70, '2026-06-08 16:45:46'),
(30, 33, 28, 'pix', 'pago', 209.90, '2026-06-09 16:14:13'),
(31, 39, 28, 'pix', 'pago', 5199.90, '2026-06-09 16:16:13'),
(32, 42, 28, 'pix', 'pago', 115.26, '2026-06-11 14:45:58'),
(33, 44, 28, 'pix', 'pago', 3427.00, '2026-06-11 14:46:24'),
(34, 45, 28, 'pix', 'pago', 68.54, '2026-06-11 15:01:43'),
(35, 46, 28, 'pix', 'pago', 6854.00, '2026-06-11 15:02:20'),
(36, 47, 28, 'pix', 'pago', 3152.84, '2026-06-11 15:02:48'),
(37, 48, 28, 'pix', 'pago', 274.16, '2026-06-11 15:03:10'),
(38, 49, 28, 'pix', 'pago', 2056.20, '2026-06-11 15:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `idPagamento` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `status_pedido` enum('processando','enviado','entregue','cancelado') NOT NULL DEFAULT 'processando',
  `data_entrega` datetime NOT NULL DEFAULT current_timestamp(),
  `codigo_rastreio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `idPagamento`, `idUsuario`, `status_pedido`, `data_entrega`, `codigo_rastreio`) VALUES
(1, 1, 27, 'enviado', '2026-05-25 16:24:55', 'BR123456789'),
(2, 2, 27, 'enviado', '2026-05-25 16:24:55', 'BR987654321'),
(3, 3, 27, 'entregue', '2026-05-25 16:24:55', 'BR456123789'),
(4, 4, 27, 'cancelado', '2026-05-25 16:24:55', 'BR741852963'),
(5, 5, 27, 'enviado', '2026-05-25 16:24:55', 'BR369258147'),
(6, 6, 27, 'processando', '2026-06-03 15:25:52', 'BR20260603202552158'),
(7, 7, 27, 'processando', '2026-06-03 15:28:11', 'BR20260603202811806'),
(8, 8, 27, 'cancelado', '2026-06-03 15:28:54', 'BR20260603202854782'),
(9, 9, 27, 'enviado', '2026-06-03 23:27:49', 'BR20260604042749443'),
(10, 10, 27, 'entregue', '2026-06-04 16:36:24', 'BR20260604213624828'),
(11, 11, 28, 'processando', '2026-06-04 18:08:45', 'BR20260604230845652'),
(12, 12, 28, 'processando', '2026-06-04 18:09:17', 'BR20260604230917279'),
(13, 13, 28, 'processando', '2026-06-04 18:09:29', 'BR20260604230929611'),
(14, 14, 28, 'processando', '2026-06-04 18:10:27', 'BR20260604231027903'),
(15, 15, 28, 'processando', '2026-06-04 18:11:40', 'BR20260604231140646'),
(16, 16, 28, 'processando', '2026-06-04 18:11:55', 'BR20260604231155334'),
(17, 17, 28, 'processando', '2026-06-04 18:14:54', 'BR20260604231454255'),
(18, 18, 28, 'processando', '2026-06-04 18:15:47', 'BR20260604231547840'),
(19, 19, 28, 'processando', '2026-06-04 18:18:26', 'BR20260604231826528'),
(20, 20, 28, 'processando', '2026-06-04 18:19:07', 'BR20260604231907732'),
(21, 21, 28, 'processando', '2026-06-04 20:49:49', 'BR20260605014949484'),
(22, 22, 28, 'cancelado', '2026-06-04 23:57:30', 'BR20260605045730142'),
(23, 23, 28, 'cancelado', '2026-06-04 23:58:59', 'BR20260605045859507'),
(25, 25, 28, 'enviado', '2026-06-07 17:37:52', 'BR20260607223752135'),
(26, 26, 28, 'cancelado', '2026-06-07 17:40:25', 'BR20260607224025668'),
(27, 27, 28, 'processando', '2026-06-07 18:35:52', 'BR20260607233552663'),
(28, 28, 28, 'enviado', '2026-06-07 18:38:01', 'BR20260607233801892'),
(29, 29, 28, 'cancelado', '2026-06-08 16:45:46', 'BR20260608214546794'),
(30, 30, 28, 'processando', '2026-06-09 16:14:13', 'BR20260609211413977'),
(31, 31, 28, 'entregue', '2026-06-09 16:16:13', 'BR20260609211613185'),
(32, 32, 28, 'processando', '2026-06-11 14:45:58', 'BR20260611194558541'),
(33, 33, 28, 'enviado', '2026-06-11 14:46:24', 'BR20260611194624553'),
(34, 34, 28, 'processando', '2026-06-11 15:01:43', 'BR20260611200143433'),
(35, 35, 28, 'cancelado', '2026-06-11 15:02:20', 'BR20260611200220235'),
(36, 36, 28, 'cancelado', '2026-06-11 15:02:48', 'BR20260611200248364'),
(37, 37, 28, 'processando', '2026-06-11 15:03:10', 'BR20260611200310980'),
(38, 38, 28, 'processando', '2026-06-11 15:26:36', 'BR20260611202636316');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `nome_produto` varchar(150) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `unidade_medida` varchar(10) NOT NULL DEFAULT 'UN',
  `preco_unitario` decimal(10,2) NOT NULL,
  `custo_produto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `frete` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status_produto` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `descricao_produto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id_produto`, `idCategoria`, `sku`, `nome_produto`, `marca`, `unidade_medida`, `preco_unitario`, `custo_produto`, `desconto`, `frete`, `status_produto`, `descricao_produto`) VALUES
(1, 3, 'SKU001', 'Cimento CP-II 50kg', 'Votoran', 'UN', 42.90, 30.50, 0.00, 15.00, 'ativo', 'Cimento CP-II 50kg indicado para obras estruturais e uso geral. Possui alta resistência, ótima aderência e excelente desempenho em concretos e argamassas.'),
(2, 2, 'SKU002', 'Furadeira Impacto 750W', 'Bosch', 'UN', 299.90, 228.00, 20.00, 0.00, 'ativo', 'Furadeira de impacto potente com 750W, ideal para perfurações em madeira, concreto e metal. Design ergonômico e alta durabilidade.'),
(18, 1, 'SKU005', 'Martelo Cabo Fibra 27mm', 'Tramontina', 'UN', 54.90, 36.50, 0.00, 12.00, 'ativo', 'Martelo profissional com cabo em fibra resistente, oferecendo maior segurança, durabilidade e precisão no uso.'),
(19, 6, 'SKU004', 'Piso Porcelanato 60x60', 'Portobello', 'M2', 79.90, 52.00, 5.00, 30.00, 'ativo', 'Porcelanato de alta qualidade com acabamento sofisticado, ideal para ambientes internos, proporcionando beleza e resistência.'),
(21, 3, 'SKU100', 'Cimento CP-IV 50kg', 'Votoran', 'UN', 39.90, 28.00, 0.00, 15.00, 'ativo', 'Cimento CP-IV com maior durabilidade e resistência a ambientes agressivos, ideal para obras expostas à umidade e agentes químicos.'),
(22, 4, 'SKU101', 'Argamassa AC-II 20kg', 'Quartzolit', 'UN', 24.90, 16.00, 0.00, 12.00, 'ativo', 'Argamassa de alta qualidade para assentamento de pisos e revestimentos. Fácil aplicação, ótima fixação e excelente acabamento.'),
(24, 23, 'SKU103', 'Areia Média 20kg', 'Grupo Tomino', 'UN', 6.90, 4.00, 0.00, 10.00, 'ativo', 'Areia média peneirada, ideal para preparo de concreto, argamassa e obras em geral.'),
(25, 1, 'SKU104', 'Chave de Fenda 1/4', 'Tramontina', 'UN', 12.90, 7.20, 0.00, 8.00, 'ativo', 'Chave de fenda resistente com cabo ergonômico, ideal para uso doméstico e profissional.'),
(26, 1, 'SKU105', 'Alicate Universal', 'Vonder', 'UN', 29.90, 18.00, 0.00, 10.00, 'ativo', 'Alicate universal de alta resistência, ideal para corte, aperto e manipulação de fios e objetos metálicos.'),
(27, 10, 'SKU106', 'Martelete Rompedor 1500W', 'Makita', 'UN', 899.90, 635.00, 50.00, 0.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(29, 12, 'SKU108', 'Betoneira 400L', 'Menegotti', 'UN', 5199.90, 3900.00, 15.00, 0.00, 'ativo', 'Betoneira eficiente para mistura de concreto, ideal para construção civil.'),
(31, 14, 'SKU110', 'Carrinho de Mão Reforçado', 'Tramontina', 'UN', 399.90, 265.00, 10.00, 0.00, 'ativo', 'Carrinho de mão reforçado, ideal para transporte de materiais em obras.'),
(32, 13, 'SKU111', 'Escada Alumínio 6 Degraus', 'Mor', 'UN', 249.90, 163.00, 0.00, 0.00, 'ativo', 'Escada de alumínio leve e resistente, ideal para uso doméstico e profissional.'),
(33, 11, 'SKU112', 'Balde de Obra 20L', 'FWB', 'UN', 19.90, 10.50, 0.00, 8.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(34, 6, 'SKU113', 'Porcelanato Polido 60x60', 'Eliane', 'M2', 89.90, 59.00, 5.00, 30.00, 'ativo', 'Porcelanato de alta qualidade com acabamento sofisticado, ideal para ambientes internos, proporcionando beleza e resistência.'),
(35, 7, 'SKU114', 'Revestimento Cerâmico Branco', 'Portinari', 'M2', 45.90, 29.50, 0.00, 25.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(36, 8, 'SKU115', 'Tinta Toque Seda Branco Neve 18L', 'Suvinil', 'UN', 649.90, 435.00, 20.00, 0.00, 'ativo', 'Tinta de alta cobertura e durabilidade, ideal para paredes internas e externas, proporcionando acabamento uniforme.'),
(37, 19, 'SKU116', 'Vergalhão 8mm', 'Gerdau', 'UN', 32.00, 22.00, 0.00, 15.00, 'ativo', 'Vergalhão de aço utilizado em estruturas de concreto armado, garantindo resistência e segurança.'),
(38, 20, 'SKU117', 'Tábua Madeira Pinus', 'Madeireira SP', 'UN', 22.50, 14.00, 0.00, 15.00, 'ativo', 'Madeira de pinus tratada para uso em construção e estruturas diversas.'),
(39, 17, 'SKU118', 'Telha Fibrocimento 2.44m', 'Brasilit', 'UN', 59.90, 39.00, 0.00, 20.00, 'ativo', 'Telha resistente para cobertura, oferecendo proteção contra chuva e durabilidade.'),
(42, 24, 'SKU121', 'Parafuso 5mm pacote', 'Vonder', 'UN', 23.90, 13.00, 0.00, 6.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(43, 24, 'SKU122', 'Bucha Nylon 6mm', 'Fischer', 'UN', 7.90, 4.20, 0.00, 6.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(44, 18, 'SKU123', 'Manta Líquida 5kg', 'Vedacit', 'UN', 129.90, 84.00, 0.00, 15.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(45, 21, 'SKU124', 'Laje Pré-Moldada', 'Local', 'M2', 120.00, 78.00, 0.00, 40.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(46, 22, 'SKU125', 'Desempenadeira Aço', 'Atlas', 'UN', 29.90, 17.00, 0.00, 10.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(47, 26, 'SKU126', 'Vassoura de Obra', 'Condor', 'UN', 19.90, 11.00, 0.00, 8.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(48, 3, 'SKU127', 'Cimento CP-I 50kg', 'Holcim', 'UN', 41.90, 29.00, 0.00, 15.00, 'ativo', 'Cimento CP-I tradicional, ideal para obras simples, rebocos e assentamentos em geral.'),
(49, 4, 'SKU128', 'Argamassa AC-III', 'Quartzolit', 'UN', 34.90, 22.50, 0.00, 15.00, 'ativo', 'Argamassa de alta qualidade para assentamento de pisos e revestimentos. Fácil aplicação, ótima fixação e excelente acabamento.'),
(50, 6, 'SKU129', 'Piso Cerâmico 45x45', 'Delta', 'M2', 39.90, 25.00, 0.00, 25.00, 'ativo', 'Piso cerâmico resistente, ideal para áreas internas com ótimo custo-benefício e fácil limpeza.'),
(51, 8, 'SKU130', 'Tinta Esmalte 3,6L', 'Coral', 'UN', 89.90, 57.00, 0.00, 12.00, 'ativo', 'Tinta de alta cobertura e durabilidade, ideal para paredes internas e externas, proporcionando acabamento uniforme.'),
(52, 10, 'SKU131', 'Talhadeira Profissional', 'Tramontina', 'UN', 24.90, 14.50, 0.00, 10.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(54, 13, 'SKU133', 'Andaime 1x1 - Andaime Certificado Nr18 - Andaime Tubular', 'Metalframe', 'UN', 19.90, 12.00, 0.00, 5.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(55, 14, 'SKU134', 'Carrinho Simples', 'Tramontina', 'UN', 149.90, 96.00, 0.00, 25.00, 'ativo', 'Carrinho de mão reforçado, ideal para transporte de materiais em obras.'),
(84, 1, 'SKU340', 'Trincha para Paredes e Tetos Premium 920', 'Tigre', 'UN', 46.90, 28.50, 0.00, 10.00, 'ativo', 'Trincha Premium Tigre para tintas látex e acrílica e superfícies tipo parede ou teto. O produto possui filamentos sintéticos alongados de alta precisão, garantia de maior rendimento em cada pincelada. Disponível em diversos tamanhos, as trinchas contam com cabo Soft Grip, resistente e anatômico.'),
(86, 1, 'SKU344', 'Desempenadeira Tigre PRO', 'Tigre', 'UN', 90.60, 56.00, 0.00, 12.00, 'ativo', 'Ideal para aplicação em diversos tipos de superfícies, como paredes e pisos, oferecendo um acabamento profissional em diversos tipos de materiais.'),
(88, 1, 'SKU200', 'Serrote Profissional 20 Polegadas', 'Tramontina', 'UN', 49.90, 31.00, 0.00, 10.00, 'ativo', 'Serrote profissional com lâmina resistente, indicado para cortes em madeira em obras e reformas.'),
(89, 1, 'SKU201', 'Trena Emborrachada 5m', 'Vonder', 'UN', 24.90, 14.00, 0.00, 8.00, 'ativo', 'Trena emborrachada de 5 metros, ideal para medições em obras, reformas e uso profissional.'),
(91, 2, 'SKU203', 'Serra Mármore 1300W', 'Makita', 'UN', 449.90, 330.00, 30.00, 0.00, 'ativo', 'Serra mármore potente para cortes em pisos, pedras, cerâmicas e materiais de construção.'),
(93, 4, 'SKU205', 'Argamassa AC-I 20kg', 'Quartzolit', 'UN', 19.90, 12.50, 0.00, 12.00, 'ativo', 'Argamassa AC-I indicada para assentamento de revestimentos cerâmicos em áreas internas.'),
(94, 5, 'SKU206', 'Bloco de Concreto Estrutural 14x19x39', 'BlocoForte', 'UN', 6.50, 3.80, 0.00, 20.00, 'ativo', 'Bloco estrutural de concreto indicado para construção de paredes e estruturas resistentes.'),
(95, 6, 'SKU207', 'Piso Cerâmico Acetinado 50x50', 'Portobello', 'M2', 64.90, 42.00, 5.00, 25.00, 'ativo', 'Piso cerâmico acetinado resistente, ideal para ambientes internos residenciais e comerciais.'),
(96, 7, 'SKU208', 'Revestimento Decorativo 30x60', 'Eliane', 'M2', 59.90, 38.00, 0.00, 25.00, 'ativo', 'Revestimento decorativo para paredes internas, oferecendo acabamento moderno e elegante.'),
(97, 8, 'SKU209', 'Tinta Látex Branco 18L', 'Suvinil', 'UN', 189.90, 132.00, 10.00, 20.00, 'ativo', 'Tinta látex branca de alto rendimento, indicada para paredes internas.'),
(98, 10, 'SKU210', 'Ponteiro para Martelete SDS Plus', 'Bosch', 'UN', 39.90, 24.00, 0.00, 8.00, 'ativo', 'Ponteiro SDS Plus para marteletes, ideal para trabalhos de demolição e remoção de concreto.'),
(100, 12, 'SKU212', 'Misturador de Argamassa 1600W', 'Vonder', 'UN', 599.90, 430.00, 40.00, 0.00, 'ativo', 'Misturador elétrico indicado para argamassas, tintas e massas em geral.'),
(103, 18, 'SKU215', 'Manta Asfáltica 10m', 'Vedacit', 'UN', 249.90, 170.00, 15.00, 20.00, 'ativo', 'Manta asfáltica indicada para impermeabilização de lajes, telhados e áreas expostas.'),
(104, 19, 'SKU216', 'Vergalhão CA-50 10mm', 'Gerdau', 'UN', 39.90, 27.00, 0.00, 20.00, 'ativo', 'Vergalhão de aço CA-50 indicado para estruturas de concreto armado.'),
(105, 23, 'SKU217', 'Pedra Britada Nº1 20kg', 'Grupo Tomino', 'UN', 8.90, 5.00, 0.00, 10.00, 'ativo', 'Pedra britada nº1 ensacada, indicada para concreto, drenagem e obras em geral.'),
(106, 32, 'SKU218', 'Luva de Segurança Raspa', 'Worker', 'UN', 18.90, 10.00, 0.00, 8.00, 'ativo', 'Luva de segurança em raspa, indicada para proteção das mãos em obras e serviços pesados.'),
(107, 33, 'SKU219', 'Capacete de Segurança Azul', '3M', 'UN', 34.90, 21.00, 0.00, 8.00, 'ativo', 'Capacete de segurança com ajuste interno, indicado para proteção em ambientes de obra.'),
(111, 2, 'SKU349', 'Parafusadeira 12V Bivolt', 'Bosch', 'UN', 329.90, 269.95, 20.00, 0.00, 'ativo', 'Parafusadeira compacta 12V, indicada para montagem, manutenção e serviços em madeira e metal.'),
(112, 3, 'SKU350', 'Cimento CP-III 50kg', 'Votoran', 'UN', 44.90, 0.00, 0.00, 15.00, 'ativo', ''),
(113, 16, 'SKU336', 'Bloco Tijolo Cerâmico Vedação Tipo Baiano 09 x 19 x 19cm', 'Sesf', 'CM', 1.50, 0.00, 0.00, 0.00, 'ativo', 'O Bloco Cerâmico 09x19x19cm é uma escolha ideal para alvenaria de vedação em paredes divisórias internas e externas. Com dimensões de 9 cm de largura, 19 cm de altura e 19 cm de comprimento, este bloco é amplamente utilizado em construções residenciais devido às suas excelentes características de ventilação e isolamento.'),
(1327, 1, 'SKU300', 'Chave Combinada 12mm', 'Tramontina', 'UN', 37.40, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Ferramentas Manuais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1328, 1, 'SKU301', 'Martelo Unha 27mm', 'Vonder', 'UN', 54.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferramentas Manuais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1329, 1, 'SKU302', 'Alicate de Pressão', 'Stanley', 'UN', 72.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferramentas Manuais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1330, 2, 'SKU303', 'Furadeira de Impacto 650W', 'Bosch', 'UN', 231.15, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1331, 2, 'SKU304', 'Parafusadeira 12V', 'Makita', 'UN', 312.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1332, 2, 'SKU305', 'Serra Circular 7.1/4', 'Vonder', 'UN', 393.65, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1333, 2, 'SKU306', 'Lixadeira Orbital', 'Bosch', 'UN', 474.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1334, 2, 'SKU307', 'Esmerilhadeira Angular 840W 9557HNG Makita', 'Makita', 'UN', 556.15, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1335, 2, 'SKU308', 'Tupia Elétrica', 'Vonder', 'UN', 637.40, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1336, 2, 'SKU309', 'Soprador Térmico', 'Bosch', 'UN', 718.65, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas Elétricas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1337, 10, 'SKU310', 'Britadeira Elétrica 1600W', 'Bosch', 'UN', 347.40, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1338, 10, 'SKU311', 'Martelete Rompedor SDS', 'Makita', 'UN', 654.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1339, 10, 'SKU312', 'Ponteiro para Demolição', 'Dewalt', 'UN', 962.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1340, 10, 'SKU313', 'Talhadeira SDS Max', 'Bosch', 'UN', 1269.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1341, 10, 'SKU314', 'Rompedor Industrial', 'Makita', 'UN', 1577.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1342, 10, 'SKU315', 'Martelo Demolidor', 'Dewalt', 'UN', 1884.90, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1343, 10, 'SKU316', 'Kit Brocas Demolição', 'Bosch', 'UN', 2192.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Ferramentas de Demolição, indicado para uso em obras, reformas e serviços de construção civil.'),
(1345, 3, 'SKU318', 'Cimento CP-III 50kg', 'Nassau', 'UN', 48.47, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Cimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1346, 3, 'SKU319', 'Cimento CP-IV 50kg', 'Holcim', 'UN', 52.76, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Cimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1347, 3, 'SKU320', 'Cimento Branco 20kg', 'Smart Cimento', 'UN', 57.04, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Cimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1349, 3, 'SKU322', 'Cimento Alta Resistência 50kg', 'Holcim', 'UN', 65.61, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Cimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1350, 4, 'SKU323', 'Argamassa AC-I 20kg', 'Quartzolit', 'UN', 19.27, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1351, 4, 'SKU324', 'Argamassa AC-II 20kg', 'Votoran', 'UN', 23.65, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1352, 4, 'SKU325', 'Argamassa AC-III 20kg', 'Fortaleza', 'UN', 28.02, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1353, 4, 'SKU326', 'Argamassa Porcelanato 20kg', 'Quartzolit', 'UN', 32.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1354, 4, 'SKU327', 'Argamassa Interna e Externa ACII 20kg', 'Votoran', 'UN', 36.77, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1355, 4, 'SKU328', 'Argamassa Porcelanato Interna 20kg', 'Fortaleza', 'UN', 41.15, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1356, 4, 'SKU329', 'Argamassa Flexível ACIII 20kg', 'Quartzolit', 'UN', 45.52, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Argamassas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1359, 5, 'SKU332', 'Bloco Vedação 9x19x39', 'Cerâmica União', 'UN', 8.82, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Blocos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1360, 5, 'SKU333', 'Canaleta de Concreto', 'BlocoForte', 'UN', 10.26, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Blocos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1361, 5, 'SKU334', 'Meio Bloco Estrutural', 'Precon', 'UN', 11.70, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Blocos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1362, 5, 'SKU335', ' Bloco de Concreto Celular 10 x 30 x 60cm ', 'Precon', 'UN', 13.14, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Blocos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1363, 5, 'SKU504', 'Bloco Cerâmico 09x19x19cm Vermelho', 'Nova Conquista', 'UN', 14.58, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Blocos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1364, 5, 'SKU337', 'Bloco Aparente', 'Precon', 'UN', 16.02, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Blocos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1366, 16, 'SKU339', 'Tijolo Baiano 6 Furos', 'Cerâmica São Jorge', 'UN', 1.81, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1367, 16, 'SKU506', 'Tijolo Baiano 8 Furos', 'Cerâmica União', 'UN', 2.52, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1368, 16, 'SKU341', 'Tijolo Maciço', 'Cerâmica Forte', 'UN', 3.23, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1369, 16, 'SKU342', 'Tijolo Refratário', 'Cerâmica São Jorge', 'UN', 3.94, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1370, 16, 'SKU343', 'Tijolo Ecológico', 'Cerâmica União', 'UN', 4.65, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1371, 16, 'SKU507', 'Tijolo Cerâmico', 'Cerâmica Forte', 'UN', 5.35, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1372, 16, 'SKU345', 'Tijolo Estrutural', 'Cerâmica São Jorge', 'UN', 6.06, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1373, 16, 'SKU346', 'Tijolo Aparente', 'Cerâmica União', 'UN', 6.77, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1374, 16, 'SKU347', 'Tijolo Laminado', 'Cerâmica Forte', 'UN', 7.48, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1375, 16, 'SKU348', 'Tijolo Canaleta', 'Cerâmica São Jorge', 'UN', 8.19, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tijolos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1377, 23, 'SKU509', 'Areia Fina 20kg', 'Mineradora ABC', 'UN', 11.23, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1378, 23, 'SKU351', 'Areia Grossa 20kg', 'Pedreira Sul', 'UN', 12.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1379, 23, 'SKU352', 'Pedra Britada Nº1 20kg', 'Grupo Tomino', 'UN', 14.57, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1380, 23, 'SKU353', 'Pedra Britada Nº2 20kg', 'Mineradora ABC', 'UN', 16.23, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1381, 23, 'SKU354', 'Pedrisco Ensacado 20kg', 'Pedreira Sul', 'UN', 17.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1382, 23, 'SKU355', 'Pó de Pedra 20kg', 'Grupo Tomino', 'UN', 19.57, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1383, 23, 'SKU356', 'Seixo Rolado 20kg', 'Mineradora ABC', 'UN', 21.23, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Areia e Pedra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1384, 6, 'SKU357', 'Piso Cerâmico 45x45', 'Portobello', 'M2', 52.76, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Pisos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1385, 6, 'SKU358', 'Piso Porcelanato 60x60', 'Eliane', 'M2', 65.61, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pisos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1386, 6, 'SKU359', 'Piso Acetinado 50x50', 'Incepa', 'M2', 78.47, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pisos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1387, 6, 'SKU360', 'Piso Rústico Externo', 'Portobello', 'M2', 91.33, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pisos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1388, 6, 'SKU361', 'Piso Madeira HD', 'Eliane', 'M2', 104.19, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pisos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1389, 6, 'SKU362', 'Piso Antiderrapante', 'Incepa', 'M2', 117.04, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Pisos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1390, 7, 'SKU363', 'Revestimento Branco 30x60', 'Eliane', 'M2', 44.34, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1391, 7, 'SKU364', 'Revestimento Decorativo 30x60', 'Portobello', 'M2', 53.79, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1392, 7, 'SKU365', 'Pastilha Cerâmica', 'Incepa', 'M2', 63.23, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1393, 7, 'SKU366', 'Revestimento Marmorizado', 'Eliane', 'M2', 72.68, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1394, 7, 'SKU367', 'Revestimento Cimentício', 'Portobello', 'M2', 82.12, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1395, 7, 'SKU368', 'Revestimento Texturizado', 'Incepa', 'M2', 91.57, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1396, 7, 'SKU369', 'Revestimento 3D', 'Eliane', 'M2', 101.01, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1397, 7, 'SKU370', 'Revestimento Externo', 'Portobello', 'M2', 110.46, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Revestimentos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1398, 8, 'SKU371', 'Tinta Acrílica 18L', 'Suvinil', 'UN', 79.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1399, 8, 'SKU372', 'Tinta Látex 18L', 'Coral', 'UN', 109.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1400, 8, 'SKU373', 'Tinta Esmalte 3,6L', 'Sherwin-Williams', 'UN', 139.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1401, 8, 'SKU374', 'Tinta Emborrachada 18L', 'Suvinil', 'UN', 169.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1402, 8, 'SKU375', 'Selador Acrílico 18L', 'Coral', 'UN', 199.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1403, 8, 'SKU376', 'Textura Grafiato 25kg', 'Sherwin-Williams', 'UN', 229.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1404, 8, 'SKU377', 'Massa Corrida 25kg', 'Suvinil', 'UN', 259.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Tintas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1405, 27, 'SKU378', 'Betoneira 120L', 'Menegotti', 'UN', 1466.57, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1406, 27, 'SKU379', 'Betoneira 150L', 'CSM', 'UN', 2033.23, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1407, 27, 'SKU380', 'Betoneira 200L', 'Vonder', 'UN', 2599.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1408, 27, 'SKU381', 'Betoneira 400L', 'Menegotti', 'UN', 3166.57, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1409, 27, 'SKU382', 'Betoneira Profissional', 'CSM', 'UN', 3733.23, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1410, 27, 'SKU383', 'Betoneira Monofásica', 'Vonder', 'UN', 4299.90, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1411, 27, 'SKU384', 'Betoneira Reforçada', 'Menegotti', 'UN', 4866.57, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1412, 27, 'SKU385', 'Betoneira Compacta', 'CSM', 'UN', 5433.23, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Betoneiras, indicado para uso em obras, reformas e serviços de construção civil.'),
(1413, 11, 'SKU386', 'Balde de Obra 20L', 'Tramontina', 'UN', 21.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1414, 11, 'SKU387', 'Caixa de Massa', 'Vonder', 'UN', 33.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1415, 11, 'SKU388', 'Desempenadeira de Aço', 'Momfort', 'UN', 45.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1416, 11, 'SKU389', 'Colher de Pedreiro', 'Tramontina', 'UN', 57.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1417, 11, 'SKU390', 'Prumo de Parede', 'Vonder', 'UN', 69.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1418, 11, 'SKU391', 'Linha de Pedreiro', 'Momfort', 'UN', 81.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1419, 11, 'SKU392', 'Misturador Manual', 'Tramontina', 'UN', 93.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1420, 11, 'SKU393', 'Pá Quadrada', 'Vonder', 'UN', 105.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1421, 11, 'SKU394', 'Enxada Larga', 'Momfort', 'UN', 117.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Equipamentos de Obra, indicado para uso em obras, reformas e serviços de construção civil.'),
(1422, 28, 'SKU395', 'Compactador de Solo', 'CSM', 'UN', 1545.35, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1423, 28, 'SKU396', 'Placa Vibratória', 'Toyama', 'UN', 2290.81, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1424, 28, 'SKU397', 'Gerador de Energia', 'Vonder', 'UN', 3036.26, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1425, 28, 'SKU398', 'Cortadora de Piso', 'CSM', 'UN', 3781.72, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1426, 28, 'SKU399', 'Motobomba de Obra', 'Toyama', 'UN', 4527.17, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1427, 28, 'SKU400', 'Guincho de Coluna', 'Vonder', 'UN', 5272.63, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1428, 28, 'SKU401', 'Serra de Bancada', 'CSM', 'UN', 6018.08, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1429, 28, 'SKU402', 'Compressor de Ar', 'Toyama', 'UN', 6763.54, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1430, 28, 'SKU403', 'Lavadora Alta Pressão', 'Vonder', 'UN', 7508.99, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1431, 28, 'SKU404', 'Motor Estacionário', 'CSM', 'UN', 8254.45, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Máquinas Pesadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1432, 19, 'SKU405', 'Vergalhão CA-50 8mm', 'Gerdau', 'UN', 38.79, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1433, 19, 'SKU406', 'Vergalhão CA-50 10mm', 'ArcelorMittal', 'UN', 57.68, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1434, 19, 'SKU407', 'Vergalhão CA-60 5mm', 'Belgo', 'UN', 76.57, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1435, 19, 'SKU408', 'Tela Soldada', 'Gerdau', 'UN', 95.46, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1436, 19, 'SKU409', 'Arame Recozido', 'ArcelorMittal', 'UN', 114.34, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1437, 19, 'SKU410', 'Estribo Pronto', 'Belgo', 'UN', 133.23, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1438, 19, 'SKU411', 'Barra Roscada', 'Gerdau', 'UN', 152.12, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1439, 19, 'SKU412', 'Cantoneira de Aço', 'ArcelorMittal', 'UN', 171.01, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Ferragens Estruturais, indicado para uso em obras, reformas e serviços de construção civil.'),
(1440, 20, 'SKU413', 'Tábua de Pinus', 'Madeireira Brasil', 'UN', 38.40, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1441, 20, 'SKU414', 'Viga de Madeira', 'Pinus Forte', 'UN', 61.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1442, 20, 'SKU415', 'Sarrafo de Pinus', 'Madeiras ABC', 'UN', 85.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1443, 20, 'SKU416', 'Compensado Naval', 'Madeireira Brasil', 'UN', 108.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1444, 20, 'SKU417', 'Pontalete de Madeira', 'Pinus Forte', 'UN', 132.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1445, 20, 'SKU418', 'Caibro aplainado para pergolado de madeira tratado 6,5x13x150cm', 'Madeiras ABC', 'UN', 155.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1446, 20, 'SKU419', 'Ripa de Madeira', 'Madeireira Brasil', 'UN', 179.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1447, 20, 'SKU420', 'Madeirite Plastificado', 'Pinus Forte', 'UN', 202.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1448, 20, 'SKU421', 'Prancha de Madeira', 'Madeiras ABC', 'UN', 226.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Madeiras para Construção, indicado para uso em obras, reformas e serviços de construção civil.'),
(1449, 21, 'SKU422', 'Laje Pré-Moldada', 'Precon', 'UN', 62.40, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1450, 21, 'SKU423', 'Viga Pré-Moldada', 'Concrefort', 'UN', 99.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1451, 21, 'SKU424', 'Pilar Pré-Moldado', 'Premold ABC', 'UN', 137.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1452, 21, 'SKU425', 'Canaleta Pré-Moldada', 'Precon', 'UN', 174.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1453, 21, 'SKU426', 'Placa de Concreto', 'Concrefort', 'UN', 212.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1454, 21, 'SKU427', 'Pingadeira de Concreto', 'Premold ABC', 'UN', 249.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1455, 21, 'SKU428', 'Mourão de Concreto', 'Precon', 'UN', 287.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1456, 21, 'SKU429', 'Piso Intertravado', 'Concrefort', 'UN', 324.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1457, 21, 'SKU430', 'Guia de Concreto', 'Premold ABC', 'UN', 362.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Pré-Moldados, indicado para uso em obras, reformas e serviços de construção civil.'),
(1458, 17, 'SKU431', 'Telha Fibrocimento 2,44m', 'Brasilite', 'UN', 45.40, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1459, 17, 'SKU432', 'Telha Cerâmica Portuguesa', 'Eternit', 'UN', 65.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1461, 17, 'SKU434', 'Telha Translúcida', 'Brasilite', 'UN', 106.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1462, 17, 'SKU435', 'Cumeeira Cerâmica', 'Eternit', 'UN', 127.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1463, 17, 'SKU436', 'Telha Ondulada', 'Onduline', 'UN', 147.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1464, 17, 'SKU437', 'Telha Sanduíche', 'Brasilite', 'UN', 168.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1465, 17, 'SKU438', 'Rufo Galvanizado', 'Eternit', 'UN', 188.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1466, 17, 'SKU439', 'Calha PVC', 'Onduline', 'UN', 209.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Telhas e Coberturas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1468, 14, 'SKU441', 'Carrinho de Mão Reforçado', 'Maestro', 'UN', 243.23, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Carrinhos de Mão, indicado para uso em obras, reformas e serviços de construção civil.'),
(1469, 14, 'SKU442', 'Carrinho Caçamba Metálica', 'Vonder', 'UN', 279.90, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Carrinhos de Mão, indicado para uso em obras, reformas e serviços de construção civil.'),
(1471, 14, 'SKU444', 'Carrinho Pneu Câmara', 'Maestro', 'UN', 353.23, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Carrinhos de Mão, indicado para uso em obras, reformas e serviços de construção civil.'),
(1472, 14, 'SKU445', 'Carrinho 80L', 'Vonder', 'UN', 389.90, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Carrinhos de Mão, indicado para uso em obras, reformas e serviços de construção civil.'),
(1475, 13, 'SKU448', 'Andaime Tubular', 'Mor', 'UN', 363.65, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Andaimes e Escadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1476, 13, 'SKU449', 'Andaime Fachadeiro', 'Alulev', 'UN', 597.40, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Andaimes e Escadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1477, 13, 'SKU450', 'Escada Alumínio 6 x2 Degraus', 'Metalcava', 'UN', 831.15, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Andaimes e Escadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1479, 13, 'SKU452', 'Escada Multifuncional', 'Alulev', 'UN', 1298.65, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Andaimes e Escadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1480, 13, 'SKU453', 'Plataforma de Trabalho', 'Vonder', 'UN', 482.00, 0.00, 5.00, 0.00, 'ativo', 'Produto da categoria Andaimes e Escadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1481, 13, 'SKU454', 'Sapatas para Andaime', 'Mor', 'UN', 1766.15, 0.00, 0.00, 0.00, 'ativo', 'Produto da categoria Andaimes e Escadas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1482, 31, 'SKU455', 'Fita Crepe', '3M', 'UN', 15.30, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1483, 31, 'SKU456', 'Fita Isolante', 'Vonder', 'UN', 24.70, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1484, 31, 'SKU457', 'Lona Plástica', 'Atlas', 'UN', 34.10, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1486, 31, 'SKU459', 'Balde Graduado', 'Vonder', 'UN', 52.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1487, 31, 'SKU460', 'Espátula Multiuso', 'Atlas', 'UN', 62.30, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1488, 31, 'SKU461', 'Estilete Profissional', 'Tramontina', 'UN', 71.70, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1489, 31, 'SKU462', 'Trincha Média', 'Vonder', 'UN', 81.10, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Acessórios Diversos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1491, 32, 'SKU464', 'Luva de Raspa', 'Worker', 'UN', 14.00, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1492, 32, 'SKU465', 'Luva Nitrílica', 'Volk', 'UN', 19.10, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1493, 32, 'SKU466', 'Luva Pigmentada', 'Danny', 'UN', 24.20, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1494, 32, 'SKU467', 'Luva Vaqueta', 'Worker', 'UN', 29.30, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1495, 32, 'SKU468', 'Luva Anticorte', 'Volk', 'UN', 34.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1496, 32, 'SKU469', 'Luva Látex', 'Danny', 'UN', 39.50, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1497, 32, 'SKU470', 'Luva PVC', 'Worker', 'UN', 44.60, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1498, 32, 'SKU471', 'Luva Soldador', 'Volk', 'UN', 49.70, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1499, 32, 'SKU472', 'Luva Multiuso', 'Danny', 'UN', 54.80, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Luvas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1500, 33, 'SKU473', 'Capacete Branco', '3M', 'UN', 31.40, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1501, 33, 'SKU474', 'Capacete Azul', 'Camper', 'UN', 37.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1502, 33, 'SKU475', 'Capacete Amarelo', 'MSA', 'UN', 44.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1503, 33, 'SKU476', 'Capacete Vermelho', '3M', 'UN', 50.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1504, 33, 'SKU477', 'Capacete com Carneira', 'Camper', 'UN', 57.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1505, 33, 'SKU478', 'Capacete Aba Frontal', 'MSA', 'UN', 63.90, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1506, 33, 'SKU479', 'Capacete Ventilado', '3M', 'UN', 70.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1507, 33, 'SKU480', 'Capacete Classe B', 'Camper', 'UN', 76.90, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1508, 33, 'SKU481', 'Capacete Obra Premium', 'MSA', 'UN', 83.40, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Capacetes, indicado para uso em obras, reformas e serviços de construção civil.'),
(1509, 34, 'SKU482', 'Bota PVC Branca', 'Marluvas', 'UN', 53.54, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1510, 34, 'SKU483', 'Bota PVC Preta', 'Cartom', 'UN', 67.17, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1511, 34, 'SKU484', 'Botina Segurança', 'Bracol', 'UN', 80.81, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1512, 34, 'SKU485', 'Bota Couro Biqueira', 'Marluvas', 'UN', 94.45, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1513, 34, 'SKU486', 'Bota Impermeável', ' Cartom', 'UN', 108.08, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1514, 34, 'SKU487', 'Bota Antiderrapante', 'Bracol', 'UN', 121.72, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1515, 34, 'SKU488', 'Botina Elástico', 'Marluvas', 'UN', 135.35, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1516, 34, 'SKU489', 'Bota Cano Longo', 'Cartom', 'UN', 148.99, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1517, 34, 'SKU490', 'Bota Obra Pesada', 'Bracol', 'UN', 162.63, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1518, 34, 'SKU491', 'Bota EPI Premium', 'Marluvas', 'UN', 176.26, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Botas, indicado para uso em obras, reformas e serviços de construção civil.'),
(1519, 35, 'SKU492', 'Óculos Incolor', '3M', 'UN', 15.35, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1520, 35, 'SKU493', 'Óculos Fumê', 'Danny', 'UN', 20.81, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1521, 35, 'SKU494', 'Óculos Antiembaçante', 'Kalipso', 'UN', 26.26, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1522, 35, 'SKU495', 'Óculos Ampla Visão', '3M', 'UN', 31.72, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1523, 35, 'SKU496', 'Óculos Proteção UV', 'Danny', 'UN', 37.17, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1524, 35, 'SKU497', 'Óculos Lente Cinza', 'Kalipso', 'UN', 42.63, 0.00, 5.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1525, 35, 'SKU498', 'Óculos Lente Verde', '3M', 'UN', 48.08, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1526, 35, 'SKU499', 'Óculos Segurança Plus', 'Danny', 'UN', 53.54, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.'),
(1528, 35, 'SKU501', 'Óculos EPI Premium', '3M', 'UN', 64.45, 0.00, 0.00, 15.00, 'ativo', 'Produto da categoria Óculos, indicado para uso em obras, reformas e serviços de construção civil.');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil_usuario` enum('cliente','admin') NOT NULL DEFAULT 'cliente',
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `perfil_usuario`, `cpf`, `telefone`, `cep`, `estado`, `cidade`, `bairro`, `numero`, `data_cadastro`) VALUES
(1, 'João Silva', 'joao@email.com', '123456', 'cliente', '111.111.111-11', '11999990001', '09510-000', 'SP', 'São Caetano', 'Centro', '101', '2026-05-29'),
(2, 'Maria Souza', 'maria@email.com', '123456', 'cliente', '222.222.222-22', '11999990002', '09520-000', 'SP', 'Santo André', 'Campestre', '202', '2026-05-29'),
(3, 'Carlos Lima', 'carlos@email.com', '123456', 'admin', '333.333.333-33', '11999990003', '09530-000', 'SP', 'São Bernardo', 'Assunção', '303', '2026-05-29'),
(4, 'Fernanda Rocha', 'fernanda@email.com', '123456', 'cliente', '444.444.444-44', '11999990004', '09540-000', 'SP', 'Diadema', 'Centro', '404', '2026-05-29'),
(5, 'Lucas Martins', 'lucas@email.com', '123456', 'cliente', '555.555.555-55', '11999990005', '09550-000', 'SP', 'Mauá', 'Jardim', '505', '2026-05-29'),
(27, 'Christian', 'pernacomj@gmail.com', '$2y$10$pLlDZQmP2KTf.U6SWCioEuKISvOWvoQF7XSfx.yarWBNKH5SIYiaq', 'admin', '150.140.487-30', '(21) 98898-9301', '25080-680', 'Ri', 'Duque de Caixias', 'Jardim Panamá', '35', '2026-06-02'),
(28, 'teste', 't@t', '$2y$10$8XfxjXMbsPXgwe8k4eb98O6MeYCYNk5vKijjgRyB67X/SOMAWTHOO', 'admin', '213.222.444-67', '(11) 87796-4444', '23456-555', 'SP', 'SP', '1', '11', '2026-06-03'),
(30, 'Giovanni Rigo Rinaldi', 'grigorinaldi@gmail.com', '$2y$10$7NfeinTKwz8jVXw6Ki9vse6byi32nbOmTl3c3XZStmotjte/TPxx2', 'cliente', '448.123.548-97', '(11) 99320-8197', '09555-444', 'SP', 'São Bernardo do Campo', 'Jardim do Mar', '444', '2026-06-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `slug_categoria` (`slug_categoria`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `foto_produto`
--
ALTER TABLE `foto_produto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `item_carrinho`
--
ALTER TABLE `item_carrinho`
  ADD PRIMARY KEY (`id_item_carrinho`),
  ADD KEY `idCarrinho` (`idCarrinho`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`id_item_pedido`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idItem_Carrinho` (`idItem_Carrinho`);

--
-- Indexes for table `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPagamento` (`idPagamento`),
  ADD KEY `idEstoque` (`idEstoque`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `idCarrinho` (`idCarrinho`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD UNIQUE KEY `idPagamento` (`idPagamento`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `foto_produto`
--
ALTER TABLE `foto_produto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `item_carrinho`
--
ALTER TABLE `item_carrinho`
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1539;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_produto`
--
ALTER TABLE `foto_produto`
  ADD CONSTRAINT `foto_produto_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_carrinho`
--
ALTER TABLE `item_carrinho`
  ADD CONSTRAINT `item_carrinho_ibfk_1` FOREIGN KEY (`idCarrinho`) REFERENCES `carrinho` (`id_carrinho`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_carrinho_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`idItem_Carrinho`) REFERENCES `item_carrinho` (`id_item_carrinho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimentacao_ibfk_2` FOREIGN KEY (`idPagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `movimentacao_ibfk_3` FOREIGN KEY (`idEstoque`) REFERENCES `estoque` (`id_estoque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`idCarrinho`) REFERENCES `carrinho` (`id_carrinho`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idPagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
