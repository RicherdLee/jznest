<?php
	include_once("../../includes/global.php");

	//添加 共享 产品
	if(!empty($_POST['pid'])&&is_numeric($_POST['pid'])&&!empty($_POST['uname']))
	{
		//获取 产品 信息
		$sql="select price,pic,pname from ".SETMEAL." where id='".$_POST['pid']."'";
		$db->query($sql);
		$re=$db->fetchRow();
		
		//获取 当前用户 userid
		$sql="select userid from ".MEMBER." where user='".$_POST['uname']."'";
		$db->query($sql);
		$uid=$db->fetchField('userid');
		
		$sql="select * from ".SPRO." where uid=".$uid." and pid='".$_POST['pid']."'";
		$db->query($sql);
		if($db->num_rows()<=0)
		{
			$sql="insert into ".SPRO." (pid,uid,uname,content,addtime,likeaddtime,privacy,commentcount,isshare,islike) VALUES ('$_POST[pid]','$uid','$_POST[uname]','','".time()."','0','0','0','0','0')"; 
			$db->query($sql);
			
			//判断 共享产品信息
			$sql="select * from ".SPROINFO." where pid='".$_POST['pid']."'";
			$db->query($sql);
			if($db->num_rows()<=0)
			{
				$sql="insert into ".SPROINFO." (pid,pname,image,price,addtime,likenum,likemember,collectnum) VALUES ('$_POST[pid]','$re[pname]','$re[pic]','$re[price]','".time()."','0','0','1')"; 
				$db->query($sql);
			}
			else
			{
				$db->query("update ".SPROINFO." set collectnum=collectnum+1 where pid='".$_POST['pid']."'");	
			}
			die('2');
		}
		else
		{
			die('1');
		}
	}
	
	//加关注
	if(!empty($_POST['mid'])&&is_numeric($_POST['mid'])&&!empty($_POST['uname'])&&$_POST['op']=="add")
	{
		//获取 当前用户信息 
		$sql="select userid,user,logo from ".MEMBER." where user='".$_POST['uname']."'";
		$db->query($sql);
		$re=$db->fetchRow();
		
		if($_POST['mid']==$re['userid'])
		{
			die('-1');
		}
		//获取 关注用户信息
		$sql="select userid,user,logo from ".MEMBER." where userid='".$_POST['mid']."'";
		$db->query($sql);
		$de=$db->fetchRow();
		
		$sql="select * from ".FRIEND." where uid=".$re['userid']." and fuid='".$_POST['mid']."'";
		$db->query($sql);
		if($db->num_rows()<=0)
		{			
			$db->query("update ".MEMBERINFO." set friend=friend+1 where member_id='".$re['userid']."'");	
			$db->query("update ".MEMBERINFO." set fan=fan+1 where member_id='".$_POST['mid']."'");	
			
			$sql="select * from ".FRIEND." where uid=".$_POST['mid']." and fuid='".$re['userid']."'";		
			$db->query($sql);
			if($db->num_rows()<=0)
			{
				$state='1';
			}
			else
			{
				$state='2';
				$db->query("update ".FRIEND." set state='2' where uid='".$_POST['mid']."' and fuid='".$re['userid']."'");	
			}
			$sql="insert into ".FRIEND." (uid,uname,uimg,fuid,funame,fuimg,addtime,state) VALUES ('$re[userid]','$re[user]','$re[logo]','$de[userid]','$de[user]','$de[logo]','".time()."','$state')"; 
			$db->query($sql);
			die('2');
		}
		else
		{
			die('1');
		}
	}
	
	//取消关注
	if(!empty($_POST['fid'])&&is_numeric($_POST['fid'])&&$_POST['op']=="del")
	{
		//获取 当前用户信息 
		$sql="select * from ".FRIEND." where id='$_POST[fid]'";	
		$db->query($sql);
		$re=$db->fetchRow();
		
		$sql="select * from ".FRIEND." where uid='".$re['fuid']."' and fuid='".$re['uid']."'";		
		$db->query($sql);
		if($db->num_rows()>0)
		{
			$db->query("update ".FRIEND." set state='1' where uid='".$re['fuid']."' and fuid='".$re['uid']."'");	
		}
		$db->query("delete from ".FRIEND." where id='$_POST[fid]'");
		$db->query("update ".MEMBERINFO." set friend=friend-1 where member_id='".$re['uid']."'");	
		$db->query("update ".MEMBERINFO." set fan=fan-1 where member_id='".$re['fuid']."'");
		die('2');
		
	}
?>