<?php

	if(empty($_GET['m'])||empty($_GET['s'])||empty($_GET['id'])||empty($_GET['uid']))
		msg($config['weburl'].'/404.php');
	
	
	$sql="select a.buyer_id,a.name,a.pic,b.id,b.price from ".ORPRO." a left join ".SETMEAL." b on a.pid=b.id where order_id='$_GET[id]'";
	$db->query($sql);
	$re=$db->getRows();
	$tpl->assign("pro",$re);
	
	if($_POST['submit']=="submit")
	{
		$sql="select user,userid from ".MEMBER." where userid='$_GET[uid]' ";
		$db->query($sql);
		$de=$db->fetchRow();
		foreach($re as $k=>$v)
		{
			$_POST["comment_text".$k]=htmlspecialchars($_POST["comment_text".$k]);
			$v['userid']=$v['userid']?$v['userid']:"0";
			$v['name']=$v['name']?$v['name']:"";
			$v['id']=$v['id']?$v['id']:"";
	
			$db->query("update ".SETMEAL." set goodbad=goodbad+". $_POST["g".$k]." where id='".$v['id']."'");	
			
			$sql="INSERT ".PCOMMENT."(userid,user,fromid,pid,puid,pname,price,con,uptime,goodbad) VALUES ('$de[userid]','$de[user]','$v[userid]','$v[id]','$v[userid]','$v[name]','$v[price]','".$_POST["comment_text".$k]."','".time()."','". $_POST["g".$k]."')";
			$db->query($sql);
			
		}
		$db->query("update ".ORDER." set is_comment='true' where order_id='".$_GET['id']."'");	
		msg("main.php?m=product&s=admin_buyorder");
	}
	$tpl->assign("current","product");
	include_once("footer.php");
	//=============================================
	$out=tplfetch("comment.htm",NULL);
?>