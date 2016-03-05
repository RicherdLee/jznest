<?php /* Smarty version 2.6.20, created on 2016-03-04 17:08:40
         compiled from shop_order.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'shop_order.htm', 6, false),array('modifier', 'number_format', 'shop_order.htm', 149, false),array('modifier', 'count', 'shop_order.htm', 196, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>订单结算页 - <?php echo $this->_tpl_vars['config']['company']; ?>
 - Powered by Mallbuilder</title>
    <meta name="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['description'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "
    /[\r\t\n]/", "") : smarty_modifier_regex_replace($_tmp, "
    /[\r\t\n]/", "")); ?>
" />
    <meta name="keywords" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['keyword'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "
    /[\r\t\n]/", "") : smarty_modifier_regex_replace($_tmp, "
    /[\r\t\n]/", "")); ?>
" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/product/templates/shop.css">
    <script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery-1.4.4.min.js" type=text/javascript></script>
    <script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/order.js" type=text/javascript></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/district.js"></script>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery.checkout.js"></script>
    <script>
        var weburl = "<?php echo $this->_tpl_vars['config']['weburl']; ?>
";
    </script>
</head>
<div id="shortcut">
    <div class="w">
        <ul class="fl">
            <li><a class="Thome" href="javascript:setHomepage('<?php echo $this->_tpl_vars['config']['weburl']; ?>
');"
                   style=" background:url(<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/home.gif) no-repeat left center; padding-left:20px;">设为首页</a>
            </li>
            <li style="padding:0px;">|</li>
            <li><a href="#" onclick="window.external.addFavorite('<?php echo $this->_tpl_vars['config']['weburl']; ?>
','<?php echo $this->_tpl_vars['config']['keyword']; ?>
')"
                   style="background:url(<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/add.gif) no-repeat left center; padding-left:20px;">添加收藏</a>
            </li>
        </ul>
        <div class="fr">
            <script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login_statu.php"></script>
            <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=product&s=admin_buyorder">我的订单</a>
        </div>
    </div>
</div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="header w">
    <div class="logo">
        <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
"><img
                src="<?php if ($this->_tpl_vars['config']['logo']): ?><?php echo $this->_tpl_vars['config']['logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/logo.png<?php endif; ?>" width="160px"
                height="70px"/></a>
    </div>
    <div class="progress">
        <ul class="progress-2">
            <li class="step-1"><b></b><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart">1.我的购物车</a></li>
            <li class="step-2"><b></b>2.填写核对订单信息</li>
            <li class="step-3">3.成功提交订单</li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

<div class="order w">
    <div class="order_title"><h3>填写核对订单信息</h3></div>
    <div class="order_info">
        <div id="step-1" class="step">
            <div class="step-title">
                <strong>收货人信息</strong>
                <span class="step-action" id="consignee_edit_action">
                	<a onclick="open_Module('consignee')" href="#none">[修改]</a>
                </span>
            </div>
            <div class="step-content">
                <div id="consignee">
                    <p><?php echo $this->_tpl_vars['consignee']['name']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['consignee']['mobile']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['consignee']['tel']; ?>
</p>

                    <p><?php echo $this->_tpl_vars['consignee']['area']; ?>
 <?php echo $this->_tpl_vars['consignee']['address']; ?>
</p>
                </div>
            </div>
        </div>
        <div id="step-2" class="step">
            <div class="step-title">
                <strong>配送方式</strong>
                <span class="step-action" id="payment_edit_action">
                	<a onclick="open_Module('payment')" href="#none">[修改]</a>
                </span>
            </div>
            <div class="step-content">
                <div id="payment">
                    <p><?php echo $this->_tpl_vars['ship']['title']; ?>
</p>
                </div>
            </div>
        </div>
        <div id="step-3" class="step">
            <div class="step-title">
                <strong>发票信息</strong>
                <span class="step-action" id="invoice_edit_action">
                	<a onclick="open_Module('invoice')" href="#none">[修改]</a>
                </span>
            </div>
            <div class="step-content">
                <div id="invoice">
                    <p>
                        <?php $_from = $this->_tpl_vars['lang']['itype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['v']):
?><?php if ($this->_tpl_vars['num'] == $this->_tpl_vars['invoice']['type']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>
                        <?php $_from = $this->_tpl_vars['lang']['irise']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['v']):
?><?php if ($this->_tpl_vars['num'] == $this->_tpl_vars['invoice']['rise']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>
                        <?php $_from = $this->_tpl_vars['lang']['icontent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['v']):
?><?php if ($this->_tpl_vars['num'] == $this->_tpl_vars['invoice']['content']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>
                    </p>
                </div>
            </div>
<script>
function open_Module(name) {

	$("#"+name+"_edit_action a").hide();
	step_Openlight(name);
	
	var url = "?m=product&s=shop_order";
	var pars = 'act='+name;
	
	$.post(url, pars,showResponse);
	function showResponse(originalRequest)
	{		
		if(originalRequest)
		{
			$("#"+name).html(originalRequest);
		}
	}
}
</script>         
        </div>
        <div id="step-4" class="step">
            <div class="step-title">
                <strong>产品清单</strong>
            </div>
            <div class="step-content">
                <table width="100%" class="order_product">
                    <tr>
                        <th width="55%" align="left">&nbsp;&nbsp;产品名称</th>
                        <th width="14%">单价</th>
                        <th width="7%">数量</th>
                        <th width="14%">小计</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['cart']['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                    <?php $_from = $this->_tpl_vars['list']['prolist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pro']):
?>
                    <tr>
                        <td class="al vt">
                            <div class="fl">
                                <img src="<?php echo $this->_tpl_vars['pro']['pic']; ?>
_60X60.jpg">
                            </div>
                            <div class="fl ml20">
                                <a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['pro']['pid']; ?>
"><?php echo $this->_tpl_vars['pro']['pname']; ?>
</a>

                                <p>产品编号：<?php echo $this->_tpl_vars['pro']['code']; ?>
</p>
                            </div>
                        </td>
                        <td><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['pro']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
元</td>
                        <td>x<?php echo $this->_tpl_vars['pro']['num']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['pro']['sumprice'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
元</td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
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
                </table>
                <div class="order_summary">
                    <div class="fl">
                        <div>重量总计：<?php echo $this->_tpl_vars['cart']['weight']; ?>
kg</div>
                    </div>
                    <div  class="statistic">
                        <div class="list">
                            <span>共计<em><?php echo count($this->_tpl_vars['cart']['cart']['0']['prolist']); ?>
</em> 大类产品，总产品金额：</span>
                            <span class="price"><?php echo $this->_tpl_vars['config']['money']; ?>
<v id="price1"><?php echo ((is_array($_tmp=$this->_tpl_vars['cart']['sumprice'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>

                            </v></span>
                        </div>
                        <div class="list">
                            <span>运费：</span>
                            <span class="price"><?php echo $this->_tpl_vars['config']['money']; ?>
<v id="price2"><?php echo ((is_array($_tmp=$this->_tpl_vars['ship']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>

                            </v></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--modify by lihao 添加优惠码-->
        <div id="step-5" class="step">
            <div class="step-title">
                <strong>优惠码信息</strong>
                <input id="opt_code" size="40">
                <label id="code_desc" style="display:none"></label>
                <button  id="opt_code_but" onclick="opt_code()" value="添加">添加</button>
            </div>
        </div>
        <div class="order_buttons" id="order_buttons">
            <form action="" method="post">
                <input type="hidden" name="act" value="order"/>
                <input type="hidden" id="discount" name="code" value=""/>
                <input type="submit" value="" class="order_submit">
                <input type="hidden" name="h_emsumprice" id="h_emsumprice" value=""/>
                <input type="hidden" name="d_price" id="d_price" value="<?php echo $this->_tpl_vars['ship']['d_free']; ?>
"/>
                <input type="hidden" name="h_sumprice" id="h_sumprice" value="<?php echo $this->_tpl_vars['cart']['sumprice']; ?>
"/>
                <input type="hidden" id="weight" value="<?php echo $this->_tpl_vars['cart']['weight']; ?>
"/>
                <input type="hidden" id="city" value="<?php echo $this->_tpl_vars['consignee']['cityid']; ?>
"/>

                <input type="hidden" name="hidden_invoice_id" id="hidden_invoice_id" value="<?php echo $this->_tpl_vars['invoice']['id']; ?>
"/>
                <input type="hidden" name="hidden_consignee_id" id="hidden_consignee_id" value="<?php echo $this->_tpl_vars['consignee']['id']; ?>
"/>

                <input type="hidden" name="hidden_payment_id" id="hidden_payment_id" value="<?php echo $this->_tpl_vars['pay']['payment_id']; ?>
"/>
                <input type="hidden" name="hidden_ship_id" id="hidden_ship_id" value="<?php echo $this->_tpl_vars['ship']['id']; ?>
"/>
                <span class="total">应付总额：<strong><?php echo $this->_tpl_vars['config']['money']; ?>
<span id="price3"></span></strong></span>
                <?php if (( ( ((is_array($_tmp=$this->_tpl_vars['ship']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)) ) != 0 )): ?>
                <span class="total"><strong><?php echo $this->_tpl_vars['config']['money']; ?>
<span></span></strong></span>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<input type="hidden" id="_price1" />
<input type="hidden" id="_price2" />
<input type="hidden" id="_price3" />
<script>
    price1=$("#price1").html().replace(",",'')*1;
    price2=$("#price2").html().replace(",",'')*1;
    price3=(price1+price2).toFixed(2);
    $("#price3").html(price3);
	d_price=$("#d_price").html().replace(",",'')*1;
    $("#_price1").val(oldprice1);
    var d_price = 500-price3;
		
    <?php if (! $this->_tpl_vars['consignee']['id']): ?>
    open_Module("consignee");
    <?php else: ?>
    <?php if (! $this->_tpl_vars['invoice']['id']): ?>
    open_Module("invoice");
    <?php endif; ?>
    <?php endif; ?>
</script>
<script>
    function opt_code() {
        var code = $("#discount").val();
        if (code != null && code!= '') {//优惠码已添加,点击操作为删除操作
            //1.删除表单优惠码
            $("#discount").val("");
            //2.删除显示优惠码
            $("#opt_code").val("");
            //3.修改按钮名称
            $("#opt_code_but").text("添加");
            $("#opt_code").show();
            $("#code_desc").hide();
            var oldprice1 = $("#_price1").val();
            var oldprice2 = $("#_price2").val();
            var oldprice3 = $("#_price3").val();
            $("#price1").html(oldprice1);
            $("#price2").html(oldprice2);
            $("#price3").html(oldprice3);
        } else {//优惠码未添加,点击操作为添加错做
//1.获取显示位置优惠码
            code=$("#opt_code").val();
            if (code != null && code!= ''){
                var url = "?m=product&s=admin_code&ajax=code&code="+code;
                $.get(url,function(data){
                    if(data== 0){
                        alert('无效优惠码');
                    }else if(data== -1){
                        alert('优惠码已锁定,请检查对应订单');
                    }else if(data==-2){
                        alert('优惠码已使用,请检查对应订单');
                    }else if(data==-3){
                        alert('优惠码已过期');
                    }else if(data==-4){
                        alert('分享优惠码不可个人使用,请分享好友使用');
                    }else if(data==-5){
                        alert('此优惠码属于其他用户');
                    }else{
                        //2.添加表单优惠码
                        $("#discount").val(code);
                        //3.修改按钮名称
                        $("#opt_code_but").text("删除");
                        $("#opt_code").hide();
                        $("#code_desc").html('此优惠码'+code+'可享受'+data+'优惠');
                        $("#code_desc").show();
                        var oldprice1 = $("#price1").html();
                        $("#_price1").val(oldprice1);
                        var newprice1 = oldprice1 * data/10;
                        $("#price1").html(newprice1);
                        var oldprice2 = $("#price2").html();
                        $("#_price2").val(oldprice2);
                        var oldprice3 = $("#price3").html();
                        $("#_price3").val(oldprice3);
                        var newprice3 = oldprice2*1+newprice1*1;
                        $("#price3").html(newprice3);

                    }

                })
            }
        }
    }
</script>
<div class="clear"></div>
<div id="footer" class="w">
    <?php echo $this->_tpl_vars['web_con']; ?>
<br/>
    Copyright &copy; 极盏燕窝·极盏燕农
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
</script></body>
</html>