-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Nov-2021 às 13:46
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xicaracafe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `itemId` int(11) NOT NULL,
  `itemNome` varchar(128) NOT NULL,
  `itemDescricao` text NOT NULL DEFAULT '---',
  `usuarioId` int(11) NOT NULL,
  `disponibilidade` varchar(128) NOT NULL DEFAULT 'Disponível',
  `emprestadoPara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`itemId`, `itemNome`, `itemDescricao`, `usuarioId`, `disponibilidade`, `emprestadoPara`) VALUES
(9, 'Barraca', 'Boa para acampar. Cabem até 3 pessoas.', 6, 'Indisponível', 8),
(10, 'Raquete de tênis', 'Pouco usada. Está em ótimas condições.', 6, 'Disponível', NULL),
(11, 'Macbook Pro', 'Notebook da Apple. Ótimo para o trabalho.', 4, 'Disponível', NULL),
(13, 'Panela de pressão', 'Muito boa para cozinhar no dia-a-dia', 8, 'Disponível', NULL),
(14, 'Caixa de Som', 'Da marca JBL. Pequena, fácil de levar na bolsa ou mochila.', 4, 'Disponível', NULL),
(15, 'Livro \"O morro dos ventos uivantes\"', 'Romance clássico, escrito por Emily Brontë.', 8, 'Indisponível', 6),
(16, 'Saco de dormir', 'Térmico. Para 1 pessoa.', 6, 'Indisponível', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuariosId` int(11) NOT NULL,
  `usuariosNome` varchar(128) NOT NULL,
  `usuariosUsername` varchar(128) NOT NULL,
  `usuariosEmail` varchar(128) NOT NULL,
  `usuariosSenha` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuariosId`, `usuariosNome`, `usuariosUsername`, `usuariosEmail`, `usuariosSenha`) VALUES
(4, 'Fernanda Andrade', 'Fernandinha', 'fernanda@email.com', '$2y$10$0LJlsTUutXgUJQrFnJVshed8mK3zIzcUBSbMNmYLgRKoTRrj7Uwy6'),
(6, 'Rafael dos Santos', 'Rafa', 'rafael@email.com', '$2y$10$UGf/egKj2UqhQ7taWySG7eOEdzpHARAy4qAU5a1qn1KCy0mTDEmIq'),
(8, 'Mônica Pereira', 'Monica', 'monica@email.com', '$2y$10$NsHGc1tYht1rg.U7AE5pfO3yscaI6xSX85/iSMs9JUY2mY3O4XkNO'),
(11, 'Maria Silva', 'Maria', 'maria@email.com', '$2y$10$mkGXr43B2.taa1.SttWnkuaII7HXKPrITN55.pQG0TLoiGsZJyA0W');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`itemId`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuariosId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuariosId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
