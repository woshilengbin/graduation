<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>欢迎使用后台管理系统</title>
    <link href="/graduation/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/graduation/Public/admin/css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/graduation/Public/bootstrap/js/html5shiv.min.js"></script>
    <script src="/graduation/Public/bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php if(!empty($msg)): ?><div class="alert alert-danger text-center" role="alert"><span class="h4">出错了！<?php echo ($msg); ?></span></div><?php endif; ?>
<div id="login-box">
    <form class="form-horizontal" action="<?php echo U('login');?>" method="post" onsubmit="return checkLogin()">
        <div class="modal show">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">后台登录管理界面</h2>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">用户名：</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo ($username); ?>" placeholder="请填写用户名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo ($password); ?>" placeholder="请填写密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkCode" class="col-sm-3 control-label">验证码：</label>
                            <div class="col-sm-9">
                                <div class="checkCode-wrap">
                                    <input type="text" class="form-control" id="checkCode" name="checkCode" placeholder="请填写验证码">
                                </div>
                                <img class="pull-right checkcode-img" src="<?php echo U('getCheckCode');?>" alt="验证码" onclick="this.src='<?php echo U('getCheckCode');?>?t='+new Date().getTime()"/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-login btn-block">登录</button>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="text-center company-info">
                <h4>Copyright &copy; 2015-2016 <a href="#" target="_blank">Design By 冷滨</a> </h4>
            </div>
        </div>
    </form>
</div>

<script src="/graduation/Public/admin/js/jquery-1.11.3.min.js"></script>
<script src="/graduation/Public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function checkLogin(){
        if($('#username').val()==''){
            alert("用户名不允许为空！");
            $('#username').focus();
            return false;
        }
        if($('#password').val()==''){
            alert("密码不允许为空！");
            $('#password').focus();
            return false;
        }
        if($('#checkCode').val()==''){
            alert("验证码不允许为空！");
            $('#checkCode').focus();
            return false;
        }
    }
</script>
</body>
</html>