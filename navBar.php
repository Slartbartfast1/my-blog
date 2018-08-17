<?php
require_once 'static/function.php';

$user=myFetchOne("select * from user where userid='huangrui1019';");
header("Content-Type: text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/8/9
 * Time: 20:50
 */?>
<header>
    <div class="navbar navbar-expand-sm navbar-light">
        <div class="navWrap text-center">
            <a class="navbar-brand animated " href="#">Slartbartfast's Blog</a>

        </div>
    </div>
</header>
<div class="sideNav sideNavSlide">
    <div class="avatarBox animated">
        <div class="avatar text-center">
            <img src="<?php echo $user['avatarurl'] ?>" alt="" class="img-thumbnail rounded-circle">

        </div>

    </div>
    <div class="quote text-center">
        <small class="text-muted "> <?php echo $user['introduction'] ?></small>
    </div>

    <div class="btns text-center">
        <div class="buttonWarp"><a href="index.php" class="myActive">所有文章
            </a></div>
        <div class="buttonWarp"><a href="categories.php">分类</a></div>
        <div class="buttonWarp musicBox"><a href="music.php">音乐盒</a></div>
        <div class="buttonWarp"><a href="theater.php">豆瓣影讯</a></div>
        <div class="buttonWarp"><a href="comments.php">留言板</a></div>

    </div>

    <div class="openNav">
        <div class="iconBefore beforeDeg"></div>
        <div class="icon"></div>
        <div class="iconAfter afterDeg"></div>
    </div>
</div>




