<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

	private $table = "user_tbl";

	public function check_user($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where('email', $data['email'])
			->where('password', $data['password'])
			->where('user_role', $data['user_role'])
			->where('status', 1)
			->get()
			->row();
	}

	public function read_by_id($user_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('user_id', $user_id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		//print_r($data); die();
		return $this->db->where('user_id', $data['user_id'])
			->update("user", $data);
	}

	public function profile($user_id = null)
	{
		return $this->read_by_id($user_id);
	}


   
	
	public function register($data)
	{
		//print_r($data);
		return $this->db->insert($this->table, $data);
	}
}