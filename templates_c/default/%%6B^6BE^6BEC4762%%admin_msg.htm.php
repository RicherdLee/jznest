<?php /* Smarty version 2.6.20, created on 2016-03-05 13:00:48
         compiled from admin_msg.htm */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($this->_tpl_vars['title']): ?><?php echo $this->_tpl_vars['title']; ?>
 - <?php echo $this->_tpl_vars['config']['company']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['title']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['config']['company']; ?>
</title>
<meta name="description" content="<?php echo $this->_tpl_vars['config']['description']; ?>
">
<meta name="keywords" content="<?php echo $this->_tpl_vars['config']['keyword']; ?>
">
<meta name="generator" content="<?php echo $this->_tpl_vars['config']['version']; ?>
" />
<meta name="author" content="MallBuilder Team and MallBuilder UI Team" />
<meta name="copyright" content="MallBuilder" />
<link href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/templates/default/user_admin.css" rel="stylesheet" type="text/css" />
</head>
<div id="shortcut">
    <div class="w">
        <div class="fl">
            <script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login_statu.php" /></script>
        </div>
        <div class="fr">
         	<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=product&s=admin_buyorder">我的订单</a>
            <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=sns&s=admin_share_product">我的收藏</a>
            <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=message&s=admin_message_list_inbox">站内信</a>
        </div>
    </div>
</div>

<div id="header">
    <h1>
    	<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/" title="<?php echo $this->_tpl_vars['config']['company']; ?>
">
        <img title="<?php echo $this->_tpl_vars['config']['company']; ?>
