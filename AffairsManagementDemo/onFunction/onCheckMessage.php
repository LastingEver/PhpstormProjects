<?php
	if(!isset($_SESSION['username']))
		die("请先登录");
    $con = mysql_connect('localhost','root');
    mysql_select_db('user');
	mysql_set_charset('GBK');
    $sql = "SELECT id,message FROM user_message";
    $res = mysql_query($sql);
	echo "这是您的消息通知";
	echo "<br/>";
    while(list($id,$message) = mysql_fetch_row($res)){
        echo $id,'<br/>',$message,'<br/>';
    }
	echo "<a href='/project'>返回主页</a>";
	mysql_close($con);
?>