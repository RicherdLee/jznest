<?php
/**Êä³öÓÅ»ÝÂë
 * Created by PhpStorm.
 * User: haoli
 * Date: 2/28/16
 * Time: 12:03
 */
include_once("includes/page_utf_class.php");
include_once("$config[webroot]/module/product/includes/plugin_code_class.php");
$code = new code();
if($_GET['ajax'] =='code'){
    echo $code->getCodeDiscount($_GET['code']);
}else{
    if (isset($_GET['status']))
        $tpl->assign("blist", $code->get_code_list($_GET['status']));
    else
        $tpl->assign("blist", $code->get_code_list());
//========================================
    $tpl->assign("config", $config);
    $tpl->assign("lang", $lang);
    $output = tplfetch("admin_code.htm");
}