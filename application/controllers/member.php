<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->template->title('Welcome to CEGHypermarket')
				->set('currentSection', 'member')
				->set_layout('default');
	}
	
	function index()
	{
		$this->template->build('member_login');
	}
	
	function login() {
		$this->form_validation->set_rules('member-username', 'User Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('member-password', 'Password', 'trim|required|min_length[6]|xss_clean|md5');
		$this->form_validation->set_rules('member-comfirm', 'Re-enter Password', 'required|matches[member-password]');
		
		if ($this->form_validation->run() == true) {
			$member_username = $this->input->post('member-username');
			$member_password = $this->input->post('member-password');

			if($this->user_model->member_login($member_username, $member_password)) {
				redirect('member/memberPage');
			}
		}
		else
			redirect('member', 'refresh');
		
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('member/login');
	}
	
	function signUp() {
		$this->template->build('member_signup');
	}
	
	function memberPage() {
		$member = $this->user_model->member();
		$data['member'] = $member;
		$this->template->build('member_welcome', $data);
	}
	
	function memberRegistered() {
		$this->form_validation->set_rules('member_username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('member_password', 'Password', 'required|xss_clean|md5');
		$this->form_validation->set_rules('member_password_confirm', 'Confirm', 'required|matches[member_password]');
		$this->form_validation->set_rules('member_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('member_first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('member_last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('member_address', 'Address', 'required|xss_clean');
		
		
		if ($this->form_validation->run() == true) 
		{
			$data['member_username'] = $member_username = $this->input->post('member_username');
			$data['member_password'] = $member_password = $this->input->post('member_password');
			$data['member_email'] = $member_email = $this->input->post('member_email');
			$data['member_first_name'] = $member_first_name = $this->input->post('member_first_name');
			$data['member_last_name'] = $member_last_name = $this->input->post('member_last_name');
			$data['member_gender'] = $member_gender = $this->input->post('member_gender');
			$data['member_address'] = $member_address = $this->input->post('member_address');
			$data['member_email_receive'] = $member_email_receive = $this->input->post('member_email_receive');
			
			$card_number = substr(number_format(time() * rand(),0,'',''),0,8); // 8 digit random number
			$today = getdate();
			$created_year = $today['year'];
			$created_month = $today['mon'];
			$created_day = $today['mday'];
			$expiry_year = $created_year + 1; // one year membership
			$created_date = $created_year.'-'.$created_month.'-'.$created_day;
			$expiry_date = $expiry_year.'-'.$created_month.'-'.$created_day;
			$email_receive = ($member_email_receive == 'accept') ? 'Yes' : 'No';
			
			$additional_data = array(
				'gender' => $member_gender,
				'first_name' => $member_first_name,
				'last_name' => $member_last_name,
				'address' => $member_address,
				'member_card_number' => $card_number,
				'created_date' => $created_date,
				'expiry_date' => $expiry_date,
				'email_receive' => $email_receive
			);
			
			if ($this->user_model->member_register($member_username, $member_password, $member_email, $additional_data)) {
				if ($this->user_model->member_login($member_username, $member_password)) {
					redirect('member/memberPage');
				}
			}
			else
			{
				redirect('member/signUp');
			}
		}
		else
			$this->template->build('member_signup');
	}
	
	function edit($m_id) {
		$data['member'] = $member = $this->user_model->getMemberByID($m_id);
		
		$data['member_username'] = $member_username = $member['username'];
		$data['member_email'] = $member_email = $member['email'];
		$data['member_email_receive'] = $member_email_receive = ($member['email_receive'] == 'Yes') ? "checked" : '';
		$data['member_first_name'] = $member_first_name = $member['first_name'];
		$data['member_last_name'] = $member_last_name = $member['last_name'];
		$data['member_address'] = $member_address = $member['address'];
		$data['member_gender'] = $member_gender = $member['gender'];

		$this->template->build('update_member', $data);
	}
	
	function editSubmit($m_id) {  // need form validation
	
			$data['member_username'] = $member_username = $this->input->post('update_member_username');
			$data['member_email'] = $member_email = $this->input->post('update_member_email');
			$data['member_first_name'] = $member_first_name = $this->input->post('update_member_first_name');
			$data['member_last_name'] = $member_last_name = $this->input->post('update_member_last_name');
			$data['member_gender'] = $member_gender = $this->input->post('update_member_gender');
			$data['member_address'] = $member_address = $this->input->post('update_member_address');
			$data['member_email_receive'] = $member_email_receive = $this->input->post('update_member_email_receive');
			
			$email_receive = ($member_email_receive == 'accept') ? 'Yes' : 'No';

			$m_data = array(
				'username' => $member_username,
				'email' => $member_email,
				'gender' => $member_gender,
				'first_name' => $member_first_name,
				'last_name' => $member_last_name,
				'address' => $member_address,
				'email_receive' => $email_receive
			);
			
			$this->user_model->memberUpdate($m_id, $m_data);
			
			redirect('member/updateSuccess');

		// }
		// else
			// redirect('member/edit/'.$m_id);
	}
	
	function updateSuccess() {
		$this->template->build('member_update_success');
	}
	
	function delete($m_id) {
		if($this->user_model->deleteMemberByID($m_id)) {
			redirect('admin/deleteMenSuccess');
		}
		else
			redirect('admin/deleteMenFail');
	}
	
	function insertNewMember() {
		$storeNum = 5;
		for ($i=0; $i < $storeNum; $i++) {
			$fileName = $this->config->item('file_save_url').$i.'_newmember.txt';
			if(file_exists($fileName)) {
				$file = fopen($fileName,'r');
				while(!feof($file)) { 
					$line = fgets($file);
					$member_array = array();
					$member_array = explode(':', $line);
					$first_name = $member_array[0];
					$last_name = $member_array[1];
					$username = $member_array[2];
					$address = $member_array[3];
					$email = $member_array[4];
					$gender = $member_array[5];
					$email_receive = $member_array[6];
					
					$member_card_number = substr(number_format(time() * rand(),0,'',''),0,8); // 8 digit random number
					$today = getdate();
					$created_year = $today['year'];
					$created_month = $today['mon'];
					$created_day = $today['mday'];
					$expiry_year = $created_year + 1; // one year membership
					$created_date = $created_year.'-'.$created_month.'-'.$created_day;
					$expiry_date = $expiry_year.'-'.$created_month.'-'.$created_day;
					$password = $this->user_model->get_random_password(8, 12, false, false, false);
					$title = ($gender == 'Male' || $gender == 'male' ) ? 'Mr' : 'Miss';
					if (!empty($email) && !empty($password) && !empty($member_card_number) && !empty($first_name) && !empty($username)) {
						$this->user_model->emailPasswordEmail($email, $password, $member_card_number, $last_name, $username, $title);
						$md5_password = md5($password);
						$query = "INSERT INTO member (first_name, last_name, username, address, email, gender, email_receive, member_card_number, created_date, expiry_date, password) VALUES ('".$first_name."', '".$last_name."', '".$username."', '".$address."', '".$email."', '".$gender."', '".$email_receive."', '".$member_card_number."', '".$created_date."', '".$expiry_date."', '".$md5_password."')";
						echo $query;
						if(mysql_query($query))
							echo "insert successfully\n";
						else 
							echo "insert fail\n";
					}
				}
				fclose($file);
			}
		
		}
	}
	
	function shoppingCart() {
		
		if (!empty($_REQUEST['data'])) {
		$str =  $_REQUEST['data'];
			$items_array = explode(',', $str);
			while (0 < count($items_array)) {
				
				$barcode = $items_array[0];
				$store_id = $items_array[1];
				$quantity = $items_array[2];
				
				if ($this->user_model->insertOrder($this->session->userdata('m_id'), $barcode, $store_id, $quantity)) {
					$items_array = array_slice($items_array, 3);
				}

			}
		}
		$items = $this->user_model->getItemByBarcode($this->session->userdata('store_id'));
		$data['items'] = $items;
		
		$this->template->build('member_shoppingCart', $data);
	}

	function deleteShoppingCartItem($o_id) {
	
		$query = "DELETE FROM `order` WHERE o_id = '".$o_id."'";
		if(mysql_query($query))
			redirect('member/shoppingCart');
		else 
			$this->template->build('member_deleteOrderFail');
	}
	
	function checkOut($m_id) {
	
		$this->db->where(array('m_id'=> $m_id, 'status' => 'pending'));
		$this->db->update('order', array('status' => 'ordered', 'order_datetime'=>date("Y-m-d H:i:s"))); 
		
		$this->template->build('member_orderFinish');
	}
}