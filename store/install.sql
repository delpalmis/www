-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Jan 23, 2011 as 05:06 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `l2j_emu`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `vote_config`
-- 

CREATE TABLE `vote_config` (
  `id` int(4) NOT NULL auto_increment,
  `titulo` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `link_vote` varchar(100) NOT NULL,
  `data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `vote_config`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `vote_contar`
-- 

CREATE TABLE `vote_contar` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(45) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `data` varchar(45) NOT NULL,
  `banner_id` int(4) NOT NULL,
  `chars` int(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `vote_contar`
-- 

