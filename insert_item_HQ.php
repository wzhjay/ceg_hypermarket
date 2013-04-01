
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
	//var_dump($cat_array);
	if(file_exists($fileName)) {
        $file = fopen($fileName,'r');
        while(!feof($file)) { 
            $line = fgets($file);
			$item_array = explode(':', $line);
				$name = $item_array[0];
				$category = $item_array[1];
				if($category != NULL) {
					$category_id = implode(array_keys($cat_array, $category));
				}
				$manufacturer = $item_array[2];
				$barcode = $item_array[3];
				$cost_price = $item_array[4];
				$current_stock = $item_array[5];
				$min_stock = $item_array[6];
				$max_stock = $item_array[6] * 5;
				$production_date = "";
				$expried_date = "";
				//var_dump($category_id);
				//var_dump($category)
			if ($name != NULL) {
				$query = "INSERT INTO hq_item (manufacturer, base_price, name, catagory_id) VALUES ('".$manufacturer."', '".$cost_price."', '".$name."', '".$category_id."' )";
				var_dump($query);
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