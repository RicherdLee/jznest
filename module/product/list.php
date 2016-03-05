<?php
	$id=!empty($_GET["id"])?$_GET["id"]*1:NULL;
	$key=!empty($_GET["key"])?trim($_GET["key"]):NULL;
	$firstRow=!empty($_GET["firstRow"])?$_GET["firstRow"]:NULL;
	$totalRows=!empty($_GET["totalRows"])?$_GET["totalRows"]:NULL;
	$orderby=!empty($_GET["orderby"])?$_GET['orderby']*1:NULL;

	//===================================分类
	if(is_numeric($id))
	{
		if(strlen($id)>8)
			$catname[]=substr($id,0,-6);
		if(strlen($id)>6)
			$catname[]=substr($id,0,-4);
		if(strlen($id)>4)
			$catname[]=substr($id,0,-2);
		$catname[]=$id;
		$tpl->assign("catname",$catname);
		
		$sql="select * from ".PCAT." where catid='$id'";
		$db->query($sql);
		$cat=$db->fetchRow();
		//-----------------------------分类关连的品牌
		if(!empty($cat['brand']))
		{
			$sql="select * from ".BRAND." where id in ( $cat[brand] ) order by displayorder asc ";
			$db->query($sql);
			$re=$db->getRows();
			$tpl->assign("brand",$re);
		}
		
		//-----------------------------获取分类下自定义字段搜索项
		$sql="select display_type,field,field_name,item from ".PROPERTYVALUE." where is_search=1 and display_type in (3,4,5) and property_id='$cat[ext_field_cat]'";
		$db->query($sql);
		$catfile=$db->getRows();
		foreach($catfile as $fkey=>$v)
		{
			$catField=explode(',',$v['item']);
			foreach($catField as $skey=>$sv)
			{
				$catField[$skey]=explode('|',$sv);
			}
			$catfile[$fkey]['catItem']=$catField;
			//------组合皖搜索
			if(!empty($_GET[$v['field']]))
			{
				$ext_sql.=' and b.'.$v['field'].'=\''.$_GET[$v['field']].'\'';
			}
		}
		$tpl->assign("catfile",$catfile);
		//---------------------------------按分类搜索
		$scl.=" and LOCATE(".intval(trim($_GET['id'])).",a.catid)=1 ";//按类别搜索
	}

	if(!empty($key))
		$scl.=" and ( a.pname like '%$key%' )";
	
	if($dpid)
		$scl.=" and a.province='".getdistrictid($dpid)."'";
	if($dcid)
		$scl.=" and a.city='".getdistrictid($dcid)."'";
	if($daid)
		$scl.=" and a.areaid='".getdistrictid($daid)."'";
	
	if(!empty($_GET['brand']))
		$scl.=" and a.brand='".$_GET['brand']."' ";
	
	if(!empty($_GET['stock']))
		$scl.=" and a.stock > 0 ";
	
	if($orderby==2)
		$scl.=" order by a.goodbad desc,a.rank desc";	
	elseif($orderby==3)
		$scl.=" order by a.uptime desc,a.rank desc";
	elseif($orderby==4)
		$scl.=" order by a.price desc,a.rank desc";
	elseif($orderby==5)
		$scl.=" order by a.price asc,a.rank desc";
	else
		$scl.=" order by a.sell_amount desc,a.rank desc";
	
	//--------------------------------------------------

	include_once("includes/page_utf_class.php");
	$page = new Page;
	$page->url=$config['weburl'].'/';
	$page->listRows= 36;
	
	if(empty($cat['ext_field_cat']))
		$sql="SELECT a.* FROM ".SETMEAL." a WHERE a.statu>=0 $ext_sql $scl";
	else
		$sql="SELECT a.* FROM ".SETMEAL." a left join ".$cat['ext_table']." b on a.pid=b.info_id and b.info_type='product' WHERE a.statu>=0 $ext_sql $scl";
		
	if(!$page->__get('totalRows'))
	{
		$db->query($sql);
		$page->totalRows =$db->num_rows();
	}
	$sql.=" limit ".$page->firstRow.", ".$page->listRows;
	//--------------------------------------------------
	$db->query($sql);
	$prol=$db->getRows();
	foreach($prol as $key=>$val)
	{
		if($val['statu'])
		{
			$status=explode(',',$val['statu']);
			$sql="select logo from ".TAG." where id ='$status[0]' ";
			$db->query($sql);
			$prol[$key]['simg']=$db->fetchField('logo');
		}
	}
		
	$prolist['list']=$prol;
	$prolist['page']=$page->prompt();
	$prolist['count']=$page->totalRows;
	if($page->nowPage==1)
	{
		$pre="<a class='disable'>上一页</a>";
	}
	else
	{
		$pre="<a class='prePage' href='$page->url?firstRow=".($nowPage-2) * ($listRows)."&totalRows=$page->totalRows$page->parameter'>上一页</a>";
	}
	if($page->nowPage==$page->totalPages)
	{
		$next="<a class='disable'>下一页</a>";
	}else
	{
		$next="<a class='nextPage' href='$page->url?firstRow=".($page->nowPage) * ($page->listRows)."&totalRows=$page->totalRows$page->parameter'>下一页</a>";
	}
	$prolist['pages']="<span><i>$page->nowPage</i> / $page->totalPages</span>".$pre.$next;
		
	$tpl->assign("info",$prolist);


	//------------------------------------------------------
	$url=implode('&',convert($_GET));
	$tpl->assign("url",$url);
	
	//----------------------------SEO
	$config['title']=str_replace('[catname]',$cat['cat'],$config['title2']);
	$config['keyword']=str_replace('[catname]',$cat['cat'],$config['keyword2']);
	$config['description']=str_replace('[catname]',$cat['cat'],$config['description2']);
	
	//=====================================================
	$current=$cat['current']?$cat['current']:"product";
	$tpl->assign("current",$current);
	include_once("footer.php");
	$out=tplfetch("product_list.htm");
?>