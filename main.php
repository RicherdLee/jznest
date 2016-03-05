<?php
include_once("includes/global.php");
include_once("includes/admin_global.php");
include_once("includes/admin_class.php");
include_once("includes/insert_function.php");
//===============================================
$action=isset($_GET['action'])?$_GET['action']:"main";
$submit=isset($_POST['submit'])?$_POST['submit']:NULL;
$deid=isset($_GET['deid'])?$_GET['deid']:NULL;
//---------------------是否登录
$admin = new admin();
$admin->is_login($action);
//---------------------加载语言包
include("lang/cn/user_admin.php");
include("lang/cn/admin_menu.inc_p.php");
//---------------------登录检查,个人或企业会员
if(empty($_SESSION['USER_TYPE']))
	$_SESSION['USER_TYPE']=$is_company;
if($_GET['cg_u_type'])
	$_SESSION['USER_TYPE']=$_GET['cg_u_type']*1;
$tpl->assign("cg_u_type",$_SESSION['USER_TYPE']);

include_once("module/member/includes/plugin_member_class.php");
$member=new member();	
//---------------------会员信息
$cominfo=$member->get_member_info($buid);
$member->update_grade($cominfo['grade'],$cominfo['update_date']);
$admin->tpl->assign("cominfo",$cominfo);
//---------------------会员订单信息
if($config['temp']=='wap')
{
	$count['order']=$member->get_all_count(ORDER,array('1','2','3','4'),'2');
}
else
{
	$count['order']=$member->get_all_count(ORDER,array('1','3','4'),'2');
}
$admin->tpl->assign("shop_count",$count);

switch ($action){
	case "logout":
	{
		global $config;
		include_once("$config[webroot]/config/reg_config.php");
		$config = array_merge($config,$reg_config);
		bsetcookie("USERID",NULL,time(),"/",$config['baseurl']);
		setcookie("USER",NULL,time(),"/",$config['baseurl']);
		//=====================
		if($config['openbbs']==2)
		{
			include_once("$config[webroot]/uc_client/client.php");
			echo uc_user_synlogout();
		}
		$_SESSION['USER_TYPE']=NULL;
		msg("$config[weburl]/index.php");
		break;
	}
	case "msg":
	{
		$tpl->assign("lang",$lang);
		$tpl->assign("config",$config);
		include_once("footer.php");
		if($config['temp']=='wap')
		{
			$output=tplfetch("user_admin/admin_msg.htm",$flag,true);
		}
		else
		{
			$output=tplfetch("admin_msg.htm",$flag,true);
		}
		break;
	}
	default:
	{
		if(!empty($_GET['m']))
		{
			if(file_exists($config['webroot'].'/config/module_'.$_GET['m'].'_config.php'))
			{
				@include($config['webroot'].'/config/module_'.$_GET['m'].'_config.php');
				$mcon='module_'.$_GET['m'].'_config';
				@$config = array_merge($config,$$mcon);
			}
			//------------------------调用模块语言包
			if(file_exists("$config[webroot]/module/".$_GET['m']."/lang/cn.php"))
				include("$config[webroot]/module/".$_GET['m']."/lang/cn.php");		
			
			if($config['temp']=='wap')
			{
				$tpl->template_dir=$config['webroot']."/templates/".$config['temp']."/user_admin/";
			}
			else
			{
				$tpl->template_dir=$config['webroot']."/templates/".$config['temp']."/";
			}
			include("module/".$_GET['m']."/".$_GET['s'].".php");
			break;
		}
		//else
		//{
			
			//-----------------------提醒开通支付账号
		//	$sql = "select pay_uid,cash from ".PUSER." where userid='$buid'";
		//	$db->query($sql);
		//	$pay_re=$db->fetchRow();
		//	$tpl->assign("cash",$pay_re['cash']);
		//	if(empty($pay_re['pay_uid']))
		//		$admin->msg("main.php?m=payment&s=admin_info","请先开通支付账号",'failure');
			
		//	if($config['temp']=='wap')
		//	{
				//$cominfo=$shop->get_shop_info($buid);
				//$admin->tpl->assign("cominfo",$cominfo);
				//$count=$shop->get_all_count(ORDER,array('1','2','3','4'));
				//$admin->tpl->assign("shop_count",$count);
		//		$page="user_admin/admin_main_p.htm";
		//	}
		//	else
		//	{
		//		$tpl->assign("count",$member->GetCount($buid));
		//		$page="admin_main_p.htm";
		//	}
			//------------------------------------------------
		//	break;
		//}
	}
}

$tpl->assign("lang",$lang);
include_once("footer.php");
if(!empty($nohead))
	$tpl->display($page);
else
{
	
	if(!empty($output))
		$tpl->assign("output",$output);
	else
		$tpl->assign("output",$admin -> tpl -> fetch($page));
	
	if($config['temp']=='wap')
	{
		$page="admin_inc_p.htm";
		$tpl->template_dir=$config['webroot']."/templates/".$config['temp']."/user_admin/";
	}
	else
	{
		$page="admin_inc_p.htm";
	}
	$tpl->display($page);
}
?>
