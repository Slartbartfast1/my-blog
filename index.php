<?php
include 'navBar.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
</head>
<body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.js"></script>

<div class="page">
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- 指示符 -->
<!--    <ul class="carousel-indicators pb-3">-->
<!--        <li data-target="#demo" data-slide-to="0" class="active"></li>-->
<!--        <li data-target="#demo" data-slide-to="1"></li>-->
<!--        <li data-target="#demo" data-slide-to="2"></li>-->
<!--        <li data-target="#demo" data-slide-to="3"></li>-->
<!--        <li data-target="#demo" data-slide-to="4"></li>-->
<!--    </ul>-->

    <!-- 轮播图片 -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="static/assets/img/wallhaven-671087.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="static/assets/img/wallhaven-671087.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="static/assets/img/wallhaven-671087.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="static/assets/img/wallhaven-671087.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="static/assets/img/wallhaven-671087.jpg" class="img-fluid">
        </div>
    </div>

    <!-- 左右切换按钮 -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<main>


    <!--        <div class="row">-->
    <div class="content">
        <div class="col-12 contentBox wow animated fadeIn" data-wow-duration="1s">
            <div class="titleImg">
                <img src="static/assets/img/wallhaven-671087.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>

            </div>

        </div>
        <div class="col-12 contentBox wow  animated fadeIn">
            <div class="titleImg">
                <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>
            </div>

        </div>
        <div class="col-12 contentBox wow animated fadeIn">
            <div class="titleImg">
                <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>
            </div>

        </div>
        <div class="col-12 contentBox wow  animated fadeIn">
            <div class="titleImg">
                <img src="static/assets/img/wallhaven-671087.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>
            </div>

        </div>
    </div>


    <div class="d-flex justify-content-around categories">
        <div class=" categoriey1"></div>
        <div class=" categoriey2"></div>
        <div class=" categoriey3"></div>
    </div>
    <div class="footer">
    </div>
</main>
</div>
<!--TODO:优化布局    分页系统   头像点击显示信息   文章阅读界面-->
<script>
    //轮播图定时
    $('.carousel').carousel({interval: 3000});

    //页面布局
    // $('.contentBox:odd').css({left: '20%'});
    // $('.contentBox:even').css({left: '10%'});
    $('.contentBox').css({left: '15%'});
    // console.log($('.contentBox').offset().top); 获取相对文档的高度
    // var windowHeight=$(window).height();
    // $('.sideNav').css({height:windowHeight+80});

</script>

<script src="static/assets/js/main.js"></script>
</body>
</html>
