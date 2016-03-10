<?php /* Smarty version 2.6.20, created on 2016-03-05 10:00:27
         compiled from consult_list_1.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'consult_list_1.htm', 16, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['consult']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
<div class="item">
     <dl class="user">
        <dt><b></b>网&#12288;&#12288;友：</dt>
        <dd><?php echo $this->_tpl_vars['list']['member_name']; ?>
</dd>
    </dl>
    <dl class="ask">
        <dt><b></b>咨询内容：</dt>
        <dd><?php echo $this->_tpl_vars['list']['question']; ?>
</dd>
    </dl>
    <?php if ($this->_tpl_vars['list']['answer']): ?>
    <dl class="answer">
        <dt><b></b>网站回复：</dt>
        <dd>
        <div class="content"><?php echo $this->_tpl_vars['list']['answer']; ?>
</div>
        <div class="date_answer"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['answer_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d&nbsp;%H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d&nbsp;%H:%M:%S")); ?>
</div>
        </dd>
    </dl>
    <?php endif; ?>
</div>
<?php endforeach; else: ?>
<div class="item"><div class="norecode">暂无该类咨询！</div></div>
<?php endif; unset($_from); ?>