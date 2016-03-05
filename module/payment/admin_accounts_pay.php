<?php
include_once("module/payment/includes/payment_class.php");
$payment=new payment();

if(!empty($_GET['order_id'])&&is_numeric($_GET['order_id'])&&!empty($_GET['payment'])&&is_numeric($_GET['payment']))
{
	$sql = "select payment_type from ".PAYMENT." where payment_id='$_GET[payment]'";
	$db->query($sql);
	$pay = $db->fetchRow();
	
	$sql="select price from ".CASHFLOW." where order_id='$_GET[order_id]' and pay_uid='".$payment->pay_uid."'";
	$db->query($sql);
	$price=$db->fetchField('price');
	$price=$price*-1;
	if($pay['payment_type'] and $price){
		$_POST['id']=$_GET['order_id'];
		$_POST['payment_type']=$pay['payment_type'];
		$_POST['amount']=$price;
	}
}
//==================================
if(!empty($_POST['amount']) or (!empty($_POST['card_num']))&&!empty($_POST['password']))
{
	$payment->online_pay();
}
$tpl->assign("re",$payment->payment_pay());

//==================================
$tpl->assign("config",$config);
$tpl->assign("lang",$lang);
$output=tplfetch("admin_accounts_pay.htm");
?>