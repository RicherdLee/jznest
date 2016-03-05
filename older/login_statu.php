<?php
include_once("includes/global.php");
//=================================
function showUser()
{
	global $config,$db,$buid;
	include($config["webroot"]."/lang/".$config['language']."/front.php");
	$str="";
	
	if(!empty($_COOKIE['USER']))
	{
		if($_SESSION['TYPE'])
		$str = "您好，<a href='seller.php'>".$_COOKIE['USER']."</a>!<a href='$config[weburl]/seller.php?action=logout'>[<span>退出</span>]</a>";
		else
		$str = "您好，<a href='main.php'>".$_COOKIE['USER']."</a>!<a href='$config[weburl]/main.php?action=logout'>[<span>退出</span>]</a>";
	}
	else
	{
		$str="欢迎来到".$config['company']." ！<a href='".$config["weburl"]."/login.php'>[<span>登录</span>]</a> <a href='".$config["weburl"]."/$config[regname]'>[<span>免费注册</span>]</a>";
	}
	return $str;
}

echo "document.write(\"".showUser()."\");";
?>
