<?php
    include "../public/session.php";
    include "../public/db.php";
    include "../public/function.php";

    $tree=new abc();
    $tree->tree(0,1,"category",$db);

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
<form action="addconInfo.php">
    文章分类：<select name="category" id="">
        <?php
        echo $tree->str;
        ?>
    </select>
    <br/>
    文章标题：<input type="text" name="stitle"><br/>
    文章内容：<br/>
    <textarea name="scon" cols="30" rows="10"></textarea><br/>
    <input type="submit" value="添加文章">
</form>
</body>
</html>