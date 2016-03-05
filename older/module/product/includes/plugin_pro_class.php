<?php
class pro
{
	var $db;
	var $tpl;
	var $page;
	var $pic_save_path;	 
	
	function pro()
	{
		global $db;
		global $config;
		global $point_config;
		global $tpl;		
		$this -> db     = & $db;
		$this -> tpl    = & $tpl;
		$this -> cTime  = date("Y-m-d H:i:s");
		$this->pic_save_path = "";//图片保存目录
		if(!empty($_POST['title'])||!empty($_POST['title']))
		{
			include_once($config['webroot'].'/includes/filter_class.php');
			$word=new Text_Filter();
			$_POST['detail']=$word->wordsFilter($_POST['detail'], $matche_row);
			$_POST['title']=$word->wordsFilter($_POST['title'], $matche_row);
		}
	}
	function get_service($id,$service=NULL)
	{
		//------------------------------------------------------------
		$id=explode(",",$id);
		$re="";
		if(!empty($id[2]))
		{
			$this->db->query("SELECT service FROM ".PCAT." WHERE catid='$id[2]'");
			$service=$this->db->fetchField('service');
		}
		if(empty($service)&&!empty($id[1]))
		{
			$this->db->query("SELECT service FROM ".PCAT." WHERE catid='".$id[1]."'");
			$service=$this->db->fetchField('service');
		}
		if(empty($service)&&!empty($id[0]))
		{
			$this->db->query("SELECT service FROM ".PCAT." WHERE catid='".$id[0]."'");
			$service=$this->db->fetchField('service');
		}
		if(!empty($service))
		{
			$sql="select * from ".SERVICE." where id in ($service) order by id desc ";
			$this->db->query($sql);
			$re=$this->db->getRows();
		}
		return $re;
	}
	
	function get_brand($id,$sbrand=NULL)
	{
		//------------------------------------------------------------
		$id=explode(",",$id);
		if(!empty($id[2]))
			$this->db->query("SELECT brand FROM ".PCAT." WHERE catid='$id[2]'");
		$brand=$this->db->fetchField('brand');
		
		if(empty($brand)&&!empty($id[1]))
		{
			$this->db->query("SELECT brand FROM ".PCAT." WHERE catid='".$id[1]."'");
			$brand=$this->db->fetchField('brand');
		}
		if(empty($brand)&&!empty($id[0]))
		{
			$this->db->query("SELECT brand FROM ".PCAT." WHERE catid='".$id[0]."'");
			$brand=$this->db->fetchField('brand');
		}
		if(!empty($brand))
		{
			$sql="select * from ".BRAND." where id in ($brand) order by displayorder asc ";
			$this->db->query($sql);
			$re=$this->db->getRows();
			$op=NULL;
			foreach($re as $v)
			{
				if($v['name']==$sbrand)
					$s='selected="selected"';
				else
					$s=NULL;
				$op.='<option '.$s.' value="'.$v["name"].'">'.$v["name"].'</option>';
			}
			return '<select select="select" name="brand" id="brand" />'.$op.'</select>';
		}
		else
			return '<input maxlength="20" type="text" name="brand" value="'.$sbrand.'" />';
	}
	
	function getProTypeName($prod)
	{
		if(!empty($prod))
		{
			$sql = "select cat from ".PCAT." where catid in($prod)";
			$this->db->query($sql);
			$fieldlist="";
			while($v=$this->db->fetchRow())
			{
				if($v["cat"]!="")
				$fieldlist.=$v["cat"]."->";
			}
			$fieldlist = trim($fieldlist,"->");
		}
		return $fieldlist;
	}
	
