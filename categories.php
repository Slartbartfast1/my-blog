<?php

require_once 'static/function.php';
header("Content-Type: text/html;charset=utf-8");
$categories=myFetchAll('select * from categories');



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>分类</title>
<link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <link rel="stylesheet" href="static/assets/css/footer.css">
    <link rel="stylesheet" href="static/assets/css/categories.css">
    <style>
        .page {
            z-index: 1;
            width: 100%;
            background: url("https://upload-images.jianshu.io/upload_images/13265578-d80f90b3fce1e76e.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/4095/format/webp") no-repeat fixed;
            background-size: 100% 400px;
        }

    </style>
</head>
<body>
<?php include 'navBar.php'; ?>
<div class="page">
    <div class="container1">
        <div class="row d-flex justify-content-around">
            <?php foreach ($categories as $item): ?>
            <div class="col-4">
                <a href="index.php?category=<?php echo $item['id']?>">
                    <div class="category">
                    <div class="shadow"></div>
                    <div class="categoryName text-center">
                        <span><?php echo $item['categories'] ?></span>
                    </div>
                    <img src="<?php echo $item['imgurl']?>" alt="">
                </div>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="footer ">
            <div class="footerItem text-center">

                <div class="link">
                    <div class="QR"><img src="static/assets/img/微信图片_20180815234204.jpg" alt="" class="img-fluid"></div>
                    <a href="#" class="icon1 wechat"><span></span></a>
                    <a href="https://blog.csdn.net/Slartibartfast" class="icon1 csdn"><span></span></a>
                    <a href="https://github.com/Slartbartfast1" class="icon1 github"><span></span></a>

                </div>
                <?php $user=myFetchOne("select * from user where userid='huangrui1019';"); ?>
                <small class="text-muted"> <?php echo $user['email'] ?>  京ICP备18046047号</small>
                <p class="text-muted">© 2018 <?php echo $user['name'] ?></p>
            </div>
        </div>
    </div>


</div>


<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>

</body>
</html>
