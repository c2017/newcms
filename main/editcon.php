<?php
include "../public/session.php";
include "../public/db.php";
include "../public/function.php";

$tree=new abc();
$id=$_GET["id"];
$tree->tree(0,1,"category",$db);

$result=$db->query("select * from shows where sid=".$id);
$row=$result->fetch_assoc();

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
<?php echo "<script> var cid=".$row["cid"]."</script>";?>
<script src="../js/jquery-min.js"></script>
<script>
    $(function(){
        $("select").find("option").each(function(){
            if($(this).attr("value")==cid){
                $(this).attr("selected","selected");
            }
        })
//        alert($("textarea").val());
    })
</script>

<body>
<form action="editconInfo.php">
    文章分类：<select name="category">
        <?php
        echo $tree->str;
        ?>
    </select>
    <br/>
    文章标题：<input type="text" name="stitle" value="<?php echo $row['stitle']?>"><br/>
    文章内容：<br/>
    <textarea name="scon" cols="30" rows="10" ><?php echo $row['scon']?></textarea><br/>
    <input type="hidden" value="<?php echo $id;?>" name="sid">
    <input type="submit" value="添加文章">
</form>
</body>
</html>