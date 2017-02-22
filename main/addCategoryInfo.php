<?php

    include "../public/db.php";
    $pid=$_GET["category"];
    $val=$_GET["addcat"];

    $sql="insert into category (cname,pid) values ('$val','$pid')";
    $db->query($sql);
    if($db->affected_rows>0){
        $message="添加成功";
        $url="addCategory.php";
        include "message.html";
    }else{
        $message="添加失败";
        $url="addCategory.php";
        include "message.html";
    }

?>