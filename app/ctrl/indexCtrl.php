<?php
namespace app\ctrl;
class indexCtrl extends \core\thinkphp
{
    public function index()
    {
        // 初始化日志log类，访问log方法
        \core\lib\log::init();

        // $model = new \core\lib\model();
        // p($model->query("SELECT * FROM `cat`")->fetchAll());
        $data = "Hello World!";
        $content = "这是一段内容！！！！！！！！！！！！！！！！！！！";
        $this->assign('title', $data);
        $this->assign('content', $content);
        $this->display('index/index.html');
    }
}
