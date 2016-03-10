<?php /* Smarty version 2.6.20, created on 2016-03-05 12:13:16
         compiled from admin_order_pay.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_order_pay.htm', 20, false),array('modifier', 'number_format', 'admin_order_pay.htm', 49, false),array('modifier', 'count', 'admin_order_pay.htm', 160, false),)), $this); ?>
<div class="path">
    <div>
    	<a href="main.php?cg_u_type=1">我的商城</a> <span>&gt;</span> 
    	<a href="main.php?m=product&s=admin_buyorder">订单管理</a> <span>&gt;</span> 
        订单付款
    </div>
</div>
<div class="main">
	<div class="wrap">
        <div class="order_pay">
            <h2>订单信息</h2>
            <table class="table">
                <tbody>
                <tr class="tr">
                    <td width="50">订单编号</td>
                    <td width="150"><a href="main.php?m=product&s=admin_orderdetail&id=<?php echo $this->_tpl_vars['de']['order_id']; ?>
"><?php echo $this->_tpl_vars['de']['order_id']; ?>
</a></td>
                    <td width="50">订单状态</td>
                    <td width="100"><b class="org"><?php echo $this->_tpl_vars['de']['statu_text']; ?>
</b></td>
                    <td width="50">下单时间</td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['de']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d&nbsp;%H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d&nbsp;%H:%M:%S")); ?>
</td>
                </tr>
                <tr class="tr">
					<td>配送方式</td>
                    <td colspan="99"><?php echo $this->_tpl_vars['de']['shipping_name']; ?>
</td>
                </tr>
                </tbody>
            </table>
            <table class="table alc">    
            <thead>
                <tr>
                    <th class="partition" colspan="99">订单信息</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">产品</td>
                    <td width="90">单价</td>
                    <td width="60">数量</td>
                    <td width="90">总价</td>
                </tr>
                <?php $_from = $this->_tpl_vars['de']['product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                <tr>
                    <td class="al"><a target="_blank" href="index.php?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['pid']; ?>
"><img src="<?php echo $this->_tpl_vars['list']['pic']; ?>
_60x60.jpg" /></a></td>
                    <td class="al <?php if ($this->_tpl_vars['list']['service']): ?>npb<?php endif; ?>">
                        <a target="_blank" href="index.php?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['pid']; ?>
">
                            <?php echo $this->_tpl_vars['list']['name']; ?>

                        </a>
                    </td>
                    <td <?php if ($this->_tpl_vars['list']['service'] || $this->_tpl_vars['list']['product_give']): ?>class="npb"<?php endif; ?>><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</td>
                    <td <?php if ($this->_tpl_vars['list']['service'] || $this->_tpl_vars['list']['product_give']): ?>rowspan="2"<?php endif; ?>>x <?php echo $this->_tpl_vars['list']['num']; ?>
</td>
                    <td <?php if ($this->_tpl_vars['list']['service'] || $this->_tpl_vars['list']['product_give']): ?>rowspan="2"<?php endif; ?>><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['sum'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</td>
                </tr>
                <?php if ($this->_tpl_vars['list']['product_give']): ?>
                <tr class="product_give">
                    <td class="al">赠品</td>
                    <td class="al">
                        <?php $_from = $this->_tpl_vars['list']['product_give']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                            <p><?php echo $this->_tpl_vars['slist']['pname']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['list']['service']): ?>
                <tr class="other">
                    <td class="al">服务</td>
                    <td class="al">
                        <?php $_from = $this->_tpl_vars['list']['service']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                            <p><?php echo $this->_tpl_vars['slist']['name']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </td>
                    <td>
                        <?php $_from = $this->_tpl_vars['list']['service']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                            <p><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['slist']['price']; ?>
</p>
                        <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <tr>
                    <td colspan="99">
                    <dl><dt>订单金额:</dt><dd class="price"><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['de']['cost']+$this->_tpl_vars['de']['freight'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</dd></dl>
                    <dl><dt>运费:</dt><dd><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['de']['freight'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</dd></dl>
                    <dl><dt>商品金额:</dt><dd><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['de']['cost'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</dd></dl>
                    </td>
                </tr>
            </tbody>
        	</table>
        </div>
        <div class="order_pay mt20">
            <h2>订单支付</h2>
            <table class="table">
                <tbody>
                <tr class="tr">
                    <td>
                    您选择了 <b class="org"><?php echo $this->_tpl_vars['pay']['payment_name']; ?>
</b>&nbsp;
                    <?php if ($this->_tpl_vars['pay']['payment_type'] != 'cod'): ?><a href="javascript:#" class="change">更改支付方式</a><?php endif; ?>
                    </td>
				</tr>
                <tr class="tr">
                 	<td class="td"><?php echo $this->_tpl_vars['pay']['payment_desc']; ?>
</td>
                    <td class="paymemt hidden">
                    <?php $_from = $this->_tpl_vars['paymemt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                        <li>
                            <img align="top" title="<?php echo $this->_tpl_vars['list']['payment_name']; ?>
" alt="<?php echo $this->_tpl_vars['list']['payment_name']; ?>
" data-param="{'id':'<?php echo $this->_tpl_vars['list']['payment_id']; ?>
'}" src="image/payment/<?php echo $this->_tpl_vars['list']['payment_type']; ?>
.gif" /><i></i>
						</li>
                    <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>
                <?php if ($this->_tpl_vars['pay']['payment_type'] != 'cod'): ?>
                <tr>
                	<td>
                    	<a class="btn-pay" href="javascript:0">确定支付</a>
                        <input type="hidden" id="payment_id" value="<?php echo $this->_tpl_vars['pay']['payment_id']; ?>
"/>
                    </td>
                </tr>
                <?php endif; ?>
				</tbody>
        	</table>
            <script type="text/javascript">
            $(".change").bind("click",function(){
				$(this).addClass("hidden");		
				$(this).prev().addClass("hidden");		
				$('.td').addClass("hidden").siblings().removeClass("hidden");
			});
			$(".btn-pay").bind("click",function(){
				var href="?m=payment&s=admin_pay&order_id=<?php echo $this->_tpl_vars['de']['order_id']; ?>
";
				var payment_id=$("#payment_id").val();
				if(!payment_id)
				{
					alert("请选择支付方式！");
					return false;
				}
				window.location=href+"&payment="+payment_id;
				return false;
			});
			$(".order_pay li").bind("click",function(){
				var data = $(this).children('img').attr('data-param');
				eval("data = "+data);
				$("#payment_id").val(data.id);
				$(this).addClass("checked").siblings().removeClass("checked");
			});
            </script>
        </div>
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