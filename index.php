<?php
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/8/8
 * Time: 15:41
 */ ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /*.navbar{*/
        /*position:fixed;*/
        /*}*/
        .carousel-inner img {
            width: 100%;
            display: block;
            height: 400px;
        }

        /*.navbar{*/
        /*background-color: #dddddd*/
        /*}*/
        .contentBox {
            height: 400px;
            box-shadow: 3px 3px 20px 1px rgba(0, 0, 0, .1);
            margin-top: 20px;
            transition: .2s ease;
            padding: 0;
            /*display: none;*/
        }

        .contentBox:hover {
            margin-left: -1px;
            box-shadow: 0px 0px 20px 10px rgba(0, 0, 0, .1)
        }

        .navbar {
            position: fixed;
            height: 60px;
            width: 100%;
            z-index: 999;
            /*background-color:rgba(0,0,0,0);*/
        }

        .navWrap {
            position: absolute;
            width: 100%;
            height: 60px;
            background-color: rgba(0, 0, 0, 0);
            left: 0;
            transition:.5s ease ;

        }

        .navbar-nav {
            z-index: 998;

        }
        .opacity1{
            background-color: #F8F9FA;
            box-shadow: 0 0 20px 1px rgba(0,0,0,.1);
        }
        .titleImg{
            width: 100%;
            height:100%;
        }
        .titleImg img{
            height:100%;
            width:100%;
        }
        .title{
            position:absolute;
            width:100%;
            height:100px;
            background-color: rgba(0,0,0,.3);
            top:300px;
            color:whitesmoke;
        }


    </style>
</head>
<body >
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.js"></script>
<header>
    <div class="navbar navbar-expand-sm navbar-light">
        <div class="navWrap">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div id="demo" class="carousel slide" data-ride="carousel">
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
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="row">
            <div class="col-8 contentBox">
                <div class="titleImg">
                    <img src="static/assets/img/wallhaven-644594.jpg" alt="" class="img-fluid">
                </div>
                <div class="title">
                    <h1 class="display-5">基金欧达数码卡拉</h1>
                </div>

            </div>
            <div class="col-8 contentBox">

            </div>
            <div class="col-8 contentBox">

            </div>
            <div class="col-8 contentBox">

            </div>
        </div>

    </div>


</main>
<script>
    //轮播图定时
    $('.carousel').carousel({interval: 3000});


    //导航栏固定
    $(function () {
        $(window).scroll(function () {
            var winTop = $(window).scrollTop();
            if (winTop >= 340) {
                $('.navWrap').addClass('opacity1')
            } else {
                $('.navWrap').removeClass('opacity1')
            }
        });
    });

</script>
</body>
</html>
