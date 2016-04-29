-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 29-Abr-2016 às 01:00
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `reserva_salas`
--
CREATE DATABASE IF NOT EXISTS `reserva_salas` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `reserva_salas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rs_login`
--

CREATE TABLE IF NOT EXISTS `rs_login` (
  `idLogin` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nivel` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLogin`,`idUsuario`),
  KEY `fk_rs_login_rs_usuario1_idx` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `rs_login`
--

INSERT INTO `rs_login` (`idLogin`, `idUsuario`, `usuario`, `senha`, `nivel`, `ativo`) VALUES
(1, 1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1),
(2, 2, 'ana_paula', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 1),
(3, 3, 'pedro', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rs_login_acesso`
--

CREATE TABLE IF NOT EXISTS `rs_login_acesso` (
  `idLoginAcesso` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idLogin` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idLoginAcesso`,`idUsuario`,`idLogin`),
  KEY `fk_rs_login_acesso_rs_login1_idx` (`idLogin`,`idUsuario`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `rs_login_acesso`
--

INSERT INTO `rs_login_acesso` (`idLoginAcesso`, `idUsuario`, `idLogin`, `data`) VALUES
(1, 1, 1, '2016-04-27 23:50:36'),
(2, 1, 1, '2016-04-28 00:01:00'),
(3, 1, 1, '2016-04-28 00:01:18'),
(4, 1, 1, '2016-04-28 07:40:03'),
(5, 1, 1, '2016-04-28 07:54:35'),
(6, 1, 1, '2016-04-28 07:54:47'),
(7, 1, 1, '2016-04-28 19:50:33'),
(8, 1, 1, '2016-04-28 20:27:34'),
(9, 1, 1, '2016-04-28 20:52:34'),
(10, 2, 2, '2016-04-28 21:52:09'),
(11, 1, 1, '2016-04-28 21:54:25'),
(12, 3, 3, '2016-04-28 21:56:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rs_reserva_sala`
--

CREATE TABLE IF NOT EXISTS `rs_reserva_sala` (
  `idReservaSala` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `periodo` datetime NOT NULL,
  `duracao` time DEFAULT NULL,
  PRIMARY KEY (`idReservaSala`),
  KEY `idUsuario` (`idUsuario`,`idSala`),
  KEY `idSala` (`idSala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rs_sala`
--

CREATE TABLE IF NOT EXISTS `rs_sala` (
  `idSala` int(11) NOT NULL AUTO_INCREMENT,
  `nro_sala` int(3) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rs_usuario`
--

CREATE TABLE IF NOT EXISTS `rs_usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `setor` varchar(50) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `rs_usuario`
--

INSERT INTO `rs_usuario` (`idUsuario`, `nome`, `sexo`, `cargo`, `setor`, `ativo`, `dataCriacao`) VALUES
(1, 'José da Silva', 'm', 'Analista de Sistemas', 'TI', 1, '2016-04-27 23:31:58'),
(2, 'Ana Paula', 'f', 'Secretária', 'Atendimento', 1, '2016-04-28 21:42:54'),
(3, 'Pedro Souza', 'm', 'Coordenador', 'TI', 1, '2016-04-28 21:55:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rs_usuario_email`
--

CREATE TABLE IF NOT EXISTS `rs_usuario_email` (
  `idUsuarioEmail` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuarioEmail`,`idUsuario`),
  KEY `fk_rs_usuario_email_rs_usuario1_idx` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `rs_usuario_email`
--

INSERT INTO `rs_usuario_email` (`idUsuarioEmail`, `idUsuario`, `email`) VALUES
(3, 1, 'jose_silva@teste.com'),
(4, 2, 'ana_paula@teste.com'),
(5, 2, 'ana_paula2@teste.com'),
(6, 3, 'pedro@teste.com');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `rs_login`
--
ALTER TABLE `rs_login`
  ADD CONSTRAINT `fk_rs_login_rs_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `rs_usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `rs_login_acesso`
--
ALTER TABLE `rs_login_acesso`
  ADD CONSTRAINT `fk_rs_login_acesso_rs_login1` FOREIGN KEY (`idLogin`, `idUsuario`) REFERENCES `rs_login` (`idLogin`, `idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rs_login_acesso_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `rs_usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_login_acesso_ibfk_2` FOREIGN KEY (`idLogin`) REFERENCES `rs_login` (`idLogin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `rs_reserva_sala`
--
ALTER TABLE `rs_reserva_sala`
  ADD CONSTRAINT `rs_reserva_sala_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `rs_usuario` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_reserva_sala_ibfk_2` FOREIGN KEY (`idSala`) REFERENCES `rs_sala` (`idSala`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `rs_usuario_email`
--
ALTER TABLE `rs_usuario_email`
  ADD CONSTRAINT `fk_rs_usuario_email_rs_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `rs_usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
