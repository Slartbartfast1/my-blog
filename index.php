<?php
include 'navBar.php';
require_once 'static/function.php';

$page = empty($_GET['page']) ? 1 : (int)$_GET['page'];//当前页码

$size=4;
$offset = ($page - 1) * $size;

$where='1=1';
$search='';
if(!empty($_GET['category'])){
    $where.=' and category= '.$_GET['category'];
    $search.='&category=' . $_GET['category'];
}
//总页数计算
$totalCount=(int)myFetchOne("select count(1) as num from article where {$where};")['num'];

$totalPages=(int)ceil($totalCount/$size);


//分页参数

$visiables = 3;
$region = ($visiables - 1) / 2;

//渲染遍历参数
$begin=$page-$region;
$end = $begin + $visiables;

$page>$totalPages? header('Location: ?page=' . $totalPages . $serach):$page;

if($begin<1){
    $begin = 1;
    $end = $begin + $visiables;
}
if($end>$totalPages+1){
    $end = $totalPages+1;
    $begin=$end-$visiables;
    if ($begin < 1) {
        $begin = 1;
    }
}



$article = myFetchAll("select article.articleid,
article.title,
article.author,
article.createTime,
article.top,
article.view,
article.imgurl, 
article.gist,
article.category,
categories.id,
categories.categories as categoryName
from article 
inner join categories on article.category=categories.id where {$where} order by top asc, createTime asc limit {$offset},{$size} ;");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
    <style>

        ::-webkit-scrollbar{
            width:12px;
        }

        ::-webkit-scrollbar-track-piece{
            background-color: #F5FAF9;
        }
        ::-webkit-scrollbar-thumb{
            background-color: #D9EBF6;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover{
            border-radius: 0;
        }
        body{
            background-color: #F4EFE9;
        }
        .page{
            transition: .3s ease 0s;
            transform: translateX(0);
            width:100%;
        }

        .pageScale{
            transform:translateX(-10%);
        }
        .navbar-brand{
            /*left:0px;*/
            top:10%;
            color:rgba(0,0,0,.5)!important;
            display: block;
            position:relative;
        }
        .navbarBrandLeft{
            left:34%;
        }


        .carousel-inner img {
            width: 100%;
            display: block;
            height: 400px;
        }

        .contentBox {

            box-shadow: 1px 1px 3px 2px rgba(0, 0, 0, .1);
            margin-top: 60px ;
            transition: .2s ease;
            padding: 0;
            width: 70%;
            left:15%;

        }
        .content:first-child{
            margin-top:-8%;
        }


        .contentBox:hover {
            box-shadow: 1px 1px 20px 10px rgba(0, 0, 0, .1);
        }

        .navbar {
            position: fixed;
            height: 50px;
            width: 100%;
            z-index: 999;
        }

        .navWrap {
            position: absolute;
            width: 100%;
            height: 50px;
            background-color: rgba(0, 0, 0, 0);
            left: 0;
            transition: .3s ease 0s;
        }

        .openNav {
            height: 40px;
            width: 40px;
            position: absolute;
            left: -30%;
            top: 1%;
            cursor: pointer;
            z-index: 9999;
        }

        .iconBefore {
            z-index: 1;
            height: 3px;
            width: 32px;
            background-color: #fff;
            position: absolute;
            top: 8px;

            transition: .6s ease 0s;
            transform-origin: left top;
            transform: rotate(41deg);
            left: 4px;
        }
        .iconAfter {
            z-index: 1;
            height: 3px;
            width: 32px;
            background-color: #fff;
            position: absolute;
            bottom: 10px;
            left: 4px;
            transition: .6s ease 0s;
            transform-origin: left bottom;
            transform: rotate(-40deg);
        }
        .grey{
            background-color:#7C7C7D!important;
        }
        .opacity0{
            background-color: rgba(0,0,0,0)!important;
        }
        .icon {
            height: 3px;
            width: 32px;
            background-color: #fff;
            position: absolute;
            top: 18px;
            left: 4px;
            transition: .6s ease 0s;
        }

        .beforeDeg {
            transform: rotate(0deg);
            left: 4px;
        }


        .afterDeg {
            transform: rotate(0deg);
            left: 4px;
        }
        .sideNav{
            position: fixed;
            height:100%;
            width:22%;
            /*top:-60px;*/
            right:0;
            background-color: #F5FAF9;
            transition: .3s ease 0s;
            box-shadow: 0 0 5px 1px rgba(0,0,0,.11);
            z-index: 9999;
        }
        .sideNavSlide{
            right:-22%;

        }

        .avatarBox{
            position:relative;
            height:40%;
            width:100%;
        }
        .avatar{
            height:50vw;
            width:50%;
            position:absolute;
            top:30%;
            left:50%;
            margin-left: -25%;

        }
        .quote{
            position:absolute;
            bottom:1%;
            width:70%;
            left:50%;
            margin-left: -35%;
            top:80%;
            cursor:default;
        }
        .btns{

            height:50%;
            width:100%;
        }
        .buttonWarp{
            width:100%;
            height:12%;
            /*background-color: pink;*/
            /*font-size: 160%;*/
            position: relative;
        }
        .buttonWarp a{
            text-decoration: none;
            transition:.1s ease-in 0s;
        }
        .buttonWarp a:after{
            content:'';
            position:absolute;
            width:0px;
            margin-left:-25px;
            height: 0;
            bottom:10px;
            left:50%;
            border-bottom:#13AE6E 4px solid;
        }


        .buttonWarp:hover{
            border-left: 2px solid darkseagreen;
            background-color: rgba(0,0,0,.1);
        }

        .opacity1 {
            background-color: #F8F9FA;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, .1);
            height: 55px;
        }

        .categories{
            background-color: #F4F3EE;
        }
        .categoriey1,.categoriey2,.categoriey3{
            position:relative;
            height: 300px;
            top:-5px;
            width:30%;
            /*border-radius: 1%;*/
        }
        .categoriey1{
            background-color:#F5EEEC;
        }
        .categoriey2{
            background-color: #E7F1ED;
        }
        .categoriey3{
            background-color: #F7F7F7;
        }


        .titleImg {
            width: 100%;
            height:250px;
            overflow: hidden;
        }

        .titleImg img {
            height: 100%;
            width: 100%;
            transition:1s ease 0s;
        }

        .title{
            position:absolute;
            width: 100%;
            height: 80px;
            transition:.3s ease 0s;
            bottom:110px;
            z-index: 1;
            text-shadow: gray 0px 1px 10px;
            font-size:50px;
            line-height: 80px;
            color:black;
        }

        .titleImg:hover .title{
            background-color:rgba(255,255,255,.3);

            text-shadow: none;
        }
        .titleImg:hover img{
            transform: scale(1.01,1.01);
        }


        .footer {
            width: 100%;
            height: 200px;
            background-color: darkgrey;
        }
        .info{
            cursor: default;
            height:50px;
            width:100%;
            position:relative;
            border-top:1px solid rgba(0,0,0,.1);
            background-color:rgba(255,255,255,.3);
        }
        .summary{
            height:60px;
            width:100%;
            position:relative;
            border-top:1px solid rgba(0,0,0,.1);
            background-color:rgba(255,255,255,.3);
            text-indent: 4em;
            color:rgba(0,0,0,.5);
            font-size: .8em;
        }
        .summary p{
            cursor: default;
        }
        /*.summary a{*/
            /*display: inline-block;*/
            /*border-bottom:1px solid #007bff;*/
        /*}*/
        /*!*.info p{*!*/
            /*text-indent: 2em;*/
        /*}*/
        .authorAvatar{
            position: relative;
            left:10px;
            height:45px;
            width:45px;
            border-radius: 50%;
            overflow: hidden;
        }
        .authorAvatar img{
            height: 100%;
            width:100%;
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
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            position:absolute;
            display: block;
            right:15px;
            bottom:10px;
            color: grey;
            z-index: 999;
        }
        .date{
            position:absolute;
            left:70px;
            bottom:0;
            width: 200px;
            height:50px;
            font-size: 12px;
            line-height: 12px;
        }

        .paging{
            position:relative;
            left:15%;
            margin-top:30px;

        }

        .page-link{
            color:grey;
            background-color:#fff;
}
.page-link:hover{
    color:black;
}
.page-item.active .page-link{
    background-color: #F5FAF9;
    border:1px solid #dee2e6;
    color:grey;
}


</style>
</head>
<body>
<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>

<div class="page">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!--     指示符-->
        <!--    <ul class="carousel-indicators pb-3">-->
        <!--        <li data-target="#demo" data-slide-to="0" class="active"></li>-->
        <!--        <li data-target="#demo" data-slide-to="1"></li>-->
        <!--        <li data-target="#demo" data-slide-to="2"></li>-->
        <!--        <li data-target="#demo" data-slide-to="3"></li>-->
        <!--        <li data-target="#demo" data-slide-to="4"></li>-->
        <!--    </ul>-->

        <!--     轮播图片-->
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
            <?php foreach ($article as $item):
                $name=$item['author'];
                $user=myFetchOne("select avatarurl from user  where name='{$name}'")
                ?>
                <div class="col-12 contentBox wow  animated fadeIn">
                    <a href="articlepage.php?articleid=<?php echo $item['articleid'] ?>"><div class="titleImg">
                            <img src="<?php echo $item['imgurl'] ?>" alt="" class="img-fluid">
                            <div class="title px-3">
                                <p class="font-weight-light"><?php echo $item['title'] ?></p>
                            </div>
                        </div></a>
                    <div class="summary p-3">
                        <p><?php echo $item['gist'] ?>	&nbsp;<a href="articlepage.php?articleid=<?php echo $item['articleid'] ?>">阅读全文</a></p>
                    </div>
                    <div class="info">
                        <div class="authorAvatar">
                            <img src="<?php echo $user['avatarurl'] ?>" alt="">
                        </div>
                        <div class="date pt-2 text-muted">
                            <p><?php echo $item['author']?></p>
                            <small><?php echo $item['createTime']?></small>
                        </div>
                        <span class="iconfont"><?php echo $item['view']?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="paging">

            <ul class="pagination">
                <li class="page-item"><a class="page-link" style="display:<?php echo $page<=1?'none':''; ?> " href="?page=<?php echo ($page - 1).$search; ?>">上一页</a></li>
                <?php for($i=$begin;$i<$end;$i++): ?>
                    <li class="page-item <?php echo $i === $page ? ' active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i.$search; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor ?>


                <li class="page-item"><a class="page-link" style="display:<?php echo $page>=$totalPages?'none':''; ?> "  href="?page=<?php echo $page == $totalPages ?$page.$search:($page + 1).$search; ?>">下一页</a></li>
            </ul>
        </div>


        <div class="footer">
        </div>
    </main>
</div>
<script>
    //轮播图定时
    $('.carousel').carousel({interval: 5000});
</script>

<script src="static/assets/js/main.js"></script>
</body>
</html>
