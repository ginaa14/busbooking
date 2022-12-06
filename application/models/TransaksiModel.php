<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
	public function list_data($key = '')
	{
        if(isset($key) && !empty($key)){
            $this->db->like('a.ref_no', $key);
        }
		$this->db->select('a.*, c.terminal_name as from, d.terminal_name as to, e.sifat as sifat_desc, f.area as area_desc');
		$this->db->from('booked a');
        $this->db->join('schedule_list b','a.schedule_id = b.id');
        $this->db->join('location c','b.from_location = c.id');
        $this->db->join('location d','b.to_location = d.id');
        $this->db->join('sifat e','a.sifat = e.id','left');
        $this->db->join('area f','a.area = f.id','left');
        $this->db->order_by('a.created_at','DESC');
		return $this->db->get()->result_array();
	}
    
    public function insert($data){
        $this->db->insert('booked', $data);
        return true;
    }

    public function update($id, $data){
        $this->db->where('id', $id);
		$this->db->update('booked', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('booked');
        return true;
    }
}