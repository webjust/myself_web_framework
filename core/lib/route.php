<?php
namespace core\lib;
use core\lib\conf;
class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        /**
         * xxx.com/index.php/index/index
         * 1. 隐藏index.php
         * 2. 返回对应的控制器、方法
         * 3. 获取URL参数的部分
         */
         if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' ) {
             $path = $_SERVER['REQUEST_URI'];
             $pathArr = explode('/', trim($path, '/'));
             if (isset($pathArr[0])) {
                 $this->ctrl = $pathArr[0];
             }
             unset($pathArr[0]);
             if (isset($pathArr[1])) {
                 $this->action = $pathArr[1];
                 unset($pathArr[1]);
             } else{
                 $this->action = conf::get('ACTION', 'route');
             }

            // 把剩余的参数信息，写入$_GET
            $count = count($pathArr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($pathArr[$i + 1])) {
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i += 2;
            }
         } else{
             $this->ctrl = conf::get('CTRL', 'route');
             $this->action = conf::get('ACTION', 'route');
         }
    }
}
