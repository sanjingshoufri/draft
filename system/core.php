<?php
// 加载composer
include_once './vendor/autoload.php';

// 简单路由分发(兼容命令行)
$baseUrl = $_SERVER['PHP_SELF'];

// 根据url提取文件名，然后执行文件
$arr = explode('/', $baseUrl);
$demo_file_name = isset($arr[2])?$arr[2]:getopt("f:")['f'];

include_once PROJECT_NAME . '/demo/' . $demo_file_name . '.php';

// 定义前段路由
define('FRONT_BASE', PROJECT_NAME . '/front');