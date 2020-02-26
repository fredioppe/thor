-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Fev-2020 às 00:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `thor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cnpj` int(40) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `eativo` varchar(7) DEFAULT NULL,
  `empresaPrincipal` varchar(45) DEFAULT NULL,
  `razaoSocial` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `etelefone` varchar(45) DEFAULT NULL,
  `eemail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `cnpj`, `endereco`, `eativo`, `empresaPrincipal`, `razaoSocial`, `bairro`, `cidade`, `estado`, `cep`, `contato`, `etelefone`, `eemail`) VALUES
(1, 'Clarus', 11111, NULL, '1', 'teste2', 'teete', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Vevus', NULL, NULL, '1', 'fefss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Tom', NULL, 'rua amarilis', '1', NULL, 'etetewt3', 'bairro cpto', 'Antonina', 'PR', '09176-110', 'fred', '+11 11 1111-1111', 'fred_ioppe@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `uativo` varchar(7) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `tokenhora` varchar(45) DEFAULT NULL,
  `uidioma` varchar(45) DEFAULT NULL,
  `regiao` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`, `name`, `empresa_id`, `role`, `uativo`, `telefone`, `token`, `tokenhora`, `uidioma`, `regiao`, `foto`) VALUES
(1, 'fredg.ioppe@gmail.com', '$2y$10$qQLWSGTKUFMpjjJnln3vx.tikkCeqOfXVboxXE/Z1f6AsaNJf3Cvm', NULL, NULL, 'Fred ioppe', 1, 'adm', '1', '+11 11 1111-1111', '', NULL, 'pt_BR', NULL, 'an1_teste.png'),
(4, 'gleice.ioppe@gmail.com', '', NULL, NULL, 'teste', 2, 'adm', '1', '+55 11 4444-4444', '890248fce394e0cf212ae85643c4fa0c05235734_5e5597cc', NULL, 'pt_BR', NULL, ''),
(5, 'gleice.ioppe3@gmail.com', '', NULL, NULL, 'teste er', 1, 'adm', '1', '+55 11 4444-4444', 'ce098b6dbf3ef0b7dc7192547dae8361a65f93b6_5e55989c', NULL, 'pt_BR', NULL, ''),
(6, 'gleice.ioppe34@gmail.com', '', NULL, NULL, 'teste ', 1, 'adm', '0', '+55 11 4444-4444', '179f19392a34b84633f8dc220b546e1f4dfab431_5e559946', NULL, 'pt_BR', NULL, ''),
(7, 'gleice.ioppe5@gmail.com', '', NULL, NULL, 'teste', 1, 'adm', '1', '+55 11 4444-4444', '0d023af1391690385c973da7b974bdf309ec6a07_5e559b19', NULL, 'pt_BR', NULL, ''),
(8, 'gleice.ioppe6@gmail.com', '', NULL, NULL, 'teste', 1, 'adm', '1', '+55 11 4444-4444', '4053e90f6fc09b7fbc0910f1b37a876d9dbb532c_5e559b58', NULL, 'pt_BR', NULL, ''),
(9, 'gleice.ioppe8@gmail.com', '', NULL, NULL, 'teste', 1, 'adm', '1', '+55 11 4444-4444', 'ab6ee162dc296fcc1910b2ee99b18c041d478ccf_5e559be1', NULL, 'pt_BR', NULL, 'an9_teste.png'),
(10, 'gleice.ioppe9@gmail.com', '', NULL, NULL, 'teste', 1, 'adm', '1', '+55 11 4444-4444', 'caa9cd2429e593e7402ed1fe3b5d9d67e6af7e42_5e559c8f', NULL, 'pt_BR', NULL, 'an10_teste.png'),
(11, 'gleice.ioppe55@gmail.com', '', NULL, NULL, 'teste', 1, 'adm', '1', '+55 11 4444-4444', '455f7146d935fd9bf8c043deef1be3df9bad0aba_5e559d3f', NULL, 'pt_BR', NULL, 'an11_teste.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj_UNIQUE` (`cnpj`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_empresas_idx` (`empresa_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_empresas` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;