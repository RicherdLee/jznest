<?php
/***
 *Powered by b2bbuilder
 *Copyright http://www.b2b-builder.com
 *Auther:Brad zhang
 *Date:2008-11-7
 *Des:产品类别页面，已做缓存处理
 */
//=============================================
if(empty($_GET['m'])||empty($_GET['s']))
	die('forbiden;');
//------------------------------
if(!empty($config['index_catid']))
	$display_cat=explode(",",$config['index_catid']);
else
	$display_cat=array();
	
foreach($display_cat as $key=>$v)
{
	if($config['temp']=='wap'&&$key==3)
	{
		break;
	}
	//--------类别名--------------
	$sql="select brand,cat,catid,pic from ".PCAT." where catid='$v'";

	$db->query($sql);
	$cata=$db->fetchRow();
	$cat_pro[$key]['name']=$cata['cat'];
	$cat_pro[$key]['pic']=$cata['pic'];
	
	//--------类别下面的子分类------
	$s=$v."00";
	$b=$v."99";
	$sql="select catid,cat from ".PCAT." where catid>$s and catid<$b order by nums asc,char_index asc limit 0 ,12";
	$db->query($sql);
	$cat_pro[$key]['sub_cat']=$db->getRows();
	//------------------------------
	$cat_pro[$key]['catid']=$v;
	//--------类别下面的品牌-------
	if($config['temp']!='wap')
	{
		if(!empty($cata['brand']))
		{
			$brand_id=$cata['brand'];
			$sql="select id,name,logo from ".BRAND." where 1 and id in($brand_id) limit 0,8";
			$db->query($sql);
			$cat_pro[$key]['brand']=$db->getRows();
		}
	}
	else
	{
		$count=count($cat_pro[$key]['sub_cat'])-1;
		$cat_pro[$key]['rand'][]=rand(0,$count);
		$cat_pro[$key]['rand'][]=rand(0,$count);
	}
}
$tpl->assign("categorys",$cat_pro);
if($config['temp']!='wap')
{
	$type=array(
		array('id'=>$config['qanggou'],'name'=>'疯狂抢购'),
		array('id'=>$config['like'],'name'=>'猜您喜欢'),
		array('id'=>$config['hot_sell'],'name'=>'热卖商品'),
		array('id'=>$config['hot_commen'],'name'=>'热评商品'),
		array('id'=>$config['new_pro'],'name'=>'新品上架')
	);
	$tpl->assign("type",$type);
}
//------------------------------
$tpl->assign("current","index");
include_once("footer.php");

//=============================================
$out=tplfetch("product_index.htm",NULL);
?>