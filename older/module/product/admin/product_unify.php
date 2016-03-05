<?php
	//统一价格
	if($_POST['act']=='price')
	{
		if($_POST['type']==1)
		{
			$id=explode(',',substr($_POST['id'],0,-1));
			if(!empty($_POST['price1']))
			{
				foreach($id as $list)
				{
					$sql="UPDATE ".PRO." SET `$_POST[name]` = '$_POST[price1]'  WHERE id='$list' ";
					$db->query($sql);
					$sql="select id from ".SETMEAL." where pid=$list";
					$db->query($sql);
					$sid=$db->fetchField('id');
					if($sid)
					{
						$sql="UPDATE ".SETMEAL." SET `$_POST[name]` = '$_POST[price1]'  WHERE pid='$list' ";
						$db->query($sql);	
					}
				}
			}
		}
		else
		{
			$id=explode(',',substr($_POST['id'],0,-1));
			if(!empty($_POST['price2']))
			{
				foreach($id as $list)
				{
					$sql="UPDATE ".PRO." SET `$_POST[name1]` = `$_POST[name2]` $_POST[fun] '$_POST[price2]'  WHERE id='$list' ";
					
					$db->query($sql);
					$sql="select id from ".SETMEAL." where pid=$list";
					$db->query($sql);
					$sid=$db->fetchField('id');
					if($sid)
					{
						$sql="UPDATE ".SETMEAL." SET `$_POST[name1]` = `$_POST[name2]` $_POST[fun] '$_POST[price2]' WHERE pid='$list' ";
						$db->query($sql);	
					}
				}
			}
		}
		die;
	}
	//统一库存
	if($_POST['act']=='stock')
	{
		if($_POST['type']==1)
		{
			$id=explode(',',substr($_POST['id'],0,-1));
			if(!empty($_POST['stock1']))
			{
				foreach($id as $list)
				{
					$sql="UPDATE ".PRO." SET `amount` = '$_POST[stock1]'  WHERE id='$list' ";
					$db->query($sql);
					$sql="select id from ".SETMEAL." where pid=$list";
					$db->query($sql);
					$sid=$db->fetchField('id');
					if($sid)
					{
						$sql="UPDATE ".SETMEAL." SET `stock` = '$_POST[stock1]'  WHERE pid='$list' ";
						$db->query($sql);	
					}
				}
			}
		}
		else
		{
			$id=explode(',',substr($_POST['id'],0,-1));
			if(!empty($_POST['stock2']))
			{
				foreach($id as $list)
				{
					$sql="UPDATE ".PRO." SET `amount` = `amount` $_POST[fun] '$_POST[stock2]'  WHERE id='$list' ";
					
					$db->query($sql);
					$sql="select id from ".SETMEAL." where pid=$list";
					$db->query($sql);
					$sid=$db->fetchField('id');
					if($sid)
					{
						$sql="UPDATE ".SETMEAL." SET `stock` = `stock` $_POST[fun] '$_POST[stock2]' WHERE pid='$list' ";
						$db->query($sql);	
					}
				}
			}
		}
		die;
	}
	$tpl->assign("config",$config);
	$tpl->display("product_unify.htm");
	
?>