<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    edit();
}
function edit()
{
    $conn = mysqli_connect('localhost', 'root', '12345678', 'blog', '3306');
    if (!$conn) {
        exit('<h1>连接失败</h1>');
    }
    $query = mysqli_query($conn, 'select * from user');
    if (!$query) {
        exit('<h1>查询失败</h1>');
    }
    $username = $_POST['name'];
    $email = $_POST['email'];
    $intro = $_POST['intro'];
    $avatarFile = $_FILES['avatar'];
    $avatar = 'avatar/' . $avatarFile['name'];
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
    move_uploaded_file($avatarFile['tmp_name'], $avatar);
    //TODO: 如果上传头像为空,头像路径不变;
    if ($_FILES['avatar']["name"] == "") {
        mysqli_query($conn, "update user set name='$username',introduction='$intro',email='$email'");
    } else {
        mysqli_query($conn, "update user set avatarurl='$avatar',name='$username',introduction='$intro',email='$email'");
    }
}

