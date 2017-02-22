<?php
    include "../public/session.php";
    include "../public/db.php";

    $cid=$_GET["category"];
    $sid=$_GET["sid"];
    $stitle=$_GET["stitle"];
    $scon=$_GET["scon"];
    $sql="update shows set cid=$cid,stitle='$stitle',scon='$scon' where sid=$sid ";

    $db->query($sql);
    if($db->affected_rows>0){
        $message="修改成功";
        $url="showcon.php";
        include "message.html";
    }else{
        $message="修改失败";
        $url="showcon.php";
        include "message.html";
    }


?>