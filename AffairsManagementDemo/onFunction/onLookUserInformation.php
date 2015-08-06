<?php
    $con = mysql_connect('localhost','root');
    mysql_select_db('user');
	mysql_set_charset('GBK');
    $sql = "SELECT id,name,number,email,information FROM user_info WHERE id = $_SESSION[id]";
    $res = mysql_query($sql);
	echo "这是您的个人信息";
	echo "<br/>";
    while(list($id,$name,$number,$email,$information) = mysql_fetch_row($res)){
        echo $name,'<br/>',$number,'<br/>',$email,'<br/>',$information;
		echo '<br/>';
		$_SESSION['email'] = $email;
    }
	echo "<a href='/project'>返回主页</a>"; 
	mysql_close($con);
?>