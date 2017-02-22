<?php
    include "../public/session.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        *{
            margin:0;
        }
        .header{
            height:100px;
            width:100%;
            border-bottom:1px solid #000;
        }
        .header h2{
            text-align:center;
            line-height:60px;
        }

        .header h5{
            float:right;
            position:absolute;
            left:50%;
            top:60px;
            margin-left:130px;
        }
        .opi{
            cursor:pointer;
        }
        .left,.right{
            height:600px;
            float:left;
        }
        .left{
            width:15%;
            border-right:1px solid #000;
        }
        .left>ul{
            padding-top:20px;
        }
        .right{
            width:84%;
        }
        iframe{
            height:100%;
            width:100%;
        }
    </style>
</head>
<script src="../js/jquery-min.js"></script>
<script>
    $(window).ready(function(){
        $(".opi").click(function(){
            $(this).parent().find(".son").toggle(100);
        })
    })

</script>
<body>
    <div class="header">
        <h2><?php echo $_SESSION["username"]; ?>，欢迎来到内容管理系统！</h2>
        <h5><a href="unlogin.php">退出登录</a></h5>
    </div>
    <div class="left">
        <ul>
            <li>
                <span class="opi">用户管理</span>
                <ul class="son">
                    <li><a href="addUser.php" target="right">添加用户</a></li>
                    <li><a href="showUser.php" target="right">管理用户</a></li>
                </ul>
            </li>
            <li>
                <span class="opi">分类管理</span>
                <ul class="son">
                    <li><a href="addCategory.php" target="right">添加分类</a></li>
                    <li><a href="showCategory.php" target="right">管理分类</a></li>
                </ul>
            </li>
            <li>
                <span class="opi">内容管理</span>
                <ul class="son">
                    <li><a href="addcon.php" target="right">添加内容</a></li>
                    <li><a href="showcon.php" target="right">管理内容</a></li>
                </ul>
            </li>
        </ul>

    </div>
    <div class="right">
        <iframe src="" frameborder="0" name="right">

        </iframe>
    </div>
</body>
</html>