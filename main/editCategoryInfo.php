<?php
    include "../public/db.php";

    $id=$_GET["id"];
    $pid=$_GET["category"];
    $cname=$_GET["editcat"];
    $sql="update category set cname='$cname',pid='$pid' where cid=".$id;

    $db->query("$sql");
    if($db->affected_rows>0){
        $message="修改成功";
        $url="showCategory.php";
        include "message.html";
    }else{
        $message="修改失败";
        $url="editCategory.php";
        include "message.html";
    }

?>