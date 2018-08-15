<?php
include('navBar.php');
require_once '../static/function.php';
myGetCurrentUser();
$sliders=myFetchAll("select * from slider");
if($_SERVER['REQUEST_METHOD']==='POST'){
    addslider();
}
function addslider(){
    $index=$_POST['index'];
    $name=$_POST['name'];
    $img=$_FILES['img'];
    $dest='../static/assets/sliderImgs/' . $img['name'];
    if(!move_uploaded_file($img['tmp_name'],$dest)){
        exit('上传失败');
    };
    $dest2=substr($dest,3);
    myExecute("insert into slider values(null,'{$name}','{$dest2}','{$index}')");
}

?>
<div class="container">
    <div class="page-title my-5">
        <h1>轮播图管理</h1>
    </div>
    <div class="row">
<div class="col-8">
    <table class="table">
        <thead>
        <th class="text-center">层级</th>
        <th class="text-center">图片</th>
        <th class="text-center">名称</th>
        <th class="text-center">操作</th>
        </thead>
        <tbody>
       <?php foreach ($sliders as $item) :?>
       <tr>
           <td class="text-center"><?php echo $item['index'] ?></td>
           <td class="text-center"><img src="../<?php echo $item['imgurl'] ?>" alt="" width="180" height="90"></td>
           <td class="text-center"><?php echo $item['name'] ?></td>
           <td class="text-center">
               <a href="slider.php?id=<?php echo $item['id']; ?>"
                  class="btn btn-info btn-sm">编辑</a>
               <a href="sliderDelete.php?id=<?php echo $item['id']; ?>"
                  class="btn btn-danger btn-sm">删除</a>
           </td>
       </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <div class="col-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
            <h2>添加图片</h2>
            <div class="form-group">
                <label for="name">名称</label>
                <input id="name" class="form-control" name="name" type="text" placeholder="图片名称">
            </div>
            <div class="form-group">
                <label for="name">层级</label>
                <input id="name" class="form-control" name="index" type="number" placeholder="数字" value="1">
            </div>

            <div class="form-group">
                <label for="img">图片</label>
                <input type="file" class="form-control" name="img" accept="image/*" id="categoriesImg">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">添加</button>
            </div>
        </form>

    </div>
    </div>
</div>