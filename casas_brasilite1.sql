-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 07:35 PM
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
(44, 28, 2, 5, '2026-06-08 14:29:08');

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
(31, 28, '2026-06-07 18:38:01', 'aberto');

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
(6, 1, 91, 10, 'Corredor A1', ''),
(7, 2, 31, 5, 'Corredor B2', ''),
(9, 19, 80, 15, 'Galpão D4', 'Atenção'),
(10, 18, 51, 5, 'Corredor B1', 'Normal'),
(12, 25, 50, 5, 'Corredor C4', 'Normal'),
(13, 26, 0, 5, 'Corredor E0', 'Normal'),
(14, 21, 50, 5, 'Corredor C3', 'Normal'),
(15, 48, 50, 5, 'Corredor B3', 'Normal'),
(16, 22, 6, 5, 'Corredor A9', 'Normal'),
(17, 49, 50, 5, 'Corredor C7', 'Normal'),
(18, 34, 44, 5, 'Corredor B5', ''),
(19, 50, 50, 5, 'Corredor D9', 'Normal'),
(20, 35, 50, 5, 'Corredor C4', 'Normal'),
(21, 36, 50, 5, 'Corredor E1', 'Normal'),
(22, 51, 50, 5, 'Corredor A8', 'Normal'),
(23, 27, 50, 5, 'Corredor A9', 'Normal'),
(24, 52, 50, 5, 'Corredor B5', 'Normal'),
(25, 33, 49, 5, 'Corredor A4', ''),
(26, 29, 43, 5, 'Corredor B2', ''),
(27, 32, 50, 5, 'Corredor B6', 'Normal'),
(28, 54, 3, 5, 'Corredor C1', ''),
(29, 31, 50, 5, 'Corredor B2', 'Normal'),
(30, 55, 47, 5, 'Corredor C3', ''),
(31, 39, 50, 5, 'Corredor C7', 'Normal'),
(32, 44, 50, 5, 'Corredor E2', 'Normal'),
(33, 37, 50, 5, 'Corredor D5', 'Normal'),
(34, 38, 50, 5, 'Corredor E4', 'Normal'),
(35, 45, 50, 5, 'Corredor E7', 'Normal'),
(36, 46, 50, 5, 'Corredor A3', 'Normal'),
(37, 24, 50, 5, 'Corredor B9', 'Normal'),
(38, 42, 50, 5, 'Corredor D4', 'Normal'),
(39, 43, 50, 5, 'Corredor B3', 'Normal'),
(40, 47, 50, 5, 'Corredor D6', 'Normal'),
(50, 84, 123, 20, 'Corredor A2', ''),
(52, 86, 80, 20, 'Corredor A2', '');

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
(10, 28, 2, 'Opa! Gostei do trabalho de vcs, time Casas Brasilite.', '2026-06-08 14:29:08', 'pendente');

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
(36, 54, 'uploads/33/Andaime Tubular.webp', 'Imagem do produto'),
(37, 55, 'uploads/34/Carrinho Simples.webp', 'Imagem do produto'),
(43, 84, 'uploads/1780608787_Trincha.webp', 'Trincha 920'),
(45, 86, 'uploads/1780610427_Desempenadeira.webp', 'Desempenadeira');

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
(76, 12, 34, 3, 269.70, 89.90),
(77, 31, 29, 3, 15599.70, 5199.90);

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
(39, 25, 66, 1, 89.90, 89.90);

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
(76, 28, 25, 18, 'saida', 1, '2026-06-07 17:37:52', 'concluido');

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
(28, 30, 28, 'pix', 'pago', 26.26, '2026-06-07 18:38:01');

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
(22, 22, 28, 'processando', '2026-06-04 23:57:30', 'BR20260605045730142'),
(23, 23, 28, 'processando', '2026-06-04 23:58:59', 'BR20260605045859507'),
(25, 25, 28, 'enviado', '2026-06-07 17:37:52', 'BR20260607223752135'),
(26, 26, 28, 'cancelado', '2026-06-07 17:40:25', 'BR20260607224025668'),
(27, 27, 28, 'cancelado', '2026-06-07 18:35:52', 'BR20260607233552663'),
(28, 28, 28, 'entregue', '2026-06-07 18:38:01', 'BR20260607233801892');

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
  `desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `frete` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status_produto` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `descricao_produto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id_produto`, `idCategoria`, `sku`, `nome_produto`, `marca`, `unidade_medida`, `preco_unitario`, `desconto`, `frete`, `status_produto`, `descricao_produto`) VALUES
