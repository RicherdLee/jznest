<?php
if(!defined('VALIDREQUEST'))die('Access Denied.');

session_start();
include('plugin/weiboconnect/config.php');
include('plugin/weiboconnect/class/saetv2.ex.class.php');
$weibo_callback_url="{$config['blogurl']}/index.php?act=weiboconnect&do=callback";
$weibo = new SaeTOAuthV2( $weibo_akey , $weibo_skey );
$back_url = $weibo->getAuthorizeURL( $weibo_callback_url );

acceptrequest('do');

if($do=="callback"){

	if (isset($_REQUEST['code'])) {
		$keys = array();
		$keys['code'] = $_REQUEST['code'];
		$keys['redirect_uri']  = $weibo_callback_url;		
		try {
			$token = $weibo->getAccessToken( 'code', $keys ) ;
		} catch (OAuthException $e) {
		}
	}

	if ($token) {
		$_SESSION['weibo_token'] = $token;
		setcookie( 'weibojs_'.$weibo->client_id, http_build_query($token) );
		$weiboid=$_SESSION['weibo_token']['uid'];
		$try=$blog->getbyquery("SELECT * FROM `{$db_prefix}weiboconnect` WHERE `weiboid`='{$weiboid}'");
		if(is_array($try)){
			setcookie("wbcbostat","on");//已绑定
			if($logstat==1){
				if($try['blogid']==$_COOKIE['userid']){	//检查与已登录本站账户是否匹配				
					catchsuccess("同步登录成功！","返回首页|index.php");
				}else{
					unset($_SESSION['weibo_token']);
		            setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
			        setcookie('wbcbostat','', time()-3600);
					catcherror("与已登录的本站账户不匹配！");
				}				
			}else{
				$blogid=$try['blogid'];
				$try=$blog->getbyquery("SELECT * FROM `{$db_prefix}user` WHERE `userid`='{$blogid}'");
				if(!is_array($try)){//与未登录的本站账户不匹配，说明原本站账户已被删除，删除该绑定。
					unset($_SESSION['weibo_token']);
		            setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
			        setcookie('wbcbostat','', time()-3600);
					$blog->query("DELETE FROM `{$db_prefix}weiboconnect` WHERE `blogid`='{$blogid}'");
					catcherror ("绑定的本站账户已被删除！无法再同步登录，请重新注册。");
				}else{//与未登录的本站账户匹配，绑定有效，同步登录
					setcookie ('userid', $try['userid']);
			        setcookie ('userpsw', $try['userpsw']);						
					catchsuccess("同步登录成功！","返回首页|index.php");
				}
			}
		}else{
			setcookie("wbcbostat","off");//未绑定			
			catchsuccess("微博账号接入成功！请登录或注册并绑定本站账户！",'微博账号管理|index.php?act=weiboconnect');				
		}
	} else {
		catcherror("微博账号接入失败！");
	}
}

if($_COOKIE["wbcbostat"]=="on" && $logstat!=1){
	unset($_SESSION['weibo_token']);
	setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
	setcookie('wbcbostat','', time()-3600);
	catcherror('该账户已经绑定！请重新登录。');
}

if(!(isset($_SESSION['weibo_token']) && $_SESSION['weibo_token']['uid']>0)){

		catcherror('微博账号未连接！');

}else{
	$weibouser = new SaeTClientV2( $weibo_akey , $weibo_skey , $_SESSION['weibo_token']['access_token'] );
	$weiboid_get = $weibouser->get_uid();
    $weiboid = $weiboid_get['uid'];
	$weiboshow= $weibouser->show_user_by_id( $weiboid);		
}

if($do=='logout'){
	if(isset($_SESSION['weibo_token']) && $_SESSION['weibo_token']['uid']>0){
		$wbcbostat=$_COOKIE["wbcbostat"];
		if($wbcbostat=="on" && $logstat==1){			
			unset($_SESSION['weibo_token']);
		    setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
			setcookie('wbcbostat','', time()-3600);
			define ('isLogout', 1);
	        setcookie ('userid', '', time()-3600);
	        setcookie ('userpsw', '', time()-3600);
	        setcookie ('openid_url_id', '', time()-3600);
	        setcookie ('bloglanguage', '', time()-3600);
	        setcookie ('blogtemplate', '', time()-3600);
			catchsuccess('同步注销成功！','返回首页|index.php');
		}else{
			unset($_SESSION['weibo_token']);
		    setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
			setcookie('wbcbostat','', time()-3600);
			catchsuccess('微博账号接入注销成功！','返回首页|index.php');		
		}		
	}

	catcherror('微博账号未连接！');

}

