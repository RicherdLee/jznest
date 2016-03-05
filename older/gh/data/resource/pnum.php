<?php
/**
锦尚中国 shopjl.com 提供

网址：bbs.52jscn.com

^^^^^^^^^^^^^^^^^^^^^^^^^^^^

 */
$pnum = $_GET['pnum'];
$im = imagecreate(120, 16);
$bg = imagecolorallocate($im, 247, 247, 247);
$textcolor = imagecolorallocate($im, 101, 101, 101);
imagestring($im, 5, 0, 0, $pnum, $textcolor);
header("Content-type: image/png");
imagepng($im);
