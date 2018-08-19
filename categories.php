<?php
include 'navBar.php';
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
    <title>Document</title>
<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">    <link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <link rel="stylesheet" href="static/assets/css/footer.css">
    <style>
        .page {
            z-index: 1;
            width: 100%;
            background: url("static/assets/img/wallhaven-677930.jpg") no-repeat fixed;
            background-size: 100% 400px;
        }
        .category{
            position:relative;
            height:300px;
            width:300px;
            background-color: pink;
            top:-120px;
            box-shadow: 0 0 1px 2px rgba(0,0,0,.1);
            display: flex;
            justify-content:center;
            margin: 80px;

        }
        .category img{
            height:100%;
            width:100%;
        }
        .shadow{
            height:100%;
            width:100%;
            background-color: rgba(0,0,0,.4);
            z-index: 2;
            position:absolute;
            transition:.2s ease 0s;
        }
        .category:hover .shadow{
            background-color: rgba(0,0,0,.6);
        }
        .categoryName{
            position:absolute;
            width:100%;
            top:50%;
            transform: translateY(-50%);
            font-size: 40px;
            font-family:"Microsoft JhengHei UI Light";
            color:white;
            z-index: 3;
        }

        .container1{
            position: relative;
            top:400px;
            height:400px;
            display: block;
        }

        @media screen and (min-width: 320px) and (max-width: 480px) {

            .category{
                height:100px;
                width:100px;
                float: left;
                display: inline-block;
                margin-left:0;
            }
            .categoryName{
                font-size:15px;
            }
        }

        @media screen and (min-width:600px) and (max-width:960px){
            .category{
                height:150px;
                width:150px;
                float: left;
                display: inline-block;
                margin: 40px ;
            }
            .categoryName{
                font-size:15px;
            }
        }


    </style>
</head>
<body>
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
                <small class="text-muted"> <?php echo $user['email'] ?></small>
                <p class="text-muted">© 2018 <?php echo $user['name'] ?></p>
            </div>
        </div>
    </div>


</div>


<script src="static/assets/vendors/jquery/jquery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>

</body>
</html>
