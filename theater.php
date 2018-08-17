<?php include 'navBar.php';
header("Content-Type: text/html;charset=utf-8");
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
    <title>豆瓣影讯</title>
<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <link rel="stylesheet" href="static/assets/css/footer.css">
    <link rel="stylesheet" href="static/assets/css/theater.css">
</head>
<body>
<div class="page">
    <main>
        <h1 class="display-5">正在热映:</h1>
        <hr>
        <div class="inTheaterSlide wow animated fadeInRight">
            <div class="iTSlideBox">
<!--                插入正在热映-->
            </div>

        </div>
        <div class="btnGroup mb-4">
            <div class="prev text-center"><span class="iconfont text-center">󰍃</span></div>
            <div class="next text-center"><span class="iconfont text-center">󰍄</span></div>
            <small class="pageCount text-muted"></small>
        </div>
        <h1 class="display-5">排行榜:</h1>
        <hr>

            <div class="row">
                <div class=" weekly col-lg-6 col-xs-12 wow animated fadeIn">
                    <h4>一周口碑榜</h4>
                    <table class="table table-hover">
                        <thead>
                        <th>海报</th>
                        <th class="text-center" width="100">名称</th>
                        <th>时间</th>
                        <th>导演</th>
                        <th class="text-center">卡司</th>
                        <th class="text-center">评分</th>
                        </thead>
                        <tbody>
                        <!--                        插入口碑榜-->
                        </tbody>
                    </table>

                </div>
                <div class=" top10 col-lg-6 col-xs-12 wow animated fadeIn">
                    <h4>TOP10</h4>
                    <table class="table table-hover">
                        <thead>
                        <th>海报</th>
                        <th class="text-center" width="100">名称</th>
                        <th>时间</th>
                        <th>导演</th>
                        <th class="text-center">卡司</th>
                        <th class="text-center">评分</th>
                        </thead>
                        <tbody>
                        <!--                        插入TOP10-->
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class=" newMovies col-lg-6 col-xs-12 wow animated fadeIn">
                    <h4>新片榜</h4>
                    <table class="table table-hover">
                        <thead>
                        <th>海报</th>
                        <th class="text-center" width="100">名称</th>
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

                <div class=" usBox col-lg-6 col-xs-12 wow animated fadeIn">
                    <h4>北美票房榜</h4>
                    <table class="table table-hover">
                        <thead>
                        <th>海报</th>
                        <th class="text-center" width="100">名称</th>
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
            <div class="footer ">
                <div class="footerItem text-center">

                    <div class="link">
                        <div class="QR"><img src="static/assets/img/微信图片_20180815234204.jpg" alt="" class="img-fluid"></div>
                        <a href="#" class="icon1 wechat"><span></span></a>
                        <a href="https://blog.csdn.net/Slartibartfast" class="icon1 csdn"><span></span></a>
                        <a href="https://github.com/Slartbartfast1" class="icon1 github"><span></span></a>

                    </div>

                    <small class="text-muted">15212068@bjtu.edu.cn</small>
                    <p class="text-muted">© 2018 泛银河系含漱爆破液</p>
                </div>
            </div>

    </main>

</div>
<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>
</body>


<script>


</script>


<!--//jsonp跨域请求豆瓣API-->

<!--//模板==========================================================================-->
<!--//正在热映-->
<script id="movieInTheater" type="text/myjsRender">
    {{for movies}}
            <div class="inTheaterMovie text-center ">
                <a href="{{:alt}}"><img src="{{:images.large}}" alt=""></a>
                <div class="movieName text-center">
                <a href="{{:alt}}">{{:title}}</a>
                <div class="score">评分:{{:rating.average}}
                </div>
                </div>
            </div>
    {{/for}}


</script>

<!--//新片榜-->
<script id="newMovies" type="text/myjsRender">
    {{for newMovies}}
    <tr>
                       <td><a href="{{:alt}}"><img src="{{:images.small}}" alt=""></a></td>
                    <td ><a href="{{:alt}}">{{:title}}</a></td>
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

<!--//北美票房榜-->
<script id="usBox" type="text/myjsRender">
    {{for usBox}}
    <tr>
                       <td><a href="{{:subject.alt}}"><img src="{{:subject.images.small}}" alt=""></a></td>
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

<script id="weekly" type="text/myjsRender">
    {{for weekly}}
    <tr>
                       <td><a href="{{:subject.alt}}"><img src="{{:subject.images.small}}" alt=""></a></td>
                    <td ><a href="{{:subject.alt}}">{{:subject.title}}</a></td>
                    <td>{{:subject.pubdates}}</td>
                    <td >
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
<script id="newMovies" type="text/myjsRender">
    {{for newMovies}}
    <tr>
                       <td><a href="{{:alt}}"><img src="{{:images.small}}" alt=""></a></td>
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
<script id="top10" type="text/myjsRender">
    {{for top10}}
    <tr>
                       <td><a href="{{:alt}}"><img src="{{:images.small}}" alt=""></a></td>
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
<!--//模板结束=====================================================================-->
<!---->
<!---->
<!--//插入文档-->
<script src="static/assets/js/theater.js"></script>
<script src="https://cdn.bootcss.com/jsrender/1.0.0-rc.70/jsrender.min.js"></script>
<script src="https://douban.uieee.com/v2/movie/in_theaters?callback=inTheaterMovies"></script>
<script src="https://douban.uieee.com/v2/movie/new_movies?callback=newMovies"></script>
<script src="https://douban.uieee.com/v2/movie/us_box?callback=usBox"></script>
<script src="https://douban.uieee.com/v2/movie/weekly?callback=weekly"></script>
<script src="https://douban.uieee.com/v2/movie/top250?count=10&callback=top10"></script>

</html>
