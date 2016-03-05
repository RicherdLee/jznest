<?php
	
	include_once("$config[webroot]/includes/page_utf_class.php");
	
	if($_GET['operation']=="add" or $_GET['operation']=="edit")
	{
		if($_POST['act'])
		{	
			unset($_GET['operation']);
			unset($_GET['s']);
			unset($_GET['m']);
			//添加
			if($_POST["act"]=='save')
			{
				$sql="insert into  ".GRADE." (name,treatment,logo,valid,sum,rate,create_time,demand,blogo) values ('$_POST[name]','$_POST[treatment]','$_POST[logo]','$_POST[valid]','$_POST[sum]','$_POST[rate]','".time()."','$_POST[demand]','$_POST[blogo]')";
				$db->query($sql);
			}
			
			//修改
			if($_POST["act"]=='edit' and is_numeric($_POST['id']))
			{
				$sql="update ".GRADE." set name='$_POST[name]',treatment='$_POST[treatment]',demand='$_POST[demand]',blogo='$_POST[blogo]',logo='$_POST[logo]',valid='$_POST[valid]',sum='$_POST[sum]',rate='$_POST[rate]' where id='$_POST[id]'";
				$db->query($sql);
				unset($_GET['editid']);
			}
			$getstr=implode('&',convert($_GET));
			msg("?m=member&s=grade.php&$getstr");
		}
		//信息
		if($_GET['editid'] and is_numeric($_GET['editid']))
		{
			$sql="select * from ".GRADE." where id='$_GET[editid]'";
			$db->query($sql);
			$de=$db->fetchRow();
		}
		$tpl->assign("time",time());
	}
	else
	{	
		//删除
		if($_GET['delid'])
		{
			$db->query("delete from ".GRADE." where id='$_GET[delid]'");
			unset($_GET['delid']);
			unset($_GET['s']);
			unset($_GET['m']);
			$getstr=implode('&',convert($_GET));
			msg("?m=member&s=grade.php");
		}
		if($_POST['act']=='op')
		{
			if(is_array($_POST['chk']))
			{
				$id=implode(",",$_POST['chk']);
				$sql="delete from ".GRADE." where id in ($id)";
				$db->query($sql);
			}
			msg("?m=member&s=grade.php");
		}
		
		$sql="select * from ".GRADE." order by id";
		$page = new Page;
		$page->listRows=20;
		//分页
		if (!$page->__get('totalRows'))
		{
			$db->query($sql);
			$page->totalRows = $db->num_rows();
		}
		$sql .= "  limit ".$page->firstRow.",".$page->listRows;
		$db->query($sql);
		$de['list']=$db->getRows();
		$de['page']=$page->prompt();
	}
	$tpl->assign("de",$de);
	$tpl->assign("config",$config);
	$tpl->display("grade.htm");
?>