<?php
namespace Common\Controller;
use Think\Cache;
use Think\Controller;
class BaseController extends Controller {
    /**
     *
     *清除系统产生的文件缓存
     * @param unknown_type $path
     */
    function clearFileCache($path,$deep=0) {
        if($dh = opendir($path)){//打开Cache文件夹;
            while(($file = readdir($dh))!==false){//遍历Cache目录,
                if (is_file($path.$file)) {
                    unlink($path.$file);//删除遍历到的每一个文件;
                }elseif ($file!='.'&&$file!='..'){
                    $this->clearFileCache($path.$file.'\\',$deep+1);
                }
            }
            closedir($dh);
            if ($deep!=0) {
                rmdir($path);
            }
        }
    }
    /**
     *
     * 清除memCache缓存
     */
    function clearMemCache() {
        $memCache=Cache::getInstance();
        $memCache->clear();
    }
}