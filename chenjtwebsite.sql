-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 10 日 16:21
-- 服务器版本: 5.5.36
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `chenjtwebsite`
--
CREATE DATABASE IF NOT EXISTS `chenjtwebsite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chenjtwebsite`;

-- --------------------------------------------------------

--
-- 表的结构 `cjt_admin`
--

CREATE TABLE IF NOT EXISTS `cjt_admin` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cjt_admin`
--

INSERT INTO `cjt_admin` (`id`, `username`, `password`) VALUES
(1, 'cjt', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `cjt_article`
--

CREATE TABLE IF NOT EXISTS `cjt_article` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL COMMENT '标题',
  `author` varchar(20) DEFAULT NULL COMMENT '作者',
  `coverpic` varchar(100) NOT NULL COMMENT '封面',
  `content` text NOT NULL COMMENT '内容',
  `sortid` int(5) NOT NULL COMMENT '分类id',
  `time` varchar(20) NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cjt_sort`
--

CREATE TABLE IF NOT EXISTS `cjt_sort` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sortname` varchar(40) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
