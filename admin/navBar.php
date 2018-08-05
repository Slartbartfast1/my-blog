<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">

        <li class="nav-item ">
            <a class="nav-link" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown <?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/articleUpdate.php' ? "active" : '' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                文章管理
            </a>
            <div class="dropdown-menu ">
                <a class="dropdown-item" href="articleUpdate.php">文章发布</a>
                <a class="dropdown-item" href="#">文章编辑</a>
                <a class="dropdown-item" href="categories.php">分类管理</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                设置
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">导航菜单</a>
                <a class="dropdown-item" href="#">图片轮播</a>
                <a class="dropdown-item" href="#">网站设置</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="#">评论管理</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/Myblog/admin/userInfoEdit.php' ? "active" : '' ?>"  >
            <a class="nav-link "  href="userInfoEdit.php">用户信息</a>
        </li>
        <li class="nav-item" style="position:absolute;right:50px;">
            <a class="nav-link exit" href="#" >退出</a>
        </li>
    </ul>
</nav>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css
">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.js"></script>
<script src="https://cdn.bootcss.com/nprogress/0.2.0/nprogress.js"></script>
<script>$(document)
        .ajaxStart(function () {
            NProgress.start()
        })
        .ajaxStop(function () {
            NProgress.done()
        })
</script>
<link href="https://cdn.bootcss.com/nprogress/0.2.0/nprogress.css" rel="stylesheet">
