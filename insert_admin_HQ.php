<?php
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	$username = 'wzhjay';
	$password = 'wzh369258147';
	$position = 'manager';
	$store_id = 1;
	$first_name = 'Zihao';
	$last_name = 'Wang';
	$email = 'wzhjay@gmail.com';
	$query = "INSERT INTO admin (username, password, position, store_id, first_name, last_name, email) VALUES ('".$username."', '".md5($password)."', '".$position."', '".$store_id."', '".$first_name."', '".$last_name."', '".$email."')";
	if(mysql_query($query))
		echo "insert successfully\n";
	else 
		echo "insert fail\n";
	
	mysql_close($con);
?>