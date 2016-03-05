<?php /* Smarty version 2.6.20, created on 2015-11-02 15:43:58
         compiled from order.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'order.htm', 158, false),array('modifier', 'date_format', 'order.htm', 161, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>订单管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../script/jquery-1.4.4.min.js"></script>
</head>
<body>
<div class="container">
    <div class="flow">
        <div class="itemtitle">
            <h3>订单管理</h3>
            <ul>
                <li <?php if ($_GET['status'] == ''): ?>class="current"<?php endif; ?>><a href="?m=<?php echo $_GET['m']; ?>
&s=<?php echo $_GET['s']; ?>
"><span>管理</span></a></li>
                <?php $_from = $this->_tpl_vars['order_shop_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
                <li <?php if ($_GET['status'] == $this->_tpl_vars['num']+1): ?>class="current"<?php endif; ?>><a href="?m=<?php echo $_GET['m']; ?>
&s=<?php echo $_GET['s']; ?>
&status=<?php echo $this->_tpl_vars['num']+1; ?>
"><span><?php echo $this->_tpl_vars['list']; ?>
</span></a></li>
              	<?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
    <div class="h35"></div>
    <table class="select_table">
        <tr>    
            <td>
            	<div class="select_box">
                <form action="" method="get">
                    <input type="hidden" name="m" value="<?php echo $_GET['m']; ?>
">
                    <input type="hidden" name="s" value="order.php">
                    <input placeholder="请输入订单编号..." type="text" name="code" class="txt w250" value="<?php echo $_GET['code']; ?>
" />
                    <input type="submit" value="搜索" />
                </form>
                </div>
                <div class="search">
                	<a class="a-search" href="#">高级搜索</a>
                	<div class="div-search">
                        <div class="close"></div>
                        <div class="line"></div>
                        <div class="search-con clearfix">
                        <form action="" method="get">
                        <input type="hidden" name="m" value="<?php echo $_GET['m']; ?>
">
                        <input type="hidden" name="s" value="order.php">
                        <dl>
                            <dt>订单编号</dt>
                            <dd><input type="text" class="w250" name="code" value="<?php echo $_GET['code']; ?>
" /></dd>
                        </dl>
                        <dl>
                            <dt>支付状态</dt>
                            <dd>
                            <select name="order_pay_status" class="w250">
                            <option value="">请选择</option>
                            <?php $_from = $this->_tpl_vars['order_pay_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
                            <option <?php if ($_GET['order_pay_status'] == $this->_tpl_vars['key']+1): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['key']+1; ?>
"><?php echo $this->_tpl_vars['list']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>支付方式</dt>
                            <dd>
                            <select name="pay" class="w250">
                            <option value="">请选择</option>
                            <?php $_from = $this->_tpl_vars['pay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
                            <option <?php if ($_GET['pay'] == $this->_tpl_vars['list']['payment_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['list']['payment_id']; ?>
"><?php echo $this->_tpl_vars['list']['payment_name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            </dd>
                        </dl>  
                        <dl>
                            <dt>配送状态</dt>
                            <dd>
                            <select name="order_ship_status" class="w250">
                            <option value="">请选择</option>
                            <?php $_from = $this->_tpl_vars['order_ship_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
                            <option <?php if ($_GET['order_ship_status'] == $this->_tpl_vars['key']+1): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['key']+1; ?>
"><?php echo $this->_tpl_vars['list']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>配送方式</dt>
                            <dd>
                            <select name="ship" class="w250">
                            <option value="">请选择</option>
                            <?php $_from = $this->_tpl_vars['ship']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
                            <option <?php if ($_GET['ship'] == $this->_tpl_vars['list']['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['title']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>订单总额</dt>
                            <dd>
                            <input type="text" class="w118" name="minp" value="<?php echo $_GET['minp']; ?>
" />
                            -
							<input type="text" class="w118" name="maxp" value="<?php echo $_GET['maxp']; ?>
" />
                            </dd>
                        </dl>
                        <dl>
                            <dt>会员名</dt>
                            <dd><input type="text" class="w250" name="user" value="<?php echo $_GET['user']; ?>
" /></dd>
                        </dl>
                        <dl>
                            <dt>收货人</dt>
                            <dd><input type="text" class="w250" name="ship_name" value="<?php echo $_GET['ship_name']; ?>
" /></dd>
                        </dl>
                        <dl>
                            <dt>收货地址</dt>
                            <dd><input type="text" class="w250" name="ship_addr" value="<?php echo $_GET['ship_addr']; ?>
" /></dd>
                        </dl>
                    	<input type="submit" value="搜索" />
                        </form>
                        </div>
                    </div>
                </div>
                <a class="refresh" href="?m=<?php echo $_GET['m']; ?>
&s=<?php echo $_GET['s']; ?>
&status=<?php echo $_GET['status']; ?>
"></a>
           </td>
        </tr>
    </table>
    <table class="table product">
       <tbody>
       <tr class="header">
            <th width="30">查看</th>
            <th width="60">操作</th>
            <th class="al">订单编号</th>
            <th width="150">订单总额</th>
            <th width="100">买家名称</th>
            <th width="100">收货人</th>
            <th width="80">下单时间</th>
            <th width="100">订单状态</th>
            <th width="80">支付状态</th>
            <th width="80">配送状态</th>
            <th width="80">配送方式</th>
            <th width="80">支付方式</th>
        </tr>
        <?php $_from = $this->_tpl_vars['de']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
        <tr class="<?php if ($this->_tpl_vars['list']['status'] == 1): ?>bold<?php endif; ?>">
            <td><a href="?m=product&s=order_detail.php&oid=<?php echo $this->_tpl_vars['list']['order_id']; ?>
"><?php echo $this->_tpl_vars['lookimg']; ?>
</a></td>
            <td>
            <?php if ($this->_tpl_vars['list']['status'] != 0 && $this->_tpl_vars['list']['status'] != 4): ?>
            <div class="operate">
                <a class="opear" href="#">操作<i></i></a>
                <ul>
<?php if ($this->_tpl_vars['list']['status'] == 1 && $this->_tpl_vars['list']['pay_status'] == 1): ?><li><a class="a-opear" data-type="edit" data-param="{'id':'<?php echo $this->_tpl_vars['list']['order_id']; ?>
'}" href="#">编辑</a></li><?php endif; ?>
<?php if ($this->_tpl_vars['list']['status'] == 1 && $this->_tpl_vars['list']['pay_status'] == 1): ?><li><a class="a-opear" data-type="pay" data-param="{'id':'<?php echo $this->_tpl_vars['list']['order_id']; ?>
'}" href="#">付款</a></li><?php endif; ?>
<?php if ($this->_tpl_vars['list']['status'] == 2 && $this->_tpl_vars['list']['pay_status'] == 2): ?><li><a class="a-opear" data-type="ship" data-param="{'id':'<?php echo $this->_tpl_vars['list']['order_id']; ?>
'}" href="#">发货</a></li><?php endif; ?>
<?php if ($this->_tpl_vars['list']['status'] == 3 && $this->_tpl_vars['list']['pay_status'] == 2 && $this->_tpl_vars['list']['ship_status'] == 2): ?><li><a href="module.php?m=product&s=order.php&orderid=<?php echo $this->_tpl_vars['list']['order_id']; ?>
">完成</a></li><?php endif; ?>
<li><a class="a-opear" data-type="cancel" data-param="{'id':'<?php echo $this->_tpl_vars['list']['order_id']; ?>
'}" href="#">取消</a></li>
                </ul>
            </div>
            <?php elseif ($this->_tpl_vars['list']['status'] == 4): ?>
            已完成
            <?php else: ?>
            已取消
            <?php endif; ?>
            </td>
            <td class="al"><?php echo $this->_tpl_vars['list']['order_id']; ?>
</td>
            <td><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['sum'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['user']; ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['ship_name']; ?>
</td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d<br>%H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d<br>%H:%M:%S")); ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['statu_text']; ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['order_pay_status']; ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['order_ship_status']; ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['shipping_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['list']['payment_name']; ?>
</td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td class="norecord" colspan="99"><i></i><span>暂无符合条件的数据记录</span></td>
        </tr>
        <?php endif; unset($_from); ?>
		</tbody>
        <tfoot>
            <tr>
                <td colspan="99">
                	<div class="fl">每页最多显示： 20条</div>
                    <div class="page"><?php echo $this->_tpl_vars['de']['page']; ?>
</div>
                    <div class="fr">共有<?php echo $this->_tpl_vars['de']['count']; ?>
条记录</div>
                </td>
            </tr>
        </tfoot>
    </table>
<script>
$(".a-opear").live('click',function(){
	
	var data = $(this).attr('data-param');
	eval("data = "+data);
	var type = $(this).attr('data-type');
	if(!data.id)
	{
		error('error','对不起，请选择订单后操作！');
		return false;
	}
	window.parent.ajax_form("order", "操作订单", '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/admin/module.php?m=product&s=order_opear.php&type='+type+'&orderid='+data.id, 800);
	return false;
	
});
$('.operate').hover(function(){					 
	if ($(this).position().top + $(this).children("ul").height() + $(this).parent("td").height() - $(window).height()- $(window).scrollTop()  < 0) {
		$(this).addClass("hover");
		$(this).children("ul").css("top", "22px");
	} else {
		$(this).addClass("hover-up");
		$(this).children("ul").css("top", -$(this).children("ul").height());
	}
},function(){
	$(this).removeClass("hover").removeClass("hover-up");	
});
$('.search').bind("mouseenter", function (e) {
	$(this).addClass("hover");
}).bind("mouseleave", function (e) {
	//$(this).removeClass("hover");
});
$('.close').bind("click", function (e) {
	$(this).parent().parent().removeClass("hover");
}) 
</script>    
</div>
</body>
</html>