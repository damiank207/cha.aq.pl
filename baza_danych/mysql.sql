-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: mysql1.ph-hos.osemka.pl
-- Czas wygenerowania: 03 Wrz 2015, 20:46
-- Wersja serwera: 5.0.91
-- Wersja PHP: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `nazwabazydanych`
--
CREATE DATABASE `nazwabazydanych` DEFAULT CHARACTER SET latin2 COLLATE latin2_general_ci;
USE `nazwabazydanych`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `c_id` int(11) NOT NULL auto_increment,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `ip` varchar(30) collate utf8_bin default NULL,
  `time` int(11) default NULL,
  PRIMARY KEY  (`c_id`),
  KEY `user_one` (`user_one`),
  KEY `user_two` (`user_two`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=41 ;


--
-- Struktura tabeli dla  `conversation_reply`
--

CREATE TABLE IF NOT EXISTS `conversation_reply` (
  `cr_id` int(11) NOT NULL auto_increment,
  `reply` varchar(255) character set utf8 collate utf8_polish_ci default NULL,
  `user_id_fk` int(11) NOT NULL,
  `ip` varchar(30) collate utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  `c_id_fk` int(11) NOT NULL,
  `msg_stat_1` int(11) NOT NULL default '0',
  `msg_stat_2` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cr_id`),
  KEY `user_id_fk` (`user_id_fk`),
  KEY `c_id_fk` (`c_id_fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=213 ;


--
-- Struktura tabeli dla  `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL auto_increment,
  `friend_one` int(11) default NULL,
  `friend_two` int(11) default NULL,
  `status` int(1) default '0',
  PRIMARY KEY  (`friend_id`),
  KEY `friend_one` (`friend_one`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=65 ;


--
-- Struktura tabeli dla  `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(25) collate utf8_bin NOT NULL,
  `password` varchar(50) collate utf8_bin NOT NULL,
  `email` varchar(100) collate utf8_bin default NULL,
  `imie` varchar(15) collate utf8_bin default NULL,
  `nazwisko` varchar(25) collate utf8_bin default NULL,
  `ksywa` varchar(15) collate utf8_bin default NULL,
  `img_path` text collate utf8_bin,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `uc_PersonID` (`ksywa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=30 ;
