<?php
/*
+-----------------------------------------------------------------------
|	�ļ���Ҫ����������������ļ�
|	�ļ����ƣ�checkhtml.php
|	����ʱ�䣺2010-5-20
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
