<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
    <form method="post" action="<?php echo U('editSysMenuCate');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <fieldset>
                <legend>菜单信息</legend>
                <p>
                    <label>图标：</label>
                    <span id="icon-show"><?php if(!empty($menuCate["icon"])): ?><img src="/graduation/<?php echo ($menuCate["icon"]); ?>"><?php endif; ?></span>
                    <input id="icon" name="icon" type="text" value="<?php echo ($menuCate["icon"]); ?>"/>
                </p>
                <p>
                    <input id="uploadIcon" name="file" type="file" uploaderOption="{
                        swf:'/graduation/Public/admin/uploadify/scripts/uploadify.swf',
                        uploader:'<?php echo U('uploadIconToTemp');?>',
                        formData:{<?php echo session_name();?>:'<?php echo session_id();?>'},
                        buttonText:'修改图标',
                        fileSizeLimit:'2Mb',
                        fileTypeDesc:'*.jpg;*.png;*.bmp;*.gif;*.jpeg;',
                        fileTypeExts:'*.jpg;*.png;*.bmp;*.gif;*.jpeg;',
                        auto:true,
                        multi:false,
                        onUploadSuccess:uploadifyIconSuccess,
                        onQueueComplete:uploadifyQueueComplete
                    }"/>
                </p>
                <p>
                    <label>菜单标题：</label>
                    <input id="title" name="title" type="text" value="<?php echo ($menuCate["title"]); ?>" required/>
                </p>
                <p>
                    <label>排序：</label>
                    <input id="sort" name="sort" type="text" value="<?php echo ($menuCate["sort"]); ?>"/>
                </p>
                <p>
                    <label>状态：</label>
                    <input type="radio" name="status" value="1" <?php if(($menuCate["status"]) == "1"): ?>checked<?php endif; ?>> 启用&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" <?php if(($menuCate["status"]) == "0"): ?>checked<?php endif; ?>> 禁用
                </p>
                <input type="hidden" name="id" value="<?php echo ($menuCate["id"]); ?>">
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
<script type="text/javascript">
    function uploadifyIconSuccess(file, data, response){
        data= $.evalJSON(data);
        if(data.statusCode==200){
            $('#icon').val(data.icon);
            $('#icon-show').html('<img src="'+data.iconPath+'"/>');
        }else{
            alertMsg.error(data.message);
        }
    }
    function uploadifyQueueComplete(queueData){}
</script>