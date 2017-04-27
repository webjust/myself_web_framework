<?php
namespace app\ctrl;
use app\model\catModel;

class indexCtrl extends \core\thinkphp
{
    public function index()
    {
        // 初始化日志log类，访问log方法
        \core\lib\log::init();

        // 实例化模型
        $model = new catModel();
        $ret = $model->lists();
    }
}
