<?php
/**
 * 入口文件
 * 1. 定义常量
 * 2. 加载函数库
 * 3. 启动框架
 * @author    webjust [604854119@qq.com]
 */

// define('THINKPHP', realpath('/'));   LINUX下获取根目录地址
define('THINKPHP', $_SERVER['DOCUMENT_ROOT']);    // Windows下获取根目录地址
// 项目核心文件夹
define('CORE', THINKPHP.'/core');
define('APP', THINKPHP.'/app');
define('MODULE', 'app');

// 是否开启调试模式
define('DEBUG', true);

// 关闭或者开启显示错误的开关
if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

// 加载函数库
include CORE . '/common/function.php';
// 启动框架
include CORE . '/thinkphp.php';

// 实现自动加载
spl_autoload_register('\core\thinkphp::load');
try {
    \core\thinkphp::run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
