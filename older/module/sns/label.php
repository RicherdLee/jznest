<?php
function sns($ar)
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
		global $buid;
		
		$limit=$ar['limit'];
		$orderby=$ar['orderby'];
		/*
		if($orderby)
		{
			 $o=" order by friend desc";
		}
		else
		{
			 $o=" order by fan desc";
		}
		*/
		if($buid)
		{
			$sql="select fuid from ".FRIEND." where uid = '$buid'";
			$db->query($sql);
			$de=$db->getRows();
			foreach($de as $val)
			{
				$ss.=",$val[fuid]";
			}
			$s =" and userid not in ($buid$ss) ";	
		}
		
		//$sql="select userid,name,logo from ".MEMBER." a left join ".MEMBERINFO." on userid = member_id where name != '' $s $o limit 0,$limit";
		$sql="select * from ".MEMBER." where name != '' $s $o limit 0,$limit";
		$db->query($sql);
		$re=$db->getRows();
		
		//==================================================
		$tpl->assign("config",$config);
		$tpl->assign("member",$re);
	}
	return $tpl->fetch($ar['temp'].'.htm',$flag);
}
?>