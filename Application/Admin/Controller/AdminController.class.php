<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class AdminController extends AdminBaseController{
    /**
     * 管理员列表
     */
    public function index(){
        $this->checkAccess();
        $keyword = I('post.keyword');
        $orderField = I('post.orderField');
        $orderDirection = I('post.orderDirection');
        if(!empty($keyword)){
            $wh['username'] = array('like','%'.$keyword.'%');
            $wh['id'] = $keyword;
            if($keyword=='超级管理员'){
                $wh['is_root']=1;
            }elseif($keyword=='普通管理员') {
                $wh['is_root']=0;
            if($keyword=='启用中'){
            }
            $wh['status']=1;
            }elseif($keyword=='禁用中') {
                $wh['status']=0;
            }
            if($keyword=='最高优先级'){
                $wh['priority']=1;
            }elseif($keyword=='普通优先级') {
                $wh['priority']=0;
            }
            $wh['_logic'] = 'or';
            $where['_complex'] = $wh;
        }
        $model=D('Admin');
        $pageCount=$model->where($where)->count();
        $curPage=I('post.pageNum');
        $pageSize=I('post.numPerPage');
        if(empty($curPage)){
            $curPage=1;
        }
        if(empty($pageSize)){
            $pageSize=C('PAGE_SIZE');
        }
        if(!empty($orderField) || !empty($orderDirection)){
            $list=$model->where($where)->order($orderField.' '.$orderDirection)->limit(($curPage-1)*$pageSize.','.$pageSize)->select();
        }else{
            $list=$model->where($where)->order('id desc')->limit(($curPage-1)*$pageSize.','.$pageSize)->select();
        }
        $this->assign('list',$list);
        $this->assign('keyword',$keyword);
        $this->assign('pageCount',$pageCount);
        $this->assign('curPage',$curPage);
        $this->assign('pageSize',$pageSize);
        $this->assign("orderField",$orderField);
        $this->assign("orderDirection",$orderDirection);
        $this->assign('user',session($this->authID));
        $this->display();
    }

    /**
     * 添加管理员
     */
    function addAdmin(){
        $this->checkAccess();
        if(IS_GET){
            $groupList=D('AuthGroup')->where('status=1')->select();
            $this->assign('groupList',$groupList);
            $this->display();
        }else{
            $model=D('Admin');
            $data['statusCode']=$this->statusFail;
            if($model->create()){
                $model->password=md5($model->password);
                if($uid=$model->add()){
                    $groupList=I('post.group_id');
                    D('AuthGroupAccess')->saveAccesses($uid,$groupList);
                    $data['statusCode']=$this->statusOK;
                    $data['message']='添加成功！';
                    $data['callbackType']='closeCurrent';
                    $data['navTabId']=CONTROLLER_NAME.'_index';
                }else{
                    $data['message']='无法添加数据';
                }
            }else{
                $data['message']=$model->getError();
            }
            $this->ajaxReturn($data);
        }
    }


    /**
     * 编辑管理员
     */
    public function editAdmin(){
        $this->checkAccess();
        if(IS_GET) {
            $id = I('get.id');
            if (!empty($id)) {
                $list = M('admin')->find($id);
                $groupList = M('auth_group')->where('status=1')->select();
                $where['uid'] = $id;
                $accessList = M('auth_group_access')->where($where)->select();
                foreach ($accessList as $accessItem) {
                    foreach ($groupList as $k => $groupItem) {
                        if ($accessItem['group_id'] == $groupItem['id']) {
                            $groupList[$k]['checked'] = true;
                            break;
                        }
                    }
                }
                $this->assign('groupList', $groupList);
                $this->assign('list', $list);
                $this->display();
            }
        }else{
            $model=D('Admin');
            $data['statusCode']=$this->statusFail;
            if ($model->create()) {
                if (empty($model->password)) {
                    unset($model->password);
                } else {
                    $model->password = md5($model->password);
                }
                $uid = $model->id;
                $groupList = I('post.group_id');
                $model->save();
                D('AuthGroupAccess')->saveAccesses($uid, $groupList);
                $data['statusCode'] = $this->statusOK;
                $data['message'] = '添加成功！';
                $data['callbackType'] = 'closeCurrent';
                $data['navTabId'] = CONTROLLER_NAME . '_index';
            } else {
                $data['message'] = $model->getError();
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 删除管理员
     */
    function deleteAdmin(){
        $this->checkAccess();
        $id=I('get.id');
        if(!empty($id)){
            $model=D('Admin');
            $data['statusCode']=$this->statusFail;
            if($model->deleteAdmin($id)){
                $data['statusCode']=$this->statusOK;
                $data['navTabId']=CONTROLLER_NAME.'_index';
                $data['message']='删除成功！';
            }else{
                $data['message']='无法删除数据！';
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 查看权限
     */
    function viewAuth(){
        $this->checkAccess();
        $id=I('get.id');
        if(!empty($id)){
            $list=M('admin')->field('username')->find($id);
            $groupList=D('AuthGroupAccess')->getGroupList($id);
            $ruleList=D('AuthRule')->getRulesByGroups($groupList);
            $this->assign('list',$list);
            $this->assign('ruleList',$ruleList);
            $this->display();
        }
    }
}