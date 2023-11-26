<?php defined('BASEPATH') or exit('No direct script access allowed');

class Common_model extends CI_Model
{
	private $user_role_tbl = "user_role_tbl";
	public function district_list()
	{
		//''  => "Select District",
		$district_list = array(
			''			=> 'Select District',
			'Anantnag' 	=> 'Anantnag',
			'Bandipore' => 'Bandipore',
			'Baramulla' => 'Baramulla',
			'Budgam' 	=> 'Budgam',
			'Doda' 		=> 'Doda',
			'Ganderbal' => 'Ganderbal',
			'Jammu' 	=> 'Jammu',
			'Kargil' 	=> 'Kargil',
			'Kathua' 	=> 'Kathua',
			'Kishtwar' 	=> 'Kishtwar',
			'Kulgam' 	=> 'Kulgam',
			'Kupwara' 	=> 'Kupwara',
			'Leh' 		=> 'Leh',
			'Poonch' 	=> 'Poonch',
			'Pulwama' 	=> 'Pulwama',
			'Rajouri' 	=> 'Rajouri',
			'Ramban' 	=> 'Ramban',
			'Reasi' 	=> 'Reasi',
			'Samba' 	=> 'Samba',
			'Shopian' 	=> 'Shopian',
			'Srinagar' 	=> 'Srinagar',
			'Udhampur' 	=> 'Udhampur'
		);
		return $district_list;
	}
	public function getCountryName($country_id)
	{
		//echo $country_id;
		//$this->db->where('country_id',$country_id);
		//$country= $this->db->get('countries')->row();
		//return $country;
		$result = $this->db
			->select("*")
			->from('countries')
			->where('country_id', $country_id)
			->get()
			->row();
		return $result->country_name;
	}
	public function getStateName($state_id)
	{
		//echo $country_id;
		//$this->db->where('country_id',$country_id);
		//$country= $this->db->get('countries')->row();
		//return $country;
		$result = $this->db
			->select("*")
			->from('states')
			->where('state_id', $state_id)
			->get()
			->row();
		return $result->state_name;
	}
	public function getCityName($city_id)
	{
		//echo $country_id;
		//$this->db->where('country_id',$country_id);
		//$country= $this->db->get('countries')->row();
		//return $country;
		$result = $this->db
			->select("*")
			->from('cities')
			->where('city_id', $city_id)
			->get()
			->row();
		return $result->city_name;
	}
	public function getPropertyFacing($facing_id)
	{
		//echo $country_id;
		//$this->db->where('country_id',$country_id);
		//$country= $this->db->get('countries')->row();
		//return $country;
		$result = $this->db
			->select("*")
			->from('property_facing')
			->where('facing_id', $facing_id)
			->get()
			->row();
		return $result->facing_direction;
	}
}
