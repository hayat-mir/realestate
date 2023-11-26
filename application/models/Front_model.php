<?php defined('BASEPATH') or exit('No direct script access allowed');

class Front_model extends CI_Model
{
    public function read_properties($limit, $offset)
    {
        $this->db->select("
			property_tbl.p_id,
            property_tbl.p_title,
            property_tbl.p_content,
            property_type.type_name ,
            property_label.label_name ,
            property_status.status_name,
            countries.country_name,
            property_tbl.p_address,
			states.state_name,
			cities.city_name,
            property_tbl.p_postal_code,
            property_tbl.p_bathrooms,
            property_tbl.p_bedrooms,
            property_tbl.p_area ,
            property_tbl.p_area_unit,
            property_tbl.p_garage,
            property_tbl.p_garages_unit,
            property_tbl.p_year,
            property_tbl.p_price,
            property_tbl.p_private_note,
            property_tbl.p_doc,
            property_tbl.p_dou
		");
        $this->db->from('property_tbl');

        $this->db->join('property_type',    'property_tbl.p_type   = property_type.type_id', 'left');
        $this->db->join('property_label',   'property_tbl.p_label  = property_label.label_id', 'left');
        $this->db->join('property_status',  'property_tbl.p_status = property_status.status_id', 'left');
        $this->db->join('countries',        'property_tbl.p_country = countries.country_id', 'left');
        $this->db->join('states',           'property_tbl.p_state 	= state_id', 'left');
        $this->db->join('cities',           'property_tbl.p_city 	= city_id', 'left');

        $this->db->order_by('property_tbl.p_dou', 'DESC');
        $this->db->group_by('property_tbl.p_id');
        $this->db->limit($limit, $offset);
        // echo $this->db->get_compiled_select(); //For displaying db query
        // die();
        return $result = $this->db->get()->result();
    }

    //For Property Details View
    public function read_property_by_id($id)
    {
        $this->db->select("
			property_tbl.p_id,
            property_tbl.p_title,
            property_tbl.p_content,
            property_type.type_name ,
            property_label.label_name ,
            property_status.status_name,
            countries.country_name,
            property_tbl.p_address,
			states.state_name,
			cities.city_name,
            property_tbl.p_postal_code,
            property_tbl.p_latitude,
            property_tbl.p_longitude,
            property_tbl.p_bathrooms,
            property_tbl.p_bedrooms,
            property_tbl.p_area ,
            property_tbl.p_area_unit,
            property_tbl.p_garage,
            property_tbl.p_garages_unit,
            property_tbl.p_year,
            property_tbl.p_price,
            property_tbl.p_private_note,
            property_tbl.p_doc,
            property_tbl.p_dou
		");
        $this->db->from('property_tbl');

        $this->db->join('property_type',    'property_tbl.p_type   = property_type.type_id', 'left');
        $this->db->join('property_label',   'property_tbl.p_label  = property_label.label_id', 'left');
        $this->db->join('property_status',  'property_tbl.p_status = property_status.status_id', 'left');
        $this->db->join('countries',        'property_tbl.p_country = countries.country_id', 'left');
        $this->db->join('states',           'property_tbl.p_state 	= state_id', 'left');
        $this->db->join('cities',           'property_tbl.p_city 	= city_id', 'left');

        $this->db->where('p_id', $id);
        $this->db->order_by('property_tbl.p_dou', 'DESC');
        $this->db->group_by('property_tbl.p_id');
        // echo $this->db->get_compiled_select(); //For displaying db query
        // die();
        return $result = $this->db->get()->row();
    }

    //Get Latest 3(limit) properties for the landing page carousel
    public function get_slider_properties()
    {
        $this->db->select("
			property_tbl.p_id,
            property_tbl.p_title,
            property_tbl.p_content,
            property_type.type_name ,
            property_label.label_name ,
            property_status.status_name,
            countries.country_name,
            property_tbl.p_address,
			states.state_name,
			cities.city_name,
            property_tbl.p_postal_code,
            property_tbl.p_bathrooms,
            property_tbl.p_bedrooms,
            property_tbl.p_area ,
            property_tbl.p_area_unit,
            property_tbl.p_year,
            property_tbl.p_price,
            property_tbl.p_doc
		");
        $this->db->from('property_tbl');

        $this->db->join('property_type',    'property_tbl.p_type   = property_type.type_id', 'left');
        $this->db->join('property_label',   'property_tbl.p_label  = property_label.label_id', 'left');
        $this->db->join('property_status',  'property_tbl.p_status = property_status.status_id', 'left');
        $this->db->join('countries',        'property_tbl.p_country = countries.country_id', 'left');
        $this->db->join('states',           'property_tbl.p_state 	= state_id', 'left');
        $this->db->join('cities',           'property_tbl.p_city 	= city_id', 'left');

        $this->db->order_by('property_tbl.p_doc', 'DESC');
        $this->db->group_by('property_tbl.p_id');
        $this->db->limit(3);
        // echo $this->db->get_compiled_select(); //For displaying db query
        // die();
        return $result = $this->db->get()->result();
    }

    //Properties with 'Sale' Status
    public function property_sale()
    {
        $this->db->select("
			property_tbl.p_id,
            property_tbl.p_title,
            property_type.type_name ,
            property_label.label_name ,
            property_status.status_name,
            countries.country_name,
            property_tbl.p_address,
			states.state_name,
			cities.city_name,
            property_tbl.p_postal_code,
            property_tbl.p_bathrooms,
            property_tbl.p_bedrooms,
            property_tbl.p_area ,
            property_tbl.p_area_unit,
            property_tbl.p_year,
            property_tbl.p_price
		");
        $this->db->from('property_tbl');

        $this->db->join('property_type',    'property_tbl.p_type   = property_type.type_id', 'left');
        $this->db->join('property_label',   'property_tbl.p_label  = property_label.label_id', 'left');
        $this->db->join('property_status',  'property_tbl.p_status = property_status.status_id', 'left');
        $this->db->join('countries',        'property_tbl.p_country = countries.country_id', 'left');
        $this->db->join('states',           'property_tbl.p_state 	= state_id', 'left');
        $this->db->join('cities',           'property_tbl.p_city 	= city_id', 'left');

        $this->db->where('p_status', 2);
        $this->db->order_by('property_tbl.p_dou', 'DESC');
        $this->db->group_by('property_tbl.p_id');
        // echo $this->db->get_compiled_select(); //For displaying db query
        // die();
        return $result = $this->db->get()->result();
    }
    public function get_type()
    {
        $result = $this->db
            ->select("*")
            ->from('property_type')
            ->get()
            ->result();
        return $result;
    }
    public function get_label()
    {
        $result = $this->db
            ->select("*")
            ->from('property_label')
            ->get()
            ->result();
        return $result;
    }
    public function get_status()
    {
        $result = $this->db
            ->select("*")
            ->from('property_status')
            ->get()
            ->result();
        return $result;
    }

    //Specific Properties based on search
    // public function find_property($data)
    // {
    //     if ($data['keyword'] != null) {
    //         $this->db->select("
    //             property_tbl.p_id,
    //             property_tbl.p_title,
    //             property_tbl.p_content,
    //             property_type.type_name,
    //             property_label.label_name,
    //             property_status.status_name,
    //             countries.country_name,
    //             property_tbl.p_address,
    //             states.state_name,
    //             cities.city_name,
    //             property_tbl.p_postal_code,
    //             property_tbl.p_bathrooms,
    //             property_tbl.p_bedrooms,
    //             property_tbl.p_area,
    //             property_tbl.p_area_unit,
    //             property_tbl.p_garage,
    //             property_tbl.p_garages_unit,
    //             property_tbl.p_year,
    //             property_tbl.p_price,
    //             property_tbl.p_private_note,
    //             property_tbl.p_doc,
    //             property_tbl.p_dou
    //         ");
    //         $this->db->from('property_tbl');
    //         $this->db->join('property_type', 'property_tbl.p_type = property_type.type_id', 'left');
    //         $this->db->join('property_label', 'property_tbl.p_label = property_label.label_id', 'left');
    //         $this->db->join('property_status', 'property_tbl.p_status = property_status.status_id', 'left');
    //         $this->db->join('countries', 'property_tbl.p_country = countries.country_id', 'left');
    //         $this->db->join('states', 'property_tbl.p_state = states.state_id', 'left');
    //         $this->db->join('cities', 'property_tbl.p_city = cities.city_id', 'left');
    
    //         $this->db->like('p_title', $data['keyword']);
    //         $this->db->or_like('property_type.type_name', $data['keyword']);
    //         $this->db->or_like('property_label.label_name', $data['keyword']);
    //         $this->db->or_like('property_status.status_name', $data['keyword']);
    //         $this->db->or_like('cities.city_name', $data['keyword']);
    //         // $this->db->or_like('p_bathrooms', $data['keyword']);
    //         $this->db->or_like('p_bedrooms', $data['keyword']);
    //         $this->db->order_by('property_tbl.p_dou', 'DESC');
    //         $this->db->group_by('property_tbl.p_id');
    
           
    
    //         return $result = $this->db->get()->result();
    //     } else {
    //         $this->db->select("
    //         property_tbl.p_id,
    //         property_tbl.p_title,
    //         property_tbl.p_content,
    //         property_type.type_name ,
    //         property_label.label_name ,
    //         property_status.status_name,
    //         countries.country_name,
    //         property_tbl.p_address,
    //         states.state_name,
    //         cities.city_name,
    //         property_tbl.p_postal_code,
    //         property_tbl.p_bathrooms,
    //         property_tbl.p_bedrooms,
    //         property_tbl.p_area ,
    //         property_tbl.p_area_unit,
    //         property_tbl.p_garage,
    //         property_tbl.p_garages_unit,
    //         property_tbl.p_year,
    //         property_tbl.p_price,
    //         property_tbl.p_private_note,
    //         property_tbl.p_doc,
    //         property_tbl.p_dou
    //         ");
    //         $this->db->from('property_tbl');
    //         $this->db->join('property_type',    'property_tbl.p_type   = property_type.type_id', 'left');
    //         $this->db->join('property_label',   'property_tbl.p_label  = property_label.label_id', 'left');
    //         $this->db->join('property_status',  'property_tbl.p_status = property_status.status_id', 'left');
    //         $this->db->join('countries',        'property_tbl.p_country = countries.country_id', 'left');
    //         $this->db->join('states',           'property_tbl.p_state 	= state_id', 'left');
    //         $this->db->join('cities',           'property_tbl.p_city 	= city_id', 'left');
    //         $this->db->where('p_price<=', $data['price']);
    //         // $this->db->or_where('p_address', $data['location']);
    //         $this->db->or_where('p_type', $data['type']);
    //         $this->db->or_where('p_label', $data['label']);
    //         $this->db->or_where('p_status', $data['status']);
    //         $this->db->or_where('p_bedrooms', $data['bedrooms']);
    //         $this->db->or_where('p_bathrooms', $data['bathrooms']);
    //         $this->db->order_by('property_tbl.p_dou', 'DESC');
    //         $this->db->group_by('property_tbl.p_id');
    //         // echo $this->db->get_compiled_select(); //For displaying db query
    //         // die();
    //         return $result = $this->db->get()->result();
        
        public function find_property($data)
{
    $this->db->select("
        property_tbl.p_id,
        property_tbl.p_title,
        property_tbl.p_content,
        property_type.type_name,
        property_label.label_name,
        property_status.status_name,
        countries.country_name,
        property_tbl.p_address,
        states.state_name,
        cities.city_name,
        property_tbl.p_postal_code,
        property_tbl.p_bathrooms,
        property_tbl.p_bedrooms,
        property_tbl.p_area,
        property_tbl.p_area_unit,
        property_tbl.p_garage,
        property_tbl.p_garages_unit,
        property_tbl.p_year,
        property_tbl.p_price,
        property_tbl.p_private_note,
        property_tbl.p_doc,
        property_tbl.p_dou
    ");
    $this->db->from('property_tbl');
    $this->db->join('property_type', 'property_tbl.p_type = property_type.type_id', 'left');
    $this->db->join('property_label', 'property_tbl.p_label = property_label.label_id', 'left');
    $this->db->join('property_status', 'property_tbl.p_status = property_status.status_id', 'left');
    $this->db->join('countries', 'property_tbl.p_country = countries.country_id', 'left');
    $this->db->join('states', 'property_tbl.p_state = states.state_id', 'left');
    $this->db->join('cities', 'property_tbl.p_city = cities.city_id', 'left');

    // Check if keyword is provided
    if (!empty($data['keyword'])) {
        $this->db->group_start(); // Start a group to ensure OR conditions work correctly
        $this->db->like('p_title', $data['keyword']);
        $this->db->or_like('property_type.type_name', $data['keyword']);
        $this->db->or_like('property_label.label_name', $data['keyword']);
        $this->db->or_like('property_status.status_name', $data['keyword']);
        $this->db->or_like('cities.city_name', $data['keyword']);
        $this->db->or_like('p_bedrooms', $data['keyword']);
        $this->db->group_end(); // End the group
    }

    // Apply filters
    if (!empty($data['price'])) {
        $this->db->where('p_price <=', $data['price']);
    }

    if (!empty($data['type'])) {
        $this->db->where('p_type', $data['type']);
    }

    if (!empty($data['label'])) {
        $this->db->where('p_label', $data['label']);
    }

    if (!empty($data['status'])) {
        $this->db->where('p_status', $data['status']);
    }

    if (!empty($data['bedrooms'])) {
        $this->db->where('p_bedrooms', $data['bedrooms']);
    }

    if (!empty($data['bathrooms'])) {
        $this->db->where('p_bathrooms', $data['bathrooms']);
    }

    $this->db->order_by('property_tbl.p_dou', 'DESC');
    $this->db->group_by('property_tbl.p_id');

    return $result = $this->db->get()->result();
}

        // echo ('<pre>');
        // print_r($result);
        // die();
    

    //Total Properties Count
    public function total_properties()
    {
        return $this->db
            ->from('property_tbl')
            ->count_all_results();
    }
}
