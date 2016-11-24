<?php
/**
 * @param $str
 * 格式化应用参数
 */
function formateAppParam($str){
    $rs=array();
    $params=explode(']||[',$str);
    foreach ($params as $paramItem) {
        $dataArr=explode(']|[',$paramItem);
        $rs[]=implode(' | ',$dataArr);
    }
    return implode(',',$rs);
}