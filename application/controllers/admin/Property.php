<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Property extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!($this->session->userdata('isLogIn'))) {
      redirect('index.php/login');
    } elseif ($this->session->userdata('user_role') != 1) {
      redirect('index.php/login');
    }
    // $this->load->helper('number');
    $this->load->model(array(
      'property_model', 'Common_model',
    ));
    $this->load->library('form_validation', 'session');
  }
  // add property
  public function index()
  {
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['status'] = $this->property_model->getStatus();
    $data['type'] = $this->property_model->getType();
    $data['label'] = $this->property_model->getLabel();
    $data['facing_directions'] = $this->property_model->getFacingDirections();
    $data['countries'] = $this->property_model->getCountries();
    $data['content'] = $this->load->view('admin/property/form_view', $data, true);

    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function getStates()
  {

    $country_id = $this->input->post('country_id');
    $data = [];
    $data['states'] = $this->property_model->getStatesOfCountry($country_id);
    $statesStr = $this->load->view('admin/property/states_view', $data, true);
    $response['states'] = $statesStr;
    echo json_encode($response);
  }
  public function getCities()
  {
    $state_id = $this->input->post('state_id');
    $data = [];
    $data['cities'] = $this->property_model->getCitiesOfState($state_id);
    $citiesStr = $this->load->view('admin/property/cities_view', $data, true);
    $response['cities'] = $citiesStr;
    echo json_encode($response);
  }
  public function create()
  {

    // validation rules
    $this->form_validation->set_rules('property_title', 'Property Title', 'required|max_length[25]|min_length[5]');
    $this->form_validation->set_rules('type', 'Type', 'required');
    $this->form_validation->set_rules('label', 'Property Label', 'required');
    $this->form_validation->set_rules('area_size', 'Area Size', 'required|numeric');
    $this->form_validation->set_rules('size_postfix', 'Size Postfix', 'required');
    $this->form_validation->set_rules('land_area', 'Land Area', 'required|numeric');
    $this->form_validation->set_rules('land_area_postfix', 'Land Area Postfix', 'required');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
    $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');
    $this->form_validation->set_rules('year_built', 'Year Built', 'required|numeric');
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('state', 'State', 'required');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|numeric|max_length[10]');
    // check validation
    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {

      $data['input'] = (object) $postData = [
        "p_id"           => null,
        "p_title"        => ucfirst($this->input->post('property_title')),
        "p_content"      => $this->input->post('content'),
        "p_type"         => $this->input->post('type'),
        "p_label"        => $this->input->post('label'),
        "p_status"       => $this->input->post('status'),
        "p_country"      => $this->input->post('country'),
        "p_state"        => $this->input->post('state'),
        "p_city"         => $this->input->post('city'),
        "p_address"      => ucfirst($this->input->post('address')),
        "p_postal_code"  => $this->input->post('postal_code'),
        "p_latitude"     => $this->input->post('latitude'),
        "p_longitude"    => $this->input->post('longitude'),
        "p_bedrooms"     => $this->input->post('bedrooms'),
        "p_bathrooms"    => $this->input->post('bathrooms'),
        "p_area"         => $this->input->post('area_size'),
        "p_area_unit"    => $this->input->post('size_postfix'),
        "p_land"         => $this->input->post('land_area'),
        "p_land_unit"    => $this->input->post('land_area_postfix'),
        "p_garage"       => $this->input->post('garages'),
        "p_garages_unit" => $this->input->post('garage_size'),
        "p_year"         => $this->input->post('year_built'),
        "p_price"        => $this->input->post('price'),
        "p_front_facing" => $this->input->post('front_facing'),
        "p_private_note" => $this->input->post('private_note'),
      ];


      if ($this->property_model->create($postData)) {

        $this->session->set_flashdata('success', 'Property Added!');
        redirect('index.php/admin/property/list');
      } else {
        $this->session->set_flashdata('failure', 'Property not Added!');
        redirect('index.php/admin/property/list');
      }
    }
  }
  public function list()
  {
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['properties'] = $this->property_model->read();
    $data['status'] = $this->property_model->getStatus();
    $data['type'] = $this->property_model->getType();
    $data['label'] = $this->property_model->getLabel();
    $data['images'] = $this->property_model->front_img_list();
    //echo "<pre>";
    // print_r($data['images']);
    //echo "</pre>";
    $data['content'] = $this->load->view('admin/property/list_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  //details of a prticular property based on its Id//
  public function detail()
  {
    $id = $_GET['id'];
    $data['setting'] = $this->property_model->app_setting();
    $data['result'] = $this->property_model->get($id);
    $data['images'] = $this->property_model->img_list($id);
    $data['country'] = $this->Common_model->getCountryName($data['result']->p_country);
    $data['state'] = $this->Common_model->getStateName($data['result']->p_state);
    $data['city'] = $this->Common_model->getCityName($data['result']->p_city);
    $data['property_facing'] = $this->Common_model->getPropertyFacing($data['result']->p_front_facing);
    $data['status'] = $this->property_model->getStatus();
    $data['type'] = $this->property_model->getType();
    $data['label'] = $this->property_model->getLabel();
    $data['content'] = $this->load->view('admin/property/detail_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }

  public function edit()
  {

    $id = $_GET['id'];
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['result'] = $this->property_model->get($id);
    $data['States'] = $this->property_model->getStatesOfCountry($data['result']->p_country);
    $data['country'] = $this->Common_model->getCountryName($data['result']->p_country);
    $data['city'] = $this->Common_model->getCityName($data['result']->p_city);
    $data['facing_directions'] = $this->property_model->getFacingDirections();
    $data['status'] = $this->property_model->getStatus();
    $data['type'] = $this->property_model->getType();
    $data['label'] = $this->property_model->getLabel();
    //$data['stateName']=$this->Common_model->getStateName($data['result']->p_country);
    $data['content'] = $this->load->view('admin/property/edit_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  // after editing property directed to modify
  public function modify()
  {
    //  validation rules
    $this->form_validation->set_rules('property_title', 'Property Title', 'required|max_length[25]|min_length[5]');
    $this->form_validation->set_rules('type', 'Type', 'required');
    $this->form_validation->set_rules('label', 'Property Label', 'required');
    $this->form_validation->set_rules('area_size', 'Area Size', 'required|numeric');
    $this->form_validation->set_rules('size_postfix', 'Size Postfix', 'required');
    $this->form_validation->set_rules('land_area', 'Land Area', 'required|numeric');
    $this->form_validation->set_rules('land_area_postfix', 'Land Area Postfix', 'required');
    $this->form_validation->set_rules('year_built', 'Year Built', 'required|numeric');
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('state', 'State', 'required');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|numeric|max_length[10]');

    $id = $_GET['id'];

    // check validation
    if ($this->form_validation->run() == FALSE) {
      $this->edit();
    } else {

      $data['input'] = (object) $postData = [
        "p_id"           => $id,
        "p_title"        => ucfirst($this->input->post('property_title')),
        "p_content"      => $this->input->post('content'),
        "p_type"         => $this->input->post('type'),
        "p_label"        => $this->input->post('label'),
        "p_status"       => $this->input->post('status'),
        "p_country"      => $this->input->post('country'),
        "p_state"        => $this->input->post('state'),
        "p_city"         => $this->input->post('city'),
        "p_address"      => ucfirst($this->input->post('address')),
        "p_postal_code"  => $this->input->post('postal_code'),
        "p_bedrooms"     => $this->input->post('bedrooms'),
        "p_bathrooms"    => $this->input->post('bathrooms'),
        "p_area"         => $this->input->post('area_size'),
        "p_area_unit"    => $this->input->post('size_postfix'),
        "p_land"         => $this->input->post('land_area'),
        "p_land_unit"    => $this->input->post('land_area_postfix'),
        "p_garage"       => $this->input->post('garages'),
        "p_garages_unit" => $this->input->post('garage_size'),
        "p_year"         => $this->input->post('year_built'),
        "p_price"        => $this->input->post('price'),
        "p_front_facing" => $this->input->post('front_facing'),
        "p_private_note" => $this->input->post('private_note'),
      ];


      if ($this->property_model->update_data($postData, $id)) {
        $this->session->set_flashdata('success', 'Property Updated!');
        redirect('index.php/admin/property/list');
      } else {
        $this->session->set_flashdata('failure', 'Property Not Updated!');
        redirect('index.php/admin/property/list');
      }
    }
  }

  public function delete()
  {
    $id = $_GET['id'];
    if ($this->property_model->delete_data($id)) {
      $this->session->set_flashdata('success', 'Property Deleted!');
      redirect('index.php/admin/property/list');
    } else {
      $this->session->set_flashdata('failure', 'Property Not Deleted!');
      redirect('index.php/admin/property/list');
    }
  }
  public function property_document()
  {
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['type'] = $this->property_model->getProperties();
    $data['list'] = '';
    $data['content'] = $this->load->view('admin/property/document_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function document_upload()
  {
    $config = [
      'upload_path'   => './uploads/docs/',
      'allowed_types' => 'jpeg|jpg|pdf',
      'max_size'   => '2048'
    ];
    $this->load->library('upload', $config);
    //  validation rules
    $this->form_validation->set_rules('property_type', 'Property Type', 'required');
    $this->form_validation->set_rules('pd_title', 'Document Title', 'required');
    if ($this->form_validation->run() == true) {
      if ($this->upload->do_upload('pd_file_path')) {
        $data = $this->upload->data();
        $doc_path = "uploads/docs/" . $data['raw_name'] . $data['file_ext'];
        $data['input'] = (object) $postData = [
          "pd_id"          => null,
          "pd_title"       => ucfirst($this->input->post('pd_title')),
          "pd_file_path"   => $doc_path,
          "pd_p_id"        => $this->input->post('property_type'),
        ];
      } else {
        $data2 = $this->upload->data();
        if ($data2['file_ext'] == '.jpg' || $data2['file_ext'] == '.jpeg' || $data2['file_ext'] == '.pdf') {
          if ($data2['file_size'] > 2048) {
            $this->session->set_flashdata('failure', 'Document Size Must be Less than 2MB');
            redirect('index.php/admin/property/property_document');
          }
        } else {
          $this->session->set_flashdata('failure', 'Document Format Not Supported Try Again!');
          redirect('index.php/admin/property/property_document');
        }
      }

      if ($this->property_model->upload_Documents($postData)) {
        $this->session->set_flashdata('success', 'Document uploaded');
        redirect('index.php/admin/property/property_document');
      } else {
        $this->session->set_flashdata('failure', 'Document Not Uploaded Try Again!!!!!');
        redirect('index.php/admin/property/property_document');
      }
    } else {
      $this->property_document();
    }
  }
  public function document_list()
  {
    $title = $this->input->post('pty_type');
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['type'] = $this->property_model->getProperties(); //ALL PROPERTIES 
    $data['list'] = $this->property_model->doc_list($title);
    $data['content'] = $this->load->view('admin/property/document_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function document_delete()
  {
    $id = $_GET['id'];
    // echo $id;
    if ($this->property_model->doc_delete($id)) {
      $this->session->set_flashdata('success', 'Document Deleted');
      redirect('index.php/admin/property/document_list');
    } else {
      $this->session->set_flashdata('failure', 'Document Not Deleted');
      redirect('index.php/admin/property/document_list');
    }
  }
  public function document_download()
  {
    $this->load->helper('download');
    $path = $_GET['path'];
    force_download($path, NULL);
  }
  // Property images 
  public function property_image()
  {
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['type'] = $this->property_model->getProperties();
    $data['content'] = $this->load->view('admin/property/image_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }

  public function image_upload()
  {
    $config = [
      'upload_path'   => './uploads/images/',
      'allowed_types' => 'jpg|jpeg|png',
      'max_size'      => '3072'

    ];
    $this->load->library('upload', $config);
    //  validation rules
    $this->form_validation->set_rules('property_title', 'Property Title', 'required');
    $this->form_validation->set_rules('img_title', 'Image Title', 'required');
    if ($this->form_validation->run() == true) {
      if ($this->upload->do_upload('img_file_path')) {
        $data = $this->upload->data();
        $image_path = "uploads/images/" . $data['raw_name'] . $data['file_ext'];
        // echo $image_path;
        $data['input'] = (object) $postData = [
          "img_id"          => null,
          "img_title"       => ucfirst($this->input->post('img_title')),
          "img_file_path"   => $image_path,
          "img_p_id"        => $this->input->post('property_title'),
        ];
      } else {
        $data2 = $this->upload->data();
        if ($data2['file_ext'] == '.jpg' || $data2['file_ext'] == '.jpeg' || $data2['file_ext'] == '.png') {
          if ($data2['file_size'] > 3072) {
            $this->session->set_flashdata('failure', 'Image Size Must be Less than 3MB');
            redirect('index.php/admin/property/property_image');
          }
        } else {
          $this->session->set_flashdata('failure', 'Image Format Not Supported Try Again!');
          redirect('index.php/admin/property/property_image');
        }
      }

      if ($this->property_model->upload_images($postData)) {
        $this->session->set_flashdata('success', 'Image uploaded');
        redirect('index.php/admin/property/property_image');
      } else {
        $this->session->set_flashdata('failure', 'Image Not Uploaded Try Again!!!!!');
        redirect('index.php/admin/property/property_image');
      }
    } else {
      $this->property_image();
    }
  }
  public function image_list()
  {
    $title = $this->input->post('pty_type');
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['type'] = $this->property_model->getProperties();
    $data['list'] = $this->property_model->img_list($title);
    $data['content'] = $this->load->view('admin/property/image_view', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function image_delete()
  {
    $id = $_GET['id'];
    // echo $id;
    if ($this->property_model->img_delete($id)) {
      $this->session->set_flashdata('success', 'Image Deleted');
      redirect('index.php/admin/property/image_list');
    } else {
      $this->session->set_flashdata('failure', 'Image Not Deleted');
      redirect('index.php/admin/property/image_list');
    }
  }
  public function image_download()
  {
    $this->load->helper('download');
    $path = $_GET['path'];
    force_download($path, NULL);
  }
  public function app_setting()
  {
    $data = [];
    $data['setting'] = $this->property_model->app_setting();
    $data['content'] = $this->load->view('admin/property/app_setting', $data, true);
    $this->load->view('admin/layout/main_wrapper_view', $data);
  }
  public function app_setting_data()
  {
    $setting_data = $this->property_model->app_setting();
    $config = [
      'upload_path'   => './assets/images/logo/',
      'allowed_types' => 'jpg|jpeg|png|ico',
      'max_size'      => '3072'
    ];
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('logo')) {
      $data = $this->upload->data();
      $logo_path = "assets/images/logo/" . $data['raw_name'] . $data['file_ext'];
    } else {
      $logo_path = $setting_data->logo;
    }
    if ($this->upload->do_upload('favicon')) {
      $data = $this->upload->data();
      $favicon_path = "assets/images/logo/" . $data['raw_name'] . $data['file_ext'];
    } else {
      $favicon_path = $setting_data->favicon;
    }
    $data = (array)[
      'title' => $this->input->post('title'),
      'description' => $this->input->post('address'),
      'city' => $this->input->post('city'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'logo' => $logo_path,
      'favicon' => $favicon_path,
      'footer_text_left' => $this->input->post('l_text'),
      'footer_text_right' => $this->input->post('r_text'),
    ];
    if ($this->property_model->update_app_setting($data)) {
      $this->session->set_flashdata('success', 'Setting Updted');
      redirect('index.php/admin/property/app_setting');
    } else {
      $this->session->set_flashdata('failure', 'Setting Not Updated Try Again!!!!');
      redirect('index.php/admin/property/app_setting');
    }
  }
}
