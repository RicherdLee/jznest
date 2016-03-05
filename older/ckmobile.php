<?PHP 
    session_start(); 
	
	header("Content-Type: textml; charset=UTF-8");

	$flag = 0; 
	$params='';//要post的数据 
	$verify = rand(123456, 999999);//获取随机验证码
	$_SESSION['verify'] = $verify;
	$mobile = $_POST['mob'];

	//以下信息自己填以下
	$mobile = $_POST['mob'] ;//手机号
    echo $mobile;
	$argv = array( 
		'name'=>'dxwsoudu',     //必填参数。用户账号
		'pwd'=>'76443B9A0DEDE1443ADADCA51187',     //必填参数。（web平台：基本资料中的接口密码）
		'content'=>'短信验证码为：'.$verify.'，请勿将验证码提供给他人。',   //必填参数。发送内容（1-500 个汉字）UTF-8编码
		'mobile'=>$mobile,   //必填参数。手机号码。多个以英文逗号隔开
		'stime'=>'',   //可选参数。发送时间，填写时已填写的时间发送，不填时为当前时间发送
		'sign'=>'极盏燕农',    //必填参数。用户签名。
		'type'=>'pt',  //必填参数。固定值 pt
		'extno'=>''    //可选参数，扩展码，用户定义扩展码，只能为数字
	); 
	//print_r($argv);exit;
	//构造要post的字符串 
	//echo $argv['content'];
	foreach ($argv as $key=>$value) { 
		if ($flag!=0) { 
			$params .= "&"; 
			$flag = 1; 
		} 
		$params.= $key."="; $params.= urlencode($value);// urlencode($value); 
		$flag = 1; 
	} 
	$url = "http://web.duanxinwang.cc/asmx/smsservice.aspx?".$params; //提交的url地址
	$con= substr( file_get_contents($url), 0, 1 );  //获取信息发送后的状态
	
	if($con == '0'){
		echo "<script>alert('发送成功!');</script>";
	}else{
		echo "<script>alert('发送失败!');history.back();</script>";
	}
	
?>