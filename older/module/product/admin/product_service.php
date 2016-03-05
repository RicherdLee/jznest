<?php

	//删除
	if($_GET['delid'])
	{
		$sql="delete from ".SERVICE."  where id='$_GET[delid]'";
		$db->query($sql);
		msg("?m=product&s=product_service.php");
	}
	if($_POST['act']=='op')
	{
		if(is_array($_POST['chk']))
		{
			$id=implode(",",$_POST['chk']);
			$sql="delete from ".SERVICE." where id in ($id)";
			$db->query($sql);
		}
					
		if($_POST['name'])
		{
			foreach($_POST['name'] as $key=>$list)
			{
				if(!empty($list))
				{
					$price=$_POST['price'][$key];
					$price=$price?$price*1:"0.00";
					$db->query("update ".SERVICE." set name='$list',price='$price',type='1' where id='$key'");		
				}
			}
		}
		if(!empty($_POST['newname']))
		{
			$inserts=array();
			foreach($_POST['newname'] as $key=>$list)
			{
				if(!empty($list))
				{
					$price=$_POST['newprice'][$key];
					$price=$price?$price*1:"0.00";
					$inserts[]="('$list','$price','1')";	
				}
			}
			if(!empty($inserts))
			{
				$sql="insert into ".SERVICE." (`name`,`price`,`type`) values ".implode(",",$inserts);
				$db->query($sql);
			}
		}
		msg("?m=product&s=product_service.php");
	}
	
	$sql="SELECT * FROM ".SERVICE." order by id desc";
	//====================
	include_once("../includes/page_utf_class.php");
	$page = new Page;
	$page->listRows=20;
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
	$tpl->display("product_service.htm");

?>