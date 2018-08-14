<?php
require_once '../../static/function.php';

//ajax调用头像
//useid==>img
if(empty($_GET['userid'])){
    exit('缺少必要参数');
}
$userid=$_GET['userid'];
//查询头像地址

$row=myFetchOne("select avatarurl from user where userid='{$userid}'");


echo substr($row['avatarurl'],6);