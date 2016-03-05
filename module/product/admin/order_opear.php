<?php
include_once("../module/product/includes/plugin_order_class.php");
include("../lang/cn/company_type_config.php");
$order = new order;
//=======================
if($_POST['act']=='edit'&&$_POST['id']&&is_numeric($_POST['id']))
{	
	$time=time();
	$sql = "select title from ".LGSTEMP." where id = '$_POST[shipping_id]'";
	$db->query($sql);
	$ship = $db->fetchRow();
	
	$sql = "select payment_name,payment_type from ".PAYMENT." where payment_id='$_POST[payment_id]'";
	$db->query($sql);
	$pay = $db->fetchRow();
	
	$cost=$_POST['rebate']*1+$_POST['money']*1;
	$money=$_POST['rebate']*1+$_POST['money']*1+$_POST['freight']*1;
	$shipstr=$str=$_POST['ship_name']?",ship_name='$_POST[ship_name]'":"";
	$shipstr.=$str.=$_POST['ship_addr']?",ship_addr='$_POST[ship_addr]'":"";
	$shipstr.=$str.=$_POST['ship_tel']?",ship_tel='$_POST[ship_tel]'":"";
	$shipstr.=$str.=$_POST['ship_mobile']?",ship_mobile='$_POST[ship_mobile]'":"";
	$shipstr.=$_POST['freight']?",money='$_POST[freight]'":"";
	$str.=$_POST['freight']?",freight='$_POST[freight]'":"";
	$str.=$_POST['weight']?",weight='$_POST[weight]'":"";
	$payment_type=$pay['payment_type']!="cod"?"online":"offline";
	
	$sql="update ".ORDER." set payment_id='$_POST[payment_id]',shipping_id='$_POST[shipping_id]',shipping_name='$ship[title]',payment_name='$pay[payment_name]',cost='$cost' $str where order_id='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="update ".ORDERDELIVERY." set shipping_id='$_POST[shipping_id]',shipping_name='$ship[title]' $shipstr where order_id='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="update ".ORDERPAYMENT." set payment_id='$_POST[payment_id]',payment_name='$pay[payment_name]',payment_type='$payment_type',money='$money' $paystr where order_id='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="update ".CASHFLOW." set price='-$money' where seller_email!='' and order_id ='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="update ".CASHFLOW." set price='$money' where buyer_email!='' and order_id ='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="SELECT id,user FROM ".ADMIN." WHERE user='$_SESSION[ADMIN_USER]'";
	$db->query($sql);
	$re=$db->fetchRow();
	$order->order_log($_POST['id'],'订单编辑','编辑',$re['id'],$re['user']);
	die;
}
if($_POST['act']=='pay'&&$_POST['id']&&is_numeric($_POST['id']))
{	
	$time=time();
	$sql = "select payment_name,payment_type from ".PAYMENT." where payment_id='$_POST[payment_id]'";
	$db->query($sql);
	$pay = $db->fetchRow();
	$payment_type=$pay['payment_type']!="cod"?"online":"offline";
	
	$order->set_order_statu($_POST['id'],2,$_SESSION['ADMIN_USER']);
	
	$sql="update ".ORDER." set pay_status='2',payment_id='$_POST[payment_id]',payment_name='$pay[payment_name]' where order_id='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="update ".ORDERPAYMENT." set payment_id='$_POST[payment_id]',payment_name='$pay[payment_name]',payment_type='$payment_type' where order_id='".$_POST['id']."'";
	$db->query($sql);
	die;
}
if($_POST['act']=='ship'&&$_POST['id']&&is_numeric($_POST['id']))
{	
	$time=time();
	$str=$_POST['shipping_no']?",shipping_no='$_POST[shipping_no]'":"";
	$str.=$_POST['ship_name']?",ship_name='$_POST[ship_name]'":"";
	$str.=$_POST['ship_addr']?",ship_addr='$_POST[ship_addr]'":"";
	$str.=$_POST['ship_tel']?",ship_tel='$_POST[ship_tel]'":"";
	$str.=$_POST['ship_mobile']?",ship_mobile='$_POST[ship_mobile]'":"";

	$order->set_order_statu($_POST['id'],3);

	$sql="update ".ORDER." set status=3,ship_status=2,ship_time='$time' $str where order_id='".$_POST['id']."'";
	$db->query($sql);
	
	$sql="update ".ORDERDELIVERY." set status=2 $str where order_id='".$_POST['id']."'";
	$db->query($sql);
	$order->order_log($_POST['id'],'订单发货完成,物流单号:'.$_POST['shipping_no'].'','发货','',$_SESSION['ADMIN_USER']);
	die;
}
if($_POST["act"]=='cancel'&&is_numeric($_POST['id']))
{
	$time=time();
	$admin_remark=$_POST['other_reason']?$_POST['admin_remark']." ".$_POST['other_reason']:$_POST['admin_remark'];
	
	$order->set_order_statu($_POST['id'],0,$_SESSION['ADMIN_USER']);
	
	$sql="update ".ORDER." set admin_remark='$admin_remark' where order_id ='".$_POST['id']."'";
	$db->query($sql);
	die;
}
if(!empty($_GET['type']) and !empty($_GET['orderid']) and is_numeric($_GET['orderid']))
{
	if($_POST['act'])
	{	
		unset($_GET['s']);
		unset($_GET['m']);
		$time=time();
		//修改
		if($_POST["act"]=='shipping' and is_numeric($_POST['id']))
		{
			$sql="update ".ORDER." set shipping_name='$_POST[shipping_name]',shipping_address='$_POST[t] $_POST[shipping_address]',shipping_tel='$_POST[shipping_tel]',shipping_company='$_POST[shipping_company]',shipping_code='$_POST[shipping_code]',status='3',shipping_status='2',shipping_time='$time' where order_id='".$_POST['id']."'";
			$db->query($sql);
			unset($_GET['oid']);
		}
		if($_POST["act"]=='cancel' and is_numeric($_POST['id']))
		{
			$admin_remark=$_POST['other_reason']?$_POST['admin_remark']." ".$_POST['other_reason']:$_POST['admin_remark'];
			
			$sql="update ".ORDER." set admin_remark='$admin_remark',status='0',finished_time='$time' where order_id ='".$_POST['id']."'";
			$db->query($sql);
			
			unset($_GET['oid']);
		}
		if($_POST["act"]=='receipt' and is_numeric($_POST['id']))
		{
			$sql="update ".ORDER." set status='4',finished_time='$time' where order_id ='".$_POST['id']."'";
			$db->query($sql);
			unset($_GET['oid']);
		}
		msg("?m=product&s=order.php");
	}
	switch($_GET['type'])
	{
		case "edit":
		{
			$de=$order->shop_orderdetail($_GET['orderid']);
			$tpl->assign("de",$de);
			if($de['status']==1&&$de['pay_status']==1)
			{
				$sql = "select id,title from ".LGSTEMP;
				$db->query($sql);
				$ship = $db->getRows();
				$tpl->assign("ship",$ship);
				$sql = "select payment_id,payment_name from ".PAYMENT." where payment_type!='cards'";
				$db->query($sql);
				$pay = $db->getRows();
				$tpl->assign("pay",$pay);
			}
			$page="order_edit.htm";
			break;
		}
		case "pay":
		{
			$de=$order->shop_orderdetail($_GET['orderid']);
			$tpl->assign("de",$de);
			if($de['status']==1&&$de['pay_status']==1)
			{
				$sql = "select payment_id,payment_name from ".PAYMENT." where payment_type!='cards'";
				$db->query($sql);
				$pay = $db->getRows();
				$tpl->assign("pay",$pay);
			}
			$page="order_pay.htm";
			break;
		}
		case "ship":
		{
			$de=$order->shop_orderdetail($_GET['orderid']);
			$tpl->assign("de",$de);
			$page="order_ship.htm";
			break;
		}
		case "finish":
		{
			$page="";
			break;
		}
		case "cancel":
		{
			$de=$order->shop_orderdetail($_GET['orderid']);
			$tpl->assign("de",$de);
			$page="order_cancel.htm";
			break;
		}
		default:
		{
			break;
		}
	}
	$tpl->assign("config",$config);
	$tpl->display($page);
}
?>