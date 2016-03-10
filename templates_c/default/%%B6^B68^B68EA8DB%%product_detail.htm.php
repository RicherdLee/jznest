<?php /* Smarty version 2.6.20, created on 2016-03-05 10:00:27
         compiled from product_detail.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getName', 'product_detail.htm', 72, false),array('modifier', 'count', 'product_detail.htm', 224, false),array('modifier', 'date_format', 'product_detail.htm', 339, false),array('modifier', 'replace', 'product_detail.htm', 672, false),array('insert', 'label', 'product_detail.htm', 182, false),)), $this); ?>
<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/product/templates/pro.css">
<!--[if IE 6]>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/ie6PNG.js" type="text/javascript"></script>
<script type="text/javascript">DD_belatedPNG.fix('*');</script>
<![endif]-->
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery.imagezoom.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery.code.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery.qrcode.min.js" type="text/javascript"></script>
<script type="text/javascript">
function collect_goods(){
	
	var url = '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/sns/ajax_update.php';
	var uname='<?php echo $_COOKIE['USER']; ?>
';
	if(uname=='')
	{
		alert('<?php echo $this->_tpl_vars['lang']['no_logo']; ?>
');
		window.location.href='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/login.php?forward='+encodeURIComponent("index.php/?m=product&s=detail&id=<?php echo $_GET['id']; ?>
");
		return false;
	}
	id=$('#sid').val();
	if(id!=0)
	{
		var pars = 'pid='+id+'&uname='+uname;
		$.post(url, pars,showResponse);
	}
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
function buy()
{
	var B = false;
	$('ul[data_type="property"]').each(function(){

		if(!$(this).find('a').hasClass('checked')){
	        B = true;
		}
	});

	if (goodsspec.getSpec() == null || B)
    {
        alert('请选择相关规格');
        return !B;
    }
	else
	{
		return !B;	
	}
}
</script>
<style>
html,body{height:100%}html,body,form,input,span,p,img,ul,ol,li,dl,dt,dd{margin:0;padding:0;border:0}
ul,ol{list-style:none}
#QR-wap{z-index:2;width:50px;height:50px;right:10px;position: relative;cursor:pointer;_position:absolute;_bottom:auto;_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)))}
#QR-wap{top:360px;_margin-top:360px}
#QR-wap a{background:url(image/phpqrcode.jpg) 0 -0px;right:0;float:left;width:50px;height:50px;text-indent:-9999px}
#QR-wap a:hover{background:url(image/phpqrcode.jpg) -50px -0px}
.QR-wap,.moquu_wshare{position:relative;z-index:2}
.QR-wap a:hover .QR-waph,.moquu_wshare a:hover .moquu_wshareh{display:block}
.QR-wap{position:absolute;display:none;left:-280px;top:-200px;width:275px;height:355px;background:url(image/phpqrcode.jpg) -1px -482px no-repeat}
</style>
<div class="w">
    <div class="detailnav">
        <?php $_from = $this->_tpl_vars['catname']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
        <?php if ($this->_tpl_vars['key'] == 0): ?>
        <strong><a href="?m=product&s=list&id=<?php echo $this->_tpl_vars['list']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'])) ? $this->_run_mod_handler('getName', true, $_tmp) : getName($_tmp)); ?>
</a></strong><span>
        <?php else: ?>
        <a href="index.php">首页</a> > <a href="?m=product&s=list&id=<?php echo $this->_tpl_vars['list']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'])) ? $this->_run_mod_handler('getName', true, $_tmp) : getName($_tmp)); ?>
</a>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['de']['brand']): ?>
        <a href="index.php">首页</a> > <a href="?m=product&s=list&brand=<?php echo $this->_tpl_vars['de']['brand']; ?>
"><?php echo $this->_tpl_vars['de']['brand']; ?>
</a>
        <?php endif; ?>
         > <a href="?m=product&s=detail&id=<?php echo $this->_tpl_vars['de']['id']; ?>
"><?php echo $this->_tpl_vars['de']['ftitle']; ?>
</a>
        </span>
    </div>
</div>
<div class="w">
	<div class="product_intro">
       	<div class="product_name">
        	<h1 title="<?php echo $this->_tpl_vars['de']['pname']; ?>
"><?php echo $this->_tpl_vars['de']['pname']; ?>
</h1>
            <?php if ($this->_tpl_vars['de']['promotion_tips']): ?><strong title="<?php echo $this->_tpl_vars['de']['promotion_tips']; ?>
"><?php echo $this->_tpl_vars['de']['promotion_tips']; ?>
</strong><?php endif; ?>
        </div>
        <ul class="product_info clearfix">
        	<?php if ($this->_tpl_vars['de']['market_price'] != '0.00'): ?>
            <li><div class="dt">参 考 价:</div><div class="dd"><s><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['de']['market_price']; ?>
</s></div></li>
            <?php endif; ?>
            <li><div class="dt">销 售 价:</div><div class="dd"><strong class="p-price"><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['de']['price']; ?>
</strong></div></li>
            <li>
            <div class="dt">产品评分:</div>
            <div class="dd star"><span class="star" style="width:<?php echo $this->_tpl_vars['de']['good']; ?>
% "></span></div>
            <div class="count">(已有<?php echo $this->_tpl_vars['de']['count']; ?>
人评价)</div>
            </li>
            <li><div class="dt">配 送 至:</div><div class="dd"><span><?php echo $this->_tpl_vars['de']['user_ip']; ?>
</span></div></li>
            <li><div class="dt">服　　务:</div><div class="dd"><span>由 <?php if ($this->_tpl_vars['de']['shop_name']): ?><?php echo $this->_tpl_vars['de']['shop_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['company']; ?>
<?php endif; ?> 发货并提供售后服务。</span></div></li>
            <?php if ($this->_tpl_vars['de']['product_gives']): ?>
			<li>
                <div class="dt">赠　　品:</div>
                <div class="dd">
               	<?php $_from = $this->_tpl_vars['de']['product_gives']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
                    <div class="li-img<?php if ($this->_tpl_vars['key'] == 0): ?> mt0<?php endif; ?> "><img width="25" height="25" src="<?php echo $this->_tpl_vars['list']['pic']; ?>
_60X60.jpg"><?php echo $this->_tpl_vars['list']['pname']; ?>
<em> × 1</em></div>
                <?php endforeach; endif; unset($_from); ?>
                </div>
            </li>
            <?php endif; ?>
        </ul>
        
        <?php if ($this->_tpl_vars['de']['porperty']): ?>
        <div class="select_style clearfix">
            <?php $_from = $this->_tpl_vars['de']['extfiled']['d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                <?php echo $this->_tpl_vars['list']; ?>

            <?php endforeach; endif; unset($_from); ?>
        <?php if (! $this->_tpl_vars['de']['service']): ?></div><?php endif; ?>
        <?php endif; ?>
        
        <?php if ($this->_tpl_vars['de']['service']): ?>  
        <?php if (! $this->_tpl_vars['de']['porperty']): ?><div class="select_style clearfix"><?php endif; ?>
        <dl id="service"><dt>服务:</dt>
        <dd>
            <ul>
                <?php $_from = $this->_tpl_vars['de']['service']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                <li title="<?php echo $this->_tpl_vars['list']['name']; ?>
"><a data-param="{'service_id':'<?php echo $this->_tpl_vars['list']['id']; ?>
'}" onclick="selectSpec('0',this,'0',false);"><?php echo $this->_tpl_vars['list']['name']; ?>
<i></i></a></li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </dd>
        </dl>
        </div>
        <?php endif; ?>
        
        <form onsubmit="return buy()" action="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart" method="post">
        <div class="choose_amount clearfix">
        	<div class="dt">购买数量:</div>
            <div class="dd">
                <a id="low_num" class="low_num" href="javascript:;">-</a>
                <input onkeyup="check_nums();" maxlength="3" name="nums" class="nums" id="nums" type="text" value="1" />
                <a id="add_num" class="add_num" href="javascript:;">+</a>
                &nbsp;(<?php echo $this->_tpl_vars['lang']['stock']; ?>
<span id="stock"><?php echo $this->_tpl_vars['de']['amount']; ?>
</span><?php echo $this->_tpl_vars['lang']['item']; ?>
)
            </div>
        </div>
        <?php if ($this->_tpl_vars['de']['porperty']): ?><div class="choose_result"></div><?php endif; ?>
        <div class="choose_button clearfix">
        <input name="service" id="hidden_service" type="hidden" value="0," />
        <input name="id" id="sid" type="hidden" value="<?php echo $this->_tpl_vars['de']['id']; ?>
" />
        <input type="image" id="addcart_submit" class="buy" style="margin:7px 10px 0 10px;" src="image/buy.png" />
		<input type="image" id="addcart_submit" class="buy" src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/buy.png" />
        <a href="javascript:collect_goods();">收藏</a>
        </div>
        </form>
        
        	<div id="jqzoom" class="spec_list">         
                <ul>
                <?php $_from = $this->_tpl_vars['de']['pic_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['pic']):
?>
                    <li class="fore<?php echo $this->_tpl_vars['num']+1; ?>
<?php if ($this->_tpl_vars['num'] == 0): ?> ml0<?php endif; ?>" >
                    <img <?php if ($this->_tpl_vars['num'] == 0): ?>class="img-hover"<?php endif; ?> src="<?php echo $this->_tpl_vars['pic']; ?>
_60X60.jpg" big="<?php echo $this->_tpl_vars['pic']; ?>
" width="50">
                    </li>
                <?php endforeach; endif; unset($_from); ?>
                </ul>
			</div>        
        <div id="preview">
            <div id="imgmove">
                <?php if ($this->_tpl_vars['de']['pic']): ?>
                <?php $this->assign('img', $this->_tpl_vars['de']['pic']); ?>
                <?php else: ?>
                <?php $this->assign('img', 'image/default/nopic.gif'); ?>
                <?php endif; ?>
            	<img alt="<?php echo $this->_tpl_vars['de']['pname']; ?>
" width="640px" height="640px" src="<?php echo $this->_tpl_vars['img']; ?>
" title="<?php echo $this->_tpl_vars['de']['pname']; ?>
" onclick="javascript:window.open(this.src);">
            </div>
        </div>
    </div>
</div>
<?php if ($this->_tpl_vars['de']['product_related']): ?>
    <!--div class="w">
    	<div class="related">
        	<div class="mt"><h2>其它类似商品</h2></div>
            <div class="mc clearfix">
    		<ul><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product', 'setmeal' => 1, 'product_id' => $this->_tpl_vars['de']['product_related'], 'orderby' => 'rand', 'temp' => 'product_list_same', 'limit' => 5)), $this); ?>
</ul>
    		</div>
        </div>
    </div-->
<?php endif; ?>

<div class="w">
    <div class="clearfix">
    	<div class="product_detail">
        	<?php if ($this->_tpl_vars['de']['product_partss']): ?>
            <div class="match clearfix">
                <div class="product_detaila_title">
                    <div class="mt">
                        <ul id="reco">
                            <li class="current"><a href="javascript:;">同类商品</a></li>
                            <li tabindex="0"><a href="javascript:;">推荐搭配</a></li>
                        </ul>
                    </div>
                </div>
       <div id="content">
       <ul style="display:block;">
   <div class="i-ms clearfix">
<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product', 'setmeal' => 1, 'product_id' => $this->_tpl_vars['de']['product_related'], 'orderby' => 'rand', 'temp' => 'product_list_same', 'limit' => 5)), $this); ?>

   </div>
          </ul>  
          <ul>        
                <form id="forms" method="post" action="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=shop_cart">
                <input type="hidden" name="act" value="match" />
                <input name="nums" type="hidden" value="1" />
                <input name="id" id="sid1" type="hidden" value="<?php echo $this->_tpl_vars['de']['id']; ?>
" />
        		<input name="service" id="service1" type="hidden" value="0," />
                 <div class="i-mc clearfix">
                 	<div class="clearfix">
                        <div class="master">
                            <s></s>
                        	<div class="i-master">
                                <div class="p-img"><img width="130" height="130" src="<?php echo $this->_tpl_vars['de']['pic']; ?>
" /></div>
                                <div class="p-name"><?php echo $this->_tpl_vars['de']['pname']; ?>
</div>    
                                <div class="p-price"><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['de']['price']; ?>
</div>
							</div>			                            
                        </div>
                        <div class="suits">
                        <?php $this->assign('count', count($this->_tpl_vars['de']['product_partss'])); ?>
                        <div style="width:<?php echo $this->_tpl_vars['count']*145; ?>
px">
                            <?php $_from = $this->_tpl_vars['de']['product_partss']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                                <li>
                                    <div class="p-img"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><img width="130" height="130" src="<?php echo $this->_tpl_vars['list']['pic']; ?>
" /></a></div>
                                    <div class="p-name"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['pname']; ?>
</a></div>    
                                    <div class="p-price">
                                    <input onclick="sum('<?php echo $this->_tpl_vars['list']['id']; ?>
')" class="fl chk" type="checkbox" value="<?php echo $this->_tpl_vars['list']['id']; ?>
" id="chk_<?php echo $this->_tpl_vars['list']['id']; ?>
" name="chk[<?php echo $this->_tpl_vars['list']['id']; ?>
]" />
                                    <label for="chk_<?php echo $this->_tpl_vars['list']['id']; ?>
" class="fl"><?php echo $this->_tpl_vars['config']['money']; ?>
<span id="price_<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['price']; ?>
</span></label>
                                    </div>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                        </div>
                    </div>
                    <div class="sum clearfix">
                        <div class="fr">
                            <div class="btns"><a class="btn-buy">立刻购买</a></div>
                            <span class="price"><?php echo $this->_tpl_vars['config']['money']; ?>
<em id="prices"><?php echo $this->_tpl_vars['de']['price']; ?>
</em></span>
                            <span>套餐价：</span>
                        </div>
                    </div>                  
     </div>
    </form>
   </ul>
  </div>
 </div>  
 <script>
  function sum(id)
      {
                flag=buy();
                if(flag)
                {
                    checked=$("#chk_" + id).attr("checked");
                    aa=$("#price_"+id).html();
                    bb=$("#prices").html();
                    bb=bb.replace(",",""); 
                    if(checked==true)
                    {
                        cc=parseInt(aa)+parseInt(bb);
                        $("#prices").html(cc.toFixed(2));
                    }
                    else
                    {
                        cc=parseInt(bb)-parseInt(aa);
                        $("#prices").html(cc.toFixed(2));
                    }
                }
                else
                {
                    checked=$("#chk_" + id).attr("checked","");	
                }
     }
     $('.btn-buy').click(function(){
               $("#forms").submit();
  });
 </script>
 <?php endif; ?>
 <script>
	$(function(){
		window.onload = function()
		{
			var $li = $('#reco li');
			var $ul = $('#content ul');
						
			$li.mouseover(function(){
				var $this = $(this);
				var $t = $this.index();
				$li.removeClass();
				$this.addClass('current');
				$ul.css('display','none');
				$ul.eq($t).css('display','block');
			})
		}
	});
</script>           
    
<div class="clearfix"></div>
     
            <div class="product_detaila_title">
            	<div class="mt">
                	<ul>
                    	<li class="curr"><a onclick="JavaScript:ChangeDiv('0','JKDiv_',3)">商品介绍</a></li>
                        <?php if ($this->_tpl_vars['de']['extfiled']['p']): ?>
                        <li><a onclick="JavaScript:ChangeDiv('1','JKDiv_',3)">规格参数</a></li>
                        <?php endif; ?>
                        <li><a onclick="JavaScript:ChangeDiv('2','JKDiv_',3)">商品评价</a></li>
                    	<li><a onclick="JavaScript:ChangeDiv('3','JKDiv_',3)">售后保障</a></li>
                    </ul>
                   <div id="nav-jdapp" class="nav-jdapp">
                    <div class="inner">
                      <i></i>
                      <div class="dt"><a target="_blank" href="/wap.php">扫描二维码手机购买</a><b></b></div>
                      <div class="dd lh" style="padding-top:60px;"><div id="qrcode">
<script type="text/javascript">              
  jQuery('#qrcode').qrcode({width: 140,height: 140,text:"http://qizhan.hzsoudu.cn/?m=product&s=detail&id=<?php echo $this->_tpl_vars['de']['id']; ?>
"});
</script>
<script type="text/javascript"> 
// Converts canvas to an image
function convertCanvasToImage(canvas) {
	var image = new Image();
	image.src = canvas.toDataURL("image/png");
	return image;
}
</script>
       </div></div>
                    </div>
                   </div>
                </div>
            </div>
            <div id="JKDiv_0" class="product_detaila_content">
            	<ul class="detail_list clearfix">
                	<li><strong>产品名称：</strong><?php echo $this->_tpl_vars['de']['ftitle']; ?>
</li>
    				<li><strong>产品编号：</strong><?php echo $this->_tpl_vars['de']['code']; ?>
</li>
                    <li><strong>品牌：</strong><?php echo $this->_tpl_vars['de']['brand']; ?>
</li>
                    <li><strong>上架时间：</strong><?php echo ((is_array($_tmp=$this->_tpl_vars['de']['uptime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d&nbsp;%H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d&nbsp;%H:%M:%S")); ?>
</li>
                    <?php $_from = $this->_tpl_vars['de']['extfiled']['s']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                    	<?php echo $this->_tpl_vars['list']; ?>

                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            	<div class="detail_content">
                <?php echo $this->_tpl_vars['de']['detail']; ?>
<br />
      </div>
     </div>
     
         <div id="JKDiv_2" class="product_detaila_content hidden">
            <?php if ($this->_tpl_vars['de']['extfiled']['p']): ?>
            <table width="100%" cellpadding="0" cellspacing="1" class="parameter">
                <?php $_from = $this->_tpl_vars['de']['extfiled']['p']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
                    <tr><th colspan="2"><?php echo $this->_tpl_vars['key']; ?>
</th></tr>
                    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                    	<?php echo $this->_tpl_vars['slist']; ?>

                    <?php endforeach; endif; unset($_from); ?>
                <?php endforeach; endif; unset($_from); ?>
            </table>
            <?php endif; ?>
          </div>

    <div id="JKDiv_3" class="product_detaila_content hidden">
     <div class="detail_content"><?php echo $this->_tpl_vars['de']['after_service']; ?>
</div>
    </div>
<script language="JavaScript" type="text/javascript"> 
function ChangeDiv(divId,divName,zDivCount) 
{ 
for(i=0;i<=zDivCount;i++) 
{ 
document.getElementById(divName+i).style.display="none"; 
//将所有的层都隐藏 
} 
document.getElementById(divName+divId).style.display="block"; 
//显示当前层 
} 
</script>     
   </div>

   <div id="Q" style="width:780px; float:right;"> 
    <div class="product_detail mt20">     
            <div class="product_detaila_title">
            	<div class="mt">
                	<ul>
                    	<li class="curr" style="cursor:pointer"><a href="#Q">全部购买咨询</a></li>
                        <?php $_from = $this->_tpl_vars['consultcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                    	<li><a href="javascript:;"><?php echo $this->_tpl_vars['list']['name']; ?>
</a></li>
                        <?php endforeach; endif; unset($_from); ?>
					</ul>
                </div>
            </div>
            <div class="consult_search">
            	<div class="fl">
                	<strong>咨询前请选搜索，方便又快捷：</strong>
                    <form method="get" target="_blank">
                    <input type="hidden" name="m" value="<?php echo $_GET['m']; ?>
">
                    <input type="hidden" name="s" value="consult">
                    <input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>
">
                    <input type="text" name="k" value="">
                    <input type="image" src="image/default/btn_consult_search.png">
                    </form>
                </div>
                <div class="fr">
                <div><strong>温馨提示:</strong>因厂家更改产品包装、产地或者更换随机附件等没有任何提前通知，且每位咨询者购买情况、提问时间等不同，为此以下回复仅对提问者3天内有效，其他网友仅供参考！若由此给您带来不便请多多谅解，谢谢！</div>
                </div>
            </div>
            <div class="product_detaila_content consult">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product_consult', 'product_id' => $this->_tpl_vars['de']['id'], 'limit' => 5, 'temp' => 'consult_list_1')), $this); ?>

				<div class="extra clearfix">
                    <div class="fr"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=consult&pid=<?php echo $_GET['id']; ?>
">浏览所有咨询信息&gt;&gt;</a></div>
					<div class="join">购买之前，如有问题，请<a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=consult&pid=<?php echo $_GET['id']; ?>
">咨询</a></div>
                </div>
            </div>
            
            <?php $_from = $this->_tpl_vars['consultcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                <div class="product_detaila_content<?php if ($this->_tpl_vars['slist']['type'] != 1): ?> consult<?php endif; ?> hidden">
                <?php if ($this->_tpl_vars['slist']['type'] == 1): ?>
                <?php echo $this->_tpl_vars['slist']['con']; ?>

                <?php else: ?>
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product_consult', 'product_id' => $this->_tpl_vars['de']['id'], 'catid' => $this->_tpl_vars['slist']['id'], 'limit' => 5, 'temp' => 'consult_list_1')), $this); ?>

                <div class="extra clearfix">
                    <div class="fr"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=consult&pid=<?php echo $_GET['id']; ?>
">浏览所有咨询信息&gt;&gt;</a></div>
					<div class="join">购买之前，如有问题，请<a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=consult&pid=<?php echo $_GET['id']; ?>
">咨询</a></div>
                </div>
                <?php endif; ?>
                </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    </div>

 <div class="left" style="width: 200px; margin: 20px 20px 0 0; float: left; overflow: hidden;">
        <div class="m">
            <h2>相关分类</h2>
            <ul class="list">
                <?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
                    <li><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=list&catid=<?php echo $this->_tpl_vars['list']['catid']; ?>
"><?php echo $this->_tpl_vars['list']['cat']; ?>
</a></li>
                <?php endforeach; endif; unset($_from); ?>
			</ul>
        </div>
        <!--div class="m">
            <h2>推荐品牌</h2>
            <ul class="list">
                <?php $_from = $this->_tpl_vars['brand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
                    <li><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=list&brand=<?php echo $this->_tpl_vars['list']['name']; ?>
"><?php echo $this->_tpl_vars['list']['name']; ?>
</a></li>
                <?php endforeach; endif; unset($_from); ?>
			</ul>
        </div-->

        <div class="m" id="rank">
        	<h2>热销排行榜</h2>
            <ul class="rankUl clearfix">
            	<li class="cur">同品牌<b></b></li>
            	<li>同分类<b></b></li>
            	<li>同价位<b></b></li>	
            </ul>
            <div class="rankList"  style="display:block">
            	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product', 'brand' => $this->_tpl_vars['de']['brand'], 'catid' => $this->_tpl_vars['catname']['0'], 'limit' => 5, 'temp' => 'product_list_1')), $this); ?>

            </div>
            <div class="rankList">
            	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product', 'catid' => $this->_tpl_vars['catname']['0'], 'limit' => 5, 'temp' => 'product_list_1')), $this); ?>

            </div>
            <div class="rankList">
            	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product', 'price' => $this->_tpl_vars['de']['price'], 'catid' => $this->_tpl_vars['catname']['0'], 'limit' => 5, 'temp' => 'product_list_1')), $this); ?>

            </div>
        </div>
            
            <div class="product_detaila_content" style="display:none; float: right;">
                <div class="mc">
                    <div class="rate clearfix">
                       <span>好评度</span>
                       <strong class="clearfix"><?php echo $this->_tpl_vars['de']['good']; ?>
<em>%</em></strong>
                    </div>
                    <div class="percent">
                        <dl>
                            <dt>好评<span>(<?php echo $this->_tpl_vars['de']['good']; ?>
%)</span></dt>
                            <dd><div style="width:<?php echo $this->_tpl_vars['de']['good']; ?>
%;"></div></dd>
                        </dl>
                        <dl>
                            <dt>中评<span>(<?php echo $this->_tpl_vars['de']['middle']; ?>
%)</span></dt>
                            <dd><div style="width:<?php echo $this->_tpl_vars['de']['middle']; ?>
%;"></div></dd>
                        </dl>
                        <dl>
                            <dt>差评<span>(<?php echo $this->_tpl_vars['de']['bad']; ?>
%)</span></dt>
                            <dd><div style="width:<?php echo $this->_tpl_vars['de']['bad']; ?>
%;"></div></dd>
                        </dl>
                    </div> 
                    <div class="btns">
                        <div>您可对已购商品进行评价</div>
                        <a target="_blank" class="btn-comment" href="main.php?m=product&s=admin_buyorder&status=4">发评价拿积分</a>
                    </div>
                </div>
                <div class="product_detaila_title">
                    <div class="mt">
                        <ul>
                            <li class="curr"><a href="javascript:;">全部评价</a></li>
                            <li><a href="javascript:;">好评</a></li>
                            <li><a href="javascript:;">中评</a></li>
                            <li><a href="javascript:;">差评</a></li>
                        </ul>
                    </div>
                </div>
                <div class="product_detaila_content comment_list">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product_comment', 'product_id' => $this->_tpl_vars['de']['id'], 'limit' => 5, 'temp' => 'comment_list_1')), $this); ?>

                </div>
                <div class="product_detaila_content comment_list hidden">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product_comment', 'product_id' => $this->_tpl_vars['de']['id'], 'catid' => 1, 'limit' => 5, 'temp' => 'comment_list_1')), $this); ?>

                </div>
                <div class="product_detaila_content comment_list hidden">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product_comment', 'product_id' => $this->_tpl_vars['de']['id'], 'catid' => 0, 'limit' => 5, 'temp' => 'comment_list_1')), $this); ?>

                </div>
                <div class="product_detaila_content comment_list hidden">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product_comment', 'product_id' => $this->_tpl_vars['de']['id'], 'catid' => '-1', 'limit' => 5, 'temp' => 'comment_list_1')), $this); ?>

                </div>
            </div>           

        <div class="ad200">
        <script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=13&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script>
        </div>
    </div>
    <div class="clear"></div>    
</div>
</div>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/district_selector.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$(".jqzoom").imagezoom();
	$("#jqzoom li").click(function(){
		$(".jqzoom").attr('src',$(this).find("img").attr("big"));
		$(".jqzoom").attr('rel',$(this).find("img").attr("big"));
	});
}); 
$("#low_num").click(function(){
	var num=$('#nums').val()*1;
	if(num>1)
		$('#nums').val(num-1)
});
$("#add_num").click(function(){
	var num=$('#nums').val()*1;
	if(num<$('#stock').html())
		$('#nums').val(num+1)
});
$(".spec_list li").click(function(){
	var t=$(this).find("img");
	var e=t.attr("src");
	$('#imgmove img').attr("src",e.replace("_60X60.jpg",""));
	$(".spec_list img").removeClass("img-hover");
	t.addClass("img-hover");
});
function check_nums() 
{
	var v=document.getElementById('nums').value*1;
	if(!v)
		document.getElementById('nums').value=1;
	if(v>$('#stock').html()*1)
	{
		document.getElementById('nums').value=$('#stock').html()*1;
		return false;
	}
}
<?php if ($this->_tpl_vars['de']['extfiled']['d'] || $this->_tpl_vars['de']['service']): ?>
/* spec对象 */
function spec(id, spec, price, stock, code)
{
	this.id    = id;
	this.spec  = spec;
}
/* goodsspec对象 */
function goodsspec(specs, specQty, defSpec)
{
	this.specs = specs;
	this.specQty = specQty;
	this.defSpec = defSpec;
	<?php $_from = $this->_tpl_vars['de']['extfiled']['d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
	this.spec<?php echo $this->_tpl_vars['num']+1; ?>
 = null;
	<?php endforeach; endif; unset($_from); ?>
	if (this.specQty >= 1)
	{
		for(var i = 0; i < this.specs.length; i++)
		{
			if (this.specs[i].id == this.defSpec)
			{
					<?php $_from = $this->_tpl_vars['de']['extfiled']['d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
					this.spec<?php echo $this->_tpl_vars['num']+1; ?>
 = this.specs[i].spec[<?php echo $this->_tpl_vars['num']; ?>
];
					<?php endforeach; endif; unset($_from); ?>
					break;
			}
		}
	}

	// 取得选中的spec
	this.getSpec = function()
	{
		for (var i = 0; i < this.specs.length; i++)
		{
				<?php $_from = $this->_tpl_vars['de']['extfiled']['d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
				if (this.specs[i].spec[<?php echo $this->_tpl_vars['num']; ?>
] != this.spec<?php echo $this->_tpl_vars['num']+1; ?>
) continue;
				<?php endforeach; endif; unset($_from); ?>
				return this.specs[i];
		}
		return null;
	}

}
/* 选中某规格 num=1,2 */
function selectSpec(num,obj,SID,flag)
{
	flag = flag ? flag : false;
	if(num==0 && SID==0)
	{
		var value=$('#hidden_service').val();
		var data_str = $(obj).attr('data-param');
		eval("data_str = "+data_str);
		
		if($(obj).hasClass("checked"))
		{
			$(obj).removeClass("checked");
			var pattern = ','+data_str.service_id+',';
			str = value.replace(new RegExp(pattern), ",");
			$('#hidden_service').val(str);
			<?php if ($this->_tpl_vars['de']['product_partss']): ?>
			$('#service1').val(str);
			<?php endif; ?>
		}
		else
		{
			$(obj).addClass("checked");
			$('#hidden_service').val(value+data_str.service_id+',');
			<?php if ($this->_tpl_vars['de']['product_partss']): ?>
			$('#service1').val(value+data_str.service_id+',');
			<?php endif; ?>
		}
	
	}
	else
	{
		goodsspec['spec' + num] = SID;
		$(obj).addClass("checked");
		$(obj).parents('li').siblings().find('a').removeClass("checked");
		var spec = goodsspec.getSpec();
		var sign = 't';
		$('ul[data_type="property"]').each(function(){
			if(!$(this).find('a').hasClass('checked')){
				sign = 'f';
			}
		});
		if (spec != null && sign == 't' && !flag && spec.id!='<?php echo $_GET['id']; ?>
')
		{
			window.location='?m=product&s=detail&id='+spec.id;
		}
		if (spec != null && sign == 't' && flag)
		{
			var stock="<?php if ($this->_tpl_vars['de']['amount']): ?><?php echo $this->_tpl_vars['de']['amount']; ?>
<?php else: ?>0<?php endif; ?>";
			
			if(parseInt(stock) == 0){
				$('[class="choose_result"]').show().html('<div class="dd"><em>所选库存量不足，请选择其它购买。</em></div>');
				$('#addcart_submit').attr('disabled',true).css('cursor','pointer');
			}
			else{
				SP_V = '';
				$('ul[data_type="property"]').find('li > .checked').each(function(i){
					SP_V += '<strong>"'+$(this).text()+'"</strong>，';
				});
				SP_V = SP_V.substr(0,SP_V.length-1);
				$('[class="choose_result"]').show().html('<div class="dd"><em>您选择了：</em>'+SP_V+'</div>');
				$('#addcart_submit').attr('disabled',false).css('cursor','auto');
			}
		}
	}
}
<?php if ($this->_tpl_vars['de']['porperty']): ?>
var specs = new Array();
<?php $_from = $this->_tpl_vars['de']['porperty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
specs.push(new spec(<?php echo $this->_tpl_vars['list']['id']; ?>
, ['<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['property_value_id'])) ? $this->_run_mod_handler('replace', true, $_tmp, ",", "','") : smarty_modifier_replace($_tmp, ",", "','")); ?>
']));
<?php endforeach; endif; unset($_from); ?>
var specQty = <?php echo count($this->_tpl_vars['de']['extfiled']['d']); ?>
;
var defSpec = <?php if ($this->_tpl_vars['de']['porperty']['0']['id']): ?><?php echo $this->_tpl_vars['de']['porperty']['0']['id']; ?>
<?php else: ?>0<?php endif; ?>;
var goodsspec = new goodsspec(specs, specQty, defSpec);
$('ul[data_type="property"]').each(function(){
	if($(this).find('a').hasClass('checked')){
		var data_str = $(this).find('.checked').attr('data_type');
		eval("data_str = "+data_str);
		selectSpec(data_str.num,'',data_str.id,true);
	}
});
<?php endif; ?>
<?php endif; ?>
$(".product_detaila_title li").click(function(){
	
	$(this).addClass("curr").siblings().removeClass("curr");
	var ClassName=$(this).parent().parent().parent().parent().attr('class');
	var index1 = $(this).parent().parent().parent().parent().index();
	var index2 = $(this).index();
	if(ClassName=="product_detaila_content")
	{
		var index0 = $(this).parent().parent().parent().parent().parent().index();
		$(".product_detail").eq(index0).children().eq(index1).children(".product_detaila_content").eq(index2).show().siblings('.product_detaila_content').hide();
	}
	else
	{
		$(".product_detail").eq(index1).children(".product_detaila_content").eq(index2).show().siblings('.product_detaila_content').hide();
	}
});
saleTopTabSwicth("#rank");
function saleTopTabSwicth(a)
{
	$(a+" li").hover(function(){
		var b=$(a+" li").index($(this));
		$(this).addClass("cur").siblings().removeClass("cur");
		$(a+" .rankList").eq(b).show().siblings(".rankList").hide();
	});
}
</script>