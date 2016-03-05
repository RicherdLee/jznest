<?php
	
	
	include_once("$config[webroot]/module/logistics/includes/logistics_class.php");
	$logistics=new logistics();
	$sql = "select payment_id,payment_name,payment_desc,payment_type from ".PAYMENT." where payment_type!='cards' and active=1 order by payment_id desc";
	$db->query($sql);
	$pay = $db->getRows();
	$tpl->assign("pay",$pay);
	
	$city=getdistrictname($city);
	$sql = "select id,type,title,`desc` from ".LGSTEMP." where status=1";
	$db->query($sql);
	$ship = $db->getRows();
	foreach($ship as $key=>$val)
	{
		$ship[$key]['price']=$logistics->count_freight($val['id'],$city,$sumprice,$weight);
	}
	$tpl->assign("ship",$ship);
	
	$tpl->assign("config",$config);
	$out=tplfetch("payment.htm",$flag,true);	
	
		
		
		
		
	
	
?>
               