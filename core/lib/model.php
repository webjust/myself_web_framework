<?php
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        // 读取数据库的配置信息
        $db = \core\lib\conf::all('database');
        try {
            parent::__construct($db['DSN'], $db['USERNAME'], $db['PASSWORD']);
        } catch (\Exception $e) {
            p($e->getMessage());
            die;
        }
    }
}
