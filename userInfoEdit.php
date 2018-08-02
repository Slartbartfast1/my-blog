<?php

$conn = mysqli_connect('localhost', 'root', '12345678', 'blog', '3306');
if (!$conn) {
    exit('<h1>连接失败</h1>');
}
$query = mysqli_query($conn, 'select * from user');
if (!$query) {
    exit('<h1>查询失败</h1>');
}
$user = mysqli_fetch_assoc($query);
include('updateUserInfo.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css
">
    <style>

    </style>
</head>
<body>
<div class="container ml-6 py-5 col-5">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <h1>编辑信息</h1>
        <div class="form-group">
            <div class="avatar">
                <img src="<?php echo $user['avatarurl']; ?>" alt="<?php echo $user["name"] ?>">
            </div>
            <label for="avatar">头像</label>
            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
        </div>
        <div class="form-group">
            <label for="name">昵称</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user["name"] ?>">
        </div>
        <div class="form-group">
            <label for="email">电子邮件</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>">
        </div>
        <div class="form-group">
            <label for="intro">个人简介</label>
            <textarea class="form-control" rows="5" id="intro"
                      name="intro"><?php echo $user['introduction'] ?></textarea>
        </div>
        <button class="btn btn-outline-primary">提交修改</button>
    </form>
</div>
</body>
</html>