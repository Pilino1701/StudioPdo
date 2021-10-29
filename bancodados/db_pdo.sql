-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2021 às 11:25
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_pdo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alunos`
--

CREATE TABLE `tb_alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`id`, `nome`, `tel`, `email`, `modalidade`) VALUES
(13, 'Maria Julia', '(011)1111-1111', 'maria@julia.com', 14),
(14, 'Marcos Eduardo', '(011) 2222-2222', 'marcos@eduardo.com', 13),
(15, 'Paulo da Silva', '(011) 3333-3333', 'paulo@dasilva.com', 13),
(16, 'Fabio Souza', '(011) 4444-4444', 'fabio@souza.com', 13),
(17, 'Ricardo dos Santos', '(011) 5555-5555', 'ricardo@dossantos.com', 13),
(18, 'Maria Fernanda', '(011) 6666-6666', 'maria@fernanda.com', 14),
(20, 'Marcuccello da Lodi', '(85)323232', 'marcuccello@hotmail.com', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modalidades`
--

CREATE TABLE `tb_modalidades` (
  `id` int(11) NOT NULL,
  `modalidade` varchar(255) NOT NULL,
  `mensalidade` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_modalidades`
--

INSERT INTO `tb_modalidades` (`id`, `modalidade`, `mensalidade`) VALUES
(7, 'Zumba', '89.90'),
(13, 'Musculaçao baitola repito viado', '123.70'),
(14, 'Aerobica', '79.90'),
(21, 'MMA', '120.00'),
(22, 'Muay Thai', '99.90'),
(23, 'Karate', '79.90'),
(28, 'Jiu-Jitsu', '120.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `modalidade` (`modalidade`);

--
-- Índices para tabela `tb_modalidades`
--
ALTER TABLE `tb_modalidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modalidade` (`modalidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_modalidades`
--
ALTER TABLE `tb_modalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD CONSTRAINT `tb_alunos_ibfk_1` FOREIGN KEY (`modalidade`) REFERENCES `tb_modalidades` (`id`),
  ADD CONSTRAINT `tb_alunos_ibfk_2` FOREIGN KEY (`modalidade`) REFERENCES `tb_modalidades` (`id`),
  ADD CONSTRAINT `tb_alunos_ibfk_3` FOREIGN KEY (`modalidade`) REFERENCES `tb_modalidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
