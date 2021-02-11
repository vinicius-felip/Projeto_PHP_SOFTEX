-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Fev-2021 às 04:23
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
  `pagamento` varchar(30) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `data_pedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'frutas', 'Acerola', 'Kg', '9.90', 'Acerola.jpg'),
(2, 'frutas', 'Abacaxi', 'Unidade', '5.99', 'Abacaxi.jpg'),
(3, 'frutas', 'Atemoia', 'Unidade', '10.99', 'Atemoia.jpg'),
(4, 'frutas', 'Banana Prata', 'Palma', '2.49', 'Banana Prata.jpg'),
(5, 'frutas', 'Banana Pacovan', 'Palma', '2.89', 'Banana Pacovan.jpg'),
(6, 'frutas', 'Banana Maçã', 'Kg', '4.75', 'Banana Maçã.jpg'),
(7, 'frutas', 'Banana Comprida', 'Kg', '4.99', 'Banana Comprida.jpg'),
(8, 'frutas', 'Cocô Ralado', 'Unidade', '4.49', 'Cocô Ralado.jpg'),
(9, 'frutas', 'Cocô Seco', 'Unidade', '3.99', 'Cocô Seco.jpg'),
(10, 'frutas', 'Cocô Verde', 'Unidade', '2.49', 'Cocô Verde.jpg'),
(11, 'frutas', 'Cajú', 'Kg', '4.99', 'Cajú.jpeg'),
(12, 'frutas', 'Goiaba', 'Kg', '5.49', 'Goiaba.jpg'),
(13, 'frutas', 'Graviola', 'Unidade', '14.99', 'Graviola.jpg'),
(14, 'frutas', 'Kiwi Gold', 'Unidade', '3.99', 'Kiwi Gold Exportação.jpg'),
(15, 'frutas', 'Kiwi', 'Unidade', '2.89', 'Kiwi.jpg'),
(16, 'frutas', 'Laranja Bahia', 'Kg', '6.00', 'Laranja Bahia.jpg'),
(17, 'frutas', 'Laranja Mimo', 'Kg', '8.60', 'Laranja Mimo.jpg'),
(18, 'frutas', 'Laranja Pêra', 'Kg', '8.99', 'Laranja Pêra.jpg'),
(19, 'frutas', 'Tangerina', 'Kg', '8.49', 'Tangerina.jpg'),
(20, 'frutas', 'Limão Taiti', 'Kg', '4.50', 'Limão Taiti.jpg'),
(21, 'frutas', 'Limão Siciliano', 'Kg', '8.00', 'Limão Siciliano.jpg'),
(22, 'frutas', 'Mamão Formosa', 'Unidade', '3.49', 'Mamão Formosa.jpg'),
(23, 'frutas', 'Mamão Havai', 'Unidade', '3.41', 'Mamão Havai.jpg'),
(24, 'frutas', 'Manga Espada', 'Kg', '1.69', 'Manga Espada.jpg'),
(25, 'frutas', 'Manga Palmer', 'Kg', '3.49', 'Manga Palmer.jpg'),
(26, 'frutas', 'Manga Rosa', 'Kg', '2.99', 'Manga Rosa.jpg'),
(27, 'frutas', 'Manga Tommy', 'Kg', '3.99', 'Manga Tommy.jpg'),
(28, 'frutas', 'Maracujá', 'Kg', '1.99', 'Maracujá.jpg'),
(29, 'frutas', 'Maçã Peruana', 'Kg', '8.49', 'Maçã Peruana.jpg'),
(30, 'frutas', 'Maçã Nacional', 'Kg', '4.49', 'Maçã Nacional.jpg'),
(31, 'frutas', 'Maçã Verde', 'Kg', '5.10', 'Maçã Verde.jpg'),
(32, 'frutas', 'Mini Melancia', 'Unidade', '8.49', 'Mini Melancia.jpg'),
(33, 'frutas', 'Melancia', 'Unidade', '12.90', 'Melancia.jpg'),
(34, 'frutas', 'Melão Português', 'Kg', '5.50', 'Melão Português.jpg'),
(35, 'frutas', 'Melão Espanhol', 'Kg', '6.12', 'Melão Espanhol.jpg'),
(36, 'frutas', 'Melão Japonês', 'Kg', '4.49', 'Melão Japonês.jpg'),
(37, 'frutas', 'Morango', 'Bandeja 250g', '9.99', 'Morango.jpg'),
(38, 'frutas', 'Pera D\'Anjou', 'Kg', '7.00', 'Pera D\'Anjou.jpg'),
(39, 'frutas', 'Pêra Portuguêsa', 'Kg', '6.57', 'Pêra Portuguêsa.jpg'),
(40, 'frutas', 'Romã', 'Unidade', '2.20', 'Romã.jpg'),
(41, 'frutas', 'Uva Roxa', 'Cacho', '4.99', 'Uva Roxa.jpg'),
(42, 'frutas', 'Uva Itália', 'Cacho', '4.99', 'Uva Itália.jpg'),
(43, 'frutas', 'Pinha', 'Kg', '7.45', 'Pinha.jpg'),
(44, 'verduras/legumes', 'Abobrinha', 'Unidade', '2.50', 'Abobrinha.jpg'),
(45, 'verduras/legumes', 'Beterraba', 'Kg', '2.75', 'Beterraba.jpeg'),
(46, 'verduras/legumes', 'Batata Inglesa', 'Kg', '4.25', 'Batata Inglesa.jpg'),
(47, 'verduras/legumes', 'Berinjela', 'Unidade', '2.49', 'Berinjela.jpg'),
(48, 'verduras/legumes', 'Cebola Branca', 'Kg', '4.99', 'Cebola Branca.jpg'),
(49, 'verduras/legumes', 'Cenoura', 'Kg', '4.49', 'Cenoura.jpg'),
(50, 'verduras/legumes', 'Cebola Roxa', 'Kg', '7.48', 'Cebola Roxa.jpg'),
(51, 'verduras/legumes', 'Chuchu ', 'Unidade', '1.69', 'Chuchu .jpg'),
(52, 'verduras/legumes', 'Jerimum ', 'Kg', '3.49', 'Jerimum .jpg'),
(53, 'verduras/legumes', 'Maxixe', '100g', '1.50', 'Maxixe.jpg'),
(54, 'verduras/legumes', 'Pepino Japonês', 'Unidade', '2.45', 'Pepino Japonês.jpg'),
(55, 'verduras/legumes', 'Pepino Verde\r\n', 'Unidade', '2.45', 'Pepino Verde.jpg'),
(56, 'verduras/legumes', 'Pimentão Amarelo', 'Unidade', '5.49', 'Pimentão Amarelo.jpg'),
(57, 'verduras/legumes', 'Pimentão Vermelho', 'Unidade', '5.49', 'Pimentão Vermelho.jpg'),
(58, 'verduras/legumes', 'Pimentão Verde', 'Unidade', '1.49', 'Pimentão Verde.jpg'),
(59, 'verduras/legumes', 'Quiabo ', '100g', '1.50', 'Quiabo .jpg'),
(60, 'verduras/legumes', 'Tomate ', 'Kg', '5.49', 'Tomate .jpg'),
(61, 'verduras/legumes', 'Tomate Cereja', 'Kg', '10.99', 'Tomate Cereja.jpg'),
(62, 'verduras/legumes', 'Vagem', 'Kg', '4.49', 'Vagem.jpg'),
(63, 'folhagens', 'Acelga ', 'Unidade', '8.99', 'Acelga .jpg'),
(64, 'folhagens', 'Agrião', 'Unidade', '4.90', 'Agrião.jpg'),
(65, 'folhagens', 'Alecrim ', 'Unidade', '3.99', 'Alecrim .jpg'),
(66, 'folhagens', 'Alface Americana', 'Kg', '2.99', 'Alface Americana.jpeg'),
(67, 'folhagens', 'Alface Crespa', 'Kg', '2.99', 'Alface Crespa.jpg'),
(68, 'folhagens', 'Alface Lisa', 'Kg', '2.99', 'Alface Lisa.jpg'),
(69, 'folhagens', 'Alface Roxo', 'Kg', '3.99', 'Alface Roxo.jpg'),
(70, 'folhagens', 'Alho Poró', 'Unidade', '7.90', 'Alho Poró.jpg'),
(71, 'folhagens', 'Aspargos', '450g', '39.90', 'Aspargos.jpg'),
(72, 'folhagens', 'Brócolis Japonês', 'Kg', '10.99', 'Brócolis Japonês.jpg'),
(73, 'folhagens', 'Cebolinha', 'Unidade', '3.49', 'Cebolinha.jpg'),
(74, 'folhagens', 'Coentro', 'Unidade', '3.12', 'Coentro.jpg'),
(75, 'folhagens', 'Couve-Flor', 'Unidade', '12.90', 'Couve-Flor.jpg'),
(76, 'folhagens', 'Couve-Folha', 'Unidade', '2.99', 'Couve-Folha.jpg'),
(77, 'folhagens', 'Espinafre', 'Unidade', '3.99', 'Espinafre.jpg'),
(78, 'folhagens', 'Hortelã', 'Unidade', '4.90', 'Hortelã.jpg'),
(79, 'folhagens', 'Manjericão', 'Unidade', '3.99', 'Manjericão.jpg'),
(80, 'folhagens', 'Manjericão Roxo', 'Unidade', '4.15', 'Manjericão Roxo.jpg'),
(81, 'folhagens', 'Repolho Roxo', 'Kg', '9.25', 'Repolho Roxo.jpg'),
(82, 'folhagens', 'Repolho Verde', 'Kg', '6.99', 'Repolho Verde.jpg'),
(83, 'folhagens', 'Rúcula', 'Unidade', '2.99', 'Rúcula.jpg'),
(84, 'folhagens', 'Salsa', 'Unidade', '3.99', 'Salsa.jpg'),
(85, 'folhagens', 'Salsão ', 'Unidade', '13.99', 'Salsão .jpg'),
(86, 'raizes/tuberculos', 'Batata Doce', 'Kg', '4.89', 'Batata Doce.jpg'),
(87, 'raizes/tuberculos', 'Batata Yacon', 'Kg', '13.90', 'Batata Yacon.jpg'),
(88, 'raizes/tuberculos', 'Cará', 'Kg', '6.99', 'Cará.jpg'),
(89, 'raizes/tuberculos', 'Macaxeira', 'Kg', '5.10', 'Macaxeira.jpg'),
(90, 'raizes/tuberculos', 'Inhame-da-costa', 'Kg', '11.10', 'Inhame-da-costa.jpg'),
(91, 'raizes/tuberculos', 'Nabo', 'Kg', '12.00', 'Nabo.jpg');

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
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `permissao`, `nome`, `cpf`, `data_nascimento`, `email`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `referencia`, `senha`, `data_cadastro`) VALUES
(1, 1, 'Vinicius Felipe da Silva', '', '0000-00-00', 'admin@admin.com', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '2021-02-05 21:49:30'),
(2, 0, 'TESTE', '', '0000-00-00', 'teste@teste.com', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00');

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
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
