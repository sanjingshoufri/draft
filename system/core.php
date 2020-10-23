<?php
// 加载composer
include_once './vendor/autoload.php';

// 简单路由分发
$baseUrl = $_SERVER['PHP_SELF'];

// 根据url提取文件名，然后执行文件
$arr = explode('/', $baseUrl);
if (isset($arr[2])) {
	include_once PROJECT_NAME . '/demo/' . $arr[2] . '.php';
}