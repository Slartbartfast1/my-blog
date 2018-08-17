<?php
require_once '../static/function.php';
header("Content-Type: text/html;charset=utf-8");
if(empty($_GET['articleid'])){
    exit('错误请求');
}
$id=$_GET['articleid'];
$rows=myExecute('delete from article where id in (' .articleid . ');');


header('Location: '.$_SERVER['HTTP_REFERER']);//返回请求页面


