<?php /* Smarty version 2.6.20, created on 2016-03-05 13:54:16
         compiled from admin_code.htm */ ?>
<div class="path">
    <div>
        <a href="main.php?cg_u_type=1">我的商城</a> <span>&gt;</span>
        <a href="main.php?m=product&s=admin_code">优惠码</a> <span>&gt;</span>
        <!--<?php if ($_GET['code_type'] == 1): ?>可分享-->
        <!--<?php elseif ($_GET['code_type'] == 2): ?>可自用-->
        <!--<?php else: ?>优惠码<?php endif; ?>-->
    </div>
</div>
<div class="main">
    <div class="wrap">
        <div class="hd">
            <!--<ul class="tabs">-->
                <!--<li class="<?php if ($_GET['code_type'] != ''): ?>normal<?php else: ?>active<?php endif; ?>"><a-->
                        <!--href="main.php?m=product&s=admin_code">所有优惠码</a></li>-->
                <!--<li class="<?php if ($_GET['code_type'] == '1'): ?>active<?php else: ?>normal<?php endif; ?>"><a-->
                        <!--href="main.php?m=product&s=admin_code&status=1">可自用</a></li>-->
                <!--<li class="<?php if ($_GET['code_type'] == '2'): ?>active<?php else: ?>normal<?php endif; ?>"><a-->
                        <!--href="main.php?m=product&s=admin_code&status=2">可分享</a></li>-->
            <!--</ul>-->
        </div>
        <table class="table-list-style order">
            <thead>
            <tr>
                <th width="280">优惠码</th>
                <th width="80">折扣率</th>
                <th width="80">过期时间</th>
                <th width="80">过期状态</th>
                <th width="80">类型</th>
                <th width="120">状态</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['blist']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['buylist']):
?>
            <tr>
                <td class="sep-row" colspan="20"></td>
            </tr>
            <tr>
                <td class="bdl">
                    <p><?php echo $this->_tpl_vars['buylist']['code']; ?>
</p>
                </td>
                <td class="bdl">
                    <p><?php echo $this->_tpl_vars['buylist']['discont']; ?>
</p>
                </td>
                <td class="bdl">
                    <p><?php echo $this->_tpl_vars['buylist']['expire_time']; ?>
</p>
                </td>
                <td class="bdl">
                    <p><?php echo $this->_tpl_vars['buylist']['expire_status']; ?>
</p>
                </td>
                <td class="bdl">
                    <p><?php echo $this->_tpl_vars['buylist']['code_type']; ?>
</p>
                </td>
                <td class="bdl">
                    <p><?php echo $this->_tpl_vars['buylist']['status']; ?>
</p>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="20">
                    <div class="pagination"><?php echo $this->_tpl_vars['blist']['page']; ?>
</div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>