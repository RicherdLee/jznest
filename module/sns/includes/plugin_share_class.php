<?php
class share
{
	var $db;
	function share()
	{
		global $db;	
		$this -> db     = & $db;
	}
	
	
	function GetShareGoodsList()
	{
		global $config,$buid;
		$sql="select a.id,a.pid,a.commentcount,b.image,b.pname,b.price,b.collectnum,c.sell_amount from ".SPRO." a left join ".SPROINFO." b on a.pid = b.pid left join ".SETMEAL." c on a.pid=c.id where a.uid=$buid order by a.addtime desc";
		
		include_once($config['webroot']."/includes/page_utf_class.php");
		$page = new Page;
		$page->listRows=12;
		if (!$page->__get('totalRows')){
			$this->db->query($sql);
			$page->totalRows =$this->db->num_rows();
		}
        $sql .= "  limit ".$page->firstRow.",12";
		$this->db->query($sql);
		$re["list"]=$this->db->getRows();
		$re["page"]=$page->prompt();
		return $re;
	}
	
	function GetShareGoods()
	{
		global $buid;	
		$sql="select a.pid,image,pname from ".SPRO." a left join ".SPROINFO." b on a.pid = b.pid where uid=$buid order by a.addtime desc";
		$this->db->query($sql);
		$re=$this->db->getRows();
		return $re;
	}
	
	function GetProduct($id)
	{
		global $buid;	
		$sql="select pid,image,pname,price,collectnum from ".SPROINFO." where pid=$id";
		$this->db->query($sql);
		$re=$this->db->fetchRow();
		return $re;
	}
	
	function DelShareShop($id)
	{
		$sql="select shopid from ".SSHOP." where id='$id'";
		$this->db->query($sql);
		$shopid=$this->db->fetchField('shopid');
		//修改收藏人气
		$this->db->query("update ".USER." set shop_collect=shop_collect-1 where userid='$shopid'");	
		
		$this->db->query("delete from ".SSHOP." where id='$id'");
	}
	
	function DelShareProduct($id)
	{
		$sql="select pid from ".SPRO." where id='$id'";
		$this->db->query($sql);
		$pid=$this->db->fetchField('pid');
		//修改收藏人气
		$this->db->query("update ".SPROINFO." set collectnum=collectnum-1 where pid='$pid'");	
		
		$this->db->query("delete from ".SPRO." where id='$id'");
	}
}

?>