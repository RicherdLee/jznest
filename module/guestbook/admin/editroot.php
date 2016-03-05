<div id="main">
<div id="add">
<form name="pwdform" method="post" action="admin/data.php?method=pwd">
<img src="images/l3.gif" /><img src="images/editroot.gif" />
<p class="zhong">原密码：
<input name="laopwd" type="text" style="width:140px" />*<br /><br />
</p>
<p class="zhong">新密码：
<input name="newpwd" type="password" style="width:140px" />*<br /><br />
</p>
<p class="zhong">重　复：
<input name="newpwdtoo" type="password" style="width:140px" />*<br /><br />
</p>
<p class="zhong"><input name="submit" type="submit" value="修  改" id="sbutton" onclick="return Check_pwd(pwdform);" /></p>
<br />
</form>
</div>
</div>