	function add_pro()
	{	
		global $config,$buid,$admin,$config;
		include_once("$config[webroot]/includes/tag_inc.php");
		
		$title=htmlspecialchars($_POST["title"]);
		$ftitle=htmlspecialchars($_POST["ftitle"]);
		$promotion_tips=htmlspecialchars($_POST["promotion_tips"]);
		
		$_POST['amount']=empty($_POST['amount'])?100:$_POST['amount'];
		$_POST['market_price']*=1;
		$_POST['cost_price']*=1;
		$_POST['freight']*=1;//0为自设定，其它为运费模板。
		$_POST['freight_type']*=1;//1为买家承担，0为卖家承担
		$_POST['weight']*=1;//体积
		$_POST['cubage']*=1;//重量
		$_POST['post_price']*=1;
		$_POST['express_price']*=1;
		$_POST['ems_price']*=1;
		$_POST["detail"]=replace_outside_link($_POST["detail"]);//过虑内容中的a
		$_POST['point']*=1;
		$_POST['ptype']=$_POST['ptype']?$_POST['ptype']:"0";
		$_POST['statu']=empty($_POST['statu'])?NULL:implode(",",$_POST['statu']);
		$_POST['service']=empty($_POST['service'])?NULL:implode(",",$_POST['service']);
		$str=substr($_POST['product_related'],'0','-1');
		$_POST['product_related']=empty($_POST['product_related'])?NULL:$str;
		$str1=substr($_POST['product_give'],'0','-1');
		$_POST['product_give']=empty($_POST['product_give'])?NULL:$str1;
		$str2=substr($_POST['product_parts'],'0','-1');
		$_POST['product_parts']=empty($_POST['product_parts'])?NULL:$str2;
		$times=time();
		$_POST['member_price']=$_POST['member_price']?'1':"0";
		$_POST['amount']=$_POST['amount']?$_POST['amount']:"0";
		$buid=$buid?$buid:"0";
		
		$catid=$_POST['catid'];
		$pactidlist=$_POST['catid'];
		if(!empty($_POST['tcatid'])){
			$catid=$_POST['tcatid'];
			$pactidlist.= ",".$_POST['tcatid'];
		}
		if(!empty($_POST['scatid'])){
			$catid=$_POST['scatid'];
			$pactidlist.=",".$_POST['scatid'];
		}
		if(!empty($_POST['sscatid'])){
			$catid=$_POST['sscatid'];
			$pactidlist.=",".$_POST['sscatid'];
		}
		if(empty($_POST['custom_cat'])){
			$_POST['custom_cat']=0;	
		}
		//-----产品入库
		$pic='';
		$pic_more='';
		$img='';
		$_POST['pic']=array_unique($_POST['pic']);
		if(!empty($_POST['pic']))
		{
			foreach($_POST['pic'] as $val)
			{
				if($val)
				{
					$img[]=$val;	
				}
			}
			if(!empty($img))
			{
				$pic=$img['0'];
				$pic_more=implode(',',array_unique($img));
			}
		}
		
		$sql="INSERT INTO ".PRO." (userid,user,catid,pname,ftitle,promotion_tips,brand,market_price,price,cost_price,member_price,uptime,pic,pic_more,province,city,amount,code,ptype,keywords,custom_cat_id,point,freight_type,freight,post_price,express_price,ems_price,area,areaid,service,product_related,product_give,product_parts,statu,cubage,weight) 
		VALUES
			('$buid','$_COOKIE[USER]','$catid','$title','$ftitle','$promotion_tips',
		'$_POST[brand]','$_POST[market_price]','$_POST[price]','$_POST[cost_price]','$_POST[member_price]','$this->cTime','$pic','$pic_more','$_POST[province]','$_POST[city]','$_POST[amount]','$_POST[code]',
		'$_POST[ptype]','$_POST[keywords]','$_POST[custom_cat]','$_POST[point]','$_POST[freight_type]','$_POST[freight]','$_POST[post_price]','$_POST[express_price]','$_POST[ems_price]','$_POST[t]','$_POST[area]','$_POST[service]','$_POST[product_related]','$_POST[product_give]','$_POST[product_parts]','$_POST[statu]','$_POST[cubage]','$_POST[weight]')";
		$re=$this->db->query($sql);
		$id=$this->db->lastid();
		$re=$this->db->query("INSERT INTO ".PRODETAIL." (userid,proid,detail,after_service) VALUES ('$buid','$id','$_POST[detail]','$_POST[after_service]')");
		
	
		$i=0;
		if(!empty($_POST['spec']))
		{
			if(!empty($_POST['color_img']))
			{
				foreach($_POST['color_img'] as $key=>$val)
				{
					if($val)
					{
						$v=explode('_',$key);
						$color_img_arr[$v[1]]="$val";
					}
				}
			}
			
			foreach($_POST['spec'] as $key=>$v)
			{
				$str1 = array();
				$str2 = array();
				foreach($v['sp_value'] as $val)
				{
					foreach($val as $num=>$s)
					{
						$str1[] = $s;
						$str2[] = $num;
					}
				}
				
				if($color_img_arr[$i])
				{
					$pic1 = $color_img_arr[$i];
				}
				else
				{
					$pic1 = $pic;
				}
				$name=implode(',',$str1);
				$pids=implode(',',$str2);
				if(!empty($v))
				{
					$title1='';
					$v['price']=$v['price']?$v['price']*1:"0.00";
					$v['market_price']=$v['market_price']?$v['market_price']*1:"0.00";
					$v['cost_price']=$v['cost_price']?$v['cost_price']*1:"0.00";
					$title1=$title.$name;
					$sql="insert into ".SETMEAL."					(pid,setmeal,price,market_price,cost_price,stock,sku,property_value_id,catid,pname,promotion_tips,brand,pic,sell_amount,province,city,areaid,area,uptime,rank,statu) 
					values 
					('$id','".$name."','".$v['price']."','".$v['market_price']."','".$v['cost_price']."','".$v['stock']."','".$v['sku']."','".$pids."','$catid','$title1','$promotion_tips','$_POST[brand]','$pic1','0','$_POST[province]','$_POST[city]','$_POST[area]','$_POST[t]','$times','0','1')";
					$this->db->query($sql);
				}
				$i++;
			}
		}
		else
		{
			
			$sql="insert into ".SETMEAL." 
(pid,setmeal,price,market_price,cost_price,stock,sku,property_value_id,catid,pname,promotion_tips,brand,pic,sell_amount,province,city,areaid,area,uptime,rank,statu,member_price) 
			values 
			('$id','','".$_POST['price']."','".$_POST['market_price']."','".$_POST['cost_price']."','".$_POST['amount']."','".$_POST['code']."','','$catid','$title','$promotion_tips','$_POST[brand]','$pic','0','$_POST[province]','$_POST[city]','$_POST[area]','$_POST[t]','$times','0','1','$_POST[member_price]')";
			$this->db->query($sql);	
		}
		//--------------------更新关键词
		add_tags($_POST['keyword'],1,$id);
		
		//--------------------填加自定义字段
		$sql="select ext_table from ".PCAT." where catid='$catid'";
		$this->db->query($sql);
		$ext_table=$this->db->fetchField('ext_table');
		
		include_once("$config[webroot]/module/product/includes/plugin_add_field_class.php");
		$addfield = new AddField('product');
		$addfield->update_con($id,$ext_table);
		//---------------------
		return $re;
	}

