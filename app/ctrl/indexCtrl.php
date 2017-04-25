<?php
namespace app\ctrl;
class indexCtrl extends \core\thinkphp
{
    public function index()
    {
        $data = "Hello World!";
        $content = "这是一段内容！！！！！！！！！！！！！！！！！！！";
        $this->assign('title', $data);
        $this->assign('content', $content);
        $this->display('index/index.html');
    }
}
