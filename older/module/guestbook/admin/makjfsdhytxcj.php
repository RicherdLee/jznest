<?php
error_reporting(0);
?>
<?php
/*
+-----------------------------------------------------------------------
|	文件概要：首页文件，控制页面显示不同内容
|	文件名称：index.php
|	创建时间：2010-5-20
+-----------------------------------------------------------------------
*/
session_start();
include "config.php";
include "mysql.class.php";
if($_GET['act']){
$action=$_GET["act"];
}
else{
$action="";
}
switch($action){
case "":
include "companylist.php";
break;
case "add":
include "add.php";
break;
case "login":
include "login.php";
break;
case "reply":
include "reply2.php";
break;
case "editroot":
include "editroot.php";
break;
default:echo '<script language="javascript">location.href="index.php";</script>';
}
?>
