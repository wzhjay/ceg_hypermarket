<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->template->title('Welcome to CEGHypermarket')
				->set('currentSection', 'welcome')
				->set_layout('default');
	}
	
	
	public function index()
	{
		$session_data = array(
		    'store_id'   => 1
		);
		
		$this->session->set_userdata($session_data);
		$this->template->build('welcome_message');
	}
	
}
