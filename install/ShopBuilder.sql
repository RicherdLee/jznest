-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 09 日 06:38
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `shopbuilder`
--

-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_activity`
--

CREATE TABLE `shopbuilder_activity` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `ads_code` varchar(100) NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `templates` varchar(30) NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `displayorder` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_activity`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_activity_product_list`
--

CREATE TABLE `shopbuilder_activity_product_list` (
  `id` int(10) NOT NULL auto_increment,
  `activity_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `displayorder` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_activity_product_list`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_admin`
--

CREATE TABLE `shopbuilder_admin` (
  `id` int(3) NOT NULL auto_increment,
  `user` char(30) NOT NULL,
  `name` varchar(50) default NULL,
  `password` char(35) NOT NULL,
  `group_id` smallint(5) NOT NULL default '0',
  `desc` text,
  `logonums` int(5) default '0',
  `lastlogotime` int(11) default NULL,
  `logoip` varchar(30) default NULL,
  `province` varchar(60) default NULL,
  `city` varchar(60) default NULL,
  `area` varchar(60) default NULL,
  `type` smallint(1) unsigned default NULL COMMENT '1manager',
  `lang` varchar(10) default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `shopbuilder_admin`
--

INSERT INTO `shopbuilder_admin` (`id`, `user`, `name`, `password`, `group_id`, `desc`, `logonums`, `lastlogotime`, `logoip`, `province`, `city`, `area`, `type`, `lang`) VALUES
(1, 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', 0, NULL, 0, 1410231152, '127.0.0.1', NULL, NULL, NULL, 1, 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_admin_group`
--

CREATE TABLE `shopbuilder_admin_group` (
  `group_id` smallint(5) unsigned NOT NULL auto_increment COMMENT '组Id',
  `group_name` varchar(60) NOT NULL COMMENT '组名称',
  `group_perms` text NOT NULL COMMENT '组权限',
  `group_desc` varchar(250) NOT NULL COMMENT '组描述',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_admin_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_admin_operation_log`
--

CREATE TABLE `shopbuilder_admin_operation_log` (
  `id` int(5) NOT NULL auto_increment,
  `user` varchar(20) default NULL,
  `scriptname` varchar(50) default NULL,
  `url` varchar(200) default NULL,
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_admin_operation_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_advs`
--

CREATE TABLE `shopbuilder_advs` (
  `ID` int(4) NOT NULL auto_increment,
  `width` varchar(10) default NULL,
  `height` varchar(10) default NULL,
  `ad_type` tinyint(1) NOT NULL default '1',
  `name` varchar(50) NOT NULL default '',
  `onurl` varchar(200) default NULL,
  `group` varchar(50) default NULL,
  `con` mediumtext,
  `date` datetime default NULL,
  `price` decimal(10,2) default NULL,
  `unit` enum('day','week','month') NOT NULL,
  `total` tinyint(4) default '0' COMMENT '数量',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 导出表中的数据 `shopbuilder_advs`
--

INSERT INTO `shopbuilder_advs` (`ID`, `width`, `height`, `ad_type`, `name`, `onurl`, `group`, `con`, `date`, `price`, `unit`, `total`) VALUES
(1, '500', '320', 0, '登录页', NULL, '登录', '', '2013-09-18 14:42:29', 0.00, 'day', 0),
(2, '740', '250', 1, '首页中间-1', NULL, '首页', '', '2013-09-18 14:58:31', 0.00, 'day', 0),
(3, '740', '180', 2, '首页中间-2', NULL, '首页', '', '2013-09-18 14:59:18', 0.00, 'day', 0),
(4, '240', '70', 0, '首页右边-1', NULL, '首页', '', '2013-09-18 15:24:07', 0.00, 'day', 0),
(5, '240', '133', 0, '首页右边-2', NULL, '首页', '', '2013-09-18 15:25:29', 0.00, 'day', 0),
(6, '209', '155', 0, '首页分类左边', NULL, '首页', '', '2013-09-18 15:34:47', 0.00, 'day', 0),
(7, '473', '180', 1, '首页分类中间', NULL, '首页', '', '2013-09-18 15:46:44', 0.00, 'day', 0),
(8, '209', '179', 0, '首页分类右边', NULL, '首页', '', '2013-09-18 15:47:14', 0.00, 'day', 0),
(9, '240', '88', 0, '首页产品首发', NULL, '首页', '', '2013-09-22 15:16:04', 0.00, 'day', 0),
(10, '235', '0', 0, '团购首页', NULL, '团购', '', '2013-09-22 16:15:40', 0.00, 'day', 0),
(11, '310', '100', 0, '团购详情页', NULL, '团购', '', '2013-09-22 16:23:05', 0.00, 'day', 0),
(12, '200', '0', 0, '产品列表页', NULL, '产品', '', '2013-09-22 17:33:05', 0.00, 'day', 0),
(13, '200', '0', 0, '产品详情页', NULL, '产品', '', '2013-09-22 17:33:40', 0.00, 'day', 0),
(14, '186', '0', 0, '热门活动', NULL, '用户后台', '', '2013-09-22 17:38:21', 0.00, 'day', 0),
(15, '186', '0', 0, '热门商品推荐', NULL, '用户后台', '', '2013-09-22 17:38:34', 0.00, 'day', 0),
(16, '565', '0', 0, '用户后台', NULL, '用户后台', '', '2013-09-22 17:47:24', 0.00, 'day', 0);

-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_advs_con`
--

CREATE TABLE `shopbuilder_advs_con` (
  `ID` int(4) NOT NULL auto_increment,
  `userid` int(11) default NULL,
  `group_id` int(5) default NULL,
  `name` varchar(50) NOT NULL default '',
  `type` varchar(20) default NULL,
  `url` varchar(200) default NULL,
  `con` mediumtext,
  `picName` varchar(255) NOT NULL,
  `isopen` int(1) default '0',
  `ctime` int(11) default NULL,
  `province` varchar(50) default NULL,
  `city` varchar(50) default NULL,
  `area` varchar(50) default NULL,
  `width` char(4) default NULL,
  `height` char(4) default NULL,
  `catid` int(8) default NULL,
  `unit` enum('day','week','month') default NULL,
  `show_time` tinyint(4) default '0' COMMENT '展出时间',
  `statu` tinyint(1) default '0' COMMENT '0:待支付,1:购买成功,',
  `shownum` int(11) unsigned default '1' COMMENT '展示次数',
  `stime` int(10) unsigned default NULL,
  `etime` int(10) unsigned default NULL,
  `sort_num` tinyint(3) unsigned default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_advs_con`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_announcement`
--

CREATE TABLE `shopbuilder_announcement` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `url` varchar(100) default NULL COMMENT '跳转链接',
  `create_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态 0 为关闭 1为开启',
  `displayorder` smallint(6) NOT NULL default '255' COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_announcement`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_brand`
--

CREATE TABLE `shopbuilder_brand` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(80) NOT NULL,
  `char_index` char(1) NOT NULL,
  `catid` int(11) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `displayorder` smallint(6) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '1',
  `create_time` int(10) unsigned NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_brand`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_brand_cat`
--

CREATE TABLE `shopbuilder_brand_cat` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `displayorder` smallint(6) NOT NULL default '255',
  `catname` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_brand_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_contags`
--

CREATE TABLE `shopbuilder_contags` (
  `tagname` char(20) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `type` tinyint(4) default NULL,
  KEY `tid` (`tid`),
  KEY `tagname_2` (`tagname`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `shopbuilder_contags`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_cron`
--

CREATE TABLE `shopbuilder_cron` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `script` varchar(50) default NULL,
  `lasttransact` int(10) default NULL,
  `nexttransact` int(10) default NULL,
  `week` varchar(12) default '-1',
  `day` varchar(2) default '-1',
  `hours` varchar(2) default '00',
  `minutes` varchar(2) default '00',
  `active` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `shopbuilder_cron`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_district`
--

CREATE TABLE `shopbuilder_district` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `pid` mediumint(8) unsigned NOT NULL default '0',
  `sorting` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `upid` (`pid`,`sorting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_district`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_fast_mail`
--

CREATE TABLE `shopbuilder_fast_mail` (
  `id` int(11) NOT NULL auto_increment,
  `company` varchar(30) default NULL,
  `introduction` text,
  `url` varchar(30) default NULL,
  `logo` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_fast_mail`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_feed`
--

CREATE TABLE `shopbuilder_feed` (
  `id` int(10) NOT NULL auto_increment,
  `userid` int(10) default NULL,
  `company` varchar(100) default NULL,
  `contact` varchar(30) default NULL,
  `email` varchar(30) default NULL,
  `mes` text,
  `iflook` char(2) default NULL,
  `province` varchar(30) default NULL,
  `city` varchar(30) default NULL,
  `tell` varchar(30) default NULL,
  `addr` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_feed`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_filter_keyword`
--

CREATE TABLE `shopbuilder_filter_keyword` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `keyword` varchar(50) default NULL,
  `replace` varchar(50) default NULL,
  `statu` tinyint(1) default '1',
  `time` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `shopbuilder_filter_keyword`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_logistics_temp`
--

CREATE TABLE `shopbuilder_logistics_temp` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `type` tinyint(1) default '0',
  `desc` text,
  `status` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_logistics_temp`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_logistics_temp_con`
--

CREATE TABLE `shopbuilder_logistics_temp_con` (
  `id` int(11) NOT NULL auto_increment,
  `temp_id` int(11) default NULL,
  `default_num` smallint(5) default '0',
  `default_price` float(5,0) default '0',
  `add_num` smallint(5) default '0',
  `add_price` float(5,0) default '0',
  `free` smallint(5) default '0',
  `define_citys` text,
  PRIMARY KEY  (`id`),
  KEY `temp_id` (`temp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_logistics_temp_con`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_mail_mod`
--

CREATE TABLE `shopbuilder_mail_mod` (
  `id` int(8) NOT NULL auto_increment,
  `subject` varchar(100) default NULL,
  `title` varchar(100) default NULL,
  `message` text,
  `flag` varchar(30) default NULL,
  `type` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_mail_mod`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_mail_record`
--

CREATE TABLE `shopbuilder_mail_record` (
  `id` int(11) NOT NULL auto_increment,
  `sendmailname` varchar(20) default NULL,
  `sendtime` datetime default NULL,
  `sendmailrecord` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_mail_record`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_member`
--

CREATE TABLE `shopbuilder_member` (
  `userid` int(8) NOT NULL auto_increment,
  `email_verify` tinyint(1) NOT NULL default '0',
  `mobile_verify` tinyint(1) NOT NULL default '0',
  `pid` int(11) default NULL,
  `user` char(20) default NULL,
  `password` char(32) default NULL,
  `name` varchar(30) default NULL,
  `sex` tinyint(1) default '1',
  `mobile` varchar(18) default NULL,
  `email` varchar(50) default NULL,
  `qq` varchar(50) default NULL,
  `provinceid` int(11) default NULL,
  `cityid` int(11) default NULL,
  `areaid` int(11) default NULL,
  `area` varchar(255) default NULL,
  `logo` varchar(120) default 'image/default/default_user_portrait.gif',
  `ip` char(15) default NULL,
  `point` int(10) default NULL,
  `statu` tinyint(1) default NULL,
  `regtime` datetime default NULL,
  `lastLoginTime` int(10) default NULL,
  `invite` varchar(50) default NULL,
  `grade` int(2) default '1',
  `update_date` int(10) default NULL,
  PRIMARY KEY  (`userid`),
  KEY `user` (`user`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_member_address`
--

CREATE TABLE `shopbuilder_member_address` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `provinceid` int(11) default NULL,
  `cityid` int(11) default NULL,
  `areaid` int(11) default NULL,
  `area` varchar(255) default NULL,
  `address` varchar(50) default NULL,
  `zip` varchar(10) default NULL,
  `tel` varchar(30) default NULL,
  `mobile` varchar(20) default NULL,
  `email` varchar(255) default NULL,
  `default` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_member_address`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_member_grade`
--

CREATE TABLE `shopbuilder_member_grade` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `demand` int(10) default '0' COMMENT '条件',
  `treatment` text COMMENT '权益',
  `blogo` varchar(255) default NULL COMMENT '大图',
  `logo` varchar(255) default NULL COMMENT 'LOGO',
  `valid` int(1) default '0' COMMENT '有效期',
  `sum` int(11) default '0' COMMENT '年费',
  `rate` float(3,1) default '0.0' COMMENT '折扣率',
  `create_time` int(10) default '0' COMMENT '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 导出表中的数据 `shopbuilder_member_grade`
--

INSERT INTO `shopbuilder_member_grade` (`id`, `name`, `demand`, `treatment`, `blogo`, `logo`, `valid`, `sum`, `rate`, `create_time`) VALUES
(1, '注册会员', 0, '<p>1.可以享受注册会员所能购买的产品及服务</p>\r\n<p>2.享受售后服务（退货、换货、维修）运费优惠</p>', 'image/grade/icon1.png_big.png', 'image/grade/icon1.png', 0, 0, 0.0, 1382066723),
(2, '铜牌会员', 1, '<p>2.可以享受铜牌会员所能购买的产品及服务</p>\r\n<p>3.享受售后服务（退货、换货、维修）运费优惠</p>', 'image/grade/icon2.png_big.png', 'image/grade/icon2.png', 0, 0, 99.9, 1382066888),
(3, '银牌会员', 2000, '<p>2.可以享受银牌会员所能购买的产品及服务</p>\r\n<p>3.享受售后服务（退货、换货、维修）运费优惠</p>', 'image/grade/icon3.png_big.png', 'image/grade/icon3.png', 1, 1000, 99.8, 1382067067),
(4, '金牌会员', 10000, '<p>2.可以享受金牌会员所能购买的产品及服务</p>\r\n<p>3.享受售后服务（退货、换货、维修）运费优惠</p>', 'image/grade/icon4.png_big.png', 'image/grade/icon4.png', 1, 4000, 98.0, 1382067113),
(5, '钻石会员', 30000, '<p>\r\n	2.可以享受钻石会员所能购买的产品及服务\r\n</p>\r\n<p>\r\n	3.享受售后服务（退货、换货、维修）运费优惠\r\n</p>', 'image/grade/icon5.png_big.png', 'image/grade/icon5.png', 1, 10000, 97.0, 1382067211);

-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_member_info`
--

CREATE TABLE `shopbuilder_member_info` (
  `member_id` int(11) NOT NULL,
  `blog` int(11) default '0' COMMENT '微博数量',
  `friend` int(11) default '0' COMMENT '好友数量',
  `fan` int(11) default '0' COMMENT '粉丝数量',
  `growth` int(11) default '0' COMMENT '成长值',
  `points` int(11) default '0',
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `shopbuilder_member_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_message`
--

CREATE TABLE `shopbuilder_message` (
  `id` int(8) NOT NULL auto_increment,
  `touserid` int(8) default NULL,
  `fromuserid` int(8) default NULL,
  `fromInfo` varchar(250) default '0',
  `msgtype` tinyint(1) default '1',
  `sub` varchar(50) default NULL,
  `con` text,
  `iflook` varchar(10) default NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `contype` tinyint(4) default NULL,
  `tid` varchar(50) default NULL,
  `receive_type` varchar(200) default NULL,
  `reply_by` int(11) default NULL,
  `attachments` varchar(50) default NULL,
  `is_save` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_nav_menu`
--

CREATE TABLE `shopbuilder_nav_menu` (
  `id` int(11) NOT NULL auto_increment,
  `sort` int(2) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `link_addr` varchar(100) default NULL,
  `type` int(1) NOT NULL,
  `statu` int(1) NOT NULL,
  `partent_menu_id` int(20) NOT NULL,
  `selected_flag` varchar(20) default '',
  `selected_flay` varchar(20) default NULL,
  `lang` varchar(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_nav_menu`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_news`
--

CREATE TABLE `shopbuilder_news` (
  `nid` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '1' COMMENT '类别ID',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `ftitle` varchar(120) NOT NULL COMMENT '副标题',
  `keyboard` varchar(100) NOT NULL COMMENT '关键字',
  `titleurl` varchar(200) NOT NULL default '0' COMMENT '外部链接',
  `isrec` tinyint(1) NOT NULL default '0' COMMENT '是否推荐 0否1是',
  `istop` tinyint(1) NOT NULL default '0' COMMENT '是否头条 0否1是',
  `ispass` tinyint(1) NOT NULL default '0' COMMENT '是否审批 0否1是',
  `firsttitle` tinyint(1) NOT NULL default '0' COMMENT '置顶',
  `onclick` int(11) NOT NULL default '0' COMMENT '点击率',
  `titlefont` varchar(100) NOT NULL COMMENT '标题样式',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `uptime` int(12) NOT NULL COMMENT '新闻发布时间',
  `smalltext` varchar(255) NOT NULL COMMENT '内容简介',
  `writer` varchar(50) NOT NULL COMMENT '作者',
  `source` varchar(100) NOT NULL COMMENT '来源',
  `titlepic` varchar(200) NOT NULL COMMENT '标题图片',
  `ispic` tinyint(1) NOT NULL default '0' COMMENT '有无图片 0否1有',
  `isgid` tinyint(1) NOT NULL default '0' COMMENT '阅读权限 0游客',
  `ispl` tinyint(1) NOT NULL COMMENT '是否关闭评论 1关',
  `userfen` smallint(6) NOT NULL COMMENT '查看扣除点数',
  `newstempid` varchar(40) NOT NULL COMMENT '内容模板',
  `pagenum` int(11) NOT NULL default '0' COMMENT '分页',
  `lastedittime` int(12) NOT NULL,
  `vote` char(255) NOT NULL default '0',
  `special` char(255) NOT NULL default '0',
  `imgs_url` text NOT NULL,
  `videos_url` text NOT NULL,
  `admin` varchar(50) default NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_news`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_newscat`
--

CREATE TABLE `shopbuilder_newscat` (
  `catid` int(6) NOT NULL auto_increment,
  `cat` char(100) default NULL,
  `nums` int(10) default NULL,
  `pid` int(6) default '0',
  `ishome` int(1) default NULL,
  `template` varchar(50) default NULL,
  `pic` varchar(100) default NULL,
  `openpost` tinyint(1) default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_newscat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_news_data`
--

CREATE TABLE `shopbuilder_news_data` (
  `nid` int(11) NOT NULL,
  `con` mediumtext NOT NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `shopbuilder_news_data`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_order`
--

CREATE TABLE `shopbuilder_order` (
  `id` int(20) NOT NULL auto_increment,
  `member_id` int(11) unsigned default NULL,
  `order_id` varchar(15) default NULL,
  `seller_id` int(11) unsigned default NULL,
  `status` tinyint(1) default '1',
  `pay_status` tinyint(1) default '1',
  `ship_status` tinyint(1) default '1',
  `create_time` int(10) unsigned default NULL,
  `ship_time` int(10) unsigned default NULL,
  `pay_time` int(10) unsigned default NULL,
  `finished_time` int(10) unsigned default NULL,
  `invoice_id` int(11) default '0',
  `payment_id` smallint(4) default '0',
  `payment_name` varchar(100) default NULL,
  `shipping_id` mediumint(8) default '0',
  `shipping_name` varchar(100) default NULL,
  `ship_name` varchar(50) default NULL,
  `ship_addr` varchar(255) default NULL,
  `ship_tel` varchar(30) default NULL,
  `ship_mobile` varchar(15) default NULL,
  `ship_zip` varchar(6) default NULL,
  `shipping_no` varchar(50) default NULL,
  `des` varchar(200) default NULL,
  `cost` decimal(20,2) default '0.00',
  `freight` decimal(20,2) default '0.00',
  `weight` decimal(20,2) default '0.00',
  `is_comment` enum('true','false') default 'false',
  `admin_remark` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_order_delivery`
--

CREATE TABLE `shopbuilder_order_delivery` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `order_id` varchar(15) default NULL,
  `member_id` mediumint(8) unsigned default NULL,
  `money` decimal(20,2) NOT NULL default '0.00',
  `shipping_id` varchar(50) default NULL,
  `shipping_name` varchar(100) default NULL,
  `shipping_no` varchar(50) default NULL,
  `ship_name` varchar(50) default NULL,
  `ship_addr` varchar(100) default NULL,
  `ship_zip` varchar(20) default NULL,
  `ship_tel` varchar(30) default NULL,
  `ship_mobile` varchar(50) default NULL,
  `start_time` int(10) unsigned default NULL,
  `end_time` int(10) unsigned default NULL,
  `status` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_order_delivery`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_order_log`
--

CREATE TABLE `shopbuilder_order_log` (
  `id` int(20) NOT NULL auto_increment,
  `order_id` varchar(15) default NULL,
  `admin_id` smallint(5) default NULL,
  `admin_name` varchar(30) default NULL,
  `text` longtext,
  `create_time` int(10) unsigned default NULL,
  `behavior` varchar(20) default '',
  `result` enum('success','failure') default 'success',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_order_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_order_payment`
--

CREATE TABLE `shopbuilder_order_payment` (
  `id` int(20) NOT NULL auto_increment,
  `order_id` varchar(15) default NULL,
  `member_id` mediumint(8) unsigned default NULL,
  `money` decimal(20,2) NOT NULL default '0.00',
  `payment_type` enum('online','offline') default 'online',
  `payment_id` smallint(4) default '0',
  `payment_name` varchar(100) default NULL,
  `ip` varchar(20) default NULL,
  `start_time` int(10) unsigned default NULL,
  `end_time` int(10) unsigned default NULL,
  `status` tinyint(1) default '1',
  `trade_no` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_order_payment`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_order_product`
--

CREATE TABLE `shopbuilder_order_product` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `order_id` varchar(15) default NULL,
  `buyer_id` int(11) unsigned NOT NULL,
  `pid` int(11) unsigned default NULL COMMENT '产品ID',
  `pcatid` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '产品名',
  `pic` varchar(100) NOT NULL COMMENT '产品图片',
  `price` float unsigned default NULL,
  `num` int(5) unsigned default NULL,
  `time` int(11) unsigned default NULL,
  `product_give` text NOT NULL,
  `service` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_order_product`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_page_rec`
--

CREATE TABLE `shopbuilder_page_rec` (
  `id` int(11) NOT NULL auto_increment,
  `totalurl` int(10) default NULL COMMENT '前一天url总数',
  `mostpopularurl` varchar(100) default NULL,
  `pageviews` int(10) default NULL COMMENT '前一天的PV数',
  `totalip` int(10) default '0' COMMENT '前一天ip总数',
  `visitusernum` int(10) default '0' COMMENT '前一天上线的会员数',
  `reguser` int(10) default '0' COMMENT '前一天新注册会员数',
  `pronum` int(10) default '0' COMMENT '前一天发布产品数',
  `newsnum` int(10) default '0' COMMENT '前一天发布资讯数',
  `exhibnum` int(10) default '0',
  `time` datetime default NULL COMMENT '时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_page_rec`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_page_view`
--

CREATE TABLE `shopbuilder_page_view` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(200) default NULL,
  `ip` char(20) default NULL,
  `time` datetime default NULL,
  `username` char(20) default '',
  `fileName` char(30) default NULL,
  PRIMARY KEY  (`id`),
  KEY `ip` (`ip`),
  KEY `username` (`username`),
  KEY `url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_page_view`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_payment_banks`
--

CREATE TABLE `shopbuilder_payment_banks` (
  `id` int(8) NOT NULL auto_increment,
  `pay_uid` int(8) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `bank_addr` varchar(200) default NULL,
  `accounts` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL default '0',
  `add_time` int(11) NOT NULL,
  `censor` varchar(50) default NULL,
  `check_time` int(11) default NULL,
  `testing_cash` decimal(10,2) default NULL,
  `master` varchar(225) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_payment_banks`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_payment_card`
--

CREATE TABLE `shopbuilder_payment_card` (
  `id` int(11) NOT NULL auto_increment,
  `card_num` varchar(30) NOT NULL,
  `total_price` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `statu` tinyint(4) NOT NULL,
  `use_name` varchar(20) default NULL,
  `creat_time` int(10) unsigned NOT NULL,
  `stime` int(10) unsigned default NULL,
  `etime` int(10) unsigned default NULL,
  `pic` varchar(80) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_payment_card`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_payment_cashflow`
--

CREATE TABLE `shopbuilder_payment_cashflow` (
  `id` int(10) NOT NULL auto_increment,
  `pay_uid` int(11) default NULL,
  `buyer_email` varchar(50) default NULL COMMENT '买家账号',
  `seller_email` varchar(50) default NULL COMMENT '卖家账号',
  `price` decimal(10,2) default NULL,
  `flow_id` varchar(50) default NULL COMMENT '流水账号',
  `order_id` varchar(15) default NULL COMMENT '外部订单号',
  `note` varchar(255) default NULL,
  `censor` varchar(50) default NULL,
  `time` int(11) unsigned default NULL,
  `statu` tinyint(1) default NULL COMMENT '0取消,1待处理,2已付款,3.发货中,4.成功,5.退货中,6.退货成功',
  `return_url` varchar(200) default NULL,
  `notify_url` varchar(200) default NULL,
  `extra_param` varchar(100) default NULL,
  `type` tinyint(1) unsigned default NULL,
  `display` tinyint(1) unsigned default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_payment_cashflow`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_payment_cashpickup`
--

CREATE TABLE `shopbuilder_payment_cashpickup` (
  `id` int(10) NOT NULL auto_increment,
  `pay_uid` int(8) NOT NULL,
  `cashflowid` varchar(50) default NULL,
  `amount` decimal(10,2) NOT NULL,
  `add_time` int(11) NOT NULL,
  `censor` varchar(50) default NULL,
  `check_time` int(11) default NULL,
  `is_succeed` tinyint(1) default '0',
  `bankflow` varchar(50) default NULL,
  `con` text,
  `bank_id` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_payment_cashpickup`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_payment_type`
--

CREATE TABLE `shopbuilder_payment_type` (
  `payment_id` tinyint(3) NOT NULL auto_increment,
  `payment_type` varchar(20) default NULL,
  `payment_name` varchar(100) default NULL,
  `payment_commission` varchar(8) default '0',
  `payment_desc` text,
  `payment_config` text,
  `active` tinyint(1) default '0',
  `nums` tinyint(3) default '0',
  PRIMARY KEY  (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_payment_type`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_payment_user`
--

CREATE TABLE `shopbuilder_payment_user` (
  `pay_uid` int(11) unsigned NOT NULL auto_increment COMMENT '支付用户ID号',
  `userid` int(11) unsigned default NULL COMMENT '网站会员ID',
  `name` varchar(30) default NULL,
  `email` varchar(30) default NULL,
  `login_pass` varchar(32) default NULL,
  `pay_pass` varchar(32) default NULL,
  `tell` varchar(30) default NULL,
  `mobile` varchar(30) default NULL,
  `cash` decimal(10,2) default '0.00',
  `unreachable` decimal(10,2) default '0.00',
  `time` int(10) unsigned default NULL,
  PRIMARY KEY  (`pay_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_payment_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_points`
--

CREATE TABLE `shopbuilder_points` (
  `id` int(8) NOT NULL auto_increment,
  `points` varchar(200) NOT NULL,
  `img` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_points`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_points_cat`
--

CREATE TABLE `shopbuilder_points_cat` (
  `id` int(6) NOT NULL auto_increment,
  `catname` varchar(30) NOT NULL COMMENT '类别名称',
  `parent_id` int(6) default '0',
  `displayorder` smallint(8) NOT NULL default '255' COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='礼品分类表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_points_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_points_goods`
--

CREATE TABLE `shopbuilder_points_goods` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL COMMENT '商品名称',
  `catid` int(6) default '0',
  `price` decimal(10,2) NOT NULL default '0.00' COMMENT '商品原价',
  `points` int(11) NOT NULL COMMENT '兑换所需积分',
  `pic` varchar(100) NOT NULL COMMENT 'Logo',
  `sku` varchar(50) NOT NULL COMMENT '货号',
  `stock` int(11) NOT NULL default '0' COMMENT '库存数',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `content` text COMMENT '详细内容',
  `sell_amount` int(11) NOT NULL default '0' COMMENT '售出数量',
  `hits` int(11) NOT NULL default '0' COMMENT '浏览次数',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分商品表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_points_goods`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_points_log`
--

CREATE TABLE `shopbuilder_points_log` (
  `id` int(11) NOT NULL auto_increment COMMENT '积分日志编号',
  `member_id` int(11) default NULL COMMENT '会员编号',
  `member_name` varchar(100) default NULL COMMENT '会员名称',
  `points` int(11) default '0' COMMENT '积分数负数表示扣除',
  `create_time` int(11) default NULL COMMENT '添加时间',
  `desc` varchar(255) default NULL COMMENT '操作描述',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员积分日志表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_points_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_points_order`
--

CREATE TABLE `shopbuilder_points_order` (
  `id` int(11) NOT NULL auto_increment COMMENT '兑换订单编号',
  `order_id` varchar(100) NOT NULL COMMENT '兑换订单编号',
  `buyer_id` int(11) NOT NULL COMMENT '兑换会员id',
  `buyer_name` varchar(50) NOT NULL COMMENT '兑换会员姓名',
  `product_id` int(6) default NULL,
  `product_name` varchar(255) default NULL,
  `pic` varchar(255) default NULL,
  `contact` varchar(30) default NULL,
  `address` varchar(200) default NULL,
  `tel` varchar(20) default NULL,
  `create_time` int(11) NOT NULL COMMENT '兑换订单生成时间',
  `shipping_time` int(11) default NULL COMMENT '发货时间',
  `finnshed_time` int(11) default NULL COMMENT '订单完成时间',
  `allpoint` int(11) NOT NULL default '0' COMMENT '兑换总积分',
  `status` int(11) NOT NULL default '10' COMMENT '订单状态：10(默认):待确定;20:已发货;30已完成;0已取消',
  `shipping_name` varchar(50) default NULL,
  `shipping_address` varchar(255) default NULL,
  `shipping_tel` varchar(20) default NULL,
  `shipping_company` varchar(50) default NULL,
  `shipping_code` varchar(50) default NULL,
  `admin_remark` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兑换订单表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_points_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_products`
--

CREATE TABLE `shopbuilder_products` (
  `id` int(6) NOT NULL auto_increment,
  `userid` int(6) default NULL,
  `user` varchar(30) default NULL,
  `catid` int(6) default NULL,
  `ptype` int(1) default '0',
  `pname` varchar(100) default NULL,
  `ftitle` varchar(255) default NULL,
  `promotion_tips` varchar(255) default NULL,
  `keywords` varchar(100) default NULL,
  `brand` varchar(60) default NULL,
  `market_price` float(10,2) default NULL,
  `price` float(10,2) default '0.00',
  `cost_price` float(10,2) default '0.00',
  `member_price` tinyint(1) default '0',
  `pic_more` text,
  `amount` int(6) default '1',
  `sell_amount` int(5) default '0',
  `code` varchar(50) default NULL,
  `pic` varchar(200) default NULL,
  `weight` int(8) unsigned default NULL,
  `cubage` float(8,2) default '0.00',
  `freight` smallint(6) unsigned default NULL,
  `freight_type` tinyint(1) unsigned default NULL,
  `post_price` float unsigned default NULL,
  `express_price` float unsigned default NULL,
  `ems_price` float unsigned default NULL,
  `province` int(11) default NULL,
  `city` int(11) default NULL,
  `areaid` int(11) default NULL,
  `area` varchar(255) NOT NULL,
  `read_nums` int(6) default '0',
  `rank` int(5) default '0',
  `uptime` datetime default NULL,
  `statu` varchar(255) NOT NULL default '0',
  `custom_cat_id` int(10) default NULL,
  `promotion_id` int(11) default '0',
  `point` int(6) default NULL,
  `goodbad` int(6) default NULL,
  `service` text,
  `product_related` text,
  `product_give` text,
  `product_parts` text,
  `rebate` float(10,2) default '0.00',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `catid` (`catid`,`pname`),
  KEY `pname` (`pname`),
  KEY `keywords` (`keywords`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_products`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_cart`
--

CREATE TABLE `shopbuilder_product_cart` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `parent_id` int(11) default '0',
  `userid` int(11) unsigned default NULL,
  `pid` int(11) unsigned default NULL,
  `sell_userid` int(11) unsigned default NULL,
  `price` float unsigned default NULL,
  `num` int(5) unsigned default NULL,
  `time` int(11) unsigned default NULL,
  `setmeal` int(11) NOT NULL default '0',
  `code` varchar(255) default NULL,
  `service` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_cart`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_cat`
--

CREATE TABLE `shopbuilder_product_cat` (
  `catid` int(9) NOT NULL auto_increment,
  `cat` varchar(50) default NULL,
  `title` text,
  `keyword` text,
  `description` text,
  `nums` int(6) default NULL,
  `isindex` tinyint(1) default '0',
  `char_index` char(1) default NULL,
  `all_char` varchar(50) default NULL,
  `pic` varchar(150) default NULL,
  `brand` text,
  `rec_nums` int(10) default '0',
  `isbuy` tinyint(1) default NULL,
  `ext_table` varchar(30) default NULL,
  `ext_field_cat` int(11) default NULL,
  `is_setmeal` tinyint(1) unsigned default '0',
  `commission` float unsigned default '0',
  `service` text,
  `current` varchar(100) default NULL,
  `templates` varchar(100) default NULL,
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_comment`
--

CREATE TABLE `shopbuilder_product_comment` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `user` char(20) NOT NULL,
  `fromid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `puid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` float(30,0) NOT NULL,
  `con` text NOT NULL,
  `uptime` int(12) NOT NULL,
  `goodbad` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_consult`
--

CREATE TABLE `shopbuilder_product_consult` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) default '0',
  `product_id` int(11) default NULL,
  `product_name` varchar(255) default NULL,
  `member_id` int(11) default '0',
  `member_name` varchar(255) default NULL,
  `question` varchar(255) default NULL,
  `answer` varchar(255) default NULL,
  `answer_id` int(11) default '0',
  `question_time` int(10) default NULL,
  `answer_time` int(10) default NULL,
  `status` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_consult`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_consult_cat`
--

CREATE TABLE `shopbuilder_product_consult_cat` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `type` tinyint(1) default '0',
  `con` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_consult_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_detail`
--

CREATE TABLE `shopbuilder_product_detail` (
  `userid` int(11) default NULL,
  `proid` int(11) default NULL,
  `detail` text,
  `after_service` text,
  KEY `proid` (`proid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `shopbuilder_product_detail`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_invoice`
--

CREATE TABLE `shopbuilder_product_invoice` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL default '0' COMMENT '发票类型',
  `rise` tinyint(1) NOT NULL default '0' COMMENT '发票抬头',
  `content` tinyint(1) NOT NULL default '0' COMMENT '发票内容',
  `company` varchar(50) default NULL COMMENT '单位名称',
  `number` varchar(30) default NULL COMMENT '纳税人识别号',
  `address` varchar(30) default NULL COMMENT '注册地址',
  `telephone` varchar(30) default NULL COMMENT '注册电话',
  `bank` varchar(30) default NULL COMMENT '开户银行',
  `account` varchar(20) default NULL COMMENT '银行帐户',
  `checked` tinyint(1) NOT NULL default '0',
  `default` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_invoice`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_report`
--

CREATE TABLE `shopbuilder_product_report` (
  `id` int(11) NOT NULL auto_increment COMMENT '举报id',
  `userid` int(11) NOT NULL COMMENT '举报人id',
  `user` varchar(50) NOT NULL COMMENT '举报人会员名',
  `pid` int(11) NOT NULL COMMENT '被举报的商品id',
  `pname` varchar(100) NOT NULL COMMENT '被举报的商品名称',
  `subject_id` int(11) NOT NULL COMMENT '举报主题id',
  `subject_name` varchar(50) NOT NULL COMMENT '举报主题',
  `content` varchar(100) NOT NULL COMMENT '举报信息',
  `pic` varchar(100) NOT NULL COMMENT '图片1',
  `datetime` int(11) NOT NULL COMMENT '举报时间',
  `shop_id` int(11) NOT NULL COMMENT '被举报商品的店铺id',
  `state` tinyint(1) NOT NULL COMMENT '举报状态(1未处理/2已处理)',
  `handle_type` tinyint(1) NOT NULL COMMENT '举报处理结果(1无效举报/2恶意举报/3有效举报)',
  `handle_message` varchar(100) NOT NULL COMMENT '举报处理信息',
  `handle_datetime` int(11) NOT NULL default '0' COMMENT '举报处理时间',
  `handle_user` varchar(50) NOT NULL default '0' COMMENT '管理员',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='举报表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_report`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_report_subject`
--

CREATE TABLE `shopbuilder_product_report_subject` (
  `id` int(11) NOT NULL auto_increment COMMENT '举报主题id',
  `content` varchar(100) default NULL COMMENT '举报主题内容',
  `type_id` int(11) NOT NULL default '0' COMMENT '举报类型id',
  `type_name` varchar(50) NOT NULL COMMENT '举报类型名称 ',
  `desc` varchar(100) default NULL COMMENT '举报类型描述',
  `state` tinyint(1) NOT NULL default '0' COMMENT '举报主题状态(1可用/0失效)',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='举报主题表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_report_subject`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_service`
--

CREATE TABLE `shopbuilder_product_service` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `price` float(10,2) NOT NULL default '0.00',
  `type` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_service`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_setmeal`
--

CREATE TABLE `shopbuilder_product_setmeal` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `catid` int(8) default NULL,
  `sku` varchar(60) default '0',
  `pname` varchar(100) NOT NULL,
  `promotion_tips` varchar(255) default NULL,
  `setmeal` varchar(60) default NULL,
  `price` decimal(10,2) NOT NULL default '0.00',
  `market_price` float(10,2) default '0.00',
  `cost_price` float(10,2) default '0.00',
  `member_price` tinyint(1) default '0',
  `stock` int(11) NOT NULL default '0',
  `brand` varchar(60) default NULL,
  `pic` varchar(255) default NULL,
  `sell_amount` int(6) default '0',
  `province` int(11) default NULL,
  `city` int(6) default NULL,
  `areaid` int(6) default NULL,
  `area` varchar(255) default NULL,
  `uptime` int(10) unsigned default NULL,
  `rank` int(5) default '0',
  `statu` varchar(255) default '0',
  `property_value_id` text,
  `goodbad` int(10) default '0',
  PRIMARY KEY  (`id`),
  KEY `goods_id` (`pid`),
  KEY `price` (`price`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_setmeal`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_product_tag`
--

CREATE TABLE `shopbuilder_product_tag` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `logo` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_product_tag`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_property`
--

CREATE TABLE `shopbuilder_property` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_property`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_property_value`
--

CREATE TABLE `shopbuilder_property_value` (
  `id` int(6) NOT NULL auto_increment,
  `field` varchar(100) default NULL COMMENT '字段数据库字段名',
  `field_name` varchar(200) default NULL COMMENT '字段名称',
  `field_desc` varchar(100) default NULL COMMENT '字段描述',
  `display_type` int(1) default NULL COMMENT '前台显示类型（单行文本框，多行文件框等）',
  `item` text COMMENT '选项列表',
  `is_search` tinyint(1) default '0' COMMENT '是否被搜索',
  `property_id` int(11) default NULL COMMENT '属性ID',
  `statu` tinyint(1) default '1',
  `type` tinyint(1) default '1',
  `template_id` int(6) default '0',
  `displayorder` smallint(6) default '255',
  PRIMARY KEY  (`id`),
  KEY `catid` (`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员自定义字段表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_property_value`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_property_value_template`
--

CREATE TABLE `shopbuilder_property_value_template` (
  `id` int(6) NOT NULL auto_increment,
  `field` varchar(100) default NULL COMMENT '字段数据库字段名',
  `field_name` varchar(200) default NULL COMMENT '字段名称',
  `field_desc` varchar(100) default NULL COMMENT '字段描述',
  `display_type` int(1) default NULL COMMENT '前台显示类型（单行文本框，多行文件框等）',
  `item` varchar(300) default NULL COMMENT '选项列表',
  `is_search` tinyint(1) default '0' COMMENT '是否被搜索',
  `statu` tinyint(1) default '1',
  `type` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员自定义字段表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_property_value_template`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_reg_vercode`
--

CREATE TABLE `shopbuilder_reg_vercode` (
  `id` int(11) NOT NULL auto_increment,
  `question` varchar(50) default NULL,
  `answer` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_reg_vercode`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_reserve_username`
--

CREATE TABLE `shopbuilder_reserve_username` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_reserve_username`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_return`
--

CREATE TABLE `shopbuilder_return` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '退货记录ID',
  `oid` varchar(15) NOT NULL COMMENT '订单',
  `return_code` varchar(100) NOT NULL COMMENT '退货编号',
  `seller_id` int(10) unsigned NOT NULL COMMENT '卖家ID',
  `seller_name` varchar(20) NOT NULL COMMENT '店铺名称',
  `buyer_id` int(10) unsigned NOT NULL COMMENT '买家ID',
  `buyer_name` varchar(50) NOT NULL COMMENT '买家会员名',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `message` varchar(300) default NULL COMMENT '退货备注',
  `return_addr_id` int(11) NOT NULL,
  `return_addr_name` varchar(30) NOT NULL,
  `return_addr` varchar(150) NOT NULL,
  `return_post` int(6) NOT NULL,
  `return_tel` varchar(20) default NULL,
  `return_mobile` varchar(20) default NULL,
  `statu` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退货表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_return`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_return_goods`
--

CREATE TABLE `shopbuilder_return_goods` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '退货商品记录ID',
  `rid` int(10) unsigned NOT NULL COMMENT '退货记录ID',
  `oid` varchar(15) NOT NULL COMMENT '订单ID',
  `pid` int(10) unsigned NOT NULL COMMENT '商品ID',
  `pname` varchar(100) NOT NULL COMMENT '商品名称',
  `price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `returnnum` int(10) unsigned NOT NULL COMMENT '退货数量',
  `pic` varchar(100) default NULL COMMENT '商品图片',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退货商品表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_return_goods`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_search_word`
--

CREATE TABLE `shopbuilder_search_word` (
  `id` int(11) NOT NULL auto_increment,
  `keyword` varchar(80) default NULL,
  `char_index` varchar(80) default NULL,
  `nums` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_search_word`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_session`
--

CREATE TABLE `shopbuilder_session` (
  `sesskey` char(32) NOT NULL,
  `expiry` int(11) unsigned NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`sesskey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `shopbuilder_session`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_shop`
--

CREATE TABLE `shopbuilder_shop` (
  `shopid` int(8) NOT NULL default '0' COMMENT 'ID',
  `user` varchar(30) default NULL COMMENT '会员ID',
  `catid` char(10) default NULL COMMENT '分类ID',
  `shop_name` char(60) default NULL COMMENT '店铺名称',
  `tel` varchar(30) default NULL COMMENT '联系电话',
  `main_pro` varchar(100) default NULL COMMENT '主营产品',
  `template` varchar(20) default NULL COMMENT '店铺模板',
  `shop_collect` int(10) NOT NULL default '0' COMMENT '店铺收藏数量',
  `shop_auth` tinyint(1) default '0' COMMENT '店铺认证',
  `shopkeeper_auth` tinyint(1) default '0' COMMENT '店主认证',
  `shop_auth_pic` varchar(100) default NULL COMMENT '店铺认证图片',
  `shopkeeper_auth_pic` varchar(100) default NULL COMMENT '店主认证图片',
  `domin` varchar(255) default NULL COMMENT '顶级域名',
  KEY `company` (`shop_name`),
  KEY `userid` (`shopid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺表';

--
-- 导出表中的数据 `shopbuilder_shop`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_shop_cat`
--

CREATE TABLE `shopbuilder_shop_cat` (
  `id` int(9) NOT NULL auto_increment COMMENT 'ID',
  `name` varchar(100) NOT NULL COMMENT '分类名',
  `parent_id` int(9) NOT NULL default '0' COMMENT '父类I',
  `displayorder` smallint(6) NOT NULL default '255' COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺分类表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_shop_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_sns`
--

CREATE TABLE `shopbuilder_sns` (
  `id` int(11) NOT NULL auto_increment COMMENT '自增ID',
  `original_id` int(11) NOT NULL default '0' COMMENT '原动态ID 默认为0',
  `original_member_id` int(11) NOT NULL default '0' COMMENT '原帖会员编号',
  `original_status` tinyint(1) NOT NULL default '0' COMMENT '原帖的删除状态 0为正常 1为删除',
  `member_id` int(11) NOT NULL COMMENT '会员ID',
  `member_name` varchar(100) NOT NULL COMMENT '会员名称',
  `member_img` varchar(100) default NULL COMMENT '会员头像',
  `title` varchar(500) default NULL COMMENT '动态标题',
  `content` text NOT NULL COMMENT '动态内容',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态  0正常 1为禁止显示 默认为0',
  `privacy` tinyint(1) NOT NULL default '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',
  `comment_count` int(11) NOT NULL default '0' COMMENT '评论数',
  `copy_count` int(11) NOT NULL default '0' COMMENT '转发数',
  `original_comment_count` int(11) NOT NULL default '0' COMMENT '原帖评论次数',
  `original_copy_count` int(11) NOT NULL default '0' COMMENT '原帖转帖次数',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='动态信息表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_sns`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_sns_comment`
--

CREATE TABLE `shopbuilder_sns_comment` (
  `id` int(11) NOT NULL auto_increment COMMENT '自增ID',
  `member_id` int(11) NOT NULL COMMENT '会员ID',
  `member_name` varchar(100) NOT NULL COMMENT '会员名称',
  `original_id` int(11) NOT NULL COMMENT '原帖ID',
  `content` varchar(500) NOT NULL COMMENT '评论内容',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `state` tinyint(1) NOT NULL default '0' COMMENT '状态 0正常 1屏蔽',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_sns_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_sns_friend`
--

CREATE TABLE `shopbuilder_sns_friend` (
  `id` int(11) NOT NULL auto_increment COMMENT 'id值',
  `uid` int(11) NOT NULL COMMENT '会员id',
  `uname` varchar(100) default NULL COMMENT '会员名称',
  `uimg` varchar(100) default NULL COMMENT '会员头像',
  `fuid` int(11) NOT NULL COMMENT '朋友id',
  `funame` varchar(100) NOT NULL COMMENT '好友会员名称',
  `fuimg` varchar(100) default NULL COMMENT '朋友头像',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `state` tinyint(1) NOT NULL default '1' COMMENT '关注状态 1为单方关注 2为双方关注',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='好友表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_sns_friend`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_sns_shareproduct`
--

CREATE TABLE `shopbuilder_sns_shareproduct` (
  `id` int(11) NOT NULL auto_increment COMMENT '自增ID',
  `pid` int(11) NOT NULL COMMENT '商品ID',
  `uid` int(11) NOT NULL COMMENT '所属会员ID',
  `uname` varchar(100) NOT NULL COMMENT '会员名称',
  `content` varchar(500) default NULL COMMENT '描述内容',
  `addtime` int(11) NOT NULL COMMENT '分享操作时间',
  `likeaddtime` int(11) NOT NULL default '0' COMMENT '喜欢操作时间',
  `privacy` tinyint(1) NOT NULL default '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',
  `commentcount` int(11) NOT NULL default '0' COMMENT '评论数',
  `isshare` tinyint(1) NOT NULL default '0' COMMENT '是否分享 0为未分享 1为分享',
  `islike` tinyint(1) NOT NULL default '0' COMMENT '是否喜欢 0为未喜欢 1为喜欢',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享商品表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_sns_shareproduct`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_sns_shareproduct_info`
--

CREATE TABLE `shopbuilder_sns_shareproduct_info` (
  `pid` int(11) NOT NULL COMMENT '商品ID',
  `pname` varchar(100) NOT NULL COMMENT '商品名称',
  `image` varchar(100) default NULL COMMENT '商品图片',
  `price` decimal(10,2) NOT NULL default '0.00' COMMENT '商品价格',
  `shopid` int(11) NOT NULL COMMENT '店铺ID',
  `uname` varchar(100) NOT NULL COMMENT '会员名称',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `likenum` int(11) NOT NULL default '0' COMMENT '喜欢数',
  `likemember` text COMMENT '喜欢过的会员ID，用逗号分隔',
  `collectnum` int(11) NOT NULL default '0' COMMENT '收藏数',
  UNIQUE KEY `snsgoods_goodsid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享商品信息表';

--
-- 导出表中的数据 `shopbuilder_sns_shareproduct_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_stop_ip`
--

CREATE TABLE `shopbuilder_stop_ip` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(25) NOT NULL,
  `reason` varchar(50) default '',
  `optime` int(12) unsigned default NULL,
  `stoptime` int(12) unsigned default NULL,
  `autorelease` int(1) default NULL,
  `statu` tinyint(1) NOT NULL default '1',
  `type` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_stop_ip`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_sub_domain`
--

CREATE TABLE `shopbuilder_sub_domain` (
  `id` int(4) NOT NULL auto_increment,
  `dtype` int(1) NOT NULL,
  `domain` varchar(20) NOT NULL,
  `con` varchar(30) NOT NULL,
  `con2` varchar(20) default NULL,
  `con3` varchar(20) default NULL,
  `des` text,
  `isopen` int(1) default '1',
  `logo` varchar(100) default NULL,
  `web_title` varchar(100) default NULL,
  `web_keyword` varchar(100) default NULL,
  `web_des` varchar(100) default NULL,
  `copyright` text,
  `template` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_sub_domain`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_tags`
--

CREATE TABLE `shopbuilder_tags` (
  `tagname` varchar(100) NOT NULL,
  `closed` tinyint(1) NOT NULL default '0',
  `total` mediumint(20) unsigned NOT NULL,
  `statu` tinyint(4) NOT NULL COMMENT '0/1  1表示已导入',
  PRIMARY KEY  (`tagname`),
  KEY `total` (`total`),
  KEY `closed` (`closed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `shopbuilder_tags`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_talk`
--

CREATE TABLE `shopbuilder_talk` (
  `id` int(11) NOT NULL auto_increment COMMENT '对话id',
  `oid` varchar(15) NOT NULL COMMENT '投诉id',
  `uid` int(11) NOT NULL COMMENT '发言人id',
  `uname` varchar(50) NOT NULL COMMENT '发言人名称',
  `utype` varchar(10) NOT NULL COMMENT '发言人类型(1-买家/2-卖家)',
  `content` varchar(255) NOT NULL COMMENT '发言内容',
  `add_time` int(11) NOT NULL COMMENT '对话发表时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='对话表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_talk`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_tg`
--

CREATE TABLE `shopbuilder_tg` (
  `id` int(8) NOT NULL auto_increment,
  `catid` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `market_price` float(10,2) NOT NULL default '0.00',
  `price` float(10,2) unsigned NOT NULL default '0.00',
  `hits` int(6) NOT NULL default '0',
  `sell_amount` int(6) NOT NULL default '0',
  `limit_quantity` int(6) NOT NULL default '0',
  `virtual_quantity` int(6) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `create_time` int(10) unsigned NOT NULL,
  `stock` int(10) NOT NULL default '1',
  `provinceid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `areaid` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `displayorder` smallint(6) NOT NULL default '255',
  ` is_virtual` enum('true','false') default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_tg`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_tg_cat`
--

CREATE TABLE `shopbuilder_tg_cat` (
  `id` int(6) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0' COMMENT '父类id',
  `catname` varchar(30) NOT NULL COMMENT '类别名称',
  `displayorder` smallint(8) NOT NULL default '255' COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购产品分类表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_tg_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_tg_order`
--

CREATE TABLE `shopbuilder_tg_order` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` varchar(15) NOT NULL COMMENT '订单号',
  `member_id` int(11) default NULL,
  `member_name` varchar(50) NOT NULL,
  `tg_id` int(11) NOT NULL COMMENT '订购产品id',
  `tg_name` varchar(80) NOT NULL COMMENT '订购产品名',
  `tg_pic` varchar(80) default NULL COMMENT '订购产品图片',
  `contact` varchar(30) default NULL,
  `address` varchar(200) default NULL,
  `tel` varchar(20) default NULL,
  `remark` varchar(200) default NULL,
  `admin_remark` varchar(200) default NULL COMMENT '管理员备注',
  `price` decimal(10,2) default '0.00',
  `quantity` varchar(10) NOT NULL,
  `create_time` int(10) default NULL,
  `payment_time` int(10) default NULL,
  `shipping_time` int(10) default NULL,
  `finished_time` int(10) default NULL,
  `status` tinyint(2) default '20',
  `shipping_name` varchar(50) default NULL COMMENT '发货人',
  `shipping_address` varchar(255) default NULL COMMENT '发货地址',
  `shipping_tel` varchar(20) default NULL COMMENT '联系电话',
  `shipping_company` varchar(50) default NULL COMMENT '物流名称',
  `shipping_code` varchar(50) default NULL COMMENT '物流单号',
  `is_virtual` enum('true','false') default 'false',
  `code` varchar(20) default NULL,
  `company_id` int(6) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购订单表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_tg_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_user_connected`
--

CREATE TABLE `shopbuilder_user_connected` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned default NULL,
  `nickname` varchar(50) default NULL,
  `figureurl` varchar(100) default NULL,
  `gender` varchar(10) default NULL,
  `vip` tinyint(1) unsigned default '0',
  `level` tinyint(1) unsigned default '0',
  `type` tinyint(1) default '1',
  `access_token` varchar(80) default NULL,
  `client_id` varchar(80) default NULL,
  `openid` varchar(80) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_user_connected`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_user_group`
--

CREATE TABLE `shopbuilder_user_group` (
  `group_id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL COMMENT '会员组名',
  `des` text COMMENT '会员组描述',
  `con` text,
  `logo` varchar(100) default NULL COMMENT '会员组ＬＯＧＯ',
  `minilogo` varchar(200) default NULL,
  `statu` tinyint(4) default '1' COMMENT '会员组状态 0,1',
  `creat_time` date default NULL COMMENT '创建时间',
  `groupfee` float default '0',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_user_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_user_read_rec`
--

CREATE TABLE `shopbuilder_user_read_rec` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) default NULL,
  `tid` int(11) default NULL,
  `type` int(1) default NULL,
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`,`tid`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `shopbuilder_user_read_rec`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_vote`
--

CREATE TABLE `shopbuilder_vote` (
  `id` int(11) NOT NULL auto_increment,
  `newsid` smallint(6) NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `votetext` text NOT NULL,
  `votetype` tinyint(1) NOT NULL default '0',
  `num` int(6) NOT NULL,
  `limitip` tinyint(1) NOT NULL default '0',
  `time` date NOT NULL default '0000-00-00',
  `tempid` smallint(6) NOT NULL default '0',
  `type` tinyint(4) default NULL,
  `uptime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_vote`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_web_con`
--

CREATE TABLE `shopbuilder_web_con` (
  `con_id` int(5) NOT NULL auto_increment,
  `con_desc` mediumtext,
  `con_province` varchar(20) default NULL,
  `con_city` varchar(20) default NULL,
  `con_no` int(2) default '0',
  `con_statu` int(1) default '0',
  `con_title` varchar(30) default NULL,
  `con_linkaddr` varchar(60) default NULL,
  `con_group` tinyint(3) NOT NULL,
  `template` varchar(50) default NULL,
  `title` varchar(200) default NULL,
  `keywords` varchar(200) default NULL,
  `description` varchar(200) default NULL,
  `msg_online` tinyint(1) NOT NULL default '0',
  `lang` varchar(5) default NULL,
  `type` tinyint(1) default '0',
  PRIMARY KEY  (`con_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_web_con`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_web_config`
--

CREATE TABLE `shopbuilder_web_config` (
  `id` int(5) unsigned NOT NULL auto_increment COMMENT '主键ＩＤ',
  `index` varchar(30) NOT NULL COMMENT '数组下标',
  `value` text NOT NULL COMMENT '数组值',
  `statu` tinyint(1) NOT NULL default '1' COMMENT '状态值，1可能，0不可用',
  `type` varchar(50) default NULL,
  `des` text,
  PRIMARY KEY  (`id`),
  KEY `index` (`index`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站配置表' AUTO_INCREMENT=129 ;

--
-- 导出表中的数据 `shopbuilder_web_config`
--

INSERT INTO `shopbuilder_web_config` (`id`, `index`, `value`, `statu`, `type`, `des`) VALUES
(1, 'opensuburl', '0', 1, 'seo', NULL),
(2, 'rewrite', '0', 1, 'seo', NULL),
(3, 'title', '111', 1, 'seo', NULL),
(4, 'keyword', '111', 1, 'seo', NULL),
(5, 'description', '111', 1, 'seo', NULL),
(15, 'validTime', '7天|15天|1个月|3个月|6个月|1年|永久', 1, 'module_product', NULL),
(16, 'ptype', '全新|二手|闲置|其它', 1, 'module_product', NULL),
(17, 'company', 'shopbuilder', 1, 'main', NULL),
(18, 'weburl', 'http://localhost/shop', 1, 'main', NULL),
(19, 'baseurl', '', 1, 'main', NULL),
(20, 'logo', '', 1, 'main', NULL),
(21, 'owntel', '021-64262959', 1, 'main', NULL),
(22, 'email', '250314853@qq.com', 1, 'main', NULL),
(23, 'regname', 'register.php', 1, 'main', NULL),
(24, 'cacheTime', '0', 1, 'main', NULL),
(25, 'money', '￥', 1, 'main', NULL),
(26, 'date_format', '%Y-%m-%d', 1, 'main', NULL),
(27, 'language', 'cn', 1, 'main', NULL),
(28, 'temp', 'default', 1, 'main', NULL),
(29, 'domaincity', '0', 1, 'main', NULL),
(30, 'enable_gzip', '0', 1, 'main', NULL),
(31, 'enable_tranl', '0', 1, 'main', NULL),
(32, 'openstatistics', '1', 1, 'main', NULL),
(33, 'copyright', 'ShopBuilder版权所有,正版购买地址http://www.a5shop.cn', 1, 'main', NULL),
(34, 'closetype', '0', 1, 'main', NULL),
(35, 'closecon', '', 1, 'main', NULL),
(36, 'qanggou', '48', 1, 'home', NULL),
(37, 'hot_sell', '42,37,28,41,30,31,42,47,34,35', 1, 'home', NULL),
(38, 'hot_commen', '31,42,47,34,35,25,44,26,27,46', 1, 'home', NULL),
(39, 'new_pro', '48,32,23,25,28', 1, 'home', NULL),
(40, 'index_catid', '1000,1002,1001,1003,1005,1006', 1, 'home', NULL),
(41, 'index_newsid', '1', 1, 'home', NULL),
(42, 'list_catid', '1', 1, 'home', NULL),
(56, 'openregemail', '0', 1, 'reg', NULL),
(57, 'user_reg_verf', '0', 1, 'reg', NULL),
(58, 'invite', '1', 1, 'reg', NULL),
(59, 'user_reg', '2', 1, 'reg', NULL),
(60, 'openbbs', '0', 1, 'reg', NULL),
(61, 'inhibit_ip', '0', 1, 'reg', NULL),
(62, 'exception_ip', '127.0.0.1', 1, 'reg', NULL),
(63, 'association', '这里是注册协义，可以在后台注册设置中修改。', 1, 'reg', NULL),
(64, 'closetype', '0', 1, 'reg', NULL),
(65, 'closecon', '', 1, 'reg', NULL),
(95, 'like', '25,44,26,27,46', 1, 'home', NULL),
(100, 'mail_statu', '1', 1, 'mail', NULL),
(101, 'sent_type', '2', 1, 'mail', NULL),
(102, 'smtp1', 'smtp.163.com', 1, 'mail', NULL),
(103, 'email1', 'zyfang1115@163.com', 1, 'mail', NULL),
(104, 'emailPass1', 'yuanfeng021', 1, 'mail', NULL),
(105, 'smtp2', 'smtp.163.com', 1, 'mail', NULL),
(106, 'email2', 'zyfang1115@163.com', 1, 'mail', NULL),
(107, 'emailPass2', 'yuanfeng021', 1, 'mail', NULL),
(108, 'smtp3', '', 1, 'mail', NULL),
(109, 'email3', '', 1, 'mail', NULL),
(110, 'emailPass3', '', 1, 'mail', NULL),
(111, 'smtp4', '', 1, 'mail', NULL),
(112, 'email4', '', 1, 'mail', NULL),
(113, 'emailPass4', '', 1, 'mail', NULL),
(114, 'smtp5', '', 1, 'mail', NULL),
(115, 'email5', '', 1, 'mail', NULL),
(116, 'emailPass5', '', 1, 'mail', NULL),
(117, 'smtp6', '', 1, 'mail', NULL),
(118, 'email6', '', 1, 'mail', NULL),
(119, 'emailPass6', '', 1, 'mail', NULL),
(120, 'email', 'admin@systerm.com', 1, 'module_payment', NULL),
(122, 'censoruser', '', 1, 'reg', NULL),
(123, 'pwlength', '4', 1, 'reg', NULL),
(124, 'strongpw', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}', 1, 'reg', NULL),
(125, 'regctrl', '0', 1, 'reg', NULL),
(126, 'regfloodctrl', '0', 1, 'reg', NULL),
(127, 'ipregctrltime', '72', 1, 'reg', NULL),
(128, 'ipregctrl', '', 1, 'reg', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_web_con_group`
--

CREATE TABLE `shopbuilder_web_con_group` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(60) default NULL,
  `lang` varchar(5) default NULL,
  `sort` smallint(4) default '0',
  `logo` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_web_con_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `shopbuilder_web_link`
--

CREATE TABLE `shopbuilder_web_link` (
  `linkid` int(4) NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `url` varchar(200) default NULL,
  `statu` tinyint(1) NOT NULL default '0',
  `orderid` int(11) NOT NULL default '0',
  `log` varchar(100) default NULL,
  `province` varchar(15) default NULL,
  `city` varchar(15) default NULL,
  `stime` int(11) default NULL,
  `etime` int(11) default NULL,
  `con` text,
  PRIMARY KEY  (`linkid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `shopbuilder_web_link`
--

