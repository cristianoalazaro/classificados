-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2020 às 09:11
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
(4, 1, 3, 'Video-game Xbox 360 desbloqueado', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Vídeo-game da Microsoft, já fora de linha                                                                                                                                                                                                                                                                                                                                                                                                                ', 850, 2),
(6, 1, 5, 'Ninja 300 2014 cinza em ótimo estado', '                                                                        Nada pra fazer, manutenção em dia                                                ', 15500, 2),
(7, 3, 6, 'Rasteirinha bonita', '                                    Rasteirinha sem uso, comprei e não gostei                        ', 120, 2),
(8, 3, 2, 'Jaqueta de couro preta', '            Jaqueta nova - marca Barbante        ', 1150, 1),
(9, 2, 3, 'Celular Lenovo Vibe K6', '                        Celular semi-novo                ', 500, 1),
(10, 2, 7, 'Pipas de papel', '                                                Pipas diversas                                ', 3.5, 2),
(11, 2, 7, 'Banco Imobiliario Brasil', '                        jogo legal                ', 80, 1),
(12, 2, 7, 'Banco Imobiliario Brasil', '            jogo legal        ', 80, 0),
(13, 2, 7, 'Banco Imobiliario Brasil', '                                    jogo legal                        ', 80, 2),
(15, 2, 4, 'Perua Kombi 96', '            Está muito boa, branca        ', 7000, 0),
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
(15, 4, 'a106cdee6c05ff1c505dd9515e4179ea.jpg'),
(16, 6, '84fe3fff2220bb1d2811616346a068fa.jpg'),
(68, 7, '0a5cdd1a5ec9f8b52105072ccaa3066e.jpg'),
(69, 8, '44de3333a37ad721e49e980195530dc8.jpg'),
(70, 9, '8fad06ba83a5fd733ac2c001a56dd1d3.jpg'),
(71, 9, '36d6476557e71e6bb26a074c8ff441e0.jpg'),
(72, 10, '7cc168a9fab4d5c35d665f8aafd5969b.jpg'),
(73, 13, 'f5b80035705ca21f6a6677eed5b0c4db.jpg'),
(74, 14, '5f52731291130bebe752a3e4a81351ae.jpg'),
(75, 4, '69c8b72279aa1280de7cfff9dea1a9d1.jpg'),
(76, 15, 'a489e8937e0194dc1c09007ed733df5c.jpg'),
(77, 16, '67ff0d957900b3c2499f2b1c6b74c82b.jpg'),
(78, 17, '84f8ab3a1c6bf760cfc0ec58271f0e85.jpg'),
(79, 6, '532400d094a4065f4da19a7ea0891f0b.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
