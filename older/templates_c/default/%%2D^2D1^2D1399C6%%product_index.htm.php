<?php /* Smarty version 2.6.20, created on 2016-02-17 09:59:46
         compiled from product_index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'label', 'product_index.htm', 186, false),)), $this); ?>
    <div class="banner">
      <div id="Slidebox">
       <div id="banner">
        <div id="banner_list">
<a><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=19&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></a>
<a><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=20&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></a>
<a><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=21&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></a>
<a><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=22&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></a>
<a><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=23&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></a>
<a><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=24&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></a>
		 </div>
        </div>
       </div>      
      </div>
<ul id="flex-control-nav" class="flex-control-nav flex-control-paging">
	    	    <li><a class="on">1</a></li>
                <li><a>2</a></li>
                <li><a>3</a></li>
                <li><a>4</a></li>
                <li><a>5</a></li>
                <li><a>6</a></li>               
</ul>
<script src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/script/jquery.slideshow.js"></script>
<script type="text/javascript">
	var t = n = 0, count;
	jQuery(document).ready(function(){
		count=jQuery("#banner_list a").length;
		jQuery("#banner_list a:not(:first-child)").hide();
		jQuery("#flex-control-nav li a").click(function() {
			var i = jQuery(this).text() - 1;//获取Li元素内的值，即1，2，3，4
			n = i;
			if (i >= count) return;
			jQuery("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
			document.getElementById("banner").style.background="";
			jQuery(this).toggleClass("on");
			jQuery(this).parent().siblings().children().removeAttr("class");
		});

		jQuery("#flex-control-nav li a").mouseenter(function() {
			var i = jQuery(this).text() - 1;//获取Li元素内的值，即1，2，3，4
			n = i;
			if (i >= count) return;
			jQuery("#banner_list a").filter(":visible").fadeOut(100).parent().children().eq(i).fadeIn(100);
			document.getElementById("banner").style.background="";
			jQuery(this).toggleClass("on");
			jQuery(this).parent().siblings().children().removeAttr("class");

		});

		jQuery("#previous").click(function() {
			// 向左
			var j = jQuery("#flex-control-nav .on").text();// 获取当前显示的图像
			jQuery("#flex-control-nav .on").removeAttr("class");
			if(j==1){// 第一张
				jQuery("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(count-1).fadeIn(1000);
				jQuery("#flex-control-nav li").eq(count-1).find("a").toggleClass("on");
			}else{
				jQuery("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(j-2).fadeIn(1000);
				jQuery("#flex-control-nav li").eq(j-2).find("a").toggleClass("on");
			}
		});
		jQuery("#next").click(function() {
			// 向右
			var j = jQuery("#flex-control-nav .on").text();// 获取当前显示的图像
			jQuery("#flex-control-nav .on").removeAttr("class");
			if(j>=count){// 最后一个
				jQuery("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(0).fadeIn(1000);
				jQuery("#flex-control-nav li").eq(0).find("a").toggleClass("on");
			}else{
				jQuery("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(j).fadeIn(1000);
				jQuery("#flex-control-nav li").eq(j).find("a").toggleClass("on");
			}

		});

		t = setInterval("showAuto()", 5000);
		jQuery("#banner_list").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 10000);});
	})

	function showAuto()
	{
		n = n >=(count - 1) ? 0 : ++n;
		jQuery("#flex-control-nav li a").eq(n).trigger('click');
	}
</script>
</div>
<div class="clear"></div>
<div id="cer1100">
  <div id="previous">
  	<a class="dp2013092501">Previous</a>
  </div>
  <div id="next">
    <a class="dp2013092502">Next</a>
  </div>
</div>

<!--slider end-->
<div class="clear"></div>
<div><script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=25&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script></div>

                <?php $_from = $this->_tpl_vars['cList']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['sublist']):
?>
                <dl class="fore<?php echo $this->_tpl_vars['n']+1; ?>
">
                    <dt><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['sublist']['catid']; ?>
"><?php echo $this->_tpl_vars['sublist']['cat']; ?>
</a></dt>
                    <dd>
                    <?php $_from = $this->_tpl_vars['sublist']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                    <em><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['slist']['catid']; ?>
"><?php echo $this->_tpl_vars['slist']['cat']; ?>
</a></em>
                    <?php endforeach; endif; unset($_from); ?>
                    </dd>
                </dl>
                <?php endforeach; endif; unset($_from); ?>

        <?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['cList']):
?>
        <div class="j_SubView hidden">
            <div class="catlist">  
                <?php $_from = $this->_tpl_vars['cList']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['sublist']):
?>
                <dl class="fore<?php echo $this->_tpl_vars['n']+1; ?>
">
                    <dt><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['sublist']['catid']; ?>
"><?php echo $this->_tpl_vars['sublist']['cat']; ?>
</a></dt>
                    <dd>
                    <?php $_from = $this->_tpl_vars['sublist']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                    <em><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['slist']['catid']; ?>
"><?php echo $this->_tpl_vars['slist']['cat']; ?>
</a></em>
                    <?php endforeach; endif; unset($_from); ?>
                    </dd>
                </dl>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <div class="barnd">
                <h4>推荐品牌</h4>
                <ul>
				<?php $_from = $this->_tpl_vars['cList']['brand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['slist']):
?>
                	<li <?php if (( $this->_tpl_vars['key']+1 ) % 2 == 0): ?>class="fr"<?php endif; ?> ><img width="90" height="40" src="<?php echo $this->_tpl_vars['slist']['logo']; ?>
"></li>
                <?php endforeach; endif; unset($_from); ?>
				</ul>
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>

<div class="product_cat" style="margin-top:-50px;">
<div class="ltitle">
<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=1002" title="即食燕窝臻品">
<img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/jishiyanwo.jpg" alt="极盏燕农即食燕窝系列" />
</a>
</div>
<script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=2&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script>
</div>
<div class="clear"></div>
<div class="product_cat">
<div class="ltitle">
<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=1001" title="干燕窝专柜">
<img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/ganyanwo.jpg" alt="极盏燕农干燕窝系列" />
</a>
</div>
<script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=3&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script>
</div>
<div class="clear"></div>
<div class="product_cat">
<div class="ltitle">
<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=1000" title="礼盒装系列">
<img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/lihezhuang.jpg" alt="极盏燕农礼盒装系列" />
</a>
</div>
<script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=17&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script>
</div>
<div class="clear"></div>
<div class="product_cat">
<div class="ltitle">
<a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=1003" title="礼品卡优惠">
<img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/lipinka.jpg" alt="极盏燕农礼品卡系列" />
</a>
</div>
<script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=18&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script>
</div>
<div class="clear"></div>

<div class="case">
<div class="cat-l">What They Say?</div>
<div class="cat-r">赞美生命 感受幸福</div>

<div id="lupus_left">
	<div id="lupus_right">
		<div id="lupus_center">	
			<div id="lupus_content">
				<div id="box_text">
					<div id="box_text_left_h1">
						<div id="slideshow">
						  <div id="slidesContainer">
<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'news', 'catid' => $this->_tpl_vars['news']['get']['clssid'], 'temp' => 'news_list_case', 'limit' => 15)), $this); ?>
                          
							</div>						 
						</div>
					</div>
					
					<div id="box_text_right"></div>
				</div>				
			</div>
		</div>
<div class="small-l">极盏燕农<span> - Company Name</span></div>
</div>
<script type="text/javascript">
  $().ready(function() {
  $('#slideshow').slide({autoplay: false, duration: 5000, showSlideNumber: true});
  });
</script>
</div>
</div>

<div class="clear"></div>
<div class="guestbook">
<div class="cat-l">Contact</div>
<div class="dialog">
<span>如果您有问题咨询，请正确、完整的填写以下的留言内容联系我们，我们会在第一时间内回复您的相关留言信息。</span>
<div class="dialog-box">
  <form method="post" action="/module/guestbook/admin/data.php?method=add" name="addform" onsubmit=javascript:{return(addform());} id="commentform">
 <dl>
  <dt><input maxlength="50" type="text" name="user" size="65"  value="姓名" onClick="OnEnter(this)" onBlur="if (value=='') {value='姓名'}" onFocus="if (this.value=='姓名') this.value='';" class="ipt-txt"/></dt>
  <dt><input maxlength="80" type="text" name="email" size="65" value="E-mail地址" onClick="OnEnter(this)" onBlur="if (value=='') {value='E-mail地址'}" onFocus="if (this.value=='E-mail地址') this.value='';" class="ipt-txt"/></dt>
  <dt><input maxlength="140" type="text" name="qq" size="65" value="手机号码" onClick="OnEnter(this)" onBlur="if (value=='') {value='手机号码'}" onFocus="if (this.value=='手机号码') this.value='';" class="ipt-txt" /></dt>
 </dl>
 <div class="text"><textarea name="text" cols="85" rows="10" placeholder="咨询/意见" class="textarea"></textarea></div>
 <div class="Submit"><input type="Submit" name="Submit" value=""  class="btn" onClick="return Check_add(addform);"/></div>
  </form>
</div>
</div>
</div>
<div class="clear"></div>
<div class="help-container">
<ul class="help-ul clearfix">
        <li class="sprite-bg1">
	  <div class="help-border">
	  <p><a href="" target="_blank" rel="nofollow"><strong>购物指南</strong></a></p>
	  	  <p><a href="" target="_blank" rel="nofollow">购物流程</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">常见问题</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">会员中心</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">用户协议</a></p>
            </div>
    </li>
        <li class="sprite-bg2">
	  <div class="help-border">
	  <p><a href="" target="_blank" rel="nofollow"><strong>配送方式</strong></a></p>
	  	  <p><a href="" target="_blank" rel="nofollow">配送时效</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">免运费政策</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">验货与签收</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">拒收说明</a></p>
            </div>
    </li>
        <li class="sprite-bg3">
	  <div class="help-border">
	  <p><a href="" target="_blank" rel="nofollow"><strong>支付方式</strong></a></p>
	  	  <p><a href="" target="_blank" rel="nofollow">货到付款</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">在线支付</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">支付流程</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">礼品卡使用</a></p>
            </div>
    </li>
        <li class="sprite-bg4">
	  <div class="help-border">
	  <p><a href="" target="_blank" rel="nofollow"><strong>售后服务</strong></a></p>
	  	  <p><a href="" target="_blank" rel="nofollow">退款方式及周期</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">退货周期</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">退换货政策</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">退换货运费规则</a></p>
            </div>
    </li>
        <li class="sprite-bg5">
	  <div class="help-border">
	  <p><a href="" target="_blank" rel="nofollow"><strong>特色服务</strong></a></p>
	  	  <p><a href="" target="_blank" rel="nofollow">积分说明</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">会员制度</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">优惠券使用</a></p>
      	  <p><a href="" target="_blank" rel="nofollow">30天价保</a></p>
            </div>
    </li>
    </ul>
   </div>
</div>