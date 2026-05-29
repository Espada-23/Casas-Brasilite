-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 11:06 PM
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
(1, 1, 16, 5, '2026-05-25 16:28:55'),
(2, 2, 17, 4, '2026-05-25 16:28:55'),
(3, 3, 18, 5, '2026-05-25 16:28:55'),
(4, 4, 19, 3, '2026-05-25 16:28:55'),
(5, 5, 20, 4, '2026-05-25 16:28:55');

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
(5, 5, '2026-05-25 16:24:55', 'aberto');

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
(8, 'Tintas', 'tintas');

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
  `status_estoque` enum('disponivel','indisponivel') NOT NULL DEFAULT 'disponivel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `idProduto`, `quantidade_atual`, `estoque_minimo`, `local_armazenamento`, `status_estoque`) VALUES
(6, 16, 121, 10, 'Corredor A1', 'disponivel'),
(7, 17, 35, 5, 'Corredor B2', 'disponivel'),
(8, 18, 20, 3, 'Corredor C1', 'disponivel'),
(9, 19, 80, 15, 'Galpão D4', 'disponivel'),
(10, 20, 51, 5, 'Corredor B1', 'disponivel');

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
(1, 1, 16, '2026-05-25 16:28:55', 1),
(2, 2, 17, '2026-05-25 16:28:55', 1),
(3, 3, 18, '2026-05-25 16:28:55', 1),
(4, 4, 19, '2026-05-25 16:28:55', 1),
(5, 5, 20, '2026-05-25 16:28:55', 1);

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
(1, 1, 16, 'Produto muito bom', '2026-05-25 16:28:55', 'respondido'),
(2, 2, 17, 'Excelente qualidade', '2026-05-25 16:28:55', 'respondido'),
(3, 3, 18, 'Entrega demorou', '2026-05-25 16:28:55', 'pendente'),
(4, 4, 19, 'Produto veio quebrado', '2026-05-25 16:28:55', 'pendente'),
(5, 5, 20, 'Ótimo custo benefício', '2026-05-25 16:28:55', 'respondido');

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
(1, 16, 'uploads/01/Cimento CP-II.webp', 'Imagem do cimento'),
(2, 17, 'uploads/02/Furadeira Impacto 750W.webp', 'Imagem da furadeira'),
(3, 18, 'uploads/03/Torneira Gourmet Inox.webp', 'Imagem da torneira'),
(4, 19, 'uploads/04/Piso Porcelanato 60x60.webp', 'Imagem do piso'),
(5, 20, 'uploads/05/Martelo Cabo de Fibra.webp', 'Imagem do martelo');

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
(1, 1, 16, 2, 85.80, 42.90),
(2, 2, 17, 1, 299.90, 299.90),
(3, 3, 18, 1, 189.50, 189.50),
(4, 4, 19, 3, 239.70, 79.90),
(5, 5, 20, 2, 109.80, 54.90);

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
(3, 3, 3, 1, 189.50, 189.50),
(4, 4, 4, 3, 79.90, 239.70),
(5, 5, 5, 2, 54.90, 109.80);

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
(8, 3, 3, 8, 'entrada', 5, '2026-05-25 16:28:12', 'pendente'),
(9, 4, 4, 9, 'saida', 3, '2026-05-25 16:28:12', 'concluido'),
(10, 5, 5, 10, 'saida', 2, '2026-05-25 16:28:12', 'concluido');

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
(1, 1, 1, 'pix', 'pago', 100.80, '2026-05-25 16:24:55'),
(2, 2, 2, 'cartao', 'pago', 324.90, '2026-05-25 16:24:55'),
(3, 3, 3, 'boleto', 'pendente', 207.50, '2026-05-25 16:24:55'),
(4, 4, 4, 'pix', 'cancelado', 269.70, '2026-05-25 16:24:55'),
(5, 5, 5, 'cartao', 'pago', 121.80, '2026-05-25 16:24:55');

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
(1, 1, 1, 'enviado', '2026-05-25 16:24:55', 'BR123456789'),
(2, 2, 2, 'entregue', '2026-05-25 16:24:55', 'BR987654321'),
(3, 3, 3, 'processando', '2026-05-25 16:24:55', 'BR456123789'),
(4, 4, 4, 'cancelado', '2026-05-25 16:24:55', 'BR741852963'),
(5, 5, 5, 'enviado', '2026-05-25 16:24:55', 'BR369258147');

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
(16, 3, 'SKU001', 'Cimento CP-II 50kg', 'Votoran', 'UN', 42.90, 0.00, 15.00, 'ativo', 'Cimento para construção civil com alta resistência'),
(17, 2, 'SKU002', 'Furadeira Impacto 750W', 'Bosch', 'UN', 299.90, 20.00, 25.00, 'ativo', 'Furadeira elétrica profissional com função impacto'),
(18, 4, 'SKU003', 'Torneira Gourmet Inox', 'Deca', 'UN', 189.50, 10.00, 18.00, 'ativo', 'Torneira gourmet flexível em aço inox'),
(19, 6, 'SKU004', 'Piso Porcelanato 60x60', 'Portobello', 'M2', 79.90, 5.00, 30.00, 'ativo', 'Porcelanato acetinado para áreas internas'),
(20, 1, 'SKU005', 'Martelo Cabo Fibra 27mm', 'Tramontina', 'UN', 54.90, 0.00, 12.00, 'ativo', 'Martelo profissional com cabo em fibra resistente');

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
(5, 'Lucas Martins', 'lucas@email.com', '123456', 'cliente', '555.555.555-55', '11999990005', '09550-000', 'SP', 'Mauá', 'Jardim', '505', '2026-05-29');

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
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto_produto`
--
ALTER TABLE `foto_produto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_carrinho`
--
ALTER TABLE `item_carrinho`
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
