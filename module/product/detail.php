<?php
include_once($config['webroot']."/module/product/includes/plugin_pro_class.php");
$id=$_GET["sid"]*1;
$id=$_GET["id"]*1;
if($sid)
{
	$sql="select pid from ".SETMEAL." where id='$sid'";
	$db->query($sql);
	$id=$db->fetchField('pid');
}
$prodetail=new pro();
$prode=$prodetail->detail($id);
if(!intval($prode['id']))
{
	header("Location:404.php");die;
}
//-----------------------------------------
$sql="select isbuy,ext_table,brand from ".PCAT." where catid='$prode[catid]'";
$db->query($sql);
$current_cat=$db->fetchRow();

if($current_cat['isbuy']==1)
	$prode['isbuy']=1;
else
	$prode['isbuy']=0;
if($current_cat['brand'])
{
	$sql="select id,name from ".BRAND." where id in ($current_cat[brand]) limit 0 ,10 ";
	$db->query($sql);
	$brand=$db->getRows();
	$tpl->assign("brand",$brand);	
}

if(strlen($prode['catid'])>4)
{
	if(strlen($prode['catid'])>8)
		$catname[]=substr($prode['catid'],0,-6);
	if(strlen($prode['catid'])>6)
		$catname[]=substr($prode['catid'],0,-4);
	if(strlen($prode['catid'])>4)
		$catname[]=$parcat=substr($prode['catid'],0,-2);
	
	$catname[]=$prode['catid'];
	$tpl->assign("catname",$catname);
	
	$sql="select catid,cat from ".PCAT." where catid < '".$parcat."99' and catid > '".$parcat."00'";
	$db->query($sql);
	$cat=$db->getRows();	
	$tpl->assign("cat",$cat);
}
//-----------------------------------扩展字段
include_once("$config[webroot]/module/product/includes/plugin_add_field_class.php");
$addfield = new AddField('product');
$prode['extfiled']=$addfield->addfieldinput($prode['pid'],$current_cat['ext_table'],$prode['id']);

//-----------------------------------咨询分类
$sql="select * from ".CONSULTCAT." order by id";
$db->query($sql);
$consultcat=$db->getRows();
$tpl->assign("consultcat",$consultcat);

//-----------------------------------评价
$prode['count']=$prodetail->get_comment_count($id);
$prode['good']=$prodetail->get_comment($id,'1',$prode['count']);
$prode['middle']=$prodetail->get_comment($id,'0',$prode['count']);
$prode['bad']=$prodetail->get_comment($id,'-1',$prode['count']);

//-----------------------------------用户区获取
$prode['user_ip']=convertip(getip());
if($prode['user_ip']=='- LAN')
	$prode['user_ip']='';	
	
$prode['user_ip']=$prode['user_ip']?$prode['user_ip']:"上海";	
//$prode['freight_count']=get_log_price($prode['freight'],$prode['user_ip']);//跟据所在地自动算出的运费

$ar1=array('[catname]','[title]','[keyword]','[brand]');
$ar2=array($pcats['cat'],$prode['pname'],$prode['keywords'],$prode['brand']);
$config['title']=str_replace($ar1,$ar2,$config['title3']);
$config['keyword']=str_replace($ar1,$ar2,$config['keyword3']);
$config['description']=str_replace($ar1,$ar2,$config['description3']);
//======================================
$tpl->assign("de",$prode);
$tpl->assign("current","product");
include_once("footer.php");
$out=tplfetch("product_detail.htm",$flag);

?>