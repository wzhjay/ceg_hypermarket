<?php
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$fileName = 'Inventory_1000.txt';
	if(file_exists($fileName)) {
        $file = fopen($fileName,'r');
		$cat_array = array();
        while(!feof($file)) { 
            $line = fgets($file);

			$item_array = explode(':', $line);
				$category = $item_array[1];
				if(!in_array($category, $cat_array))
				{
					array_push($cat_array, $category);
				var_dump($category);
				if ($category != NULL) {
					$query = "INSERT INTO category (c_name) VALUES ('".$category."')";
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