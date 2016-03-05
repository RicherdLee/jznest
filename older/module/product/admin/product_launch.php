<?php
include_once("$config[webroot]/module/product/includes/plugin_pro_class.php");
//================================================================
$pro=new pro();

if(empty($_GET['catid'])&&empty($_GET['edit']))
{	
	$sql="select * from ".PCAT." where catid<9999 order by nums asc";
	$db->query($sql);
	$re=$db->getRows();
	$tpl->assign("cat",$re);
	//------------------------------
	
	$tpl->assign("config",$config);
	$tpl->assign("lang",$lang);
	$tpl->display("product_step.htm");
}
else
{	
	//-------------------------------------
	if($_POST['submit']=="submit")
	{	
		unset($_GET['m']);
		unset($_GET['s']);
		unset($_GET['category_id']);
		unset($_GET['catid']);
		unset($_GET['tcatid']);
		unset($_GET['scatid']);
		unset($_GET['sscatid']);
		
		$re=$pro->add_pro();
		if($re)
			msg("module.php?m=product&s=product.php&".implode('&',convert($_GET)));
	}
	//-------------------------------------
	if($_POST['submit']=="edit")
	{
		unset($_GET['m']);
		unset($_GET['s']);
		unset($_GET['edit']);
		unset($_GET['category_id']);
		unset($_GET['catid']);
		unset($_GET['tcatid']);
		unset($_GET['scatid']);
		unset($_GET['sscatid']);
		
		$re=$pro->edit_pro();
		if($re)
			msg("module.php?m=product&s=product.php&".implode('&',convert($_GET)));
	}
	//------------------------------------

	if(!empty($_GET['edit']))
	{	
		$de=$pro->pro_detail($_GET['edit']);
		$tpl->assign("de",$de);
		$pactidlist=$de['catid'];
		if(!empty($de['tcatid']))
			$pactidlist.=",".$de['tcatid'];
		if(!empty($de['scatid']))
			$pactidlist.=",".$de['scatid'];	
		if(!empty($de['sscatid']))
			$pactidlist.=",".$de['sscatid'];
	}
	//--------------------------------
	if(!empty($_GET['catid']))
	{
		$pactidlist=!empty($_GET['catid'])?$_GET['catid']:NULL;
		if(!empty($_GET['tcatid']))
			$pactidlist.= ",".$_GET['tcatid'];
		if(!empty($_GET['scatid']))
			$pactidlist.=",".$_GET['scatid'];
		if(!empty($_GET['sscatid']))
			$pactidlist.=",".$_GET['sscatid'];
	}
	
	$tpl->assign("typenames",$pro->getProTypeName($pactidlist));
	$tpl->assign("brand",$pro->get_brand($pactidlist,$de['brand']));
	$tpl->assign("service",$pro->get_service($pactidlist,$de['service']));
	$tpl->assign("prov",GetDistrict());
	//--------------------------自定义字段
	$nc=explode(",",$pactidlist);
	$now_catid=$nc[count($nc)-1];
	
	$sql="select * from ".TAG;
	$db->query($sql);
	$tag=$db->getRows();
	$tpl->assign("tag",$tag);
	
	$sql="select ext_table,is_setmeal from ".PCAT." where catid='$now_catid'";
	$db->query($sql);
	$re=$db->fetchRow();
	$ext_table=$re['ext_table'];
	
	include_once("$config[webroot]/module/product/includes/plugin_add_field_class.php");
	$addfield = new AddField('product');
	$extfiled=$addfield->addfieldinput($_GET['edit'],$ext_table);//
	$abc=$addfield->echoforeach('0',count($extfiled['d']));//
	
	$tpl->assign("firstvalue",$extfiled);
	$tpl->assign("is_setmeal",$is_setmeal);
	$tpl->assign("abc",$abc);
	include_once("footer.php");
	$tpl->assign("config",$config);
	$tpl->assign("lang",$lang);
	$tpl->display("product_launch.htm");
}

?>