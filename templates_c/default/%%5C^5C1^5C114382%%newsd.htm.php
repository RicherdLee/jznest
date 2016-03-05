<?php /* Smarty version 2.6.20, created on 2016-03-05 03:01:11
         compiled from newsd.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'newsd.htm', 5, false),)), $this); ?>
<div class="w">
    <div class="news">
        <div class="title">
            <h1><?php if ($this->_tpl_vars['de']['title']): ?><?php echo $this->_tpl_vars['de']['title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['de']['ftitle']; ?>
<?php endif; ?></h1>
            <div class="summary">时间：<?php echo ((is_array($_tmp=$this->_tpl_vars['de']['uptime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d&nbsp;%H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d&nbsp;%H:%M:%S")); ?>
</div>
        </div>
        <div class="content">
        	<?php echo $this->_tpl_vars['de']['con']; ?>

            <?php if ($this->_tpl_vars['vote']): ?>
            <div class="vote">
               <form target="_blank" action="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=vote&s=vote&id=<?php echo $_GET['id']; ?>
" method="post">				
                <?php $_from = $this->_tpl_vars['vote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
                <dl>
                    <dt>
                        <?php echo $this->_tpl_vars['num']+1; ?>
、<?php echo $this->_tpl_vars['list']['title']; ?>

                         
                        <?php if ($this->_tpl_vars['list']['end'] == 1): ?><font color="#FF0000">(<?php echo $this->_tpl_vars['lang']['closed']; ?>
)</font><?php endif; ?>
                        <?php if ($this->_tpl_vars['list']['ip'] == 1): ?><font color="#FF0000">(<?php echo $this->_tpl_vars['lang']['voted']; ?>
)</font><?php endif; ?>
                    </dt>
                    <dd>
                    <?php $_from = $this->_tpl_vars['list']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['slist']):
?>
                    <div>
                    <?php if ($this->_tpl_vars['list']['end'] != 1 && $this->_tpl_vars['list']['ip'] != 1): ?>
                    <input id="vote_<?php echo $this->_tpl_vars['list']['id']; ?>
<?php echo $this->_tpl_vars['n']; ?>
" type="<?php if ($this->_tpl_vars['list']['votetype'] == 0): ?>radio<?php else: ?>checkbox<?php endif; ?>" value="<?php echo $this->_tpl_vars['n']+1; ?>
" name="vote<?php echo $this->_tpl_vars['list']['id']; ?>
[]">
                    <?php endif; ?>
                    <label for="vote_<?php echo $this->_tpl_vars['list']['id']; ?>
<?php echo $this->_tpl_vars['n']; ?>
"><?php echo $this->_tpl_vars['slist']['0']; ?>
</label>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                    </dd>
                </dl>
                <?php endforeach; endif; unset($_from); ?>
              
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['vote']; ?>
" name="submit">&nbsp;&nbsp;
                <input type="button" onClick="javascript:window.open('<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=vote&id=<?php echo $_GET['id']; ?>
')" value="<?php echo $this->_tpl_vars['lang']['view']; ?>
" name="button">
            
              
                </form>
            </div>
            <?php endif; ?> 
        </div>
    </div>
</div>