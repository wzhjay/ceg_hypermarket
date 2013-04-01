<?php
	
	$store_id = 1;
	$jsonurl = "http://ceg.ceghypermarket.info/index.php/api/getItems/".$store_id;
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);

	var_dump($json_output);
	$con = mysql_connect("localhost","root","root");
	mysql_select_db("cg3002_1_local", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql2 = "truncate table shop_item";
	mysql_query($sql2) or die(mysql_error());
	
	$sql3 = "truncate table new_shop_item";
	mysql_query($sql3) or die(mysql_error());
	
	foreach($json_output as $row) { 
		$barcode = $row->barcode;
		$manufacturer = $row->manufacturer;
		$name = $row->name;
		$production_date = $row->production_date;
		$expired_date = $row->expired_date;
		$price = $row->price;
		$c_id = $row->c_id;
		$discount = $row->discount;
		$discounted_price = $row->discounted_price;
		$current_stock = $row->current_stock;
		$min_stock = $row->min_stock;
		$max_stock = $row->max_stock;
		
		if (!empty($barcode))
		{
			$query = "INSERT INTO shop_item (barcode, manufacturer, name, production_date, expired_date, price, catagory_id, discount, discounted_price, current_stock, min_stock, max_stock)VALUES('".$barcode."', '".$manufacturer."','".$name."', '".$production_date."', '".$expired_date."', '".$price."','".$c_id."', '".$discount."', '".$discounted_price."', '".$current_stock."','".$min_stock."', '".$max_stock."')";
			//var_dump($query);
			if(mysql_query($query))
				echo "insert successfully\n";
			else 
				echo "insert fail\n";
		}
		
    }
	mysql_close($con);
?>