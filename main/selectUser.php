<?php

    include "public/db.php";

    $username=$_GET["username"];
    $sql="select username from user";
    $result=$db->query($sql);
    if($row=$result->fetch_assoc()){
        if($username==$row){
            echo "error";
            exit;
        }
    }
    echo "ok";

?>
