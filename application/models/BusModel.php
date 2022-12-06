<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusModel extends CI_Model {
	public function list_data($key = '')
	{
        if(isset($key) && !empty($key)){
            $this->db->like('name', $key);
        }
		$this->db->select('*');
		$this->db->from('bus');
		return $this->db->get()->result_array();
	}
    
    public function insert($data){
        $this->db->insert('bus', $data);
        return true;
    }

    public function update($id, $data){
        $this->db->where('id', $id);
		$this->db->update('bus', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bus');
        return true;
    }

    public function list_area($key = ''){
        if(isset($key) && !empty($key)){
            $this->db->like('area', $key);
        }
		$this->db->select('*');
		$this->db->from('area');
        $this->db->order_by('area', 'ASC');
		return $this->db->get()->result_array();
    }

    public function insert_area($data){
        $this->db->insert('area', $data);
        return true;
    }

    public function delete_area($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('area');
        return true;
    }

    public function update_area($id, $data){
        $this->db->where('id', $id);
		$this->db->update('area', $data);
        return true;
    }

    public function list_sifat($key = ''){
        if(isset($key) && !empty($key)){
            $this->db->like('sifat', $key);
        }
		$this->db->select('*');
		$this->db->from('sifat');
        $this->db->order_by('sifat', 'ASC');
		return $this->db->get()->result_array();
    }

    public function insert_sifat($data){
        $this->db->insert('sifat', $data);
        return true;
    }

    public function delete_sifat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sifat');
        return true;
    }

    public function update_sifat($id, $data){
        $this->db->where('id', $id);
		$this->db->update('sifat', $data);
        return true;
    }

}