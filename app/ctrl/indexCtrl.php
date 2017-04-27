<?php
namespace app\ctrl;
use app\model\catModel;

class indexCtrl extends \core\thinkphp
{
    public function index()
    {
        // 实例化模型
        $model = new catModel();
        $ret = $model->lists();

        $this->assign("cats", $ret);        // 传递数据
        $this->display('index/index.html'); // 显示视图
    }
}
