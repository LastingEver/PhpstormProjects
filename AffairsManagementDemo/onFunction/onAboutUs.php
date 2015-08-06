<?php
	mysql_connect("localhost","root");
	mysql_select_db("user");
	if(isset($_POST["submit"]) && $_POST["submit"] == "Ìב½»"){
		$sql = "INSERT INTO user_fallback (fallback) VALUES ('$_POST[information]')";
		mysql_query($sql);
		if (!mysql_query($sql))
			die('Error');
	}
?>