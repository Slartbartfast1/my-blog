<?php
require_once '../static/function.php';

if(empty($_GET['id'])){
    exit('错误请求');
}

$id=$_GET['id'];

$rows=myExecute('delete from categories where id in (' .$id . ');');


header('Location: /admin/categories.php');
