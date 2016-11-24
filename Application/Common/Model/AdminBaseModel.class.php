<?php
namespace Common\Model;

class AdminBaseModel extends BaseModel{
    /**
     * 获取表所有数据
     */
    function getAllList($where='',$order='',$isRelation=false){
        $list=$this->where($where)->order($order)->relation($isRelation)->select();
        return $list;
    }
    /**
     * 设置焦点图标
     */
    function setFocusIcon(){
        $icon=I('post.org_focus_icon');
        $isCopy=I('post.isCopy');
        if(!empty($icon)){
            if($isCopy==1){
                if(file_exists($icon)){
                    $newFilePath=C('UPLOAD_PATH').'pushFocusIcon/'.uniqid().'.'.getFileExt($icon);
                    copy($icon,$newFilePath);
                    $icon=$newFilePath;
                }else{
                    $icon='';
                }
            }else{
                $filePath=C('UPLOAD_PATH').'temp/'.getFileFullName($icon);
                if(file_exists($filePath)){
                    $icon=C('UPLOAD_PATH').'pushFocusIcon/'.getFileFullName($icon);
                    rename($filePath,$icon);
                }
            }
        }
        return $icon;
    }
    /**
     * 设置非焦点图标
     */
    function setUnfocusIcon(){
        $icon=I('post.unfocus_icon');
        if(!empty($icon)){
            $filePath=C('UPLOAD_PATH').'temp/'.getFileFullName($icon);
            if(file_exists($filePath)){
                $icon=C('UPLOAD_PATH').'pushUnfocusIcon/'.getFileFullName($icon);
                rename($filePath,$icon);
            }
        }
        return $icon;
    }
    /**
     *
     * 设置App参数
     */
    function setParam(){
        $keys=I('post.key');
        if (count($keys)>0) {
            $data=array();
            $types=I('post.type');
            $values=I('post.value');
            foreach ($keys as $k=> $key) {
                $key=trim($key);
                if (!empty($key)) {
                    $temp=array();
                    $temp[]=$key;
                    $temp[]=trim($types[$k]);
                    $temp[]=trim($values[$k]);
                    $data[]=implode(']|[', $temp);

                }
            }
            return implode(']||[', $data);
        }else {
            return '';
        }
    }
    /**
     * 设置子集管理的ID
     */
    function setSubsetID(){
        $source=I('post.source');
        if($source=='subset'){
            $subid=I('post.subid');
            $rs=explode('_',$subid);
            return $rs[0];
        }else{
            return 0;
        }
    }
    /**
     * 设置子集管理的子集名称
     */
    function setSubsetName(){
        $source=I('post.source');
        if($source=='subset'){
            $subid=I('post.subid');
            $rs=explode('_',$subid);
            array_shift($rs);
            return implode('_',$rs);
        }else{
            return '';
        }
    }
}