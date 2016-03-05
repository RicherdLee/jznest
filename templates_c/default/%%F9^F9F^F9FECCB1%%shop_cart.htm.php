<?php /* Smarty version 2.6.20, created on 2016-03-04 17:08:26
         compiled from shop_cart.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'shop_cart.htm', 6, false),array('modifier', 'count', 'shop_cart.htm', 62, false),array('modifier', 'number_format', 'shop_cart.htm', 109, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的购物车</title>
<meta name="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['description'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[\r\t\n]/", "") : smarty_modifier_regex_replace($_tmp, "/[\r\t\n]/", "")); ?>
" />
<meta name="keywords" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['keyword'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[\r\t\n]/", "") : smarty_modifier_regex_replace($_tmp, "/[\r\t\n]/", "")); ?>
" />
<meta name="author" content="B2Bbuilder Team and B2Bbuilder UI Team" />
<meta name="copyright" content="B2Bbuilder" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/product/templates/shop.css">
<link href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/templates/default/css/jizhan.css" type="text/css" rel="stylesheet" />
</head>
<script language="javascript">
function do_select()
{
	 var box_l = document.getElementsByName("checkbox[]").length;
	 for(var j = 0 ; j < box_l ; j++)
	 {
		if(document.getElementsByName("checkbox[]")[j].checked==true){ 
			document.getElementsByName("checkbox[]")[j].checked = false;
		}else{
			document.getElementsByName("checkbox[]")[j].checked = true;
		}
	}
}
</script>
<body>
	<div id="shortcut">
    	<div class="w">
        	<ul class="fl">
            	<li><a class="Thome" href="javascript:setHomepage('<?php echo $this->_tpl_vars['config']['weburl']; ?>
');" style=" background:url(<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/home.gif) no-repeat left center; padding-left:20px;" >设为首页</a></li>
                <li style="padding:0px;">|</li>
            	<li><a href="#" onclick="window.external.addFavorite('<?php echo $this->_tpl_vars['config']['weburl']; ?>
','<?php echo $this->_tpl_vars['config']['keyword']; ?>
')" style="background:url(<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/add.gif) no-repeat left center; padding-left:20px;">添加收藏</a></li>
            </ul>
            <div class="fr">
            	<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login_statu.php"></script>
                <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=product&s=admin_buyorder">我的订单</a>
            </div>
        </div>
    </div>
	<div class="header w">
    	<div class="logo">
        	<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
"><img src="<?php if ($this->_tpl_vars['config']['logo']): ?><?php echo $this->_tpl_vars['config']['logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/logo.png<?php endif; ?>" width="160px" height="70px" /></a>
        </div>
        <div class="progress">
            <ul class="progress-1">
                <li class="step-1"><b></b>1.我的购物车</li>
                <li class="step-2"><b></b>2.填写核对订单信息</li>
                <li class="step-3">3.成功提交订单</li>
        	</ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
	
    <div class="cart w">
    	<div class="cart-hd">
            <h2>我的购物车</h2>
		</div>
        
        <?php if ($_GET['type'] == 'clear' || count($this->_tpl_vars['cart']['cart']) < 1): ?>
            <div class="cart-empty w">
                <div class="message">
                购物车内暂时没有产品，您可以<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
">去首页</a>挑选喜欢的
                </div>
            </div>
        <?php else: ?>  
          
        <?php if ($_GET['type'] == 'numf'): ?>
            <div align="center"><font color="#FF0000">库存数量不够(已经为定订购产品的最大值)</font></div>
        <?php elseif ($_GET['type'] == 'pronull'): ?>
            <div align="center"> <font color="#FF0000">产品不存在或订购销完或已经删除</font></div>
        <?php elseif ($_GET['type'] == 'del'): ?>
            <div align="center"><font color="#FF0000">购物车不存在该产品已经删除</font></div>
        <?php endif; ?>
        
        <form method="post" action="">
        <table width="100%" cellpadding="0" cellspacing="1" class="cart-con">
            <tr class="title">
                <th width="99"><input onClick="do_select()" type="checkbox" class="checkbox" name="checkbox" value="checkbox" id="allcheck"><label for="allcheck">全选</label></th>
                <th width="322">产品</th>
                <th width="128">价格</th>
                <th width="100">送积分</th>
                <th width="115">数量</th>
                <th width="115">小计</th>
                <th>操作</th>
            </tr>
            <?php $_from = $this->_tpl_vars['cart']['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>  
                <?php $_from = $this->_tpl_vars['list']['prolist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['pro']):
?>
                <tr>
                    <td colspan="2">
                    <div class="pro-checkbox cell">
                        <input class="checkbox" type="checkbox" name="checkbox[]" value="<?php echo $this->_tpl_vars['pro']['id']; ?>
">
                    </div>
                    <div class="pro-goods cell">
                        <div class="pro-img">
                            <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['pro']['pid']; ?>
">
                                <img height="60" alt="<?php echo $this->_tpl_vars['pro']['name']; ?>
" src="<?php echo $this->_tpl_vars['pro']['pic']; ?>
_60X60.jpg">
							</a>
                        </div>
                        <div class="pro-name">
                            <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['pro']['pid']; ?>
"><?php echo $this->_tpl_vars['pro']['pname']; ?>
</a>
                            <p>产品编号：<?php echo $this->_tpl_vars['pro']['code']; ?>
</p>
                        </div>
                    </div>
                    </td>
                    <td align="center">
                        <span class="price"><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['pro']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</span>
                    </td>
                    <td align="center"><?php echo $this->_tpl_vars['pro']['point']; ?>
</td>
                    <td align="center">
                    <div class="quantity">
                        <a class="decrement" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart&id=<?php echo $this->_tpl_vars['pro']['id']; ?>
&cgnum=<?php echo $this->_tpl_vars['pro']['num']-1; ?>
">-</a>
   <input readonly="readonly" name="nums" class="text" id="nums" onchange="check_nums();" type="text" size="5" value="<?php echo $this->_tpl_vars['pro']['num']; ?>
" />
                        <a class="increment" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart&id=<?php echo $this->_tpl_vars['pro']['id']; ?>
&cgnum=<?php echo $this->_tpl_vars['pro']['num']+1; ?>
">+</a>
                    </div>
                    <script>
                    function check_nums()
                    {
                        var v=document.getElementById('nums').value*1;
                        if(!v)
                            document.getElementById('nums').value=1;
                        if(v><?php echo $this->_tpl_vars['pro']['amount']; ?>
*1)
                        {
                            document.getElementById('nums').value=<?php echo $this->_tpl_vars['pro']['amount']; ?>
*1;
                            return false;
                        }
                    }
                    </script>
                    </td>
                    <td align="center">
                        <span class="price"><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['pro']['sumprice'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</span>
                    </td>
                    <td align="center">
                        <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart&deid=<?php echo $this->_tpl_vars['pro']['id']; ?>
">删除</a>
                    </td>
                </tr>
                <?php if ($this->_tpl_vars['pro']['service'] || $this->_tpl_vars['pro']['product_give']): ?>
                <tr class="other">
                	<td colspan="3">
                    <?php if ($this->_tpl_vars['pro']['product_give']): ?>
                    <dl>
                        <dt>[赠品]</dt>
                        <dd>
                            <ul>
                                <?php $_from = $this->_tpl_vars['pro']['product_give']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                                    <li><?php echo $this->_tpl_vars['slist']['pname']; ?>
</li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </dd>
                    </dl>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['pro']['service']): ?>
                    <dl>
                        <dt>[服务]</dt>
                        <dd>
                            <ul>
                                <?php $_from = $this->_tpl_vars['pro']['service']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                                    <li>
                                    <?php echo $this->_tpl_vars['slist']['name']; ?>

                                    <span><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['slist']['price']; ?>
</span>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </dd>
                    </dl>
                    <?php endif; ?>
                    </td>
                    <td colspan="4"></td>
                </tr>
                <?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
               
            <?php endforeach; endif; unset($_from); ?>
            <tr>
            	<td colspan="7" class="toolbar">
                	<div class="control fl">
                    <input type="hidden" name="act" value="del" />
                    <input type="submit" value="删除选中的产品" />
                    </div>
                    <div class="total fr">
                        <p><span><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cart']['sumprice'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</span>总计：</p>
                    </div>
                </td>
            </tr>
            <tr>
            	<td colspan="7" class="cart-total">
                	<div class="total fr">
                    	<span class="fr"><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cart']['sumprice'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</span>
                    	<b class="fr">总计（不含运费）：</b>
					</div>
                </td>
            </tr>
        </table>
        </form>
        <div class="cart-button">
            <a class="continue" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/"><span>继续购物</span></a>
             <?php if (( ( ((is_array($_tmp=$this->_tpl_vars['ship']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)) ) != 0 )): ?>
            <span class="total">差<strong>500<span></span></strong>免运费</span>
            <?php endif; ?>
            <a class="checkout" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_order">去结算</a>
        	<div class="clear"></div>
        </div>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
	<div id="footer" class="w">
   		<?php echo $this->_tpl_vars['web_con']; ?>
<br />
  Copyright &copy; 杞盏燕窝·杞盏燕农
	</div>
</div>

<div class="container">
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
		<p><div style="width:20px; height:20px; margin-left: 20px; margin-bottom: -13px; color: #fff; background: url(images/car-num.png) no-repeat; line-height:20px; padding-left:6px;"><?php echo count($this->_tpl_vars['cart']['cart']['0']['prolist']); ?>
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
</body>
</html>