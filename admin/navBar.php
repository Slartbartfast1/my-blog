<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">

        <li class="nav-item ">
            <a class= "nav-link <?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/adminIndex.php' ? "active" : '' ?>"
               href="adminIndex.php">网站总览</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown <?php echo $_SERVER['PHP_SELF'] == '/Myblog/admin/musicAdd.php' ? " active" : '' ?>
<?php echo $_SERVER['PHP_SELF'] == '/Myblog/admin/musicEdit.php' ? " active" : '' ?>">
            <a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
                资源管理
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="musicAdd.php">音乐上传</a>
                <a class="dropdown-item" href="musicEdit.php">音乐编辑</a>
            </div>
        </li>
        <li class="nav-item dropdown
<?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/articleAdd.php' ? "active" : '' ?>
<?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/articles.php' ? "active" : '' ?>
<?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/categories.php' ? "active" : '' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                文章管理
            </a>
            <div class="dropdown-menu ">
                <a class="dropdown-item" href="articleAdd.php">文章发布</a>
                <a class="dropdown-item" href="articles.php">文章管理</a>
                <a class="dropdown-item" href="categories.php">分类管理</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                设置
            </a>
            <div class="dropdown-menu">
<!--                <a class="dropdown-item" href="#">导航菜单</a>-->
                <a class="dropdown-item" href="sliderSeetings.php">图片轮播</a>
                <a class="dropdown-item" href="#">网站设置</a>
            </div>
        </li>

        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] == '/Myblog/admin/commentEdit.php' ? "active" : '' ?>">
            <a class="nav-link " href="commentEdit.php" >评论管理</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/userInfoEdit.php' ? "active" : '' ?>">
            <a class="nav-link "  href="userInfoEdit.php">用户信息</a>
        </li>
        <li class="nav-item pull-right" >
<!--            删除SESSION-->
            <a class="nav-link exit" href="login.php?action=logout" >退出</a>
        </li>
    </ul>
</nav>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css
">
<script src="../static/assets/vendors/jQuery/jQuery.js"></script>
<script src="../static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../static/assets/vendors/nprogress/nprogress.js"></script>
<link href="../static/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
