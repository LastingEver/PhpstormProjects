<?php
	if(!isset($_SESSION['userflag']))
		die("��û��Ȩ�޷��ʱ�ҳ��");
	$con = mysql_connect('localhost','root');
    mysql_select_db('user');
	mysql_set_charset('GBK');
    $sql = "INSERT INTO user_message (message) VALUES ('$_POST[message]')";
	if (!mysql_query($sql))
		die('Error');
	echo "��Ϣ���ͳɹ�";
	require_once('onSmtp.php'); 
	$smtpserver = "smtp.163.com";
	$smtpserverport =25;
	$smtpusermail = "windboydestiny0@163.com";
	$smtpemailto = "$_SESSION[email]";
	$smtpuser = "windboydestiny0@163.com";
	$smtppassword = "windboy"; 
	$mailsubject = "����һ����Ϣ����";
	$mailbody = "<h1>$_POST[message]</h1>";
	$mailtype = "HTML";
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppassword);
	$smtp->debug = true;
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
?>