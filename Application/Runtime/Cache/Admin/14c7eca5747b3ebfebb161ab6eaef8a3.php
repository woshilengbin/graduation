<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
    <form method="post" action="<?php echo U('addSysMenuCate');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <fieldset>
                <legend>菜单信息</legend>
                <p>
                    <label>图标：</label>
                    <span id="icon-show"></span>
                    <input id="icon" name="icon" type="text"/>
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
                    <input id="title" name="title" type="text" required/>
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