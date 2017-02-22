<?php

    class abc
    {
        function abc()
        {
            $this->str = "";
            $this->flag="1";
            $this->flag2="2";
        }

       /*
        @param
            $pid    父类别id
            $flag   标识，区分级别
            $table  表名
            $db     数据库名
       */
        function tree($pid, $flag, $table, $db,$current=null)
        {
            $currentPid=null;
            if($current){
                $result=$db->query("select * from category where cid=".$current);
                $row=$result->fetch_assoc();
                $currentPid=$row["pid"];
            }

            if($pid==0){
                $this->str.="<option value='0'>一级标题</option>";
            }

            $sql = "select * from $table where pid=" . $pid;
            $result = $db->query($sql);
            $strflag=str_repeat("- ",$flag);
            $flag=$flag+1;
            while ($row = $result->fetch_assoc()) {
                $cid = $row["cid"];
                if($cid==$currentPid){
                    $this->str .= "<option value='$cid' selected='selected' >{$strflag}{$row["cname"]}</option>";
                }else{
                    $this->str .= "<option value='$cid' >{$strflag}{$row["cname"]}</option>";
                }
                $this->tree($cid, $flag, $table, $db,$current);
            }
        }

        /*
        @param
            $pid    父级别的id
            $flag   标识，区分级别
            $table  表名
            $db     数据库名
       */
        function table($pid, $flag, $table, $db)
        {
            $sql = "select * from $table where pid=".$pid;
            $result = $db->query($sql);
            $strflag=str_repeat("- ",$flag);
            $flag=$flag+1;

            while ($row = $result->fetch_assoc()) {
                $cid = $row["cid"];
                $pid=$row["pid"];
                $cname=$row["cname"];
                $this->str .= "<tr>
                    <td>$cid</td>
                    <td>{$strflag}{$cname}</td>
                    <td>$pid</td>
                    <td>
                        <a href='delCategory.php?id=$cid'>删除</a>
                        <a href='editCategory.php?id=$cid'>编辑</a>
                    </td>
                </tr>";
                $sql1="select * from $table where pid=".$cid;
                $result1=$db->query($sql1);
                if($result1->fetch_assoc()){
                    $this->table($cid,$flag,$table,$db);
                }
            }
        }

        /*
        @param
            $table  表名
            $db     数据库名
       */
        function stitle($table, $db)
        {
            $sql = "select * from $table";
            $result = $db->query($sql);

            while ($row = $result->fetch_assoc()) {
                $sid = $row["sid"];
                $stitle=$row["stitle"];
                $stime=$row["stime"];

                $csql="select cname from category where cid=".$row["cid"];
                $result1=$db->query($csql);
                $row1=$result1->fetch_assoc();

                $cname=$row1["cname"];
                $this->str .= "<tr>
                    <td>$sid</td>
                    <td>$cname</td>
                    <td>$stitle</td>
                    <td>$stime</td>
                    <td>
                        <a href='delcon.php?id=$sid'>删除</a>
                        <a href='editcon.php?id=$sid'>编辑</a>
                    </td>
                </tr>";

            }
        }
    }
?>






