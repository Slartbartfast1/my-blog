<?php
include 'navBar.php';
require_once 'static/function.php';
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
    <style>
        .page {
            z-index: 1;
            width: 100%;
            /*position: absolute;*/
            background: url("static/assets/img/wallhaven-677930.jpg") no-repeat fixed;
            background-size: 100% 400px;


        }
        .category{
            position:relative;
            height:300px;
            width:300px;
            background-color: pink;
            margin-top:50px;
            top:-120px;
            box-shadow: 0 0 1px 2px rgba(0,0,0,.1)

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

            /*margin-top:-25%;*/
        }
        .container{
            position: relative;
            top:400px;
            height:400px;
        }

    </style>
</head>
<body>
<div class="page">
    <div class="container">
        <div class="row">
            <?php foreach ($categories as $item): ?>
            <div class="col-lg-4  col-xs-12">
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

    </div>


</div>



<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>
</body>
</html>
