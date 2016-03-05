<?php
include_once("$config[webroot]/module/member/includes/plugin_member_class.php");
$member=new member();
$re=$member->get_member_detail($id);

$growth=$member->get_growth();

$sql="select * from ".GRADE." order by id";
$db->query($sql);
$grade=$db->getRows();
$tpl->assign("grade",$grade);

$sql="select * from ".GRADE." where id='$re[grade]'";
$db->query($sql);
$de=$db->fetchRow();
if($de['valid']>0)
{
	$de['expire'] = $re['update_date'] +  60*60*24*365*$de['valid'];
}
foreach($grade as $val)
{
	if($val['id']==($de['id']+1))	
	{
		$de['next']=$val['name'];
		$de['growth']=$val['demand']-$growth;
	}
}
$tpl->assign("de",$de);


//====================================================================
$tpl->assign("config",$config);
$tpl->assign("lang",$lang);
$output=tplfetch("admin_grade.htm");
?>