<?php
	
	if($_POST['act']=='op')
	{
		if(is_array($_POST['chk']))
		{
			$id=implode(",",$_POST['chk']);
			$sql="delete from ".PRO." where id in ($id)";
			$db->query($sql);
			$sql="delete from ".SETMEAL." where pid in ($id)";
			$db->query($sql);
			$sql="delete from ".PRODETAIL." where proid in ($id)";
			$db->query($sql);
			msg("?m=product&s=product.php");
		}
	}
	if($_GET['name'])
	{
		$psql=" and a.pname like '%$_GET[name]%' ";	
	}
	if($_GET['code'])
	{
		$psql=" and a.code = '$_GET[code]'";	
	}
	$sql="SELECT a.id,b.id as pid,a.pic,a.pname,a.brand,a.price,a.market_price,a.cubage,a.uptime,a.code,a.amount,a.catid FROM ".PRO." a left join ".SETMEAL." b on a.id = b.pid WHERE 1 $psql group by pid order by a.id desc";
	//====================
	include_once("../includes/page_utf_class.php");
	$page = new Page;
	$page->listRows=20;
	if (!$page->__get('totalRows')){
		$db->query($sql);
		$de['count']=$page->totalRows = $db->num_rows();
	}
	$de['count']=$de['count']?$de['count']:$page->__get('totalRows');
	$sql .= "  limit ".$page->firstRow.",".$page->listRows;
	$de['page'] = $page->prompt();
	//=====================
	$db->query($sql);
	$de['list']=$db->getRows();
	foreach($de['list'] as $key=>$val)
	{
		$catname=array();
		if(strlen($val['catid'])>8)
			$catname[]=getName(substr($val['catid'],0,-6));
		if(strlen($val['catid'])>6)
			$catname[]=getName(substr($val['catid'],0,-4));
		if(strlen($val['catid'])>4)
			$catname[]=getName(substr($val['catid'],0,-2));
		$catname[]=getName($val['catid']);
		$de['list'][$key]['catname']=implode('->',$catname);
	}
	unset($_GET['s']);
	$tpl->assign("url",'&'.implode('&',convert($_GET)));
	$tpl->assign("de",$de);
	$tpl->assign("config",$config);
	$tpl->display("product.htm");
?>