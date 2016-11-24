/**
 * 折叠菜单
 */
function collapsePanel(){
    $('.collapse-panel a[data-role="collapse"]').on('click',function(){
        var parent=$(this).parent().parent();
        parent.addClass('active');
        parent.siblings('.active').removeClass('active');
        return false;
    });
}
/**
 * table传递多个参数的回调方法
 * @returns {{setParams: Function}}
 */
/*
function trCallback(){
    return {
        "setParams":function($grid,$this){
            var sTarget=$this.data('key1');
            if (sTarget&&$("#"+sTarget, $grid).size() == 0) {
                $grid.prepend('<input id="'+sTarget+'" type="hidden" />');
            }
            $("#"+sTarget, $grid).val($this.data("value1"));
        }
    };
}*/
