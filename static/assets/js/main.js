

// 导航栏固定
$(function () {
    $(window).scroll(function () {
        var winTop = $(window).scrollTop();
        if (winTop >= 340) {
            $('.navWrap').addClass('opacity1 nav-light');
            $('.openNav>div').css({'background-color':'#7C7C7D'});
        } else {
            $('.navWrap').removeClass('opacity1 nav-light');
            $('.openNav>div').css({'background-color':''});
        }
    });
});

//WOW插件初始化
new WOW().init();


//侧边栏按钮
$('.openNav').click(function () {
    $('.iconAfter').toggleClass('afterDeg');
    $('.iconBefore').toggleClass('beforeDeg');
    $('.icon').toggleClass('opacity0');
    $('.sideNav').toggleClass('sideNavSlide');
    $('.page').toggleClass('pageScale');
    $('.avatarBox').toggleClass('bounceInRight')

});
