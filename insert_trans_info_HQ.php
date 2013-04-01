
<?php
	
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$fileName = 'Trans_100_8_9_20970.txt';
	
	$t_id_array = array();
	if(file_exists($fileName)) {
        $file = fopen($fileName,'r');
        while(!feof($file)) { 
            $line = fgets($file);
			$trans_array = explode(':', $line);
			$local_t_id = (int)$trans_array[0];
			if (!in_array($local_t_id, $t_id_array))
			{
				array_push($t_id_array, $local_t_id);
				$a_id = (int)$trans_array[1];
				$p_name = $trans_array[2];
				$barcode = (int)$trans_array[3];
				$quantity = (int)$trans_array[4];
				$t_date = split('/', $trans_array[5]);
				$t_new_date = trim($t_date[2]).'-'.$t_date[1].'-'.$t_date[0];
				//var_dump($t_new_date);
				$s_id = 2;
				if ($local_t_id != NULL) {
					$query = "INSERT INTO trans_info (local_t_id, t_date, a_id, s_id) VALUES ('".$local_t_id."', '".$t_new_date."','".$a_id."', '".$s_id."')";
					//var_dump($query);
					if(mysql_query($query))
						echo "insert successfully\n";
					else 
						echo "insert fail\n";
				}
			}
        }
        fclose($file);
    }
	
	mysql_close($con);
?>