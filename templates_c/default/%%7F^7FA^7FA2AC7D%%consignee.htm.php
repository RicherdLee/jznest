<?php /* Smarty version 2.6.20, created on 2016-03-04 17:08:57
         compiled from consignee.htm */ ?>
<div class="consignee_list">
    <?php $_from = $this->_tpl_vars['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
?>
    <div class="item"> 
    <input type="radio" onclick="chose_consignee(<?php echo $this->_tpl_vars['list']['id']; ?>
)"  value="<?php echo $this->_tpl_vars['list']['id']; ?>
" id="consignee_radio_<?php echo $this->_tpl_vars['list']['id']; ?>
" name="consignee_radio">
    <label for="consignee_radio_<?php echo $this->_tpl_vars['list']['id']; ?>
">
    <b><?php echo $this->_tpl_vars['list']['name']; ?>
</b>
    <?php echo $this->_tpl_vars['list']['area']; ?>
 <?php echo $this->_tpl_vars['list']['address']; ?>
 <?php echo $this->_tpl_vars['list']['mobile']; ?>
 <?php echo $this->_tpl_vars['list']['tel']; ?>

    </label>
    </div> 
    <?php endforeach; endif; unset($_from); ?>
</div>

<div id="use_new_address" class="item">
    <input type="radio" id="consignee_radio_new" name="consignee_radio" onclick="NewConsignee()">
    <label for="consignee_radio_new">使用新地址 </label>
</div>

<form method="post" action="">
<div id="consignee_form" class="order_form">
    <input type="hidden" name="act" value="consignee" />
    <table>
        <tr>
            <td align="right"><em>*</em>收货人:</td>
            <td colspan="3"><input type="text" name="name" id="name" onblur="check_Consignee('name')" value="<?php echo $this->_tpl_vars['de']['name']; ?>
"><div id="name_error" class="error"></div></td>
        </tr>
        <tr>
            <td align="right"><em>*</em>所在地区:</td>
            <td colspan="3">
                <input type="hidden" name="t" id="t" value="<?php echo $this->_tpl_vars['de']['area']; ?>
" />
                <input type="hidden" name="province" id="id_1" value="<?php echo $this->_tpl_vars['de']['provinceid']; ?>
" />
                <input type="hidden" name="city" id="id_2" value="<?php echo $this->_tpl_vars['de']['cityid']; ?>
" />
                <input type="hidden" name="area" id="id_3" value="<?php echo $this->_tpl_vars['de']['areaid']; ?>
" />
                <?php if ($this->_tpl_vars['de']['area']): ?><div id="d_1"><?php echo $this->_tpl_vars['de']['area']; ?>
&nbsp;&nbsp;<a href="javascript:sd();">编辑</a></div><?php endif; ?>
                <div id="d_2" <?php if ($this->_tpl_vars['de']['area']): ?>class="hidden"<?php endif; ?>>
                <select id="select_1" onChange="selClass(this);check_Consignee('area');">
                <option value="">--请选择--</option>
                <?php echo $this->_tpl_vars['prov']; ?>

                </select>
                <select id="select_2" onChange="selClass(this);check_Consignee('area');" class="hidden"></select>
                <select id="select_3" onChange="selClass(this);check_Consignee('area');" class="hidden"></select>
                <div id="area_error" class="error"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td align="right"><em>*</em>详细地址:</td>
            <td colspan="3"><input type="text" name="address" id="address" class="w420" value="<?php echo $this->_tpl_vars['de']['address']; ?>
" onblur="check_Consignee('address')"><div id="address_error" class="error"></div></td>
        </tr>
        <tr>
            <td align="right" width="65"><em>*</em>手机号码:</td>
            <td width="200">
            <input type="text" name="mobile" id="mobile" value="<?php echo $this->_tpl_vars['de']['mobile']; ?>
" onblur="check_Consignee('mobile')">
            </td>
            <td align="right" width="65">固定电话:</td>
            <td>
            <input type="text" name="tel" id="tel" value="<?php echo $this->_tpl_vars['de']['tel']; ?>
" onblur="check_Consignee('tel')">
            <div id="call_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td align="right">邮箱:</td>
            <td colspan="3"><input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['de']['email']; ?>
" onblur="check_Consignee('email')"><div id="email_error" class="error"></div></td>
        </tr>
    </table>
</div>
<div class="form_btn">
    <a onclick="save_consignee()" class="btn_submit" href="#none">
        <span>确认收货地址</span>
    </a>
</div>
<div class="clear"></div>
</form>
<script>
<?php if ($this->_tpl_vars['consignee']['id']): ?>
chose_consignee('<?php echo $this->_tpl_vars['consignee']['id']; ?>
');
<?php else: ?>
NewConsignee();
<?php endif; ?>
</script>