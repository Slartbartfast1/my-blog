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
$totalCount=(int)myFetchOne("select count(1) as num from article where {$where} and articleid!=228;")['num'];

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
inner join categories on article.category=categories.id where {$where} and articleid!=228 order by top asc, createTime asc limit {$offset},{$size} ;");
$slider=myFetchAll("select * from slider order by 'index' asc;");
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
    <link rel="stylesheet" href="static/assets/css/main.css">
    <style>
        .footer {
            position:relative;
            width: 100%;
            height: 80px;
            background-color: #F8FCFE;
            border-top:1px solid rgba(0,0,0,.1)
        }
        .footerItem{
            width:200px;
            height:80px;
            position:absolute;
            left:50%;
            margin-left: -100px;

        }
        @font-face {
            font-family: 'iconfont';
            src: url('/static/assets/fonts/iconfont.eot');
            src: url('/static/assets/fonts/iconfont.eot?#iefix') format('embedded-opentype'),
            url('/static/assets/fonts/iconfont.woff') format('woff'),
            url('/static/assets/fonts/iconfont.ttf') format('truetype'),
            url('/static/assets/fonts/iconfont.svg#iconfont') format('svg');
        }
        .icon1{
            font-family: "iconfont" ;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            text-decoration: none;
            z-index: 999;
            display: inline-block;
            font-size: 25px;
            line-height: 25px;
            position:relative;
            height:25px;
            width:25px;
            color: grey;
            top:12px;

        }
        .github{
            left:38px;
        .github:hover{
            color:#292D32
        }
        }
        .csdn{

            left:20px;
            font-size: 23px;
        }
        .csdn:hover{
            color:#C9141C
        }
        .wechat{
            color:grey
        }
        .wechat:hover{
            color:#609700
        }
        .QR{
            height:120px;
            width:120px;
            background-color:  #F4EEE8;
            position:absolute;
            top:-120px;
            left:-47px;
            border-radius: 5px;
            border:1px solid rgba(0,0,0,.1);
            display: none;

        }
        .QR:after{
            content:'';
            width:20px;
            height:20px;
            border-left: solid 12px transparent;
            border-top: solid 12px #FFF;
            border-right: solid 12px transparent;
            position:absolute;
            left:46px;
            top:120px;

        }
    </style>
</head>
<body>
<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>

<div class="page">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $count=0; foreach($slider as $item):?>
                <div class="carousel-item <?php if($count==0){echo 'active';}$count++; ?>">
                    <img src="<?php echo $item['imgurl'] ?>" class="img-fluid">
                </div>
            <?php endforeach;?>
        </div>

        <!-- 左右切换按钮 -->
<!--        <a class="carousel-control-prev" href="#demo" data-slide="prev">-->
<!--            <span class="carousel-control-prev-icon"></span>-->
<!--        </a>-->
<!--        <a class="carousel-control-next" href="#demo" data-slide="next">-->
<!--            <span class="carousel-control-next-icon"></span>-->
<!--        </a>-->
    </div>
    <main>

        <div class="content">
            <?php foreach ($article as $item):
                $name=$item['author'];
                $user=myFetchOne("select avatarurl from user  where name='{$name}'")
                ?>
                <div class="col-lg-12  contentBox wow  animated fadeIn">
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



    </main>
    <div class="footer ">
        <div class="footerItem">
            <div class="QR"><img src="static/assets/img/微信图片_20180815234204.jpg" alt="" class="img-fluid"></div>
            <a href="#" class="icon1 wechat"><span></span></a>
            <a href="https://blog.csdn.net/Slartibartfast" class="icon1 csdn"><span></span></a>
            <a href="https://github.com/Slartbartfast1" class="icon1 github"><span></span></a>
        </div>

    </div>
</div>
<script src="static/assets/js/main.js"></script>
<script>
    $('.wechat').mouseenter(function(){
        $('.QR').fadeIn(200);
    });
    $('.wechat').mouseleave(function(){
        $('.QR').fadeOut(100);
    });
</script>
</body>
</html>
