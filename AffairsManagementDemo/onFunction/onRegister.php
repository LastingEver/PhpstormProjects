<?php  
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "ע��"){  
        $username = $_POST["username"];  
        $password = $_POST["password"];  
        $password_confirm = $_POST["confirm"];  
        if($username == "" || $password == "" || $password_confirm == ""){  
            echo "<script>alert('��ȷ����Ϣ�����ԣ�'); history.go(-1);</script>";  
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
                    echo "<script>alert('�û����Ѵ���'); history.go(-1);</script>";  
                }  
                else{  
                    $sql_insert = "INSERT INTO user_login (username,password) values('$_POST[username]','$_POST[password]')";  
                    $res_insert = mysql_query($sql_insert);
                    if($res_insert){  
                        echo "<script>alert('ע��ɹ���'); history.go(-1);</script>";
                    } 
                    else{  
                        echo "<script>alert('ϵͳ��æ�����Ժ�'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else{
                echo "<script>alert('���벻һ�£�'); history.go(-1);</script>";  
            }  
        }  
    }  
    else{  
        echo "<script>alert('�ύδ�ɹ���'); history.go(-1);</script>";  
    }
?>