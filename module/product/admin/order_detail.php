<?php
include_once("$config[webroot]/module/product/includes/plugin_order_class.php");
$order=new order();
if($_GET['operation']=='log')
	$de=$order->shop_order_log($_GET['oid']);
else
	$de=$order->shop_orderdetail($_GET['oid']);
$tpl->assign("de",$de);
$tpl->assign("config",$config);
$tpl->display("order_detail.htm");
?>