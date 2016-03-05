<?php
class friend
{
	var $db;
	function friend()
	{
		global $db;	
		$this -> db     = & $db;
	}
	
	//添加 好友 
	function AddFriend()
	{			  	
		global $buid;
		$user=GetMember($buid);
		$friend=GetMember($_GET['id']);
		$sql="insert into ".FRIEND." (uid,uname,uimg,fuid,funame,fuimg,addtime,state) values ($buid,'$user[user]','$user[logo]','$friend[userid]','$friend[user]','$friend[logo]','".time()."','0')";
		$this -> db->query($sql);	
		$id=$this -> db->lastid(); 
		return $id;
	}
	
	function GetMember($uid)
	{			 
		$sql="select userid,user,logo from ".MEMBER." where userid=$uid ";
		$this -> db->query($sql);
		$re=$this -> db->fetchRow();	
		return $re;
	}
	
	function GetFriendList()
	{
		global $config,$buid;	
		
		if($_GET['type']=="fan")
		{
			$str=" and fuid=$buid";
		}
		else
		{
			$str=" and uid=$buid";
		}
		$sql="select id,uid,uname,uimg,fuid,funame,fuimg,state,area,sex  from ".FRIEND." a left join ".MEMBER." b on a.fuid = b.userid where 1 $str order by addtime desc";
		
		include_once($config['webroot']."/includes/page_utf_class.php");
		$page = new Page;
		$page->listRows=10;
		
		if (!$page->__get('totalRows')){
			$this->db->query("select count(id) as num from ".FRIEND." where uid=$buid ");
			$num=$this->db->fetchRow();
			$page->totalRows = $num['num'];
		}
		
        $sql .= "  limit ".$page->firstRow.",10";
		$this->db->query($sql);
		$re["list"]=$this->db->getRows();
		$re["page"]=$page->prompt();
		return $re;
	}
}

?>