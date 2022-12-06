<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userModel extends CI_Model {
	public function list_data($key = '')
	{
        if(isset($key) && !empty($key)){
            $this->db->like('name', $key);
        }
        $this->db->where('role', 3);
		$this->db->select('*');
		$this->db->from('users');
		return $this->db->get()->result_array();
	}
    
    public function insert($data){
        $this->db->insert('users', $data);
        return true;
    }

    public function update($id, $data){
        $this->db->where('id', $id);
		$this->db->update('users', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
    }
}