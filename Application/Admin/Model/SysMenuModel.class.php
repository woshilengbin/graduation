<?php
namespace Admin\Model;
use Common\Model\AdminBaseModel;

class SysMenuModel extends AdminBaseModel{
    protected $_validate = array(
        array('title','require','菜单名称不允许为空！'),
        array('url','require','访问地址不允许为空！'),
        array('url','','该访问地址已经存在，请不要重复添加！',0,'unique',3),
    );
    protected $_auto = array (
        array('level','2'),
    );
}