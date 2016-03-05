<?php
if($_GET['operation']=="add" or $_GET['operation']=="edit")
{
	if($_POST['act'])
	{	
		include($config['webroot']."/module/logistics/includes/logistics_class.php");
		$logis=new logistics();
		unset($_GET['operation']);
		unset($_GET['s']);
		unset($_GET['m']);
		//添加
		if($_POST["act"]=='save')
		{
			$re=$logis->add_logis();
		}
		//修改
		if($_POST["act"]=='edit' and is_numeric($_POST['id']))
		{
			$re=$logis->edit_logis($_POST['id']);
			unset($_GET['editid']);
		}
		$getstr=implode('&',convert($_GET));
		msg("?m=logistics&s=logistics.php&$getstr");
	}
	//信息
	if($_GET['editid'] and is_numeric($_GET['editid']))
	{
		$sql="select * from ".LGSTEMP." where id='$_GET[editid]'";
		$db->query($sql);
		$de=$db->fetchRow();
		$sql="select * from ".LGSTEMPCON." where temp_id='$de[id]' and define_citys='default'";
		$db->query($sql);
		$ss=$db->fetchRow();
		$de=array_merge($de,$ss);
	}
}
elseif($_GET['operation']=="set")
{
	if($_GET['del'] and is_numeric($_GET['del']))
	{
		$sql="delete from ".LGSTEMPCON." where id = '$_GET[del]'";
		$db->query($sql);
		msg("?m=logistics&s=logistics.php&operation=set&editid=$_GET[editid]");
	}
	if($_POST['act'])
	{
		unset($_GET['s']);
		unset($_GET['m']);
		include($config['webroot']."/module/logistics/includes/logistics_class.php");
		$logis=new logistics();
		$re=$logis->temp_con();
		$getstr=implode('&',convert($_GET));
		msg("?m=logistics&s=logistics.php&$getstr");
	}
	$sql="select * from ".LGSTEMPCON." where temp_id='$_GET[editid]' order by id asc";
	$db->query($sql);
	$de=$db->getRows();
	$tpl->assign("de",$de);
}
else
{
	if($_POST['act'] and is_array($_POST['chk']))
	{
		$id=implode(",",$_POST['chk']);
		if($_POST['act']=='open')
		{
			$db->query("update ".LGSTEMP." set status=1 where id in ($id) ");	
		}
		if($_POST['act']=='close')
		{
			$db->query("update ".LGSTEMP." set status=0 where id in ($id) ");	
		}
		if($_POST['act']=='delete')
		{
			$sql="delete from ".LGSTEMP." where id in ($id)";
			$db->query($sql);
			$sql="delete from ".LGSTEMPCON." where temp_id in ($id)";
			$db->query($sql);
		}
		msg("?m=logistics&s=logistics.php");
	}
	$sql="select * from ".LGSTEMP;
	$db->query($sql);
	$de=$db->getRows();
}
//========================================
$tpl->assign("de",$de);
$tpl->assign("config",$config);
$tpl->display("logistics.htm");
?>