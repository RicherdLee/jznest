<?php
class sns
{
	var $db;
	var $tpl;
	var $page;
	function sns()
	{
		global $db;
		global $config;
		global $tpl;		
		$this -> db     = & $db;
		$this -> tpl    = & $tpl;
	}
	
	function add_sns($type='')
	{
		global $buid,$config;
		
		$sql="select logo,user from ".MEMBER."  WHERE userid='$buid'";
		$this->db->query($sql);
		$re=$this->db->fetchRow();
		
		$content_str = '';
		
		$original_id = '0';
		$original_member_id = '0';
		
		$member_id = $buid;
		$member_name = $re['user'];
		$member_img = $re['logo']?$re['logo']:"image/default/user_admin/default_user_portrait.gif";
	
		$create_time  = time();
		$status  = '0';
		$privacy = 0;
		$comment_count  = 0;
		$copy_count  = 0;
	
		if($type=='sharegoods')
		{
			
			$sql="select pid,pname,image,price,collectnum from ".SPROINFO."  WHERE pid='$_POST[choosestoreid]'";
			$this->db->query($sql);
			$de=$this->db->fetchRow();
			
			$store_info['logo'] = $de['image']?"".$de['image']:"image/default/nopic.gif";
			$store_info['url'] = $config['weburl']."/?m=product&s=detail&id=".$de['pid'];
			
			$content_str.= "<div class=\"sns-con\">
							<div class=\"arrow\"><em>◆</em><span>◆</span></div>
							<div class=\"resize-box\">
							<div class=\"productimg\"><a target=\"_blank\" href=\"".$store_info['url']."\"><img height=\"160\" width=\"160\" src=\"".$store_info['logo']."\"></a></div>
							<div class=\"productinfo\">
								<dl>
									<dt><a target=\"_blank\" href=\"".$store_info['url']."\">".$de['pname']."</a></dt>
									<dd>价  格：<span class=\"current-price\">".$config['money']." ".$de['price']."</span></dd>
									<dd class=\"hot-number\">收藏数(".$de['collectnum'].")</dd>
								</dl>
							</div>
						 </div></div>";
			$title = $_POST['comment']?$_POST['comment']:" 刚淘到个商品，很赞哦！分享给大家了！";
			
			$this->db->query("update ".SPRO." set isshare='1' where pid='".$_POST['choosestoreid']."'");	
		}
		elseif($type=='forward')
		{
			
			$sql="select content,member_id,member_name,title,original_id,original_member_id from ".SNS." WHERE id='$_POST[forwardid]'";
			$this->db->query($sql);
			$de=$this->db->fetchRow();
			
			$original_id = $de['original_id']?$de['original_id']:$_POST['forwardid'];
			$original_member_id = $de['original_member_id']?$de['original_member_id']:$de['uid'];
			$content_str = '';
			$title = $_POST['forwardcontent']?$_POST['forwardcontent']." 转发":"转发";
			
			$this->db->query("update ".SNS." set copy_count=copy_count+1 where id='".$_POST['forwardid']."'");
		}
		else
		{
			$title = $_POST['content'];
		}
		
		$title=htmlspecialchars($title);
		$content = $content_str;
		$sql="insert into ".SNS." (original_id,original_member_id,original_status,member_id,member_name,member_img,title,content,create_time,status,privacy,comment_count,copy_count) VALUES ('$original_id','$original_member_id','0','$member_id','$member_name','$member_img','$title','$content','$create_time','$status ','$privacy','$comment_count','$copy_count')";
		$this->db->query($sql);
		
		$this->db->query("update ".MEMBERINFO." set blog=blog+1 where member_id='$member_id'");	
		
	}
	function add_sns_comment()
	{
		global $buid,$config;
		
		$sql="select logo,user from ".MEMBER."  WHERE userid='$buid'";
		$this->db->query($sql);
		$re=$this->db->fetchRow();
		
		$member_id = $buid;
		$member_name = $re['user'];
		$original_id = $_POST['commentid'];
		$create_time  = time();
		$content = $_POST['commentcontent']?$_POST['commentcontent']:"";
		if($content)
		{
			$sql="insert into ".SNSCOMMENT." (original_id,member_id,member_name,content,addtime) VALUES ('$original_id','$member_id','$member_name','$content','$create_time')";
			$this->db->query($sql);
			$this->db->query("update ".SNS." set comment_count=comment_count+1 where id='$original_id'");
		}
	}

	function del_sns($id)
	{
		global $buid;
		$this->db->query("update ".MEMBERINFO." set blog=blog-1 where member_id='$buid'");
		$this->db->query("delete from ".SNS." where id='$id'");
		$this->db->query("delete from ".SNSCOMMENT." where original_id='$id'");
		$this->db->query("update ".SNS." set original_status=1 where original_id='$id'");
	}
	
	
	function del_sns_comment($id)
	{
		$this->db->query("delete from ".SNSCOMMENT." where id='$id'");
		$this->db->query("update ".SNS." set comment_count=comment_count-1 where id='$id'");
	}
	
