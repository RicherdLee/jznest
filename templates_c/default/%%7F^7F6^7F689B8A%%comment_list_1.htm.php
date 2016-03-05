<?php /* Smarty version 2.6.20, created on 2016-03-04 17:08:23
         compiled from comment_list_1.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'comment_list_1.htm', 16, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
<div class="item">
    <div class="user">
    	<div><a href=""><img height="50" width="50" src="<?php echo $this->_tpl_vars['list']['logo']; ?>
" /></a></div>
        <div><a href=""><?php echo $this->_tpl_vars['list']['user']; ?>
</a></div>
    </div>
    <div class="i-item">
        <?php if ($this->_tpl_vars['list']['goodbad'] == 1): ?>
        <img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/good.gif" />
        <?php elseif ($this->_tpl_vars['list']['goodbad'] == 1): ?>
        <img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/middle.gif" />
        <?php else: ?>
        <img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/default/bad.gif" />
        <?php endif; ?>
        <p><?php echo $this->_tpl_vars['list']['con']; ?>
</p>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['uptime'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</p>
    </div>
    <div class="tl"></div>
</div>
<?php endforeach; else: ?>
<div class="item"><div class="norecode">暂无商品评价！</div></div>
<?php endif; unset($_from); ?>