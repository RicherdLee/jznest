<?php
error_reporting(0);
?>
<?php
/*
+-----------------------------------------------------------------------
|	�ļ���Ҫ����ҳ�ļ�������ҳ����ʾ��ͬ����
|	�ļ����ƣ�index.php
|	����ʱ�䣺2010-5-20
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
