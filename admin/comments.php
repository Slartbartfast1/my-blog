<?php
require_once '../static/function.php';

//TODO:连接数据库将数据以json格式返回

$comments=myFetchAll('select * from commentfather inner join article 
on commentfather.articleid=article.articleid ;');

$json=json_encode($comments);

header('Content-Type:application/json');

echo $json;