if($do=="bd"){
	if($logstat==1){
		$password=md5($_POST['password']);
		if($password==$_COOKIE['userpsw']){
			$weiboid=$weiboshow['id'];
			$blogid=$_COOKIE['userid'];
			$try=$blog->getbyquery("SELECT blogid FROM `{$db_prefix}weiboconnect` WHERE (blogid)='{$blogid}'");
	        if (is_array($try)) catcherror ('该账户已经绑定，请重新登录！');
			$weiboname=$weiboshow['name'];
			$weiboavatar=$weiboshow['profile_image_url'];
			$blog->query("INSERT INTO `{$db_prefix}weiboconnect` (blogid,weiboid,weiboname,weiboavatar) VALUES ('$blogid','$weiboid','$weiboname','$weiboavatar')");
            setcookie("wbcbostat","on");//已绑定
            catchsuccess('绑定成功！','返回首页|index.php');
		}else{
			catcherror('密码错误！');
		}
	}else{
		catcherror('登录本站账户后再绑定！');
	}
}

if($do=="jc"){
	if($logstat==1){
		$password=md5($_POST['password']);
		if($password==$_COOKIE['userpsw']){			
			$blogid=$_COOKIE['userid'];
			$weiboid=$weiboshow['id'];			
			$blog->query("DELETE FROM `{$db_prefix}weiboconnect` WHERE `blogid`='{$blogid}' AND `weiboid`='$weiboid'");
            setcookie("wbcbostat","off");//未绑定
            catchsuccess('解除绑定成功！','返回首页|index.php');
		}else{
			catcherror('密码错误！');
		}
	}else{
		catcherror('同步登录后再解除绑定！');
	}
}

if($do=="wb"){
	if( isset($_REQUEST['weibo']) ) {
		$ret = $weibouser->update( $_REQUEST['weibo'] );	//发送微博
		if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
			catcherror("微博发布失败，错误：{$ret['error_code']}:{$ret['error']}");
		} else {
			catchsuccess('微博发布成功！','微博账号管理|index.php?act=weiboconnect');
		}
	}
}

if($do=="zc"){
	acceptrequest('username,password,password2,usermail',0, 'post');
	$username=trimplus(safe_convert($username));
	if ($username==='') catcherror ($lnc[154]);
	if (strlen($username)<$mbcon['minusenamelen'] || strlen($username)>$mbcon['maxusenamelen']) catcherror ($lnc[155]);
	if ($password==='' || $password!=$password2 || strlen($password)<$mbcon['minpswlen']) catcherror ($lnc[156]);
	else $password=md5($password);
	$usercheck=mystrtolower($username);
	$try=$blog->getbyquery("SELECT userid FROM `{$db_prefix}user` WHERE LOWER(username)='{$usercheck}'");
	if (is_array($try)) catcherror ($lnc[157]);
	if (preg_search($username, $forbidden['banword']) || preg_search($username, $forbidden['keep'])) catcherror ($lnc[158]);
	$email=trimplus(safe_convert($usermail));
	if($email==='')catcherror ('电子邮箱地址没填哦！');
	$maxrecord=$blog->getsinglevalue("{$db_prefix}maxrec");
	$currentuserid=$maxrecord['maxuserid']+1;
	$imajikan=time();
	$blog->query("INSERT INTO `{$db_prefix}user` (userid,username,userpsw,regtime,usergroup,email,qq,gender,birthday,regip) VALUES ('{$currentuserid}', '{$username}', '{$password}', '{$imajikan}', '1', '{$email}','0','0','0','{$userdetail['ip']}')");
	$blog->query("UPDATE `{$db_prefix}maxrec` SET `maxuserid`=`maxuserid`+1");
	$blog->query("UPDATE `{$db_prefix}counter` SET `users`=`users`+1");
	@setcookie ('userid', $currentuserid);
	@setcookie ('userpsw', $password);

	$weiboid=$weiboshow['id'];
	$blogid=$currentuserid;
	$weiboname=$weiboshow['name'];
	$weiboavatar=$weiboshow['profile_image_url'];
	$blog->query("INSERT INTO `{$db_prefix}weiboconnect` (blogid,weiboid,weiboname,weiboavatar) VALUES ('$blogid','$weiboid','$weiboname','$weiboavatar')");
    setcookie("wbcbostat","on");//已绑定
	catchsuccess($lnc[162], "{$lnc[163]}|index.php");
}


$plugin_return='<div style="padding:10px;background-color:#fff;">';
$plugin_return.='<p style="padding:5px;font-size:15px;color:#333;"><b>新浪微博账号接入管理</b></p>';
$plugin_return.='<p style="background-color:#ddd;padding:5px;font-size:14px;color:#666;">我的信息</p>';
$plugin_return.='<div><table align="center"><tr><td><img src="'.$weiboshow['profile_image_url'].'" border=0/></td><td><p>用户ID：'.$weiboshow['id'].'</p><p>用户名：'.$weiboshow['name'].'</p></td></tr></table></div>';

