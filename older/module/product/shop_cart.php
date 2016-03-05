<?php

if(empty($buid)&&empty($_GET['type']))
{	
	if(!empty($_GET['add_cart']))
	{
		$pid=$_GET['id']*1;
		$num=$_GET['nums']*1;
		$price=$_GET['price']*1;
		$service=$_GET['service']*1;	
	}
	else
	{
		$pid=$_POST['id']*1;
		$num=$_POST['nums']*1;
		$price="0";	
		$service=$_POST['service']*1;	
	}
	if(empty($_COOKIE['cartnumt']))
	{	
		$cart=$cart."|$pid,$num,$price,$service";
		setcookie("cartnumt",$cart,NULL,"/",$config['baseurl']);
	}
	$cart=$_COOKIE['cartnumt']?$_COOKIE['cartnumt']:$cart;
	
	//----------------------------填加
	$ar=explode('|',$cart);unset($ar[0]);
	foreach($ar as $key=>$v)
	{
		$ar[$key]=explode(',',$v);
		$proid[]=$ar[$key][0];
	}
	if(is_array($proid)&&!in_array($pid,$proid))
	{
		$cart=$cart."|$pid,$num,$price,$service";
		setcookie("cartnumt",$cart,NULL,"/",$config['baseurl']);
	}
	
	msg($config['weburl']."/login.php?forward=".urlencode("$config[weburl]/?m=product&s=shop_cart")); //如果没有登录
}
else
{
	if(!empty($buid))
	{
		include_once("$config[webroot]/module/product/includes/plugin_cart_class.php");
		$cart=new cart();
		$_GET['id']*=1;
		$_GET['nums']*=1;
		$_GET['deid']*=1;
		$_GET['cgnum']*=1;
		
		if($_POST['act']=='match')
		{
			$chk=$_POST['chk'];
			if($chk)
			{
				foreach($chk as $k=>$v)
				{
					$sku=$_POST["skus"][$v];
					if($v)
						$cart->add_cart($v,'1'); 
				}
				unset($_POST['chk']);
			}
		}
		
		//---------------------------清空购物车
		if(!empty($_GET['clear'])&&empty($_GET['type']))
		{
			$cart->clear_cart();
			setcookie("cartnumt",'',NULL,"/",$config['baseurl']);//清空COOKIE
			msg($config['weburl']."/?m=product&s=cart&type=clear");//购物车已经清空
		}
		
		//---------------------------修改数量
		if(!empty($_GET['cgnum'])&&!empty($_GET['id'])&&empty($_GET['type']))
		{  
			$flag=$cart->edit_cart($_GET['id'],$_GET['cgnum']);
			if($flag=='error')
				msg($config['weburl']."/?m=product&s=cart&type=numf");//库存数量不够
		}
		
		//-----------------------通过cookie纪录向购物车添加产品信息
		if(!empty($_COOKIE['cartnumt']))
		{
			$ar=explode('|',$_COOKIE['cartnumt']);unset($ar[0]);
			foreach($ar as $key=>$v)
			{				
				$pd=explode(',',$v);
				$cart->add_cart($pd[0],$pd[1],$pd[3]); //将COOKIE记录存入购物车
			}
			setcookie("cartnumt",'',NULL,"/",$config['baseurl']);//清空COOKIE
		}
		
		if(!empty($_POST['id'])&&!empty($_POST['nums'])&&empty($_GET['type']))
		{
			$flag=$cart->add_cart($_POST['id'],$_POST['nums'],$_POST['service']); 
			if($flag=='1')
				msg($config['weburl']."/?m=product&s=shop_cart&type=numf");//库存数量不够
			else
				msg($config['weburl']."/?m=product&s=shop_cart");
		}
		
		//---------------------------删除产品信息	
		if(!empty($_GET['deid'])&&!empty($buid)&&empty($_GET['type']))   
		{
			$flag=$cart->del_cart($_GET['deid']);
			msg($config['weburl']."/?m=product&s=shop_cart");//产品已经删除
		
		}
		if($_POST['act']=='del'&&!empty($buid))   
		{
			$flag=$cart->del_cart($_POST['checkbox']);
			msg($config['weburl']."/?m=product&s=shop_cart");//产品已经删除
		}
		
		//--------------------------读出购物车的数据
		if(!empty($buid))
		{
			$re=$cart->get_listcart('');
			$tpl->assign("cart",$re);
		}
	}
}
//================================================
$tpl->assign("current","product");
include_once("footer.php");
$out=tplfetch("shop_cart.htm",$flag,true);
?>