<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!($this->session->userdata('isLogIn'))) {
			redirect('index.php/login');
		} elseif ($this->session->userdata('user_role') != 1) {
			redirect('index.php/login');
		}
		$this->load->model('property_model');

		$this->load->library('session');

		$this->load->helper(array('form', 'url', 'number'));
	}
	public function index()
	{
		$temp['value'] = $this->property_model->read();
		$temp['setting'] = $this->property_model->app_setting();
		$temp['content'] = $this->load->view('admin/home_view', $temp, true);
		$this->load->view('admin/layout/main_wrapper_view', $temp);
	}
}
