<?php /* Smarty version 2.6.20, created on 2016-03-05 10:00:25
         compiled from product.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'product.htm', 117, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../script/jquery-1.4.4.min.js"></script>
</head>
<body>
<div class="container">
    <div class="flow">
        <div class="itemtitle">
            <h3>产品管理</h3>
        </div>
    </div>
    
    <div class="h35"></div>
    <script type="text/javascript">
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
    });
    </script>
    <form action="" method="get">
    <input type="hidden" name="m" value="<?php echo $_GET['m']; ?>
">
    <input type="hidden" name="s" value="product.php">
    <table class="select_table">
        <tbody>
            <tr>
            	<td class="pl0">
				<ul class="button">
                    <li>
                        <a class="a_button" href="?m=product&s=product_launch.php">添加产品</a>
                    </li>
                    <li>
                        <a class="a_button" id="del_button" href="javascript:void();">删除</a>
                    </li>
                    <li>
                        <a class="a_button w60" href="javascript:void();"><span>批量操作</span><em></em></a>
                        <div class="select_btn">
                            <ul>
                                <li class="li"><a id="unify_price" href="javascript:void();">统一调价</a></li>
                                <li class="li"><a id="unify_stock" href="javascript:void();">统一调库存</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                </td>
                <td width="400">
                <div class="select_box fr">
                <input placeholder="请输入产品名称..." type="text" name="name" class="txt w250" value="<?php echo $_GET['name']; ?>
"  />
                <input type="submit" value="搜索" />
                <a class="refresh" href="?m=<?php echo $_GET['m']; ?>
&s=product.php"></a>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
   <!-- <table class="table">
        <tbody>
        <tr>
            <th colspan="99" class="partition">提示</th>
        </tr>
        <tr>
            <td>
                <ul class="tips">
                    <li>通过产品管理，您可以进行编辑产品价格、库存、规格等信息，以及删除产品等操作。</li>
                    <li>请先根据条件搜索产品，然后选择相应的操作。</li>
                </ul>
            </td>
        </tr>
        </tbody>
    </table>-->
    <form action="" method="post" id="form" name="form">
    <input type="hidden" name="act" value="op" />
    <table class="table product">
        <tbody>
            <tr class="header">
                <th width="1"></th>
                <th width="20"><input type="checkbox" class="checkall" id="del"></th>
                <th width="50">操作</th>
                <th colspan="2" class="al">产品名称</th>
                <th width="100">销售价</th>
                <th width="100">市场价</th>
                <th width="100">库存</th>
                <th width="100">重量</th>
                <th width="100">更新时间</th>
            </tr>
            <?php $_from = $this->_tpl_vars['de']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
            <tr>
                <td></td>
                <td><input type="checkbox" value="<?php echo $this->_tpl_vars['list']['id']; ?>
" class="checkitem" name="chk[]"></td>
                <td>
                <a href="?s=product_launch.php&edit=<?php echo $this->_tpl_vars['list']['id']; ?>
&<?php echo $this->_tpl_vars['url']; ?>
"><?php echo $this->_tpl_vars['editimg']; ?>
</a>
                </td>
                <td class="al" width="80" valign="top"><a target="_blank" href="../?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['pid']; ?>
"><img class="img" alt="<?php echo $this->_tpl_vars['list']['pname']; ?>
" src="<?php echo $this->_tpl_vars['list']['pic']; ?>
_60X60.jpg" /></a></td>
                <td class="al">
                <h4><a target="_blank" href="../?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['pid']; ?>
"><?php echo $this->_tpl_vars['list']['pname']; ?>
</a></h4>
                <p>所属分类：<?php echo $this->_tpl_vars['list']['catname']; ?>
</p>
                <p>产品编号：<?php echo $this->_tpl_vars['list']['code']; ?>
</p>
                <p>所属品牌：<?php echo $this->_tpl_vars['list']['brand']; ?>
</p>
                </td>
                <td><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['price']; ?>
</td>
                <td><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['market_price']; ?>
</td>
                <td><?php echo $this->_tpl_vars['list']['amount']; ?>
</td>
                <td><?php echo $this->_tpl_vars['list']['cubage']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['uptime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d<br>%H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d<br>%H:%M:%S")); ?>
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
                <td colspan="99" class="pages">
                <div class="fl">每页最多显示： 20条</div>
                <div class="page"><?php echo $this->_tpl_vars['de']['page']; ?>
</div>
				<div class="fr">共有<?php echo $this->_tpl_vars['de']['count']; ?>
条记录</div>
                </td>
            </tr>
        </tfoot>
    </table>
    </form>
</div>
<script>
$("#del_button").click(function () {
		
	$("#form")[0].submit();
	return false;
});
$("#unify_price").click(function () {
	
	var obj=$("input[class='checkitem']:checked");
	if(!obj.length)
	{
		alert("请选择数据，再进行操作!");
		return false;
	}
	var str='';
	$.each(obj,function(i){
		str+=$(this).val()+',';
	});
	
	window.parent.ajax_form("unify", '调整价格', '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/admin/module.php?m=product&s=product_unify.php&type=price&id='+str, 800);
	return false;
});
$("#unify_stock").click(function () {
		
	var obj=$("input[class='checkitem']:checked");
	if(!obj.length)
	{
		alert("请选择数据，再进行操作!");
		return false;
	}
	var str='';
	$.each(obj,function(i){
		str+=$(this).val()+',';
	});
	
	window.parent.ajax_form("unify", '调整库存', '<?php echo $this->_tpl_vars['config']['weburl']; ?>
/admin/module.php?m=product&s=product_unify.php&type=stock&id='+str, 800);
	return false;
});
</script>    
</body>
</html>