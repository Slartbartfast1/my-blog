<?php

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
<header>
    <div class="navbar navbar-expand-sm navbar-light">
        <div class="navWrap">
            <a class="navbar-brand" href="#">Slartbartfast's Blog</a>
            <div class="sideNav">
                <div class="avatarBox animated">
                    <div class="avatar text-center">
                        <img src="static/assets/img/3123avatar1.png" alt="" class="img-thumbnail rounded-circle">
                    </div>
                </div>
                <div class="btns text-center">
                    <div class="buttonWarp"><a href="#" class="myActive">首页
                        </a></div>
                    <div class="buttonWarp"><a href="#">分类</a></div>
                    <div class="buttonWarp"><a href="#">音乐台</a></div>
                    <div class="buttonWarp"><a href="#">资源</a></div>
                    <div class="buttonWarp"><a href="#">Github</a></div>
                </div>

                <div class="openNav">
                    <div class="iconBefore"></div>
                    <div class="icon"></div>
                    <div class="iconAfter"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="page">
<div id="demo" class="carousel slide hero" data-ride="carousel">
    <!-- 指示符 -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li>
        <li data-target="#demo" data-slide-to="4"></li>
    </ul>

    <!-- 轮播图片 -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" class="img-fluid">
        </div>
        <div class="carousel-item">
            <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" class="img-fluid">
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
    <div class="container">
        <div class="row">
            <div class="col-4 categoriey1"></div>
            <div class="col-4 categoriey2"></div>
            <div class="col-4 categoriey3"></div>
        </div>
    </div>
    <!--        <div class="row">-->
    <div class="content">
        <div class="col-12 contentBox wow animated fadeInRight" data-wow-duration="1s">
            <div class="titleImg">
                <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>

            </div>

        </div>
        <div class="col-12 contentBox wow  animated fadeInLeft">
            <div class="titleImg">
                <img src="static/assets/img/wallhaven-671087.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>
            </div>

        </div>
        <div class="col-12 contentBox wow animated fadeInRight">
            <div class="titleImg">
                <img src="http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>
            </div>

        </div>
        <div class="col-12 contentBox wow  animated fadeInLeft">
            <div class="titleImg">
                <img src="static/assets/img/wallhaven-671087.jpg" alt="" class="img-fluid">
            </div>
            <div class="title">
                <h1 class="display-5">基金欧达数码卡拉</h1>
            </div>

        </div>
    </div>
    <div class="footer">
    </div>
</main>
</div>
<script>
    //轮播图定时
    $('.carousel').carousel({interval: 3000});

    //页面布局
    $('.contentBox:odd').css({left: '20%'});
    $('.contentBox:even').css({left: '10%'});
    // console.log($('.contentBox').offset().top); 获取相对文档的高度
    var windowHeight=$(window).height();
    $('.sideNav').css({height:windowHeight+80});
</script>
<script src="static/assets/js/main.js"></script>
</body>
</html>
