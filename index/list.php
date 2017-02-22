<?php include "header.php"; ?>

<style>
    p{
        padding:0;
        margin:0;
    }
    .content{
        width: 1000px;
        margin:0 auto;
        padding-top:20px;
    }
    .list{
        height:30px;
        line-height:30px;
        border-bottom:1px solid #000;
    }
    .list>p.title{
        height:100%;
        width:550px;
        padding-left:20px;
        float:left;
    }
    .list>p.info{
        width:200px;
        float:right;
    }
    .list>p>a{
        color:#000;
        font-weight:500;
        margin-right:100px;
    }
    .list>p span{
        float:left;
    }
    .list .username{
        width:100px;
        overflow:hidden;
    }
    .list>p span{
        display:inline-block;
        text-align:left;
        color:#555;
        font-size:12px;
    }
</style>

<div class="content">
    <ul>
        <?php
            $id=$_GET["id"];
            $sql="select * from shows where cid=".$id;
//            echo $sql;
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()){
        ?>
        <li class="list">
            <p class="title"><a href="show.php?id=<?php echo $row['sid'] ?>"><?php echo $row['stitle'];?></a></p>
            <p><span class="username">作者：<?php echo $row["username"]?></span><span class="time">时间:<?php echo $row["stime"];?></span></p>
        </li>
        <?php
            }
        ?>
    </ul>

</div>

</body>
</html>