	function edit_pro()
	{
		global $config,$buid,$admin,$config;
		include_once("$config[webroot]/includes/tag_inc.php");
		
		$title=htmlspecialchars($_POST["title"]);
		$ftitle=htmlspecialchars($_POST["ftitle"]);
		$promotion_tips=htmlspecialchars($_POST["promotion_tips"]);
		
		$catid=$_POST['catid'];
		$pactidlist= $_POST['catid'];
		$id=$_POST["editID"]*1;
		$_POST['market_price']*=1;
		$_POST['freight']*=1;//0为自设定，其它为运费模板。
		$_POST['freight_type']*=1;//1为买家承担，0为卖家承担
		$_POST['weight']*=1;//体积
		$_POST['cubage']*=1;//重量
		$_POST['post_price']*=1;
		$_POST['express_price']*=1;
		$_POST['ems_price']*=1;
		$_POST['point']*=1;
		$_POST['ptype']*=1;
		$_POST['price']=$_POST['price']?$_POST['price']:($_POST['setmeal_p'][0]?$_POST['setmeal_p'][0]:$_POST['setmeal_p1'][0]);
		$_POST['amount']=$_POST['amount']?$_POST['amount']:"100";
		$_POST['member_price']=$_POST['member_price']?'1':"0";
		$_POST['service']=empty($_POST['service'])?NULL:implode(",",$_POST['service']);
		$_POST['statu']=empty($_POST['statu'])?NULL:implode(",",$_POST['statu']);
		$str=substr($_POST['product_related'],'0','-1');
		$_POST['product_related']=empty($_POST['product_related'])?NULL:$str;
		$str1=substr($_POST['product_give'],'0','-1');
		$_POST['product_give']=empty($_POST['product_give'])?NULL:$str1;
		$str2=substr($_POST['product_parts'],'0','-1');
		$_POST['product_parts']=empty($_POST['product_parts'])?NULL:$str2;
		$buid=$buid?$buid:"0";
		$times=time();
		if(empty($catid)||empty($title))
			return 'Error';
		
		if(!empty($_POST['tcatid'])){
			$catid=$_POST['tcatid'];
			$pactidlist.= ",".$_POST['tcatid'];
		}
		if(!empty($_POST['scatid'])){
			$catid=$_POST['scatid'];
			$pactidlist.= ",".$_POST['scatid'];
		}
		if(!empty($_POST['sscatid'])){
			$catid=$_POST['sscatid'];
			$pactidlist.= ",".$_POST['sscatid'];
		}	
		if(empty($_POST['custom_cat'])){
			$_POST['custom_cat']=0;	
		}

		$sub_sql = '';
		$pic='';
		$pic_more='';
		$img='';
		$_POST['pic']=array_unique($_POST['pic']);
		if(!empty($_POST['pic']))
		{
			foreach($_POST['pic'] as $val)
			{
				if($val)
				{
					$img[]=$val;	
				}
			}
			if(!empty($img))
			{
				$pic=$img['0'];
				$pic_more=implode(',',array_unique($img));
				$sub_sql.= $pic ?",pic='$pic'":",pic=''";
				$sub_sql.= $pic_more ?",pic_more='$pic_more'":",pic_more=''";
			}
		}
		$sql="UPDATE ".PRO."  SET
			point='$_POST[point]',pname='$title',ftitle='$ftitle',promotion_tips='$promotion_tips',catid='$catid',
			brand='$_POST[brand]',market_price='$_POST[market_price]',cost_price='$_POST[cost_price]',price='$_POST[price]',code='$_POST[code]',member_price='$_POST[member_price]',
			uptime='$this->cTime',province='$_POST[province]',city='$_POST[city]',area='$_POST[t]',areaid='$_POST[area]',amount='$_POST[amount]',ptype='$_POST[ptype]',keywords='$_POST[keywords]',freight='$_POST[freight]',freight_type='$_POST[freight_type]',weight='$_POST[weight]',cubage='$_POST[cubage]',post_price='$_POST[post_price]',express_price='$_POST[express_price]',ems_price='$_POST[ems_price]',custom_cat_id='$_POST[custom_cat]',service='$_POST[service]',product_related='$_POST[product_related]',product_give='$_POST[product_give]',product_parts='$_POST[product_parts]',statu='$_POST[statu]'".$sub_sql." WHERE id=$id and userid='$buid'";
		$re=$this->db->query($sql);
		
		if(!empty($_POST['spec']))
		{
			$cid='';
			if(!empty($_POST['color_img']))
			{
				foreach($_POST['color_img'] as $key=>$val)
				{
					if($val)
					{
						$v=explode('_',$key);
						$color_img_arr[$v[1]]="$val";	
						$cid=$v[0];
					}
				}
			}
			$sql="select property_value_id,id from ".SETMEAL." where pid = '$id' ";
			$this->db->query($sql);
			$re=$this->db->getRows();
			
	
			foreach($_POST['spec'] as $key=>$v)
			{
				$str1 = array();
				$str2 = array();
				$sign='f';
				foreach($v['sp_value'] as $k=>$val)
				{
					foreach($val as $num=>$s)
					{
						$str1[] = $s;
						$str2[] = $num;
					}				
					
					if($k==$cid && $color_img_arr[$num])
					{
						$pic1 = $color_img_arr[$num];
						$sub_sql11 = " , pic = '$pic1' ";
						$sign='t';
					}
					
				}
				if($sign=='f')
				{
					$pic1 = $pic;
					$sub_sql11 = $sub_sql1;
				}
				$name=implode(',',$str1);
				$pids=implode(',',$str2);
				$pid2[]=$pids;
				
				$sql="select id from ".SETMEAL." where pid = '$id' and property_value_id='$pids'";
				$this->db->query($sql);
				$setmeal_id=$this->db->fetchField('id');
				if(!empty($v))
				{
					$title1='';
					$v['price']=$v['price']?$v['price']*1:"0.00";
					$v['market_price']=$v['market_price']?$v['market_price']*1:"0.00";
					$v['cost_price']=$v['cost_price']?$v['cost_price']*1:"0.00";
					$title1=$title.$name;
					if($setmeal_id)
					{
						$sql="UPDATE ".SETMEAL."  SET 			pname='$title1',promotion_tips='$promotion_tips',catid='$catid',brand='$_POST[brand]',market_price='$v[market_price]',cost_price='$v[cost_price]',price='$v[price]',member_price='$_POST[member_price]',sku='$v[sku]',uptime='$times',province='$_POST[province]',city='$_POST[city]',area='$_POST[t]',areaid='$_POST[area]',statu='$_POST[statu]',stock='$v[stock]' ,setmeal = '$name' $sub_sql11 WHERE id='$setmeal_id'";
						$this->db->query($sql);
					}
					else
					{
						$sql="insert into ".SETMEAL." 
						(pid,setmeal,price,market_price,cost_price,stock,sku,property_value_id,catid,pname,promotion_tips,brand,pic,sell_amount,province,city,areaid,area,uptime,rank,statu,member_price) 
						values 
						('$id','".$name."','".$v['price']."','".$v['market_price']."','".$v['cost_price']."','".$v['stock']."','".$v['sku']."','".$pids."','$catid','$title1','$promotion_tips','$_POST[brand]','$pic1','0','$_POST[province]','$_POST[city]','$_POST[area]','$_POST[t]','$times','0','$_POST[statu]','$_POST[member_price]')";
						$this->db->query($sql);
					}
				}
			}
			foreach($re as $vs)
			{
				if(!in_array($vs['property_value_id'],$pid2))
				{
					$str3[]=$vs['id'];	
				}
			}
			if(!empty($str3))
			{
				$pid1=implode(',',$str3);	
				$sql="DELETE FROM ".SETMEAL." WHERE `id` in ($pid1) ";
				$this->db->query($sql);	
			}
		}
		else
		{
			
			$sql="DELETE FROM ".SETMEAL." WHERE  pid = '$id' and `property_value_id` != '' ";
			$this->db->query($sql);	
				
			$sql="select id from ".SETMEAL." where pid = '$id'";
			$this->db->query($sql);
			$setmeal_id=$this->db->fetchField('id');
			if($setmeal_id)
			{
				$sql="UPDATE ".SETMEAL."  SET pname='$title',promotion_tips='$promotion_tips',catid='$catid',brand='$_POST[brand]',market_price='$_POST[market_price]',cost_price='$_POST[cost_price]',price='$_POST[price]',sku='$_POST[code]',uptime='$times',province='$_POST[province]',city='$_POST[city]',area='$_POST[t]',areaid='$_POST[area]',stock='$_POST[amount]',statu='$_POST[statu]',member_price='$_POST[member_price]' $sub_sql1 WHERE id='$setmeal_id'";
				$this->db->query($sql);
			}
			else
			{
				$sql="insert into ".SETMEAL." (pid,setmeal,price,market_price,cost_price,stock,sku,property_value_id,catid,pname,promotion_tips,brand,pic,sell_amount,province,city,areaid,area,uptime,rank,statu,member_price) 
				values 
				('$id','','".$_POST['price']."','".$_POST['market_price']."','".$_POST['cost_price']."','".$_POST['amount']."','".$_POST['code']."','','$catid','$title','$promotion_tips','$_POST[brand]','$pic','0','$_POST[province]','$_POST[city]','$_POST[area]','$_POST[t]','$times','0','$_POST[statu]','$_POST[member_price]')";
				$this->db->query($sql);	
			}
		}
		
		//-----------------更新产品详情
		$sql="select proid from ".PRODETAIL." where proid='$id'";
		$this->db->query($sql);
		if($this->db->num_rows())
			$re=$this->db->query("UPDATE ".PRODETAIL." SET detail='$_POST[detail]',after_service='$_POST[after_service]' WHERE proid='$id'");
		else
			$re=$this->db->query("INSERT INTO ".PRODETAIL." (userid,proid,detail) VALUES ('$buid','$id','$_POST[detail]')");
			
		//--------------------添加关键词
		edit_tags($_POST['keyword'],1,$id);
	
		//--------------------填加自定义字段
		$sql="select ext_table from ".PCAT." where catid='$catid'";
		$this->db->query($sql);
		$ext_table=$this->db->fetchField('ext_table');
		
		include_once("$config[webroot]/module/product/includes/plugin_add_field_class.php");
		$addfield = new AddField('product');
		$addfield->update_con($id,$ext_table);
		//---------------------
		return $re;
	}
	
