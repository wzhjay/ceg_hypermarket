
<?php
	
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$fileName = 'Inventory_1000.txt';
	
	$cat_array = array();
	$result = mysql_query("SELECT * FROM category");
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$cat_array[$row['c_id']] = $row['c_name'];
	}
	
	$hq_item_array = array();
	$result = mysql_query("SELECT * FROM hq_item");
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$hq_item_array[$row['i_id']] = $row['name'].$row['manufacturer'];
	}
	
	//var_dump($item_array);
	if(file_exists($fileName)) {
        $file = fopen($fileName,'r');
        while(!feof($file)) { 
            $line = fgets($file);
			$item_array = explode(':', $line);
				$name = $item_array[0];
				$category = $item_array[1];
				if($category != NULL) {
					$c_id = implode(array_keys($cat_array, $category));
				}
				$manufacturer = $item_array[2];
				$barcode = $item_array[3];
				if($name != NULL) {
					$i_id = implode(array_keys($hq_item_array, $name.$manufacturer));
				}
				$cost_price = $item_array[4];
				$current_stock = $item_array[5];
				$min_stock = $item_array[6];
				$max_stock = $item_array[5] * 2;
				$production_date = "";
				$expired_date = "";
				$discount = rand(70, 100)/100;
				$discounted_price = $cost_price * $discount;
				//var_dump($category_id);
				//var_dump($category)
			if ($name != NULL) {
				$query = "INSERT INTO local_store_1_item (hq_i_id, barcode, manufacturer, name, production_date, expired_date, price, c_id, discount, discounted_price) VALUES ('".$i_id."', '".$barcode."', '".$manufacturer."', '".$name."', '".$production_date."', '".$expired_date."', '".$cost_price."', '".$c_id."', '".$discount."', '".$discounted_price."')";
				//var_dump($query);
				if(mysql_query($query))
					echo "insert successfully\n";
				else 
					echo "insert fail\n";
			}
        }
        fclose($file);
    }
	
	mysql_close($con);
?>