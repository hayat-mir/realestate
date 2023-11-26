<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(

			'login_model', 'property_model'
		));
	}
	public function index()
	{
		$this->login();
	}
	public function login()
	{

		if ($this->session->userdata('isLogIn'))
			$this->user_redirect($this->session->userdata('user_role'));

		// validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|md5');
		$this->form_validation->set_rules('user_role', 'User Role', 'required');

		//preparing data
		$data['user'] = (object)$postData = [
			'email'     => $this->input->post('email', true),
			'password'  => md5($this->input->post('password', true)),
			'user_role' => $this->input->post('user_role', true),
		];
		#-------------------------------#
		$data['setting'] = $this->property_model->app_setting();
		if ($this->form_validation->run() == true) {
			$check_user = $this->login_model->check_user($postData);
			if (!empty($check_user)) {
				// setting session 
				$this->session->set_userdata([
					'isLogIn'       => true,
					'user_id'       => $check_user->user_id,
					'email'         => $check_user->email,
					'fullname'      => $check_user->username,
					'mobile'        => $check_user->mobile,
					'address'       => $check_user->address,
					'user_role'     => $check_user->user_role,
				]);
				// print_r($this->session->userdata());
				// die();
				$this->user_redirect($postData['user_role']);
				// can directy redirect here
			} else {
				$this->session->set_flashdata('exception', display('incorrect_email_password'));
				redirect('index.php/login');
			}
		} else {
			$this->load->view('login/login_wrapper', $data);
		}
	}

	public function user_redirect($user_role)
	{

		switch ($user_role) {
			case 1:
				redirect('index.php/admin/home/index');
				break;
			case 2:
				redirect('index.php/front');
				break;
			default:
				$this->logout();
				//redirect('login');
				break;
		}
	}

	function validate_email($email) {
		// Use a regular expression to check if the local part has at least one letter
		if (!preg_match('/^[a-zA-Z0-9._%+-]*[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
			$this->form_validation->set_message('validate_email', 'The {field} field should not have only numbers in the local part.');
			return false;
		}
	
		return true;
	}
	public function developer()
	{
		$this->load->view('profile3');
	}

	public function logout()
	{
		// Destroy the session and redirect to login function..//
		$this->session->sess_destroy();
		redirect('index.php/login');
	}
	public function register()
	{
		// loading the register view...//
		$this->load->view('login/register_view');
	}
	public function register_data()
	{
		// validation rules
		// $this->form_validation->set_rules('uname', 'UserName', 'required|max_length[30]');

		$this->form_validation->set_rules('uname', 'UserName', 'required|max_length[30]|regex_match[/^[a-zA-Z0-9]{1,}$/]', array(
			'regex_match' => 'The {field} field should have at least 3 letters and may contain numbers, but not @ symbol.'
		));
		
		$this->form_validation->set_rules('uemail', 'Email', 'required|max_length[50]|callback_validate_email');
		


		// $this->form_validation->set_rules('upass', 'password', 'required|max_length[32]');
		$this->form_validation->set_rules('upass', 'Password', 'required|max_length[32]|min_length[6]|regex_match[/^(?=.*[A-Za-z])(?=.*\d).+$/]', array(
			'regex_match' => 'The {field} must contain both numbers and letters.'
		));
		
		$this->form_validation->set_rules('uphone', 'Phone No', 'required|numeric|exact_length[10]');




		$this->form_validation->set_rules('uaddr', 'Address', 'required|min_length[4]|regex_match[/^[a-zA-Z0-9 ]{3,}$/]');


		if ($this->form_validation->run() == true) {
			// preparing data
			$data = array(
				'username' => $this->input->post('uname'),
				'password' => md5($this->input->post('upass')),
				'email' => $this->input->post('uemail'),
				'address' => $this->input->post('uaddr'),
				'mobile' => $this->input->post('uphone'),
				'user_role' => 2
			);
			
			if ($this->login_model->register($data)) {
				//if registered successfully then redirect to login 
				$this->session->set_flashdata('success', 'User Added!');
				redirect('index.php/login');
			} else {  // otherwise redirect to register...//
				$this->session->set_flashdata('failure', 'Unable to Add!');
				$this->register();
			}
		} else {
			$this->register();
		}
	}

}




