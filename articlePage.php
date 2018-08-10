<?php
include 'navBar.php';
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/8/10
 * Time: 14:05
 */
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
    <style>

        .page{
            z-index: 1;
            /*height:4000px;*/
            width:100%;
            /*position: absolute;*/
            background: url("static/assets/img/wallhaven-671087.jpg") no-repeat fixed;
            background-size:100% 400px;
        }
        .articleBox{
            position: relative;
            top:400px;
            width:100%;
            height: 100%;
            z-index: 2;
            background-color: #F4EFE9;
        }
        .titleBox{
            position:absolute;
            height:130px;
            background-color: #FFF;
            left:50%;
            transform: translate(-50%,-50%);
            box-shadow: 0 0 1px 1px rgba(0,0,0,.1);
            text-align: center;
        }
        .articleContent{
            position:relative;
            transform:translateX(-50%);
            left:50%;
            /*height:2000px;*/
            background-color:#FFF;
            margin-top:75px;
            box-shadow: 0 0 1px 1px rgba(0,0,0,.1);
            text-indent: 1em
        }
        .titleTree{
            position:absolute;
            top:480px;
            display: block;
            z-index: 1;
            transition: .1s ease-in 0s;
        }
        .titleTree ul{
        }
        .fixed{
            position:fixed;
            top:65px;

        }

        .active{
            border-left: 2px solid darkseagreen;
            background-color: rgba(0,0,0,.1);
        }

        .titleTree a{
            color:grey;
            box-sizing:content-box!important;
            display: block;
            width:130px;
        }
        .titleTreeLeft{
            left:7%;
        }
        .commentBox{
            min-height: 200px;
            background-color: whitesmoke;
            left:50%;
            transform: translateX(-50%);
            margin-top: 1%;
            box-shadow: 0 0 1px 1px rgba(0,0,0,.1);
        }
        .comments{
            min-height: 200px;
            background-color: whitesmoke;
            left:50%;
            transform: translateX(-50%);
            margin-top: 10%;
            box-shadow: 0 0 1px 1px rgba(0,0,0,.1);
        }
        .row{
            margin-left:0;
        }
        .comments p{
            text-indent: 2em;
        }
        .comments a{
            position:absolute;
            right:10px;
            bottom:10px;
        }
        .commentTime{
            position:absolute;
            left:10px;
            bottom:10px;
        }
        @font-face {
            font-family: 'iconfont';
            src: url('static/assets/fonts/iconfont.eot');
            src: url('static/assets/fonts/iconfont.eot?#iefix') format('embedded-opentype'),
            url('static/assets/fonts/iconfont.woff') format('woff'),
            url('static/assets/fonts/iconfont.ttf') format('truetype'),
            url('static/assets/fonts/iconfont.svg#iconfont') format('svg');
        }
        .iconfont{
            font-family:"iconfont" !important;
            font-size:28px;font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            position:absolute;
            display: block;
            left:50%;
            margin-left: -14px;
            top: 50%;
            margin-top:-40%;
            color:#F4EFE9;
        }
        .goTop{
            position:fixed;
            bottom:5%;
            right:10%;
            background-color:rgba(0,0,0,.1);
            width:50px;
            height:30px;
            cursor: pointer;
            display: none;
            border-radius: 5%;
            transition: .1s ease-in 0s;
        }
        .goTop:hover{
            background-color:rgba(0,0,0,.2)
        }
        .goTopLeft{
            right:25%;
        }
        .articleContent img{
            max-width: 100%;
        }



    </style>
</head>
<body data-spy="scroll" data-target=".titleTree">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.js"></script>
<script src="static/assets/js/navBar.js"></script>

<nav class="titleTree col-sm-1 col-2 titleTreeLeft animated">
    <ul class="nav ">
    </ul>
