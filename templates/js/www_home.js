/**
 * @author: zyh
 * @see: <a href="mailto:jikeytang@gmail.com">zyh</a>
 * @time: 2013-6-17 下午8:14
 * @info:
 */

$(function(){

    setSwipe($('#mySwipe'), { leftBtn : $('#swipeLeft'), rightBtn : $('#swipeRight') });
});

/**
 * 图片轮换
 * @param obj
 * @param options
 */
function setSwipe(obj, options){
    var opts = $.extend({}, {
            auto: 3000,
            disableScroll: true,
            leftBtn : '',
            rightBtn : ''
        }, options),
        leftBtn = opts.leftBtn,
        rightBtn = opts.rightBtn,
        slide = null;

    if(obj.length > 0){
        slide = obj.Swipe(opts).data('Swipe');
    }

    if(opts.leftBtn.length > 0 && opts.rightBtn.length > 0){
        opts.leftBtn.on('click', slide.prev);
        opts.rightBtn.on('click', slide.next);
    }
}










