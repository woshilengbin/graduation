<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
    <form method="post" action="<?php echo U('addSysMenu');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <fieldset>
                <legend>菜单信息</legend>
                <p>
                    <label>菜单分类：</label>
                    <select name="pid">
                        <?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cateItem): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cateItem["id"]); ?>"><?php echo ($cateItem["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </p>
                <p>
                    <label>菜单标题：</label>
                    <input id="title" name="title" type="text" required/>
                </p>
                <p>
                    <label>访问URL：</label>
                    <input id="url" name="url" type="text" required/>
                </p>
                <p>
                    <label>引用rel：</label>
                    <input id="rel" name="rel" type="text" required/>
                </p>
                <p>
                    <label>排序：</label>
                    <input id="sort" name="sort" type="text"/>
                </p>
                <p>
                    <label>状态：</label>
                    <input type="radio" name="status" value="1" checked> 启用&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0"> 禁用
                </p>
            </fieldset>
        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>