<?php /* Smarty version 2.6.20, created on 2016-03-04 15:33:26
         compiled from login.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录<?php echo $this->_tpl_vars['config']['company']; ?>
 - Powered by SOUDU</title>
<meta name="description" content="<?php echo $this->_tpl_vars['config']['description']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['config']['keyword']; ?>
" />
<meta name="author" content="MallBuilder Team and ShopBuilder UI Team" />
<meta name="copyright" content="ShopBuilder" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/templates/default/page.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/base.js" type="text/javascript"></script>
<script src="script/login.js" type=text/javascript></script>
<script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
<script type=text/javascript>
var nousername='<?php echo $this->_tpl_vars['lang']['nouname']; ?>
';
var nouserpass='<?php echo $this->_tpl_vars['lang']['noupass']; ?>
';
var norandcode='<?php echo $this->_tpl_vars['lang']['nocode']; ?>
';
</script>
</head>
<body class="login">

<div id="header">
	<div class="w header">
    	<div class="logo ld" style="line-height: 50px;">
        <a hidefocus="true" title="<?php echo $this->_tpl_vars['config']['company']; ?>
" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
" title="返回首页"><img src="/image/logo.png" width="110px" height="47px"/></a>
        <b></b>
        </div>
	</div>
</div>
<div class="w">
	<div class="entry">
    	<div class="mc">
        	<div class="adv"><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=1'></script></div>
            <div class="form">
            <form id="login" name="login" action="login.php" method="post">
            	<div class="item fore1">
                    <span>用户名</span>
                    <div class="item-ifo">
                        <input autocomplete="off" class="text" name="user" type="text" id="user" tabindex="1"/>
                        <div class="i-name ico"></div>
                        <?php if ($_GET['erry'] == "-1"): ?>
							<font color="red"><?php echo $this->_tpl_vars['lang']['noname']; ?>
</font>
                        <?php elseif ($_GET['erry'] == "-4"): ?> <br />
							<font color="red"><?php echo $this->_tpl_vars['lang']['have_restpass']; ?>
</font>
                        <?php endif; ?>
                    </div>
                </div>
          
                <div class="item fore2">
                    <span>密码</span>
                    <div class="item-ifo">
                        <input class="text" type="password" name="password" id="password" tabindex="2" />
                        <div class="i-pass ico"></div>
                        <?php if ($_GET['erry'] == "-2"): ?>
                        <font color="red"><?php echo $this->_tpl_vars['lang']['passerr']; ?>
</font>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item fore3">
                    <span>验证码</span>
                    <div class="item-ifo">
                        <input type="text" maxlength="4" class="text" name="randcode" id="randcode" tabindex="3"  />
                        <img onclick="get_randfunc(this);" src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/includes/rand_func.php'/>
                        <?php if ($_GET['erry'] == "-3"): ?>
                            <font color="red"><?php echo $this->_tpl_vars['lang']['codeerr']; ?>
</font>
                        <?php endif; ?>
                    </div>
                </div> 
                 
                <div class="item fore4">
                    <div class="item-ifo">
                        <label><a href="lostpass.php" class="">忘记密码?</a></label>
                    </div>
                </div>
                        
                <div class="item login-btn">
                    <input name="action" type="hidden" value="submit" />
                    <input name="forward" type="hidden" id="forward" value="<?php echo $_GET['forward']; ?>
" />
                    <input type="submit" tabindex="4" value="登录" onclick="return do_login();">
                </div>
			
                <div class="item extra">
                    <span>使用合作网站账号登录：</span>
                    <?php if ($this->_tpl_vars['config']['qq_connect'] == 1): ?>
                    <span><a target="_blank" href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=<?php echo $this->_tpl_vars['config']['qq_app_id']; ?>
&redirect_uri=<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login.php" title="QQ"><img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/QQconnect.jpg" width="20px" height="20px" /></a><?php endif; ?></span>
                    <?php if ($this->_tpl_vars['config']['sina_connect'] == 1): ?>
                    <span><a href="<?php echo $this->_tpl_vars['sina_login_url']; ?>
" title="新浪微博"><img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/sinaconnect.jpg" width="20px" height="20px" /></a></span>
                    <?php endif; ?>
                </div>
            </form>
            </div>
<script>
 var obj = new WxLogin({
  id:"login_container", 
  appid: "", 
  scope: "", 
  redirect_uri: "",
  state: "",
  style: "",
  href: ""
 });  
</script>
        </div>
        <div class="free-regist">
            <span><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/register.php">免费注册&gt;&gt;</a></span>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="footer clearfix">
    <div class="w">
        <div class="links"><?php echo $this->_tpl_vars['web_con']; ?>
</div>
        <div class="copyright"><?php echo $this->_tpl_vars['bt']; ?>
</div>
    </div>
</div>
</body>
</html>