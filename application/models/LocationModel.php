<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocationModel extends CI_Model {
	public function list_data($key = '')
	{
        if(isset($key) && !empty($key)){
            $this->db->like('terminal_name', $key);
        }
		$this->db->select('*');
		$this->db->from('location');
		return $this->db->get()->result_array();
	}
    
    public function insert($data){
        $this->db->insert('location', $data);
        return true;
    }

    public function update($id, $data){
        $this->db->where('id', $id);
		$this->db->update('location', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('location');
        return true;
    }
}