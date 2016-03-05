<?php
if (!defined('VALIDADMIN')) die ('Access Denied.');

//安装数据表
$setup_query="
CREATE TABLE `{$db_prefix}weiboconnect` (
  `wcid` int(11) NOT NULL auto_increment,  
  `blogid` text NOT NULL,
  `weiboid` text NOT NULL,
  `weiboname` text NOT NULL,
  `weiboavatar` text NOT NULL,
  PRIMARY KEY  (`wcid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
db_query($setup_query);

add_module ('weibonav.txt');

?>