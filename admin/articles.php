<?php
include('navBar.php');
require_once '../static/function.php';
myGetCurrentUser();


//分页参数
$page = empty($_GET['page']) ? 1 : (int)$_GET['page'];
$size = 5;
$offset = ($page - 1) * $size;


//筛选参数
$where='1=1';
$search='';
//分类筛选
if(!empty($_GET['category'])&&$_GET['category']!='all'){
    $where.=' and article.category= ' . $_GET['category'];
    $search.='&category='.$_GET['category'];
}
//置顶筛选
if(!empty($_GET['top'])&&$_GET['top']!='all'){
    $where.=' and article.top= ' . $_GET['top'];
    $search.='&top='.$_GET['top'];
}



//不能小于1
$page<1? header('Location: /Myblog/admin/articles.php?page=1'.$search):$page;

//最大的页数

$totalCount = (int)myFetchOne("select count(1) as num from article where {$where}")['num'];
$totalPages = (int)ceil($totalCount / $size);

//不能超出page范围
$page>$totalPages? header('Location: /Myblog/admin/articles.php?page=' . $totalPages . $search):$page;

//分页页码
$visiables = 5;
$region = ($visiables - 1) / 2;//左右区间
$begin = $page - $region;//开始页码
$end = $begin + $visiables;//结束页码+1
if ($begin < 1) {
    $begin = 1;
    $end = $begin + $visiables;
}
if ($end > $totalPages + 1) {
    $end = $totalPages + 1;
    $begin = $end - $visiables;
    if ($begin < 1) {
        $begin = 1;
    }
}



//联合查询
$articles = myFetchAll("select article.articleid,
article.title,
article.author,
article.createTime,
article.top,
article.category,
categories.id,
categories.categories as categoryName
from article 
inner join categories on article.category=categories.id where {$where} and articleid!=228 limit {$offset},{$size};");

//转换置顶状态格式;
function convertTop($top)
{
    $dict = array(
        '2' => '未置顶',
        '1' => '置顶'
    );
    return isset($dict[$top]) ? $dict[$top] : '未知';
}
$categories=myFetchAll('select * from categories');






?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .page {
            float: right;
            display: inline-block;
        }

    </style>
</head>
<body>
<script>NProgress.start();</script>
<div class="container">
    <div class="page-title my-5">
        <h1>文章管理</h1>
    </div>
    <div class="page-action row">
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline col-lg-8 col-sm-12" method="get" name="id" action="<?php $_SERVER['PHP_SELF'] ?>">
            <select name="category" class="form-control input-sm" >
                <option value="all">所有分类</option>
                <?php foreach ($categories as $item) :?>
                <option value="<?php echo $item['id'];?>"
                    <?php echo isset($_GET['category'])&&$_GET['category']===$item['id']?'selected':'' ?>
                >
                    <?php echo $item['categories'];?>
                </option>
                <?php endforeach ?>
<!--                <option value="no">未分类</option>-->
            </select>
            <select name="top" class="form-control input-sm">
                <option value="all">所有状态</option>
                <option value="1" <?php echo isset($_GET['top'])&&$_GET['top']==1?'selected':'' ?>>置顶</option>
                <option value="2" <?php echo isset($_GET['top'])&&$_GET['top']==2?'selected':'' ?>>未置顶</option>
            </select>
            <button class="btn btn-primary">筛选</button>
        </form>
        <div class="page">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo ($page - 1).$search; ?>">
                        上一页</a>
                </li>
                <?php for ($i = $begin; $i < $end; $i++): ?>
                    <li class="page-item<?php echo $i === $page ? ' active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i.$search; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor ?>
                <li class="page-item">
                    <a class="page-link"
                       href="?page=<?php echo $page == $totalPages ? ($page).$search : ($page + 1).$search; ?>">
                        下一页
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">


        <thead>
        <tr>
<!--            <th class="text-center" width="40"><input type="checkbox"></th>-->
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">置顶</th>
            <th class="text-center" width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $item): ?>
            <tr>
<!--                <td class="text-center"><input type="checkbox"></td>-->
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['author']; ?></td>
                <td><?php echo $item['categoryName']; ?></td>
                <td class="text-center"><?php echo $item['createTime']; ?></td>
                <td class="text-center"><?php echo convertTop($item['top']); ?></td>
                <td class="text-center">
                    <a href="articleUpdate.php?articleid=<?php echo $item['articleid'] ?>" class="btn  btn-primary btn-xs">编辑</a>
                    <a href="articleDelete.php?articleid=<?php echo $articles['articleid']?>"
                       class="btn btn-danger btn-xs">
                        删除
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<script>NProgress.done();</script>
</body>
</html>
