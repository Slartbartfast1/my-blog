<?php
include 'navBar.php';
require 'static/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $articleid = $_GET['articleid'];
    $article = myFetchOne("select * from article where articleid={$articleid}");
    $commentFather = myFetchAll("select * from commentfather where articleid={$articleid}");
    $articleView = (int)$article['view'] + 1;
    myExecute("update article set view={$articleView} where articleid={$articleid}");
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nickName'])) {
        $GLOBALS['errorMessage'] = '请输入昵称';
        return;
    }
    if (empty($_POST['comment'])) {
        $GLOBALS['errorMessage'] = '请输入评论内容';
        return;
    }
    if (empty($_POST['fatherid'])) {
        $articleid1 = $_POST['articleid'];
        $commentName = $_POST['nickName'];
        $fatherComment = $_POST['comment'];
        $commentTime = date('Y-m-d H:m:s', time());
        myExecute("insert into commentfather values('{$articleid1}',null,'{$commentTime}','{$commentName}','{$fatherComment}');");

    } else {
        $articleid1 = $_POST['articleid'];
        $fatherid = $_POST['fatherid'];
        $applyTo=$_POST['appltTo'];
        $fatherComment=$_POST['comment'];
        $commentName = $_POST['nickName'];
        $commentTime = date('Y-m-d H:m:s', time());
        myExecute("insert into commentchild values('{$articleid1}',null,'{$commentTime}','{$commentName}','{$fatherComment}','{$fatherid}');");
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);


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

<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">    <link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <style>

        .page {
            z-index: 1;
            width: 100%;
            background: url("static/assets/img/wallhaven-671087.jpg") no-repeat fixed;
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
            border-radius: 3px;
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
            width:140px;

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
            left: 4%;
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

        .comments .repply {
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

        .media .comments {
            width: 50%;
            margin-top: 0;
        }
        #div1{
            background-color: #FFF;
        }
        @media screen and (min-width: 320px) and (max-width: 480px) {

            /*.commentBox{*/
                /*height: 400px!important;*/
                /*font-size: 5px;*/
            /*}*/
            .titleTree{
                display: none;
            }
           #div1{
               overflow: hidden;
               height: 200px !important;

           }
            .w-e-text-container{
                width:100%;
                height: 200px !important;
            }
            .w-e-toolbar{
                width:360px;

            }
            .titleBox h1{
                font-size:20px;
                line-height: 20px;
            }
            .titleBox small{
                font-size:8px;
                line-height: 8px;
            }
            .articleContent{
                font-size: 10px;
            }
            .comments{
                font-size: 0.5em;
            }
            .articleBox{
                top:350px;
            }

        }
        @media screen and (min-width:600px) and (max-width:960px){
            .titleTree{
                display: none;
            }
        }



    </style>
</head>
<body data-spy="scroll" data-target=".titleTree">
<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>

<nav class="titleTree  titleTreeLeft animated">
    <ul class="nav ">
    </ul>
