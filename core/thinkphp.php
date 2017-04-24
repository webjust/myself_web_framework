<?php

namespace core;
class thinkphp
{
    static public $classMap = array();
    static public function run()
    {
        p('ok');
        $route = new \core\route();
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
}
