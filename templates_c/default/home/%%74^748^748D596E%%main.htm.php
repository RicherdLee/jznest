<?php /* Smarty version 2.6.20, created on 2016-03-04 19:48:58
         compiled from main.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'main.htm', 74, false),)), $this); ?>
<script>
function collect_goods(id){
	
	var url = '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/sns/ajax_update.php';
	var uname='<?php echo $_COOKIE['USER']; ?>
';
	if(uname=='')
	{
		alert('<?php echo $this->_tpl_vars['lang']['no_logo']; ?>
');
		window.location.href='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login.php?forward=shop.php?uid=<?php echo $_GET['uid']; ?>
';
		return false;
	}
	var pars = 'pid='+id+'&uname='+uname;
	$.post(url, pars,showResponse);
	function showResponse(originalRequest)
	{
		if(originalRequest>1)
			alert('<?php echo $this->_tpl_vars['lang']['fav_ok']; ?>
');
		else if (originalRequest>0)
			alert('<?php echo $this->_tpl_vars['lang']['fav_isbing']; ?>
');
		else
			alert('<?php echo $this->_tpl_vars['lang']['error']; ?>
');
	}
	
}
</script>
<div class="main-widget">
	<h3 class="item-hd">
    	<a class="read-more" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $_GET['uid']; ?>
&act=product">查看全部</a>
        <span><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $_GET['uid']; ?>
&act=product">我分享的宝贝</a></span>
    </h3>
    <div class="item-bd">
    	<ul class="clearfix">
        	<?php $_from = $this->_tpl_vars['sharegoods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['name']['iteration']++;
?>
            <li <?php if ($this->_foreach['name']['iteration'] == 3): ?>class="last"<?php endif; ?>>
            	<div class="sitem">
                	<div class="pic">
                    <a title="<?php echo $this->_tpl_vars['list']['pname']; ?>
" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['pid']; ?>
" target="_blank"><img width="226" height="210" src="<?php if ($this->_tpl_vars['list']['image']): ?><?php echo $this->_tpl_vars['list']['image']; ?>
<?php else: ?>image/default/nopic.gif<?php endif; ?>" /></a>
                    </div>
                	<div class="content"><?php if ($this->_tpl_vars['list']['content']): ?><?php echo $this->_tpl_vars['list']['content']; ?>
<?php else: ?>分享了产品<?php endif; ?></div>
                    <div class="func">
                        <span class="collect">
                            <a href="javascript:collect_goods('<?php echo $this->_tpl_vars['list']['pid']; ?>
');"><i></i>收藏</a>
                            <strong> <?php echo $this->_tpl_vars['list']['collectnum']; ?>
 </strong>
                        </span>
                    </div>
                </div>
            </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </div>
</div>
<div class="main-widget clearfix">
	<h3 class="item-hd">
    	<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $_GET['uid']; ?>
&act=trace" class="read-more">查看全部</a>
        <span><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $_GET['uid']; ?>
&act=trace">我的新鲜事</a></span>
    </h3>
    <div class="item-bd">
    	<?php $_from = $this->_tpl_vars['blog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
        <div class="sns-item" <?php if (! $this->_tpl_vars['num']): ?>style="padding-top:5px"<?php endif; ?> >
            
            <div class="sns-wrap">
                <div class="sns-text"> <p class="sns-title"><a target="_blank" href="home.php?uid=<?php echo $this->_tpl_vars['list']['member_id']; ?>
"><?php echo $this->_tpl_vars['list']['member_name']; ?>
</a> : <span><?php echo $this->_tpl_vars['list']['title']; ?>
</span></p></div>
                <?php if ($this->_tpl_vars['list']['original_id']): ?>
                <div class="quote-wrap">
                     <?php if ($this->_tpl_vars['list']['original_status'] == 1): ?>原文已删除<?php else: ?>
                     <div class="sns-text"><p class="sns-title"><a target="_blank" href="home.php?uid=<?php echo $this->_tpl_vars['list']['ouid']; ?>
"><?php echo $this->_tpl_vars['list']['ouser']; ?>
</a> : <span><?php echo $this->_tpl_vars['list']['otitle']; ?>
</span></p></div>
                    <?php echo $this->_tpl_vars['list']['ocontent']; ?>

                    <?php endif; ?>
                </div>
                <?php else: ?>
                	<?php echo $this->_tpl_vars['list']['content']; ?>

                <?php endif; ?>
                <div class="sns-extra">
                    <span class="sns-time"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</span>
                    <span class="sns-action">
                        <span><a data-param="{&quot;bid&quot;:&quot;<?php echo $this->_tpl_vars['list']['id']; ?>
&quot;}" data_type="sns_forward" href="javascript:void(0);">转发</a></span>
                    </span>
                </div>
                <div id="forward_<?php echo $this->_tpl_vars['list']['id']; ?>
" style="display:none;">
                <div class="forward">
                <form action="" method="post" id="forwardform_<?php echo $this->_tpl_vars['list']['id']; ?>
">
                <input type="hidden" name="submit" value="forward">
                <input type="hidden" name="forwardid" value="<?php echo $this->_tpl_vars['list']['id']; ?>
">
                <textarea name="forwardcontent" class="ftextarea" id="content_forward<?php echo $this->_tpl_vars['list']['id']; ?>
" resize="none"></textarea>
                <span class="error"></span>
                <p>
                <span id="forwardcharcount<?php echo $this->_tpl_vars['list']['id']; ?>
"></span>
                <span style="float:right"><input type="submit" value="转发" class="button"></span>
                </p>
                </form>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="sns-next"><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $_GET['uid']; ?>
&act=trace">去看更多新鲜事<i></i></a></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/dialog/dialog.js" id="dialog_js"></script>
<script>
$("[data_type='sns_forward']").live('click',function(){
	var data = $(this).attr('data-param');
	eval("data = "+data);
	ajax_form("forward_form", '转发', '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=sns&s=sns&op=forward&bid='+data.bid, 500);
	return false;
});
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