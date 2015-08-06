<?php
	if(!isset($_SESSION['userflag']))
		die("您没有权限访问本页面");
	$con = mysql_connect('localhost','root');
    mysql_select_db('user');
	mysql_set_charset('GBK');
    $sql = "INSERT INTO user_message (message) VALUES ('$_POST[message]')";
	if (!mysql_query($sql))
		die('Error');
	echo "消息发送成功";
	require_once('onSmtp.php'); 
	$smtpserver = "smtp.163.com";
	$smtpserverport =25;
	$smtpusermail = "windboydestiny0@163.com";
	$smtpemailto = "$_SESSION[email]";
	$smtpuser = "windboydestiny0@163.com";
	$smtppassword = "windboy"; 
	$mailsubject = "您有一条消息提醒";
	$mailbody = "<h1>$_POST[message]</h1>";
	$mailtype = "HTML";
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppassword);
	$smtp->debug = true;
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
?>