<?php /* Smarty version 2.6.20, created on 2016-03-05 03:07:12
         compiled from lostpass.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="menu_bottom L1">				
    <div class="headtop_L">
        <?php echo $this->_tpl_vars['lang']['you_are_here']; ?>
<a href='<?php echo $this->_tpl_vars['config']['weburl']; ?>
/'><?php echo $this->_tpl_vars['lang']['indexpage']; ?>
</a> &raquo; <?php echo $this->_tpl_vars['lang']['callpass']; ?>
</a>
    </div>	
</div>
<script type="text/javascript" src="script/Validator.js"></script>
<!--主体开始 -->
	<div id="mainbody1" class="topm">
			<div class="about_ltit"><div class="title_left2 L2"><?php echo $this->_tpl_vars['lang']['callpass']; ?>
</div></div>
			<div class="content4 overflow">
			<div style="line-height:25px;height:280px;width:500px;margin-right:5px; padding:10px; text-align:center;  margin-left: auto;
    margin-right: auto;">
			<form method="post" action="" onSubmit="return Validator.Validate(this,3)">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"  >
                  <tr>
                    <td width="60" height="50" align="right"><?php echo $this->_tpl_vars['lang']['entercomname']; ?>
</td>
                    <td width="300"  align="left"><input name="user" class="i-text" type="text" id="user" dataType="Require" msg="<?php echo $this->_tpl_vars['lang']['pls_user']; ?>
" size="25" value="<?php echo $_POST['user']; ?>
" style="width:300px;"/></td>
                  </tr>
                  <tr>
                    <td height="50" align="right"><?php echo $this->_tpl_vars['lang']['email']; ?>
</td>
                    <td align="left"><input name="email" class="i-text" size="25" type="text" value="<?php echo $_POST['email']; ?>
" dataType="Email" msg="<?php echo $this->_tpl_vars['lang']['pls_email']; ?>
"style="width:300px;" /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td align="left" >
                    	<input class="button" type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['isure']; ?>
" />
                        <input name="action" type="hidden" id="action" value="com" />
                      </td>
                  </tr>
                </table>
			</form>		
			<?php if ($_POST['action'] != ''): ?>
			<form action="" method="post">
			<table width="100%" border="0" cellpadding="0" cellspacing="0"  style="margin-top:20px;">
			  
              	
                    <?php if ($this->_tpl_vars['company']['userid'] != ""): ?>
                    <tr>
                    <td width="60" height="50" align="right"></td>
					<td width="300"  align="left">
                            <input name="userid" type="radio" value="<?php echo $this->_tpl_vars['company']['userid']; ?>
|<?php echo $this->_tpl_vars['company']['email']; ?>
" />
                            <a href="shop.php?uid=<?php echo $this->_tpl_vars['company']['userid']; ?>
" target="_blank"><?php echo $this->_tpl_vars['company']['user']; ?>
</a>
                            <br />
                     </td>
			  </tr> 
              <tr>  
              <td width="60" height="50" align="right"></td>
					<td width="300"  align="left">     
                            <input  name="action" type="hidden" id="action" value="submit" />
                            <input class="button" name="<?php echo $this->_tpl_vars['lang']['isure']; ?>
" type="submit" value="<?php echo $this->_tpl_vars['lang']['isure']; ?>
" />
                      </td>
			  </tr>
                    <?php else: ?>
                            <?php echo $this->_tpl_vars['lang']['nosearch']; ?>
<a href="<?php echo $this->_tpl_vars['config']['regname']; ?>
" target="_blank"><?php echo $this->_tpl_vars['lang']['reguser']; ?>
</a>
                            <?php echo $this->_tpl_vars['lang']['contactme']; ?>
<a href="aboutus.php?type=3" target="_blank"><?php echo $this->_tpl_vars['lang']['conme']; ?>
</a>．
                    <?php endif; ?>
					
				
			</table>
			</form>
			<?php endif; ?>
			</div>
			<div class="clear"></div>
			</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>