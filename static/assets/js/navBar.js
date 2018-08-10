//轮播图定时



// 导航栏固定
$(function () {
    $(window).scroll(function () {
        var winTop = $(window).scrollTop();
        if (winTop >= 340) {
            $('.navWrap').addClass('opacity1');
            $('.openNav>div').css({'background-color':'#7C7C7D'});
        } else {
            $('.navWrap').removeClass('opacity1');
            $('.openNav>div').css({'background-color':''});
        }
    });
});

//WOW插件初始化
new WOW().init();


//侧边栏按钮
//侧边栏按钮
$('.openNav').on('click',function () {
    $('.iconAfter').toggleClass('afterDeg');
    $('.iconBefore').toggleClass('beforeDeg');
    $('.icon').toggleClass('opacity0');
    $('.sideNav').toggleClass('sideNavSlide');
    $('.page').toggleClass('pageScale');
    $('.avatarBox').toggleClass('bounceInRight');
    $('.navWrap').toggleClass('text-center');
    $('.navbar-brand').toggleClass('navbarBrandLeft')

});


// $('.contentBox:odd').css({left: '20%'});
// $('.contentBox:even').css({left: '10%'});
// console.log($('.contentBox').offset().top); 获取相对文档的高度
// var windowHeight=$(window).height();
// $('.sideNav').css({height:windowHeight+80});