(1, 3, 'SKU001', 'Cimento CP-II 50kg', 'Votoran', 'UN', 42.90, 0.00, 15.00, 'ativo', 'Cimento CP-II 50kg indicado para obras estruturais e uso geral. Possui alta resistência, ótima aderência e excelente desempenho em concretos e argamassas.'),
(2, 2, 'SKU002', 'Furadeira Impacto 750W', 'Bosch', 'UN', 299.90, 20.00, 0.00, 'ativo', 'Furadeira de impacto potente com 750W, ideal para perfurações em madeira, concreto e metal. Design ergonômico e alta durabilidade.'),
(18, 1, 'SKU005', 'Martelo Cabo Fibra 27mm', 'Tramontina', 'UN', 54.90, 0.00, 12.00, 'ativo', 'Martelo profissional com cabo em fibra resistente, oferecendo maior segurança, durabilidade e precisão no uso.'),
(19, 6, 'SKU004', 'Piso Porcelanato 60x60', 'Portobello', 'M2', 79.90, 5.00, 30.00, 'ativo', 'Porcelanato de alta qualidade com acabamento sofisticado, ideal para ambientes internos, proporcionando beleza e resistência.'),
(21, 3, 'SKU100', 'Cimento CP-IV 50kg', 'Votoran', 'UN', 39.90, 0.00, 15.00, 'ativo', 'Cimento CP-IV com maior durabilidade e resistência a ambientes agressivos, ideal para obras expostas à umidade e agentes químicos.'),
(22, 4, 'SKU101', 'Argamassa AC-II 20kg', 'Quartzolit', 'UN', 24.90, 0.00, 12.00, 'ativo', 'Argamassa de alta qualidade para assentamento de pisos e revestimentos. Fácil aplicação, ótima fixação e excelente acabamento.'),
(24, 23, 'SKU103', 'Areia Média 20kg', 'Grupo Tomino', 'SC', 6.90, 0.00, 10.00, 'ativo', 'Areia média peneirada, ideal para preparo de concreto, argamassa e obras em geral.'),
(25, 1, 'SKU104', 'Chave de Fenda 1/4', 'Tramontina', 'UN', 12.90, 0.00, 8.00, 'ativo', 'Chave de fenda resistente com cabo ergonômico, ideal para uso doméstico e profissional.'),
(26, 1, 'SKU105', 'Alicate Universal', 'Vonder', 'UN', 29.90, 0.00, 10.00, 'ativo', 'Alicate universal de alta resistência, ideal para corte, aperto e manipulação de fios e objetos metálicos.'),
(27, 10, 'SKU106', 'Martelete Rompedor 1500W', 'Makita', 'UN', 899.90, 50.00, 0.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(29, 12, 'SKU108', 'Betoneira 400L', 'Menegotti', 'UN', 5199.90, 15.00, 0.00, 'ativo', 'Betoneira eficiente para mistura de concreto, ideal para construção civil.'),
(31, 14, 'SKU110', 'Carrinho de Mão Reforçado', 'Tramontina', 'UN', 399.90, 10.00, 0.00, 'ativo', 'Carrinho de mão reforçado, ideal para transporte de materiais em obras.'),
(32, 13, 'SKU111', 'Escada Alumínio 6 Degraus', 'Mor', 'UN', 249.90, 0.00, 0.00, 'ativo', 'Escada de alumínio leve e resistente, ideal para uso doméstico e profissional.'),
(33, 11, 'SKU112', 'Balde de Obra 20L', 'FWB', 'UN', 19.90, 0.00, 8.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(34, 6, 'SKU113', 'Porcelanato Polido 60x60', 'Eliane', 'M2', 89.90, 5.00, 30.00, 'ativo', 'Porcelanato de alta qualidade com acabamento sofisticado, ideal para ambientes internos, proporcionando beleza e resistência.'),
(35, 7, 'SKU114', 'Revestimento Cerâmico Branco', 'Portinari', 'M2', 45.90, 0.00, 25.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(36, 8, 'SKU115', 'Tinta Toque Seda Branco Neve 18L', 'Suvinil', 'UN', 649.90, 20.00, 0.00, 'ativo', 'Tinta de alta cobertura e durabilidade, ideal para paredes internas e externas, proporcionando acabamento uniforme.'),
(37, 19, 'SKU116', 'Vergalhão 8mm', 'Gerdau', 'UN', 32.00, 0.00, 15.00, 'ativo', 'Vergalhão de aço utilizado em estruturas de concreto armado, garantindo resistência e segurança.'),
(38, 20, 'SKU117', 'Tábua Madeira Pinus', 'Madeireira SP', 'UN', 22.50, 0.00, 15.00, 'ativo', 'Madeira de pinus tratada para uso em construção e estruturas diversas.'),
(39, 17, 'SKU118', 'Telha Fibrocimento 2.44m', 'Brasilit', 'UN', 59.90, 0.00, 20.00, 'ativo', 'Telha resistente para cobertura, oferecendo proteção contra chuva e durabilidade.'),
(42, 24, 'SKU121', 'Parafuso 5mm pacote', 'Vonder', 'UN', 23.90, 0.00, 6.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(43, 24, 'SKU122', 'Bucha Nylon 6mm', 'Fischer', 'UN', 7.90, 0.00, 6.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(44, 18, 'SKU123', 'Manta Líquida 5kg', 'Vedacit', 'UN', 129.90, 0.00, 15.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(45, 21, 'SKU124', 'Laje Pré-Moldada', 'Local', 'M2', 120.00, 0.00, 40.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(46, 22, 'SKU125', 'Desempenadeira Aço', 'Atlas', 'UN', 29.90, 0.00, 10.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(47, 26, 'SKU126', 'Vassoura de Obra', 'Condor', 'UN', 19.90, 0.00, 8.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(48, 3, 'SKU127', 'Cimento CP-I 50kg', 'Holcim', 'UN', 41.90, 0.00, 15.00, 'ativo', 'Cimento CP-I tradicional, ideal para obras simples, rebocos e assentamentos em geral.'),
(49, 4, 'SKU128', 'Argamassa AC-III', 'Quartzolit', 'UN', 34.90, 0.00, 15.00, 'ativo', 'Argamassa de alta qualidade para assentamento de pisos e revestimentos. Fácil aplicação, ótima fixação e excelente acabamento.'),
(50, 6, 'SKU129', 'Piso Cerâmico 45x45', 'Delta', 'M2', 39.90, 0.00, 25.00, 'ativo', 'Piso cerâmico resistente, ideal para áreas internas com ótimo custo-benefício e fácil limpeza.'),
(51, 8, 'SKU130', 'Tinta Esmalte 3,6L', 'Coral', 'UN', 89.90, 0.00, 12.00, 'ativo', 'Tinta de alta cobertura e durabilidade, ideal para paredes internas e externas, proporcionando acabamento uniforme.'),
(52, 10, 'SKU131', 'Talhadeira Profissional', 'Tramontina', 'UN', 24.90, 0.00, 10.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(54, 1, 'SKU133', 'Andaime 1x1 - Andaime Certificado Nr18 - Andaime Tubular', 'Metalframe', 'UN', 19.90, 0.00, 5.00, 'ativo', 'Produto de alta qualidade indicado para construção civil, oferecendo resistência, durabilidade e ótimo desempenho.'),
(55, 14, 'SKU134', 'Carrinho Simples', 'Tramontina', 'UN', 149.90, 0.00, 25.00, 'ativo', 'Carrinho de mão reforçado, ideal para transporte de materiais em obras.'),
(84, 1, 'SKU340', 'Trincha para Paredes e Tetos Premium 920', 'Tigre', 'UN', 46.90, 0.00, 10.00, 'ativo', 'Trincha Premium Tigre para tintas látex e acrílica e superfícies tipo parede ou teto. O produto possui filamentos sintéticos alongados de alta precisão, garantia de maior rendimento em cada pincelada. Disponível em diversos tamanhos, as trinchas contam com cabo Soft Grip, resistente e anatômico.'),
(86, 1, 'SKU344', 'Desempenadeira Tigre PRO', 'Tigre', 'UN', 90.60, 0.00, 12.00, 'ativo', 'Ideal para aplicação em diversos tipos de superfícies, como paredes e pisos, oferecendo um acabamento profissional em diversos tipos de materiais.');

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
(28, 'teste', 't@t', '$2y$10$8XfxjXMbsPXgwe8k4eb98O6MeYCYNk5vKijjgRyB67X/SOMAWTHOO', 'admin', '213.222.444-67', '(11) 87796-4444', '23456-555', 'SP', 'SP', '1', '11', '2026-06-03');

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
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foto_produto`
--
ALTER TABLE `foto_produto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `item_carrinho`
--
ALTER TABLE `item_carrinho`
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
