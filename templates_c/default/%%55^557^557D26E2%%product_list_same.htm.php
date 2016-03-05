<?php /* Smarty version 2.6.20, created on 2016-03-04 17:08:35
         compiled from product_list_same.htm */ ?>
<?php $_from = $this->_tpl_vars['pro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
<dl style="width:153px; margin: 10px; float: left; overflow: hidden;">
    <dt>
        <a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
">
        	<img width="153" height="112" src='<?php echo $this->_tpl_vars['list']['pic']; ?>
_220X220.jpg' />
        </a>
    </dt>
    <dd>
    <dd style="width: 151px;"><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['pname']; ?>
</a></dd>
    <dd><strong><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['price']; ?>
</strong></dd>
    <dd class="bottom"><b></b></dd>
    </dd>
</dl>
<?php endforeach; endif; unset($_from); ?>