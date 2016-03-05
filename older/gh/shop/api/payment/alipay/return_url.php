<?php
/**
 * 支付宝返回地址
 *
 * 
 * by shopjl 锦尚中国  bbs.52jscn.com 开发
 */
$_GET['act']	= 'payment';
$_GET['op']		= 'return';
$_GET['payment_code'] = 'alipay';
require_once(dirname(__FILE__).'/../../../index.php');
?>