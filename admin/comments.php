<?php
require_once '../static/function.php';

//TODO:连接数据库将数据以json格式返回

$commentsfather=myFetchAll('select * from commentfather inner join article on commentfather.articleid=article.articleid;');
$commentschild=myFetchAll('select * from commentchild inner join article on commentchild.articleid=article.articleid;');
$comments=array_merge($commentsfather,$commentschild);
$json=json_encode($comments);

header('Content-Type:application/json');

echo $json;

