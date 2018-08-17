<?php
header("Content-Type: text/html;charset=utf-8");
require_once 'config.php';

/**
 * 封装公用的函数
 */
session_start();


/**
 * 获取当前登录用户信息，如果没有获取到则自动跳转到登录页面
 */
function myGetCurrentUser () {
    if (empty($_SESSION['currentLoginUser'])) {
        // 没有当前登录用户信息，意味着没有登录
        header('Location: /Myblog/admin/login.php');
        exit(); // 没有必要再执行之后的代码
    }
    return $_SESSION['currentLoginUser'];
}

/**
 * 多条数据
 */
function myFetchAll ($sql) {
    $conn = mysqli_connect(MY_DB_HOST, MY_DB_USER, MY_DB_PASS, MY_DB_NAME);
    mysqli_query($conn,"set names utf8mb4");
    if (!$conn) {
        exit('连接失败');
    }

    $query = mysqli_query($conn, $sql);
    if (!$query) {
        // 查询失败
        return false;
    }

    $result=[];
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
        //释放并关闭
    mysqli_free_result($query);
    mysqli_close($conn);

    return $result;
}

/**
 * 单条数据
 *
 */
function myFetchOne ($sql) {
    $res = myFetchAll($sql);
    return isset($res[0]) ? $res[0] : null;
}

/**
 * 增删改
 */
function myExecute ($sql) {
    $conn = mysqli_connect(MY_DB_HOST, MY_DB_USER, MY_DB_PASS, MY_DB_NAME);
    if (!$conn) {
        exit('连接失败');
    }
    mysqli_query($conn,"set names utf8mb4");
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        // 查询失败
        return false;
    }
        //返回受影响行数
    $affected_rows = mysqli_affected_rows($conn);

    mysqli_close($conn);

    return $affected_rows;
}
