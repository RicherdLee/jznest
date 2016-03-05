<?php
include_once("../includes/page_utf_class.php");
include_once("../module/product/includes/plugin_order_class.php");
include("../lang/cn/company_type_config.php");
$order = new order;
//=======================
if(isset($_GET['orderid'])&&is_numeric($_GET['orderid']))
{
	$order->set_order_statu($_GET['orderid'],4,$_SESSION['ADMIN_USER']);
	msg("module.php?m=product&s=order.php");
}
if($_GET['code'])
{
	$str=" and  order_id like '$_GET[code]%' ";	
}

$sql="select * from ".ORDERPAYMENT." where 1 $str order by id desc";
//=============================
$page = new Page;
$page->listRows=20;
if (!$page->__get('totalRows')){
	$db->query($sql);
	$de['count']=$page->totalRows = $db->num_rows();
}
$de['count']=$de['count']?$de['count']:$_GET['totalRows'];
$sql .= "  limit ".$page->firstRow.",".$page->listRows;
$de['page'] = $page->prompt();
//=============================
$db->query($sql);
$ss=$db->getRows();
$ipfile="../lib/tinyipdata.dat";
foreach($ss as $k)
{
	$k['order_pay_status']=$order_pay_status[$k['status']-1];
	$k['IP']=convertip($k['ip'], $ipfile);
	$list[]=$k;
}
$de["list"]=$list;
$tpl->assign("order_shop_status",$order_shop_status);
$tpl->assign("de",$de);
$tpl->assign("config",$config);
$tpl->display("order_payment.htm");

?>