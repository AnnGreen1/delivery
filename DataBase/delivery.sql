-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-05-28 05:01:14
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `delivery`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE `address` (
  `a_id` int(11) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_longitude` double NOT NULL COMMENT '经度',
  `a_latitude` double NOT NULL COMMENT '纬度',
  `a_localization` varchar(500) NOT NULL,
  `a_createtime` int(11) NOT NULL,
  `a_default` int(11) NOT NULL,
  `a_tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`a_id`, `a_email`, `a_longitude`, `a_latitude`, `a_localization`, `a_createtime`, `a_default`, `a_tel`) VALUES
(1, 'xiaohua@qq.com', 31.281458, 118.361271, '安徽省芜湖市弋江区瀂港街道文津西路28号安徽机电职业技术学院(文津西路)', 1652962398, 1, '13888888888'),
(2, 'xiaohua@qq.com', 31.17155633, 118.2499909, '徽省芜湖市弋江区峨桥镇桂秀门', 1652962999, 0, '13666666666'),
(3, 'xiaohua@qq.com', 31.137009, 118.635979, '安徽省芜湖市湾沚区永和路1号安徽信息工程学院', 1652962234, 0, '13999999999'),
(4, 'xiaohua@qq.com', 100, 45, '安徽省芜湖市弋江区文津西路8号', 1653040584, 0, '18456772638'),
(5, 'xiaohua@qq.com', 118.547502, 31.485552, '安徽省芜湖市弋江区峨桥镇桂秀门', 1653041119, 0, '13888888888'),
(6, 'xiaohua@qq.com', 118.547502, 31.485552, '安徽省芜湖市弋江区峨桥镇桂秀门', 1653041292, 1, '15999999999'),
(7, 'xiaohua@qq.com', 118.547502, 31.485552, '安徽省芜湖市弋江区峨桥镇桂秀门', 1653041437, 1, '18966666666');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `a_type` varchar(255) DEFAULT NULL,
  `a_id` int(11) NOT NULL,
  `a_username` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_createtime` int(11) DEFAULT NULL,
  `a_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`a_type`, `a_id`, `a_username`, `a_password`, `a_createtime`, `a_icon`) VALUES
