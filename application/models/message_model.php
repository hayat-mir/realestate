<?php defined('BASEPATH') or exit('No direct script access allowed');

class message_model extends CI_Model
{
  private $msg_tbl = 'messages_tbl';
  public function save_msg($data = [])
  {
    return $this->db->insert($this->msg_tbl, $data);
  }
  public function get_user_messages()
  {
    return $this->db
      ->select("*")
      ->from($this->msg_tbl)
      ->order_by('msg_date')
      ->get()
      ->result();
  }
  public function get_unique_messages($m_id)
  {
    return $this->db
      ->select("*")
      ->from($this->msg_tbl)
      ->where('msg_id', $m_id)
      ->get()
      ->row();
  }
  public function delete_message($m_id)
  {
    $this->db->where('msg_id', $m_id);
    return $this->db->delete($this->msg_tbl);
  }
  public function get_msg_status()
  {
    $this->db->select("m_id");
    $this->db->from($this->msg_tbl);
    $this->db->where('read_status', 0);
    $num_result = $this->db->count_all_results();
    return $num_result;
  }
  public function update_status($m_id)
  {
    $this->db->set("read_status", 1);
    $this->db->where_in('msg_id', $m_id);
    $this->db->update($this->msg_tbl);
  }
}
