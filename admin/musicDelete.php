<?php
require_once '../static/function.php';

    if(empty($_GET['title'])){
        exit('错误请求');
    }
    $title=$_GET['title'];
    $rows=myExecute("delete from music where title ='{$title}';");
    header('Location:musicEdit.php');






?>