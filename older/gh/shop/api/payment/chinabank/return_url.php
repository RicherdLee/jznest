<?php
/**
 * 网银在线返回地址
 *
 * 
 * by shopjl 锦尚中国  bbs.52jscn.com 开发
 */
error_reporting(7);
$_GET['act']	= 'payment';
$_GET['op']		= 'return';
$_GET['payment_code'] = 'chinabank';

//赋值，方便后面合并使用支付宝验证方法
$_GET['out_trade_no'] = $_POST['v_oid'];
$_GET['extra_common_param'] = $_POST['remark1'];
$_GET['trade_no'] = $_POST['v_idx'];
require_once(dirname(__FILE__).'/../../../index.php');
?>