<?php /* Smarty version 2.6.20, created on 2015-11-25 12:11:30
         compiled from tg_index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'tg_index.htm', 26, false),array('insert', 'label', 'tg_index.htm', 70, false),)), $this); ?>
<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/module/tg/templates/tg.css">
<div class="w">
    <div class="detailnav">
        <strong><a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
">首页</a></strong>
        <span> >  <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=tg">团购</a></span>
    </div>
</div>
<div class="w">
	<div id="select">
    	<?php if ($this->_tpl_vars['tgcat']): ?>
        <dl class="first">
            <dt>分类：</dt>
            <dd>
				<?php $_from = $this->_tpl_vars['tgcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                <div><a <?php if ($_GET['catid'] == $this->_tpl_vars['list']['id']): ?>class="curr"<?php endif; ?> href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=tg&catid=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['catname']; ?>
</a></div>
                <?php endforeach; endif; unset($_from); ?>
            </dd>
        </dl>
        <?php endif; ?>          
    </div>

    <div class="filter clearfix">
        <div class="fore1 clearfix">
            <div class="order">
                <?php $this->assign('s', $_GET['orderby']); ?>
                <a <?php if (! $this->_tpl_vars['s']): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&orderby=".($this->_tpl_vars['s']), "") : smarty_modifier_replace($_tmp, "&orderby=".($this->_tpl_vars['s']), "")); ?>
"><span>默认排序</span></a>
                <a <?php if ($this->_tpl_vars['s'] == 1): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&orderby=".($this->_tpl_vars['s']), "") : smarty_modifier_replace($_tmp, "&orderby=".($this->_tpl_vars['s']), "")); ?>
&orderby=1"><span>销量</span><b></b></a>
                <a <?php if ($this->_tpl_vars['s'] == 2): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&orderby=".($this->_tpl_vars['s']), "") : smarty_modifier_replace($_tmp, "&orderby=".($this->_tpl_vars['s']), "")); ?>
&orderby=2"><span>人气</span><b></b></a>
                <a <?php if ($this->_tpl_vars['s'] == 3): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&orderby=".($this->_tpl_vars['s']), "") : smarty_modifier_replace($_tmp, "&orderby=".($this->_tpl_vars['s']), "")); ?>
&orderby=3"><span>最新</span><b></b></a>
                <a <?php if ($this->_tpl_vars['s'] == 4 || $this->_tpl_vars['s'] == 5): ?>class="current <?php if ($this->_tpl_vars['s'] == 4): ?>up<?php endif; ?>"<?php endif; ?> href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?<?php echo ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&orderby=".($this->_tpl_vars['s']), "") : smarty_modifier_replace($_tmp, "&orderby=".($this->_tpl_vars['s']), "")); ?>
&orderby=<?php if ($this->_tpl_vars['s'] == 4): ?>5<?php else: ?>4<?php endif; ?>"><span>价格</span><b></b></a>
            </div>
            <div class="i-search">
            <form action="<?php echo $this->_tpl_vars['config']['weburl']; ?>
">
            <input name="m" id="m" type="hidden" value="<?php echo $_GET['m']; ?>
" />
            <input class="text" type="text" value="<?php echo $_GET['keys']; ?>
" size="20" name="keys" />
            <input type="submit" value="搜索" />
            </form>
            </div>
            <div class="pages"><?php echo $this->_tpl_vars['tg']['pages']; ?>
</div>
            <div class="total">共<strong><?php echo $this->_tpl_vars['tg']['count']; ?>
</strong>个商品</div>
        </div>
    </div>
    <div class="itemSearchList">
        <?php if ($this->_tpl_vars['tg']['list']): ?>
        <div class="itemSearchResult clearfix">
            <ul class="clearfix">
                <?php $_from = $this->_tpl_vars['tg']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
                <li <?php if (( $this->_tpl_vars['num']+1 ) % 3 == 0): ?>class="mr0"<?php endif; ?> >
                    <div class="p-info">
                        <a class="p-img" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=tg&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
">  <img height="230" width="280" alt="<?php echo $this->_tpl_vars['list']['pname']; ?>
" src="<?php echo $this->_tpl_vars['list']['pic']; ?>
"> </a>
                        <a class="p-name" href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=tg&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['name']; ?>
</a>
                        <p class="p-price">
                        <strong><?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['price']; ?>
</strong>
                        <span>门店价：<?php echo $this->_tpl_vars['config']['money']; ?>
<?php echo $this->_tpl_vars['list']['market_price']; ?>
</span>
                        </p>
                      <div class="p-shop">
					  <span class="last">已购买<strong><?php echo $this->_tpl_vars['list']['virtual_quantity']+$this->_tpl_vars['list']['sell_amount']; ?>
</strong>件</span>
                      <a href="<?php echo $this->_tpl_vars['config']['weburl']; ?>
/?m=tg&s=detail&id=<?php echo $this->_tpl_vars['list']['id']; ?>
">去看看</a>
                      </div>
                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
			<div class="page"><?php echo $this->_tpl_vars['tg']['page']; ?>
</div>
        </div>
        <div class="hotTg">
        	<div class="m">
                <div class="mt"><h3>团购排行榜</h3></div>
                <div class="mc">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'label', 'type' => 'tg', 'temp' => 'tg_list_1', 'limit' => 9)), $this); ?>

                </div>
            </div>
            <div class="ad235">
            <script src='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/api/ad.php?id=10&catid=<?php echo $_GET['id']; ?>
&name=<?php echo $_GET['key']; ?>
'></script>
            </div>
        </div>
        <?php else: ?>
            <div class="itemsNull">
                <h3>很抱歉，没有找到符合条件的宝贝</h3>
                <p>
                    <em>建议您：</em>
                    <span>1、适当减少筛选条件，可以获得更多结果</span>
                    <span>2、尝试其他关键字</span>
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>