	function get_sns()
	{
		global $buid,$config;
		$sql="select fuid from ".FRIEND." where uid=$buid order by addtime desc";
		$this->db->query($sql);
		$re=$this->db->getRows();
		$myfriend=$buid;
		foreach($re as $val)
		{
			$myfriend.=','.$val['fuid'];
		}
		$sql="select a.* , b.id as oid , b.member_id as ouid , b.member_name as ouser , b.title as otitle, b.create_time as otime, b.content as ocontent , b.comment_count as otc,b.copy_count as ayc  from ".SNS." a left join ".SNS." b on a.original_id= b.id where a.member_id in ($myfriend) order by a.create_time desc";
		$this->db->query($sql);
		$re=$this->db->getRows();
		if(!$re)
		{
			$sql="select a.* , b.member_id as ouid , b.member_name as ouser , b.title as otitle, b.content as ocontent from ".SNS." a left join ".SNS." b on a.original_id= b.id order by rand() , a.create_time desc";
		}
		$str="";
		include_once($config['webroot']."/includes/page_utf_class.php");
		$page = new Page;
		$page->listRows=10;
		if (!$page->__get('totalRows'))
		{
			$this->db->query($sql);
			$page->totalRows = $this->db->num_rows();
		}
		if($_GET['page']-1>0)
			$p=$_GET['page']-1;
		else
			$p='0';
			
		$page->firstRow=$p*$page->listRows;
        $sql .= "  limit ".$page->firstRow.",".$page->listRows;
		$this->db->query($sql);
		$re=$this->db->getRows();
		foreach($re as $val)
		{
			$sql="select logo,name from ".MEMBER."  WHERE userid='$val[member_id]'";
			$this->db->query($sql);
			$aa=$this->db->fetchRow();
			$logo=$aa['logo'];
			$name=$aa['name'];
			
			$comment='';
			$sql="select * from ".SNSCOMMENT."  WHERE original_id='$val[id]' order by id desc";
			$this->db->query($sql);
			$ss=$this->db->getRows();
			if($ss)
			{				
				$comment="<div class='commnet'>";
				foreach($ss as $list)
				{					
					$sql="select name from ".MEMBER."  WHERE userid='$list[member_id]'";
					$this->db->query($sql);
					$s=$this->db->fetchField('name');
					
					$list['member_name']=$s?$s:$list['member_name'];
				
					$comment.="<div class='commnet_list'><dl><dt><a target=\"_blank\" href=\"home.php?uid=".$list['member_id']."\">$list[member_name]</a>: $list[content]</dt><dd>".date('Y-m-d',$list['addtime'])."</dd></div>";
				}
				$comment.="</div>";
			}
			
			$val['member_name']  = $name?$name:$val['member_name'];
			$val['member_img'] = $logo?$logo:"image/default/user_admin/default_user_portrait.gif";
			
			if($val['original_id'])
			{
				$con="<div class=\"sns-con\">";
				if($val['original_status']==1)
				{
					$con.="原文已删除";
				}
				else
				{
					$sql="select name from ".MEMBER."  WHERE userid='$val[ouid]'";
					$this->db->query($sql);
					$ss=$this->db->fetchField('name');
					$val['ouser']=$ss?$ss:$val['ouser'];
					
					$con.="<div class=\"arrow\"><em>◆</em><span>◆</span></div><p class=\"sns-title\"><a target=\"_blank\" href=\"home.php?uid=".$val['ouid']."\">".$val['ouser']."</a></p><div class=\"sns-text\">".$val['otitle']."</span></div>".$val['ocontent']."<div class=\"sns-extra\"><span class=\"sns-time\">".date('Y-m-d',$val['otime'])."</span><span class=\"sns-action\"><span><a data-param=\"{&quot;bid&quot;:&quot;".$val['oid']."&quot;}\" data_type=\"sns_forward\" href=\"javascript:void(0);\">转发(".$val['ayc'].")</a></span><i>|</i><span><a data-param=\"{&quot;bid&quot;:&quot;".$val['oid']."&quot;}\" data_type=\"sns_comment\" href=\"javascript:void(0);\">评论(".$val['otc'].")</a></span></span></div>";
					
					$fd_forward="<span>转发</span><i>|</i><span><a data-param=\"{&quot;bid&quot;:&quot;".$val['id']."&quot;}\" data_type=\"sns_comment\" href=\"javascript:void(0);\">评论</a></span>";
				
				}
				$con.="</div>";
			}
			else
			{
				$con=$val['content'];
				$fd_forward="<span><a data-param=\"{&quot;bid&quot;:&quot;".$val['id']."&quot;}\" data_type=\"sns_forward\" href=\"javascript:void(0);\">转发</a></span><i>|</i><span><a data-param=\"{&quot;bid&quot;:&quot;".$val['id']."&quot;}\" data_type=\"sns_comment\" href=\"javascript:void(0);\">评论</a></span>";
			}
			$del="";
			
			if($val['member_id']==$buid)
			{
				$del="<div class=\"more-action\"><a data-param=\"{&quot;bid&quot;:&quot;".$val['id']."&quot;}\" data_type=\"fd_del\" href=\"javascript:void(0);\"></a></div>";
			}
			$str.="
			<div class=\"sns-item\">
				<div class=\"sns-avatar\">
					<a target=\"_blank\" href=\"home.php?uid=".$val['member_id']."\"><img width=\"60\" height=\"60\" src=\"".$val['member_img']."\" ></a>
				</div>
				".$del."
				<div class=\"sns-wrap\">
			
					<div class=\"sns-title\"><a target=\"_blank\" href=\"home.php?uid=".$val['member_id']."\">".$val['member_name']."</a></div>
					<div class=\"sns-text\"><span>".$val['title']."</span></div>
					".$con."
					<div class=\"sns-extra\">
						<span class=\"sns-time\">".date('Y-m-d',$val['create_time'])."</span>
						<span class=\"sns-action\">".$fd_forward."</span>
					</div>
				</div>
				<div class='clear'></div>".$comment."
			</div>";
		}
		if(($_GET['page']+1)<= ceil($page->totalRows/$page->listRows))
		{
			$str.="<div id=more></div>";
		}
		return $str;
	}
}
?>
