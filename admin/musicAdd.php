<?php
include('navBar.php');
require_once '../static/function.php';
header("Content-Type: text/html;charset=utf-8");
myGetCurrentUser();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addMusic();
}
function addMusic()
{
    if (empty($_POST['title'])) {
        $GLOBALS['errorMessage'] = '请输入标题';
        return;
    }
    if (empty($_POST['author'])) {
        $GLOBALS['errorMessage'] = '请输入歌手';
        return;
    }
    if (empty($_FILES['music']['name'])) {
        $GLOBALS['errorMessage'] = '请上传音乐';
        return;
    }
    if (empty($_FILES['poster']['name'])) {
        $GLOBALS['errorMessage'] = '请上传海报';
        return;
    }
    if (empty($_POST['desc'])) {
        $GLOBALS['errorMessage'] = '请输入描述';
        return;
    }
    if (empty($_POST['album'])) {
        $GLOBALS['errorMessage'] = '请输入合集';
        return;
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    $music = $_FILES['music'];
    $poster = $_FILES['poster'];
    $desc = $_POST['desc'];
    $album=$_POST['album'];
    $musicDest = '../static/assets/music/' . $title . $music['name'];
    $posterDest='../static/assets/music/poster/' . $title . $poster['name'];
    $musicDest2=substr($musicDest,3);
    $posterDest2=substr($posterDest,3);


    if (!move_uploaded_file($music['tmp_name'],$musicDest)) {
        exit('上传音乐失败');
    }
    if (!move_uploaded_file($poster['tmp_name'],$posterDest)) {
        exit('上传海报失败');
    }


    

if(!myExecute("insert into music values(null,'{$title}','{$musicDest2}','{$author}','{$posterDest2}','{$desc}','{$album}')")){
    exit('更新数据库失败');
}else{
    header('Location:musicAdd.php');
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
    <title>音乐上传</title>
</head>
<body>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="page-title py-5">
            <h1>音乐上传</h1>
            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-warning text-center">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="title">歌名</label>
            <input type="text" class="form-control" name="title" id="title" accept="multipart/form-data">
        </div>
        <div class="form-group">
            <label for="music">音乐</label>
            <input type="file" class="form-control" name="music" accept="mp3/*" id="fileUpload">
        </div>
        <div class="form-group">
            <label for="author">歌手</label>
            <input type="text" class="form-control" name="author" id="author" accept="multipart/form-data"">
        </div>
        <div class="form-group">
            <label for="album">唱片集</label>
            <input type="text" class="form-control" name="album" id="album" accept="multipart/form-data"">
        </div>
        <div class="form-group">
            <div id="imageHolder"></div>
            <label for="poster">海报</label>
            <input type="file" class="form-control" name="poster" accept="image/*" id="fileUpload">
        </div>
        <div class="form-group">
            <label for="desc">描述</label>
            <textarea type="text" class="form-control" name="desc" id="desc" cols="30" rows="5"></textarea>
        </div>
        <button class="btn btn-outline-success" type="submit">上传</button>

    </form>
</div>
</body>
</html>
