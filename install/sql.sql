-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 04 月 24 日 07:42
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `mallbuilder`
--

-- --------------------------------------------------------

--
-- 表的结构 `mallbuilder_fast_mail`
--

DROP TABLE IF EXISTS `mallbuilder_fast_mail`;
CREATE TABLE IF NOT EXISTS `mallbuilder_fast_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(30) DEFAULT NULL,
  `pinyin` varchar(18) NOT NULL COMMENT '物流',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `introduction` text,
  `url` varchar(30) DEFAULT NULL,
  `logo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=147 ;

--
-- 转存表中的数据 `mallbuilder_fast_mail`
--

INSERT INTO `mallbuilder_fast_mail` (`id`, `company`, `pinyin`, `status`, `introduction`, `url`, `logo`) VALUES
(1, 'AAE快递', 'aae', 1, NULL, NULL, NULL),
(2, '安捷快递', 'anjie', 1, NULL, NULL, NULL),
(3, '安信达快递', 'anxinda', 1, NULL, NULL, NULL),
(4, 'Aramex国际快递', 'aramex', 1, NULL, NULL, NULL),
(5, '巴伦支', 'balunzhi', 1, NULL, NULL, NULL),
(6, '宝通达', 'baotongda', 1, NULL, NULL, NULL),
(7, '成都奔腾国际快递', 'benteng', 1, NULL, NULL, NULL),
(8, 'CCES快递', 'cces', 1, NULL, NULL, NULL),
(9, '长通物流', 'changtong', 1, NULL, NULL, NULL),
(10, '程光快递', 'chengguang', 1, NULL, NULL, NULL),
(11, '城际快递', 'chengji', 1, NULL, NULL, NULL),
(12, '城市100', 'chengshi100', 1, NULL, NULL, NULL),
(13, '传喜快递', 'chuanxi', 1, NULL, NULL, NULL),
(14, '传志快递', 'chuanzhi', 1, NULL, NULL, NULL),
(15, '出口易物流', 'chukouyi', 1, NULL, NULL, NULL),
(16, 'CityLinkExpress', 'citylink', 1, NULL, NULL, NULL),
(17, '东方快递', 'coe', 1, NULL, NULL, NULL),
(18, '城市之星', 'cszx', 1, NULL, NULL, NULL),
(19, '大田物流', 'datian', 1, NULL, NULL, NULL),
(20, '大洋物流快递', 'dayang', 1, NULL, NULL, NULL),
(21, '德邦物流', 'debang', 1, NULL, NULL, NULL),
(22, '德创物流', 'dechuang', 1, NULL, NULL, NULL),
(23, 'DHL快递', 'dhl', 1, NULL, NULL, NULL),
(24, '店通快递', 'diantong', 1, NULL, NULL, NULL),
(25, '递达快递', 'dida', 1, NULL, NULL, NULL),
(26, '叮咚快递', 'dingdong', 1, NULL, NULL, NULL),
(27, '递四方速递', 'disifang', 1, NULL, NULL, NULL),
(28, 'DPEX快递', 'dpex', 1, NULL, NULL, NULL),
(29, 'D速快递', 'dsu', 1, NULL, NULL, NULL),
(30, '百福东方物流', 'ees', 1, NULL, NULL, NULL),
(31, 'EMS快递', 'ems', 1, NULL, NULL, NULL),
(32, '凡宇快递', 'fanyu', 1, NULL, NULL, NULL),
(33, 'Fardar', 'fardar', 1, NULL, NULL, NULL),
(34, '国际Fedex', 'fedex', 1, NULL, NULL, NULL),
(35, 'Fedex国内', 'fedexcn', 1, NULL, NULL, NULL),
(36, '飞邦物流', 'feibang', 1, NULL, NULL, NULL),
(37, '飞豹快递', 'feibao', 1, NULL, NULL, NULL),
(38, '原飞航物流', 'feihang', 1, NULL, NULL, NULL),
(39, '飞狐快递', 'feihu', 1, NULL, NULL, NULL),
(40, '飞特物流', 'feite', 1, NULL, NULL, NULL),
(41, '飞远物流', 'feiyuan', 1, NULL, NULL, NULL),
(42, '丰达快递', 'fengda', 1, NULL, NULL, NULL),
(43, '飞康达快递', 'fkd', 1, NULL, NULL, NULL),
(44, '广东邮政物流', 'gdyz', 1, NULL, NULL, NULL),
(45, '邮政国内小包', 'gnxb', 1, NULL, NULL, NULL),
(46, '共速达物流|快递', 'gongsuda', 1, NULL, NULL, NULL),
(47, '国通快递', 'guotong', 1, NULL, NULL, NULL),
(48, '山东海红快递', 'haihong', 1, NULL, NULL, NULL),
(49, '海盟速递', 'haimeng', 1, NULL, NULL, NULL),
(50, '昊盛物流', 'haosheng', 1, NULL, NULL, NULL),
(51, '河北建华快递', 'hebeijianhua', 1, NULL, NULL, NULL),
(52, '恒路物流', 'henglu', 1, NULL, NULL, NULL),
(53, '华诚物流', 'huacheng', 1, NULL, NULL, NULL),
(54, '华翰物流', 'huahan', 1, NULL, NULL, NULL),
(55, '华企快递', 'huaqi', 1, NULL, NULL, NULL),
(56, '华夏龙物流', 'huaxialong', 1, NULL, NULL, NULL),
(57, '天地华宇物流', 'huayu', 1, NULL, NULL, NULL),
(58, '汇强快递', 'huiqiang', 1, NULL, NULL, NULL),
(59, '汇通快递', 'huitong', 1, NULL, NULL, NULL),
(60, '海外环球快递', 'hwhq', 1, NULL, NULL, NULL),
(61, '佳吉快运', 'jiaji', 1, NULL, NULL, NULL),
(62, '佳怡物流', 'jiayi', 1, NULL, NULL, NULL),
(63, '加运美快递', 'jiayunmei', 1, NULL, NULL, NULL),
(64, '金大物流', 'jinda', 1, NULL, NULL, NULL),
(65, '京东快递', 'jingdong', 1, NULL, NULL, NULL),
(66, '京广快递', 'jingguang', 1, NULL, NULL, NULL),
(67, '晋越快递', 'jinyue', 1, NULL, NULL, NULL),
(68, '急先达物流', 'jixianda', 1, NULL, NULL, NULL),
(69, '嘉里大通物流', 'jldt', 1, NULL, NULL, NULL),
(70, '康力物流', 'kangli', 1, NULL, NULL, NULL),
(71, '顺鑫(KCS)快递', 'kcs', 1, NULL, NULL, NULL),
(72, '快捷快递', 'kuaijie', 1, NULL, NULL, NULL),
(73, '宽容物流', 'kuanrong', 1, NULL, NULL, NULL),
(74, '跨越快递', 'kuayue', 1, NULL, NULL, NULL),
(75, '乐捷递快递', 'lejiedi', 1, NULL, NULL, NULL),
(76, '联昊通快递', 'lianhaotong', 1, NULL, NULL, NULL),
(77, '成都立即送快递', 'lijisong', 1, NULL, NULL, NULL),
(78, '龙邦快递', 'longbang', 1, NULL, NULL, NULL),
(79, '民邦快递', 'minbang', 1, NULL, NULL, NULL),
(80, '明亮物流', 'mingliang', 1, NULL, NULL, NULL),
(81, '闽盛快递', 'minsheng', 1, NULL, NULL, NULL),
(82, '尼尔快递', 'nell', 1, NULL, NULL, NULL),
(83, '港中能达快递', 'nengda', 1, NULL, NULL, NULL),
(84, 'OCS快递', 'ocs', 1, NULL, NULL, NULL),
(85, '平安达', 'pinganda', 1, NULL, NULL, NULL),
(86, '中国邮政平邮', 'pingyou', 1, NULL, NULL, NULL),
(87, '品速心达快递', 'pinsu', 1, NULL, NULL, NULL),
(88, '全晨快递', 'quanchen', 1, NULL, NULL, NULL),
(89, '全峰快递', 'quanfeng', 1, NULL, NULL, NULL),
(90, '全际通快递', 'quanjitong', 1, NULL, NULL, NULL),
(91, '全日通快递', 'quanritong', 1, NULL, NULL, NULL),
(92, '全一快递', 'quanyi', 1, NULL, NULL, NULL),
(93, 'RPX保时达', 'rpx', 1, NULL, NULL, NULL),
(94, '如风达快递', 'rufeng', 1, NULL, NULL, NULL),
(95, '赛澳递', 'saiaodi', 1, NULL, NULL, NULL),
(96, '三态速递', 'santai', 1, NULL, NULL, NULL),
(97, '伟邦(SCS)快递', 'scs', 1, NULL, NULL, NULL),
(98, '圣安物流', 'shengan', 1, NULL, NULL, NULL),
(99, '晟邦物流', 'shengbang', 1, NULL, NULL, NULL),
(100, '盛丰物流', 'shengfeng', 1, NULL, NULL, NULL),
(101, '盛辉物流', 'shenghui', 1, NULL, NULL, NULL),
(102, '申通快递', 'shentong', 1, NULL, NULL, NULL),
(103, '顺丰快递', 'shunfeng', 1, NULL, NULL, NULL),
(104, '速呈宅配', 'suchengzhaipei', 1, NULL, NULL, NULL),
(105, '穗佳物流', 'suijia', 1, NULL, NULL, NULL),
(106, '速尔快递', 'sure', 1, NULL, NULL, NULL),
(107, '天天快递', 'tiantian', 1, NULL, NULL, NULL),
(108, 'TNT快递', 'tnt', 1, NULL, NULL, NULL),
(109, '通成物流', 'tongcheng', 1, NULL, NULL, NULL),
(110, '通和天下物流', 'tonghe', 1, NULL, NULL, NULL),
(111, 'UPS快递', 'ups', 1, NULL, NULL, NULL),
(112, 'USPS快递', 'usps', 1, NULL, NULL, NULL),
(113, '万博快递', 'wanbo', 1, NULL, NULL, NULL),
(114, '万家物流', 'wanjia', 1, NULL, NULL, NULL),
(115, '微特派', 'weitepai', 1, NULL, NULL, NULL),
(116, '祥龙运通快递', 'xianglong', 1, NULL, NULL, NULL),
(117, '新邦物流', 'xinbang', 1, NULL, NULL, NULL),
(118, '信丰快递', 'xinfeng', 1, NULL, NULL, NULL),
(119, '星程宅配快递', 'xingchengzhaipei', 1, NULL, NULL, NULL),
(120, '希优特快递', 'xiyoute', 1, NULL, NULL, NULL),
(121, '源安达快递', 'yad', 1, NULL, NULL, NULL),
(122, '亚风快递', 'yafeng', 1, NULL, NULL, NULL),
(123, '一邦快递', 'yibang', 1, NULL, NULL, NULL),
(124, '银捷快递', 'yinjie', 1, NULL, NULL, NULL),
(125, '音素快运', 'yinsu', 1, NULL, NULL, NULL),
(126, '亿顺航快递', 'yishunhang', 1, NULL, NULL, NULL),
(127, '优速快递', 'yousu', 1, NULL, NULL, NULL),
(128, '北京一统飞鸿快递', 'ytfh', 1, NULL, NULL, NULL),
(129, '远成物流', 'yuancheng', 1, NULL, NULL, NULL),
(130, '圆通快递', 'yuantong', 1, NULL, NULL, NULL),
(131, '元智捷诚', 'yuanzhi', 1, NULL, NULL, NULL),
(132, '越丰快递', 'yuefeng', 1, NULL, NULL, NULL),
(133, '誉美捷快递', 'yumeijie', 1, NULL, NULL, NULL),
(134, '韵达快递', 'yunda', 1, NULL, NULL, NULL),
(135, '运通中港快递', 'yuntong', 1, NULL, NULL, NULL),
(136, '宇鑫物流', 'yuxin', 1, NULL, NULL, NULL),
(137, '源伟丰', 'ywfex', 1, NULL, NULL, NULL),
(138, '增益快递', 'zengyi', 1, NULL, NULL, NULL),
(139, '宅急送快递', 'zhaijisong', 1, NULL, NULL, NULL),
(140, '郑州建华快递', 'zhengzhoujianhua', 1, NULL, NULL, NULL),
(141, '芝麻开门快递', 'zhima', 1, NULL, NULL, NULL),
(142, '济南中天万运', 'zhongtian', 1, NULL, NULL, NULL),
(143, '中铁快运', 'zhongtie', 1, NULL, NULL, NULL),
(144, '中通快递', 'zhongtong', 1, NULL, NULL, NULL),
(145, '忠信达快递', 'zhongxinda', 1, NULL, NULL, NULL),
(146, '中邮物流', 'zhongyou', 1, NULL, NULL, NULL);
