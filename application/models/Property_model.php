<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Property_model extends CI_Model
{

  private $table = "property_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function read()
  {
    return $this->db->select("*")->from($this->table)->get()->result();
  }
  public function get($id)
  {
    $result = $this->db
      ->select("*")
      ->from($this->table)
      ->where('p_id', $id)
      ->get()
      ->row();
    return $result;
  }

  public function update_data($data = [], $id)
  {

    $this->db->where('p_id', $id);
    return $this->db->update($this->table, $data);
  }
  public function delete_data($id)
  {
    $this->db->where('p_id', $id);
    return $this->db->delete($this->table);
  }
  public function getCountries()
  {

    $countries = $this->db->get('countries')->result_array();
    return $countries;
  }
  public function getStatesOfCountry($country_id)
  {
    $this->db->where('country_id', $country_id);
    $states = $this->db->get('states')->result_array();
    return $states;
  }
  public function getCitiesOfState($state_id)
  {
    $this->db->where('state_id', $state_id);
    $cities = $this->db->get('cities')->result_array();
    return $cities;
  }
  public function getFacingDirections()
  {
    $facing_directions = $this->db->get('property_facing')->result_array();
    return $facing_directions;
  }
  public function getStatus()
  {
    return $this->db->get('property_status')->result_array();
  }
  public function getType()
  {
    return $this->db->get('property_type')->result_array();
  }
  public function getLabel()
  {
    return $this->db->get('property_label')->result_array();
  }

  public function getProperties()
  {
    return $this->db->get('property_tbl')->result_array();
  }

  // For Document
  public function upload_documents($data = [])
  {
    return $this->db->insert('property_documents_tbl', $data);
  }
  public function doc_list($id)
  {
    $result = $this->db
      ->select("*")
      ->from('property_documents_tbl')
      ->where('pd_p_id', $id)
      ->get()
      ->result_array();
    // echo '<pre>';
    // print_r($result);
    return $result;
  }
  public function doc_delete($id)
  {
    $this->db->where('pd_id', $id);
    return $this->db->delete('property_documents_tbl');
  }
  // for images
  public function upload_images($data = [])
  {
    print_r($data);
    return $this->db->insert('property_images_tbl', $data);
  }
  public function img_list($id)
  {
    $result = $this->db
      ->select("*")
      ->from('property_images_tbl')
      ->where('img_p_id', $id)
      ->get()
      ->result_array();
    // echo '<pre>';
    // print_r($result);
    return $result;
  }
  public function front_img_list()
  {
    $result = $this->db
      ->select("*")
      ->from('property_images_tbl')
      ->get()
      ->result_array();
    return $result;
  }
  public function img_delete($id)
  {
    $this->db->where('img_id', $id);
    return $this->db->delete('property_images_tbl');
  }
  public function app_setting()
  {
    return $this->db->select('*')->from('setting')->get()->row();
  }
  public function update_app_setting($data)
  {
    return $this->db->update('setting', $data);
  }
}