" alt="<?php echo $this->_tpl_vars['config']['company']; ?>
" src="<?php if ($this->_tpl_vars['config']['logo']): ?><?php echo $this->_tpl_vars['config']['logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/logo.png<?php endif; ?>"  width="110" height="60" />
        </a>
        <i>买家中心</i>
	</h1>
    <div class="search" id="search">
        <div id="details" class="details">
            <ul class="tab">
                <li class="current"><span><?php echo $this->_tpl_vars['lang']['goods']; ?>
</span></li>
            </ul>
            <div class="form">
                <form target="_blank" action="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/" method="get">
                <input type="hidden" name="m" value="" />
                <input type="hidden" name="s" value="list" />
                <div class="formstyle">
                    <input type="text" maxlength="200" value=" <?php echo $this->_tpl_vars['lang']['search_products']; ?>
" class="textinput" id="keyword" name="key" onblur="searchBlur(this)" onfocus="searchFocus(this)">
                    <input type="submit" value="" class="search-button" name="">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="layout">
	<div class="tip">
        <p class="<?php if ($_GET['type']): ?>failure<?php else: ?>success<?php endif; ?>">
            <span>
            	<?php if ($_GET['str']): ?>
                	<?php if ($_GET['str'] == 'shop_statu'): ?>
                    您的店铺正在审核过程中，审核通过产品管理功能才能使用！
                    <?php else: ?>
            		<?php echo $_GET['str']; ?>

                    <?php endif; ?>
            	<?php else: ?>
                	<?php echo $this->_tpl_vars['lang']['edit_suc']; ?>

            	<?php endif; ?>
            </span>
        </p>
    </div>
</div>
<div id="footer">
  <p><?php echo $this->_tpl_vars['web_con']; ?>
</p>
  <?php echo $this->_tpl_vars['bt']; ?>
<br>
</div>
<script>
function gotourl(url)
{
	var time=900;
	<?php if ($_GET['time']): ?>
	var time=<?php echo $_GET['time']; ?>
;
	<?php endif; ?>
	setTimeout("gotourl1('"+url+"')",time);//设定超时时间
}
function gotourl1(url)
{
	window.location=url;
}
<?php if ($_GET['url']): ?>
gotourl('<?php echo $_GET['url']; ?>
');
<?php endif; ?>
</script>

<div style="width: 42px; position:fixed; top:0;right:0; border: 1px #ccc solid; background: #fff;">
<style>
#qe{width:146px; height:141px; position:fixed; top:200px; right:9%; background:#9F3; z-index:9999}
#qe .code{width:141px; height:141px; background: #9F3; overflow:hidden;padding:2px;}
#qe .close{position:absolute;top:-6px;right:-6px;}
</style>
 <div id="qe" class="qe" style="display:none">
 <div style="margin: auto;"><a class="close" href="javascript:void(0);" onclick="hide();"><img src="image/close.png" alt="关闭" width="20px" height="20px"/></a></div>       
 <div class="code"><img src="image/phpqrcode.jpg" width="141" height="141" alt="" /></div> 
 </div>   
	<div style="height: 388px;" class="rightbar">
		<p style="margin-top: 0px;"><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
" class="mouseicon" title="首页"><em class="mousetext" style="display:none;">首页</em><img src="image/home.png" height="40px" width="40px" title="首页"></a></p>
		<p><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=member" class="mouseicon" title="个人中心"><em class="mousetext" style="display:none;">个人中心</em><img src="image/member.png" height="40px" width="40px" title="个人中心"></a></p>
		<p><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart" class="mouseicon" title="购物车"><em class="mousetext" style="display:none;">购物车</em><img src="image/cart.png" height="40px" width="40px" title="购物车"></a></p>
		<p><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=points&s=admin_points" class="mouseicon" title="积分"><em class="mousetext" style="display:none;">积分</em><img src="image/score.png" height="40px" width="40px" title="积分"></a></p>
		<p><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=points&s=admin_points_goods" class="mouseicon" title="优惠券"><em class="mousetext" style="display:none;">优惠券</em><img src="image/coupon.png" height="40px" width="40px" title="优惠券"></a></p>
        <p><a href="javascript:void(0);" onclick="show();" class="mouseicon" title="二维码"><em class="mousetext" style="display:none;">二维码</em><img src="image/phpqrcode.jpg" height="40px" width="40px" title="二维码"></a></p>
		<p><a href="#top" class="mouseicon" title="回到顶部"><em class="mousetext" style="display:none;">回到顶部</em><img src="image/top.png" height="40px" width="40px"></a></p>
<script type="text/javascript"> 
var EX = {
	addEvent:function(k,v){
		var me = this;
		if(me.addEventListener)
		me.addEventListener(k, v, false);
		else if(me.attachEvent)
		me.attachEvent("on" + k, v);
		else
		me["on" + k] = v;
	},
	removeEvent:function(k,v){
		var me = this;
		if(me.removeEventListener)
		me.removeEventListener(k, v, false);
		else if(me.detachEvent)
		me.detachEvent("on" + k, v);
		else
		me["on" + k] = null;
	},
	stop:function(evt){
		evt = evt || window.event;
		evt.stopPropagation?evt.stopPropagation():evt.cancelBubble=true;
	}
};

document.getElementById('qe').onclick = EX.stop;
var url = '#'; 
function show(){ 
	var o = document.getElementById('qe'); 
	o.style.display = ""; 
	setTimeout(function(){
		EX.addEvent.call(document,'click',hide);
	});
}
function hide(){ 
	var o = document.getElementById('qe'); 
	o.style.display = "none"; 
	EX.removeEvent.call(document,'click',hide);
} 
</script>   
</div>
</div>
</div>
<script type="text/javascript">
var Shop = {"url":{"region":"\/tools-selRegion.html"}};
var __time_out = 1000;
window.addEvent('domready',function(){

    var ReferObj =new Object();
    Object.append(ReferObj,{
        serverTime:1446695556,
        init:function(){
            var FIRST_REFER=Cookie.read('S[FIRST_REFER]');
            var NOW_REFER=Cookie.read('S[NOW_REFER]');
            var nowDate=this.time=this.serverTime*1000;
            if(!window.location.href.test('#r-')&&!document.referrer||document.referrer.test(document.domain))return;
            if(window.location.href.test('#r-'))Cookie.dispose('S[N]');
            if(!FIRST_REFER){

                if(NOW_REFER){
                    this.writeCookie('S[FIRST_REFER]',NOW_REFER,this.getTimeOut(JSON.decode(NOW_REFER).DATE));
                }else{
                    this.setRefer('S[FIRST_REFER]',__time_out);
                }
            }
            this.setRefer('S[NOW_REFER]',__time_out);
            this.createGUID();
        },
        getUid:function(){
            var lf=window.location.href,pos=lf.indexOf('#r-');
            return pos!=-1?lf.substr(pos+4):'';
        },
        getRefer:function(){
            return document.referrer?document.referrer:'';
        },
        setRefer:function(referName,timeout){
            var uid=this.getUid(),referrer=this.getRefer();
            var data={'ID':uid,'REFER':referrer,'DATE':this.time};

            if('S[NOW_REFER]'==referName){
                var refer=JSON.decode(Cookie.read('S[FIRST_REFER]'));
                if(uid!=''&&refer&&refer.ID==''){
                    var fdata={'ID':uid,'REFER':refer.REFER,'DATE':refer.DATE};
                    this.writeCookie('S[FIRST_REFER]',JSON.encode(fdata),this.getTimeOut(refer.DATE));
                }else if(uid==''){
                    Object.append(data,{'ID':refer.ID});
                }
            }
            Cookie.write(referName,JSON.encode(data),{duration:(__time_out||15)});
        },
        getTimeOut:function(nowDate){
            var timeout=nowDate+__time_out*24*3600*1000;
            var date=new Date(timeout);
            return date;
        },
        writeCookie:function(key,value,timeout){
            document.cookie=key+ '=' + value+'; expires=' + timeout.toGMTString();
        },
        createGUID:function(){
            var GUID = (function(){
                var S4=function(){
                    return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
                };
                return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4()).toUpperCase();
            })();
            Cookie.write('S[N]',GUID,{duration:3650});
        }
    });
    ReferObj.init();
});
</script>