<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userI = $_POST['userID'];
    $password = $_POST['password'];
    $conn = mysqli_connect('localhost', 'root', '12345678', 'blog', '3306');
    $query = mysqli_query($conn, "select * from user where userid='{$userI}' and password='{$password}'");
    $pass = mysqli_fetch_assoc($query);
    if($pass){
        $GLOBALS['error_message']='登陆成功';
    }else{
        $GLOBALS['error_message']='登陆失败';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css
">

</head>
<body>
<div class="container py-5">
    <h1>登陆</h1>
    <br>
    <?php if (isset($error_message)): ?>
        <div class="alert alert-warning  col-4">
            <?php echo $error_message; ?>
        </div>
    <?php endif ?>
    <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group col-4">
            <label for="userID">用户名</label>
            <input type="text" class="form-control" id="userID" name="userID">
        </div>
        <div class="form-group col-4">
            <label for="password">密码</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-outline-primary">登陆</button>
    </form>

</div>
</body>
</html>