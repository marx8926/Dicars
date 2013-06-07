<?php
$str = $_POST['content'];
if (mb_detect_encoding($str ) == 'UTF-8') {
   $str = mb_convert_encoding($str , "HTML-ENTITIES", "UTF-8");
}

header('Content-type: application/x-msdownload; charset=utf-16');
header('Content-Disposition: attachment; filename=reporte_excel.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo $str ; 
?>