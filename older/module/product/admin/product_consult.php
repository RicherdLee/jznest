<?php
	
	if($_GET['operation']=='cat')//分类
	{
		if($_GET['delid'])
		{
			$sql="delete from ".CONSULTCAT." where id='$_GET[delid]'";
			$db->query($sql);
			msg("?m=product&s=product_consult.php&operation=cat");
		}
		$sql="select * from ".CONSULTCAT." order by id desc";
		$db->query($sql);
		$de=$db->getRows();
	}
	elseif($_GET['operation']=='cat_edit')
	{
		if($_POST['act'])
		{
			$_POST['type']=$_POST['type']?'1':'0';
			if($_POST['act']=='save')
			{
				$sql="insert into ".CONSULTCAT." (`name`,type,con) values ('$_POST[name]','$_POST[type]','$_POST[con]')";
				
			}
			if($_POST['act']=='edit')
			{
				$sql="update ".CONSULTCAT." set name='$_POST[name]',type='$_POST[type]',con='$_POST[con]' where id='$_POST[id]'";		
			}
			if($sql)
			{
				$db->query($sql);
				msg("?m=product&s=product_consult.php&operation=cat");
			}
			
		}	
		if($_GET['editid'] and is_numeric($_GET['editid']))
		{
			$sql="select * from ".CONSULTCAT." where id='$_GET[editid]'";
			$db->query($sql);
			$de=$db->fetchRow();
		}
	}
	elseif($_GET['operation']=='edit')
	{
		if($_POST['act'])
		{	
			unset($_GET['operation']);
			unset($_GET['s']);
			unset($_GET['m']);
			
			if($_POST["act"]=='edit' and is_numeric($_POST['id']))
			{
				$_POST['answer']=htmlspecialchars($_POST["answer"]);
				if($_POST['answer'])
				{
					$sql="update ".CONSULT." set answer_name='$_SESSION[ADMIN_USER]',answer_time='".time()."',answer='$_POST[answer]',status='2' where id='$_POST[id]'";
					$db->query($sql);
				}
				unset($_GET['editid']);
			}
			msg("?m=product&s=product_consult.php");
		}
		
		if($_GET['editid'] and is_numeric($_GET['editid']))
		{
			$sql="select * from ".CONSULT." where id='$_GET[editid]'";
			$db->query($sql);
			$de=$db->fetchRow();
		}
	}
	else
	{
		if($_POST['act']=='op')
		{
			if(is_array($_POST['chk']))
			{
				$id=implode(",",$_POST['chk']);
				$sql="delete from ".CONSULT." where id in ($id)";
				$db->query($sql);
				msg("?m=product&s=product_consult.php");
			}
		}
		if($_GET['name'])
		{
			$psql=" and product_name like '%$_GET[name]%' ";	
		}
		if($_GET['key'])
		{
			$psql=" and question like '%$_GET[key]%' ";	
		}
		if($_GET['catid'] and is_numeric($_GET['catid']))
		{
			$psql=" and catid = '$_GET[catid]' ";	
		}
		if($_GET['id'] and is_numeric($_GET['id']))
		{
			$psql=" and product_id = '$_GET[id]' ";	
		}
		if($_GET['status'] and is_numeric($_GET['status']))
		{
			$psql=" and status = '$_GET[status]' ";	
		}
		include_once($config['webroot']."/module/product/includes/plugin_consult_class.php");
		
		$consult=new consult();
		$tpl->assign("consultcat",$consult->get_consult_cat());
		$sql="select * from ".CONSULT." where 1 $psql order by question_time desc";
	
		//====================
		include_once("../includes/page_utf_class.php");
		$page = new Page;
		$page->listRows=10;
		if (!$page->__get('totalRows')){
			$db->query($sql);
			$page->totalRows = $db->num_rows();
		}
		$sql .= "  limit ".$page->firstRow.",".$page->listRows;
		//=====================
		$db->query($sql);
		$de['list']=$db->getRows();
		foreach($de['list'] as $k=>$v)
		{
			$sqls="select pname,price,id,stock from ".SETMEAL." where id='$v[product_id]'";
			$db->query($sqls);
			$c[$v['product_id']]=$db->fetchRow();
		}
		foreach($de['list'] as $k=>$v)
		{
			$c[$v['product_id']]['consult'][]=$v;
		}
		$de['list']=$c;
		$de['page'] = $page->prompt();
		unset($_GET['operation']);
		$tpl->assign("url",'&'.implode('&',convert($_GET)));
	}	
	$tpl->assign("de",$de);
	$tpl->assign("config",$config);
	$tpl->display("product_consult.htm");
?>