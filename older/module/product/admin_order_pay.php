<?php
include_once("includes/page_utf_class.php");
include_once("$config[webroot]/module/product/includes/plugin_order_class.php");
$order=new order();
//=======================================
if(!empty($_GET['order_id'])&&is_numeric($_GET['order_id']))
{
	$tpl->assign("de",$de=$order->shop_orderdetail($_GET['order_id']));
	
	if($config['temp']=='wap')
	{
		$s=" and payment_type = 'account' ";
	}
	else
	{
		$sql = "select payment_id,payment_name,payment_type,payment_desc from ".PAYMENT." where payment_id='$de[payment_id]'";
		$db->query($sql);
		$pay = $db->fetchRow();
		$tpl->assign("pay",$pay);
	}
	
	$sql = "select payment_id,payment_type,payment_name from ".PAYMENT." where payment_type!='cards' $s and payment_type != 'cod'";
	$db->query($sql);
	$paymemt = $db->getRows();
	$tpl->assign("paymemt",$paymemt);
	
	if(!$de['id'] and !$pay)
	{
		header("Location: 404.php");
	}
}
else
{
	header("Location: 404.php");
}
//========================================
$tpl->assign("config",$config);
$tpl->assign("lang",$lang);
$output=tplfetch("admin_order_pay.htm");
?>