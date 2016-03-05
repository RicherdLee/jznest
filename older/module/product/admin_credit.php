<?php
	include_once("$config[webroot]/module/product/includes/plugin_credit_class.php");
	$credit=new credit();
	
	//删除中评 差评
	if(is_numeric($_GET['id']))
	{
		$sql="select goodbad,fromid,pid from ".PCOMMENT." where id='$_GET[id]'";
		$db->query($sql);
		$re=$db->fetchRow();
		if($re)
		{
			if($re['goodbad']=="-1")
			{
				$db->query("update ".SETMEAL." set goodbad=goodbad+1 where id='".$re['pid']."'");
				$db->query($sql);
			}
			
			$sql="delete from ".PCOMMENT." where id='$_GET[id]'";
			$db->query($sql);	
			$admin->msg("main.php?m=product&s=admin_credit");
		}
		else
		{
			$admin->msg("main.php?m=product&s=admin_credit",'数据不存在','failure');	
		}
	}
	//获取当前用户评论
	$sql="select id,goodbad,uptime,con,user,userid,pid,pname,fromid as uid,price from ".PCOMMENT." where userid='$buid' order by uptime desc";	
	
	/**************************************/
	include_once("includes/page_utf_class.php");
	$page = new Page;
	$page->listRows=20;
	if (!$page->__get('totalRows')){
		$db->query($sql);
		$page->totalRows = $db->num_rows();
	}
	$sql .= "  limit ".$page->firstRow.",20";
	$db->query($sql);
	$re["page"]=$page->prompt();
	/**************************************/
	$re["list"]=$db->getRows();
	$tpl->assign("re",$re);

	$tpl->assign("config",$config);
	$tpl->assign("lang",$lang);
	$output=tplfetch("admin_credit.htm");
?>