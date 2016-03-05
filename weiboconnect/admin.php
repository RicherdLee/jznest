<?php
if (!defined('VALIDADMIN')) die ('Access Denied.');
checkpermission('CP');
acceptrequest("do");
if($do=="vconfig"){
	$akey=safe_convert($_POST["weiboakey"]);
	$skey=safe_convert($_POST["weiboskey"]);
	$line=safe_convert($_POST["line"]);
	$conf_file='plugin/weiboconnect/config.php';
	$conf_content=<<<eot
<?php
	\$weibo_akey="$akey";
	\$weibo_skey="$skey";
	\$line="$line";
?>
eot;
	writetofile($conf_file,$conf_content);		
	catchsuccess ('参数设置成功！');
}
include("config.php");
$plugin_return=<<<eot
<table class='tablewidth' align=center cellpadding=4 cellspacing=0>
<tr>
<td width=160 class="sectstart">
连接参数
</td>
<td class="sectend">AKEY,SKEY设置</td>
</tr>
</table>
<table class='tablewidth' align=center cellpadding=4 cellspacing=0>
<tr><td align="center" class="sect">
<form action="admin.php?act=weiboconnect&do=vconfig" method="post"> 
<table width=90% align=center>
<tr><td width=300>AKEY:</td><td align=left><input type="text" name="weiboakey" size=60 value="{$weibo_akey}"/></td></tr>
<tr><td width=300>SKEY:</td><td align=left><input type="text" name="weiboskey" size=60 value="{$weibo_skey}"/></td></tr>
<tr><td width=300>最新微博条数</td><td align=left><input type="text" name="line" size=60 value="{$line}"/></td></tr>
<tr><td width=300></td><td align=right><input type='submit' name='submit' value=" 设置 " class="formbutton"></td></tr>
</table>
</form>
</td></tr>
</table>


<br/><br/>
<table class='tablewidth' align=center cellpadding=4 cellspacing=0>
<tr>
<td width=160 class="sectstart">
使用说明
</td>
<td class="sectend"></td>
</tr>
</table>
<table class='tablewidth' align=center cellpadding=4 cellspacing=0>
<tr><td align="center" class="sect">
<table width=90% align=center>
<tr><td width=600 align=left>1.请先到新浪微博开放平台申请key！</td></tr>
<tr><td width=600 align=left>2.插件作者：seatop，网站：http://www.seatop.com.cn，<a href="http://www.seatop.com.cn/guestbook.php" target=_blank>给seatop留言！</a></td></tr>

</table>
</form>
</td></tr>
</table>


eot;
?>