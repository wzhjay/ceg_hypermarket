
<?php
	
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$sql = "SELECT * FROM transaction t, trans_info i WHERE t.local_t_id = i.local_t_id AND i.s_id = 1";
	$result_select = mysql_query($sql) or die(mysql_error());
	$rows = array();
	while($row = mysql_fetch_array($result_select))
		$rows[] = $row;
	mysql_close($con);
			$con = mysql_connect("localhost","root","root");	mysql_select_db("cg3002_1_local", $con);
	if (!$con)	{		die('Could not connect: ' . mysql_error());	}	
	$sql2 = "truncate table transaction";
	$mysql_query($sql2) or die(mysql_error());
	
	$sql3 = "truncate table trans_info";
	$result_select = mysql_query($sql3) or die(mysql_error());
		$t_id_array = array();
    foreach($rows as $row) { 
		$t_id = $row['t_id'];
		$local_t_id = $row['local_t_id'];		$a_id = $row['a_id'];		$p_name = $row['p_name'];		$barcode = $row['barcode'];		$quantity = $row['quantity'];		$t_date = explode('/', $row['t_date'];);		$t_new_date = trim($t_date[2]).'-'.$t_date[1].'-'.$t_date[0];
		if (!in_array($local_t_id, $t_id_array))
		{
			array_push($t_id_array, $local_t_id);
			//var_dump($t_new_date);
			$s_id = 1;
			if (!empty($local_t_id)) {
				$query = "INSERT INTO trans_info (local_t_id, t_date, a_id, s_id) VALUES ('".$local_t_id."', '".$t_new_date."','".$a_id."', '".$s_id."')";
				//var_dump($query);
				if(mysql_query($query))
					echo "insert successfully\n";
				else 
					echo "insert fail\n";
			}
		}
		
		if (!empty($local_t_id)) {
			$query2 = "INSERT INTO transaction (local_t_id, barcode, quantity, p_name) VALUES ('".$local_t_id."', '".$barcode."', '".$quantity."', '".$p_name."')";
			//var_dump($query);
			if(mysql_query($query2))
				echo "insert transaction successfully\n";
			else 
				echo "insert transaction fail\n";
		}
    }
	mysql_close($con);
?>