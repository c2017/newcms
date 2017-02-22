<?php
include "../public/session.php";
include "../public/db.php";
include "../public/function.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<form action="addCategoryInfo.php">
    添加分类：<br/>
    已有分类：<select name="category">
        <?php $tree=new abc();
            $tree->tree(0,1,"category",$db);
            echo $tree->str;
        ?>
    </select><br/>
    添加分类：<input type="text" value="" name="addcat"/><br/>
    <input type="submit" value="添加">
</form>
</body>
</html>