<?php
@set_time_limit(0);
include_once("includes/global.php");
//关键字
if(!empty($_POST['search_flag'])&&!empty($_POST['key']))
{	
	include_once("includes/global.php");
	$sql="select * from ".SWORD." where keyword like '$_POST[key]%' or char_index like '$_POST[key]%' order by nums desc limit 0,10";
	$db->query($sql);
	$re=$db->getRows();
	foreach($re as $v)
	{
		echo "<a onclick=\"select_word('$v[keyword]')\" href='#'>$v[keyword]</a>";
	}
	die;
}
//邮箱是否重复
if(isset($_POST["check_email"])&&$_POST["check_email"]=='1')
{	
	include_once("includes/global.php");
	$sql="select * from ".MEMBER." where email='$_POST[email]'";
	$db->query($sql);
	$re=$db->fetchRow();
	if($re['email']!='')
		echo 2;//不可以注册，已被使用
	else
		echo 1;//正常，可以注册。
}
//验证问题是否正确
if(isset($_POST["wtyz"])&&$_POST["wtyz"]=='1')
{	
	include_once("includes/global.php");
	$sql="select * from ".REGVERFCODE." order by rand() limit 0,1";
	$db->query($sql);
	$re=$db->fetchRow();
	echo $re['question'];
	$_SESSION['YZWT']=$re['answer'];
}
//验证码是否正确
if(isset($_POST["ckyzwt"]))
{	
	if($_POST["ckyzwt"]==$_SESSION['YZWT'])
		echo "true";
	else
		echo "false";
}
//验证码是否正确
if(isset($_GET["yzm"]))
{
	if(strtolower($_GET["yzm"])!=strtolower($_SESSION["auth"]))
	{
		echo 1;
	}
}
if(isset($_POST["verify_field"])&&isset($_POST["verify_type"]))
{	
	include_once("includes/global.php");
	include_once("config/reg_config.php");
	$config = array_merge($config,$reg_config);
	
	$verify_field = trim($_POST['verify_field']);
	$verify_type = trim($_POST['verify_type']);

	if($verify_type == 'user')
	{
		if($config['censoruser'])
		{
			$censoruser = explode("\r\n",$config['censoruser']);
			if(in_array($verify_field,$censoruser))
			{
				echo "false";
				die;
			}
		}
		if(!empty($config['openbbs'])&&$config['openbbs']==2)
		{
			include_once('uc_client/client.php');
			echo (uc_user_checkname($verify_field) == 1) ? "true" : "false";
			die;
		}
	}
	$sql = "select * from ".MEMBER." where $verify_type = '$verify_field'";
	$db -> query($sql);
	$num = $db->num_rows();
	echo ($num > 0) ? "false" : "true";
	die;
}
if(isset($_POST["mobile"]))
{
	$mobile = trim($_POST["mobile"]);
	$rand = create_password("4");
	$_SESSION['auth'] = $rand;
	send_sms($mobile,$rand);
}
if(isset($_POST["email"]))
{	
	include_once("config/seo_config.php");
	$config = array_merge($config,$config);
	
	$email = trim($_POST["email"]);

	$rand = create_password("4");
	$_SESSION['auth'] = $rand;
	
	$mail_temp = get_mail_template('active');

	$con = $mail_temp['message'];
	$title = $mail_temp['title'];
	$time = date("Y-m-d H:i:s");
	$user = "user";
	$logo='<img height="24" src="'.$config['weburl'].'/image/logo.png"  style="border:none;margin:0;">';

	$ar1=array('[time]','[logo]','[weburl_name]','[link]','[weburl_email]','[weburl_tel]','[weburl_url]','[weburl_desc]','[weburl_desc]');
	$ar2=array($time,$logo,$config['company'],$rand,$config['email'],$config['owntel'],$config['weburl'],$config['description']);
	$con=str_replace($ar1,$ar2,$con);
	
	$ar3=array('[weburl_name]');
	$ar4=array($config['company']);
	$title=str_replace($ar3,$ar4,$title);
	
	send_mail($email,$user,$title,$con);
	unset($con);unset($title);
	die;
}
//地区联动
if(isset($_POST["d_id"]))
{	
	include_once("includes/global.php");
	$sql="select id,name from ".DISTRICT." where pid='$_POST[d_id]' order by sorting";
	$db->query($sql);
	$num=$db->num_rows();
	$str="";
	if($num!=0)
	{
		$str="{";
		$i=0;
		while($k=$db->fetchRow())
		{
			$i++;
			$id=$k["id"];
			$name=$k["name"];
			if($i<$num)
				$str.="'$i':{'0':'$id','1':'$name'},";
			else
				$str.="'$i':{'0':'$id','1':'$name'}";
		}
		//------------------------------------------------------------
		$str.="};";
	}
	echo $str;
}
//产品商铺分类联动
if(!empty($_POST["pcatid"]))
{
	include_once("includes/global.php");
	
	$s=$_POST["pcatid"]."00";$b=$_POST["pcatid"]."99";
	if(!empty($_POST['cattype'])&&$_POST['cattype']=='pro')
		$db->query("SELECT * FROM ".PCAT." WHERE catid>'$s' and catid<'$b' ORDER BY nums ASC");
	
	if(!empty($_POST['cattype'])&&$_POST['cattype']=='com')
		$db->query("SELECT * FROM ".SHOPCAT." WHERE parent_id='$_POST[pcatid]' ORDER BY displayorder");
	
	$num=$db->num_rows();
	$str="{";
	$i=0;
	while($k=$db->fetchRow())
	{
		$i++;
		if($_POST['cattype']=='com')
		{
			$city_id=$k["id"];
			$cat=str_replace("\r",'',$k['name']);
		}
		else
		{
			$city_id=$k["catid"];
			$cat=str_replace("\r",'',$k['cat']);
		}
		if($i<$num)
			$str.="\"$i\":{\"0\":\"$city_id\",\"1\":\"$cat\"},";
		else
			$str.="\"$i\":{\"0\":\"$city_id\",\"1\":\"$cat\"}";
	}
	$str.="};";
	echo $str;
}

?>