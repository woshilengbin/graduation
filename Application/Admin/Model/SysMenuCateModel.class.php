<?php
namespace Admin\Model;

use Common\Model\AdminBaseModel;

class SysMenuCateModel extends AdminBaseModel
{
    protected $msg;
    protected $tableName = 'sys_menu';
    protected $_validate = array(
        array('title', 'require', '菜单分类不允许为空！'),
    );
    protected $_auto = array(
        array('level', '1'),
        array('icon', 'setIcon', 3, 'callback'),
    );

    /**
     * 删除菜单分类
     */
    function deleteCate($id)
    {
        $cate = $this->find($id);
        if ($this->delete($id)) {
            if (!empty($cate['icon'])) {
                unlink($cate['icon']);
            }
            $where['pid'] = $id;
            $where['level'] = 2;
            $this->where($where)->delete();
            return true;
        } else {
            return false;
        }
    }

    /**
     * 设置apk图标
     */
    function setIcon()
    {
        $icon = I('post.icon');
        $isUpdate = false;
        if (!empty($icon)) {
            $filePath = C('UPLOAD_PATH') . 'temp/' . getFileFullName($icon);
            if (file_exists($filePath)) {
                $icon = C('UPLOAD_PATH') . 'pushIcon/' . getFileFullName($icon);
                rename($filePath, $icon);
                $isUpdate = true;
            }
        } else {
            $isUpdate = true;
        }
        if ($isUpdate) {
            $id = I('post.id');
            if (!empty($id)) {
                $menuCate = $this->find($id);
                if (!empty($menuCate['icon'])) {
                    unlink($menuCate['icon']);
                }
            }
        }
        return $icon;
    }
}