<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->template->title('Welcome to CEGHypermarket')
				->set('currentSection', 'dispaly')
				->set_layout('default');
	}
	
	
	function index()
	{
		$data['items'] = $this->display_model->getAllItem();
		$this->template->build('display_index', $data);
		
	}
	
	function category($c_main_id) {
		$data['items'] = $this->display_model->getAllItemByCMainId($c_main_id);
		$this->template->build('display_index', $data);
	}
	
	function manufacturer($manufacturer) {
		$manu = str_replace("%20", " ", $manufacturer);
		$data['items'] = $this->display_model->getAllItemByManu($manu);
		$this->template->build('display_index', $data);
	}
	
	function search() {
		$this->form_validation->set_rules('keyword', 'Key Word', 'required|xss_clean');
		
		$data = array();
		if ($this->form_validation->run() == true) {
			$data['keyword'] = $keyword = $this->input->post('keyword');
			$data['search_price_from'] = $search_price_from = $this->input->post('searchpricefrom');
			$data['search_price_to'] = $search_price_to = $this->input->post('searchpriceto');
			$data['search_sort'] = $search_sort = $this->input->post('searchsort');
			$data['search_cate'] = $search_cate = $this->input->post('search_cate');
			
			
			$data['items'] = $this->display_model->getItemSearched($keyword, $search_price_from, $search_price_to, $search_cate, $search_sort);
			
			$this->template->build('display_index', $data);		
		}
		else 
			redirect('display');
	}
}