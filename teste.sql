-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04/04/2023 às 22:59
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
(9, 'categorias/salgados.png', 'Salgados');

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
(1, 'douglas', 'oliveira', '438.288.558-20', 'dgsoliverfamilia@gmail.com', '(11) 99342-6890', '137 Rua Maria Aurora Passini', '$2y$10$29SPcE9j71B9Nxb3AsfpbeqO4hZyY/IkxTdTBUpKjukGGGuB5KFYm'),
(2, 'cliente t', 'este', '564.444.444-44', 'dgs@gmail.com', '(11) 99342-6890', '137 Rua Maria Aurora Passini', '$2y$10$SS9jQlmL3.YkAxdcR7bfv.BMHmIREpbO8MJy2Wxf6ZlyKz25/amNu'),
(3, 'reinaldo', 'ribeiro', '564.444.444-44', 'reinaldo@gmail.com', '(11) 11111-1111', '140 Centro Francisco morato', '$2y$10$SoPbtogWb91YDYY2ypdHNuypjzOP3n9ITtGv99yj8xfNmPzIHQrWa');

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
(22, 9, 3, 2),
(23, 10, 1, 1),
(24, 11, 2, 1),
(25, 11, 5, 1),
(26, 12, 1, 5),
(27, 12, 5, 1),
(28, 12, 2, 1),
(29, 13, 5, 1),
(30, 13, 2, 1),
(31, 13, 3, 1),
(32, 14, 5, 1),
(33, 14, 2, 1),
(34, 14, 3, 1),
(35, 16, 5, 1),
(36, 16, 2, 1),
(37, 16, 3, 1),
(38, 17, 5, 1),
(39, 17, 2, 1),
(40, 17, 3, 1),
(41, 18, 5, 1),
(42, 18, 2, 1),
(43, 18, 3, 1),
(44, 19, 5, 1),
(45, 19, 2, 1),
(46, 19, 3, 1),
(47, 20, 5, 1),
(48, 20, 2, 1),
(49, 20, 3, 1),
(50, 21, 5, 1),
(51, 21, 2, 1),
(52, 21, 3, 1),
(53, 22, 5, 1),
(54, 22, 2, 1),
(55, 22, 3, 1),
(56, 23, 5, 1),
(57, 23, 2, 1),
(58, 23, 3, 1),
(59, 24, 5, 1),
(60, 24, 2, 1),
(61, 24, 3, 1),
(62, 25, 5, 1),
(63, 25, 2, 1),
(64, 25, 3, 1),
(65, 26, 5, 1),
(66, 26, 2, 1),
(67, 26, 3, 1),
(68, 27, 5, 1),
(69, 27, 2, 1),
(70, 27, 3, 1),
(71, 28, 5, 1),
(72, 28, 2, 1),
(73, 28, 3, 1),
(74, 29, 5, 1),
(75, 29, 2, 1),
(76, 29, 3, 1),
(77, 30, 5, 1),
(78, 30, 2, 1),
(79, 30, 3, 1),
(80, 31, 5, 1),
(81, 31, 2, 1),
(82, 31, 3, 1),
(83, 32, 5, 1),
(84, 32, 2, 1),
(85, 32, 3, 1),
(86, 33, 5, 1),
(87, 33, 2, 1),
(88, 33, 3, 1),
(92, 69, 5, 1),
(93, 69, 2, 1),
(94, 69, 3, 4),
(95, 70, 1, 1),
(96, 71, 3, 1),
(97, 72, 3, 2),
(98, 72, 5, 1),
(99, 73, 5, 1),
(100, 74, 6, 1),
(101, 75, 6, 1),
(102, 76, 5, 1),
(103, 76, 1, 1),
(104, 76, 2, 1),
(105, 77, 6, 1),
(106, 78, 5, 1),
(107, 78, 1, 1),
(108, 79, 5, 1),
(109, 79, 1, 1),
(110, 79, 2, 2),
(111, 80, 1, 1),
(112, 80, 5, 1),
(113, 80, 2, 2),
(114, 80, 6, 1),
(115, 81, 1, 1),
(116, 81, 2, 2),
(117, 81, 5, 1),
(118, 81, 3, 2),
(119, 81, 4, 1),
(120, 82, 5, 1),
(121, 82, 1, 1),
(122, 83, 2, 3),
(123, 83, 1, 1),
(124, 84, 3, 4),
(125, 85, 3, 4),
(126, 86, 3, 3),
(127, 86, 4, 2),
(128, 87, 3, 3),
(129, 87, 4, 2),
(130, 88, 1, 1),
(131, 88, 5, 1),
(132, 89, 1, 1),
(133, 89, 5, 1),
(134, 90, 1, 2),
(135, 90, 2, 1),
(136, 91, 1, 1),
(137, 92, 1, 1),
(138, 93, 1, 1),
(139, 94, 1, 2),
(140, 94, 2, 2),
(141, 95, 1, 2),
(142, 95, 2, 2),
(143, 95, 3, 1),
(144, 96, 1, 2),
(145, 96, 2, 2),
(146, 96, 3, 1),
(147, 97, 1, 2),
(148, 97, 2, 2),
(149, 97, 3, 1),
(150, 98, 1, 2),
(151, 99, 2, 1),
(152, 100, 1, 1),
(153, 101, 1, 1),
(154, 102, 1, 1),
(155, 102, 2, 1),
(156, 103, 1, 1),
(157, 104, 1, 1),
(158, 105, 4, 3),
(159, 106, 1, 1),
(160, 106, 2, 1),
(161, 107, 1, 1),
(162, 107, 5, 1),
(163, 108, 1, 2),
(164, 108, 5, 2),
(165, 109, 1, 3),
(166, 110, 1, 3),
(167, 111, 5, 6),
(168, 112, 5, 6),
(170, 114, 5, 3),
(171, 114, 1, 3),
(172, 114, 2, 3),
(173, 114, 6, 3),
(174, 115, 5, 3),
(175, 115, 1, 5),
(176, 115, 2, 3),
(177, 115, 6, 3),
(178, 116, 3, 2),
(179, 117, 2, 1),
(180, 118, 1, 1),
(181, 119, 2, 1),
(182, 119, 1, 1),
(183, 120, 3, 2),
(184, 121, 3, 3),
(185, 121, 4, 1),
(186, 122, 1, 6),
(187, 123, 1, 2),
(188, 123, 2, 3),
(189, 123, 5, 2),
(190, 123, 6, 2),
(191, 124, 1, 1),
(192, 125, 1, 1),
(193, 126, 1, 1),
(194, 127, 3, 1),
(195, 128, 3, 1),
(196, 129, 1, 1),
(197, 130, 1, 1),
(198, 131, 1, 1),
(199, 131, 2, 3),
(200, 132, 1, 1),
(201, 132, 2, 1),
(202, 133, 1, 1),
(203, 134, 5, 1),
(204, 135, 1, 1),
(205, 136, 1, 1),
(206, 137, 6, 1),
(207, 138, 1, 2),
(208, 139, 3, 2),
(209, 140, 5, 1),
(210, 140, 6, 1),
(211, 141, 6, 1),
(212, 142, 1, 1),
(213, 143, 1, 5),
(214, 144, 1, 1),
(215, 145, 5, 1),
(216, 145, 1, 1),
(217, 145, 2, 1),
(218, 145, 6, 1),
(219, 145, 8, 1),
(220, 146, 5, 1),
(221, 146, 1, 1),
(222, 146, 2, 1),
(223, 146, 6, 1),
(224, 146, 8, 1),
(225, 147, 5, 1),
(226, 148, 1, 2),
(227, 148, 3, 1),
(228, 149, 1, 1),
(229, 149, 2, 3),
(230, 149, 5, 5),
(231, 150, 5, 153),
(232, 151, 5, 2);

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
  `status_pedido` varchar(20) NOT NULL,
  `status_pagamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `datahora_pedido`, `numero_pedido`, `subtotal`, `frete`, `valor_total`, `status_pedido`, `status_pagamento`) VALUES
(1, 1, '2023-03-21 16:37:45', '00148', '45.98', '5.00', '50.98', 'Recusado', 'aprovado'),
(2, 1, '2023-03-21 16:39:40', '00148', '65.97', '5.00', '70.97', 'Em Preparação', 'aprovado'),
(3, 1, '2023-03-21 18:23:13', '00148', '61.96', '5.00', '66.96', 'A caminho', 'aprovado'),
(4, 1, '2021-03-23 14:30:00', '00148', '29.99', '5.00', '34.99', 'Recusado', 'aprovado'),
(5, 1, '2023-03-21 14:31:00', '00148', '5.00', '5.00', '10.00', 'A caminho', 'aprovado'),
(6, 1, '2021-03-23 14:33:00', '00148', '5.00', '5.00', '10.00', 'A caminho', 'aprovado'),
(7, 1, '2021-03-23 14:37:00', '00148', '9.99', '5.00', '14.99', 'Em Preparação', 'aprovado'),
(8, 1, '2023-03-21 14:38:59', '00148', '5.00', '5.00', '10.00', 'pendente', 'aprovado'),
(9, 1, '2023-03-21 17:26:49', '00148', '71.96', '5.00', '76.96', 'pendente', 'aprovado'),
(10, 1, '2023-03-24 11:59:22', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(11, 1, '2023-03-24 12:00:51', '00148', '12.50', '5.00', '17.50', 'pendente', 'aprovado'),
(12, 1, '2023-03-24 13:48:52', '00148', '42.50', '5.00', '47.50', 'pendente', 'aprovado'),
(13, 1, '2023-03-24 13:52:17', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(14, 1, '2023-03-24 13:53:11', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(15, 1, '2023-03-24 14:24:26', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(16, 1, '2023-03-24 14:24:26', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(17, 1, '2023-03-24 14:24:26', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(18, 1, '2023-03-24 14:24:26', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(19, 1, '2023-03-24 14:24:26', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(20, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(21, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(22, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(23, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(24, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(25, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(26, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(27, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(28, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(29, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(30, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(31, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(32, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(33, 1, '2023-03-24 14:38:32', '00148', '28.49', '5.00', '33.49', 'pendente', 'aprovado'),
(69, 1, '2023-03-24 16:10:29', '00148', '76.46', '5.00', '81.46', 'pendente', 'aprovado'),
(70, 1, '2023-03-24 16:11:21', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(71, 1, '2023-03-24 16:14:02', '00148', '15.99', '5.00', '20.99', 'pendente', 'aprovado'),
(72, 2, '2023-03-24 17:01:10', '00148', '38.98', '5.00', '43.98', 'pendente', 'aprovado'),
(73, 2, '2023-03-24 17:04:06', '00148', '7.00', '5.00', '12.00', 'Em Preparação', 'aprovado'),
(74, 2, '2023-03-24 17:49:28', '00148', '0.50', '0.00', '0.50', 'pendente', 'aprovado'),
(75, 2, '2023-03-24 17:49:28', '00148', '0.50', '0.00', '0.50', 'pendente', 'aprovado'),
(76, 1, '2023-03-25 14:35:31', '00148', '18.50', '0.00', '18.50', 'pendente', 'aprovado'),
(77, 1, '2023-03-25 14:42:41', '00148', '0.50', '0.00', '0.50', 'pendente', 'aprovado'),
(78, 1, '2023-03-25 15:04:19', '00148', '13.00', '0.00', '13.00', 'pendente', 'aprovado'),
(79, 1, '2023-03-25 15:10:19', '00148', '24.00', '0.00', '24.00', 'pendente', 'aprovado'),
(80, 1, '2023-03-25 15:11:32', '00148', '24.50', '5.00', '29.50', 'pendente', 'aprovado'),
(81, 1, '2023-03-25 15:44:26', '00148', '65.97', '5.00', '70.97', 'pendente', 'aprovado'),
(82, 1, '2023-03-25 15:49:47', '00148', '13.00', '5.00', '18.00', 'pendente', 'aprovado'),
(83, 1, '2023-03-25 15:50:05', '00148', '22.50', '5.00', '27.50', 'pendente', 'aprovado'),
(84, 1, '2023-03-25 15:54:27', '00148', '63.96', '5.00', '68.96', 'pendente', 'aprovado'),
(85, 1, '2023-03-25 16:00:48', '00148', '63.96', '5.00', '68.96', 'pendente', 'aprovado'),
(86, 1, '2023-03-25 16:04:14', '00148', '67.95', '5.00', '72.95', 'pendente', 'aprovado'),
(87, 1, '2023-03-25 16:04:43', '00148', '67.95', '5.00', '72.95', 'pendente', 'aprovado'),
(88, 1, '2023-03-27 08:53:30', '00148', '13.00', '5.00', '18.00', 'pendente', 'aprovado'),
(89, 1, '2023-03-27 08:53:30', '00148', '13.00', '5.00', '18.00', 'pendente', 'aprovado'),
(90, 1, '2023-03-27 09:04:50', '00148', '17.50', '5.00', '22.50', 'pendente', 'aprovado'),
(91, 1, '2023-03-27 09:18:37', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(92, 1, '2023-03-27 09:29:48', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(93, 1, '2023-03-27 09:29:48', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(94, 1, '2023-03-27 09:49:16', '00148', '23.00', '5.00', '28.00', 'pendente', 'aprovado'),
(95, 1, '2023-03-27 10:02:50', '00148', '38.99', '5.00', '43.99', 'pendente', 'aprovado'),
(96, 1, '2023-03-27 10:02:50', '00148', '38.99', '5.00', '43.99', 'pendente', 'aprovado'),
(97, 1, '2023-03-27 10:19:26', '00148', '38.99', '5.00', '43.99', 'pendente', 'aprovado'),
(98, 1, '2023-03-27 10:21:14', '00148', '12.00', '5.00', '17.00', 'pendente', 'aprovado'),
(99, 1, '2023-03-27 10:22:31', '00148', '5.50', '5.00', '10.50', 'pendente', 'aprovado'),
(100, 1, '2023-03-27 10:35:32', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(101, 1, '2023-03-27 10:35:32', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(102, 1, '2023-03-27 10:42:14', '00148', '11.50', '5.00', '16.50', 'pendente', 'aprovado'),
(103, 1, '2023-03-27 10:43:18', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(104, 1, '2023-03-27 10:44:03', '00148', '6.00', '5.00', '11.00', 'pendente', 'aprovado'),
(105, 1, '2023-03-27 10:50:50', '00148', '29.97', '5.00', '34.97', 'pendente', 'aprovado'),
(106, 1, '2023-03-27 11:04:17', '00148', '11.50', '5.00', '16.50', 'pendente', 'aprovado'),
(107, 1, '2023-03-27 12:39:43', '00148', '13.00', '5.00', '18.00', 'pendente', 'aprovado'),
(108, 1, '2023-03-27 12:40:30', '00148', '26.00', '5.00', '31.00', 'pendente', 'aprovado'),
(109, 1, '2023-03-27 12:44:45', '00148', '18.00', '5.00', '23.00', 'pendente', 'aprovado'),
(110, 1, '2023-03-27 12:44:45', '00148', '18.00', '5.00', '23.00', 'pendente', 'aprovado'),
(111, 1, '2023-03-27 12:50:07', '00148', '42.00', '5.00', '47.00', 'pendente', 'aprovado'),
(112, 1, '2023-03-27 12:50:07', '00148', '42.00', '5.00', '47.00', 'pendente', 'aprovado'),
(114, 1, '2023-03-27 14:08:29', '00148', '57.00', '5.00', '62.00', 'pendente', 'aprovado'),
(115, 1, '2023-03-27 14:14:59', '00148', '69.00', '5.00', '74.00', 'pendente', 'aprovado'),
(116, 1, '2023-03-27 14:26:18', '00148', '31.98', '5.00', '36.98', 'pendente', 'aprovado'),
(117, 1, '2023-03-27 14:27:24', '00148', '5.50', '5.00', '10.50', 'pendente', 'aprovado'),
(118, 1, '2023-03-27 15:03:13', '001477778', '6.00', '5.00', '11.00', 'pendente', 'approved'),
(119, 1, '2023-03-27 15:07:04', '001477778', '11.50', '5.00', '16.50', 'pendente', 'approved'),
(120, 1, '2023-03-27 15:11:11', '001477778', '31.98', '5.00', '36.98', 'pendente', 'approved'),
(121, 1, '2023-03-27 15:13:10', '00147777100258', '57.96', '5.00', '62.96', 'pendente', 'approved'),
(122, 1, '2023-03-27 15:32:03', '00147777100258', '36.00', '5.00', '41.00', 'pendente', 'approved'),
(123, 1, '2023-03-27 15:43:36', '1 20230327154336', '43.50', '5.00', '48.50', 'pendente', 'approved'),
(124, 1, '2023-03-27 15:47:06', '1 20230327154706', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(125, 1, '2023-03-27 15:47:06', '1 20230327154706', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(126, 1, '2023-03-27 15:47:06', '1 20230327154706', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(127, 1, '2023-03-27 15:50:07', '1 20230327155007', '15.99', '5.00', '20.99', 'pendente', 'approved'),
(128, 1, '2023-03-27 15:55:37', '1 20230327155537', '15.99', '5.00', '20.99', 'pendente', 'rejected'),
(129, 1, '2023-03-27 16:04:16', '1 20230327160416', '6.00', '5.00', '11.00', 'pendente', 'approved'),
(130, 1, '2023-03-27 16:33:03', '1 20230327163303', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(131, 1, '2023-03-27 16:56:46', '1 20230327165646', '22.50', '5.00', '27.50', 'Finalizado', 'approved'),
(132, 1, '2023-03-27 17:19:52', '1 20230327171952', '11.50', '5.00', '16.50', 'pendente', 'pendente'),
(133, 1, '2023-03-27 17:21:13', '1 20230327172113', '6.00', '5.00', '11.00', 'pendente', 'approved'),
(134, 1, '2023-03-27 17:28:41', '1 20230327172841', '7.00', '5.00', '12.00', 'pendente', 'pendente'),
(135, 1, '2023-03-27 17:37:29', '1 20230327173729', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(136, 1, '2023-03-27 17:38:41', '1 20230327173841', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(137, 1, '2023-03-28 08:46:37', '1 20230328084637', '0.50', '5.00', '5.50', 'pendente', '401'),
(138, 1, '2023-03-28 09:16:19', '1 20230328091619', '12.00', '5.00', '17.00', 'pendente', 'pendente'),
(139, 1, '2023-03-28 09:17:37', '1 20230328091737', '31.98', '5.00', '36.98', 'pendente', 'pendente'),
(140, 1, '2023-03-28 09:27:38', '1 20230328092738', '7.50', '5.00', '12.50', 'pendente', 'pendente'),
(141, 1, '2023-03-28 09:32:44', '1 20230328093244', '0.50', '5.00', '5.50', 'pendente', 'approved'),
(142, 1, '2023-03-28 09:53:59', '1 20230328095359', '6.00', '5.00', '11.00', 'pendente', 'pendente'),
(143, 1, '2023-03-28 11:10:57', '1 20230328111057', '30.00', '5.00', '35.00', 'Recusado', 'pendente'),
(144, 1, '2023-03-29 16:43:06', '1 20230329164306', '6.00', '5.00', '11.00', 'Em Preparação', 'pendente'),
(145, 1, '2023-03-29 16:53:29', '1 20230329165329', '30.00', '5.00', '35.00', 'Recusado', 'pendente'),
(146, 1, '2023-03-29 16:55:14', '1 20230329165514', '30.00', '5.00', '35.00', 'Finalizado', 'pendente'),
(147, 1, '2023-03-29 17:36:09', '1 20230329173609', '7.00', '5.00', '12.00', 'Finalizado', 'pendente'),
(148, 3, '2023-04-03 17:03:41', '3 20230403170341', '27.99', '5.00', '32.99', 'pendente', 'pendente'),
(149, 1, '2023-04-03 17:18:32', '1 20230403171832', '57.50', '5.00', '62.50', 'pendente', 'pendente'),
(150, 1, '2023-04-04 15:56:57', '1 20230404155657', '1071.00', '5.00', '1076.00', 'pendente', 'pendente'),
(151, 1, '2023-04-04 17:52:15', '1_20230404175215', '14.00', '5.00', '19.00', 'pendente', 'pendente');

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
  `preco` decimal(10,2) NOT NULL,
  `status_produto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_categoria`, `nome_produto`, `img_produto`, `descricao`, `custo_produto`, `preco`, `status_produto`) VALUES
(1, 1, 'Refrigerante', 'produtos/refrigerante.png\r\n', 'coca cola, 2l', '2.50', '6.00', 'ativo'),
(2, 1, 'Refrigerante', '\r\nprodutos/guarana.png', 'guarana kuat, 350ml', '3.50', '5.50', 'ativo'),
(3, 2, 'DOG ESPECIAL', 'produtos/Dog.png', 'muto bom', '3.50', '15.99', 'ativo'),
(4, 2, 'DOG top', 'produtos/Dog.png', 'alface,batat palha,2 salsichas', '3.50', '9.99', 'ativo'),
(5, 1, 'Cerveja corona', 'produtos/corona.png', '330ml', '4.00', '7.00', 'ativo'),
(6, 1, 'Budweiser', 'produtos/bud.png', 'Long Neck 330ml', '4.00', '0.50', 'ativo'),
(8, 1, 'Coca-Cola ', 'produtos/refrigerante.jpg', '2lTS', '1.00', '11.00', 'inativo'),
(9, 9, 'Coxinha', 'produtos/coxinha.png', 'Sabor frango com salsa e creme de ctupiry', '1.00', '2.50', 'inativo');

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_itens_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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