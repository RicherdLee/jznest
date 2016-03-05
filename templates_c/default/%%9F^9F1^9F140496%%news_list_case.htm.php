<?php /* Smarty version 2.6.20, created on 2016-03-04 15:33:24
         compiled from news_list_case.htm */ ?>
<?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
	<div class="slide">
		<div class="part01">
			<div class="p">
            <?php echo $this->_tpl_vars['list']['smalltext']; ?>

			</div>
<h2><a target="_blank" title="<?php echo $this->_tpl_vars['list']['title']; ?>
" href="<?php echo $this->_tpl_vars['list']['url']; ?>
" ><?php echo $this->_tpl_vars['list']['ftitle']; ?>
</a></h2>		
<a href="<?php echo $this->_tpl_vars['list']['url']; ?>
" class="more">详细信息 >></a>
		</div>
		<div class="part02">
<a href="<?php echo $this->_tpl_vars['list']['url']; ?>
"><img src="<?php echo $this->_tpl_vars['list']['pic']; ?>
" width="280" height="90"/ alt=""></a>
		</div>   
	</div>
<?php endforeach; endif; unset($_from); ?>