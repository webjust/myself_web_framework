<?php
namespace core\lib;
use \Medoo\medoo;

class model extends medoo
{
    public function __construct()
    {
        // 读取数据库的配置信息
        $db = \core\lib\conf::all('database');

        parent::__construct($db);
    }
}
