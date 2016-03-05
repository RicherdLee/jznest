<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/*
+-----------------------------------------------------------------------
|	文件概要：处理数据模块文件
|	文件名称：data.php
|	创建时间：2010-5-20
+-----------------------------------------------------------------------
*/
session_start();
$method=$_GET['method'];
include "mysql.class.php";
include "config.php";
include "checkhtml.php";
if($method==''){
	echo "<script>window.location.href='../../../index.php';</script>";
}
if($method=='add'){//添加留言块
	$user=$_POST['user'];
	$text=checkhtml($_POST['text']);
	$email=$_POST['email'];
	$qq=$_POST['qq'];
	$dtime=date("Y-m-d H:i:s");
	$ip=$_SERVER["REMOTE_ADDR"];
	$add_ob=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
	$sql = "insert into guestbook(user,email,qq,text,ip,time) values('$user','$email','$qq','$text','$ip','$dtime')";
	$result = $add_ob->query($sql);
		if($result==true){
			echo "<script>alert('留言成功！');location.href='../../../index.php';</script>";
		}else{
			echo "<script>alert('留言失败！');history.go(-1);</script>";
		}
}
if($method=='login'){//管理员登录块
	$user=$_POST['user'];
	$pwd=md5($_POST['pwd']);
	$sql = "select * from admin where name='$user' and pass='$pwd'";
	$login_ob=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
	$result = $login_ob->query($sql);
	$row=$login_ob->numrows($result);
	if($row>0){
		$_SESSION['fig'] = 1;
		$_SESSION['user'] = $user;
		echo "<script>alert('登录成功！');location.href='/module/guestbook/admin/mandg6546QWage.php';</script>";
	}else{
		echo "<script>alert('登录失败！');history.go(-1);</script>";
	}
}
if($method=='del'){//删除留言块
	$did=$_GET['did'];
	$sql = "delete from guestbook where id='$did'";
	$del_ob=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
	$result = $del_ob->query($sql);
	if($result==true){
			echo "<script>alert('删除成功！');location.href='/module/guestbook/admin/mandg6546QWage.php';</script>";
		}else{
			echo "<script>alert('删除失败！');history.go(-1);</script>";
		}
}
if($method=='reply'){//回复留言块
	$rid=$_GET['rid'];
	$reply=checkhtml($_POST['treply']);
	$rtime=date("Y-m-d H:i:s");
	$sql = "update guestbook set reply='$reply',replytime='$rtime' where id='$rid'";
	$reply_ob=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
	$result = $reply_ob->query($sql);
	if($result==true){
			echo "<script>alert('回复成功！');location.href='/module/guestbook/admin/mandg6546QWage.php';</script>";
		}else{
			echo "<script>alert('回复失败！');history.go(-1);</script>";
		}
}
if($method=='settop'){//设置置顶块
	$sid=$_GET['sid'];
	$sql = "update guestbook set settop=1 where id='$sid'";
	$settop_ob=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
	$result = $settop_ob->query($sql);
	if($result==true){
			echo "<script>location.href='/module/guestbook/admin/mandg6546QWage.php';</script>";
		}else{
			echo "<script>alert('设置置顶失败！');history.go(-1);</script>";
		}
}
if($method=='untop'){//取消置顶块
	$uid=$_GET['uid'];
	$sql = "update guestbook set settop=0 where id='$uid'";
	$untop_ob=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
	$result = $untop_ob->query($sql);
	if($result==true){
			echo "<script>location.href='/module/guestbook/admin/mandg6546QWage.php';</script>";
		}else{
			echo "<script>alert('取消置顶失败！');history.go(-1);</script>";
		}
}
if($method=='logout'){//退出管理块
session_unset();
session_destroy(); 
echo "<script>location.href='../../../index.php';</script>";
}