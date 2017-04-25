<?php
namespace app\ctrl;
class indexCtrl
{
    public function index()
    {
        $model = new \core\lib\model();
        $sql = "SELECT * FROM `cat`";
        $ret = $model->query($sql);
        p($ret->fetchAll());
    }
}
