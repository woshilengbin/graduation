<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <?php if(checkAccess($user,'addSysMenu') == true): ?><li><a class="add" href="<?php echo U('addSysMenu');?>" target="dialog" mask="true"><span>系统菜单</span></a></li><?php endif; ?>
            <?php if(checkAccess($user,'addSysMenuCate') == true): ?><li><a class="add" href="<?php echo U('addSysMenuCate');?>" target="dialog" mask="true" height="400"><span>菜单类别</span></a></li><?php endif; ?>
        </ul>
    </div>
    <table class="table" width="100%" layoutH="138">
        <thead>
        <tr>
            <th>菜单名</th>
            <th>访问地址</th>
            <th>引用rel</th>
            <th>排序值</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listItem): $mod = ($i % 2 );++$i;?><tr <?php if(($listItem["status"]) == "0"): ?>class="color-red"<?php endif; ?>>
                <td>|-<?php $__FOR_START_4963__=1;$__FOR_END_4963__=$listItem["level"];for($i=$__FOR_START_4963__;$i < $__FOR_END_4963__;$i+=1){ ?>---<?php } echo ($listItem["title"]); ?>&nbsp;</td>
                <td><?php echo ($listItem["url"]); ?></td>
                <td><?php echo ($listItem["rel"]); ?></td>
                <td><?php echo ($listItem["sort"]); ?></td>
                <td><?php if(($listItem["status"]) == "1"): ?>启用中<?php else: ?>禁用中<?php endif; ?></td>
                <td>
                    <?php if(($listItem["level"]) == "1"): if(checkAccess($user,'editSysMenuCate') == true): ?><a href="<?php echo U('editSysMenuCate',array('id'=>$listItem['id']));?>" target="dialog" height="400">[编辑]</a><?php endif; ?>
                        <?php if(empty($listItem["isHasSon"])): if(checkAccess($user,'deleteSysMenuCate') == true): ?><a href="<?php echo U('deleteSysMenuCate',array('id'=>$listItem['id']));?>" target="ajaxTodo" title="确定要删除吗？">[删除]</a><?php endif; endif; ?>
                        <?php else: ?>
                        <?php if(checkAccess($user,'editSysMenu') == true): ?><a href="<?php echo U('editSysMenu',array('id'=>$listItem['id']));?>" target="dialog">[编辑]</a><?php endif; ?>
                        <?php if(checkAccess($user,'deleteSysMenu') == true): ?><a href="<?php echo U('deleteSysMenu',array('id'=>$listItem['id']));?>" target="ajaxTodo" title="确定要删除吗？">[删除]</a><?php endif; endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>