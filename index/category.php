<?php include "header.php"; ?>
<style>
    .content{
        width:800px;
        margin:0 auto;
    }
    .list{
        height: 188px;
        width:188px;
        border:1px solid #000;
        margin:5px;
        float:left;
        line-height:188px;
        text-align:center;
    }
    .list a{
        color:#000;
    }
</style>
<div class="content">
    <ul>
        <?php
            $id=$_GET["id"];
            $sql="select * from category where pid=".$id;
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()){

        ?>
        <li class="list">
            <a href="list.php?id=<?php echo $row['cid'];?>"><?php echo $row['cname']?></a>
        </li>
        <?php
            }
        ?>
    </ul>
</div>



</body>
</html>