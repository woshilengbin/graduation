<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class SysMenuController extends AdminBaseController{
    /**
     * 系统菜单列表
     */
    function index(){
        $this->checkAccess();
        $list=D('SysMenu')->order('sort')->select();
        $this->assign('list',createTree($list));
        $this->assign('user',session($this->authID));
        $this->display();
    }
    /**
     * 添加系统菜单
     */
    function addSysMenu(){
        $this->checkAccess();
        if(IS_GET){
            $where['level']=1;
            $cateList=D('SysMenuCate')->where($where)->order('sort')->field('id,title')->select();
            $this->assign('cateList',$cateList);
            $this->display();
        }else{
            $model=D('SysMenu');
            if($model->create()){
                if($model->add()){
                    $data['statusCode']=$this->statusOK;
                    $data['message']='添加成功！';
                    $data['callbackType']='closeCurrent';
                    $data['navTabId']=CONTROLLER_NAME.'_index';
                }else{
                    $data['statusCode']=$this->statusFail;
                    $data['message']='添加失败！';
                }
            }else{
                $data['statusCode']=$this->statusFail;
                $data['message']=$model->getError();
            }
            $this->ajaxReturn($data);
        }
    }
    /**
     * 编辑系统菜单
     */
    function editSysMenu(){
        $this->checkAccess();
        if(IS_GET){
            $id=I('get.id');
            if(!empty($id)){
                $sysMenu=D('SysMenu')->find($id);
                $this->assign('sysMenu',$sysMenu);
                $where['level']=1;
                $cateList=D('SysMenuCate')->where($where)->order('sort')->field('id,title')->select();
                $this->assign('cateList',$cateList);
                $this->display();
            }
        }else{
            $model=D('SysMenu');
            if($model->create()){
                $model->save();
                $data['statusCode']=$this->statusOK;
                $data['message']='更新成功！';
                $data['callbackType']='closeCurrent';
                $data['navTabId']=CONTROLLER_NAME.'_index';
            }else{
                $data['statusCode']=$this->statusFail;
                $data['message']=$model->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 删除系统菜单
     */
    function deleteSysMenu(){
        $this->checkAccess();
        $id=I('get.id');
        if(!empty($id)){
            if(D('SysMenu')->delete($id)){
                $data['statusCode']=$this->statusOK;
                $data['message']='删除成功！';
                $data['navTabId']=CONTROLLER_NAME.'_index';
            }else{
                $data['statusCode']=$this->statusFail;
                $data['message']='无法删除！';
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 添加菜单分类
     */
    function addSysMenuCate(){
        $this->checkAccess();
        if(IS_GET){
            $this->display();
        }else{
            $data['statusCode']=$this->statusFail;
            $model=D('SysMenuCate');
            if($model->create()){
                if($model->add()){
                    $data['statusCode']=$this->statusOK;
                    $data['message']='添加成功！';
                    $data['callbackType']='closeCurrent';
                    $data['navTabId']=CONTROLLER_NAME.'_index';
                }else{
                    $data['message']='添加失败';
                }
            }else{
                $data['message']=$model->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 编辑菜单分类
     */
    function editSysMenuCate(){
        $this->checkAccess();
        if(IS_GET){
            $id=I('get.id');
            if(!empty($id)){
                $menuCate=D('SysMenuCate')->find($id);
                $this->assign('menuCate',$menuCate);
                $this->display();
            }
        }else{
            $data['statusCode']=$this->statusFail;
            $model=D('SysMenuCate');
            if($model->create()){
                if($model->save()){
                    $data['statusCode']=$this->statusOK;
                    $data['message']='更新成功！';
                    $data['callbackType']='closeCurrent';
                    $data['navTabId']=CONTROLLER_NAME.'_index';
                }else{
                    $data['message']='更新失败';
                }
            }else{
                $data['message']=$model->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 删除菜单分类
     */
    function deleteSysMenuCate(){
        $this->checkAccess();
        $id=I('get.id');
        $where['pid']=$id;
        $where['level']=2;
        $count=M('sys_menu')->where($where)->count();
        $data['statusCode']=$this->statusFail;
        if($count>0){
            $data['message']='请删除子菜单再执行这个操作！';
        }else{
            if(D('SysMenuCate')->deleteCate($id)){
                $data['statusCode']=$this->statusOK;
                $data['message']='删除成功！';
                $data['navTabId']=CONTROLLER_NAME.'_index';
            }else{
                $data['message']='删除失败！';
            }
        }
        $this->ajaxReturn($data);
    }

}