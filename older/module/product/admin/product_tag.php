<?php

	//删除
	if($_GET['delid'])
	{
		$sql="delete from ".TAG."  where id='$_GET[delid]'";
		$db->query($sql);
		msg("?m=product&s=product_tag.php");
	}
	if($_POST['act']=='op')
	{
		if(is_array($_POST['chk']))
		{
			$id=implode(",",$_POST['chk']);
			$sql="delete from ".TAG." where id in ($id)";
			$db->query($sql);
		}
					
		if($_POST['name'])
		{
			foreach($_POST['name'] as $key=>$list)
			{
				if(!empty($list))
				{
					$logo=$_POST['logo'][$key];
					$logo=$logo?$logo:"";
					$db->query("update ".TAG." set name='$list',logo='$logo' where id='$key'");		
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
					$logo=$_POST['newlogo'][$key];
					$logo=$logo?$logo:"";
					$inserts[]="('$list','$logo')";	
				}
			}
			if(!empty($inserts))
			{
				$sql="insert into ".TAG." (`name`,`logo`) values ".implode(",",$inserts);
				$db->query($sql);
			}
		}
		msg("?m=product&s=product_tag.php");
	}
	$sql="SELECT * FROM ".TAG;
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
	$tpl->display("product_tag.htm");
?>