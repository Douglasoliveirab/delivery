-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22/03/2023 às 21:00
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lanchonete`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `privilegios` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `img_banner` varchar(50) NOT NULL,
  `caminho_banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `banner`
--

INSERT INTO `banner` (`id_banner`, `img_banner`, `caminho_banner`) VALUES
(1, 'pede1leva2.png', 'banners/pede1leva2.png'),
(2, 'itenspor499.png', 'banners/itenspor499.png'),
(3, 'salgadinhos.png', 'banners/salgadinhos.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `img_categoria` varchar(100) NOT NULL,
  `nome_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `img_categoria`, `nome_categoria`) VALUES
(1, 'categorias/bebidas.png', 'Bebidas'),
(2, 'categorias/hot-dog.png', 'Hotdog'),
(3, 'categorias/pizzas.png', 'Pizzas'),
(4, 'categorias/lanche.png', 'Lanches'),
(6, 'categorias/comida.png', 'Comida'),
(7, 'categorias/salgados.png', 'Salgados');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `sobrenome`, `cpf`, `email`, `telefone`, `endereco`, `senha`) VALUES
(1, 'douglas', 'oliveira', '438.288.558-20', 'dgsoliverfamilia@gmail.com', '(11) 99342-6890', '137 Rua Maria Aurora Passini', '$2y$10$29SPcE9j71B9Nxb3AsfpbeqO4hZyY/IkxTdTBUpKjukGGGuB5KFYm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id_itens_pedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_itens_pedido`, `id_pedido`, `id_produto`, `quantidade`) VALUES
(1, 1, 2, 2),
(2, 1, 1, 2),
(3, 1, 4, 1),
(4, 1, 3, 1),
(5, 2, 2, 3),
(6, 2, 1, 3),
(7, 2, 4, 2),
(8, 2, 3, 1),
(9, 3, 4, 2),
(10, 3, 3, 2),
(11, 3, 1, 2),
(12, 4, 2, 2),
(13, 4, 1, 2),
(14, 4, 4, 1),
(15, 5, 2, 1),
(16, 6, 2, 1),
(17, 7, 4, 1),
(18, 8, 2, 1),
(19, 9, 1, 2),
(20, 9, 2, 2),
(21, 9, 4, 2),
(22, 9, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `datahora_pedido` datetime NOT NULL,
  `numero_pedido` varchar(50) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `frete` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `datahora_pedido`, `numero_pedido`, `subtotal`, `frete`, `valor_total`, `status`) VALUES
(1, 1, '2023-03-21 16:37:45', '00148', '45.98', '5.00', '50.98', 'Recusado'),
(2, 1, '2023-03-21 16:39:40', '00148', '65.97', '5.00', '70.97', 'Em Preparação'),
(3, 1, '2023-03-21 18:23:13', '00148', '61.96', '5.00', '66.96', 'Em Preparação'),
(4, 1, '2021-03-23 14:30:00', '00148', '29.99', '5.00', '34.99', 'Em Preparação'),
(5, 1, '2023-03-21 14:31:00', '00148', '5.00', '5.00', '10.00', 'A caminho'),
(6, 1, '2021-03-23 14:33:00', '00148', '5.00', '5.00', '10.00', 'A caminho'),
(7, 1, '2021-03-23 14:37:00', '00148', '9.99', '5.00', '14.99', 'pendente'),
(8, 1, '2023-03-21 14:38:59', '00148', '5.00', '5.00', '10.00', 'pendente'),
(9, 1, '2023-03-21 17:26:49', '00148', '71.96', '5.00', '76.96', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `img_produto` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `custo_produto` decimal(10,2) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_categoria`, `nome_produto`, `img_produto`, `descricao`, `custo_produto`, `preco`) VALUES
(1, 1, 'Refrigerante', 'refrigerante.png\n', 'coca cola, 2l', '2.50', '6.00'),
(2, 1, 'Refrigerante', '\r\nguarana.png', 'guarana kuat, 350ml', '3.50', '5.50'),
(3, 2, 'DOG ESPECIAL', 'dog.jpg', 'muto bom', '3.50', '15.99'),
(4, 2, 'DOG top', 'dog.jpg', 'alface,batat palha,2 salsichas', '3.50', '9.99'),
(5, 1, 'Cerveja corona', 'corona.png', '330ml', '4.00', '7.00'),
(6, 1, 'Budweiser', 'bud.png', 'Long Neck 330ml', '4.00', '6.50');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Índices de tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id_itens_pedido`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_itens_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;