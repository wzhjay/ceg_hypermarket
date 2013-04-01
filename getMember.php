<?php
	
	$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
	mysql_select_db("CEGHypermarket_HQ", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$sql = "SELECT * FROM member";
	$result_select = mysql_query($sql) or die(mysql_error());
	$rows = array();
	while($row = mysql_fetch_array($result_select))
		$rows[] = $row;
	
	$json = json_encode($rows);
	
	print_r ($json);
	return $json;
	mysql_close($con);

?>