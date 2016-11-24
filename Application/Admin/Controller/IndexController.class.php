<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class IndexController extends AdminBaseController {

    /**
     * 服务器基本信息
     */
    function index(){
        $user=session($this->authID);
        if (function_exists('gd_info')) {
            $gd = gd_info();
            $gd = $gd['GD Version'];
        } else {
            $gd = "不支持";
        }
        $info = array(
            '操作系统' => PHP_OS,
            '主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '程序目录' => WEB_ROOT,
            'MYSQL版本' => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
            'GD库版本' => $gd,
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . "秒",
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            '服务器时间' => date("Y年n月j日 H:i:s"),
            '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            '采集函数检测' => ini_get('allow_url_fopen') ? '支持' : '不支持',
            'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
        );
        $this->assign('info',$info);
        $this->assign('user',$user);
        $wh['status']=1;
        $sysMenuList=D('SysMenu')->where($wh)->order('sort')->select();
        foreach ($sysMenuList as $k=>$sysMenuItem) {
            if($sysMenuItem['level']==2){
                $urlArr=explode('/',$sysMenuItem['url']);
                if(!checkAccess($user,$urlArr[1],$urlArr[0])){
                    unset($sysMenuList[$k]);
                }
            }
        }
        $this->assign('sysMenuList',generateTree($sysMenuList));
        $this->display();
    }

    /**
     * 清除系统缓存
     */
    function clearAdminCache(){
        $this->clearFileCache(realpath(RUNTIME_PATH).'\\');
        $this->clearMemCache();
        $data['statusCode']=$this->statusOK;
        $data['message']="清除缓存成功！";
        $this->ajaxReturn($data);
    }
}