<?php
	
	$jsonurl = "http://ceg.ceghypermarket.info/index.php/api/getOrders/1";
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);

	var_dump($json_output);
	$con = mysql_connect("localhost","root","root");
	mysql_select_db("cg3002_1_local", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql2 = "truncate table `order`";
	mysql_query($sql2) or die(mysql_error());

	foreach($json_output as $row) { 
		$o_id = $row->o_id;
		$m_id = $row->m_id;
		$barcode = $row->barcode;
		$quantity = $row->quantity;
		$store_id = $row->store_id;
		$status = $row->status;
		$datetime = $row->order_datetime;
		if (!empty($o_id))
		{
			$query = "INSERT INTO `order` (o_id, m_id, barcode, quantity, store_id, status, order_datetime) VALUES('".$o_id."', '".$m_id."','".$barcode."', '".$quantity."', '".$store_id."','".$status."','".$datetime."')";
			//var_dump($query);
			if(mysql_query($query))
				echo "insert successfully\n";
			else 
				echo "insert fail\n";
		}
		
    }
	mysql_close($con);
?>