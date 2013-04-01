<?php
	
	$jsonurl = "http://ceg.ceghypermarket.info/index.php/api/getCategories";
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);

	var_dump($json_output);
	$con = mysql_connect("localhost","root","root");
	mysql_select_db("cg3002_1_local", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql2 = "truncate table category";
	mysql_query($sql2) or die(mysql_error());

	foreach($json_output as $row) { 
		$c_id = $row->c_id;
		$c_name = $row->c_name;
		$c_main_id = $row->c_main_id;
		
		if (!empty($c_id))
		{
			$query = "INSERT INTO category (c_id, c_name, c_main_id) VALUES('".$c_id."', '".$c_name."','".$c_main_id."')";
			//var_dump($query);
			if(mysql_query($query))
				echo "insert successfully\n";
			else 
				echo "insert fail\n";
		}
		
    }
	mysql_close($con);
?>