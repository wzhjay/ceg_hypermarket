<?php
	
	$jsonurl = "http://ceg.ceghypermarket.info/index.php/api/getMembers";
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);

	var_dump($json_output);
	$con = mysql_connect("localhost","root","root");
	mysql_select_db("cg3002_1_local", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql2 = "truncate table member";
	mysql_query($sql2) or die(mysql_error());
	
	$sql3 = "truncate table new_member";
	mysql_query($sql3) or die(mysql_error());
	
	foreach($json_output as $row) { 
		$m_id = $row->m_id;
		$first_name = $row->first_name;
		$last_name = $row->last_name;
		$gender = $row->gender;
		$username = $row->username;
		$password = $row->password;
		$address = $row->address;
		$email = $row->email;
		$email_receive = $row->email_receive;
		$member_card_number = $row->member_card_number;
		$created_date = $row->created_date;
		$expiry_date = $row->expiry_date;
		$aggregate_point = $row->aggregate_point;
		$current_point = $row->current_point;
		$level = $row->level;
		
		if (!empty($member_card_number))
		{
			$query = "INSERT INTO member (m_id, first_name, last_name, gender, username, password, address, email, email_receive, member_card_number, created_date, expiry_date, aggregate_point, current_point, level) VALUES('".$m_id."', '".$first_name."','".$last_name."', '".$gender."', '".$username."', '".$password."','".$address."', '".$email."', '".$email_receive."', '".$member_card_number."','".$created_date."', '".$expiry_date."', '".$aggregate_point."', '".$current_point."','".$level."')";
			//var_dump($query);
			if(mysql_query($query))
				echo "insert successfully\n";
			else 
				echo "insert fail\n";
		}
		
    }
	mysql_close($con);?>