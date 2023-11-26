<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Front extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('front_model', 'property_model'));
    }

    public function index()
    {
        $data = [];
        $data['slider_properties'] = $this->front_model->get_slider_properties();
        $data['property_sale'] = $this->front_model->property_sale();
        $data['images'] = $this->property_model->front_img_list();
        $data['type'] = $this->front_model->get_type();
        $data['label'] = $this->front_model->get_label();
        $data['status'] = $this->front_model->get_status();
        $data['setting'] = $this->property_model->app_setting();
        $data['content'] = $this->load->view('frontend/pages/home', $data, true);
        $this->load->view('frontend/layout/main_wrapper', $data);
    }

    public function property_grids()
    {
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('index.php/front/property_grids'),
            'per_page' => 6,
            'total_rows' => $this->front_model->total_properties(),
            'full_tag_open' => '<ul class="pagination pagination-md justify-content-center">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'first_tag_open' => '<li class="page-item page-link">',
            'first_tag_close' => '</li>',
            'prev_link' => '«',
            'prev_tag_open' => '<li class="page-item page-link">',
            'prev_tag_close' => '</li>',
            'next_link' => '»',
            'next_tag_open' => '<li class="page-item page-link">',
            'next_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a class="page-link text-white" style="background-color: #004274;" href="#">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page-item page-link">',
            'num_tag_close' => '</li>',
        ];
        $this->pagination->initialize($config);
        $data['properties'] = $this->front_model->read_properties($config['per_page'], $this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();
        $data['images'] = $this->property_model->front_img_list();
        $data['total_property'] = $this->front_model->total_properties();
        $data['setting'] = $this->property_model->app_setting();
        $data['content'] = $this->load->view('frontend/pages/property_grid_view', $data, true);
        $this->load->view('frontend/layout/main_wrapper', $data);
    }

    public function property_details()
    {
        $id = $_GET['id'];
        $data['property'] = $this->front_model->read_property_by_id($id);
        $data['images'] = $this->property_model->img_list($id);
        $data['setting'] = $this->property_model->app_setting();
        $data['content'] = $this->load->view('frontend/pages/property_view', $data, true);
        $this->load->view('frontend/layout/main_wrapper', $data);
    }

    public function about()
    {
        $data['content'] = $this->load->view('frontend/pages/about_view', '', true);
        $data['setting'] = $this->property_model->app_setting();
        $this->load->view('frontend/layout/main_wrapper', $data);
    }
    public function contactUs()
    {
        $data['content'] = $this->load->view('frontend/pages/contact_view', '', true);
        $data['setting'] = $this->property_model->app_setting();
        $this->load->view('frontend/layout/main_wrapper', $data);
    }
    public function search_data()
    {
        $data = array(
            'price' => $this->input->post('price'),
            'bedrooms' => $this->input->post('bedroom'),
            'status' => $this->input->post('status'),
            'type' => $this->input->post('type'),
            'label' => $this->input->post('label'),
            // 'bedrooms' => $this->input->post('bedroom'),
            'bathrooms' => $this->input->post('bathroom'),
            'keyword' => $this->input->post('keyword'),

        );
        $data['searched_property'] = $this->front_model->find_property($data);
        $data['count'] = count($data['searched_property']);
        $data['images'] = $this->property_model->front_img_list();
        $data['setting'] = $this->property_model->app_setting();
        $data['content'] = $this->load->view('frontend/pages/selected_prop_view',  $data, true);
        $this->load->view('frontend/layout/main_wrapper', $data);
        // echo '<pre>';
        // print_r($data['searched_property']);
    }
}
