<?php /* Smarty version 2.6.20, created on 2016-03-04 21:01:06
         compiled from product_index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'product_index.htm', 49, false),)), $this); ?>
<link href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/templates/wap/css/index.css" rel="stylesheet" type="text/css" />
<div class="w">
    <section class="header">
        <h1 class="logo">
        <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
">
            <img src="<?php if ($this->_tpl_vars['config']['logo']): ?><?php echo $this->_tpl_vars['config']['logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/logo.png<?php endif; ?>" width="160px" height="70px" />
        </a>
        </h1>
        <div class="search">
        <form method="get" name="form" id="form" action="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/">
            <input id="m" name="m" type="hidden" value="product" />
            <input id="s" name="s" type="hidden" value="list" />
            <input value="<?php if ($_GET['key']): ?><?php echo $_GET['key']; ?>
<?php else: ?><?php endif; ?>" onclick="this.value='';" name="key" type="text">
            <input type="submit" value="" />
            <input type="hidden" name="ie" value="UTF-8" />
        </form> 
        </div>
    </section>
</div>
<div class="w">
    <section class="entry">
        <dl class="fore1">
            <dt><a href="main.php"></a></dt>
            <dd><a href="main.php">我的商场</a></dd>
        </dl>
        <dl class="fore2">
            <dt><a href="?m=tg"></a></dt>
            <dd><a href="?m=tg">团购</a></dd>
        </dl>
        <dl class="fore3">
            <dt><a href="main.php?m=product&s=admin_buyorder"></a></dt>
            <dd><a href="main.php?m=product&s=admin_buyorder">我的订单</a></dd>
        </dl>
        <dl class="fore4">
            <dt><a href="?m=product&s=shop_cart"></a></dt>
            <dd><a href="?m=product&s=shop_cart">购物车</a></dd>
        </dl>
    </section>
</div>
<?php $_from = $this->_tpl_vars['categorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['slist']):
        $this->_foreach['name']['iteration']++;
?>
<div class="w fore<?php echo $this->_foreach['name']['iteration']-1; ?>
">
    <section class="m clearfix">
        <section class="mt clearfix">
            <div class="cat"><a href="?m=product&s=list&id=<?php echo $this->_tpl_vars['slist']['catid']; ?>
"><h3><?php echo $this->_tpl_vars['slist']['name']; ?>
</h3></a></div>
            <div class="adv"><img src="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/image/wap/adv.png"></div>
        </section>
        <section class="mc clearfix">
            <?php $_from = $this->_tpl_vars['slist']['sub_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['cat']):
?>
                <a <?php if (((is_array($_tmp=$this->_tpl_vars['num'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['slist']['rand']) : in_array($_tmp, $this->_tpl_vars['slist']['rand']))): ?>class="color"<?php endif; ?> href="?m=product&s=list&id=<?php echo $this->_tpl_vars['cat']['catid']; ?>
"><?php echo $this->_tpl_vars['cat']['cat']; ?>
</a>
            <?php endforeach; endif; unset($_from); ?>
        </section>
    </section>
</div>
<?php endforeach; endif; unset($_from); ?>
<div class="cate"><a href="cat.php">其它分类</a></div>

