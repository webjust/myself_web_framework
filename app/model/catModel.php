<?php
namespace app\model;
use core\lib\model;

class catModel extends model
{
    public $table = 'cat';

    /**
    * 查询全部数据
    */
    public function lists()
    {
        $ret = $this->select($this->table, '*');
        // dump($ret);
        return $ret;
    }
}
