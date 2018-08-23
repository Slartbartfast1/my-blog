<?php
header("Content-Type: text/html;charset=utf-8");
require_once '../static/function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = addslashes($_POST['userID']);
    $password =addslashes($_POST['password']);
    $pass= myFetchOne("select * from user where userid='{$userID}' and password='{$password}'");
    if($pass){
        $_SESSION['currentLoginUser']=$userID;
        header('Location: adminIndex.php');
    }else{
        $GLOBALS['errorMessage']='登陆失败';
    }
}
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['action'])&&$_GET['action']==='logout'){
    unset($_SESSION['currentLoginUser']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .loginBox{
            height:400px;
            width:400px;
            left:50%;
            top:40%;
            position: absolute;
            margin-left:-200px;
            margin-top:-200px;
          }
        .avatarBox{
            width: 180px;
            height: 180px;
            position:relative;
            left:50%;
            margin-left:-90px;
        }
        .avatar{
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css
">


</head>
<body>
<div class="container">
    <div class="loginBox">
        <div class="avatarBox text-center ">
    <img  src="avatar/default.png" alt="" class="img-thumbnail rounded-circle avatar"></div>
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-warning text-center">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif ?>
    <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group ">
            <label for="userID">用户名:</label>
            <input type="text" class="form-control" id="userID" name="userID" autocomplete="off">
        </div>
        <div class="form-group ">
            <label for="password">密码:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-outline-primary btn-lg btn-block mt-5">登陆</button>
    </form>
    </div>

</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script>
    $(function($){
        $('#userID').on('blur',function(){
            var value=$(this).val();
            if(!value) return;
            $.get('api/avatar.php',{userid:value},function(res){
                if(!res) return;
                $('.avatar').fadeOut(function () {
                    $(this).on('load', function () {
                        $(this).fadeIn()
                    }).attr('src', res)
                })
            })
        })
    });



</script>


</body>
</html>