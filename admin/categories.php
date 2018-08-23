<?php
include('navBar.php');
require_once '../static/function.php';
header("Content-Type: text/html;charset=utf-8");
myGetCurrentUser();

function addCategory()
{
    if (empty($_POST['categories']) || empty($_POST['slug'])) {
        $GLOBALS['message'] = '请完整填写表单！';
        $GLOBALS['success'] = false;
        return;
    }
    $categories = $_POST['categories'];
    $slug = $_POST['slug'];
    $categoriesImg = $_FILES['categoriesImg'];
    $dest = '../static/assets/categories/' . $slug . $categoriesImg['name'];
    if(!move_uploaded_file($categoriesImg['tmp_name'], $dest)){
        exit('上传失败');
    }
    $dest2 = substr($dest, 3);
    $rows = myExecute("insert into categories values (null, '{$categories}', '{$slug}','{$dest2}');");
    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['message'] = $rows <= 0 ? '添加失败！' : '添加成功！';
}

function editCategory()
{
    global $currentEditCategory;
    // 接收并保存
    $id = $currentEditCategory['id'];
    $category = empty($_POST['categories']) ? $currentEditCategory['categories'] : $_POST['categories'];
    $currentEditCategory['categories'] = $category;
    $slug = empty($_POST['slug']) ? $currentEditCategory['slug'] : $_POST['slug'];
    $currentEditCategory['slug'] = $slug;

    if(!empty($_FILES['categoriesImg']['name'])){
        $categoriesImg=$_FILES['categoriesImg'];
        $dest = '../static/assets/categories/'  .$slug. $categoriesImg['name'];
        if(!move_uploaded_file($categoriesImg['tmp_name'], $dest)){
            exit('上传失败');
        };
        $dest2 = substr($dest, 3);
        $rows = myExecute("update categories set categories='{$category}',slug='{$slug}',imgurl='{$dest2}'where id={$id}");
    }else{
        $rows = myExecute("update categories set categories='{$category}',slug='{$slug}'where id={$id}");
    }
    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['message'] = $rows <= 0 ? '更新失败！' : '更新成功！';
}

$categories = myFetchAll('select * from categories;');

//不同请求采取不同的方法
if (empty($_GET['id'])) {

    // 添加
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addCategory();
    }

} else {
    $currentEditCategory = myFetchOne('select * from categories where id = ' . $_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        editCategory();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>分类管理</title>
</head>
<body>

<div class="container">
    <div class="page-title my-5">
        <h1>分类管理</h1>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 col-sm-12">
            <div class="page-action">
                <!-- show when multiple checked -->
                <a id="btnDelete" class="btn btn-danger btn-sm" href="/admin/categoriesDelete.php"
                   style="display: none">批量删除</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center" width="40"><input type="checkbox"></th>
                    <th>名称</th>
                    <th>Slug</th>
                    <th class="text-center" width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $item): ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" data-id="<?php echo $item['id']; ?>"></td>
                        <td><?php echo $item['categories']; ?></td>
                        <td><?php echo $item['slug']; ?></td>
                        <td class="text-center">
                            <a href="categories.php?id=<?php echo $item['id']; ?>"
                               class="btn btn-info btn-sm">编辑</a>
                            <a href="categoriesDelete.php?id=<?php echo $item['id']; ?>"
                               class="btn btn-danger btn-sm">删除</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <?php if (isset($message)): ?>
                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <strong><?php echo $message; ?></strong>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        <strong> <?php echo $message; ?></strong>
                    </div>
                <?php endif ?>
            <?php endif ?>
            <?php if (isset($currentEditCategory)): ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $currentEditCategory['id']; ?>"
                      method="post" enctype="multipart/form-data">
                    <h2>编辑"<?php echo $currentEditCategory['categories']; ?>"</h2>
                    <div class="form-group">
                        <label for="name">名称</label>
                        <input id="name" class="form-control" name="categories" type="text" placeholder="分类"
                               value="<?php echo $currentEditCategory['categories']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="slug">别名</label>
                        <input id="slug" class="form-control" name="slug" type="text" placeholder="slug"
                               value="<?php echo $currentEditCategory['slug']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoriesImg">图片</label>
                        <input type="file" class="form-control" name="categoriesImg" accept="image/*" id="categoriesImg">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">保存</button>
                        <a class="btn btn-secondary" href="categories.php">取消</a>
                    </div>
                </form>
            <?php else: ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                    <h2>添加新分类</h2>
                    <div class="form-group">
                        <label for="name">名称</label>
                        <input id="name" class="form-control" name="categories" type="text" placeholder="分类名称">
                    </div>
                    <div class="form-group">
                        <label for="slug">别名</label>
                        <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                    </div>
                    <div class="form-group">
                        <label for="categoriesImg">图片</label>
                        <input type="file" class="form-control" name="categoriesImg" accept="image/*" id="categoriesImg">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">添加</button>
                    </div>
                </form>
            <?php endif ?>
        </div>
    </div>
</div>
<script>
    $(function ($) {
        // 在表格中的任意一个 checkbox 选中状态变化时
        var $tbodyCheckboxs = $('tbody input');
        var $btnDelete = $('#btnDelete');
        // 定义一个数组记录被选中的
        var allCheckeds = [];
        $tbodyCheckboxs.on('change', function () {
            var id = $(this).data('id');
            if ($(this).prop('checked')) {
                allCheckeds.includes(id) || allCheckeds.push(id)
            } else {
                allCheckeds.splice(allCheckeds.indexOf(id), 1)
            }
            // 根据剩下多少选中的 checkbox 决定是否显示删除
            allCheckeds.length ? $btnDelete.fadeIn() : $btnDelete.fadeOut();
            $btnDelete.prop('search', '?id=' + allCheckeds)
        });
        $('thead input').on('change', function () {
            var checked = $(this).prop('checked');
            $tbodyCheckboxs.prop('checked', checked).trigger('change');
        })
    });
</script>



</body>
</html>
