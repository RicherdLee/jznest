<?php
if (!defined('VALIDADMIN')) die ('Access Denied.');

//ɾ�����ݱ�
$setup_query="
DROP TABLE `{$db_prefix}weiboconnect`
";
db_query($setup_query);

remove_module ('weibonav');

?>