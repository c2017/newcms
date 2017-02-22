<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        *{
            margin:0;
        }
        .box{
            height:190px;
            width:280px;
            padding-top:10px;
            border:1px solid #000;
            margin:auto;
            position:fixed;
            left:0;top:0;right:0;bottom:100px;
//            line-height:28px;
            text-align:center;
        }
        h3{
            text-align:center;
            height:40px;
            line-height:30px;
        }
        .box span{
            line-height:18px;
            font-size:12px;
        }
        p{
            line-height:28px;
        }
    </style>
</head>
<script src="../js/jquery-min.js"></script>
<script>
    $(window).ready(function(){

        var btn=$("input[type=submit]");

        $("input[name=username]").on("keyup",function(){
            var reg=/^\w{5,10}$/g;
            var val=$(this).val();
            var mes=$("span:eq(0)");
            var that=$(this);
            if(reg.test(val)){
                $.ajax({
                    url:"selectUser.php",
                    data:{username:val},
                    success:function(e){
                        if(e=="ok"){
                            mes.html("用户名正确").css({color:"green"});
                            that.attr("use","yes");
                            if($("input[name=password]").attr("use","yes")){
                                btn.removeAttr("disabled");
                            }
                        }else{
                            console.log(e);
                            mes.html("用户名重复").css({color:"red"});
                            btn.attr("disabled","disabled");
                        }
                    }
                });
            }else{
                btn.attr("disabled","disabled");
                mes.html("输入有误").css({color:"red"});
            }
        });

        $("input[name=password]").on("keyup",function(){
            var reg=/^\w{5,10}$/g;
            var val=$(this).val();
            var mes=$("span:eq(1)");
            var that=$(this);
            if(reg.test(val)){
                mes.html("密码输入正确").css({color:"green"});
                $(this).attr("use","yes");
                if($("input[name=username]").attr("use","yes")){
                    btn.removeAttr("disabled");
                }
            }else{
                btn.attr("disabled","disabled");
                mes.html("输入有误").css({color:"red"});
            }
        });

    })
</script>
<body>
<form action="addReg.php" method="post">
    <div class="box">
        <h3>注册页</h3>
        用户名：<input type="text" value="" name="username" use="no" /><br/><span class="message"></span><br/>
        密　码：<input type="text" value="" name="password" use="no" /><br/><span class="message"></span><br/>
        <input type="submit" value="注册" disabled="disabled" /><br/>
        <p>已有用户名，请<a href="login.php">点击登录</a></p>
    </div>
</form>
</body>
</html>