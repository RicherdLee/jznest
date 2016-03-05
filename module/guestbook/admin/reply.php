<?php
$rid=$_GET['rid'];
?>
<div id="main">
<div id="add">
<form name="replyform" method="post" action="/module/guestbook/admin/data.php?method=reply&rid=<?php echo $rid;?>">
<img src="/module/guestbook/images/l4.gif" /><img src="/module/guestbook/images/edit.gif" />
<p>内容：
<textarea name="treply" class="content"></textarea>*<br /><br />
</p>
<p class="zhong"><input name="submit" type="submit" value="回  复" id="sbutton" onclick="return Check_reply(replyform);" /></p>
<br />
</form>
</div>
</div>