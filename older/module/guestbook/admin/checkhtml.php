<?php
/*
+-----------------------------------------------------------------------
|	文件概要：过滤输入框内容文件
|	文件名称：checkhtml.php
|	创建时间：2010-5-20
+-----------------------------------------------------------------------
*/
function checkhtml($text){
$text=str_replace("<","&lt;",$text);
$text=str_replace(">","&gt;",$text);
$text=str_replace("\n","<br />",$text);
return $text;
}

function checkhtml2($companytext){
$companytext=str_replace("<","&lt;",$companytext);
$companytext=str_replace(">","&gt;",$companytext);
$companytext=str_replace("\n","<br />",$companytext);
return $companytext;
}
?>
