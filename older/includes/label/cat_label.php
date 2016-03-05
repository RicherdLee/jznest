<?php
function cat($ar)
{
	global $config,$db,$tpl;
	useCahe();
	$flag=md5(implode(",",$ar));
	$tmpdir=$config['webroot']."/templates/".$config['temp']."/label/".$ar['temp'].".htm";
	if(file_exists($tmpdir))
		$tpl->template_dir = $config['webroot']."/templates/".$config['temp']."/label/";
	else
		$tpl->template_dir = $config['webroot']."/templates/default/label/";
	$ar['temp']=empty($ar['temp'])?'cat_default':$ar['temp'];
	if(!$tpl->is_cached($ar['temp'].".htm",$flag))
	{	
		if($ar['rec'])
			$ssql.=" and isindex=$ar[rec]";

		if($ar['catid'])
		{
			$str = " catid='$ar[catid]'";
		}
		else
			$str = " catid< 9999 ";
			
		$re=array();
		
		$sql="select catid,cat,brand from ".PCAT." $sql WHERE $str $ssql order by nums asc  limit 0,12 ";
		$db->query($sql);
		$re=$db->getRows();
		foreach($re as $key=>$v)
		{
			$s=$v['catid']."00";
			$b=$v['catid']."99";
			$sql="select catid,cat from ".PCAT." where catid>$s and catid<$b $ssql order by nums asc";
			$db->query($sql);
			$sre=$db->getRows();
			foreach($sre as $skey=>$sv)
			{
				$s=$sv["catid"]."00";
				$b=$sv["catid"]."99";
				$sql="select catid,cat from ".PCAT." where catid>$s and catid<$b $ssql order by nums asc";
				$db->query($sql);
				$sre[$skey]["scat"]=$db->getRows();
			}			
			if($v['brand'])
			{
				$sql="select name,id,logo from ".BRAND." where  status=1 and id in ($v[brand]) order by id asc limit 0,12";
				$db->query($sql);
				$re[$key]["brand"]=$db->getRows();
			}
			$re[$key]["scat"]=$sre;
		}	
		$tpl->assign("config",$config);
		$tpl->assign("cat",$re);
	}
	return $tpl->fetch($ar['temp'].'.htm',$flag);
}
?>