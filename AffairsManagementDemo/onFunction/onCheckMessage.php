<?php
	if(!isset($_SESSION['username']))
		die("���ȵ�¼");
    $con = mysql_connect('localhost','root');
    mysql_select_db('user');
	mysql_set_charset('GBK');
    $sql = "SELECT id,message FROM user_message";
    $res = mysql_query($sql);
	echo "����������Ϣ֪ͨ";
	echo "<br/>";
    while(list($id,$message) = mysql_fetch_row($res)){
        echo $id,'<br/>',$message,'<br/>';
    }
	echo "<a href='/project'>������ҳ</a>";
	mysql_close($con);
?>