</nav>
<div class="page">
    <div class="articleBox row">

        <div class="titleBox col-7 text-center py-4">
            <div class="page-header">
                <h1>起不来会把闹</h1>
                <small>来自:</small>
                <small>泛银河系含漱爆破液</small>
                <small>创建于:2018-08-10 09:59:13</small>
                <small>阅读数:99</small>
        </div>
        </div>
        <div class="articleContent col-7 py-4">

            <p>我读书比大多数人都早，工作一年到现在是还没有满23岁的。我很庆轻基本一无所有。</p>
            <p>我2017年本科毕业于华中农业大学，迫于家庭压力，大学学的专业叫应用化学。大二发现自己对化学毫无兴趣。我很庆幸，庆幸自己没想过去培训班、转专业或者跨专业考研。</p>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <p>我曾想过做设计，后来发现画画就跟写字一样，上十年才能达到一定的境界。</p>
            <p>我向往德国、日本的教育，德国是以专科为主，学好了技术就能找到不错的工作；日本则是高中毕业就能工作。在中国专科或者高中毕业想找到好的工作基本不可能。</p>
            <p>在GitHub上看到过一个97年的日本小兄弟已经600+个follower了，满是羡慕。</p>
            <img src="https://img-blog.csdn.net/20180701152611176?watermark/2/text/aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L1NsYXJ0aWJhcnRmYXN0/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70" alt="">
            <p>我是强迫症患者，早上起不来会把闹钟放在离床头很远的地方；看见写乱的代码会忍不住去改。</p>
            <h2 >收获为什么要清楚他妈的</h2>
            <ol>
                <li>做了这个博客</li>
                <li>黄冈半年游，北京三月游</li>
                <li>一群朋友</li>
                <li>如何管理，如何协作</li>
                <li>如何学习</li>
                <li>多说无益</li>
                <li>多做无益</li>
                <li>眼界</li>
            </ol>
            <h2 >未来的建议</h2>
            <ol>
                <li>坐自动扶梯不要站着不动</li>
                <li>坐车的时候看掘金</li>
                <li>做东西之前先思考</li>
                <li>造轮子</li>
                <li>多写博客</li>
                <li>保持创造力</li>
                <li>学好英语</li>
                <li>清楚原理</li>
                <li>锻炼文笔</li>
                <li>全面发展</li>
        </div>
        <div class="commentBox col-7 mt-3;">
            <div class="col-12 py-3">
                <h4>评论</h4>
            </div>

            <form action="" method="post" enctype="multipart/form-data"></form>
            <div class="form-group ">
                <label for="name"></label>
                <input type="text" class="form-control" id="nickName" name="nickName" autocomplete="off" placeholder="昵称">
            </div>
            <div class="form-group">
                <label for="comment"></label>
            <textarea  class="form-control " rows="5" name="comment" id="comment" placeholder="说点什么吧"></textarea>
            </div>

        </div>
        <div class="comments col-7 mt-3 py-3">
            <span class="text-right">#1  </span> <span>name:</span>
            <hr>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <small class="commentTime font-weight-light text-muted">2018-08-10 09:59:13</small><a href="#">回复</a>
        </div>
        <div class="comments col-7 mt-3 py-3">
            <span class="text-right">#1  </span> <span>name:</span>
            <hr>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <small class="commentTime font-weight-light text-muted">2018-08-10 09:59:13</small><a href="#">回复</a>
        </div>
        <div class="comments col-7 mt-3 py-3">
            <span class="text-right">#1  </span> <span>name:</span>
            <hr>
            <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
            <small class="commentTime font-weight-light text-muted">2018-08-10 09:59:13</small><a href="#">回复</a>


        </div>


        </div>



</div>
<div  class='goTop'>
    <span class="iconfont"></span>
</div>

<script>
    //创建锚点
    for(var count=0;count<$(':header').length;count++){
        var count2=count+1;
        $(':header').eq(count).attr('id','section'+count2);
        href='#'+'section'+count2,
            inner=$(':header').eq(count).text();
        $('.titleTree ul').append("<li class='nav-item'><a class='nav-link'></a></li>");
        var that=$('.titleTree ul a');
        that.eq(count).attr('href',href);
        that.eq(count).text(inner);
    }

    $(function () {
        $(window).scroll(function () {
            var winTop = $(window).scrollTop();
            if (winTop >= 340) {
                $('.navbar-brand').addClass('fadeOut').text('起不来会把闹').removeClass('fadeOut').addClass('fadeIn')
                $('.titleTree').addClass('fixed fadeInUp')
            }

        else {
            $('.navbar-brand').text("Slartbartfast's Blog").removeClass('fixed fadeIn');
            $('.titleTree').removeClass('fixed fadeInUp');
        }if(winTop>600){
            $('.goTop').fadeIn(300);
            }
            else{
                $('.goTop').fadeOut();
            }


        });
    });

//点击回到顶部

    $('.goTop').on('click',function(){
       $(' body').animate({'scrollTop':0},200);
    });

    $('.openNav').on('click',(function () {
        $('.titleTree').toggleClass('titleTreeLeft');
        $('.goTop').toggleClass('goTopLeft');
    }));


</script>
<script>

</script>

</body>
</html>
