<?php /* Smarty version 2.6.20, created on 2015-11-25 16:00:53
         compiled from product_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getName', 'product_list.htm', 6, false),array('insert', 'label', 'product_list.htm', 17, false),)), $this); ?>
<div class="pro-list">
<div class="derect">
<span><a href="index.php">首页</a></li> &gt;
<?php $_from = $this->_tpl_vars['catname']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
        <?php if ($this->_tpl_vars['key'] == 0 && ! $_GET['key']): ?>
        <strong><a href="?m=product&s=list&id=<?php echo $this->_tpl_vars['list']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'])) ? $this->_run_mod_handler('getName', true, $_tmp) : getName($_tmp)); ?>
</a></strong>
        <?php else: ?>
         > <a href="?m=product&s=list&id=<?php echo $this->_tpl_vars['list']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'])) ? $this->_run_mod_handler('getName', true, $_tmp) : getName($_tmp)); ?>
</a>
        <?php endif; ?>
        
<?php endforeach; endif; unset($_from); ?></span>
</div>
<div class="cat"><?php echo $this->_tpl_vars['slist']['cat']; ?>
</div>
<div class="product">
            <div class="hotsale">
                <div>
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'product', 'catid' => $_GET['id'], 'temp' => 'product_list_dl', 'limit' => 123040)), $this); ?>

                </div>
            </div> 
<script type="text/javascript">
   $(".hot .mt").bind("mouseover",function(){
   var element=$(this).parent();
   element.addClass("current").siblings().removeClass("current");
   });
</script>
</div>
</div>