<?php
namespace Admin\Model;

use Common\Model\AdminBaseModel;

class AdminModel extends AdminBaseModel{
    protected $_validate = array(
        array('username','require','用户名不允许为空！'),
    );
    protected $_auto = array (
        array('join_time','time',1,'function'),
    );

    /**
     * 删除管理员
     */
    function deleteAdmin($id){
        $where['id']=$id;
        $where['is_root']=0;
        if($this->where($where)->delete()){
            $wh['uid']=$id;
            D('AuthGroupAccess')->where($wh)->delete();
            return true;
        }else{
            return false;
        }
    }
}