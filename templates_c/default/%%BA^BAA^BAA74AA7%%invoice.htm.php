<?php /* Smarty version 2.6.20, created on 2016-03-04 17:09:27
         compiled from invoice.htm */ ?>
<div class="invoice_list">
    <?php $_from = $this->_tpl_vars['invoice_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
    <div class="item"> 
    <input type="radio" onclick="chose_invoice(<?php echo $this->_tpl_vars['list']['id']; ?>
)"  value="<?php echo $this->_tpl_vars['list']['id']; ?>
" id="invoice_radio_<?php echo $this->_tpl_vars['list']['id']; ?>
" name="invoice_radio">
    <label for="invoice_radio_<?php echo $this->_tpl_vars['list']['id']; ?>
">
    <?php $_from = $this->_tpl_vars['lang']['itype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['v']):
?><?php if ($this->_tpl_vars['num'] == $this->_tpl_vars['list']['type']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?> 
    <?php $_from = $this->_tpl_vars['lang']['irise']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['v']):
?><?php if ($this->_tpl_vars['num'] == $this->_tpl_vars['list']['rise']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?> 
    <?php $_from = $this->_tpl_vars['lang']['icontent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['v']):
?><?php if ($this->_tpl_vars['num'] == $this->_tpl_vars['list']['content']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>
    </label>
    </div> 
    <?php endforeach; endif; unset($_from); ?>
</div>

<div id="use_new_invoice" class="item">
    <input type="radio" id="invoice_radio_new" name="invoice_radio" onclick="NewInvoice()">
    <label for="invoice_radio_new">使用新的发票信息 </label>
</div>

<form method="post" action="">
<div id="invoice_form" class="order_form">
    <table>
        <tbody>
        <tr>
            <td width="82" align="right">发票类型:</td>
            <td>
            <input onclick="changeInvoiceType('1')" type="radio" id="invoice_type_1" value="0" name="type" /><label for="invoice_type_1"><?php echo $this->_tpl_vars['lang']['itype']['0']; ?>
</label>
            <input onclick="changeInvoiceType('2')" type="radio" id="invoice_type_2" value="1" name="type" /><label for="invoice_type_2"><?php echo $this->_tpl_vars['lang']['itype']['1']; ?>
</label>
            </td>
        </tr>
        </tbody>
        
        <tbody id="special_tbody">
        <tr>
            <td align="right">单位名称:</td>
            <td><input type="text" class="w300" name="company1" id="company1" /></td>
        </tr>
        <tr>
            <td align="right">纳税人识别号:</td>
            <td><input type="text" class="w300" name="number" id="number" /></td>
        </tr>
        <tr>
            <td align="right">注册地址:</td>
            <td><input type="text" class="w300" name="address" id="address" /></td>
        </tr>
        <tr>
            <td align="right">注册电话:</td>
            <td><input type="text" class="w300" name="telephone" id="telephone" /></td>
        </tr>
        <tr>
            <td align="right">开户银行:</td>
            <td><input type="text" class="w300" name="bank" id="bank" /></td>
        </tr>
        <tr>
            <td align="right">银行帐户:</td>
            <td><input type="text" class="w300" name="account" id="account" /></td>
        </tr>
        </tbody>
        
        <tbody id="normal_tbody">
        <tr>
            <td align="right">发票抬头:</td>
            <td>
            <input onclick="showCompanyDiv('1')" type="radio" id="invoice_rise_1" value="0" name="rise" /><label for="invoice_rise_1"><?php echo $this->_tpl_vars['lang']['irise']['0']; ?>
</label>
            <input onclick="showCompanyDiv('2')" type="radio" id="invoice_rise_2" value="1" name="rise" /><label for="invoice_rise_2"><?php echo $this->_tpl_vars['lang']['irise']['1']; ?>
</label>  
            <input type="text" class="w300" id="company" name="company" value="<?php echo $this->_tpl_vars['de']['company']; ?>
" />
            </td>
        </tr>
        </tbody>
        
        <tbody>
        <tr>
            <td align="right">发票内容:</td>
            <td>
            <?php $_from = $this->_tpl_vars['lang']['icontent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['list']):
?>
            <input type="radio" id="invoice_content_<?php echo $this->_tpl_vars['num']+1; ?>
" value="<?php echo $this->_tpl_vars['num']; ?>
" name="content" /><label for="invoice_content_<?php echo $this->_tpl_vars['num']+1; ?>
"><?php echo $this->_tpl_vars['list']; ?>
</label>
            <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form_btn">
    <a onclick="save_invoice()" class="btn_submit" href="#none">
        <span>保存发票信息设置</span>
    </a>
</div>
<div class="clear"></div>
</form>
<script>
<?php if ($this->_tpl_vars['invoice']['id']): ?>
chose_invoice('<?php echo $this->_tpl_vars['invoice']['id']; ?>
');
<?php else: ?>
NewInvoice();
<?php endif; ?>
</script>