<?php  
	if(isset($_SESSION['username']))  {  
		mysql_connect("localhost", "root") or die("���ݿ����������ʧ��");  
		mysql_select_db("user") or die("���ݿⲻ���ڻ򲻿���");  
		$username = $_SESSION['username'];  
		$query = mysql_query("select userflag from user_login where username = '$username'") or die("SQL���ִ��ʧ��");  
		$row = mysql_fetch_array($query);  
		if($row['userflag'] != $_SESSION['userflag'])  
			$_SESSION['userflag'] = $row['userflag'];  
		if($_SESSION['userflag'] == 1)  
			echo "��ӭ����Ա".$_SESSION['username']."��¼ϵͳ";  
		if($_SESSION['userflag'] == 0)  
			echo "��ӭ�û�".$_SESSION['username']."��¼ϵͳ";
		echo '<br/>';
		echo "<a href='onLookUserInformation.php'>�鿴������Ϣ</a>";
		echo '<br/>';
		echo "<a href='onLogout.php'>ע��</a>"; 
	}  
	else   
		echo "��û��Ȩ�޷��ʱ�ҳ��";  
?> 