<?php /* Smarty version 2.6.20, created on 2016-03-04 15:33:24
         compiled from ftlink_list.htm */ ?>
<div class="bottom_service_link">
	<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
		<dl>
			<dt style="background:url(<?php echo $this->_tpl_vars['link']['logo']; ?>
) no-repeat left center;">
                <strong><?php echo $this->_tpl_vars['link']['title']; ?>
</strong>
            </dt>
            <?php $_from = $this->_tpl_vars['link']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
            <dd><a href="<?php echo $this->_tpl_vars['list']['con_linkaddr']; ?>
"><?php echo $this->_tpl_vars['list']['con_title']; ?>
</a></dd>
            <?php endforeach; endif; unset($_from); ?>
		</dl>
	<?php endforeach; endif; unset($_from); ?>
	<div class="clear"></div>
</div>