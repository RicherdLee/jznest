<?php /* Smarty version 2.6.20, created on 2016-03-04 19:48:55
         compiled from admin_friends.htm */ ?>
<div class="path">
    <div>
    	<a href="main.php?cg_u_type=1">我的商城</a> <span>&gt;</span> 
        好友
    </div>
</div>
<script>
$(function(){
	//加关注
	$("[data_type='followbtn']").live('click',function(){
		
		var url = '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/sns/ajax_update.php';
		var uname='<?php echo $_COOKIE['USER']; ?>
';
		var data_str = $(this).attr('data-param');
        eval( "data_str = "+data_str);
		var pars = 'mid='+data_str.mid+'&uname='+uname+'&op=add';
		$.post(url, pars,showResponse);
		function showResponse(originalRequest)
		{
			if(originalRequest>1)
				$('#gz_statu').html('成功添加');
			else if (originalRequest>0)
				$('#gz_statu').html('已添加');
			else
				alert('参数传递错误，无法完成操作');
		}
	});
	//取消关注
	$("[data_type='cancelbtn']").live('click',function(){
		
		var url = '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/sns/ajax_update.php';
		var uname='<?php echo $_COOKIE['USER']; ?>
';
		var data_str = $(this).attr('data-param');
        eval( "data_str = "+data_str);
		var pars = 'fid='+data_str.fid+'&op=del';
		$.post(url, pars,showResponse);
		function showResponse(originalRequest)
		{
			if(originalRequest>1)
				document.location.reload();
			else
				alert('参数传递错误，无法完成操作');
		}
	});
});
</script>
<div class="main">
	<div class="wrap">
        <div class="hd">
            <ul class="tabs">
                <li class="<?php if ($_GET['type']): ?>normal<?php else: ?>active<?php endif; ?>"><a href="main.php?m=sns&s=admin_friends">我关注的</a></li>
                <li class="<?php if ($_GET['type'] == fan): ?>active<?php else: ?>normal<?php endif; ?>"><a href="main.php?m=sns&s=admin_friends&type=fan">关注我的</a></li>
            </ul>
        </div>
        <table class="table-list-style">
            
            <tbody>
            <?php if ($this->_tpl_vars['re']['list']): ?>
            <tr>
                <td style="border-top:none">
                <ul class="friend_list">
                    <?php $_from = $this->_tpl_vars['re']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                    <?php if ($_GET['type'] == fan): ?>
                    	<li>
                        <div class="friend_img"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $this->_tpl_vars['slist']['uid']; ?>
"><img width="100" height="100" src="<?php if ($this->_tpl_vars['slist']['uimg']): ?><?php echo $this->_tpl_vars['slist']['uimg']; ?>
<?php else: ?>image/default/user_admin/default_user_portrait.gif<?php endif; ?>"></a></div>
                        <dl>
                            <dt>
                            <a class="friend_name" target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $this->_tpl_vars['slist']['uid']; ?>
"><?php echo $this->_tpl_vars['slist']['uname']; ?>
</a>
                            <a class="message" target="_blank" href="main.php?m=message&s=admin_message_sed&uid=<?php echo $this->_tpl_vars['slist']['uid']; ?>
">&nbsp;</a>
                            <em class=""></em></dt>
                    
                        <dd class="area"><?php echo $this->_tpl_vars['slist']['area']; ?>
</dd>
                        <dd>
						<span id="gz_statu">
							<?php if ($this->_tpl_vars['slist']['state'] == 2): ?>
								互相关注
							<?php else: ?>
								<a class="btn2" href="javascript:void(0)" data_type="followbtn" data-param="{'mid':'<?php echo $this->_tpl_vars['slist']['uid']; ?>
'}">加关注</a>
							<?php endif; ?>
						</span>
						</dd>
                        </dl>
                        </li>
                    <?php else: ?>
						<li>
                        <div class="friend_img"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $this->_tpl_vars['slist']['fuid']; ?>
"><img width="100" height="100" src="<?php if ($this->_tpl_vars['slist']['fuimg']): ?><?php echo $this->_tpl_vars['slist']['fuimg']; ?>
<?php else: ?>image/default/user_admin/default_user_portrait.gif<?php endif; ?>"></a></div>
                        <dl>
                            <dt>
                            <a class="friend_name" target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/home.php?uid=<?php echo $this->_tpl_vars['slist']['fuid']; ?>
"><?php echo $this->_tpl_vars['slist']['funame']; ?>
</a>
                            <a class="message" target="_blank" href="main.php?m=message&s=admin_message_sed&uid=<?php echo $this->_tpl_vars['slist']['fuid']; ?>
">&nbsp;</a>
                            <em class=""></em></dt>
                        <dd class="area"><?php echo $this->_tpl_vars['slist']['province']; ?>
 <?php echo $this->_tpl_vars['slist']['city']; ?>
</dd>
                        <dd><span class="cancel"><a class="btn2" href="javascript:void(0)" data_type="cancelbtn" data-param="{'fid':'<?php echo $this->_tpl_vars['slist']['id']; ?>
'}">取消关注</a></span></dd>
                        </dl>
                        </li>
					<?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                </td>
            </tr>
            <?php endif; ?>
            <?php if (! $this->_tpl_vars['re']['list']): ?>
            <tr>
            	<td colspan="20" class="norecord ntb">
                	<i></i><span>暂无符合条件的数据记录</span>	
                </td>
            </tr>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <tr>
            	<td><div class="pagination"><?php echo $this->_tpl_vars['re']['page']; ?>
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