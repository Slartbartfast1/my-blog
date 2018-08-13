<?php
include('navBar.php');
require_once '../static/function.php';
myGetCurrentUser();
$music=myFetchAll('select * from music');

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
        <h1>音乐管理</h1>
    </div>
    <div class="row">
        <div class="col-10">
            <table class="table table-striped table-bordered table-hover text-center">
                <thead>
                <th>海报</th>
                  <th>歌名</th>
                  <th>歌手</th>
                  <th>摘要</th>
                  <th>唱片集</th>
                  <th>操作</th>
                </thead>
                <tbody>
                <?php foreach ($music as $item): ?>
                <tr>
                    <td><img src="<?php echo $item['posterurl']  ?>" alt="" width="100" height="100"></td>
                    <td><?php echo $item['title']  ?></td>
                    <td><?php echo $item['author']  ?></td>
                    <td><?php echo $item['description']  ?></td>
                    <td><?php echo $item['album']  ?></td>
                    <td><a href="/Myblog/admin/musicDelete.php?title=<?php echo $item['title']; ?>"
                           class="btn btn-danger btn-sm">删除</a></td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
        <div class="col-4">

        </div>
    </div>
</div>
</body>
</html>
