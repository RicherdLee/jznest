<div id="main">
<div id="add">
<form name="addform" method="post" action="/module/guestbook/admin/data.php?method=add">
<img src="/module/guestbook/images/l2.gif" /><img src="/module/guestbook/images/add.gif" />
<p>昵称：
<input name="user" type="text" maxlength="20" size="20" />*<br /><br />
</p>
<p>Q Q：
<input name="qq" type="text" maxlength="10" size="20" /><br /><br />
</p>
<p>邮箱：
<input name="email" type="text" maxlength="50" size="20" /><br /><br />
</p>
<p>内容：
<textarea name="text" class="content"></textarea>*<br /><br />
</p>
<p>悄悄话：
<input name="setqqh" type="checkbox" value="1" />
&nbsp;&nbsp;当选中时，留言内容只有管理员可见<br /><br />
</p>
<p>请注意：带*为必填内容。留言内容最少5个字符！<br /><br /></p>
<p class="zhong"><input name="submit" type="submit" value="确  定" id="sbutton" onclick="return Check_add(addform);" /></p>
<br />
</form>
</div>
</div>