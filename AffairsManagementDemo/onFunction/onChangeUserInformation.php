<?php
	$con = mysql_connect("localhost","root");
	if (!$con)
		die('连接数据库失败');
	mysql_select_db("user");
	mysql_set_charset("GBK");
	$name = $_POST['name'];
	$number = $_POST['number'];  
    $email = $_POST['email'];  
    $information = $_POST['information'];  
	$sql="UPDATE user_info SET name = '$_POST[name]',number = '$_POST[number]',email = '$_POST[email]',information = '$_POST[information]' WHERE id = $_SESSION[id]";
	if (!mysql_query($sql))
		die('Error');
	echo "record added";
	mysql_close($con);
?>