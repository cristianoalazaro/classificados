-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jul-2020 às 09:13
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `classificados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `preco`, `estado`) VALUES
(4, 1, 3, 'Video-game Xbox 360 desbloqueado', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Vídeo-game da Microsoft, já fora de linha                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 850, 2),
(6, 1, 5, 'Ninja 300 2014 cinza em ótimo estado', '                                                                                                                                    Nada pra fazer, manutenção em dia                                                                                                                                                                         ', 15500, 2),
(7, 3, 6, 'Rasteirinha bonita', '                                                Rasteirinha sem uso, comprei e não gostei                                ', 120, 2),
(8, 3, 2, 'Jaqueta de couro preta', '                        Jaqueta nova - marca Barbante                ', 1150, 1),
(9, 2, 3, 'Celular Lenovo Vibe K6', '                                    Celular semi-novo                        ', 500, 1),
(10, 2, 7, 'Pipas de papel', '                                                            Pipas diversas                                        ', 3.5, 2),
(11, 2, 7, 'Banco Imobiliario Brasil', '                                    jogo legal                        ', 80, 1),
(15, 2, 4, 'Perua Kombi 96', '                        Está muito boa, branca                ', 7000, 0),
(16, 4, 3, 'Celular Samsung A10', '            Celular novinho, pouco uso        ', 650, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

CREATE TABLE `anuncios_imagens` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncio`, `url`) VALUES
(108, 4, '951a95eca9e1ce1b5046707f5b0a6764.jpg'),
(109, 4, 'ae0dd84bf2af1e36d364dca065316ade.jpg'),
(110, 6, 'cb4ac530d858e9bc6d253ea92e1f8411.jpg'),
(111, 6, '4ac4146a9277a1204e66dde5358b9bd0.jpg'),
(112, 7, '109aa84910677e9b663a27dba7c0910b.jpg'),
(113, 8, '023ae6c7ec315bfea3de60422b4f6c44.jpg'),
(114, 9, '8e7c884919b481d13a516be67939b214.jpg'),
(115, 9, 'ca7e9eda4d727e2a3e40efbdbb36c874.jpg'),
(116, 10, '657449e31acefbc5006c8efd0db113ea.jpg'),
(117, 11, '823c40cc3734c4d2d26eabb161cafdf7.jpg'),
(118, 15, 'efa3b179268b890e52ab2f7c6f9f809f.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Relógios'),
(2, 'Roupas'),
(3, 'Eletrônicos'),
(4, 'Carros'),
(5, 'Motos'),
(6, 'Sapatos'),
(7, 'Brinquedos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Cristiano Aparecido Lázaro', 'cristianoalazaro@hotmail.com', '202cb962ac59075b964b07152d234b70', '43 99999-9999'),
(2, 'Bruno Cardoso Lázaro', 'brunoclazaro2010@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '43 00000000'),
(3, 'Elenice Cardoso Lázaro', 'niceclazaro@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', '123131321'),
(4, 'Cristiane Cardoso Lázaro', 'cristianeclazaro@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