</nav>
<div class="page" style="background:url('<?php echo $article['imgurl']?>') no-repeat fixed; background-size: 100% 400px;">
    <div class="articleBox row">
        <div class="titleBox col-lg-8 col-sm-12 text-center py-4">
            <div class="page-header">
                <h1><?php echo $article['title'] ?></h1>
                <small>来自:</small>
                <small><?php echo $article['author'] ?></small>
                <small>创建于:<?php echo $article['createTime'] ?></small>
                <small>阅读数:<?php echo $article['view'] ?></small>
            </div>
        </div>
        <div class="articleContent col-lg-8 col-sm-12 py-4">
            <?php echo $article['content'] ?>
        </div>
        <div class="commentBox col-lg-8 col-sm-12 mt-3;" id="commentBox">
            <div class="col-12 py-3">
                <h4>评论</h4>
                <?php if (isset($errorMessage)): ?>
                    <div class="alert alert-warning text-center">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif ?>
            </div>


            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group" style="display: none">
                    <label for="id" >id</label>
                    <input type="text" class="form-control" name="articleid" id="articleid" accept="multipart/form-data"
                           value="<?php echo $articleid ?>">
                </div>
                <div class="form-group " style="display: none">
                    <label for="fatherid" ></label>
                    <input type="text" class="form-control" id="fatherid" name="fatherid" autocomplete="off"
                           placeholder="father">
                </div>
                <div class="form-group " style="display: none">
                    <label for="applyTo"></label>
                    <input type="text" class="form-control" id="applyTo" name="applyTo" autocomplete="off"
                           placeholder="applyTo">
                </div>
                <div class="form-group ">
                    <label for="nickName"></label>
                    <input type="text" class="form-control" id="nickName" name="nickName" autocomplete="off"
                           placeholder="昵称">
                </div>
                <div class="form-group">
                    <label for="comment"></label>
                    <textarea class="form-control " rows="10" name="comment" id="text1" placeholder="说点什么吧" style="display:none"></textarea>
                    <div id="div1" style="min-height: 100px;">
                    </div>
                </div>
                <button class="btn btn-primary btn-sm" type="submit">提交</button>
                <button class="btn btn-sm empty" type="button">清空</button>
            </form>

        </div>


        <?php $count = 1; $num=1; //$count 生成楼层 $num生成锚点
        foreach ($commentFather as $item):
            $commentChild = myFetchAll("select * from commentchild where fatherid={$item['fatherid']}");
            ?>

            <div class="comments col-lg-8 col-sm-12 mt-3 py-3 " id="commentNum<?php echo $num ?>">
                <div class="fatherid" style="display: none;position:absolute"><?php echo $item['fatherid'] ?></div>
                <span class="floor font-weight-light text-muted "><?php echo $count ?>楼</span>
                <span class=" font-weight-light nick"><?php echo $item['commentName'] ?>:</span>
                <hr>
                <?php echo $item['commentContent'] ?>

                <small class="commentTime font-weight-light text-muted"><?php echo $item['commentDate'] ?></small>
                <a href="#commentBox" class="repply">回复</a>
                <?php $index = 1;//生成楼层
                foreach ($commentChild as $child): ?>
                    <div class="media p-3">
                        <div class="comments  col-12" id="commentNum<?php echo $num ?>">
                            <div class="fatherid" style="display: none"><?php echo $item['fatherid'] ?></div>
                            <span class="text-right floor font-weight-light text-muted "><?php echo $index ?>楼</span>
                            <span class=" font-weight-light nick"><?php echo $child['commentName'] ?>:</span>
                            <hr>
                            <p class="text-muted"><?php echo $child['commentContent'] ?></p>

                            <small class="commentTime font-weight-light text-muted"><?php echo $child['commentDate'] ?></small>
                            <a href="#commentBox" class="repply repplyInside">回复</a>
                        </div>
                    </div>
                    <?php $index++;$num++; endforeach ?>
            </div>
            <?php $count++;$num++; endforeach ?>
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
                $('.navbar-brand').addClass('fadeOut').text($('.page-header h1').text()).removeClass('fadeOut').addClass('fadeIn');
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

<!--============================留言开始=====================================================-->
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.js"></script>
    <script type="text/javascript">
    let E = window.wangEditor;
    let editor = new E('#div1');
    let $text1 = $('#text1');
    editor.customConfig.onchange = function (html) {
        $text1.val(html)
    };
    editor.create();
    $text1.val(editor.txt.html())
</script>
<script>


    //回复按钮点击事件
    $('.repply').on('click',function(){
        let fatherid = $(this).parent().find('.fatherid').text();
        let id=$(this).parent().attr('id');
        let name = $(this).parent().find('.nick').eq(0).text();
        let anchor="<a href='#"+id+"'>"+"@"+name+"</a>"+"<p><br></p>";//富文本编辑器中插入src为锚点的a标签
        $('#fatherid').val(fatherid);

        editor.txt.html(anchor);
    });
    //清空按钮

    $('.empty').on('click',function(){
        editor.txt.html('');
        $('#tex1').text('');
        $('#fatherid').val('');
    })
// ===================================留言结束======================================




</script>

</body>
</html>
