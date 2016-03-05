<?php
class cart
{
	var $db;
	
	function cart()
	{
		global $db;	
		$this -> db     = & $db;
	
	}
	//获取购物车单个产品信息
	function get_cart_detail($id=NULL)
	{
		global $buid;
		$sql="select * from ".CART." where id=$id";
		$this->db->query($sql);
		$re=$this->db->fetchRow();	
		return $re;
	}
	//获取一个产品的物流价格

	//获取一个卖家的已放入购物车的产品信息
	function get_prolist($sell_userid=NULL,$area)
	{
		global $buid;
		$sql="select 
		a.*,
		a.price*a.num as sumprice,
		a.price,
		a.num,
		b.id as pid,
		b.product_give,
		b.cubage,
		b.cubage*a.num as weight,
		c.catid,
		c.pic,
		c.pname,
		b.point,
		c.setmeal as setmealname,
		c.stock,
		c.id as pid 
		from ".CART." a 
		left join ".SETMEAL." c on a.pid=c.id 
		left join ".PRO." b on c.pid=b.id 
		where a.sell_userid=$sell_userid and a.userid=$buid order by a.parent_id, a.id desc";
		$this->db->query($sql);	 	
		$re=$this->db->getRows();
		$sum=0;
		foreach($re as $key=>$val)
		{   
			$sumprice+=$val['sumprice'];//单店总价
			$weight+=$val['weight'];//单店总价
			$re[$key]['services']=$val['service'];
			if($val['service'])
			{
				$re[$key]['service']=$this->get_service($val['service']);
				if($re[$key]['service'])
				{
					foreach($re[$key]['service'] as $v)
					{
						$sum+=$v['price'];
					}
				}
			}
			if($val['product_give'])
			{
				$re[$key]['product_give_id']=$val['product_give'];
				$re[$key]['product_give']=$this->get_product($val['product_give']);
			}
		}
		$list['sumprice']=$sumprice+$sum;//单个卖家的产品总价
		$list['weight']=$weight;//总重量
		$list['prolist']=$re;//单个店铺的产品列表
		return $list;
	}
	
	function get_service($str)
	{			
		if(!$str)
		{
			return false;	
		}
		$sql="select * from ".SERVICE." where id in ($str)";
		$this->db->query($sql);
		$re=$this->db->getRows();
		return $re;
	}
	function get_product($str)
	{			
		if(!$str)
		{
			return false;	
		}
		$sql="SELECT id,pid,pic,pname FROM ".SETMEAL." where id in ($str) order by id desc";
		$this->db->query($sql);
		$re=$this->db->getRows();
		return $re;
	}
	
	//获取购物车卖家列表及卖家产品列表信息及总产品价格
	function get_listcart($area='')
	{
		global $buid;  
		$sumprice=0;	
		
		$sql="select id,sell_userid,setmeal from ".CART." where userid=$buid group by sell_userid";
		$this->db->query($sql);
		$re=$this->db->getRows();
		foreach($re as $key=>$v)
		{	
			//保存单个店铺产品总
			$pro=$this->get_prolist($v['sell_userid'],$area);
			$re[$key]['sumprice']=$pro['sumprice'];
			$re[$key]['weight']=$pro['weight'];
			$re[$key]['prolist']=$pro['prolist'];
			$sumprice+=$pro['sumprice'];
			$weight+=$pro['weight'];	
		}
		$res['cart']=$re;
		$res['sumprice']=$sumprice;
		$res['weight']=$weight;
		
		return $res;
	}
	//增加产品
	function add_cart($prid=NULL,$num=1,$service=0,$pid=0,$con=NULL)
	{
		global $buid;  
		$num*=1;
		$str="";
		$sql="select userid,a.price,a.stock as amount,a.sku as code from ".SETMEAL." a left join ".PRO." b on a.pid=b.id where a.id=$prid";
		$this->db->query($sql);
		$pro=$this->db->fetchRow(); 
		
		$sql="select id,num from ".CART." where pid=$prid and userid=$buid and parent_id='$pid' $str limit 1";
		$this->db->query($sql);
		$re=$this->db->fetchRow();
		
		$rnum=$re['num']?$re['num']:0;
		$stock=$pro['amount']?$pro['amount']:"0";
		$price=$pro['price']?$pro['price']:"0";
		$code=$pro['code']?$pro['code']:"0";
		$pro['userid']=$pro['userid']?$pro['userid']:'0';
		
		if($rnum+$num>$stock)
		{
			return "1";	
		}
		else
		{
			if(!empty($re['id']))
			{
				$sql="update ".CART." set num=num+$num where id='$re[id]'";	
				$this->db->query($sql);	
			}
			else
			{
				$service=substr($service,0,-1);
				if($service!='0')
				{
					 $service=substr($service,2,(strlen($service)-2));
				}
				$sql="insert into ".CART."(`userid`,`pid`,`sell_userid`,`price`,`num`,`time`,`code`,`service`,`parent_id`) VALUES ('$buid','$prid','$pro[userid]','$price','$num',".time().",'$code','$service','$pid')";
				$this->db->query($sql);	
			}
		}
		
	}
	//删除购物车内容
	function del_cart($id=NULL)
	{
		if(is_array($id))
		{
			$id=implode(',',$id);
			$sql="delete from ".CART." where id in ($id)";
		}
		else
		{
			$id*=1;
			$sql="delete from ".CART." where id='$id'";
		}
		$flag=$this->db->query($sql);	   
		return $flag;
	}
	
	//清空购物车内容
	function clear_cart(){
		global $buid;  
		$sql="delete from ".CART." where userid='$buid'";
		$flag=$this->db->query($sql);	   
		return $flag;
	}
	
	//编辑购物车数量
	function edit_cart($cartid=NULL,$num=NULL)
	{
		global $buid;  
		if($num<1&&!empty($cartid))//如果数量小于1就删除
			$this->del_cart($cartid);
		$sql="select b.amount,a.num,c.stock,a.setmeal from ".CART." a left join 
			".PRO." b on a.pid=b.id left join ".SETMEAL." c on a.setmeal=c.id where a.id=$cartid and a.userid=$buid";
		$this->db->query($sql);
		$re=$this->db->fetchRow();
		if($re['setmeal'])
		{
			if($num>$re['stock']&&isset($re['stock']))
			{
				$sql="update ".CART." set num='$re[stock]' where id=$cartid";	
				$this->db->query($sql);			
				return 'error';//库存不够	
			}
			else
			{  
				$sql="update ".CART." set num='$num' where id='$cartid'";
				$flag=$this->db->query($sql);	   
				return false;
			}
		}
		else
		{
			if($num>$re['amount']&&isset($re['amount']))
			{
				$sql="update ".CART." set num='$re[amount]' where id=$cartid";	
				$this->db->query($sql);			
				return 'error';//库存不够	
			}
			else
			{  
				$sql="update ".CART." set num='$num' where id='$cartid'";
				$flag=$this->db->query($sql);	   
				return false;
			}
		}
	}

}
?>
