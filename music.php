<?php include 'navBar.php';
require_once 'static/function.php';
header("Content-Type: text/html;charset=utf-8");
$section1=myFetchAll("select * from music where album=1");
$section2=myFetchAll("select * from music where album=2");
$section3=myFetchAll("select * from music where album=3");
$section4=myFetchAll("select * from music where album=4");






 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>音乐盒</title>
</head>
<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="static/assets/css/main.css">
<link href="static/assets/vendors/aplayer/APlayer.min.css" rel="stylesheet">
<link rel="stylesheet" href="static/assets/css/footer.css">
<link rel="stylesheet" href="static/assets/css/music.css">
<link rel="stylesheet" href="static/assets/css/footer.css">
</head>
<body>
<div class="page">

    <div class="block pt-5">
        <!--        <h1 class="display-4 text-center">西部世界</h1>-->
        <!--        <hr>-->
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="disc">
                        <div class="posts ">
                            <img src="static/assets/img/wallhaven-3771521.jpg" alt="">
                        </div>

                    </div>
                </div>
                <div class="firstBox  col-lg-6 col-xs-12">
                    <?php foreach ($section1 as $item): ?>
                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">
                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="<?php echo $item['posterurl'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="block1 pt-5">
        <h1 class="display-4 text-center">美剧原声</h1>
        <hr>
        <div class="contaner">
            <div id="carousel" >
                <div class="carouselWrap">
                    <?php foreach ($section2 as $item): ?>
                    <img class="postImg" src="<?php echo $item['posterurl'] ?>" alt=""/> <span class="iconfont" style="display: none"></span>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    <div class="block1">
        <h1 class="display-4 text-center">pop</h1>
        <hr>
        <div class="container">
            <div class="row  d-flex justify-content-around my-3">
                <?php foreach ($section3 as $item): ?>
                <div class="col-lg-3 col-xs-8 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="<?php echo $item['posterurl'] ?>" alt=""></div><div class="musicSmallInfo"><p><?php echo $item['title'] ?></p><p>by <?php echo $item['author'] ?></p></div></div>
                <?php endforeach; ?>

            </div>

        </div>

    </div>
    <div class="block1 last">
        <h1 class="display-4 text-center">OST</h1>
        <hr>
        <div class="container">
            <table class="table table-hover musicTable">
                <tbody>
                <?php foreach ($section4 as $item): ?>
                <tr class="wow animated fadeInDown">
                    <td><img src="<?php echo $item['posterurl'] ?>" alt="" width="50" height="60"></td>
                    <td><?php echo $item['title'] ?></td>
                    <td><?php echo $item['author'] ?></td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <?php endforeach; ?>
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

</div>


<!--================================================================================================================================-->

<!--用PHP渲染播放器信息-->
<div id="aplayer"></div>

<?php foreach ($section1 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>
<?php foreach ($section2 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>
<?php foreach ($section3 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>
<?php foreach ($section4 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>

<!--//php待渲染-->


<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>
<script src="static/assets/vendors/waterwheelCarousel/jquery.waterwheelCarousel.min.js"></script>
<script src="static/assets/vendors/aplayer/APlayer.min.js"></script>
<script src="static/assets/vendors/waterwheelCarousel/jquery.waterwheelCarousel.min.js"></script>
<script src="static/assets/js/music.js"></script>

</body>
</html>
