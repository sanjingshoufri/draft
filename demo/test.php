<?php
// 正则表达式测试
$name = "杭州市浙江省测试自治区";
$fir = preg_filter("/(省|市|自治区|特别行政区)/", "", $name);
// var_dump($fir);
// exit();



$pattern = "/\b[A-Za-z]+/";
$str = "taonian";
preg_match($pattern, $str, $match);



// $pattern = "/(杭州)/";
// $name = "杭州市浙江省测试自治区";
// $fir = preg_filter($pattern, "", $name);
// var_dump($fir);