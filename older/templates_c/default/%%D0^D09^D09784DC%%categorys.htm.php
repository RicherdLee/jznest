<?php /* Smarty version 2.6.20, created on 2015-11-25 12:21:39
         compiled from categorys.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'categorys.htm', 7, false),)), $this); ?>
<div id="J_Category" class="category">
    <div class="navcatgory">
        <ul>
      	  	<?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['cList']):
?>
                <li class="j_MenuItem<?php if (( $this->_tpl_vars['num']+1 ) % 2 == 0): ?> col<?php endif; ?>">
                	<p>
                        <em><?php echo ((is_array($_tmp=$this->_tpl_vars['cList']['cat'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 8, "") : smarty_modifier_truncate($_tmp, 8, "")); ?>
</em>
                        <?php $_from = $this->_tpl_vars['cList']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['sublist']):
?>
                            <?php if ($this->_tpl_vars['n'] < 2): ?>
                                <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['sublist']['catid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sublist']['cat'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 8, "") : smarty_modifier_truncate($_tmp, 8, "")); ?>
</a>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </p>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </div>
    <div id="J_SubCategory" class="subCategory">
        <?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['cList']):
?>
        <div class="j_SubView hidden">
            <div class="catlist">  
                <?php $_from = $this->_tpl_vars['cList']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n'] => $this->_tpl_vars['sublist']):
?>
                <dl class="fore<?php echo $this->_tpl_vars['n']+1; ?>
">
                    <dt><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['sublist']['catid']; ?>
"><?php echo $this->_tpl_vars['sublist']['cat']; ?>
</a></dt>
                    <dd>
                    <?php $_from = $this->_tpl_vars['sublist']['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slist']):
?>
                    <em><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=product&s=list&id=<?php echo $this->_tpl_vars['slist']['catid']; ?>
"><?php echo $this->_tpl_vars['slist']['cat']; ?>
</a></em>
                    <?php endforeach; endif; unset($_from); ?>
                    </dd>
                </dl>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <div class="barnd">
                <h4>推荐品牌</h4>
                <ul>
				<?php $_from = $this->_tpl_vars['cList']['brand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['slist']):
?>
                	<li <?php if (( $this->_tpl_vars['key']+1 ) % 2 == 0): ?>class="fr"<?php endif; ?> ><img width="90" height="40" src="<?php echo $this->_tpl_vars['slist']['logo']; ?>
"></li>
                <?php endforeach; endif; unset($_from); ?>
				</ul>
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>   
</div>