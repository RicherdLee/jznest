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
	$str.=" and  order_id like '$_GET[code]%' ";	
}
if(isset($_GET['status']) and is_numeric($_GET['status']))
{
	$status=$_GET['status']-1;
	$str.=" and  status ='$status' ";	
}
if($_GET['user'])
{
	$str.=" and user like '%$_GET[user]%' ";
}
if($_GET['ship_name'])
{
	$str.=" and ship_name like '%$_GET[ship_name]%' ";
}
if($_GET['ship_addr'])
{
	$str.=" and ship_addr like '%$_GET[ship_addr]%' ";
}
if($_GET['order_ship_status'])
{
	$str.=" and ship_status = '$_GET[order_ship_status]' ";
}
if($_GET['order_pay_status'])
{
	$str.=" and pay_status = '$_GET[order_pay_status]' ";
}
if($_GET['pay'])
{
	$str.=" and payment_id = '$_GET[pay]' ";
}
if($_GET['ship'])
{
	$str.=" and shipping_id  = '$_GET[ship]' ";
}
if($_GET['maxp'])
{
	$str.=" and cost+freight <= '$_GET[maxp]' ";
}
if($_GET['minp'])
{
	$str.=" and cost+freight >= '$_GET[minp]' ";
}
$sql="select pay_status,freight,payment_name,shipping_name,ship_status,order_id,ship_name,cost,a.status,create_time,user from ".ORDER." a left join ".MEMBER." b on a.member_id=b.userid where 1 $str order by id desc";
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
foreach($ss as $k)
{
	$k['sum']=$k['cost']+$k['freight'];
	$k['statu_text']=$order->get_shop_order_statu($k['status']);
	$k['order_pay_status']=$order_pay_status[$k['pay_status']-1];
	$k['order_ship_status']=$order_ship_status[$k['ship_status']-1];
	$list[]=$k;
}
$de["list"]=$list;
$tpl->assign("order_shop_status",$order_shop_status);
$tpl->assign("order_ship_status",$order_ship_status);
$tpl->assign("order_pay_status",$order_pay_status);
$tpl->assign("de",$de);
$sql = "select id,title from ".LGSTEMP;
$db->query($sql);
$ship = $db->getRows();
$tpl->assign("ship",$ship);
$sql = "select payment_id,payment_name from ".PAYMENT;
$db->query($sql);
$pay = $db->getRows();
$tpl->assign("pay",$pay);
$tpl->assign("config",$config);
$tpl->display("order.htm");

?>