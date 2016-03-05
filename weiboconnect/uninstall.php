<?php
if (!defined('VALIDADMIN')) die ('Access Denied.');

//ЩОГ§Ъ§ОнБэ
$setup_query="
DROP TABLE `{$db_prefix}weiboconnect`
";
db_query($setup_query);

remove_module ('weibonav');

?>