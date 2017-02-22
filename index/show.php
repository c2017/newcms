<?php

    include "header.php";

    $id=$_GET["id"];
    $sql="select * from shows where sid=".$id;
    $result=$db->query($sql);
    $row=$result->fetch_assoc();

?>
<style>
    p{
        padding:0;
        margin:0;
    }
    .content{
        min-height:400px;
        width: 800px;
        border:1px solid #000;
        padding-top:20px;
        margin:0 auto;
    }
    .title{
        line-height:50px;
        text-align:center;
        font-weight:500;
        font-size:20px;
        color:#333;
        margin:0;
    }
    .info{
        line-height:20px;
        text-align:center;
        border-bottom:1px solid #ddd;
        padding-bottom:10px;
    }
    .time,.username{
        color:#555;
        padding:10px;
    }
    .scon{
        padding:15px;
    }
</style>

<div class="content">
    <h3 class="title"><?php echo $row["stitle"]?></h3>
    <p class="info">
        <span class="time"><?php echo $row["stime"];?></span>
        <span class="username"><?php echo $row["username"];?></span>
    </p>
    <div class="scon">
        <?php echo $row["scon"]?>
    </div>
</div>

</body>
</html>