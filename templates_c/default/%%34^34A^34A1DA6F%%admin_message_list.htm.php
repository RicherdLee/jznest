<?php /* Smarty version 2.6.20, created on 2016-03-04 19:48:56
         compiled from admin_message_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_message_list.htm', 140, false),)), $this); ?>
<script language="javascript">
$(function(){
    /* 全选 */
	 $('.checkall').click(function(){
        var _self = this;
        $('.checkitem').each(function(){
            if (!this.disabled)
            {
                $(this).attr('checked', _self.checked);
            }
        });
        $('.checkall').attr('checked', this.checked);
    });
	 
	$('#btn').click(function(){
		
		if($('.checkitem:checked').length == 0){
			return false;
		}
		var url = "main.php?m=message&s=admin_message_list_inbox";
		var name = $(this).attr('name');
		var items = '';
			$('.checkitem:checked').each(function(){
				items += this.value + ',';
		});
		items = items.substr(0, (items.length - 1));
		$.get(url, name + '=' + items,showResponse);
		function showResponse(originalRequest)
		{
			document.location.reload();
		}
		return false;
	
	});
});
</script>
<div class="path">
    <div>
    	<?php if ($this->_tpl_vars['cg_u_type'] == 1): ?>
    		<a href="main.php?cg_u_type=1">我的商城</a> <span>&gt;</span>
        <?php else: ?>
    		<a href="main.php?cg_u_type=2">卖家中心</a> <span>&gt;</span>
        <?php endif; ?> 
        <?php if ($_GET['s'] == 'admin_message_list_outbox'): ?><?php echo $this->_tpl_vars['lang']['outbox']; ?>

        <?php elseif ($_GET['s'] == 'admin_message_list_savebox'): ?><?php echo $this->_tpl_vars['lang']['savebox']; ?>

        <?php elseif ($_GET['s'] == 'admin_message_list_delbox'): ?><?php echo $this->_tpl_vars['lang']['delbox']; ?>

        <?php else: ?><?php echo $this->_tpl_vars['lang']['inbox']; ?>

        <?php endif; ?>
    </div>
</div>
<div class="main">
	<div class="wrap">
        <div class="hd">
            <ul class="tabs">
				<li class="<?php if ($_GET['s'] == 'admin_message_list_outbox'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=message&s=admin_message_list_outbox"><?php echo $this->_tpl_vars['lang']['outbox']; ?>
</a></li>
                <li class="<?php if ($_GET['s'] == 'admin_message_list_inbox'): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=message&s=admin_message_list_inbox"><?php echo $this->_tpl_vars['lang']['inbox']; ?>
</a></li>
            </ul>
        </div>
        <table class="table-list-style">
            <thead>
            <tr>
                <th width="60"><input type="checkbox" class="checkall" id="del"></th>
                <th width="10"></th>
                <th class="tl" width="200">
                <?php if ($_GET['s'] == 'admin_message_list_delbox'): ?>
                	<?php echo $this->_tpl_vars['lang']['from_to']; ?>

                <?php else: ?>
                    <?php if ($_GET['s'] == 'admin_message_list_outbox'): ?>
                    	<?php echo $this->_tpl_vars['lang']['receiv']; ?>

                    <?php else: ?>
                    	<?php echo $this->_tpl_vars['lang']['from']; ?>

                    <?php endif; ?>
                <?php endif; ?>
                </th>
                <th class="tl">主题</th>
                <th width="120">时间</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['re']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
            <tr>
            	<td><input type="checkbox" value="<?php echo $this->_tpl_vars['list']['id']; ?>
" class="checkitem" name="chk[]"></td>
                <td></td>
                <td class="tl">
                <?php if (! $this->_tpl_vars['list']['iflook']): ?>
                	<img src="image/default/unred.gif" width="16" height="14" />
                <?php elseif ($this->_tpl_vars['list']['iflook'] == 3): ?>
                	<img src="image/default/replied.gif" width="16" height="14" />
                <?php elseif ($this->_tpl_vars['list']['iflook'] == 1 || $this->_tpl_vars['list']['iflook'] == 2): ?>
                	<img src="image/default/read.gif" width="16" height="14" />
                <?php endif; ?>
                <?php if ($this->_tpl_vars['list']['fromuserid'] || $this->_tpl_vars['list']['msgtype'] == '3'): ?>
                    <?php if ($this->_tpl_vars['list']['msgtype'] == '3'): ?>
                    	<?php echo $this->_tpl_vars['lang']['system_msg']; ?>

                    <?php else: ?>
                    	<?php echo $this->_tpl_vars['list']['fromname']; ?>

                    <?php endif; ?>
                <?php else: ?>
                    <?php echo $this->_tpl_vars['lang']['tourists']; ?>

                <?php endif; ?>
                </td>
                <td class="tl"><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/main.php?m=message&s=admin_message_det&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['sub']; ?>
</a></td>
                <td><?php echo $this->_tpl_vars['list']['date']; ?>
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
                <td class="tc"><input type="checkbox" class="checkall" id="del"></td>
                <td colspan="20">
                <label for="del" class="btn2">全选</label>
                <a id="btn" confirm="您确定要删除吗?" name="did" class="btn2" href="javascript:void(0);">删除</a>
                <div class="pagination"><?php echo $this->_tpl_vars['re']['page']; ?>
</div>
                </td>
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