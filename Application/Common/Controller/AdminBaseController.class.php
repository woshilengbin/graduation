<?php
namespace Common\Controller;
class AdminBaseController extends BaseController {
    protected $authID;
    protected $statusOK=200;
    protected $statusFail=300;
    protected $statusTimeout=301;
    /**
     * 管理员初始化方法
     */
    function _initialize(){
        $session_name=session_name();
        $session_id=$_POST[$session_name];
        if (!empty($session_id)&&$session_id!=session_id()) {
            session_destroy();
            session_id($session_id);
            session_start();
        }
        $this->authID=C('AUTH_ID');
        $user=session($this->authID);
        if(empty($user)){
            if(IS_AJAX){
                $data['statusCode']=$this->statusTimeout;
                $data['callbackType']='forward';
                $data['forwardUrl']=U('User/logon');
                $this->ajaxReturn($data);
            }else{
                $this->redirect('User/login');
            }
            exit();
        }
    }
    /**
     * 验证是否有权限
     */
    function checkAccess(){
        $user=session($this->authID);
        if(!checkAccess($user)){
            $data['statusCode']=$this->statusFail;
            $data['message']='你没有操作权限！';
            $this->ajaxReturn($data);
        }
    }

    /**
     * 上传一个icon到临时文件夹
     */
    function uploadIconToTemp(){
        $rs=uploadFileToTemp('file',true,array('jpg','png','bmp','gif','jpeg'));
        $data['statusCode']=$this->statusFail;
        if($filePath=getUploadFilePathWithInfo($rs)){
            $data['statusCode']=$this->statusOK;
            $data['icon']=$filePath;
            $data['iconPath']=__ROOT__.'/'.$filePath;
        }else{
            $data['message']=$rs['uploader']->getError();
        }
        $this->ajaxReturn($data);
    }

}