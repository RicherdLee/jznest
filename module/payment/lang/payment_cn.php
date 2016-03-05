<?php 
if(!isset($lang))
	$lang=array();
global $_LANG_PAYMENT; 

$_LANG_PAYMENT = array (
  'alipay' => '支付宝 (即时到帐)',
  
  'alipay_desc' => '支付宝网站(www.alipay.com) 是国内先进的网上支付平台。需与支付宝公司签约方可使用。',
  'alipay_interface' => '选择接口类型',
  'alipay_interface_options' => 
  array (
    0 => '使用即时到帐交易接口',
  ),
  'seller_email' => '支付宝帐户',
  'key' => '交易安全校验码',
  'partner' => '合作者身份ID',
  
  'tenpay' => '财付通',
  'tenpay_account' => '财付通商户号',
  'tenpay_desc' => 0,
  'tenpay_key' => '财付通密钥',
  'tenpay_magic_key' => '自定义签名',
  
  'cod' => '货到付款',
  'cod_desc' => '货到付款',
  
  'cards' => '充值卡',
  'cards_desc' => '充值卡',
  
  'account' => '预存款支付',
  'account_desc' => '预存款支付',
 
  'cbp' => '网银在线',
  'cbp_account' => '商户编号',
  'cbp_desc' => '网银在线与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。网址:http://www.chinabank.com.cn',
  'cbp_key' => 'MD5 密钥',
); 

$lang = array_merge($lang, $_LANG_PAYMENT); 
?>