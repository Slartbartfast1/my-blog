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
    $('.iconAfter').toggleClass('afterDeg');            //旋转45度
    $('.iconBefore').toggleClass('beforeDeg');          //旋转45度
    $('.icon').toggleClass('opacity0');                 //透明
    $('.sideNav').toggleClass('sideNavSlide')     ;     //侧边栏移动
    $('.page').toggleClass('pageScale');                //页面移动
    $('.avatarBox').toggleClass('bounceInRight');       //头像晃动
    $('.navWrap').toggleClass('text-center');           //宽时logo居中
    $('.navbar-brand').toggleClass('navbarBrandLeft')   //窄时logo居中
});
