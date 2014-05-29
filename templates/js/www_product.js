/**
 * @author: zyh
 * @see: <a href="mailto:jikeytang@gmail.com">zyh</a>
 * @time: 2013-6-17 下午8:14
 * @info:
 */

$(function(){

    // 在线产品
    $('#proIntroMenu').utilTab({
        tag     : '.intro-menu-list li',
        subName : '.pro-intro-items'
    });

    // 在线产品
    $('#proStateNav').utilTab({
        tag     : '.pro-state-list li',
        subName : '.pro-zixi-items'
    });

    $('#proStateNav').imgSlider({
        num : 5,
        auto : false
    });

    chanceFind();
    resNav();
    devFind();

    // 产品项目
    $('#projectStateNav').imgSlider({
        num : 4,
        auto : false
    });

    $('#xyCase').imgSlider({
        num : 5,
        auto : false
    });

    $('#projectStateNav').utilTab({
        tag     : '.project-state-list li',
        subName : '.pro-zixi-items'
    });

});

// 产品资源库
function chanceFind(){
    var chance = $('#proChanceFind'),
        model = chance.find('.pro-chance-model dd'),
        doing = chance.find('.chance-model-doing'),
        items = chance.find('.chance-waiting-items'),
        sub = chance.find('.model-doing-list li'),
        idx = 0;

    model.on('click', function(){
        doing.hide();
        $(this).find('.chance-model-doing').show();

        items.hide();
        items.eq(idx).show();
//        $(this).find('li').removeClass('on').eq(0).addClass('on');
    });

    sub.on('click', function(){
        items.hide();

        $(this).siblings().removeClass('on').find('.chance-waiting-items').show();
        $(this).addClass('on');
        idx = sub.index(this);
        items.eq(idx).show();
    });

}

// resource
function resNav(){
    var wrap = $('#resMainContent'),
        li = wrap.find('li'),
        items = wrap.find('.res-chance-items'),
        idx = 0;

    li.each(function(index, ele){
        $(this).on('click', function(){
            li.removeClass('on');
            $(this).addClass('on');
            items.hide();
            items.eq(index).show();
        });
    });

}

// dev
function devFind(){
    var wrap = $('#xyAccordion'),
        li = wrap.find('li'),
        btn = wrap.find('.accordion-show-btn'),
        topEle = null,
        nextEle = null;

    li.on('click', function(){
        $('.xy-accordion-no').show();
        $('.xy-accordion-yes').hide();
        topEle = $(this).find('.xy-accordion-no');
        nextEle = $(this).find('.xy-accordion-no').next();
        li.removeClass('on');
        li.css({ width : 100, padding : 0});
        topEle.hide();
        nextEle.show();
        $(this).find('.xy-accordion-yes').show();
        $(this).addClass('on').closest('ul').addClass('xy-accordion-open');
        $(this).css({ width : 630 });
    });
}










