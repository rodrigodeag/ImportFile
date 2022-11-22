-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2022 às 18:32
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `challenge`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `card` varchar(12) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `cpf`, `card`, `status`) VALUES
(1, '09620676017', '4753****3153', 1),
(2, '55641815063', '3123****7687', 1),
(3, '84515254073', '6777****1313', 1),
(4, '23270298056', '6777****1313', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `representative` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store`
--

INSERT INTO `store` (`id`, `name`, `representative`, `status`) VALUES
(1, ' BAR DO JOÃO', 'JOÃO MACEDO  ', 1),
(2, 'LOJA DO Ó - MATRIZ', 'MARIA JOSEFINA', 1),
(3, 'MERCADO DA AVENIDA', 'MARCOS PEREIRA', 1),
(4, ' MERCEARIA 3 IRMÃO', 'JOSÉ COSTA   ', 1),
(5, 'LOJA DO Ó - FILIAL', 'MARIA JOSEFINA', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_transaction_type` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transaction`
--

INSERT INTO `transaction` (`id`, `id_transaction_type`, `date`, `hour`, `id_client`, `id_store`, `value`) VALUES
(1, 3, '2019-03-01', '15:34:53', 1, 1, 142),
(2, 5, '2019-03-01', '14:56:07', 1, 1, 132),
(3, 3, '2019-03-01', '17:27:12', 1, 1, 122),
(4, 2, '2019-03-01', '23:42:34', 1, 1, 112),
(5, 1, '2019-03-01', '23:30:00', 1, 1, 152),
(6, 2, '2019-03-01', '12:33:33', 3, 3, 107),
(7, 2, '2019-03-01', '23:12:33', 3, 3, 502),
(8, 3, '2019-03-01', '17:27:12', 3, 3, 602),
(9, 1, '2019-03-01', '09:00:02', 2, 2, 200),
(10, 5, '2019-03-01', '14:56:07', 3, 3, 802),
(11, 2, '2019-03-01', '23:12:33', 4, 4, 102),
(12, 3, '2019-03-01', '17:27:12', 4, 4, 6102),
(13, 4, '2019-03-01', '10:00:00', 2, 4, 152.32),
(14, 8, '2019-03-01', '12:32:22', 3, 3, 102.03),
(15, 3, '2019-03-01', '17:27:12', 4, 4, 103),
(16, 9, '2019-03-01', '00:00:00', 2, 2, 102),
(17, 4, '2019-06-01', '10:00:00', 3, 3, 506.17),
(18, 2, '2019-03-01', '12:33:33', 4, 4, 109),
(19, 8, '2019-03-01', '12:32:22', 3, 3, 2),
(20, 2, '2019-03-01', '14:18:08', 4, 4, 5),
(21, 3, '2019-03-01', '17:27:12', 3, 3, 192),
(22, 3, '2019-03-01', '15:34:53', 1, 1, 142),
(23, 5, '2019-03-01', '14:56:07', 2, 2, 132),
(24, 3, '2019-03-01', '17:27:12', 3, 3, 122),
(25, 2, '2019-03-01', '23:42:34', 1, 1, 112),
(26, 1, '2019-03-01', '23:30:00', 1, 1, 152),
(27, 2, '2019-03-01', '12:33:33', 3, 3, 107),
(28, 2, '2019-03-01', '23:12:33', 3, 3, 502),
(29, 3, '2019-03-01', '17:27:12', 4, 4, 602),
(30, 1, '2019-03-01', '09:00:02', 2, 2, 200),
(31, 5, '2019-03-01', '14:56:07', 3, 3, 802),
(32, 2, '2019-03-01', '23:12:33', 4, 4, 102),
(33, 3, '2019-03-01', '17:27:12', 4, 4, 6102),
(34, 4, '2019-03-01', '10:00:00', 2, 5, 152.32),
(35, 8, '2019-03-01', '12:32:22', 3, 3, 102.03),
(36, 3, '2019-03-01', '17:27:12', 4, 4, 103),
(37, 9, '2019-03-01', '00:00:00', 2, 2, 102),
(38, 4, '2019-06-01', '10:00:00', 3, 3, 506.17),
(39, 2, '2019-03-01', '12:33:33', 4, 4, 109),
(40, 8, '2019-03-01', '12:32:22', 3, 3, 2),
(41, 2, '2019-03-01', '14:18:08', 4, 4, 5),
(42, 3, '2019-03-01', '17:27:12', 3, 3, 192);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `nature` varchar(45) DEFAULT NULL,
  `signal` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `description`, `nature`, `signal`) VALUES
(1, 'Débito', 'Entrada', '+'),
(2, 'Boleto', 'Saída', '-'),
(3, 'Financiamento', 'Saída', '-'),
(4, 'Crédito', 'Entrada', '+'),
(5, 'Recebimento Empréstimo', 'Entrada', '+'),
(6, 'Vendas', 'Entrada', '+'),
(7, 'Recebimento TED', 'Entrada', '+'),
(8, 'Recebimento DOC', 'Entrada', '+'),
(9, 'Aluguel', 'Saída', '-');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `status`) VALUES
(1, 'admin', 'teste', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- Índices para tabela `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Índices para tabela `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaction_type` (`id_transaction_type`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_store` (`id_store`);

--
-- Índices para tabela `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `id_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `id_store` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`),
  ADD CONSTRAINT `id_transaction_type` FOREIGN KEY (`id_transaction_type`) REFERENCES `transaction_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
