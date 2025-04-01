-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/04/2025 às 12:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cyber_security_lock`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`id`, `nome`, `cpf`, `email`) VALUES
(1, 'cavanha', '456.789.123-45', 'MatheusDavid@hotmail.com'),
(2, 'Vai da Tudo Certo ', '741.258.963-25', 'matheusismarsi@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_senha`
--

CREATE TABLE `tb_senha` (
  `id` int(11) NOT NULL,
  `dominio` varchar(50) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nota` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_senha`
--

INSERT INTO `tb_senha` (`id`, `dominio`, `usuario`, `senha`, `nota`, `id_user`) VALUES
(1, 'netflix.com', 'acho_que_agora_vai', '123546', 'esse usuario possui 4 perfis sendo 1 infantil', 1),
(4, 'amazon.com', '123teste', '789564', 'perfil 1 esta assistindo see na apple tv', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_senha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_user`
--

INSERT INTO `tb_user` (`id`, `usuario`, `senha`, `id_pessoa`, `id_senha`) VALUES
(1, 'XcavanhaX', 'R.ceni01', 1, 1),
(2, 'vai_da_certo', '123546', 2, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_senha`
--
ALTER TABLE `tb_senha`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_senha`
--
ALTER TABLE `tb_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
