<?php /* Smarty version 2.6.20, created on 2015-11-25 12:10:49
         compiled from product_list_dl.htm */ ?>
<?php $_from = $this->_tpl_vars['pro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
<dl>
    <dt>
        <a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
">
        	<img width="340" height="242" src='<?php echo $this->_tpl_vars['list']['pic']; ?>
_220X220.jpg' />
        </a>
    </dt>
    <dd>
    <dd><a target="_blank" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['pname']; ?>
</a></dd>
    <dd><strong><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['price']; ?>
</strong></dd>
    <dd class="text"><?php echo $this->_tpl_vars['de']['ftitle']; ?>
</dd>
    <dd class="bottom"><b></b></dd>
    </dd>
</dl>
<?php endforeach; endif; unset($_from); ?>