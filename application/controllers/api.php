<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->template->title('Welcome to CEGHypermarket')
				->set('currentSection', 'api')
				->set_layout('default');
	}
	
	function getMembers() {
		$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
		mysql_select_db("CEGHypermarket_HQ", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		$sql = "SELECT * FROM member";
		//$result_select = mysql_query($sql) or die(mysql_error());
		//$rows = array();
		// while($row = mysql_fetch_array($result_select))
			// $rows[] = $row;
		
		$query = $this->db->query($sql);
		
		$json = json_encode($query->result_array());
		
		print_r ($json);
		return $json;
		mysql_close($con);
	}
	
	function getItems($store_id) {
		$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
		mysql_select_db("CEGHypermarket_HQ", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		$sql = "SELECT * FROM local_store_".$store_id."_item l, stock s, category c, category_main cm WHERE l.barcode = s.barcode AND s.s_id = '".$store_id."' AND l.c_id = c.c_id AND c.c_main_id = cm.c_main_id";
		// $result_select = mysql_query($sql) or die(mysql_error());
		// $rows = array();
		// while($row = mysql_fetch_array($result_select))
			// $rows[] = $row;
		
		// $json = json_encode($rows);
		$query = $this->db->query($sql);
		
		$json = json_encode($query->result_array());
		print_r ($json);
		return $json;
		mysql_close($con);
	}
	
	function getCategories() {
		$con = mysql_connect("cg3002-10-z.comp.nus.edu.sg","root","root");
		mysql_select_db("CEGHypermarket_HQ", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		$sql = "SELECT * FROM category";
		// $result_select = mysql_query($sql) or die(mysql_error());
		// $rows = array();
		// while($row = mysql_fetch_array($result_select))
			// $rows[] = $row;
		
		// $json = json_encode($rows);
		$query = $this->db->query($sql);
		
		$json = json_encode($query->result_array());
		print_r ($json);
		return $json;
		mysql_close($con);
	}
	
	function getOrders($store_id) {

		$sql = "SELECT * FROM `order` WHERE status = 'ordered' AND store_id = '".$store_id."'";

		$query = $this->db->query($sql);
		
		$json = json_encode($query->result_array());
		print_r ($json);
		return $json;
		mysql_close($con);
	}

}