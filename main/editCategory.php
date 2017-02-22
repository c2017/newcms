<?php
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
<form action="editCategoryInfo.php">
    修改分类：<br/>
    上级分类：<select name="category">
        <?php
            $edit=new abc();
            $id=$_GET["id"];
            $edit->tree(0,1,"category",$db,$id);
            echo $edit->str;
        ?>
    </select>
    <br/>
    修改分类：<input type="text" value="<?php $result=$db->query("select cname from category where cid=".$id);
    $row=$result->fetch_assoc();
    echo $row["cname"];
    ?>" name="editcat"  />
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <br/>
    <input type="submit" value="修改">
</form>
</body>
</html>