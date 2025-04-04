-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/04/2025 às 16:50
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
(2, 'Vai da Tudo Certo ', '741.258.963-25', 'matheusismarsi@gmail.com'),
(3, 'Damaju', '378.228.908-08', 'damaju@gmail.com'),
(4, 'testeinvalido', '111.111.111-11', 'damaju@gmail.com'),
(5, 'Vitor Barduco', '459.483.398-00', 'vfbarduco@gmail.com'),
(6, '1111111111', '811.111.111-11', 'ghost@mail.com'),
(7, 'vtt', '811.111.111-11', 'ghost@mail.com'),
(8, 'Thiago', '547.159.748-60', 'thiago@gmail.com'),
(9, 'Xcavanha', '535.241.328-47', 'afhahf@gmail.com'),
(23, 'ronaldo navario', '535.241.328-47', 'ronaldo@gmail.com'),
(24, 'caua canela', '555.555.555-55', 'caua.cferreira2@gmail.com'),
(25, 'caua canela', '555.555.555-55', 'caua.cferreira2@gmail.com');

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
(4, 'amazon.com', '123teste', '789564', 'perfil 1 esta assistindo see na apple tv', 2),
(6, 'tt', 'tt', '123', 'sdfpheiorfgrivhfr ig', 7),
(7, 'ewter', 'rtert', 'ertr', 'rgdfsbdbfgn', 7),
(8, 'gijuyk', 'hgkyukykj', 'kkmjkiu,', 'y,iu,', 7),
(9, 'www.coringudo.com', 'Thgg', 'Tico10', 'Colossal de Itaquera ', 8),
(10, 'netflix', 'ronaldao', '456789', 'netfllix do ronaldao', 10),
(11, 'amazon', 'hdfhfdh', '789465', 'kshkfshglis', 10),
(13, 'youtube', 'harry_potter', 'MjI0NTk0TWEq', 'youtube com premiun ', 1);

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
(1, 'XcavanhaX', 'R.ceni01', 1),
(2, 'vai_da_certo', '123546', 2),
(3, 'damaju', '123456D&', 3),
(4, 'testeinvalido', '1236D&', 4),
(10, 'ronaldo9', 'fenomeno', 23),
(11, 'pica123', 'Caua123', 25);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_senha`
--
ALTER TABLE `tb_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
