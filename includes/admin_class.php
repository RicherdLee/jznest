<?php
class admin{

	var $cTime;
	var $db;
	var $tpl;
	var $page;
	function admin()
	{
		global $db;
		global $config;
		global $tpl;
		
		$this -> cTime  = date("Y-m-d H:i:s");
		$this -> db     = & $db;
		$this -> tpl    = & $tpl;
	} 
	//===========================================
	function is_login($action)
	{
		global $buid,$config;
		if(!$buid||!isset($_COOKIE["USER"]))
		{
			header("Location: $config[weburl]/login.php");
			exit();
		}
	
		if(empty($_SESSION["STATU"]))
		{
			$this->db->query("select statu from ".MEMBER." WHERE userid='$buid'");
			$re=$this->db->fetchRow();
			$_SESSION["STATU"]=$re['statu'];
			if(empty($_SESSION["STATU"]))
				$_SESSION["STATU"]=2;
		}
		
		
		if($_SESSION["STATU"]<=-1&&$_GET['type']!='access_dine'&&$action!='logout')
		{
			header("Location: $config[weburl]/main.php?action=msg&type=access_dine");
			exit();
		}
		
		if(!empty($_SESSION["STATU"])&&$_SESSION["STATU"]==1&&$_GET['s']!="admin_member"&&$_GET['m']!="sns"&&$action!="msg"&&$action!="logout")
		{
			header("Location: $config[weburl]/main.php?action=msg&type=active&url=main.php&str=审核中");
			exit();
		}
	}
	function msg($url,$str=NULL,$type=NULL,$time=NULL)
	{
		$str=urlencode($str);
		$url=urlencode($url);
		header("Location:?action=msg&str=$str&url=$url&time=$time&type=$type");
	}

	function getProTypeName($prod)
	{	
		global $db;
		if(!empty($prod))
		{
			$sql = "select cat from ".PCAT." where catid in($prod)";
			$db->query($sql);
			$fieldlist="";
			while($v=$db->fetchRow())
			{
				if($v["cat"]!="")
				$fieldlist.=$v["cat"]."->";
			}
			$fieldlist = trim($fieldlist,"->");
		}
		return $fieldlist;
	}
}
?>