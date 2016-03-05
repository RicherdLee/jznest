<?php
if(!empty($_POST['time_expand'])&&!empty($_POST['oid'])&&is_numeric($_POST['oid']))
{
	$sql="update ".ORDER." set time_expand ='1' where order_id='$_POST[oid]'";
	$db->query($sql);
}

include_once("$config[webroot]/module/product/includes/plugin_order_class.php");
$order=new order();
//====================应用支付结果==============
if(!empty($_GET['statu'])&&$_GET['statu']==1)
{
	if($_GET['auth']!=md5($config['authkey']))
		die('参数错误');
		
	$sql="update ".ORDER." set status='2',pay_status='2',pay_time=".time()." where order_id='$_GET[id]'";
	$db->query($sql);
	//---------------------付款成功减库存，
	$sql="select pid,num from ".ORPRO." where order_id='$_GET[id]'";
	$db->query($sql);
	$re=$db->getRows();
	foreach($re as $val)
	{		
		if(!empty($val['num']))
		{
			$sql="update ".SETMEAL." set  stock=stock-$val[num] where id=$val[pid]";
			$db->query($sql);
		}
	}
	msg("main.php?m=product&s=admin_orderdetail&id=$_GET[id]");
}
//----------------------------------------------------
if(!empty($_GET['id'])&&is_numeric($_GET['id']))
{
	$tpl->assign("de",$order->shop_orderdetail($_GET['id']));
	$tpl->assign("log",$order->shop_order_log($_GET['id']));
}
//==================================
$tpl->assign("config",$config);
$tpl->assign("lang",$lang);
$output=tplfetch("admin_orderdetail.htm");
?>