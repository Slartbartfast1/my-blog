

// 导航栏固定
$(function () {
    $(window).scroll(function () {
        var winTop = $(window).scrollTop();
        if (winTop >= 340) {
            $('.navWrap').addClass('opacity1 nav-light');
            $('.openNav>div').addClass('grey');
        } else {
            $('.navWrap').removeClass('opacity1 nav-light');
            $('.openNav>div').removeClass('grey');
        }
    });
});

//WOW插件初始化
new WOW().init();


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

//轮播图定时
$('.carousel').carousel({interval: 5000});

//二维码

