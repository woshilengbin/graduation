<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

class UserController extends Controller {
    protected $authID;
    function _initialize(){
        $this->authID=C('AUTH_ID');
    }
    /**
     * 用户登录
     */
    function login(){
        $user=session($this->authID);
        if(!empty($user)){
            $this->redirect('Index/index');
            exit();
        }
        if(IS_GET){
            $this->display();
        }elseif(IS_POST){
            $username=trim($_POST['username']);
            $password=trim($_POST['password']);
            $checkCode=trim($_POST['checkCode']);
            $msg='';
            if(empty($checkCode)){
                $msg='验证码不允许为空！';
            }else{
                if(checkVerify($checkCode)){
                    if(empty($username)||empty($password)){
                        $msg='用户名或密码为空！';
                    }else{
                        $where['username']=$username;
                        $where['password']=md5($password);
                        $user=M('admin')->where($where)->find();
                        if(empty($user)){
                            $msg='用户名或密码不正确！';
                        }else{
                            $save['id']=$user['id'];
                            $save['count']=$user['count']+1;
                            $save['last_time']=time();
                            $save['last_ip']=get_client_ip();
                            M('admin')->save($save);
                            $user=array_merge($user,$save);
                            session($this->authID,$user);
                            $this->redirect('Index/index');
                            exit();
                        }
                    }
                }else{
                    $msg='验证码验证码错误！';
                }
            }
            $this->assign('msg',$msg);
            $this->assign('username',$username);
            $this->assign('password',$password);
            $this->display();
        }
    }

    /**
     * 获取验证码
     */
    function getCheckCode(){
        $config =    array(
            'fontSize'    =>    16,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'imageW'=>110,
            'imageH'=>45,
        );
        $verify=new Verify($config);
        $verify->entry();
    }

    /**
     * 用户退出登录
     */
    function logout(){
        session($this->authID,null);
        $this->redirect('login');
    }
}