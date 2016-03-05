<?php

	include_once("$config[webroot]/module/member/includes/plugin_orderadder_class.php");
	$orderadder=new orderadder();
	$tpl->assign("listadder",$adlist=$orderadder->get_orderadderlist());
	include_once("footer.php");
	$tpl->assign("current","points");
	$out=tplfetch("points_order.htm",$flag,true);
?>