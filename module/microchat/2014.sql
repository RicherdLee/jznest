-- ecshop v2.x SQL Dump Program
-- http://www.yong315.com
-- 
-- DATE : 2014-06-11 00:50:20
-- MYSQL SERVER VERSION : 5.1.63
-- PHP VERSION : 5.2.17p1
-- ECShop VERSION : v2.7.3
-- Vol : 1
DROP TABLE IF EXISTS `jz_weixin_bonus`;
CREATE TABLE `jz_weixin_bonus` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `type_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_bonus` ( `id`, `type_id` ) VALUES  ('1', '4');
DROP TABLE IF EXISTS `jz_weixin_cfg`;
CREATE TABLE `jz_weixin_cfg` (
  `cfg_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `cfg_name` varchar(64) NOT NULL DEFAULT '',
  `cfg_value` varchar(100) NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`cfg_id`),
  UNIQUE KEY `cfg_name` (`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_cfg` ( `cfg_id`, `cfg_name`, `cfg_value`, `autoload` ) VALUES  ('1', 'murl', 'mobile/', 'yes');
INSERT INTO `jz_weixin_cfg` ( `cfg_id`, `cfg_name`, `cfg_value`, `autoload` ) VALUES  ('2', 'baseurl', 'http://i.god580.com/', 'yes');
DROP TABLE IF EXISTS `jz_weixin_config`;
CREATE TABLE `jz_weixin_config` (
  `id` int(1) NOT NULL,
  `token` varchar(100) NOT NULL,
  `appid` char(18) NOT NULL,
  `appsecret` char(32) NOT NULL,
  `access_token` char(150) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_config` ( `id`, `token`, `appid`, `appsecret`, `access_token`, `dateline` ) VALUES  ('1', 'xiang', 'wx6f2', '315c68c2a', '', '1386912383');
DROP TABLE IF EXISTS `jz_weixin_keywords`;
CREATE TABLE `jz_weixin_keywords` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `contents` text NOT NULL,
  `pic` varchar(80) NOT NULL,
  `pic_tit` varchar(80) NOT NULL,
  `desc` text NOT NULL,
  `pic_url` varchar(80) NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('90', '帮助', 'help', '1', '乐儿：亲，如果想买【商品信息】里没有。\r\n输入【XX】XX表示您想购买东西的关键字\r\n如果您更喜欢传统的网页购物，请点击<a href=\"http://www.leerfa.com\">触屏版购物</a>\r\n--------其他帮助-------\r\n输入【积分规则】查看积分获取规则\r\n', '', '', '', '', '129', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('109', '帮助中文', '帮助', '1', '乐儿：亲，如果想买【商品信息】里没有。\r\n输入【XX】XX表示您想购买东西的关键字\r\n如果您更喜欢传统的网页购物，请点击<a href=\"http://www.leerfa.com\">触屏版购物</a>\r\n--------其他帮助-------\r\n输入【积分规则】查看积分获取规则\r\n', '', '', '', '', '1', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('91', '你好', '你好', '1', '乐儿：您好，我是聚天地之灵气，集万物之精华……（此处略去3万字）【乐儿发官方唯一客服】乐儿，有什们可以帮您的吗？\r\n', '', '', '', '', '10', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('100', '图文消息测试', '图文消息', '2', '', '4.jpg', '图文消息的测试标题', '资料显示，华数集团是由杭州文广集团、浙江广电集团等投资设立的大型国有文化传媒产业集团。在新媒体产业，华数集团旗下控股的上市公司华数传媒控股股份有限公司拥有上百万小时的数字媒体内容库、数千万台互联网电视终端，新媒体全业务运营牌照。', 'http://tech.sina.com.cn/i/2014-04-08/18199305530.shtml', '71', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('105', '文本消息测试', '文本消息', '1', '近年来，公开选拔和竞争上岗作为干部人事制度改革的重要举措，在拓宽选人视野，打破论资排辈等不少方面积极作用明显。“但走向极端就会出现问题，比如一些地方规定公开选拔和竞争上岗人员必须达到干部任用的多少比例，甚至进一步绝对化为‘凡提必竞’。”中央党校教授辛鸣说。', '', '', '', '', '66', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('106', '刮刮卡', '刮刮卡', '2', '', '', '刮刮卡', '刮刮卡', 'http://wy.leerfa.com/index.php?g=Wap&m=Guajiang&a=index&token=miltbm1399438728&t', '8', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('107', '公司最新公告', '公司公告', '2', '', '1399434076105576057.jpg', '诚招学生商家', '诚招学生商家，乐儿发官方网店诚招学生商家，无论你是卖衣服的还是卖鞋子的，我们在这里免费招募网店商家，免费提供你的商品宣传单。期待合作，创业不易，精诚互助！【想成为学生供货商，请输入：高山流水】', '', '18', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('108', '订阅号活动', '订阅号活动', '1', '参与活动，请先关注订阅号：leerfa-dy\r\n------进行中---------\r\n活动一：刮刮卡 每人一次哦，100张刮刮卡，刮完就没了哦!中奖率10%哦\r\n------即将开始---------\r\n活动二：砸金蛋 \r\n------即将开始---------\r\n活动三：幸运大专轮\r\n------即将开始---------\r\n活动四：微调查', '', '', '', '', '7', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('110', '聊天回复', '聊天', '1', '乐儿：亲，您是要跟我聊天吗？这不好吧？我爸比(程序猿)跟我说：\"我是我们公司的唯一的客服，每个人都需要我的帮助，没时间跟亲聊天的呢！偷偷告诉亲呦，爸比说，如果我聊多了会显得爸比IQ很低的样子哦。\" 嘻嘻！', '', '', '', '', '1', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('111', '高山流水', '高山流水', '1', '乐儿：觅知音。\r\n有缘人，您好！乐儿等您等好久勒！\r\n有缘人，您是想成为供货商，首先请确定您是学生呦！\r\n如果您是学生的话请填写注册一下信息哦\r\n请确保信息真实行，不然爸比（程序猿）要联系不到您的哦\r\n\r\n<a href=\"http://wy.leerfa.com/index.php?m=Index&a=reg\">立即填写</a>', '', '', '', '', '4', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('113', '官方淘宝店', '淘宝', '1', 'http://shop110762202.taobao.com\r\n由于“一槽不容二马” 微信与淘宝已成水火，亲，请复制链接用其他的浏览器打开。', '', '', '', '', '7', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('118', '下载', '下载', '1', '安卓APP下载\r\nhttp://www.leerfa.com/download/leerfa_app.apk', '', '', '', '', '1', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('114', '淘宝店', '淘', '1', 'http://shop110762202.taobao.com\r\n由于“一槽不容二马” 微信与淘宝已成水火，亲，请复制链接用其他的浏览器打开。', '', '', '', '', '3', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('115', '淘', '淘宝店', '1', 'http://shop110762202.taobao.com\r\n由于“一槽不容二马” 微信与淘宝已成水火，亲，请复制链接用其他的浏览器打开。\r\nhttp://auction1.paipai.com/02383B26000000000401000034330569', '', '', '', '', '1', '1');
INSERT INTO `jz_weixin_keywords` ( `id`, `name`, `keyword`, `type`, `contents`, `pic`, `pic_tit`, `desc`, `pic_url`, `count`, `status` ) VALUES  ('117', 'APP下载', 'APP下载', '1', 'APP下载\r\nhttp://www.leerfa.com/download/leerfa_app.apk', '', '', '', '', '2', '1');
DROP TABLE IF EXISTS `jz_weixin_lang`;
CREATE TABLE `jz_weixin_lang` (
  `lang_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(64) NOT NULL,
  `lang_value` text NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_lang` ( `lang_id`, `lang_name`, `lang_value` ) VALUES  ('1', 'regmsg', '欢迎关注乐儿发电子商务有限公司官方微信服务平台！\r\n');
DROP TABLE IF EXISTS `jz_weixin_menu`;
CREATE TABLE `jz_weixin_menu` (
  `cat_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL DEFAULT '',
  `cat_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `weixin_key` varchar(255) NOT NULL DEFAULT '',
  `links` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `weixin_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`),
  KEY `cat_type` (`cat_type`),
  KEY `sort_order` (`sort_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('43', '热卖商品', '1', '', 'hot', '', '50', '0', '38');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('44', '促销活动', '1', '', 'promote', '', '50', '0', '38');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('38', '商品信息', '1', '', 'shop', '', '1', '0', '0');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('39', '会员功能', '1', '', 'member', 'http://www.mb5.com.cn', '2', '0', '0');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('40', '更多..', '1', '', 'more', '', '3', '0', '0');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('41', '新品上市', '1', '', 'new', '', '50', '0', '38');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('42', '精品推荐', '1', '', 'best', '', '50', '0', '38');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('46', '重新绑定', '1', '', 'cxbd', '', '5', '0', '39');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('47', '会员中心', '1', '', 'member', '', '4', '0', '39');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('48', '帮助', '1', '帮助', 'help', '', '3', '0', '40');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('49', '首页', '1', '', '', 'http://www.leerfa.com', '2', '1', '40');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('50', '订阅号活动', '1', '', '订阅号活动', '', '5', '0', '40');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('51', '最新公司公告', '1', '', '公司公告', '', '4', '0', '40');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('52', '订单查询', '1', '', 'ddcx', '', '2', '0', '39');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('53', '快递查询', '1', '', 'kdcx', '', '3', '0', '39');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('54', '帐户资金', '1', '', 'jfcx', '', '1', '0', '39');
INSERT INTO `jz_weixin_menu` ( `cat_id`, `cat_name`, `cat_type`, `keywords`, `weixin_key`, `links`, `sort_order`, `weixin_type`, `parent_id` ) VALUES  ('55', '签到', '1', '', 'qiandao', '', '1', '0', '40');
DROP TABLE IF EXISTS `jz_weixin_point`;
CREATE TABLE `jz_weixin_point` (
  `point_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `point_name` varchar(64) NOT NULL DEFAULT '',
  `point_value` int(3) unsigned NOT NULL,
  `point_num` int(3) NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`point_id`),
  UNIQUE KEY `option_name` (`point_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('1', 'new', '10', '1', 'yes');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('2', 'best', '10', '1', 'yes');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('3', 'hot', '10', '1', 'yes');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('4', 'cxbd', '10', '1', 'no');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('5', 'ddcx', '10', '1', 'no');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('6', 'kdcx', '10', '1', 'no');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('8', 'qiandao', '20', '1', 'yes');
INSERT INTO `jz_weixin_point` ( `point_id`, `point_name`, `point_value`, `point_num`, `autoload` ) VALUES  ('11', 'promote', '10', '1', 'yes');
DROP TABLE IF EXISTS `jz_weixin_point_record`;
CREATE TABLE `jz_weixin_point_record` (
  `pr_id` int(7) NOT NULL AUTO_INCREMENT,
  `wxid` char(28) NOT NULL,
  `point_name` varchar(64) NOT NULL,
  `num` int(5) NOT NULL,
  `lasttime` int(10) NOT NULL,
  `datelinie` int(10) NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_point_record` ( `pr_id`, `wxid`, `point_name`, `num`, `lasttime`, `datelinie` ) VALUES  ('39', 'of5p2t4y2oU5CEzWNGXNdZVnX2Q4', 'hot', '1', '1402388237', '1402039306');
DROP TABLE IF EXISTS `jz_weixin_user`;
CREATE TABLE `jz_weixin_user` (
  `uid` int(7) NOT NULL AUTO_INCREMENT,
  `subscribe` tinyint(1) unsigned NOT NULL,
  `wxid` char(28) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `headimgurl` varchar(200) NOT NULL,
  `subscribe_time` int(10) unsigned NOT NULL,
  `localimgurl` varchar(200) NOT NULL,
  `setp` smallint(2) unsigned NOT NULL,
  `uname` varchar(50) NOT NULL,
  `coupon` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_weixin_user` ( `uid`, `subscribe`, `wxid`, `nickname`, `sex`, `city`, `country`, `province`, `language`, `headimgurl`, `subscribe_time`, `localimgurl`, `setp`, `uname`, `coupon` ) VALUES  ('348', '0', 'of5p2t4y2oU5CEzWNGXNdZVnX2Q4', '', '0', '', '', '', '', '', '0', '', '3', 'weixin348', '1005023937');
DROP TABLE IF EXISTS `jz_wholesale`;
CREATE TABLE `jz_wholesale` (
  `act_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `rank_ids` varchar(255) NOT NULL,
  `prices` text NOT NULL,
  `enabled` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`act_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `jz_wholesale` ( `act_id`, `goods_id`, `goods_name`, `rank_ids`, `prices`, `enabled` ) VALUES  ('1', '21', '金立 A30', '1,2', 'a:1:{i:0;a:2:{s:4:\"attr\";a:1:{i:120;s:1:\"0\";}s:7:\"qp_list\";a:2:{i:0;a:2:{s:8:\"quantity\";i:50;s:5:\"price\";d:1700;}i:1;a:2:{s:8:\"quantity\";i:100;s:5:\"price\";d:1680;}}}}', '1');
-- END ecshop v2.x SQL Dump Program 