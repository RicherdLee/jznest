<?php /* Smarty version 2.6.20, created on 2016-03-04 17:06:54
         compiled from admin_member.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_member.htm', 144, false),)), $this); ?>
<script src="script/my_lightbox.js" language="javascript"></script>
<script type="text/javascript" src="script/Validator.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/district.js" ></script>
<script>
var weburl="<?php echo $this->_tpl_vars['config']['weburl']; ?>
";
</script>
<div class="path">
    <div>
    	<?php if ($this->_tpl_vars['cg_u_type'] == 1): ?>
    		<a href="main.php?cg_u_type=1"><?php echo $this->_tpl_vars['lang']['my_mall']; ?>
</a> <span>&gt;</span>
        <?php else: ?>
    		<a href="main.php?cg_u_type=2"><?php echo $this->_tpl_vars['lang']['seller_center']; ?>
</a> <span>&gt;</span>
        <?php endif; ?>
        <a href="main.php?m=member&s=admin_member"><?php echo $this->_tpl_vars['lang']['personal_information']; ?>
</a> <span>&gt;</span>
        <?php if ($_GET['type'] == 'password'): ?><?php echo $this->_tpl_vars['lang']['change_password']; ?>
<?php elseif ($_GET['type'] == 'mail'): ?><?php echo $this->_tpl_vars['lang']['change_email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['basic_information']; ?>
<?php endif; ?>
    </div>
</div>
<div class="main">
	<div class="wrap">
        <div class="hd">
            <ul class="tabs">
                <li class="<?php if ($_GET['type']): ?>normal<?php else: ?>active<?php endif; ?>"><a href="main.php?m=member&s=admin_member"><?php echo $this->_tpl_vars['lang']['basic_information']; ?>
</a></li>
                <li class="<?php if ($_GET['type'] == 'password'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=member&s=admin_member&type=password"><?php echo $this->_tpl_vars['lang']['change_password']; ?>
</a></li>
                <li class="<?php if ($_GET['type'] == 'mail'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=member&s=admin_member&type=mail"><?php echo $this->_tpl_vars['lang']['change_email']; ?>
</a></li>
                <li class="normal"><a href="main.php?m=member&s=admin_grade">我的级别</a></li> 
            </ul>
        </div>
        <?php if ($_GET['type'] == 'password'): ?>
        <div class="form-style">
            <form action="" method="post">
            <input type="hidden" value="password" name="submit">
            <dl>
                <dt><em>*</em><?php echo $this->_tpl_vars['lang']['your_password']; ?>
</dt>
                <dd><input name="oldpass" type="password" id="oldpass" class="text w150" /></dd>
            </dl>
            <dl>
                <dt><em>*</em><?php echo $this->_tpl_vars['lang']['new_pass']; ?>
</dt>
                <dd><input name="newpass" type="password" id="newpass" class="password w150" /></dd>
            </dl>
            <dl>
                <dt><em>*</em><?php echo $this->_tpl_vars['lang']['con_pass']; ?>
</dt>
                <dd><input name="renewpass" type="password" id="renewpass" class="password w150" /></dd>
            </dl>
            <dl class="foot">
                <dt>&nbsp;</dt>
                <dd><input type="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" class="submit"></dd>
            </dl>
            </form>
        </div>  
        <?php elseif ($_GET['type'] == 'mail'): ?>
        	<div class="form-style">
            <form action="" method="post">
            <input type="hidden" value="mail" name="submit">
            <dl>
                <dt><em>*</em><?php echo $this->_tpl_vars['lang']['your_password']; ?>
</dt>
                <dd><input name="pass" type="password" id="pass" class="password w150" /></dd>
            </dl>
            <dl>
                <dt><em>*</em><?php echo $this->_tpl_vars['lang']['e_mail']; ?>
</dt>
                <dd><input name="mail" type="text" id="mail" class="text w150" /></dd>
            </dl>
            <dl class="foot">
                <dt>&nbsp;</dt>
                <dd><input type="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" class="submit"></dd>
            </dl>
            </form>
            </div>
        <?php else: ?>
        <div class="form-style">
            <form action="" method="post" onSubmit="return Validator.Validate(this,3)">
            <input type="hidden" value="edit" name="submit">
            <dl>
                <dt><?php echo $this->_tpl_vars['lang']['user_name']; ?>
</dt>
                <dd><?php echo $_COOKIE['USER']; ?>
</dd>
            </dl>
            <dl>
                <dt><?php echo $this->_tpl_vars['lang']['e_mail']; ?>
</dt>
                <dd><?php echo $this->_tpl_vars['de']['email']; ?>
</dd>
            </dl>
            <dl>
                <dt><em>*</em><?php echo $this->_tpl_vars['lang']['real_name']; ?>
</dt>
                <dd><input name='name' type='text' id="name" value="<?php echo $this->_tpl_vars['de']['name']; ?>
" dataType="Require" msg="<?php echo $this->_tpl_vars['lang']['ar_con_user']; ?>
" class="text w150"></dd>
            </dl>
            <dl>
                <dt><?php echo $this->_tpl_vars['lang']['sex']; ?>
</dt>
                <dd>
                <input name="sex" id="s1" type="radio"  value="1" <?php if ($this->_tpl_vars['de']['sex'] == 1): ?>checked="checked"<?php endif; ?> />
                <label for="s1"><?php echo $this->_tpl_vars['lang']['male']; ?>
</label>
                <input name="sex" id="s2" type="radio"  value="2" <?php if ($this->_tpl_vars['de']['sex'] == 2): ?>checked="checked"<?php endif; ?> />
                <label for="s2"><?php echo $this->_tpl_vars['lang']['female']; ?>
</label>   
                </dd>
            </dl>
            <dl>
                <dt><?php echo $this->_tpl_vars['lang']['area']; ?>
</dt>
                <dd>
                <input type="hidden" name="t" id="t" value="<?php echo $this->_tpl_vars['de']['area']; ?>
" />
                <input type="hidden" name="province" id="id_1" value="<?php echo $this->_tpl_vars['de']['provinceid']; ?>
" />
                <input type="hidden" name="city" id="id_2" value="<?php echo $this->_tpl_vars['de']['cityid']; ?>
" />
                <input type="hidden" name="area" id="id_3" value="<?php echo $this->_tpl_vars['de']['areaid']; ?>
" />
                <?php if ($this->_tpl_vars['de']['area']): ?><div id="d_1"><?php echo $this->_tpl_vars['de']['area']; ?>
&nbsp;&nbsp;<a href="javascript:sd();"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a></div><?php endif; ?>
                <div id="d_2" <?php if ($this->_tpl_vars['de']['area']): ?>class="hidden"<?php endif; ?>>
                <select id="select_1" onChange="selClass(this);">
                <option value="">--<?php echo $this->_tpl_vars['lang']['please_select']; ?>
--</option>
                <?php echo $this->_tpl_vars['prov']; ?>

                </select>
                <select id="select_2" onChange="selClass(this);" class="hidden"></select>
                <select id="select_3" onChange="selClass(this);" class="hidden"></select>			</div>
                </dd>
            </dl>
            <dl>
                <dt>QQ：</dt>
                <dd><input name="qq" type="text" value="<?php echo $this->_tpl_vars['de']['qq']; ?>
" class="text w200"></dd>
            </dl>
			<dl>
                <dt><?php echo $this->_tpl_vars['lang']['head_portrait']; ?>
</dt>
                <dd>
                <p class="pic" style=" width:120px; height:120px; "><img id="logo_img" src="<?php if ($this->_tpl_vars['de']['logo']): ?><?php echo $this->_tpl_vars['de']['logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/user_admin/default_user_portrait.gif<?php endif; ?>" height="120" width="120" /></p>
				<p><input class="text w300" name="logo" type="text" id="logo" value="<?php echo $this->_tpl_vars['de']['logo']; ?>
"> <a class="upload-button" href="javascript:uploadfile('LOGO','logo',120,120,'member')"><?php echo $this->_tpl_vars['lang']['upload']; ?>
</a></p>
                </dd>
            </dl>
            <dl class="foot">
                <dt>&nbsp;</dt>
                <dd><input type="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" class="submit"></dd>
            </dl>
            </form>
        </div> 
        <?php endif; ?>
    </div>
</div>

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
		<p><div style="width:20px; height:20px; margin-left: 20px; margin-bottom: -13px; color: #036; background: url(images/car-num.png) no-repeat; line-height:20px; padding-left:5px;"><?php echo count($this->_tpl_vars['cart']['cart']['0']['prolist']); ?>
</div><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
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