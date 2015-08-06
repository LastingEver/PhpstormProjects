<?php  
	if(isset($_SESSION['username']))  {  
		mysql_connect("localhost", "root") or die("数据库服务器连接失败");  
		mysql_select_db("user") or die("数据库不存在或不可用");  
		$username = $_SESSION['username'];  
		$query = mysql_query("select userflag from user_login where username = '$username'") or die("SQL语句执行失败");  
		$row = mysql_fetch_array($query);  
		if($row['userflag'] != $_SESSION['userflag'])  
			$_SESSION['userflag'] = $row['userflag'];  
		if($_SESSION['userflag'] == 1)  
			echo "欢迎管理员".$_SESSION['username']."登录系统";  
		if($_SESSION['userflag'] == 0)  
			echo "欢迎用户".$_SESSION['username']."登录系统";
		echo '<br/>';
		echo "<a href='onLookUserInformation.php'>查看个人信息</a>";
		echo '<br/>';
		echo "<a href='onLogout.php'>注销</a>"; 
	}  
	else   
		echo "您没有权限访问本页面";  
?> 