	function pro_detail($id)
	{
		if($id)
		{	
			global $config,$buid;
			include_once("$config[webroot]/includes/tag_inc.php");
			$s="";
			if($buid)
			{
				$s="and a.userid='$buid'";	
			}
			$sql="select a.*,b.detail,b.after_service from ".PRO." a left join ".PRODETAIL." b on a.id=b.proid where a.id=$id $s";
			$this->db->query($sql);
			$re=$this->db->fetchRow();
			if($re['userid'])
			{
				$sql="select shop_name from ".SHOP." where shop_id='re[userid]'";	
				$this->db->query($sql);
				$re['shop_name']=$this->db->fetchField('shop_name');
			}
			$sql="select ext_table from ".PCAT." where catid='$re[catid]'";
			$this->db->query($sql);
			$re['ext_table']=$this->db->fetchField('ext_table');
			
			if(strlen($re['catid'])>8)
				$re['sscatid']=$re['catid'];
			if(strlen($re['catid'])>6)
				$re['scatid']=substr($re['catid'],0,8);	
			if(strlen($re['catid'])>4)
				$re['tcatid']=substr($re['catid'],0,6);
			$re['catid']=substr($re['catid'],0,4);
			
			//=====================================
			$re['keyword']=get_tags($id,1);
			//======================================
			
			$re['pic'] = $re['pic_more']?explode(',',$re['pic_more']):'';
			$re['services'] = $re['service']?explode(',',$re['service']):'';
			$re['statu'] = $re['statu']?explode(',',$re['statu']):'';
			$re['product_related_id'] = $re['product_related']?explode(',',$re['product_related']):'';
			$re['product_give_id'] = $re['product_give']?explode(',',$re['product_give']):'';
			$re['product_parts_id'] = $re['product_parts']?explode(',',$re['product_parts']):'';
			if($re['product_related_id'])
			{
				foreach($re['product_related_id'] as $key=>$val)
				{
					if($val)
					{
						$sql="SELECT id,pic,pname,price,market_price,cost_price,sku as code,stock as amount FROM ".SETMEAL." where id='$val' order by id desc";
						$this->db->query($sql);
						$aa[$key]=$this->db->getRows();
					}
				}
				$re['product_relateds']=$aa;
			}
			if($re['product_give_id'])
			{
				foreach($re['product_give_id'] as $key=>$val)
				{
					if($val)
					{
						$sql="SELECT id,pic,pname,price,market_price,cost_price,sku as code,stock as amount FROM ".SETMEAL." where id='$val' order by id desc";
						$this->db->query($sql);
						$bb[$key]=$this->db->getRows();
					}
				}
				$re['product_gives']=$bb;
			}
			if($re['product_parts_id'])
			{
				foreach($re['product_parts_id'] as $key=>$val)
				{
					if($val)
					{
						$sql="SELECT id,pic,pname,price,market_price,cost_price,sku as code,stock as amount FROM ".SETMEAL." where id='$val' order by id desc";
						$this->db->query($sql);
						$cc[$key]=$this->db->getRows();
					}
				}
				$re['product_partss']=$cc;
			}
			$sql="select * from ".SETMEAL." where pid=$id and property_value_id !='' ";
			$this->db->query($sql);
			$re['porperty']=$this->db->getRows();
			foreach($re['porperty'] as $key=>$val)
			{
				$a=explode(',',$val['setmeal']);
				$b=explode(',',$val['property_value_id']);
				$c=array();
				$d='';
				foreach($a as $k=>$v)
				{
					$num=$b[$k];
					$c[$k][$num]=$v;
					$d.=$num;
				}
				$re['porperty'][$key]['setmeal']=$c;
				$re['porperty'][$key]['property_value_id']=$d;
			}
			return $re;
		}
	}
	//==============================
	function detail($pid)
	{
		global $buid,$config;
		$this->db->query("update ".PRO." set read_nums=read_nums+1 where id='$pid'");
		
		$sql="select 
		a.*,
		a.sku as code,
		a.stock as amount,
		service,
		c.userid,
		product_related,
		product_give,
		product_parts,
		ftitle,
		pic_more,
		detail,
		after_service 
		from 
		".SETMEAL." a left join 
		".PRO." c on a.pid=c.id left join 
		".PRODETAIL." b on a.pid=b.proid
		where a.id='$pid'";
		$this->db->query($sql);
		$prod=$this->db->fetchRow();
		if($prod['service'])
		{
			$sql="SELECT * FROM ".SERVICE." where id in ($prod[service]) order by id desc";
			$this->db->query($sql);
			$prod['service']=$this->db->getRows();
		}
		if($prod['userid'])
		{
			$sql="SELECT shop_name FROM ".SHOP." where shop_id='$prod[userid]'";
			$this->db->query($sql);
			$prod['shop_name']=$this->db->fetchField('shop_name');
		}
		if($prod['product_give'])
		{
			$sql="SELECT id,pic,pname FROM ".SETMEAL." where id in ($prod[product_give]) order by id desc";
			$this->db->query($sql);
			$prod['product_gives']=$this->db->getRows();
		}
		if($prod['product_parts'])
		{
			$sql="SELECT id,pid,pic,pname,price,sku as code FROM ".SETMEAL." where id in ($prod[product_parts]) order by id desc";
			$this->db->query($sql);
			$prod['product_partss']=$this->db->getRows();
		}
		$sql="select * from ".SETMEAL." where pid='$prod[pid]' and property_value_id !='' ";
		$this->db->query($sql);
		$prod['porperty']=$this->db->getRows();
		foreach($prod['porperty'] as $key=>$val)
		{
			$a=explode(',',$val['setmeal']);
			$b=explode(',',$val['property_value_id']);
			$c=array();
			$d='';
			foreach($a as $k=>$v)
			{
				$num=$b[$k];
				$c[$k][$num]=$v;
				$d[]=$num;
			}
			$re['porperty'][$key]['setmeal']=$c;
			$re['porperty'][$key]['property_value_id']=$d;
		}
		if(!empty($prod['pic'])){
			$prod['pic_more'] = explode(",",$prod['pic_more']);		
		}
		return $prod;
	}
	
