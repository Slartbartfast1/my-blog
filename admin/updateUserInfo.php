<?php
require_once '../static/function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    edit();
}
function edit()
{
    $username = $_POST['name'];
    $email = $_POST['email'];
    $intro = $_POST['intro'];
    $avatarFile = $_FILES['avatar'];
    $dest = 'avatar/' . $avatarFile['name'];
    //TODO:验证昵称 邮箱 个人简介 不能为空
    if (empty($username)) {
        exit('昵称不能为空');
    }
    if (empty($email)) {
        exit('邮箱不能为空');
    }
    if (empty($intro)) {
        exit('个人简介不能为空');
    }
    if(!move_uploaded_file($avatarFile['tmp_name'], $dest)){
        exit('上传失败');
    }
    //TODO: 如果上传头像为空,头像路径不变;
    if ($_FILES['avatar']["name"] == "") {
        myExecute("update user set name='$username',introduction='$intro',email='$email'");
    } else {
        myExecute( "update user set avatarurl='$dest',name='$username',introduction='$intro',email='$email'");
    }
}


