<?php
session_start();
if($_POST){
	//echo '<pre>';print_r($_POST);print_r($_SESSION);
	if($_POST['mobile']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])){
		exit('手机验证码输入错误。');	
	}else{
		$_SESSION['mobile'] = '';
		$_SESSION['mobile_code'] = '';	
		exit('注册成功。');	
	}
}
function random($length = 6 , $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}
$_SESSION['send_code'] = random(6,1);
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<title>demo</title>
</head>
<script type="text/javascript" src="jquery.js"></script>
<script language="javascript">
 function mob(mob){
	 var form = document.registerform; 
     form.action="ckmobile.php";
     form.submit();
     document.getElementById("mob").value = mob;
}
</script>
<body>
<form action="ckmobile.php" method="post" name="formUser">
	<table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
		<tr>
			<td align="right">手机<td>
		<input id="mob" name="mob" type="text" size="25" class="inputBg" /><span style="color:#FF0000"> *</span> 
        <input id="verify" type="button" value=" 获取手机验证码 " onClick="mob();"></td>
        </tr>
		<tr>
			<td align="right">验证码</td>
			<td><input type="text" size="8" name="mobile_code" class="inputBg" /></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td><input type="submit" value=" 注册 " class="button"></td>
		</tr>
	</table>
</form>
</body>
</html>