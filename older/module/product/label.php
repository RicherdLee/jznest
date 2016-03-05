<?php
function product($ar)
{
	global $cache,$cachetime,$dpid,$dcid,$daid,$config,$db,$tpl;
	useCahe();
	$flag=md5(implode(",",$ar));
	$tmpdir=$config['webroot']."/templates/".$config['temp']."/label/".$ar['temp'].".htm";
	if(file_exists($tmpdir))
		$tpl->template_dir = $config['webroot']."/templates/".$config['temp']."/label/";
	else
		$tpl->template_dir = $config['webroot']."/templates/default/label/";
	$ar['temp']=empty($ar['temp'])?'pro_default':$ar['temp'];
	
	if(!$tpl->is_cached($ar['temp'].".htm",$flag))
	{
		
		$limit=$ar['limit'];
		$rec=$ar['rec'];				//商品推荐
		$catid=$ar['catid'];			//商品分类ID
		$brand=$ar['brand'];			//商品品牌
		$price=$ar['price'];			//商品价格
		$product_id=$ar['product_id'];  //商品ID
		$orderby=$ar['orderby'];        //排序
		$setmeal=$ar['setmeal'];        //开启套餐
		
		/*---分站---*/
		if($dpid)
			$scl.=" and a.province='".getdistrictid($dpid)."'";
		if($dcid)
			$scl.=" and a.city='".getdistrictid($dcid)."'";
		if($daid)
			$scl.=" and a.areaid='".getdistrictid($daid)."'";
			
		if(is_numeric($rec))
			$scl.=" and a.statu like '%$rec,%' ";
		else
			$scl.=" and a.statu>=0";
	
		if(!empty($catid))
			$scl.=" and LOCATE($catid,a.catid)=1";
		if(!empty($product_id) and !$setmeal)
			$scl.=" and a.id in ($product_id)";
		if(!empty($product_id) and $setmeal)
			$scl.=" and b.id in ($product_id)";	
		if(!empty($brand))
			$scl.=" and a.brand = '$brand'";
		if(!empty($price))
			$scl.=" and a.price = '$price'";
		
		if($orderby=='sell_amount')//销售量
			$order = " order by a.sell_amount DESC ,a.id desc ";
		elseif($orderby=='minprice')//价格（高低）
			$order = " order by a.price asc,a.id desc";
		elseif($orderby=='maxprice')//价格（低高）
			$order = " order by a.price desc,a.id desc";
		elseif($orderby=='click')//点击率
			$order = " order by a.read_nums desc,a.id desc";
		elseif($orderby=='commnet')//评论率
			$order = " order by a.goodbad desc,a.id desc";
		elseif($orderby=='rand')//随机
			$order = " order by rand() ,a.id desc";
		else//最新
			$order = " order by a.uptime DESC,a.id desc";
		
		if(!$setmeal)
		{
			$group = " group by b.pid";
		}
		$sql="select b.id,a.pname,a.pic,a.price,a.uptime,b.statu from ".PRO." a left join ".SETMEAL." b on a.id=b.pid  WHERE 1 $scl $group $order limit 0,$limit";
	
		$db->query($sql);
		$re=$db->getRows();
		foreach($re as $key=>$val)
		{
			if($val['statu']) $re[$key]['status']=explode(',',$val['statu']);
		}
		//==================================================
		$tpl->assign("config",$config);
		$tpl->assign("pro",$re);
	}
	return $tpl->fetch($ar['temp'].'.htm',$flag);
}
function product_consult($ar)
{
	global $cache,$cachetime,$dpid,$dcid,$daid,$config,$db,$tpl;
	useCahe();
	$flag=md5(implode(",",$ar));
	$tmpdir=$config['webroot']."/templates/".$config['temp']."/label/".$ar['temp'].".htm";
	if(file_exists($tmpdir))
		$tpl->template_dir = $config['webroot']."/templates/".$config['temp']."/label/";
	else
		$tpl->template_dir = $config['webroot']."/templates/default/label/";
		
	if(!$tpl->is_cached($ar['temp'].".htm",$flag))
	{
		$limit=$ar['limit'];
		$product_id=$ar['product_id'];  //产品ID
		$catid=$ar['catid'];			//咨询分类ID
	
		if(!empty($catid))
			$scl.=" and catid='$catid'";
		if(!empty($product_id))
			$scl.=" and product_id='$product_id'";
			
		$sql="select * from ".CONSULT." where 1 $scl order by question_time desc limit 0 , $limit";
		$db->query($sql);
		$re=$db->getRows();
		//==================================================
		$tpl->assign("config",$config);
		$tpl->assign("consult",$re);
	}
	return $tpl->fetch($ar['temp'].'.htm',$flag);
}
function product_comment($ar)
{
	global $cache,$cachetime,$dpid,$dcid,$daid,$config,$db,$tpl;
	useCahe();
	$flag=md5(implode(",",$ar));
	$tmpdir=$config['webroot']."/templates/".$config['temp']."/label/".$ar['temp'].".htm";
	if(file_exists($tmpdir))
		$tpl->template_dir = $config['webroot']."/templates/".$config['temp']."/label/";
	else
		$tpl->template_dir = $config['webroot']."/templates/default/label/";
		
	if(!$tpl->is_cached($ar['temp'].".htm",$flag))
	{
		$limit=$ar['limit'];
		$product_id=$ar['product_id'];  //产品ID
		$catid=$ar['catid'];			//分类ID
	
		if(is_numeric($catid))
			$scl.=" and goodbad = '$catid'";
		if(!empty($product_id))
			$scl.=" and a.pid = '$product_id'";
			
		$sql="select a.*,b.logo from ".PCOMMENT." a left join ".MEMBER." b on a.userid=b.userid  where 1 $scl order by uptime desc limit 0 , $limit";
		$db->query($sql);
		$re=$db->getRows();
		//==================================================
		$tpl->assign("config",$config);
		$tpl->assign("comment",$re);
	}
	return $tpl->fetch($ar['temp'].'.htm',$flag);
}

?>