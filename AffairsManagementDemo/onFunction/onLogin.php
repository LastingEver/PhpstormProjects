<?php
	$con = mysql_connect("localhost", "root") or die("数据库服务器连接失败");  
	mysql_select_db("user") or die("数据库不存在或不可用"); 
	$username = $_POST['username'];  
	$password = $_POST['password']; 
	$query = mysql_query("select * from user_login where username = '$username' and password = '$password'") or die("SQL语句执行失败");  
	if($row = mysql_fetch_array($query)){  
		if($row['userflag'] == 1 or $row['userflag'] == 0){  
			$_SESSION['username'] = $row['username'];  
			$_SESSION['userflag'] = $row['userflag']; 
			$_SESSION['id'] = $row['id']; 
			echo '您好'.$_SESSION['username'];
			echo '<br/>';
			echo "<a href='onWelcome.php'>点击此处进入欢迎界面</a>";  
		}  
		else                                    
			echo "用户权限信息不正确";
	}  
	else
		echo "用户名或密码错误";
	mysql_close($con);
?>  
