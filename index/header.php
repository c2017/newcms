<?php
include "../public/db.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul,li{
            margin:0;
            padding:0;
            list-style: none;
        }
        a{
            text-decoration:none;
        }
        .header{
            height:100px;
            width:800px;
            margin:0 auto;
            background:#0d6ec8;
        }
        .nav{
            height:30px;
            width:800px;
            margin:0 auto;
            background:#3bc6b1;
        }
        .nav .select{
            background:#FF5077;
        }
        .nav .opt{
            height:100%;
            line-height:30px;
            position:relative;
            float:left;
        }
        .nav .opt>a{
            display:block;
            height:100%;
            padding:0 20px;
            color:#000;
        }
        .nav .erji{
            height:100px;
            width:100px;
            border:1px solid #ddd;
            position:absolute;
            top:30px;
            left:20px;
            display:none;
        }
        .nav .sopt{
            line-height:26px;
            text-align:center;
        }
        .nav .sopt>a{
            color:#000;
        }
    </style>
</head>
<script src="../js/jquery-min.js"></script>
<script>
    $(function(){
        $(".opt").hover(function(){
            $(this).find(".erji").slideDown(100);
        },function(){
            $(this).find(".erji").slideUp(100);
        })
    })
</script>
<body>
<div class="header">

</div>
<ul class="nav">
    <li class="opt <?php if(!isset($_GET['id'])){echo 'select';}?>"><a href="index.php">首页</a></li>
    <?php
    $sql=0;
    $result=$db->query("select * from category where pid=0");
    if(!isset($_GET['id'])){
        $id=null;
    }else{
        $id=$_GET['id'];
    }

    while($row=$result->fetch_assoc()){
        ?>
        <li class="opt <?php if($row['cid']==$id){echo 'select';}?>">
            <a href="category.php?id=<?php echo $row['cid']; ?>"><?php echo $row["cname"]; ?></a>
            <ul class="erji">
                <?php
                $sql1="select * from category where pid=".$row["cid"];
                $result1=$db->query($sql1);
                while($row1=$result1->fetch_assoc()){
                    ?>
                    <li class="sopt">
                        <a href="category.php?id=<?php echo $row1['cid'];?>"><?php echo $row1["cname"]?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }
    ?>
</ul>