<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class User extends CI_Controller {		function __construct() {		parent::__construct();		$this->template->title('Welcome to CEGHypermarket')				->set('currentSection', 'user')				->set_layout('default');	}			function index()	{		//$this->template->build('store_index');	}		function newMember() {		$this->form_validation->set_rules('username', 'User Name', 'required|xss_clean');		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|xss_clean');		$this->form_validation->set_rules('password_confirm', 'Re-enter Password', 'required|matches[password]');		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');				if ($this->form_validation->run() == true) {			$username = $this->input->post('username');			$password = $this->input->post('password');			$statement = $this->input->post('email');			$firstname = $this->input->post('firstname');			$lastname = $this->input->post('lastname');			$address = $this->input->post('address');			$address = $this->input->post('gender');		}	}}