<?php
require './vendor/autoload.php';
use Test\TestClass;

ini_set('xhprof.output_dir', dirname(__FILE__) . '\runid');
$xhprof_data = xhprof_enable();
// 只有实例化的时候才会加载文件.
$testClass = new TestClass(1, 2);

func_echo();

$xhprof_data = xhprof_disable();

$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, 'xhprof');