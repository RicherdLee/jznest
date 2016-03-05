<?php /* Smarty version 2.6.20, created on 2016-03-04 19:49:06
         compiled from admin_order.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_order.htm', 49, false),array('modifier', 'number_format', 'admin_order.htm', 67, false),array('modifier', 'count', 'admin_order.htm', 144, false),)), $this); ?>
<div class="path">
    <div>
    	<a href="main.php?cg_u_type=1">我的商城</a> <span>&gt;</span> 
    	<a href="main.php?m=product&s=admin_buyorder">订单管理</a> <span>&gt;</span> 
        <?php if ($_GET['status'] == '1'): ?>等待付款
        <?php elseif ($_GET['status'] == '2'): ?>等待发货
        <?php elseif ($_GET['status'] == '3'): ?>已经发货
        <?php elseif ($_GET['status'] == '4'): ?>已经完成
        <!--{elseif $smarty.get.status=='5'}>等待退货
        <?php elseif ($_GET['status'] == '6'): ?>退货完成-->
        <?php elseif ($_GET['status'] == '-1'): ?>已经取消
        <?php else: ?>所有订单<?php endif; ?> 
    </div>
</div>
<div class="main">
	<div class="wrap">
        <div class="hd">
            <ul class="tabs">
               <li class="<?php if ($_GET['status'] != ''): ?>normal<?php else: ?>active<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder">所有订单</a></li>
                <li class="<?php if ($_GET['status'] == '1'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=1">等待付款</a></li>
                <li class="<?php if ($_GET['status'] == '2'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=2">等待发货</a></li>
                <li class="<?php if ($_GET['status'] == '3'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=3">已经发货</a></li>
                <li class="<?php if ($_GET['status'] == '4'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=4">已经完成</a></li>
                <!--li class="<?php if ($_GET['status'] == '5'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=5">等待退货</a></li>
                <li class="<?php if ($_GET['status'] == '6'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=6">退货完成</a></li-->
                <li class="<?php if ($_GET['status'] == '0'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=product&s=admin_buyorder&status=0">已经取消</a></li>
            </ul>
        </div>
        <table class="table-list-style order">
        	<thead>
            <tr>
                <th width="10"></th>
                <th width="280">产品详情</th>
                <th width="80">单价</th>
                <th width="80">数量</th>
                <th width="120">订单总价</th>
                <th width="120">状态与操作</th>
                <th width="120">分享优惠码</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['blist']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['buylist']):
?>
            <tr>
            	<td class="sep-row" colspan="20"></td>
            </tr>
            <tr>
                <th colspan="20">
                <span class="fl ml10">订单编号：<span style="color: #339900; font-family: Tahoma;"><?php echo $this->_tpl_vars['buylist']['order_id']; ?>
</span></span>
                <span class="fl ml20">下单时间：<span style="color: #999999; font-family: Tahoma;"><?php echo ((is_array($_tmp=$this->_tpl_vars['buylist']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</span></span>
                <span class="fl ml20"><a target="_blank" class="order_show" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=product&s=admin_orderdetail&id=<?php echo $this->_tpl_vars['buylist']['order_id']; ?>
">查看订单</a></span>
                </th>
			</tr>
            <tr> 
                <td class="bdl"></td>
                <td colspan="3">
                <table>
                <?php $_from = $this->_tpl_vars['buylist']['product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plist']):
?>
                <tr>
                    <td class="w80">
                    <div class="pic-small">
                        <a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['plist']['pid']; ?>
">
                            <img width=60 height=60 src="<?php if (! $this->_tpl_vars['plist']['pic']): ?>image/default/nopic.gif<?php else: ?><?php echo $this->_tpl_vars['plist']['pic']; ?>
<?php endif; ?>" alt="<?php echo $this->_tpl_vars['list']['pname']; ?>
" />
                        </a>
                    </div>
                    </td>
                    <td class="tl"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['plist']['pid']; ?>
"><?php echo $this->_tpl_vars['plist']['name']; ?>
</a></td>
                    <td class="w80"><?php echo ((is_array($_tmp=$this->_tpl_vars['plist']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</td>
                    <td class="w80"><?php echo $this->_tpl_vars['plist']['num']; ?>
</td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
                </table>
                </td>
                <td class="bdl">
                	<p class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['buylist']['cost']+$this->_tpl_vars['buylist']['freight'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</p>
                    <p><?php echo $this->_tpl_vars['buylist']['payment_name']; ?>
</p>
                </td>
                <td class="bdl">
                <?php if ($this->_tpl_vars['buylist']['status'] == 3): ?><p><a class="buttons" href="main.php?m=product&s=admin_return&id=<?php echo $this->_tpl_vars['buylist']['order_id']; ?>
"><?php echo $this->_tpl_vars['lang']['applret']; ?>
</a></p><?php endif; ?>
                <?php if ($this->_tpl_vars['buylist']['status'] == 5): ?> <p><a class="buttons" href="main.php?m=product&s=admin_return_step&id=<?php echo $this->_tpl_vars['buylist']['order_id']; ?>
">退货详情</a></p><?php endif; ?>
                <p><?php echo $this->_tpl_vars['buylist']['statu_text']; ?>
</p>
                <p><?php echo $this->_tpl_vars['buylist']['next_action']; ?>
</p>
                <?php if ($this->_tpl_vars['buylist']['status'] == 4 && $this->_tpl_vars['buylist']['is_comment'] == 'false'): ?>
                <p><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=comment&uid=<?php echo $this->_tpl_vars['buid']; ?>
&id=<?php echo $this->_tpl_vars['buylist']['order_id']; ?>
">评论</a></p>
                <?php endif; ?>
                </td>
                <td class="bdl bdr">
                <?php if ($this->_tpl_vars['buylist']['status'] == 4): ?>
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_streak">
                <span style="color: #339900; font-family: Tahoma;"><?php echo $this->_tpl_vars['buylist']['order_id']; ?>
</span>
                <div class="jiathis_streak_share_32x32" id="jiathis_streak_share" style="display:none">
                 <span class="streak_share_jiao" style="color: #339900; font-family: Tahoma;"></span>
                <div class="jiathis_streak_goshare" id="jiathis_streak_goshare">
                  <span class="jiathis_streak_txt">分享到</span>
                  <span style="" title="隐藏分享框" onclick="JIATHIS_STREAK.hideShare()" class="jiathis_streak_close">X</span>
                </div>
                <div class="jiathis_style_32x32" >
                  <a class="jiathis_button_tsina"></a>
                  <a class="jiathis_button_weixin"></a>
                  <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>	
                <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_streak.js" charset="utf-8"></script>
                </div>
                </div>
                选定上述产品编码，一键分享
                </div>
                <!-- JiaThis Button END -->
                <?php endif; ?>
                <?php if ($this->_tpl_vars['buylist']['status'] != 4): ?>
                未完成，您暂时无法分享
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr>
            	<td colspan="20" class="norecord">
                	<i></i><span>暂无符合条件的数据记录</span>	
                </td>
            </tr>
            <?php endif; unset($_from); ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="20"><div class="pagination"><?php echo $this->_tpl_vars['blist']['page']; ?>
</div></td>
            </tr>
            </tfoot>
        </table>
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