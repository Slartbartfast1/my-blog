<?php
include('navBar.php');
require_once '../static/function.php';
header("Content-Type: text/html;charset=utf-8");
myGetCurrentUser();

//连接数据库 填充标签
$categories = myFetchAll('select * from categories;');
if($_SERVER['REQUEST_METHOD']==='GET'){
    $articleid=$_GET['articleid'];
    $article=myFetchOne("select * from article where articleid ='{$articleid}'");
}

//表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['title'])) {
        $GLOBALS['errorMessage'] = '标题不能为空';
        return;
    }
    if (empty($_POST['author'])) {
        $GLOBALS['errorMessage'] = '作者不能为空';
        return;
    }
    if (empty($_POST['createTime'])) {
        $GLOBALS['errorMessage'] = '创建时间不能为空';
        return;
    }



    if (empty($_POST['content'])) {
        $GLOBALS['errorMessage'] = '内容不能为空';
        return;
    }


    //变量声明

    $articleid1=$_POST['articleid'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $createTime = $_POST['createTime'];
    $imgTitle = $_FILES['imgTitle'];
    $category1 = $_POST['category'];
    $category2=myFetchOne("select * from categories where categories='{$category1}';");
    $category=$category2['id'];
    $content =addslashes($_POST['content']);
    $gist=addslashes($_POST['gist']);

    $article1=myFetchOne("select * from article where articleid ='{$articleid1}';");
    if (empty($_FILES['imgTitle']["name"])) {
        $dest2=$article1['imgurl'];  //保留原来路径


    }else{
      $dest= '../static/assets/img/' . $title . $imgTitle['name'];//更新路径
        $dest2=substr($dest,3);
        if(isset($_FILES['imgTitle']["name"])){
            move_uploaded_file($imgTitle['tmp_name'], $dest)? var_dump('上传成功') : exit('上传失败') ;
        };
    };



    //转换为插入语句
    if (isset($_POST['top'])) {
        $top = 1;//置顶
    } else {
        $top = 2;//不置顶
    }
    //将数据存入数据库
    if (myExecute("update article set title='{$title}',createTime='{$createTime}'
,author='{$author}',content='{$content}',top={$top},gist='{$gist}',imgurl='{$dest2}',category='{$category}' where articleid='{$articleid1}';")) {
        exit('更新成功');
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
    <title>文章编辑</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css
">
</head>
<body>

<div class="container ml-6 py-5 ">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="page-title">
            <h1>文章编辑</h1>
            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-warning text-center">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group" style="display: none">
            <label for="id">id</label>
            <input type="text" class="form-control" name="articleid" id="articleid" accept="multipart/form-data"
                   value="<?php echo $articleid ?>">
        </div>
        <div class="form-group">
            <label for="标题">标题</label>
            <input type="text" class="form-control" name="title" id="title" accept="multipart/form-data"
                   value="<?php echo $_SERVER['REQUEST_METHOD']==='GET'? $article['title']:''; ?>">
        </div>
        <div class="form-group">
            <label for="作者">作者</label>
            <input type="text" class="form-control" name="author" id="author" accept="multipart/form-data"
                   value="<?php echo $article['author']; ?>">
        </div>
        <div class="form-group">
            <label for="摘要">摘要</label>
            <textarea type="text" class="form-control" name="gist" id="gist" cols="30" rows="5" ><?php echo $article['gist']?></textarea>
        </div>
        <div class="form-group">
            <label for="创建时间">创建时间</label>
            <input type="text" class="form-control" name="createTime" id="createTime"
                   accept="multipart/form-data" value="<?php echo $article['createTime']; ?>">
        </div>
        <div class="form-group">
            <div id="image-holder"></div>
            <label for="imgTitle">标题图片</label>
            <input type="file" class="form-control" name="imgTitle" accept="image/*" id="fileUpload">
        </div>
        <div class="form-group">
            <label for="标签"></label>
            <div class="form-group">
                <label for="tag">分类</label>
                <select class="form-control" name="category" accept="multipart/form-data">
                    <?php foreach ($categories as $item): ?>
                        <option <?php echo $item['id']==$article['category']? ' selected':''?>><?php echo $item['categories']?></option>
                    <?php endforeach ?>
                    <option value="other">其它</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="置顶">置顶</label>
            <input type="checkbox" name="top" id="top" accept="multipart/form-data" <?php echo $article['top']==2? ' checked':''?>>
        </div>
        <div class="form-group">
            <label for="articl">文章</label>


            <div id="div1">
                <?php echo $article['content']?>
            </div>
            <!--            将富文本编辑器的内容同步到表单的文本域;-->
            <div style="display:none">
                <textarea id="text1" name="content" class="form-control" value=""></textarea>
            </div>
        </div>
        <button class="btn btn-outline-success" type="submit">保存更改</button>
    </form>
    <script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor;
        var editor = new E('#div1');
        var $text1 = $('#text1');
        editor.customConfig.onchange = function (html) {
            $text1.val(html)
        };
        editor.create();
        $text1.val(editor.txt.html());


    </script>
    <script>
        //图片预览
        $("#fileUpload").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": 400,
                        "height": 200
                    }).appendTo(image_holder);

                };
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("你的浏览器不支持FileReader.");
            }
        });

    </script>
</body>
</html>
