<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{

	private $table = "setting";

	public function create($data = [])
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('setting_id', $data['setting_id'])
			->update($this->table, $data);
	}
}
