<?php
require_once '../static/function.php';

$id=$_GET['id'];
myExecute("delete from slider where id='{$id}'");

header('Location: '.$_SERVER['HTTP_REFERER']);