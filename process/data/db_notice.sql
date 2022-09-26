-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-04-19 20:14:47
-- 服务器版本： 5.7.33
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `db_notice`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_notice`
--

CREATE TABLE `tb_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_notice`
--

INSERT INTO `tb_notice` (`id`, `title`, `content`, `time`) VALUES
(1, '基金管理有限公司公告', '基金管理有限公司（以下简称“基金管理人”）依据证监许可[2016]1359号文募集的集瑞债券型证券投资基金（以下简称“广发集瑞债券”）的基金合同已于2016年11月18日生效，根据《中华人民共和国证券投资基金法》', '2016-04-11 14:04:58'),
(2, '传iPhone8 lightning被保留 支持Type-C快充', '据凯基证券分析师郭明池表示，传闻将于2017年推出的三款iPhone，包括全新，带有更大L形电池的OLED型号，以及更新的4.7英寸和5.5英寸型号都将保留Lightning闪电接口，并增加了USB-C充电技术，以加快充电速度。这样的说法与两天前华尔街日报的说法截然相反。', '2017-04-11 14:04:58'),
(3, '赚钱还是靠中国！富士康或收购东芝闪存股份', '  报道称，东芝存储公司是全球第二大闪存制造商。当东芝表示将会出售多数股份以来，大约有十家公司正在和东芝接触，希望收购闪存子公司，这包括了富士康集团、美光科技、韩国海力士、美国苹果、贝恩资本、微软等公司。', '2018-04-11 14:04:58'),
(4, '热而然', '二恶耳热翻山倒海开始是灰色空间和', '2019-04-11 14:04:58'),
(5, '东方饭店', '订饭的辅导费的带饭订饭的双方都双方都费大幅度的订饭的辅导费诉讼费的地方佛挡杀佛多福多寿发的地方的地方是', '2020-04-11 14:04:58'),
(6, '丰富的风格', '股份大股东股份的股份股份 ', '2020-04-12 14:04:58'),
(7, '个发广告', '的飞得更高发个非官方个地方官费大幅度发给', '2021-04-11 14:04:58'),
(8, '测试测试', '这已经是我第n次添加了！', '2022-04-11 22:31:24'),
(15, '测试分页', '修改测试第九条记录！', '2022-04-13 20:59:53'),
(27, '丰富的风格', '股份大股东股份的股份股份 ', '2022-11-11 14:04:58'),
(30, '的', '得了吧的嗯', '2022-04-17 19:24:57');

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL COMMENT '用户密码',
  `time` text NOT NULL COMMENT '注册时间',
  `re_ip` varchar(32) NOT NULL COMMENT '注册IP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `password`, `time`, `re_ip`) VALUES
(1, 'waahah', '1234', '2022-04-18 21:08:42', '::1');

--
-- 转储表的索引
--

--
-- 表的索引 `tb_notice`
--
ALTER TABLE `tb_notice`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tb_notice`
--
ALTER TABLE `tb_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用表AUTO_INCREMENT `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
