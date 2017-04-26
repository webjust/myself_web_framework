<?php
namespace core\lib\drive\log;
use core\lib\conf;

class file
{
    public $path;   // 存储日志文件的路径
    public function __construct()
    {
        $conf = conf::get('OPTION', 'log');
        $this->path = $conf['PATH'].date('YmdH');
    }

    public function log($message, $file='log')
    {
        /**
         * 过程
         * 1. 确定文件的存储位置是否存在（创建目录）
         * 2. 写入日志
         */
        if (!is_dir($this->path)) {
            mkdir($this->path, '0777', true);
        }

        $message = '++++++++++++'. date('Y-m-d H:i:s') .'++++++++++++' . PHP_EOL . json_encode($message);
        // p($message);
        return file_put_contents($this->path.'/'.$file.'.php', $message.PHP_EOL.PHP_EOL, FILE_APPEND);
    }
}
