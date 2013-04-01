
<?php
	
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$storeNum = 5;
	for ($i=0; $i < $storeNum; $i++) {
		$fileName = $i.'_newmember.txt';
		

		if(file_exists($fileName)) {
			$file = fopen($fileName,'r');
			while(!feof($file)) { 
				$line = fgets($file);
				$member_array = explode(':', $line);
					$first_name = $member_array[0];
					$last_name = $member_array[1];
					$username = $member_array[2];
					$address = $member_array[3];
					$email = $member_array[4];
					$gender = $member_array[5];
					$email_receive = $member_array[6];
					$card_number = substr(number_format(time() * rand(),0,'',''),0,10); // 10 digit random number
					$today = getdate();
					$created_year = $today['year'];
					$created_month = $today['mon'];
					$created_day = $today['mday'];
					$expiry_year = $created_year + 1; // one year membership
					$created_date = $created_year.'-'.$created_month.'-'.$created_day;
					$expiry_date = $expiry_year.'-'.$created_month.'-'.$created_day;
					
				if ($local_t_id != NULL) {
					$query = "INSERT INTO transaction (first_name, last_name, username, address, email, gender, email_receive, member_card_number, created_date, expiry_date) VALUES ('".$local_t_id."', '".$barcode."', '".$quantity."', '".$p_name."')";
					var_dump($query);
					if(mysql_query($query))
						echo "insert successfully\n";
					else 
						echo "insert fail\n";
				}
			}
			fclose($file);
		}
	
	}
	mysql_close($con);
?>