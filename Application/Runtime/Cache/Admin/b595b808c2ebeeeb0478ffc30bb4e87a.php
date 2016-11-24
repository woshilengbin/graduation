<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深智电科技后台管理系统</title>
    <link href="/graduation/Public/admin/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/graduation/Public/admin/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/graduation/Public/admin/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
    <link href="/graduation/Public/admin/css/layout.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/graduation/Public/admin/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
    <!--[if IE]>
    <link href="/graduation/Public/admin/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->

    <!--[if lt IE 9]><script src="/graduation/Public/admin/js/speedup.js" type="text/javascript"></script><script src="/graduation/Public/admin/js/jquery-1.11.3.min.js" type="text/javascript"></script><![endif]-->
    <!--[if gte IE 9]><!--><script src="/graduation/Public/admin/js/jquery-2.1.4.min.js" type="text/javascript"></script><!--<![endif]-->

    <script src="/graduation/Public/admin/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/jquery.json.min.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/jquery.validate.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/jquery.bgiframe.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/xheditor/xheditor-1.2.2.min.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/uploadify/scripts/jquery.uploadify.js" type="text/javascript"></script>

    <script src="/graduation/Public/admin/js/dwz.core.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.util.date.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.validate.method.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.barDrag.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.drag.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.tree.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.accordion.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.ui.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.theme.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.switchEnv.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.alertMsg.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.contextmenu.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.navTab.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.tab.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.resize.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.dialog.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.dialogDrag.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.sortDrag.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.cssTable.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.stable.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.taskBar.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.ajax.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.pagination.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.database.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.datepicker.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.effects.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.panel.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.checkbox.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.history.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.combox.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/dwz.print.js" type="text/javascript"></script>

    <!-- 可以用dwz.min.js替换前面全部dwz.*.js (注意：替换时下面dwz.regional.zh.js还需要引入)
    <script src="bin/dwz.min.js" type="text/javascript"></script>
    -->
    <script src="/graduation/Public/admin/js/dwz.regional.zh.js" type="text/javascript"></script>
    <script src="/graduation/Public/admin/js/app.js" type="text/javascript"></script>

    <style type="text/css">
        #header .nav {
            margin-top: 15px;
            margin-right: 25px;
        }
        .accordion .accordionContent {
            background-color: #D4E5DF;
        }
    </style>
    <script type="text/javascript">
        $(function(){
            DWZ.init("/graduation/Public/admin/dwz.frag.xml", {
                statusCode:{ok:200, error:300, timeout:301}, //【可选】
                pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
                keys: {statusCode:"statusCode", message:"message"}, //【可选】
                ui:{hideMode:'offsets'}, //【可选】hideMode:navTab组件切换的隐藏方式，支持的值有’display’，’offsets’负数偏移位置的值，默认值为’display’
                debug:true,	// 调试模式 【true|false】
                callback:function(){
                    initEnv();
                    $("#themeList").theme({themeBase:"themes"}); // themeBase 相对于index页面的主题base路径
                }
            });
        });
    </script>
</head>

<body scroll="no">
<div id="layout">
    <div id="header">
        <div class="headerNav">
            <a class="logo" href="http://www.zidoo.tv"></a>
            <ul class="nav">
                <li class="color-white">欢迎使用，<?php echo ($user["username"]); ?></li>
                <li><a href="<?php echo U('clearAdminCache');?>" target="ajaxTodo">清除缓存</a></li>
                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
            </ul>
            <!--<ul class="themeList" id="themeList">-->
                <!--<li theme="default"><div class="selected">蓝色</div></li>-->
                <!--<li theme="green"><div>绿色</div></li>-->
                <!--&lt;!&ndash;<li theme="red"><div>红色</div></li>&ndash;&gt;-->
                <!--<li theme="purple"><div>紫色</div></li>-->
                <!--<li theme="silver"><div>银色</div></li>-->
                <!--<li theme="azure"><div>天蓝</div></li>-->
            <!--</ul>-->
        </div>

        <!-- navMenu -->

    </div>

    <div id="leftside">
        <div id="sidebar_s">
            <div class="collapse">
                <div class="toggleCollapse"><div></div></div>
            </div>
        </div>
        <div id="sidebar">
            <div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

            <div class="accordion" fillSpace="sidebar">
                <?php if(is_array($sysMenuList)): $i = 0; $__LIST__ = $sysMenuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sysMenuItem): $mod = ($i % 2 );++$i; if(count($sysMenuItem['sonList']) > 0): ?><div class="accordionHeader">
                            <h2><span><?php if(!empty($sysMenuItem["icon"])): ?><img src="/graduation/<?php echo ($sysMenuItem["icon"]); ?>"/><?php else: ?>Folder<?php endif; ?></span><?php echo ($sysMenuItem["title"]); ?></h2>
                        </div>
                        <div class="accordionContent">
                            <ul class="tree">
                                <?php if(is_array($sysMenuItem["sonList"])): $i = 0; $__LIST__ = $sysMenuItem["sonList"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuItem): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($menuItem['url']);?>" target="navTab" rel="<?php echo ($menuItem["rel"]); ?>"><?php echo ($menuItem["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div id="container">
        <div id="navTab" class="tabsPage">
            <div class="tabsPageHeader">
                <div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
                    <ul class="navTab-tab">
                        <li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
                    </ul>
                </div>
                <div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
                <div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
                <div class="tabsMore">more</div>
            </div>
            <ul class="tabsMoreList">
                <li><a href="javascript:;">我的主页</a></li>
            </ul>
            <div class="navTab-panel tabsPageContent layoutBox">
                <div class="page unitBox">
                    <div class="pageContent">
                        <div class="padding10">
                            <div class="panel" style="width: 700px;margin: 0 auto;">
                                <h1>系统信息</h1>
                                <div>
                                    <table class="list" width="100%">
                                        <tbody>
                                        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                                <td><?php echo ($key); ?></td>
                                                <td><?php echo ($item); ?></td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<div id="footer">Copyright &copy; 2015-2016 深智电科技</div>
</body>
</html>