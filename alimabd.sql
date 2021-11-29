-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2021 às 03:52
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alimabd`
--
CREATE DATABASE IF NOT EXISTS `alimabd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `alimabd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `fone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfunc`
--

CREATE TABLE `tbfunc` (
  `idFunc` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `funcao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfunc`
--

INSERT INTO `tbfunc` (`idFunc`, `ativo`, `email`, `senha`, `nome`, `funcao`) VALUES
(1, 's', 'supervisor@supervisor.com', '$2y$10$giiLRd77ZzGiA0ZwULZp9O8YZPYcj7zK38PIH8A7WYkF/.NLKzIde', 'Supervisor', 'gerente'),
(2, 's', 'vendedor@a.b', '$2y$10$DSQg7cvRFoyHYrIBYd2vxu0pTN3HvaUu9JdNdwaNuwFx8zzlmRe76', 'Vendedor', 'vendedor'),
(3, 's', 'gerente@a.b', '$2y$10$io6QuvaVoZ6wUdYRdX5cj.5RNscWtqvbjnZqc7TX5zQoiod7WUl0u', 'Gerente', 'gerente'),
(4, 's', 'caixa@a.b', '$2y$10$PIGwDGBUO0F/4v/P7amoaOWo6tROPa5xJSFjsN6jEYcF5bet.mD8.', 'Caixa', 'caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedito` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `data` date NOT NULL,
  `precoPago` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `produto` varchar(30) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `promocao` char(1) NOT NULL,
  `precoPromocao` decimal(10,2) NOT NULL,
  `nomeFoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `ativo`, `produto`, `descricaoProduto`, `precoVenda`, `promocao`, `precoPromocao`, `nomeFoto`) VALUES
(30, 'n', 'Felpinho', 'Adquira já seu Felpinho gamer', '0.99', 's', '0.90', '163812508961a3ce21a4776.jpg'),
(31, 's', 'Bolo de Abacaxi', 'Fatia de bolo sabor abacaxi com creme', '11.99', 'n', '0.00', '163815200761a43747ad1dc.png'),
(32, 's', 'Bolo de Cereja', 'Fatia de bolo sabor cereja com morango e chantilly', '11.99', 'n', '0.00', '163815201361a4374daa5fb.jpg'),
(33, 's', 'Bolo de Chocolate', 'Fatia de bolo sabor chocolate com cereja e chantilly', '12.99', 'n', '0.00', '163815202361a437579a9f4.png'),
(34, 's', 'Bolo de Morango', 'Fatia de bolo de mousse morango', '18.99', 'n', '0.00', '163815311661a43b9c1c77e.jpg'),
(35, 's', 'Bolo de Cenoura', 'Fatia de bolo de cenoura', '16.99', 's', '14.99', '163815316761a43bcfe3a01.jpg'),
(36, 's', 'Cupcake Simples', 'Conjunto de 3 cupcakes simples', '14.99', 's', '10.99', '163815339061a43cae1704e.jpg'),
(37, 's', 'Cupcake de Chocolate', 'Conjunto de 3 cupcakes de chocolate', '17.99', 'n', '0.00', '163815346261a43cf65c491.jpg'),
(38, 's', 'Torta de Limão', 'Fatia de torta de limão', '22.99', 's', '20.99', '163815360561a43d85156ff.jpg'),
(39, 's', 'Torta de Morango', 'Fatia de torta de morango', '22.99', 's', '20.99', '163815363461a43da2636ad.jpg'),
(40, 's', 'Torta de Chocolate', 'Fatia de torta de chocolate', '24.99', 'n', '0.00', '163815365361a43db5a79eb.jpeg'),
(41, 's', 'Pão de Mel', 'Pão de mel recheado com doce de leite', '7.99', 'n', '0.00', '163815426961a4401d817a8.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  ADD PRIMARY KEY (`idFunc`);

--
-- Índices para tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idPedito`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idPedito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
