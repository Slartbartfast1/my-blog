<?php
include('navBar.php');
include('updateUserInfo.php');
require_once '../static/function.php';
myGetCurrentUser();
$user =myFetchOne('select * from user');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    </style>

    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/bootstrap.min.css
">
</head>
<body>

<div class="container ml-6 py-5 col-5">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="page-title mb-5">
            <h1>用户信息</h1>
        </div>
        <div class="form-group">
            <div class="avatar text-center">
                <img src="<?php echo substr($user['avatarurl'],6); ?>" alt="<?php echo $user["name"] ?>"  class="img-thumbnail col-5">
            </div>
            <div class="custom-file mt-3">
                <input type="file" class="custom-file-input form-control" id="avatar" name="avatar" accept="image/*">
                <label class="custom-file-label" for="avatar">上传头像</label>
            </div>
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
    <script>
        $("#avatar").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $(".avatar");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "img-thumbnail col-5",
                    }).appendTo(image_holder);
                };
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("你的浏览器不支持FileReader.");
            }
        });
    </script>
</div>
</body>
</html>