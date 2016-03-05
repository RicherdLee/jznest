<?
if(!defined('VERSION')) {exit;}
create_table("jz_activity"," (\n  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\n  `title` varchar(100) NOT NULL,\n  `desc` text NOT NULL,\n  `ads_code` varchar(100) NOT NULL,\n  `start_time` int(10) NOT NULL,\n  `end_time` int(10) NOT NULL,\n  `templates` varchar(30) NOT NULL,\n  `create_time` int(10) unsigned NOT NULL,\n  `status` tinyint(1) NOT NULL DEFAULT '0',\n  `displayorder` smallint(6) NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_activity");

create_table("jz_activity_product_list"," (\n  `id` int(10) NOT NULL AUTO_INCREMENT,\n  `activity_id` int(10) NOT NULL,\n  `product_id` int(10) NOT NULL,\n  `product_name` varchar(100) NOT NULL,\n  `member_id` int(11) NOT NULL,\n  `member_name` varchar(30) NOT NULL,\n  `create_time` int(10) unsigned NOT NULL,\n  `status` tinyint(1) NOT NULL,\n  `displayorder` smallint(6) NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_activity_product_list");

create_table("jz_admin"," (\n  `id` int(3) NOT NULL AUTO_INCREMENT,\n  `user` char(30) NOT NULL,\n  `name` varchar(50) DEFAULT NULL,\n  `password` char(35) NOT NULL,\n  `group_id` smallint(5) NOT NULL DEFAULT '0',\n  `desc` text,\n  `logonums` int(5) DEFAULT '0',\n  `lastlogotime` int(11) DEFAULT NULL,\n  `logoip` varchar(30) DEFAULT NULL,\n  `province` varchar(60) DEFAULT NULL,\n  `city` varchar(60) DEFAULT NULL,\n  `area` varchar(60) DEFAULT NULL,\n  `type` smallint(1) unsigned DEFAULT NULL COMMENT '1manager',\n  `lang` varchar(10) DEFAULT NULL,\n  UNIQUE KEY `id` (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");

