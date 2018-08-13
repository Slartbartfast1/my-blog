<?php include 'navBar.php';
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/8/11
 * Time: 12:35
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

        .page {
            z-index: 1;
            /*height:4000px;*/
            width: 100%;
            /*position: absolute;*/
            background: url("static/assets/img/wallhaven-3771521.jpg") no-repeat fixed;
            background-size: 100% 450px;

        }

        main {
            position: relative;
            top: 400px;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: #F4EFE9;

        }

        .inTheaterSlide {
            font-size: 0;
            width: 100%;
            height:30vw;
            overflow: hidden;
        }

        .iTSlideBox {
            height: 400px;
            position: relative;
        }

        .inTheaterMovie {
            display: inline-block;
            width: 18vw;
            height: 25vw;
            /*background-color: pink;*/
            margin-left: 2vw;
            font-size: 1vw;
            box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, .1);
            /*position: absolute;*/
        }

        .inTheaterMovie img {
            width: 100%;
            height: 100%;
            display: block;
        }

        .movieName {
            overflow: hidden;
            position: relative;
            background-color: white;
            z-index: 1;
            width: 18vw;
            height: 25%;
            padding-top: 10px;
            /*font-size: 1;*/
        }
        .movieName a{

        }

        .btnGroup {
            position: relative;
            top: 20px;
            left:3%;
            font-size: 16px;
            width: 300px;
            height: 40px;
            z-index: 2;
            right: 0;
        }

        @font-face {
            font-family: 'iconfont';
            src: url('static/assets/fonts/iconfont.eot');
            src: url('static/assets/fonts/iconfont.eot?#iefix') format('embedded-opentype'),
            url('static/assets/fonts/iconfont.woff') format('woff'),
            url('static/assets/fonts/iconfont.ttf') format('truetype'),
            url('static/assets/fonts/iconfont.svg#iconfont') format('svg');
        }

        .iconfont {
            font-family: "iconfont" !important;
            font-size: 28px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            position: absolute;
            display: block;
            color: #7C7C7D;
            height: 40px;
            width: 40px;
        }

        .btnGroup div {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 0;

            cursor: pointer;
        }

        .prev {
            left: 0;

        }

        .next {
            left: 40px;

        }

        .btnGroup div:hover {
            background-color: rgba(0, 0, 0, .1);
        }

        .pageCount {
            left: 100px;
            position: absolute;
            top: 16px;
        }

        .container img {
            height: 80px;
            width: 60px;
        }


    </style>
</head>
<body>
<div class="page">
    <main>
        <h1 class="display-4">正在热映:</h1>
        <hr>
        <div class="inTheaterSlide">
            <div class="iTSlideBox">
<!--                插入正在热映-->
            </div>

        </div>
        <div class="btnGroup mb-4">
            <div class="prev "><span class="iconfont text-center">󰍃</span></div>
            <div class="next "><span class="iconfont text-center">󰍄</span></div>
            <small class="pageCount text-muted"></small>
        </div>
        <h1 class="display-4">排行榜:</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class=" newMovies col-lg-6 col-xs-12">
                    <h5>新片榜</h5>
                    <table class="table table-hover">
                        <thead>
                        <th>海报</th>
                        <th class="text-center">名称</th>
                        <th>时间</th>
                        <th>导演</th>
                        <th class="text-center">卡司</th>
                        <th class="text-center">评分</th>
                        </thead>
                        <tbody>
<!--                        插入新片榜-->
                        </tbody>
                    </table>

                </div>

                <div class=" usBox col-lg-6 col-xs-12">
                    <h5>北美票房榜</h5>
                    <table class="table table-hover">
                        <thead>
                        <th>海报</th>
                        <th class="text-center">名称</th>
                        <th>时间</th>
                        <th>导演</th>
                        <th class="text-center">卡司</th>
                        <th class="text-center">评分</th>
                        </thead>
                        <tbody>
<!--                        插入北美票房榜-->
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </main>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.js"></script>
<script src="static/assets/js/navBar.js"></script>
</body>


<script>
    //轮播图按钮
    $(function () {

        var size = $('.inTheaterMovie').length,
            count = 0;
        $('.pageCount').text(count + 1 + '/' + size / 5);
        var width=$('.inTheaterMovie').width()*1.2;
        $('.iTSlideBox').css({width: size * width});
        $('.next').on('click', function () {
            count++;
            pageCount();
            slider();
        });
        $('.prev').on('click', function () {
            count--;
            pageCount();
            slider();
        });

        //轮播图主体
        function slider() {
            if (count == -1) {
                count = 0;
                $('.pageCount').text(count + 1 + '/' + size / 5);
                return;
            }
            if (count >= size / 5) {
                count = (size / 5) - 1;
                return;
            }
            $('.iTSlideBox').animate({left: -count * 5*width}, 300);
        }

        function pageCount() {
            if (count >= size / 5) {
                $('.pageCount').text(count + '/' + size / 5);

            } else {
                $('.pageCount').text(count + 1 + '/' + size / 5);
            }
        }
    });

</script>


//jsonp跨域请求豆瓣API

//模板==========================================================================
//正在热映
<script id="movieInTheater" type="text/myjsRender">
    {{for movies}}
            <div class="inTheaterMovie text-center ">
                <img src="{{:images.large}}" alt="">
                <div class="movieName">
                <a href="{{:alt}}">{{:title}}</a>
                <div class="score">评分:{{:rating.average}}
                </div>
                </div>
            </div>
    {{/for}}


</script>

//新片榜
<script id="newMovies" type="text/myjsRender">
    {{for newMovies}}
    <tr>
                       <td><img src="{{:images.small}}" alt=""></td>
                    <td><a href="{{:alt}}">{{:title}}</a></td>
                    <td>{{:pubdates}}</td>
                    <td>
                    {{for directors}}
                    {{:name}}
                    {{/for}}
                    </td>
                    <td>
                    {{for casts}}
                    {{:name}}
                    {{/for}}
                    </td>
                    <td  class="text-center">{{:rating.average}}</td>
     </tr>
    {{/for}}


</script>

//北美票房榜
<script id="usBox" type="text/myjsRender">
    {{for usBox}}
    <tr>
                       <td><img src="{{:subject.images.small}}" alt=""></td>
                    <td><a href="{{:subject.alt}}">{{:subject.title}}</a></td>
                    <td>{{:subject.pubdates}}</td>
                    <td>
                    {{for subject.directors}}
                    {{:name}}
                    {{/for}}
                    </td>
                    <td>
                    {{for subject.casts}}
                    {{:name}}
                    {{/for}}
                    </td>
                    <td  class="text-center">{{:subject.rating.average}}</td>
     </tr>
    {{/for}}

</script>
//模板结束=====================================================================


//插入文档
<script>
    //正在热映
    function inTheaterMovies(res) {
        var html = $('#movieInTheater').render({movies: res.subjects});
        $('.iTSlideBox').html(html);
    }

    //新片榜
    function newMovies(res) {
        var html = $('#newMovies').render({newMovies: res.subjects});
        $('.newMovies tbody').html(html);
    }

    //北美票房榜
    function usBox(res) {
        var html = $('#usBox').render({usBox: res.subjects});
        $('.usBox tbody').html(html);
    }

</script>
<script src="https://cdn.bootcss.com/jsrender/1.0.0-rc.70/jsrender.min.js"></script>
<script src="https://douban.uieee.com/v2/movie/in_theaters?callback=inTheaterMovies"></script>
<script src="https://douban.uieee.com/v2/movie/new_movies?callback=newMovies"></script>
<script src="https://douban.uieee.com/v2/movie/us_box?callback=usBox"></script>
</html>
