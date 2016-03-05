<?php
if(!empty($_GET["action"]))
	$post=$_GET;
else
	$post=$_POST;

if(!empty($post["action"])&&$post["action"]=="submit")
{
	include_once("includes/global.php");
	include_once("includes/smarty_config.php");
	include_once("config/reg_config.php");

		// no ucenter login
		$sql="select * from ".MEMBER." where user='$post[user]' or email='$post[user]'";
		$db->query($sql);
		$re=$db->fetchRow();
        
		$sql="insert into ".USERCOON." 'userid' values '$re[userid]'";
		$db->query($sql);
		$cre['id']=$db->lastid();
		
		if($re["userid"])
		{
			if(substr($re['password'],0,4)=='lock')
				msg("login_sina.php?erry=-4&connect_id=$post[connect_id]");//之前使一牍Ｋ?
			if($re['password']!=md5($post['password']))
				msg("login_sina.php?erry=-2&connect_id=$post[connect_id]");//
			
			if($re["password"]==md5($post['password']))
			{
				if($re['pid'])
					login($re['pid'],$re['user'],$re['userid']);//撕诺录
				else
					login($re['userid'],$re['user']);
					
				$forward = $post['forward']?$post['forward']:$config["weburl"]."/index.php";
				msg($forward);
			}
		}
		else
			msg('login_sina.php?erry=-1&connect_id='.$post['connect_id']);//没
}
//========================================================
function login($uid,$username,$pid=NULL)
{
	global $post,$config;
	$db=new dba($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname'],$config['dbport']);
	if($uid)
		$sql="select lastLoginTime,userid,user,regtime,statu from ".MEMBER." a where a.userid='$uid'";
	else
		$sql="select lastLoginTime,userid,user,regtime,statu from ".MEMBER." where user='$username'";
	$db->query($sql);
	$re=$db->fetchRow();
	
	bsetcookie("USERID","$uid\t$re[user]\t$pid",NULL,"/",$config['baseurl']);
	setcookie("USER",$re['user'],NULL,"/",$config['baseurl']);
	$_SESSION["STATU"]=$re['statu'];
	
	$sql="update ".MEMBER." set lastLoginTime='".time()."' WHERE userid='$uid'";
	$db->query($sql);
	//--------------------------------------qq蠖ā
	if(!empty($post['connect_id']))
	{
		$sql="update ".USERCOON." set userid='$uid' where id='$post[connect_id]'";
		$db->query($sql);
	}
}
function do_post($url, $data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($ch, CURLOPT_URL, $url);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
function get_url_contents($url)
{
    if(ini_get("allow_url_fopen") == "1")
        return file_get_contents($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result =  curl_exec($ch);
    curl_close($ch);
    return $result;
}

//==================================================================================
include_once("includes/global.php");
include_once("includes/smarty_config.php");
include_once("config/reg_config.php");
include_once("config/connect_config.php");//connect
$config = array_merge($config,$reg_config);
$config = array_merge($config,$connect_config);
if($config['sina_connect']==1)//sina
{
	define( "WB_AKEY" , $config['sina_app_id'] );
	define( "WB_SKEY" , $config['sina_key'] );
	define( "WB_CALLBACK_URL" , "$config[weburl]/login.php?type=sina" );// 
	include_once( 'includes/saetv2.ex.class.php' );
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	//------------------------------------------
	if($_GET['type']=='sina'&&isset($_REQUEST['code']))
	{
		$keys = array();
		$keys['code'] = $_REQUEST['code'];
		$keys['redirect_uri'] = WB_CALLBACK_URL;
		$token = $o->getAccessToken( 'code', $keys ) ;
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
		$uid_get = $c->get_uid();
		$uid = $uid_get['uid'];
		$ar = $c->show_user_by_id( $uid);//ID取没然息
		//------------
		$sql="select * from ".USERCOON." where type=2 and client_id='$ar[id]'";
		$db->query($sql);
		$cre=$db->fetchRow();
		if(empty($cre['id']))
		{
			$sql="insert into ".USERCOON." 
			(nickname,figureurl,gender,type,access_token,client_id) 
			values 
			('$ar[name]','$ar[profile_image_url]','$ar[gender]',2,'$token[access_token]','$ar[id]')";
			$db->query($sql);
			$cre['id']=$db->lastid();
		}
	}
	//-------------------------------------------
	$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
	$tpl->assign("sina_login_url",$code_url);
}
//===========================================
if($buid&&empty($_GET['style']))
{
	header("Location:main.php");
	exit();
}

include_once("footer.php");
$tpl -> assign("lang",$lang);
$tpl -> assign("current","office");

if(!empty($_GET['style']))
	$tpl->display("login_box.htm");
else
	$tpl->display("login_sina.htm");
?>