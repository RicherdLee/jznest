<?php /* Smarty version 2.6.20, created on 2016-03-04 17:06:06
         compiled from register.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unserialize', 'register.htm', 28, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册<?php echo $this->_tpl_vars['config']['company']; ?>
 - Powered by SOUDU</title>
<meta name="description" content="<?php echo $this->_tpl_vars['config']['description']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['config']['keyword']; ?>
" />
<meta name="author" content="SOUDU UI Team" />
<meta name="copyright" content="SOUDU" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/templates/default/page.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/base.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/dialog/dialog.js" id="dialog_js"></script>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/register.js" type="text/javascript"></script>
<script type="text/javascript">
$('#read').click(function(){

	html_form("read", '<?php echo $this->_tpl_vars['config']['company']; ?>
用户注册协议', '<div style="padding: 10px 20px;"><?php echo $this->_tpl_vars['config']['association']; ?>
</div>', 800);
	return false;
});
</script>

<script type="text/javascript">
var strongpw = new Array();
<?php if ($this->_tpl_vars['config']['strongpw']): ?>
<?php $this->assign('array', ((is_array($_tmp=$this->_tpl_vars['config']['strongpw'])) ? $this->_run_mod_handler('unserialize', true, $_tmp) : unserialize($_tmp))); ?>
<?php $_from = $this->_tpl_vars['array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
strongpw[<?php echo $this->_tpl_vars['key']; ?>
] = <?php echo $this->_tpl_vars['list']; ?>
;
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
var pwlength = "<?php echo $this->_tpl_vars['config']['pwlength']; ?>
";
var user_reg = "<?php echo $this->_tpl_vars['config']['user_reg']; ?>
";
</script>
<style type="text/css">
.msgs{display:inline-block;width:110px;color:#fff;font-size:12px;border:1px solid #0697DA;text-align:center;height:33px;line-height:30px;background:#0697DA;cursor:pointer;}
form .msgs1{background:#E6E6E6;color:#818080;border:1px solid #CCCCCC;}
</style>
</head>
<body class="register">
<div id="shortcut">
    <div class="w">
        <ul class="fl">
            <li class="ld">
                <b></b>
                <a href="javascript:addToFavorite('<?php echo $this->_tpl_vars['config']['weburl']; ?>
','<?php echo $this->_tpl_vars['config']['company']; ?>
')">
                收藏首页
                </a>
            </li>
        </ul>
		<ul class="fr">
			<li><script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login_statu.php"></script></li>
            <li class="ld"><s></s><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=product&s=admin_buyorder">我的订单</a></li>
		</ul>
    <span class="clr"></span>
	</div>
</div>
<div id="header">
	<div class="w header">
    	<div class="logo ld">
        <a hidefocus="true" title="<?php echo $this->_tpl_vars['config']['company']; ?>
" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
"><img src="<?php if ($this->_tpl_vars['config']['logo']): ?><?php echo $this->_tpl_vars['config']['logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/logo.png<?php endif; ?>" width="115px" height="50px"/></a>
        <b></b>
        </div>
	</div>
</div>

<?php if ($this->_tpl_vars['config']['closetype'] == 2): ?>
<div style="height:300px; padding-top:150px; color:#FF0000; border: 1px solid #A9B9D3; font-size:16px"> <?php echo $this->_tpl_vars['config']['closecon']; ?>
</div>
<?php else: ?>
<div class="w">
	<div class="entry">
    	<div class="mt">
            <ul class="tab">
                <li class="curr">个人用户</li>
            </ul>
            <div class="extra">
            <span>我已经注册，现在就&nbsp;<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login.php">登录</a></span>
            </div>
        </div>
        
    	<div class="mc">
            <div class="form">
			<form action="" method="post" name="registerfrom" id="registerfrom">
                <div class="item fore1">
                    <span>账户名：</span>
                    <div class="item-ifo">
                        <input name="user" type="text" id="user" class="text" placeholder="邮箱/用户名/手机号" />
                        <div class="i-name ico"></div>
                    </div>
                    <div class="msg-box"><div></div></div>
                </div>
                
                <div class="item fore2">
                    <span>请设置密码：</span>
                    <div class="item-ifo">
                        <input type="password"  name="password" id="password" class="text" />
                        <div class="i-pass ico"></div>
                    </div>
                    <div class="msg-box"><div></div></div>
                </div>
                
                <div class="item fore3">
                    <span>请确认密码：</span>
                    <div class="item-ifo">
                        <input type="password" name="re_password" id="re_password" class="text" />
                        <div class="i-pass ico"></div>
                    </div>
                    <div class="msg-box"><div></div></div>
                </div>

  <div class="item">
     <span>手机号码：</span>
     <input name="mob" type="text" id="mob" maxlength="11" class="text" onblur="check_mobile()">  
  </div>
   <div class="item">
     <span>手机验证码：</span>
     <input name="verify" type="text" id="verify" class="text w100">
     <span class="msgs" id="mob" style="width: 110px; line-height: 33px; text-align: center;position:relative;left:px;" onclick="ajax_post();">获取验证码</span>
<script>
$("#mob").blur(function () {
    phone = this.value;
    RegCellPhone = /^(1)([0-9]{10})?$/;
    falg=phone.search(RegCellPhone);
    if (falg==-1){
    	alert("手机号码为空或手机号码不合法！");
    	this.focus();
    }
});

function ajax_post(){
  $.post("ckmobile.php",{mob:$('#mob').val()},
  function(data){
    //$('#msg').html("please enter the email!");
    //alert(data);
    $('#msg').html(data);
  },
  "text");//这里返回的类型有：json,html,xml,text
}
</script>
<script type="text/javascript">
$(function() {
	//获取短信验证码
	var validCode=true;
	$(".msgs").click (function  () {
	  
		var time=60;
		var code=$(this);
		if (validCode) {
			validCode=false;
			code.addClass("msgs1");
		var t=setInterval(function  () {
			time--;
			code.html(time+"秒");
			if (time==0) {
				clearInterval(t);
			code.html("重新获取");
				validCode=true;
			code.removeClass("msgs1");

			}
		},1000)
		}
	})
})
</script>
</div> 
    
                    <div class="msg-box"><div></div></div>      
                </div>
                
               <div class="item fore4">
                    <span>验证码：</span>
                    <div class="item-ifo">
                        <input name="yzm" type="text" id="yzm" class="text w100" />
                        <div class="yzm">
                            <input type="button" class="send hidden" data-type="email" value="获取邮件验证码" />
                            <img onclick="get_randfunc(this);" src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/includes/rand_func.php?h=37&w=100'/>
                        </div>
                    </div>
                    <div class="msg-box"><div></div></div>
                </div>
                
                <!--<?php if ($this->_tpl_vars['config']['user_reg_verf']): ?>
                <div class="item fore7">
                    <span>验证问题：</span>
                    <div class="item-ifo">
                        <input onFocus="show_yzwt();" name="ckyzwt" type="text" id="ckyzwt" class="text w100" onclick="show_yzwt();"  />
                        <span id="yzwt"></span>
                    </div>
                    <div class="msg-box"><div></div></div>
                </div> 
                <?php endif; ?> 
                
                <div class="item">
                    <span>账户名：</span>
                    <div class="item-ifo">
                    <input onblur="check_user();" name="user" type="text" id="user" class="text" />
					<span id="tishi"></span>
                    <div class="i-name ico"></div>
                    </div>
                </div>
                
                <div class="item">
                    <span>邮箱：</span>
                    <div class="item-ifo">
                    <input onblur="check_email();" name="email" type='text' class="text" id="email" />
                    <span id="tishi_email"></span>
                    </div>
                </div>
              
                <div class="item">
                    <span>请设置密码：</span>
                    <div class="item-ifo">
                  	<input onblur="check_password();" type="password"  name="password" id="password" class="text" />
                    <div class="i-pass ico"></div>
					<span id="tishi_password"></span>
                    </div>
                </div>
                
                <div class="item">
                    <span>请确认密码：</span>
                    <div class="item-ifo">
                  	<input onblur="check_passwordeqt();" type="password" name="re_password" id="re_password" class="text" />
                    <div class="i-pass ico"></div>
                    <span id="tishi_repassword"></span>
                    </div>
                </div>
                
                <div class="item">
                    <span>验证码：</span>
                    <div class="item-ifo">
						<input name="yzm" type="text" id="yzm" class="text w40" onChange="check_yzm()" />
                        <img onclick="get_randfunc(this);" src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/includes/rand_func.php'/>
                        <span id="tishi2"></span>
                    </div>
                </div> 
                
				<?php if ($this->_tpl_vars['config']['user_reg_verf']): ?>
				<div class="item">
                    <span>验证问题：</span>
                    <div class="item-ifo">
						<input onFocus="show_yzwt();" name="ckyzwt" type="text" id="ckyzwt" class="text" onChange="check_yzwt()" onclick="show_yzwt();"  />
                        <span id="yzwt" ></span>
                        <span id="tishi8"></span>
                    </div>
                </div> 
           		<?php endif; ?>-->
                <div class="item register-btn">
                    <input type="submit" class="submit" id="submitreg" value="同意协议并注册" />
                    <input name="forward" type="hidden" id="forward" value="<?php echo $_GET['forward']; ?>
" />
                    <input name="connect_id" type="hidden" id="forward" value="<?php echo $_GET['connect_id']; ?>
" />
                    <br>
                    <div class="read"><a id="read" href="#"><?php echo $this->_tpl_vars['config']['company']; ?>
用户注册协议</a></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
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