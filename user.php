<?php 
header("Content-type:text/html;charset=utf-8");
session_start();
if (!empty($_SESSION['id'])){
	$mysqli = new mysqli('localhost','root','','test');
	$sql = "select * from `jz_user_connected` where userid = ".$_SESSION['id']."";
	$query = $mysqli->query($sql);
	$row = $query->fetch_array();
	echo "登录成功，欢迎：".$row['username'];
	
	if($row['access_token']){		
		echo "你的微博账号已经绑定!";
	}else{
		echo "&nbsp;&nbsp;===>绑定新浪微博？<a href=\"./api/index.php\">进入</a>";
	}
}else{
	echo "登录失败，<a href=\"../login1.php\">返回到登录页面<a/>";
}
?>