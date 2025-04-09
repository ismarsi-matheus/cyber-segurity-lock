-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/04/2025 às 17:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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
-- Estrutura para tabela `tb_perguntas`
--

CREATE TABLE `tb_perguntas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `pergunta` text DEFAULT NULL,
  `data_envio` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_perguntas`
--

INSERT INTO `tb_perguntas` (`id`, `id_usuario`, `pergunta`, `data_envio`) VALUES
(1, 18, 'akjfksgfuçseg', '2025-04-09 08:57:55'),
(2, 18, 'afa', '2025-04-09 09:08:04'),
(3, 18, 'hshgs', '2025-04-09 09:08:24'),
(4, 19, 'sdvsdvsdvsdv', '2025-04-09 09:13:38');

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
(32, 'Antônio', '476.866.108-45', 'antonioxbiel@gmail.com'),
(33, 'Paulo', '476.866.108-45', 'paulo@gmail.com');

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
  `id_user` int(11) NOT NULL,
  `data_modificacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_senha`
--

INSERT INTO `tb_senha` (`id`, `dominio`, `usuario`, `senha`, `nota`, `id_user`, `data_modificacao`) VALUES
(49, 'wifi casa', 'Roberta', 'Z2VsYWRlaXJh', 'senha da casa', 18, '0000-00-00 00:00:00'),
(50, 'netflix', 'antonio', 'YmljaWNsZXRhMQ==', 'senha da net', 18, '2025-04-08 16:52:00'),
(51, 'Banco Inter', 'Antonio', 'YmFuY28=', 'hahaha', 18, '2025-04-08 16:46:10'),
(52, 'Banco Bradesc', 'sgsg', 'c2dk', 'sdg', 18, '0000-00-00 00:00:00'),
(53, 'netflix', 'paulinho', 'MTIzNDU2', 'sdgsdgsd', 19, '0000-00-00 00:00:00'),
(54, 'twitch', 'paulinho', 'NA==', 'dfsbsdfb', 19, '2025-04-09 14:13:30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_user`
--

INSERT INTO `tb_user` (`id`, `usuario`, `senha`, `id_pessoa`) VALUES
(18, 'Xbiel', 'Teste@99', 32),
(19, 'Paulinho', '123456789@P', 33);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_perguntas`
--
ALTER TABLE `tb_perguntas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `tb_perguntas`
--
ALTER TABLE `tb_perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_senha`
--
ALTER TABLE `tb_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
