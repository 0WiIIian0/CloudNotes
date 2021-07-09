-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2021 às 05:58
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cloudnotes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `pass`) VALUES
(1, 'test', 'test@test.com', '1234'),
(2, 'usuario', 'usuario@usuario.net', 'lkdjaslkdjasd'),
(3, 'Renault', 'renaultcsbora@hotmail.com', '123456789'),
(5, 'Renault', 'renaultcsbora@hotmail.com', 'dasdasdasdsada'),
(6, 'Renault', 'renaultcsbora@hotmail.com', 'testando'),
(7, 'Renault', '5c37263f70569982bfc55dffbc79b150', '$2y$10$vRrWgeXe6/hpzIPxuI83SOiYkx2jOUuxEk9fpQ5y1z9ZARQi3pdAu'),
(8, 'Renault', '0869f56e051fd1e7feaf189fd07aa229', '$2y$10$bFF/Pp3kcCoLiEOAVLLP4u4zF6B3cPr4j4q0bE0dxVoyo0stB0nxK'),
(9, 'Renault', '0869f56e051fd1e7feaf189fd07aa229', '$2y$10$MitheAx3cH/8L8Qt2c48meU.bFwrF1XC/X57usAChu0yvXUh2khtW'),
(10, 'test', 'b642b4217b34b1e8d3bd915fc65c4452', '$2y$10$ZVQ9uWCdP5ZEwPzzxJWuSuXIqBRXi8SDLHQlcIw0CcSwOv5Oa9SmC'),
(11, 'test', 'b642b4217b34b1e8d3bd915fc65c4452', '$2y$10$Z/RUECZqZ1kRmgLFhcrZ4ucmoHcmsXXjKDBAy/MqJ1pLp45lWYTGy'),
(12, 'test', 'b642b4217b34b1e8d3bd915fc65c4452', '$2y$10$NHg8V9Bd6P17v00GU5RmqOg10oetV9IK6d5m9BHWA8UKHJafjpTtu'),
(13, 'test', 'b642b4217b34b1e8d3bd915fc65c4452', '$2y$10$ZyVfdMxn5DcVOK74m.SaReCH5brJac09vHSFyDYWTgIoWE.lEX4y.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
