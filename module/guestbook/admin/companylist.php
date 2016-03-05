<?php
error_reporting(0);
?>
<link href="/module/guestbook/style/main.css" rel="stylesheet" type="text/css" />
<?php
$page=$_GET['page'];
$dblist=new mysql(WEB_SERVER,WEB_USER,WEB_PWD,WEB_DB,"utf8");
include "page.php";
$result=$dblist->query("select * from `channel`");
$total=$dblist->numrows($result);
_PAGEFT($total,WEB_PAGE);
$result=$dblist->query("select * from `channel` where id order by settop desc,id desc limit $firstcount,$displaypg");
echo '<div id="main">';
while($row=$dblist->fetcharray($result))
{
echo '<div id="list">
      <div id="title"><img src="/module/guestbook/images/write.gif" />&nbsp;<font class="lanse">'.$row["companyname"].'&nbsp;地址：'.$row["address"].'&nbsp;联系人：'.$row["linkmanName"].'&nbsp;手机号码：'.$row["mob"].'&nbsp;固定电话：'.$row["tel"].'</font>&nbsp;';
	  	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	  	echo '<a href="/module/guestbook/admin/data2.php?method=del&did='.$row["id"].'"><img src="/module/guestbook/images/del.gif" title="删除" /></a>';
		echo '<a href="/module/guestbook/admin/makjfsdhytxcj.php?act=reply&rid='.$row["id"].'"><img src="/module/guestbook/images/reply.gif" title="回复" /></a>';
		echo '<img src="/module/guestbook/images/ip.gif" title="'.$row['ip'].'" />';
	  echo '</div>';
	  if($row["setqqh"]==1){
	  if($_SESSION['fig']==1){
	  echo '<div id="text">'.$row["text"];
	  }else{
	  echo '<div id="text" class="hongse">&lt;---此内容为悄悄话，只有管理员才能查看---&gt;';
	  }
	  }else
	  {
	  echo '<div id="text">'.$row["companytext"];
	  }
	  if(!empty($row['reply'])){
	  	echo '<div id="reply"><p class="huangse">管理员回复于'.$row["replytime"].'</p><p>'.$row["reply"].'</p></div>';
	  }
      echo '</div>
    </div>';
}
    echo '<div id="page">'.$pagenav.'</div>';
echo '</div>';
?>