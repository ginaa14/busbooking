<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class PengunjungModel extends CI_Model {

    public function list_terminal($key = ''){
        $this->db->select('*');
        $this->db->from('location');
        $this->db->where('status', 1);
        $this->db->order_by('terminal_name', 'ASC');

        return $this->db->get()->result_array();
    }

    public function list_schedule($param){
        if(isset($param['from']) && !empty($param['from'])){
            $this->db->where('a.from_location', $param['from']);
        }

        if(isset($param['to']) && !empty($param['to'])){
            $this->db->where('a.to_location', $param['to']);
        }

        if(isset($param['tanggal']) && !empty($param['tanggal'])){
            $this->db->like('a.departure_time', $param['tanggal']);
        }

        if(isset($param['type']) && !empty($param['type'])){
            $this->db->like('b.sifat', $param['type']);
        }
		$this->db->select('a.id, a.status, a.bus_id as bus_id, a.from_location as from_id, a.to_location as to_id, a.departure_time,b.sifat as sifat,  a.availability, a.price, a.date_updated, a.eta, b.name, b.bus_number, c.terminal_name as from, d.terminal_name as to');
		$this->db->from('schedule_list a');
        $this->db->join('bus b', 'a.bus_id = b.id','left');
        $this->db->join('location c','a.from_location = c.id','left');
        $this->db->join('location d','a.to_location = d.id','left');
		return $this->db->get()->result_array();
    }

    public function data_kursi($id){
        $this->db->where('id_schedule', $id);
        $this->db->select('*');
        $this->db->from('kursi_booked');
        return $this->db->get()->result_array();
    }
    
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

    public function data_schedule($id)
    {
        $this->db->where('a.id', $id);
		$this->db->select('a.id, a.status, a.bus_id as bus_id, a.from_location as from_id, a.to_location as to_id, a.departure_time,  a.availability, a.price, a.date_updated, a.eta, b.name, b.sifat as sifat, b.bus_number, c.terminal_name as from, d.terminal_name as to');
		$this->db->from('schedule_list a');
        $this->db->join('bus b', 'a.bus_id = b.id','left');
        $this->db->join('location c','a.from_location = c.id','left');
        $this->db->join('location d','a.to_location = d.id','left');
		return $this->db->get()->row_array();
    }

}