<?php
include 'navBar.php';
require_once 'static/function.php';
header("Content-Type: text/html;charset=utf-8");


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $articleid = $_GET['articleid'];
    $article = myFetchOne("select * from article where articleid={$articleid}");
    $commentFather = myFetchAll("select * from commentfather where articleid={$articleid}");
    $articleView = (int)$article['view'] + 1;
    myExecute("update article set view={$articleView} where articleid={$articleid}");
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nickName'])) {
        exit('请输入昵称');
    }
    if (empty($_POST['comment'])) {
        exit('请输入评论内容');
    }
    if (empty($_POST['fatherid'])) {
        $articleid1 = addslashes($_POST['articleid']);
        $commentName = addslashes($_POST['nickName']);
        $fatherComment =addslashes( $_POST['comment']);
        $commentTime = addslashes(date('Y-m-d H:i:s', time()));
        myExecute("insert into commentfather values('{$articleid1}',null,'{$commentTime}','{$commentName}','{$fatherComment}');");

    } else {
        $articleid1 =addslashes($_POST['articleid']);
        $fatherid = addslashes($_POST['fatherid']);
        $applyTo=addslashes($_POST['applyTo']);
        $commentName = addslashes($_POST['nickName']);
        $fatherComment =addslashes( $_POST['comment']);
        $commentTime = addslashes(date('Y-m-d H:i:s', time()));
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
    <meta name="keywords" content="泛银河系含漱爆破液 javascript 前端 css 计算机网络">
    <meta name="description" content="<?php echo $article['title'] ?>">
    <title><?php echo $article['title'] ?></title>
<link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <link rel="stylesheet" href="static/assets/css/footer.css">
    <link rel="stylesheet" href="static/assets/css/articlePage.css">
    <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/atom-one-light.min.css" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".titleTree">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/9.11.0/languages/javascript.min.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/9.12.0/languages/json.min.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/9.12.0/languages/php.min.js"></script>


<nav class="titleTree  titleTreeLeft animated">
    <ul class="nav">
    </ul>
</nav>
<div>
<div class="page" style="background:url('<?php echo $article['imgurl']?>') no-repeat fixed; background-size: 100% 400px;">
    <div class="articleBox row">
        <div class="titleBox col-lg-8 col-sm-12 text-center py-4 animated fadeIn">
            <div class="page-header ">
                <h1><?php echo $article['title'] ?></h1>
                <small>来自:</small>
                <small><?php echo $article['author'] ?></small>
                <small>创建于:<?php echo $article['createTime'] ?></small>
                <small>阅读数:<?php echo $article['view'] ?></small>
            </div>
        </div>
        <div class="articleContent col-lg-8 col-sm-12 p-4  animated fadeIn">
            <article><?php echo $article['content'] ?></article>
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
                           placeholder="昵称" required>
                </div>
                <div class="form-group">
                    <label for="comment"></label>
                    <textarea class="form-control "name="comment" id="text1" placeholder="说点什么吧" style="display:none" required></textarea>
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
                <a href="#commentBox" class="reply">回复</a>
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
                            <a href="#commentBox" class="reply repplyInside">回复</a>
                        </div>
                    </div>
                    <?php $index++;$num++; endforeach ?>
            </div>
            <?php $count++;$num++; endforeach ?>

        <div class="footer ">
            <div class="footerItem text-center">

                <div class="link">
                    <div class="QR"><img src="static/assets/img/微信图片_20180815234204.jpg" alt="" class="img-fluid"></div>
                    <a href="#" class="icon1 wechat"><span></span></a>
                    <a href="https://blog.csdn.net/Slartibartfast" class="icon1 csdn"><span></span></a>
                    <a href="https://github.com/Slartbartfast1/Myblog" class="icon1 github"><span></span></a>

                </div>
                <?php $user=myFetchOne("select * from user where userid='huangrui1019';"); ?>
                <small class="text-muted"> <?php echo $user['email'] ?>  京ICP备18046047号</small>
                <p class="text-muted">© 2018 <?php echo $user['name'] ?></p>
            </div>
        </div>
    </div>

</div>
</div>
<div class='goTop'>
    <span class="iconfont"></span>

</div>

<script>

    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();

    hljs.initHighlightingOnLoad();
</script>
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


<script src="https://cdn.bootcss.com/wangEditor/3.1.1/wangEditor.min.js"></script>
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
    $('.reply').on('click',function(){
        let fatherid = $(this).parent().find('.fatherid').text();
        let id=$(this).parent().attr('id');
        let name = $(this).parent().find('.nick').eq(0).text();
        let anchor="<a href='#"+id+"'>"+"@"+name+"</a>"+"<p><br></p>";//富文本编辑器中插入src为锚点的a标签
        $('#fatherid').val(fatherid);
        editor.txt.html(anchor);
    });

    // 清空按钮
    $('.empty').on('click',function(){
        editor.txt.html('');
        $('#tex1').text('');
        $('#fatherid').val('');
    });


    $('.wechat').mouseenter(function(){
        $('.QR').fadeIn(200);
    });
    $('.wechat').mouseleave(function(){
        $('.QR').fadeOut(100);
    });
    //内容加样式
    $('table').addClass('table table-bordered table-striped ').wrap('<div></div>').parent().addClass('table-responsive');
    $('thead').addClass('thead-light');


</script>

</body>
</html>