if($_COOKIE["wbcbostat"]=="on" && $logstat==1){	
	$blogid=$_COOKIE['userid'];
	$try=$blog->getbyquery("SELECT weiboid FROM `{$db_prefix}weiboconnect` WHERE (blogid)='{$blogid}'");
	if ($try['weiboid']!=$weiboid){
		unset($_SESSION['weibo_token']);
		setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
		setcookie('wbcbostat','', time()-3600);
		define ('isLogout', 1);
	    setcookie ('userid', '', time()-3600);
	    setcookie ('userpsw', '', time()-3600);
	    setcookie ('openid_url_id', '', time()-3600);
	    setcookie ('bloglanguage', '', time()-3600);
	    setcookie ('blogtemplate', '', time()-3600);		
		catcherror ('账户不匹配，请重新登录！');
	}

	$plugin_return.='<p style="background-color:#ddd;padding:5px;font-size:14px;color:#666;">解除绑定</p>';
	$plugin_return.=<<<eot
		<div>
		<table align="center">
		<form method=post action="{$config['blogurl']}/index.php?act=weiboconnect&do=jc">		
		<tr><td size=20>输入本站密码：</td><td><input type="password" name="password"></td><td><input type="submit" value=" 解除绑定 "></td></tr>		
		</form>
		</table>
		</div>
eot;

}

if($_COOKIE["wbcbostat"]=="off" && $logstat==1){
	$blogid=$_COOKIE['userid'];
	$try=$blog->getbyquery("SELECT weiboid FROM `{$db_prefix}weiboconnect` WHERE (blogid)='{$blogid}'");
    if(is_array($try)){
		unset($_SESSION['weibo_token']);
		setcookie('weibojs_'.$weibo->client_id,'', time()-3600);
		setcookie('wbcbostat','', time()-3600);
		catcherror('该本站账号已与微博ID：'.$try['weiboid'].'的账号绑定，请重新登录！');
	}
	$plugin_return.='<p style="background-color:#ddd;padding:5px;font-size:14px;color:#666;">绑定本站账户</p>';
	$plugin_return.=<<<eot
		<div>
		<table align="center">
		<form method=post action="{$config['blogurl']}/index.php?act=weiboconnect&do=bd">		
		<tr><td size=20>输入本站密码：</td><td><input type="password" name="password"></td><td><input type="submit" value=" 绑 定 "></td></tr>		
		</form>
		</table>
		</div>
eot;

}
if($_COOKIE["wbcbostat"]=="off" && $logstat!=1){
	$plugin_return.='<p style="background-color:#ddd;padding:5px;font-size:14px;color:#666;">注册或<a href="login.php">登录</a>后绑定本站账户</p>';
	$plugin_return.=<<<eot
		<div style="text-align:center">
		<table align="center">
		<form method=post action="{$config['blogurl']}/index.php?act=weiboconnect&do=zc">	
		<tr><td size=20>用户名：</td><td><input type="text" name="username"></td><td>*必须</td></tr>
		<tr><td size=20>密码：</td><td><input type="password" name="password"></td><td>*必须</td></tr>
		<tr><td size=20>重复密码：</td><td><input type="password" name="password2"></td><td>*必须</td></tr>
		<tr><td size=20>电邮地址：</td><td><input type="text" name="usermail"></td><td>*必须</td></tr>
		<tr><td size=20></td><td><input type="submit" value=" 注册并绑定 "></td></tr>
		</form>
		</table>
		</div>
eot;

}

$plugin_return.='<p style="background-color:#ddd;padding:5px;font-size:14px;color:#666;">发布微博</p>';
$plugin_return.=<<<eot
		<div>
		<table align="center">
		<form method=post action="{$config['blogurl']}/index.php?act=weiboconnect&do=wb">		
		<tr><td><textarea name="weibo" style="width:500px;height:100px;padding:10px;"></textarea></td></tr><tr><td align="right"><input type="submit" value=" 发布 "></td></tr>		
		</form>
		</table>
		</div>
eot;

$plugin_return.='<p style="background-color:#ddd;padding:5px;font-size:14px;color:#666;">最新原创微博&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://weibo.com/'.$weiboshow['id'].'" target=_blank>我的微博</a></p>';

$ms  = $weibouser->home_timeline(1,$line,0,0,0,1);

if( is_array( $ms['statuses'] )){
	foreach($ms['statuses'] as $item){
		$mid=$weibouser->querymid($item['mid']);		
		$user='<a href="http://weibo.com/'.$item['user']['id'].'" target=_blank>'.$item['user']['name'].'</a>';
		$text='<a href="http://weibo.com/'.$item['user']['id'].'/'.$mid['mid'].'" target=_blank>'.$item['text'].'</a>';
		if($item['original_pic']==''){
			$url='';
		}else{
			$url='<p><a href="'.$item['original_pic'].'" target=_blank><img src="'.$item['thumbnail_pic'].'" border=0 /></a></p>';
		}
	$plugin_return.='<div style="padding:10px;margin:5px;border:1px solid #ddd">'.$user.'：'.$text.$url.'</div>';
	}  
}else{
	$plugin_return.='没有记录！';
}

$plugin_return.='</div>';






?>