<?php
return array(
    //'配置项'=>'配置值'
    //模板替换配置
    'TMPL_PARSE_STRING'  =>array(
        '__public__' => __ROOT__.'/Public',
        '__admin__' => __ROOT__.'/Public/admin',
        '__home__' => __ROOT__.'/Public/index',
        '__bootstrap__' => __ROOT__.'/Public/bootstrap',

    ),
    //分页配置
    'PAGE_SIZE'=>20,
    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'graduation', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'usbw', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 't_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  true, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    //上传文件根目录
    'UPLOAD_PATH'=>'Uploads/',
);