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
inner join categories on article.category=categories.id where {$where} and articleid!=228 order by top asc, createTime desc limit {$offset},{$size} ;");
$slider=myFetchAll("select * from slider order by 'index' asc;");

$user=myFetchOne("select * from user where userid='huangrui1019';");

header("Content-Type: text/html;charset=utf-8");
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content=" 博客  技术 分享 泛银河系含漱爆破液 slartbartfast blog">
    <meta name="description" content="泛银河系含漱爆破液的个人博客,热衷于分享技术,交流思想,培养自由思想和独立精神">
    <title>泛银河系含漱爆破液的个人博客</title>

<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <link rel="stylesheet" href="static/assets/css/footer.css">
</head>
<body>
<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>

<div class="page">
    <div id="demo" class="carousel slide" data-ride="carousel">
<!--        //轮播图-->
        <div class="carousel-inner">
            <?php $count=0; foreach($slider as $item):?>
                <div class="carousel-item <?php if($count==0){echo 'active';}$count++; ?>">
                    <img src="<?php echo $item['imgurl'] ?>" class="img-fluid">
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <main>
<div class="container">
        <div class="content">
            <?php foreach ($article as $item):
                $name=$item['author'];
                $user1=myFetchOne("select avatarurl from user  where name='{$name}'")
                ?>
                <div class="contentBox wow  animated fadeIn">
                    <a href="articlePage.php?articleid=<?php echo $item['articleid'] ?>"><div class="titleImg">
                            <img src="<?php echo $item['imgurl'] ?>" alt="" class="img-fluid">
                            <div class="title px-3">
                                <p class="font-weight-light"><?php echo $item['title'] ?></p>
                            </div>
                        </div></a>
                    <div class="summary p-3">
                        <p><?php echo $item['gist'] ?>	&nbsp;<a href="articlePage.php?articleid=<?php echo $item['articleid'] ?>">阅读全文</a></p>
                    </div>
                    <div class="info">
                        <div class="authorAvatar">
                            <img src="<?php echo $user1['avatarurl'] ?>" alt="">
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


                <li class="page-item"><a class="page-link" style="display:<?php echo $page>=$totalPages?'none':''; ?> "
                                         href="?page=<?php echo $page == $totalPages ?$page.$search:($page + 1).$search; ?>">下一页</a></li>
            </ul>
        </div>

</div>
<!--底部-->
    </main>
    <div class="footer ">
        <div class="footerItem text-center">

            <div class="link">
                <div class="QR"><img src="static/assets/img/微信图片_20180815234204.jpg" alt="" class="img-fluid"></div>
                <a href="#" class="icon1 wechat"><span></span></a>
                <a href="https://blog.csdn.net/Slartibartfast" class="icon1 csdn"><span></span></a>
                <a href="https://github.com/Slartbartfast1" class="icon1 github"><span></span></a>

            </div>

            <small class="text-muted"> <?php echo $user['email'] ?></small>
            <p class="text-muted">© 2018 <?php echo $user['name'] ?></p>
        </div>
    </div>

</div>

<script src="static/assets/js/main.js"></script>
<script>

</script>
</body>
</html>
