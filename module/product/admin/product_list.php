<?php
	$id=$_GET['id']?$_GET['id']:NULL;
	$key=$_GET['key']?$_GET['key']:NULL;
	$catid=$_GET['catid']?$_GET['catid']:NULL;
	$code=$_GET['code']?$_GET['code']:NULL;
	
	if(!empty($key))
		$scl.=" and ( pname like '%$key%' )";
	if(!empty($catid))
		$scl.=" and LOCATE($catid,catid)=1";
	if(!empty($code))
		$scl.=" and sku = '$code'";
	if(!empty($id))
		$scl.=" and pid <> '$id'";
		
	$sql="SELECT id,pic,pname,price,market_price,cost_price,sku as code,stock as amount FROM ".SETMEAL." where 1 $scl order by id desc";
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
	
	if(!empty($catid) and $de['list'])
	{
		$max=$catid.'99';
		$min=$catid.'00';
		$ss=" and catid<=$max and catid>=$min ";
	}
	elseif(!empty($catid) and !$de['list'])
	{
		$catid=substr($catid,0,-2);
		$max=$catid.'99';
		$min=$catid.'00';
		$ss=" and catid<=$max and catid>=$min ";
	}
	else
		$ss=" and catid<9999 ";
		
	$sql="SELECT cat,catid FROM ".PCAT." where 1 $ss order by catid";
	$db->query($sql);
	$re=$db->getRows();
	if(!$re)
	{
		$catid=substr($catid,0,-2);
		$max=$catid.'99';
		$min=$catid.'00';
		$ss=" and catid<=$max and catid>=$min ";
		$sql="SELECT cat,catid FROM ".PCAT." where 1 $ss order by catid";
		$db->query($sql);
		$re=$db->getRows();
	}
	$tpl->assign("re",$re);
		
	$tpl->assign("config",$config);
	$tpl->display("product_list.htm");
	
?>