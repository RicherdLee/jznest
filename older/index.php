<?php
include_once("includes/global.php");
include_once("includes/smarty_config.php");
//==========================================
$dre=explode(".",$_SERVER['HTTP_HOST']);
$dir=trim(dirname($_SERVER['SCRIPT_NAME']), '\,/');//view: abc.**.com/a.php

$true_prefix=str_replace($config['baseurl'],'',$_SERVER['HTTP_HOST']);
$original_prefix=str_replace('http://','',str_replace($config['baseurl'],'',$config['weburl']));
//view:abc.abc.com, baserurl:abc.abc.com, weburl:abc.abc.com ----- true_prefix='';original_prefix='';
//view:abc.ocm view, baseurl:abc.com, weburl:www.abc.com true_prefix='',original_prefix='www'
if(empty($true_prefix)&&!empty($original_prefix))
{
	header("Location: ".$config['weburl']);exit();
}
	
//if($true_prefix!=$original_prefix&&empty($dpid)&&empty($dcid)&&empty($dir)&&!empty($config['baseurl'])&&empty($mlang))
//{
//	if($config['opensuburl'])
//	{
//		//绑定顶级域名
//		$sql="select con,con2,con3,web_title,web_keyword,web_des,des,copyright,template,logo from ".DOMAIN." where top_domain='"."".$_SERVER['HTTP_HOST']."'";
//		$db->query($sql);
//		$do=$db->fetchRow();
//		if(!is_array($do))
//		{
//			$config['title']  		= 	$do['web_title'];
//			$config['keyword']		= 	$do['web_keyword'];
//			$config['description']	= 	$do['web_des'];
//			$config['company']  	= 	$do['web_title'];
//			$config['copyright']	=	$do['copyright'];
//			$config['site_des']		= 	$do['des'];
//			$config['logo']			=	$do['logo'];
//			if(!empty($do['template']))
//				$config['temp']		=	$do['template'];
//			
//			setcookie("SPID",$do['con'],time()+60*60*24*30,'/');
//			setcookie("SCID",$do['con2'],time()+60*60*24*30,'/');
//			setcookie("SAID",$do['con3'],time()+60*60*24*30,'/');
//			
//			$dpid=!empty($do['con'])?$do['con']:'';
//			$dcid=!empty($do['con2'])?$do['con2']:'';
//			$daid=!empty($do['con3'])?$do['con3']:'';
//			//$config['weburl']=$_SERVER['HTTP_HOST'];
//			//header("Location: ".$config['weburl']);
//			exit();
//		}
//		header("Location: ".$config['weburl']);
//		exit();
//	}
//	else
//	{
//		header("Location: ".$config['weburl']);
//		exit();
//	}
//}
//else
//{
	$file=$config['webroot'].'/cache/front/index.htm';
	if(file_exists($file) && (time() - filemtime($file)<$config['cacheTime']*1)&&empty($_GET['m']))
	{
		include($file);
	}
	else
	{
		unset($dre);unset($dir);
		$_GET['s']=!empty($_GET['s'])?$_GET['s']:'index';
		$_GET['m']=!empty($_GET['m'])?$_GET['m']:'product';
		$_GET['m'] = preg_replace('#[^a-z]#iuU', '',$_GET['m']);
		if(!empty($_GET['m']))
		{	
			$s=$_GET['s'];
			$m=$_GET['m'];
			if(file_exists($config['webroot'].'/module/'.$m.'/'.$s.'.php'))
			{
				if(file_exists($config['webroot'].'/config/module_'.$m.'_config.php'))
				{
					@include($config['webroot'].'/config/module_'.$m.'_config.php');
					$mcon='module_'.$m.'_config';
					@$config = array_merge($config,$$mcon);
				}
				if($s=='index'&&$m=='product')
				{
					@include($config['webroot'].'/config/home_config.php');
					@$config = array_merge($config,$home_config);
				}
				@include('module/'.$m.'/lang/'.$config['language'].'.php');
				include('module/'.$m.'/'.$s.'.php');
			}
			elseif(file_exists($m.'.html'))
				include($m.'.html');
			else
				header("Location: 404.php");
			if(!empty($out))
			{	
				$tpl->assign("out",$out);unset($out);unset($tpl->statu);
				$tpl->template_dir = $config['webroot']."/templates/".$config['temp']."/";
				$tpl->caching = false; //设置缓存方式
				$tpl->display("m.htm");
			}
		}
		else
			header("Location: 404.php");
	}
//}
?>