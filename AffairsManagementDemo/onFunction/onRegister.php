<?php  
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册"){  
        $username = $_POST["username"];  
        $password = $_POST["password"];  
        $password_confirm = $_POST["confirm"];  
        if($username == "" || $password == "" || $password_confirm == ""){  
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        }  
        else{  
            if($password == $password_confirm)  
            {  
                mysql_connect("localhost","root");
                mysql_select_db("user");
                $sql = "SELECT username FROM user_login WHERE username = '$_POST[username]'";
                $result = mysql_query($sql); 
                $num = mysql_num_rows($result);
                if($num){  
                    echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                }  
                else{  
                    $sql_insert = "INSERT INTO user_login (username,password) values('$_POST[username]','$_POST[password]')";  
                    $res_insert = mysql_query($sql_insert);
                    if($res_insert){  
                        echo "<script>alert('注册成功！'); history.go(-1);</script>";
                    } 
                    else{  
                        echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else{
                echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
            }  
        }  
    }  
    else{  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }
?>