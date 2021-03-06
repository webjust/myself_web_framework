<?php

namespace core;
class thinkphp
{
    public $assign;
    static public $classMap = array();
    static public function run()
    {
        // 初始化日志类
        \core\lib\log::init();

        $route = new \core\lib\route();
        // 解析URL获取控制器和方法名
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        \core\lib\log::log('ctrl: '.$ctrlClass.'action: '.$action);

        // 判断控制器的类文件是否存在，否则抛出异常
        if (is_file($ctrlFile)) {
            include $ctrlFile;
            // 实例化控制器类
            $ctrl = new $ctrlClass();
            // 判断控制器中的方法是否存在，否则抛出异常
            if (method_exists($ctrl, $action)) {
                // 调用控制器中的方法
                $ctrl->$action();
            } else {
                throw new \Exception($ctrlClass."控制器中不存在".$action."方法");
            }
        } else {
            throw new \Exception("找不到控制器".$ctrlClass);
        }
    }

    // 自由加载类库
    static public function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        } else {
            // p($class);
            $class = str_replace('\\', '/', $class);
            $file = THINKPHP . '/' . $class . '.php';
            // p($file);
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    // 传递数据
    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    // 显示视图
    public function display($file)
    {
        $file = APP.'/view/'.$file;
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        }
    }
}
