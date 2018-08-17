<?php
require_once '../static/function.php';
if($_SERVER['REQUEST_METHOD']==='GET'){




    if(!empty($_GET['childid'])){
        $childid=$_GET['childid'];
        myExecute("delete from commentchild where childid='{$childid}';");
        return;
    }
    else if(!empty($_GET['fatherid'])){
        $fatherid=$_GET['fatherid'];
        myExecute("delete from commentfather where fatherid='{$fatherid}';");
        return;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