(NULL, 1, 'admin', '111', 1635802604, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `commodity`
--

CREATE TABLE `commodity` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_num` int(11) DEFAULT NULL,
  `c_price` int(11) DEFAULT NULL,
  `c_total` int(11) DEFAULT NULL,
  `c_type` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `c_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `commodity`
--

INSERT INTO `commodity` (`c_id`, `c_name`, `c_num`, `c_price`, `c_total`, `c_type`, `shop_id`, `c_icon`) VALUES
(1, '奥尔良烤堡', 0, 1500, 0, '汉堡', 2, 'aoerliangkaobao.jpg'),
(2, '奥尔良烤翅', 0, 1150, 0, '鸡翅', 2, '奥尔良烤翅.jpg'),
(3, '爆汁厚作牛牛堡', 0, 1800, 0, '汉堡', 2, '爆汁厚作牛牛堡.jpg'),
(4, '缤纷全鸡桶', 0, 3500, 0, '翅桶', 2, '缤纷全鸡桶.jpg'),
(5, '超脆薯条', 0, 1650, 0, '薯条', 2, '超脆薯条.jpg'),
(6, '脆皮鸭脖', 0, 200, 0, '鸡翅', 2, '脆皮鸭脖.jpg'),
(7, '十翅一桶', 0, 3550, 0, '翅桶', 2, '十翅一桶.jpg'),
(8, '奥尔良烤鸡腿饭套餐', 0, 1500, 0, '套餐', 3, '奥尔良烤鸡腿饭套餐.jpg'),
(9, '黑椒鸡排+米饭+两配菜', 0, 1600, 0, '吃好饭', 3, '黑椒鸡排+米饭+两配菜.jpg'),
(10, '特色香肠饭+两配菜', 0, 1700, 0, '吃好饭', 3, '特色香肠饭+两配菜.jpg'),
(11, '一品红烧肉+米饭+两配菜', 0, 2000, 0, '吃好饭', 3, '一品红烧肉+米饭+两配菜.jpg'),
(12, '地锅鸡', 0, 2100, 0, '家常菜', 10, '地锅鸡.jpg'),
(13, '青椒炒蛋饭', 0, 1100, 0, '家常菜', 10, '青椒炒蛋饭.jpg'),
(14, '青椒炒蛋饭.jpg', 0, 1600, 0, '套餐', 3, '椰香咖喱鸡饭套餐.jpg'),
(15, '紫菜蛋汤', 0, 800, 0, '汤类', 10, '紫菜蛋汤.jpg'),
(16, '大白菜', 0, 200, 0, '时蔬', 8, '大白菜.png'),
(17, '广西沃柑', 0, 1100, 0, '水果', 8, '广西沃柑.jpg'),
(18, '黑提不少于500g', 0, 1800, 0, '水果', 8, '黑提不少于500g.jpg'),
(19, '红洋葱1个', 0, 600, 0, '时蔬', 8, '红洋葱1个.png'),
(20, '韭菜', 0, 300, 0, '时蔬', 8, '韭菜.png'),
(21, '西红柿1个', 0, 300, 0, '时蔬', 8, '西红柿1个.png'),
(22, '小米辣约100g', 0, 950, 0, '时蔬', 8, '小米辣约100g.jpg'),
(23, '白加黑', 0, 7800, 0, '蛋糕', 9, '白加黑.jpg'),
(24, '圣诞粉色小可爱', 0, 12800, 0, '蛋糕', 9, '圣诞粉色小可爱.jpg'),
(25, '提拉米苏', 0, 2100, 0, '甜点', 9, '提拉米苏.jpg'),
(26, '小彩虹慕斯蛋糕', 0, 1500, 0, '甜点', 9, '小彩虹慕斯蛋糕.jpg'),
(27, '雪媚娘奥利奥', 0, 800, 0, '甜点', 9, '雪媚娘奥利奥.jpg'),
(28, '一家之主', 0, 12800, 0, '蛋糕', 9, '一家之主.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `emailverificationcode`
--

CREATE TABLE `emailverificationcode` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `verificationCode` varchar(20) NOT NULL,
  `createtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `emailverificationcode`
--

INSERT INTO `emailverificationcode` (`id`, `username`, `verificationCode`, `createtime`) VALUES
(15, '1185353788@qq.com', '993913', 1652957874),
(16, '807487176@qq.com', '162540', 1652963558),
(17, '807487176@qq.com', '629898', 1652963658),
(18, '', '676155', 1652963715),
(19, '807487176@qq.com', '866782', 1652963789),
(20, '807487176@qq.com', '436235', 1652964015),
(21, '807487176@qq.com', '791632', 1652964123),
(22, '', '524780', 1652964216),
(23, '807487176@qq.com', '486444', 1652964224),
(24, '807487176@qq.com', '906651', 1652964273),
(25, '807487176@qq.com', '140025', 1652964276),
(26, '807487176@qq.com', '844444', 1652964310),
(27, '807487176@qq.com', '663236', 1652964375),
(28, '807487176@qq.com', '682683', 1652964615),
(29, '807487176@qq.com', '416879', 1652964633),
(30, '807487176@qq.com', '634837', 1652964691),
(31, '807487176@qq.com', '735544', 1652964736),
(32, '807487176@qq.com', '900922', 1652972999),
(33, '1185353788@qq.com', '805472', 1652973117),
(34, '', '208248', 1652973132),
(35, '807487176@qq.com', '602337', 1652973558),
(36, '', '534186', 1652973570),
(37, '807487176@qq.com', '741632', 1652973652),
(38, '807487176@qq.com', '327242', 1652973776),
(39, '', '535866', 1652973791),
(40, '807487176@qq.com', '509576', 1652973868),
(41, '1185353788@qq.com', '614338', 1652974464),
(42, '807487176@qq.com', '673210', 1652991183);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `o_total` int(11) DEFAULT NULL,
  `o_username` varchar(255) DEFAULT NULL,
  `o_title` varchar(255) DEFAULT NULL,
  `o_state` varchar(255) DEFAULT NULL,
  `o_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`o_id`, `o_total`, `o_username`, `o_title`, `o_state`, `o_icon`) VALUES
(41, 3500, 'xiaohua@qq.com', '百基拉炸鸡·汉堡（芜湖湾沚店）', '已完成', '百基拉炸鸡·汉堡（芜湖湾沚店）.jpg'),
(51, 7200, 'xiaohua@qq.com', '爱尚蛋糕（湾沚店）', '已完成', '爱尚蛋糕（湾沚店）.jpg'),
(58, 1150, 'xiaohua@qq.com', '百基拉炸鸡·汉堡（芜湖湾沚店）', '已完成', '百基拉炸鸡·汉堡（芜湖湾沚店）.jpg'),
(59, 3200, 'xiaohua@qq.com', '广东猪脚饭（安信工店）', '未完成', '广东猪脚饭（安信工店）.jpg'),
(60, 2300, 'xiaohua@qq.com', '百基拉炸鸡·汉堡（芜湖湾沚店）', '未完成', '百基拉炸鸡·汉堡（芜湖湾沚店）.jpg'),
(61, 7000, 'xiaohua@qq.com', '百基拉炸鸡·汉堡（芜湖湾沚店）', '已完成', '百基拉炸鸡·汉堡（芜湖湾沚店）.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE `shop` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_type` varchar(11) NOT NULL,
  `s_address` varchar(500) DEFAULT NULL,
  `s_icon` varchar(255) NOT NULL,
  `s_createtime` int(11) NOT NULL,
  `s_volumes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`s_id`, `s_name`, `s_type`, `s_address`, `s_icon`, `s_createtime`, `s_volumes`) VALUES
(1, '豪大大鸡排（安信工店）', '美食', '#', '豪大大鸡排（安信工店）.jpg', 1635802604, 0),
(2, '百基拉炸鸡·汉堡（芜湖湾沚店）', '美食', '#', '百基拉炸鸡·汉堡（芜湖湾沚店）.jpg', 1635802604, 0),
(3, '广东猪脚饭（安信工店）', '美食', '#', '广东猪脚饭（安信工店）.jpg', 1635802604, 0),
(4, '贡茶GONGCHA（安信工店）', '美食', '#', '贡茶GONGCHA（安信工店）.jpg', 0, 0),
(5, '陶记麻辣烫（安信工点）', '美食', '#', '陶记麻辣烫（安信工点）.jpg', 0, 0),
(6, '学长家的杂粮煎饼（安信工店）', '美食', '#', '学长家的杂粮煎饼（安信工店）.jpg', 0, 0),
(7, '大润发超市', '超市', '#', '大润发超市.jpg', 0, 0),
(8, '环球蔬果汇', '生鲜果蔬', '#', '环球蔬果汇.jpg', 0, 0),
(9, '爱尚蛋糕（湾沚店）', '鲜花蛋糕', '#', '爱尚蛋糕（湾沚店）.jpg', 0, 0),
(10, '小食代', '快餐简餐', '#', '小食代.jpg', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_nickname` varchar(255) DEFAULT NULL,
  `u_createtime` int(11) NOT NULL,
  `u_icon` varchar(255) NOT NULL,
  `u_balance` int(11) NOT NULL,
  `u_address` varchar(500) DEFAULT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_payword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`u_id`, `u_password`, `u_nickname`, `u_createtime`, `u_icon`, `u_balance`, `u_address`, `u_email`, `u_payword`) VALUES
(1, '123', '纪小康', 1635802604, 'anngreen.jpeg', 597, 'a18s401', 'xiaohua@qq.com', 111111),
(2, '123', '记忆中有你', 1652962398, 'default.png', 0, '#', '807487176@qq.com', 666666);

--
-- 转储表的索引
--

--
-- 表的索引 `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`) USING BTREE;

--
-- 表的索引 `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`c_id`) USING BTREE;

--
-- 表的索引 `emailverificationcode`
--
ALTER TABLE `emailverificationcode`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`) USING BTREE;

--
-- 表的索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`s_id`) USING BTREE;

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `emailverificationcode`
--
ALTER TABLE `emailverificationcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- 使用表AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
