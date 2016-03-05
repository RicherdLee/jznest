<?php
	
	include_once("$config[webroot]/module/member/includes/plugin_invoice_class.php");
	$invoice=new invoice();
	$tpl->assign("invoice_list",$invoice->get_invoicelist());
	$tpl->assign("invoice",$invoice->get_defaultinvoice());
	$tpl->assign("lang",$lang);
	
	$out=tplfetch("invoice.htm",$flag,true);	
	
?>
               