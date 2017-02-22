<?php

    include "../public/db.php";
    $username=$_POST["username"];
    $password=md5($_POST["password"]);

    $sql="insert into user (username,password,role) values ('$username','$password','1')";

    $db->query($sql);
    if($db->affected_rows>0){
        $message="注册成功";
        $url="login.php";
        include "message.html";
    }else{
        echo "注册失败";
    }



?>