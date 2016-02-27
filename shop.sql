-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-01-13 08:45:15
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `shop_admin`
--

CREATE TABLE IF NOT EXISTS `shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `qq` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `shop_admin`
--

INSERT INTO `shop_admin` (`id`, `name`, `password`, `email`, `phone`, `qq`) VALUES
(1, 'admin', 'admin', '610259820@qq.com', '13527673292', 61259820);

-- --------------------------------------------------------

--
-- 表的结构 `shop_classify`
--

CREATE TABLE IF NOT EXISTS `shop_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classify` varchar(25) NOT NULL COMMENT '商品分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品分类' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `shop_classify`
--

INSERT INTO `shop_classify` (`id`, `classify`) VALUES
(1, '中国画'),
(2, '书籍'),
(3, '画册'),
(4, '文具'),
(5, '体育器材'),
(6, '电脑配件');

-- --------------------------------------------------------

--
-- 表的结构 `shop_goods`
--

CREATE TABLE IF NOT EXISTS `shop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL COMMENT '商品名称',
  `author` varchar(50) NOT NULL COMMENT '商品添加人',
  `address` varchar(250) NOT NULL COMMENT '商品地区',
  `classify` varchar(25) NOT NULL COMMENT '商品分类',
  `price` double NOT NULL COMMENT '商品价格',
  `stock` int(11) NOT NULL COMMENT '商品库存',
  `photo` varchar(250) NOT NULL COMMENT '商品图片',
  `profiles` text NOT NULL COMMENT '商品简介',
  `content` mediumtext NOT NULL COMMENT '商品详情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品信息' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `shop_goods`
--

INSERT INTO `shop_goods` (`id`, `name`, `author`, `address`, `classify`, `price`, `stock`, `photo`, `profiles`, `content`) VALUES
(4, '追风筝的人2', '黄豪军', '浙江杭州', '书籍', 25, 165, 'http://localhost/shop/Uploads/2016-01-12/56945e50dc385.png', '追风筝的人 胡塞尼著 中文小说畅销文艺书籍 两千万读者口耳相传 快乐大本营 高圆圆力荐 情感读物', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160112/1452564100354065.jpg&quot; title=&quot;1452564100354065.jpg&quot; alt=&quot;TB2FxcnbVXXXXcKXXXXXXXXXXXX_!!1049653664.jpg&quot;/&gt;&lt;/p&gt;'),
(5, '画像挂图孔夫子', '陈二哥', '北京', '中国画', 138, 15, 'http://localhost/shop/Uploads/2016-01-12/5694acb68b077.png', '孔子 画像挂图孔夫子孔子像国画书房画挂画挂像教室对联客厅中堂', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160112/1452584139787352.jpg&quot; title=&quot;1452584139787352.jpg&quot; alt=&quot;11.jpg&quot;/&gt;&lt;/p&gt;'),
(6, '宝宝涂色书', '黄嘉诺', '北京', '画册', 34.8, 785, 'http://localhost/shop/Uploads/2016-01-12/5694ad3ad5247.png', '宝宝涂色书2-3-4-6岁幼儿童学画画阶梯填色本绘画启蒙蜡笔画册', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160112/1452584261541124.jpg&quot; title=&quot;1452584261541124.jpg&quot; alt=&quot;21.jpg&quot;/&gt;&lt;/p&gt;'),
(8, '圆珠笔', '黄豪军', '北京', '文具', 16, 1528, 'http://localhost/shop/Uploads/2016-01-12/5694afe803f5b.png', '36支装得力文具6546圆珠笔原珠笔蓝色油笔按动圆珠笔包邮办公用品', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160112/1452584940745611.jpg&quot; title=&quot;1452584940745611.jpg&quot; alt=&quot;31.jpg&quot;/&gt;&lt;/p&gt;'),
(9, '斯伯丁篮球', '陈二哥', '福建厦门', '体育器材', 115, 1853, 'http://localhost/shop/Uploads/2016-01-12/5694b0a415b90.png', '包顺丰斯伯丁篮球室外 NBA篮球比赛用球 耐磨水泥地lanqiu74-414', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160112/1452585142608856.jpg&quot; title=&quot;1452585142608856.jpg&quot; alt=&quot;41.jpg&quot;/&gt;&lt;/p&gt;'),
(10, '英特尔 I5 4590', '黄嘉诺', '上海', '电脑配件', 1250, 1526, 'http://localhost/shop/Uploads/2016-01-12/5694b13d594af.png', '顺丰Intel/英特尔 I5 4590 盒装台式机电脑四核处理器3.3G i5 CPU', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160112/1452585300262106.jpg&quot; title=&quot;1452585300262106.jpg&quot; alt=&quot;51.jpg&quot;/&gt;&lt;/p&gt;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
