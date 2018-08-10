<?php
include('navBar.php');
require_once '../static/function.php';
myGetCurrentUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="page-title my-5">
        <h1>资源管理</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table table-striped table-bordered table-hover">
                <thead>
              <tr>
                  <th>歌名</th>
                  <th>歌手</th>
                  <th>海报</th>
                  <th></th>
                  <th>操作</th>
              </tr>
                </thead>
            </table>
        </div>
        <div class="col-4">

        </div>
    </div>
</div>
</body>
</html>
