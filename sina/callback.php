<?php
 	//授权回调页面，即配置文件中的$callback_url
 	require_once('config.php');
 	require_once('sina.php');
 	 
 	if(isset($_GET['code']) && $_GET['code']!=''){
 	    $o=new sinaPHP($sina_k, $sina_s);
 	    $result=$o->access_token($callback_url, $_GET['code']);
 	}
 	if(isset($result['access_token']) && $result['access_token']!=''){
 	    echo '授权完成，请记录<br/>access token：<input size="50" value="',$result['access_token'],'">';
 	 
	}//保存登录信息，此示例中使用session保存
	
?>