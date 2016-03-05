<?php
/**
 * Copyright :b2bbuilder
 * Powered by :b2bbuilder
 * Auther:brad
 * Date: 2008-11-04
 * Des:非公共免费代码，没有得到b2bbuilder许可，禁止传播，复制。
 */
//===================
include_once("arrcache_class.php");
$cache     = new ArrCache('cache/apidata/');
$cachetime = $config['cacheTime'];//数据调用缓存时间。
//===================
function insert_label($ar)
{
	global $tpl,$config;
	$type=$ar['type'];
	$arr=explode('_',$type);
	if(file_exists("$config[webroot]/includes/label/".$arr[0]."_label.php"))
		include_once("$config[webroot]/includes/label/".$arr[0]."_label.php");
	else
		include_once("module/".$arr[0]."/label.php");
	$con=$type($ar);
	$tpl->caching=false;
	if($tpl->statu)
		$tpl->template_dir=$tpl->statu;
	else
		$tpl->template_dir = $config['webroot']."/templates/".$config['temp']."/";
	return $con;
}
//公告调用
function insert_getNotice($ar)
{
	global $cache,$cachetime;
	if(strlen($str=$cache->str_begin($ar,$cachetime))<=0)
	{	
		global $db,$config;
		$limit=$ar['limit'];	//条数
		$leng = $ar['leng'];	//标题长度
      
		if(empty($limit))
			$limit=5;
		if(empty($leng))
            $leng=30;
		
		$sql="SELECT * from ".ANNOUNCEMENT." where status>0 order by displayorder asc,id desc limit 0,".$limit;
		$db->query($sql);
		$re=$db->getRows();
		foreach($re as $v)
		{
			if(!$v['url'])
			{
			      $str.='<li><a href="'.$config['weburl'].'/?m=announcement&s=detail&id='.$v['id'].'" target="_blank" title="'.$v['title'].'" >'.csubstr($v['title'],0,$leng).'</a></li>';
			}
			else
			{
			      $str.='<li><a href="'.$v['url'].'" target="_blank" title="'.$v['title'].'" >'.csubstr($v['title'],0,$leng).'</a></li>';
			}
		}
	}
	$cache->str_end($str);
	return $str;
}
?>