<?php
    include "../public/db.php";
    $id=$_GET["id"];

    $sql="select  * from category where pid=".$id;
    $result=$db->query($sql);
    if($result->fetch_assoc()){
        $message="此分类下有子分类，请删除子分类后重试";
        $url="showCategory.php";
        echo 122;
        include "message.html";
    }else{
        $delsql="delete from category where cid=".$id;
        $db->query($delsql);
        if($db->affected_rows>0){
            $message="删除成功";
            $url="showCategory.php";
            include "message.html";
        }else{
            $message="删除失败";
            $url="showCategory.php";
            include "message.html";
        }
    }

?>