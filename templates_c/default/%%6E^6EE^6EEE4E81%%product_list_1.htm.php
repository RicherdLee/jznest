<?php /* Smarty version 2.6.20, created on 2016-03-05 10:00:27
         compiled from product_list_1.htm */ ?>
<?php $_from = $this->_tpl_vars['pro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
<dl>
    <dt><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['pname']; ?>
</a></dt>
    <dd class="pic">
    <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
">
    <img class="p60" alt="<?php echo $this->_tpl_vars['list']['pname']; ?>
" title="<?php echo $this->_tpl_vars['list']['pname']; ?>
" src="<?php echo $this->_tpl_vars['list']['pic']; ?>
_60X60.jpg">
    <img class="p115" width="115" height="115" alt="<?php echo $this->_tpl_vars['list']['pname']; ?>
" title="<?php echo $this->_tpl_vars['list']['pname']; ?>
" src="<?php echo $this->_tpl_vars['list']['pic']; ?>
_220X220.jpg">
    </a>
    <sup <?php if ($this->_tpl_vars['key'] > 2): ?>class="gray"<?php endif; ?>><?php echo $this->_tpl_vars['key']+1; ?>
</sup></dd>
    <dd class="price"><strong><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['price']; ?>
</strong></dd>
</dl>
<?php endforeach; endif; unset($_from); ?>