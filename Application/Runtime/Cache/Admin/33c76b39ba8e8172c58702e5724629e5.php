<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
    .searchBar .textInput {
        margin-right: 10px;
        margin-left: 10px;
    }
    .grid .gridCol {
        text-align: center;
    }
    .grid .gridTbody td div {
        text-align: center;
    }
</style>
    <form id="pagerForm" method="post" action="<?php echo U('apkList');?>">
    <input type="hidden" name="pageNum" value="<?php echo ($curPage); ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo ($pageSize); ?>" />
    <input type="hidden" name="orderField" value="<?php echo ($orderField); ?>" />
    <input type="hidden" name="orderDirection" value="<?php echo ($orderDirection); ?>" />
</form>
<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="<?php echo U(apkList);?>" method="post">
        <div class="searchBar">
            <ul class="searchContent">
                <li>
                    <label>关键字:</label>
                    <input class="textInput" name="keyword" value="<?php echo ($keyword); ?>" type="text">
                    <button type="submit">查询</button>
                </li>
            </ul>
        </div>
    </form>
</div>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="<?php echo U('addApk');?>" target="dialog" mask="true" title="添加Apk" height="450"><span>添加</span></a></li>
            <li><a class="edit" href="<?php echo U('editApk');?>?id={apk_id}" mask="true" target="dialog" title="修改Apk" height="450"><span>修改</span></a></li>
            <li><a class="delete" href="<?php echo U('deleteApk');?>?id={apk_id}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
        </ul>
    </div>
    <table class="table" width="100%" layoutH="150">
        <thead>
        <tr>
            <th>Uploader </th>
            <th>应用图标</th>
            <th orderField="name" <?php if(($orderDirection) == "asc"): ?>class="asc"<?php else: ?>class="desc"<?php endif; ?>>应用名称</th>
            <th orderField="package" <?php if(($orderDirection) == "asc"): ?>class="asc"<?php else: ?>class="desc"<?php endif; ?>>包名</th>
            <th orderField="size" <?php if(($orderDirection) == "asc"): ?>class="asc"<?php else: ?>class="desc"<?php endif; ?>>文件大小</th>
            <th>版本号</th>
            <th>sdk</th>
            <th>code</th>
            <th>开发商</th>
            <th>备注</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listItem): $mod = ($i % 2 );++$i;?><tr target="apk_id" rel="<?php echo ($listItem["id"]); ?>">
            <td><?php if(($listItem["uid"]) == "0"): ?>System<?php else: echo ($listItem["member"]["username"]); endif; ?></td>
            <td><?php if(!empty($listItem["icon"])): ?><img class="icon" src="/graduation/<?php echo ($listItem["icon"]); ?>"/><?php endif; ?></td>
            <td><?php echo ($listItem["name"]); ?></td>
            <td><?php echo ($listItem["package"]); ?></td>
            <td><?php echo (byteFormat($listItem["size"])); ?></td>
            <td><?php echo ($listItem["version"]); ?></td>
            <td><?php echo ($listItem["sdk"]); ?></td>
            <td><?php echo ($listItem["code"]); ?></td>
            <td><?php echo ($listItem["develope"]); ?></td>
            <td><?php echo ($listItem["remark"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="10" <?php if(($pageSize) == "10"): ?>selected<?php endif; ?>>10</option>
                <option value="15" <?php if(($pageSize) == "15"): ?>selected<?php endif; ?>>15</option>
                <option value="20" <?php if(($pageSize) == "20"): ?>selected<?php endif; ?>>20</option>
                <option value="25" <?php if(($pageSize) == "25"): ?>selected<?php endif; ?>>25</option>
            </select>
            <span>条，共<?php echo ($pageCount); ?>条</span>
        </div>

        <div class="pagination" targetType="navTab" totalCount="<?php echo ($pageCount); ?>" numPerPage="<?php echo ($pageSize); ?>" pageNumShown="<?php echo ($pageSize); ?>" currentPage="<?php echo ($curPage); ?>"></div>

    </div>
</div>