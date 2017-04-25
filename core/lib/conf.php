<?php
namespace core\lib;

class conf
{
    static public $conf = array();
    /**
    * 读取单个配置项
    *
    * @param
    * @return    void
    * @author    webjust [604854119@qq.com]
    */
    static public function get($name, $file)
    {
        // 判断配置文件是否已经存在缓存中
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            /**
             * 第1步：判断配置文件是否存在
             * 第2步：判断配置项是否存在
             * 第3步：缓存配置
             */
            $path = CORE.'/config/'.$file.'.php';
            if (is_file($path)) {
                // 返回配置项
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file]=$conf;
                    return $conf[$name];
                } else {
                    throw new \Exception("没有这个配置项".$name);
                }
            } else {
                throw new \Exception("找不到配置文件".$file);
            }
        }
    }

    /**
     * 读取整个配置文件
     */
    static public function all($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = CORE.'/config/'.$file.'.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf = $conf;
                return $conf;
            } else {
                throw new \Exception("找不到配置文件".$file);
            }
        }
    }
}
