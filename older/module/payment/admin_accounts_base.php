<?php
include_once("module/payment/includes/payment_class.php");
$payment=new payment();
//=================================
$val=$_POST?$_POST:$_GET;
//-------返回应用充值结果
if(!empty($_GET['onlinepaytype'])&&$_GET['onlinepaytype']=='alipay')
{
	unset($_GET['s']);
	unset($_GET['m']);
	unset($_GET['onlinepaytype']);
	
	//删除原有参数，不然会影响他原来的值
	$sign=$val['sign'];
	$tradeno=$val['out_trade_no'];//站内流水ID
	$payflowid=$val['trade_no'];//支付宝交易号
	$suc=$val['is_success']=='T'?true:false;
	$total_fee=$val['total_fee'];
	$extra_common_param=$val['extra_common_param'];
	
	$configs=$payment->get_pay_config('alipay');
	require_once($config['webroot']."/module/payment/lib/alipay/lib/alipay_notify.class.php");
	$alipayNotify = new AlipayNotify($configs);
	$verify_result = $alipayNotify->verifyReturn();
	if($verify_result&&$suc)
	{
		set_result($tradeno,$payflowid,$total_fee,$extra_common_param);
	}
		
}
if(!empty($_GET['onlinepaytype'])&&$_GET['onlinepaytype']=='bill99')
{
	function kq_ck_null($kq_va,$kq_na){if($kq_va == ""){return $kq_va="";}else{return $kq_va=$kq_na.'='.$kq_va.'&';}}
	//人民币网关账号，该账号为11位人民币网关商户编号+01,该值与提交时相同。
	$kq_check_all_para=kq_ck_null($_REQUEST[merchantAcctId],'merchantAcctId');
	//网关版本，固定值：v2.0,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[version],'version');
	//语言种类，1代表中文显示，2代表英文显示。默认为1,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[language],'language');
	//签名类型,该值为4，代表PKI加密方式,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[signType],'signType');
	//支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[payType],'payType');
	//银行代码，如果payType为00，该值为空；如果payType为10,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[bankId],'bankId');
	//商户订单号，,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[orderId],'orderId');
	//订单提交时间，格式：yyyyMMddHHmmss，如：20071117020101,该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[orderTime],'orderTime');
	//订单金额，金额以“分”为单位，商户测试以1分测试即可，切勿以大金额测试,该值与支付时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[orderAmount],'orderAmount');
	//快钱交易号，商户每一笔交易都会在快钱生成一个交易号。
	$kq_check_all_para.=kq_ck_null($_REQUEST[dealId],'dealId');
	//银行交易号 ，快钱交易在银行支付时对应的交易号，如果不是通过银行卡支付，则为空
	$kq_check_all_para.=kq_ck_null($_REQUEST[bankDealId],'bankDealId');
	//快钱交易时间，快钱对交易进行处理的时间,格式：yyyyMMddHHmmss，如：20071117020101
	$kq_check_all_para.=kq_ck_null($_REQUEST[dealTime],'dealTime');
	//商户实际支付金额 以分为单位。比方10元，提交时金额应为1000。该金额代表商户快钱账户最终收到的金额。
	$kq_check_all_para.=kq_ck_null($_REQUEST[payAmount],'payAmount');
	//费用，快钱收取商户的手续费，单位为分。
	$kq_check_all_para.=kq_ck_null($_REQUEST[fee],'fee');
	//扩展字段1，该值与提交时相同
	$kq_check_all_para.=kq_ck_null($_REQUEST[ext1],'ext1');
	//扩展字段2，该值与提交时相同。
	$kq_check_all_para.=kq_ck_null($_REQUEST[ext2],'ext2');
	//处理结果， 10支付成功，11 支付失败，00订单申请成功，01 订单申请失败
	$kq_check_all_para.=kq_ck_null($_REQUEST[payResult],'payResult');
	//错误代码 ，请参照《人民币网关接口文档》最后部分的详细解释。
	
	$kq_check_all_para.=kq_ck_null($_REQUEST[errCode],'errCode');
	$trans_body=substr($kq_check_all_para,0,strlen($kq_check_all_para)-1);
	$MAC=base64_decode($_REQUEST[signMsg]);
	$fp = fopen($config['webroot']."/module/payment/lib/bill99/99bill[1].cert.rsa.20140803.cer", "r"); 
	$cert = fread($fp, 8192); 
	fclose($fp); 
	$pubkeyid = openssl_get_publickey($cert); 
	$ok = openssl_verify($trans_body, $MAC, $pubkeyid); 

	$total_fee=$_REQUEST[orderAmount]/100;
	$tradeno=$_REQUEST[orderId]; //站内流水ID
	$payflowid=$_REQUEST[dealId];//支付宝交易号
	$extra_common_param=$_REQUEST[ext1];
	
	if ($ok == 1) { 
		switch($_REQUEST[payResult]){
				case '10':
				//此处做商户逻辑处理
				$rtnOK=1;
				//以下是我们快钱设置的show页面，商户需要自己定义该页面。
				break;
				default:
				$rtnOK=2;
				break;
		}
	}else{
		$rtnOK=3;
	}	
	if($rtnOK==1)
	set_result($tradeno,$payflowid,$total_fee,$extra_common_param);
}
if(!empty($_GET['onlinepaytype'])&&$_GET['onlinepaytype']=='tenpay')
{
	require_once($config['webroot']."/module/payment/lib/tenpay/classes/PayResponseHandler.class.php");
	$configs=$payment->get_pay_config('tenpay');
	$key = $configs['tenpay_key'];/* 密钥 */
	$resHandler = new PayResponseHandler();/* 创建支付应答对象 */
	$resHandler->setKey($key);	//判断签名
	if($resHandler->isTenpaySign())
	{
		$payflowid = $resHandler->getParameter("transaction_id");//交易单号
		$tradeno= $resHandler->getParameter("sp_billno");//站内流水ＩＤ
		$total_fee = $resHandler->getParameter("total_fee")/100;//金额,以分为单位
		$pay_result = $resHandler->getParameter("pay_result");//支付结果
		$extra_common_param = $resHandler->getParameter("attach");
		if( "0" == $pay_result )
		{
			set_result($tradeno,$payflowid,$total_fee,$extra_common_param);
		}
	}	
}
if(!empty($_GET['onlinepaytype'])&&$_GET['onlinepaytype']=='cbp')
{
	unset($_GET['s']);
	unset($_GET['m']);
	unset($_GET['onlinepaytype']);
	
	$configs=$payment->get_pay_config('cbp');
	$key   = $configs['cbp_key'];
	$v_oid     =trim($val['v_oid']);       // 商户发送的v_oid定单编号   
	$v_pmode   =trim($val['v_pmode']);    // 支付方式（字符串）   
	$v_pstatus =trim($val['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
	$v_pstring =trim($val['v_pstring']);   // 支付结果信息 ： 支付完成（当v_pstatus=20时）；失败原因（当v_pstatus=30时,字符串）； 
	$v_amount  =trim($val['v_amount']);     // 订单实际支付金额
	$v_moneytype  =trim($val['v_moneytype']); //订单实际支付币种    
	$remark1   =trim($val['remark1' ]);      //备注字段1
	$remark2   =trim($val['remark2' ]);     //备注字段2
	$v_md5str  =trim($val['v_md5str' ]);   //拼凑后的MD5校验值  
	
	if ($v_md5str==$md5string)
	{
		if($v_pstatus=="20")
		{
			set_result($v_oid,$v_oid,$v_amount,$remark1);
		}
		else
		{
			echo "支付失败";
		}
	}
	else
	{
		echo "<br>校验失败,数据可疑";
	}
}
function set_result($tradeno,$payflowid,$total_fee,$extra_common_param)
{
	global $db,$config;
	//验证一下是不是被异步处理了。
	$sql="select flow_id,pay_uid,statu from ".CASHFLOW." where id='$tradeno'";
	$db->query($sql);
	$re=$db->fetchRow();
	$userid=$re['pay_uid'];
	$statu=$re['statu'];
	//如果验证成功,并且流水表中的记录为新提交
	if($statu==1)
	{	
		$sql="update ".CASHFLOW." set price='$total_fee',flow_id='$payflowid',statu='4' where id='$tradeno'";
		$db->query($sql);
		
		$sql="update ".PUSER." set cash=cash+$total_fee where pay_uid='$userid'";
		$db->query($sql);
		
		if($extra_common_param)
		{
			$order_id=$extra_common_param;
			
			//----------------当前流水详情	
			include_once("module/payment/includes/payment_class.php");
			$payment=new payment();
			
			$sql="select * from ".CASHFLOW." where order_id='$order_id' and pay_uid='".$payment->pay_uid."'";
			$db->query($sql);
			$de=$db->fetchRow();
			$rse=$payment->payment_base();
			
			//-------------减少账户金额
			if($de['price']<0) $de['price']*=-1;
			
			if($rse['cash']<$de['price'])
			{
				$price=$de['price']-$rse['cash'];
				$_POST['amount']=$price;
				$_POST['id']=$order_id;
				$payment->online_pay();
			}
			else
			{
				$sql = "update ".PUSER." set cash=cash-".$de['price'].",unreachable=unreachable+".$de['price']." where pay_uid='$rse[pay_uid]'";
				$db->query($sql);
				
				include_once("module/product/includes/plugin_order_class.php");
				$order = new order();		
				$order->set_order_statu($order_id,2);
				
				//异步处理,以后处理
				//返回同步处理结果
				$url=$de['return_url']."&order_id=$order_id&price=".($de['price']*-1)."&extra_param=$de[extra_param]&statu=1&auth=".md5($config['authkey']);
				msg($url);
			}
		}
		msg("main.php?m=payment&s=admin_accounts_base");
	}
}
	
//--------获取账户基本信息
$tpl->assign("re",$payment->payment_base());
//==================================
$tpl->assign("config",$config);
$tpl->assign("lang",$lang);
$output=tplfetch("admin_accounts_base.htm");

?>