<?php

	if($_POST['act']=="add")
	{
		include_once("$config[webroot]/module/activity/includes/plugin_activity_class.php");
		$activity=new activity();
		$flag=$activity->save_activity_product();
		echo "<script>window.parent.DialogManager.close('activity');</script>";
		msg("?m=activity&s=activity_product_list.php&editid=$_POST[id]");
	}

	//活动产品
	$sql="SELECT id,pic,pname,price,market_price,cost_price,code,amount FROM ".PRO." order by id desc";
	//====================
	include_once("../includes/page_utf_class.php");
	$page = new Page;
	$page->listRows=10;
	if (!$page->__get('totalRows')){
		$db->query($sql);
		$page->totalRows = $db->num_rows();
	}
	$sql .= "  limit ".$page->firstRow.",".$page->listRows;
	$de['page'] = $page->prompt();
	//=====================
	$db->query($sql);
	$de['list']=$db->getRows();
	
	$tpl->assign("de",$de);
	$tpl->assign("config",$config);
	$tpl->display("activity_product.htm");
	
?>