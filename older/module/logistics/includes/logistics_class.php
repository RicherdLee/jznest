<?php
class logistics
{
	var $db;
	var $tpl;
	var $page;
	
	function logistics()
	{
		global $db;
		global $tpl;		
		$this -> db     = & $db;
	}
	
	function add_logis()
	{
		global $buid;
		$sql="insert into ".LGSTEMP." (title,type,`desc`) values ('$_POST[title]','$_POST[type]','$_POST[content]')";
		$this->db->query($sql);
		$id=$this->db->lastid();
		if($id)
		{
			$this->update_logis_temp_con($id);
		}

	}
	function edit_logis($id)
	{
		$sql="update ".LGSTEMP." set title='$_POST[title]',type='$_POST[type]',`desc`='$_POST[content]' where id='$id'";
		$this->db->query($sql);
		if($id)
		{
			$this->update_logis_temp_con($id,"define_citys='default'");
		}
	}
	function update_logis_temp_con($id,$sqls="")
	{
		$_POST['default_num']*=1;
		$_POST['default_price']*=1;
		$_POST['add_num']*=1;
		$_POST['add_price']*=1;
		$_POST['free']*=1;
		$_POST['add_city']=$_POST['add_city']?$_POST['add_city']:"default";
		if($sqls)
		{
			$sql="update ".LGSTEMPCON." set default_num='$_POST[default_num]',default_price='$_POST[default_price]',`add_num`='$_POST[add_num]',`add_price`='$_POST[add_price]',`free`='$_POST[free]',`define_citys`='$_POST[add_city]' where temp_id='$id' and $sqls";	
		}
		else
		{
			$sql="insert into ".LGSTEMPCON." 
		(temp_id,default_num,default_price,add_num,add_price,free,define_citys) values ('$id','".$_POST['default_num']."','".$_POST['default_price']."','".$_POST['add_num']."','".$_POST['add_price']."','".$_POST['free']."','".$_POST['add_city']."')";
		}
		$this->db->query($sql);
	}
	
	function temp_con()
	{
		if($_POST['id'] and is_numeric($_POST['id']))
		{
			if($_POST['add_city'])
			{
				foreach($_POST['add_city'] as $key=>$v)
				{
					if(!empty($v))
					{
						$_POST['default_num'][$key]=$_POST['default_num'][$key]?$_POST['default_num'][$key]*1:"0";
						$_POST['default_price'][$key]=$_POST['default_price'][$key]?$_POST['default_price'][$key]*1:"0";
						$_POST['add_num'][$key]=$_POST['add_num'][$key]?$_POST['add_num'][$key]*1:"0";
						$_POST['add_price'][$key]=$_POST['add_price'][$key]?$_POST['add_price'][$key]*1:"0";
						$_POST['free'][$key]=$_POST['free'][$key]?$_POST['free'][$key]*1:"0";
						$v=$v.',';
						$sql="insert into ".LGSTEMPCON." (temp_id,default_num,default_price,add_num,add_price,free,define_citys) values ('$_POST[id]','".$_POST['default_num'][$key]."','".$_POST['default_price'][$key]."','".$_POST['add_num'][$key]."','".$_POST['add_price'][$key]."','".$_POST['free'][$key]."','$v')";
						$this->db->query($sql);
					}
				}
			}
			if($_POST['edit_city'])
			{
				foreach($_POST['edit_city'] as $key=>$v)
				{
					if(!empty($v))
					{
						$_POST['edit_default_num'][$key]=$_POST['edit_default_num'][$key]?$_POST['edit_default_num'][$key]*1:"0";
						$_POST['edit_default_price'][$key]=$_POST['edit_default_price'][$key]?$_POST['edit_default_price'][$key]*1:"0";
						$_POST['edit_add_num'][$key]=$_POST['edit_add_num'][$key]?$_POST['edit_add_num'][$key]*1:"0";
						$_POST['edit_add_price'][$key]=$_POST['edit_add_price'][$key]?$_POST['edit_add_price'][$key]*1:"0";
						$_POST['edit_free'][$key]=$_POST['edit_free'][$key]?$_POST['edit_free'][$key]*1:"0";
						
						$sql="update ".LGSTEMPCON." set default_num='".$_POST['edit_default_num'][$key]."',default_price='".$_POST['edit_default_price'][$key]."',`add_num`='".$_POST['edit_add_price'][$key]."',`add_price`='".$_POST['edit_add_num'][$key]."',`free`='".$_POST['edit_free'][$key]."',`define_citys`='$v' where id='$key' and temp_id='$_POST[id]'";
						$this->db->query($sql);
					}
				}
			}
		}
	}
	
	function count_freight($id,$city,$sumprice,$weight)
	{
		$sql="select id,default_num,default_price,add_num,add_price,free from ".LGSTEMPCON." where temp_id='$id' and define_citys like '%$city,%'";
		$this->db->query($sql);
		$re=$this->db->fetchRow();
		if(empty($re['id']))
		{	
			$sql="select id,default_num,default_price,add_num,add_price,free from ".LGSTEMPCON." where temp_id='$id' and define_citys='default'";
			$this->db->query($sql);
			$re=$this->db->fetchRow();
		}
		if($sumprice>=$re['free'] and !empty($re['free']))
		{
			$price=0;
		}
		else
		{
			if($weight<=$re['default_num'])
				$price=$re['default_price'];
			else
			{
				if($re['add_num'])
					$price=$re['default_price']+ceil(($weight-$re['default_num'])/$re['add_num'])*$re['add_price'];
				else
					$price=$re['default_price']+ceil(($weight-$re['default_num']))*$re['add_price'];
			}
		}	
		
		return $price;
	}
}
?>