<?php
include 'navBar.php';
require_once 'static/function.php';
$commentfather=myFetchAll("select * from commentfather where articleid='228'");

if($_SERVER['REQUEST_METHOD']==='POST'){
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
        $fatherComment=$_POST['comment'];
        $commentName = $_POST['nickName'];
        $commentTime = date('Y-m-d H:m:s', time());
        myExecute("insert into commentchild values('{$articleid1}',null,'{$commentTime}','{$commentName}','{$fatherComment}','{$fatherid}');");
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
    <link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <link rel="stylesheet" href="static/assets/css/footer.css">
    <style>
        .page {
            z-index: 1;
            width: 100%;
            background: url("static/assets/img/wallhaven-557342.jpg") no-repeat fixed;
            background-size: 100% 400px;
        }
        main {
            position: relative;
            top: 400px;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: #F4EFE9;


        }
        .commentBox{

            position:relative;
            top:-50px;
            border:1px solid rgba(0,0,0,.1);
            background-color: #fff;
            border-radius: 3px;
        }
        .comments{
            margin-top:10px;
            min-height:200px;
            background-color: #FFF;
            font-size: .8em;
            position:relative;
            box-shadow: 0 0 1px 1px rgba(0,0,0,.1);
        }
        .avatarLine{
            position:relative;
            height:60px;
            width:100%;
            border-bottom:1px solid rgba(0,0,0,.1)
        }
        .avatarWrap{
            display: inline-block;
            height:50px;
            width:50px;
            border-radius: 50%;
            overflow: hidden;
        }
        .nickName{
            position:absolute;
            top:5px;
            left:60px;
        }
        .date1{
            position:absolute;
            bottom:5px;
            left:60px;
        }
        .avatarLine a{
            position: absolute;
            right:0;
            top:50%;
            font-size: 1.2em;
        }
        .avatarWrap img{
            width:100%;
            height:100%:

        }
        .commentContent{
            text-indent: 2em;
            width:100%;
            font-size: 1.2em;
        }
        .comments{
            min-height:0px;
        }


    </style>
</head>
<body>
<div class="page">
<main>

<div class="container">
    <div class="commentBox col-12" id="commentBox">
        <div class="col-lg-12    py-3">
            <h1>留言板</h1>
            <hr>
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
                       value="228">
            </div>
            <div class="form-group " style="display: none">
                <label for="fatherid"></label>
                <input type="text" class="form-control" id="fatherid" name="fatherid" autocomplete="off"
                       placeholder="father">
            </div>
            <div class="form-group ">
                <label for="nickName"></label>
                <input type="text" class="form-control" id="nickName" name="nickName" autocomplete="off"
                       placeholder="昵称">
            </div>
            <div class="form-group" style="display: none">
                <label for="comment"></label>
                <textarea class="form-control " rows="10" name="comment" id="text1" placeholder="说点什么吧" ></textarea>
            </div>
            <div id="div1">
            </div>
            <button class="btn btn-primary btn-sm" type="submit">提交</button>
            <button class="btn btn-sm empty" type="button">清空</button>

        </form>
    </div>
        <?php $index=1;foreach ($commentfather as $item):
            $commentchild=myFetchAll("select * from commentchild where fatherid={$item['fatherid']}")?>
            <div class="comments col-lg-12  p-3" >
            <div class="avatarLine" id="commentNum<?php echo $index ?>" >
            <div class="avatarWrap">
                <img src="admin/avatar/default.png" alt="">
            </div >
                <b class="nickName"><?php echo $item['commentName'] ?></b>
                <span class="date1 text-muted"><?php echo $item['commentDate'] ?></span>
                <a href="#commentBox" class="repply">回复</a>
                <div class="fatherid" style="display: none"><?php echo $item['fatherid'] ?></div>
            </div>
                <div class="commentContent p-4 font-weight-light">
                    <?php echo $item['commentContent'] ?>
                </div>
<?php  foreach ($commentchild as $child):?>
                <div class="media p-3">
                    <div class="comments col-lg-12 ">
                        <div class="avatarLine" id="commentNum<?php echo $index ?>">
                            <div class="avatarWrap">
                                <img src="admin/avatar/default.png" alt="">
                            </div>
                            <b class="nickName"><?php echo $child['commentName'] ?></b>
                            <span class="date1 text-muted" ><?php echo $child['commentDate'] ?></span>
                            <a href="#" class="repply">回复</a>
                            <div class="fatherid" style="display: none"><?php echo $item['fatherid'] ?></div>
                        </div>
                        <div class="commentContent p-4 font-weight-light">
                        <?php echo $child['commentContent'] ?>
                        </div>
                    </div>
                </div>
                <?php $index++; endforeach; ?>
            </div>
    <?php $index++; endforeach; ?>

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
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.js"></script>
<script type="text/javascript">
    var E = window.wangEditor;
    var editor = new E('#div1');
    var $text1 = $('#text1');
    editor.customConfig.onchange = function (html) {
        $text1.val(html)
    };
    editor.create();
    $text1.val(editor.txt.html())
</script>
<script>
    //回复按钮
    $('.repply').on('click',function(){
        var fatherid=$(this).next().text();
        var id=$(this).parent().attr('id');
        var name=$(this).parent().find('.nickName').eq(0).text();
        $('#fatherid').val(fatherid);
        var anchor="<a href='#"+id+"'>"+"@"+name+"</a>"+"<p><br></p>";
        editor.txt.html(anchor);
    });

    //清空按钮
    $('.empty').on('click',function(){
        editor.txt.html('');
        $('#tex1').text('');
        $('#fatherid').val('');
    })


</script>


<script>
    //导航栏

    $(function () {
        $(window).scroll(function () {
            var winTop = $(window).scrollTop();
            if (winTop >= 340) {
                $('.navbar-brand').addClass('fadeOut').text('留言板').removeClass('fadeOut').addClass('fadeIn');

            }
            else {
                $('.navbar-brand').text("Slartbartfast's Blog").removeClass('fixed fadeIn');

            }

        });
    });



</script>


</body>
</html>
