<?php
	$con = mysql_connect("localhost", "root") or die("���ݿ����������ʧ��");  
	mysql_select_db("user") or die("���ݿⲻ���ڻ򲻿���"); 
	$username = $_POST['username'];  
	$password = $_POST['password']; 
	$query = mysql_query("select * from user_login where username = '$username' and password = '$password'") or die("SQL���ִ��ʧ��");  
	if($row = mysql_fetch_array($query)){  
		if($row['userflag'] == 1 or $row['userflag'] == 0){  
			$_SESSION['username'] = $row['username'];  
			$_SESSION['userflag'] = $row['userflag']; 
			$_SESSION['id'] = $row['id']; 
			echo '����'.$_SESSION['username'];
			echo '<br/>';
			echo "<a href='onWelcome.php'>����˴����뻶ӭ����</a>";  
		}  
		else                                    
			echo "�û�Ȩ����Ϣ����ȷ";
	}  
	else
		echo "�û������������";
	mysql_close($con);
?>  
