<?php
defined('BASEPATH') or exit('No direct script access allowed');

class message extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!($this->session->userdata('isLogIn'))) {
      redirect('index.php/login');
    }
    $this->load->model(array(
      'message_model', 'property_model', 'Common_model',
    ));
  }
  public function index()
  {
    $this->save_message();
  }
  public function save_message()
  {
    $id = $_GET['id'];
    if ($id == 'contact_us') {
      $data['input_msg'] = (object) $postData = [
        "msg_id"           => null,
        "p_id"           => 0,
        "username"        => ucfirst($this->input->post('username')),
        "address"      => $this->input->post('address'),
        "phone"         => $this->input->post('phone'),
        "email"        => $this->input->post('email'),
        "subject"       => $this->input->post('subject'),
        "message"      => $this->input->post('user_query'),
        "read_status"   => 0,
        "msg_date"     =>  date('Y-m-d H:m:s'),
      ];
      if ($this->message_model->save_msg($postData)) {
        $this->session->set_flashdata('success', 'Message Sent Successfully!');
        redirect(base_url() . "index.php/front/contactUs");
      } else {

        $this->session->set_flashdata('failure', 'Message Not Sent try Again !');
        redirect(base_url() . "index.php/front/contactUs");
      }
    } else {
      $data['input_msg'] = (object) $postData = [
        "msg_id"           => null,
        "p_id"           => $this->input->post('p_id'),
        "username"        => ucfirst($this->input->post('username')),
        "address"      => $this->input->post('address'),
        "phone"         => $this->input->post('phone'),
        "email"        => $this->input->post('email'),
        "subject"       => $this->input->post('subject'),
        "message"      => $this->input->post('user_query'),
        "read_status"   => 0,
        "msg_date"     =>  date('Y-m-d H:m:s'),
      ];
      if ($this->message_model->save_msg($postData)) {
        $this->session->set_flashdata('success', 'Message Sent Successfully!');
        redirect(base_url() . "index.php/front/property_details?id=" . $id);
      } else {

        $this->session->set_flashdata('failure', 'Message Not Sent try Again !');
        redirect(base_url() . "index.php/front/property_details?id=" . $id);
      }
    }
    // echo ($id);
    // die();

    // }
  }
  //get all the messages from db;
  public function user_messages()
  {
    if ($this->session->userdata('user_role') != 1) {
      redirect('index.php/login');
    }
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['Messages_list'] = $this->message_model->get_user_messages();
    $data['content'] = $this->load->view('admin/property/messages_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function user_msg_details()
  {
    if ($this->session->userdata('user_role') != 1) {
      redirect('index.php/login');
    }
    $this->message_model->update_status($_GET['m_id']);
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['sp_user_Message'] = $this->message_model->get_unique_messages($_GET['m_id']);
    $data['content'] = $this->load->view('admin/property/message_detail_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function user_msg_delete()
  {
    if ($this->session->userdata('user_role') != 1) {
      redirect('index.php/login');
    }
    if ($this->message_model->delete_message($_GET['m_id'])) {
      $this->session->set_flashdata('success', 'Message Deleted!');
      redirect('index.php/message/user_messages');
    } else {
      $this->session->set_flashdata('failure', 'Message Not Deleted!');
      redirect('index.php/message/user_messages');
    }
  }
  // count unread messages 
  public function check_user_msg()
  {
    if ($this->session->userdata('user_role') != 1) {
      redirect('index.php/login');
    }
    if ($_POST['check_msg'] != null) {
      $count = $this->message_model->get_msg_status();
      if ($count > 0) {
        echo $count;
      } else {
        echo 0;
      }
    }
  }
}
