<?php
include 'navBar.php';
require_once 'static/function.php';
//        var_dump(date('Y-m-d H:m:s',time()));
if($_SERVER['REQUEST_METHOD']==='GET'){
    $articleid=$_GET['articleid'];
    $article=myFetchOne("select * from article where articleid={$articleid}");
    $commentFather=myFetchAll("select * from commentfather where articleid={$articleid}");




};
if($_SERVER['REQUEST_METHOD']==='POST'){
       if(empty($_POST['fatherid'])) {


           $articleid1 = $_POST['articleid'];
           $commentName = $_POST['nickName'];
           $fatherComment = $_POST['comment'];
           $commentTime = date('Y-m-d H:m:s', time());

           myExecute("insert into commentfather values('{$articleid1}',null,'{$commentTime}','{$commentName}','{$fatherComment}');");


       }

}






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
            background: url("static/assets/img/wallhaven-671087.jpg") no-repeat fixed;
            background-size: 100% 400px;

        }

        .articleBox {
            position: relative;
            top: 400px;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: #F4EFE9;
        }

        .titleBox {
            position: absolute;
            height: 130px;
            background-color: #FFF;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, .1);
            text-align: center;
        }

        .articleContent {
            position: relative;
            transform: translateX(-50%);
            left: 50%;
            /*height:2000px;*/
            background-color: #FFF;
            margin-top: 75px;
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, .1);
            text-indent: 1em
        }

        .titleTree {
            position: absolute;
            top: 480px;
            display: block;
            z-index: 1;
            transition: .1s ease-in 0s;
        }

        .titleTree ul {
        }

        .fixed {
            position: fixed;
            top: 65px;

        }

        .active {
            border-left: 2px solid darkseagreen;
            background-color: rgba(0, 0, 0, .1);
        }

        .titleTree a {
            color: grey;
            box-sizing: content-box !important;
            display: block;
            width: 130px;
        }

        .titleTreeLeft {
            left: 7%;
        }

        .commentBox {
            min-height: 200px;
            background-color: whitesmoke;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 1%;
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, .1);
        }

        .comments {
            min-height: 150px;
            background-color: whitesmoke;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 10%;
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, .1);
        }

        .row {
            margin-left: 0;
        }

        .comments p {
            text-indent: 2em;
        }

        .comments a {
            position: absolute;
            right: 10px;
            bottom: 10px;
        }

        .commentTime {
            position: absolute;
            left: 10px;
            bottom: 10px;
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
            left: 50%;
            margin-left: -14px;
            top: 50%;
            margin-top: -40%;
            color: #F4EFE9;
        }

        .goTop {
            position: fixed;
            bottom: 5%;
            right: 10%;
            background-color: rgba(0, 0, 0, .1);
            width: 50px;
            height: 30px;
            cursor: pointer;
            display: none;
            border-radius: 5%;
            transition: .1s ease-in 0s;
        }

        .goTop:hover {
            background-color: rgba(0, 0, 0, .2)
        }

        .goTopLeft {
            right: 25%;
        }

        .articleContent img {
            max-width: 100%;
        }
        .media .comments{
            width:50%;
            /*height:100%;*/
            margin-top:0;
            /*position:absolute;!important;*/
            /*right: 0 !important;*/
        }
        /*.media{*/
            /*margin-top: 0 !important;*/
        /*}*/



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
                <h1><?php echo $article['title'] ?></h1>
                <small>来自:</small>
                <small><?php echo $article['author'] ?></small>
                <small>创建于:<?php echo $article['createTime'] ?></small>
                <small>阅读数:99</small>
            </div>
        </div>
        <div class="articleContent col-7 py-4">
            <?php echo $article['content'] ?>
        </div>
        <div class="commentBox col-7 mt-3;">
            <div class="col-12 py-3">
                <h4>评论</h4>
            </div>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group" >
                    <label for="id">id</label>
                    <input type="text" class="form-control" name="articleid" id="articleid" accept="multipart/form-data"
                           value="<?php echo $articleid ?>">
                </div>
            <div class="form-group ">
                <label for="fatherid"></label>
                <input type="text" class="form-control" id="fatherid" name="fatherid" autocomplete="off"
                       placeholder="father">
            </div>
            <div class="form-group ">
                <label for="name"></label>
                <input type="text" class="form-control" id="nickName" name="nickName" autocomplete="off"
                       placeholder="昵称">
            </div>
            <div class="form-group">
                <label for="comment"></label>
                <textarea class="form-control " rows="5" name="comment" id="comment" placeholder="说点什么吧"></textarea>
            </div>
                <button class="btn btn-primary" type="submit">提交</button>
            </form>

        </div>


            <?php $count=1;  foreach ($commentFather as $item):
               $commentChild=myFetchAll("select * from commentchild where fatherid={$item['fatherid']}");
                ?>

        <div class="comments col-7 mt-3 py-3 " >
            <div class="fatherid"><?php echo $item['fatherid']  ?></div>
            <span class="text-right floor"><?php echo $count ?>楼</span><span><?php echo $item['commentName'] ?></span>
            <hr>
            <p><?php echo $item['commentContent'] ?></p>
            <small class="commentTime font-weight-light text-muted"><?php echo $item['commentDate'] ?></small>
            <a href="http://localhost:63342/Myblog/articlepage2.php?repply=1" class="repply">回复</a>
            <?php $index=1; foreach($commentChild as $child): ?>
            <div class="media p-3">
                <div class="comments  col-12 ">
                    <span class="text-right floor"><?php echo $index ?>楼</span><span><?php echo $child['commentName'] ?></span>
                    <hr>
                    <p><?php echo $child['commentContent'] ?></p>
                    <small class="commentTime font-weight-light text-muted"><?php echo $child['commentDate'] ?></small>
                    <a href="#" class="repply">回复</a>
                </div>
            </div>
            <?php $index++;  endforeach ?>
        </div>
            <?php $count++; endforeach ?>

        <div class="comments col-7 mt-3 py-3">
            <div class="media p-3">
                <div class="comments col-7 mt-3 py-3">
                    <span class="text-right floor">#1</span><span>name:</span>
                    <hr>
                    <p>我喜欢干实事，喜欢学学了就能产出东西的知识，讨厌长篇大论的理论知识。这也是为什么我不喜欢化学了。</p>
                    <small class="commentTime font-weight-light text-muted">2018-08-10 09:59:13</small>
                    <a href="http://localhost:63342/Myblog/articlepage2.php?repply=1" class="repply">回复</a>
                </div>
            </div>
            <small class="commentTime font-weight-light text-muted">2018-08-10 09:59:13</small>
            <a href="#" class="repply">回复</a>
        </div>
    </div>
</div>
<div class='goTop'>
    <span class="iconfont"></span>
</div>

<script>
    //创建锚点
    for (var count = 0; count < $(':header').length; count++) {
        var count2 = count + 1;
        $(':header').eq(count).attr('id', 'section' + count2);
        href = '#' + 'section' + count2,
            inner = $(':header').eq(count).text();
        $('.titleTree ul').append("<li class='nav-item'><a class='nav-link'></a></li>");
        var that = $('.titleTree ul a');
        that.eq(count).attr('href', href);
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
            }
            if (winTop > 600) {
                $('.goTop').fadeIn(300);
            }
            else {
                $('.goTop').fadeOut();
            }


        });
    });

    //点击回到顶部

    $('.goTop').on('click', function () {
        $(' body').animate({'scrollTop': 0}, 200);
    });

    $('.openNav').on('click', (function () {
        $('.titleTree').toggleClass('titleTreeLeft');
        $('.goTop').toggleClass('goTopLeft');
    }));


</script>
<script>

</script>

</body>
</html>
