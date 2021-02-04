-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Fev-2021 às 03:49
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `feirapernambucana`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `valor_pedido` decimal(10,2) NOT NULL,
  `data_pedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `usuario`, `valor_pedido`, `data_pedido`) VALUES
(1, 1, '8.75', '2021-02-03 21:43:46'),
(2, 1, '54.25', '2021-02-03 22:05:04'),
(3, 1, '24.00', '2021-02-03 23:08:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES
(1, 6, 1),
(1, 3, 2),
(2, 6, 11),
(2, 10, 8),
(3, 4, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `detalhe` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_id`, `categoria`, `nome`, `detalhe`, `preco`, `foto`) VALUES
(1, 'frutas', 'Banana Prata', 'Uma palma contém 12-16 unidades.', '3.75', ''),
(2, 'verduras/legumes', 'Cebola', '1KG em média são 4~5 cebolas.', '3.00', ''),
(3, 'frutas', 'Banana', 'OK', '3.00', ''),
(4, 'frutas', 'Banana', 'OK', '3.00', ''),
(5, 'frutas', 'Banana', 'OK', '3.00', ''),
(6, 'frutas', 'Banana', 'OK', '2.75', ''),
(7, 'frutas', 'Banana', 'OK', '3.00', ''),
(8, 'frutas', 'Banana', 'OK', '3.00', ''),
(9, 'frutas', 'Banana', 'OK', '3.00', ''),
(10, 'frutas', 'Banana', 'OK', '3.00', ''),
(11, 'frutas', 'Banana', 'OK', '3.00', ''),
(12, 'frutas', 'Banana', 'OK', '3.00', ''),
(13, 'frutas', 'Banana', 'OK', '3.00', ''),
(14, 'frutas', 'Banana', 'OK', '3.00', ''),
(15, 'frutas', 'Banana', 'OK', '3.00', ''),
(16, 'frutas', 'Banana', 'OK', '3.00', ''),
(17, 'frutas', 'Banana', 'OK', '3.00', ''),
(18, 'frutas', 'Banana', 'OK', '3.00', ''),
(19, 'frutas', 'Banana', 'OK', '3.00', ''),
(20, 'frutas', 'Banana', 'OK', '3.00', ''),
(21, 'frutas', 'Banana', 'OK', '3.00', ''),
(22, 'frutas', 'Banana', 'OK', '3.00', ''),
(23, 'frutas', 'Banana', 'OK', '3.00', ''),
(24, 'frutas', 'Banana', 'OK', '3.00', ''),
(25, 'frutas', 'gggggg', 'OK', '3.00', ''),
(26, 'frutas', 'Banana', 'OK', '3.00', ''),
(27, 'frutas', 'Banana', 'OK', '3.00', ''),
(28, 'frutas', 'Banana', 'OK', '3.00', ''),
(29, 'frutas', 'Banana', 'OK', '3.00', ''),
(30, 'frutas', 'Banana', 'OK', '3.00', ''),
(31, 'frutas', 'Banana', 'OK', '3.00', ''),
(32, 'frutas', 'Banana', 'OK', '3.00', ''),
(33, 'frutas', 'Banana', 'OK', '3.00', ''),
(34, 'frutas', 'Banana', 'OK', '3.00', ''),
(35, 'frutas', 'Banana', 'OK', '3.00', ''),
(36, 'frutas', 'Banana', 'OK', '3.00', ''),
(37, 'frutas', 'sadasds', 'dasdsa', '3.00', ''),
(38, 'frutas', 'Laranja', 'Bonita', '4.00', ''),
(39, 'frutas', 'Gleybson Soares de Souza', 'Bonita', '5.00', ''),
(40, 'folhagens', 'VINICIUS FELIPE DA SILVA', 'Bonita', '0.00', ''),
(41, 'raizes/tuberculos', 'Gleybson Soares de Souza', 'Bonita', '3.00', ''),
(42, 'verduras/legumes', 'ddddd', 'Bonita', '4.00', ''),
(43, 'frutas', 'laranja', 'bonita', '3.00', '6.jpg'),
(44, 'frutas', '', '', '0.00', ''),
(45, 'frutas', '', '', '0.00', '1.jpg'),
(46, 'frutas', '', '', '0.00', '8.jpg'),
(47, 'frutas', '', '', '0.00', '8.jpg'),
(48, 'frutas', 'a', '', '0.00', '8.jpg'),
(49, 'frutas', 'a', '', '0.00', '1.jpg'),
(50, 'frutas', 'a', '', '0.00', '1.jpg'),
(51, 'frutas', '', '', '0.00', '9.jpg'),
(52, 'frutas', '', '', '0.00', '9.jpg'),
(53, 'frutas', '', '', '0.00', '9.jpg'),
(54, 'frutas', '', '', '0.00', '9.jpg'),
(55, 'frutas', '', '', '0.00', '9.jpg'),
(56, 'frutas', '', '', '0.00', '8.jpg'),
(57, 'frutas', '', '', '0.00', '8.jpg'),
(58, 'frutas', '', '', '0.00', '8.jpg'),
(59, 'frutas', '', '', '0.00', '9.jpg'),
(60, '', '', '', '2.00', ''),
(61, '', '', '', '3.00', ''),
(62, '', '', '', '3.00', ''),
(63, '', '', '', '2.00', ''),
(64, 'alo', '', '', '3.00', ''),
(65, 'alo', '', '', '3.00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `permissao` tinyint(4) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `permissao`, `nome`, `cpf`, `data_nascimento`, `email`, `telefone`, `cep`, `numero`, `complemento`, `referencia`, `senha`, `data_cadastro`) VALUES
(1, 1, 'Vinicius Felipe da Silva', '12687798495', '1999-11-17', 'viniciusfelipe.xd@gmail.com', '81986551831', '53441080', '103', 'Bloco 06, Quadra 58', 'perto do bar do farias', 'e10adc3949ba59abbe56e057f20f883e', '2021-01-29 18:00:52');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `fk_id_usuario` (`usuario`);

--
-- Índices para tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD KEY `fk_produto_id` (`produto_id`),
  ADD KEY `fk_pedido_id` (`pedido_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario_id`);

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `fk_pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`),
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
