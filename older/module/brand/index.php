<?php
	$sql="select * from ".BRANDCAT." where parent_id ='0' order by displayorder";
	$db->query($sql);
	$re=$db->getRows();
	foreach($re as $key=>$val){
		
		$sql="select * from ".BRANDCAT." where parent_id=$val[id] order by displayorder ";
		$db->query($sql);
		$de = $db->getRows();
		
		foreach($de as $k=>$v)
		{
			$sql="SELECT * FROM ".BRAND." WHERE  catid = $v[id]  ORDER BY displayorder asc";
			$db->query($sql);
			$de[$k]['brand']=$db->getRows();
		}
		$re[$key]['list']=$de;
	}
	$tpl->assign("bcat",$re);
	
	$tpl->assign("current","brand");
	include("footer.php");
	$out=tplfetch("brand_index.htm");
?>