	function get_comment_count($id)
	{
		$sql="select count(*) as count from ".PCOMMENT." where pid='$id'";
		$this->db->query($sql);
		$count=$this->db->fetchfield("count");	
		return $count;
	}
	function get_comment($id,$goodbad=NULL,$count='0')
	{
		if(is_numeric($goodbad))
			$scl.=" and goodbad = $goodbad";
		$sql="select count(*) as count from ".PCOMMENT." where pid='$id' $scl";
		$this->db->query($sql);
		$num=$this->db->fetchfield("count");
		return $count==0?($goodbad=='1'?'100':"0"):$num/$count*100; 
	}
	
	
	function pro_list($statu)
	{
		global $buid,$config;
		//if(isset($statu))
		//{
			//if($statu==1)
			//	$sqls="and statu>=1";
			//else
				//$sqls="and statu='$statu'";
		//}
		if(!empty($_GET['key']))
		{
			$sqls.="and pname like '%$_GET[key]%'";
		}
		$sql="select id,pname,uptime,pic,statu,price,amount,code from ".PRO."  where userid='$buid' $sqls order by uptime desc";
		//=============================
	  	$page = new Page;
		$page->listRows=10;
		if (!$page->__get('totalRows')){
			$this->db->query("select count(id) as num from ".PRO." where userid='$buid' $sqls ");
			$num=$this->db->fetchRow();
			$page->totalRows = $num['num'];
		}
        $sql .= "  limit ".$page->firstRow.",10";
		//=====================
		$this->db->query($sql);
		$re["list"]=$this->db->getRows();
		$re["page"]=$page->prompt();
		return $re;
	}
	
	function del_pro($id,$uid=NULL)
	{
		global $config,$buid;
		if(!empty($uid))
			$buid=$uid;
		//---------------------------------------------------
		$this->db->query("select catid,pic from ".PRO." where id='$id'");
		$re=$this->db->fetchRow();
		
		//---------------------------------------------------
		$this->db->query("delete from  ".PRO." where id='$id'");
		$this->db->query("delete from  ".PRODETAIL." where proid='$id'");
		$this->db->query("delete from  ".SETMEAL." where pid='$id'");
	
		//----------------------------------------------------删除自定义数据
		$sql="select ext_table from ".PCAT." where catid='$catid'";
		$this->db->query($sql);
		$ext_table=$this->db->fetchField('ext_table');
		
		include_once("$config[webroot]/module/product/includes/plugin_add_field_class.php");
		$addfield = new AddField('offer');
		$addfield->delete_con($id,$ext_table);

	}
}
?>