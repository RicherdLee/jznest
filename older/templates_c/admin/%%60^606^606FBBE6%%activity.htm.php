<?php /* Smarty version 2.6.20, created on 2015-11-02 15:44:00
         compiled from activity.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'activity.htm', 86, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>活动</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../script/jquery-1.4.4.min.js"></script>
<script language="javascript" src="../script/Calendar.js"></script>
<script type="text/javascript" src="../script/jquery.validation.min.js"></script>
<script>
$(function(){
	$('#form').validate({
		errorPlacement: function(error, element){
			element.next('.form-error').append(error);
		},      
		rules : {
			title:{
				required:true
			},
			stime:{
				required:true
			},
			etime:{
				required:true
			},
		},
		messages : {
			title:{
				required:'请填写标题',
			},
			etime:{
				required:'请填写开始时间',
			},
			stime:{
				required:'请填写结束时间',
			}
		}
	});
});
</script>
</head>
<body>
<style>
.btny{border: solid 1px;background: none repeat scroll 0 0 #DDDDDD;border-color: #DDDDDD #666666 #666666 #DDDDDD;color: #000000;cursor: pointer;
margin: 3px 0;padding: 2px 5px;vertical-align: middle;}
</style>
	<div class="container">
        <div class="flow">
            <div class="itemtitle">
                <h3>活动</h3>
                <ul>
                    <li <?php if ($_GET['operation'] == ''): ?>class="current"<?php endif; ?>><a href="?m=activity&s=activity.php"><span>管理</span></a></li>
                    <li <?php if ($_GET['operation'] == 'add'): ?>class="current"<?php endif; ?>><a href="?m=activity&s=activity.php&operation=add"><span>添加</span></a></li>
                    <?php if ($_GET['operation'] == 'edit'): ?>
                    <li class="current"><a href="#"><span>修改</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="h35"></div>  
        <?php if ($_GET['operation'] == 'add' || $_GET['operation'] == 'edit'): ?>
            <form name="form" id="form" method="post">
            <input name="id" type="hidden" id="id" value="<?php echo $this->_tpl_vars['de']['id']; ?>
">
            <table class="table">
                <thead>
                    <tr>
                        <th class="partition" colspan="99">活动</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="100">标题</td>
                    <td>
                    <input name="title" id="title" type="text" class="w350" value="<?php echo $this->_tpl_vars['de']['title']; ?>
"><div id="form-error" class="form-error"></div>
                    </td>
                </tr>
                
                <tr>
                    <td>起止时间</td>
                    <td>
                    <script language="javascript">
                    var cdr = new Calendar("cdr");
                    document.write(cdr);
                    cdr.showMoreDay = true;
                    </script>
                    <input onFocus="cdr.show(this);" class="ltext" type="text" name="stime" id="stime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['de']['start_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
"> - 
                    <input onFocus="cdr.show(this);" class="rtext" type="text" name="etime" id="etime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['de']['end_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
">
                    <div id="form-error" class="form-error"></div>
                    </td>
                </tr>
                <tr>
                    <td>广告代码</td>
                    <td>
                        <input type="text" name="ads_code" class="w350" value="<?php echo $this->_tpl_vars['de']['ads_code']; ?>
" >
                    </td>
				</tr>
                <tr>
                    <td>展示模版</td>
                    <td>
                        <select class="select"  name="templates">
                        <option  <?php if ($this->_tpl_vars['de']['templates'] == 'default_index.htm'): ?>selected="selected"<?php endif; ?>  value="default_index.htm">默认模版</option>
                        <option  <?php if ($this->_tpl_vars['de']['templates'] == 'promotion_index.htm'): ?>selected="selected"<?php endif; ?>value="promotion_index.htm">秒杀模版</option>
                        </select>
                    </td>
                </tr>
              
                <tr>
                    <td>活动详情</td>
                    <td>
                    	<script charset="utf-8" src="../lib/kindeditor/kindeditor-min.js"></script>
						
                    	<script>
						var editor;
						KindEditor.ready(function(K) {
							editor = K.create('textarea[name="desc"]', {
								resizeType : 1,
								allowPreviewEmoticons : false,
								allowImageUpload : false
							});
						});
						</script>
                        <textarea style="width:80%; height:300px" name="desc"><?php echo $this->_tpl_vars['de']['desc']; ?>
</textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>展示状态</td>
                    <td>
                    <input type="radio" name="status" value="1" id="open" <?php if ($this->_tpl_vars['de']['status'] == 1): ?>checked="checked"<?php endif; ?>/><label for="open">开启</label>
                    <input type="radio" name="status" value="0" id="close" <?php if ($this->_tpl_vars['de']['status'] != 1): ?>checked="checked"<?php endif; ?>/><label for="close">关闭</label>
                    </td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    <input class="submit" type="submit" value="提交">
                    <input name="act" type="hidden" id="action" value="<?php if (! $_GET['editid']): ?>save<?php else: ?>edit<?php endif; ?>">
                    </td>
                </tr>
                </tbody>
            </table>
            </form>
        <?php else: ?>
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
        <form action="" method="post">
        <table class="table">
        	<thead>
                <tr>
                    <th class="partition" colspan="99">活动列表</th>
                </tr>
            </thead>
            <tbody>
                <tr class="header">
                    <th width="30"></th>
                    <th width="70">显示顺序</th>
                    <th>标题</th>
                    <th width="200">起止时间</th>
                    <th width="100">申请产品</th>
                    <th width="100">状态</th>
                    <th width="250">调用代码</th>
                    <th width="100"></th>
                </tr>
                <?php $_from = $this->_tpl_vars['de']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                <tr>
                    <td><input type="checkbox" value="<?php echo $this->_tpl_vars['list']['id']; ?>
" class="checkitem" name="chk[]"></td>
                    <td><input type="text" class="w50" maxlength="3" name="displayorder[<?php echo $this->_tpl_vars['list']['id']; ?>
]" value="<?php echo $this->_tpl_vars['list']['displayorder']; ?>
" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onkeyup="value=value.replace(/[^\d]/g,'')" /></td>
                    <td><?php echo $this->_tpl_vars['list']['title']; ?>
</td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['start_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['list']['end_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                    <td>&nbsp;<?php echo $this->_tpl_vars['list']['num']; ?>
</td>
                    <td><?php if ($this->_tpl_vars['list']['status']): ?>开启<?php else: ?>关闭<?php endif; ?></td>
                    <td><input readonly="readonly" type="text" class="w200" value="?m=activity&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"/></td>
                    <td>
                    <a href="?m=activity&s=activity.php&operation=edit&editid=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['editimg']; ?>
</a> 
                    <a onclick="return confirm('确定删除吗');" href="?m=activity&s=activity.php&delid=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['delimg']; ?>
</a> 
                    <a href='?m=activity&s=activity_product_list.php&editid=<?php echo $this->_tpl_vars['list']['id']; ?>
'><?php echo $this->_tpl_vars['setimg']; ?>
</a>
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
                        <input type="checkbox" class="checkall" id="del">
                        <input type="hidden" name="act" value="op" />
                        <input type="submit"  class="btny" value="<?php echo $this->_tpl_vars['lang']['del']; ?>
" />
                    	<div class="page"><?php echo $this->_tpl_vars['de']['page']; ?>
</div>
                    </td>
                </tr>
            </tfoot>
        </table>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>