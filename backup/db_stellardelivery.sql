-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2023 às 23:02
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_stellardelivery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alimentos`
--

CREATE TABLE `tb_alimentos` (
  `alimento_id` int(10) UNSIGNED NOT NULL,
  `alimento_nome` varchar(30) NOT NULL,
  `alimento_categoria` varchar(20) NOT NULL,
  `alimento_descricao` varchar(60) NOT NULL,
  `alimento_imagem` varchar(90) DEFAULT NULL,
  `alimento_preco` double(9,2) NOT NULL,
  `alimento_disponivel` int(11) NOT NULL,
  `alimento_destaque` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_alimentos`
--

INSERT INTO `tb_alimentos` (`alimento_id`, `alimento_nome`, `alimento_categoria`, `alimento_descricao`, `alimento_imagem`, `alimento_preco`, `alimento_disponivel`, `alimento_destaque`) VALUES
(1, 'Bolo de chocolate', 'Doce', 'Bolo feito pela Rita', NULL, 10.00, 0, 'S'),
(2, 'Bolo de baunilha', 'Doce', 'Bolo de baunilha feito por mim', NULL, 10.00, 15, 'S'),
(3, 'Hamburguer', 'Salgado', 'Muitas calorias', NULL, 24.00, 7, 'S'),
(4, 'Torta de Morango', 'Doce', 'Feito pela vovozinha do Rogerio', NULL, 23.00, 2, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `pedido_usuario_id` int(10) UNSIGNED NOT NULL,
  `pedido_alimento_id` int(10) UNSIGNED NOT NULL,
  `pedido_alimento_quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`pedido_id`, `pedido_usuario_id`, `pedido_alimento_id`, `pedido_alimento_quantidade`) VALUES
(2, 20, 1, 10),
(3, 20, 1, 10);

--
-- Acionadores `tb_pedidos`
--
DELIMITER $$
CREATE TRIGGER `reduzir_quantidade_disponivel` AFTER INSERT ON `tb_pedidos` FOR EACH ROW BEGIN
	UPDATE tb_alimentos SET alimento_disponivel = alimento_disponivel - NEW.pedido_alimento_quantidade WHERE alimento_id = NEW.pedido_alimento_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `usuario_nome` varchar(60) NOT NULL,
  `usuario_email` varchar(80) NOT NULL,
  `usuario_senha` varchar(80) NOT NULL,
  `usuario_telefone` varchar(16) NOT NULL,
  `usuario_foto` varchar(60) DEFAULT 'defaultuser.png',
  `usuario_cpf` varchar(13) NOT NULL,
  `usuario_cep` varchar(10) NOT NULL,
  `usuario_estado` varchar(2) NOT NULL,
  `usuario_cidade` varchar(60) NOT NULL,
  `usuario_bairro` varchar(60) NOT NULL,
  `usuario_rua` varchar(80) NOT NULL,
  `usuario_numero` varchar(10) NOT NULL,
  `usuario_complemento` varchar(40) NOT NULL,
  `usuario_adm` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usuario_id`, `usuario_nome`, `usuario_email`, `usuario_senha`, `usuario_telefone`, `usuario_foto`, `usuario_cpf`, `usuario_cep`, `usuario_estado`, `usuario_cidade`, `usuario_bairro`, `usuario_rua`, `usuario_numero`, `usuario_complemento`, `usuario_adm`) VALUES
(22, 'DOM JUAN', 'domjuam@email.com', '1234', '88994233421', 'juan.jpg', '70971488533', '62031185', 'AM', 'SOBRAL', 'CIDADE DR. JOSE EUCLIDES FERREIRA GOMES JUNIOR', 'RUA DOUTOR TOMAS ARAGAO', '585', 'NA MINHA CASA', 'S'),
(24, 'Fenimore Rasquirrel Cold Gray', 'rasquirrel@adm.com', '1234', '88994925975', 'rasquirrel.jpg', '50159598508', '62031185', 'CE', 'Sobral', 'Bobos', 'Minha casa', '122', 'Invisivel', 'S'),
(25, 'SEU PEDRO', 'seupedro@email.com', '1234', '11942321392', 'defaultuser.png', '56934299035', '62031185', 'CE', 'Sobral', 'Cidade Dr. José Euclides Ferreira Gomes Júnior', 'Rua Doutor Tomás Aragão', '123', 'ASDASDasd', 'N'),
(26, 'Dona Maria', 'donamaria@email.com', '1234', '12312312445', 'donamaria.jfif', '80737721081', '62031185', 'CE', 'Sobral', 'Cidade Dr. José Euclides Ferreira Gomes Júnior', 'Rua Doutor Tomás Aragão', '543', 'Dentro de um buraco', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_alimentos`
--
ALTER TABLE `tb_alimentos`
  ADD PRIMARY KEY (`alimento_id`);

--
-- Índices para tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_cpf` (`usuario_cpf`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_alimentos`
--
ALTER TABLE `tb_alimentos`
  MODIFY `alimento_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `pedido_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
