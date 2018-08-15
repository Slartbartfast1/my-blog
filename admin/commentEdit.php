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
        <h1>评论管理</h1>
    </div>
    <table class="table table-striped table-bordered table-hover ">
        <thead>
        <th>位置</th>
        <th class="text-center">时间</th>
        <th>评论人</th>
        <th>内容</th>
        <th class="text-center">赞</th>
        <th class="text-center">操作</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script src="https://cdn.bootcss.com/jsrender/1.0.0-rc.70/jsrender.min.js"></script>
<script id="commentsTmpl" type="text/myJSRender">
    {{for comments}}
    <tr>
    <td>{{:title}}</td>
    <td class="text-center">{{:commentDate}}</td>
    <td>{{:commentName}}</td>
    <td>{{:commentContent}}</td>
    <td class="text-center">{{:agreement}}</td>
    <td class="text-center">
    {{if childid>0}}
    <a href="commentsDelete.php?childid={{:childid}}"><button class="btn btn-danger">删除</button></td></a>
    {{else}}
    <a href="commentsDelete.php?fatherid={{:fatherid}}"><button class="btn btn-danger">删除</button></td></a>
    {{/if}}
    </tr>
    {{/for}}
</script>
<script>
    //通过ajax发送请求渲染页面
    $.getJSON('comments.php',{},function(res){
        var html =$('#commentsTmpl').render({comments:res});
        $('tbody').html(html);
        console.log(html);
    })

</script>
</body>
</html>
