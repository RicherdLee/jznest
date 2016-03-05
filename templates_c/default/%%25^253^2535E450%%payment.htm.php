<?php /* Smarty version 2.6.20, created on 2016-03-04 17:09:24
         compiled from payment.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'payment.htm', 7, false),array('modifier', 'truncate', 'payment.htm', 8, false),)), $this); ?>
<div class="payment_list">
    <div class="shipment">
        <?php $_from = $this->_tpl_vars['ship']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
        <div class="item"> 
            <label>
                <input type="radio" onclick="chose_ship(<?php echo $this->_tpl_vars['list']['id']; ?>
,<?php echo $this->_tpl_vars['list']['type']; ?>
)" value="<?php echo $this->_tpl_vars['list']['id']; ?>
" id="ship_radio_<?php echo $this->_tpl_vars['list']['id']; ?>
" name="ship_radio">
                <em><?php echo $this->_tpl_vars['list']['title']; ?>
</em> <b><?php if ($this->_tpl_vars['list']['price']): ?><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
<?php else: ?>免运费<?php endif; ?></b>
            	<span><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['desc'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "") : smarty_modifier_truncate($_tmp, 100, "")); ?>
</span>
            </label>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>

<div class="form_btn">
    <a onclick="save_payment()" class="btn_submit" href="#none">
        <span>保存配送方式</span>
    </a>
</div>
<div class="clear"></div>
<script>
<?php if ($this->_tpl_vars['ship']['0']['id']): ?>
chose_ship('<?php echo $this->_tpl_vars['ship']['0']['id']; ?>
','<?php echo $this->_tpl_vars['ship']['0']['type']; ?>
');
<?php endif; ?>
</script>