insert_table("
('1','admin',NULL,'ebe8c9ab1cd01674b088241d74a69c4b','0',NULL,'2','1455679560','112.10.106.158',NULL,NULL,NULL,'1','cn')");

clear_table("jz_admin");

create_table("jz_admin_group"," (\n  `group_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '组Id',\n  `group_name` varchar(60) NOT NULL COMMENT '组名称',\n  `group_perms` text NOT NULL COMMENT '组权限',\n  `group_desc` varchar(250) NOT NULL COMMENT '组描述',\n  PRIMARY KEY (`group_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组'");

clear_table("jz_admin_group");

create_table("jz_advs"," (\n  `ID` int(4) NOT NULL AUTO_INCREMENT,\n  `width` varchar(10) DEFAULT NULL,\n  `height` varchar(10) DEFAULT NULL,\n  `ad_type` tinyint(1) NOT NULL DEFAULT '1',\n  `name` varchar(50) NOT NULL DEFAULT '',\n  `onurl` varchar(200) DEFAULT NULL,\n  `group` varchar(50) DEFAULT NULL,\n  `con` mediumtext,\n  `date` datetime DEFAULT NULL,\n  `price` decimal(10,2) DEFAULT NULL,\n  `unit` enum('day','week','month') NOT NULL,\n  `total` tinyint(4) DEFAULT '0' COMMENT '数量',\n  PRIMARY KEY (`ID`)\n) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");

insert_table("
('1','500','320','0','登录页',NULL,'登录','','2013-09-18 14:42:29','0.00','day','0'),
('2','740','250','1','首页中间-1',NULL,'首页','','2013-09-18 14:58:31','0.00','day','0'),
('3','740','180','2','首页中间-2',NULL,'首页','','2013-09-18 14:59:18','0.00','day','0'),
('4','240','70','0','首页右边-1',NULL,'首页','','2013-09-18 15:24:07','0.00','day','0'),
('5','240','133','0','首页右边-2',NULL,'首页','','2013-09-18 15:25:29','0.00','day','0'),
('6','209','155','0','首页分类左边',NULL,'首页','','2013-09-18 15:34:47','0.00','day','0'),
('7','473','180','1','首页分类中间',NULL,'首页','','2013-09-18 15:46:44','0.00','day','0'),
('8','209','179','0','首页分类右边',NULL,'首页','','2013-09-18 15:47:14','0.00','day','0'),
('9','240','88','0','首页产品首发',NULL,'首页','','2013-09-22 15:16:04','0.00','day','0'),
('10','235','0','0','团购首页',NULL,'团购','','2013-09-22 16:15:40','0.00','day','0'),
('11','310','100','0','团购详情页',NULL,'团购','','2013-09-22 16:23:05','0.00','day','0'),
('12','200','0','0','产品列表页',NULL,'产品','','2013-09-22 17:33:05','0.00','day','0'),
('13','200','0','0','产品详情页',NULL,'产品','','2013-09-22 17:33:40','0.00','day','0'),
('14','186','0','0','热门活动',NULL,'用户后台','','2013-09-22 17:38:21','0.00','day','0'),
('15','186','0','0','热门商品推荐',NULL,'用户后台','','2013-09-22 17:38:34','0.00','day','0'),
('16','565','0','0','用户后台',NULL,'用户后台','','2013-09-22 17:47:24','0.00','day','0')");

clear_table("jz_advs");

create_table("jz_advs_con"," (\n  `ID` int(4) NOT NULL AUTO_INCREMENT,\n  `userid` int(11) DEFAULT NULL,\n  `group_id` int(5) DEFAULT NULL,\n  `name` varchar(50) NOT NULL DEFAULT '',\n  `type` varchar(20) DEFAULT NULL,\n  `url` varchar(200) DEFAULT NULL,\n  `con` mediumtext,\n  `picName` varchar(255) NOT NULL,\n  `isopen` int(1) DEFAULT '0',\n  `ctime` int(11) DEFAULT NULL,\n  `province` varchar(50) DEFAULT NULL,\n  `city` varchar(50) DEFAULT NULL,\n  `area` varchar(50) DEFAULT NULL,\n  `width` char(4) DEFAULT NULL,\n  `height` char(4) DEFAULT NULL,\n  `catid` int(8) DEFAULT NULL,\n  `unit` enum('day','week','month') DEFAULT NULL,\n  `show_time` tinyint(4) DEFAULT '0' COMMENT '展出时间',\n  `statu` tinyint(1) DEFAULT '0' COMMENT '0:待支付,1:购买成功,',\n  `shownum` int(11) unsigned DEFAULT '1' COMMENT '展示次数',\n  `stime` int(10) unsigned DEFAULT NULL,\n  `etime` int(10) unsigned DEFAULT NULL,\n  `sort_num` tinyint(3) unsigned DEFAULT '0',\n  PRIMARY KEY (`ID`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_advs_con");

create_table("jz_announcement"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `title` varchar(100) NOT NULL COMMENT '标题',\n  `content` text NOT NULL COMMENT '内容',\n  `url` varchar(100) DEFAULT NULL COMMENT '跳转链接',\n  `create_time` int(10) unsigned NOT NULL COMMENT '发布时间',\n  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0 为关闭 1为开启',\n  `displayorder` smallint(6) NOT NULL DEFAULT '255' COMMENT '排序',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_announcement");

create_table("jz_brand"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `name` varchar(80) NOT NULL,\n  `char_index` char(1) NOT NULL,\n  `catid` int(11) NOT NULL,\n  `logo` varchar(150) NOT NULL,\n  `displayorder` smallint(6) NOT NULL DEFAULT '0',\n  `status` tinyint(1) NOT NULL DEFAULT '1',\n  `create_time` int(10) unsigned NOT NULL,\n  `hits` int(11) NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_brand");

create_table("jz_brand_cat"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `parent_id` int(11) NOT NULL DEFAULT '0',\n  `displayorder` smallint(6) NOT NULL DEFAULT '255',\n  `catname` varchar(100) NOT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_brand_cat");

create_table("jz_contags"," (\n  `tagname` char(20) NOT NULL,\n  `tid` int(10) unsigned NOT NULL,\n  `type` tinyint(4) DEFAULT NULL,\n  KEY `tid` (`tid`),\n  KEY `tagname_2` (`tagname`,`type`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_contags");

create_table("jz_cron"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `name` varchar(50) DEFAULT NULL,\n  `script` varchar(50) DEFAULT NULL,\n  `lasttransact` int(10) DEFAULT NULL,\n  `nexttransact` int(10) DEFAULT NULL,\n  `week` varchar(12) DEFAULT '-1',\n  `day` varchar(2) DEFAULT '-1',\n  `hours` varchar(2) DEFAULT '00',\n  `minutes` varchar(2) DEFAULT '00',\n  `active` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");

clear_table("jz_cron");

create_table("jz_district"," (\n  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,\n  `name` varchar(255) NOT NULL DEFAULT '',\n  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0',\n  `sorting` smallint(6) NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`),\n  KEY `upid` (`pid`,`sorting`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_district");

create_table("jz_fast_mail"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `company` varchar(30) DEFAULT NULL,\n  `introduction` text,\n  `url` varchar(30) DEFAULT NULL,\n  `logo` varchar(30) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_fast_mail");

create_table("jz_feed"," (\n  `id` int(10) NOT NULL AUTO_INCREMENT,\n  `userid` int(10) DEFAULT NULL,\n  `company` varchar(100) DEFAULT NULL,\n  `contact` varchar(30) DEFAULT NULL,\n  `email` varchar(30) DEFAULT NULL,\n  `mes` text,\n  `iflook` char(2) DEFAULT NULL,\n  `province` varchar(30) DEFAULT NULL,\n  `city` varchar(30) DEFAULT NULL,\n  `tell` varchar(30) DEFAULT NULL,\n  `addr` varchar(100) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_feed");

create_table("jz_filter_keyword"," (\n  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n  `keyword` varchar(50) DEFAULT NULL,\n  `replace` varchar(50) DEFAULT NULL,\n  `statu` tinyint(1) DEFAULT '1',\n  `time` int(11) unsigned DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");

clear_table("jz_filter_keyword");

create_table("jz_logistics_temp"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `title` varchar(255) DEFAULT NULL,\n  `type` tinyint(1) DEFAULT '0',\n  `desc` text,\n  `status` tinyint(1) DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_logistics_temp");

create_table("jz_logistics_temp_con"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `temp_id` int(11) DEFAULT NULL,\n  `default_num` smallint(5) DEFAULT '0',\n  `default_price` float(5,0) DEFAULT '0',\n  `add_num` smallint(5) DEFAULT '0',\n  `add_price` float(5,0) DEFAULT '0',\n  `free` smallint(5) DEFAULT '0',\n  `define_citys` text,\n  PRIMARY KEY (`id`),\n  KEY `temp_id` (`temp_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_logistics_temp_con");

create_table("jz_mail_mod"," (\n  `id` int(8) NOT NULL AUTO_INCREMENT,\n  `subject` varchar(100) DEFAULT NULL,\n  `title` varchar(100) DEFAULT NULL,\n  `message` text,\n  `flag` varchar(30) DEFAULT NULL,\n  `type` tinyint(1) NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_mail_mod");

create_table("jz_mail_record"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `sendmailname` varchar(20) DEFAULT NULL,\n  `sendtime` datetime DEFAULT NULL,\n  `sendmailrecord` text,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_mail_record");

create_table("jz_member"," (\n  `userid` int(8) NOT NULL AUTO_INCREMENT,\n  `email_verify` tinyint(1) NOT NULL DEFAULT '0',\n  `mobile_verify` tinyint(1) NOT NULL DEFAULT '0',\n  `pid` int(11) DEFAULT NULL,\n  `user` char(20) DEFAULT NULL,\n  `password` char(32) DEFAULT NULL,\n  `name` varchar(30) DEFAULT NULL,\n  `sex` tinyint(1) DEFAULT '1',\n  `mobile` varchar(18) DEFAULT NULL,\n  `email` varchar(50) DEFAULT NULL,\n  `qq` varchar(50) DEFAULT NULL,\n  `provinceid` int(11) DEFAULT NULL,\n  `cityid` int(11) DEFAULT NULL,\n  `areaid` int(11) DEFAULT NULL,\n  `area` varchar(255) DEFAULT NULL,\n  `logo` varchar(120) DEFAULT 'image/default/default_user_portrait.gif',\n  `ip` char(15) DEFAULT NULL,\n  `point` int(10) DEFAULT NULL,\n  `statu` tinyint(1) DEFAULT NULL,\n  `regtime` datetime DEFAULT NULL,\n  `lastLoginTime` int(10) DEFAULT NULL,\n  `invite` varchar(50) DEFAULT NULL,\n  `grade` int(2) DEFAULT '1',\n  `update_date` int(10) DEFAULT NULL,\n  PRIMARY KEY (`userid`),\n  KEY `user` (`user`),\n  KEY `email` (`email`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_member");

create_table("jz_member_address"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `userid` int(11) unsigned NOT NULL,\n  `name` varchar(40) NOT NULL,\n  `provinceid` int(11) DEFAULT NULL,\n  `cityid` int(11) DEFAULT NULL,\n  `areaid` int(11) DEFAULT NULL,\n  `area` varchar(255) DEFAULT NULL,\n  `address` varchar(50) DEFAULT NULL,\n  `zip` varchar(10) DEFAULT NULL,\n  `tel` varchar(30) DEFAULT NULL,\n  `mobile` varchar(20) DEFAULT NULL,\n  `email` varchar(255) DEFAULT NULL,\n  `default` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_member_address");

create_table("jz_member_grade"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `name` varchar(50) NOT NULL,\n  `demand` int(10) DEFAULT '0' COMMENT '条件',\n  `treatment` text COMMENT '权益',\n  `blogo` varchar(255) DEFAULT NULL COMMENT '大图',\n  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO',\n  `valid` int(1) DEFAULT '0' COMMENT '有效期',\n  `sum` int(11) DEFAULT '0' COMMENT '年费',\n  `rate` float(3,1) DEFAULT '0.0' COMMENT '折扣率',\n  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");

insert_table("
('1','注册会员','0','<p>1.可以享受注册会员所能购买的产品及服务</p>\r\n<p>2.享受售后服务（退货、换货、维修）运费优惠</p>','image/grade/icon1.png_big.png','image/grade/icon1.png','0','0','0.0','1382066723'),
('2','铜牌会员','1','<p>2.可以享受铜牌会员所能购买的产品及服务</p>\r\n<p>3.享受售后服务（退货、换货、维修）运费优惠</p>','image/grade/icon2.png_big.png','image/grade/icon2.png','0','0','99.9','1382066888'),
('3','银牌会员','2000','<p>2.可以享受银牌会员所能购买的产品及服务</p>\r\n<p>3.享受售后服务（退货、换货、维修）运费优惠</p>','image/grade/icon3.png_big.png','image/grade/icon3.png','1','1000','99.8','1382067067'),
('4','金牌会员','10000','<p>2.可以享受金牌会员所能购买的产品及服务</p>\r\n<p>3.享受售后服务（退货、换货、维修）运费优惠</p>','image/grade/icon4.png_big.png','image/grade/icon4.png','1','4000','98.0','1382067113'),
('5','钻石会员','30000','<p>\r\n	2.可以享受钻石会员所能购买的产品及服务\r\n</p>\r\n<p>\r\n	3.享受售后服务（退货、换货、维修）运费优惠\r\n</p>','image/grade/icon5.png_big.png','image/grade/icon5.png','1','10000','97.0','1382067211')");

clear_table("jz_member_grade");

create_table("jz_member_info"," (\n  `member_id` int(11) NOT NULL,\n  `blog` int(11) DEFAULT '0' COMMENT '微博数量',\n  `friend` int(11) DEFAULT '0' COMMENT '好友数量',\n  `fan` int(11) DEFAULT '0' COMMENT '粉丝数量',\n  `growth` int(11) DEFAULT '0' COMMENT '成长值',\n  `points` int(11) DEFAULT '0',\n  PRIMARY KEY (`member_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_member_info");

create_table("jz_message"," (\n  `id` int(8) NOT NULL AUTO_INCREMENT,\n  `touserid` int(8) DEFAULT NULL,\n  `fromuserid` int(8) DEFAULT NULL,\n  `fromInfo` varchar(250) DEFAULT '0',\n  `msgtype` tinyint(1) DEFAULT '1',\n  `sub` varchar(50) DEFAULT NULL,\n  `con` text,\n  `iflook` varchar(10) DEFAULT NULL,\n  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',\n  `contype` tinyint(4) DEFAULT NULL,\n  `tid` varchar(50) DEFAULT NULL,\n  `receive_type` varchar(200) DEFAULT NULL,\n  `reply_by` int(11) DEFAULT NULL,\n  `attachments` varchar(50) DEFAULT NULL,\n  `is_save` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_message");

create_table("jz_nav_menu"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `sort` int(2) NOT NULL,\n  `menu_name` varchar(20) NOT NULL,\n  `link_addr` varchar(100) DEFAULT NULL,\n  `type` int(1) NOT NULL,\n  `statu` int(1) NOT NULL,\n  `partent_menu_id` int(20) NOT NULL,\n  `selected_flag` varchar(20) DEFAULT '',\n  `selected_flay` varchar(20) DEFAULT NULL,\n  `lang` varchar(5) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_nav_menu");

create_table("jz_news"," (\n  `nid` int(11) NOT NULL AUTO_INCREMENT,\n  `classid` smallint(6) NOT NULL DEFAULT '1' COMMENT '类别ID',\n  `title` varchar(200) NOT NULL COMMENT '标题',\n  `ftitle` varchar(120) NOT NULL COMMENT '副标题',\n  `keyboard` varchar(100) NOT NULL COMMENT '关键字',\n  `titleurl` varchar(200) NOT NULL DEFAULT '0' COMMENT '外部链接',\n  `isrec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐 0否1是',\n  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否头条 0否1是',\n  `ispass` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否审批 0否1是',\n  `firsttitle` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶',\n  `onclick` int(11) NOT NULL DEFAULT '0' COMMENT '点击率',\n  `titlefont` varchar(100) NOT NULL COMMENT '标题样式',\n  `uid` int(11) NOT NULL COMMENT '用户ID',\n  `uptime` int(12) NOT NULL COMMENT '新闻发布时间',\n  `smalltext` varchar(255) NOT NULL COMMENT '内容简介',\n  `writer` varchar(50) NOT NULL COMMENT '作者',\n  `source` varchar(100) NOT NULL COMMENT '来源',\n  `titlepic` varchar(200) NOT NULL COMMENT '标题图片',\n  `ispic` tinyint(1) NOT NULL DEFAULT '0' COMMENT '有无图片 0否1有',\n  `isgid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '阅读权限 0游客',\n  `ispl` tinyint(1) NOT NULL COMMENT '是否关闭评论 1关',\n  `userfen` smallint(6) NOT NULL COMMENT '查看扣除点数',\n  `newstempid` varchar(40) NOT NULL COMMENT '内容模板',\n  `pagenum` int(11) NOT NULL DEFAULT '0' COMMENT '分页',\n  `lastedittime` int(12) NOT NULL,\n  `vote` char(255) NOT NULL DEFAULT '0',\n  `special` char(255) NOT NULL DEFAULT '0',\n  `imgs_url` text NOT NULL,\n  `videos_url` text NOT NULL,\n  `admin` varchar(50) DEFAULT NULL,\n  PRIMARY KEY (`nid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_news");

create_table("jz_news_data"," (\n  `nid` int(11) NOT NULL,\n  `con` mediumtext NOT NULL,\n  PRIMARY KEY (`nid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_news_data");

create_table("jz_newscat"," (\n  `catid` int(6) NOT NULL AUTO_INCREMENT,\n  `cat` char(100) DEFAULT NULL,\n  `nums` int(10) DEFAULT NULL,\n  `pid` int(6) DEFAULT '0',\n  `ishome` int(1) DEFAULT NULL,\n  `template` varchar(50) DEFAULT NULL,\n  `pic` varchar(100) DEFAULT NULL,\n  `openpost` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`catid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_newscat");

create_table("jz_order"," (\n  `id` int(20) NOT NULL AUTO_INCREMENT,\n  `member_id` int(11) unsigned DEFAULT NULL,\n  `order_id` varchar(15) DEFAULT NULL,\n  `seller_id` int(11) unsigned DEFAULT NULL,\n  `status` tinyint(1) DEFAULT '1',\n  `pay_status` tinyint(1) DEFAULT '1',\n  `ship_status` tinyint(1) DEFAULT '1',\n  `create_time` int(10) unsigned DEFAULT NULL,\n  `ship_time` int(10) unsigned DEFAULT NULL,\n  `pay_time` int(10) unsigned DEFAULT NULL,\n  `finished_time` int(10) unsigned DEFAULT NULL,\n  `invoice_id` int(11) DEFAULT '0',\n  `payment_id` smallint(4) DEFAULT '0',\n  `payment_name` varchar(100) DEFAULT NULL,\n  `shipping_id` mediumint(8) DEFAULT '0',\n  `shipping_name` varchar(100) DEFAULT NULL,\n  `ship_name` varchar(50) DEFAULT NULL,\n  `ship_addr` varchar(255) DEFAULT NULL,\n  `ship_tel` varchar(30) DEFAULT NULL,\n  `ship_mobile` varchar(15) DEFAULT NULL,\n  `ship_zip` varchar(6) DEFAULT NULL,\n  `shipping_no` varchar(50) DEFAULT NULL,\n  `des` varchar(200) DEFAULT NULL,\n  `cost` decimal(20,2) DEFAULT '0.00',\n  `freight` decimal(20,2) DEFAULT '0.00',\n  `weight` decimal(20,2) DEFAULT '0.00',\n  `is_comment` enum('true','false') DEFAULT 'false',\n  `admin_remark` varchar(255) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_order");

create_table("jz_order_delivery"," (\n  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,\n  `order_id` varchar(15) DEFAULT NULL,\n  `member_id` mediumint(8) unsigned DEFAULT NULL,\n  `money` decimal(20,2) NOT NULL DEFAULT '0.00',\n  `shipping_id` varchar(50) DEFAULT NULL,\n  `shipping_name` varchar(100) DEFAULT NULL,\n  `shipping_no` varchar(50) DEFAULT NULL,\n  `ship_name` varchar(50) DEFAULT NULL,\n  `ship_addr` varchar(100) DEFAULT NULL,\n  `ship_zip` varchar(20) DEFAULT NULL,\n  `ship_tel` varchar(30) DEFAULT NULL,\n  `ship_mobile` varchar(50) DEFAULT NULL,\n  `start_time` int(10) unsigned DEFAULT NULL,\n  `end_time` int(10) unsigned DEFAULT NULL,\n  `status` tinyint(1) DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_order_delivery");

create_table("jz_order_log"," (\n  `id` int(20) NOT NULL AUTO_INCREMENT,\n  `order_id` varchar(15) DEFAULT NULL,\n  `admin_id` smallint(5) DEFAULT NULL,\n  `admin_name` varchar(30) DEFAULT NULL,\n  `text` longtext,\n  `create_time` int(10) unsigned DEFAULT NULL,\n  `behavior` varchar(20) DEFAULT '',\n  `result` enum('success','failure') DEFAULT 'success',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_order_log");

create_table("jz_order_payment"," (\n  `id` int(20) NOT NULL AUTO_INCREMENT,\n  `order_id` varchar(15) DEFAULT NULL,\n  `member_id` mediumint(8) unsigned DEFAULT NULL,\n  `money` decimal(20,2) NOT NULL DEFAULT '0.00',\n  `payment_type` enum('online','offline') DEFAULT 'online',\n  `payment_id` smallint(4) DEFAULT '0',\n  `payment_name` varchar(100) DEFAULT NULL,\n  `ip` varchar(20) DEFAULT NULL,\n  `start_time` int(10) unsigned DEFAULT NULL,\n  `end_time` int(10) unsigned DEFAULT NULL,\n  `status` tinyint(1) DEFAULT '1',\n  `trade_no` varchar(30) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_order_payment");

create_table("jz_order_product"," (\n  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n  `order_id` varchar(15) DEFAULT NULL,\n  `buyer_id` int(11) unsigned NOT NULL,\n  `pid` int(11) unsigned DEFAULT NULL COMMENT '产品ID',\n  `pcatid` int(11) NOT NULL,\n  `code` varchar(255) NOT NULL,\n  `name` varchar(100) NOT NULL COMMENT '产品名',\n  `pic` varchar(100) NOT NULL COMMENT '产品图片',\n  `price` float unsigned DEFAULT NULL,\n  `num` int(5) unsigned DEFAULT NULL,\n  `time` int(11) unsigned DEFAULT NULL,\n  `product_give` text NOT NULL,\n  `service` varchar(255) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_order_product");

create_table("jz_page_rec"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `totalurl` int(10) DEFAULT NULL COMMENT '前一天url总数',\n  `mostpopularurl` varchar(100) DEFAULT NULL,\n  `pageviews` int(10) DEFAULT NULL COMMENT '前一天的PV数',\n  `totalip` int(10) DEFAULT '0' COMMENT '前一天ip总数',\n  `visitusernum` int(10) DEFAULT '0' COMMENT '前一天上线的会员数',\n  `reguser` int(10) DEFAULT '0' COMMENT '前一天新注册会员数',\n  `pronum` int(10) DEFAULT '0' COMMENT '前一天发布产品数',\n  `newsnum` int(10) DEFAULT '0' COMMENT '前一天发布资讯数',\n  `exhibnum` int(10) DEFAULT '0',\n  `time` datetime DEFAULT NULL COMMENT '时间',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_page_rec");

create_table("jz_payment_banks"," (\n  `id` int(8) NOT NULL AUTO_INCREMENT,\n  `pay_uid` int(8) NOT NULL,\n  `bank` varchar(255) NOT NULL,\n  `bank_addr` varchar(200) DEFAULT NULL,\n  `accounts` varchar(255) NOT NULL,\n  `active` tinyint(1) NOT NULL DEFAULT '0',\n  `add_time` int(11) NOT NULL,\n  `censor` varchar(50) DEFAULT NULL,\n  `check_time` int(11) DEFAULT NULL,\n  `testing_cash` decimal(10,2) DEFAULT NULL,\n  `master` varchar(225) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_payment_banks");

create_table("jz_payment_card"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `card_num` varchar(30) NOT NULL,\n  `total_price` int(11) NOT NULL,\n  `password` varchar(30) NOT NULL,\n  `statu` tinyint(4) NOT NULL,\n  `use_name` varchar(20) DEFAULT NULL,\n  `creat_time` int(10) unsigned NOT NULL,\n  `stime` int(10) unsigned DEFAULT NULL,\n  `etime` int(10) unsigned DEFAULT NULL,\n  `pic` varchar(80) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_payment_card");

create_table("jz_payment_cashflow"," (\n  `id` int(10) NOT NULL AUTO_INCREMENT,\n  `pay_uid` int(11) DEFAULT NULL,\n  `buyer_email` varchar(50) DEFAULT NULL COMMENT '买家账号',\n  `seller_email` varchar(50) DEFAULT NULL COMMENT '卖家账号',\n  `price` decimal(10,2) DEFAULT NULL,\n  `flow_id` varchar(50) DEFAULT NULL COMMENT '流水账号',\n  `order_id` varchar(15) DEFAULT NULL COMMENT '外部订单号',\n  `note` varchar(255) DEFAULT NULL,\n  `censor` varchar(50) DEFAULT NULL,\n  `time` int(11) unsigned DEFAULT NULL,\n  `statu` tinyint(1) DEFAULT NULL COMMENT '0取消,1待处理,2已付款,3.发货中,4.成功,5.退货中,6.退货成功',\n  `return_url` varchar(200) DEFAULT NULL,\n  `notify_url` varchar(200) DEFAULT NULL,\n  `extra_param` varchar(100) DEFAULT NULL,\n  `type` tinyint(1) unsigned DEFAULT NULL,\n  `display` tinyint(1) unsigned DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_payment_cashflow");

create_table("jz_payment_cashpickup"," (\n  `id` int(10) NOT NULL AUTO_INCREMENT,\n  `pay_uid` int(8) NOT NULL,\n  `cashflowid` varchar(50) DEFAULT NULL,\n  `amount` decimal(10,2) NOT NULL,\n  `add_time` int(11) NOT NULL,\n  `censor` varchar(50) DEFAULT NULL,\n  `check_time` int(11) DEFAULT NULL,\n  `is_succeed` tinyint(1) DEFAULT '0',\n  `bankflow` varchar(50) DEFAULT NULL,\n  `con` text,\n  `bank_id` int(11) unsigned DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_payment_cashpickup");

create_table("jz_payment_type"," (\n  `payment_id` tinyint(3) NOT NULL AUTO_INCREMENT,\n  `payment_type` varchar(20) DEFAULT NULL,\n  `payment_name` varchar(100) DEFAULT NULL,\n  `payment_commission` varchar(8) DEFAULT '0',\n  `payment_desc` text,\n  `payment_config` text,\n  `active` tinyint(1) DEFAULT '0',\n  `nums` tinyint(3) DEFAULT '0',\n  PRIMARY KEY (`payment_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_payment_type");

create_table("jz_payment_user"," (\n  `pay_uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '支付用户ID号',\n  `userid` int(11) unsigned DEFAULT NULL COMMENT '网站会员ID',\n  `name` varchar(30) DEFAULT NULL,\n  `email` varchar(30) DEFAULT NULL,\n  `login_pass` varchar(32) DEFAULT NULL,\n  `pay_pass` varchar(32) DEFAULT NULL,\n  `tell` varchar(30) DEFAULT NULL,\n  `mobile` varchar(30) DEFAULT NULL,\n  `cash` decimal(10,2) DEFAULT '0.00',\n  `unreachable` decimal(10,2) DEFAULT '0.00',\n  `time` int(10) unsigned DEFAULT NULL,\n  PRIMARY KEY (`pay_uid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_payment_user");

create_table("jz_points"," (\n  `id` int(8) NOT NULL AUTO_INCREMENT,\n  `points` varchar(200) NOT NULL,\n  `img` varchar(20) NOT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_points");

create_table("jz_points_cat"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `catname` varchar(30) NOT NULL COMMENT '类别名称',\n  `parent_id` int(6) DEFAULT '0',\n  `displayorder` smallint(8) NOT NULL DEFAULT '255' COMMENT '排序',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='礼品分类表'");

clear_table("jz_points_cat");

create_table("jz_points_goods"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `name` varchar(100) NOT NULL COMMENT '商品名称',\n  `catid` int(6) DEFAULT '0',\n  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品原价',\n  `points` int(11) NOT NULL COMMENT '兑换所需积分',\n  `pic` varchar(100) NOT NULL COMMENT 'Logo',\n  `sku` varchar(50) NOT NULL COMMENT '货号',\n  `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存数',\n  `status` tinyint(1) NOT NULL COMMENT '状态',\n  `create_time` int(11) NOT NULL COMMENT '添加时间',\n  `content` text COMMENT '详细内容',\n  `sell_amount` int(11) NOT NULL DEFAULT '0' COMMENT '售出数量',\n  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分商品表'");

clear_table("jz_points_goods");

create_table("jz_points_log"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '积分日志编号',\n  `member_id` int(11) DEFAULT NULL COMMENT '会员编号',\n  `member_name` varchar(100) DEFAULT NULL COMMENT '会员名称',\n  `points` int(11) DEFAULT '0' COMMENT '积分数负数表示扣除',\n  `create_time` int(11) DEFAULT NULL COMMENT '添加时间',\n  `desc` varchar(255) DEFAULT NULL COMMENT '操作描述',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员积分日志表'");

clear_table("jz_points_log");

create_table("jz_points_order"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '兑换订单编号',\n  `order_id` varchar(100) NOT NULL COMMENT '兑换订单编号',\n  `buyer_id` int(11) NOT NULL COMMENT '兑换会员id',\n  `buyer_name` varchar(50) NOT NULL COMMENT '兑换会员姓名',\n  `product_id` int(6) DEFAULT NULL,\n  `product_name` varchar(255) DEFAULT NULL,\n  `pic` varchar(255) DEFAULT NULL,\n  `contact` varchar(30) DEFAULT NULL,\n  `address` varchar(200) DEFAULT NULL,\n  `tel` varchar(20) DEFAULT NULL,\n  `create_time` int(11) NOT NULL COMMENT '兑换订单生成时间',\n  `shipping_time` int(11) DEFAULT NULL COMMENT '发货时间',\n  `finnshed_time` int(11) DEFAULT NULL COMMENT '订单完成时间',\n  `allpoint` int(11) NOT NULL DEFAULT '0' COMMENT '兑换总积分',\n  `status` int(11) NOT NULL DEFAULT '10' COMMENT '订单状态：10(默认):待确定;20:已发货;30已完成;0已取消',\n  `shipping_name` varchar(50) DEFAULT NULL,\n  `shipping_address` varchar(255) DEFAULT NULL,\n  `shipping_tel` varchar(20) DEFAULT NULL,\n  `shipping_company` varchar(50) DEFAULT NULL,\n  `shipping_code` varchar(50) DEFAULT NULL,\n  `admin_remark` varchar(255) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兑换订单表'");

clear_table("jz_points_order");

create_table("jz_product_cart"," (\n  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n  `parent_id` int(11) DEFAULT '0',\n  `userid` int(11) unsigned DEFAULT NULL,\n  `pid` int(11) unsigned DEFAULT NULL,\n  `sell_userid` int(11) unsigned DEFAULT NULL,\n  `price` float unsigned DEFAULT NULL,\n  `num` int(5) unsigned DEFAULT NULL,\n  `time` int(11) unsigned DEFAULT NULL,\n  `setmeal` int(11) NOT NULL DEFAULT '0',\n  `code` varchar(255) DEFAULT NULL,\n  `service` text,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_cart");

create_table("jz_product_cat"," (\n  `catid` int(9) NOT NULL AUTO_INCREMENT,\n  `cat` varchar(50) DEFAULT NULL,\n  `title` text,\n  `keyword` text,\n  `description` text,\n  `nums` int(6) DEFAULT NULL,\n  `isindex` tinyint(1) DEFAULT '0',\n  `char_index` char(1) DEFAULT NULL,\n  `all_char` varchar(50) DEFAULT NULL,\n  `pic` varchar(150) DEFAULT NULL,\n  `brand` text,\n  `rec_nums` int(10) DEFAULT '0',\n  `isbuy` tinyint(1) DEFAULT NULL,\n  `ext_table` varchar(30) DEFAULT NULL,\n  `ext_field_cat` int(11) DEFAULT NULL,\n  `is_setmeal` tinyint(1) unsigned DEFAULT '0',\n  `commission` float unsigned DEFAULT '0',\n  `service` text,\n  `current` varchar(100) DEFAULT NULL,\n  `templates` varchar(100) DEFAULT NULL,\n  PRIMARY KEY (`catid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_cat");

create_table("jz_product_comment"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `userid` int(11) NOT NULL,\n  `user` char(20) NOT NULL,\n  `fromid` int(11) NOT NULL,\n  `pid` int(11) NOT NULL,\n  `puid` int(11) NOT NULL,\n  `pname` varchar(100) NOT NULL,\n  `price` float(30,0) NOT NULL,\n  `con` text NOT NULL,\n  `uptime` int(12) NOT NULL,\n  `goodbad` tinyint(1) NOT NULL DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_comment");

create_table("jz_product_consult"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `catid` int(11) DEFAULT '0',\n  `product_id` int(11) DEFAULT NULL,\n  `product_name` varchar(255) DEFAULT NULL,\n  `member_id` int(11) DEFAULT '0',\n  `member_name` varchar(255) DEFAULT NULL,\n  `question` varchar(255) DEFAULT NULL,\n  `answer` varchar(255) DEFAULT NULL,\n  `answer_id` int(11) DEFAULT '0',\n  `question_time` int(10) DEFAULT NULL,\n  `answer_time` int(10) DEFAULT NULL,\n  `status` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_consult");

create_table("jz_product_consult_cat"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `name` varchar(255) NOT NULL,\n  `type` tinyint(1) DEFAULT '0',\n  `con` text,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_consult_cat");

create_table("jz_product_detail"," (\n  `userid` int(11) DEFAULT NULL,\n  `proid` int(11) DEFAULT NULL,\n  `detail` text,\n  `after_service` text,\n  KEY `proid` (`proid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_detail");

create_table("jz_product_invoice"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `uid` int(11) NOT NULL,\n  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发票类型',\n  `rise` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发票抬头',\n  `content` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发票内容',\n  `company` varchar(50) DEFAULT NULL COMMENT '单位名称',\n  `number` varchar(30) DEFAULT NULL COMMENT '纳税人识别号',\n  `address` varchar(30) DEFAULT NULL COMMENT '注册地址',\n  `telephone` varchar(30) DEFAULT NULL COMMENT '注册电话',\n  `bank` varchar(30) DEFAULT NULL COMMENT '开户银行',\n  `account` varchar(20) DEFAULT NULL COMMENT '银行帐户',\n  `checked` tinyint(1) NOT NULL DEFAULT '0',\n  `default` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_invoice");

create_table("jz_product_report"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '举报id',\n  `userid` int(11) NOT NULL COMMENT '举报人id',\n  `user` varchar(50) NOT NULL COMMENT '举报人会员名',\n  `pid` int(11) NOT NULL COMMENT '被举报的商品id',\n  `pname` varchar(100) NOT NULL COMMENT '被举报的商品名称',\n  `subject_id` int(11) NOT NULL COMMENT '举报主题id',\n  `subject_name` varchar(50) NOT NULL COMMENT '举报主题',\n  `content` varchar(100) NOT NULL COMMENT '举报信息',\n  `pic` varchar(100) NOT NULL COMMENT '图片1',\n  `datetime` int(11) NOT NULL COMMENT '举报时间',\n  `shop_id` int(11) NOT NULL COMMENT '被举报商品的店铺id',\n  `state` tinyint(1) NOT NULL COMMENT '举报状态(1未处理/2已处理)',\n  `handle_type` tinyint(1) NOT NULL COMMENT '举报处理结果(1无效举报/2恶意举报/3有效举报)',\n  `handle_message` varchar(100) NOT NULL COMMENT '举报处理信息',\n  `handle_datetime` int(11) NOT NULL DEFAULT '0' COMMENT '举报处理时间',\n  `handle_user` varchar(50) NOT NULL DEFAULT '0' COMMENT '管理员',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='举报表'");

clear_table("jz_product_report");

create_table("jz_product_report_subject"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '举报主题id',\n  `content` varchar(100) DEFAULT NULL COMMENT '举报主题内容',\n  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '举报类型id',\n  `type_name` varchar(50) NOT NULL COMMENT '举报类型名称 ',\n  `desc` varchar(100) DEFAULT NULL COMMENT '举报类型描述',\n  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '举报主题状态(1可用/0失效)',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='举报主题表'");

clear_table("jz_product_report_subject");

create_table("jz_product_service"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `name` varchar(50) NOT NULL,\n  `price` float(10,2) NOT NULL DEFAULT '0.00',\n  `type` tinyint(1) DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_service");

create_table("jz_product_setmeal"," (\n  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\n  `pid` int(10) unsigned NOT NULL DEFAULT '0',\n  `catid` int(8) DEFAULT NULL,\n  `sku` varchar(60) DEFAULT '0',\n  `pname` varchar(100) NOT NULL,\n  `promotion_tips` varchar(255) DEFAULT NULL,\n  `setmeal` varchar(60) DEFAULT NULL,\n  `price` decimal(10,2) NOT NULL DEFAULT '0.00',\n  `market_price` float(10,2) DEFAULT '0.00',\n  `cost_price` float(10,2) DEFAULT '0.00',\n  `member_price` tinyint(1) DEFAULT '0',\n  `stock` int(11) NOT NULL DEFAULT '0',\n  `brand` varchar(60) DEFAULT NULL,\n  `pic` varchar(255) DEFAULT NULL,\n  `sell_amount` int(6) DEFAULT '0',\n  `province` int(11) DEFAULT NULL,\n  `city` int(6) DEFAULT NULL,\n  `areaid` int(6) DEFAULT NULL,\n  `area` varchar(255) DEFAULT NULL,\n  `uptime` int(10) unsigned DEFAULT NULL,\n  `rank` int(5) DEFAULT '0',\n  `statu` varchar(255) DEFAULT '0',\n  `property_value_id` text,\n  `goodbad` int(10) DEFAULT '0',\n  PRIMARY KEY (`id`),\n  KEY `goods_id` (`pid`),\n  KEY `price` (`price`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_setmeal");

create_table("jz_product_tag"," (\n  `id` int(10) NOT NULL AUTO_INCREMENT,\n  `name` varchar(20) NOT NULL,\n  `logo` varchar(100) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_product_tag");

create_table("jz_products"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `userid` int(6) DEFAULT NULL,\n  `user` varchar(30) DEFAULT NULL,\n  `catid` int(6) DEFAULT NULL,\n  `ptype` int(1) DEFAULT '0',\n  `pname` varchar(100) DEFAULT NULL,\n  `ftitle` varchar(255) DEFAULT NULL,\n  `promotion_tips` varchar(255) DEFAULT NULL,\n  `keywords` varchar(100) DEFAULT NULL,\n  `brand` varchar(60) DEFAULT NULL,\n  `market_price` float(10,2) DEFAULT NULL,\n  `price` float(10,2) DEFAULT '0.00',\n  `cost_price` float(10,2) DEFAULT '0.00',\n  `member_price` tinyint(1) DEFAULT '0',\n  `pic_more` text,\n  `amount` int(6) DEFAULT '1',\n  `sell_amount` int(5) DEFAULT '0',\n  `code` varchar(50) DEFAULT NULL,\n  `pic` varchar(200) DEFAULT NULL,\n  `weight` int(8) unsigned DEFAULT NULL,\n  `cubage` float(8,2) DEFAULT '0.00',\n  `freight` smallint(6) unsigned DEFAULT NULL,\n  `freight_type` tinyint(1) unsigned DEFAULT NULL,\n  `post_price` float unsigned DEFAULT NULL,\n  `express_price` float unsigned DEFAULT NULL,\n  `ems_price` float unsigned DEFAULT NULL,\n  `province` int(11) DEFAULT NULL,\n  `city` int(11) DEFAULT NULL,\n  `areaid` int(11) DEFAULT NULL,\n  `area` varchar(255) NOT NULL,\n  `read_nums` int(6) DEFAULT '0',\n  `rank` int(5) DEFAULT '0',\n  `uptime` datetime DEFAULT NULL,\n  `statu` varchar(255) NOT NULL DEFAULT '0',\n  `custom_cat_id` int(10) DEFAULT NULL,\n  `promotion_id` int(11) DEFAULT '0',\n  `point` int(6) DEFAULT NULL,\n  `goodbad` int(6) DEFAULT NULL,\n  `service` text,\n  `product_related` text,\n  `product_give` text,\n  `product_parts` text,\n  `rebate` float(10,2) DEFAULT '0.00',\n  PRIMARY KEY (`id`),\n  KEY `userid` (`userid`),\n  KEY `catid` (`catid`,`pname`),\n  KEY `pname` (`pname`),\n  KEY `keywords` (`keywords`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_products");

create_table("jz_property"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `name` varchar(100) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_property");

create_table("jz_property_value"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `field` varchar(100) DEFAULT NULL COMMENT '字段数据库字段名',\n  `field_name` varchar(200) DEFAULT NULL COMMENT '字段名称',\n  `field_desc` varchar(100) DEFAULT NULL COMMENT '字段描述',\n  `display_type` int(1) DEFAULT NULL COMMENT '前台显示类型（单行文本框，多行文件框等）',\n  `item` text COMMENT '选项列表',\n  `is_search` tinyint(1) DEFAULT '0' COMMENT '是否被搜索',\n  `property_id` int(11) DEFAULT NULL COMMENT '属性ID',\n  `statu` tinyint(1) DEFAULT '1',\n  `type` tinyint(1) DEFAULT '1',\n  `template_id` int(6) DEFAULT '0',\n  `displayorder` smallint(6) DEFAULT '255',\n  PRIMARY KEY (`id`),\n  KEY `catid` (`property_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员自定义字段表'");

clear_table("jz_property_value");

create_table("jz_property_value_template"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `field` varchar(100) DEFAULT NULL COMMENT '字段数据库字段名',\n  `field_name` varchar(200) DEFAULT NULL COMMENT '字段名称',\n  `field_desc` varchar(100) DEFAULT NULL COMMENT '字段描述',\n  `display_type` int(1) DEFAULT NULL COMMENT '前台显示类型（单行文本框，多行文件框等）',\n  `item` varchar(300) DEFAULT NULL COMMENT '选项列表',\n  `is_search` tinyint(1) DEFAULT '0' COMMENT '是否被搜索',\n  `statu` tinyint(1) DEFAULT '1',\n  `type` tinyint(1) DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员自定义字段表'");

clear_table("jz_property_value_template");

create_table("jz_reg_vercode"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `question` varchar(50) DEFAULT NULL,\n  `answer` varchar(40) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_reg_vercode");

create_table("jz_reserve_username"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `username` varchar(30) NOT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_reserve_username");

create_table("jz_return"," (\n  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '退货记录ID',\n  `oid` varchar(15) NOT NULL COMMENT '订单',\n  `return_code` varchar(100) NOT NULL COMMENT '退货编号',\n  `seller_id` int(10) unsigned NOT NULL COMMENT '卖家ID',\n  `seller_name` varchar(20) NOT NULL COMMENT '店铺名称',\n  `buyer_id` int(10) unsigned NOT NULL COMMENT '买家ID',\n  `buyer_name` varchar(50) NOT NULL COMMENT '买家会员名',\n  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',\n  `message` varchar(300) DEFAULT NULL COMMENT '退货备注',\n  `return_addr_id` int(11) NOT NULL,\n  `return_addr_name` varchar(30) NOT NULL,\n  `return_addr` varchar(150) NOT NULL,\n  `return_post` int(6) NOT NULL,\n  `return_tel` varchar(20) DEFAULT NULL,\n  `return_mobile` varchar(20) DEFAULT NULL,\n  `statu` tinyint(1) NOT NULL DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退货表'");

clear_table("jz_return");

create_table("jz_return_goods"," (\n  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '退货商品记录ID',\n  `rid` int(10) unsigned NOT NULL COMMENT '退货记录ID',\n  `oid` varchar(15) NOT NULL COMMENT '订单ID',\n  `pid` int(10) unsigned NOT NULL COMMENT '商品ID',\n  `pname` varchar(100) NOT NULL COMMENT '商品名称',\n  `price` decimal(10,2) NOT NULL COMMENT '商品价格',\n  `returnnum` int(10) unsigned NOT NULL COMMENT '退货数量',\n  `pic` varchar(100) DEFAULT NULL COMMENT '商品图片',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退货商品表'");

clear_table("jz_return_goods");

create_table("jz_search_word"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `keyword` varchar(80) DEFAULT NULL,\n  `char_index` varchar(80) DEFAULT NULL,\n  `nums` int(11) DEFAULT '0',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_search_word");

create_table("jz_session"," (\n  `sesskey` char(32) NOT NULL,\n  `expiry` int(11) unsigned NOT NULL,\n  `value` text NOT NULL,\n  PRIMARY KEY (`sesskey`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_session");

create_table("jz_shop"," (\n  `shopid` int(8) NOT NULL DEFAULT '0' COMMENT 'ID',\n  `user` varchar(30) DEFAULT NULL COMMENT '会员ID',\n  `catid` char(10) DEFAULT NULL COMMENT '分类ID',\n  `shop_name` char(60) DEFAULT NULL COMMENT '店铺名称',\n  `tel` varchar(30) DEFAULT NULL COMMENT '联系电话',\n  `main_pro` varchar(100) DEFAULT NULL COMMENT '主营产品',\n  `template` varchar(20) DEFAULT NULL COMMENT '店铺模板',\n  `shop_collect` int(10) NOT NULL DEFAULT '0' COMMENT '店铺收藏数量',\n  `shop_auth` tinyint(1) DEFAULT '0' COMMENT '店铺认证',\n  `shopkeeper_auth` tinyint(1) DEFAULT '0' COMMENT '店主认证',\n  `shop_auth_pic` varchar(100) DEFAULT NULL COMMENT '店铺认证图片',\n  `shopkeeper_auth_pic` varchar(100) DEFAULT NULL COMMENT '店主认证图片',\n  `domin` varchar(255) DEFAULT NULL COMMENT '顶级域名',\n  KEY `company` (`shop_name`),\n  KEY `userid` (`shopid`),\n  KEY `catid` (`catid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺表'");

clear_table("jz_shop");

create_table("jz_shop_cat"," (\n  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'ID',\n  `name` varchar(100) NOT NULL COMMENT '分类名',\n  `parent_id` int(9) NOT NULL DEFAULT '0' COMMENT '父类I',\n  `displayorder` smallint(6) NOT NULL DEFAULT '255' COMMENT '排序',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺分类表'");

clear_table("jz_shop_cat");

create_table("jz_sns"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',\n  `original_id` int(11) NOT NULL DEFAULT '0' COMMENT '原动态ID 默认为0',\n  `original_member_id` int(11) NOT NULL DEFAULT '0' COMMENT '原帖会员编号',\n  `original_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '原帖的删除状态 0为正常 1为删除',\n  `member_id` int(11) NOT NULL COMMENT '会员ID',\n  `member_name` varchar(100) NOT NULL COMMENT '会员名称',\n  `member_img` varchar(100) DEFAULT NULL COMMENT '会员头像',\n  `title` varchar(500) DEFAULT NULL COMMENT '动态标题',\n  `content` text NOT NULL COMMENT '动态内容',\n  `create_time` int(11) NOT NULL COMMENT '添加时间',\n  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态  0正常 1为禁止显示 默认为0',\n  `privacy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',\n  `comment_count` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',\n  `copy_count` int(11) NOT NULL DEFAULT '0' COMMENT '转发数',\n  `original_comment_count` int(11) NOT NULL DEFAULT '0' COMMENT '原帖评论次数',\n  `original_copy_count` int(11) NOT NULL DEFAULT '0' COMMENT '原帖转帖次数',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='动态信息表'");

clear_table("jz_sns");

create_table("jz_sns_comment"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',\n  `member_id` int(11) NOT NULL COMMENT '会员ID',\n  `member_name` varchar(100) NOT NULL COMMENT '会员名称',\n  `original_id` int(11) NOT NULL COMMENT '原帖ID',\n  `content` varchar(500) NOT NULL COMMENT '评论内容',\n  `addtime` int(11) NOT NULL COMMENT '添加时间',\n  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0正常 1屏蔽',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表'");

clear_table("jz_sns_comment");

create_table("jz_sns_friend"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id值',\n  `uid` int(11) NOT NULL COMMENT '会员id',\n  `uname` varchar(100) DEFAULT NULL COMMENT '会员名称',\n  `uimg` varchar(100) DEFAULT NULL COMMENT '会员头像',\n  `fuid` int(11) NOT NULL COMMENT '朋友id',\n  `funame` varchar(100) NOT NULL COMMENT '好友会员名称',\n  `fuimg` varchar(100) DEFAULT NULL COMMENT '朋友头像',\n  `addtime` int(11) NOT NULL COMMENT '添加时间',\n  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '关注状态 1为单方关注 2为双方关注',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='好友表'");

clear_table("jz_sns_friend");

create_table("jz_sns_shareproduct"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',\n  `pid` int(11) NOT NULL COMMENT '商品ID',\n  `uid` int(11) NOT NULL COMMENT '所属会员ID',\n  `uname` varchar(100) NOT NULL COMMENT '会员名称',\n  `content` varchar(500) DEFAULT NULL COMMENT '描述内容',\n  `addtime` int(11) NOT NULL COMMENT '分享操作时间',\n  `likeaddtime` int(11) NOT NULL DEFAULT '0' COMMENT '喜欢操作时间',\n  `privacy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',\n  `commentcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',\n  `isshare` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否分享 0为未分享 1为分享',\n  `islike` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否喜欢 0为未喜欢 1为喜欢',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享商品表'");

clear_table("jz_sns_shareproduct");

create_table("jz_sns_shareproduct_info"," (\n  `pid` int(11) NOT NULL COMMENT '商品ID',\n  `pname` varchar(100) NOT NULL COMMENT '商品名称',\n  `image` varchar(100) DEFAULT NULL COMMENT '商品图片',\n  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',\n  `shopid` int(11) NOT NULL COMMENT '店铺ID',\n  `uname` varchar(100) NOT NULL COMMENT '会员名称',\n  `addtime` int(11) NOT NULL COMMENT '添加时间',\n  `likenum` int(11) NOT NULL DEFAULT '0' COMMENT '喜欢数',\n  `likemember` text COMMENT '喜欢过的会员ID，用逗号分隔',\n  `collectnum` int(11) NOT NULL DEFAULT '0' COMMENT '收藏数',\n  UNIQUE KEY `snsgoods_goodsid` (`pid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享商品信息表'");

clear_table("jz_sns_shareproduct_info");

create_table("jz_stop_ip"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `ip` varchar(25) NOT NULL,\n  `reason` varchar(50) DEFAULT '',\n  `optime` int(12) unsigned DEFAULT NULL,\n  `stoptime` int(12) unsigned DEFAULT NULL,\n  `autorelease` int(1) DEFAULT NULL,\n  `statu` tinyint(1) NOT NULL DEFAULT '1',\n  `type` tinyint(1) DEFAULT '1',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_stop_ip");

create_table("jz_sub_domain"," (\n  `id` int(4) NOT NULL AUTO_INCREMENT,\n  `dtype` int(1) NOT NULL,\n  `domain` varchar(20) NOT NULL,\n  `con` varchar(30) NOT NULL,\n  `con2` varchar(20) DEFAULT NULL,\n  `con3` varchar(20) DEFAULT NULL,\n  `des` text,\n  `isopen` int(1) DEFAULT '1',\n  `logo` varchar(100) DEFAULT NULL,\n  `web_title` varchar(100) DEFAULT NULL,\n  `web_keyword` varchar(100) DEFAULT NULL,\n  `web_des` varchar(100) DEFAULT NULL,\n  `copyright` text,\n  `template` varchar(50) DEFAULT NULL,\n  PRIMARY KEY (`id`),\n  KEY `domain` (`domain`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_sub_domain");

create_table("jz_tags"," (\n  `tagname` varchar(100) NOT NULL,\n  `closed` tinyint(1) NOT NULL DEFAULT '0',\n  `total` mediumint(20) unsigned NOT NULL,\n  `statu` tinyint(4) NOT NULL COMMENT '0/1  1表示已导入',\n  PRIMARY KEY (`tagname`),\n  KEY `total` (`total`),\n  KEY `closed` (`closed`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_tags");

create_table("jz_talk"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '对话id',\n  `oid` varchar(15) NOT NULL COMMENT '投诉id',\n  `uid` int(11) NOT NULL COMMENT '发言人id',\n  `uname` varchar(50) NOT NULL COMMENT '发言人名称',\n  `utype` varchar(10) NOT NULL COMMENT '发言人类型(1-买家/2-卖家)',\n  `content` varchar(255) NOT NULL COMMENT '发言内容',\n  `add_time` int(11) NOT NULL COMMENT '对话发表时间',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='对话表'");

clear_table("jz_talk");

create_table("jz_tg"," (\n  `id` int(8) NOT NULL AUTO_INCREMENT,\n  `catid` int(6) NOT NULL,\n  `name` varchar(50) NOT NULL,\n  `content` text NOT NULL,\n  `pic` varchar(255) NOT NULL,\n  `market_price` float(10,2) NOT NULL DEFAULT '0.00',\n  `price` float(10,2) unsigned NOT NULL DEFAULT '0.00',\n  `hits` int(6) NOT NULL DEFAULT '0',\n  `sell_amount` int(6) NOT NULL DEFAULT '0',\n  `limit_quantity` int(6) NOT NULL DEFAULT '0',\n  `virtual_quantity` int(6) NOT NULL DEFAULT '0',\n  `status` tinyint(1) NOT NULL DEFAULT '0',\n  `create_time` int(10) unsigned NOT NULL,\n  `stock` int(10) NOT NULL DEFAULT '1',\n  `provinceid` int(11) NOT NULL,\n  `cityid` int(11) NOT NULL,\n  `areaid` int(11) NOT NULL,\n  `area` varchar(255) NOT NULL,\n  `displayorder` smallint(6) NOT NULL DEFAULT '255',\n  ` is_virtual` enum('true','false') DEFAULT 'false',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购表'");

clear_table("jz_tg");

create_table("jz_tg_cat"," (\n  `id` int(6) NOT NULL AUTO_INCREMENT,\n  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类id',\n  `catname` varchar(30) NOT NULL COMMENT '类别名称',\n  `displayorder` smallint(8) NOT NULL DEFAULT '255' COMMENT '排序',\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购产品分类表'");

clear_table("jz_tg_cat");

create_table("jz_tg_order"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `order_id` varchar(15) NOT NULL COMMENT '订单号',\n  `member_id` int(11) DEFAULT NULL,\n  `member_name` varchar(50) NOT NULL,\n  `tg_id` int(11) NOT NULL COMMENT '订购产品id',\n  `tg_name` varchar(80) NOT NULL COMMENT '订购产品名',\n  `tg_pic` varchar(80) DEFAULT NULL COMMENT '订购产品图片',\n  `contact` varchar(30) DEFAULT NULL,\n  `address` varchar(200) DEFAULT NULL,\n  `tel` varchar(20) DEFAULT NULL,\n  `remark` varchar(200) DEFAULT NULL,\n  `admin_remark` varchar(200) DEFAULT NULL COMMENT '管理员备注',\n  `price` decimal(10,2) DEFAULT '0.00',\n  `quantity` varchar(10) NOT NULL,\n  `create_time` int(10) DEFAULT NULL,\n  `payment_time` int(10) DEFAULT NULL,\n  `shipping_time` int(10) DEFAULT NULL,\n  `finished_time` int(10) DEFAULT NULL,\n  `status` tinyint(2) DEFAULT '20',\n  `shipping_name` varchar(50) DEFAULT NULL COMMENT '发货人',\n  `shipping_address` varchar(255) DEFAULT NULL COMMENT '发货地址',\n  `shipping_tel` varchar(20) DEFAULT NULL COMMENT '联系电话',\n  `shipping_company` varchar(50) DEFAULT NULL COMMENT '物流名称',\n  `shipping_code` varchar(50) DEFAULT NULL COMMENT '物流单号',\n  `is_virtual` enum('true','false') DEFAULT 'false',\n  `code` varchar(20) DEFAULT NULL,\n  `company_id` int(6) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购订单表'");

clear_table("jz_tg_order");

create_table("jz_user_connected"," (\n  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\n  `userid` int(10) unsigned DEFAULT NULL,\n  `nickname` varchar(50) DEFAULT NULL,\n  `figureurl` varchar(100) DEFAULT NULL,\n  `gender` varchar(10) DEFAULT NULL,\n  `vip` tinyint(1) unsigned DEFAULT '0',\n  `level` tinyint(1) unsigned DEFAULT '0',\n  `type` tinyint(1) DEFAULT '1',\n  `access_token` varchar(80) DEFAULT NULL,\n  `client_id` varchar(80) DEFAULT NULL,\n  `openid` varchar(80) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_user_connected");

create_table("jz_user_group"," (\n  `group_id` int(11) NOT NULL AUTO_INCREMENT,\n  `name` varchar(50) NOT NULL COMMENT '会员组名',\n  `des` text COMMENT '会员组描述',\n  `con` text,\n  `logo` varchar(100) DEFAULT NULL COMMENT '会员组ＬＯＧＯ',\n  `minilogo` varchar(200) DEFAULT NULL,\n  `statu` tinyint(4) DEFAULT '1' COMMENT '会员组状态 0,1',\n  `creat_time` date DEFAULT NULL COMMENT '创建时间',\n  `groupfee` float DEFAULT '0',\n  PRIMARY KEY (`group_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_user_group");

create_table("jz_vote"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `newsid` smallint(6) NOT NULL DEFAULT '0',\n  `title` varchar(120) NOT NULL,\n  `votetext` text NOT NULL,\n  `votetype` tinyint(1) NOT NULL DEFAULT '0',\n  `num` int(6) NOT NULL,\n  `limitip` tinyint(1) NOT NULL DEFAULT '0',\n  `time` date NOT NULL DEFAULT '0000-00-00',\n  `tempid` smallint(6) NOT NULL DEFAULT '0',\n  `type` tinyint(4) DEFAULT NULL,\n  `uptime` int(10) NOT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_vote");

create_table("jz_web_con"," (\n  `con_id` int(5) NOT NULL AUTO_INCREMENT,\n  `con_desc` mediumtext,\n  `con_province` varchar(20) DEFAULT NULL,\n  `con_city` varchar(20) DEFAULT NULL,\n  `con_no` int(2) DEFAULT '0',\n  `con_statu` int(1) DEFAULT '0',\n  `con_title` varchar(30) DEFAULT NULL,\n  `con_linkaddr` varchar(60) DEFAULT NULL,\n  `con_group` tinyint(3) NOT NULL,\n  `template` varchar(50) DEFAULT NULL,\n  `title` varchar(200) DEFAULT NULL,\n  `keywords` varchar(200) DEFAULT NULL,\n  `description` varchar(200) DEFAULT NULL,\n  `msg_online` tinyint(1) NOT NULL DEFAULT '0',\n  `lang` varchar(5) DEFAULT NULL,\n  `type` tinyint(1) DEFAULT '0',\n  PRIMARY KEY (`con_id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_web_con");

create_table("jz_web_con_group"," (\n  `id` int(11) NOT NULL AUTO_INCREMENT,\n  `title` varchar(60) DEFAULT NULL,\n  `lang` varchar(5) DEFAULT NULL,\n  `sort` smallint(4) DEFAULT '0',\n  `logo` varchar(100) DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_web_con_group");

create_table("jz_web_config"," (\n  `id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ＩＤ',\n  `index` varchar(30) NOT NULL COMMENT '数组下标',\n  `value` text NOT NULL COMMENT '数组值',\n  `statu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态值，1可能，0不可用',\n  `type` varchar(50) DEFAULT NULL,\n  `des` text,\n  PRIMARY KEY (`id`),\n  KEY `index` (`index`,`type`)\n) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COMMENT='网站配置表'");

insert_table("
('1','opensuburl','0','1','seo',NULL),
('2','rewrite','0','1','seo',NULL),
('3','title','111','1','seo',NULL),
('4','keyword','111','1','seo',NULL),
('5','description','111','1','seo',NULL),
('15','validTime','7天|15天|1个月|3个月|6个月|1年|永久','1','module_product',NULL),
('16','ptype','全新|二手|闲置|其它','1','module_product',NULL),
('17','company','shopbuilder','1','main',NULL),
('18','weburl','http://www.jznest.com','1','main',NULL),
('19','baseurl','www.jznest.com','1','main',NULL),
('20','logo','','1','main',NULL),
('21','owntel','021-64262959','1','main',NULL),
('22','email','250314853@qq.com','1','main',NULL),
('23','regname','register.php','1','main',NULL),
('24','cacheTime','0','1','main',NULL),
('25','money','￥','1','main',NULL),
('26','date_format','%Y-%m-%d','1','main',NULL),
('27','language','cn','1','main',NULL),
('28','temp','default','1','main',NULL),
('29','domaincity','0','1','main',NULL),
('30','enable_gzip','0','1','main',NULL),
('31','enable_tranl','0','1','main',NULL),
('32','openstatistics','1','1','main',NULL),
('33','copyright','ShopBuilder版权所有,正版购买地址http://www.a5shop.cn','1','main',NULL),
('34','closetype','0','1','main',NULL),
('35','closecon','','1','main',NULL),
('36','qanggou','48','1','home',NULL),
('37','hot_sell','42,37,28,41,30,31,42,47,34,35','1','home',NULL),
('38','hot_commen','31,42,47,34,35,25,44,26,27,46','1','home',NULL),
('39','new_pro','48,32,23,25,28','1','home',NULL),
('40','index_catid','1000,1002,1001,1003,1005,1006','1','home',NULL),
('41','index_newsid','1','1','home',NULL),
('42','list_catid','1','1','home',NULL),
('56','openregemail','0','1','reg',NULL),
('57','user_reg_verf','0','1','reg',NULL),
('58','invite','1','1','reg',NULL),
('59','user_reg','2','1','reg',NULL),
('60','openbbs','0','1','reg',NULL),
('61','inhibit_ip','0','1','reg',NULL),
('62','exception_ip','127.0.0.1','1','reg',NULL),
('63','association','这里是注册协义，可以在后台注册设置中修改。','1','reg',NULL),
('64','closetype','0','1','reg',NULL),
('65','closecon','','1','reg',NULL),
('95','like','25,44,26,27,46','1','home',NULL),
('100','mail_statu','1','1','mail',NULL),
('101','sent_type','2','1','mail',NULL),
('102','smtp1','smtp.163.com','1','mail',NULL),
('103','email1','zyfang1115@163.com','1','mail',NULL),
('104','emailPass1','yuanfeng021','1','mail',NULL),
('105','smtp2','smtp.163.com','1','mail',NULL),
('106','email2','zyfang1115@163.com','1','mail',NULL),
('107','emailPass2','yuanfeng021','1','mail',NULL),
('108','smtp3','','1','mail',NULL),
('109','email3','','1','mail',NULL),
('110','emailPass3','','1','mail',NULL),
('111','smtp4','','1','mail',NULL),
('112','email4','','1','mail',NULL),
('113','emailPass4','','1','mail',NULL),
('114','smtp5','','1','mail',NULL),
('115','email5','','1','mail',NULL),
('116','emailPass5','','1','mail',NULL),
('117','smtp6','','1','mail',NULL),
('118','email6','','1','mail',NULL),
('119','emailPass6','','1','mail',NULL),
('120','email','admin@systerm.com','1','module_payment',NULL),
('122','censoruser','','1','reg',NULL),
('123','pwlength','4','1','reg',NULL),
('124','strongpw','a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}','1','reg',NULL),
('125','regctrl','0','1','reg',NULL),
('126','regfloodctrl','0','1','reg',NULL),
('127','ipregctrltime','72','1','reg',NULL),
('128','ipregctrl','','1','reg',NULL)");

clear_table("jz_web_config");

create_table("jz_web_link"," (\n  `linkid` int(4) NOT NULL AUTO_INCREMENT,\n  `name` varchar(20) DEFAULT NULL,\n  `url` varchar(200) DEFAULT NULL,\n  `statu` tinyint(1) NOT NULL DEFAULT '0',\n  `orderid` int(11) NOT NULL DEFAULT '0',\n  `log` varchar(100) DEFAULT NULL,\n  `province` varchar(15) DEFAULT NULL,\n  `city` varchar(15) DEFAULT NULL,\n  `stime` int(11) DEFAULT NULL,\n  `etime` int(11) DEFAULT NULL,\n  `con` text,\n  PRIMARY KEY (`linkid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8");

clear_table("jz_web_link");

 ?>